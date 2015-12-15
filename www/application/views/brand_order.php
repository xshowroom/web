<!DOCTYPE html>
<html  ng-app="xShowroom.brand.dashboard">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<script type="text/javascript" src="/static/app/modules/brand_dashboard.js"></script>
</head>
<body ng-controller="BrandDashboardCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
        	array('currentPage' =>  'order', 'userAttr'=> $userAttr)); 
       	?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row" style="min-height:300px;">
				<h1 class="text-center">Personal Order Is Coming Soon!</h1>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>