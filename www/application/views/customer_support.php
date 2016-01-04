<!DOCTYPE html>
<html ng-app="xShowroom.customer">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/customer.css" />
	<script type="text/javascript" src="/static/app/modules/customer.js"></script>
</head>
<body ng-controller="CustomerCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'press')); ?>
	</nav>

	<section class="row no-vertical-padding">
		<div class="container-fluid press-banner">
			<div class="row">
				<h1 class="col-xs-12"><?=__("customer_banner_TITLE")?></h1>
			</div>
			<div class="row">
				<span class="col-xs-4 col-xs-offset-2"><img src="/static/app/images/icon-email.png"/></span>
				<span class="col-xs-4"><img src="/static/app/images/icon-call.png"/></span>
			</div>
			<div class="row">
				<span class="col-xs-4 col-xs-offset-2">support@xshowroom.com</span>
				<span class="col-xs-4">+44 20 485 736 22</span>
			</div>
		</div>
	</section>

	<section class="row">
		<div class="container">
			<div class="row">
				<h3 class="col-xs-12 text-center faq-title"><?=__("customer_FAQ")?></h3>
			</div>
			<div class="container">
				<?php foreach($faqList as $key=>$value):?>
					<ul class="faq-list col-xs-8 col-xs-offset-2">
					<li ng-click="setOpenPosition('<?=$key?>')">
						<div class="row">
							<span class="col-xs-10 faq-question"><?=$value['question']?></span>
							<span class="col-xs-2 faq-action">
								<i class="fa" ng-class="{'fa-sort-desc': selectedPosition != '<?=$key?>', 'fa-sort-asc': selectedPosition == '<?=$key?>'}"></i>
							</span>
						</div>
						<div ng-show="selectedPosition == '<?=$key?>'">
							<p class="faq-description">
								<?=$value['answer']?>
							</p>
						</div>
					</li>
				</ul>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>