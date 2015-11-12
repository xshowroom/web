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
		      		return $http.post('/web/register', opts, {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						},
						transformRequest:function(data){
							var temp = [];
							for(var i in data){
								temp.push(i + '=' + data[i]);
							}
			                return temp.join('&');
			            }
					});
		      	},
		      	getUserInfo: function(){
		      		return $http.get('/web/common/userInfo');
		      	}
   			};
         }
    ]
);