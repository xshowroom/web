/**
 * @file controller of product module
 * @author shiliang - shiliang87@gmail.com
 *
 */
angular.module(
    'xShowroom.product.create',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services',
        'mgcrea.ngStrap', 'ui.uploader', 'ngTextcomplete'
    ]
)
.controller(
    'ProductCreateCtrl',
    [
        '$scope', '$location', '$window', '$filter', '$modal',
        '$element', '$timeout', 'Country', 'Product', 'uiUploader',
        function (
            $scope, $location, $window, $filter, $modal,
            $element, $timeout, Country, Product, uiUploader
        ) {
            $scope.countries = Country.getAll();
            $scope.categories = Product.getCategoriesByCollection($scope.collectionCategory);
            $scope.sizeRegions = Product.getSizeRegions();

            $scope.product = {
                collectionId: $scope.collectionId,
                images: []
            };

            $scope.addProductImage = function (url) {
                $scope.product.images.push(url);
                $scope.$apply();
            };

            $scope.setSizeCodes = function (category, region) {
                if (!category || !region) {
                    return;
                }
                $scope.sizeCode = Product.getSizeCodes(category, region);
                $scope.product.sizeCode = {};
            };

            $scope.openColorModal = function () {
                angular.element('#color-modal').modal('show');
            };

            $scope.currentColors = {
                standard: {},
                customized: []
            };

            $scope.standardColors = {
                'white': '#fff',
                'off white': '#f4f1ea',
                'beige': '#f5f5dc',
                'grey': '#939393',
                'black': '#000',
                'red': '#fe0000',
                'yellow': '#f6e911',
                'blue': '#000fff',
                'green': '#31c857',
                'purple': '#7d26cd',
                'navy': '#191970',
                'earth': '#D2B48C',
                'pink': '#ffb5c5',
                'brown': '#5E2612',
                'neutrals': '#eecbad',
                'yellow gold': '#dfc32d',
                'rose gold': '#e7c6ba',
                'silver': '#b6b1b1',
                'bronze': '#a98633',
                'orange': '#f29c00'
            };

            $element.on('change', '#color-file', function (e) {
                $scope.$emit('uploading.start');
                var self = $(this);
                var files = e.target.files;
                if (!files.length) {
                    $scope.$emit('uploading.end');
                    return;
                }
                var error = {
                    index: -1
                };
                $scope.colorErrorMsg = [];
                var timeout = $timeout(function () {
                    timeout = null;
                }, 30000, true);

                if (!/image\/\w+/.test(files[0].type)) {
                    error.msg = 'format_error';
                    $scope.colorErrorMsg.push(error);
                    $scope.$apply();
                    self.val('');
                    $scope.$emit('uploading.end');
                    return;
                }
                if (files[0].size / 1024 / 1024 > 1) {
                    error.msg = 'size_error';
                    $scope.colorErrorMsg.push(error);
                    $scope.$apply();
                    self.val('');
                    $scope.$emit('uploading.end');
                    return;
                }
                uiUploader.removeAll();
                uiUploader.addFiles(files);
                uiUploader.startUpload({
                    url: '/api/upload/image',
                    onCompleted: function (file, response) {
                        if (!timeout) {
                            error.msg = 'timeout_error';
                            $scope.colorErrorMsg.push(error);
                            $scope.$apply();
                            $scope.$emit('uploading.end');
                            return;
                        }
                        response = JSON.parse(response);
                        if (response.status !== 0) {
                            error.msg = 'response_error';
                            $scope.colorErrorMsg.push(error);
                            $scope.$apply();
                            $scope.$emit('uploading.end');
                            return;
                        }
                        $scope.currentColors.customized.push({
                            name: undefined,
                            value: response.data,
                            type: 'url',
                            style: 'background-image: url(/' + response.data + ');',
                            selected: true
                        });
                        $scope.$apply();
                        $scope.$emit('uploading.end');
                        $timeout.cancel(timeout);
                        timeout = null;
                    }
                });
                self.val('');
            });

            $scope.removeCustomizedColor = function (index) {
                $scope.currentColors.customized.splice(index, 1);
                for (var i = 0, len = $scope.colorErrorMsg.length; i < len; i++) {
                    if ($scope.colorErrorMsg[i].index === index) {
                        $scope.colorErrorMsg.splice(i--, 1);
                    }
                }
            };

            $scope.setColor = function () {
                var colors = [];
                $scope.colorErrorMsg = [];
                for (var name in $scope.currentColors.standard) {
                    if ($scope.currentColors.standard[name]) {
                        colors.push({
                            name: name,
                            value: $scope.currentColors.standard[name],
                            type: 0
                        });
                    }
                }
                for (var i = 0, len = $scope.currentColors.customized.length; i < len; i++) {
                    var record = $scope.currentColors.customized[i];
                    if (record.selected && record.name) {
                        colors.push({
                            name: record.name,
                            value: record.value,
                            type: 1
                        });
                    }
                    else {
                        $scope.colorErrorMsg.push({
                            index: i,
                            msg: 'unnamed_error'
                        });
                    }
                }
                if (!$scope.colorErrorMsg.length) {
                    $scope.product.color = colors;
                    angular.element('#color-modal').modal('hide');
                }
            };

            $scope.checkInfo = {
                validation: {
                    name: false,
                    category: false,
                    styleNum: false,
                    wholePrice: false,
                    retailPrice: false,
                    sizeRegion: false,
                    sizeCode: false,
                    color: false,
                    madeIn: false,
                    material: false,
                    careIns: false,
                    images: false
                },
                reg: {
                    wholePrice: /^(0|[1-9][0-9]*)(\.?\d{0,2})?$/,
                    retailPrice: /^(0|[1-9][0-9]*)(\.?\d{0,2})?$/
                }
            };

            $scope.create = function () {
                $scope.errorMsgs = [];

                for (var key in $scope.checkInfo.validation) {
                    if (!key) {
                        continue;
                    }
                    var value = $scope.product[key];
                    if (!value || value === '' || angular.equals(value, {})) {
                        $scope.errorMsgs.push([key, 'EMPTY_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
                    if ($scope.checkInfo.reg[key] && !$scope.checkInfo.reg[key].test(value)) {
                        $scope.errorMsgs.push([key, 'PATTERN_ERROR']);
                        $scope.checkInfo.validation[key] = true;
                        continue;
                    }
                    $scope.checkInfo.validation[key] = false;
                }
                if (!$scope.errorMsgs.length) {
                    Product.create(
                        $scope.product
                    ).success(function (res) {
                        if (typeof res !== 'object' || res.status) {
                            $modal({title: $filter('translate')('modal__title__ERROR'), content: res.msg, show: true});
                        }
                        else {
                            $window.open('/collection/' + $scope.collectionId, '_self');
                        }
                    });
                }
            };
        }
    ]
);
