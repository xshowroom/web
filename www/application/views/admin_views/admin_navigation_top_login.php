<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
			<ul class="main-naviagtions">
				<li>
				<a href="<?=URL::site('xsadmin/management');?>" class="logo-link" target="_self">
					<img class="site-logo" ng-src="/static/app/images/logo-<?php if ($currentPage == 'home'){ echo 'white';}else{ echo 'black';}?>.png">
				</a>
				</li>
				<li><a href="<?=URL::site('xsadmin/management/statistics');?>" <?php if ($currentPage == 'statistics'){?>class="active"<?php }?>>STATISTICS</a></li>
				<li><a href="<?=URL::site('xsadmin/management/users');?>" <?php if ($currentPage == 'users'){?>class="active"<?php }?>>USER MANAGE</a></li>
				<li><a href="<?=URL::site('xsadmin/management/access');?>" <?php if ($currentPage == 'access'){?>class="active"<?php }?>>ACCESS MANAGE</a></li>
				<li><a href="<?=URL::site('xsadmin/management/orders');?>" <?php if ($currentPage == 'orders'){?>class="active"<?php }?>>ORDER MANAGE</a></li>
			</ul>
		</div>
	</div>
</div>
