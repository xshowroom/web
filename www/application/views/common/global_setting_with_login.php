<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<div class="locale-settings"></div>
		</div>
		<div class="col-xs-6">
			<div class="user-info-nav">
				<?php if(empty($userAttr)) { ?>
				<div class="user-not-logined">
					<span><?= __("global_setting_with_login__WELCOME")?> GUEST</span>
					<a href="<?=URL::site('login')?>" target="_self"><?= __("global_setting_with_login__LOGIN")?></a>
					<span> | </span>
					<a href="<?=URL::site('guide')?>"><?= __("global_setting_with_login__REGISTER")?></a>
				</div>
				<?php } else{ ?>
				<div class="user-logined">
					<span><?= __("global_setting_with_login__WELCOME")?> </span>
					<a href="/<?= ['', 'brand', 'buyer'][$user['role_type']]?>/dashboard"><?= $userAttr['display_name'] ?></a>
					<span> | </span>
					<a href="<?=URL::site('user/logout')?>" target="_self"><?= __("global_setting_with_login__LOGOUT")?></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>