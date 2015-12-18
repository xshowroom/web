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
        	var statuses = Order.getStatuses(); 
        }
    ]
);