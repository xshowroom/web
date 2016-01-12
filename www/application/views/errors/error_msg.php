<!DOCTYPE html>
<html  ng-app="xShowroom.error">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<script type="text/javascript" src="/static/app/modules/error.js"></script>
</head>
<body ng-controller="ErrorCtrl" class="container-fluid">
	<?php if (empty($user)){?>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<?php } else { ?>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<?php }?>
	<?php if (empty($user)){?>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest'); ?>
	</nav>
	<?php } else if ($user["role_type"] == "1"){ ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('userAttr'=> $userAttr)); ?>
	</nav>
	<?php } else if ($user["role_type"] == "2"){ ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('userAttr'=> $userAttr)); ?>
	</nav>
	<?php }?>
	<section class="row">
		<div class="container">
			<div class="row" style="min-height:300px;">
				<h1 class="text-center" style="font-size:90px;color: #ca7379;"><?= $errorCode ?></h1>
				<h2 class="text-center"><?= $errorMsg ?></h2>

				<h5  class="text-center" style="margin-top:50px;"><?=__('other__404_DESC_01');?> <span id="timeTick" style="font-size:16px;color: #ca7379;">10</span> <?=__('other__404_DESC_02');?></h5>
				<h5  class="text-center"><?=__('other__404_DESC_03');?> <a id='targetPage' href="/" role="button"><?=__('other__404_DESC_04');?></a>.</h5>

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