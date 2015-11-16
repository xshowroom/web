<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<div class="locale-settings"></div>
		</div>
		<div class="col-xs-6">
			<div class="user-info-nav">
				<?php if( empty($userInfo)) { ?>
				<div class="user-not-logined">
					<span>{{ "directives_js__WELCOME"| translate }} GUEST</span>
					<a href="login" target="_self">{{ "directives_js__LOGIN"| translate }}</a>
					<span> | </span>
					<a href="guide">{{ "directives_js__REGISTER"| translate }}</a>
				</div>
				<?php } else{ ?>
				<div class="user-logined">
					<span>{{ "directives_js__WELCOME"| translate }} </span>
					<a href="#">{{userInfo.displayName}}</a>
					<span> | </span>
					<a href="/user/logout" target="_self">{{ "directives_js__LOGOUT"| translate }}</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
