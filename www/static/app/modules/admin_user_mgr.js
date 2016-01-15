angular.module(
    'xShowroom.admin',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'AdminUserMgrCtrl',
    [
        '$scope', '$filter', 'Admin',
        function ($scope, $filter, Admin) {
            $scope.clickUser=function(uid, sid, bid) {
                userId = uid;
                storeId = sid;
                brandId = bid
            };
            $scope.adminAllowUser=function() {
                Admin.allowUser({
                    userId: userId
                }).success(function(res){
                    if (typeof(res) != 'object' || res.status) {
                        $modal({title:  $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    window.location.reload();
                });
            };
            $scope.adminRejectUser=function() {
                Admin.rejectUser({
                    userId: userId
                }).success(function(res){
                    if (typeof(res) != 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    window.location.reload();
                });
            };
        }
    ]
);