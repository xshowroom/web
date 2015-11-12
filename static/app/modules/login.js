/**
 * @file module of login page
 * @author shiliang
 * @description Definition of login page module and all controllers in it.
 * 
 */

var app = angular.module(
    'xShowroom.login', 
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 
    ]
)
.controller(
    'LoginCtrl',
    [
     	'$scope', '$cookies', 'User',
        function ($scope, User) {
     		
        	$scope.refreshValidCode = function(){
        		$scope.validCodeUrl = '/web/image?rnd=' + new Date().getTime(); 
        	};
        	$scope.refreshValidCode();
        	
        	$scope.login = function(){
        		var login = User.login($scope.user);
        		login.success(function(res){
           			if(res.status != 0){
           				console.log(321)
           				$scope.refreshValidCode();
           				alert(res.msg);
           				return;
           			}
           			window.open('./home.html', '_self');
        		});
        	};
        	
        	$scope.toggleRememberMe = function(){
        		$cookies
        	}
        }
    ]
);