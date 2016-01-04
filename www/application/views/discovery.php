<!DOCTYPE html>
<html ng-app="xShowroom.discovery">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/discovery.css" />
	<script type="text/javascript" src="/static/app/modules/discovery.js"></script>
</head>
<body ng-controller="DiscoveryCtrl" class="container-fluid discovery">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'discovery')); ?>
	</nav>
	<section class="row discovery-banner">
		<div class="container">
			<div class="row">
                <div class="col-xs-8 col-xs-offset-2 banner-mask">
                	<h2>JOIN THE ROUND THE<br>CLOCK FASHION WEEK</h2>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<section class="row discovery-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-7">
					<div class="discovery-section-icon"></div>
					<h3>JOIN OUR EXCLUSIVE<br/>& CURATED NETWORK</h3>
					<p>Optimize your fashion weeks and visits to tradeshows and showrooms.<br/>Free for buyers & partners of Project Crossover.</p>
				</div>
				<div class="col-xs-5 text-center">
					<img src="/static/app/images/discovery-section-1.png">
				</div>
			</div>
		</div>
	</section>
	<section class="row discovery-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-7">
					<div class="discovery-section-icon"></div>
					<h3>REDUCE COST</h3>
					<p>Optimize your fashion weeks and visits to tradeshows and showrooms.<br/>Free for buyers & partners of Project Crossover.</p>
				</div>
				<div class="col-xs-5 text-center">
					<img src="/static/app/images/discovery-section-2.png">
				</div>
			</div>
		</div>
	</section>
	<section class="row discovery-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-7">
					<div class="discovery-section-icon"></div>
					<h3>EXPERIENCE GLOBAL B2B E-COMMERCE</h3>
					<p>Optimize your fashion weeks and visits to tradeshows and showrooms.<br/>Free for buyers & partners of Project Crossover.</p>
				</div>
				<div class="col-xs-5 text-center">
					<img src="/static/app/images/discovery-section-3.png">
				</div>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>