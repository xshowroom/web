/**
 * @file controller of register module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.register.buyer',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'ui.uploader'
    ]
)
.controller(
    'RegisterBuyerCtrl',
    [
        '$scope', '$element', '$filter', '$q', '$modal', 'User', 'Country',
        function ($scope, $element, $filter, $q, $modal, User, Country) {
            $scope.step = {
                stepNumber: 1,
                validation: {
                    1: {
                        email: false,
                        pass: false,
                        firstName: false,
                        lastName: false,
                        displayName: false,
                        tel: false
//                      mobile: false
                    },
                    2: {
                        shopName: false,
                        shopType: false,
                        collectionType: false,
                        brandList: false,
                        shopWebsite: false,
                        shopAddress: false,
                        shopShipAddress: false,
                        shopCountry: false,
                        shopZipcode: false,
                        shopTel: false,
                        imagePath: false
                    },
                    3: {
                        companyName: false,
                        companyAddr: false,
                        companyCountry: false,
                        companyZip: false,
                        companyTel: false,
                        companyWebsite: false,
                        acceptCondition: false
                    }
                },
                reg: {
                    1: {
                        email: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                        pass: /^\S{6,100}$/,
                        firstName: /^\S{1,50}$/,
                        lastName: /^\S{1,50}$/,
                        tel: /^\S{6,20}$/
                    },
                    2: {
                        shopWebsite: /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-@?^=%&amp;/~\+#])?/
                    },
                    3: {
                        companyWebsite: /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-@?^=%&amp;/~\+#])?/
                    }
                },
                duplication: {
                    1: ['email'],
                    2: [],
                    3: []
                }
            };

            $scope.user = {
                roleType: 2
            };

            $scope.isRegistering = false;

            $scope.setCollection = function (value) {
                var collections = $scope.user.collectionType
                    ? $scope.user.collectionType.split(',')
                    : [];
                var index = collections.indexOf(value);
                if (index >= 0) {
                    collections.splice(index, 1);
                }
                else {
                    collections.push(value);
                }
                $scope.user.collectionType = collections.join(',');
            };

            $scope.errorMsgs = [];

            $scope.check = function () {
                var stepNumber = $scope.step.stepNumber;
                var keys = $scope.step.validation[stepNumber];

                $scope.errorMsgs = [];
                var promises = [];

                for (var key in keys) {
                    if (!key) {
                        continue;
                    }
                    var value = $scope.user[key];
                    if (key === 'shopWebsite' && !value) {
                        $scope.step.validation[stepNumber][key] = false;
                        continue;
                    }
                    if (key === 'companyWebsite' && !value) {
                        $scope.step.validation[stepNumber][key] = false;
                        continue;
                    }
                    if (!value || value === '') {
                        $scope.errorMsgs.push([key, 'EMPTY_ERROR']);
                        $scope.step.validation[stepNumber][key] = true;
                        continue;
                    }
                    if ($scope.step.reg[stepNumber][key]
                        && !$scope.step.reg[stepNumber][key].test(value)) {
                        $scope.errorMsgs.push([key, 'PATTERN_ERROR']);
                        $scope.step.validation[stepNumber][key] = true;
                        continue;
                    }
                    if ($scope.step.duplication[stepNumber].indexOf(key) >= 0) {
                        promises.push(User.duplicationCheck({
                            key: key,
                            param: value
                        }));
                    }
                    $scope.step.validation[stepNumber][key] = false;
                }
                $q.all(promises).then(function () {
                    for (var i = 0; i < arguments[0].length; i++) {
                        var res = arguments[0][i];
                        var key = res.config.data.key;
                        if (res.data.status) {
                            $scope.step.validation[stepNumber][key] = true;
                            $scope.errorMsgs.push([key, 'DUPLICATION_ERROR']);
                        }
                        else {
                            $scope.step.validation[stepNumber][key] = false;
                        }
                    }
                    if (!$scope.errorMsgs.length && $scope.step.stepNumber < 3) {
                        $scope.step.stepNumber += 1;
                    }
                    else if (!$scope.errorMsgs.length && $scope.step.stepNumber === 3) {
                        $scope.register();
                    }
                });
            };

            // 往前一页
            $scope.previous = function () {
                if ($scope.step.stepNumber > 1 && $scope.step.stepNumber <= 3) {
                    $scope.step.stepNumber--;
                }
            };

            $scope.countries = Country.getAll();

            $scope.register = function () {
                if ($scope.isRegistering) {
                    return;
                }
                $scope.isRegistering = true;
                var register = User.register($scope.user);
                register.success(function (res) {
                    $scope.isRegistering = false;
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                    }
                    else {
                        window.open('/buyer/dashboard', '_self');
                    }
                });
            };

            $scope.checkInvitation = function () {
                var code = angular.element('#invitation-code').val();

                User.invitationCheck({
                    code: code,
                    rnd: new Date().getTime()
                }).success(function (res) {
                    if (res.status) {
                        $('#invite-modal').modal('hide');
                    }
                    else {
                        $('#invite-error').show();
                    }
                });
            };
        }

    ]
);
