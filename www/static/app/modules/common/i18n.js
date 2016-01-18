/**
 * @file i18n filter
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.i18n',
    [
        'xShowroom.dictionary'
    ]
)
.filter('translate', ['dictionary', function (dictionary) {
    return function (key) {
        return dictionary[key] || 'Error: label is not found';
    };
}]);
