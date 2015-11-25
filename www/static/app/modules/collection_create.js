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
        'ngAnimate', 'mgcrea.ngStrap', 'ngTextcomplete'
    ]
)
.controller(
    'CollectionCreateCtrl',
    [
     	'$scope', 'Collection',
        function ($scope, Collection) {
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
 				}
     		};
     		$scope.create = function(){
     			
   				$scope.errorMsgs = [];
     					
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
     				$scope.checkInfo.validation[key] = false;
   				}
   				
     			if (!$scope.errorMsgs.length){
     				Collection.create(
     	     			$scope.collection
     	     		).success(function(res){
     	     			if (!res.status) {
     	     				window.open('/brand/collection', '_self');
     	     			}else{
     	     				$scope.errorMsgs.push(['create error', res.msg]);
     	     			}
     	     		});
     			} 
     		};
        }
    ]
);
