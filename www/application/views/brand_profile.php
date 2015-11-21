<!DOCTYPE html>
<html ng-app="xShowroom.user.profile">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/profile.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/brand_profile.js"></script>
</head>
<body ng-controller="BrandDashboardCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
        	array('currentPage' => '', 'userAttr'=> $userAttr));
       	?>
	</nav>
	<section class="row profile">
        <div class="container">
            <div class="col-md-10 container profile-content">

                <h2>BASIC INFO</h2>
                <div class="form-line">
                    <div class="form-group">
                        <label class="lb_item_name">EMAIL</label>
                        <label class="lb_item_field"><?= $user['email'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">FIRST_NAME</label>
                        <label class="lb_item_field"><?= $userAttr['first_name'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">LAST_NAME</label>
                        <label class="lb_item_field"><?= $userAttr['last_name'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">DISPLAY_NAME</label>
                        <label class="lb_item_field"><?= $userAttr['display_name'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">TELEPHONE</label>
                        <label class="lb_item_field"><?= $userAttr['telephone'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">MOBILE</label>
                        <label class="lb_item_field"><?= empty($userAttr['mobile']) ? "(N/A)" : $userAttr['mobile'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">REGISTER_DATE</label>
                        <label class="lb_item_field"><?= date('Y-m-d',strtotime($user['register_date'])) ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">LAST_LOGIN_TIME</label>
                        <label class="lb_item_field"><?= $user['last_login_time'] ? "(N/A)" : $user['last_login_time'] ?></label>
                    </div>
                </div>

                <h2>BRAND INFO</h2>
                <div class="form-line">
                    <div class="form-group">
                        <label class="lb_item_name">BRAND_NAME</label>
                        <label class="lb_item_field"><?= $brandInfo['brand_name'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">DESIGNER_NAME</label>
                        <label class="lb_item_field"><?= $brandInfo['designer_name'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">BRAND_URL</label>
                        <label class="lb_item_field"><?= $brandInfo['brand_url'] ?></label>
                    </div>
                    <div class="form-group">
                        <img src="<?= URL::site($brandInfo['brand_image']) ?>"/>
                    </div>
                </div>

                <h2>COMPANY INFO</h2>
                <div class="form-line">
                    <div class="form-group">
                        <label class="lb_item_name">COMPANY_NAME</label>
                        <label class="lb_item_field"><?= $userAttr['company_name'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">COMPANY_ADDRESS</label>
                        <label class="lb_item_field"><?= $userAttr['company_address'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">COMPANY_COUNTRY</label>
                        <label class="lb_item_field"><?= $userAttr['company_country'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">COMPANY_ZIP</label>
                        <label class="lb_item_field"><?= $userAttr['company_zip'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">COMPANY_TELEPHONE</label>
                        <label class="lb_item_field"><?= $userAttr['company_telephone'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">COMPANY_WEB_URL</label>
                        <label class="lb_item_field"><?= $userAttr['company_web_url'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="lb_item_name">COMPANY_ZIP</label>
                        <label class="lb_item_field"><?= $userAttr['company_zip'] ?></label>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>