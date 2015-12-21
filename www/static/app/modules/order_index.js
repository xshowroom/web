/**
 * @file module of login page
 * @author shiliang
 * @description Definition of login page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.order.index', 
    [
     	'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'OrderIndexCtrl',
    [
        '$scope', '$modal', 'Order',
        function ($scope, $modal, Order) {
        	var init = function (){
        		Order.findOne({
        			orderId: $scope.orderId
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: '订单获取失败，请检查！', show: true});
     					return;
     				}
        			res.data.status = parseInt(res.data.status);
        			console.log(res.data)
        			$scope.order = res.data;
        		});
        	};
        	init();
        }
    ]
);