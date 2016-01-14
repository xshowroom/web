/**
 * @file root module of message page
 * @author xiaotaot
 * @description Definition of message page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.user.message',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'UserMessageCtrl',
    [
        '$scope', '$modal', '$filter', 'Message',
        function ($scope, $modal, $filter, Message) {
            $scope.clickMessage=function(msgId){
                messageId = msgId;
            };

            $scope.deleteMessage=function(){
                Message.destroy({
                    id: messageId,
                    rnd: new Date().getTime()
                }).success(function(res){
                	if (typeof(res) != 'object' || res.status) {
	    				$modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
	    				return;
                	}
                    window.location.reload();
                });
            }
        }
    ]
);