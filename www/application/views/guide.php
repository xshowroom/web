<!DOCTYPE html>
<html ng-app="xShowroom.guide">
<head>
	<meta charset="UTF-8" >
	<title><?=SITE_TITLE_PROFIX?>  Solution</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/guide.css" />
	<script type="text/javascript" src="/static/app/modules/guide.js"></script>
</head>
<body ng-controller="GuideCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'guide')); ?>
	</nav>
	<section class="row no-vertical-padding">
		<div class="container-fluid guide-banner">
			<div class="row">
                <span class="col-xs-12"><?=__("guide__X_SHOWROOM_FASHION_ACCESS")?></span>
				<span class="col-xs-12"><?=__("guide__SUBSCRIPTION")?></span>
			</div>
		</div>
	</section>
	<div class="row">
		<div class="container-fluid">
			<div class="row guide-tab">
				<div class="col-xs-6 text-right guide-tab-title" ng-class="{'active': solution == 'brand'}">
					<h2 ng-click="solution='brand';"><?=__("guide__SOLUTIONS_FOR_BRANDS")?></h2>
				</div>
				<div class="col-xs-6 guide-tab-title" ng-class="{'active': solution == 'retailer'}">
					<h2 ng-click="solution='retailer';"><?=__("guide__SOLUTIONS_FOR_RETAILERS")?></h2>
				</div>
			</div>		
		</div>
	</div>
	<section class="row no-vertical-padding">
		<div class="container guide-solution brand-solution" ng-if="solution == 'brand'">
			<div class="row">
				<div class="col-xs-6 text-center">
					<p class="col-xs-12"><?=__("guide__brand_left_INTRODUCE")?></p>
					<div class="col-xs-12">
						<a class="btn btn-type-2" href="<?=url::site("register/brand")?>" target="_self"><?=__("guide__btn_REGISTER")?></a>
						<a class="btn btn-type-1" href="<?=url::site("login")?>" target="_self"><?=__("guide__btn_SIGN_IN")?></a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__brand_right_INTRODUCE_1")?></h4>
							<p><?=__("guide__brand_right_INTRODUCE_DESC_1")?></p>
						</div>
					</div>
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
	                        <h4><?=__("guide__brand_right_INTRODUCE_2")?></h4>
	                        <p><?=__("guide__brand_right_INTRODUCE_DESC_2")?></p>
						</div>
					</div>
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
	                        <h4><?=__("guide__brand_right_INTRODUCE_3")?></h4>
	                        <p><?=__("guide__brand_right_INTRODUCE_DESC_3")?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container guide-solution buyer-solution" ng-if="solution == 'retailer'">
			<div class="row">
				<div class="col-xs-6 text-center">
					<p class="col-xs-12"><?=__("guide__buyer_left_INTRODUCE")?></p>
					<div class="col-xs-12">
						<a class="btn btn-type-2" href="<?=url::site("register/buyer")?>" target="_self"><?=__("guide__btn_REGISTER")?></a>
						<a class="btn btn-type-1" href="<?=url::site("login")?>" target="_self"><?=__("guide__btn_SIGN_IN")?></a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__buyer_right_INTRODUCE_1")?></h4>
							<p><?=__("guide__buyer_right_INTRODUCE_DESC_1")?></p>
						</div>
					</div>
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
	                        <h4><?=__("guide__buyer_right_INTRODUCE_2")?></h4>
	                        <p><?=__("guide__buyer_right_INTRODUCE_DESC_2")?></p>
						</div>
					</div>
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
	                        <h4><?=__("guide__buyer_right_INTRODUCE_3")?></h4>
	                        <p><?=__("guide__buyer_right_INTRODUCE_DESC_3")?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row no-vertical-padding">
		<div class="container-fluid guide-benefit">
			<div class="row">
				<div class="col-xs-12 guide-benefit-container guide-benefit-brand" ng-if="solution == 'brand'">
					<h3 class="col-xs-12 text-center"><?=__("guide__MORE_BENEFITS_OF_REGISTERING_WITH_US")?></h3>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_PREVIEW_PROFILES")?></h4>
							<p><?=__("guide__benefits_PREVIEW_PROFILES_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_LANGUAGE_SELECTION")?></h4>
							<p><?=__("guide__benefits_LANGUAGE_SELECTION_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_PROMOTION")?></h4>
							<p><?=__("guide__benefits_PROMOTION_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_CHOOSE_ACCOUNT_TYPE")?></h4>
							<p><?=__("guide__benefits_CHOOSE_ACCOUNT_TYPE_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_DIGITAL_LINE_SHEETSS")?></h4>
							<p><?=__("guide__benefits_DIGITAL_LINE_SHEETS_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_MINIMISE_ORDER_ERROR")?></h4>
							<p><?=__("guide__benefits_MINIMISE_ORDER_ERROR_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_UNLIMITED_UPLOAD")?></h4>
							<p><?=__("guide__benefits_UNLIMITED_UPLOAD_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_24_7_SHOWROOM")?></h4>
							<p><?=__("guide__benefits_24_7_SHOWROOM_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY")?></h4>
							<p><?=__("guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY_DESC")?></p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 guide-benefit-container guide-benefit-buyer" ng-if="solution == 'retailer'">
					<h3 class="col-xs-12 text-center"><?=__("guide__MORE_BENEFITS_OF_REGISTERING_WITH_US")?></h3>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_01")?></h4>
							<p><?=__("guide__benefits_BUYER_01_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_02")?></h4>
							<p><?=__("guide__benefits_BUYER_02_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_03")?></h4>
							<p><?=__("guide__benefits_BUYER_03_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_04")?></h4>
							<p><?=__("guide__benefits_BUYER_04_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_05")?></h4>
							<p><?=__("guide__benefits_BUYER_05_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_06")?></h4>
							<p><?=__("guide__benefits_BUYER_06_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_07")?></h4>
							<p><?=__("guide__benefits_BUYER_07_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_08")?></h4>
							<p><?=__("guide__benefits_BUYER_08_DESC")?></p>
						</div>
					</div>
					<div class="col-xs-4 guide-benefit-item">
						<div class="col-xs-3 guide-benefit-item-icon"></div>
						<div class="col-xs-9">
							<h4><?=__("guide__benefits_BUYER_09")?></h4>
							<p><?=__("guide__benefits_BUYER_09_DESC")?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--	<section class="row">-->
<!--		<div class="container">-->
<!--			<div class="row guide-membership">-->
<!--				<h3 class="col-xs-12 text-center">--><?//=__("guide__MEMBERSHIP_INCLUDES")?><!--</h3>-->
<!--				<ul class="col-xs-6">-->
<!--					<li>--><?//=__("guide__MEMBERSHIP_INCLUDES_R1")?><!--</li>-->
<!--					<li>--><?//=__("guide__MEMBERSHIP_INCLUDES_R2")?><!--</li>-->
<!--					<li>--><?//=__("guide__MEMBERSHIP_INCLUDES_R3")?><!--</li>-->
<!--				</ul>-->
<!--				<ul class="col-xs-6">-->
<!--					<li>--><?//=__("guide__MEMBERSHIP_INCLUDES_R4")?><!--</li>-->
<!--					<li>--><?//=__("guide__MEMBERSHIP_INCLUDES_R5")?><!--</li>-->
<!--				</ul>-->
<!--			</div>-->
<!--		</div>-->
<!--	</section>-->
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>