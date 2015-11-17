<div class="container">
	<div class="row">
		<div class="col-xs-3">
			<img class="site-logo" ng-src="/static/app/images/logo-black.png">
		</div>
		<div class="col-xs-12 text-center">
			<ul class="main-naviagtions">
				<li><a href="/home" <?php if ($currentPage == 'home'){?>class="active"<?php }?>>{{ "global_no_user_navigation__HOME"| translate }}</a></li>
				<li><a href="/guide" <?php if ($currentPage == 'guide'){?>class="active"<?php }?>>{{ "global_no_user_navigation__GUIDE"| translate }}</a></li>
				<li><a href="/shop" <?php if ($currentPage == 'shop'){?>class="active"<?php }?>>{{ "global_no_user_navigation__SHOP"| translate }}</a></li>
				<li><a href="#"  <?php if ($currentPage == 'discovery'){?>class="active"<?php }?>>{{ "global_no_user_navigation__DISCOVER"| translate }}</a></li>
				<li><a href="#"  <?php if ($currentPage == 'press'){?>class="active"<?php }?>>{{ "global_no_user_navigation__PRESS"| translate }}</a></li>
				<li><a href="#"  <?php if ($currentPage == 'contact'){?>class="active"<?php }?>>{{ "global_no_user_navigation__CONTACT"| translate }}</a></li>
			</ul>
		</div>
	</div>
</div>
