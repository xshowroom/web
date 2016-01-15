angular.module(
    'xShowroom.buyer.store', 
    [
     	'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'BuyerStoreCtrl',
    [
     	'$scope', '$modal', '$filter', 'Buyer', 'Store',
        function ($scope, $modal, $filter, Buyer, Store) {
     		$scope.loadMore = function(){
     			$scope.limit += 6;
     		};
     		
     		$scope.closeStore = function(storeId, index) {
     			if (!confirm($filter('translate')('modal__confirm__DELETE_STORE'))){
     				return;
     			}
     			Store.destroy({
     				shopId: storeId
     			}).success(function(res){
     				if (typeof(res) != 'object' || res.status) {
        				$modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg , show: true});
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
        				$modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg , show: true});
     					return;
     				}
     				for (var i = 0, len = res.data.length; i < len; i++){
     					res.data[i].image = res.data[i].image ? JSON.parse(res.data[i].image) : '';
     				}
     				$scope.stores = res.data
     			});
     		};
     		init();
     		
     		
     	}
    ]
);
