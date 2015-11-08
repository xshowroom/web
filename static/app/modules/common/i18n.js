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
			LANGUAGE: '语言',
			CURRENCY: '货币'
		},
		'en': {
			LANGUAGE: 'LANGUAGE',
			CURRENCY: 'CURRENCY'
		}
	}
);