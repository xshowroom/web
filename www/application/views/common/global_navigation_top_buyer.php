<div class="container">
	<div class="row">
		<div class="col-xs-2">
			<a href="<?=URL::site('home');?>" class="logo-link" target="_self">
				<img class="site-logo" ng-src="/static/app/images/logo-black.png">
			</a>
		</div>
		<div class="col-xs-8">
			<ul class="main-naviagtions">
				<li><a href="<?=URL::site('buyer/dashboard');?>" <?php if ($currentPage == dashboard){?>class="active"<?php }?>><?=__("global_navigation_top_user__DASHBOARD");?></a></li>
				<li><a href="<?=URL::site('shop');?>" <?php if ($currentPage == collection){?>class="active"<?php }?>><?=__("global_navigation_top_user__SHOP");?></a></li>
				<li><a href="<?=URL::site('buyer/order');?>" <?php if ($currentPage == order){?>class="active"<?php }?>><?=__("global_navigation_top_user__ORDER");?></a></li>
				<li><a href="<?=URL::site('message/list');?>"  <?php if ($currentPage == message){?>class="active"<?php }?>><?=__("global_navigation_top_user__MESSAGE");?></a></li>
			</ul>
		</div>
		<div class="col-xs-2 text-right">
			<div class="dropdown user-actions">
				<a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img ng-src="/static/app/images/user-action.png">
				 	<span><?= $userAttr['display_name'] ?></span>
				 	<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?=URL::site('user/profile');?>"><?=__("global_navigation_top_user__PROFILE");?></a></li>
					<li><a href="<?=URL::site('user/logout');?>"><?=__("global_navigation_top_user__SIGN_OUT");?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
