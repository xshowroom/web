/**
 * @file controller of collection module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.collection.index',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services',
        'mgcrea.ngStrap', 'ngTextcomplete', 'ngSanitize'
    ]
)
.controller(
    'CollectionIndexCtrl',
    [
        '$scope', '$modal', '$filter', '$q', '$location', 'Collection',
        function ($scope, $modal, $filter, $q, $location, Collection) {
            $scope.checkInfo = {
                validation: {
                    name: false,
                    category: false,
                    mode: false,
                    season: false,
                    order: false,
                    currency: false,
                    deadline: false,
                    delivery: false,
                    description: false,
                    image: false
                },
                reg: {
                    order: /^\d+$/,
                    deadline: /\d{4}-\d{2}-\d{2}/,
                    delivery: /\d{4}-\d{2}-\d{2}/
                },
                duplication: ['name']
            };
            $scope.updateCollection = function () {
                $scope.errorMsgs = [];
                var promises = [];

                for (var key in $scope.checkInfo.validation) {
                    if (!key) {
                        continue;
                    }
                    var value = $scope.collection[key];
                    if ((key === 'deadline' || key === 'delivery') && !value) {
                        $scope.errorMsgs.push([key, 'DATE_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
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
                    if ($scope.checkInfo.duplication.indexOf(key) >= 0) {
                        promises.push(Collection.duplicationCheck({
                            key: key,
                            param: value,
                            collectionId: $scope.collectionId
                        }));
                    }
                    $scope.checkInfo.validation[key] = false;
                }

                $q.all(promises).then(function () {
                    for (var i = 0; i < arguments[0].length; i++) {
                        var res = arguments[0][i];
                        var key = res.config.data.key;

                        if (res.data.status) {
                            $scope.checkInfo.validation[key] = true;
                            $scope.errorMsgs.push([key, 'DUPLICATION_ERROR']);
                        }
                        else {
                            $scope.checkInfo.validation[key] = false;
                        }
                    }
                    if (!$scope.errorMsgs.length) {
                        Collection.modify(
                            $scope.collection
                        ).success(function (res) {
                            if (typeof res !== 'object' || res.status) {
                                $modal({
                                    title: $filter('translate')('modal__title__ERROR'),
                                    content: res.msg,
                                    show: true
                                });
                            }
                            else {
                                window.location.reload();
                            }
                        });
                    }
                });
            };

            $scope.deleteCollection = function () {
                Collection.destroy({
                    id: $scope.collectionId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({
                            title: $filter('translate')('modal__title__ERROR'),
                            content: res.msg,
                            show: true
                        });
                    }
                    else {
                        window.open('/brand/collection', '_self');
                    }
                });
            };

            $scope.enableCollection = function () {
                Collection.enable({
                    id: $scope.collectionId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({
                            title: $filter('translate')('modal__title__ERROR'),
                            content: res.msg,
                            show: true
                        });
                    }
                    else {
                        window.location.reload();
                    }
                });
            };

            $scope.closeCollection = function () {
                Collection.close({
                    id: $scope.collectionId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                    }
                    else {
                        window.location.reload();
                    }
                });
            };

            $scope.setDatesByMode = function (mode) {
                if (mode === 'dropdown__COLLECTION_MODE__PERMANENT') {
                    var year = new Date().getFullYear();
                    var maxDate = new Date();
                    maxDate.setYear(year + 100);
                    $scope.collection.delivery = $filter('date')(maxDate, 'yyyy-MM-dd');
                    $scope.collection.deadline = $filter('date')(maxDate, 'yyyy-MM-dd');
                }
                else {
                    $scope.collection.delivery = null;
                    $scope.collection.deadline = null;
                }
            };

            var initCollection = function () {
                Collection.findById({
                    id: $scope.collectionId
                }).success(function (res) {
                    if (!res.status) {
                        $scope.collection = {
                            id: res.data.id,
                            name: res.data.name,
                            category: res.data.category,
                            mode: res.data.mode,
                            season: res.data.season,
                            order: res.data.mini_order,
                            currency: res.data.currency,
                            deadline: res.data.deadline.split(/\s/)[0],
                            delivery: res.data.delivery_date,
                            description: res.data.description,
                            image: res.data.cover_image
                        };
                    }
                    else {
                        $modal({
                            title: $filter('translate')('modal__title__ERROR'),
                            content: res.msg,
                            show: true
                        });
                    }
                });
            };

            var initProducts = function () {
                Collection.getProductList({
                    collectionId: $scope.collectionId,
                    timestamp: new Date().getTime()
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    $scope.products = res.data;
                    $scope.categoryCounter = {};
                    for (var i = 0, len = $scope.products.length; i < len; i++) {
                        var category = $scope.products[i].category;
                        if ($scope.categoryCounter[category]) {
                            $scope.categoryCounter[category] += 1;
                        }
                        else {
                            $scope.categoryCounter[category] = 1;
                        }
                    }
                });
            };

            var init = function () {
                if ($scope.hasAuth) {
                    initCollection();
                }
                $scope.filters = {
                    category: $location.search().category || '',
                    limit: 8
                };
                initProducts();
            };

            init();
        }
    ]
);
