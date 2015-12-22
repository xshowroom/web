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
        			
        			var totalQuantity = 0;
        			
         			for(var id in res.data.productions) {
         				var info = res.data.productions[id];
         				var sizes = [];
         				var detail = {};
         				var quantity = 0;
         				for(var size in info.sizeCode) {
         					sizes.push(size);
         				};
         				for(var i = 0, len = info.detail.length; i < len; i++) {
         					if (!detail[info.detail[i]['color']]){
         						detail[info.detail[i]['color']] = {};
         					}
         					detail[info.detail[i]['color']][info.detail[i]['size_code']] = info.detail[i]['buy_num'];
         					quantity += parseInt(info.detail[i]['buy_num']);
         				};
         				res.data.productions[id].quantity = quantity;
         				res.data.productions[id].size = sizes;
         				res.data.productions[id].detail = detail;
         				totalQuantity += quantity;
         			}
         			res.data.quantity = totalQuantity;
        			$scope.order = res.data;
        			console.log($scope.order)
        		});
        	};
        	init();
        }
    ]
);