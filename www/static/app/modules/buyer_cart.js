/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.buyer.cart', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'mgcrea.ngStrap'
    ]
)
.controller(
    'BuyerCartCtrl',
    [
     	'$scope', '$modal', '$filter', 'Cart',
        function ($scope, $modal, $filter, Cart) {
     		Cart.findAll().success(function(res){
     			if (typeof(res) != 'object' || res.status) {
    				$modal({title: 'Error Info', content: '获取cart collection list失败，请检查！', show: true});
 					return;
 				}
     			$scope.collections = res.data;
     		});
        }
    ]
);