angular.module(
	'xShowroom.register.brand',
	[
	    'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
	'RegisterBrandCtrl', 
	[
	    '$scope', '$element', '$timeout', '$q', 'User', 'Country',
	    function($scope, $element, $timeout, $q, User, Country) {
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
						'imagePath': false,
						'brandUrl': false
				    },
				    3: {
				    	'companyName': false,
						'companyAddr': false,
						'companyCountry': false,
						'companyZip': false,
						'companyTel': false,
						'companyWebsite': false,
						'acceptCondition': false
				    }
				},
				reg:{
					1: {
						'email': /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
						'pass': /^\S{6,100}$/,
						'firstName': /^\S{2,50}$/,
						'lastName': /^\S{2,50}$/,
					},
				    2:{
				    	'brandUrl': /^[0-9a-zA-Z]+$/
				    },
				    3:{
						'companyWebsite': /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-@?^=%&amp;/~\+#])?/
					}
				},
				duplication: {
					1: ['email'],
					2: ['brandName', 'brandUrl'],
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
						$scope.errorMsgs.push([key, 'EMPTY_ERROR']);
						$scope.step.validation[stepNumber][key] = true;
						continue;
					}
					if($scope.step.reg[stepNumber][key]	
						&& !$scope.step.reg[stepNumber][key].test(value)){
						$scope.errorMsgs.push([key, 'PATTERN_ERROR']);
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
						var key = res.config.data.key;
						if (res.data.status) {
							$scope.step.validation[stepNumber][key] = true;
							$scope.errorMsgs.push([key, 'DUPLICATION_ERROR']);
						}else{
							$scope.step.validation[stepNumber][key] = false;
						}
					}
					if (!$scope.errorMsgs.length && $scope.step.stepNumber < 3) {
						$scope.step.stepNumber += 1;
					}else if (!$scope.errorMsgs.length && $scope.step.stepNumber == 3) {
						$scope.register();
					}
				});
			};
			
			$scope.previous = function() {
				if ($scope.step.stepNumber > 1 && $scope.step.stepNumber <= 3) {
					$scope.step.stepNumber--;
				}
			};
			
			$scope.countries = Country.getAll();
			
			$scope.register = function() {
				var register = User.register($scope.user);
				register.success(function(res){
					if (typeof(res) != 'object' || res.status) {
						$modal({title: 'Error Info', content: res.msg, show: true});
        			}else{
        				window.open('/brand/dashboard', '_self');
        			}
        		});
			};

			$scope.checkInvitation = function() {
				var code = angular.element('#invitation-code').val();

				User.invitationCheck({
					code: code,
					rnd: new Date().getTime()
				}).success(function(res){
					if (res.status) {
						$('#invite-modal').modal('hide');
					}
					else {
						$('#invite-error').show();
					}
				});
			};
		}
	]
);
