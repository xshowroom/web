/**
 * @file i18n module
 * @author shiliang
 * @description In this file, we set the dictionary for i18n and provide the filter which 
 *              can be used in the view to translate the key into localized language.
 */

angular.module(
    'xShowroom.i18n', 
    [
        'ngCookies'
    ]
)
.filter('translate', ['$cookies', 'global', function($cookies, global){
	var langInCookie = $cookies.get('language') || 'en';
	return function(key, language){
		var targetLanguage = language || langInCookie;
		targetLanguage = targetLanguage in global ? targetLanguage : 'en';
		return global[targetLanguage][key] || 'Error: label is not found';
	}
}])
.constant(
	'global',
	{
		'zh-CN': {
            /**
             * JS files
             */
            // directives.js
            directives_js__UPLOADING: '上传图片中',
            directives_js__UPLOAD: '上传图片',
            directives_js__FILE_SIZE: '文件大小上限为5MB',

            // login.js
            login__EMAIL_PATTERN_ERROR: 'Email格式错误！',

            /**
             * Error Message
             */
            email_EMPTY_ERROR: "请输入您的Email",
            email_PATTERN_ERROR: "请输入正确的Email",
            email_DUPLICATION_ERROR: "该Email已经被注册，请换个Email进行注册",
            pass_EMPTY_ERROR: "请输入您的密码",
            pass_PATTERN_ERROR: "密码不能小于6位",
            firstName_EMPTY_ERROR: "请输入您的名字",
            firstName_PATTERN_ERROR: "请输入正确的名字",
            lastName_EMPTY_ERROR: "请输入您的姓氏",
            lastName_PATTERN_ERROR: "请输入正确的姓氏",
            displayName_EMPTY_ERROR: "请输入您要显示的名字",
            displayName_PATTERN_ERROR: "请输入正确的显示名",
            tel_EMPTY_ERROR: "请输入您的电话号码",
            tel_PATTERN_ERROR: "请输入正确的电话号码",

            brandName_EMPTY_ERROR: "请输入您的品牌名称",
            brandName_DUPLICATION_ERROR: "该品牌名称已经存在",
            designerName_EMPTY_ERROR: "请输入您的设计师",

            shopName_EMPTY_ERROR: "请输入商店名称",
            shopName_PATTERN_ERROR: "请正确输入商店名称",
            shopType_EMPTY_ERROR: "请选择商店的类型",
            collectionType_EMPTY_ERROR: "请选择系列的类型",
            brandList_EMPTY_ERROR: "请输入商店的品牌",
            shopWebsite_EMPTY_ERROR: "请输入商店的网址",
            shopWebsite_PATTERN_ERROR: "请正确输入商店的网址，例如(http://www.example.com)",
            shopAddress_EMPTY_ERROR: "请输入商店的地址",
            shopCountry_EMPTY_ERROR: "请选择商店所在的国家",
            shopZipcode_EMPTY_ERROR: "请输入商店的邮编",
            shopTel_EMPTY_ERROR: "请输入商店的电话",
            shopTel_PATTERN_ERROR: "请正确输入商店的电话",

            imagePath_EMPTY_ERROR: "请上传图片",

            companyName_EMPTY_ERROR: "请输入公司名称",
            companyName_PATTERN_ERROR: "请正确输入公司名称",
            companyAddr_EMPTY_ERROR: "请输入公司地址",
            companyCountry_EMPTY_ERROR: "请选择公司所在的国家",
            companyZip_EMPTY_ERROR: "请输入公司的邮编",
            companyTel_EMPTY_ERROR: "请输入公司的电话",
            companyTel_PATTERN_ERROR: "请正确输入公司的电话",
            companyWebsite_EMPTY_ERROR: "请输入公司的网址",
            companyWebsite_PATTERN_ERROR: "请正确输入公司的网址，例如(http://www.example.com)",

            collection_name_EMPTY_ERROR: "请输入系列的名字",
            collection_name_DUPLICATION_ERROR: "系列的名字已经存在",
            collection_category_EMPTY_ERROR: "请选择系列类型",
            collection_mode_EMPTY_ERROR: "请选择售卖模式",
            collection_season_EMPTY_ERROR: "请选择时尚季",
            collection_order_EMPTY_ERROR: "请输入最小订单金额",
            collection_order_PATTERN_ERROR: "请正确输入最小订单金额",
            collection_currency_EMPTY_ERROR : "请选择结算货币",
            collection_deadline_DATE_ERROR: "请正确输入下单截止日期",
            collection_delivery_DATE_ERROR: "请正确输入发货日期",
            collection_description_EMPTY_ERROR: "请输入商品描述信息",
            collection_image_EMPTY_ERROR: "请上传系列的封面照片",

            /**
             * DROP DOWN LIST
             */
            // Country
            dropdown__COUNTRY__Angola: '安哥拉',
            dropdown__COUNTRY__Afghanistan: '阿富汗',
            dropdown__COUNTRY__Albania: '阿尔巴尼亚',
            dropdown__COUNTRY__Algeria: '阿尔及利亚',
            dropdown__COUNTRY__Andorra: '安道尔共和国',
            dropdown__COUNTRY__Anguilla: '安圭拉岛',
            dropdown__COUNTRY__AntiguaandBarbuda: '安提瓜和巴布达',
            dropdown__COUNTRY__Argentina: '阿根廷',
            dropdown__COUNTRY__Armenia: '亚美尼亚',
            dropdown__COUNTRY__Ascension: '阿森松',
            dropdown__COUNTRY__Australia: '澳大利亚',
            dropdown__COUNTRY__Austria: '奥地利',
            dropdown__COUNTRY__Azerbaijan: '阿塞拜疆',
            dropdown__COUNTRY__Bahamas: '巴哈马',
            dropdown__COUNTRY__Bahrain: '巴林',
            dropdown__COUNTRY__Bangladesh: '孟加拉国',
            dropdown__COUNTRY__Barbados: '巴巴多斯',
            dropdown__COUNTRY__Belarus: '白俄罗斯',
            dropdown__COUNTRY__Belgium: '比利时',
            dropdown__COUNTRY__Belize: '伯利兹',
            dropdown__COUNTRY__Benin: '贝宁',
            dropdown__COUNTRY__BermudaIs: '百慕大群岛',
            dropdown__COUNTRY__Bolivia: '玻利维亚',
            dropdown__COUNTRY__Botswana: '博茨瓦纳',
            dropdown__COUNTRY__Brazil: '巴西',
            dropdown__COUNTRY__Brunei: '文莱',
            dropdown__COUNTRY__Bulgaria: '保加利亚',
            dropdown__COUNTRY__Burkina_faso: '布基纳法索',
            dropdown__COUNTRY__Burma: '缅甸',
            dropdown__COUNTRY__Burundi: '布隆迪',
            dropdown__COUNTRY__Cameroon: '喀麦隆',
            dropdown__COUNTRY__Canada: '加拿大',
            dropdown__COUNTRY__CaymanIs: '开曼群岛',
            dropdown__COUNTRY__CentralAfricanRepublic: '中非共和国',
            dropdown__COUNTRY__Chad: '乍得',
            dropdown__COUNTRY__Chile: '智利',
            dropdown__COUNTRY__China: '中国',
            dropdown__COUNTRY__Colombia: '哥伦比亚',
            dropdown__COUNTRY__Congo: '刚果',
            dropdown__COUNTRY__CookIs: '库克群岛',
            dropdown__COUNTRY__CostaRica: '哥斯达黎加',
            dropdown__COUNTRY__Cuba: '古巴',
            dropdown__COUNTRY__Cyprus: '塞浦路斯',
            dropdown__COUNTRY__CzechRepublic: '捷克',
            dropdown__COUNTRY__Denmark: '丹麦',
            dropdown__COUNTRY__Djibouti: '吉布提',
            dropdown__COUNTRY__DominicaRep: '多米尼加共和国',
            dropdown__COUNTRY__Ecuador: '厄瓜多尔',
            dropdown__COUNTRY__Egypt: '埃及',
            dropdown__COUNTRY__EISalvador: '萨尔瓦多',
            dropdown__COUNTRY__Estonia: '爱沙尼亚',
            dropdown__COUNTRY__Ethiopia: '埃塞俄比亚',
            dropdown__COUNTRY__Fiji: '斐济',
            dropdown__COUNTRY__Finland: '芬兰',
            dropdown__COUNTRY__France: '法国',
            dropdown__COUNTRY__FrenchGuiana: '法属圭亚那',
            dropdown__COUNTRY__Gabon: '加蓬',
            dropdown__COUNTRY__Gambia: '冈比亚',
            dropdown__COUNTRY__Georgia: '格鲁吉亚',
            dropdown__COUNTRY__Germany: '德国',
            dropdown__COUNTRY__Ghana: '加纳',
            dropdown__COUNTRY__Gibraltar: '直布罗陀',
            dropdown__COUNTRY__Greece: '希腊',
            dropdown__COUNTRY__Grenada: '格林纳达',
            dropdown__COUNTRY__Guam: '关岛',
            dropdown__COUNTRY__Guatemala: '危地马拉',
            dropdown__COUNTRY__Guinea: '几内亚',
            dropdown__COUNTRY__Guyana: '圭亚那',
            dropdown__COUNTRY__Haiti: '海地',
            dropdown__COUNTRY__Honduras: '洪都拉斯',
            dropdown__COUNTRY__Hongkong: '香港',
            dropdown__COUNTRY__Hungary: '匈牙利',
            dropdown__COUNTRY__Iceland: '冰岛',
            dropdown__COUNTRY__India: '印度',
            dropdown__COUNTRY__Indonesia: '印度尼西亚',
            dropdown__COUNTRY__Iran: '伊朗',
            dropdown__COUNTRY__Iraq: '伊拉克',
            dropdown__COUNTRY__Ireland: '爱尔兰',
            dropdown__COUNTRY__Israel: '以色列',
            dropdown__COUNTRY__Italy: '意大利',
            dropdown__COUNTRY__IvoryCoast: '科特迪瓦',
            dropdown__COUNTRY__Jamaica: '牙买加',
            dropdown__COUNTRY__Japan: '日本',
            dropdown__COUNTRY__Jordan: '约旦',
            dropdown__COUNTRY__Kampuchea_Cambodia: '柬埔寨',
            dropdown__COUNTRY__Kazakstan: '哈萨克斯坦',
            dropdown__COUNTRY__Kenya: '肯尼亚',
            dropdown__COUNTRY__Korea: '韩国',
            dropdown__COUNTRY__Kuwait: '科威特',
            dropdown__COUNTRY__Kyrgyzstan: '吉尔吉斯坦',
            dropdown__COUNTRY__Laos: '老挝',
            dropdown__COUNTRY__Latvia: '拉脱维亚',
            dropdown__COUNTRY__Lebanon: '黎巴嫩',
            dropdown__COUNTRY__Lesotho: '莱索托',
            dropdown__COUNTRY__Liberia: '利比里亚',
            dropdown__COUNTRY__Libya: '利比亚',
            dropdown__COUNTRY__Liechtenstein: '列支敦士登',
            dropdown__COUNTRY__Lithuania: '立陶宛',
            dropdown__COUNTRY__Luxembourg: '卢森堡',
            dropdown__COUNTRY__Macao: '澳门',
            dropdown__COUNTRY__Madagascar: '马达加斯加',
            dropdown__COUNTRY__Malawi: '马拉维',
            dropdown__COUNTRY__Malaysia: '马来西亚',
            dropdown__COUNTRY__Maldives: '马尔代夫',
            dropdown__COUNTRY__Mali: '马里',
            dropdown__COUNTRY__Malta: '马耳他',
            dropdown__COUNTRY__MarianaIs: '马里亚那群岛',
            dropdown__COUNTRY__Martinique: '马提尼克',
            dropdown__COUNTRY__Mauritius: '毛里求斯',
            dropdown__COUNTRY__Mexico: '墨西哥',
            dropdown__COUNTRY__Moldova_Republicof: '摩尔多瓦',
            dropdown__COUNTRY__Monaco: '摩纳哥',
            dropdown__COUNTRY__Mongolia: '蒙古',
            dropdown__COUNTRY__MontserratIs: '蒙特塞拉特岛',
            dropdown__COUNTRY__Morocco: '摩洛哥',
            dropdown__COUNTRY__Mozambique: '莫桑比克',
            dropdown__COUNTRY__Namibia: '纳米比亚',
            dropdown__COUNTRY__Nauru: '瑙鲁',
            dropdown__COUNTRY__Nepal: '尼泊尔',
            dropdown__COUNTRY__NetheriandsAntilles: '荷属安的列斯',
            dropdown__COUNTRY__Netherlands: '荷兰',
            dropdown__COUNTRY__NewZealand: '新西兰',
            dropdown__COUNTRY__Nicaragua: '尼加拉瓜',
            dropdown__COUNTRY__Niger: '尼日尔',
            dropdown__COUNTRY__Nigeria: '尼日利亚',
            dropdown__COUNTRY__NorthKorea: '朝鲜',
            dropdown__COUNTRY__Norway: '挪威',
            dropdown__COUNTRY__Oman: '阿曼',
            dropdown__COUNTRY__Pakistan: '巴基斯坦',
            dropdown__COUNTRY__Panama: '巴拿马',
            dropdown__COUNTRY__PapuaNewCuinea: '巴布亚新几内亚',
            dropdown__COUNTRY__Paraguay: '巴拉圭',
            dropdown__COUNTRY__Peru: '秘鲁',
            dropdown__COUNTRY__Philippines: '菲律宾',
            dropdown__COUNTRY__Poland: '波兰',
            dropdown__COUNTRY__FrenchPolynesia: '法属玻利尼西亚',
            dropdown__COUNTRY__Portugal: '葡萄牙',
            dropdown__COUNTRY__PuertoRico: '波多黎各',
            dropdown__COUNTRY__Qatar: '卡塔尔',
            dropdown__COUNTRY__Reunion: '留尼旺',
            dropdown__COUNTRY__Romania: '罗马尼亚',
            dropdown__COUNTRY__Russia: '俄罗斯',
            dropdown__COUNTRY__SaintLueia: '圣卢西亚',
            dropdown__COUNTRY__SaintVincent: '圣文森特岛',
            dropdown__COUNTRY__SamoaEastern: '东萨摩亚(美)',
            dropdown__COUNTRY__SamoaWestern: '西萨摩亚',
            dropdown__COUNTRY__SanMarino: '圣马力诺',
            dropdown__COUNTRY__SaoTomeandPrincipe: '圣多美和普林西比',
            dropdown__COUNTRY__SaudiArabia: '沙特阿拉伯',
            dropdown__COUNTRY__Senegal: '塞内加尔',
            dropdown__COUNTRY__Seychelles: '塞舌尔',
            dropdown__COUNTRY__SierraLeone: '塞拉利昂',
            dropdown__COUNTRY__Singapore: '新加坡',
            dropdown__COUNTRY__Slovakia: '斯洛伐克',
            dropdown__COUNTRY__Slovenia: '斯洛文尼亚',
            dropdown__COUNTRY__SolomonIs: '所罗门群岛',
            dropdown__COUNTRY__Somali: '索马里',
            dropdown__COUNTRY__SouthAfrica: '南非',
            dropdown__COUNTRY__Spain: '西班牙',
            dropdown__COUNTRY__SriLanka: '斯里兰卡',
            dropdown__COUNTRY__St_Lucia: '圣卢西亚',
            dropdown__COUNTRY__St_Vincent: '圣文森特',
            dropdown__COUNTRY__Sudan: '苏丹',
            dropdown__COUNTRY__Suriname: '苏里南',
            dropdown__COUNTRY__Swaziland: '斯威士兰',
            dropdown__COUNTRY__Sweden: '瑞典',
            dropdown__COUNTRY__Switzerland: '瑞士',
            dropdown__COUNTRY__Syria: '叙利亚',
            dropdown__COUNTRY__Taiwan: '台湾省',
            dropdown__COUNTRY__Tajikstan: '塔吉克斯坦',
            dropdown__COUNTRY__Tanzania: '坦桑尼亚',
            dropdown__COUNTRY__Thailand: '泰国',
            dropdown__COUNTRY__Togo: '多哥',
            dropdown__COUNTRY__Tonga: '汤加',
            dropdown__COUNTRY__TrinidadandTobago: '特立尼达和多巴哥',
            dropdown__COUNTRY__Tunisia: '突尼斯',
            dropdown__COUNTRY__Turkey: '土耳其',
            dropdown__COUNTRY__Turkmenistan: '土库曼斯坦',
            dropdown__COUNTRY__Uganda: '乌干达',
            dropdown__COUNTRY__Ukraine: '乌克兰',
            dropdown__COUNTRY__UnitedArabEmirates: '阿拉伯联合酋长国',
            dropdown__COUNTRY__UnitedKiongdom: '英国',
            dropdown__COUNTRY__UnitedStatesofAmerica: '美国',
            dropdown__COUNTRY__Uruguay: '乌拉圭',
            dropdown__COUNTRY__Uzbekistan: '乌兹别克斯坦',
            dropdown__COUNTRY__Venezuela: '委内瑞拉',
            dropdown__COUNTRY__Vietnam: '越南',
            dropdown__COUNTRY__Yemen: '也门',
            dropdown__COUNTRY__Yugoslavia: '南斯拉夫',
            dropdown__COUNTRY__Zimbabwe: '津巴布韦',
            dropdown__COUNTRY__Zaire: '扎伊尔',
            dropdown__COUNTRY__Zambia: '赞比亚',
            
            // Collection Status
            COLLECTION_STATUS_ALL: '所有',
            COLLECTION_STATUS_0: '草稿',
            COLLECTION_STATUS_1: '已提交',
            COLLECTION_STATUS_2: '已关闭',
            COLLECTION_STATUS_3: '已删除',
            
            // Store Type
            dropdown__STORE__ALL: '全部',
            dropdown__STORE__DEPARTMENT_SHOP: '商场',
            dropdown__STORE__MULTI_BRAND_SHOP: '品牌集',
            dropdown__STORE__ONLINE_SHOP: '网店',

            // Collection Type
            dropdown__COLLECTION__ALL: '全部',
            dropdown__COLLECTION__WOMEN: '女士',
            dropdown__COLLECTION__ACCESSORIES: '首饰',
            dropdown__COLLECTION__MEN: '男士',

            // Collection Mode
            dropdown__COLLECTION_MODE__PRE_ORDER: '预售',
            dropdown__COLLECTION_MODE__STOCK: '现货',
            dropdown__COLLECTION_MODE__RE_ORDER: '补货',
            dropdown__COLLECTION_MODE__PERMANENT: '常年可定',

            // Collection Season
            dropdown__COLLECTION_SEASON__AW_15: '15秋冬',
            dropdown__COLLECTION_SEASON__PRE_SS16: '16早春',
            dropdown__COLLECTION_SEASON__SS_16: '16春夏',
            dropdown__COLLECTION_SEASON__AW_16: '16秋冬',

            // Product Category
            dropdown__PRODUCT_CATEGORY__ALL: "所有",
            dropdown__PRODUCT_CATEGORY__HAT: "帽子",
            dropdown__PRODUCT_CATEGORY__TOP: "上衣",
            dropdown__PRODUCT_CATEGORY__KNIT: "编织衫",
            dropdown__PRODUCT_CATEGORY__SHIRT: "衬衫",
            dropdown__PRODUCT_CATEGORY__DRESS: "连衣裙",
            dropdown__PRODUCT_CATEGORY__JUMPSUIT: "连衣裤",
            dropdown__PRODUCT_CATEGORY__COAT: "大衣",
            dropdown__PRODUCT_CATEGORY__SKIRT: "裙子",
            dropdown__PRODUCT_CATEGORY__PANTS: "裤子",
            dropdown__PRODUCT_CATEGORY__BELT: "腰带",
            dropdown__PRODUCT_CATEGORY__GLOVES: "手套",
            dropdown__PRODUCT_CATEGORY__SHOES: "鞋履",
            dropdown__PRODUCT_CATEGORY__BAG: "手袋",

            // Product Material
            dropdown__PRODUCT_MATERIAL__Acetate: "醋酯纤维",
            dropdown__PRODUCT_MATERIAL__Acrylic: "腈纶",
            dropdown__PRODUCT_MATERIAL__Aliginate_fiber: "藻酸纤维",
            dropdown__PRODUCT_MATERIAL__Angora: "安哥拉山羊毛",
            dropdown__PRODUCT_MATERIAL__Artificial_cotton: "人造棉",
            dropdown__PRODUCT_MATERIAL__Bast: "树内皮",
            dropdown__PRODUCT_MATERIAL__Blend_fiber: "混合纤维",
            dropdown__PRODUCT_MATERIAL__Braid: "饰带",
            dropdown__PRODUCT_MATERIAL__Cotton: "棉花、棉",
            dropdown__PRODUCT_MATERIAL__Cashmere: "山羊绒",
            dropdown__PRODUCT_MATERIAL__Cellulose_ester: "醋、人造次",
            dropdown__PRODUCT_MATERIAL__Cellulose: "纤维素",
            dropdown__PRODUCT_MATERIAL__Down: "羽绒",
            dropdown__PRODUCT_MATERIAL__Elastane: "氨纶",
            dropdown__PRODUCT_MATERIAL__Filament: "长纤维",
            dropdown__PRODUCT_MATERIAL__Flax: "亚麻纤维",
            dropdown__PRODUCT_MATERIAL__Fur: "毛皮",
            dropdown__PRODUCT_MATERIAL__Fur_garment: "裘皮",
            dropdown__PRODUCT_MATERIAL__Hemp: "大麻",
            dropdown__PRODUCT_MATERIAL__Jute: "黄麻",
            dropdown__PRODUCT_MATERIAL__Man_made_fiber: "人造纤维",
            dropdown__PRODUCT_MATERIAL__Modacrylic: "变性腈纶",
            dropdown__PRODUCT_MATERIAL__Modal: "莫代尔",
            dropdown__PRODUCT_MATERIAL__Mohair: "马海毛",
            dropdown__PRODUCT_MATERIAL__Natural_fiber: "天然纤维",
            dropdown__PRODUCT_MATERIAL__Nylon: "尼龙",
            dropdown__PRODUCT_MATERIAL__Polyamide: "聚酰胺",
            dropdown__PRODUCT_MATERIAL__Polymer: "高聚物",
            dropdown__PRODUCT_MATERIAL__Polyester: "涤纶、聚酯纤维",
            dropdown__PRODUCT_MATERIAL__Polyethylene: "聚乙烯纤维",
            dropdown__PRODUCT_MATERIAL__Polypropylene: "丙纶",
            dropdown__PRODUCT_MATERIAL__Polyester_wadding: "喷胶棉",
            dropdown__PRODUCT_MATERIAL__Rayon: "人造丝",
            dropdown__PRODUCT_MATERIAL__Regenerated_fiber: "再生纤维",
            dropdown__PRODUCT_MATERIAL__Rabbit: "兔毛",
            dropdown__PRODUCT_MATERIAL__Silk: "蚕丝、丝",
            dropdown__PRODUCT_MATERIAL__Silk_wadding: "丝绵",
            dropdown__PRODUCT_MATERIAL__Spandex_elastomer: "弹性纤维",
            dropdown__PRODUCT_MATERIAL__Staple: "短纤纱",
            dropdown__PRODUCT_MATERIAL__Synthetic: "合成纤维",
            dropdown__PRODUCT_MATERIAL__Velvet: "天鹅绒",
            dropdown__PRODUCT_MATERIAL__Viscose: "粘胶纤维",
            dropdown__PRODUCT_MATERIAL__Wool: "羊毛",
            dropdown__PRODUCT_MATERIAL__Other: "其它"
        },
        'en': {
            /**
             * JS files
             */
            // directives.js
            directives_js__UPLOADING: 'UPLOADING IMAGE',
            directives_js__UPLOAD: 'UPLOAD',
            directives_js__FILE_SIZE: 'File size limit is 5MB',

            // login.js
            login__EMAIL_PATTERN_ERROR: 'email address is not valid！',

            /**
             * Error Message
             */
            email_EMPTY_ERROR: "please input your Email",
            email_PATTERN_ERROR: "invalid Email",
            email_DUPLICATION_ERROR: "Email has been registered",
            pass_EMPTY_ERROR: "please input your password",
            pass_PATTERN_ERROR: "invalid password (Must contain at least 6 characters)",
            firstName_EMPTY_ERROR: "please input your first name",
            firstName_PATTERN_ERROR: "invalid first name",
            lastName_EMPTY_ERROR: "please input your last name",
            lastName_PATTERN_ERROR: "invalid last name",
            displayName_EMPTY_ERROR: "please input your display name",
            displayName_PATTERN_ERROR: "invalid display name",
            tel_EMPTY_ERROR: "please input your telephone",
            tel_PATTERN_ERROR: "invalid telephone",

            brandName_EMPTY_ERROR: "please input your brand name",
            brandName_DUPLICATION_ERROR: "this brand name is exist",
            designerName_EMPTY_ERROR: "please input your designers",

            shopName_EMPTY_ERROR: "please input your store name",
            shopName_PATTERN_ERROR: "invalid store name",
            shopType_EMPTY_ERROR: "please select store type",
            collectionType_EMPTY_ERROR: "please select collection type",
            brandList_EMPTY_ERROR: "please input brand list",
            shopWebsite_EMPTY_ERROR: "please input store web url",
            shopWebsite_PATTERN_ERROR: "please input valid url, eg: http://www.example.com",
            shopAddress_EMPTY_ERROR: "please input store address",
            shopCountry_EMPTY_ERROR: "please select country",
            shopZipcode_EMPTY_ERROR: "please input zip code",
            shopTel_EMPTY_ERROR: "please input telephone",
            shopTel_PATTERN_ERROR: "invalid telephone",

            imagePath_EMPTY_ERROR: "please upload the picture",

            companyName_EMPTY_ERROR: "please input company name",
            companyName_PATTERN_ERROR: "invalid company name",
            companyAddr_EMPTY_ERROR: "please input company address",
            companyCountry_EMPTY_ERROR: "please select country",
            companyZip_EMPTY_ERROR: "please input zip code",
            companyTel_EMPTY_ERROR: "please input telephone",
            companyTel_PATTERN_ERROR: "invalid telephone",
            companyWebsite_EMPTY_ERROR: "please input your company website",
            companyWebsite_PATTERN_ERROR: "please input valid url, eg: http://www.example.com",

            collection_name_EMPTY_ERROR: "please input collection name",
            collection_name_DUPLICATION_ERROR: "collect name is duplicate",
            collection_category_EMPTY_ERROR: "please input collection category",
            collection_mode_EMPTY_ERROR: "please input collection mode",
            collection_season_EMPTY_ERROR: "please input collection season",
            collection_order_EMPTY_ERROR: "please input minimum order",
            collection_order_PATTERN_ERROR: "invalid minimum order",
            collection_currency_EMPTY_ERROR: "please select currency",
            collection_deadline_DATE_ERROR: "invalid collection deadline date",
            collection_delivery_DATE_ERROR: "invalid delivery date",
            collection_description_EMPTY_ERROR: "please input collection description",
            collection_image_EMPTY_ERROR: "please upload collection photo",

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
            dropdown__COUNTRY__AntiguaandBarbuda: 'AntiguaandBarbuda',
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
            dropdown__COUNTRY__CentralAfricanRepublic: 'CentralAfricanRepublic',
            dropdown__COUNTRY__Chad: 'Chad',
            dropdown__COUNTRY__Chile: 'Chile',
            dropdown__COUNTRY__China: 'China',
            dropdown__COUNTRY__Colombia: 'Colombia',
            dropdown__COUNTRY__Congo: 'Congo',
            dropdown__COUNTRY__CookIs: 'CookIs.',
            dropdown__COUNTRY__CostaRica: 'CostaRica',
            dropdown__COUNTRY__Cuba: 'Cuba',
            dropdown__COUNTRY__Cyprus: 'Cyprus',
            dropdown__COUNTRY__CzechRepublic: 'CzechRepublic',
            dropdown__COUNTRY__Denmark: 'Denmark',
            dropdown__COUNTRY__Djibouti: 'Djibouti',
            dropdown__COUNTRY__DominicaRep: 'DominicaRep.',
            dropdown__COUNTRY__Ecuador: 'Ecuador',
            dropdown__COUNTRY__Egypt: 'Egypt',
            dropdown__COUNTRY__EISalvador: 'EISalvador',
            dropdown__COUNTRY__Estonia: 'Estonia',
            dropdown__COUNTRY__Ethiopia: 'Ethiopia',
            dropdown__COUNTRY__Fiji: 'Fiji',
            dropdown__COUNTRY__Finland: 'Finland',
            dropdown__COUNTRY__France: 'France',
            dropdown__COUNTRY__FrenchGuiana: 'FrenchGuiana',
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
            dropdown__COUNTRY__NetheriandsAntilles: 'NetheriandsAntilles',
            dropdown__COUNTRY__Netherlands: 'Netherlands',
            dropdown__COUNTRY__NewZealand: 'NewZealand',
            dropdown__COUNTRY__Nicaragua: 'Nicaragua',
            dropdown__COUNTRY__Niger: 'Niger',
            dropdown__COUNTRY__Nigeria: 'Nigeria',
            dropdown__COUNTRY__NorthKorea: 'NorthKorea',
            dropdown__COUNTRY__Norway: 'Norway',
            dropdown__COUNTRY__Oman: 'Oman',
            dropdown__COUNTRY__Pakistan: 'Pakistan',
            dropdown__COUNTRY__Panama: 'Panama',
            dropdown__COUNTRY__PapuaNewCuinea: 'PapuaNewCuinea',
            dropdown__COUNTRY__Paraguay: 'Paraguay',
            dropdown__COUNTRY__Peru: 'Peru',
            dropdown__COUNTRY__Philippines: 'Philippines',
            dropdown__COUNTRY__Poland: 'Poland',
            dropdown__COUNTRY__FrenchPolynesia: 'FrenchPolynesia',
            dropdown__COUNTRY__Portugal: 'Portugal',
            dropdown__COUNTRY__PuertoRico: 'PuertoRico',
            dropdown__COUNTRY__Qatar: 'Qatar',
            dropdown__COUNTRY__Reunion: 'Reunion',
            dropdown__COUNTRY__Romania: 'Romania',
            dropdown__COUNTRY__Russia: 'Russia',
            dropdown__COUNTRY__SaintLueia: 'SaintLueia',
            dropdown__COUNTRY__SaintVincent: 'SaintVincent',
            dropdown__COUNTRY__SamoaEastern: 'SamoaEastern',
            dropdown__COUNTRY__SamoaWestern: 'SamoaWestern',
            dropdown__COUNTRY__SanMarino: 'SanMarino',
            dropdown__COUNTRY__SaoTomeandPrincipe: 'SaoTomeandPrincipe',
            dropdown__COUNTRY__SaudiArabia: 'SaudiArabia',
            dropdown__COUNTRY__Senegal: 'Senegal',
            dropdown__COUNTRY__Seychelles: 'Seychelles',
            dropdown__COUNTRY__SierraLeone: 'SierraLeone',
            dropdown__COUNTRY__Singapore: 'Singapore',
            dropdown__COUNTRY__Slovakia: 'Slovakia',
            dropdown__COUNTRY__Slovenia: 'Slovenia',
            dropdown__COUNTRY__SolomonIs: 'SolomonIs',
            dropdown__COUNTRY__Somali: 'Somali',
            dropdown__COUNTRY__SouthAfrica: 'SouthAfrica',
            dropdown__COUNTRY__Spain: 'Spain',
            dropdown__COUNTRY__SriLanka: 'SriLanka',
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
            dropdown__COUNTRY__TrinidadandTobago: 'TrinidadandTobago',
            dropdown__COUNTRY__Tunisia: 'Tunisia',
            dropdown__COUNTRY__Turkey: 'Turkey',
            dropdown__COUNTRY__Turkmenistan: 'Turkmenistan',
            dropdown__COUNTRY__Uganda: 'Uganda',
            dropdown__COUNTRY__Ukraine: 'Ukraine',
            dropdown__COUNTRY__UnitedArabEmirates: 'UnitedArabEmirates',
            dropdown__COUNTRY__UnitedKiongdom: 'UnitedKiongdom',
            dropdown__COUNTRY__UnitedStatesofAmerica: 'UnitedStatesofAmerica',
            dropdown__COUNTRY__Uruguay: 'Uruguay',
            dropdown__COUNTRY__Uzbekistan: 'Uzbekistan',
            dropdown__COUNTRY__Venezuela: 'Venezuela',
            dropdown__COUNTRY__Vietnam: 'Vietnam',
            dropdown__COUNTRY__Yemen: 'Yemen',
            dropdown__COUNTRY__Yugoslavia: 'Yugoslavia',
            dropdown__COUNTRY__Zimbabwe: 'Zimbabwe',
            dropdown__COUNTRY__Zaire: 'Zaire',
            dropdown__COUNTRY__Zambia: 'Zambia',
            
            // Collection Status
            COLLECTION_STATUS_ALL: 'All',
            COLLECTION_STATUS_0: 'Draft',
            COLLECTION_STATUS_1: 'Submitted',
            COLLECTION_STATUS_2: 'Closed',
            COLLECTION_STATUS_3: 'Deleted',
            
            
            // Store Type
            dropdown__STORE__ALL: 'ALL',
            dropdown__STORE__DEPARTMENT_SHOP: 'DEPARTMENT SHOP',
            dropdown__STORE__MULTI_BRAND_SHOP: 'MULTI-BRAND SHOP',
            dropdown__STORE__ONLINE_SHOP: 'ONLINE SHOP',

            // Collection Type
            dropdown__COLLECTION__ALL: 'ALL',
            dropdown__COLLECTION__WOMEN: 'WOMEN',
            dropdown__COLLECTION__ACCESSORIES: 'ACCESSORIES',
            dropdown__COLLECTION__MEN: 'MEN',

            // Collection Mode
            dropdown__COLLECTION_MODE__PRE_ORDER: 'PRE ORDER',
            dropdown__COLLECTION_MODE__STOCK: 'STOCK',
            dropdown__COLLECTION_MODE__RE_ORDER: 'RE ORDER',
            dropdown__COLLECTION_MODE__PERMANENT: 'PERMANENT',

            // Collection Season
            dropdown__COLLECTION_SEASON__AW_15: 'AW15',
            dropdown__COLLECTION_SEASON__PRE_SS16: 'PRE-SS16',
            dropdown__COLLECTION_SEASON__SS_16: 'SS16',
            dropdown__COLLECTION_SEASON__AW_16: 'AW16',

            // Product Category
            dropdown__PRODUCT_CATEGORY__ALL: "ALL",
            dropdown__PRODUCT_CATEGORY__HAT: "HAT",
            dropdown__PRODUCT_CATEGORY__TOP: "TOP",
            dropdown__PRODUCT_CATEGORY__KNIT: "KNIT",
            dropdown__PRODUCT_CATEGORY__SHIRT: "SHIRT",
            dropdown__PRODUCT_CATEGORY__DRESS: "DRESS",
            dropdown__PRODUCT_CATEGORY__JUMPSUIT: "JUMPSUIT",
            dropdown__PRODUCT_CATEGORY__COAT: "COAT",
            dropdown__PRODUCT_CATEGORY__SKIRT: "SKIRT",
            dropdown__PRODUCT_CATEGORY__PANTS: "PANTS",
            dropdown__PRODUCT_CATEGORY__BELT: "BELT",
            dropdown__PRODUCT_CATEGORY__GLOVES: "GLOVES",
            dropdown__PRODUCT_CATEGORY__SHOES: "SHOES",
            dropdown__PRODUCT_CATEGORY__BAG: "BAG",

            // Product Material
            dropdown__PRODUCT_MATERIAL__Acetate: "Acetate",
            dropdown__PRODUCT_MATERIAL__Acrylic: "Acrylic",
            dropdown__PRODUCT_MATERIAL__Aliginate_fiber: "Aliginate Fiber",
            dropdown__PRODUCT_MATERIAL__Angora: "Angora",
            dropdown__PRODUCT_MATERIAL__Artificial_cotton: "Artificial Cotton",
            dropdown__PRODUCT_MATERIAL__Bast: "Bast",
            dropdown__PRODUCT_MATERIAL__Blend_fiber: "Blend Fiber",
            dropdown__PRODUCT_MATERIAL__Braid: "Braid",
            dropdown__PRODUCT_MATERIAL__Cotton: "Cotton",
            dropdown__PRODUCT_MATERIAL__Cashmere: "Cashmere",
            dropdown__PRODUCT_MATERIAL__Cellulose_ester: "Cellulose Ester",
            dropdown__PRODUCT_MATERIAL__Cellulose: "Cellulose",
            dropdown__PRODUCT_MATERIAL__Down: "Down",
            dropdown__PRODUCT_MATERIAL__Elastane: "Elastane",
            dropdown__PRODUCT_MATERIAL__Filament: "Filament",
            dropdown__PRODUCT_MATERIAL__Flax: "Flax",
            dropdown__PRODUCT_MATERIAL__Fur: "Fur",
            dropdown__PRODUCT_MATERIAL__Fur_garment: "Fur Garment",
            dropdown__PRODUCT_MATERIAL__Hemp: "Hemp",
            dropdown__PRODUCT_MATERIAL__Jute: "Jute",
            dropdown__PRODUCT_MATERIAL__Man_made_fiber: "Man-made Fiber",
            dropdown__PRODUCT_MATERIAL__Modacrylic: "Modacrylic",
            dropdown__PRODUCT_MATERIAL__Modal: "Modal",
            dropdown__PRODUCT_MATERIAL__Mohair: "Mohair",
            dropdown__PRODUCT_MATERIAL__Natural_fiber: "Natural Fiber",
            dropdown__PRODUCT_MATERIAL__Nylon: "Nylon",
            dropdown__PRODUCT_MATERIAL__Polyamide: "Polyamide",
            dropdown__PRODUCT_MATERIAL__Polymer: "Polymer",
            dropdown__PRODUCT_MATERIAL__Polyester: "Polyester",
            dropdown__PRODUCT_MATERIAL__Polyethylene: "Polyethylene",
            dropdown__PRODUCT_MATERIAL__Polypropylene: "Polypropylene",
            dropdown__PRODUCT_MATERIAL__Polyester_wadding: "Polyester Wadding",
            dropdown__PRODUCT_MATERIAL__Rayon: "Rayon",
            dropdown__PRODUCT_MATERIAL__Regenerated_fiber: "Regenerated Fiber",
            dropdown__PRODUCT_MATERIAL__Rabbit: "Rabbit",
            dropdown__PRODUCT_MATERIAL__Silk: "Silk",
            dropdown__PRODUCT_MATERIAL__Silk_wadding: "Silk Wadding",
            dropdown__PRODUCT_MATERIAL__Spandex_elastomer: "Spandex Elastomer",
            dropdown__PRODUCT_MATERIAL__Staple: "Staple",
            dropdown__PRODUCT_MATERIAL__Synthetic: "Synthetic",
            dropdown__PRODUCT_MATERIAL__Velvet: "Velvet",
            dropdown__PRODUCT_MATERIAL__Viscose: "Viscose",
            dropdown__PRODUCT_MATERIAL__Wool: "Wool",
            dropdown__PRODUCT_MATERIAL__Other: "Other"

        }
	}
);
