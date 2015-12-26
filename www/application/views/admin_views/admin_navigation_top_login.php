<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
			<ul class="main-naviagtions">
				<li>
					<img class="site-logo" ng-src="/static/app/images/logo-black.png">
				</li>
				<li><a href="<?=URL::site('xsadmin/management/statistics');?>" <?php if ($currentPage == 'statistics'){?>class="active"<?php }?>>ADMIN HOME</a></li>
				<li><a href="<?=URL::site('xsadmin/management/users');?>" <?php if ($currentPage == 'users'){?>class="active"<?php }?>>USER MANAGE</a></li>
				<li><a href="<?=URL::site('xsadmin/management/stores');?>" <?php if ($currentPage == 'stores'){?>class="active"<?php }?>>STORE MANAGE</a></li>
				<li><a href="<?=URL::site('xsadmin/management/orders');?>" <?php if ($currentPage == 'orders'){?>class="active"<?php }?>>ORDER MANAGE</a></li>
			</ul>
		</div>
	</div>
</div>
