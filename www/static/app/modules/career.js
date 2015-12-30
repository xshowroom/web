/**
 * @file module of login page
 * @author shiliang
 * @description Definition of login page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.career', 
    [
     	'xShowroom.i18n', 'xShowroom.directives',
    ]
)
.controller(
    'CareerCtrl',
    [
        '$scope',
        function ($scope) {
        	$scope.positions = new Array(5);
        	
        	$scope.setOpenPosition = function(index){
        		$scope.selectedPosition = index;
        	}
        }
    ]
);