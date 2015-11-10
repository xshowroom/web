var app = angular.module('xShowroom.register.buyer',
		[ 'xShowroom.i18n', 'xShowroom.directives' ]).controller(
		'BuyerRegisterCtrl', [ '$scope', function($scope) {
			$('#store-type').dropdown();
			
			$scope.step = {};
			$scope.step.information = [];
			$scope.step.information[0] = 'ADD USER DETAILS';
			$scope.step.information[1] = 'ADD STORE DETAILS';
			$scope.step.information[2] = 'ADD COMPANY DETAILS';
			
			$scope.step.stepNumber = 1;  //默认打开页数
			
			$scope.result = {
				'user' : {},
				'store' : {
					'storeTypeOptions' : [
					   {id: 1, name: 'TEST1'},
					   {id: 2, name: 'TEST2'},
					   {id: 3, name: 'TEST3'}
					],
					'collectionType' : {}
				},
				'company' : {}
			};
			
			//进行当前页的非空检查并往后一页
			$scope.nextCheck = function() {
				$('.has-error').removeClass('has-error');
				if ($scope.step.stepNumber == 1) {
					if (!$scope.result.user.username) {
						$('#username').parent().addClass('has-error');
					} else if(!$scope.result.user.firstName) {
						$('#first-name').parent().addClass('has-error');
					} else if(!$scope.result.user.lastName) {
						$('#last-name').parent().addClass('has-error');
					} else if(!$scope.result.user.displayName) {
						$('#display-name').parent().addClass('has-error');
					} else if(!$scope.result.user.telephoneNumber) {
						$('#telephone-number').parent().addClass('has-error');
					} else {
						$scope.step.stepNumber++;
					}
				} else if($scope.step.stepNumber == 2) {
					console.log();
					if (!$scope.result.store.storeName) {
						$('#store-name').parent().addClass('has-error');
					} else if(!$scope.result.store.storeType) {
						$('#store-type').parent().addClass('has-error');
					} else if($scope.isEmpty($scope.result.store.collectionType)) {
						$('#collection-type').addClass('has-error');
					} else if(!$scope.result.store.brandCarried) {
						$('#brand-carried').parent().addClass('has-error');
					} else if(!$scope.result.store.website) {
						$('#website').parent().addClass('has-error');
					} else if(!$scope.result.store.storeAddress) {
						$('#store-address').parent().addClass('has-error');
					} else if(!$scope.result.store.country) {
						$('#store-country').parent().addClass('has-error');
					} else if(!$scope.result.store.postcode) {
						$('#store-postcode').parent().addClass('has-error');
					} else if(!$scope.result.store.telephoneNumber) {
						$('#store-telephone-number').parent().addClass('has-error');
					} else {
						$scope.step.stepNumber++;
					}
				}
			}
			
			//往前一页
			$scope.previous = function() {
				if ($scope.step.stepNumber > 1 && $scope.step.stepNumber <= 3) {
					$scope.step.stepNumber--;
				}
			}
			
			//输出ng-model收集结果
			$scope.submit = function() {
				console.log($scope.result);
			}
			
			//检测对象是否为空或对象属性全为false
			$scope.isEmpty = function(v) {
				if(!v) {
					return true;
				} else {
					var flag = true;
					for(var e in v) {
						if(v[e]) {
							flag = false;
							break;
						}
					}
					return flag;
				}
			}
			
			$scope.selectStoreType = function(event) {
				$('#store-type').val(event.target.innerHTML);
			}
			

		}

		]);
