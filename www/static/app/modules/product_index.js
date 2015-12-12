/**
 * @file root module of profile page
 * @author xiaotaot
 * @description Definition of profile page module and all controllers in it.
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
        '$scope', '$modal', 'Product', 'Order',
        function ($scope, $modal, Product, Order) {
        	$scope.setProductCover = function (url) {
        		$scope.productCover = url;
        	};
        	
        	$scope.deleteProduct = function(productId, collectionId){
        		if (!$scope.hasAuth){
        			return;
        		}
				Product.destroy({
					id: productId
				}).success(function(res){
					if (res.status) {
						alert(res.msg);
					}else{
						window.open('/collection/' + collectionId, '_self');
					}
				});
        	};
        	
        	$scope.addProductToCart = function(productId){
        		Order.addProductToCart({
        			productionId: productId
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: 'Add product to cart失败，请检查！'}).show();
     					return;
     				}
        			$scope.isInCart = true;
        		});
        	};
        	
        	$scope.removeProductFromCart  = function(productId){
        		Order.removeProductFromCart({
        			productionId: productId
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: 'remove product from cart失败，请检查！'}).show();
     					return;
     				}
        			$scope.isInCart = false;
        		});
        	};
        	
        	$scope.checkProductIsExisted = function(productId){
        		Order.checkProductIsExisted({
        			productionId: $scope.productId
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: '获取Cart数据失败，请检查！'}).show();
     					return;
     				}
        		});
        	};
        	
        	
        	$scope.checkProductIsExisted();
        }
    ]
);