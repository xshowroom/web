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
        '$scope', '$location',
        function ($scope, $location, User) {
        	var path = $location.path();
        	$scope.solution = path == '/retailer' ? 'retailer' : 'brand';
        }
    ]
);