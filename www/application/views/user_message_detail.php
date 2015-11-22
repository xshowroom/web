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
			<!-- left nav -->
			<?php echo View::factory('common/global_navigation_user_center'); ?>

			<div class="col-md-9 xs-user-center-content">
				<h2>MESSAGES</h2>
				<div>
					<div class="kd-inbox-message-info">
						<ol class="breadcrumb">
							<li><a href="<?= URL::site('message') ?>">RETURN MESSAGE CENTER</a></li>
							<li><a id="delete_msg" href="#modalDeleteConfirm" data-toggle="modal" class="kd-inbox-delete-icon">DELETE THIS MESSAGE<input id="msg_id" type="hidden" value="<?= $message['id'] ?>"></a></li>
						</ol>
					</div>
					<div class="kd-inbox-message-detail">
						<div>
							<h5>FROM: XSHOWROOM ADMIN&nbsp;&nbsp;&nbsp;DATE: <?= $message['create_datetime'] ?></h5>
						</div>
						<div>
							<div>
								<?= $message['msg_body'] ?>
							</div>
							<br>
							<br>
							<br>
							<p><a href="<?= URL::site('message') ?>">RETURN MESSAGE CENTER</a></p>
						</div>
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
					<h4 class="modal-title">CONFIRM</h4>
				</div>
				<div class="modal-body">
					<p> DELETE THIS MESSAGE? </p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-type-1" data-dismiss="modal">CLOSE</button>
					<button id='delete_inbox_msg' type="button" class="btn btn-type-2">DELETE</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script type="text/javascript">

		$(document).ready(function(){
			window.message_id = -1;

			$('.xs-inbox-delete-icon').click(function(){
				window.message_id = $(this).find('#msg_id').val();
			});

			$('#delete_inbox_msg').click(function(){
				$.ajax({
					url : "/ajax/message/delete",
					async: false,
					dataType:"json",
					data:{"id": window.message_id,"rnd": new Date().getTime()}
				});

				window.location.reload();
			})
		});

	</script>
</body>
</html>