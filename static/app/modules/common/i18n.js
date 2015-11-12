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
            // directives.js
            directives_js__LANGUAGE: '语言',
            directives_js__CURRENCY: '货币',
            directives_js__WELCOME: '欢迎',
            directives_js__LOGIN: '登录',
            directives_js__LOGOUT: '退出',
            directives_js__REGISTER: '注册',
            directives_js__UPLOADING: '上传图片中',

            // home.html
            home__LEARN_MORE: '了解更多',
            home__CONTRACT_US: '联系我们',

            home__XSHOWROOM_DESC: '现在就开展你的业务 . . .',
            home__XSHOWROOM_BUYER_COUNT: '时尚买手',
            home__XSHOWROOM_BRANDS_COUNT: '品牌客户',
            home__XSHOWROOM_PRODUCTS_COUNT: '上线产品',
            home__XSHOWROOM_ORDERS_COUNT: '达成订单',

            home__BRANDS: '品牌拓展',
            home__BRANDS_DESC: '将您的品牌展示给中国最棒的买手店，与买手圈的顶尖买手们建立合作',
            home__BUYERS: '时尚买手',
            home__BUYERS_DESC: '作为时尚买手入驻买手圈，挖掘最新最赞的设计师品牌，采购最新系列',

            home__btn_SOLUTION: '解决方案',
            home__btn_REGISTER: '申请入驻',

            home__HOT_BRANDS: '热门品牌',
            home__BRAND_PROFILES: '品牌介绍',
            home__SSI5_COLLECTION: '2015春夏系列',

            home__TESTOMONIALS: 'XShowroom人物',
            home__FEATURED: '圈内点评',
            home__people_BUYER: '买手',
            home__people_DESIGNER: '品牌设计师',

            // global-no-user-navigation.html
            global_no_user_navigation__HOME: '首页',
            global_no_user_navigation__GUIDE: '入圈',
            global_no_user_navigation__SHOP: '选货',
            global_no_user_navigation__DISCOVER: '探索',
            global_no_user_navigation__PRESS: '资讯',
            global_no_user_navigation__CONTACT: '联系',

            // global-footer-navigation.html
            global_footer_navigation__LOCATION: '地址',

            global_footer_navigation__HELP: '帮助',
            global_footer_navigation__HELP__HOW_TO_BUY: '如何购买',
            global_footer_navigation__HELP__GENERAL_INFORMATION: '信息概览',
            global_footer_navigation__HELP__PAYMENT: '支付方式',
            global_footer_navigation__HELP__SHIPPING: '物流派送',
            global_footer_navigation__HELP__RETURNS: '退货流程',
            global_footer_navigation__HELP__EXCHANGE: '换货流程',
            global_footer_navigation__HELP__GIFT_CARD: '礼品卡',
            global_footer_navigation__HELP__MY_ACCOUNT: '我的账户',
            global_footer_navigation__HELP__WATCHES: '访问网站',

            global_footer_navigation__POLICIES: '政策',
            global_footer_navigation__POLICIES__ENVIRONMENT_POLICY: '环境政策',
            global_footer_navigation__POLICIES__ANIMAL_WELFARE: '动物保护',
            global_footer_navigation__POLICIES__PRIVACY_POLICY: '隐私策略',
            global_footer_navigation__POLICIES__PURCHASE_CONDITIONS: '购买要求',
            global_footer_navigation__POLICIES__GIFT_CARD_CONDITIONS: '礼品卡要求',
            global_footer_navigation__POLICIES__WARRANTY_ON_WATCHES: '查看担保',

            global_footer_navigation__COMPANY: '公司',
            global_footer_navigation__COMPANY__ABOUT_US: '关于我们',
            global_footer_navigation__COMPANY__DISCOVER: '探索',
            global_footer_navigation__COMPANY__PRESS: '咨询',
            global_footer_navigation__COMPANY__LICENSE: '许可',
            global_footer_navigation__COMPANY__CONTACT: '联系',

            // guide.html
            guide__SOLUTIONS_FOR_BRANDS: '时尚品牌 - 解决方案',
            guide__SOLUTIONS_FOR_RETAILERS: '时尚买手 - 解决方案',
            guide__X_SHOWROOM_FASHION: 'X SHOWROOM ',
            guide__SOLUTION_BRAND: '品牌',
            guide__SOLUTION_RETAILER: '时尚买手',
            guide__ACCESS_SUBSCRIPTION: '现在加入我们',

            guide__brand_left_INTRODUCE: '您想通过入驻线上showroom来打通更大的市场，挖掘品牌更大的潜力吗？通过买手圈，您的品牌将成功打入中国的买手市场。通过买手圈，您将得到来自我们最专业圈内人员的支持，以更好的推广您的品牌，我们的工作人员长期与Project Crossover线下showroom合作，深悉中国买手市场。同时，我们联合上海和伦敦的两大线下showroom及线上买手圈，为品牌的成长提供多重专业平台。通过买手圈，您的品牌会被1000多名已经注册入驻的买手知晓，每个系列的知名度、浏览量、订货量都会得到显著提高。',
            guide__brand_right_INTRODUCE_1: '展示给精选买手',
            guide__brand_right_INTRODUCE_DESC_1: '通过买手圈, 将品牌最新系列展示给精选买手们',
            guide__brand_right_INTRODUCE_2: '结识顶尖买手',
            guide__brand_right_INTRODUCE_DESC_2: '通过买手圈，让中国各大买手与您的时尚品牌建立合作',
            guide__brand_right_INTRODUCE_3: '建立可靠买手圈网络',
            guide__brand_right_INTRODUCE_DESC_3: '只有拥有真实销售渠道并审核通过的买手才可预览品牌最新系列',

            guide__buyer_INTRODUCE: '时尚买手的订货专属平台',
            guide__buyer_INTRODUCE_DESC: '您拥有自己的买手店吗？无论是线下实体店或是线上网店，您都可以入驻买手圈成为圈内认证买手，并浏览买手圈众多品牌的最新系列。入驻买手圈完全免费，买手圈平台全年无休供您选购最新商品。选购流程极为便利：浏览品牌，订货下单，提交订单，品牌即可第一时间审核订单并进入到下一步。若有任何问题，我们上海showroom线下团队最为专业的工作人员将第一时间与您取得联络，协助并解决您的一切订货问题。',

            guide__btn_REGISTER: '注册',
            guide__btn_SIGN_IN: '登录',

            guide__MORE_BENEFITS_OF_REGISTERING_WITH_US: '加入我们的更多优势 . . .',

            guide__benefits_PREVIEW_PROFILES: '浏览买手信息',
            guide__benefits_PREVIEW_PROFILES_DESC: '买手提交预览品牌申请后，品牌可及时浏览买手相关信息',
            guide__benefits_LANGUAGE_SELECTION: '双语言环境',
            guide__benefits_LANGUAGE_SELECTION_DESC: '全网中英双语精准对照，方便品牌及买手',
            guide__benefits_PROMOTION: '品牌推广',
            guide__benefits_PROMOTION_DESC: '买手圈为品牌提供丰富多样的品牌推广环境，买手可注册接收品牌最新资讯，并关注买手圈官方社交平台',
            guide__benefits_CHOOSE_ACCOUNT_TYPE: '选择账户类型',
            guide__benefits_CHOOSE_ACCOUNT_TYPE_DESC: '您可以选择以下两种账户中的一种进行注册入驻：',
            guide__benefits_CHOOSE_ACCOUNT_TYPE_ACCOUNT_1: '-	线上普通账户（免费）',
            guide__benefits_CHOOSE_ACCOUNT_TYPE_ACCOUNT_2: '-	高级VIP账户（暂定）',
            guide__benefits_DIGITAL_LINE_SHEETSS: '电子订货资料表',
            guide__benefits_DIGITAL_LINE_SHEETS_DESC: '自动生成电子版本订货资料表格，方便买手下载',
            guide__benefits_MINIMISE_ORDER_ERROR: '起订量设置',
            guide__benefits_MINIMISE_ORDER_ERROR_DESC: '线上订货平台使用便利，后台预设起订量，自动避免订货错误',
            guide__benefits_UNLIMITED_UPLOAD: '无限上传空间',
            guide__benefits_UNLIMITED_UPLOAD_DESC: '享受无限上传空间，上传品牌最新系列高清资料',
            guide__benefits_24_7_SHOWROOM: '24/7订货',
            guide__benefits_24_7_SHOWROOM_DESC: '买手享受全年无休时时订货',
            guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY: '24/7接收订货资讯',
            guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY_DESC: '品牌可24小时浏览买手订货信息',
            guide__benefits_BUYER_REPORTS_TRACKING_STATISTICS: '获得买手浏览数据',
            guide__benefits_BUYER_REPORTS_TRACKING_STATISTICS_DESC: '可阅览买手浏览信息及买手相关数据汇总（VIP帐户）',
            guide__benefits_SHOWROOM_FOR_PREMIUM_MEMBERS: '高级VIP账户特权',
            guide__benefits_SHOWROOM_FOR_PREMIUM_MEMBERS_DESC: '高级VIP账户可获得线下showroom展示空间，由线下showroom专属客户经理推广您的品牌',
            guide__benefits_TRADESHOWS: '展会展示',
            guide__benefits_TRADESHOWS_DESC: '买手圈将在每一季的线下时装周展会中介绍展示您的品牌',

            guide__benefits_PREVIEW_COLLECTIONS: '浏览最新系列',
            guide__benefits_PREVIEW_COLLECTIONS_DESC: '线上平台即可浏览最新系列',
            guide__benefits_24_7_ACCESS: '24/7',
            guide__benefits_24_7_ACCESS_DESC: '买手享受全年无休时时订货',
            guide__benefits_DISCOVER_BRANDS: '探索最新品牌',
            guide__benefits_DISCOVER_BRANDS_DESC: '通过买手圈丰富的品牌库，时时探索发现最新品牌。',
            guide__benefits_VIRTUAL_SHOWROOMS: '线下showroom',
            guide__benefits_VIRTUAL_SHOWROOMS_DESC: '部分精选品牌将展示在我们的线下showroom中，买手可申请',
            guide__benefits_ONLINE_ORDER_SYSTEM: '线上订货',
            guide__benefits_ONLINE_ORDER_SYSTEM_DESC: '充分体验线上下单及补单的快捷便利',
            guide__benefits_SAVE_FOR_LATER: '先存后买',
            guide__benefits_SAVE_FOR_LATER_DESC: '先创建订单，后期再进行支付.',
            guide__benefits_KEEP_TRACK: '订货状态更新',
            guide__benefits_KEEP_TRACK_DESC: '您的所有历史订单都将保存在您的帐户中，以便及时关注订单状态更新',
            guide__benefits_TRAINING: '买手圈使用指导',
            guide__benefits_TRAINING_DESC: '我们将为新入圈的买手提供入圈指导，以保障您日后使用买手圈',
            guide__benefits_DEDICATED_URL: '专属URL页面链接',
            guide__benefits_DEDICATED_URL_DESC: '每个品牌都有专属的URL链接页面，方便买手直接进入品牌页面',
            guide__benefits_TRANSLATION_PROVIDED: '双语客户经理',
            guide__benefits_TRANSLATION_PROVIDED_DESC: '我们的客户经理可为您提供中英双语咨询服务，无需担心任何语言问题.',

            guide__MEMBERSHIP_INCLUDES: '会员权益包括…',
            guide__MEMBERSHIP_INCLUDES_R1: '> 为期一年的免费线上系统使用权',
            guide__MEMBERSHIP_INCLUDES_R2: '> 提供买手圈使用方法准则',
            guide__MEMBERSHIP_INCLUDES_R3: '> 将品牌文字介绍内容翻译成中文，以便中国买手浏览',
            guide__MEMBERSHIP_INCLUDES_R4: '> 专享URL地址以便买手更便捷地进入您的品牌介绍页',
            guide__MEMBERSHIP_INCLUDES_R5: '> 品牌对应的双语客户经理将及时与品牌及买手沟通，中英文时时切换，实现无障碍交流',

            // login.html
            login__SIGN_IN: '登录',
            login__EMAIL: '电子邮箱*,',
            login__PASSWORD: '输入密码*',
            login__VALID_CODE: '验证码*',
            login__btn_LOGIN: '登录',
            login__REMEMBER_ME: '记住我',

            login__REQUEST_MEMBERSHIP: '新用户申请',
            login__REQUEST_MEMBERSHIP_DESC: '买手圈只向注册并审核通过的品牌、代理机构及买手开放。若想入驻买手圈，请完成在线注册：',
            login__REQUEST_BRAND: '品牌入驻',
            login__REQUEST_BUYER: '买手入圈',

            // brand-register.html
            brand_register__STEP: '步骤',
            brand_register__SETP_OF: '/',
            brand_register__STEP_INFORMATION_1: '添加用户信息',
            brand_register__STEP_INFORMATION_2: '添加品牌信息',
            brand_register__STEP_INFORMATION_3: '添加公司信息',

            brand_register__STEP_1__EMAIL_ADDRESS: '电子邮箱',
            brand_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER: '请输入电子邮箱 *',
            brand_register__STEP_1__PASSWORD: '您的密码',
            brand_register__STEP_1__PASSWORD_PLACEHOLDER: '请输入您的密码 *',
            brand_register__STEP_1__FIRST_NAME_PLACEHOLDER: '您的名字 *',
            brand_register__STEP_1__LAST_NAME_PLACEHOLDER: '您的姓氏 *',
            brand_register__STEP_1__DISPLAY_NAME_PLACEHOLDER: '您的显示名 *',
            brand_register__STEP_1__TELEPHONE_PLACEHOLDER: '您的联系电话 *',
            brand_register__STEP_1__MOBILE_PLACEHOLDER: '"您的手机号码 (可选)',
            brand_register__STEP_1__btn__CANCEL: '取消注册',
            brand_register__STEP_1__btn__ADD_BRAND: '添加品牌',

            brand_register__STEP_2__IMAGE: '相册 / 照片',
            brand_register__STEP_2__UPLOAD: '上传',
            brand_register__STEP_2__BRAND_NAME_PLACEHOLDER: '请输入您的品牌名称 *',
            brand_register__STEP_2__DESIGNER_NAME_PLACEHOLDER: '设计师 *',
            brand_register__STEP_2__URL_DESC_1: '这个链接将被用于直接定位到你的品牌站点',
            brand_register__STEP_2__URL_DESC_2: '(通过验证的买手才能访问)',
            brand_register__STEP_2__btn__PREVIOUS: '上一步',
            brand_register__STEP_2__btn__ADD_COMPANY: '添加公司',

            brand_register__STEP_3__COMPANY_NAME_PLACEHOLDER: '公司名称 *',
            brand_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER: '公司地址 *',
            brand_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER: '国家 *',
            brand_register__STEP_3__COMPANY_ZIP_PLACEHOLDER: '邮政编码 *',
            brand_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER: '公司电话 *',
            brand_register__STEP_3__COMPANY_URL_PLACEHOLDER: '公司网址 *',
            brand_register__STEP_3__COMPANY_ACCEPT_1: 'On receipt of your application, an invoice will be sent to your email address. Membership access will be granted on payment confirmation.',
            brand_register__STEP_3__COMPANY_ACCEPT_2: 'I accept the terms and conditions of Project Crossover Online Showrooms web site.',
            brand_register__STEP_3__btn__PREVIOUS: '上一步',
            brand_register__STEP_3__btn__SUBMIT: '提交注册',
        },
        'en': {
            // directives.js
            directives_js__LANGUAGE: 'LANGUAGE',
            directives_js__CURRENCY: 'CURRENCY',
            directives_js__WELCOME: 'WELCOME',
            directives_js__LOGIN: 'LOGIN',
            directives_js__LOGOUT: 'LOGOUT',
            directives_js__REGISTER: 'REGISTER',
            directives_js__UPLOADING: 'UPLOADING IMAGE',

            // home.html
            home__LEARN_MORE: 'LEARN MORE',
            home__CONTRACT_US: 'CONTACT US',

            home__XSHOWROOM_DESC: 'FIND YOUR BUSINESS HERE',
            home__XSHOWROOM_BUYER_COUNT: 'BUYER',
            home__XSHOWROOM_BRANDS_COUNT: 'BRANDS',
            home__XSHOWROOM_PRODUCTS_COUNT: 'PRODUCTS',
            home__XSHOWROOM_ORDERS_COUNT: 'ORDERS',

            home__BRANDS: 'BRANDS',
            home__BRANDS_DESC: 'Showcase your collection to the best stores in China. Expand and connect with new possibilities.',
            home__BUYERS: 'RETAILERS',
            home__BUYERS_DESC: 'Discover new and exciting brands and explore their collections.',

            home__btn_SOLUTION: 'SOLUTION',
            home__btn_REGISTER: 'REGISTER',

            home__HOT_BRANDS: 'HOT BRANDS',
            home__BRAND_PROFILES: 'BRAND PROFILES',
            home__SSI5_COLLECTION: 'SSI5 COLLECTION',

            home__TESTOMONIALS: 'TESTOMONIALS',
            home__FEATURED: 'FEATURED',
            home__people_BUYER: 'BUYER',
            home__people_DESIGNER: 'BRAND DESIGNER',

            // global-no-user-navigation.html
            global_no_user_navigation__HOME: 'HOME',
            global_no_user_navigation__GUIDE: 'GUIDE',
            global_no_user_navigation__SHOP: 'SHOP',
            global_no_user_navigation__DISCOVER: 'DISCOVER',
            global_no_user_navigation__PRESS: 'PRESS',
            global_no_user_navigation__CONTACT: 'CONTACT',

            // global-footer-navigation.html
            global_footer_navigation__LOCATION: 'LOCATION',

            global_footer_navigation__HELP: 'HELP',
            global_footer_navigation__HELP__HOW_TO_BUY: 'HOW TO BUY',
            global_footer_navigation__HELP__GENERAL_INFORMATION: 'GENERAL INFORMATION',
            global_footer_navigation__HELP__PAYMENT: 'PAYMENT',
            global_footer_navigation__HELP__SHIPPING: 'SHIPPING',
            global_footer_navigation__HELP__RETURNS: 'RETURNS',
            global_footer_navigation__HELP__EXCHANGE: 'EXCHANGE',
            global_footer_navigation__HELP__GIFT_CARD: 'GIFT CARD',
            global_footer_navigation__HELP__MY_ACCOUNT: 'MY ACCOUNT',
            global_footer_navigation__HELP__WATCHES: 'WATCHES',

            global_footer_navigation__POLICIES: 'POLICIES',
            global_footer_navigation__POLICIES__ENVIRONMENT_POLICY: 'ENVIRONMENT POLICY',
            global_footer_navigation__POLICIES__ANIMAL_WELFARE: 'ANIMAL WELFARE',
            global_footer_navigation__POLICIES__PRIVACY_POLICY: 'PRIVACY POLICY',
            global_footer_navigation__POLICIES__PURCHASE_CONDITIONS: 'PURCHASE CONDITIONS',
            global_footer_navigation__POLICIES__GIFT_CARD_CONDITIONS: 'GIFT CARD CONDITIONS',
            global_footer_navigation__POLICIES__WARRANTY_ON_WATCHES: 'WARRANTY ON WATCHES',

            global_footer_navigation__COMPANY: 'COMPANY',
            global_footer_navigation__COMPANY__ABOUT_US: 'ABOUT US',
            global_footer_navigation__COMPANY__DISCOVER: 'DISCOVER',
            global_footer_navigation__COMPANY__PRESS: 'PRESS',
            global_footer_navigation__COMPANY__LICENSE: 'LICENSE',
            global_footer_navigation__COMPANY__CONTACT: 'CONTACT',

            // guide.html
            guide__SOLUTIONS_FOR_BRANDS: 'SOLUTIONS FOR BRANDS',
            guide__SOLUTIONS_FOR_RETAILERS: 'SOLUTIONS FOR RETAILERS',
            guide__X_SHOWROOM_FASHION: 'X SHOWROOM FASHION',
            guide__SOLUTION_BRAND: 'BRAND',
            guide__SOLUTION_RETAILER: 'RETAILER',
            guide__ACCESS_SUBSCRIPTION: 'ACCESS SUBSCRIPTION',

            guide__brand_left_INTRODUCE: 'Are you interested in exploring the market with the an online showroom who will help you reach your potential? Market your brand to buyers in China with us. With X SHOWROOM, you can take advantage of the extensive experience of the staff who in partnership with Project Crossover, offer the Shanghai and London showroom along with the online showroom as digital presence for your brand to streamline the wholesale process. You can be sure the visibility of your collection and products will continually increase with us through the 1000 buyers already registered.',
            guide__brand_right_INTRODUCE_1: 'SHOWCASE TO SELECTED BUYERS',
            guide__brand_right_INTRODUCE_DESC_1: 'An online showroom to showcase your products to our selected buyers',
            guide__brand_right_INTRODUCE_2: 'ACCESS TO TOP BUYERS',
            guide__brand_right_INTRODUCE_DESC_2: 'Gain access to our network of authenticated buyers',
            guide__brand_right_INTRODUCE_3: 'RELIABLE NETWORK',
            guide__brand_right_INTRODUCE_DESC_3: 'Only buyers with existing stores will have access to see the collection',

            guide__buyer_INTRODUCE: 'SHOWCASE TO SELECTED BRANDS',
            guide__buyer_INTRODUCE_DESC: 'Do you have your own store? Whether you choose to sell online or in store, sign up as a buyer on X SHOWROOM and view the collections that our brands have available. Sign up is FREE, and there are no subscription fees to pay. Product catalogues and our online showrooms are available 24/7. Simply view the collections and submit your order directly to the brand and they will be in touch to process your order. Our team in Shanghai are always at hand to assist in the proccess and with communication.',

            guide__btn_REGISTER: 'REGISTER',
            guide__btn_SIGN_IN: 'SIGN IN',

            guide__MORE_BENEFITS_OF_REGISTERING_WITH_US: 'MORE BENEFITS OF REGISTERING WITH US',

            guide__benefits_PREVIEW_PROFILES: 'PREVIEW PROFILES',
            guide__benefits_PREVIEW_PROFILES_DESC: 'Brands can view store profiles before confirming the order.',
            guide__benefits_LANGUAGE_SELECTION: 'LANGUAGE SELECTION',
            guide__benefits_LANGUAGE_SELECTION_DESC: 'Identical pages are set up in the Chinese language to cater to our Chinese reading customers.',
            guide__benefits_PROMOTION: 'PROMOTION',
            guide__benefits_PROMOTION_DESC: 'Your brand will be featured in the X SHOWROOM promotional activities including our Chinese newsletters and Chinese social media channels.',
            guide__benefits_CHOOSE_ACCOUNT_TYPE: 'CHOOSE ACCOUNT TYPE',
            guide__benefits_CHOOSE_ACCOUNT_TYPE_DESC: 'Two types of account are available:',
            guide__benefits_CHOOSE_ACCOUNT_TYPE_ACCOUNT_1: '- Online account',
            guide__benefits_CHOOSE_ACCOUNT_TYPE_ACCOUNT_2: '- Premium account',
            guide__benefits_DIGITAL_LINE_SHEETSS: 'DIGITAL LINE SHEETS',
            guide__benefits_DIGITAL_LINE_SHEETS_DESC: 'Line sheets are set up automatically and can be downloaded.',
            guide__benefits_MINIMISE_ORDER_ERROR: 'MINIMISE ORDER ERROR',
            guide__benefits_MINIMISE_ORDER_ERROR_DESC: 'Minimise the rate of order errors as orders are made online through our reliable user friendly platform.',
            guide__benefits_UNLIMITED_UPLOAD: 'UNLIMITED UPLOAD',
            guide__benefits_UNLIMITED_UPLOAD_DESC: 'Enjoy unlimited upload of collection and products.',
            guide__benefits_24_7_SHOWROOM: '24/7 access to buyer order history.',
            guide__benefits_24_7_SHOWROOM_DESC: '24/7 access to buyer order history.',
            guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY: '24/7 ACCESS TO ORDER HISTORY',
            guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY_DESC: 'Buyers will be able to access your product catalogue 24/7.',
            guide__benefits_BUYER_REPORTS_TRACKING_STATISTICS: 'BUYER REPORTS & TRACKING STATISTICS',
            guide__benefits_BUYER_REPORTS_TRACKING_STATISTICS_DESC: 'Buyer reports and tracking statistics are available for your usage (on request)',
            guide__benefits_SHOWROOM_FOR_PREMIUM_MEMBERS: 'SHOWROOM FOR PREMIUM MEMBERS',
            guide__benefits_SHOWROOM_FOR_PREMIUM_MEMBERS_DESC: 'Premium member account holders can enjoy the privilege of having an added physical showroom opened throughout the whole year, with support from our professional sales team.',
            guide__benefits_TRADESHOWS: 'TRADESHOWS',
            guide__benefits_TRADESHOWS_DESC: 'X SHOWROOM will represent you in a trade show every season.',

            guide__benefits_PREVIEW_COLLECTIONS: 'PREVIEW COLLECTIONS',
            guide__benefits_PREVIEW_COLLECTIONS_DESC: 'Preview collection online.',
            guide__benefits_24_7_ACCESS: '24/7 ACCESS',
            guide__benefits_24_7_ACCESS_DESC: '24/7 access to online system.',
            guide__benefits_DISCOVER_BRANDS: 'DISCOVER BRANDS',
            guide__benefits_DISCOVER_BRANDS_DESC: 'Discover new brands and make new connections through our large directory.',
            guide__benefits_VIRTUAL_SHOWROOMS: 'VIRTUAL SHOWROOMS',
            guide__benefits_VIRTUAL_SHOWROOMS_DESC: 'Virtual showrooms for our selected Brands.',
            guide__benefits_ONLINE_ORDER_SYSTEM: 'ONLINE ORDER SYSTEM',
            guide__benefits_ONLINE_ORDER_SYSTEM_DESC: 'experience the ease of the simple online system for ordering and re-ordering.',
            guide__benefits_SAVE_FOR_LATER: 'SAVE FOR LATER',
            guide__benefits_SAVE_FOR_LATER_DESC: 'Set up orders for purchasing later (subject to Brand availability).',
            guide__benefits_KEEP_TRACK: 'KEEP TRACK',
            guide__benefits_KEEP_TRACK_DESC: 'View previous orders through the order history in your account.',
            guide__benefits_TRAINING: 'TRAINING',
            guide__benefits_TRAINING_DESC: 'X SHOWROOM provides training on how to use the system.',
            guide__benefits_DEDICATED_URL: 'DEDICATED URL',
            guide__benefits_DEDICATED_URL_DESC: 'Dedicated URLs for easy access to Brands (subject to approval).',
            guide__benefits_TRANSLATION_PROVIDED: 'TRANSLATION PROVIDED',
            guide__benefits_TRANSLATION_PROVIDED_DESC: 'Account Manager is able to provide help to handle communication should language be a barrier (English/Chinese).',

            guide__MEMBERSHIP_INCLUDES: 'MEMBERSHIP INCLUDES',
            guide__MEMBERSHIP_INCLUDES_R1: '> One year access to the system',
            guide__MEMBERSHIP_INCLUDES_R2: '> Training to use the system',
            guide__MEMBERSHIP_INCLUDES_R3: '> Translation of main content text to Chinese for Chinese buyers',
            guide__MEMBERSHIP_INCLUDES_R4: '> A dedicated URL for Buyers to quickly access your product catalogue',
            guide__MEMBERSHIP_INCLUDES_R5: '> Account Manager to handle verbal communications where there is a language barrier for English/Chinese',

            // login.html
            login__SIGN_IN: 'SIGN IN',
            login__EMAIL: 'EMAIL ADDRESS*,',
            login__PASSWORD: 'YOUR PASSWORD*',
            login__VALID_CODE: 'VALID CODE*',
            login__btn_LOGIN: 'LOGIN',
            login__REMEMBER_ME: 'REMEMBER ME',

            login__REQUEST_MEMBERSHIP: 'REQUEST MEMBERSHIP',
            login__REQUEST_MEMBERSHIP_DESC: 'X SHOWROOM IS OPEN TO SELECTED BRANDS. AGENCIES AND BUYERS TO PARTICIPATE. PLEASE REGISTER ONLINE',
            login__REQUEST_BRAND: 'FOR BRANDS',
            login__REQUEST_BUYER: 'FOR BUYER',

            // brand-register.html
            brand_register__STEP: 'STEP',
            brand_register__SETP_OF: 'OF',
            brand_register__STEP_INFORMATION_1: 'ADD USER DETAILS',
            brand_register__STEP_INFORMATION_2: 'ADD BRAND DETAILS',
            brand_register__STEP_INFORMATION_3: 'ADD COMPANY DETAILS',

            brand_register__STEP_1__EMAIL_ADDRESS: 'EMAIL ADDRESS',
            brand_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER: 'PLEASE ENTER EMAIL ADDRESS *',
            brand_register__STEP_1__PASSWORD: 'PASSWORD',
            brand_register__STEP_1__PASSWORD_PLACEHOLDER: 'PLEASE ENTER YOUR PASSWORD *',
            brand_register__STEP_1__FIRST_NAME_PLACEHOLDER: 'FIRST NAME *',
            brand_register__STEP_1__LAST_NAME_PLACEHOLDER: 'LAST NAME *',
            brand_register__STEP_1__DISPLAY_NAME_PLACEHOLDER: 'DISPLAY NAME *',
            brand_register__STEP_1__TELEPHONE_PLACEHOLDER: 'CONTACT TELEPHONE NUMBER *',
            brand_register__STEP_1__MOBILE_PLACEHOLDER: '"CONTACT MOBILE NUMBER (OPTIONAL)',
            brand_register__STEP_1__btn__CANCEL: 'CANCEL',
            brand_register__STEP_1__btn__ADD_BRAND: 'ADD BRAND',

            brand_register__STEP_2__IMAGE: 'LOOKBOOK / IMAGE',
            brand_register__STEP_2__UPLOAD: 'UPLOAD',
            brand_register__STEP_2__BRAND_NAME_PLACEHOLDER: 'PLEASE ENTER YOUR BRAND NAME *',
            brand_register__STEP_2__DESIGNER_NAME_PLACEHOLDER: 'DESIGNER NAME *',
            brand_register__STEP_2__URL_DESC_1: 'This URL will be used for direct access to your Brand',
            brand_register__STEP_2__URL_DESC_2: '(for authenticated Buyers only)',
            brand_register__STEP_2__btn__PREVIOUS: 'PREVIOUS',
            brand_register__STEP_2__btn__ADD_COMPANY: 'ADD COMPANY',

            brand_register__STEP_3__COMPANY_NAME_PLACEHOLDER: 'COMPANY NAME *',
            brand_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER: 'COMPANY ADDRESS *',
            brand_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER: 'STATE/COUNTRY *',
            brand_register__STEP_3__COMPANY_ZIP_PLACEHOLDER: 'POSTCODE/ZIP *',
            brand_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER: 'COMPANY TELEPHONE NUMBER *',
            brand_register__STEP_3__COMPANY_URL_PLACEHOLDER: 'COMPANY WEB PAGE URL *',
            brand_register__STEP_3__COMPANY_ACCEPT_1: 'On receipt of your application, an invoice will be sent to your email address. Membership access will be granted on payment confirmation.',
            brand_register__STEP_3__COMPANY_ACCEPT_2: 'I accept the terms and conditions of Project Crossover Online Showrooms web site.',
            brand_register__STEP_3__btn__PREVIOUS: 'PREVIOUS',
            brand_register__STEP_3__btn__SUBMIT: 'SUBMIT',
		}
	}
);
