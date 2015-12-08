/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.brand.index', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'BrandIndexCtrl',
    [
     	'$scope', 'Brand',
        function ($scope, Brand) {
     		var init = function(){
     			$scope.conditions = Brand.getIndexConditions();
     		};
     		
     		init();
        }
    ]
);