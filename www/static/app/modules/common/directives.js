document.write("<script type='text/javascript' src='/static/bower_components/angular-ui-uploader/dist/uploader.min.js'></script>");

angular.module(
    'xShowroom.directives', 
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.services', 'ui.uploader'
    ]
)
.config(
	[
	    '$cookiesProvider',
	    function($cookiesProvider){
	    	var effectiveRange = 7 * 24 * 60 * 60 * 1000;
	    	var expiresDate = new Date(new Date().getTime() + effectiveRange);
	    	$cookiesProvider.defaults.expires = expiresDate;
	    	$cookiesProvider.defaults.path = '/';
	    }
	]
)
.directive('localeSettings', ['$cookies', function ($cookies) {
    return {
        template: function ($element, $attr, $scope) {
            var html = [
				'<div class="dropdown">',
					'<a id="locale-setting-language" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
					 	'{{ language }}',
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
        	};
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
//.directive('userInfoNav', ['User', function (User) {
//    return {
//        template: function ($element, $attr, $scope) {
//            var html = [
//                '<div class="user-not-logined" ng-if="!userInfo">',
//					'<span>{{ "directives_js__WELCOME"| translate }} GUEST</span>',
//					'<a href="login" target="_self">{{ "directives_js__LOGIN"| translate }}</a>',
//					'<span> | </span>',
//					'<a href="guide">{{ "directives_js__REGISTER"| translate }}</a>',
//				'</div>',
//				'<div class="user-logined" ng-if="userInfo">',
//					'<span>{{ "directives_js__WELCOME"| translate }}, </span>',
//					'<a href="#">{{userInfo.displayName}}</a>',
//					'<span> | </span>',
//					'<a href="/user/logout" target="_self">{{ "directives_js__LOGOUT"| translate }}</a>',
//				'</div>'
//            ].join('');
//            return html;
//        },
//        transclude: true,
//        restrict: 'C',
//        replace: false,
//        controller: function ($scope) {
//        	
//        	User.getUserInfo().success(function(res){
//     			if (res.status != 0){
//     				$scope.userInfo = undefined;
//     				return;
//     			}
//     			$scope.userInfo = res.data;
//     		});
//        }
//    };
//}])
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
						'<span>{{item | translate}}</span>',
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
.directive('imageUploader', ['uiUploader', '$location', '$timeout', function (uiUploader, $location, $timeout) {
    return {
    	template: [
    	    '<div>',
		    	'<img ng-src="/{{imageOnlineUrl}}" class="uploaded-image">',
    	        '<label for="{{imageId}}">',
    	        	'<span>{{"directives_js__UPLOAD" | translate}}</span>',
    	        	'<span ng-if="title">{{title}}</span>',
    	        	'<span>({{"directives_js__FILE_SIZE" | translate}})</span>',
    	        	'<input id="{{imageId}}" type="file">',
    	        '</label>',
    	    '</div>',
    	].join(''),
        transclude: false,
        restrict: 'C',
        replace: true,
        scope: {
        	title: '@',
        	targetModel: '=',
        	renderImage: '@',
        	afterUploading: '&',
        	imageOnlineUrl: '='
        },
        controller: function ($scope, $element, $attrs, $transclude) {
        	$scope.imageId = [
        	    new Date().getTime(),
        	    Math.round(Math.random() *1000)
        	].join('');
        	
        	var siteRootUrl = $location.protocol() + '://' + $location.host() + ":" + 	$location.port() + '/';
        	
        	$scope.timeout = null;
        	var uploadFile = function(files){
				uiUploader.removeAll();
				uiUploader.addFiles(files);
                uiUploader.startUpload({
                    url: '/api/upload/image',
                    onCompleted: function(file, response) {
                    	if (!$scope.timeout){
                    		alert('上传图片超时，请重新上传！');
                    		$scope.$emit('uploading.end');
                    		return;
                    	}
                    	response = JSON.parse(response);
                    	if(response.status != 0){
                    		alert('上传图片接口出错，请重新上传，如多次失败请联系我们！');
                    		$scope.$emit('uploading.end');
                    		return;
                    	}
                    	if (parseInt($attrs.renderImage) !== 0){
                    		$scope.imageOnlineUrl = response.data;
                    	}
                    	if ($attrs.targetModel){
                    		$scope.targetModel = response.data;
                    		$scope.$apply();
                    	}
                    	$scope.afterUploading({url: response.data});
                    	$scope.$emit('uploading.end');
                    	$timeout.cancel($scope.timeout);
                    	$scope.timeout = null;
                    }
                });
			};
			
        	$($element).on('change', '#'+$scope.imageId, function(e){
        		$scope.$emit('uploading.start');
        		var self = $(this);
				var files = e.target.files;
				if (!files.length){
					return;
				}
				if(!/image\/\w+/.test(files[0].type)){
					alert('上传文件类型必须为图片！');
					self.val('');
				    return; 
				}
				if(files[0].size / 1024 / 1024 > 5){
					alert('上传文件大于5MB！');
					self.val('');
				    return; 
				}
				$scope.timeout = $timeout(function(){
					$scope.timeout = null;
	    		}, 30000, true);
				$scope.$apply();
				uploadFile(files);
				self.val('');
			});

        }
    };
}])
.directive('uploading', ['$filter', function ($filter) {
    return {
        transclude: false,
        restrict: 'C',
        replace: false,
        link: function ($scope, $element, $attrs, $transclude) {
        	$scope.$on("uploading.start", function(){
            	var template = [
            	    '<div class="uploading-mask">',
            	      	'<div class="uploading-content">',
            	       		'<span class="glyphicon glyphicon-arrow-up"></span>',
            	      	    '<span>' + $filter('translate')("directives_js__UPLOADING") + '</span>',
//            	       	    '<span class="glyphicon glyphicon-arrow-up"></span>',
            	       '</div>',
            	    '</div>'
            	].join('');
            	$element.append(template);
        	});
        	$scope.$on("uploading.end", function(){
        		$element.find(".uploading-mask").remove();
        	})
        }
    };
}])
.directive('imageLink', [function () {
    return {
        transclude: false,
        restrict: 'C',
        replace: false,
        link: function ($scope, $element, $attrs, $transclude) {
        	$element.on("mouseenter", function(){
        		var imageUrl = $(this).children("img").attr("src");
        		var template = [
        	    	'<div class="image-link-mask" style="background-image: url(' + imageUrl +');">',
        	        	'<div>',
        	            	'<a class="btn btn-type-1" href=' + $attrs.href + '><i class="fa fa-search"></i></a>',
        	            '</div>',
        	        '</div>'
        	    ].join('');
        		$element.append(template);
        	});
        	$element.on("mouseleave", function(){
        		$element.find(".image-link-mask").remove();
        	});
        }
    };
}]);