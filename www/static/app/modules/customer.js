/**
 * @file module of customer page
 * @author tangxiaotao
 * @description Definition of login page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.customer',
    [
     	'xShowroom.i18n', 'xShowroom.directives',
    ]
)
.controller(
    'CustomerCtrl',
    [
        '$scope',
        function ($scope) {
            $scope.setOpenPosition = function(index){
                $scope.selectedPosition = $scope.selectedPosition == index ? null : index;
            }
        }
    ]
);