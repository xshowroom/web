/**
 * @file home page controller
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.home',
    [
        'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'HomeCtrl',
    [
        '$scope', '$element', '$timeout',
        function ($scope, $element, $timeout) {
            $scope.isCounterInited = false;

            $scope.counter = {
                buyer: 1181,
                brand: 219,
                product: 3571,
                order: 52291
            };
            $scope.tempCounter = {
                buyer: 0,
                brand: 0,
                product: 0,
                order: 0
            };
        }
    ]
);
