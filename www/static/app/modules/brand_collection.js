/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.brand.collection', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'BrandCollectionCtrl',
    [
     	'$scope', 'Collection',
        function ($scope, Collection) {
     		$scope.filters = {
     			limit: 4,
     			status: ''
     		};
     		
     		Collection.findAll({
     			detail: 1
     		}).success(function(res){
     			$scope.statusCounter = {};
     			for(var i = 0, len = res.data.length; i < len; i++) {
     				var status = res.data[i].status;
     				if($scope.statusCounter[status]){
     					$scope.statusCounter[status] += 1;
     				}else{
     					$scope.statusCounter[status] = 1;
     				}
     			}
     			var collections = res.data;
     			for (var i = 0, len = collections.length; i < len; i++) {
     				for (var j = 0, pLen = collections[i].productions.length; j < pLen; j++) {
     					var urls = collections[i].productions[j]['image_url'];
     					collections[i].productions[j].image_url = JSON.parse(urls);
     				}
     			}
     			$scope.collections = collections;
     			console.log($scope.collections)

     		});
     		
     		/*$scope.deleteCollection = function(collectionId){
         		if (confirm('确认要删除该Collection?')){
         			Collection.destroy({
         				id: collectionId
         			}).success(function(res){
         	     		if (!res.status) {
         	     			window.open('/brand/collection', '_self');
         	     		}else{
         	     			alert(res.msg);
         	     		}
         	     	});
         		} 
         	};
         	
         	$scope.enableCollection = function(collectionId){
         		if (confirm('确认要提交该Collection?')){
         			Collection.enable({
         				id: collectionId
         			}).success(function(res){
         	     		if (!res.status) {
         	     			window.location.reload();
         	     		}else{
         	     			alert(res.msg);
         	     		}
         	     	});
         		} 
         	};
         	
         	$scope.closeCollection = function(collectionId){
         		if (confirm('确认要下线该Collection?')){
         			Collection.close({
         				id: collectionId
         			}).success(function(res){
         	     		if (!res.status) {
         	     			window.location.reload();
         	     		}else{
         	     			alert(res.msg);
         	     		}
         	     	});
         		} 
         	};*/
        }
    ]
);