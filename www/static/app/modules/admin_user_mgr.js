angular.module(
    'xShowroom.admin',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'AdminUserMgrCtrl',
    [
        '$scope',
        function ($scope) {
            $scope.clickUser=function() {
                userId = angular.element('#user_id').val();
            };
            $scope.adminAllowUser=function() {
                alert(userId);
            };
            $scope.adminRejectUser=function() {
                alert(userId);
            };
        }
    ]
);