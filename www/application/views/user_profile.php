<!DOCTYPE html>
<html ng-app="xShowroom.user.profile">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/profile.css" />
	<script type="text/javascript" src="/static/app/modules/user_profile.js"></script>
</head>
<body ng-controller="UserProfileCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<?php if($user["role_type"] == Business_User::ROLE_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'profile', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Business_User::ROLE_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'profile', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>
	<section class="row profile">
        <div class="container">
            <!-- left nav -->
            <?php echo View::factory('common/global_navigation_user_center', array('currentPage' =>  'profile')); ?>

            <div class="col-md-10">
                <?php echo View::factory(
                    'templates/t_user_profile',
                    array('user' => $user, 'userAttr' => $userAttr, 'brandInfo'=> $brandInfo, 'buyerInfo'=> $buyerInfo));
                ?>
            </div>
        </div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>