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
        '$scope', '$modal'
        function ($scope){
            $scope.clickMessage=function(){
                messageId = angular.element('#msg_id').val();
            };

            $scope.deleteMessage=function(){
                Message.destroy({
                    id: messageId,
                    rnd: new Date().getTime()
                }).success(function(res){
                	if (typeof(res) != 'object' || res.status) {
	    				$modal({title: 'Error Info', content: res.msg, show: true});
	    				return;
                	}
                    window.location.reload();
                });
            }
        }
    ]
);