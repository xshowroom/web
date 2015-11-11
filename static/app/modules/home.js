/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

var app = angular.module(
    'xShowroom.home', 
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'HomeCtrl',
    [
     	'$scope', 'User',
        function ($scope, User) {
     		$scope.user = {};
     		var init = function(){
     			User.getUserInfo().success(function(res){
     				if (res.status != 0){
     					$scope.user.identity = res.msg;
     				}
     			})
     		};
     		init();
        }
    ]
);