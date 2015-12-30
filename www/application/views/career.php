<!DOCTYPE html>
<html ng-app="xShowroom.career">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
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
                	<h2>JOIN OUR TEAM</h2>
                	<h3>Make Work Matter</h3>
					<p>We’re a rapidly expanding organisation with plenty of room for brilliant, 
						like-minded people. We’re all about helping thousands of businesses 
						around the world grow by putting the wholesale buying process online.
					</p>
					<p>We offer a truly inspiring workplace for new ideas, new expressions and 
						personal development. If you’d like to work as part of a growing team 
						focused on pushing boundaries, send us a copy of your C.V and 
						covering letter to:</p>
					<div class="career-email">careers@xshowroom.com</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<section class="row benefits">
		<div class="container">
			<div class="row">
				<h3 class="col-xs-12 text-center">BENEFITS OF WORKING WITH XSHOWROOM</h3>
			</div>
			<div class="row">
				<div class="col-xs-5 col-xs-offset-1  benefit-item">
					<div class="benefit-icon"></div>
					<div class="benefit-desc">
						<h4>CREATIVE ENVIRONMENT</h4>
						<p>We empower our teams to find creative solutions to difficult problems.</p>
					</div>
				</div>
				<div class="col-xs-5 benefit-item">
					<div class="benefit-icon"></div>
					<div class="benefit-desc">
						<h4>CENTRAL LOCATION</h4>
						<p>Great office in a central Shanghai location.</p>
					</div>
				</div>
				<div class="col-xs-5 col-xs-offset-1 benefit-item">
					<div class="benefit-icon"></div>
					<div class="benefit-desc">
						<h4>PASSIONATE PEOPLE</h4>
						<p>Our team works closely together and are committed to providing help whenever a problem arises.</p>
					</div>
				</div>
				<div class="col-xs-5 benefit-item">
					<div class="benefit-icon"></div>
					<div class="benefit-desc">
						<h4>HIGH PROFILE EVENT ACCESS</h4>
						<p>Access and exposure to fashion events.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row">
		<div class="container">
			<div class="row">
				<h3 class="col-xs-12 text-center">CURRENT OPPORTUNITIES</h3>
			</div>
			<div class="row">
				<ul class="opportunty-list col-xs-10 col-xs-offset-1">
					<li ng-click="setOpenPosition($index)" ng-repeat="position in positions track by $index">
						<div>
							<span class="position-name">ACCOUNT MANAGER</span>
						</div>
						<div>
							<span class="position-location"><i class="fa fa-map-marker"></i>SHANGHAI</span>
							<span class="position-type">FULL TIME</span>
							<span class="position-date">POSTED: 2016/01/01</span>
							<span class="position-action">
								<i class="fa" ng-class="{'fa-sort-desc': selectedPosition != $index, 'fa-sort-asc': selectedPosition == $index}"></i>
							</span>
						</div>
						<div ng-show="selectedPosition == $index">
							<p class="position-description">Vix te habemus facilisi postulant. Te duo habemus vivendo. 
								Debet legere inimicus sed ei. Ut mei quaeque labores 
								feugait, case elit explicari no duo. Insolens oportere ius in, 
								ad dicat nostrud delicata vix. Nemore malorum definitiones
								no eam. Pri dolorum comprehensam ei. Eum eu diam. 
								Unum zril cotidieque ea ius.  </p>
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