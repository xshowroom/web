<div class="container">
	<div class="row">
		<div class="col-xs-12 text-right share-links">
			<a href="#" class="share-link"><i class="fa fa-facebook"></i></a>
			<a href="#" class="share-link"><i class="fa fa-weibo"></i></a>
			<a href="#" class="share-link"><i class="fa fa-instagram"></i></a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 text-center">
			<a href="/home" class="logo-link" target="_self">
				<img class="site-logo" ng-src="/static/app/images/logo-<?php if ($currentPage == 'home'){ echo 'white';}else{ echo 'black';}?>.png">
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 text-center">
			<ul class="main-naviagtions">
				<li><a href="/home" <?php if ($currentPage == 'home'){?>class="active"<?php }?>><?= __("global_navigation_top_guest__HOME") ?></a></li>
				<li><a href="/guide" <?php if ($currentPage == 'guide'){?>class="active"<?php }?>><?= __("global_navigation_top_guest__GUIDE") ?></a></li>
				<li><a href="/shop" <?php if ($currentPage == 'shop'){?>class="active"<?php }?>><?= __("global_navigation_top_guest__SHOP") ?></a></li>
				<li><a href="#"  <?php if ($currentPage == 'discovery'){?>class="active"<?php }?>><?= __("global_navigation_top_guest__DISCOVER") ?></a></li>
				<li><a href="#"  <?php if ($currentPage == 'press'){?>class="active"<?php }?>><?= __("global_navigation_top_guest__PRESS") ?></a></li>
				<li><a href="#"  <?php if ($currentPage == 'contact'){?>class="active"<?php }?>><?= __("global_navigation_top_guest__CONTACT") ?></a></li>
			</ul>
		</div>
	</div>
</div>
