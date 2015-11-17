<div class="container">
	<div class="row">
		<div class="col-xs-2">
			<img class="site-logo" ng-src="/static/app/images/logo-black.png">
		</div>
		<div class="col-xs-8">
			<ul class="main-naviagtions">
				<li><a href="/brand/dashboard" <?php if ($currentPage == dashboard){?>class="active"<?php }?>>DASHBOARD</a></li>
				<li><a href="/brand/collection" <?php if ($currentPage == collection){?>class="active"<?php }?>>COLLECTION</a></li>
				<li><a href="/brand/order" <?php if ($currentPage == order){?>class="active"<?php }?>>ORDER</a></li>
				<li><a href="/brand/message"  <?php if ($currentPage == message){?>class="active"<?php }?>>MESSAGE</a></li>
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
					<li><a href="#">MY PROFILE</a></li>
					<li><a href="/user/logout">SIGN OUT</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
