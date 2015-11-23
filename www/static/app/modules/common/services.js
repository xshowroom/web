angular.module(
    'xShowroom.services', ['xShowroom.i18n']
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
		      	},
		      	modify: function (opts) {
		      		return $http.post('/api/collection/modify', opts, {
						headers: {
							"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"
						},
						transformRequest: postRequestTransformer
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
		function () {
			var productSizeTable = {
				dropdown__PRODUCT_HAT: {
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
				dropdown__PRODUCT_TOP: {
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
				dropdown__PRODUCT_KNIT: {
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
				dropdown__PRODUCT_SHIRT: {
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
				dropdown__PRODUCT_DRESS: {
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
				dropdown__PRODUCT_JUMPSUIT: {
				    UK: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    US: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    IT: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    FR: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    DK: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    RU: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    DE: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    AU: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    JP: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_COAT: {
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
				dropdown__PRODUCT_SKIRT: {
				    UK: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    US: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    IT: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    FR: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    DK: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    RU: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    DE: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    AU: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    JP: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_PANTS: {
				    UK: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    US: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    IT: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    FR: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    DK: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    RU: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    DE: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    AU: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    JP: [23, 24, 25, 26, 27, 27, 28, 29, 30, 31, 32, 32, 33], 
				    CN: ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL','3XL']
				},
				dropdown__PRODUCT_BELT:{
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
				dropdown__PRODUCT_GLOVES:{
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
				dropdown__PRODUCT_SHOES: {
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
				dropdown__PRODUCT_BAG: {
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
			    'Acetate',         'Acrylic',           'Aliginate fiber',   'Angora',            'Artificial cotton',
			    'Bast',            'Blend fiber',       'Braid',             'Cotton',            'Cashmere',
			    'Cellulose ester', 'Cellulose',         'Down',              'Elastane',          'Filament',
			    'Flax',            'Fur',               'Fur garment',       'Hemp',              'Jute',
			    'Man-made fiber',  'Modacrylic',        'Modal',             'Mohair',            'Natural fiber',
			    'Nylon',           'Polyamide',         'Polymer',           'Polyester',         'Polyethylene',
			    'Polypropylene',   'Polyester wadding', 'Rayon',             'Regenerated fiber', 'Rabbit',
			    'Silk',            'Silk wadding',      'Spandex/elastomer', 'Staple',            'Synthetic',
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
		    	getCategories: function(){
		    		return categories;
		    	},
		    	getSizeRegions: function () {
		    		return sizeRegions;
		    	},
		    	getSizeCodes: function (categoryIndex, region) {
		    		var categoryKey = 'dropdown__PRODUCT_' + categories[categoryIndex - 1].toUpperCase();
		    		return productSizeTable[categoryKey][region];
		    	},
		    	getMaterials: function(){
		    		return materials;
		    	}
		    	
			};
		}
	]
);