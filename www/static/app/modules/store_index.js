/**
 * @file controller of store module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.store.index',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services',
        'mgcrea.ngStrap', 'ui.uploader', 'ngTextcomplete'
    ]
)
.controller(
    'StoreIndexCtrl',
    [
        '$scope', '$window', '$location', '$modal', '$filter', 'Country', 'Store',
        function ($scope, $window, $location, $modal, $filter, Country, Store) {
            $scope.isEditing = Number($location.search().isEdit) === 1;

            $scope.setCollection = function (value) {
                var collections = $scope.store.collectionType
                    ? $scope.store.collectionType.split(',')
                    : [];
                var index = collections.indexOf(value);

                if (index >= 0) {
                    collections.splice(index, 1);
                }
                else {
                    collections.push(value);
                }
                $scope.store.collectionType = collections.join(',');
            };
            $scope.countries = Country.getAll();

            $scope.checkInfo = {
                validation: {
                    shopName: false,
                    shopType: false,
                    collectionType: false,
                    brandList: false,
                    shopWebsite: false,
                    shopAddress: false,
                    shopCountry: false,
                    shopZipcode: false,
                    shopShipAddress: false,
                    shopTel: false
//                  shopImage: false,
//                  shopAbout: false
                },
                reg: {
                    shopWebsite: /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-@?^=%&amp;/~\+#])?/
                }
            };

            $scope.addStoreImage = function (url) {
                $scope.store.shopImage.push(url);
                $scope.$apply();
            };

            $scope.update = function () {
                $scope.errorMsgs = [];

                for (var key in $scope.checkInfo.validation) {
                    if (!key) {
                        continue;
                    }
                    var value = $scope.store[key];
                    if (key === 'shopWebsite' && !value) {
                        $scope.checkInfo.validation[key] = false;
                        continue;
                    }
                    if (!value || value === '' || angular.equals(value, {})) {
                        $scope.errorMsgs.push([key, 'EMPTY_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
                    if ($scope.checkInfo.reg[key] && !$scope.checkInfo.reg[key].test(value)) {
                        $scope.errorMsgs.push([key, 'PATTERN_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
                    $scope.checkInfo.validation[key] = false;
                }
                if (!$scope.errorMsgs.length) {
                    Store.create(
                         $scope.store
                    ).success(function (res) {
                        if (res.status) {
                            $scope.errorMsgs.push(['create error', res.msg]);
                        }
                        else {
                            $window.open('/buyer/store', '_self');
                        }
                    });
                }
            };

            $scope.toggleEditing = function () {
                $scope.isEditing = !$scope.isEditing;
            };

            var init = function () {
                Store.findOne({
                    shopId: $scope.storeId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }

                    $scope.store = {
                        shopId: res.data.id,
                        shopName: res.data.name,
                        shopType: res.data.type,
                        collectionType: res.data.collection_type,
                        brandList: res.data.brand_list,
                        shopWebsite: res.data.website,
                        shopAddress: res.data.address,
                        shopCountry: res.data.country,
                        shopZipcode: res.data.zip,
                        shopTel: res.data.telephone,
                        shopImage: (res.data.image && res.data.image != 'null' ? JSON.parse(res.data.image) : []),
                        shopAbout: res.data.about,
                        shopShipAddress: res.data.ship_address
                    };
                    $scope.collectionType = {};
                    var collectionTypes = res.data.collection_type.split(',');
                    for (var i = 0, len = collectionTypes.length; i < len; i++) {
                        $scope.collectionType[collectionTypes[i]] = true;
                    }
                });
            };

            init();
        }
    ]
);
