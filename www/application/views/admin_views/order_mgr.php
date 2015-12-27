<!DOCTYPE html>
<html ng-app="xShowroom.admin">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/admin.css" />
	<script type="text/javascript" src="/static/app/modules/admin_order_mgr.js"></script>
	<script>var orderId = -1;</script>
</head>
<body ng-controller="AdminOrderMgrCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('admin_views/admin_setting_with_login', array('user'=> $user)); ?>
	</nav>
	<nav class="row guest-navigation" id="home-page-navigation">
        <?php echo View::factory('admin_views/admin_navigation_top_login', array('currentPage' => 'orders')); ?>
	</nav>
	<section class="row admin-content">
		<div class="container">
			<div class="row">
				<h2>PENDING ORDERS <span>(Admin should check the invoice and confirm order)</span></h2>
				<table class="table table-hover xs-table">
					<tbody>
					<tr>
						<th class="xs-table-th" style="width: 50px;">ID</th>
						<th class="xs-table-th" style="width: 150px;">STATUS</th>
						<th class="xs-table-th" style="width: 150px;">BRAND</th>
						<th class="xs-table-th">Collection</th>
						<th class="xs-table-th" style="width: 100px;">BUYER</th>
						<th class="xs-table-th" style="width: 100px;">AMOUNT</th>
						<th class="xs-table-th" style="width: 150px;">ORDER TIME</th>
						<th class="xs-table-th" style="width: 150px;">UPDATE TIME</th>
						<th class="xs-table-th" style="width: 120px;">DETAIL INFO</th>
					</tr>
					<?php foreach($pending_order_list as $row): ?>
						<tr>
							<td class="xs-row">
								<p><?= $row['id'] ?></p>
							</td>
							<td class="xs-row">
								<p>{{ "order_status__" + <?=$row['order_status']?>| translate}}</p>
							</td>
							<td class="xs-row">
								<p><?= $row['brand_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['collection_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['buyer_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['currency'] ?>{{"<?= $row['total_amount'] ?>"| number}}</p>
							</td>
							<td class="xs-row">
								<p><?= $row['buy_time'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['update_time'] ?></p>
							</td>
							<td class="xs-row xs-row-action">
								<a href="<?=URL::site('order/'.$row['order_id']);?>" target="_blank">
									<p>VIEW ORDER</p>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<h2>CONFIRMED ORDERS <span>(Admin should check payment and transfer to brand)</span></h2>
				<table class="table table-hover xs-table">
					<tbody>
					<tr>
						<th class="xs-table-th" style="width: 50px;">ID</th>
						<th class="xs-table-th" style="width: 150px;">STATUS</th>
						<th class="xs-table-th" style="width: 150px;">BRAND</th>
						<th class="xs-table-th">Collection</th>
						<th class="xs-table-th" style="width: 100px;">BUYER</th>
						<th class="xs-table-th" style="width: 100px;">AMOUNT</th>
						<th class="xs-table-th" style="width: 150px;">ORDER TIME</th>
						<th class="xs-table-th" style="width: 150px;">UPDATE TIME</th>
						<th class="xs-table-th" style="width: 120px;">DETAIL INFO</th>
					</tr>
					<?php foreach($confirmed_order_list as $row): ?>
						<tr>
							<td class="xs-row">
								<p><?= $row['id'] ?></p>
							</td>
							<td class="xs-row">
								<p>{{ "order_status__" + <?=$row['order_status']?>| translate}}</p>
							</td>
							<td class="xs-row">
								<p><?= $row['brand_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['collection_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['buyer_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['currency'] ?>{{"<?= $row['total_amount'] ?>"| number}}</p>
							</td>
							<td class="xs-row">
								<p><?= $row['buy_time'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['update_time'] ?></p>
							</td>
							<td class="xs-row xs-row-action">
								<a href="<?=URL::site('order/'.$row['order_id']);?>" target="_blank">
									<p>VIEW ORDER</p>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<h2>BALANCE PAYMENT ORDERS <span>(Admin should check payment and transfer to brand)</span></h2>
				<table class="table table-hover xs-table">
					<tbody>
					<tr>
						<th class="xs-table-th" style="width: 50px;">ID</th>
						<th class="xs-table-th" style="width: 150px;">STATUS</th>
						<th class="xs-table-th" style="width: 150px;">BRAND</th>
						<th class="xs-table-th">Collection</th>
						<th class="xs-table-th" style="width: 100px;">BUYER</th>
						<th class="xs-table-th" style="width: 100px;">AMOUNT</th>
						<th class="xs-table-th" style="width: 150px;">ORDER TIME</th>
						<th class="xs-table-th" style="width: 150px;">UPDATE TIME</th>
						<th class="xs-table-th" style="width: 120px;">DETAIL INFO</th>
					</tr>
					<?php foreach($balance_payment_order_list as $row): ?>
						<tr>
							<td class="xs-row">
								<p><?= $row['id'] ?></p>
							</td>
							<td class="xs-row">
								<p>{{ "order_status__" + <?=$row['order_status']?>| translate}}</p>
							</td>
							<td class="xs-row">
								<p><?= $row['brand_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['collection_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['buyer_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['currency'] ?>{{"<?= $row['total_amount'] ?>"| number}}</p>
							</td>
							<td class="xs-row">
								<p><?= $row['buy_time'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['update_time'] ?></p>
							</td>
							<td class="xs-row xs-row-action">
								<a href="<?=URL::site('order/'.$row['order_id']);?>" target="_blank">
									<p>VIEW ORDER</p>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<h2>FULL PAYMENT ORDERS <span>(Admin should check payment and transfer to brand)</span></h2>
				<table class="table table-hover xs-table">
					<tbody>
					<tr>
						<th class="xs-table-th" style="width: 50px;">ID</th>
						<th class="xs-table-th" style="width: 150px;">STATUS</th>
						<th class="xs-table-th" style="width: 150px;">BRAND</th>
						<th class="xs-table-th">Collection</th>
						<th class="xs-table-th" style="width: 100px;">BUYER</th>
						<th class="xs-table-th" style="width: 100px;">AMOUNT</th>
						<th class="xs-table-th" style="width: 150px;">ORDER TIME</th>
						<th class="xs-table-th" style="width: 150px;">UPDATE TIME</th>
						<th class="xs-table-th" style="width: 120px;">DETAIL INFO</th>
					</tr>
					<?php foreach($full_payment_order_list as $row): ?>
						<tr>
							<td class="xs-row">
								<p><?= $row['id'] ?></p>
							</td>
							<td class="xs-row">
								<p>{{ "order_status__" + <?=$row['order_status']?>| translate}}</p>
							</td>
							<td class="xs-row">
								<p><?= $row['brand_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['collection_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['buyer_name'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['currency'] ?>{{"<?= $row['total_amount'] ?>"| number}}</p>
							</td>
							<td class="xs-row">
								<p><?= $row['buy_time'] ?></p>
							</td>
							<td class="xs-row">
								<p><?= $row['update_time'] ?></p>
							</td>
							<td class="xs-row xs-row-action">
								<a href="<?=URL::site('order/'.$row['order_id']);?>" target="_blank">
									<p>VIEW ORDER</p>
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