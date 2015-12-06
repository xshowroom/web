<!DOCTYPE html>
<html ng-app="xShowroom.admin.userMgr">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/admin.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/admin_user_mgr.js"></script>
</head>
<body ng-controller="AdminUserMgrCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('admin_views/admin_setting_with_login', array('user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation"  id="home-page-navigation">
        <?php echo View::factory('admin_views/admin_navigation_top_login', array('currentPage' => 'users')); ?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row">
				<h2>PENDING USERS</h2>
				<table class="table table-hover xs-table">
					<tbody>
					<?php foreach($pending_use_list as $row): ?>
						<tr>
							<td class="xs-row" style="width: 60px;">
								<p><?= $row['id'] ?></p>
							</td>
							<td class="xs-row">
								<a href="<?= URL::site('message/detail/'.$row['id']); ?>">
									<p><?= $row['email'] ?></p>
								</a>
							</td>
							<td class="xs-row" style="width: 100px;">
								<p>
									<?php if($row['role_type'] == Business_User::ROLE_BRAND): ?>
									<?='BRAND'?>
									<?php elseif($row['role_type'] == Business_User::ROLE_BUYER): ?>
									<?='BUYER'?>
									<?php endif ?>
								</p>
							</td>
							<td class="xs-row">
								<p><?= $row['modify_date'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['register_date'] ?></p>
							</td>
							<td class="xs-row xs-row-action" style="width: 100px;">
								<a>
									<p>ALLOW</p>
								</a>
							</td>
							<td class="xs-row xs-row-action" style="width: 100px;">
								<a>
									<p>REJECT</p>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>