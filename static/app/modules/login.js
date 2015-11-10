/**
 * @file module of login page
 * @author shiliang
 * @description Definition of login page module and all controllers in it.
 * 
 */

var app = angular.module(
    'xShowroom.login', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 
    ]
)
.controller(
    'LoginCtrl',
    [
     	'$scope', 'User',
        function ($scope, User) {
     		
        	$scope.refreshValidCode = function(){
        		$scope.validCodeUrl = '/web/image?rnd=' + new Date().getTime(); 
        	};
        	$scope.refreshValidCode();
        	
        	$scope.login = function(){
        		var login = User.login($scope.user);
        		login.success(function(res){
        			console.log(res);
        			$scope.refreshValidCode();
        		});
        	}
        }
    ]
);