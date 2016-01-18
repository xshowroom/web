/**
 * @file controller of user module
 * @author shiliang - shiliang87@gmail.com
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
            $scope.clickMessage = function (msgId) {
                $scope.messageId = msgId;
            };

            $scope.deleteMessage = function () {
                Message.destroy({
                    id: $scope.messageId,
                    rnd: new Date().getTime()
                }).success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        return;
                    }
                    window.location.reload();
                });
            };
        }
    ]
);
