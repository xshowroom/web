/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

angular.module(
    'xShowroom.home', 
    [
        'xShowroom.i18n', 'xShowroom.directives'/*, 'angular-scroll-complete'*/
    ]
)
.controller(
    'HomeCtrl',
    [
     	'$scope', '$element', '$timeout',
        function ($scope, $element, $timeout) {
     		$scope.isCounterInited = false;
     		
     		$scope.counter= {
     			buyer: 1181,
     			brand: 219,
     			product: 3571,
     			order: 52291
     		};
     		$scope.tempCounter= {
         		buyer: 0,
         		brand: 0,
         		product: 0,
         		order: 0
         	};
     		$timeout(function(){
     			var bodyHeight = $element.height();
     			var postion = $element.find('.home-kpi').offset().top;
     			$scope.kpiPercent = Math.round(postion / bodyHeight * 100);
     			$scope.$apply();
     			console.log(bodyHeight, postion);
     		}, 500, true);
     		
     		$scope.restartCounter = function(){
     			$scope.isCounterInited = true;
     			console.log(123)
     		}
     		
        }
    ]
);