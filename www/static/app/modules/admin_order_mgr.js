angular.module(
    'xShowroom.admin',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'AdminOrderMgrCtrl',
    [
        '$scope','AdminOrderMgr',
        function ($scope, AdminOrderMgr){

        }
    ]
);