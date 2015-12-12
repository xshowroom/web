/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.home', 
    [
        'xShowroom.i18n', 'xShowroom.directives'/*, 'angular-scroll-complete'*/
    ]
)
.controller(
    'HomeCtrl',
    [
     	'$scope', '$element', '$timeout',
        function ($scope, $element, $timeout) {
     		$scope.isCounterInited = false;
     		
     		$scope.counter = {
     			buyer: 1181,
     			brand: 219,
     			product: 3571,
     			order: 52291
     		};
     		$scope.tempCounter = {
         		buyer: 0,
         		brand: 0,
         		product: 0,
         		order: 0
         	};
     		
        }
    ]
);