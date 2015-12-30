<!DOCTYPE html>
<html ng-app="xShowroom.home">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/bower_components/nivoslider/nivo-slider.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/nivoslider/themes/bar/bar.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/home.css" />
	<script type="text/javascript" src="/static/bower_components/nivoslider/jquery.nivo.slider.pack.js"></script>
	<script type="text/javascript" src="/static/bower_components/others/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/others/jquery.waypoints.min.js"></script>
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

			function counter_number(variable) {
				if($(variable).length) {
					$(variable).waypoint(function() {
						$({countNum: $(variable).text()}).animate({countNum: $(variable).attr('data-counter')}, {
							duration: 2000,
							easing:'linear',
							step: function() {
								$(variable).text(Math.floor(this.countNum));
							},
							complete: function() {
								$(variable).text(this.countNum);
							}
						});
					}, {
						triggerOnce: true,
						offset: 'bottom-in-view'
					});
				}
			}
			counter_number('.counter-1');
			counter_number('.counter-2');
			counter_number('.counter-3');
			counter_number('.counter-4');
		});
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
				<img src="/static/app/images/home-banner/4.FABITORIA --SS16 MUSEUM.jpg" title="#banner-content-1"/>
				<img src="/static/app/images/home-banner/7.FOREVER UNIQUE -- SS16 MOROCCAN AFFAIR.jpg" title="#banner-content-2"/>
				<img src="/static/app/images/home-banner/10.MING -- SS16  ONCE THERE WAS.jpg" title="#banner-content-3"/>
                <img src="/static/app/images/home-banner/14.YUZZO LONDON --SS16 COLLECTION.jpg" title="#banner-content-4"/>
			</div>
			<div id="banner-content-1" class="nivo-html-caption">
			    <h2>FABITORIA</h2>
			    <p>SS16 MUSEUM</p>
			    <div>
					<a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
					<a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
				</div>
			</div>
			<div id="banner-content-2" class="nivo-html-caption">
			    <h2>FOREVER UNIQUE</h2>
			    <p>SS16 MOROCCAN AFFAIR</p>
			    <div>
					<a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
					<a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
				</div>
			</div>
			<div id="banner-content-3" class="nivo-html-caption">
			    <h2>MING</h2>
			    <p>SS16  ONCE THERE WAS</p>
			    <div>
					<a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
					<a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
				</div>
			</div>
            <div id="banner-content-4" class="nivo-html-caption">
                <h2>YUZZO LONDON</h2>
                <p>SS16 COLLECTION</p>
                <div>
                    <a href="/guide#/retailer" class="btn btn-type-1"><?=__("home__LEARN_MORE")?></a>
                    <a class="btn btn-type-2"><?=__("home__CONTRACT_US")?></a>
                </div>
            </div>
		</div>
	</section>
	<section class="row">
		<div class="container home-kpi text-center" ng-cloak>
			<div class="row">
				<h1 class="col-xs-12">X SHOWROOM</h1>
				<p class="col-xs-12"><?=__("home__XSHOWROOM_DESC")?></p>
			</div>
			<div class="row">
				<div class="col-xs-3 kpi-item">
					<div class="kpi-number counter-1" data-counter="{{counter.buyer}}">{{tempCounter.buyer}}</div>
					<div class="kpi-name"><?=__("home__XSHOWROOM_BUYER_COUNT")?></div>
				</div>
				<div class="col-xs-3 kpi-item">
					<div class="kpi-number counter-2" data-counter="{{counter.brand}}">{{tempCounter.brand}}</div>
					<div class="kpi-name"><?=__("home__XSHOWROOM_BRANDS_COUNT")?></div>
				</div>
				<div class="col-xs-3 kpi-item">
					<div class="kpi-number counter-3" data-counter="{{counter.product}}">{{tempCounter.product}}</div>
					<div class="kpi-name"><?=__("home__XSHOWROOM_PRODUCTS_COUNT")?></div>
				</div>
				<div class="col-xs-3 kpi-item">
					<div class="kpi-number counter-4" data-counter="{{counter.order}}">{{tempCounter.order}}</div>
					<div class="kpi-name"><?=__("home__XSHOWROOM_ORDERS_COUNT")?></div>
				</div>
			</div>
		</div>
	</section>
	<section class="row no-vertical-padding">
		<div class="container-fluid home-introduction">
			<div class="row">
				<div class="col-xs-7">
					<div class="col-xs-12 brand-introduction introduction-item">
						<div class="introduction-content">
							<h3>
								<span><?=__("home__BRANDS")?></span>
							</h3>
							<p><?=__("home__BRANDS_DESC")?></p>
							<div>
								<a href="<?=URL::site('guide#/brand');?>" class="btn btn-type-1"><?=__("home__btn_VIEW_MORE")?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-5">
					<div class="col-xs-12 buyer-introduction introduction-item">
						<div class="introduction-content">
							<h3>
								<span><?=__("home__BUYERS")?></span>
							</h3>
							<p><?=__("home__BUYERS_DESC")?></p>
							<div>
								<a href="<?=URL::site('guide#/buyer');?>" class="btn btn-type-1"><?=__("home__btn_VIEW_MORE")?></a>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<a href="<?=URL::site('register/brand');?>" class="register-link brand-register-link">
							<h4><?=__("home__BRANDS")?></h4>
							<div>
								<img src="/static/app/images/common-icon-star-white.png"/>
								<span><?=__("home__btn_REGISTER")?></span>
							</div>
							<p><?=__("home__BRANDS_DESC")?></p>
						</a>
					</div>
					<div class="col-xs-6">
						<a href="<?=URL::site('register/buyer');?>" class="register-link buyer-register-link">
							<h4><?=__("home__BUYERS")?></h4>
							<div>
								<img src="/static/app/images/common-icon-gift-white.png"/>
								<span><?=__("home__btn_REGISTER")?></span>
							</div>
							<p><?=__("home__BUYERS_DESC")?></p>
						</a>
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
					<a class="showcase-image image-link" href="<?=URL::site('brands/THREEFLOOR')?>">
						<img src="/static/app/images/home-banner/home-hot-brands-1.jpg"/>
					</a>
					<div class="showcase-name">THREE FLOOR</div>
					<div class="showcase-collection"><?=__("home__SSI5_COLLECTION")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<a class="showcase-image image-link" href="<?=URL::site('brands/FABITORIA')?>">
						<img src="/static/app/images/home-banner/home-hot-brands-2.jpg"/>
					</a>
					<div class="showcase-name">FABITORIA</div>
					<div class="showcase-collection"><?=__("home__SSI5_COLLECTION")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<a class="showcase-image image-link" href="<?=URL::site('brands/SUNCOO')?>">
						<img src="/static/app/images/home-banner/home-hot-brands-3.jpg"/>
					</a>
					<div class="showcase-name">SUNCOO</div>
					<div class="showcase-collection"><?=__("home__SSI5_COLLECTION")?></div>
				</div>
				<div class="col-xs-3 showcase-item">
					<a class="showcase-image image-link" href="<?=URL::site('brands/FOREVERUNIQUE')?>">
						<img src="/static/app/images/home-banner/home-hot-brands-4.jpg"/>
					</a>
					<div class="showcase-name">FOREVER UNIQUE</div>
					<div class="showcase-collection"><?=__("home__SSI5_COLLECTION")?></div>
				</div>
			</div>
		</div>
	</section>
	<section class="row no-vertical-padding">
		<div class="container-fluid home-showcase">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3><?=__("home__TESTIMONIALS")?></h3>
					<p><?=__("home__FEATURED")?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-1 showcase-testimonials">
					<div class="media">
						<div class="media-left">
							<img src="/static/app/images/TESTIMONIALS_1.png">
						</div>
						<div class="media-body showcase-testimonials-people">
							<h4 class="media-heading">PLAY LOUNGE</h4>
							<div>Iris: <?=__("home__people_BUYER")?></div>
						</div>
					</div>
					<div class="showcase-testimonials-comment">
						<i class="fa fa-quote-left"></i>
						<p><?=__("home__testimonials__comment_1");?><i class="fa fa-quote-right"></i></p>
						
					</div>
				</div>
				<div class="col-xs-4 col-xs-offset-2 showcase-testimonials">
					<div class="media">
						<div class="media-left">
							<img src="/static/app/images/TESTIMONIALS_2.png">
						</div>
						<div class="media-body showcase-testimonials-people">
							<h4 class="media-heading">WENDYZ</h4>
							<div>Wendy: <?=__("home__people_BUYER")?></div>
						</div>
					</div>
					<div class="showcase-testimonials-comment">
						<i class="fa fa-quote-left"></i>
						<p><?=__("home__testimonials__comment_2");?><i class="fa fa-quote-right"></i></p>
						
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
