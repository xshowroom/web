angular.module(
    'xShowroom.admin',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'AdminStoreMgrCtrl',
    [
        '$scope', '$filter', 'Admin',
        function ($scope, $filter, Admin){
            $scope.clickStore=function(mid) {
                mapId = mid;
            };
            $scope.adminAllowStore=function() {
                Admin.allowStore({
                    mapId: mapId
                }).success(function(res){
                    if (typeof(res) != 'object' || res.status) {
                        $modal({title: 'Error Info', content: res.msg, show: true});
                        return;
                    }
                    window.location.reload();
                });
            };
            $scope.adminRejectStore=function() {
                Admin.rejectStore({
                    mapId: mapId
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