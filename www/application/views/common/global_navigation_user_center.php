<div class="col-md-2 hidden-xs hidden-sm" role="navigation">
	<ul class="nav nav-stacked kd-user-center-slide-nav">
		<li id="kd-user-center-nav-profile"><a href="<?=URL::site('user/profile');?>" <?php if ($currentPage == 'profile'){?>class="active"<?php }?>>USER PROFILE</a></li>
		<li id="kd-user-center-nav-messages"><a href="<?=URL::site('message/list');?>" <?php if ($currentPage == 'message'){?>class="active"<?php }?>>MY MESSAGES</a></li>
	</ul>
</div>

