/**
 * @file dictionary of xshowroom
 * @author tangxiaotao
 *
 */
angular.module('xShowroom.dictionary', [])
    .constant('dictionary', {
        /**
         * JS files
         */
        // directives.js
        directives_js__UPLOADING: 'UPLOADING IMAGE',
        directives_js__UPLOAD: 'UPLOAD',
        directives_js__FILE_SIZE: 'File size limit is 2MB',

        // login.js
        login__EMAIL_PATTERN_ERROR: 'email address is not valid！',

        /**
         * Modal
         */
        modal__title__ERROR: 'ERROR INFO',
        modal__msg__error__SYSTEM_ERROR: 'System Error',
        modal__msg__error__ORDER_NOT_ENOUGH: 'Not reach the minimum order, please select more products!',
        modal__msg__error__ORDER_NOT_SELECT_SHIP_ADDRESS: 'Please select ship address for this order!',
        modal__msg__error__ORDER_NOT_SELECT_PAYMENT_METHOD: 'Please select payment method for this order!',
        modal__msg__error__PDF_TYPE_ERROR: 'Please upload a PDF file!',
        modal__msg__error__PDF_SIZE_ERROR: 'Upload file is no more than 2MB',
        modal__msg__error__PDF_TIMEOUT: 'Upload file timeout, please retry!',
        modal__msg__error__PDF_UPLOAD_ERROR: 'Upload failed, please retry!',
        modal__msg__error__INVOICE_ERROR: 'You have not submit invoice file!',
        modal__msg__error__SHIP_INFO: 'Shipping info is blank!',
        modal__msg__error__SHIP_FEE: 'Not a number in shipping fee',

        modal__title__SUCCESS: 'SUCCESS',
        modal__success__INVOICE_UPLOADED: 'Submit invoice success！',

        modal__confirm__DELETE_STORE: 'Delete this store?',

        /**
         * Error Message
         */
        email_EMPTY_ERROR: 'please input your Email',
        email_PATTERN_ERROR: 'invalid Email',
        email_DUPLICATION_ERROR: 'Email has been registered',
        pass_EMPTY_ERROR: 'please input your password',
        pass_PATTERN_ERROR: 'invalid password (Must contain at least 6 characters)',
        firstName_EMPTY_ERROR: 'please input your first name',
        firstName_PATTERN_ERROR: 'invalid first name',
        lastName_EMPTY_ERROR: 'please input your last name',
        lastName_PATTERN_ERROR: 'invalid last name',
        displayName_EMPTY_ERROR: 'please input your display name',
        displayName_PATTERN_ERROR: 'invalid display name',
        tel_EMPTY_ERROR: 'please input your telephone',
        tel_PATTERN_ERROR: 'invalid telephone',

        brandName_EMPTY_ERROR: 'please input your brand name',
        brandName_DUPLICATION_ERROR: 'this brand name is exist',
        designerName_EMPTY_ERROR: 'please input your designers',
        brandUrl_EMPTY_ERROR: 'please input your brand url',
        categoryType_EMPTY_ERROR: 'please select category for your brand',
        brandUrl_PATTERN_ERROR: 'only number and character is allowed in URL',
        brandUrl_DUPLICATION_ERROR: 'this brand url is exist',

        shopName_EMPTY_ERROR: 'please input your store name',
        shopName_PATTERN_ERROR: 'invalid store name',
        shopType_EMPTY_ERROR: 'please select store type',
        collectionType_EMPTY_ERROR: 'please select collection type',
        brandList_EMPTY_ERROR: 'please input brand list',
        shopWebsite_EMPTY_ERROR: 'please input store web url',
        shopWebsite_PATTERN_ERROR: 'please input valid url, eg: http://www.example.com',
        shopAddress_EMPTY_ERROR: 'please input store address',
        shopShipAddress_EMPTY_ERROR: 'please input store shipping address',
        shopCountry_EMPTY_ERROR: 'please select country',
        shopZipcode_EMPTY_ERROR: 'please input zip code',
        shopTel_EMPTY_ERROR: 'please input telephone',
        shopTel_PATTERN_ERROR: 'invalid telephone',

        imagePath_EMPTY_ERROR: 'please upload the picture',

        companyName_EMPTY_ERROR: 'please input company name',
        companyName_PATTERN_ERROR: 'invalid company name',
        companyAddr_EMPTY_ERROR: 'please input company address',
        companyCountry_EMPTY_ERROR: 'please select country',
        companyZip_EMPTY_ERROR: 'please input zip code',
        companyTel_EMPTY_ERROR: 'please input telephone',
        companyTel_PATTERN_ERROR: 'invalid telephone',
        companyWebsite_EMPTY_ERROR: 'please input your company website',
        companyWebsite_PATTERN_ERROR: 'please input valid url, eg: http://www.example.com',

        acceptCondition_EMPTY_ERROR: 'please accept XSHOWROOM terms and conditions',

        collection_name_EMPTY_ERROR: 'please input collection name',
        collection_name_DUPLICATION_ERROR: 'collect name is duplicate',
        collection_category_EMPTY_ERROR: 'please input collection category',
        collection_mode_EMPTY_ERROR: 'please input collection mode',
        collection_season_EMPTY_ERROR: 'please input collection season',
        collection_order_EMPTY_ERROR: 'please input minimum order',
        collection_order_PATTERN_ERROR: 'invalid minimum order',
        collection_currency_EMPTY_ERROR: 'please select currency',
        collection_deadline_DATE_ERROR: 'invalid collection deadline date',
        collection_delivery_DATE_ERROR: 'invalid delivery date',
        collection_description_EMPTY_ERROR: 'please input collection description',
        collection_image_EMPTY_ERROR: 'please upload collection photo',

        product_name_EMPTY_ERROR: 'please input product name',
        product_category_EMPTY_ERROR: 'please input product category',
        product_styleNum_EMPTY_ERROR: 'please input product style number',
        product_wholePrice_EMPTY_ERROR: 'please input product whole price',
        product_wholePrice_PATTERN_ERROR: 'invalid product whole price',
        product_retailPrice_EMPTY_ERROR: 'please input product retail price',
        product_retailPrice_PATTERN_ERROR: 'invalid product retail price',
        product_sizeRegion_EMPTY_ERROR: 'please select size region ',
        product_sizeCode_EMPTY_ERROR: 'please select product size',
        product_color_EMPTY_ERROR: 'please select product color set',
        product_madeIn_EMPTY_ERROR: 'please select product made in',
        product_material_EMPTY_ERROR: 'please select product material',
        product_careIns_EMPTY_ERROR: 'please input product detail',
        product_images_EMPTY_ERROR: 'please upload product images ',
        product_add_image_unnamed_error: 'input the name for upload color',
        product_add_image_format_error: 'not support file type',
        product_add_image_timeout_error: 'upload image timeout, please retry',
        product_add_image_size_error: 'image size no more than 1 MB',

        password_old_EMPTY_ERROR: 'please input old password',
        password_new_EMPTY_ERROR: 'please input new password',
        password_confirm_EMPTY_ERROR: 'please confirm new password',
        password_new_SAME_ERROR: 'old password cannot be same as new password',
        password_new_NOT_SAME_ERROR: 'input for the new password not match',
        password_new_PATTERN_ERROR: 'invalid new password (Must contain at least 6 characters)',
        password_confirm_PATTERN_ERROR: 'invalid confirm password (Must contain at least 6 characters)',

        /**
         * DROP DOWN LIST
         */
        // Country
        dropdown__COUNTRY__Angola: 'Angola',
        dropdown__COUNTRY__Afghanistan: 'Afghanistan',
        dropdown__COUNTRY__Albania: 'Albania',
        dropdown__COUNTRY__Algeria: 'Algeria',
        dropdown__COUNTRY__Andorra: 'Andorra',
        dropdown__COUNTRY__Anguilla: 'Anguilla',
        dropdown__COUNTRY__AntiguaandBarbuda: 'Antiguaand Barbuda',
        dropdown__COUNTRY__Argentina: 'Argentina',
        dropdown__COUNTRY__Armenia: 'Armenia',
        dropdown__COUNTRY__Ascension: 'Ascension',
        dropdown__COUNTRY__Australia: 'Australia',
        dropdown__COUNTRY__Austria: 'Austria',
        dropdown__COUNTRY__Azerbaijan: 'Azerbaijan',
        dropdown__COUNTRY__Bahamas: 'Bahamas',
        dropdown__COUNTRY__Bahrain: 'Bahrain',
        dropdown__COUNTRY__Bangladesh: 'Bangladesh',
        dropdown__COUNTRY__Barbados: 'Barbados',
        dropdown__COUNTRY__Belarus: 'Belarus',
        dropdown__COUNTRY__Belgium: 'Belgium',
        dropdown__COUNTRY__Belize: 'Belize',
        dropdown__COUNTRY__Benin: 'Benin',
        dropdown__COUNTRY__BermudaIs: 'BermudaIs.',
        dropdown__COUNTRY__Bolivia: 'Bolivia',
        dropdown__COUNTRY__Botswana: 'Botswana',
        dropdown__COUNTRY__Brazil: 'Brazil',
        dropdown__COUNTRY__Brunei: 'Brunei',
        dropdown__COUNTRY__Bulgaria: 'Bulgaria',
        dropdown__COUNTRY__Burkina_faso: 'Burkina-faso',
        dropdown__COUNTRY__Burma: 'Burma',
        dropdown__COUNTRY__Burundi: 'Burundi',
        dropdown__COUNTRY__Cameroon: 'Cameroon',
        dropdown__COUNTRY__Canada: 'Canada',
        dropdown__COUNTRY__CaymanIs: 'CaymanIs.',
        dropdown__COUNTRY__CentralAfricanRepublic: 'Central African Republic',
        dropdown__COUNTRY__Chad: 'Chad',
        dropdown__COUNTRY__Chile: 'Chile',
        dropdown__COUNTRY__China: 'China',
        dropdown__COUNTRY__Colombia: 'Colombia',
        dropdown__COUNTRY__Congo: 'Congo',
        dropdown__COUNTRY__CookIs: 'CookIs.',
        dropdown__COUNTRY__CostaRica: 'Costa Rica',
        dropdown__COUNTRY__Cuba: 'Cuba',
        dropdown__COUNTRY__Cyprus: 'Cyprus',
        dropdown__COUNTRY__CzechRepublic: 'Czech Republic',
        dropdown__COUNTRY__Denmark: 'Denmark',
        dropdown__COUNTRY__Djibouti: 'Djibouti',
        dropdown__COUNTRY__DominicaRep: 'Dominica Rep.',
        dropdown__COUNTRY__Ecuador: 'Ecuador',
        dropdown__COUNTRY__Egypt: 'Egypt',
        dropdown__COUNTRY__EISalvador: 'EISalvador',
        dropdown__COUNTRY__Estonia: 'Estonia',
        dropdown__COUNTRY__Ethiopia: 'Ethiopia',
        dropdown__COUNTRY__Fiji: 'Fiji',
        dropdown__COUNTRY__Finland: 'Finland',
        dropdown__COUNTRY__France: 'France',
        dropdown__COUNTRY__FrenchGuiana: 'French Guiana',
        dropdown__COUNTRY__Gabon: 'Gabon',
        dropdown__COUNTRY__Gambia: 'Gambia',
        dropdown__COUNTRY__Georgia: 'Georgia',
        dropdown__COUNTRY__Germany: 'Germany',
        dropdown__COUNTRY__Ghana: 'Ghana',
        dropdown__COUNTRY__Gibraltar: 'Gibraltar',
        dropdown__COUNTRY__Greece: 'Greece',
        dropdown__COUNTRY__Grenada: 'Grenada',
        dropdown__COUNTRY__Guam: 'Guam',
        dropdown__COUNTRY__Guatemala: 'Guatemala',
        dropdown__COUNTRY__Guinea: 'Guinea',
        dropdown__COUNTRY__Guyana: 'Guyana',
        dropdown__COUNTRY__Haiti: 'Haiti',
        dropdown__COUNTRY__Honduras: 'Honduras',
        dropdown__COUNTRY__Hongkong: 'Hongkong',
        dropdown__COUNTRY__Hungary: 'Hungary',
        dropdown__COUNTRY__Iceland: 'Iceland',
        dropdown__COUNTRY__India: 'India',
        dropdown__COUNTRY__Indonesia: 'Indonesia',
        dropdown__COUNTRY__Iran: 'Iran',
        dropdown__COUNTRY__Iraq: 'Iraq',
        dropdown__COUNTRY__Ireland: 'Ireland',
        dropdown__COUNTRY__Israel: 'Israel',
        dropdown__COUNTRY__Italy: 'Italy',
        dropdown__COUNTRY__IvoryCoast: 'IvoryCoast',
        dropdown__COUNTRY__Jamaica: 'Jamaica',
        dropdown__COUNTRY__Japan: 'Japan',
        dropdown__COUNTRY__Jordan: 'Jordan',
        dropdown__COUNTRY__Kampuchea_Cambodia: 'Kampuchea(Cambodia)',
        dropdown__COUNTRY__Kazakstan: 'Kazakstan',
        dropdown__COUNTRY__Kenya: 'Kenya',
        dropdown__COUNTRY__Korea: 'Korea',
        dropdown__COUNTRY__Kuwait: 'Kuwait',
        dropdown__COUNTRY__Kyrgyzstan: 'Kyrgyzstan',
        dropdown__COUNTRY__Laos: 'Laos',
        dropdown__COUNTRY__Latvia: 'Latvia',
        dropdown__COUNTRY__Lebanon: 'Lebanon',
        dropdown__COUNTRY__Lesotho: 'Lesotho',
        dropdown__COUNTRY__Liberia: 'Liberia',
        dropdown__COUNTRY__Libya: 'Libya',
        dropdown__COUNTRY__Liechtenstein: 'Liechtenstein',
        dropdown__COUNTRY__Lithuania: 'Lithuania',
        dropdown__COUNTRY__Luxembourg: 'Luxembourg',
        dropdown__COUNTRY__Macao: 'Macao',
        dropdown__COUNTRY__Madagascar: 'Madagascar',
        dropdown__COUNTRY__Malawi: 'Malawi',
        dropdown__COUNTRY__Malaysia: 'Malaysia',
        dropdown__COUNTRY__Maldives: 'Maldives',
        dropdown__COUNTRY__Mali: 'Mali',
        dropdown__COUNTRY__Malta: 'Malta',
        dropdown__COUNTRY__MarianaIs: 'MarianaIs',
        dropdown__COUNTRY__Martinique: 'Martinique',
        dropdown__COUNTRY__Mauritius: 'Mauritius',
        dropdown__COUNTRY__Mexico: 'Mexico',
        dropdown__COUNTRY__Moldova_Republicof: 'Moldova,Republicof',
        dropdown__COUNTRY__Monaco: 'Monaco',
        dropdown__COUNTRY__Mongolia: 'Mongolia',
        dropdown__COUNTRY__MontserratIs: 'MontserratIs',
        dropdown__COUNTRY__Morocco: 'Morocco',
        dropdown__COUNTRY__Mozambique: 'Mozambique',
        dropdown__COUNTRY__Namibia: 'Namibia',
        dropdown__COUNTRY__Nauru: 'Nauru',
        dropdown__COUNTRY__Nepal: 'Nepal',
        dropdown__COUNTRY__NetheriandsAntilles: 'Netheriands Antilles',
        dropdown__COUNTRY__Netherlands: 'Netherlands',
        dropdown__COUNTRY__NewZealand: 'New Zealand',
        dropdown__COUNTRY__Nicaragua: 'Nicaragua',
        dropdown__COUNTRY__Niger: 'Niger',
        dropdown__COUNTRY__Nigeria: 'Nigeria',
        dropdown__COUNTRY__NorthKorea: 'North Korea',
        dropdown__COUNTRY__Norway: 'Norway',
        dropdown__COUNTRY__Oman: 'Oman',
        dropdown__COUNTRY__Pakistan: 'Pakistan',
        dropdown__COUNTRY__Panama: 'Panama',
        dropdown__COUNTRY__PapuaNewCuinea: 'Papua New Cuinea',
        dropdown__COUNTRY__Paraguay: 'Paraguay',
        dropdown__COUNTRY__Peru: 'Peru',
        dropdown__COUNTRY__Philippines: 'Philippines',
        dropdown__COUNTRY__Poland: 'Poland',
        dropdown__COUNTRY__FrenchPolynesia: 'French Polynesia',
        dropdown__COUNTRY__Portugal: 'Portugal',
        dropdown__COUNTRY__PuertoRico: 'Puerto Rico',
        dropdown__COUNTRY__Qatar: 'Qatar',
        dropdown__COUNTRY__Reunion: 'Reunion',
        dropdown__COUNTRY__Romania: 'Romania',
        dropdown__COUNTRY__Russia: 'Russia',
        dropdown__COUNTRY__SaintLueia: 'Saint Lueia',
        dropdown__COUNTRY__SaintVincent: 'Saint Vincent',
        dropdown__COUNTRY__SamoaEastern: 'Samoa Eastern',
        dropdown__COUNTRY__SamoaWestern: 'Samoa Western',
        dropdown__COUNTRY__SanMarino: 'San Marino',
        dropdown__COUNTRY__SaoTomeandPrincipe: 'Sao Tomeand Principe',
        dropdown__COUNTRY__SaudiArabia: 'Saudi Arabia',
        dropdown__COUNTRY__Senegal: 'Senegal',
        dropdown__COUNTRY__Seychelles: 'Seychelles',
        dropdown__COUNTRY__SierraLeone: 'SierraLeone',
        dropdown__COUNTRY__Singapore: 'Singapore',
        dropdown__COUNTRY__Slovakia: 'Slovakia',
        dropdown__COUNTRY__Slovenia: 'Slovenia',
        dropdown__COUNTRY__SolomonIs: 'SolomonIs',
        dropdown__COUNTRY__Somali: 'Somali',
        dropdown__COUNTRY__SouthAfrica: 'South Africa',
        dropdown__COUNTRY__Spain: 'Spain',
        dropdown__COUNTRY__SriLanka: 'Sri Lanka',
        dropdown__COUNTRY__St_Lucia: 'St.Lucia',
        dropdown__COUNTRY__St_Vincent: 'St.Vincent',
        dropdown__COUNTRY__Sudan: 'Sudan',
        dropdown__COUNTRY__Suriname: 'Suriname',
        dropdown__COUNTRY__Swaziland: 'Swaziland',
        dropdown__COUNTRY__Sweden: 'Sweden',
        dropdown__COUNTRY__Switzerland: 'Switzerland',
        dropdown__COUNTRY__Syria: 'Syria',
        dropdown__COUNTRY__Taiwan: 'Taiwan',
        dropdown__COUNTRY__Tajikstan: 'Tajikstan',
        dropdown__COUNTRY__Tanzania: 'Tanzania',
        dropdown__COUNTRY__Thailand: 'Thailand',
        dropdown__COUNTRY__Togo: 'Togo',
        dropdown__COUNTRY__Tonga: 'Tonga',
        dropdown__COUNTRY__TrinidadandTobago: 'Trinidadand Tobago',
        dropdown__COUNTRY__Tunisia: 'Tunisia',
        dropdown__COUNTRY__Turkey: 'Turkey',
        dropdown__COUNTRY__Turkmenistan: 'Turkmenistan',
        dropdown__COUNTRY__Uganda: 'Uganda',
        dropdown__COUNTRY__Ukraine: 'Ukraine',
        dropdown__COUNTRY__UnitedArabEmirates: 'United Arab Emirates',
        dropdown__COUNTRY__UnitedKiongdom: 'United Kingdom',
        dropdown__COUNTRY__UnitedStatesofAmerica: 'United States of America',
        dropdown__COUNTRY__Uruguay: 'Uruguay',
        dropdown__COUNTRY__Uzbekistan: 'Uzbekistan',
        dropdown__COUNTRY__Venezuela: 'Venezuela',
        dropdown__COUNTRY__Vietnam: 'Vietnam',
        dropdown__COUNTRY__Yemen: 'Yemen',
        dropdown__COUNTRY__Yugoslavia: 'Yugoslavia',
        dropdown__COUNTRY__Zimbabwe: 'Zimbabwe',
        dropdown__COUNTRY__Zaire: 'Zaire',
        dropdown__COUNTRY__Zambia: 'Zambia',

        // Available
        dropdown__AVAILABLE__LAST_DAY: 'LAST DAY TO ORDER',
        dropdown__AVAILABLE__1_WEEK: 'UP TO 1 WEEK',
        dropdown__AVAILABLE__4_WEEK: 'UP TO 4 WEEK',
        dropdown__AVAILABLE__8_WEEK: 'UP TO 8 WEEK',
        dropdown__AVAILABLE__12_WEEK: 'UP TO 12 WEEK',

        // Collection Status
        COLLECTION_STATUS_ALL: 'All',
        COLLECTION_STATUS_0: 'DRAFT',
        COLLECTION_STATUS_1: 'SUBMITTED',
        COLLECTION_STATUS_2: 'CLOSED',
        COLLECTION_STATUS_3: 'DELETED',

        // Store Type
        dropdown__STORE__ONLINE_RETAIL_SHOP: 'ONLINE-RETAIL SHOP',
        dropdown__STORE__MULTI_LABELS_SHOP: 'MULTI-LABELS SHOP',
        dropdown__STORE__CONCEPT_SHOP: 'CONCEPT STORE',
        dropdown__STORE__CHAIN_SHOP: 'CHAIN STORE',
        dropdown__STORE__DEPARTMENT_SHOP: 'DEPARTMENT STORE',
        dropdown__STORE__BUYING_OFFICE_SHOP: 'BUYING OFFICE',

        // Collection Type Filter
        dropdown__COLLECTION__ALL: 'ALL',
        dropdown__COLLECTION__WHATS_NEW: 'WHAT\'S NEW',
        // Collection Type
        dropdown__COLLECTION__WOMEN: 'WOMEN',
        dropdown__COLLECTION__MEN: 'MEN',
        dropdown__COLLECTION__JEWELRY: 'JEWELRY',
        dropdown__COLLECTION__ACCESSORIES: 'ACCESSORIES',
        dropdown__COLLECTION__FOOTWEAR: 'FOOTWEAR',

        // Collection Mode
        dropdown__COLLECTION_MODE__PRE_ORDER: 'PRE ORDER',
        dropdown__COLLECTION_MODE__STOCK: 'STOCK',
        dropdown__COLLECTION_MODE__RE_ORDER: 'RE ORDER',
        dropdown__COLLECTION_MODE__PERMANENT: 'PERMANENT',

        // Collection Season
        dropdown__COLLECTION_SEASON__AW_14: 'AW14',
        dropdown__COLLECTION_SEASON__PRE_SS_15: 'PRE-SS15',
        dropdown__COLLECTION_SEASON__SS_15: 'SS15',
        dropdown__COLLECTION_SEASON__AW_15: 'AW15',
        dropdown__COLLECTION_SEASON__PRE_SS16: 'PRE-SS16',
        dropdown__COLLECTION_SEASON__SS_16: 'SS16',
        dropdown__COLLECTION_SEASON__AW_16: 'AW16',

        // Product Category Filter
        dropdown__PRODUCT_CATEGORY__ALL: 'ALL',
        // Product Category - WOMEN
        dropdown__PRODUCT_CATEGORY__WOMEN__TOPS: 'TOPS',
        dropdown__PRODUCT_CATEGORY__WOMEN__SHIRTS: 'SHIRTS',
        dropdown__PRODUCT_CATEGORY__WOMEN__DRESSES: 'DRESSES',
        dropdown__PRODUCT_CATEGORY__WOMEN__JUMPSUITS: 'JUMPSUITS',
        dropdown__PRODUCT_CATEGORY__WOMEN__OUTERWEAR: 'OUTERWEAR',
        dropdown__PRODUCT_CATEGORY__WOMEN__KNITWEAR: 'KNITWEAR',
        dropdown__PRODUCT_CATEGORY__WOMEN__SWEATSHIRT: 'SWEATSHIRT',
        dropdown__PRODUCT_CATEGORY__WOMEN__JEANS: 'JEANS',
        dropdown__PRODUCT_CATEGORY__WOMEN__SKIRTS: 'SKIRTS',
        dropdown__PRODUCT_CATEGORY__WOMEN__PANTS: 'PANTS',
        dropdown__PRODUCT_CATEGORY__WOMEN__SWIMWEAR: 'SWIMWEAR',
        // Product Category - MAN
        dropdown__PRODUCT_CATEGORY__MEN__SHIRTS: 'SHIRTS',
        dropdown__PRODUCT_CATEGORY__MEN__TOPS_TSHIRT: 'TOPS AND T-SHIRT',
        dropdown__PRODUCT_CATEGORY__MEN__OUTERWEAR: 'OUTERWEAR',
        dropdown__PRODUCT_CATEGORY__MEN__BLAZERS: 'BLAZERS',
        dropdown__PRODUCT_CATEGORY__MEN__KNITWEAR: 'KNITWEAR',
        dropdown__PRODUCT_CATEGORY__MEN__SWEATSHIRT: 'SWEATSHIRT',
        dropdown__PRODUCT_CATEGORY__MEN__JEANS: 'JEANS',
        dropdown__PRODUCT_CATEGORY__MEN__PANTS: 'PANTS',
        dropdown__PRODUCT_CATEGORY__MEN__SWIMWEAR: 'SWIMWEAR',
        // Product Category - JEWELRY
        dropdown__PRODUCT_CATEGORY__JEWELRY__BRACELETS: 'BRACELETS',
        dropdown__PRODUCT_CATEGORY__JEWELRY__EARRINGS: 'EARRINGS',
        dropdown__PRODUCT_CATEGORY__JEWELRY__NECKLACES_PENDANTS: 'NECKLACES PENDANTS',
        dropdown__PRODUCT_CATEGORY__JEWELRY__RINGS: 'RINGS',
        dropdown__PRODUCT_CATEGORY__JEWELRY__BODY_HAND_CHAINS: 'BODY/HAND CHAINS',
        dropdown__PRODUCT_CATEGORY__JEWELRY__BROOCH: 'BROOCH',
        dropdown__PRODUCT_CATEGORY__JEWELRY__CUFFLINKS: 'CUFFLINKS',
        // Product Category - ACCESSORIES
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__WATCHES: 'WATCHES',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__BAGS: 'BAGS',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__BELTS: 'BELTS',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__GLOVES: 'GLOVES',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__HAIR_ACCESSORIES: 'HAIR ACCESSORIES',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__HATS: 'HATS',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__HOME_LIFESTYLE: 'HOME/LIFESTYLE',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__SCARVES_WRAPS: 'SCARVES/WRAPS',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__SOCKS_TIGHTS: 'SOCKS/TIGHTS',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__SUNGLASSES: 'SUNGLASSES',
        dropdown__PRODUCT_CATEGORY__ACCESSORIES__TECH_ACCESSORIES: 'TECH ACCESSORIES',
        // Product Category - FOOTWEAR
        dropdown__PRODUCT_CATEGORY__FOOTWEAR__BOOTS: 'BOOTS',
        dropdown__PRODUCT_CATEGORY__FOOTWEAR__FLATS: 'FLATS',
        dropdown__PRODUCT_CATEGORY__FOOTWEAR__PUMPS: 'PUMPS',
        dropdown__PRODUCT_CATEGORY__FOOTWEAR__SANDALS: 'SANDALS',
        dropdown__PRODUCT_CATEGORY__FOOTWEAR__SNEAKERS: 'SNEAKERS',

        // Product Material
        dropdown__PRODUCT_MATERIAL__Acetate: 'Acetate',
        dropdown__PRODUCT_MATERIAL__Acrylic: 'Acrylic',
        dropdown__PRODUCT_MATERIAL__Aliginate_fiber: 'Aliginate Fiber',
        dropdown__PRODUCT_MATERIAL__Angora: 'Angora',
        dropdown__PRODUCT_MATERIAL__Artificial_cotton: 'Artificial Cotton',
        dropdown__PRODUCT_MATERIAL__Bast: 'Bast',
        dropdown__PRODUCT_MATERIAL__Blend_fiber: 'Blend Fiber',
        dropdown__PRODUCT_MATERIAL__Braid: 'Braid',
        dropdown__PRODUCT_MATERIAL__Cotton: 'Cotton',
        dropdown__PRODUCT_MATERIAL__Cashmere: 'Cashmere',
        dropdown__PRODUCT_MATERIAL__Cellulose_ester: 'Cellulose Ester',
        dropdown__PRODUCT_MATERIAL__Cellulose: 'Cellulose',
        dropdown__PRODUCT_MATERIAL__Down: 'Down',
        dropdown__PRODUCT_MATERIAL__Elastane: 'Elastane',
        dropdown__PRODUCT_MATERIAL__Filament: 'Filament',
        dropdown__PRODUCT_MATERIAL__Flax: 'Flax',
        dropdown__PRODUCT_MATERIAL__Fur: 'Fur',
        dropdown__PRODUCT_MATERIAL__Fur_garment: 'Fur Garment',
        dropdown__PRODUCT_MATERIAL__Hemp: 'Hemp',
        dropdown__PRODUCT_MATERIAL__Jute: 'Jute',
        dropdown__PRODUCT_MATERIAL__Man_made_fiber: 'Man-made Fiber',
        dropdown__PRODUCT_MATERIAL__Modacrylic: 'Modacrylic',
        dropdown__PRODUCT_MATERIAL__Modal: 'Modal',
        dropdown__PRODUCT_MATERIAL__Mohair: 'Mohair',
        dropdown__PRODUCT_MATERIAL__Natural_fiber: 'Natural Fiber',
        dropdown__PRODUCT_MATERIAL__Nylon: 'Nylon',
        dropdown__PRODUCT_MATERIAL__Polyamide: 'Polyamide',
        dropdown__PRODUCT_MATERIAL__Polymer: 'Polymer',
        dropdown__PRODUCT_MATERIAL__Polyester: 'Polyester',
        dropdown__PRODUCT_MATERIAL__Polyethylene: 'Polyethylene',
        dropdown__PRODUCT_MATERIAL__Polypropylene: 'Polypropylene',
        dropdown__PRODUCT_MATERIAL__Polyester_wadding: 'Polyester Wadding',
        dropdown__PRODUCT_MATERIAL__Rayon: 'Rayon',
        dropdown__PRODUCT_MATERIAL__Regenerated_fiber: 'Regenerated Fiber',
        dropdown__PRODUCT_MATERIAL__Rabbit: 'Rabbit',
        dropdown__PRODUCT_MATERIAL__Silk: 'Silk',
        dropdown__PRODUCT_MATERIAL__Silk_wadding: 'Silk Wadding',
        dropdown__PRODUCT_MATERIAL__Spandex_elastomer: 'Spandex Elastomer',
        dropdown__PRODUCT_MATERIAL__Staple: 'Staple',
        dropdown__PRODUCT_MATERIAL__Synthetic: 'Synthetic',
        dropdown__PRODUCT_MATERIAL__Velvet: 'Velvet',
        dropdown__PRODUCT_MATERIAL__Viscose: 'Viscose',
        dropdown__PRODUCT_MATERIAL__Wool: 'Wool',
        dropdown__PRODUCT_MATERIAL__Other: 'Other',

        /**
         * filters in service
         */
        filter_head__ALL_BRAND: 'ALL BRAND',
        filter_head__FILTERED_BRAND: 'FILTERED BRAND',
        filter_head__SEARCH_BRAND: 'SEARCH BRAND',

        filter_title__SHOW: 'SHOW',
        filter_title__SEASON: 'SEASON',
        filter_title__AVAILABLE: 'AVAILABLE',
        filter_title__COUNTRY: 'COUNTRY',
        filter_title__MODE: 'COLLECTION MODE',
        filter_title__CATEGORY: 'COLLECTION CATEGORY',

        filter__CLEAR_ALL: 'CLEAR ALL',
        filter__SHOW_MORE: 'MORE',

        /**
         * order status
         */
        order_status__0: 'PENDING',
        order_status__1: 'ORDER CONFIRMED',
        order_status__2: 'DEPOSITED',
        order_status__3: 'PREPARING',
        order_status__4: 'BALANCE PAYMENT',
        order_status__5: 'SHIPPED',
        order_status__6: 'COMPLETE"
    }
);
