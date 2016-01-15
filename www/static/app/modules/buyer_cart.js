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
    				$modal({title: $filter('translate')('modal__title__ERROR'), content: $filter('translate')('modal__msg__error__SYSTEM_ERROR'), show: true});
 					return;
 				}
     			$scope.collections = res.data;
     		});
        }
    ]
);
