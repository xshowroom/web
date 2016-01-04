<?php defined('SYSPATH') OR die('No direct script access.');

return array_merge(
    /**
     * API Message
     */
    array(
        'not_login' => '用户名或者密码错误',
        'logged_in' => '已登录',
        'image_err' => '验证码不正确',
        'register_failed' => '注册失败',
        'register_success' => '注册成功',
        'upload_failed' => '上传失败',
        'upload_success' => '上传成功',
        'email_existed' => '该邮箱已被注册',
        'name_existed' => '名称已经存在',
        'brandName_existed' => '该品牌名称已存在',
        'brandUrl_existed' => '该URL已存在',
        'check_ok' => '参数验证成功',
        'not_active' => '等待管理员审核中',
    ),
    /**
     * Inbox Message
     */
    array(
        'AUTO_MSG_WELCOME_BRAND' => "欢迎来到XSHOWROOM! 让我们一起开始我们的商业之旅! 您在使用过程中有任何问题，可以通过邮件告诉我们 info@projectcrossover.com",
        'AUTO_MSG_WELCOME_BUYER' => "欢迎来到XSHOWROOM! 让我们一起开始我们的商业之旅! 您在使用过程中有任何问题，可以通过邮件告诉我们 info@projectcrossover.com",
        'AUTO_MSG_ORDER_STATUS_CHANGE' => '您的订单状态发生了变化',
    ),
    /**
     * global_setting_with_login.php
     */
    array(
        'global_setting_with_login__WELCOME' => '欢迎 ',
        'global_setting_with_login__LOGIN' => '登录',
        'global_setting_with_login__LOGOUT' => '退出',
        'global_setting_with_login__REGISTER' => '注册',
    ),
    /**
     * global_navigation_top_guest.php
     */
    array(
        'global_navigation_top_guest__HOME' => '首页',
        'global_navigation_top_guest__GUIDE' => '入圈',
        'global_navigation_top_guest__SHOP' => '选货',
        'global_navigation_top_guest__DISCOVER' => '探索',
        'global_navigation_top_guest__PRESS' => '资讯',
        'global_navigation_top_guest__ABOUT' => '关于',
    ),
    /**
     * global_navigation_top_brand.php & global_navigation_top_buyer.php
     */
    array(
        'global_navigation_top_user__DASHBOARD' => '全情概览',
        'global_navigation_top_user__COLLECTION' => '系列管理',
        'global_navigation_top_user__ORDER' => '订单管理',
        'global_navigation_top_user__BRAND' => '品牌直达',
        'global_navigation_top_user__LOOKBOOK' => '产品目录',
        'global_navigation_top_user__CART' => '购物车',
        'global_navigation_top_user__MY_BRANDS' => '我的品牌',
        'global_navigation_top_user__MESSAGE' => '消息中心',

        'global_navigation_top_user__BUYER_MY_BRAND' => '我的品牌',
        'global_navigation_top_user__BUYER_MY_STORE' => '我的店铺',
        'global_navigation_top_user__PROFILE' => '个人中心',
        'global_navigation_top_user__SIGN_OUT' => '退出登录',
    ),
    /**
     * global_navigation_user_center.php
     */
    array(
        'global_navigation_user_center__PROFILE' => '个人信息',
        'global_navigation_user_center__MESSAGES' => '消息中心',
    ),
    /**
     * global_navigation_footer.php
     */
    array(
        'global_navigation_footer__GUIDE' => '指导',
        'global_navigation_footer__GUIDE__FOR_BRANDS' => '品牌必读',
        'global_navigation_footer__GUIDE__FOR_BUYERS' => '买手必读',
        'global_navigation_footer__GUIDE__FOR_SHOWROOMS' => 'SHOWROOM必读',

        'global_navigation_footer__COMPANY' => '公司',
        'global_navigation_footer__COMPANY__PRESS' => '出版物',
        'global_navigation_footer__COMPANY__DISCOVERY' => '探索',
        'global_navigation_footer__COMPANY__ABOUT_US' => '关于我们',
        'global_navigation_footer__COMPANY__CAREER' => '职业生涯',

        'global_navigation_footer__HELP' => '帮助',
        'global_navigation_footer__HELP__CONTACT_US' => '联系我们',
        'global_navigation_footer__HELP__PRIVACY_COOKIES' => '隐私 & 记录',
        'global_navigation_footer__HELP__Q_A' => 'Q & A',
        'global_navigation_footer__HELP__TERMS_OF_SERVICE' => '服务条款',

        'global_navigation_footer__SUBSCRIBE' => '订阅',
        'global_navigation_footer__SUBSCRIBE__SIGN_IP' => '注册并获得最新资讯',
        'global_navigation_footer__SUBSCRIBE__EMAIL' => '您的电子邮箱',
        'global_navigation_footer__SUBSCRIBE__BUTTON' => '订阅',
        'global_navigation_footer__SUBSCRIBE__LICENSE' => '版权所有',
    ),
    /**
     * Home.php
     */
    array(
        'home__LEARN_MORE' => '了解更多',
        'home__CONTRACT_US' => '联系我们',

        'home__XSHOWROOM_DESC' => '与我们并肩开创你的商业之旅',
        'home__XSHOWROOM_BUYER_COUNT' => '时尚买手',
        'home__XSHOWROOM_BRANDS_COUNT' => '品牌客户',
        'home__XSHOWROOM_PRODUCTS_COUNT' => '产品目录',
        'home__XSHOWROOM_ORDERS_COUNT' => '交易订单',

        'home__BRANDS' => '品牌拓展',
        'home__BRANDS_DESC' => '将您的品牌展示给中国最棒的买手店，与买手圈的顶尖买手们建立合作',
        'home__BUYERS' => '时尚买手',
        'home__BUYERS_DESC' => '作为时尚买手入驻买手圈，挖掘最新最赞的设计师品牌，采购最新系列',
        'home__btn_VIEW_MORE' => '了解详情',

        'home__btn_SOLUTION' => '解决方案',
        'home__btn_REGISTER' => '申请入驻',

        'home__HOT_BRANDS' => '热门品牌',
        'home__BRAND_PROFILES' => '品牌介绍',
        'home__SSI5_COLLECTION' => '2016春夏系列',

        'home__TESTIMONIALS' => 'XSHOWROOM人物',
        'home__FEATURED' => '圈内点评',
        'home__people_BUYER' => '时尚买手',
        'home__people_DIRECTOR' => '总监',
        'home__people_BRAND_DIRECTOR' => '品牌总监',
    ),
    /**
     * guide.php
     */
    array(
        'guide__SOLUTIONS_FOR_BRANDS' => '时尚品牌 - 解决方案',
        'guide__SOLUTIONS_FOR_RETAILERS' => '时尚买手 - 解决方案',
        'guide__X_SHOWROOM_FASHION_ACCESS' => 'XSHOWROOM买手圈 时尚零距离',
        'guide__SOLUTION_BRAND' => '品牌',
        'guide__SOLUTION_RETAILER' => '时尚买手',
        'guide__SUBSCRIPTION' => '现在就加入我们吧',

        'guide__brand_left_INTRODUCE' => '您想通过入驻线上showroom来打通更大的市场，挖掘品牌更大的潜力吗？通过买手圈，您的品牌将成功打入中国的买手市场。通过买手圈，您将得到来自我们最专业圈内人员的支持，以更好的推广您的品牌，我们的工作人员长期与Project Crossover线下showroom合作，深悉中国买手市场。同时，我们联合上海和伦敦的两大线下showroom及线上买手圈，为品牌的成长提供多重专业平台。通过买手圈，您的品牌会被1000多名已经注册入驻的买手知晓，每个系列的知名度、浏览量、订货量都会得到显著提高。',
        'guide__brand_right_INTRODUCE_1' => '线上SHOWROOM',
        'guide__brand_right_INTRODUCE_DESC_1' => '您的产品将展示在全年无休的线上SHOWROOM，方便买手时时预览并下单',
        'guide__brand_right_INTRODUCE_2' => '顶尖买手',
        'guide__brand_right_INTRODUCE_DESC_2' => '我们确保入圈买手的真实性，只有真正拥有店铺的买手才可审核通过并预览您的品牌',
        'guide__brand_right_INTRODUCE_3' => '电子订单',
        'guide__brand_right_INTRODUCE_DESC_3' => '方便快捷的线上下单系统，快速生成方便下载的电子价目表',

        'guide__buyer_left_INTRODUCE' => '您拥有自己的买手店吗？无论是线下实体店或是线上网店，您都可以入驻买手圈成为圈内认证买手，并浏览买手圈众多品牌的最新系列。入驻买手圈完全免费，买手圈平台全年无休供您选购最新商品。选购流程极为便利：浏览品牌，订货下单，提交订单，品牌即可第一时间审核订单并进入到下一步。若有任何问题，我们上海showroom线下团队最为专业的工作人员将第一时间与您取得联络，协助并解决您的一切订货问题。',
        'guide__buyer_right_INTRODUCE_1' => '24/7时刻搜寻品牌',
        'guide__buyer_right_INTRODUCE_DESC_1' => 'XSHOWROOM买手圈为您精选时尚品牌。尽情探索众多新品牌并浏览品牌最新系列以达成您的采购目标',
        'guide__buyer_right_INTRODUCE_2' => '详细订货记录',
        'guide__buyer_right_INTRODUCE_DESC_2' => '您可查询您的过往订货记录，轻松完成线上补单',
        'guide__buyer_right_INTRODUCE_3' => '预约探索线下空间',
        'guide__buyer_right_INTRODUCE_DESC_3' => '您不仅可以线上探索新品牌新系列，也可以预约前来我们的线下实体SHOWROOM及概念店进行参观',

        'guide__btn_REGISTER' => '注册',
        'guide__btn_SIGN_IN' => '登录',

        'guide__MORE_BENEFITS_OF_REGISTERING_WITH_US' => '为何入驻XSHOWROOM买手圈',

        'guide__benefits_PREVIEW_PROFILES' => '预览店铺详情',
        'guide__benefits_PREVIEW_PROFILES_DESC' => '品牌可在确认店铺订单前，先预览店铺详情进行审核',
        'guide__benefits_LANGUAGE_SELECTION' => '最大化提升订单准确率',
        'guide__benefits_LANGUAGE_SELECTION_DESC' => '我们将通过方便快捷的线上订货系统，将订单出错率降至最低',
        'guide__benefits_PROMOTION' => '无限上传空间',
        'guide__benefits_PROMOTION_DESC' => '享受无限上传品牌系列及商品信息的线上空间',
        'guide__benefits_CHOOSE_ACCOUNT_TYPE' => '中英切换',
        'guide__benefits_CHOOSE_ACCOUNT_TYPE_DESC' => '我们实现网站中英文自如切换，以便更好的服务中国的时尚买手',
        'guide__benefits_DIGITAL_LINE_SHEETSS' => '买手数据分析',
        'guide__benefits_DIGITAL_LINE_SHEETS_DESC' => '您可申请获得最精确的买手订货相关数据分析',
        'guide__benefits_MINIMISE_ORDER_ERROR' => '专业的客户经理',
        'guide__benefits_MINIMISE_ORDER_ERROR_DESC' => '我们深知每一张订单对您的重要性。若有任何问题，欢迎随时联系线上客户经理寻求协助',
        'guide__benefits_UNLIMITED_UPLOAD' => '最大化宣传',
        'guide__benefits_UNLIMITED_UPLOAD_DESC' => '我们将通过XSHOWROOM买手圈多元化的活动及平台：比如展会、线上营销活动、订阅电子报及关联社交平台上最大化的宣传您的品牌',
        'guide__benefits_24_7_SHOWROOM' => '线上线下两大showroom',
        'guide__benefits_24_7_SHOWROOM_DESC' => '您可选择入驻线上showroom，或选择开通高级账户入驻线上线下两大showroom，您将享受我们线下showroom专业营销团队为您提供全年服务',
        'guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY' => '线下概念店合作',
        'guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY_DESC' => '您将有机会入驻我们线下概念店，通过我们的专业销售团队的协助，在线下概念店空间更好的展示您的品牌及系列',

        'guide__benefits_PREVIEW_COLLECTIONS' => '预览众多品牌系列',
        'guide__benefits_PREVIEW_COLLECTIONS_DESC' => '线上平台全年无休，供您时刻浏览新品牌新系列',
        'guide__benefits_24_7_ACCESS' => '线下实体SHOWROOM',
        'guide__benefits_24_7_ACCESS_DESC' => '精选品牌入驻实体SHOWROOM供买手预约参观',
        'guide__benefits_DISCOVER_BRANDS' => '店铺详情档案',
        'guide__benefits_DISCOVER_BRANDS_DESC' => '创立专属店铺档案，让品牌了解您及您的店铺详情',
        'guide__benefits_VIRTUAL_SHOWROOMS' => '翻译服务',
        'guide__benefits_VIRTUAL_SHOWROOMS_DESC' => '我们的专职客户经理将在您需要时，帮助您解决任何沟通问题，提供中英切换服务',
        'guide__benefits_ONLINE_ORDER_SYSTEM' => '订单存档',
        'guide__benefits_ONLINE_ORDER_SYSTEM_DESC' => '您可保存需要调整的订单，待之后进行修改并提交（品牌库存状况将影响订单确认）',
        'guide__benefits_SAVE_FOR_LATER' => '详细数据分析',
        'guide__benefits_SAVE_FOR_LATER_DESC' => '您可申请获取最精确详细的订货相关数据分析',
        'guide__benefits_KEEP_TRACK' => '探索最新品牌',
        'guide__benefits_KEEP_TRACK_DESC' => '从我们线上平台巨大品牌库中挖掘探索最适合您的新品牌',
        'guide__benefits_TRAINING' => '免费入圈',
        'guide__benefits_TRAINING_DESC' => '免费入驻XSHOWROOM买手圈成为我们的会员，无订阅费用',
        'guide__benefits_DEDICATED_URL' => '预约参观线下空间',
        'guide__benefits_DEDICATED_URL_DESC' => '您可与我们预约参观线下实体showroom及概念店，多方位探索新品牌',

        'guide__MEMBERSHIP_INCLUDES' => '成为会员，您还可以享有 . . .',
        'guide__MEMBERSHIP_INCLUDES_R1' => '> 为期一年的免费线上系统使用权',
        'guide__MEMBERSHIP_INCLUDES_R2' => '> 提供买手圈使用方法准则',
        'guide__MEMBERSHIP_INCLUDES_R3' => '> 将品牌文字介绍内容翻译成中文，以便中国买手浏览',
        'guide__MEMBERSHIP_INCLUDES_R4' => '> 专享URL地址以便买手更便捷地进入您的品牌介绍页',
        'guide__MEMBERSHIP_INCLUDES_R5' => '> 品牌对应的双语客户经理将及时与品牌及买手沟通，中英文时时切换，实现无障碍交流',
        ),
    /**
     * login.php
     */
    array(
        'login__SIGN_IN' => '用户登录',
        'login__EMAIL' => '电子邮箱',
        'login__PASSWORD' => '输入密码',
        'login__VALID_CODE' => '验证码',
        'login__btn_LOGIN' => '登录',
        'login__REMEMBER_ME' => '记住我',
        'login__EMAIL_PATTERN_ERROR' => 'Email格式错误！','login__REQUEST_MEMBERSHIP' => '入驻XSHOWROOM申请',
        'login__REQUEST_MEMBERSHIP_DESC' => '买手圈只向注册并审核通过的品牌、代理机构及买手开放。若想入驻买手圈，请完成在线注册：',
        'login__REQUEST_BRAND' => '品牌入驻',
        'login__REQUEST_BUYER' => '买手入圈',
    ),
    /**
     * register_brand.php
     */
    array(
        'brand_register__STEP' => '步骤',
        'brand_register__SETP_OF' => '/',
        'brand_register__STEP_INFORMATION_1' => '添加用户信息',
        'brand_register__STEP_INFORMATION_2' => '添加品牌信息',
        'brand_register__STEP_INFORMATION_3' => '添加公司信息',

        'brand_register__STEP_1__EMAIL_ADDRESS' => '电子邮箱',
        'brand_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER' => '请输入电子邮箱 *',
        'brand_register__STEP_1__PASSWORD' => '您的密码',
        'brand_register__STEP_1__PASSWORD_PLACEHOLDER' => '请输入您的密码 *',
        'brand_register__STEP_1__FIRST_NAME_PLACEHOLDER' => '您的名字 *',
        'brand_register__STEP_1__LAST_NAME_PLACEHOLDER' => '您的姓氏 *',
        'brand_register__STEP_1__DISPLAY_NAME_PLACEHOLDER' => '您的显示名称 *',
        'brand_register__STEP_1__TELEPHONE_PLACEHOLDER' => '您的联系电话 *',
        'brand_register__STEP_1__MOBILE_PLACEHOLDER' => '您的手机号码 (可选)',
        'brand_register__STEP_1__btn__CANCEL' => '取消注册',
        'brand_register__STEP_1__btn__ADD_BRAND' => '添加品牌',

        'brand_register__STEP_2__IMAGE' => '相册 / 照片',
        'brand_register__STEP_2__BRAND_NAME_PLACEHOLDER' => '请输入您的品牌名称 *',
        'brand_register__STEP_2__DESIGNER_NAME_PLACEHOLDER' => '设计师 *',
        'brand_register__STEP_2__BRAND_URL' => '自定义域名',
        'brand_register__STEP_2__URL_DESC_1' => '这个链接将被用于直接定位到你的品牌站点',
        'brand_register__STEP_2__URL_DESC_2' => '(通过验证的买手才能访问)',
        'brand_register__STEP_2__btn__PREVIOUS' => '上一步',
        'brand_register__STEP_2__btn__ADD_COMPANY' => '添加公司',

        'brand_register__STEP_3__COMPANY_NAME_PLACEHOLDER' => '公司名称 *',
        'brand_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER' => '公司地址 *',
        'brand_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER' => '所在国家 *',
        'brand_register__STEP_3__COMPANY_ZIP_PLACEHOLDER' => '邮政编码 *',
        'brand_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER' => '公司电话 *',
        'brand_register__STEP_3__COMPANY_URL_PLACEHOLDER' => '公司网址 *',
        'brand_register__STEP_3__COMPANY_ACCEPT_1' => 'On receipt of your application, an invoice will be sent to your email address. Membership access will be granted on payment confirmation.',
        'brand_register__STEP_3__COMPANY_ACCEPT_2' => 'I accept the terms and conditions of Project Crossover Online Showrooms web site.',
        'brand_register__STEP_3__btn__PREVIOUS' => '上一步',
        'brand_register__STEP_3__btn__SUBMIT' => '提交注册',
    ),
    /**
     * register_buyer.php
     */
    array(
        'buyer_register__STEP' => '步骤',
        'buyer_register__SETP_OF' => '/',
        'buyer_register__STEP_INFORMATION_1' => '添加用户信息',
        'buyer_register__STEP_INFORMATION_2' => '添加店铺信息',
        'buyer_register__STEP_INFORMATION_3' => '添加公司信息',

        'buyer_register__STEP_1__EMAIL_ADDRESS' => '电子邮箱',
        'buyer_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER' => '请输入电子邮箱 *',
        'buyer_register__STEP_1__PASSWORD' => '您的密码',
        'buyer_register__STEP_1__PASSWORD_PLACEHOLDER' => '请输入您的密码 *',
        'buyer_register__STEP_1__FIRST_NAME_PLACEHOLDER' => '您的名字 *',
        'buyer_register__STEP_1__LAST_NAME_PLACEHOLDER' => '您的姓氏 *',
        'buyer_register__STEP_1__DISPLAY_NAME_PLACEHOLDER' => '您的显示名称 *',
        'buyer_register__STEP_1__TELEPHONE_PLACEHOLDER' => '您的联系电话 *',
        'buyer_register__STEP_1__MOBILE_PLACEHOLDER' => '您的手机号码 (可选)',
        'buyer_register__STEP_1__btn__CANCEL' => '取消注册',
        'buyer_register__STEP_1__btn__ADD_STORE' => '添加店铺',

        'buyer_register__STEP_2__IMAGE' => '店铺 / 照片',
        'buyer_register__STEP_2__STORE_NAME_PLACEHOLDER' => '请输入您的店铺名称 *',
        'buyer_register__STEP_2__STORE_TYPE_PLACEHOLDER' => '请选择您的店铺类型 *',
        'buyer_register__STEP_2__STORE_COLLECTION_TYPE' => '系列类型',
        'buyer_register__STEP_2__STORE_BRAND_PLACEHOLDER' => '店铺售卖的品牌 *',
        'buyer_register__STEP_2__STORE_WEBSITE_PLACEHOLDER' => '网址 *',
        'buyer_register__STEP_2__STORE_ADDRESS_PLACEHOLDER' => '店铺地址 *',
        'buyer_register__STEP_2__STORE_COUNTRY_PLACEHOLDER' => '所在国家 *',
        'buyer_register__STEP_2__STORE_ZIP_PLACEHOLDER' => '邮政编码 *',
        'buyer_register__STEP_2__STORE_TELEPHONE_PLACEHOLDER' => '电话号码 *',
        'buyer_register__STEP_2__btn__PREVIOUS' => '上一步',
        'buyer_register__STEP_2__btn__ADD_COMPANY' => '添加公司',

        'buyer_register__STEP_3__COMPANY_NAME_PLACEHOLDER' => '公司名称 *',
        'buyer_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER' => '公司地址 *',
        'buyer_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER' => '所在国家 *',
        'buyer_register__STEP_3__COMPANY_ZIP_PLACEHOLDER' => '邮政编码 *',
        'buyer_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER' => '公司电话 *',
        'buyer_register__STEP_3__COMPANY_URL_PLACEHOLDER' => '公司网址 *',
        'buyer_register__STEP_3__COMPANY_ACCEPT_1' => 'On receipt of your application, an invoice will be sent to your email address. Membership access will be granted on payment confirmation.',
        'buyer_register__STEP_3__COMPANY_ACCEPT_2' => 'I accept the terms and conditions of Project Crossover Online Showrooms web site.',
        'buyer_register__STEP_3__btn__PREVIOUS' => '上一步',
        'buyer_register__STEP_3__btn__SUBMIT' => '提交注册',
    ),
    /**
     * user_profile.php
     */
    array(
        'profile__BASIC_INFO' => '基本信息',
        'profile__BRAND_INFO' => '品牌信息',
        'profile__COMPANY_INFO' => '公司信息',

        'profile__EMAIL' => 'E-mail （登录邮箱）',
        'profile__FIRST_NAME' => '我的名字',
        'profile__LAST_NAME' => '我的姓氏',
        'profile__DISPLAY_NAME' => '我的显示名称',
        'profile__TELEPHONE' => '我的电话号码',
        'profile__MOBILE' => '我的手机号码',
        'profile__REGISTER_DATE' => '我的注册日期',
        'profile__LAST_LOGIN_TIME' => '最后一次登录',

        'profile__COMPANY_NAME' => '公司名称',
        'profile__COMPANY_ADDRESS' => '公司详细地址',
        'profile__COMPANY_COUNTRY' => '公司所在地',
        'profile__COMPANY_ZIP' => '公司邮政编码',
        'profile__COMPANY_TELEPHONE' => '公司电话号码',
        'profile__COMPANY_WEB_URL' => '公司官网地址',

        'profile__BRAND_NAME' => '品牌名称',
        'profile__DESIGNER_NAME' => '品牌设计师',
        'profile__BRAND_URL' => '品牌网址',
    ),
    /**
     * brand_dashboard.php
     */
    array(
        'brand_dashboard__BASED_IN' => '所在地',
        'brand_dashboard__ESTABLISHED' => '成立于',
        'brand_dashboard__WEBSITE'=> '官网地址',

        'brand_dashboard__MY_ORDERS' => '我的订单',
        'brand_dashboard__ALL_ORDERS' => '所有订单 >',
        'brand_dashboard__ORDER_EMPTY_1' => '欢迎来到 XSHOWROOM!',
        'brand_dashboard__ORDER_EMPTY_2' => '立刻开始您的商业之旅!',
        'brand_dashboard__ORDER_EMPTY_3' => '温馨提示: 商品系列可以为您带来订单',
        'brand_dashboard__ORDER_NUMBER' => '订单号：',
        'brand_dashboard__ORDER_SUBMIT' => '创建于：',
        'brand_dashboard__ORDER_AMOUNT' => '订单额：',

        'brand_dashboard__MY_COLLECTIONS' => '我的系列',
        'brand_dashboard__ALL_COLLECTIONS' => '所有系列 >',
        'brand_dashboard__COLLECTION_EMPTY_1' => '哦，不是吧！ 您从未创建',
        'brand_dashboard__COLLECTION_EMPTY_2' => '商品系列!',
        'brand_dashboard__COLLECTION_EMPTY_3' => '添加系列',

        'brand_dashboard__ACCOUNT_MANAGER' => '在XSHOWROOM 我们拥有专属的品牌客户经理来帮助您介绍品牌, 与您共建商品集合, 并帮助您完成订单！',
        'brand_dashboard__ACCOUNT_MANAGER_CONTRACT' => '联系我们'
    ),
    /**
     * collection_create.php
     */
    array(
        'collection_create__BASIC_INFO' => '添加系列基本信息',
        'collection_create__COLLECTION_COVER' => '系列封面',
        'collection_create__COLLECTION_NAME' => '系列名称',
        'collection_create__COLLECTION_CATEGORY' => '系列类型',
        'collection_create__COLLECTION_MODE' => '售卖模式',
        'collection_create__COLLECTION_SEASON' => '时尚季',
        'collection_create__COLLECTION_MINIMUM_ORDER' => '最小订单金额',
        'collection_create__COLLECTION_CURRENCY' => '结算货币',
        'collection_create__COLLECTION_DEADLINE' => '下单截止日期',
        'collection_create__COLLECTION_DELIVERY_DATE' => '发货日期',
        'collection_create__COLLECTION_DESCRIPTION' => '详细描述',
        'collection_create__COLLECTION_CREATE' => '创建系列',
    ),
    /**
     * collection_index.php
     */
    array(
        'collection_index__EDIT' => '编辑',
        'collection_index__HIDE' => '隐藏',
        'collection_index__SHOW_ALL' => '全部显示',

        'collection_index__btn_SUBMIT' => '提交',
        'collection_index__btn_DELETE' => '删除',
        'collection_index__btn_CLOSE' => '关闭',

        'collection_index__COLLECTION_COVER' => '系列封面',
        'collection_index__COLLECTION_NAME' => '系列名称',
        'collection_index__COLLECTION_CATEGORY' => '系列类型',
        'collection_index__COLLECTION_MODE' => '售卖模式',
        'collection_index__COLLECTION_SEASON' => '时尚季',
        'collection_index__COLLECTION_MINIMUM_ORDER' => '最小订单金额',
        'collection_index__COLLECTION_CURRENCY' => '结算货币',
        'collection_index__COLLECTION_DEADLINE' => '下单截止日期',
        'collection_index__COLLECTION_DELIVERY_DATE' => '发货日期',
        'collection_index__COLLECTION_DESCRIPTION' => '详细描述',

        'collection_index__btn_CANCEL' => '取消',
        'collection_index__btn_UPDATE' => '更改',

        'collection_index__NO_PRODUCT_1' => '不是吧! 你还没有',
        'collection_index__NO_PRODUCT_2' => '在系列中添加商品!',

        'collection_index__CATEGORIES' => '分类',
        'collection_index__ADD_PRODUCT' => '+ 添加新的商品',
        'collection_index__btn_LOAD_MORE' => '加载更多',
        'collection_index__btn_ADD_PRODUCT' => '添加新的商品',

        'collection_index__modal__SUBMIT_CONFIRM' => '确认提交?',
        'collection_index__modal__SUBMIT_DETAIL' => '你确认要提交这个商品系列吗? (一旦提交就无法对该系列再修改)',
        'collection_index__modal__SUBMIT_btn_CANCEL' => '取消',
        'collection_index__modal__SUBMIT_btn_SUBMIT' => '提交',

        'collection_index__modal__DELETE_CONFIRM' => '确认删除?',
        'collection_index__modal__DELETE_DETAIL' => '你确认要删除这个产品系列吗? ',
        'collection_index__modal__DELETE_btn_CANCEL' => '取消',
        'collection_index__modal__DELETE_btn_DELETE' => '删除',

        'collection_index__modal__CLOSE_CONFIRM' => '确认关闭?',
        'collection_index__modal__CLOSE_DETAIL' => '你确认要关闭这个产品系列吗? (你关闭后，买手就无法在平台上浏览到这个系列)',
        'collection_index__modal__CLOSE_btn_CANCEL' => '取消',
        'collection_index__modal__CLOSE_btn_CLOSE' => '关闭'
    ),
    /**
     * product_create.php
     */
    array(
        'product_create__PRODUCT_IMAGES' => '产品图片',
        'product_create__PRODUCT_IMAGES_REQ' => '您可以为每个产品上传最多5张图片(jpg, png, gif)',
        'product_create__PRODUCT_INFO' => '产品信息',
        'product_create__PRODUCT_NAME' => '产品名称',
        'product_create__PRODUCT_CATEGORY' => '产品类别',
        'product_create__PRODUCT_STYLE_NUMBER' => '产品货号',
        'product_create__PRODUCT_WHOLESALE_PRICE' => '批发价格',
        'product_create__PRODUCT_RETAIL_PRICE' => '建议零售价',
        'product_create__PRODUCT_SIZE_REGION' => '尺码地区',
        'product_create__PRODUCT_COLOR_SET' => '产品色彩',
        'product_create__PRODUCT_ADD_COLOR' => '编辑',
        'product_create__PRODUCT_MADE_IN' => '产品产地',
        'product_create__PRODUCT_MATERIAL' => '产品材质',
        'product_create__PRODUCT_CARE_INSTRUCTION' => '护理指导',

        'product_create__PRODUCT_btn_SAVE' => '保存',

        'product_create__PRODUCT_color_STANDARD_COLOR' => '标准色彩',
        'product_create__PRODUCT_color_CUSTOMIZED_COLOR' => '自定义色彩',
        'product_create__PRODUCT_color_UPLOAD_IMAGE' => '上传色彩图片',
        'product_create__PRODUCT_color_btn_ADD_COLOR' => '确认',
        'product_create__PRODUCT_color_DESCRITION' => '* 你可以选多个色彩',
    ),
    /**
     * product_index.php
     */
    array(
        'product_index__BACK_COLLECTION' => '回到产品系列',

        'product_index__COLLECTION_MODE' => '售卖模式: ',
        'product_index__COLLECTION_SEASON' => '时尚季: ',
        'product_index__COLLECTION_MINIMUM_ORDER' => '最小订单金额: ',
        'product_index__COLLECTION_DEADLINE' => '下单截止日期: ',
        'product_index__COLLECTION_DELIVERY_DATE' => '发货日期: ',

        'product_index__PRODUCT_CATEGORY' => '产品类别',
        'product_index__PRODUCT_STYLE_NUMBER' => '产品货号',
        'product_index__PRODUCT_WHOLESALE_PRICE' => '产品批发价',
        'product_index__PRODUCT_RETAIL_PRICE' => '产品零售价',
        'product_index__PRODUCT_SIZE' => '尺码',
        'product_index__PRODUCT_COLOR' => '色彩',
        'product_index__PRODUCT_MADE_IN' => '产品产地',
        'product_index__PRODUCT_MATERIAL' => '产品材质',
        'product_index__PRODUCT_CARE_INSTRUCTION' => '产品护理指南:',

        'product_index__btn__ADD_TO_CART' => '添加购物车',
        'product_index__btn__REMOVE_IN_CART' => '删除购物车',
        'product_index__btn__VIEW_CART' => '查看购物车',

        'product_index__PRODUCT_btn_DELETE' => '删除产品',

        'product_index__modal__DELETE_CONFIRM' => '确认删除?',
        'product_index__modal__DELETE_DETAIL' => '你确认要删除这个产品吗? ',
        'product_index__modal__DELETE_btn_CANCEL' => '取消',
        'product_index__modal__DELETE_btn_DELETE' => '删除',
    ),
    /**
     * brand_collection.php
     */
    array(
        'brand_collection__STATUS' => '状态',
        'brand_collection__ADD_COLLECTION' => '+ 添加系列',

        'brand_collection__COLLECTION_STATUS' => '系列状态:',
        'brand_collection__COLLECTION_LAST_MODIFY' => '最后修改:',
        'brand_collection__COLLECTION_DESCRIPTION' => '详细信息:',

        'brand_collection__btn_VIEW' => '查看',
    ),
    /**
     * buyer_brand.php, shop.php
     */
    array(
        'brand_filter__NO_BRAND_1' => '没找到符合条件的品牌！',
        'brand_filter__NO_BRAND_2' => '更改搜索条件去发现更多的品牌',
    ),
    /**
     * brand_index.php
     */
    array(
        'brand_info__BASE_IN' => '品牌国家',
        'brand_info__DESIGNER' => '设计师',
        'brand_info__WEBSITE' => '官网网址',

        'brand_filter__COLLECTIONS' => '商品系列',
        'brand_filter__NO_COLLECTION_1' => '没找到符合条件的商品系列！',
        'brand_filter__NO_COLLECTION_2' => '更改搜索条件去发现更多的商品系列',

        'brand_access__NO_PRIVILEGE_1' => '您没有权限访问该品牌',
        'brand_access__NO_PRIVILEGE_2' => '申请这个品牌的访问权限',

        'brand_access__btn_APPLY' => '申请访问',

        'brand_access__INFO_APPLIED' => '请稍候，管理员正在审核您的权限',
        'brand_access__btn_APPLIED' => '审核中',

        'brand_store_application__TITLE' => '申请访问权限',
        'brand_store_application__BODY' => '请选择一家店铺来申请访问权限',
        'brand_store_application__btn_APPLY' => '申请',
        'brand_store_application__btn_CANCEL' => '取消',
    ),
    /**
     * buyer_dashboard.php
     */
    array(
        'buyer_dashboard__INTERESTED' => '感兴趣的品牌',
        'buyer_dashboard__LAST_VISIT'=> '最后访问时间',

        'buyer_dashboard__MY_BRANDS' => '我的品牌',
        'buyer_dashboard__ALL_BRANDS' => '所有品牌 >',
        'buyer_dashboard__BRANDS_EMPTY_1' => '欢迎来到SHOWROOM!',
        'buyer_dashboard__BRANDS_EMPTY_2' => '您可以从这里开始',
        'buyer_dashboard__BRANDS_EMPTY_3' => '浏览品牌',

        'buyer_dashboard__MY_ORDERS' => '我的订单',
        'buyer_dashboard__ALL_ORDERS' => '所有订单 >',
        'buyer_dashboard__ORDER_EMPTY_1' => '欢迎来到SHOWROOM!',
        'buyer_dashboard__ORDER_EMPTY_2' => '您还没有创建订单，你可以先',
        'buyer_dashboard__ORDER_EMPTY_3' => '浏览品牌',
        'buyer_dashboard__ORDER_NUMBER' => '订单号：',
        'buyer_dashboard__ORDER_SUBMIT' => '创建于：',
        'buyer_dashboard__ORDER_AMOUNT' => '订单额：',

        'buyer_dashboard__MY_STORES' => '我的店铺',
        'buyer_dashboard__ALL_STORES' => '所有店铺 >',
        'buyer_dashboard__STORE_btn_VIEW' => '查看',
        'buyer_dashboard__STORE_BRANDS' => '品牌',
        'buyer_dashboard__STORE_ABOUT' => '关于',
        'buyer_dashboard__STORE_NO_ABOUT' => '暂无相关介绍',

        'buyer_dashboard__ACCOUNT_MANAGER' => '在XSHOWROOM 我们拥有专属的品牌客户经理来帮助您介绍品牌, 与您共建商品集合, 并帮助您完成订单！',
        'buyer_dashboard__ACCOUNT_MANAGER_CONTRACT' => '联系我们'
    ),
    /**
     * buyer_cart.php
     */
    array(
        'buyer_cart__TITLE' => '购物车 - 您的商品系列',

        'buyer_cart__NO_ITEM_01' => '您还没有添加任何的商品！',
        'buyer_cart__NO_ITEM_02' => '现在就去选货吧！',

        'buyer_cart__SEASON'=> '时尚季:',
        'buyer_cart__ORDER_MODE' => '售卖模式:',
        'buyer_cart__DEADLINE' => '下单截止日:',
        'buyer_cart__DELIVERY_DATE' => '发货日期:',
        'buyer_cart__MIN_ORDER' => '最小订单:',
        'buyer_cart__PRODUCTS' => '产品详情:',

        'buyer_cart__btn_GENERATE' => '生成订单',
    ),
    /**
 * buyer_store.php
 */
    array(
        'buyer_store__TITLE' => '我的店铺',

        'buyer_store__ADD_NEW' => '+ 添加新店',

        'buyer_store__item__BRANDS' => '品牌：',
        'buyer_store__item__TYPE' => '类型：',
        'buyer_store__item__ADDRESS' => '店址：',
        'buyer_store__item__TELEPHONE' => '电话：',

        'buyer_store__item__btn_EDIT' => '编辑',
        'buyer_store__item__btn_VIEW' => '查看',
        'buyer_store__item__btn_CLOSE' => '删除',
    ),
    /**
     * store_index.php & store_create.php
     */
    array(
        'store_index__STORE_IMAGES' => '店铺图集',
        'store_index__STORE_INFO' => '店铺信息',

        'store_index__STORE_NAME' => '店铺名称',
        'store_index__STORE_CATEGORY' => '店铺类型',
        'store_index__COLLECTION_TYPES' => '售卖系列',
        'store_index__BRAND_LIST' => '品牌列表',
        'store_index__STORE_WEBSITE' => '店铺网址',
        'store_index__STORE_ADDRESS' => '店铺地址',
        'store_index__STORE_COUNTRY' => '店铺国家',
        'store_index__STORE_ZIPCODE' => '店铺邮编',
        'store_index__STORE_TELEPHONE' => '店铺电话',
        'store_index__ABOUT_STORE' => '关于店铺',

        'store_index__btn_SAVE' => '保存',
        'store_index__btn_CANCEL' => '取消',
        'store_index__btn_EDIT' => '编辑店铺',
    ),
    /**
     * order_create.php
     */
    array(
        'order_create__PRODUCTS' => '产品详情:',

        'order_create__DESC_01' => '该产品系列购物满',
        'order_create__DESC_02' => '',
        'order_create__DESC_03' => '才能满足最小下单条件 ',
        'order_create__btn_VIEW_DETAIL' => '查看详情',

        'order_create__STYLE_NUMBER' => '产品货号:',
        'order_create__RETAIL_PRICE' => '零售价:',
        'order_create__WHOLE_PRICE' => '批发价:',
        'order_create__SIZE_REGION' => '尺码地区:',

        'order_create__btn_REMOVE' => '删除',

        'order_create__ORDER_DETAIL' => '订单详情',
        'order_create__CODE_SIZE' => '尺码/尺寸：',
        'order_create__QUANTITY' => '购买数量：',
        'order_create__AMOUNT' => '小计：',

        'order_create__TOTAL_QUANTITY' => '购买总数：',
        'order_create__TOTAL_AMOUNT' => '订单总价：',

        'order_create__ORDER_SUMMARY' => '订单总览',
        'order_create__PRODUCTS_COUNT' => '产品类别：',

        'order_create__btn_CHECKOUT' => '生成订单',

        'order_create__SHIPPING_ADDRESS' => '送货地址',
        'order_create__store_TYPE' => '店铺类型：',
        'order_create__store_ADDRESS' => '店铺地址：',
        'order_create__store_ZIPCODE' => '店铺邮编：',
        'order_create__store_TELEPHONE' => '收货电话：',

        'order_create__payment__TITLE' => '支付方式',
        'order_create__payment__OPTIONS__OFFLINE_PAYMENT' => '线下支付',
        'order_create__payment__OPTIONS__OFFLINE_PAYMENT__DESC' => '汇款到XXSHOWROOM的账户',
        'order_create__INSTRUCTIONS' => '指导信息',

        'order_create__review__TITLE' => '确认订单信息',
        'order_create__review__DESC_01' => '当您点击“提交”按键后，我们将提交订单给品牌进行审核',
        'order_create__review__DESC_02' => '一旦订单确认，我们将第一时间通知您，请留意订单状态更新',

        'order_create__review__PAYMANET_SHIPPING' => '支付 & 物流',
        'order_create__review__PAYMENT_OPTION' => '支付方式',
        'order_create__review__PAYMENT_OPTION__OFFLINE_PAY' => '线下支付',
        'order_create__review__PAYMENT_OPTION__OFFLINE_PAY_DESC' => '请及时将您的付款凭据发送到XSHOWROOM平台已确认您的支付',
        'order_create__review__DELIVERY' => '预计发货时间',
        'order_create__review__ORDER_LIST' => '订单列表',
        'order_create__review__ORDER_LIST__PRODUCT' => '产品',
        'order_create__review__ORDER_LIST__NO' => '货号',
        'order_create__review__ORDER_LIST__COLOR' => '颜色',
        'order_create__review__ORDER_LIST__SIZE' => '尺码',
        'order_create__review__ORDER_LIST__TOTAL' => '计价',
        'order_create__review__ORDER_SUMMARY' => '订单概要',
        'order_create__review__ORDER_SUMMARY__PRODUCTS' => '产品种类',
        'order_create__review__ORDER_SUMMARY__TOTAL_QUANTITY' => '产品数量',
        'order_create__review__ORDER_SUMMARY__TOTAL_AMOUNT' => '合计总价',

        'order_create__btn_CHANGE' => '更改',
        'order_create__btn_PREVIOUS' => '上一步',
        'order_create__btn_NEXT' => '下一步',
        'order_create__btn_SUBMIT' => '提交',
    ),
    /**
     * order_list.php
     */
    array(
        'order_list__filter_STATUS' => '订单状态',
        'order_list__filter_ALL' => '全部订单',

        'order_list__LIST' => '订单列表',
        'order_list__STATUS' => '订单状态：',
        'order_list__AMOUNT' => '订单总额：',
        'order_list__DELIVERY' => '发货日期：',

        'order_list__btn_VIEW' => '查看详情',
    ),
    /**
     * order_index.php
     */
    array(
        'order_index__info_STORE' => '买手店名：',
        'order_index__info_BUYER' => '时尚买手：',
        'order_index__info_SUBMITTED_DATE' => '下单日期：',
        'order_index__info_DELIVERY_ADDRESS' => '送货地址：',
        'order_index__info_TOTAL_AMOUNT' => '订单总额：',

        'order_index__status_TITLE' => '订单状态',

        'order_index__actions__INVOICE' => '附上清单/发票 (PDF文件)',
        'order_index__actions__INVOICE_RE_SUMBMIT' => '重新选择',
        'order_index__actions__SHIP_NO' => '物流信息（发货方，物流单号）',
        'order_index__actions__SHIP_FEE' => '物流费用',
        'order_index__actions__SHIP_FEE_UNIT' => '计费单位',

        'order_index__actions__btn_INVOICE_SUBMIT' => '确认提交',
        'order_index__actions__btn_DEPOSITED' => '收到订金',
        'order_index__actions__btn_PREPARING' => '开始备货',
        'order_index__actions__btn_BALANCE_PAY' => '收取尾款',
        'order_index__actions__btn_SHIPPED' => '确认发货',
        'order_index__actions__btn_COMPLETE' => '确认收货',

        'order_index__actions__btn_ORDER_CONFIRM' => '订单确认',

        'order_index__payment_TITLE' => '支付信息',
        'order_index__payment_REMITTANCE' => '汇款到: ',
        'order_index__payment_BANK_NAME' => '银行名称: ',
        'order_index__payment_BANK_ACCOUTN' => '银行账户: ',
        'order_index__payment_BANK_PAYEE' => '收款人: ',
        'order_index__payment_DESC_01' => '请将您的汇款凭证发送到',
        'order_index__payment_DESC_02' => '以此来确认您的支付',

        'order_index__products_TITLE' => '订单详情',
        'order_index__products__STYLE_NUMBER' => '产品货号：',
        'order_index__products__RETAIL_PRICE' => '零售价：',
        'order_index__products__WHOLE_PRICE' => '批发价：',
        'order_index__products__SIZE_REGION' => '尺码地区：',
        'order_index__products__CODE_SIZE' => '尺码/尺寸',
        'order_index__products__QUANTITY' => '购买数量：',
        'order_index__products__AMOUNT' => '小计：',
        'order_index__products__TOTAL_QUANTITY' => '购买总数：',
        'order_index__products__TOTAL_AMOUNT' => '订单总价：',
    ),
    /**
     * user_message.php & user_message_detail.php
     */
    array(
        'user_message__MY_MESSAGES' => '我收到的消息',

        'user_message__MESSAGE_DETAIL' => '查看消息详情',
        'user_message__RETURN_MESSAGE_CENTER' => '返回消息中心',
        'user_message__DELETE_MESSAGE' => '删除这条消息',
        'user_message__MESSAGE_FROM_ADMIN' => '来自：XSHOWROOM系统管理员',

        'user_message__modal__DELETE_CONFIRM' => '确认删除',
        'user_message__modal__DELETE_CONFIRM_DETAIL' => '您将永远删除该消息',
        'user_message__modal__btn_CLOSE' => '取消',
        'user_message__modal__btn_DELETE' => '删除',
    ),
    /**
     * about.php
     */
    array(
        'about__TITLE' => '关于XSHOWROOM买手圈',
        'about__CONTENT' => "
            XSHOWROOM是中国时尚行业中第一个提供专业买手服务的线上平台。
            通过创新的平台及领先的科技，
            我们将大大提升采购效率、节约采购成本，
            从而全面升级时尚买手行业采购体系，引领行业发展。

            我们创造这样一个平台的目的是连接品牌与零售商，
            将整个采购流程移植线上，
            使品牌与零售商双方均能够实现效率最大化，
            并通过精准的数据分析进行多维度优化。


            XSHOWROOM立足上海和伦敦，连接全球时尚买手圈。
        ",

        'about__FOUNDER' => '创办人',
        'about__FOUNDER_NAME' => '陈容博士',
        'about__FOUNDER_DESC' => '
            一位经验涵盖中国及国际市场的时尚专家。
            能为客户提供最好的服务，和帮助时装设计师成长与创新，并商业化和持续发展品牌。
            由于时尚界高需求的国际化发展以及中国零售市场的巨大潜力，
            陈容博士在2015年创立XSHOWROOM。
        ',

        'about__CONTACT_US' => '联系我们',
        'about__CONTACT__LONDON' => '伦敦',
        'about__CONTACT__SHANGHAI' => '上海',
        'about__CONTACT__TEL_01' => '座机',
        'about__CONTACT__TEL_02' => '手机',
        'about__CONTACT__ADDRESS2_01' => '上海市长宁区愚园路753号',
        'about__CONTACT__ADDRESS2_02' => '嘉春E座503室',
        'about__CONTACT__ADDRESS2_03' => '200050',
        'about__CONTACT__UK' => '英国',
        'about__CONTACT__PEOPLE_01' => '陈容博士',
        'about__CONTACT__PEOPLE_POSITION_01' => '创始人',
        'about__CONTACT__PEOPLE_02' => '申兰',
        'about__CONTACT__PEOPLE_POSITION_02' => '销售主管',


        'about__testimonials__comment_1' => '虽然我们才一起合作了两季，随着对彼此的信赖和对定位的了解，不断调整和更新品牌，每次都能让我们有发掘新品牌的激情。希望能开发越来越多的时尚品牌，一起为了我们热爱的事业而努力！',
        'about__testimonials__comment_2' => '作为有多年买手店运营经验的买手，已与多个品牌及SHOWROOM合作过。其中PROJECT CROSSOVER是我们已成功合作多季的专业SHOWROOM, 无论是从品牌引进，展会举办以及后期的跟单，一系列的服务都很专业真诚，希望我们可以保持长期合作，共同推进买手市场的发展。 ',
        'about__testimonials__comment_3' => '跨界时尚Project Crossover是中国市场最为成功的品牌孵化机构。通过将销售策略和公关推广的紧密结合，跨界时尚成功的让我们的品牌在最初进入这个新市场时便得到了充足的支持及市场的关注，让我们的品牌得以实现快速而健康的商业增长。作为中国第一个多品牌集合平台之一，跨界时尚已建立起强大的买手网络，并将此资源成功导入XSHOWROOM买手圈线上平台，这将引领时尚行业进入全新的发展阶段',
        'about__testimonials__comment_4' => '跨界时尚Project Crossover无论是在线上或线下推广我们的品牌方面，都表现极为出色，通过在社交平台上的推广及和中国知名媒体之间的合作，我们的品牌被更多的人知道并喜爱。我们很荣幸近期与知名演员佟丽娅合作，为《时尚芭莎》杂志拍摄大片。同时，此前跨界时尚于北京和上海成功举办媒体发布会，并邀请了《瑞丽》杂志编辑总监及《时装》的编辑等，活动反响非常令人满意。 ',
    ),
    /**
     * press.php
     */
    array(
        'press__HEAD' => '最新资讯',

        'press__TITLE_01' => '伦敦Project Crossover创始人Cherie Chen“爱上超模”',
        'press__CONTENT_01' => '爱上超模II空降伦敦Project Crossover工作室，伦敦Project Crossover创始人Cherie Chen“爱上超模。',

        'press__TITLE_02' => '昆凌助阵FABITORIA，将上海时装周推向高潮',
        'press__CONTENT_02' => '象征华丽浪漫、细腻优雅的新时尚设计师品牌FABITORIA本年度在上海时尚周上的16春夏大秀已于昨日圆满结束。',

        'press__TITLE_03' => '跨界时尚Adorn主题：邀你一起参与三地时装周系列活动',
        'press__CONTENT_03' => '在今年9月、10月伦敦、巴黎、上海三地时装周举办期间，Project Crossover和OOAK联合十一个设计师品牌，以pop up store和showroom联手的形式横跨欧亚大陆三地帮助设计师举办展览活动。',

        'press__TITLE_04' => 'Crossover PR的“媒体福利日”就是看美衣，吃马卡龙，和时尚博主聚会',
        'press__CONTENT_04' => 'Crossover PR于2015年5月29日，6月5日分别在上海 Project Crossover Showroom（洛克菲勒公馆），北京Pansi Palace成功举办设计师品牌Three Floor、Fabitoria和Forever Unique 的2015秋冬系列新品媒体预览会。',

        'press__btn_CONTINUE' => '阅读全文 ...'
    ),
   /**
    * career.php
    */
    array(
        'career__TITLE' => '加入我们',

        'career__SUB_TITLE' => '让你的职场之路更有价值',
        'career__CONTENT_01' =>
            '我们的团队持续在扩大，
            将成为最精英最志同道合的伙伴提供无数绝佳的职业机会。
            我们将通过最专业的买手服务线上平台，
            帮助千万个商户实现快速商业增长。',
        'career__CONTENT_02' =>
            '我们提供一个鼓舞人心的工作环境，
            我们欢迎任何创新的想法，我们帮助每个员工实现个人职业成长。
            如果你想成为这个日渐壮大的团队的一员，
            请将您的简历与求职信发送到：',

        'career__BENIFITS_TITLE' => '为何加入XSHOWROOM买手圈团队',
        'career__BENIFITS_01' => '创新的环境',
        'career__BENIFITS_01_DESC' => '我们的团队一直在不断寻找最创新的问题解决办法',
        'career__BENIFITS_02' => '绝佳的工作地段',
        'career__BENIFITS_02_DESC' => '我们选址在上海最繁华的中心地段作为我们的办公室',
        'career__BENIFITS_03' => '热情的团队',
        'career__BENIFITS_03_DESC' => '我们的团队紧密团结，致力于提供最佳的服务',
        'career__BENIFITS_04' => '最高端的时尚活动',
        'career__BENIFITS_04_DESC' => '我们定期举办及参加最高端最时尚的线下活动',

        'career__OPPORTUNITITY_TITLE' => '职业机会',
        'career__job_location_SH' => '上海',
        'career__job_location_POST' => '发布于',
        'career__job_type_FULLTIME' => '全职',

        'career_jd_01' => "
             职责
                • 为公司及客户设计、编辑平面视觉和网络资料，包括印刷、数字或视频等内容
                • 为公司新的电子商务平台设计前台页面，能够为实现良好用户体验提出有效建议
                • 提出网站活动的构思及建议
                • 艺术创作
                • 对我们的内部、外部网站所需的任何设计更改提出建议和修改
                • 具备HTML、CSS、Java知识，创建、修改电子营销邮件活动，以及任何所需的网页
                • 精通Adobe系列软件
                • 有视频制作能力者优先
                • 按照数字营销市场经理的要求维护所有网站的静态内容
                • 制作和发布公司微信平台服务账号

            资历和经验
                • 具备5年以上平面设计和网页设计经验 （请发送多种形式的作品供参考）
                • 大学本科或同等学历
                • 精通Adobe设计工具
                • 具备HTML、java、CSS编码知识
                • 熟练掌握中文和英语
                • 能够适应紧迫的工作节奏
                • 善于进行互动、沟通并积极表达想法
                • 能够适应复杂、专业环境中的工作
                • 思路开阔，善于迎接挑战，良好的团队合作精神
        ",
        'career_jd_02' => "
            我们正在寻找充满活力的个人加入我们的销售团队。

            - 承担销售任务,完成全年销售任务.
            - 负责与品牌的信息对接工作(订货信息收集/定期更新品牌订货信息/售后服务反馈等)
            - 负责公司销售合同及其他营销文件资料的管理、归类、整理、建档和保管工作。
            - 协助销售主管进行销售区域市场商家开发与维护。负责整理合作商家信息，协助销售主管持续了解合作商家情况，加强与商家沟通。
            - 协助销售主管对销售市场的信息收集、整理.协助销售团队维护市场及商圈平衡，保护商家利益。
        "
    ),
    /**
     * customer_support.php
     */
    array(
        'customer_banner_TITLE' => '客户支持中心',
        'customer_FAQ' => 'FAQ',
    ),
    /**
     * others
     */
    array(
        'other__invite__TITLE' => 'XSHOWROOM买手圈邀请制注册',
        'other__invite__HINT' => '请输入您的注册邀请码进行注册',
        'other__invite__btn_BACK' => '返回首页',
        'other__invite__btn_CONTINUE' => '现在注册',
        'other__invite__error_INFO' => '邀请码错误',
        'other__invite__APPLY_01' => '未邀请的用户，请联系',
        'other__invite__APPLY_02' => '进行注册邀请码申请',
    )
);
