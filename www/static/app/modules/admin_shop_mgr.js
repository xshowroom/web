angular.module(
    'xShowroom.admin',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'AdminShopMgrCtrl',
    [
        '$scope','AdminShopMgr',
        function ($scope, AdminShopMgr){

        }
    ]
);