/**
 * @file customer page controller
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.customer',
    [
        'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'CustomerCtrl',
    [
        '$scope',
        function ($scope) {
            $scope.setOpenPosition = function (index) {
                $scope.selectedPosition = $scope.selectedPosition === index ? null : index;
            };
        }
    ]
);
