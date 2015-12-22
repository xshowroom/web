<!DOCTYPE html>
<html ng-app="xShowroom.order.create"
	ng-init="collectionId=<?=$collection['id']?>; minOrder=<?=$collection['mini_order']?>;">
<head>
	<meta charset="UTF-8">
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/order_create.css" />
	<script type="text/javascript" src="/static/app/modules/order_create.js"></script>
</head>
<body ng-controller="OrderCreateCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login',
				array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', 
        		array('currentPage' =>  'cart', 'userAttr'=> $userAttr));?>
	</nav>
	<section class="row" ng-cloak>
		<div class="container" ng-show="generateOrderStep == 1;">
			<div class="row">
				<div class="col-xs-8 cart-details">
					<div class="cart-details-header">
						<h2 class="cart-details-title"><?=__("order_create__PRODUCTS")?></h2>
					</div>
					<div class="cart-product-list">
						<div class="cart-collection-info">
							<div class="col-xs-6">
								<h3 class="collection-name"><?=$collection['name']?></h3>
							</div>
							<div class="col-xs-6 text-right" ng-if="getRestAmount() > 0">
								<p class="cart-tips">
									<?=__("order_create__DESC_01")?> <span class="rest-amount"><?=$collection['currency']?>{{getRestAmount()}}</span>
									<?=__("order_create__DESC_02")?> <br /><?=__("order_create__DESC_03")?> <a
										href="/collection/<?=$collection['id']?>"><?=__("order_create__btn_VIEW_DETAIL")?></a>
								</p>
							</div>
						</div>
						<div class="cart-product-item" ng-repeat="product in products">
							<div class="product-cover">
								<img ng-src="/{{product.image}}" />
							</div>
							<div class="product-info">
								<h4>{{::product.name}}</h4>
								<div>
									<span><?=__("order_create__STYLE_NUMBER")?></span><span>{{::product.styleNum}}</span>
								</div>
								<div>
									<span><?=__("order_create__RETAIL_PRICE")?></span><span><?=$collection['currency']?>{{::product.retailPrice| number}}</span>
								</div>
								<div>
									<span><?=__("order_create__WHOLE_PRICE")?></span><span><?=$collection['currency']?>{{::product.wholePrice| number}}</span>
								</div>
								<div>
									<span><?=__("order_create__SIZE_REGION")?></span><span>{{::product.sizeRegion}}</span>
								</div>
							</div>
							<div class="product-actions">
								<button class="btn btn-type-1" ng-click="removeProductFromCart(product)"><?=__("order_create__btn_REMOVE")?></button>
							</div>
							<table class="table quantity-info">
								<caption><?=__("order_create__ORDER_DETAIL")?></caption>
								<thead>
									<tr>
										<th><?=__("order_create__CODE_SIZE")?></th>
										<th ng-repeat="(size, value) in product.sizeCode">{{::size}}</th>
										<th></td>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="color in product.color">
										<td>{{::color.name}}</td>
										<td ng-repeat="(size, value) in product.sizeCode">
											<input type="text" ng-model="quantities[product.id][color.name][size]"
												ng-keyup="validNumber(product.id, color.name, size);">
										</td>
										<td></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td><?=__("order_create__QUANTITY")?></td>
										<td>{{getQuantity(product.id) | number}}</td>
										<td colspan="{{product.size.length-1}}"></td>
										<td><?=__("order_create__AMOUNT")?><?=$collection['currency']?>{{getAmount(product.id, product.wholePrice) | number}}</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="cart-total-info">
						<div>
							<span><?=__("order_create__TOTAL_QUANTITY")?></span> <span>{{getTotalQuantity()| number}}</span>
						</div>
						<div class="text-right">
							<span><?=__("order_create__TOTAL_AMOUNT")?></span> <span><?=$collection['currency']?>{{getTotalAmount()| number}}</span>
						</div>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="check-out-box">
						<h3 class="text-center"><?=__("order_create__ORDER_SUMMARY")?></h3>
						<div>
							<span><?=__("order_create__PRODUCTS_COUNT")?></span><span>{{products.length| number}}</span>
						</div>
						<div>
							<span><?=__("order_create__TOTAL_QUANTITY")?></span><span>{{getTotalQuantity()| number}}</span>
						</div>
						<div>
							<span><?=__("order_create__TOTAL_AMOUNT")?></span><span><?=$collection['currency']?>{{getTotalAmount()| number}}</span>
						</div>
						<div class="text-center">
							<button class="btn btn-type-2" ng-click="checkout();"><?=__("order_create__btn_CHECKOUT")?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container" ng-show="generateOrderStep == 2;">
			<div class="row">
				<div class="col-xs-8 cart-details">
					<div class="cart-details-header">
						<h2 class="cart-details-title">SHIPPING ADDRESS</h2>
					</div>
					<div class="shipping-address">
						<div class="address-card" ng-repeat="store in stores">
							<h4>
								 <label><input type="radio" name="address" ng-value="store" ng-model="order.store" checked>{{store.name}}</label>
							</h4>
							<div class="address-info">
								<div><span>Type:</span><span>{{store.type | translate}}</span></div>
								<div><span>Address:</span><span>{{store.address}}</span></div>
								<div><span>Zip Code:</span><span>{{store.zip}}</span></div>
								<div><span>Phone:</span><span>{{store.telephone}}</span></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="cart-details-header">
						<h2 class="cart-details-title">PAYMENT OPTIONS</h2>
					</div>
					<div class="payment-options">
						<div class="radio">
						    <label><input type="radio" name="payment" value="offline" ng-model="order.paymentType" checked>OFFLINE PAYMENT</label>
						    <p>Remittance to XShowRoom account</p>
						</div>
					</div>
					<div class="cart-actions">
						<button class="btn btn-type-1" ng-click="generateOrderStep = 1;">PREVIOUS</button>
						<button class="btn btn-type-2" ng-click="setOptions();">NEXT</button>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="instruction-box">
						<h3 class="text-center">SOME INSTRUCTIONS</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container" ng-show="generateOrderStep == 3;">
			<div class="row">
				<div class="col-xs-8 cart-details">
					<div class="cart-details-header">
						<h2 class="cart-details-title">REVIEW YOUR ORDER</h2>
					</div>
					<div class="review-tips">
						<p>When you click the “SUBMIT” button, we’ll send you an email message acknowledging receipt your order.<br/>
						Your contact to purchase item will not be complete until we send you an email notifying you that the item has been shipped.</p>
					</div>
					<div class="order-details">
						<div class="order-details-header">
							<h4>PAYMENT & SHIPPING</h4>
							<a ng-click="generateOrderStep = 1;">change</a>
						</div>
						<div>
							<div class="order-address-info">
								<h5>SHIPPING ADDRESS</h5>
								<div>Store Name</div>
								<div>Buyer Name</div>
								<div>Buyer Address</div>
								<div>Zip Code</div>
								<div>Phone</div>
							</div>
							<div class="order-address-info">
								<h5>PAYMENT OPTIONS</h5>
								<div>Offline Pay</div>
								<div class="payment-warning">
									<div><i class="fa fa-exclamation"></i></div>
									<p>Please send your payment receipt to xshowroom@projectcrossover.cn in order to confirm your payment....</p>
								</div>
							</div>
							<div class="order-address-info">
								<h5>DELIVERY</h5>
								<div>{{collection.delivery_date}}</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="order-details-header">
							<h4>ORDER LIST</h4>
							<a ng-click="generateOrderStep = 2;">change</a>
						</div>
						<table class="table order-item-list">
							<thead>
								<tr>
									<th>PRODUCT NAME</th>
									<th>STYLE NO.</th>
									<th>COLOR</th>
									<th>SIZE</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="record in orderItems track by $index">
									<td>{{record.name}}</td>
									<td>{{record.styleNumber}}</td>
									<td>{{record.size_code}}</td>
									<td>{{record.color}}</td>
									<td>{{record.buy_num | number}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="check-out-box">
						<h3 class="text-center">ORDER SUMMARY</h3>
						<div>
							<span>PRODUCTS</span><span>{{products.length| number}}</span>
						</div>
						<div>
							<span>TOTAL QUANTITY</span><span>{{getTotalQuantity()| number}}</span>
						</div>
						<div>
							<span>TOTAL AMOUNT</span><span><?=$collection['currency']?>{{getTotalAmount()| number}}</span>
						</div>
						<div class="text-center">
							<button class="btn btn-type-2" ng-click="submitOrder();">SUBMIT</button>
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