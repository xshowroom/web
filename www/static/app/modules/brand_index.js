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
     			$scope.refreshCovers(season)
     		};
     		
     		$scope.refreshCovers = function(season){
     			Brand.getCoversBySeason({
     				brandId: $scope.brandId,
     				season: season
     			}).success(function(res){
     				console.log(res.status, arguments);
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Collection Cover数据失败，请检查！');
     					return;
     				}
     			});
     		};
     		
     		$scope.applyAuth = function(){
     			
     		}
     		
     		var checkAuth = function(){
     			Brand.checkAuth({
     				brandId: $scope.brandId
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Auth数据失败，请检查！');
     					return;
     				}
     			});
     		};
     		
     		
     		var init = function () {
     			checkAuth();
     			$scope.conditions = Brand.getIndexConditions();
     			$scope.seasons = Brand.getSeason();
     			$scope.selectedSeason = $scope.seasons[0];
     			$scope.refreshCovers($scope.selectedSeason);
     		};
     		
     		init();
        }
    ]
);