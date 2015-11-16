/**
 * @file module of login page
 * @author shiliang
 * @description Definition of login page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.login', 
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 
    ]
)
.controller(
    'LoginCtrl',
    [
     	'$scope', '$cookies', 'User', '$filter',
        function ($scope, $cookies, User, $filter) {
     		
     		$scope.rememberMe = eval($cookies.get('rememberMe'));
     		$scope.user = {
     			email: $scope.rememberMe ? $cookies.get('email') : ''
     		};
     		   
     		
        	$scope.refreshValidCode = function(){
        		$scope.validCodeUrl = 'api/image?rnd=' + new Date().getTime();
        	};
        	$scope.refreshValidCode();
        	
        	$scope.loginError = {
        		hasError: false,
        		errorMsg: ''
        	};
        	
        	$scope.login = function(){
        		var login = User.login($scope.user);
        		
        		var emailReg = /^([a-zA-Z0-9])+([a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9_-])+/;
        		if (!emailReg.test($scope.user.email)){
        			$scope.loginError = {
                		hasError: true,
               		    errorMsg: $filter('translate')('login__EMAIL_PATTERN_ERROR')
               		};
        			return;
        		}
        		
        		login.success(function(res){
           			if(res.status != 0){
           				$scope.refreshValidCode();
           				$scope.loginError = {
           		        	hasError: true,
           		        	errorMsg: res.msg
           		        };
           				return;
           			}
           			$cookies.put('rememberMe', $scope.rememberMe);
           			if ($scope.rememberMe) {
           				$cookies.put('email', $scope.user.email);
           			}
           			window.open('dashboard', '_self');
        		});
        	};
        }
    ]
);