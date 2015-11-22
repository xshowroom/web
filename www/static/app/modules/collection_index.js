/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */
angular.module(
    'xShowroom.collection.index', 
    [
        'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'CollectionIndexCtrl',
    [
     	'$scope', 'Collection', 
        function ($scope, Collection) {
     		Collection.findById({
     			id: collectionId
     		}).success(function(res){
     			if(!res.status){
     				$scope.collection = {
     					'name': res.data.name,
     	 				'category': res.data.category,
     	 				'mode': res.data.mode,
     	 				'season': res.data.season,
     	 				'order': res.data.mini_order,
     	 				'currency': res.data.currency,
     	 				'deadline': res.data.deadline.split(/\s/)[0],
     	 				'delivery': res.data.delivery_date,
     	 				'description': res.data.description,
     	 				'image': res.data.cover_image	
 					};
     			}else{
     				alert(res.msg);
     			};
     		});
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
     					'order': /\d+/,
     					'deadline': /\d{4}-\d{2}-\d{2}/,
     					'delivery': /\d{4}-\d{2}-\d{2}/
     				}
         		};
         		$scope.update = function(){
       				$scope.errorMsgs = [];
         					
       				for(var key in $scope.checkInfo.validation){
         				var value = $scope.collection[key];
         				if ((key == "deadline" || key == "delivery") && !value) {
         					$scope.errorMsgs.push([key, 'DATE ERROR']);
         					$scope.checkInfo.validation[key] = true;
         					continue;
         				}
         				if (!value || value == '') {
         					$scope.errorMsgs.push([key, 'EMPTY ERROR']);
         					$scope.checkInfo.validation[key] = true;
         					continue;
         				}
         				if($scope.checkInfo.reg[key] && !$scope.checkInfo.reg[key].test(value)){
         					$scope.errorMsgs.push([key, 'PATTERN ERROR']);
         					$scope.checkInfo.validation[key] = true;
         					continue;
         				}
         				$scope.checkInfo.validation[key] = false;
       				}
       				
         			if (!$scope.errorMsgs.length){
         				Collection.modify(
         	     			$scope.collection
         	     		).success(function(res){
         	     			if (!res.status) {
         	     				window.location.reload();
         	     			}else{
         	     				alert(res.msg);
         	     			}
         	     		}
         	     	);
         		} 
         	};
     	}
    ]
);