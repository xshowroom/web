<div class="container">
	<div class="row">
		<div class="col-xs-2">
			<a href="<?=URL::site('home');?>" class="logo-link" target="_self">
				<img class="site-logo" ng-src="/static/app/images/logo-black.png">
			</a>
		</div>
		<div class="col-xs-7">
			<ul class="main-naviagtions">
				<li><a href="<?=URL::site('buyer/dashboard');?>" <?php if ($currentPage == 'dashboard'){?>class="active"<?php }?>><?=__("global_navigation_top_user__DASHBOARD");?></a></li>
				<li><a href="<?=URL::site('shop');?>" <?php if ($currentPage == 'shop'){?>class="active"<?php }?>><?=__("global_navigation_top_user__BRAND");?></a></li>
				<li><a href="<?=URL::site('buyer/brand');?>" <?php if ($currentPage == 'my_brands'){?>class="active"<?php }?>><?=__("global_navigation_top_user__MY_BRANDS");?></a></li>
				<li><a href="<?=URL::site('buyer/cart');?>" <?php if ($currentPage == 'cart'){?>class="active"<?php }?>><?=__("global_navigation_top_user__CART");?></a></li>
				<li><a href="<?=URL::site('buyer/order');?>" <?php if ($currentPage == 'order'){?>class="active"<?php }?>><?=__("global_navigation_top_user__ORDER");?></a></li>
				<li><a href="<?=URL::site('message/list');?>"  <?php if ($currentPage == 'message'){?>class="active"<?php }?>><?=__("global_navigation_top_user__MESSAGE");?></a></li>
			</ul>
		</div>
		<div class="col-xs-3 text-right">
			<div class="dropdown user-actions">
				<a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img ng-src="/static/app/images/user-action.png">
				 	<span><?= $userAttr['display_name'] ?></span>
				 	<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?=URL::site('buyer/brand');?>"><?=__("global_navigation_top_user__BUYER_MY_BRAND");?></a></li>
					<li><a href="<?=URL::site('buyer/store');?>"><?=__("global_navigation_top_user__BUYER_MY_STORE");?></a></li>
					<li><a href="<?=URL::site('user/profile');?>"><?=__("global_navigation_top_user__PROFILE");?></a></li>
					<li><a href="<?=URL::site('user/logout');?>"><?=__("global_navigation_top_user__SIGN_OUT");?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
