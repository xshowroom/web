<!DOCTYPE html>
<html ng-app="xShowroom.about">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/about.css" />
	<script type="text/javascript" src="/static/app/modules/about.js"></script>
</head>
<body ng-controller="AboutCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'about')); ?>
	</nav>
	<section class="row about-banner">
		<div class="container">
			<div class="row">
                <div class="col-xs-8 col-xs-offset-2 banner-mask">
                	<h2><?=__('about__TITLE');?></h2>
					<p><?=__('about__CONTENT');?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<section class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<img src="/static/app/images/founder-photo.png" class="founder-photo">
				</div>
				<div class="col-xs-8 col-xs-offset-1 founder-info">
					<h3><?=__('about__FOUNDER');?></h3>
					<h4><?=__('about__FOUNDER_NAME');?></h4>
					<p><?=__('about__FOUNDER_DESC');?></p>
				</div>
			</div>
		</div>
	</section>
	
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>