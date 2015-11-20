/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.collection.index', 
    [
        'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'CollectionIndexCtrl',
    [
     	'$scope',
        function ($scope) {
        }
    ]
);