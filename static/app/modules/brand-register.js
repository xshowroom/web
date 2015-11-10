var app = angular.module('xShowroom.register.brand',
	[
	    'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services', 'ui.uploader'
    ]
)
.controller(
	'BrandRegisterCtrl', 
	[
	    '$scope', '$element', '$log', 'uiUploader', 'User',
	    function($scope, $element, $log, uiUploader, User) {
			$scope.step = {
				stepNumber: 1,
				information: ['ADD USER DETAILS', 'ADD BRAND DETAILS', 'ADD COMPANY DETAILS'],
				validation: {
				     1: {
				    	'email': false,
						'pass': false,
						'firstName': false,
						'lastName': false,
						'displayName': false,
						'tel': false,
						'mobile': false
				    },
				    2: {
				    	'brandName': false, 
						'designerName': false,
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
			
			$scope.files = [];
			
			$element.find('.brand-register-block-spare').on('change', '#lookbook-upload', function(e) {
				console.log(123)
				var files = e.target.files;
				uiUploader.addFiles(files);
				$scope.files = uiUploader.getFiles();
				$scope.$apply();
                uiUploader.startUpload({
                    url: '/web/upload/image',
                    concurrency: 2,
                    onProgress: function(file) {
                        $log.info(file.name + '=' + file.humanSize);
                        $scope.$apply();
                    },
                    onCompleted: function(file, response) {
                        $log.info(file + 'response' + response);
                    }
                });
			});
			
			$scope.uploadImage = function(event){
				console.log(event)
			}
			
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
				}else if (!errorFlag && $scope.step.stepNumber == 3) {
					$scope.register();
				}
			};
			$scope.previous = function() {
				if ($scope.step.stepNumber > 1 && $scope.step.stepNumber <= 3) {
					$scope.step.stepNumber--;
				}
			};
			$scope.register = function() {
				console.log($scope.user);
			};
		}
	]
);
