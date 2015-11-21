<!DOCTYPE html>
<html ng-app="xShowroom.home">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/nivoslider/nivo-slider.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/nivoslider/themes/bar/bar.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/home.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/nivoslider/jquery.nivo.slider.pack.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/home.js"></script>
	<script>
		$(document).ready(function(){
			$('#home-banner').nivoSlider({
			    effect: 'random',                 // Specify sets like: 'fold,fade,sliceDown'
			    slices: 15,                     // For slice animations
			    boxCols: 8,                     // For box animations
			    boxRows: 4,                     // For box animations
			    animSpeed: 500,                 // Slide transition speed
			    pauseTime: 3000,                 // How long each slide will show
			    startSlide: 0,                     // Set starting Slide (0 index)
			    directionNav: false,             // Next & Prev navigation
			    controlNav: true,                 // 1,2,3... navigation
			    controlNavThumbs: false,         // Use thumbnails for Control Nav
			    pauseOnHover: true,             // Stop animation while hovering
			    manualAdvance: false,             // Force manual transitions
			    prevText: 'Prev',                 // Prev directionNav text
			    nextText: 'Next',                 // Next directionNav text
			    randomStart: false             // Start on a random slide
			});
		})
	</script>
</head>
<body ng-controller="HomeCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation"  id="home-page-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'home')); ?>
	</nav>
	<section class="row no-vertical-padding home-banner">
		<div class="container-fluid banner-content">
			<div id="home-banner" class="nivoSlider">
				<img src="/static/app/images/home-banner-1.jpg" alt="home-banner-1.jpg" title="#banner-content-1"/>
				<img src="/static/app/images/home-banner-2.jpg" alt="home-banner-2.jpg" title="#banner-content-2"/>
				<img src="/static/app/images/home-banner-3.jpg" alt="home-banner-3.jpg" title="#banner-content-3"/>
                <img src="/static/app/images/home-banner-4.jpg" alt="home-banner-4.jpg" title="#banner-content-4"/>
                <img src="/static/app/images/home-banner-5.jpg" alt="home-banner-5.jpg" title="#banner-content-5"/>

			</div>
			<div id="banner-content-1" class="nivo-html-caption">
			    <h2>FINLAY & CO</h2>
			    <p>SPRING SUMMER 2015</p>
			    <div>
					<a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
					<a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
				</div>
			</div>
			<div id="banner-content-2" class="nivo-html-caption">
			    <h2>Hello World</h2>
			    <p>This is a test text</p>
			    <div>
					<a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
					<a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
				</div>
			</div>
			<div id="banner-content-3" class="nivo-html-caption">
			    <h2>YOUR BRAND</h2>
			    <p>YOUR COLLECTION </p>
			    <div>
					<a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
					<a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
				</div>
			</div>
            <div id="banner-content-4" class="nivo-html-caption">
                <h2>YOUR BRAND</h2>
                <p>YOUR COLLECTION </p>
                <div>
                    <a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
                    <a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
                </div>
            </div>
            <div id="banner-content-5" class="nivo-html-caption">
                <h2>YOUR BRAND</h2>
                <p>YOUR COLLECTION </p>
                <div>
                    <a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
                    <a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
                </div>
            </div>
		</div>
	</section>
	<section class="row">
		<div class="container home-kpi text-center">
			<div class="row">
				<h1 class="col-xs-12">X SHOWROOM</h1>
				<p class="col-xs-12"><?=__("home__XSHOWROOM_DESC")?></p>
			</div>
			<div class="row">
				<div class="col-xs-3 kpi-item">
					<div class="kpi-number">1214</div>
					<div class="kpi-name"><?=__("home__XSHOWROOM_BUYER_COUNT")?></div>
				</div>
				<div class="col-xs-3 kpi-item">
					<div class="kpi-number">121</div>
					<div class="kpi-name"><?=__("home__XSHOWROOM_BRANDS_COUNT")?></div>
				</div>
				<div class="col-xs-3 kpi-item">
					<div class="kpi-number">3571</div>
					<div class="kpi-name"><?=__("home__XSHOWROOM_PRODUCTS_COUNT")?></div>
				</div>
				<div class="col-xs-3 kpi-item">
					<div class="kpi-number">52291</div>
					<div class="kpi-name"><?=__("home__XSHOWROOM_ORDERS_COUNT")?></div>
				</div>
			</div>
		</div>
	</section>
	<section class="row no-vertical-padding">
		<div class="container-fluid home-introduction">
			<div class="row">
				<div class="col-xs-offset-1 col-xs-5 text-center introduction-item">
					<h3>
						<img src="/static/app/images/common-icon-star.png"/>
						<span><?=__("home__BRANDS")?></span>
					</h3>
					<p><?=__("home__BRANDS_DESC")?></p>
					<div>
						<a href="/guide#/brand" class="btn btn-type-1"><?=__("home__btn_SOLUTION")?></a>
						<a class="btn btn-type-1" href="/register/brand" target="_self"><?=__( "home__btn_REGISTER")?></a>
					</div>
				</div>
				<div class="col-xs-6 introduction-item introduction-image">
					<img src="/static/app/images/home-introduction-image-1.png"/>
				</div>
			</div>
			<div class="row"> 
				<div class="col-xs-6 introduction-item introduction-image">
					<img src="/static/app/images/home-introduction-image-2.png"/>
				</div>
				<div class="col-xs-5 text-center introduction-item">
					<h3>
						<img src="/static/app/images/common-icon-gift.png"/>
						<span><?=__("home__BUYERS")?></span>
					</h3>
					<p><?=__("home__BUYERS_DESC")?></p>
					<div>
						<a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__btn_SOLUTION")?></a>
						<a class="btn btn-type-1" href="/register/buyer" target="_self"><?=__("home__btn_REGISTER")?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row no-vertical-padding">
		<div class="container-fluid home-showcase">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3><?=__("home__HOT_BRANDS")?></h3>
					<p><?=__("home__BRAND_PROFILES")?></p>
				</div>
			</div>
			<div class="row"> 
				<div class="col-xs-3 showcase-item">
					<div class="showcase-image">
						<img src="/static/app/images/home-hot-brands-1.png"/>
					</div>
					<div class="showcase-name">PAPER LONDON</div>
					<div class="showcase-collection"><?=__("home__SSI5_COLLECTION")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<div class="showcase-image">
						<img src="/static/app/images/home-hot-brands-2.png"/>
					</div>
					<div class="showcase-name">MAYA MAYAGAL</div>
					<div class="showcase-collection"><?=__("home__SSI5_COLLECTION")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<div class="showcase-image">
						<img src="/static/app/images/home-hot-brands-3.png"/>
					</div>
					<div class="showcase-name">PPQ</div>
					<div class="showcase-collection"><?=__("home__SSI5_COLLECTION")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<div class="showcase-image">
						<img src="/static/app/images/home-hot-brands-4.png"/>
					</div>
					<div class="showcase-name">MUUBAA</div>
					<div class="showcase-collection"><?=__("home__SSI5_COLLECTION")?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3><?=__("home__TESTOMONIALS")?></h3>
					<p><?=__("home__FEATURED")?></p>
				</div>
			</div>
			<div class="row"> 
				<div class="col-xs-3 showcase-item">
					<div class="showcase-image">
						<img src="/static/app/images/home-testomonial-1.png"/>
					</div>
					<div class="showcase-name">LILA SIMPSON</div>
					<div class="showcase-identity"><?=__("home__people_BUYER")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<div class="showcase-image">
						<img src="/static/app/images/home-testomonial-2.png"/>
					</div>
					<div class="showcase-name">JOHNSON SMITH</div>
					<div class="showcase-identity"><?=__("home__people_BUYER")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<div class="showcase-image">
						<img src="/static/app/images/home-testomonial-3.png"/>
					</div>
					<div class="showcase-name">BARNET MOLLY</div>
					<div class="showcase-identity"><?=__("home__people_DESIGNER")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<div class="showcase-image">
						<img src="/static/app/images/home-testomonial-4.png"/>
					</div>
					<div class="showcase-name">JUDY WINTER</div>
					<div class="showcase-identity"><?=__("home__people_BUYER")?></div>
				</div>
			</div>
		</div>
	</section>
	<section class="row home-subscribe">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<div><span class="glyphicon glyphicon-envelope"></span></div>
					<h3>SUBSCRIBE</h3>
					<p>Set the latest news & updates from X Showroom</p>
					<div class="subscribe-submit">
						<input class="form-control" type="text" placeholder="YOUR EMAIL ADDRESS"/>
						<button class="btn btn-type-2">SUBSCRIBE</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>