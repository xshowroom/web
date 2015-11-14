var app = angular.module(
    'xShowroom.directives', 
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.services'
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
					 	'{{ "directives_js__LANGUAGE"| translate }}:{{ language }}',
					 	'<span class="caret"></span>',
					'</a>',
					'<ul class="dropdown-menu" aria-labelledby="locale-setting-language">',
						'<li ng-click="setLanguage(\'en\')">English</li>',
						'<li ng-click="setLanguage(\'zh-CN\')">简体中文</li>',
					'</ul>',
//				'</div>',
//				'<div class="dropdown">',
//					'<a id="locale-setting-currency" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
//					 	'{{ "directives_js__CURRENCY"| translate }}:{{ currency }}',
//					 	'<span class="caret"></span>',
//					'</a>',
//					'<ul class="dropdown-menu" aria-labelledby="locale-setting-currency">',
//						'<li ng-click="setCurrency(\'USD\')">USD</li>',
//						'<li ng-click="setCurrency(\'CNY\')">CNY</li>',
//						'<li ng-click="setCurrency(\'EUR\')">EUR</li>',
//					'</ul>',
				'</div>'
            ].join('');
            return html;
        },
        transclude: true,
        restrict: 'C',
        replace: false,
        link: function ($scope, $element, $attrs, $transclude) {
        	var languageDict = {
        		'en': 'ENGLISH',
        		'zh-CN': '简体中文'
        	}
        	$scope.language = languageDict[$cookies.get('language')];
        	if (!$scope.language) {
        		$cookies.put('language', 'en');
        		$scope.language = languageDict['en'];
        	}
//        	$scope.currency = $cookies.get('currency');
//        	if (!$scope.currency) {
//        		$cookies.put('currency', 'USD');
//        		$scope.language = 'USD';
//        	}
        	
        	$element.find('.dropdown-toggle').dropdown();
        	
        	$scope.setLanguage = function(language){
        		$cookies.put('language', language);
        		window.location.reload();
        	};
//        	
//        	$scope.setCurrency = function(currency){
//        		$cookies.put('currency', currency);
//        		window.location.reload();
//        	};
        }
    };
}])
.directive('userInfoNav', ['User', function (User) {
    return {
        template: function ($element, $attr, $scope) {
            var html = [
                '<div class="user-not-logined" ng-if="!userInfo">',
					'<span>{{ "directives_js__WELCOME"| translate }}</span>',
					'<a href="./login.html" target="_self">{{ "directives_js__LOGIN"| translate }}</a>',
					'<span> | </span>',
					'<a href="./guide.html">{{ "directives_js__REGISTER"| translate }}</a>',
				'</div>',
				'<div class="user-logined" ng-if="userInfo">',
					'<span>{{ "directives_js__WELCOME"| translate }}, </span>',
					'<a href="#">{{userInfo.email}}</a>',
					'<span> | </span>',
					'<a href="#">{{ "directives_js__LOGOUT"| translate }}</a>',
				'</div>'
            ].join('');
            return html;
        },
        transclude: true,
        restrict: 'C',
        replace: false,
        controller: function ($scope) {
        	User.getUserInfo().success(function(res){
     			if (res.status != 0){
     				$scope.userInfo = undefined;
     				return;
     			}
     			$scope.userInfo = res.data;
     		});
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
}])
.directive('uploading', [function () {
    return {
    	template: [
    	    '<div ng-if="showUploading">',
    	    	'<div class="uploading-content">',
    	    		'<span class="glyphicon glyphicon-arrow-up"></span>',
	    		    '<span>{{"directives_js__UPLOADING" | translate}}</span>',
	    		    '<span class="glyphicon glyphicon-arrow-up"></span>',
    		    '</div>',
    		'</div>'
    	].join(''),
        scope: {
        	target: '@',
        },
        transclude: false,
        restrict: 'C',
        replace: true,
        link: function ($scope, $element, $attrs, $transclude) {
        	$scope.$on("uploading.start", function(){
        		$scope.showUploading = true;
        		$scope.$apply();
        	});
        	$scope.$on("uploading.end", function(){
        		$scope.showUploading = false;
        		$scope.$apply();
        	})
        }
    };
}]);