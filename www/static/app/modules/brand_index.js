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
     		$scope.setSeason = function (season) {
     			$scope.selectedSeason = season;
     		};
     		
     		var init = function () {
     			$scope.conditions = Brand.getIndexConditions();
     			$scope.seasons = Brand.getSeason();
     			$scope.selectedSeason = $scope.seasons[0];
     		};
     		
     		init();
        }
    ]
);