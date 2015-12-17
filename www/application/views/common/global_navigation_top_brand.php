<div class="container">
	<div class="row">
		<div class="col-xs-2">
			<a href="<?=URL::site('home');?>" class="logo-link" target="_self">
				<img class="site-logo" ng-src="/static/app/images/logo-black.png">
			</a>
		</div>
		<div class="col-xs-7">
			<ul class="main-naviagtions">
				<li><a href="<?=URL::site('brand/dashboard');?>" <?php if ($currentPage == 'dashboard'){?>class="active"<?php }?>><?=__("global_navigation_top_user__DASHBOARD");?></a></li>
				<li><a href="<?=URL::site('brand/collection');?>" <?php if ($currentPage == 'collection'){?>class="active"<?php }?>><?=__("global_navigation_top_user__COLLECTION");?></a></li>
				<li><a href="<?=URL::site('brand/lookbook');?>" <?php if ($currentPage == 'lookbook'){?>class="active"<?php }?>><?=__("global_navigation_top_user__LOOKBOOK");?></a></li>
				<li><a href="<?=URL::site('order/list');?>" <?php if ($currentPage == 'order'){?>class="active"<?php }?>><?=__("global_navigation_top_user__ORDER");?></a></li>
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
					<li><a href="<?=URL::site('user/profile');?>"><?=__("global_navigation_top_user__PROFILE");?></a></li>
					<li><a href="<?=URL::site('user/logout');?>"><?=__("global_navigation_top_user__SIGN_OUT");?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
