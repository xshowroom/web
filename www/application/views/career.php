<!DOCTYPE html>
<html ng-app="xShowroom.career">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/career.css" />
	<script type="text/javascript" src="/static/app/modules/career.js"></script>
</head>
<body ng-controller="CareerCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'career')); ?>
	</nav>
	<section class="row career-banner">
		<div class="container">
			<div class="row">
                <div class="col-xs-8 col-xs-offset-2 banner-mask">
                	<h2><?=__("career__TITLE")?></h2>
                	<h3><?=__("career__SUB_TITLE")?></h3>
					<p><?=__("career__CONTENT_01")?></p>
					<p><?=__("career__CONTENT_02")?></p>
					<div class="career-email">careers@xshowroom.com</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<section class="row benefits">
		<div class="container">
			<div class="row">
				<h3 class="col-xs-12 text-center"><?=__("career__BENIFITS_TITLE")?></h3>
			</div>
			<div class="row">
				<div class="col-xs-5 col-xs-offset-1  benefit-item">
					<div class="benefit-icon"></div>
					<div class="benefit-desc">
						<h4><?=__("career__BENIFITS_01")?></h4>
						<p><?=__("career__BENIFITS_01_DESC")?></p>
					</div>
				</div>
				<div class="col-xs-5 benefit-item">
					<div class="benefit-icon"></div>
					<div class="benefit-desc">
						<h4><?=__("career__BENIFITS_02")?></h4>
						<p><?=__("career__BENIFITS_02_DESC")?></p>
					</div>
				</div>
				<div class="col-xs-5 col-xs-offset-1 benefit-item">
					<div class="benefit-icon"></div>
					<div class="benefit-desc">
						<h4><?=__("career__BENIFITS_03")?></h4>
						<p><?=__("career__BENIFITS_03_DESC")?></p>
					</div>
				</div>
				<div class="col-xs-5 benefit-item">
					<div class="benefit-icon"></div>
					<div class="benefit-desc">
						<h4><?=__("career__BENIFITS_04")?></h4>
						<p><?=__("career__BENIFITS_04_DESC")?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row">
		<div class="container">
			<div class="row">
				<h3 class="col-xs-12 text-center"><?=__("career__OPPORTUNITITY_TITLE")?></h3>
			</div>
			<div class="row">
				<ul class="opportunity-list col-xs-10 col-xs-offset-1">
					<li ng-click="setOpenPosition(0)">
						<div>
							<span class="position-name">Graphic Designer</span>
						</div>
						<div>
							<span class="position-location"><i class="fa fa-map-marker"></i><?=__("career__job_location_SH")?></span>
							<span class="position-type"><?=__("career__job_type_FULLTIME")?></span>
							<span class="position-date"><?=__("career__job_location_POST")?>: 2016/01/01</span>
							<span class="position-action">
								<i class="fa" ng-class="{'fa-sort-desc': selectedPosition != 0, 'fa-sort-asc': selectedPosition == 0}"></i>
							</span>
						</div>
						<div ng-show="selectedPosition == 0">
							<p class="position-description">
								<?=__("career_jd_01")?>
							</p>
							<div class="position-email">TO APPLY: careers@xshowroom.com</div>
						</div>
					</li>
					<li ng-click="setOpenPosition(1)">
						<div>
							<span class="position-name">Sales Assistant</span>
						</div>
						<div>
							<span class="position-location"><i class="fa fa-map-marker"></i><?=__("career__job_location_SH")?></span>
							<span class="position-type"><?=__("career__job_type_FULLTIME")?></span>
							<span class="position-date"><?=__("career__job_location_POST")?>: 2016/01/01</span>
							<span class="position-action">
								<i class="fa" ng-class="{'fa-sort-desc': selectedPosition != 1, 'fa-sort-asc': selectedPosition == 1}"></i>
							</span>
						</div>
						<div ng-show="selectedPosition == 1">
							<p class="position-description">
								<?=__("career_jd_02")?>
							</p>
							<div class="position-email">TO APPLY: careers@xshowroom.com</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>