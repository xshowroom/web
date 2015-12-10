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
     	'$scope', 'Brand', 'Buyer',
        function ($scope, Brand, Buyer) {
     		$scope.setSeason = function (season) {
     			$scope.selectedSeason = season;
     			$scope.refreshCovers(season)
     		};
     		
     		$scope.refreshCovers = function(season){
     			Brand.getCoversBySeason({
     				brandId: $scope.brandId,
     				season: season
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Collection Cover数据失败，请检查！');
     					return;
     				}
     				$scope.covers = res.data;
     				$scope.selectedCover = res.data[0];
     			});
     		};
     		
     		$scope.setSelectedCover = function(cover){
     			$scope.selectedCover = cover;
     		};
     		
     		$scope.applyAuth = function(){
     			console.log($scope.selectedAuthStore);
     		};
     		
     		var checkAuth = function(){
     			Buyer.checkAuth({
     				brandId: $scope.brandId
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Auth数据失败，请检查！');
     					return;
     				}
     				$scope.hasAuth = res.data;
     			});
     		};
     		
     		var getStoreList = function(){
     			Buyer.getStoreList().success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Store数据失败，请检查！');
     					return;
     				}
     				$scope.stores = res.data;
     				$scope.selectedAuthStore = null;
     			});
     		};
     		
     		var init = function () {
     			checkAuth();
     			getStoreList();
     			$scope.conditions = Brand.getIndexConditions();
     			$scope.seasons = Brand.getSeasons();
     			$scope.selectedSeason = $scope.seasons[0];
     			$scope.refreshCovers($scope.selectedSeason);
     		};
     		
     		init();
        }
    ]
);