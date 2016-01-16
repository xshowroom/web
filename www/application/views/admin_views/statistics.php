<!DOCTYPE html>
<html ng-app="xShowroom.admin">
<head>
	<meta charset="UTF-8" >
	<title><?=SITE_TITLE_PROFIX?> </title>
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
					<article class="text-left statistics-left-box">
						<h2>TOTAL BRAND</h2>
						<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?=$brand_count?></p>
						<h2>TOTAL BUYER</h2>
						<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?=$buyer_count?></p>
						<h2>TOTAL USERS</h2>
						<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?=$all_user_count?></p>
						<h2>TOTAL ORDERS</h2>
						<p><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><?=$order_count?></p>
					</article>
				</div>
				<div class="col-xs-9">
					<article class="text-left statistics-right-box">
						<h2>ADMIN MANAGEMENT FOR XSHOWROOM</h2>
						<div class="row">
							<h4 class="col-xs-12">SITE STATISTICS</h4>
							<span class="col-xs-3">百度统计</span>
							<a class="col-xs-9" target="_blank" href="http://tongji.baidu.com">http://tongji.baidu.com</a>

							<h4 class="col-xs-12">WEB CRAWLER</h4>
							<span class="col-xs-3">百度搜索网站登录口</span>
							<a class="col-xs-9" target="_blank" href="http://www.baidu.com/search/url_submit.html">http://www.baidu.com/search/url_submit.html</a>
							<span class="col-xs-3">Google网站登录口</span>
							<a class="col-xs-9" target="_blank" href="https://www.google.com/webmasters/tools/submit-url">https://www.google.com/webmasters/tools/submit-url</a>
							<span class="col-xs-3">Bing(必应)网页提交登录入口</span>
							<a class="col-xs-9" target="_blank" href="http://www.bing.com/toolbox/submit-site-url">http://www.bing.com/toolbox/submit-site-url</a>
							<span class="col-xs-3">搜狗网站收录提交入口</span>
							<a class="col-xs-9" target="_blank" href="http://www.sogou.com/feedback/urlfeedback.php">http://www.sogou.com/feedback/urlfeedback.php</a>
							<span class="col-xs-3">360搜索引擎登录入口</span>
							<a class="col-xs-9" target="_blank" href="http://info.so.360.cn/site_submit.html">http://info.so.360.cn/site_submit.html</a>

							<h4 class="col-xs-12">SITE ADMIN TOOLS</h4>
							<span class="col-xs-3">Google网站管理员工具</span>
							<a class="col-xs-9" target="_blank" href="http://www.google.com/webmasters/">http://www.google.com/webmasters</a>
							<span class="col-xs-3">微软Bing管理员工具</span>
							<a class="col-xs-9" target="_blank" href="http://www.bing.com/toolbox/webmaster/">http://www.bing.com/toolbox/webmaster</a>
							<span class="col-xs-3">百度站长平台</span>
							<a class="col-xs-9" target="_blank" href="http://zhanzhang.baidu.com/">http://zhanzhang.baidu.com</a>
							<span class="col-xs-3">360搜索站长平台</span>
							<a class="col-xs-9" target="_blank" href="http://zhanzhang.so.com/">http://zhanzhang.so.com</a>
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