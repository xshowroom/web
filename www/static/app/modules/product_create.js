/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.product.create', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services',
        'ngAnimate', 'mgcrea.ngStrap', 'ui.uploader'
    ]
)
.controller(
    'ProductCreateCtrl',
    [
     	'$scope', '$location', '$element', 'Country', 'Product', 'uiUploader',
        function ($scope, $location, $element, Country, Product, uiUploader) {
     		$scope.countries = Country.getAll();
     		$scope.categories = Product.getCategories();
     		$scope.sizeRegions = Product.getSizeRegions();
     		$scope.materials = Product.getMaterials();
     		
     		var referrer = document.referrer;
     		var urlReg = /\/collection\/\w+$/;
     		if (!urlReg.test(referrer)){
     			window.open('/error', '_self');
     		}
     		var collectionId = referrer.match(urlReg)[0].split(/\//)[2];
     		$scope.product = {
         		collectionId: collectionId,
         		images: []
         	};
     		
     		$scope.addProductImage = function(url){
     			var siteRootUrl = $location.protocol() + '://' + $location.host() + ":" + 	$location.port() + '/';
     			$scope.product.images.push(siteRootUrl + url);
     			$scope.$apply();
     		};
     		$scope.removeProductImage = function(index){
     			$scope.product.images.splice(index, 1);
     			$scope.$apply();
     		};
     		$scope.setSizeCodes = function(category, region){
     			if (!category || !region){
     				return;
     			}
     			$scope.sizeCodes = Product.getSizeCodes(category, region);
     			$scope.product.sizeCodes = {};
     		};
     		$scope.openColorModal = function(){
     			angular.element('#color-modal').modal('show');
//     			$scope.currentColors = angular.copy($scope.product.color);
     		};
     		$scope.currentColors = {
         		standard: {},
         		customized: []
         	};
     		$scope.standardColors = {
     			'white': '#fff',
     			'off white': '#f4f1ea',
     			'beige': '#c5a485',
     			'grey': '#939393',
     			'black': '#000',
     			'red': '#fe0000',
     			'yellow': '#f6e911',
     			'blue': '#00ffff',
     			'green': '#31c857',
     			'purple': '#ff00fe'
     		};
     		
			
        	$element.on('change', '#color-file', function(e){
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
				if(files[0].size / 1024 / 1024 > 2){
					alert('上传文件大于2MB！');
					self.val('');
				    return; 
				}
				$scope.$emit('uploading.start');
				uiUploader.removeAll();
				uiUploader.addFiles(files);
                uiUploader.startUpload({
                    url: '/api/upload/image',
                    onCompleted: function(file, response) {
                    	response = JSON.parse(response);
                    	if(response.status != 0){
                    		alert('上传图片接口出错，请重新上传，如多次失败请联系我们！');
                    		return
                    	}
                    	$scope.currentColors.customized.push({
                    		name: undefined,
                    		value: response.data,
                    		type: 'url',
                    		style: 'background-image: url(/' + response.data + ');'
                    	});
                    	$scope.$apply();
                    	$scope.$emit('uploading.end');
                    }
                });
				self.val('');
			});
     		
     		$scope.checkName = function($event, index){
     			var record = $scope.currentColors.customized[index];
     			if (!record.selected){
     				return;
     			}else if(!record.name){
     				alert('请先填写该颜色名称！');
     				record.selected = false;
     				return;
     			}
     		};
     		
     		
     		
//     		$scope.checkInfo = {
//     			validation: {
// 				   	'name': false,
// 					'category': false,
// 					'mode': false,
// 					'season': false,
// 					'order': false,
// 					'currency': false,
// 					'deadline': false,
// 					'delivery': false,
// 					'description': false,
// 					'image': false
// 				},
// 				reg:{
// 					'order': /\d+/,
// 					'deadline': /\d{4}-\d{2}-\d{2}/,
// 					'delivery': /\d{4}-\d{2}-\d{2}/
// 				}
//     		};
     		$scope.create = function(){
     			console.log($scope.product);
//   				$scope.errorMsgs = [];
//     					
//   				for(var key in $scope.checkInfo.validation){
//     				var value = $scope.collection[key];
//     				console.log(value);
//     				if ((key == "deadline" || key == "delivery") && !value) {
//     					$scope.errorMsgs.push([key, 'DATE ERROR']);
//     					$scope.checkInfo.validation[key] = true;
//     					continue;
//     				}
//     				if (!value || value == '') {
//     					$scope.errorMsgs.push([key, 'EMPTY ERROR']);
//     					$scope.checkInfo.validation[key] = true;
//     					continue;
//     				}
//     				if($scope.checkInfo.reg[key] && !$scope.checkInfo.reg[key].test(value)){
//     					$scope.errorMsgs.push([key, 'PATTERN ERROR']);
//     					$scope.checkInfo.validation[key] = true;
//     					continue;
//     				}
//     				$scope.checkInfo.validation[key] = false;
//   				}
//   				
//     			if (!$scope.errorMsgs.length){
//     				Collection.create(
//     	     			$scope.collection
//     	     		).success(function(res){
//     	     			console.log(res);
//     	     		});
//     			} 
     		};
        }
    ]
);