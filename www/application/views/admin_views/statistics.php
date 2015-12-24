<!DOCTYPE html>
<html ng-app="xShowroom.admin">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/admin.css" />
	<script type="text/javascript" src="/static/app/modules/admin_stat_mgr.js"></script>
</head>
<body ng-controller="AdminStatCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('admin_views/admin_setting_with_login', array('user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation" id="home-page-navigation">
        <?php echo View::factory('admin_views/admin_navigation_top_login', array('currentPage' => 'statistics')); ?>
	</nav>
	<section class="row admin-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<article class="left-box text-left statistics-left-box">
						<h2>TOTAL BRAND</h2>
						<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?=$brand_count?></p>
						<h2>TOTAL BUYER</h2>
						<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?=$buyer_count?></p>
						<h2>TOTAL USERS</h2>
						<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?=$all_user_count?></p>
						<h2>TOTAL ORDERS</h2>
						<p><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>2462</p>
					</article>
				</div>
				<div class="col-xs-9">
					<article class="text-left">
						<h2>STATISTICS FOR XSHOWROOM</h2>
						<div>

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