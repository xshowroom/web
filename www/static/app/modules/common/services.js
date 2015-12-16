angular.module(
    'xShowroom.services', ['xShowroom.i18n']
)
.service(
	'Order', 
	[
	    '$http', '$httpParamSerializer',
		function ($http,  $httpParamSerializer) {
		    return {
		    	create:function (opts) {
		    		return $http.post('/api/order/createOrder', $httpParamSerializer(opts), {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						}
					});
		    	}
   			};
         }
    ]
)
.service(
	'Cart', 
	[
	    '$http', '$httpParamSerializer',
		function ($http,  $httpParamSerializer) {
		    return {
		    	addProduct:function (opts) {
		    		return $http.post('/api/order/addToCart', $httpParamSerializer(opts), {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						}
					});
		    	},
		      	removeProduct:function (opts) {
		      		return $http.post('/api/order/deleteFromCart', $httpParamSerializer(opts), {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						}
					});
		      	},
		      	checkProduct: function(opts){
		      		return $http.get('/api/order/getFromCart', {params: opts});
		      	},
		      	findAll: function(opts){
		      		return $http.get('/api/order/getListFromCart', {params: opts});
		      	},
		      	findOne: function(opts){
		      		return $http.get('/api/order/getListFromCartByCollection', {params: opts});
		      	}
   			};
         }
    ]
)
.service(
	'User', 
	[
	    '$http', '$httpParamSerializer',
		function ($http,  $httpParamSerializer) {
		    return {
		    	login: function (opts) {
		    		return $http.get('/api/login', {params: opts});
		      	},
		      	register: function (opts) {
		      		return $http.post('/api/register', $httpParamSerializer(opts), {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						}
					});
		      	},
		      	duplicationCheck: function (opts) {
		    		return $http.get('/api/register/checkParam', {params: opts});
		    	}
   			};
         }
    ]
)
.service(
	'Buyer', 
	[
	    '$http', '$httpParamSerializer',
		function ($http,  $httpParamSerializer) {
		    return {
		      	getShopList: function (opts) {
		    		return $http.get('/api/register/checkParam', {params: opts});
		    	},
		    	checkAuth: function(opts){
		      		return $http.get('/api/buyer/checkAuth', {params: opts});
		      	},
		      	applyAuth: function(opts){
		      		return $http.get('/api/buyer/apply', {params: opts});
		      	},
		      	getStoreList: function(opts){
		      		return $http.get('/api/buyer/getStoreList', {params: opts});
		      	},
		      	getMyBrandList: function(opts){
		      		return $http.get('/api/buyer/getBrandList', {params: opts});
		      	}
   			};
         }
    ]
)
.service(
	'Brand', 
	[
	    '$http', '$httpParamSerializer',
		function ($http, $httpParamSerializer) {
	    	var conditions = {
				mode: {
	    			type: 'radio',
	         		values: [
	         		    'dropdown__COLLECTION_MODE__PRE_ORDER', 'dropdown__COLLECTION_MODE__STOCK',
	                    'dropdown__COLLECTION_MODE__RE_ORDER', 'dropdown__COLLECTION_MODE__PERMANENT'
	         		]
	    		},
				show: {
	         		type: 'radio',
	         		values: [
	         		    'dropdown__COLLECTION__ALL', 'dropdown__COLLECTION__WHATS_NEW',
	         		    'dropdown__COLLECTION__WOMEN', 'dropdown__COLLECTION__MEN'
	         		]
	         	},
				category: {
	         		type: 'radio',
	         		values: [
	         		    'dropdown__COLLECTION__WOMEN', 'dropdown__COLLECTION__MEN', 'dropdown__COLLECTION__ACCESSORIES',
	         	        'dropdown__COLLECTION__LIFESTYLE', 'dropdown__COLLECTION__OTHERS'
	         	    ]
	         	},
				season:{
	    		  	type: 'checkbox',
	    		    values: [
	    		        'dropdown__COLLECTION_SEASON__AW_15', 'dropdown__COLLECTION_SEASON__PRE_SS16',
	    		        'dropdown__COLLECTION_SEASON__SS_16', 'dropdown__COLLECTION_SEASON__AW_16'
	    		    ]
	    		},
				seasonInLookbook:{
					type: 'checkbox',
					values: [
						'dropdown__COLLECTION_SEASON__AW_14',
						'dropdown__COLLECTION_SEASON__PRE_SS_15','dropdown__COLLECTION_SEASON__SS_15', 'dropdown__COLLECTION_SEASON__AW_15',
						'dropdown__COLLECTION_SEASON__PRE_SS16','dropdown__COLLECTION_SEASON__SS_16'//, 'dropdown__COLLECTION_SEASON__AW_16'
					]
				},
				available: {
	    		  	type: 'radio',
	    		    values: [
	    		        'dropdown__AVAILABLE__LAST_DAY', 'dropdown__AVAILABLE__1_WEEK', 'dropdown__AVAILABLE__4_WEEK',
	    		        'dropdown__AVAILABLE__8_WEEK', 'dropdown__AVAILABLE__12_WEEK'
	    		    ]
	    		},
				country: {
	    		   	type: 'checkbox',
	    		    values: [
						'dropdown__COUNTRY__UnitedKiongdom', 'dropdown__COUNTRY__France', 'dropdown__COUNTRY__Italy',
						'dropdown__COUNTRY__China', 'dropdown__COUNTRY__Germany', 'dropdown__COUNTRY__Japan',
						'dropdown__COUNTRY__Spain', 'dropdown__COUNTRY__UnitedStatesofAmerica'
	    		    ]
	    		}
	      	};
		    return {
		    	findAll: function (opts) {
		    		return $http.get('/api/brand/list', {params: opts});
		      	},
		      	query: function (opts) {
		    		return $http.get('/api/brand/query', {params: opts});
		      	},
		      	getShopConditions: function(){
		      		return {
		      			show: conditions.show,
						season: conditions.season,
						available: conditions.available,
						country: conditions.country
		      		};
		      	},
		      	getIndexConditions: function(){
		      		return {
		      			mode: conditions.mode,
		      			season: conditions.season
		      		};
		      	},
		      	getMyBrandConditions: function(){
		      		return {
		      			show: conditions.show,
						country: conditions.country
		      		};
		      	},
		      	getSeasons: function(){
		      		return conditions.season.values;
		      	},
				getSeasonsForLookbook: function(){
					return conditions.seasonInLookbook.values;
				},
		      	getCoversBySeason: function (opts) {
		    		return $http.get('/api/guest/coverImgList', {params: opts});
		      	},
		      	getCollectionList: function (opts){
		      		return $http.get('/api/buyer/getCollectionList', {params: opts});
		      	},
		      	getLookbookPhotos: function (opts) {
		    		return $http.get('/api/lookbook/getList', {params: opts});
		      	},
		      	saveLookbookPhoto: function(opts){
		      		return $http.post('/api/lookbook/saveLookbook', $httpParamSerializer(opts), {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						}
					});
		      	},
		      	removeLookbookPhoto: function(opts){
		      		return $http.post('/api/lookbook/deleteLookbook', $httpParamSerializer(opts), {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						}
					});
		      	}
   			};
         }
    ]
)
.service(
	'Collection', 
	[
	    '$http', '$httpParamSerializer',
		function ($http, $httpParamSerializer) {
		    return {
		      	create: function (opts) {
		      		return $http.post('/api/collection/add', $httpParamSerializer(opts), {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						}
					});
		      	},
		      	modify: function (opts) {
		      		return $http.post('/api/collection/modify', $httpParamSerializer(opts), {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						}
					});
		      	},
		      	destroy: function (opts) {
		      		return $http.get('/api/collection/delete', {params: opts});
		      	},
		      	findById: function(opts){
		      		return $http.get('/api/collection/detail', {params: opts});
		      	},
		      	enable: function (opts) {
		      		return $http.get('/api/collection/enable', {params: opts});
		      	},
		      	close: function (opts) {
		      		return $http.get('/api/collection/close', {params: opts});
		      	},
		      	findAll: function(opts){
		      		return $http.get('/api/collection/list', {params: opts});
		      	},
		      	getProductList: function(opts){
		    		return $http.get('/api/product/list', {params: opts});
		    	},
		    	duplicationCheck: function (opts) {
		    		if (opts.key == 'name'){
		    			return $http.get('/api/collection/check', {
		    				params: {name: opts.value}
		    			});
		    		}
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
)
.service(
    'Product',
    [
     	'$http', '$httpParamSerializer',
		function ($http, $httpParamSerializer) {
			var productSizeTable = {
				dropdown__PRODUCT_CATEGORY__HAT: {
				    UK: ['6½', '6⅝', '6¾', '6⅞', '7', '7⅛', '7¼', '7⅜', '7½', '7⅝'], 
				    US: ['6⅜', '6½', '6⅝', '6¾', '6⅞', '7', '7⅛', '7¼', '7⅜', '7½'], 
				    IT: [52, 53, 54, 55, 56, 57, 58, 59, 60, 61], 
				    FR: [52, 53, 54, 55, 56, 57, 58, 59, 60, 61], 
				    DK: [52, 53, 54, 55, 56, 57, 58, 59, 60, 61], 
				    RU: [52, 53, 54, 55, 56, 57, 58, 59, 60, 61], 
				    DE: [52, 53, 54, 55, 56, 57, 58, 59, 60, 61], 
				    AU: [52, 53, 54, 55, 56, 57, 58, 59, 60, 61], 
				    JP: [52, 53, 54, 55, 56, 57, 58, 59, 60, 61], 
				    CN: [52, 53, 54, 55, 56, 57, 58, 59, 60, 61]
				},
				dropdown__PRODUCT_CATEGORY__TOP: {
				    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    US: [0, 2, 4, 6, 8, 10, 12, 14, 16], 
				    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52], 
				    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48], 
				    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54], 
				    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_CATEGORY__KNIT: {
				    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    US: [0, 2, 4, 6, 8, 10, 12, 14, 16], 
				    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52], 
				    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48], 
				    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54], 
				    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_CATEGORY__SHIRT: {
				    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    US: [0, 2, 4, 6, 8, 10, 12, 14, 16], 
				    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52], 
				    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48], 
				    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54], 
				    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_CATEGORY__DRESS: {
				    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    US: [0, 2, 4, 6, 8, 10, 12, 14, 16], 
				    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52], 
				    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48], 
				    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54], 
				    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_CATEGORY__JUMPSUIT: {
				    UK: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    US: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    IT: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    FR: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    DK: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    RU: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    DE: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    AU: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    JP: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_CATEGORY__COAT: {
				    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    US: [0, 2, 4, 6, 8, 10, 12, 14, 16], 
				    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52], 
				    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48], 
				    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54], 
				    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46], 
				    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_CATEGORY__SKIRT: {
				    UK: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    US: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    IT: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    FR: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    DK: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    RU: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    DE: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    AU: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    JP: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_CATEGORY__PANTS: {
				    UK: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
				    US: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
				    IT: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
				    FR: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
				    DK: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
				    RU: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
				    DE: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33], 
				    AU: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
				    JP: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33],
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_CATEGORY__BELT:{
				    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20], 
				    US: [0, 2, 4, 6, 8, 10, 12, 14, 16], 
				    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52], 
				    FR: [65, 70, 75, 80, 85, 90, 95, 100, 105], 
				    DK: [65, 70, 75, 80, 85, 90, 95, 100, 105], 
				    RU: [65, 70, 75, 80, 85, 90, 95, 100, 105], 
				    DE: [65, 70, 75, 80, 85, 90, 95, 100, 105], 
				    AU: [65, 70, 75, 80, 85, 90, 95, 100, 105], 
				    JP: [65, 70, 75, 80, 85, 90, 95, 100, 105], 
				    CN: [65, 70, 75, 80, 85, 90, 95, 100, 105]
				},
				dropdown__PRODUCT_CATEGORY__GLOVES:{
				    UK: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    US: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    IT: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    FR: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    DK: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    RU: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    DE: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    AU: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    JP: ['6', '6.5', '7/7.5', '8', '8.5/9'], 
				    CN: ['6', '6.5', '7/7.5', '8', '8.5/9']
				},
				dropdown__PRODUCT_CATEGORY__SHOES: {
				    UK: [1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9], 
				    US: [3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5], 
				    IT: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42], 
				    FR: [35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42, 42.5, 43], 
				    DK: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42], 
				    RU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42], 
				    DE: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42], 
				    AU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42], 
				    JP: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42], 
				    CN: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42]
				},
				dropdown__PRODUCT_CATEGORY__BAG: {
				    UK: ['S',  'M',  'L'], 
				    US: ['S',  'M',  'L'], 
				    IT: ['S',  'M',  'L'], 
				    FR: ['S',  'M',  'L'], 
				    DK: ['S',  'M',  'L'], 
				    RU: ['S',  'M',  'L'], 
				    DE: ['S',  'M',  'L'], 
				    AU: ['S',  'M',  'L'], 
				    JP: ['S',  'M',  'L'], 
				    CN: ['S',  'M',  'L']
				}
			};
			var materials = [
			    'Acetate',         'Acrylic',           'Aliginate_fiber',   'Angora',            'Artificial_cotton',
			    'Bast',            'Blend_fiber',       'Braid',             'Cotton',            'Cashmere',
			    'Cellulose_ester', 'Cellulose',         'Down',              'Elastane',          'Filament',
			    'Flax',            'Fur',               'Fur_garment',       'Hemp',              'Jute',
			    'Man_made_fiber',  'Modacrylic',        'Modal',             'Mohair',            'Natural_fiber',
			    'Nylon',           'Polyamide',         'Polymer',           'Polyester',         'Polyethylene',
			    'Polypropylene',   'Polyester_wadding', 'Rayon',             'Regenerated_fiber', 'Rabbit',
			    'Silk',            'Silk_wadding',      'Spandex_elastomer', 'Staple',            'Synthetic',
			    'Velvet',          'Viscose',           'Wool',              'Other'
			];
			var categories = [
		        'Hat', 'TOP', 'Knit', 'Shirt', 'Dress',
			    'Jumpsuit', 'Coat', 'Skirt', 'Pants', 'Bag',
			    'Gloves', 'Belt', 'Shoes'
			];
			var sizeRegions = [
			    'UK', 'US', 'IT', 'FR', 'DK', 'RU', 'DE', 'AU', 'JP', 'CN'
			];
		    return {
		      	create: function (opts) {
		      		return $http.post('/api/product/add', opts, {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						},
						transformRequest: function(data){
							var options = angular.copy(data);
							options.color = JSON.stringify(options.color);
							options.images = JSON.stringify(options.images);
							return $httpParamSerializer(options);
						}
					});
		      	},
		    	getCategories: function(){
		    		return categories;
		    	},
		    	getSizeRegions: function () {
		    		return sizeRegions;
		    	},
		    	getSizeCodes: function (category, region) {
		    		return productSizeTable[category][region];
		    	},
		    	getMaterials: function(){
		    		return materials;
		    	},
		    	destroy: function (opts) {
		      		return $http.get('/api/product/delete', {params: opts});
		      	},
			};
		}
	]
)
.service(
	'Message',
	[
		'$http',
		function ($http) {
			return {
				destroy: function (opts) {
					return $http.get('/api/message/delete', {params: opts});
				}
			};
		}
	]
);