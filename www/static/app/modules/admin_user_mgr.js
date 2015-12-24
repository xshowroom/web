angular.module(
    'xShowroom.admin',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'AdminUserMgrCtrl',
    [
        '$scope', 'Admin',
        function ($scope, Admin) {
            $scope.clickUser=function(uid) {
                userId = uid;
            };
            $scope.adminAllowUser=function() {
                Admin.allowUser({
                    userId: userId
                }).success(function(res){
                    if (typeof(res) != 'object' || res.status) {
                        $modal({title: 'Error Info', content: res.msg, show: true});
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
                        $modal({title: 'Error Info', content: res.msg, show: true});
                        return;
                    }
                    window.location.reload();
                });
            };
        }
    ]
);