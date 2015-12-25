<!DOCTYPE html>
<html  ng-app="xShowroom.user.message">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/message_list.css" />
	<script type="text/javascript" src="/static/app/modules/user_message.js"></script>
	<script>var messageId =<?= $message['id'] ?></script>
</head>
<body ng-controller="UserMessageCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	
	<?php if($user["role_type"] == Business_User::ROLE_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'message', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif($user["role_type"] == Business_User::ROLE_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'message', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>
	
	<section class="row message">
		<div class="container">
			<!-- left nav -->
			<?php echo View::factory('common/global_navigation_user_center', array('currentPage' =>  'message')); ?>

			<div class="col-md-9 xs-user-center-content">
				<h2><?=__("user_message__MESSAGE_DETAIL")?></h2>
				<div>
					<div class="xs-inbox-message-bar">
						<ol class="breadcrumb">
							<li><a href="<?= URL::site('message') ?>"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> <?=__("user_message__RETURN_MESSAGE_CENTER")?></a></li>
							<li><a id="delete_msg" href="#modalDeleteConfirm" data-toggle="modal"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> <?=__("user_message__DELETE_MESSAGE")?></a></li>
						</ol>
					</div>
					<div class="xs-inbox-message-detail">
						<div>
							<h5><?=__("user_message__MESSAGE_FROM_ADMIN")?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $message['create_datetime'] ?></h5>
						</div>
						<div>
							<p><?= __($message['msg_body']) ?></p>
							<?php if(!empty($message['order_id'])): ?>
								1111
							<?php endif; ?>
						</div>
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