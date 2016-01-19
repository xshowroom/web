<?php defined('SYSPATH') OR die('No direct script access.');

return array_merge(
    /**
     * API Message
     */
    array(
        'not_login' => 'invalid username or password',
        'logged_in' => 'logged in',
        'image_err' => 'validation code is not correct',
        'register_failed' => 'register failed',
        'register_success' => 'register success',
        'upload_failed' => 'upload failed',
        'upload_success' => 'upload success',
        'email_existed' => 'email existed',
        'name_existed' => 'name existed',
        'brandName_existed' => 'brand name has already been resisted',
        'brandUrl_existed' => 'brand url has already been resisted',
        'check_ok' => 'ok',
        'not_active' => 'user is pending approval',
        // change password
        'OLD_PASSWORD_ERROR'=> 'old password is not match',
        'CHANGE_PASSWORD_SUCCESS'=> 'password has been changed',
        // subscribe
        'MSG_SUBSCRIBE_SUCCESS' => 'YOU HAVE SUBSCRIBED LATEST INFO FROM XSHOWROOM!',
        'MSG_SUBSCRIBE_ERROR' => 'SUBSCRIBE FAILED!',
    ),
    /**
     * Inbox Message
     */
    array(
        'AUTO_MSG_WELCOME_BRAND' => "Welcome to XSHOWROOM! Let's start your business now! Please feel free to contact us if any problem. Mail to: info@projectcrossover.com",
        'AUTO_MSG_WELCOME_BUYER' => "Welcome to XSHOWROOM! Let's start your business now! Please feel free to contact us if any problem. Mail to: info@projectcrossover.com",
        'AUTO_MSG_ORDER_STATUS_CHANGE' => 'YOU ORDER STATUS CHANGED',
    ),
    /**
     * global_setting_with_login.php
     */
    array(
        'global_setting_with_login__WELCOME' => 'WELCOME',
        'global_setting_with_login__LOGIN' => 'LOGIN',
        'global_setting_with_login__LOGOUT' => 'LOGOUT',
        'global_setting_with_login__REGISTER' => 'REGISTER',
    ),
    /**
     * global_navigation_top_guest.php
     */
    array(
        'global_navigation_top_guest__HOME' => 'HOME',
        'global_navigation_top_guest__GUIDE' => 'GUIDE',
        'global_navigation_top_guest__SHOP' => 'SHOP',
        'global_navigation_top_guest__DISCOVER' => 'DISCOVER',
        'global_navigation_top_guest__PRESS' => 'PRESS',
        'global_navigation_top_guest__ABOUT' => 'ABOUT',
    ),
    /**
     * global_navigation_top_brand.php & global_navigation_top_buyer.php
     */
    array(
        'global_navigation_top_user__DASHBOARD' => 'DASHBOARD',
        'global_navigation_top_user__COLLECTION' => 'COLLECTION',
        'global_navigation_top_user__ORDER' => 'ORDER',
    	'global_navigation_top_user__BRAND' => 'SHOP',
        'global_navigation_top_user__LOOKBOOK' => 'LOOKBOOK',
        'global_navigation_top_user__CART' => 'CART',
        'global_navigation_top_user__MY_BRANDS' => 'MY BRANDS',
        'global_navigation_top_user__MESSAGE' => 'MESSAGE',

        'global_navigation_top_user__BUYER_MY_BRAND' => 'MY BRAND',
        'global_navigation_top_user__BUYER_MY_STORE' => 'MY STORE',
        'global_navigation_top_user__PROFILE' => 'MY PROFILE',
        'global_navigation_top_user__SIGN_OUT' => 'SIGN OUT',
    ),
    /**
     * global_navigation_user_center.php
     */
    array(
        'global_navigation_user_center__PROFILE' => 'MY PROFILE',
        'global_navigation_user_center__PASSWORD' => 'MY PASSWORD',
        'global_navigation_user_center__MESSAGES' => 'MESSAGES',
    ),
    /**
     * global_navigation_footer.php
     */
    array(
        'global_navigation_footer__GUIDE' => 'GUIDE',
        'global_navigation_footer__GUIDE__FOR_BRANDS' => 'BRANDS',
        'global_navigation_footer__GUIDE__FOR_BUYERS' => 'BUYERS',
        'global_navigation_footer__GUIDE__FOR_SHOWROOMS' => 'FOR SHOWROOMS',

        'global_navigation_footer__COMPANY' => 'COMPANY',
        'global_navigation_footer__COMPANY__PRESS' => 'PRESS',
        'global_navigation_footer__COMPANY__DISCOVERY' => 'DISCOVERY',
        'global_navigation_footer__COMPANY__ABOUT_US' => 'ABOUT US',
        'global_navigation_footer__COMPANY__CAREER' => 'CAREER',

        'global_navigation_footer__HELP' => 'HELP',
        'global_navigation_footer__HELP__CONTACT_US' => 'CONTACT US',
        'global_navigation_footer__HELP__PRIVACY_COOKIES' => 'PRIVACY & COOKIES',
        'global_navigation_footer__HELP__Q_A' => 'Q & A',
        'global_navigation_footer__HELP__TERMS_OF_SERVICE' => 'TERMS OF SERVICE',

        'global_navigation_footer__SUBSCRIBE' => 'SUBSCRIBE',
        'global_navigation_footer__SUBSCRIBE__SIGN_IP' => 'SIGN UP AND GET LATEST NEWS',
        'global_navigation_footer__SUBSCRIBE__EMAIL' => 'YOUR EMAIL ADDRESS',
        'global_navigation_footer__SUBSCRIBE__BUTTON' => 'SUBSCRIBE',
        'global_navigation_footer__SUBSCRIBE__LICENSE' => 'ALL RIGHTS RESERVED',
    ),
    /**
     * Home.php
     */
    array(
        'home__LEARN_MORE' => 'LEARN MORE',
        'home__CONTRACT_US' => 'CONTACT US',

        'home__XSHOWROOM_DESC' => 'FIND YOUR BUSINESS HERE',
        'home__XSHOWROOM_BUYER_COUNT' => 'BUYERS',
        'home__XSHOWROOM_BRANDS_COUNT' => 'BRANDS',
        'home__XSHOWROOM_PRODUCTS_COUNT' => 'PRODUCTS',
        'home__XSHOWROOM_ORDERS_COUNT' => 'ORDERS',

        'home__BRANDS' => 'BRANDS',
        'home__BRANDS_DESC' => 'Showcase your collection to the best stores in China. Expand and connect with new possibilities.',
        'home__BUYERS' => 'BUYERS',
        'home__BUYERS_DESC' => 'Discover new and exciting brands and explore their collections.',
        'home__btn_VIEW_MORE' => 'VIEW MORE',

        'home__btn_SOLUTION' => 'SOLUTION',
        'home__btn_REGISTER' => 'REGISTER',

        'home__HOT_BRANDS' => 'HOT BRANDS',
        'home__BRAND_PROFILES' => 'BRAND PROFILES',
        'home__SSI5_COLLECTION' => 'SSI6 COLLECTION',

        'home__TESTIMONIALS' => 'TESTIMONIALS',
        'home__FEATURED' => 'FEATURED',
        'home__people_BUYER' => 'BUYER',
        'home__people_DIRECTOR' => 'DIRECTOR',
        'home__people_BRAND_DIRECTOR' => 'BRAND DIRECTOR',
    ),
    /**
     * guide.php
     */
    array(
        'guide__SOLUTIONS_FOR_BRANDS' => 'SOLUTIONS FOR BRANDS',
        'guide__SOLUTIONS_FOR_RETAILERS' => 'SOLUTIONS FOR BUYERS',
        'guide__X_SHOWROOM_FASHION_ACCESS' => 'XSHOWROOM FASHION ACCESS',
        'guide__SOLUTION_BRAND' => 'BRAND',
        'guide__SOLUTION_RETAILER' => 'BUYER',
        'guide__SUBSCRIPTION' => 'SUBSCRIPTION',

        'guide__brand_left_INTRODUCE' => 'Are you interested in exploring the market with an online showroom who will help you reach your potential? Market your brand to buyers in China with us. With X SHOWROOM, you can take advantage of the extensive experience of the staff who in partnership with Project Crossover, offer the Shanghai and London showroom along with the online showroom as digital presence for your brand to streamline the wholesale process. You can be sure the visibility of your collection and products will continually increase with us through the 1000 buyers already registered.',
        'guide__brand_right_INTRODUCE_1' => 'ONLINE SHOWROOM',
        'guide__brand_right_INTRODUCE_DESC_1' => 'An online showroom to showcase your products to our selected buyers. Available 24/7 to give buyers the flexibility to place their orders anytime',
        'guide__brand_right_INTRODUCE_2' => 'ACCESS TO TOP BUYERS',
        'guide__brand_right_INTRODUCE_DESC_2' => 'We assure our buyers are authentic. Only buyers with existing stores can have access to your collections',
        'guide__brand_right_INTRODUCE_3' => 'DIGITAL ORDERS',
        'guide__brand_right_INTRODUCE_DESC_3' => 'Easy-to-click ordering system for new and repeated orders. Linesheets are set up automatically from orders and downloads are available',

        'guide__buyer_left_INTRODUCE' => 'Do you have your own store? Whether you choose to sell online or in store, sign up as a buyer on X SHOWROOM and view the collections that our brands have available. Sign up is FREE, and there are no subscription fees to pay. Product catalogues and our online showrooms are available 24/7. Simply view the collections and submit your order directly to the brand and they will be in touch to process your order. Our team in Shanghai are always at hand to assist in the process and with communication.',
        'guide__buyer_right_INTRODUCE_1' => '24/7 SOURCING OF BRANDS',
        'guide__buyer_right_INTRODUCE_DESC_1' => 'Virtual showrooms with our selected brands. Discover new brands and preview collections before buying',
        'guide__buyer_right_INTRODUCE_2' => 'ORDER HISTORY',
        'guide__buyer_right_INTRODUCE_DESC_2' => 'View previous orders and easily re-order with just a few clicks online',
        'guide__buyer_right_INTRODUCE_3' => 'BOOK AN APPOINTMENT & EXPLORE',
        'guide__buyer_right_INTRODUCE_DESC_3' => 'Explore new brands and new collections not just online, but also in our physical showroom & concept store in Shanghai. No hassle, no fee',

        'guide__btn_REGISTER' => 'REGISTER',
        'guide__btn_SIGN_IN' => 'SIGN IN',

        'guide__MORE_BENEFITS_OF_REGISTERING_WITH_US' => 'MORE BENEFITS OF REGISTERING WITH US',

        'guide__benefits_PREVIEW_PROFILES' => 'PREVIEW STORE PROFILES',
        'guide__benefits_PREVIEW_PROFILES_DESC' => 'Brands can view store profiles before confirming the order',
        'guide__benefits_LANGUAGE_SELECTION' => 'MAXIMISE ORDER ACCURACY',
        'guide__benefits_LANGUAGE_SELECTION_DESC' => 'Minimise the rate of order error as orders are made online through our reliable user friendly platform',
        'guide__benefits_PROMOTION' => 'UNLIMITED UPLOAD',
        'guide__benefits_PROMOTION_DESC' => 'Enjoy unlimited uploads of collections and products',
        'guide__benefits_CHOOSE_ACCOUNT_TYPE' => 'CHINESE LANGUAGE',
        'guide__benefits_CHOOSE_ACCOUNT_TYPE_DESC' => 'Identical pages are set up in the Chinese language to cater to our Chinese reading customers',
        'guide__benefits_DIGITAL_LINE_SHEETSS' => 'BUYER REPORTS & TRACKING STATISTICS',
        'guide__benefits_DIGITAL_LINE_SHEETS_DESC' => 'Buyer reports and tracking statistics are available for your usage (on request)',
        'guide__benefits_MINIMISE_ORDER_ERROR' => 'PROFESSIONAL ACCOUNT MANAGER',
        'guide__benefits_MINIMISE_ORDER_ERROR_DESC' => 'We understand the importance of the orders you make. If you have any questions, you can contact your Account Manager at any time',
        'guide__benefits_UNLIMITED_UPLOAD' => 'PROMOTION',
        'guide__benefits_UNLIMITED_UPLOAD_DESC' => 'Your brand will be featured in the XSHOWROOM promotional activities including tradeshows and digital marketing, such as our Chinese newsletters and Chinese social media.',
        'guide__benefits_24_7_SHOWROOM' => 'DIGITAL AND PHYSICAL SHOWROOM',
        'guide__benefits_24_7_SHOWROOM_DESC' => 'Choice of an online only or premier account with additional physical showroom in Shanghai. Enjoy the privilege of a physical showroom showcasing throughout the whole year, with support from our professional sales team',
        'guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY' => 'CONCEPT STORE',
        'guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY_DESC' => 'The opportunity of collaboration with us in our retail space to set up your concept store showcasing your collection with support from our professional sales team',

        'guide__benefits_BUYER_01' => 'PREVIEW COLLECTIONS',
        'guide__benefits_BUYER_01_DESC' => 'Preview collection online.',
        'guide__benefits_BUYER_02' => 'VIRTUAL SHOWROOMS',
        'guide__benefits_BUYER_02_DESC' => 'Virtual showrooms for our selected Brands',
        'guide__benefits_BUYER_03' => 'STORE PROFILE',
        'guide__benefits_BUYER_03_DESC' => 'Show the Brands who you are with your own store profile page',
        'guide__benefits_BUYER_04' => 'TRANSLATION PROVIDED',
        'guide__benefits_BUYER_04_DESC' => 'An Account Manager will be able to provide help to handle communication should language be a barrier (English/Chinese)',
        'guide__benefits_BUYER_05' => 'SAVE FOR LATER',
        'guide__benefits_BUYER_05_DESC' => 'Set up orders for purchasing later (subject to Brand availability)',
        'guide__benefits_BUYER_06' => 'REPORT & TRACKING STATISTICS',
        'guide__benefits_BUYER_06_DESC' => 'Reports and tracking statistics are available for your usage (on request)',
        'guide__benefits_BUYER_07' => 'DISCOVER BRANDS',
        'guide__benefits_BUYER_07_DESC' => 'Discover new brands and make new connections through our large directory',
        'guide__benefits_BUYER_08' => 'FREE ACCOUNT',
        'guide__benefits_BUYER_08_DESC' => 'Free membership, no subscription fees',
        'guide__benefits_BUYER_09' => 'SHOWROOM APPOINTMENTS',
        'guide__benefits_BUYER_09_DESC' => 'Book an appointment with us to explore the range of brands in our physical showroom and concept store',

        'guide__MEMBERSHIP_INCLUDES' => 'MEMBERSHIP INCLUDES',
        'guide__MEMBERSHIP_INCLUDES_R1' => '> One year access to the system',
        'guide__MEMBERSHIP_INCLUDES_R2' => '> Training to use the system',
        'guide__MEMBERSHIP_INCLUDES_R3' => '> Translation of main content text to Chinese for Chinese buyers',
        'guide__MEMBERSHIP_INCLUDES_R4' => '> A dedicated URL for Buyers to quickly access your product catalogue',
        'guide__MEMBERSHIP_INCLUDES_R5' => '> Account Manager to handle verbal communications where there is a language barrier for English/Chinese',
    ),
    /**
     * login.php
     */
    array(
        'login__SIGN_IN' => 'SIGN IN',
        'login__EMAIL' => 'EMAIL ADDRESS*',
        'login__PASSWORD' => 'YOUR PASSWORD*',
        'login__VALID_CODE' => 'VALID CODE*',
        'login__btn_LOGIN' => 'LOGIN',
        'login__REMEMBER_ME' => 'REMEMBER ME',
        'login__REQUEST_MEMBERSHIP' => 'REQUEST MEMBERSHIP',
        'login__REQUEST_MEMBERSHIP_DESC' => 'X SHOWROOM IS OPEN TO SELECTED BRANDS. AGENCIES AND BUYERS TO PARTICIPATE. PLEASE REGISTER ONLINE',
        'login__REQUEST_BRAND' => 'FOR BRANDS',
        'login__REQUEST_BUYER' => 'FOR BUYERS',
    ),
    /**
     * register_brand.php
     */
    array(
        'brand_register__STEP' => 'STEP',
        'brand_register__SETP_OF' => 'OF',
        'brand_register__STEP_INFORMATION_1' => 'ADD USER DETAILS',
        'brand_register__STEP_INFORMATION_2' => 'ADD BRAND DETAILS',
        'brand_register__STEP_INFORMATION_3' => 'ADD COMPANY DETAILS',

        'brand_register__STEP_1__EMAIL_ADDRESS' => 'EMAIL ADDRESS',
        'brand_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER' => 'PLEASE ENTER EMAIL ADDRESS *',
        'brand_register__STEP_1__PASSWORD' => 'PASSWORD',
        'brand_register__STEP_1__PASSWORD_PLACEHOLDER' => 'PLEASE ENTER YOUR PASSWORD *',
        'brand_register__STEP_1__FIRST_NAME_PLACEHOLDER' => 'FIRST NAME *',
        'brand_register__STEP_1__LAST_NAME_PLACEHOLDER' => 'LAST NAME *',
        'brand_register__STEP_1__DISPLAY_NAME_PLACEHOLDER' => 'DISPLAY NAME *',
        'brand_register__STEP_1__TELEPHONE_PLACEHOLDER' => 'CONTACT TELEPHONE NUMBER *',
        'brand_register__STEP_1__MOBILE_PLACEHOLDER' => 'CONTACT MOBILE NUMBER (OPTIONAL)',
        'brand_register__STEP_1__btn__CANCEL' => 'CANCEL',
        'brand_register__STEP_1__btn__ADD_BRAND' => 'NEXT',

        'brand_register__STEP_2__IMAGE' => 'LOOKBOOK / IMAGE',
        'brand_register__STEP_2__BRAND_NAME_PLACEHOLDER' => 'PLEASE ENTER YOUR BRAND NAME *',
        'brand_register__STEP_2__DESIGNER_NAME_PLACEHOLDER' => 'DESIGNER NAME *',
        'brand_register__STEP_2__STORE_COLLECTION_TYPE' => 'COLLECTION TYPE *',
        'brand_register__STEP_2__BRAND_URL' => 'BRAND URL *',
        'brand_register__STEP_2__URL_DESC_1' => 'This URL will be used for direct access to your brand',
        'brand_register__STEP_2__URL_DESC_2' => '(for authenticated buyers only)',
        'brand_register__STEP_2__btn__PREVIOUS' => 'PREVIOUS',
        'brand_register__STEP_2__btn__ADD_COMPANY' => 'NEXT',

        'brand_register__STEP_3__COMPANY_NAME_PLACEHOLDER' => 'COMPANY NAME *',
        'brand_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER' => 'COMPANY ADDRESS *',
        'brand_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER' => 'STATE / COUNTRY *',
        'brand_register__STEP_3__COMPANY_ZIP_PLACEHOLDER' => 'POSTCODE / ZIP *',
        'brand_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER' => 'COMPANY TELEPHONE NUMBER *',
        'brand_register__STEP_3__COMPANY_URL_PLACEHOLDER' => 'COMPANY WEB PAGE URL *',
        'brand_register__STEP_3__COMPANY_ACCEPT_1' => 'On receipt of your application, an email will be sent to your email address. The access will be granted after management approval.',
        'brand_register__STEP_3__COMPANY_ACCEPT_2' => 'I accept the terms and conditions of XSHOWROOM website.',
        'brand_register__STEP_3__btn__PREVIOUS' => 'PREVIOUS',
        'brand_register__STEP_3__btn__SUBMIT' => 'SUBMIT',
    ),
    /**
     * register_brand.php
     */
    array(
        'buyer_register__STEP' => 'STEP',
        'buyer_register__SETP_OF' => 'OF',
        'buyer_register__STEP_INFORMATION_1' => 'ADD USER DETAILS',
        'buyer_register__STEP_INFORMATION_2' => 'ADD SHOP DETAILS',
        'buyer_register__STEP_INFORMATION_3' => 'COMPANY DETAILS',

        'buyer_register__STEP_1__EMAIL_ADDRESS' => 'EMAIL ADDRESS',
        'buyer_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER' => 'PLEASE ENTER EMAIL ADDRESS *',
        'buyer_register__STEP_1__PASSWORD' => 'PASSWORD',
        'buyer_register__STEP_1__PASSWORD_PLACEHOLDER' => 'PLEASE ENTER YOUR PASSWORD *',
        'buyer_register__STEP_1__FIRST_NAME_PLACEHOLDER' => 'FIRST NAME *',
        'buyer_register__STEP_1__LAST_NAME_PLACEHOLDER' => 'LAST NAME *',
        'buyer_register__STEP_1__DISPLAY_NAME_PLACEHOLDER' => 'DISPLAY NAME *',
        'buyer_register__STEP_1__TELEPHONE_PLACEHOLDER' => 'CONTACT TELEPHONE NUMBER *',
        'buyer_register__STEP_1__MOBILE_PLACEHOLDER' => 'CONTACT MOBILE NUMBER (OPTIONAL)',
        'buyer_register__STEP_1__btn__CANCEL' => 'CANCEL',
        'buyer_register__STEP_1__btn__ADD_STORE' => 'ADD STORE',

        'buyer_register__STEP_2__IMAGE' => 'SHOP / IMAGE',
        'buyer_register__STEP_2__STORE_NAME_PLACEHOLDER' => 'PLEASE ENTER YOUR STORE NAME *',
        'buyer_register__STEP_2__STORE_TYPE_PLACEHOLDER' => 'PLEASE SELECT STORE TYPE *',
        'buyer_register__STEP_2__STORE_COLLECTION_TYPE' => 'COLLECTION TYPE',
        'buyer_register__STEP_2__STORE_BRAND_PLACEHOLDER' => 'BRAND CARRIED IN STORE *',
        'buyer_register__STEP_2__STORE_WEBSITE_PLACEHOLDER' => 'WEBSITE *',
        'buyer_register__STEP_2__STORE_ADDRESS_PLACEHOLDER' => 'STORE ADDRESS *',
        'buyer_register__STEP_2__STORE_SHIPPING_ADDRESS_PLACEHOLDER' => 'SHIPPING ADDRESS *',
        'buyer_register__STEP_2__STORE_COUNTRY_PLACEHOLDER' => 'STATE / COUNTRY *',
        'buyer_register__STEP_2__STORE_ZIP_PLACEHOLDER' => 'POSTCODE / ZIP *',
        'buyer_register__STEP_2__STORE_TELEPHONE_PLACEHOLDER' => 'TELEPHONE NUMBER *',
        'buyer_register__STEP_2__btn__PREVIOUS' => 'PREVIOUS',
        'buyer_register__STEP_2__btn__ADD_COMPANY' => 'ADD COMPANY',

        'buyer_register__STEP_3__COMPANY_NAME_PLACEHOLDER' => 'COMPANY NAME *',
        'buyer_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER' => 'COMPANY ADDRESS *',
        'buyer_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER' => 'STATE/COUNTRY *',
        'buyer_register__STEP_3__COMPANY_ZIP_PLACEHOLDER' => 'POSTCODE/ZIP *',
        'buyer_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER' => 'COMPANY TELEPHONE NUMBER *',
        'buyer_register__STEP_3__COMPANY_URL_PLACEHOLDER' => 'COMPANY WEB PAGE URL *',
        'buyer_register__STEP_3__COMPANY_ACCEPT_1' => 'On receipt of your application, an email will be sent to your email address. The access will be granted after management approval.',
        'buyer_register__STEP_3__COMPANY_ACCEPT_2' => 'I accept the terms and conditions of XSHOWROOM website.',
        'buyer_register__STEP_3__btn__PREVIOUS' => 'PREVIOUS',
        'buyer_register__STEP_3__btn__SUBMIT' => 'SUBMIT',
    ),
    /**
     * user_profile.php
     */
    array(
        'profile__BASIC_INFO' => 'BASIC INFO',
        'profile__BRAND_INFO' => 'BRAND INFO',
        'profile__COMPANY_INFO' => 'COMPANY INFO',

        'profile__EMAIL' => 'E-MAIL （LOGIN NAME）',
        'profile__FIRST_NAME' => 'FIRST NAME',
        'profile__LAST_NAME' => 'LAST NAME',
        'profile__DISPLAY_NAME' => 'DISPLAY NAME',
        'profile__TELEPHONE' => 'TELEPHONE',
        'profile__MOBILE' => 'MOBILE PHONE',
        'profile__REGISTER_DATE' => 'REGISTER DATETIME',
        'profile__LAST_LOGIN_TIME' => 'LAST LOGIN TIME',

        'profile__COMPANY_NAME' => 'COMPANY NAME',
        'profile__COMPANY_ADDRESS' => 'COMPANY ADDRESS',
        'profile__COMPANY_COUNTRY' => 'COMPANY COUNTRY',
        'profile__COMPANY_ZIP' => 'COMPANY ZIPCODE',
        'profile__COMPANY_TELEPHONE' => 'COMPANY TELEPHONE',
        'profile__COMPANY_WEB_URL' => 'COMPANY URL',

        'profile__BRAND_NAME' => 'BRAND NAME',
        'profile__DESIGNER_NAME' => 'DESIGNER NAME',
        'profile__BRAND_URL' => 'BRAND URL',
        'profile__BRAND_CATEGORY' => 'BRAND CATEGORY',
        'profile__BRAND_DESCRIPTION' => 'DESCRIPTION',
        'profile__BRAND_COVER_IMAGE' => 'COVER IMAGE',

        'profile__btn__EDIT' => 'EDIT',
        'profile__btn__SAVE' => 'SAVE',
        'profile__btn__CANCEL' => 'CANCEL',
    ),
    /**
     * user_password.php
     */
    array(
        'password__TITLE' => 'CHANGE YOUR PASSWORD',

        'password__OLD' => 'old password *',
        'password__NEW_1' => 'your new password *',
        'password__NEW_2' => 'confirm password *',

        'password__btn_UPDATE' => 'CHANGE PASSWORD',
    ),
    /**
     * brand_dashboard.php
     */
    array(
        'brand_dashboard__BASED_IN' => 'BASED IN',
        'brand_dashboard__LAST_VISIT' => 'LAST VISIT',
        'brand_dashboard__WEBSITE'=> 'WEBSITE',

        'brand_dashboard__MY_ORDERS' => 'MY ORDERS',
        'brand_dashboard__ALL_ORDERS' => 'ALL ORDERS >',
        'brand_dashboard__ORDER_EMPTY_1' => 'WELCOME TO XSHOWROOM!',
        'brand_dashboard__ORDER_EMPTY_2' => 'START YOUR BUSINESS NOW!',
        'brand_dashboard__ORDER_EMPTY_3' => 'tips: collection create order',
        'brand_dashboard__ORDER_NUMBER' => 'ORDER',
        'brand_dashboard__ORDER_SUBMIT' => 'SUBMIT:',
        'brand_dashboard__ORDER_AMOUNT' => 'AMOUNT:',

        'brand_dashboard__MY_COLLECTIONS' => 'MY COLLECTIONS',
        'brand_dashboard__ALL_COLLECTIONS' => 'ALL COLLECTIONS >',
        'brand_dashboard__COLLECTION_EMPTY_1' => 'OH NO! YOU HAVE NO',
        'brand_dashboard__COLLECTION_EMPTY_2' => 'COLLECTION!',
        'brand_dashboard__COLLECTION_EMPTY_3' => 'ADD COLLECTION',

        'brand_dashboard__ACCOUNT_MANAGER' => 'At XSHOWROOM we have Brand Account Manager to help you to introduce the brand, book you in to see the collection, and follow up your order.',
        'brand_dashboard__ACCOUNT_MANAGER_CONTRACT' => 'CONTRACT US'
    ),
    /**
     * collection_create.php
     */
    array(
        'collection_create__BASIC_INFO' => 'ADD COLLECTION BASIC INFO',
        'collection_create__COLLECTION_COVER' => 'Collection Cover',
        'collection_create__COLLECTION_NAME' => 'Collection Name',
        'collection_create__COLLECTION_CATEGORY' => 'Collection Category',
        'collection_create__COLLECTION_MODE' => 'Collection Mode',
        'collection_create__COLLECTION_SEASON' => 'Collection Season',
        'collection_create__COLLECTION_MINIMUM_ORDER' => 'Minimum Order',
        'collection_create__COLLECTION_CURRENCY' => 'Payment Currency',
        'collection_create__COLLECTION_DEADLINE' => 'Deadline for Order',
        'collection_create__COLLECTION_DELIVERY_DATE' => 'Delivery Date',
        'collection_create__COLLECTION_DESCRIPTION' => 'Description',
        'collection_create__COLLECTION_CREATE' => 'CREATE',
    ),
    /**
     * collection_index.php
     */
    array(
        'collection_index__EDIT' => 'EDIT',
        'collection_index__HIDE' => 'HIDE',
        'collection_index__SHOW_ALL' => 'SHOW ALL',

        'collection_index__btn_SUBMIT' => 'SUBMIT',
        'collection_index__btn_DELETE' => 'DELETE',
        'collection_index__btn_CLOSE' => 'CLOSE',

        'collection_index__COLLECTION_COVER' => 'Collection Cover',
        'collection_index__COLLECTION_NAME' => 'Collection Name',
        'collection_index__COLLECTION_CATEGORY' => 'Collection Category',
        'collection_index__COLLECTION_MODE' => 'Collection Mode',
        'collection_index__COLLECTION_SEASON' => 'Collection Season',
        'collection_index__COLLECTION_MINIMUM_ORDER' => 'Minimum Order',
        'collection_index__COLLECTION_CURRENCY' => 'Payment Currency',
        'collection_index__COLLECTION_DEADLINE' => 'Deadline for Order',
        'collection_index__COLLECTION_DELIVERY_DATE' => 'Delivery Date',
        'collection_index__COLLECTION_DESCRIPTION' => 'Description',

        'collection_index__btn_CANCEL' => 'CANCEL',
        'collection_index__btn_UPDATE' => 'UPDATE',

        'collection_index__NO_PRODUCT_1' => 'OH NO! YOU HAVE NO',
        'collection_index__NO_PRODUCT_2' => 'PRODUCTS IN THIS COLLECTION!',

        'collection_index__CATEGORIES' => 'CATEGORIES',
        'collection_index__ADD_PRODUCT' => '+ ADD NEW PRODUCT',
        'collection_index__btn_LOAD_MORE' => 'LOAD MORE',
        'collection_index__btn_ADD_PRODUCT' => 'ADD NEW PRODUCT',

        'collection_index__modal__SUBMIT_CONFIRM' => 'CONFIRM SUBMIT?',
        'collection_index__modal__SUBMIT_DETAIL' => 'Do you confirm to submit this collection? (you cannot make changes of this collection after submitted)',
        'collection_index__modal__SUBMIT_btn_CANCEL' => 'CANCEL',
        'collection_index__modal__SUBMIT_btn_SUBMIT' => 'SUBMIT',

        'collection_index__modal__DELETE_CONFIRM' => 'CONFIRM DELETE?',
        'collection_index__modal__DELETE_DETAIL' => 'Do you confirm to delete this collection? ',
        'collection_index__modal__DELETE_btn_CANCEL' => 'CANCEL',
        'collection_index__modal__DELETE_btn_DELETE' => 'DELETE',

        'collection_index__modal__CLOSE_CONFIRM' => 'CONFIRM CLOSE?',
        'collection_index__modal__CLOSE_DETAIL' => 'Do you confirm to close this collection? (buyers will not see this collection once you close it)',
        'collection_index__modal__CLOSE_btn_CANCEL' => 'CANCEL',
        'collection_index__modal__CLOSE_btn_CLOSE' => 'CLOSE'
    ),
    /**
     * product_create.php
     */
    array(
        'product_create__PRODUCT_IMAGES' => 'PRODUCT IMAGES',
        'product_create__PRODUCT_IMAGES_REQ' => 'You can upload 5 images(jpg, png, gif) for each product.',
        'product_create__PRODUCT_INFO' => 'PRODUCT INFO',
        'product_create__PRODUCT_NAME' => 'PRODUCT NAME',
        'product_create__PRODUCT_CATEGORY' => 'PRODUCT CATEGORY',
        'product_create__PRODUCT_STYLE_NUMBER' => 'STYLE NUMBER',
        'product_create__PRODUCT_WHOLESALE_PRICE' => 'WHOLESALE PRICE',
        'product_create__PRODUCT_RETAIL_PRICE' => 'RETAIL PRICE',
        'product_create__PRODUCT_SIZE_REGION' => 'SIZE REGION',
        'product_create__PRODUCT_COLOR_SET' => 'COLOR SET',
        'product_create__PRODUCT_ADD_COLOR' => 'EDIT',
        'product_create__PRODUCT_MADE_IN' => 'MADE IN',
        'product_create__PRODUCT_MATERIAL' => 'MATERIAL',
        'product_create__PRODUCT_CARE_INSTRUCTION' => 'PRODUCT DETAILS',
        'product_create__PRODUCT_CARE_INSTRUCTION_DESC' => 'including description, measurement, care instructions etc',

        'product_create__PRODUCT_btn_SAVE' => 'SAVE',
        'product_create__PRODUCT_btn_CANCEL' => 'CANCEL',

        'product_create__PRODUCT_color_STANDARD_COLOR' => 'STANDARD COLOR',
        'product_create__PRODUCT_color_CUSTOMIZED_COLOR' => 'CUSTOMIZED COLOR',
        'product_create__PRODUCT_color_UPLOAD_IMAGE' => 'UPLOAD PATTERN IMAGE',
        'product_create__PRODUCT_color_btn_ADD_COLOR' => 'OK',
        'product_create__PRODUCT_color_DESCRITION' => '* You can select several colors.',
    ),
    /**
     * product_index.php
     */
    array(
        'product_index__BACK_COLLECTION' => 'BACK TO COLLECTION',

        'product_index__COLLECTION_MODE' => 'COLLECTION MODE: ',
        'product_index__COLLECTION_SEASON' => 'SEASON: ',
        'product_index__COLLECTION_MINIMUM_ORDER' => 'MINIMUM ORDER: ',
        'product_index__COLLECTION_DEADLINE' => 'DEADLINE FOR ORDER: ',
        'product_index__COLLECTION_DELIVERY_DATE' => 'DELIVER DATE: ',

        'product_index__PRODUCT_CATEGORY' => 'PRODUCT CATEGORY',
        'product_index__PRODUCT_STYLE_NUMBER' => 'STYLE NUMBER',
        'product_index__PRODUCT_WHOLESALE_PRICE' => 'WHOLESALE PRICE',
        'product_index__PRODUCT_RETAIL_PRICE' => 'RETAIL PRICE',
        'product_index__PRODUCT_SIZE' => 'SIZE',
        'product_index__PRODUCT_COLOR' => 'COLOR',
        'product_index__PRODUCT_MADE_IN' => 'MADE IN',
        'product_index__PRODUCT_MATERIAL' => 'MATERIAL',
        'product_index__PRODUCT_CARE_INSTRUCTION' => 'PRODUCT DETAILS (including description, measurement, care instructions etc)',

        'product_index__btn__ADD_TO_CART' => 'ADD TO CART',
        'product_index__btn__REMOVE_IN_CART' => 'REMOVE IN CART',
        'product_index__btn__VIEW_CART' => 'VIEW MY CART',

        'product_index__PRODUCT_btn_EDIT' => 'EDIT',
        'product_index__PRODUCT_btn_DELETE' => 'DELETE',

        'product_index__modal__DELETE_CONFIRM' => 'CONFIRM DELETE?',
        'product_index__modal__DELETE_DETAIL' => 'Do you confirm to delete this product? ',
        'product_index__modal__DELETE_btn_CANCEL' => 'CANCEL',
        'product_index__modal__DELETE_btn_DELETE' => 'DELETE',
    ),
    /**
     * brand_collection.php
     */
    array(
        'brand_collection__STATUS' => 'STATUS',
        'brand_collection__ADD_COLLECTION' => '+ ADD COLLECTION',

        'brand_collection__COLLECTION_STATUS' => 'COLLECTION STATUS:',
        'brand_collection__COLLECTION_LAST_MODIFY' => 'LAST MODIFY:',
        'brand_collection__COLLECTION_DESCRIPTION' => 'DESCRIPTION:',

        'brand_collection__btn_VIEW' => 'VIEW',
    ),
    /**
     * buyer_brand.php, shop.php
     */
    array(
        'brand_filter__NO_BRAND_1' => 'NO BRAND MATCHES YOUR CONDITIONS!',
        'brand_filter__NO_BRAND_2' => 'CHANGING YOUR SEARCH CONDITIONS TO VIEW MORE BRANDS',
    ),
    /**
     * brand_index.php
     */
    array(
        'brand_info__BASE_IN' => 'BASE IN',
        'brand_info__DESIGNER' => 'DESIGNER',
        'brand_info__WEBSITE' => 'WEB SITE',
        'brand_info__DESCRIPTION' => 'DESCRIPTION',
        'brand_info__SHOW_ALL' => 'SHOW ALL',
        'brand_info__HIDE' => 'HIDE',

        'brand_filter__COLLECTIONS' => 'COLLECTIONS',
        'brand_filter__NO_COLLECTION_1' => 'NO COLLECTION MATCHES YOUR CONDITIONS!',
        'brand_filter__NO_COLLECTION_2' => 'CHANGING YOUR SEARCH CONDITIONS TO VIEW MORE COLLECTIONS',

        'brand_access__NO_PRIVILEGE_1' => 'YOU DO NOT HAVE ACCESS TO THIS BRAND.',
        'brand_access__NO_PRIVILEGE_2' => 'APPLY PRIVILEGE TO VIEW ALL HIS COLLECTION.',

        'brand_access__btn_APPLY' => 'APPLY',

        'brand_access__INFO_APPLIED' => 'SYSTEM ADMIN IS NOW REVIEWING YOUR APPLICATION.',
        'brand_access__btn_APPLIED' => 'APPLIED',

        'brand_store_application__TITLE' => 'SELECT THE STORE TO AUTHORIZE',
        'brand_store_application__BODY' => 'Please select the store to authorize the brand.',
        'brand_store_application__btn_APPLY' => 'APPLY',
        'brand_store_application__btn_CANCEL' => 'CANCEL',
    ),
    /**
     * buyer_dashboard.php
     */
    array(
        'buyer_dashboard__INTERESTED' => 'INTERESTED BRANDS',
        'buyer_dashboard__LAST_VISIT'=> 'LAST TIME VISIT',

        'buyer_dashboard__MY_BRANDS' => 'MY BRANDS',
        'buyer_dashboard__ALL_BRANDS' => 'ALL BRANDS >',
        'buyer_dashboard__BRANDS_EMPTY_1' => 'CANNOT FIND WHAT YOU LIKE?',
        'buyer_dashboard__BRANDS_EMPTY_2' => 'MORE AND MORE BRANDS ARE JOINING US.',
        'buyer_dashboard__BRANDS_EMPTY_3' => 'EXPLORE NOW',

        'buyer_dashboard__MY_ORDERS' => 'MY ORDERS',
        'buyer_dashboard__ALL_ORDERS' => 'ALL ORDERS >',
        'buyer_dashboard__ORDER_EMPTY_1' => 'WELCOME TO XSHOWROOM',
        'buyer_dashboard__ORDER_EMPTY_2' => 'YOU HAVE ON ORDERS. PLEASE',
        'buyer_dashboard__ORDER_EMPTY_3' => 'EXPLORE BRANDS',
        'buyer_dashboard__ORDER_NUMBER' => 'ORDER:',
        'buyer_dashboard__ORDER_SUBMIT' => 'SUBMIT:',
        'buyer_dashboard__ORDER_AMOUNT' => 'AMOUNT:',

        'buyer_dashboard__MY_STORES' => 'MY STORES',
        'buyer_dashboard__ALL_STORES' => 'ALL STORES >',
        'buyer_dashboard__STORE_btn_VIEW' => 'VIEW',
        'buyer_dashboard__STORE_BRANDS' => 'BRANDS',
        'buyer_dashboard__STORE_ABOUT' => 'ABOUT STORE',
        'buyer_dashboard__STORE_NO_ABOUT' => 'NO INFORMATION',

        'buyer_dashboard__ACCOUNT_MANAGER' => 'At XSHOWROOM we have Brand Account Manager to help you to introduce the brand, book you in to see the collection, and follow up your order.',
        'buyer_dashboard__ACCOUNT_MANAGER_CONTRACT' => 'CONTRACT US'
    ),
    /**
     * buyer_cart.php
     */
    array(
        'buyer_cart__TITLE' => 'ALL COLLECTIONS IN CART',

        'buyer_cart__NO_ITEM_01' => 'YOU HAVE NOTHING IN CART！',
        'buyer_cart__NO_ITEM_02' => 'GO & EXPLORE BRANDS',

        'buyer_cart__SEASON'=> 'SEASON:',
        'buyer_cart__ORDER_MODE' => 'ORDER MODE:',
        'buyer_cart__DEADLINE' => 'DEADLINE FOR ORDER:',
        'buyer_cart__DELIVERY_DATE' => 'DELIVERY DATE:',
        'buyer_cart__MIN_ORDER' => 'MIN ORDER:',
        'buyer_cart__PRODUCTS' => 'PRODUCTS IN CART:',

        'buyer_cart__btn_GENERATE' => 'GENERATE ORDER',
    ),
    /**
     * buyer_store.php
     */
    array(
        'buyer_store__TITLE' => 'MY STORES',

        'buyer_store__ADD_NEW' => '+ ADD NEW STORE',

        'buyer_store__item__BRANDS' => 'BRANDS:',
        'buyer_store__item__TYPE' => 'TYPE:',
        'buyer_store__item__ADDRESS' => 'ADDR:',
        'buyer_store__item__TELEPHONE' => 'TEL:',

        'buyer_store__item__btn_EDIT' => 'EDIT',
        'buyer_store__item__btn_VIEW' => 'VIEW',
        'buyer_store__item__btn_CLOSE' => 'CLOSE',
    ),
    /**
     * store_index.php & store_create.php
     */
    array(
        'store_index__STORE_IMAGES' => 'STORE IMAGES',
        'store_index__STORE_INFO' => 'STORE INFO',

        'store_index__STORE_NAME' => 'STORE NAME',
        'store_index__STORE_CATEGORY' => 'STORE CATEGORY',
        'store_index__COLLECTION_TYPES' => 'COLLECTION TYPES',
        'store_index__BRAND_LIST' => 'BRAND LIST',
        'store_index__STORE_WEBSITE' => 'STORE WEBSITE',
        'store_index__STORE_ADDRESS' => 'STORE ADDRESS',
        'store_index__STORE_SHIPPING_ADDRESS' => 'SHIPPING ADDRESS',
        'store_index__STORE_COUNTRY' => 'STORE COUNTRY',
        'store_index__STORE_ZIPCODE' => 'STORE ZIPCODE',
        'store_index__STORE_TELEPHONE' => 'STORE TELEPHONE',
        'store_index__ABOUT_STORE' => 'ABOUT STORE',

        'store_index__btn_SAVE' => 'SAVE',
        'store_index__btn_CANCEL' => 'CANCEL',
        'store_index__btn_EDIT' => 'EDIT STORE',
    ),
    /**
     * order_create.php
     */
    array(
        'order_create__PRODUCTS' => 'PRODUCT DETAIL IN CART:',

        'order_create__DESC_01' => 'ADD',
        'order_create__DESC_02' => 'of this collection to',
        'order_create__DESC_03' => 'qualify for minimum order. ',
        'order_create__btn_VIEW_DETAIL' => 'VIEW DETAIL',

        'order_create__STYLE_NUMBER' => 'STYLE NUMBER:',
        'order_create__RETAIL_PRICE' => 'RETAIL PRICE:',
        'order_create__WHOLE_PRICE' => 'WHOLE PRICE:',
        'order_create__SIZE_REGION' => 'SIZE REGION:',

        'order_create__btn_REMOVE' => 'REMOVE',

        'order_create__ORDER_DETAIL' => 'ORDER DETAIL',
        'order_create__CODE_SIZE' => 'CODE/SIZE',
        'order_create__QUANTITY' => 'QUANTITY:',
        'order_create__AMOUNT' => 'AMOUNT:',

        'order_create__TOTAL_QUANTITY' => 'TOTAL QUANTITY:',
        'order_create__TOTAL_AMOUNT' => 'TOTAL AMOUNT:',

        'order_create__ORDER_SUMMARY' => 'ORDER SUMMARY',
        'order_create__PRODUCTS_COUNT' => 'PRODUCTS:',

        'order_create__btn_CHECKOUT' => 'CHECKOUT',

        'order_create__SHIPPING_ADDRESS' => 'SHIPPING ADDRESS',
        'order_create__store_TYPE' => 'STORE TYPE:',
        'order_create__store_ADDRESS' => 'STORE ADDR:',
        'order_create__store_ZIPCODE' => 'ZIP CODE:',
        'order_create__store_TELEPHONE' => 'TELEPHONE:',
        'order_create__store_SHIP_ADDRESS' => 'SHIP ADDR:',

        'order_create__payment__TITLE' => 'PAYMENT OPTIONS',
        'order_create__payment__OPTIONS__OFFLINE_PAYMENT' => 'OFFLINE PAYMENT',
        'order_create__payment__OPTIONS__OFFLINE_PAYMENT__DESC' => 'Remittance to XSHOWROOM account',
        'order_create__INSTRUCTIONS' => 'SOME INSTRUCTIONS',

        'order_create__review__TITLE' => 'REVIEW YOUR ORDER',
        'order_create__review__DESC_01' => 'When you click the "SUBMIT" button, we’ll contract with brand to acknowledging receipt your order.',
        'order_create__review__DESC_02' => 'Once the order confirmed, we will inform you. Please take an eye on order status updating.',

        'order_create__review__PAYMANET_SHIPPING' => 'PAYMENT & SHIPPING',
        'order_create__review__PAYMENT_OPTION' => 'PAYMENT OPTION',
        'order_create__review__PAYMENT_OPTION__OFFLINE_PAY' => 'OFFLINE PAY',
        'order_create__review__PAYMENT_OPTION__OFFLINE_PAY_DESC' => 'Please send your payment receipt to XSHOWROOM in order to confirm your payment.',
        'order_create__review__DELIVERY' => 'DELIVERY',
        'order_create__review__ORDER_LIST' => 'ORDER LIST',
        'order_create__review__ORDER_LIST__PRODUCT' => 'PRODUCT',
        'order_create__review__ORDER_LIST__NO' => 'STYLE NO.',
        'order_create__review__ORDER_LIST__COLOR' => 'COLOR',
        'order_create__review__ORDER_LIST__SIZE' => 'SIZE',
        'order_create__review__ORDER_LIST__TOTAL' => 'TOTAL',
        'order_create__review__ORDER_SUMMARY' => 'ORDER SUMMARY',
        'order_create__review__ORDER_SUMMARY__PRODUCTS' => 'PRODUCTS',
        'order_create__review__ORDER_SUMMARY__TOTAL_QUANTITY' => 'TOTAL QUANTITY',
        'order_create__review__ORDER_SUMMARY__TOTAL_AMOUNT' => 'TOTAL AMOUNT',

        'order_create__btn_CHANGE' => 'CHANGE',
        'order_create__btn_PREVIOUS' => 'PREVIOUS',
        'order_create__btn_NEXT' => 'NEXT',
        'order_create__btn_SUBMIT' => 'SUBMIT',
    ),
    /**
     * order_list.php
     */
    array(
        'order_list__filter_STATUS' => 'STATUS',
        'order_list__filter_ALL' => 'ALL',

        'order_list__buyer__NO_TIEM_01' => 'Order has not been found.',
        'order_list__buyer__NO_TIEM_02' => 'You can explorer brands to make order.',
        'order_list__brand__NO_TIEM_01' => 'Order has not been found.',
        'order_list__brand__NO_TIEM_02' => 'Please complete your collection and product information.',

        'order_list__LIST' => 'ORDER LIST',
        'order_list__STATUS' => 'ORDER STATUS:',
        'order_list__AMOUNT' => 'TOTAL AMOUNT:',
        'order_list__DELIVERY' => 'DELIVERY DATE:',

        'order_list__btn_VIEW' => 'VIEW DETAIL',
    ),
    /**
     * order_index.php
     */
    array(
        'order_index__info_STORE' => 'STORE NAME:',
        'order_index__info_BUYER' => 'BUYER NAME:',
        'order_index__info_SUBMITTED_DATE' => 'SUBMIT DATE:',
        'order_index__info_DELIVERY_ADDRESS' => 'SHIP ADDRESS:',
        'order_index__info_TOTAL_AMOUNT' => 'TOTAL AMOUNT:',

        'order_index__status_TITLE' => 'ORDER STATUS',

        'order_index__actions__INVOICE' => 'ATTACH INVOICE (PDF FILE)',
        'order_index__actions__INVOICE_RE_SUMBMIT' => 'CHOOSE ANOTHER',
        'order_index__actions__SHIP_NO' => 'SHIPMENT NO / ID & INFO',
        'order_index__actions__SHIP_FEE' => 'SHIPMENT FEE',
        'order_index__actions__SHIP_FEE_UNIT' => 'UNIT',
        'order_index__actions__BRAND_DESCRIPTION' => 'INFO (BOX NUM etc.)',

        'order_index__actions__btn_INVOICE_SUBMIT' => 'SUBMIT',
        'order_index__actions__btn_DEPOSITED' => 'DEPOSITED',
        'order_index__actions__btn_PREPARING' => 'PREPARING',
        'order_index__actions__btn_BALANCE_PAY' => 'REQ BALANCE',
        'order_index__actions__btn_SHIPPED' => 'SHIPPED',
        'order_index__actions__btn_COMPLETE' => 'COMPLETE',

        'order_index__actions__btn_ORDER_CONFIRM' => 'ORDER CONFIRM',

        'order_index__payment_TITLE' => 'PAYMENT INFORMATION',
        'order_index__payment_REMITTANCE' => 'REMITTANCE TO: ',
        'order_index__payment_REMITTANCE_DESC' => 'XSHOWROOM',
        'order_index__payment_BANK_NAME' => 'BANK NAME: ',
        'order_index__payment_BANK_NAME_DESC' => 'Agricultural Bank of China - Shanghai Weihai Road sub-branch',
        'order_index__payment_BANK_ACCOUTN' => 'BANK ACCOUNT: ',
        'order_index__payment_BANK_ACCOUTN_DESC' => '6228 4800 3802 1782578',
        'order_index__payment_BANK_PAYEE' => 'BANK PAYEE: ',
        'order_index__payment_BANK_PAYEE_DESC' => 'Rong Chen',
        'order_index__payment_DESC_01' => 'Please send your payment receipt to',
        'order_index__payment_DESC_02' => 'in order to confirm your payment.',

        'order_index__products_TITLE' => 'PRODUCTS IN ORDER',
        'order_index__products__STYLE_NUMBER' => 'STYLE NUMBER:',
        'order_index__products__RETAIL_PRICE' => 'RETAIL PRICE:',
        'order_index__products__WHOLE_PRICE' => 'WHOLE PRICE:',
        'order_index__products__SIZE_REGION' => 'SIZE REGION:',
        'order_index__products__CODE_SIZE' => 'CODE/SIZE',
        'order_index__products__QUANTITY' => 'QUANTITY:',
        'order_index__products__AMOUNT' => 'AMOUNT:',
        'order_index__products__TOTAL_QUANTITY' => 'TOTAL QUANTITY:',
        'order_index__products__TOTAL_AMOUNT' => 'TOTAL AMOUNT:',
    ),
    /**
     * brand_message.php.php
     */
    array(
        'user_message__MY_MESSAGES' => 'MY MESSAGES',

        'user_message__MESSAGE_DETAIL' => 'VIEW MESSAGE DETAIL',
        'user_message__RETURN_MESSAGE_CENTER' => 'RETURN MESSAGE CENTER',
        'user_message__DELETE_MESSAGE' => 'DELETE THIS MESSAGE',
        'user_message__MESSAGE_FROM_ADMIN' => 'FROM: XSHOWROOM ADMIN',

        'user_message__modal__DELETE_CONFIRM' => 'DELETE CONFIRM',
        'user_message__modal__DELETE_CONFIRM_DETAIL' => 'WILL YOU DELETE THIS MESSAGE PERMANENTLY?',
        'user_message__modal__btn_CLOSE' => 'CLOSE',
        'user_message__modal__btn_DELETE' => 'DELETE',
    ),
    /**
     * about.php
     */
    array(
        'about__TITLE' => 'ABOUT XSHOWROOM',
        'about__CONTENT' => "
            XSHOWROOM is the first online global fashion platform for wholesale
            buying in China. Through our innovative platform and intuitive technology,
            we're pioneering a wholesale evolution by making the
            process more convenient and cost effective.

            We provide this platform to allow brands and retailers to connect.
            We've put the entire wholesale transaction process online
            to enable brands and retailers to drive incremental revenue,
            cut costs, improve their customer experience and analyse
            performance through data analytics.

            XSHOWROOM is based in Shanghai with a second office in London.
        ",

        'about__FOUNDER' => 'Founder',
        'about__FOUNDER_NAME' => 'Dr. Cherie Chen',
        'about__FOUNDER_DESC' => '
            An industry expert whose experience spans the Chinese and international
            fashion markets who is committed to providing services which help designers
            grow to innovate, commercialise and bring sustainability to the brand.
            Inspired by the high demand in fashion industry to reach internationally
            and vast potential of Chinese retail market, Dr. Chen founded XSHOWROOM in 2015.
        ',

        'about__CONTACT_US' => 'CONTACT US',
        'about__CONTACT__LONDON' => 'LONDON',
        'about__CONTACT__SHANGHAI' => 'SHANGHAI',
        'about__CONTACT__TEL_01' => 't.',
        'about__CONTACT__TEL_02' => 't.',
        'about__CONTACT__ADDRESS2_01' => '503, Building E, Jia Chun Park,',
        'about__CONTACT__ADDRESS2_02' => '753 Yuyuan Road, Changning District',
        'about__CONTACT__ADDRESS2_03' => 'Shanghai, China, 200050',
        'about__CONTACT__UK' => 'UK',
        'about__CONTACT__PEOPLE_01' => 'Dr. Cherie Chen',
        'about__CONTACT__PEOPLE_POSITION_01' => 'Founder',
        'about__CONTACT__PEOPLE_02' => 'Stephy Shen',
        'about__CONTACT__PEOPLE_POSITION_02' => 'Sales Manager',

        'about__testimonials__comment_1' => 'Although we have only collaborated for two seasons, our relationship and confidence gradually strengthens as we work closely together. We are able to position brands better in the marketplace, constantly making adjustments and improvements, Exciting new brands are also discovered as work along Hopefully this can open up for development to more fashion brands. Let\'s strive for the career we love!',
        'about__testimonials__comment_2' => 'Working as buyers for a number of years in independent retail, we have worked with a number of brands and showrooms. Among them includes Project Crossover, a professional showroom platform that we collaborated with for several seasons. Whether introducing a brand, hosting a showroom exhibition or taking after season orders, the service was genuine and professional. We hope to have a long-term partnership with Project Crossover, working closely together to promote the retailer market growth. ',
        'about__testimonials__comment_3' => 'Project Crossover has created the perfect model for brand building in the territory of China. By integrating sales strategy with a strong PR department, we have received the crucial support that our label required to initially enter the market and then grow at a fast paced yet sustainable level. As one of the first multi-brand agencies in China, Project Crossover have managed to build an unrivalled network of industry buyers which combined with the new online platform XSHOWROOM will see the agency spearhead the next big development in the business of fashion.',
        'about__testimonials__comment_4' => 'Project Crossover have shown great expertise in building our brand both online and off, engaging and growing our audiences via social media and in Chinese press – we were very pleased to have the Chinese actress Tong Lia, photographed in Harpers Bazaar in Three Floor last season. In addition Project Crossover have previously held successful press days for our brand in Beijing and Shanghai – with attendees including the chief editor of Rayli Magazine and L’Officiel among others. ',
    ),
    /**
     * press.php
     */
    array(
        'press__HEAD' => 'PRESS',

        'press__TITLE_01' => '伦敦Project Crossover创始人Cherie Chen“爱上超模”',
        'press__CONTENT_01' => '爱上超模II空降伦敦Project Crossover工作室，伦敦Project Crossover创始人Cherie Chen“爱上超模。',

        'press__TITLE_02' => '昆凌助阵FABITORIA，将上海时装周推向高潮',
        'press__CONTENT_02' => '象征华丽浪漫、细腻优雅的新时尚设计师品牌FABITORIA本年度在上海时尚周上的16春夏大秀已于昨日圆满结束。',

        'press__TITLE_03' => '跨界时尚Adorn主题：邀你一起参与三地时装周系列活动',
        'press__CONTENT_03' => '在今年9月、10月伦敦、巴黎、上海三地时装周举办期间，Project Crossover和OOAK联合十一个设计师品牌，以pop up store和showroom联手的形式横跨欧亚大陆三地帮助设计师举办展览活动。',

        'press__TITLE_04' => 'Crossover PR的“媒体福利日”就是看美衣，吃马卡龙，和时尚博主聚会',
        'press__CONTENT_04' => 'Crossover PR于2015年5月29日，6月5日分别在上海 Project Crossover Showroom（洛克菲勒公馆），北京Pansi Palace成功举办设计师品牌Three Floor、Fabitoria和Forever Unique 的2015秋冬系列新品媒体预览会。',

        'press__btn_CONTINUE' => 'CONTINUE READING ...'
    ),
    /**
     * career.php
     */
    array(
        'career__TITLE' => 'JOIN OUR TEAM',

        'career__SUB_TITLE' => 'Make Work Matter',
        'career__CONTENT_01' =>
            'We\'re a rapidly expanding organisation with plenty of room
            for brilliant, like-minded people.
			 We’re all about helping thousands of businesses around the world
			 grow by putting the wholesale buying process online.',
        'career__CONTENT_02' =>
            'We offer a truly inspiring workplace for new ideas, new expressions and
			personal development. If you’d like to work as part of a growing team
			focused on pushing boundaries, send us a copy of your C.V and
			covering letter to:',

        'career__BENIFITS_TITLE' => 'BENEFITS OF WORKING WITH XSHOWROOM',
        'career__BENIFITS_01' => 'CREATIVE ENVIRONMENT',
        'career__BENIFITS_01_DESC' => 'We empower our teams to find creative solutions to difficult problems.',
        'career__BENIFITS_02' => 'CENTRAL LOCATION',
        'career__BENIFITS_02_DESC' => 'Great office in a central Shanghai location.',
        'career__BENIFITS_03' => 'PASSIONATE PEOPLE',
        'career__BENIFITS_03_DESC' => 'Our team works closely together and are committed to providing help whenever a problem arises.',
        'career__BENIFITS_04' => 'HIGH PROFILE EVENT ACCESS',
        'career__BENIFITS_04_DESC' => 'Access and exposure to fashion events.',

        'career__OPPORTUNITITY_TITLE' => 'CURRENT OPPORTUNITIES',
        'career__job_location_SH' => 'Shanghai',
        'career__job_location_POST' => 'POST',
        'career__job_type_FULLTIME' => 'FULL TIME',

        'career_jd_01' => "
            We are looking for highly motivated individual to provide artwork internally to generate all the graphics needed for proposals, communication tools and promotional material.

            Responsibilities
            - Provide graphic design for companies and customers, edit graphic visual and network information, including print, digital or video content
            - Provide graphic design for new e-commerce platform,  propose effective recommendations for achieving a good user experience
            - Provide ideas and suggestions for e-commerce site activities
            - Artistic creations
            - Provide required design for our internal, external website to make recommendations and modifications
            - HTML, CSS, Java knowledge, create, modify, e-marketing mail campaign
            - Proficient in Adobe family of software
            - Video production capabilities is plus

            Qualifications and experience
            - With 5 years experience in graphic design and web design (please send various forms of works for reference)
            - University degree or equivalent
            - Proficient in Adobe Design Tools
            - With HTML, java, CSS coding knowledge
            - Proficiency in Chinese and English
            - Able to adapt to the rhythm of urgent work
            - Good to interact, communicate and actively express thoughts
            - It can adapt to the complex, professional work environment
            - Open-minded, good to meet the challenges, good team spirit
        ",
        'career_jd_02' => "
            We are looking for highly motivated individual to join our sales team.

            - Undertake sales tasks to complete the annual sales target.
            - Responsible for liaising with brands for information (collection order information / regularly updated brand information / sales feedback, etc.)
            - Responsible for sales contracts and other sales documents and materials management, sorting, filing.
            - Assist sales manager for business development and buyers' relationship maintenance. Responsible for gathering buyer's information, enhance team's communication and understanding of business partners.
            - Assist sales manager of market information collection and assist the sales team to maintain market balance and protect business partners' interests.
        "
    ),
    /**
     * customer_support.php
     */
    array(
        'customer_banner_TITLE' => 'CUSTOMER SUPPORT',
        'customer_banner_TEL' => '+44 7419284524',
        'customer_FAQ' => 'FAQ',
    ),
    /**
     * discovery.php
     */
    array(
        'discovery_banner_TITLE' => 'JOIN THE ROUND THE CLOCK FASHION WEEK',

        'discovery__SUB_TITLE_01' => 'JOIN OUR EXCLUSIVE & CURATED NETWORK',
        'discovery__SUB_DESC_01' => '
            Our selection of brands and buyers are carefully selected.
            A selection thought for the edgiest multilabel stores, department stores and buying offices.
            By private invitation or application only.
        ',

        'discovery__SUB_TITLE_02' => 'REDUCE COSTS',
        'discovery__SUB_DESC_02' => '
            Optimize your fashion weeks and visits to tradeshows and showrooms.
            Free for buyers & partners of Project Crossover
        ',

        'discovery__SUB_TITLE_03' => 'EXPERIENCE GLOBAL B2B E-COMMERCE',
        'discovery__SUB_DESC_03' => '
            24/7 ordering from online showroom.
            Eliminate paper, browse digital line sheets and also receive, track and export orders.
            Price lists per region, with support for multiple currencies.
            Ready for global teams: assign agents per country.
            JOIN THE ROUND THE CLOCK FASHION WEEK
        ',
    ),
    /**
     * others
     */
    array(
        'other__invite__TITLE' => 'XSHOWROOM IS INVITATION ONLY',
        'other__invite__HINT' => 'PLEASE ENTER YOUR INVITATION CODE TO START REGISTRATION',
        'other__invite__btn_BACK' => 'BACK TO HOME PAGE',
        'other__invite__btn_CONTINUE' => 'START REGISTRATION',
        'other__invite__error_INFO' => 'WRONG INVITATION CODE',
        'other__invite__APPLY_01' => 'PLEASE CONTACT',
        'other__invite__APPLY_02' => 'TO APPLY FOR INVITATION CODE',

        'other__404_MSG' => 'PAGE NOT EXIST',
        'other__404_DESC_01' => 'We will redirect you to XSHOWROOM HOME in',
        'other__404_DESC_02' => 'seconds',
        'other__404_DESC_03' => 'If your browser is no response, please',
        'other__404_DESC_04' => 'CLICK HERE',
    )
);