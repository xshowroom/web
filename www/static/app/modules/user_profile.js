/**
 * @file root module of profile page
 * @author xiaotaot
 * @description Definition of profile page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.user.profile',
    [
        'ngCookies', 'xShowroom.i18n', 'xShowroom.directives'
    ]
)
.controller(
    'UserProfileCtrl',
    [
        '$scope', '$window', '$filter', 'Country', 'User',
        function ($scope, $window, $filter, Country, User) {
        	$scope.isEditing = false;
        	$scope.countries = Country.getAll();
        	
        	$scope.checkInfo = {
   				validation: {
   				    user: {
   						'firstName': false,
   						'lastName': false,
   						'displayName': false,
   						'tel': false
   				    },
    				brand: {
    					'designerName': false,
    					'categoryType': false,
    					'brandImage': false
   				    },
    				company: {
    					'companyAddr': false,
    					'companyCountry': false,
    					'companyZip': false,
    					'companyTel': false,
    					'companyWebsite': false
    				}
        		},	
    			reg:{
    				user: {
    					'firstName': /^\S{2,50}$/,
    					'lastName': /^\S{2,50}$/,
    					'tel': /^\S{6,20}$/
    			    },
    			    brand: {},
    			    company: {
   						'companyWebsite': /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-@?^=%&amp;/~\+#])?/
   					}
   				}
   			};
        	
        	$scope.edit = function(){
        		$scope.isEditing = !$scope.isEditing;
        	};
        	
        	$scope.reload = function(){
        		$window.location.reload();
        	};
        	
        	$scope.check = function(name, target) {
				for(var key in target){
					if (key == 'mobile' || key =='description'){
						continue;
					}
					var value = target[key];
					if (!value || value == '') {
						$scope.errorMsgs.push([key, 'EMPTY_ERROR']);
						$scope.checkInfo.validation[name][key] = true;
						continue;
					}
					if($scope.checkInfo.reg[name][key]	
						&& !$scope.checkInfo.reg[name][key].test(value)){
						$scope.errorMsgs.push([key, 'PATTERN_ERROR']);
						$scope.checkInfo.validation[name][key] = true;
						continue;
					}
					$scope.checkInfo.validation[name][key] = false;
				}
			};
			$scope.setCollection = function(value){
				var collections = $scope.brand.categoryType
					? $scope.brand.categoryType.split(',')
				    : [];
				var index = collections.indexOf(value);
				if(index >= 0){
					collections.splice(index, 1);
				}else{
					collections.push(value);
				}
				$scope.brand.categoryType = collections.join(',');
			};
			
			$scope.initCategory = function(){
				var categories = $scope.brand.categoryType.split(",");
				for(var i = 0, len = categories.length; i < len; i++) {
					$scope[categories[i]] = true;
				}
			};
			
			$scope.getCategory = function(){
				var result = [];
				var categories = $scope.brand.categoryType.split(",");
				for(var i = 0, len = categories.length; i < len; i++) {
					result.push($filter("translate")(categories[i]));
				}
				return result.join(',');
			};
			
			
        	$scope.save = function(){
        		$scope.errorMsgs = [];
        		var options = {};
        		if($scope.user){
        			$scope.check('user', $scope.user);
        			options = angular.extend(options, $scope.user);
        		};
        		if($scope.company){
        			$scope.check('company', $scope.company);
        			options = angular.extend(options, $scope.company);
        		};
        		if($scope.brand){
        			$scope.check('brand', $scope.brand);
        			options = angular.extend(options, $scope.brand);
        		};
//        		if (!$scope.errorMsgs.length){
//        			User.updateProfile(options).success(function(res){
//        				if (typeof(res) != 'object' || res.status) {
//    						$modal({title: 'Error Info', content: res.msg, show: true});
//            			}else{
//            				$window.location.reload();
//            			}
//        			});
//        		}
        		console.log(options);
        	}
        }
    ]
);