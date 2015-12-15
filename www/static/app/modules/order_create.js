/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
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
     	'$scope', '$modal', 'Cart', 'Order',
        function ($scope, $modal, Cart, Order) {
     		Cart.findOne({
     			collectionId: $scope.collectionId
     		}).success(function(res){
     			if (typeof(res) != 'object' || res.status) {
    				$modal({title: 'Error Info', content: res.msg, show: true});
    				return;
     			}
     			$scope.quantities = {};
     			for(var i = 0, len = res.data.length; i < len; i++) {
     				var productId = res.data[i].id;
     				$scope.quantities[productId] = {};
     				var sizes = [];
     				for(var size in res.data[i].sizeCode) {
     					sizes.push(size);
     				};
     				for(var j = 0, clen = res.data[i].color.length; j < clen; j++) {
     					var colorName = res.data[i].color[j].name;
     					$scope.quantities[productId][colorName] = {};
     					for(var size in res.data[i].sizeCode) {
	     					$scope.quantities[productId][colorName][size] = null;
	     				}
     				}
     				res.data[i].size = sizes;
     			}
     			$scope.products = res.data;
     		});
     		
     		$scope.getQuantity = function(productId){
     			var number = 0;
     			for(var color in $scope.quantities[productId]){
     				for(var size in $scope.quantities[productId][color]){
     					number += parseInt($scope.quantities[productId][color][size] || 0);
     				}
     			}
     			return number;
     		};
     		
     		$scope.getAmount = function(productId, wholePrice){
     			return $scope.getQuantity(productId) * wholePrice;
     		};
     		
     		$scope.getTotalQuantity = function(){
     			var total = 0;
     			for(var productId in $scope.quantities){
     				total += $scope.getQuantity(productId);
     			}
     			return total;
     		};
     		
     		$scope.getTotalAmount = function(){
     			if (!$scope.products){
     				return 0;
     			}
     			var total = 0;
     			for(var i = 0, len = $scope.products.length; i < len; i++) {
     				total += $scope.getQuantity($scope.products[i].id) * $scope.products[i].wholePrice;
     			}
     			return total;
     		};
     		
     		$scope.getRestAmount = function(){
     			return $scope.minOrder - $scope.getTotalAmount();
     		};
     		
     		$scope.validNumber = function (productId, colorName, size){
     			var input = $scope.quantities[productId][colorName][size];
     			var reg = /^(0|[1-9]{1}\d*)$/;
     			var isNumber = reg.test(input);
     			if (input && !isNumber){
     				$modal({title: 'Error Info', content: '您输入了非法数字！', show: true});
     				$scope.quantities[productId][colorName][size] = null;
     			}
     		};
     		
     		$scope.createOrder = function(){
     			var result = {};
     			if ($scope.getRestAmount() > 0){
     				$modal({title: 'Error Info', content: '该订单尚未满足最小金额，请增加货物，谢谢！', show: true});
     			}
     			for(var i = 0, len = $scope.products.length; i < len; i++) {
     				var productId = $scope.products[i].id;
     				result[productId] = [];
	     			for(var color in $scope.quantities[productId]){
	     				for(var size in $scope.quantities[productId][color]){
	     					if ($scope.quantities[productId][color][size] > 0){
	     						result[productId].push({
		     						size_code: size,
		     						color: color,
		     						buy_num: $scope.quantities[productId][color][size]
		     					});
	     					}
	     				}
	     			}
     			}
     			console.log(result)
     		}
        }
    ]
);