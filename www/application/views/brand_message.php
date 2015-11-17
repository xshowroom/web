<!DOCTYPE html>
<html  ng-app="xShowroom.brand.dashboard">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/brand_dashboard.js"></script>
</head>
<body ng-controller="BrandDashboardCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
        	array('currentPage' =>  'dashboard', 'userAttr'=> $userAttr)); 
       	?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row" style="min-height:300px;">
				<h1 class="text-center">Personal Message Is Coming Soon!</h1>
				<h2 class="text-center">Email Address: <?= $user['email'] ?></h2>
				<h2 class="text-center">Display Name: <?= $userAttr['display_name'] ?></h2>
				<?php var_dump($user); ?>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>