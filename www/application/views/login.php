<!DOCTYPE html>
<html ng-app="xShowroom.login">
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
	<script type="text/javascript" src="/static/app/modules/login.js"></script>
</head>
<body ng-controller="LoginCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login'); ?>
	</nav>
	<nav class="row guest-navigation"  id="home-page-navigation">
        <?php echo View::factory('common/global_navigation_top_guest'); ?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<article class="sign-in text-center">
						<h2>{{ "login__SIGN_IN"| translate }}</h2>
						<form ng-submit="login();">
							<div class="form-group">
								<label for="email">{{ "login__EMAIL"| translate }}</label>
								<input type="text" class="form-control" id="email" ng-model="user.email">
							</div>
							<div class="form-group">
								<label for="password">{{ "login__PASSWORD"| translate }}</label>
								<input type="password" class="form-control" id="password" ng-model="user.pass">
							</div>
							<div class="form-group">
								<label for="valid-code" class="col-xs-12">{{ "login__VALID_CODE"| translate }}</label>
								<input type="text" class="form-control col-xs-9" id="valid-code"  ng-model="user.code">
								<img ng-click="refreshValidCode();" class="valid-code col-xs-3" ng-src="{{validCodeUrl}}" title="Click to refresh">
								<div class="clearfix"></div>
							</div>
							<div class="alert login-alert" role="alert"  ng-if="loginError.hasError">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{loginError.errorMsg }}</span>
							</div>
							<button type="submit" class="btn btn-type-2">{{ "login__btn_LOGIN"| translate }}</button>
							<div class="checkbox">
								<label><input type="checkbox" ng-model="rememberMe"
           							ng-true-value="true" ng-false-value="false">{{ "login__REMEMBER_ME"| translate }}</label>
							</div>
							<!-- <a href="#">LOST YOUR PASSWORD?</a> -->
						</form>
					</article>
				</div>
				<div class="col-xs-6">
					<article class="request-menbership text-center">
						<h2>{{ "login__REQUEST_MEMBERSHIP"| translate }}</h2>
						<p>{{ "login__REQUEST_MEMBERSHIP_DESC"| translate }}</p>
						<div>
							<a class="btn btn-type-1" href="/register/brand" target="_self">{{ "login__REQUEST_BRAND"| translate }}</a>
							<a class="btn btn-type-1" href="/register/brand" target="_self">{{ "login__REQUEST_BUYER"| translate }}</a>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>