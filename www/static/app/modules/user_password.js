/**
 * @file controller of user module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.user.password',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'UserPasswordCtrl',
    [
        '$scope', '$modal', '$filter', 'User',
        function ($scope, $modal, $filter, User) {
            $scope.password = {};
            $scope.checkInfo = {
                validation: {
                    'old': false,
                    'new': false,
                    'confirm': false
                },
                reg: {
                    'new': /^\S{6,100}$/,
                    'confirm': /^\S{6,100}$/
                }
            };
            $scope.updatePassword = function () {
                $scope.errorMsgs = [];
                for (var key in $scope.checkInfo.validation) {
                    if (!key) {
                        continue;
                    }
                    var value = $scope.password[key];
                    if (!value || value === '') {
                        $scope.errorMsgs.push([key, 'EMPTY_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
                    if ($scope.checkInfo.reg[key] && !$scope.checkInfo.reg[key].test(value)) {
                        $scope.errorMsgs.push([key, 'PATTERN_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
                    if (key === 'new' && $scope.password.old === $scope.password.new) {
                        $scope.errorMsgs.push([key, 'SAME_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
                    if (key === 'confirm' && $scope.password.new !== $scope.password.confirm) {
                        $scope.errorMsgs.push([key, 'NOT_SAME_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
                    $scope.checkInfo.validation[key] = false;
                }
                if ($scope.errorMsgs.length) {
                    return;
                }
                User.changePassword({
                    'old': $scope.password.old,
                    'new': $scope.password.new
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                    }
                    else {
                        $scope.errorMsgs = [];
                        $modal({title: $filter('translate')('modal__title__SUCCESS'), content: res.msg, show: true});
                    }
                });
            };
        }
    ]
);
