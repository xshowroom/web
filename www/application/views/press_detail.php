<!DOCTYPE html>
<html ng-app="xShowroom.press">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
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

	<section class="row">
		<div class="container">
			<iframe marginWidth=0 marginHeight=0 src="/static/press/<?=$pressTitle?>" width="100%" scrolling="no" frameborder="0" onload="this.height=this.contentWindow.document.documentElement.scrollHeight"></iframe>
		</div>
	</section>
	
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>