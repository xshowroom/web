var app = angular.module('xShowroom.register.brand',
		[ 'xShowroom.i18n', 'xShowroom.directives' ]).controller(
		'BrandRegisterCtrl', [ '$scope', function($scope) {
			$scope.step = {};
			$scope.step.information = [];
			$scope.step.information[0] = 'ADD USER DETAILS';
			$scope.step.information[1] = 'ADD BRAND DETAILS';
			$scope.step.information[2] = 'ADD COMPANY DETAILS';
			$scope.step.stepNumber = 1;
			$scope.result = {
				'user' : {},
				'brand' : {},
				'company' : {}
			};
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
					if (!$scope.result.brand.brandName) {
						$('#brand-name').parent().addClass('has-error');
					} else if(!$scope.result.brand.designerName) {
						$('#designer-name').parent().addClass('has-error');
					} else {
						$scope.step.stepNumber++;
					}
				}
			}
			$scope.previous = function() {
				if ($scope.step.stepNumber > 1 && $scope.step.stepNumber <= 3) {
					$scope.step.stepNumber--;
				}
			}
			$scope.submit = function() {
				console.log($scope.result);
			}
			

		}

		]);
