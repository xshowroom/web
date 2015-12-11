/**
 * @file root module of profile page
 * @author xiaotaot
 * @description Definition of profile page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.product.index',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'ngSanitize'
    ]
)
.controller(
    'ProductIndexCtrl',
    [
        '$scope', 'Product', 'Order',
        function ($scope, Product, Order) {
        	$scope.setProductCover = function (url) {
        		$scope.productCover = url;
        	};
        	
        	$scope.deleteProduct = function(productId, collectionId){
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
     					alert('获取Cover数据失败，请检查！');
     					return;
     				}
        		});
        	};
        	
        }
    ]
);