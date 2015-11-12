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
        function ($scope, $cookies, User) {
     		
     		$scope.rememberMe = eval($cookies.get('rememberMe'));
     		$scope.user = {
     			email: $scope.rememberMe ? $cookies.get('email') : ''
     		};
     		   
     		
        	$scope.refreshValidCode = function(){
        		$scope.validCodeUrl = '/web/image?rnd=' + new Date().getTime(); 
        	};
        	$scope.refreshValidCode();
        	
        	$scope.login = function(){
        		var login = User.login($scope.user);
        		login.success(function(res){
           			if(res.status != 0){
           				$scope.refreshValidCode();
           				alert(res.msg);
           				return;
           			}
           			$cookies.put('rememberMe', $scope.rememberMe);
           			if ($scope.rememberMe) {
           				$cookies.put('email', $scope.user.email);
           			}
           			window.open('./home.html', '_self');
        		});
        	};
        }
    ]
);