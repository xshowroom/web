/**
 * @file root module of message page
 * @author xiaotaot
 * @description Definition of message page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.user.message',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'UserMessageCtrl',
    [
        '$scope',
        function ($scope){
            $scope.clickMessage=function(){
                window.message_id = $(this).find('#msg_id').val();
            };

            $scope.deleteMessage=function(){
                $.ajax({
                    url : "/ajax/message/delete",
                    async: false,
                    dataType:"json",
                    data:{"id": window.message_id,"rnd": new Date().getTime()}
                });

                window.location.reload();
            }
        }
    ]
);