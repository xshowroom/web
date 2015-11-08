var app = angular.module(
    'xShowroom.directives', 
    [
        'ngCookies', 'xShowroom.i18n'
    ]
)
.config(
	[
	    '$cookiesProvider',
	    function($cookiesProvider){
	    	var effectiveRange = 7 * 24 * 60 * 60 * 1000;
	    	var expiresDate = new Date(new Date().getTime() + effectiveRange);
	    	$cookiesProvider.defaults.expires = expiresDate;
	    }
	]
)
.directive('localeSettings', ['$cookies', function ($cookies) {
    return {
        template: function ($element, $attr, $scope) {
            var html = [
				'<div class="dropdown">',
					'<a id="locale-setting-language" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
					 	'{{ "LANGUAGE"| translate }}:{{ language | uppercase }}',
					 	'<span class="caret"></span>',
					'</a>',
					'<ul class="dropdown-menu" aria-labelledby="locale-setting-language">',
						'<li ng-click="setLanguage(\'en\')">English</li>',
						'<li ng-click="setLanguage(\'zh-CN\')">简体中文</li>',
					'</ul>',
				'</div>',
				'<div class="dropdown">',
					'<a id="locale-setting-currency" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
					 	'{{ "CURRENCY"| translate }}:{{ currency }}',
					 	'<span class="caret"></span>',
					'</a>',
					'<ul class="dropdown-menu" aria-labelledby="locale-setting-currency">',
						'<li ng-click="setCurrency(\'USD\')">USD</li>',
						'<li ng-click="setCurrency(\'CNY\')">CNY</li>',
						'<li ng-click="setCurrency(\'EUR\')">EUR</li>',
					'</ul>',
				'</div>'
            ].join('');
            return html;
        },
        transclude: true,
        restrict: 'C',
        replace: false,
        link: function ($scope, $element, $attrs, $transclude) {
        	$scope.language = $cookies.get('language');
        	if (!$scope.language) {
        		$cookies.put('language', 'en');
        		$scope.language = 'en';
        	}
        	$scope.currency = $cookies.get('currency');
        	if (!$scope.currency) {
        		$cookies.put('currency', 'USD');
        		$scope.language = 'USD';
        	}
        	
        	$element.find('.dropdown-toggle').dropdown();
        	
        	$scope.setLanguage = function(language){
        		$cookies.put('language', language);
        		window.location.reload();
        	};
        	
        	$scope.setCurrency = function(currency){
        		$cookies.put('currency', currency);
        		window.location.reload();
        	};
        }
    };
}])
.directive('userLoginNav', [function () {
    return {
        template: function ($element, $attr, $scope) {
            var html = [
                '<div class="user-not-logined" ng-if="!userinfo">',
					'<span>WELCOME GUEST!</span>',
					'<a href="./login.html" target="_self">LOGIN</a>',
					'<span>OR</span>',
					'<a>REGISTER</a>',
				'</div>',
				'<div class="user-logined" ng-if="userinfo">',
					'<span>WELCOME 用户1!</span>',
				'</div>'
            ].join('');
            return html;
        },
        transclude: true,
        restrict: 'C',
        replace: false,
        link: function ($scope, $element, $attrs, $transclude) {
        	
        }
    };
}]);