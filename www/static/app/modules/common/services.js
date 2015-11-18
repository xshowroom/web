angular.module(
    'xShowroom.services', []
)
.service(
	'User', 
	[
	    '$http',
		function ($http) {
	    	var postRequestTransformer = function(data){
				var temp = [];
				for(var i in data){
					temp.push(i + '=' + data[i]);
				}
                return temp.join('&');
            }
		    return {
		    	login: function (opts) {
		    		return $http.get('/api/login', {params: opts});
		      	},
		      	register: function (opts) {
		      		return $http.post('/api/register', opts, {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						},
						transformRequest: postRequestTransformer
					});
		      	},
//		      	getUserInfo: function(){
//		      		return $http.get('/api/common/userInfo');
//		      	},
		      	duplicationCheck: function (opts) {
		    		return $http.get('/api/register/checkParam', {params: opts});
		    	}
   			};
         }
    ]
)
.service(
	'Collection', 
	[
	    '$http',
		function ($http) {
	    	var postRequestTransformer = function(data){
				var temp = [];
				for(var i in data){
					temp.push(i + '=' + data[i]);
				}
                return temp.join('&');
            }
		    return {
		      	create: function (opts) {
		      		return $http.post('/api/collection/add', opts, {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						},
						transformRequest: postRequestTransformer
					});
		      	}
   			};
         }
    ]
)
.service(
    'Country',
    [
		function () {
		    return {
		    	getAll: function (opts) {
		    		return [
		    		    "Angola",             "Afghanistan",       "Albania",              "Algeria",                "Andorra",
		    		    "Anguilla",           "AntiguaandBarbuda", "Argentina",            "Armenia",                "Ascension",
		    		    "Australia",          "Austria",           "Azerbaijan",           "Bahamas",                "Bahrain",
		    		    "Bangladesh",         "Barbados",          "Belarus",              "Belgium",                "Belize",
		    		    "Benin",              "BermudaIs",         "Bolivia",              "Botswana",               "Brazil",
		    		    "Brunei",             "Bulgaria",          "Burkina_faso",         "Burma",                  "Burundi",
		    		    "Cameroon",           "Canada",            "CaymanIs",             "CentralAfricanRepublic", "Chad",
		    		    "Chile",              "China",             "Colombia",             "Congo",                  "CookIs",
		    		    "CostaRica",          "Cuba",              "Cyprus",               "CzechRepublic",          "Denmark",
		    		    "Djibouti",           "DominicaRep",       "Ecuador",              "Egypt",                  "EISalvador",
		    		    "Estonia",            "Ethiopia",          "Fiji",                 "Finland",                "France",
		    		    "FrenchGuiana",       "Gabon",             "Gambia",               "Georgia",                "Germany",
		    		    "Ghana",              "Gibraltar",         "Greece",               "Grenada",                "Guam",
		    		    "Guatemala",          "Guinea",            "Guyana",               "Haiti",                  "Honduras",
		    		    "Hongkong",           "Hungary",           "Iceland",              "India",                  "Indonesia",
		    		    "Iran",               "Iraq",              "Ireland",              "Israel",                 "Italy",
		    		    "IvoryCoast",         "Jamaica",           "Japan",                "Jordan",                 "Kampuchea_Cambodia",
		    		    "Kazakstan",          "Kenya",             "Korea",                "Kuwait",                 "Kyrgyzstan",
		    		    "Laos",               "Latvia",            "Lebanon",              "Lesotho",                "Liberia",
		    		    "Libya",              "Liechtenstein",     "Lithuania",            "Luxembourg",             "Macao",
		    		    "Madagascar",         "Malawi",            "Malaysia",             "Maldives",               "Mali",
		    		    "Malta",              "MarianaIs",         "Martinique",           "Mauritius",              "Mexico",
		    		    "Moldova_Republicof", "Monaco",            "Mongolia",             "MontserratIs",           "Morocco",
		    		    "Mozambique",         "Namibia",           "Nauru",                "Nepal",                  "NetheriandsAntilles",
		    		    "Netherlands",        "NewZealand",        "Nicaragua",            "Niger",                  "Nigeria",
		    		    "NorthKorea",         "Norway",            "Oman",                 "Pakistan",               "Panama",
		    		    "PapuaNewCuinea",     "Paraguay",          "Peru",                 "Philippines",            "Poland",
		    		    "FrenchPolynesia",    "Portugal",          "PuertoRico",           "Qatar",                  "Reunion",
		    		    "Romania",            "Russia",            "SaintLueia",           "SaintVincent",           "SamoaEastern",
		    		    "SamoaWestern",       "SanMarino",         "SaoTomeandPrincipe",   "SaudiArabia",            "Senegal",
		    		    "Seychelles",         "SierraLeone",       "Singapore",            "Slovakia",               "Slovenia",
		    		    "SolomonIs",          "Somali",            "SouthAfrica",          "Spain",                  "SriLanka",
		    		    "St_Lucia",           "St_Vincent",        "Sudan",                "Suriname",               "Swaziland",
		    		    "Sweden",             "Switzerland",       "Syria",                 "Taiwan",                "Tajikstan",
		    		    "Tanzania",           "Thailand",          "Togo",                  "Tonga",                 "TrinidadandTobago",
		    		    "Tunisia",            "Turkey",            "Turkmenistan",          "Uganda",                "Ukraine",
		    		    "UnitedArabEmirates", "UnitedKiongdom",    "UnitedStatesofAmerica", "Uruguay",               "Uzbekistan",
		    		    "Venezuela",          "Vietnam",           "Yemen",                 "Yugoslavia",            "Zimbabwe",
		    		    "Zaire",              "Zambia"
		    		];
		      	}
			};
		}
	]
);