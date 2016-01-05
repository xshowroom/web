angular.module(
    'xShowroom.services', ['xShowroom.i18n']
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
