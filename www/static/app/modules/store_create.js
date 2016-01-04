/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.store.create', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap', 'ui.uploader', 'ngTextcomplete'
    ]
)
.controller(
    'StoreCreateCtrl',
    [
     	'$scope', '$window', '$filter', 'Country', 'Store',
        function ($scope, $window, $filter, Country, Store) {
     		$scope.store = {
     			shopImage: []
         	};
     		$scope.setCollection = function(value){
				var collections = $scope.store.collectionType
					? $scope.store.collectionType.split(',')
				    : [];
				var index = collections.indexOf(value);
				if(index >= 0){
					collections.splice(index, 1);
				}else{
					collections.push(value);
				}
				$scope.store.collectionType = collections.join(',');
			};
			$scope.countries = Country.getAll();
			
			$scope.checkInfo = {
				validation: {
				   	'shopName': false,
				   	'shopType': false,
				   	'collectionType': false, 
				   	'brandList': false,
				   	'shopWebsite': false,
				  	'shopAddress': false,
				   	'shopCountry': false,
				   	'shopZipcode': false,
				   	'shopTel': false
//					'shopImage': false,
//					'shopAbout': false
				},
				reg:{
					'shopWebsite': /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-@?^=%&amp;/~\+#])?/,
				}
			};
			$scope.addStoreImage = function(url){
     			$scope.store.shopImage.push(url);
     			$scope.$apply();
     		};
			
			$scope.create = function() {
				$scope.errorMsgs = [];
					
   				for(var key in $scope.checkInfo.validation){
     				var value = $scope.store[key];
     				if (key == 'shopWebsite' && !value){
     					$scope.checkInfo.validation[key] = false;
     					continue;
     				}
     				if (!value || value == '' || angular.equals(value, {})) {
     					$scope.errorMsgs.push([key, 'EMPTY_ERROR']);
     					$scope.checkInfo.validation[key] = true;
     					continue;
     				}
     				if($scope.checkInfo.reg[key] && !$scope.checkInfo.reg[key].test(value)){
     					$scope.errorMsgs.push([key, 'PATTERN_ERROR']);
     					$scope.checkInfo.validation[key] = true;
     					continue;
     				}
     				$scope.checkInfo.validation[key] = false;
   				}
     			if (!$scope.errorMsgs.length){
     				Store.create(
     	     			$scope.store
     	     		).success(function(res){
     	     			if (res.status){
     	     				$modal({title: 'Error Info', content: res.msg, show: true});
     	     			}else{
     	     				$window.open('/buyer/store', '_self');
     	     			}
     	     		});
     			} 
			};
        }
    ]
);
