/**
 * @file root module of home page
 * @author shiliang
 * @description Definition of home page module and all controllers in it.
 * 
 */

var app = angular.module(
    'xShowroom.shop', 
    [
        'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services'
    ]
)
.controller(
    'ShopCtrl',
    [
     	'$scope',
        function ($scope) {
     		$scope.conditions = {
     			show: 	[{
         			value: '0',
         			label: 'all'
         		},{
         			value: '1',
         			label: 'what\'s new'
         		},{
         			value: '2',
         			label: 'woman'
         		},{
         			value: '3',
         			label: 'man'
         		}],
         		category: [{
					value: '0',
					label: 'ready-to-wear'
				},{
					value: '1',
					label: 'accessories'
				},{
					value: '2',
					label: 'footwear'
				},{
					value: '3',
					label: 'bodywear'
				},{
					value: '4',
					label: 'jewellery'
				}],
				season:[{
					value: '0',
					label: 'ss16 collections'
				},{
					value: '1',
					label: 'fw15 collections'
				},{
					value: '2',
					label: 'reorer ss 15'
				},{
					value: '3',
					label: 'fermanent'
				}],
				available: [{
					value: '0',
					label: 'last dat to order'
				},{
					value: '1',
					label: 'up to 1 week'
				},{
					value: '2',
					label: 'up to 4 week'
				},{
					value: '3',
					label: 'up to 8 week'
				},{
					value: '4',
					label: 'up to 12 week'
				}],
				country: [{
					value: '0',
					label: 'Austria'
				},{
					value: '1',
					label: 'Belgium'
				},{
					value: '2',
					label: 'Canada'
				},{
					value: '3',
					label: 'Denmark'
				},{
					value: '4',
					label: 'China'
				}]
     		};
     		$scope.setFilters = function(name, condition){
     			console.log(name, condition)
     		}
        }
    ]
);