/**
 * @file controller of brand module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.brand.collection',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services',  'mgcrea.ngStrap'
    ]
)
.controller(
    'BrandCollectionCtrl',
    [
        '$scope', '$modal', '$filter', 'Collection',
        function ($scope, $modal, $filter, Collection) {
            $scope.filters = {
                limit: 4,
                status: ''
            };

            Collection.findAll({
                detail: 1
            }).success(function (res) {
                if (typeof res !== 'object' || res.status) {
                    $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                    return;
                }
                $scope.statusCounter = {};
                for (var i = 0, len = res.data.length; i < len; i++) {
                    var status = res.data[i].status;
                    if ($scope.statusCounter[status]) {
                        $scope.statusCounter[status] += 1;
                    }
                    else {
                        $scope.statusCounter[status] = 1;
                    }
                }
                var collections = res.data;
                for (var k = 0, clen = collections.length; k < clen; k++) {
                    for (var j = 0, pLen = collections[k].productions.length; j < pLen; j++) {
                        var urls = collections[k].productions[j].medium_image_url;
                        collections[k].productions[j].image_url = urls;
                    }
                }
                $scope.collections = collections;
            });
        }
    ]
);
