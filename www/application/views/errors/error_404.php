<!DOCTYPE html>
<html  ng-app="xShowroom.error">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/error.js"></script>
</head>
<body ng-controller="ErrorCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest'); ?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row" style="min-height:300px;">
				<h1 class="text-center" style="font-size:90px;color: #ca7379;">404</h1>
				<h2 class="text-center">PAGE NOT FOUND!</h2>

				<h5  class="text-center" style="margin-top:50px;">We will redirect you to XSHOWROOM HOME in <span id="timeTick" style="font-size:16px;color: #ca7379;">10</span> seconds</h5>
				<h5  class="text-center">If your browser is no response, please <a id='targetPage' href="/home" role="button">CLICK HERE</a>.</h5>

			</div>

		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
	<script type="text/javascript">
		$(document).ready(function(){

			var s = $("#timeTick");
			var link = $("#targetPage");

			function gotoPage() {
				if(s.text() == 0) {
					window.location.href = link.attr("href");
					return;
				}
				s.text(s.text() - 1);
			}

			if(s != null && link != null) {
				window.setInterval(gotoPage, 1000);
			}
		});
	</script>
</body>
</html>