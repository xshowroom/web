/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.collection.create', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services',
        'mgcrea.ngStrap', 'ngTextcomplete'
    ]
)
.controller(
    'CollectionCreateCtrl',
    [
     	'$scope', '$q', '$modal', '$filter', 'Collection',
        function ($scope, $q, $modal, $filter, Collection) {
     		$scope.collection = {};
     		$scope.checkInfo = {
     			validation: {
 				   	'name': false,
 					'category': false,
 					'mode': false,
 					'season': false,
 					'order': false,
 					'currency': false,
 					'deadline': false,
 					'delivery': false,
 					'description': false,
 					'image': false
 				},
 				reg:{
 					'order': /^\d+$/,
 					'deadline': /\d{4}-\d{2}-\d{2}/,
 					'delivery': /\d{4}-\d{2}-\d{2}/
 				},
 				duplication: ['name']
     		};
     		$scope.create = function(){
     			
   				$scope.errorMsgs = [];
     			
   				var promises = [];
   				
   				for(var key in $scope.checkInfo.validation){
     				var value = $scope.collection[key];
     				if ((key == "deadline" || key == "delivery") && !value) {
     					$scope.errorMsgs.push([key, 'DATE_ERROR']);
     					$scope.checkInfo.validation[key] = true;
     					continue;
     				}
     				if (!value || value == '') {
     					$scope.errorMsgs.push([key, 'EMPTY_ERROR']);
     					$scope.checkInfo.validation[key] = true;
     					continue;
     				}
     				if($scope.checkInfo.reg[key] && !$scope.checkInfo.reg[key].test(value)){
     					$scope.errorMsgs.push([key, 'PATTERN_ERROR']);
     					$scope.checkInfo.validation[key] = true;
     					continue;
     				}
     				
     				if ($scope.checkInfo.duplication.indexOf(key) >= 0){
    					promises.push(Collection.duplicationCheck({
    						key: key,
    						param: value
    					}));
    				}
     				$scope.checkInfo.validation[key] = false;
   				}
   				
				$q.all(promises).then(function(){
					for(var i = 0; i < arguments[0].length; i++) {
						var res = arguments[0][i];
						var key = res.config.data.key;

						if (res.data.status) {
							$scope.checkInfo.validation[key] = true;
							$scope.errorMsgs.push([key, 'DUPLICATION_ERROR']);
						}else{
							$scope.checkInfo.validation[key] = false;
						}
					}
					if (!$scope.errorMsgs.length){
	     				Collection.create(
	     	     			$scope.collection
	     	     		).success(function(res){
	     	     			if (typeof(res) != 'object' || res.status) {
	            				$modal({title: 'Error Info', content: res.msg, show: true});
	         	     		}else{
	     	     				window.open('/collection/'+res.data, '_self');
	     	     			}
	     	     		});
	     			} 
				});
     		};
     		
     		$scope.setDatesByMode = function(mode){
     			if(mode == 'dropdown__COLLECTION_MODE__PERMANENT'){
     				var year = new Date().getFullYear();
     				var maxDate = new Date();
     				maxDate.setYear(year + 100);
     				$scope.collection.delivery = $filter('date')(maxDate, 'yyyy-MM-dd');
     				$scope.collection.deadline = $filter('date')(maxDate, 'yyyy-MM-dd');
     			} else {
     				$scope.collection.delivery = null;
     				$scope.collection.deadline = null;
     			}
     		};
        }
    ]
);
