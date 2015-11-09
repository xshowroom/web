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
}])
.directive('filterCondition', [function () {
    return {
        template: function ($element, $attr, $scope) {
            var html = [
				'<div class="col-xs-12">',
					'<div class="filter-header">',
						'<span class="filter-name">{{title|uppercase}}</span>',
						'<span class="filter-clear-all" ng-click="clearAll()" ng-if="hasClearAll && selectedConditions.length">CLEAR ALL</span>',
					'</div>',
				'</div>',
				'<ul class="col-xs-12 filter-list filter-{{type}}-list">',
					'<li ng-repeat="item in conditions | limitTo: limit" ng-click="toggle(item)" ng-class="{\'active\': isActive(item)}">',
						'<span class="filter-selector glyphicon" ng-class="{\'glyphicon-ok\': isActive(item)}"></span>',
						'<span>{{item.label|uppercase}}</span>',
					'</li>',
				'</ul>',
				'<span class="col-xs-12 filter-more" ng-click="showMore()" ng-if="limit < conditions.length">More</span>',
            ].join('');
            return html;
        },
        scope: {
        	title: '@',
        	conditions: '=',
        	type: '@',
        	selected: '&',
        	hasClearAll: '@'
        },
        transclude: true,
        restrict: 'C',
        replace: false,
        link: function ($scope, $element, $attrs, $transclude) {
        	$scope.selectedConditions = [];
        	$scope.toggle = function (item) {
        		if ($scope.type == 'checkbox') {
        			var index = $scope.selectedConditions.indexOf(item);
        			if (index == -1){
        				$scope.selectedConditions.push(item);
        			}else{
        				$scope.selectedConditions.splice(index, 1);
        			}
        		} else if ($scope.type == 'radio') {
            		$scope.selectedConditions[0] = item;
            	}
                $scope.selected({
                	name: $scope.title,
                	conditions: $scope.selectedConditions
                });
            };
            $scope.clearAll = function(){
            	$scope.selectedConditions = [];
            	$scope.selected({
                 	name: $scope.title,
                  	conditions: $scope.selectedConditions
                });
            };
            $scope.limit = 4;
            $scope.isActive = function(item){
            	return $scope.selectedConditions.indexOf(item) >= 0;
            }
            $scope.showMore = function(){
            	$scope.limit += 4;
            }
        }
    };
}])
.directive('imagePreview', [function () {
    return {
    	template: '<div ng-transclude></div>',
        scope: {
        	target: '@',
        },
        transclude: true,
        restrict: 'C',
        replace: false,
        link: function ($scope, $element, $attrs, $transclude) {
        	var input = $element.find("input[type='file']"); 
        	var target = $scope.target ? $element.find('#' + target) : $element;
			 
			var readFile = function (){ 
			    var file = this.files[0]; 
			    if(!/image\/\w+/.test(file.type)){ 
			        alert("文件必须为图片！"); 
			        return false; 
			    } 
			    var reader = new FileReader(); 
			    reader.readAsDataURL(file); 
			    reader.onload = function(e){ 
			    	var image = target.find(".uploaded-image");
			    	if (image.length){
			    		image.attr('src', this.result);
			    	}else{
			    		target.append('<img class="uploaded-image" src="'+this.result+'" style="width:100%;height: 100%; position: absolute; left:0;top:0;z-index: -1;"/>')
			    	}
			    } 
			};
			
			if(typeof FileReader==='undefined'){ 
			    alert("抱歉，你的浏览器不支持 FileReader，图片无法预览!"); 
			}else{ 
				input.on('change', readFile)
			} 
        }
    };
}]);