/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.buyer.brand', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'BuyerBrandCtrl',
    [
     	'$scope', '$timeout', 'Brand', 'Buyer',
        function ($scope, $timeout, Brand, Buyer) {
     		$scope.hasFilter = function(){
     			return !angular.equals($scope.filters, {});
     		}
     		
     		$scope.filterTimeout = null;
     		
     		$scope.setFilters = function(name, condition){
     			if($scope.filterTimeout){
     				$timeout.cancel($scope.filterTimeout);
     				$scope.filterTimeout = null;
     			}
     			$scope.filters[name] = condition
     			
     			$scope.filterTimeout = $timeout(function(){
     				$scope.getNewBrands(true);
     			}, 500, true);
     		};
     		
     		$scope.getNewBrands = function(isRefresh){
     			$scope.brands.offset += isRefresh ? -$scope.brands.offset : $scope.brands.pageSize;
     			
     			var options = angular.copy($scope.filters);
     			options.pageSize = $scope.brands.pageSize;
     			options.offset = $scope.brands.offset;
     			
     			if(options.season){
     				options.season = options.season.join(',');
     			}
     			if(options.country){
     				options.country = options.country.join(',');
     			}
     			Buyer.getMyBrandList(options).success(function(res){
     				if (res.status){
     					alert(res.msg);
     					return;
     				}
     				if(isRefresh){
     					$scope.brands.content = res.data;
     				}else{
     					for(var i = 0, len = res.data.length; i < len; i++) {
     						$scope.brands.content.push(res.data[i])
     					}
     				}
     				$scope.hasNext = res.data.length == $scope.brands.pageSize;
         		});
     		};
     		
     		
     		var init = function(){
     			$scope.brands = {
     				pageSize: 16,
     				offset: 0,
     				content: []
     			};
     			$scope.filters = {};
     			
     			$scope.conditions = Brand.getMyBrandConditions();
     			$scope.getNewBrands(true);
     		};
     		
     		init();
     		
     		
        }
    ]
);