/**
 * @file i18n module
 * @author shiliang
 * @description In this file, we set the dictionary for i18n and provide the filter which 
 *              can be used in the view to translate the key into localized language.
 */

angular.module(
    'xShowroom.i18n', 
    [
        'xShowroom.dictionary'
    ]
)
.filter('translate', ['dictionary', function(dictionary){
	return function(key){
		return dictionary[key] || 'Error: label is not found';
	}
}]);
