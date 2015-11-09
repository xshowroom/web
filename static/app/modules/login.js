/**
 * @file module of login page
 * @author shiliang
 * @description Definition of login page module and all controllers in it.
 * 
 */

var app = angular.module(
    'xShowroom.login', 
    [
        'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'LoginCtrl',
    [
     	'$scope',
        function ($scope) {
        	$scope.refreshValidCode = function(){
        		$scope.validCodeUrl = '/web/image?rnd=' + new Date().getTime(); 
        	};
        	$scope.refreshValidCode();
        	
        	$scope.login = function(){
        		console.log($scope.username)
        	}
        }
    ]
);