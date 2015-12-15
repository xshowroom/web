<!DOCTYPE html>
<html  ng-app="xShowroom.user.message">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/angular-motion/dist/angular-motion.min.css">
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/message_list.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.tpl.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/user_message.js"></script>
	<script>var messageId = -1</script>
</head>
<body ng-controller="UserMessageCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<?php if($user["role_type"] == Business_User::ROLE_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'message', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Business_User::ROLE_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'message', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>

	<section class="row message">
		<div class="container">
			<!-- left nav -->
			<?php echo View::factory('common/global_navigation_user_center', array('currentPage' =>  'message')); ?>

			<div class="col-md-10 xs-user-center-content">
				<h2><?=__("user_message__MY_MESSAGES")?></h2>
				<div>
					<div class="xs-inbox-message-info">

					</div>
					<div class="table-responsive xs-inbox-message">
						<table class="table table-hover xs-table">
							<tbody>
							<?php foreach($messageList as $row): ?>
								<?php if((int)$row['status'] === Business_Message::MSG_STATUS_UNREADY): ?>
									<tr class="xs-inbox-unread">
								<?php else: ?>
									<tr class="xs-inbox-read">
								<?php endif; ?>
										<td class="xs-row xs-inbox-icon">
											<p>
												<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
											</p>
										</td>
										<td class="xs-row xs-inbox-content">
											<a href="<?= URL::site('message/detail/'.$row['id']); ?>">
												<p><?= $row['msg_body'] ?></p>
											</a>
										</td>
										<td class="xs-row xs-inbox-date hidden-sm hidden-xs">
											<p><?= $row['create_datetime'] ?></p>
										</td>
										<td class="xs-row xs-inbox-delete ">
											<p data-toggle="modal" class="xs-inbox-delete-icon" href="#modalDeleteConfirm" ng-click="clickMessage();">
												<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
												<input id="msg_id" type="hidden" value="<?= $row['id'] ?>">
											</p>
										</td>
									</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div>

					</div>
				</div>
		</div>
	</section>

	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>

	<!-- delete confirm -->
	<div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog">
		<div class="modal-dialog  modal-xs">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title"><?=__("user_message__modal__DELETE_CONFIRM")?></h4>
				</div>
				<div class="modal-body">
					<p><?=__("user_message__modal__DELETE_CONFIRM_DETAIL")?></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-type-1" data-dismiss="modal"><?=__("user_message__modal__btn_CLOSE")?></button>
					<button id='delete_inbox_msg' type="button" class="btn btn-type-2" ng-click="deleteMessage();"><?=__("user_message__modal__btn_DELETE")?></button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</body>
</html>