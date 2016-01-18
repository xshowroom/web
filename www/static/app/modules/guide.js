/**
 * @file guide page controller
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.guide',
    [
        'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'GuideCtrl',
    [
        '$scope', '$location',
        function ($scope, $location, User) {
            var path = $location.path();
            $scope.solution = path === '/retailer' ? 'retailer' : 'brand';

            $scope.$on('$locationChangeSuccess', function () {
                $scope.solution = $location.path() === '/retailer' ? 'retailer' : 'brand';
            });
        }
    ]
);
