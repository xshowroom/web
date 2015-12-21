/**
 * @file module of login page
 * @author shiliang
 * @description Definition of login page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.order.list', 
    [
     	'xShowroom.i18n', 'xShowroom.directives', 'mgcrea.ngStrap'
    ]
)
.controller(
    'OrderListCtrl',
    [
        '$scope', '$modal', 'Order',
        function ($scope, $modal, Order) {
        	$scope.hasFilter = function(){
        		return $scope.filters && !($scope.filters.status !== '' || $scope.filters.query !== '');
        	}
        	
        	var init = function(){
        		Order.findAll().success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: '订单获取失败，请检查！', show: true});
     					return;
     				}
        			$scope.statuses = {};
        			
        			$scope.pageSize = 4;
        			
        			$scope.filters = {
        				status: '',
        				query: '',
        				limit: $scope.pageSize
        			};
        				
        			for(var i = 0, len = res.data.length; i < len; i++){
        				var status = res.data[i].status;
        				if (!$scope.statuses[status]){
        					$scope.statuses[status] = 0;
        				}
        				$scope.statuses[status] += 1;
        			}
        				
        			$scope.orders = res.data;
        		});
        	};
        	
        	init();
        }
    ]
);