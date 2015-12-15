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
        '$scope', '$modal', 'Product', 'Cart',
        function ($scope, $modal, Product, Cart) {
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
					if (typeof(res) != 'object' || res.status) {
	    				$modal({title: 'Error Info', content: res.msg, show: true});
					}else{
						window.open('/collection/' + collectionId, '_self');
					}
				});
        	};
        	
        	$scope.addProductToCart = function(productId){
        		Cart.addProduct({
        			productionId: productId
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: 'Add product to cart失败，请检查！', show: true});
     					return;
     				}
        			$scope.isInCart = true;
        		});
        	};
        	
        	$scope.removeProductFromCart  = function(productId){
        		Cart.removeProduct({
        			productionId: productId
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: 'remove product from cart失败，请检查！', show: true});
     					return;
     				}
        			$scope.isInCart = false;
        		});
        	};
        	
        	$scope.checkProductIsExisted = function(productId){
        		Cart.checkProduct({
        			productionId: $scope.productId
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: '获取Cart数据失败，请检查！', show: true});
     					return;
     				}
        			$scope.isInCart = !!res.data;
        		});
        	};
        	
        	
        	$scope.checkProductIsExisted();
        }
    ]
);