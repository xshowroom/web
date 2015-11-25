/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */
angular.module(
    'xShowroom.collection.index', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services',
        'ngAnimate', 'mgcrea.ngStrap', 'ngTextcomplete'
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
     					'id': res.data.id,
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
     				'order': /^\d+$/,
     				'deadline': /\d{4}-\d{2}-\d{2}/,
     				'delivery': /\d{4}-\d{2}-\d{2}/
     			}
         	};
         	$scope.updateCollection = function(){
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
         			Collection.modify(
         	   			$scope.collection
         	    	).success(function(res){
         	     		if (res.status) {
         	     			alert(res.msg);
         	     		}else{
         	     			window.location.reload();
         	     		}
         	     	});
         		} 
         	};
         	
         	$scope.deleteCollection = function(){
         		if (confirm('确认要删除该Collection?')){
         			Collection.destroy({
         				id: collectionId
         			}).success(function(res){
         	     		if (res.status) {
         	     			alert(res.msg);
         	     		}else{
         	     			window.open('/brand/collection', '_self');
         	     		}
         	     	});
         		} 
         	};
         	$scope.enableCollection = function(){
         		if (confirm('确认要提交该Collection么?确认后，将无法对该collection进行修改。')){
         			Collection.enable({
         				id: collectionId
         			}).success(function(res){
         	     		if (res.status) {
         	     			alert(res.msg);
         	     		}else{
         	     			window.location.reload();
         	     		}
         	     	});
         		} 
         	};
         	$scope.closeCollection = function(){
         		if (confirm('确认要下线该Collection?')){
         			Collection.close({
         				id: collectionId
         			}).success(function(res){
         	     		if (res.status) {
         	     			alert(res.msg);
         	     		}else{
         	     			window.location.reload();
         	     		}
         	     	});
         		} 
         	};
         	
         	
         	Collection.getProductList({
         		collectionId: collectionId
     		}).success(function(res){
     			if(res.status){
     				alert(res.msg);
     				return;
     			}
     			$scope.products = res.data;
 				$scope.filters = {
 					category: '',
 					limit: 8
 				};
 				$scope.categoryCounter = {};
 				for(var i = 0, len = $scope.products.length; i < len; i++){
 					var category = $scope.products[i].category;
     				if($scope.categoryCounter[category]){
     					$scope.categoryCounter[category] += 1;
     				}else{
     					$scope.categoryCounter[category] = 1;
     				}
     				$scope.products[i].image_url = JSON.parse($scope.products[i].image_url);
 				}
     		});
     	}
    ]
);
