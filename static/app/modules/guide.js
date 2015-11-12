/**
 * @file module of login page
 * @author shiliang
 * @description Definition of login page module and all controllers in it.
 * 
 */

var app = angular.module(
    'xShowroom.guide', 
    [
     	'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'GuideCtrl',
    [
        '$scope', '$location', 'User',
        function ($scope, $location, User) {
        	var path = $location.path();
        	$scope.solution = path == '/retailer' ? 'retailer' : 'brand';
        	
        	User.getUserInfo().success(function(res){
     			if (res.status != 0){
     				$scope.userInfo = undefined;
     				return;
     			}
     			$scope.userInfo = res.data;
     		});
        }
    ]
);