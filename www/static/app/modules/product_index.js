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
        '$scope',
        function ($scope) {
        	$scope.setProductCover = function (url) {
        		$scope.productCover = url;
        	}
        }
    ]
);