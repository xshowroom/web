/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.collection.create', 
    [
        'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'CollectionCreateCtrl',
    [
     	'$scope',
        function ($scope) {
     		$scope.collection = {
     			coverImage: ""
     		};
     		
     		$scope.create = function(){
     			console.log($scope.collection);
     		}
        }
    ]
);