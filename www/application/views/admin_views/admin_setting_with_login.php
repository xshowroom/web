<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<div class="locale-settings"></div>
		</div>
		<div class="col-xs-6">
			<div class="user-info-nav">
				<?php if(empty($user)) { ?>
						<a href="/home" target="_self">RETURN TO HOME</a>
					</div>
				<?php } else{ ?>
					<div class="user-logined">
						<span>WELCOME SITE ADMIN: </span>
						<span><?= $user['email'] ?></span
						<span> | </span>
						<a href="/user/logout" target="_self"><?= __("global_setting_with_login__LOGOUT")?></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>