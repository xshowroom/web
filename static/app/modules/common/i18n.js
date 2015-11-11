/**
 * @file i18n module
 * @author shiliang
 * @description In this file, we set the dictionary for i18n and provide the filter which 
 *              can be used in the view to translate the key into localized language.
 */

angular.module(
    'xShowroom.i18n', 
    [
        'ngCookies'
    ]
)
.filter('translate', ['$cookies', 'global', function($cookies, global){
	var langInCookie = $cookies.get('language') || 'en';
	return function(key, language){
		var targetLanguage = language || langInCookie;
		targetLanguage = targetLanguage in global ? targetLanguage : 'en'
		return global[targetLanguage][key] || 'Error: label is not found';
	}
}])
.constant(
	'global',
	{
		'zh-CN': {
            // directives.js
            directives_js__LANGUAGE: '语言',
            directives_js__CURRENCY: '货币',
            directives_js__WELCOME: '欢迎',
            directives_js__LOGIN: '登录',
            directives_js__REGISTER: '注册',
            directives_js__UPLOADING: '上传图片中',
            // global-no-user-navigation.html
            global_no_user_navigation__HOME: '首页',
            global_no_user_navigation__GUIDE: '入圈',
            global_no_user_navigation__SHOP: '选货',
            global_no_user_navigation__DISCOVER: '入圈',
            global_no_user_navigation__PRESS: '探索',
            global_no_user_navigation__CONTACT: '联系',
		},
		'en': {
            // directives.js
            directives_js__LANGUAGE: 'LANGUAGE',
            directives_js__CURRENCY: 'CURRENCY',
            directives_js__WELCOME: 'WELCOME',
            directives_js__LOGIN: 'LOGIN',
            directives_js__REGISTER: 'REGISTER',
            directives_js__UPLOADING: 'UPLOADING IMAGE',
            // global-no-user-navigation.html
            global_no_user_navigation__HOME: 'HOME',
            global_no_user_navigation__GUIDE: 'GUIDE',
            global_no_user_navigation__SHOP: 'SHOP',
            global_no_user_navigation__DISCOVER: 'DISCOVER',
            global_no_user_navigation__PRESS: 'PRESS',
            global_no_user_navigation__CONTACT: 'CONTACT',
		}
	}
);