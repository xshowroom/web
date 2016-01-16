<!DOCTYPE html>
<html ng-app="xShowroom.press">
<head>
	<meta charset="UTF-8" >
	<title><?=SITE_TITLE_PROFIX?> PRESS</title>
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
				<div class="col-xs-3">
					<div class="press-item">
						<img class="press-img img-responsive" src="/static/app/images/press-1.png">
						<div class="press-body">
							<h3 class="press-title text-center"><?=__("press__TITLE_01")?></h3>
							<p class="press-content text-left"><?=__("press__CONTENT_01")?></p>
							<p class="press-continue-button text-right"><a href="/press/detail/supermodel.htm" target="_blank"><u><?=__("press__btn_CONTINUE")?></u></a></p>
						</div>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="press-item">
						<img class="press-img img-responsive" src="/static/app/images/press-2.png">
						<div class="press-body">
							<h3 class="press-title text-center"><?=__("press__TITLE_02")?></h3>
							<p class="press-content text-left"><?=__("press__CONTENT_02")?></p>
							<p class="press-continue-button text-right"><a href="/press/detail/fabitoria.htm" target="_blank"><u><?=__("press__btn_CONTINUE")?></u></a></p>
						</div>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="press-item">
						<img class="press-img img-responsive" src="/static/app/images/press-3.png">
						<div class="press-body">
							<h3 class="press-title text-center"><?=__("press__TITLE_03")?></h3>
							<p class="press-content text-left"><?=__("press__CONTENT_03")?></p>
							<p class="press-continue-button text-right"><a href="/press/detail/adorn.htm" target="_blank"><u><?=__("press__btn_CONTINUE")?></u></a></p>
						</div>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="press-item">
						<img class="press-img img-responsive" src="/static/app/images/press-4.png">
						<div class="press-body">
							<h3 class="press-title text-center"><?=__("press__TITLE_04")?></h3>
							<p class="press-content text-left"><?=__("press__CONTENT_04")?></p>
							<p class="press-continue-button text-right"><a href="/press/detail/pressday.htm" target="_blank"><u><?=__("press__btn_CONTINUE")?></u></a></p>
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