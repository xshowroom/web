/**
 * @file controller of product module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.product.index',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'ngSanitize', 'mgcrea.ngStrap'
    ]
)
.controller(
    'ProductIndexCtrl',
    [
        '$scope', '$modal', '$filter', 'Product', 'Cart',
        function ($scope, $modal, $filter, Product, Cart) {
            $scope.setProductCover = function (url) {
                $scope.productCover = url;
            };

            $scope.deleteProduct = function (productId, collectionId) {
                if (!$scope.hasAuth) {
                    return;
                }
                Product.destroy({
                    id: productId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                    }
                    else {
                        window.open('/collection/' + collectionId, '_self');
                    }
                });
            };

            $scope.addProductToCart = function (productId) {
                Cart.addProduct({
                    productionId: productId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({
                            title: $filter('translate')('modal__title__ERROR'),
                            content: $filter('translate')('modal__msg__error__SYSTEM_ERROR'),
                            show: true
                        });
                        return;
                    }
                    $scope.isInCart = true;
                });
            };

            $scope.removeProductFromCart  = function (productId) {
                Cart.removeProduct({
                    productionId: productId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({
                            title: $filter('translate')('modal__title__ERROR'),
                            content: $filter('translate')('modal__msg__error__SYSTEM_ERROR'),
                            show: true
                        });
                        return;
                    }
                    $scope.isInCart = false;
                });
            };

            $scope.checkProductIsExisted = function (productId) {
                Cart.checkProduct({
                    productionId: $scope.productId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({
                            title: $filter('translate')('modal__title__ERROR'),
                            content: $filter('translate')('modal__msg__error__SYSTEM_ERROR'),
                            show: true
                        });
                        return;
                    }
                    $scope.isInCart = !!res.data;
                });
            };

            $scope.checkProductIsExisted();
        }
    ]
);
