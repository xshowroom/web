<!DOCTYPE html>
<html  ng-app="xShowroom.user.message">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/message_list.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/user_message.js"></script>
</head>
<body ng-controller="UserMessageCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'message', 'userAttr'=> $userAttr)); ?>
	</nav>
	<section class="row message">
		<div class="container">
			<!-- left nav -->
			<?php echo View::factory('common/global_navigation_user_center'); ?>

			<div class="col-md-9 xs-user-center-content">
				<h2><?=__("user_message__MESSAGE_DETAIL")?></h2>
				<div>
					<div class="xs-inbox-message-bar">
						<ol class="breadcrumb">
							<li><a href="<?= URL::site('message') ?>"><?=__("user_message__RETURN_MESSAGE_CENTER")?></a></li>
							<li><a id="delete_msg" href="#modalDeleteConfirm" data-toggle="modal"><?=__("user_message__DELETE_MESSAGE")?><input id="msg_id" type="hidden" value="<?= $message['id'] ?>"></a></li>
						</ol>
					</div>
					<div class="xs-inbox-message-detail">
						<div>
							<h5><?=__("user_message__MESSAGE_FROM_ADMIN")?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $message['create_datetime'] ?></h5>
						</div>
						<div>
							<?= $message['msg_body'] ?>
						</div>
						<br>
						<br>
						<br>
						<br>
						<p><a href="<?= URL::site('message') ?>"><?=__("user_message__RETURN_MESSAGE_CENTER")?></a></p>
					</div>
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