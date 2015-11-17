angular.module(
	'xShowroom.register.brand',
	[
	    'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
	'RegisterBrandCtrl', 
	[
	    '$scope', '$element', '$timeout', '$q', 'User',
	    function($scope, $element, $timeout, $q, User) {
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
				},
				reg:{
					1: {
				    	'email': /^([a-zA-Z0-9])+([a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9_-])+/
				    },
				    2:{},
				    3:{}
				},
				duplication: {
					1: ['email'],
					2: ['brandName'],
					3: []
				}
			};
			$scope.user = {
				roleType: 1
			};
			
			$scope.check = function() {
				var stepNumber = $scope.step.stepNumber;
				var keys = $scope.step.validation[stepNumber];
				
				$scope.errorMsgs = [];
				
				var promises = [];
				
				for(var key in keys){
					var value = $scope.user[key];
					if (!value || value == '') {
						$scope.errorMsgs.push([key, 'EMPTY ERROR']);
						$scope.step.validation[stepNumber][key] = true;
						continue;
					}
					if($scope.step.reg[stepNumber][key]	
						&& !$scope.step.reg[stepNumber][key].test(value)){
						$scope.errorMsgs.push([key, 'PATTERN ERROR']);
						$scope.step.validation[stepNumber][key] = true;
						continue;
					}
					if ($scope.step.duplication[stepNumber].indexOf(key) >= 0){
						promises.push(User.duplicationCheck({
							key: key,
							param: value
						}));
					}
					$scope.step.validation[stepNumber][key] = false;
				}
				$q.all(promises).then(function(){
					for(var i = 0; i < arguments[0].length; i++) {
						var res = arguments[0][i];
						var key = res.config.params.key;
						if (res.data.status) {
							$scope.step.validation[stepNumber][key] = true;
							$scope.errorMsgs.push([key, 'DUPLICATION ERROR']);
						}else{
							$scope.step.validation[stepNumber][key] = false;
						}
					}
					if (!$scope.errorMsgs.length && $scope.step.stepNumber < 3) {
						$scope.step.stepNumber += 1;
					}else if (!$scope.errorMsgs.length && $scope.step.stepNumber == 3 && $scope.acceptConditions) {
						$scope.register();
					}
				});
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
        			window.open('/login', '_self');
        		});
			};
		}
	]
);
