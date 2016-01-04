<!DOCTYPE html>
<html ng-app="xShowroom.order.index" ng-init="orderId='<?=$order['order_id']?>';">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    <?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/order_index.css" />
    <script type="text/javascript" src="/static/app/modules/order_index.js"></script>
</head>
<body ng-controller="OrderIndexCtrl" class="container-fluid" ng-cloak>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<?php if($user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'order', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'order', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Model_User::TYPE_USER_ADMIN): ?>
	<nav class="row guest-navigation" id="home-page-navigation">
		<?php echo View::factory('admin_views/admin_navigation_top_login', array('currentPage' => 'orders')); ?>
	</nav>
	<?php endif; ?>
    <section class="row">
        <div class="container order-info">
            <div class="row">
                <div class="col-xs-2">
                	<div class="order-cover">
                 		<img ng-src="/{{order.cover_image_medium}}">
                 	</div>
                </div>
                <div class="col-xs-10">
                 	<div class="col-xs-12 order-detail order-name">
                 		<h3>{{order.order_id}}</h3>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span><?=__("order_index__info_STORE");?></span><span>{{order.brand_name}} - {{order.shop_name}}</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span><?=__("order_index__info_BUYER");?></span><span>{{order.buyer_name}}</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span><?=__("order_index__info_SUBMITTED_DATE");?></span><span>{{order.buy_time}}</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span><?=__("order_index__info_DELIVERY_ADDRESS");?></span><span>{{order.shop_address}}</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span><?=__("order_index__info_TOTAL_AMOUNT");?></span><span>{{order.currency}}{{order.total_amount | number}}</span>
                 	</div>
                </div>
                <div class="col-xs-12">
					<div class="order-info-header">
						<h3><?=__("order_index__status_TITLE");?></h3>
					</div>
					<div class="order-status-list" ng-class="{'stock-collection': processes.length == 6}">
						<div class="order-status" ng-repeat="step in processes track by $index" ng-class="{'active': statusIndex >= $index}">
							<div>
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<span>{{"order_status__" + step | translate}}</span>
							</div>
						</div>
					</div>
						    
					<?php if ($order['order_status'] == Model_Order::ORDER_STATUS_PENDING && $user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
						<div class="order-status-actions">
							<div class="row">
								<label class="col-xs-2"><?=__("order_index__actions__INVOICE");?></label>
								<div class="col-xs-4" ng-if="!order.invoice_url">
									<input type="file" class="form-control" id="invoice-file" placeholder="ORDER INVOICE*">
								</div>
								<div class="col-xs-4" ng-if="order.invoice_url">
									<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
									<label class="upload-label">
										<span><?=__("order_index__actions__INVOICE_RE_SUMBMIT");?></span>
										<input type="file" class="form-control" id="invoice-file" placeholder="ORDER INVOICE*">
									</label>
								</div>
								<div class="col-xs-6 text-right">
									 <button class="btn btn-type-2" ng-click="updateInvoice();"><?=__("order_index__actions__btn_INVOICE_SUBMIT");?></button>
									 <!-- <button class="btn btn-type-1">取消订单</button> -->
								</div>
							</div>
						</div>
					<?php elseif ($order['order_status'] == Model_Order::ORDER_STATUS_PENDING && $user["role_type"] == Model_User::TYPE_USER_ADMIN): ?>
						<div class="order-status-actions">
							<div class="row">
								<label class="col-xs-2"><?=__("order_index__actions__INVOICE");?></label>
								<div class="col-xs-4">
									<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
								</div>
								<div class="col-xs-6 text-right">
									 <button class="btn btn-type-2" ng-click="updateStatus();"><?=__("order_index__actions__btn_ORDER_CONFIRM");?></button>
								</div>
							</div>
						</div>
					<?php elseif ($order['order_status'] == Model_Order::ORDER_STATUS_CONFIRMED && $user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
						<div class="order-status-actions">
							<div class="row">
								<label class="col-xs-2"><?=__("order_index__actions__INVOICE");?></label>
								<div class="col-xs-4">
									<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
								</div>
								<div class="col-xs-6 text-right">
									 <button class="btn btn-type-2" ng-click="updateStatus();"><?=__("order_index__actions__btn_DEPOSITED");?></button>
								</div>
							</div>
						</div>
					<?php elseif (($order['order_status'] == Model_Order::ORDER_STATUS_DEPOSITED || $order['order_status'] == Model_Order::ORDER_STATUS_FULLPAYMENT) 
							&& $user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
						<div class="order-status-actions">
							<div class="row">
								<label class="col-xs-2"><?=__("order_index__actions__INVOICE");?></label>
								<div class="col-xs-4">
									<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
								</div>
								<div class="col-xs-6 text-right">
									 <button class="btn btn-type-2" ng-click="updateStatus();"><?=__("order_index__actions__btn_PREPARING");?></button>
								</div>
							</div>
						</div>
					<?php elseif ($order['order_status'] == Model_Order::ORDER_STATUS_PREPARING && $user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
						<div class="order-status-actions">
							<div class="row">
								<label class="col-xs-2" for="shippingFee"><?=__("order_index__actions__SHIP_FEE");?> ( <?=__("order_index__actions__SHIP_FEE_UNIT");?> - {{order.currency}})</label>
								<div class="col-xs-4">
									<input type="text" class="form-control" id="shippingFee" ng-model="order.shipAmount">
								</div>
								<label class="col-xs-2"><?=__("order_index__actions__INVOICE");?></label>
								<div class="col-xs-4">
									<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
								</div>
								<label class="col-xs-2" for="comment">备注信息</label>
								<div class="col-xs-4">
									<input type="text" class="form-control" id="comment" ng-model="order.comment">
								</div>
								<div class="col-xs-6 text-right">
									 <button class="btn btn-type-2" ng-click="updateShipInfo();"><?=__("order_index__actions__btn_BALANCE_PAY");?></button>
								</div>
							</div>
						</div>
					<?php elseif ($order['order_status'] == Model_Order::ORDER_STATUS_PAYBALANCE && $user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
						<div class="order-status-actions">
							<div class="row">
							    <label class="col-xs-2"><?=__("order_index__actions__SHIP_FEE");?></label>
							    <div class="col-xs-4">
							    	<span>{{order.currency}}{{order.shipping_amount | number}}</span>
							    </div>
							    <label class="col-xs-2"><?=__("order_index__actions__INVOICE");?></label>
							    <div class="col-xs-4">
							    	<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
							    </div>
							    <label class="col-xs-2">备注信息</label>
							    <div class="col-xs-4">
							    	<span>{{order.comment}}</span>
							    </div>
							    <div class="col-xs-6 text-right">
								     <button class="btn btn-type-2" ng-click="updateStatus();"><?=__("order_index__actions__btn_SHIPPED");?></button>
								</div>
							</div>
						</div>
					<?php elseif ($order['order_status'] == Model_Order::ORDER_STATUS_SHIPPED && $user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
						<div class="order-status-actions">
							<div class="row">
								 <label class="col-xs-2" for="shippingNo"><?=__("order_index__actions__SHIP_NO");?></label>
								<div class="col-xs-4">
									<input type="text" class="form-control" id="shippingNo" ng-model="order.shipNo">
								</div>
								<label class="col-xs-2"><?=__("order_index__actions__SHIP_FEE");?></label>
								<div class="col-xs-4">
									<span>{{order.currency}}{{order.shipping_amount | number}}</span>
								</div>
								<label class="col-xs-2"><?=__("order_index__actions__INVOICE");?></label>
								<div class="col-xs-4">
									<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
								</div>
								<label class="col-xs-2">备注信息</label>
							    <div class="col-xs-4">
							    	<span>{{order.comment}}</span>
							    </div>
								<div class="col-xs-6 text-right">
									 <button class="btn btn-type-2"  ng-click="updateStatus();"><?=__("order_index__actions__btn_COMPLETE");?></button>
								</div>
							</div>
						</div>
					<?php elseif (($order['order_status'] == Model_Order::ORDER_STATUS_CONFIRMED  || $order['order_status'] == Model_Order::ORDER_STATUS_PAYBALANCE) 
						&& $user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
						<div class="order-status-actions">
							<div class="row">
								<?php if (!empty($adminAccount)):?>
								<div class="col-xs-12">
									<div class="admin-account-info">
										<h4><?=__("order_index__payment_TITLE");?></h4>
										<div><span><?=__("order_index__payment_REMITTANCE");?></span><span><?=PAYMENT_OFFLINE_REMITTANCE_TO?></span></div>
										<div><span><?=__("order_index__payment_BANK_NAME");?></span><span><?=PAYMENT_OFFLINE_BANK_NAME?></span></span></div>
										<div><span><?=__("order_index__payment_BANK_ACCOUTN");?></span><span><?=PAYMENT_OFFLINE_BANK_ACCOUNT?></span></div>
										<div><span><?=__("order_index__payment_BANK_PAYEE");?></span><span><?=PAYMENT_OFFLINE_BANK_PAYEE?></span></div>
										<div class="payment-tip">
											<span class="glyphicon glyphicon-info-sign"></span><?=__("order_index__payment_DESC_01")." ".ADMIN_EMAIL." ".__("order_index__payment_DESC_02");?>
										</div>
									</div>
								</div>
								<?php endif;?>
								<label class="col-xs-2"><?=__("order_index__actions__INVOICE");?></label>
								<div class="col-xs-4">
									<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
								</div>
							</div>
						</div>		
					<?php else: ?>
						<div class="order-status-actions">
							<div class="row">
								<label class="col-xs-2" ng-if="order.shipping_no"><?=__("order_index__actions__SHIP_NO");?></label>
								<div class="col-xs-4" ng-if="order.shipping_no">
									<span>{{order.shipping_no}}</span>
								</div>
								<label class="col-xs-2" ng-if="order.shipping_no"><?=__("order_index__actions__SHIP_FEE");?></label>
								<div class="col-xs-4" ng-if="order.shipping_no">
									<span>{{order.currency}}{{order.shipping_amount}}</span>
								</div>
								<label class="col-xs-2" ng-if="order.invoice_url"><?=__("order_index__actions__INVOICE");?></label>
								<div class="col-xs-4" ng-if="order.invoice_url">
									<a ng-href="/{{order.invoice_url}}" target="_blank">订单Invoice.PDF</a>
								</div>
								<label class="col-xs-2"  ng-if="order.comment">备注信息</label>
								<div class="col-xs-4">
								  	<span>{{order.comment}}</span>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
                <div class="col-xs-12">
					<div class="order-info-header">
						<h3><?=__("order_index__products_TITLE");?></h3>
					</div>
					<div class="order-product-list">
						<div class="order-product-item" ng-repeat="(productId, product) in order.productions">
							<div class="product-cover">
								<img ng-src="/{{product.image}}" />
							</div>
							<div class="product-info">
								<h4>{{::product.name}}</h4>
								<div>
									<span><?=__("order_index__products__STYLE_NUMBER");?></span><span>{{::product.styleNum}}</span>
								</div>
								<div>
									<span><?=__("order_index__products__RETAIL_PRICE");?></span><span>{{::order.currency}}{{::product.retailPrice| number}}</span>
								</div>
								<div>
									<span><?=__("order_index__products__WHOLE_PRICE");?></span><span>{{::order.currency}}{{::product.wholePrice| number}}</span>
								</div>
								<div>
									<span><?=__("order_index__products__SIZE_REGION");?></span><span>{{::product.sizeRegion}}</span>
								</div>
							</div>
							<table class="table quantity-info">
								<thead>
									<tr>
										<th><?=__("order_index__products__CODE_SIZE");?></th>
										<th ng-repeat="(size, value) in product.sizeCode">{{::size}}</th>
										<th></td>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="color in product.color">
										<td>{{::color.name}}</td>
										<td ng-repeat="(size, value) in product.sizeCode">
											{{::product.detail[color.name][size]}}
										</td>
										<td></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td><?=__("order_index__products__QUANTITY");?></td>
										<td>{{::product.quantity| number}}</td>
										<td colspan="{{product.size.length - 1}}"></td>
										<td><?=__("order_index__products__AMOUNT");?> {{::order.currency}}{{::(product.quantity * product.wholePrice)| number}}</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="order-total-info">
						<div>
							<span><?=__("order_index__products__TOTAL_QUANTITY");?> </span> <span>{{order.quantity| number}}</span>
						</div>
						<div class="text-right">
							<span><?=__("order_index__products__TOTAL_AMOUNT");?> </span> <span>{{order.currency}}{{order.total_amount| number}}</span>
						</div>
					</div>	
				</div>
            </div>
        </div>
    </section>
    <footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
    </footer>
</body>
</html>
