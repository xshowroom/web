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
	<?php if($user["role_type"] == Business_User::ROLE_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'order', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Business_User::ROLE_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'order', 'userAttr'=> $userAttr)); ?>
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
                 		<span>STORE:</span><span>{{order.brand_name}} - {{order.shop_name}}</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>BUYER:</span><span>{{order.buyer_name}}</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>SUBMITTED DATE:</span><span>{{order.buy_time}}</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>DELIVERY ADDRESS:</span><span>{{order.shop_address}}</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>TOTAL AMOUNT:</span><span>{{order.currency}}{{order.total_amount | number}}</span>
                 	</div>
                </div>
                <div class="col-xs-12">
					<div class="order-info-header">
						<h3>ORDER STATUS</h3>
					</div>
					<div class="order-status-list" ng-class="{'stock-collection': processes.length == 6}">
						<div class="order-status" ng-repeat="step in processes track by $index" ng-class="{'active': statusIndex >= $index}">
							<div>
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<span>{{step}}</span>
							</div>
						</div>
					</div>
						    
					<?php if ($user["role_type"] == Business_User::ROLE_BRAND && $order['order_status'] == 0): ?>
					<div class="order-status-actions">
						<div class="row">
						    <label class="col-xs-1">Invoice:</label>
						    <div class="col-xs-5" ng-if="!order.invoice_url">
						    	<input type="file" class="form-control" id="invoice-file" placeholder="ORDER INVOICE*">
						    </div>
						    <div class="col-xs-5" ng-if="order.invoice_url">
						    	<a ng-href="/{{order.invoice_url}}" target="_blank">{{order.invoice_url}}</a>
						    	<label class="upload-label">
						    		<span>重新上传</span>
						    		<input type="file" class="form-control" id="invoice-file" placeholder="ORDER INVOICE*">
						    	</label>
						    </div>
						    <div class="col-xs-6 text-right">
							     <button class="btn btn-type-2" ng-click="updateInvoice();">确认提交</button>
							     <!-- <button class="btn btn-type-1">取消订单</button> -->
							</div>
						</div>
					</div>
					<?php elseif ($user["role_type"] == Business_User::ROLE_BRAND && ($order['order_status'] == 1 || $order['order_status'] == 7)): ?>
					<div class="order-status-actions">
						<div class="row">
							<label class="col-xs-1">Invoice:</label>
						    <div class="col-xs-5">
						    	<a ng-href="/{{order.invoice_url}}" target="_blank">{{order.invoice_url}}</a>
						    </div>
						    <div class="col-xs-6 text-right">
							     <button class="btn btn-type-2" ng-click="updateStatus();">确认已收货款</button>
							</div>
						</div>
					</div>
					<?php elseif ($user["role_type"] == Business_User::ROLE_BRAND && $order['order_status'] == 2): ?>
					<div class="order-status-actions">
						<div class="row">
							<label class="col-xs-1">Invoice:</label>
						    <div class="col-xs-5">
						    	<a ng-href="/{{order.invoice_url}}" target="_blank">{{order.invoice_url}}</a>
						    </div>
						    <div class="col-xs-6 text-right">
							     <button class="btn btn-type-2" ng-click="updateStatus();">开始备货</button>
							</div>
						</div>
					</div>
					<?php elseif ($user["role_type"] == Business_User::ROLE_BRAND && $order['order_status'] == 3): ?>
					<div class="order-status-actions">
						<div class="row">
						    <label class="col-xs-1" for="shippingNo">Shipping No:</label>
						    <div class="col-xs-5">
						    	<input type="text" class="form-control" id="shippingNo" ng-model="order.shipNo">
						    </div>
						     <label class="col-xs-1" for="shippingFee">Shipping Fee:</label>
						    <div class="col-xs-5">
						    	<input type="text" class="form-control" id="shippingFee" ng-model="order.shipAmount">
						    </div>
						    <label class="col-xs-1">Invoice:</label>
						    <div class="col-xs-5">
						    	<a ng-href="/{{order.invoice_url}}" target="_blank">{{order.invoice_url}}</a>
						    </div>
						    <div class="col-xs-6 text-right">
							     <button class="btn btn-type-2" ng-click="updateShipInfo();">确认提交</button>
							</div>
						</div>
					</div>
					<?php elseif ($user["role_type"] == Business_User::ROLE_BRAND && $order['order_status'] == 4): ?>
					<div class="order-status-actions">
						<div class="row">
							<label class="col-xs-1">Shipping No:</label>
						    <div class="col-xs-5">
						    	<span>{{order.shipNo}}</span>
						    </div>
						    <label class="col-xs-1">Shipping Fee:</label>
						    <div class="col-xs-5">
						    	<span>{{order.shipAmount}}</span>
						    </div>
						    <label class="col-xs-1">Invoice:</label>
						    <div class="col-xs-5">
						    	<a ng-href="/{{order.invoice_url}}" target="_blank">{{order.invoice_url}}</a>
						    </div>
						    <div class="col-xs-12 text-right">
							     <button class="btn btn-type-2" ng-click="updateStatus();">确认发货</button>
							</div>
						</div>
					</div>
					<?php elseif ($user["role_type"] == Business_User::ROLE_BUYER && $order['order_status'] == 5): ?>
					<div class="order-status-actions">
						<div class="row">
							<label class="col-xs-1">Shipping No:</label>
						    <div class="col-xs-5">
						    	<span>{{order.shipNo}}</span>
						    </div>
						    <label class="col-xs-1">Shipping Fee:</label>
						    <div class="col-xs-5">
						    	<span>{{order.shipAmount}}</span>
						    </div>
						    <label class="col-xs-1">Invoice:</label>
						    <div class="col-xs-5">
						    	<a ng-href="/{{order.invoice_url}}" target="_blank">{{order.invoice_url}}</a>
						    </div>
						    <div class="col-xs-6 text-right">
							     <button class="btn btn-type-2"  ng-click="updateStatus();">确认收货</button>
							</div>
						</div>
					</div>
					<?php else: ?>
					<div class="order-status-actions">
						<div class="row">
						    <div class="col-xs-12 text-right">
								<label class="col-xs-1" ng-if="order.shipNo">Shipping No:</label>
							    <div class="col-xs-5" ng-if="order.shipNo">
							    	<span>{{order.shipNo}}</span>
							    </div>
							    <label class="col-xs-1" ng-if="order.shipAmount">Shipping Fee:</label>
							    <div class="col-xs-5" ng-if="order.shipAmount">
							    	<span>{{order.shipAmount}}</span>
							    </div>
							     <label class="col-xs-1" ng-if="order.invoice_url">Invoice:</label>
							    <div class="col-xs-5" ng-if="order.invoice_url">
							    	<a ng-href="/{{order.invoice_url}}" target="_blank">{{order.invoice_url}}</a>
							    </div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
                <div class="col-xs-12">
					<div class="order-info-header">
						<h3>PRODUCTS</h3>
					</div>
					<div class="order-product-list">
						<div class="order-product-item" ng-repeat="(productId, product) in order.productions">
							<div class="product-cover">
								<img ng-src="/{{product.image}}" />
							</div>
							<div class="product-info">
								<h4>{{::product.name}}</h4>
								<div>
									<span>Style Numnber:</span><span>{{::product.styleNum}}</span>
								</div>
								<div>
									<span>Retail Price:</span><span>{{::order.currency}}{{::product.retailPrice| number}}</span>
								</div>
								<div>
									<span>Whole Price:</span><span>{{::order.currency}}{{::product.wholePrice| number}}</span>
								</div>
								<div>
									<span>Size Region:</span><span>{{::product.sizeRegion}}</span>
								</div>
							</div>
							<table class="table quantity-info">
								<caption>ORDER DETAIL</caption>
								<thead>
									<tr>
										<th>CODE/SIZE</th>
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
										<td>QUANTITY</td>
										<td>{{::product.quantity| number}}</td>
										<td colspan="{{product.size.length - 1}}"></td>
										<td>AMOUNT: {{::order.currency}}{{::(product.quantity * product.wholePrice)| number}}</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="order-total-info">
						<div>
							<span>TOTAL QUANTITY: </span> <span>{{order.quantity| number}}</span>
						</div>
						<div class="text-right">
							<span>TOTAL AMOUNT: </span> <span>{{order.currency}}{{order.total_amount| number}}</span>
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
