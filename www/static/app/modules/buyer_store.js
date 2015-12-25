/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.buyer.store', 
    [
     	'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'BuyerStoreCtrl',
    [
     	'$scope', '$modal', 'Buyer', 'Store',
        function ($scope, $modal, Buyer, Store) {
     		$scope.loadMore = function(){
     			$scope.limit += 6;
     		};
     		
     		$scope.closeStore = function(storeId, index) {
     			if (!confirm('确认删除该店铺?')){
     				return;
     			}
     			Store.destroy({
     				shopId: storeId
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: res.msg , show: true});
     					return;
     				}
     				if ($scope.stores[index].id == storeId) {
     					$scope.stores.splice(index, 1);
     				}
     			});
     		};
     		
     		var init = function (){
     			$scope.limit = 6;
     			Buyer.getMyStoreList().success(function(res){
     				if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: res.msg , show: true});
     					return;
     				}
     				$scope.stores = res.data
     			});
     		};
     		init();
     		
     		
     	}
    ]
);