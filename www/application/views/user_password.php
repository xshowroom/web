<!DOCTYPE html>
<html ng-app="xShowroom.user.password">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/password.css" />
	<script type="text/javascript" src="/static/app/modules/user_password.js"></script>
</head>
<body ng-controller="UserPasswordCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<?php if($user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'profile', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'profile', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>
	<section class="row password">
        <div class="container">
            <!-- left nav -->
            <?php echo View::factory('common/global_navigation_user_center', array('currentPage' =>  'password')); ?>

            <div class="col-md-10">
                <h2><?=__("password__TITLE")?></h2>
                <div class="row">
                    <form class="col-md-4">
                        <div class="form-group">
                            <div class="">
                                <input type="text" class="form-control" id="passOld" ng-model="user.passOld" placeholder='<?= __("password__OLD");?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <input type="text" class="form-control" id="passOld" ng-model="user.passOld" placeholder='<?= __("password__NEW_1");?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <input type="text" class="form-control" id="passOld" ng-model="user.passOld" placeholder='<?= __("password__NEW_2");?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="form-control btn  btn-type-2"><?= __("password__btn_UPDATE");?></a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>