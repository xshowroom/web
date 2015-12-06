/**
 * @file root module of message page
 * @author xiaotaot
 * @description Definition of message page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.user.message',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'UserMessageCtrl',
    [
        '$scope','Message',
        function ($scope, Message){
            $scope.clickMessage=function(){
                messageId = angular.element('#msg_id').val();
            };

            $scope.deleteMessage=function(){
                Message.destroy({
                    id: messageId,
                    rnd: new Date().getTime()
                }).success(function(res){
                    window.location.reload();
                });
            }
        }
    ]
);