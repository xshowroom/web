/**
 * @file root module of profile page
 * @author xiaotaot
 * @description Definition of profile page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.product.index',
    [
        'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'ProductIndexCtrl',
    [
        '$scope', 'Product',
        function ($scope, Product) {
        	$scope.setProductCover = function (url) {
        		$scope.productCover = url;
        	};
        	
        	$scope.deleteProduct = function(productId, collectionId){
        		if (confirm('确认要删除该Product?')){
         			Product.destroy({
         				id: productId
         			}).success(function(res){
         	     		if (res.status) {
         	     			alert(res.msg);
         	     		}else{
         	     			window.open('/collection/' + collectionId, '_self');
         	     		}
         	     	});
         		} 
        	}
        	
        }
    ]
);