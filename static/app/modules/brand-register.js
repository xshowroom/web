angular.module(
	'xShowroom.register.brand',
	[
	    'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
	'BrandRegisterCtrl', 
	[
	    '$scope', '$element', 'User',
	    function($scope, $element,  User) {
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
			$scope.user = {
				roleType: 1
			};
			
			$scope.files = [];
			
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
			
			$scope.previous = function() {
				if ($scope.step.stepNumber > 1 && $scope.step.stepNumber <= 3) {
					$scope.step.stepNumber--;
				}
			};
			
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
