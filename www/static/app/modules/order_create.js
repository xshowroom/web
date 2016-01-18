/**
 * @file controller of order module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.order.create',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'mgcrea.ngStrap'
    ]
)
.controller(
    'OrderCreateCtrl',
    [
        '$scope', '$modal', '$window', '$filter', 'Cart', 'Order', 'Collection', 'Buyer',
        function ($scope, $modal, $window, $filter, Cart, Order, Collection, Buyer) {
            $scope.removeProductFromCart  = function (product) {
                Cart.removeProduct({
                    productionId: product.id
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({
                            title: $filter('translate')('modal__title__ERROR'),
                            content: $filter('translate')('modal__msg__error__SYSTEM_ERROR'),
                            show: true
                        });
                        return;
                    }
                    var index = $scope.products.indexOf(product);
                    $scope.products.splice(index, 1);
                    delete $scope.quantities[product.id];
                    if (!$scope.products.length) {
                        $window.open('/buyer/cart', '_self');
                    }
                });
            };

            $scope.getQuantity = function (productId) {
                var number = 0;
                for (var color in $scope.quantities[productId]) {
                    if (!color) {
                        continue;
                    }
                    for (var size in $scope.quantities[productId][color]) {
                        if (!size) {
                            continue;
                        }
                        number += parseInt($scope.quantities[productId][color][size] || 0, 10);
                    }
                }
                return number;
            };

            $scope.getAmount = function (productId, wholePrice) {
                return $scope.getQuantity(productId) * wholePrice;
            };

            $scope.getTotalQuantity = function () {
                var total = 0;
                for (var productId in $scope.quantities) {
                    if (!productId) {
                        continue;
                    }
                    total += $scope.getQuantity(productId);
                }
                return total;
            };

            $scope.getTotalAmount = function () {
                if (!$scope.products) {
                    return 0;
                }
                var total = 0;
                for (var i = 0, len = $scope.products.length; i < len; i++) {
                    total += $scope.getQuantity($scope.products[i].id) * $scope.products[i].wholePrice;
                }
                return total;
            };

            $scope.getRestAmount = function () {
                return $scope.minOrder - $scope.getTotalAmount();
            };

            $scope.validNumber = function (productId, colorName, size) {
                var input = $scope.quantities[productId][colorName][size];
                var reg = /^(0|[1-9]{1}\d*)$/;
                var isNumber = reg.test(input);
                if (input && !isNumber) {
                    $scope.quantities[productId][colorName][size] = null;
                }
            };

            $scope.checkout = function () {
                if ($scope.getRestAmount() > 0) {
                    $modal({title: $filter('translate')('modal__title__ERROR'), content: $filter('translate')('modal__msg__error__ORDER_NOT_ENOUGH'), show: true});
                }
                else {
                    var orderItems = [];
                    for (var i = 0, len = $scope.products.length; i < len; i++) {
                        var productId = $scope.products[i].id;
                        for (var color in $scope.quantities[productId]) {
                            if (!color) {
                                continue;
                            }
                            for (var size in $scope.quantities[productId][color]) {
                                if (!size) {
                                    continue;
                                }
                                if ($scope.quantities[productId][color][size] > 0) {
                                    orderItems.push({
                                        name: $scope.products[i].name,
                                        styleNumber: $scope.products[i].styleNum,
                                        sizeCode: size,
                                        color: color,
                                        buyNum: $scope.quantities[productId][color][size],
                                        wholePrice: $scope.products[i].wholePrice
                                    });
                                }
                            }
                        }
                    }
                    $scope.orderItems = orderItems;
                    if ($scope.stores) {
                        $scope.generateOrderStep += 1;
                        return;
                    }
                    Buyer.getAuthedShopList({
                        collectionId: $scope.collectionId
                    }).success(function (res) {
                        if (typeof res !== 'object' || res.status) {
                            $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                            return;
                        }
                        $scope.stores = res.data;
                        $scope.generateOrderStep += 1;
                    });
                }
            };

            $scope.setOptions = function () {
                if (!$scope.order.store) {
                    $modal({
                        title: $filter('translate')('modal__title__ERROR'),
                        content: $filter('translate')('modal__msg__error__ORDER_NOT_SELECT_SHIP_ADDRESS'),
                        show: true
                    });
                    return;
                }
                if (!$scope.order.paymentType) {
                    $modal({title: $filter('translate')('modal__title__ERROR'),
                       content: $filter('translate')('modal__msg__error__ORDER_NOT_SELECT_PAYMENT_METHOD'),
                       show: true});
                    return;
                }
                $scope.generateOrderStep += 1;
            };

            $scope.submitOrder = function () {
                var productionDetail = {};
                for (var i = 0, len = $scope.products.length; i < len; i++) {
                    var productId = $scope.products[i].id;
                    for (var color in $scope.quantities[productId]) {
                        if (!color) {
                            continue;
                        }
                        for (var size in $scope.quantities[productId][color]) {
                            if (!size) {
                                continue;
                            }
                            if ($scope.quantities[productId][color][size] > 0) {
                                if (!productionDetail[productId]) {
                                    productionDetail[productId] = [];
                                }
                                productionDetail[productId].push({
                                    size_code: size,
                                    color: color,
                                    buy_num: $scope.quantities[productId][color][size]
                                });
                            }
                        }
                    }
                }
                Order.create({
                    collectionId: $scope.collectionId,
                    productionDetail: productionDetail,
                    address: $scope.order.store.address,
                    paymentType: $scope.order.paymentType,
                    shopId: $scope.order.store.id
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    $window.open('/order/list', '_self');
                });
            };

            var init = function () {
                $scope.generateOrderStep = 1;
                $scope.order = {};

                Cart.findOne({
                    collectionId: $scope.collectionId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    $scope.quantities = {};
                    for (var i = 0, len = res.data.length; i < len; i++) {
                        var productId = res.data[i].id;
                        $scope.quantities[productId] = {};
                        var sizes = [];
                        for (var size in res.data[i].sizeCode) {
                            if (!size) {
                                continue;
                            }
                            sizes.push(size);
                        }
                        for (var j = 0, clen = res.data[i].color.length; j < clen; j++) {
                            var colorName = res.data[i].color[j].name;
                            $scope.quantities[productId][colorName] = {};
                            for (var cSize in res.data[i].sizeCode) {
                                if (!cSize) {
                                    continue;
                                }
                                $scope.quantities[productId][colorName][cSize] = null;
                            }
                        }
                        res.data[i].size = sizes;
                    }
                    $scope.products = res.data;
                });

                Collection.findById({
                    id: $scope.collectionId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    $scope.collection = res.data;
                });
            };

            init();
        }
    ]
);
