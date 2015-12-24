<!DOCTYPE html>
<html ng-app="xShowroom.admin">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/admin.css" />
	<script type="text/javascript" src="/static/app/modules/admin_order_mgr.js"></script>
</head>
<body ng-controller="AdminOrderMgrCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('admin_views/admin_setting_with_login', array('user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation" id="home-page-navigation">
        <?php echo View::factory('admin_views/admin_navigation_top_login', array('currentPage' => 'orders')); ?>
	</nav>
	<section class="row admin-content">
		<div class="container">
			<div class="row">
				Order manager
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>