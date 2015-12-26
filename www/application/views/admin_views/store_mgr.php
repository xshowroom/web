<!DOCTYPE html>
<html ng-app="xShowroom.admin">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/admin.css" />
	<script type="text/javascript" src="/static/app/modules/admin_store_mgr.js"></script>
    <script>
        var mapId = -1;
    </script>
</head>
<body ng-controller="AdminStoreMgrCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('admin_views/admin_setting_with_login', array('user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation" id="home-page-navigation">
        <?php echo View::factory('admin_views/admin_navigation_top_login', array('currentPage' => 'stores')); ?>
	</nav>
	<section class="row admin-content">
		<div class="container">
			<div class="row">
				<h2>PENDING STORES</h2>
				<table class="table table-hover xs-table">
					<tbody>
					<tr>
						<th class="xs-table-th" style="width: 60px;">ID</th>
						<th class="xs-table-th">STORE ADDRESS</th>
						<th class="xs-table-th" style="width: 150px;">STORE NAME</th>
						<th class="xs-table-th" style="width: 200px;">BRAND</th>
						<th class="xs-table-th" style="width: 150px;">APPLY TIME</th>
						<th class="xs-table-th" style="width: 120px;">DETAIL</th>
						<th class="xs-table-th" style="width: 100px;">ALLOW</th>
						<th class="xs-table-th" style="width: 100px;">REJECT</th>
					</tr>
					<?php foreach($pending_shop_list as $row): ?>
						<tr>
							<td class="xs-row">
								<p><?= $row['id'] ?></p>
							</td>
							<td class="xs-row">
								<a href="<?=URL::site('xsadmin/management/user_detail/'.$row['id']);?>" target="_blank">
									<p><?= $row['shop_info']['address'] ?></p>
								</a>
							</td>
							<td class="xs-row">
								<p><?= $row['shop_info']['name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['brand_info']['brand_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['update_time'] ?></p>
							</td>
							<td class="xs-row">
								<a href="<?=URL::site('xsadmin/management/shop_detail/'.$row['id']);?>" target="_blank">
									<p>VIEW STORE</p>
								</a>
							</td>
							<td class="xs-row xs-row-action">
								<a data-toggle="modal" href="#modalAllowConfirm" ng-click=<?= "clickStore(".$row['id'].")";?> >
									<p>ALLOW</p>
								</a>
							</td>
							<td class="xs-row">
								<a data-toggle="modal" href="#modalRejectConfirm" ng-click=<?= "clickStore(".$row['id'].")";?> >
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

    <!-- allow confirm -->
    <div class="modal fade" id="modalAllowConfirm" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">CONFIRM</h4>
                </div>
                <div class="modal-body">
                    <p>APPROVE THIS STORE'S APPLICATION?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-type-1" data-dismiss="modal">CANCEL</button>
                    <button id='delete_inbox_msg' type="button" class="btn btn-type-2" ng-click="adminAllowStore();">APPROVE</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- reject confirm -->
    <div class="modal fade" id="modalRejectConfirm" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">CONFIRM</h4>
                </div>
                <div class="modal-body">
                    <p>REJECT THIS STORE'S APPLICATION?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-type-1" data-dismiss="modal">CANCEL</button>
                    <button id='delete_inbox_msg' type="button" class="btn btn-type-2" ng-click="adminRejectStore();">REJECT</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
</html>