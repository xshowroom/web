<!DOCTYPE html>
<html ng-app="xShowroom.about">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/about.css" />
	<script type="text/javascript" src="/static/app/modules/about.js"></script>
</head>
<body ng-controller="AboutCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'about')); ?>
	</nav>
	<section class="row about-banner">
		<div class="container">
			<div class="row">
                <div class="col-xs-8 col-xs-offset-2 banner-mask">
                	<h2><?=__('about__TITLE');?></h2>
					<p><?=__('about__CONTENT');?></p>
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
					<h3><?=__('about__FOUNDER');?></h3>
					<h4><?=__('about__FOUNDER_NAME');?></h4>
					<p><?=__('about__FOUNDER_DESC');?></p>
				</div>
			</div>
		</div>
	</section>
	<section class="row">
		<div class="container contact-us" id="contact-us">
			<div class="row">
				<div class="col-xs-12 text-center section-title">
					<h3><?=__("about__CONTACT_US");?></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-1 contact-office">
					<h4><?=__("about__CONTACT__LONDON");?></h4>
					<div><?=__("about__CONTACT__TEL_01");?>:  +44 7419284524</div>
					<div>
						<p>4/F, 76 Great Portland Street,<br/><?=__("about__CONTACT__LONDON");?><br/><?=__("about__CONTACT__UK");?><br/>W1W 7NL</p>
					</div>
					<div><?=__("about__CONTACT__PEOPLE_01");?><br/><?=__("about__CONTACT__PEOPLE_POSITION_01");?></div>
					<div>info@projectcrossover.com</div>
				</div>
				<div class="col-xs-4 col-xs-offset-2 contact-office">
					<h4><?=__("about__CONTACT_US");?></h4>
					<div><?=__("about__CONTACT__TEL_01");?>:  +86 21 6236 3226<br/><?=__("about__CONTACT__TEL_02");?>:  +86 135 244 09274</div>
					<div><?=__("about__CONTACT__ADDRESS2_01");?><br/><?=__("about__CONTACT__ADDRESS2_02");?><br/><?=__("about__CONTACT__ADDRESS2_03");?></div>
					<div><?=__("about__CONTACT__PEOPLE_02");?><br/><?=__("about__CONTACT__PEOPLE_POSITION_02");?></div>
					<div>stephy@projectcrossover.cn</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center section-title">
					<h3><?=__("home__TESTIMONIALS")?></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-1 showcase-testimonials"  id="play-lounge">
					<div class="media">
						<div class="media-left">
							<img src="/static/app/images/home-testomonial-1.png">
						</div>
						<div class="media-body showcase-testimonials-people">
							<h4 class="media-heading">PLAY LOUNGE</h4>
							<div>Iris: <?=__("home__people_BUYER")?></div>
						</div>
					</div>
					<div class="showcase-testimonials-comment">
						<i class="fa fa-quote-left"></i>
						<p><?=__("about__testimonials__comment_1");?><i class="fa fa-quote-right"></i></p>
					</div>
				</div>
				<div class="col-xs-4 col-xs-offset-2 showcase-testimonials"  id="wendyz">
					<div class="media">
						<div class="media-left">
							<img src="/static/app/images/home-testomonial-2.png">
						</div>
						<div class="media-body showcase-testimonials-people">
							<h4 class="media-heading">WENDYZ</h4>
							<div>Wendy: <?=__("home__people_DIRECTOR")?></div>
						</div>
					</div>
					<div class="showcase-testimonials-comment">
						<i class="fa fa-quote-left"></i>
						<p><?=__("about__testimonials__comment_2");?><i class="fa fa-quote-right"></i></p>
					</div>
				</div>
				<div class="col-xs-4 col-xs-offset-1 showcase-testimonials"  id="ppq">
					<div class="media">
						<div class="media-left">
							<img src="/static/app/images/home-testomonial-3.png">
						</div>
						<div class="media-body showcase-testimonials-people">
							<h4 class="media-heading">PPQ</h4>
							<div>Percy Parker: <?=__("home__people_BRAND_DIRECTOR")?></div>
						</div>
					</div>
					<div class="showcase-testimonials-comment">
						<i class="fa fa-quote-left"></i>
						<p><?=__("about__testimonials__comment_3");?><i class="fa fa-quote-right"></i></p>
					</div>
				</div>
				<div class="col-xs-4 col-xs-offset-2 showcase-testimonials" id="three-floor">
					<div class="media">
						<div class="media-left">
							<img src="/static/app/images/home-testomonial-4.png">
						</div>
						<div class="media-body showcase-testimonials-people">
							<h4 class="media-heading">THREE FLOOR</h4>
							<div>Yvonne Hoang: <?=__("home__people_BRAND_DIRECTOR")?></div>
						</div>
					</div>
					<div class="showcase-testimonials-comment">
						<i class="fa fa-quote-left"></i>
						<p><?=__("about__testimonials__comment_4");?><i class="fa fa-quote-right"></i></p>
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