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
	<nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'message', 'userAttr'=> $userAttr)); ?>
	</nav>

	<section class="row message">
		<div class="container">
			<div class="row">
				<div class="col-md-12 xs-user-center-content">
					<h2>MY MESSAGES</h2>
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
											<td class="xs-inbox-icon">
												<p><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></p>
											</td>
											<td class="xs-inbox-content">
												<a href="<?= URL::site('message/detail/'.$row['id']); ?>">
													<p><?= $row['msg_body'] ?></p>
												</a>
											</td>
											<td class="xs-inbox-date  hidden-sm hidden-xs">
												<p><?= $row['create_datetime'] ?></p>
											</td>
											<td class="xs-inbox-delete">
												<a data-toggle="modal" class="kd-inbox-delete-icon" href="#modalDeleteConfirm">
													<p><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></p>
													<input id="msg_id" type="hidden" value="<?= $row['id'] ?>">
												</a>
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
		</div>
	</section>

	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>

	<!-- delete confirm -->
	<div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog">
		<div class="modal-dialog  modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">CONFIRM</h4>
				</div>
				<div class="modal-body">
					<p> DELETE THIS MESSAGE? </p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
					<button id='delete_inbox_msg' type="button" class="btn btn-primary">DELETE</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</body>
</html>