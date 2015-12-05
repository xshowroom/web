angular.module(
    'xShowroom.admin.user',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'AdminUserMgrCtrl',
    [
        '$scope','AdminUserMgr',
        function ($scope, AdminUserMgr){

        }
    ]
);