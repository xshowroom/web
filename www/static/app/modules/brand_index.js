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
     	'$scope', '$timeout', 'Brand', 'Buyer',
        function ($scope, $timeout, Brand, Buyer) {
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
     		
     		$scope.refreshCovers = function(){
     			$scope.seasons = [];
     			Brand.getCoversBySeason({
     				brandId: $scope.brandId
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Cover数据失败，请检查！');
     					return;
     				}
     				$scope.covers = res.data;
     				for (var season in $scope.covers){
     					$scope.seasons.push(season);
     				}
     				$scope.selectedSeason = $scope.seasons[0];
     				$scope.selectedCover = res.data[$scope.selectedSeason][0];
     			});
     		};
     		
     		$scope.applyAuth = function(){
     			Buyer.applyAuth({
     				shopId: $scope.selectedStore.id,
     				brandId: $scope.brandId
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('申请Auth失败，请检查！');
     					return;
     				}
     				$scope.authCode = -1;
     			});
     			$('#auth-store-modal').modal('hide');
     		};
     		
     		$scope.setFilters = function(name, condition){
     			if($scope.filterTimeout){
     				$timeout.cancel($scope.filterTimeout);
     				$scope.filterTimeout = null;
     			}
     			$scope.filters[name] = condition
     			
     			$scope.filterTimeout = $timeout(function(){
     				$scope.refreshCollectionList(true);
     			}, 500, true);
     		};
     		
     		$scope.refreshCollectionList = function(isRefresh){
     			$scope.collections.offset += isRefresh ? -$scope.collections.offset : $scope.collections.pageSize;
     			
     			var options = angular.copy($scope.filters);
     			options.pageSize = $scope.collections.pageSize;
     			options.offset = $scope.collections.offset;
     			options.brandId = $scope.brandId;
     			
     			Brand.getCollectionList(options).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
     					alert('获取Collection数据失败，请检查！');
     					return;
     				}
     				if(isRefresh){
     					$scope.collections.content = res.data;
     				}else{
     					for(var i = 0, len = res.data.length; i < len; i++) {
     						$scope.collections.content.push(res.data[i])
     					}
     				}
     				$scope.hasNext = res.data.length == $scope.collections.pageSize;
     			});
     		};
     		
     		$scope.parseImageUrl = function(urlStr){
     			var urls = JSON.parse(urlStr);
     			return urls[0];
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
     				if (res.data == 0){
     					$scope.refreshCollectionList(true);
         			}
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
     			$scope.collections = {
         			pageSize: 4,
         			offset: 0,
         			content: []
         		};
     			$scope.filters = {};
     			$scope.conditions = Brand.getIndexConditions();
     			$scope.refreshCovers();
     		};
     		
     		init();
        }
    ]
);