angular.module(
    'xShowroom.brand.lookbook',
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'mgcrea.ngStrap'
    ]
)
.controller(
    'BrandLookbookCtrl',
    [
        '$scope', '$modal', '$filter', 'Brand',
        function ($scope, $modal, $filter, Brand) {
        	$scope.addPhoto = function(url, season){
        		Brand.saveLookbookPhoto({
        			season: season,
        			lookbook: url
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status || !res.data) {
        				$modal({title: 'Error Info', content: res.msg, show: true});
     					return;
     				}
        			if (!$scope.photos[season]){
        				$scope.photos[season] = [];
        			}
        			$scope.photos[season].push(res.data);
        		});
        	};
        	
        	$scope.removePhoto = function(photo){
        		Brand.removeLookbookPhoto({
        			id: photo.id
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: res.msg, show: true});
     					return;
     				}
        			var index = $scope.photos[photo.season].indexOf(photo);
            		$scope.photos[photo.season].splice(index, 1);
        		});
        	};
        	
        	Brand.getLookbookPhotos({
        		brandId: $scope.userId
        	}).success(function(res){
        		if (typeof(res) != 'object' || res.status) {
    				$modal({title: 'Error Info', content: res.msg, show: true});
 					return;
 				}
        		$scope.seasons = Brand.getSeasonsForLookbook();
        		$scope.photos = {};
        		for(var i = 0, len = res.data.length; i < len; i++){
        			var record = res.data[i];
        			if(!$scope.photos[record.season]){
        				$scope.photos[record.season] = [];
        			}
        			$scope.photos[record.season].push(record);
            	}
        	});
        }
    ]
);