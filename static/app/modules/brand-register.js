var app = angular.module('xShowroom.register.brand',
		[ 'xShowroom.i18n', 'xShowroom.directives' ]).controller(
		'BrandRegisterCtrl', [ '$scope', function($scope) {
			$scope.step = {};
			$scope.step.information = [];
			$scope.step.information[0] = 'ADD USER DETAILS';
			$scope.step.information[1] = 'ADD BRAND DETAILS';
			$scope.step.information[2] = 'ADD COMPANY DETAILS';
			$scope.step.stepNumber = 2;
			$scope.user = {};
			$scope.brand = {};
			$scope.company = {};
			$scope.result = {
				'user' : $scope.user,
				'brand' : $scope.brand,
				'company' : $scope.company
			};
			$scope.nextCheck = function() {
				$('.has-error').removeClass('has-error');
				if ($scope.step.stepNumber == 1) {
					if (!$('#username').val()) {
						$('#username').parent().addClass('has-error');
					} else if(!$('#first-name').val()) {
						$('#first-name').parent().addClass('has-error');
					} else if(!$('#last-name').val()) {
						$('#last-name').parent().addClass('has-error');
					} else if(!$('#display-name').val()) {
						$('#display-name').parent().addClass('has-error');
					} else if(!$('#telephone-number').val()) {
						$('#telephone-number').parent().addClass('has-error');
					} else {
						$scope.step.stepNumber++;
					}
				} else if($scope.step.stepNumber == 2) {
					if (!$('#brand-name').val()) {
						$('#brand-name').parent().addClass('has-error');
					} else if(!$('#designer-name').val()) {
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

previewLookbook = function(files){
	var file = files.files[0];  
    if(window.FileReader) {
        var fr = new FileReader();  
        fr.onloadend = function(e) {
            fr.readAsDataURL(file);  
            var uploadDiv = $('#lookbook-upload').parent().parent();
            uploadDiv.children().remove();
            var previewImage = "<a class=\"thumbnail\"><img src=\"" + fr.result + "\" /></a>";
            uploadDiv.append(previewImage);
        };  
    }
}