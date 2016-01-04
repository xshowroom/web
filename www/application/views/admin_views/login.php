<!DOCTYPE html>
<html ng-app="xShowroom.login">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/login.css" />
	<script type="text/javascript" src="/static/app/modules/login.js"></script>
</head>
<body ng-controller="LoginCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('admin_views/admin_setting_with_login'); ?>
	</nav>
	<nav class="row guest-navigation" id="home-page-navigation">
        <?php echo View::factory('admin_views/admin_navigation_top_guest'); ?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<article class="sign-in text-center">
						<h2>ADMINISTRATOR PORTAL</h2>
						<form ng-submit="login();">
							<div class="form-group">
								<label for="email">E-MAIL ADDRESS</label>
								<input type="text" class="form-control" id="email" ng-model="user.email">
							</div>
							<div class="form-group">
								<label for="password">YOU PASSWORD</label>
								<input type="password" class="form-control" id="password" ng-model="user.pass">
							</div>
							<div class="form-group">
								<label for="valid-code" class="col-xs-12">VALID CODE</label>
								<input type="text" class="form-control col-xs-9" id="valid-code"  ng-model="user.code">
								<img ng-click="refreshValidCode();" class="valid-code col-xs-3" ng-src="{{validCodeUrl}}" title="Click to refresh">
								<div class="clearfix"></div>
							</div>
							<div class="alert login-alert" role="alert"  ng-if="loginError.hasError">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{loginError.errorMsg }}</span>
							</div>
							<button type="submit" class="btn btn-type-2">LOGIN</button>
							<!-- <a href="#">LOST YOUR PASSWORD?</a> -->
						</form>
					</article>
				</div>
				<div class="col-xs-6">
					<article class="request-menbership text-center">
						<h2>WELCOME ADMIN !</h2>
						<p>Manage your customer, Manage your orders</p>
						<div>

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