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
        'ngAnimate', 'mgcrea.ngStrap'
    ]
)
.controller(
    'ProductCreateCtrl',
    [
     	'$scope', '$location',  'Country', 'Product',
        function ($scope, $location, Country, Product) {
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