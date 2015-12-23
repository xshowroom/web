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
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'guide')); ?>
	</nav>
	<section class="row about-banner">
		<div class="container">
			<div class="row">
                <div class="col-xs-8 col-xs-offset-2 banner-mask">
                	<h2>ABOUT XSHOWROOM</h2>
					<p>XSHOWROOM is the first online global fashion platform for wholesale 
						buying in China. Through our innovative platform and intuitive technology, 
						we're pioneering a wholesale evolution by making the 
						process more convinient and cost effective.
						
						We provide this platform to allow brands and retailers to connect. 
						We've put the entire wholesale transaction process online 
						to enable brands and retailers to drive incremental revenue, 
						cut costs, improve their customer experience and analyse 
						performance through data analytics.
						
						XSHOWROOM is based in Shanghai with a second office in London.
					</p>
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
					<h3>Founder</h3>
					<h4>Dr. Cherie Chen</h4>
					<p>An industry expert whose experience spans the Chinese and international 
					fashion markets who is committed to providing services which help designers 
					grow to innovate, commercialise and bring sustainability to the brand. 
					Inspired by the high demand in fashion industry to reach internationally 
					and vast potential of Chinese retail market, Dr. Chen founded XSHOWROOM in 2015.</p>
				</div>
			</div>
		</div>
	</section>
	
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>