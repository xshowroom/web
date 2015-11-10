var app = angular.module(
    'xShowroom.services', []
)
.service(
	'User', 
	[
	    '$http',
		function ($http) {
		    return {
		    	login: function (opts) {
		    		return $http.get('/web/login', {params: opts});
		      	},
		      	register: function (opts) {
		    		return $http.get('/web/register', {params: opts});
		      	}
   			};
         }
    ]
);