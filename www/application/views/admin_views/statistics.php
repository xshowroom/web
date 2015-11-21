<!DOCTYPE html>
<html ng-app="xShowroom.login">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/admin.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
</head>
<body ng-controller="LoginCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('admin_views/admin_setting_with_login', array('user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation"  id="home-page-navigation">
        <?php echo View::factory('admin_views/admin_navigation_top_login', array('currentPage' => 'statistics')); ?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<article class="left-box text-left">
						<h2> REGISTER USER</h2>
						<p>642</p>
						<h2> REGISTER BRAND</h2>
						<p>45</p>
						<h2> REGISTER BUYER</h2>
						<p>521</p>
						<h2> TOTAL ORDER</h2>
						<p>2462</p>
					</article>
				</div>
				<div class="col-xs-9">
					<article class="text-left">
						<div>
							<h2>please take actions:</h2>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>