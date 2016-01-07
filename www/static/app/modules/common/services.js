angular.module(
    'xShowroom.services', ['ngLoadingSpinner', 'xShowroom.i18n']
)
.factory(
	'PostRequester',
	[
	 	'$http', '$httpParamSerializer',
	    function ($http, $httpParamSerializer) {
	    	return function(method, opts, transformRequest){
	    		opts = opts || {};
	    		opts.method = method;
	    		return $http.post('/api', opts, {
					headers: {
						"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
					},
					transformRequest: transformRequest || function(data){
						return $httpParamSerializer(data);
					} 
	    		});
	    	}
	    }
    ]
)
.service(
	'Order', 
	[
	    'PostRequester',
		function (PostRequester) {
	    	var STATUS_CODE = {
	    		ORDER_STATUS_PENDING: 0,
	    		ORDER_STATUS_CONFIRMED: 1,
	    		ORDER_STATUS_DEPOSITED: 2,
	    		ORDER_STATUS_PREPARING: 3,
	    		ORDER_STATUS_PAYBALANCE: 4,
	    		ORDER_STATUS_SHIPPED: 5,
	    		ORDER_STATUS_COMPLETE: 6,
	    		ORDER_STATUS_FULLPAYMENT: 7
	    	};
		    return {
		    	create: function (opts) {
		    		return PostRequester('order/createOrder', opts);
		    	},
		    	findAll: function (opts) {
		    		return PostRequester('order/getOrderList', opts);
		    	},
		    	findOne: function (opts) {
		    		return PostRequester('order/getOrder', opts);
		    	},
		    	getProcessByCollectionType: function (type) {
		    		return type == 'dropdown__COLLECTION_MODE__STOCK'
		    			? [
                           STATUS_CODE.ORDER_STATUS_PENDING, STATUS_CODE.ORDER_STATUS_CONFIRMED, 
                           STATUS_CODE.ORDER_STATUS_FULLPAYMENT, STATUS_CODE.ORDER_STATUS_PREPARING,
                           STATUS_CODE.ORDER_STATUS_SHIPPED, STATUS_CODE.ORDER_STATUS_COMPLETE
		    			]
			    		: [
	                       STATUS_CODE.ORDER_STATUS_PENDING, STATUS_CODE.ORDER_STATUS_CONFIRMED, 
	                       STATUS_CODE.ORDER_STATUS_DEPOSITED, STATUS_CODE.ORDER_STATUS_PREPARING,
	                       STATUS_CODE.ORDER_STATUS_PAYBALANCE, STATUS_CODE.ORDER_STATUS_SHIPPED,
	                       STATUS_CODE.ORDER_STATUS_COMPLETE
		    			];
		    	},
		    	updateStatus: function(opts){
		    		return PostRequester('order/updateStatus', opts);
		    	},
		    	updateInvoice: function(opts){
		    		return PostRequester('order/updateInvoice', opts);
		    	},
		    	updateShipNo: function(opts){
		    		return PostRequester('order/updateShipNo', opts);
		    	},
		    	updateShipAmount: function(opts){
		    		return PostRequester('order/updateShipAmount', opts);
		    	},
		    	updateComments: function(opts){
		    		return PostRequester('order/updateComments', opts);
		    	}
   			};
         }
    ]
)
.service(
	'Store', 
	[
	    'PostRequester', '$httpParamSerializer',
		function (PostRequester, $httpParamSerializer) {
		    return {
		    	create: function (opts) {
		    		return PostRequester('shop/save', opts, function(data){
						var options = angular.copy(data);
						options.shopImage = options.shopImage.length ? JSON.stringify(options.shopImage) : '[]';
						return $httpParamSerializer(options);
					});
		    	},
		      	destroy: function (opts) {
		      		return PostRequester('shop/delete', opts);
		      	},
		      	findOne: function(opts){
		      		return PostRequester('shop/detail', opts);
		      	}
   			};
         }
    ]
)
.service(
	'Cart', 
	[
	    'PostRequester',
		function (PostRequester) {
		    return {
		    	addProduct:function (opts) {
		    		return PostRequester('order/addToCart', opts);
		    	},
		      	removeProduct:function (opts) {
		      		return PostRequester('order/deleteFromCart', opts);
		      	},
		      	checkProduct: function(opts){
		      		return PostRequester('order/getFromCart', opts);
		      	},
		      	findAll: function(opts){
		      		return PostRequester('order/getListFromCart', opts);
		      	},
		      	findOne: function(opts){
		      		return PostRequester('order/getListFromCartByCollection', opts);
		      	}
   			};
         }
    ]
)
.service(
	'User', 
	[
	    'PostRequester',
		function (PostRequester) {
		    return {
		    	login: function (opts) {
		    		return PostRequester('login', opts);
		      	},
		      	register: function (opts) {
		      		return PostRequester('register', opts);
		      	},
		      	duplicationCheck: function (opts) {
		      		return PostRequester('register/checkParam', opts);
		    	},
				invitationCheck: function (opts) {
					return PostRequester('register/checkInvitationCode', opts);
				},
				changePassword: function(opts) {
					return PostRequester('user/changePassword', opts);
				}
   			};
         }
    ]
)
.service(
	'Buyer', 
	[
	    'PostRequester',
		function (PostRequester) {
		    return {
		    	checkAuth: function(opts){
		    		return PostRequester('buyer/checkAuth', opts);
		      	},
		      	applyAuth: function(opts){
		      		return PostRequester('buyer/apply', opts);
		      	},
		      	getStoreList: function(opts){
		      		return PostRequester('buyer/getStoreList', opts);
		      	},
		      	getMyBrandList: function(opts){
		      		return PostRequester('buyer/getBrandList', opts);
		      	},
		      	getAuthedShopList: function (opts) {
		      		return PostRequester('buyer/getAuthedShopByCollection', opts);
		    	},
		    	getMyStoreList: function (opts) {
		      		return PostRequester('buyer/getStoreList', opts);
		    	}
   			};
         }
    ]
)
.service(
	'Brand', 
	[
	    'PostRequester',
		function (PostRequester) {
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
	         		    'dropdown__COLLECTION__WOMEN', 'dropdown__COLLECTION__MEN', 'dropdown__COLLECTION__JEWELRY',
	         	        'dropdown__COLLECTION__ACCESSORIES', 'dropdown__COLLECTION__FOOTWEAR'
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
		    		return PostRequester('brand/list', opts);
		      	},
		      	query: function (opts) {
		      		return PostRequester('brand/query', opts);
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
		      		return PostRequester('guest/coverImgList', opts);
		      	},
		      	getCollectionList: function (opts){
		      		return PostRequester('buyer/getCollectionList', opts);
		      	},
		      	getLookbookPhotos: function (opts) {
		      		return PostRequester('lookbook/getList', opts);
		      	},
		      	saveLookbookPhoto: function(opts){
		      		return PostRequester('lookbook/saveLookbook', opts);
		      	},
		      	removeLookbookPhoto: function(opts){
		      		return PostRequester('lookbook/deleteLookbook', opts);
		      	}
   			};
         }
    ]
)
.service(
	'Collection', 
	[
	    'PostRequester',
		function (PostRequester) {
		    return {
		      	create: function (opts) {
		      		return PostRequester('collection/add', opts);
		      	},
		      	modify: function (opts) {
		      		return PostRequester('collection/modify', opts);
		      	},
		      	destroy: function (opts) {
		      		return PostRequester('collection/delete', opts);
		      	},
		      	findById: function(opts){
		      		return PostRequester('collection/detail', opts);
		      	},
		      	enable: function (opts) {
		      		return PostRequester('collection/enable', opts);
		      	},
		      	close: function (opts) {
		      		return PostRequester('collection/close', opts);
		      	},
		      	findAll: function(opts){
		      		return PostRequester('collection/list', opts);
		      	},
		      	getProductList: function(opts){
		      		return PostRequester('product/list', opts);
		    	},
		    	duplicationCheck: function (opts) {
		    		if (opts.key == 'name'){
		    			return PostRequester('collection/check', opts);
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
     	'PostRequester', '$httpParamSerializer',
		function (PostRequester, $httpParamSerializer) {
			var productSizeTable = {
                // Product Category – WOMEN
                dropdown__PRODUCT_CATEGORY__WOMEN__TOPS: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    US: [0, 2, 4, 6, 8, 10, 12, 14, 16,'ONE SIZE'],
                    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52,'ONE SIZE'],
                    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48,'ONE SIZE'],
                    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54,'ONE SIZE'],
                    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19,'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__SHIRTS: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    US: [0, 2, 4, 6, 8, 10, 12, 14, 16,'ONE SIZE'],
                    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52,'ONE SIZE'],
                    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48,'ONE SIZE'],
                    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54,'ONE SIZE'],
                    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19,'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__DRESSES: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    US: [0, 2, 4, 6, 8, 10, 12, 14, 16,'ONE SIZE'],
                    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52,'ONE SIZE'],
                    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48,'ONE SIZE'],
                    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54,'ONE SIZE'],
                    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19,'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__JUMPSUITS: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    US: [0, 2, 4, 6, 8, 10, 12, 14, 16,'ONE SIZE'],
                    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52,'ONE SIZE'],
                    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48,'ONE SIZE'],
                    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54,'ONE SIZE'],
                    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19,'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__OUTERWEAR: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    US: [0, 2, 4, 6, 8, 10, 12, 14, 16,'ONE SIZE'],
                    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52,'ONE SIZE'],
                    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48,'ONE SIZE'],
                    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54,'ONE SIZE'],
                    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19,'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__KNITWEAR: {
                    UK: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    US: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    IT: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    FR: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    DK: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    RU: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    DE: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    AU: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    JP: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__SWEATSHIRT: {
                    UK: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    US: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    IT: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    FR: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    DK: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    RU: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    DE: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    AU: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    JP: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__JEANS: {
                    UK: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    US: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    IT: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    FR: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    DK: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    RU: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    DE: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    AU: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    JP: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE'],
                    CN: [23, 24, 25, 26, 27, 28, 29, 30, 31, 32,'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__SKIRTS: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    US: [0, 2, 4, 6, 8, 10, 12, 14, 16,'ONE SIZE'],
                    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52,'ONE SIZE'],
                    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48,'ONE SIZE'],
                    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54,'ONE SIZE'],
                    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19,'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__PANTS: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    US: [0, 2, 4, 6, 8, 10, 12, 14, 16,'ONE SIZE'],
                    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52,'ONE SIZE'],
                    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48,'ONE SIZE'],
                    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54,'ONE SIZE'],
                    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19,'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__WOMEN__SWIMWEAR: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    US: [0, 2, 4, 6, 8, 10, 12, 14, 16,'ONE SIZE'],
                    IT: [36, 38, 40, 42, 44, 46, 48, 50, 52,'ONE SIZE'],
                    FR: [32, 34, 36, 38, 40, 42, 44, 46, 48,'ONE SIZE'],
                    DK: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    RU: [38, 40, 42, 44, 46, 48, 50, 52, 54,'ONE SIZE'],
                    DE: [30, 32, 34, 36, 38, 40, 42, 44, 46,'ONE SIZE'],
                    AU: [4, 6, 8, 10, 12, 14, 16, 18, 20,'ONE SIZE'],
                    JP: [3, 5, 7, 9, 11, 13, 15, 17, 19,'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL','ONE SIZE']
                },
                // Product Category - MEN
                dropdown__PRODUCT_CATEGORY__MEN__SHIRTS: {
                    UK: [14.5, 15, 15.5, 16, 16.5, 17, 17.5, 18, 'ONE SIZE'],
                    US: [14.5, 15, 15.5, 16, 16.5, 17, 17.5, 18, 'ONE SIZE'],
                    IT: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    FR: [37, 38, 39, 41, 42, 43, 44, 45, 'ONE SIZE'],
                    DK: [37, 38, 39, 41, 42, 43, 44, 45, 'ONE SIZE'],
                    RU: [37, 38, 39, 41, 42, 43, 44, 45, 'ONE SIZE'],
                    DE: [37, 38, 39, 41, 42, 43, 44, 45, 'ONE SIZE'],
                    AU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    JP: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    CN: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__MEN__TOPS_TSHIRT: {
                    UK: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    US: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    IT: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    FR: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    DK: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    RU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    DE: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    AU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    JP: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    CN: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__MEN__OUTERWEAR: {
                    UK: [34, 36, 38, 40, 42, 44, 46, 48, 'ONE SIZE'],
                    US: [34, 36, 38, 40, 42, 44, 46, 48, 'ONE SIZE'],
                    IT: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    FR: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    DK: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    RU: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    DE: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    AU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    JP: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    CN: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__MEN__BLAZERS: {
                    UK: [34, 36, 38, 40, 42, 44, 46, 48, 'ONE SIZE'],
                    US: [34, 36, 38, 40, 42, 44, 46, 48, 'ONE SIZE'],
                    IT: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    FR: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    DK: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    RU: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    DE: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    AU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    JP: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    CN: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__MEN__KNITWEAR: {
                    UK: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    US: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    IT: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    FR: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    DK: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    RU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    DE: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    AU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    JP: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    CN: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__MEN__SWEATSHIRT: {
                    UK: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    US: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    IT: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    FR: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    DK: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    RU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    DE: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    AU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    JP: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    CN: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__MEN__JEANS: {
                    UK: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    US: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    IT: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    FR: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    DK: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    RU: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    DE: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    AU: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    JP: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    CN: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__MEN__PANTS: {
                    UK: [28, 30, 32, 34, 36, 38, 40, 42, 'ONE SIZE'],
                    US: [28, 30, 32, 34, 36, 38, 40, 42, 'ONE SIZE'],
                    IT: [44, 46, 48, 50, 52, 54, 56, 58, 'ONE SIZE'],
                    FR: [36, 38, 40, 42, 44, 46, 48, 50, 'ONE SIZE'],
                    DK: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    RU: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    DE: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    AU: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    JP: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE'],
                    CN: [28, 29, 30, 31, 32, 33, 34, 35, 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__MEN__SWIMWEAR: {
                    UK: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    US: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    IT: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    FR: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    DK: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    RU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    DE: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    AU: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    JP: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE'],
                    CN: ['XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', '4XL', 'ONE SIZE']
                },
                // Product Category - JEWELRY
                dropdown__PRODUCT_CATEGORY__JEWELRY__BRACELETS: {
                    UK:['S','M','L','ONE SIZE'],
                    US: ['S','M','L','ONE SIZE'],
                    IT:	['S','M','L','ONE SIZE'],
                    FR: ['S','M','L','ONE SIZE'],
                    DK: ['S','M','L','ONE SIZE'],
                    RU: ['S','M','L','ONE SIZE'],
                    DE: ['S','M','L','ONE SIZE'],
                    AU: ['S','M','L','ONE SIZE'],
                    JP: ['S','M','L','ONE SIZE'],
                    CN: ['S','M','L','ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__JEWELRY__EARRINGS: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__JEWELRY__NECKLACES_PENDANTS: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__JEWELRY__RINGS: {
                    UK: ['H-1/2', 'I', 'I-1/2', 'J', 'J-1/2', 'K', 'K-1/2', 'L', 'L-1/2', 'M', 'M-1/2', 'N', 'N-1/2', 'O', 'O-1/2', 'P', 'P-1/2', 'Q', 'Q-1/2', 'R', 'R-1/2', 'ONE SIZE'],
                    US: ['4', '4-1/4', '4-1/2', '4-3/4', '5', '5-1/4', '5-1/2', '5-3/4', '6', '6-1/4', '6-1/2', '6-3/4', '7', '7-1/4', '7-1/2', '7-3/4', '8', '8-1/4', '8-1/2', '8-3/4', '9', 'ONE SIZE'],
                    IT: ['8', '8/9', '9', '10', '10/11', '11', '12', '12/13', '13', '14', '14/15', '15', '15/16', '16', '17', '17/18', '18', '18/19', '19', '19/20', '20', 'ONE SIZE'],
                    FR: [46, 47, 48, 49, 49.5, 50, 50.5, 51, 52, 53, 53.5, 54, 54.5, 55, 55.5, 56, 57, 58, 58.5, 59, 60, 'ONE SIZE'],
                    DK: [46, 47, 48, 49, 49.5, 50, 50.5, 51, 52, 53, 53.5, 54, 54.5, 55, 55.5, 56, 57, 58, 58.5, 59, 60, 'ONE SIZE'],
                    RU: [46, 47, 48, 49, 49.5, 50, 50.5, 51, 52, 53, 53.5, 54, 54.5, 55, 55.5, 56, 57, 58, 58.5, 59, 60, 'ONE SIZE'],
                    DE: [46, 47, 48, 49, 49.5, 50, 50.5, 51, 52, 53, 53.5, 54, 54.5, 55, 55.5, 56, 57, 58, 58.5, 59, 60, 'ONE SIZE'],
                    AU: ['H-1/2', 'I', 'I-1/2', 'J', 'J-1/2', 'K', 'K-1/2', 'L', 'L-1/2', 'M', 'M-1/2', 'N', 'N-1/2', 'O', 'O-1/2', 'P', 'P-1/2', 'Q', 'Q-1/2', 'R', 'R-1/2', 'ONE SIZE'],
                    JP: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 22, 23, 24, 25, 26, 27, 28, 29, 'ONE SIZE'],
                    CN: [4,5,6,7,8,9,10,11,12,13,14,'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__JEWELRY__BODY_HAND_CHAINS: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__JEWELRY__BROOCH: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__JEWELRY__CUFFLINKS: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                // Product Category - ACCESSORIES
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__WATCHES: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__BAGS: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__BELTS: {
                    UK: [4, 6, 8, 10, 12, 14, 16, 18, 20, 'ONE SIZE'],
                    US: ['00', '0', '2-4', '4-6', '8', '10', '12', '14', '16', 'ONE SIZE'],
                    IT: [65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 'ONE SIZE'],
                    FR: [65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 'ONE SIZE'],
                    DK: [65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 'ONE SIZE'],
                    RU: [65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 'ONE SIZE'],
                    DE: [65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 'ONE SIZE'],
                    AU: [65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 'ONE SIZE'],
                    JP: [65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 'ONE SIZE'],
                    CN: [65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__GLOVES: {
                    UK: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', 'ONE SIZE'],
                    US: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', 'ONE SIZE'],
                    IT: ['6', '6.5', '7/7.5', '8', '8.5/9', 'ONE SIZE'],
                    FR: ['6', '6.5', '7/7.5', '8', '8.5/9', 'ONE SIZE'],
                    DK: ['6', '6.5', '7/7.5', '8', '8.5/9', 'ONE SIZE'],
                    RU: ['6', '6.5', '7/7.5', '8', '8.5/9', 'ONE SIZE'],
                    DE: ['6', '6.5', '7/7.5', '8', '8.5/9', 'ONE SIZE'],
                    AU: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', 'ONE SIZE'],
                    JP: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', 'ONE SIZE'],
                    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__HAIR_ACCESSORIES: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__HATS: {
                    UK: ['6-3/8', '6-1/2', '6-5/8', '6-3/4', '6-7/8', '7', '7-1/8', '7-1/4', '7-3/8', '7-1/2', 'ONE SIZE'],
                    US: ['6-1/2', '6-5/8', '6-3/4', '6-7/8', '7', '7-1/8', '7-1/4', '7-3/8', '7-1/2', '7-5/8', 'ONE SIZE'],
                    IT: [52,53,54,55,56,57,58,59,60,61, 'ONE SIZE'],
                    FR: [52,53,54,55,56,57,58,59,60,61, 'ONE SIZE'],
                    DK: [52,53,54,55,56,57,58,59,60,61, 'ONE SIZE'],
                    RU: [52,53,54,55,56,57,58,59,60,61, 'ONE SIZE'],
                    DE: [52,53,54,55,56,57,58,59,60,61, 'ONE SIZE'],
                    AU: [52,53,54,55,56,57,58,59,60,61, 'ONE SIZE'],
                    JP: [52,53,54,55,56,57,58,59,60,61, 'ONE SIZE'],
                    CN:[ 'XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL', 'ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__HOME_LIFESTYLE: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__SCARVES_WRAPS: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__SOCKS_TIGHTS: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__SUNGLASSES: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                dropdown__PRODUCT_CATEGORY__ACCESSORIES__TECH_ACCESSORIES: {
                    UK: ['ONE SIZE'],
                    US: ['ONE SIZE'],
                    IT: ['ONE SIZE'],
                    FR: ['ONE SIZE'],
                    DK: ['ONE SIZE'],
                    RU: ['ONE SIZE'],
                    DE: ['ONE SIZE'],
                    AU: ['ONE SIZE'],
                    JP: ['ONE SIZE'],
                    CN: ['ONE SIZE']
                },
                // Product Category - FOOTWEAR
                dropdown__PRODUCT_CATEGORY__FOOTWEAR__BOOTS: {
                    UK: [1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5],
                    US: [4,4.5,5, 5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13, 13.5],
                    IT: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    FR: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DK: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    RU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DE: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    AU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    JP: [20.5, 21, 21.5, 22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26, 26.5, 27, 27.5],
                    CN: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45]
                },
                dropdown__PRODUCT_CATEGORY__FOOTWEAR__FLATS: {
                    UK: [1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5],
                    US: [4,4.5,5, 5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13, 13.5],
                    IT: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    FR: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DK: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    RU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DE: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    AU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    JP: [20.5, 21, 21.5, 22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26, 26.5, 27, 27.5],
                    CN: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45]
                },
                dropdown__PRODUCT_CATEGORY__FOOTWEAR__PUMPS: {
                    UK: [1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5],
                    US: [4,4.5,5, 5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13, 13.5],
                    IT: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    FR: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DK: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    RU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DE: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    AU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    JP: [20.5, 21, 21.5, 22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26, 26.5, 27, 27.5],
                    CN: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45]
                },
                dropdown__PRODUCT_CATEGORY__FOOTWEAR__SANDALS: {
                    UK: [1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5],
                    US: [4,4.5,5, 5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13, 13.5],
                    IT: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    FR: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DK: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    RU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DE: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    AU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    JP: [20.5, 21, 21.5, 22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26, 26.5, 27, 27.5],
                    CN: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45]
                },
                dropdown__PRODUCT_CATEGORY__FOOTWEAR__SNEAKERS: {
                    UK: [1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5],
                    US: [4,4.5,5, 5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13, 13.5],
                    IT: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    FR: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DK: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    RU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    DE: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    AU: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45],
                    JP: [20.5, 21, 21.5, 22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26, 26.5, 27, 27.5],
                    CN: [34, 34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42.5, 43, 43.5, 44, 44.5, 45]
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
                'dropdown__PRODUCT_CATEGORY__WOMEN__TOPS',
                'dropdown__PRODUCT_CATEGORY__WOMEN__SHIRTS',
                'dropdown__PRODUCT_CATEGORY__WOMEN__DRESSES',
                'dropdown__PRODUCT_CATEGORY__WOMEN__JUMPSUITS',
                'dropdown__PRODUCT_CATEGORY__WOMEN__OUTERWEAR',
                'dropdown__PRODUCT_CATEGORY__WOMEN__KNITWEAR',
                'dropdown__PRODUCT_CATEGORY__WOMEN__SWEATSHIRT',
                'dropdown__PRODUCT_CATEGORY__WOMEN__JEANS',
                'dropdown__PRODUCT_CATEGORY__WOMEN__SKIRTS',
                'dropdown__PRODUCT_CATEGORY__WOMEN__PANTS',
                'dropdown__PRODUCT_CATEGORY__WOMEN__SWIMWEAR'
            ];
            var categoriesByCollection = {
                dropdown__COLLECTION__WOMEN: [
                    'dropdown__PRODUCT_CATEGORY__WOMEN__TOPS',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__SHIRTS',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__DRESSES',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__JUMPSUITS',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__OUTERWEAR',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__KNITWEAR',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__SWEATSHIRT',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__JEANS',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__SKIRTS',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__PANTS',
                    'dropdown__PRODUCT_CATEGORY__WOMEN__SWIMWEAR'
                ],
                dropdown__COLLECTION__MEN: [
                    'dropdown__PRODUCT_CATEGORY__MEN__SHIRTS',
                    'dropdown__PRODUCT_CATEGORY__MEN__TOPS_TSHIRT',
                    'dropdown__PRODUCT_CATEGORY__MEN__OUTERWEAR',
                    'dropdown__PRODUCT_CATEGORY__MEN__BLAZERS',
                    'dropdown__PRODUCT_CATEGORY__MEN__KNITWEAR',
                    'dropdown__PRODUCT_CATEGORY__MEN__SWEATSHIRT',
                    'dropdown__PRODUCT_CATEGORY__MEN__JEANS',
                    'dropdown__PRODUCT_CATEGORY__MEN__PANTS',
                    'dropdown__PRODUCT_CATEGORY__MEN__SWIMWEAR'
                ],
                dropdown__COLLECTION__JEWELRY: [
                    'dropdown__PRODUCT_CATEGORY__JEWELRY__BRACELETS',
                    'dropdown__PRODUCT_CATEGORY__JEWELRY__EARRINGS',
                    'dropdown__PRODUCT_CATEGORY__JEWELRY__NECKLACES_PENDANTS',
                    'dropdown__PRODUCT_CATEGORY__JEWELRY__RINGS',
                    'dropdown__PRODUCT_CATEGORY__JEWELRY__BODY_HAND_CHAINS',
                    'dropdown__PRODUCT_CATEGORY__JEWELRY__BROOCH',
                    'dropdown__PRODUCT_CATEGORY__JEWELRY__CUFFLINKS'
                ],
                dropdown__COLLECTION__ACCESSORIES: [
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__WATCHES',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__BAGS',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__BELTS',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__GLOVES',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__HAIR_ACCESSORIES',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__HATS',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__HOME_LIFESTYLE',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__SCARVES_WRAPS',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__SOCKS_TIGHTS',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__SUNGLASSES',
                    'dropdown__PRODUCT_CATEGORY__ACCESSORIES__TECH_ACCESSORIES',
                ],
                dropdown__COLLECTION__FOOTWEAR: [
                    'dropdown__PRODUCT_CATEGORY__FOOTWEAR__BOOTS',
                    'dropdown__PRODUCT_CATEGORY__FOOTWEAR__FLATS',
                    'dropdown__PRODUCT_CATEGORY__FOOTWEAR__PUMPS',
                    'dropdown__PRODUCT_CATEGORY__FOOTWEAR__SANDALS',
                    'dropdown__PRODUCT_CATEGORY__FOOTWEAR__SNEAKERS',
                ]
            };
			var sizeRegions = [
			    'UK', 'US', 'IT', 'FR', 'DK', 'RU', 'DE', 'AU', 'JP', 'CN'
			];
		    return {
		      	create: function (opts) {
		      		return PostRequester('product/add', opts, function(data){
						var options = angular.copy(data);
						options.color = JSON.stringify(options.color);
						options.images = JSON.stringify(options.images);
						return $httpParamSerializer(options);
					});
		      	},
		    	getCategories: function(){
		    		return categories;
		    	},
                getCategoriesByCollection: function(collectCategory){
                    return categoriesByCollection[collectCategory];
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
		    		return PostRequester('product/delete', opts);
		      	},
		      	findOne: function (opts) {
		    		return PostRequester('product/detail', opts);
		      	},
		      	modify: function (opts) {
		    		return PostRequester('product/modify', opts);
		      	}
			};
		}
	]
)
.service(
	'Message',
	[
		'PostRequester',
		function (PostRequester) {
			return {
				destroy: function (opts) {
					return PostRequester('message/delete', opts);
				},
				getUnReadCount: function (opts) {
					return PostRequester('message/unreadCount', opts);
				}
			};
		}
	]
)
.service(
	'Admin',
	[
		'PostRequester',
		function (PostRequester) {
			return {
				allowUser: function (opts) {
					return PostRequester('admin/allowUser', opts);
				},
				rejectUser: function (opts) {
					return PostRequester('admin/rejectUser', opts);
				},
				allowStore: function (opts) {
					return PostRequester('admin/allowStore', opts);
				},
				rejectStore: function (opts) {
					return PostRequester('admin/rejectStore', opts);
				}
			};
		}
	]
);
