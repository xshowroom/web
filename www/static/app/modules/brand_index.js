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
     		$scope.selectSeason = function (season) {
     			$scope.selectedSeason = season;
     			$scope.selectedCover = $scope.covers[season][0];
     		};
     		
     		$scope.selectCover = function(cover){
     			$scope.selectedCover = cover;
     		};
     		
     		$scope.selectStore = function(store){
     			$scope.selectedStore = store;
     		};
     		
     		$scope.refreshCovers = function(season){
     			$scope.seasons = [];
     			Brand.getCoversBySeason({
     				brandId: $scope.brandId,
     				season: season
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Collection Cover数据失败，请检查！');
     					return;
     				}
     				$scope.covers = res.data;
     				for (var season in $scope.covers){
     					$scope.seasons.push(season);
     				}
     				$scope.selectedSeason = $scope.seasons[0];
     				$scope.selectedCover = res.data[$scope.selectedSeasons][0];
     			});
     		};
     		
     		$scope.applyAuth = function(){
     			Buyer.applyAuth({
     				shopId: $scope.selectedStore.id,
     				brandId: $scope.brandId
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Auth数据失败，请检查！');
     					return;
     				}
     				$scope.authCode = -1;
     			});
     			$('#auth-store-modal').modal('hide');
     		};
     		
     		var checkAuth = function(){
     			if ($scope.isGuest){
     				$scope.authCode = -2;
     				return;
     			}
     			Buyer.checkAuth({
     				brandId: $scope.brandId
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Auth数据失败，请检查！');
     					return;
     				}
     				$scope.authCode = res.data;
     			});
     		};
     		
     		var getStoreList = function(){
     			if ($scope.isGuest){
     				return;
     			}
     			Buyer.getStoreList().success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Store数据失败，请检查！');
     					return;
     				}
     				$scope.stores = res.data;
     				$scope.selectedStore = null;
     			});
     		};
     		
     		var init = function () {
     			checkAuth();
     			getStoreList();
     			$scope.conditions = Brand.getIndexConditions();
     			$scope.refreshCovers($scope.selectedSeason);
     		};
     		
     		init();
        }
    ]
);