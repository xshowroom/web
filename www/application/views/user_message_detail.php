<!DOCTYPE html>
<html  ng-app="xShowroom.user.message">
<head>
	<meta charset="UTF-8" >
	<title><?=SITE_TITLE_PROFIX?> </title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/order_index.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/message_list.css" />
	<script type="text/javascript" src="/static/app/modules/user_message.js"></script>
	<script>var messageId =<?= $message['id'] ?></script>
</head>
<body ng-controller="UserMessageCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	
	<?php if($user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'message', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif($user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
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

						<div class="container">
							<?= __($message['msg_body']) ?>
						</div>
						<?php if(!empty($message['order_id'])): ?>
							<div class="container order-info">
								<div class="row">
									<div class="col-xs-2">
										<div class="order-cover">
											<img ng-src="/<?= $order['cover_image_medium'] ?>">
										</div>
									</div>
									<div class="col-xs-10">
										<div class="col-xs-12 order-detail order-name">
											<h3><?= $order['order_id'] ?> - {{"order_status__" + "<?= $message['order_status'] ?>"|translate}}</h3>
										</div>
										<div class="col-xs-12 order-detail">
											<span><?=__("order_index__info_STORE");?></span><span><?= $order['brand_name'] ?> - <?= $order['shop_name'] ?></span>
										</div>
										<div class="col-xs-12 order-detail">
											<span><?=__("order_index__info_BUYER");?></span><span><?= $order['buyer_name'] ?></span>
										</div>
										<div class="col-xs-12 order-detail">
											<span><?=__("order_index__info_SUBMITTED_DATE");?></span><span><?= $order['buy_time'] ?></span>
										</div>
										<div class="col-xs-12 order-detail">
											<span><?=__("order_index__info_DELIVERY_ADDRESS");?></span><span><?= $order['shop_address'] ?></span>
										</div>
										<div class="col-xs-12 order-detail">
											<span><?=__("order_index__info_TOTAL_AMOUNT");?></span><span><?= $order['currency'] ?>{{"<?= $order['total_amount'] ?>"| number}}</span>
										</div>
										<div class="col-xs-12 order-detail" style="padding-top: 10px">
											<a ng-href="/order/<?= $order['order_id'] ?>" target="_self" class=""><?=__("order_list__btn_VIEW")?></a>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>

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