/**
 * @file controller of admin module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.admin',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'AdminStoreMgrCtrl',
    [
        '$scope', '$filter', '$modal', 'Admin',
        function ($scope, $filter, $modal, Admin) {
            $scope.clickStore = function (mid) {
                $scope.mapId = mid;
            };
            $scope.adminAllowStore = function () {
                Admin.allowStore({
                    mapId: $scope.mapId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    window.location.reload();
                });
            };
            $scope.adminRejectStore = function () {
                Admin.rejectStore({
                    mapId: $scope.mapId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    window.location.reload();
                });
            };
        }
    ]
);
