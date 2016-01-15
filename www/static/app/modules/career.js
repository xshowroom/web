angular.module(
    'xShowroom.career', 
    [
     	'xShowroom.i18n', 'xShowroom.directives',
    ]
)
.controller(
    'CareerCtrl',
    [
        '$scope',
        function ($scope) {
        	$scope.positions = [{
        		name: 'account manager',
        		type: 'full time',
        		location: 'shanghai',
        		date: '2016/01/01',
        		description: 'Vix te habemus facilisi postulant. Te duo habemus vivendo. Debet legere inimicus sed ei. Ut mei quaeque labores feugait, case elit explicari no duo. Insolens oportere ius in, ad dicat nostrud delicata vix. Nemore malorum definitiones no eam. Pri dolorum comprehensam ei. Eum eu diam.  Unum zril cotidieque ea ius. '
        	}];
        	
        	$scope.setOpenPosition = function(index){
        		$scope.selectedPosition = $scope.selectedPosition == index ? null : index;
        	}
        }
    ]
);