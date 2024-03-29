/**
 * @file login page controller
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.login',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'LoginCtrl',
    [
        '$scope', '$cookies', 'User', '$filter',
        function ($scope, $cookies, User, $filter) {
            $scope.rememberMe = !!Number($cookies.get('rememberMe'));
            $scope.user = {
                email: $scope.rememberMe ? $cookies.get('email') : ''
            };

            $scope.refreshValidCode = function () {
                $scope.validCodeUrl = '/api/image?rnd=' + new Date().getTime();
            };
            $scope.refreshValidCode();

            $scope.loginError = {
                hasError: false,
                errorMsg: ''
            };

            $scope.login = function () {
                var login = User.login($scope.user);

                var emailReg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if (!emailReg.test($scope.user.email)) {
                    $scope.loginError = {
                        hasError: true,
                        errorMsg: $filter('translate')('login__EMAIL_PATTERN_ERROR')
                    };
                    return;
                }

                login.success(function (res) {
                    if (typeof res !== 'object' || res.status) {
                        $scope.refreshValidCode();
                        $scope.loginError = {
                            hasError: true,
                            errorMsg: res.msg
                        };
                        return;
                    }
                    $cookies.put('rememberMe', $scope.rememberMe);
                    if ($scope.rememberMe) {
                        $cookies.put('email', $scope.user.email);
                    }

                    window.open('/user/login', '_self');
                });
            };
        }
    ]
);
