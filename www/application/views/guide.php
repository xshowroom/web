<!DOCTYPE html>
<html ng-app="xShowroom.guide">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/guide.css" />
	<link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/guide.js"></script>
</head>
<body ng-controller="GuideCtrl" class="container-fluid">
	<nav class="row setting-info" ng-include="'/static/templates/global-setting-info.html'"></nav>
	<nav class="row no-user-navigation" onload="page='guide'" ng-include="'/static/templates/global-no-user-navigation.html'"></nav>
	<section class="row no-vertical-padding">
		<div class="container-fluid guide-banner">
			<div class="row">
                <span class="col-xs-12">{{ "guide__X_SHOWROOM_FASHION_ACCESS"| translate }}</span>
				<span class="col-xs-12">{{ "guide__SUBSCRIPTION"| translate }}</span>
			</div>
		</div>
	</section>
	<div class="row">
		<div class="container-fluid">
			<div class="row guide-tab">
				<div class="col-xs-6 text-right guide-tab-title" ng-class="{'active': solution == 'brand'}">
					<h2 ng-click="solution='brand';">{{ "guide__SOLUTIONS_FOR_BRANDS"| translate }}</h2>
				</div>
				<div class="col-xs-6 guide-tab-title" ng-class="{'active': solution == 'retailer'}">
					<h2 ng-click="solution='retailer';">{{ "guide__SOLUTIONS_FOR_RETAILERS"| translate }}</h2>
				</div>
			</div>		
		</div>
	</div>
	<section class="row no-vertical-padding">
		<div class="container guide-solution" ng-if="solution == 'retailer'">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 text-center">
					<h4>{{ "guide__buyer_INTRODUCE"| translate }}</h4>
					<p>{{ "guide__buyer_INTRODUCE_DESC"| translate }}</p>
					<div class="col-xs-12">
						<a class="btn btn-type-2" href="/web/login/logout?target=buyer-register" target="_self">{{ "guide__btn_REGISTER"| translate }}</a>
						<a class="btn btn-type-1" href="/web/login/logout?target=login" target="_self">{{ "guide__btn_SIGN_IN"| translate }}</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container guide-solution" ng-if="solution == 'brand'">
			<div class="row">
				<div class="col-xs-6 text-center">
					<p class="col-xs-12">{{ "guide__brand_left_INTRODUCE"| translate }}</p>
					<div class="col-xs-12">
						<a class="btn btn-type-2" href="/web/login/logout?target=brand-register" target="_self">{{ "guide__btn_REGISTER"| translate }}</a>
						<a class="btn btn-type-1" href="/web/login/logout?target=login" target="_self">{{ "guide__btn_SIGN_IN"| translate }}</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
							<h4>{{ "guide__brand_right_INTRODUCE_1"| translate }}</h4>
							<p>{{ "guide__brand_right_INTRODUCE_DESC_1"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
	                        <h4>{{ "guide__brand_right_INTRODUCE_2"| translate }}</h4>
	                        <p>{{ "guide__brand_right_INTRODUCE_DESC_2"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-12 guide-solution-feature">
						<div class="col-xs-3 guide-solution-icon"></div>
						<div class="col-xs-9">
	                        <h4>{{ "guide__brand_right_INTRODUCE_3"| translate }}</h4>
	                        <p>{{ "guide__brand_right_INTRODUCE_DESC_3"| translate }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row no-vertical-padding">
		<div class="container-fluid guide-benefit">
			<div class="row">
				<div class="col-xs-12 guide-benefit-container" ng-if="solution == 'brand'">
					<h3 class="col-xs-12 text-center">{{ "guide__MORE_BENEFITS_OF_REGISTERING_WITH_US"| translate }}</h3>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_PREVIEW_PROFILES"| translate }}</h4>
							<p>{{ "guide__benefits_PREVIEW_PROFILES_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_LANGUAGE_SELECTION"| translate }}</h4>
							<p>{{ "guide__benefits_LANGUAGE_SELECTION_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_PROMOTION"| translate }}</h4>
							<p>{{ "guide__benefits_PROMOTION_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_CHOOSE_ACCOUNT_TYPE"| translate }}</h4>
							<p>{{ "guide__benefits_CHOOSE_ACCOUNT_TYPE_DESC"| translate }}</br>{{ "guide__benefits_CHOOSE_ACCOUNT_TYPE_ACCOUNT_1"| translate }}</br>{{ "guide__benefits_CHOOSE_ACCOUNT_TYPE_ACCOUNT_2"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_DIGITAL_LINE_SHEETSS"| translate }}</h4>
							<p>{{ "guide__benefits_DIGITAL_LINE_SHEETS_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_MINIMISE_ORDER_ERROR"| translate }}</h4>
							<p>{{ "guide__benefits_MINIMISE_ORDER_ERROR_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_UNLIMITED_UPLOAD"| translate }}</h4>
							<p>{{ "guide__benefits_UNLIMITED_UPLOAD_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_24_7_SHOWROOM"| translate }}</h4>
							<p>{{ "guide__benefits_24_7_SHOWROOM_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY"| translate }}</h4>
							<p>{{ "guide__benefits_24_7_ACCESS_TO_ORDER_HISTORY_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_BUYER_REPORTS_TRACKING_STATISTICS"| translate }}</h4>
							<p>{{ "guide__benefits_BUYER_REPORTS_TRACKING_STATISTICS_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_SHOWROOM_FOR_PREMIUM_MEMBERS"| translate }}</h4>
							<p>{{ "guide__benefits_SHOWROOM_FOR_PREMIUM_MEMBERS_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_TRADESHOWS"| translate }}</h4>
							<p>{{ "guide__benefits_TRADESHOWS_DESC"| translate }}</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 guide-benefit-container" ng-if="solution == 'retailer'">
					<h3 class="col-xs-12 text-center">{{ "guide__MORE_BENEFITS_OF_REGISTERING_WITH_US"| translate }}</h3>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_PREVIEW_COLLECTIONS"| translate }}</h4>
							<p>{{ "guide__benefits_PREVIEW_COLLECTIONS_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_24_7_ACCESS"| translate }}</h4>
							<p>{{ "guide__benefits_24_7_ACCESS_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_DISCOVER_BRANDS"| translate }}</h4>
							<p>{{ "guide__benefits_DISCOVER_BRANDS_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_VIRTUAL_SHOWROOMS"| translate }}</h4>
							<p>{{ "guide__benefits_VIRTUAL_SHOWROOMS_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_VIRTUAL_SHOWROOMS"| translate }}</h4>
							<p>{{ "guide__benefits_VIRTUAL_SHOWROOMS_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_SAVE_FOR_LATER"| translate }}</h4>
							<p>{{ "guide__benefits_SAVE_FOR_LATER_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_KEEP_TRACK"| translate }}</h4>
							<p>{{ "guide__benefits_KEEP_TRACK_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_TRAINING"| translate }}</h4>
							<p>{{ "guide__benefits_TRAINING_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_DEDICATED_URL"| translate }}</h4>
							<p>{{ "guide__benefits_DEDICATED_URL_DESC"| translate }}</p>
						</div>
					</div>
					<div class="col-xs-3 guide-benefit-item">
						<div class="col-xs-2 guide-benefit-item-icon "></div>
						<div class="col-xs-10">
							<h4>{{ "guide__benefits_TRANSLATION_PROVIDED"| translate }}</h4>
							<p>{{ "guide__benefits_TRANSLATION_PROVIDED_DESC"| translate }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row">
		<div class="container">
			<div class="row guide-membership">
				<h3 class="col-xs-12 text-center">{{ "guide__MEMBERSHIP_INCLUDES"| translate }}</h3>
				<ul class="col-xs-6">
					<li>{{ "guide__MEMBERSHIP_INCLUDES_R1"| translate }}</li>
					<li>{{ "guide__MEMBERSHIP_INCLUDES_R2"| translate }}</li>
					<li>{{ "guide__MEMBERSHIP_INCLUDES_R3"| translate }}</li>
				</ul>
				<ul class="col-xs-6">
					<li>{{ "guide__MEMBERSHIP_INCLUDES_R4"| translate }}</li>
					<li>{{ "guide__MEMBERSHIP_INCLUDES_R5"| translate }}</li>
				</ul>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation" ng-include="'/static/templates/global-footer-navigation.html'"></footer>
</body>
</html>