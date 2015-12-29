<!DOCTYPE html>
<html ng-app="xShowroom.press">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/press.css" />
	<script type="text/javascript" src="/static/app/modules/press.js"></script>
</head>
<body ng-controller="PressCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'press')); ?>
	</nav>

	<section class="row press">
		<div class="container">
			<h2 class="text-center"><?=__('press__HEAD');?></h2>
			<div class="row">
				<div class="col-md-3">
					<div class="press-item">
						<img class="press-img img-responsive" src="/static/app/images/home-banner-5.jpg">
						<div class="press-body">
							<h3 class="press-title text-center">Press Heading</h3>
							<p class="press-author text-center">Author</p>
							<p class="press-content text-center">一位经验涵盖中国及国际市场的时尚专家。 能为客户提供最好的服务，和帮助时装设计师成长与创新，并商业化和持续发展品牌。 由于时尚界高需求的国际化发展以及中国零售市场的巨大潜力， 陈容博士在2015年创立XSHOWROOM。</p>
							<p class="press-continue-button text-right"><a href="#"><u>CONTINUE READING ...</u></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="press-item">
						<img class="press-img img-responsive" src="/static/app/images/home-banner-5.jpg">
						<div class="press-body">
							<h3 class="press-title text-center">Press Heading</h3>
							<p class="press-author text-center">Author</p>
							<p class="press-content text-center">一位经验涵盖中国及国际市场的时尚专家。 能为客户提供最好的服务，和帮助时装设计师成长与创新，并商业化和持续发展品牌。 由于时尚界高需求的国际化发展以及中国零售市场的巨大潜力， 陈容博士在2015年创立XSHOWROOM。</p>
							<p class="press-continue-button text-right"><a href="#"><u>CONTINUE READING ...</u></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="press-item">
						<img class="press-img img-responsive" src="/static/app/images/home-banner-5.jpg">
						<div class="press-body">
							<h3 class="press-title text-center">Press Heading</h3>
							<p class="press-author text-center">Author</p>
							<p class="press-content text-center">一位经验涵盖中国及国际市场的时尚专家。 能为客户提供最好的服务，和帮助时装设计师成长与创新，并商业化和持续发展品牌。 由于时尚界高需求的国际化发展以及中国零售市场的巨大潜力， 陈容博士在2015年创立XSHOWROOM。</p>
							<p class="press-continue-button text-right"><a href="#"><u>CONTINUE READING ...</u></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="press-item">
						<img class="press-img img-responsive" src="/static/app/images/home-banner-5.jpg">
						<div class="press-body">
							<h3 class="press-title text-center">Press Heading</h3>
							<p class="press-author text-center">Author</p>
							<p class="press-content text-center">一位经验涵盖中国及国际市场的时尚专家。 能为客户提供最好的服务，和帮助时装设计师成长与创新，并商业化和持续发展品牌。 由于时尚界高需求的国际化发展以及中国零售市场的巨大潜力， 陈容博士在2015年创立XSHOWROOM。</p>
							<p class="press-continue-button text-right"><a href="#"><u>CONTINUE READING ...</u></a></p>
						</div>
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