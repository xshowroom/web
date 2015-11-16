<!DOCTYPE html>
<html  ng-app="xShowroom.dashboard">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/login.css" />
	<link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/dashboard.js"></script>
</head>
<body ng-controller="DashboardCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php include '/global-setting-info.php'; ?>
	</nav>
	<nav class="row no-user-navigation">
		<?php include '/global-no-user-navigation.php';?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row" style="min-height:300px;">
				<h1 class="text-center">Personal Dashboard Is Coming Soon!</h1>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
		<?php include '/global-footer-navigation.php'; ?>
	</footer>
</body>
</html>