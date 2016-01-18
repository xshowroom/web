/**
 * @file controller of admin module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.admin',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'AdminUserMgrCtrl',
    [
        '$scope', '$filter', '$modal', 'Admin',
        function ($scope, $filter, $modal, Admin) {
            $scope.clickUser = function (uid, sid, bid) {
                $scope.userId = uid;
                $scope.storeId = sid;
                $scope.brandId = bid;
            };
            $scope.adminAllowUser = function () {
                Admin.allowUser({
                    userId: $scope.userId
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    window.location.reload();
                });
            };
            $scope.adminRejectUser = function () {
                Admin.rejectUser({
                    userId: $scope.userId
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
