var app = angular.module(
	'xShowroom.register.buyer',
	[
	 	'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'ui.uploader'
	]
)
.controller(
    'BuyerRegisterCtrl', 
    [
        '$scope', '$element', 'uiUploader', 'User',
        function($scope, $element,  uiUploader, User) {
			$scope.step = {
				stepNumber: 1,
				validation: {
				     1: {
				    	'email': false,
						'pass': false,
						'firstName': false,
						'lastName': false,
						'displayName': false,
						'tel': false
//						'mobile': false
				    },
				    2: {
				    	'shopName': false,
				    	'shopType': false,
				    	'collectionType': false, 
				    	'brandList': false,
				    	'shopWebsite': false,
				    	'shopAddress': false,
				    	'shopCountry': false,
				    	'shopZipcode': false,
				    	'shopTel': false,
						'imagePath': false
				    },
				    3: {
				    	'companyName': false,
						'companyAddr': false,
						'companyCountry': false,
						'companyZip': false,
						'companyTel': false,
						'companyWebsite': false
				    }
				}
			};
			$scope.user = {
				roleType: 2
			};
			
			$scope.check = function() {
				var stepNumber = $scope.step.stepNumber;
				var keys = $scope.step.validation[stepNumber];
				var errorFlag = false;
				for(var key in keys){
					var hasError = !$scope.user[key] || $scope.user[key] == '';
					$scope.step.validation[stepNumber][key] = hasError;
					errorFlag = errorFlag || hasError;
				}
				if (!errorFlag && $scope.step.stepNumber < 3) {
					$scope.step.stepNumber += 1;
				}else if (!errorFlag && $scope.step.stepNumber == 3 && $scope.acceptConditions) {
					$scope.register();
				}
			};
			
			$scope.files = [];
			$element.find('.buyer-register-block-up').on('change', '#lookbook-upload', function(e) {
				$scope.$broadcast('uploading.start');
				uiUploader.addFiles(e.target.files);
				$scope.files = uiUploader.getFiles();
                uiUploader.startUpload({
                    url: '/web/upload/image',
                    onCompleted: function(file, response) {
                    	response = JSON.parse(response);
                    	if(response.status != 0){
                    		$scope.user.imagePath = undefined;
                    		$scope.$apply();
                    		alert('上传图片接口出错，请重新上传，如多次失败请联系我们！');
                    		return
                    	}
                    	$scope.user.imagePath = response.data;
                    	$scope.$apply();
                    	$scope.$broadcast('uploading.end');
                    }
                });
			});
			
			//往前一页
			$scope.previous = function() {
				if ($scope.step.stepNumber > 1 && $scope.step.stepNumber <= 3) {
					$scope.step.stepNumber--;
				}
			}
			
			$scope.register = function() {
				var register = User.register($scope.user);
				register.success(function(res){
        			if(res.status != 0){
        				alert(res.msg);
        				return;
        			}
        			window.open('./login.html', '_self');
        		});
			};
			
		}

	]
);
