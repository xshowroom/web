<!DOCTYPE html>
<html ng-app="xShowroom.order.create"
	ng-init="collectionId=<?=$collection['id']?>; minOrder=<?=$collection['mini_order']?>;brandId=<?=$collection['brand_id']?>;">
<head>
	<meta charset="UTF-8">
	<title><?=SITE_TITLE_PROFIX?> </title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/order_create.css" />
	<script type="text/javascript" src="/static/app/modules/order_create.js"></script>
</head>
<body ng-controller="OrderCreateCtrl" class="container-fluid top-button">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login',
				array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'cart', 'userAttr'=> $userAttr));?>
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
							<div class="col-xs-5">
								<h3 class="collection-name"><?=$collection['name']?></h3>
							</div>
							<div class="col-xs-7 text-right">
								<p class="cart-tips" ng-if="getRestAmount() > 0">
									<?=__("order_create__DESC_01")?> <span class="rest-amount"><?=$collection['currency']?>{{getRestAmount()}}</span> <?=__("order_create__DESC_02")?> <?=__("order_create__DESC_03")?>
								</p>
								<p class="cart-tips">
									<a target="_blank" href="/collection/<?=$collection['id']?>"><?=__("order_create__btn_VIEW_DETAIL")?></a>
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
						<h2 class="cart-details-title"><?=__("order_create__SHIPPING_ADDRESS");?></h2>
						<a ng-if="stores.length" data-toggle="modal" data-target="#auth-store-modal">申请新店铺</a>
					</div>
					<div class="shipping-address">
						<div class="address-card" ng-repeat="store in authStores">
							<h4>
								 <label><input type="radio" name="address" ng-value="store" ng-model="order.store" checked>{{store.name}}</label>
							</h4>
							<div class="address-info">
								<div><span><?=__("order_create__store_TYPE");?></span><span>{{store.type | translate}}</span></div>
								<div><span><?=__("order_create__store_ADDRESS");?></span><span>{{store.address}}</span></div>
								<div><span><?=__("order_create__store_ZIPCODE");?></span><span>{{store.zip}}</span></div>
								<div><span><?=__("order_create__store_TELEPHONE");?></span><span>{{store.telephone}}</span></div>
								<div><span><?=__("order_create__store_SHIP_ADDRESS");?></span><span>{{store.ship_address}}</span></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="cart-details-header">
						<h2 class="cart-details-title"><?=__("order_create__payment__TITLE");?></h2>
					</div>
					<div class="payment-options">
						<div class="radio">
						    <label><input type="radio" name="payment" value="offline" ng-model="order.paymentType" checked><?=__("order_create__payment__OPTIONS__OFFLINE_PAYMENT");?></label>
						    <p><?=__("order_create__payment__OPTIONS__OFFLINE_PAYMENT__DESC");?></p>
						</div>
					</div>
					<div class="cart-actions">
						<button class="btn btn-type-1" ng-click="generateOrderStep = 1;"><?=__("order_create__btn_PREVIOUS");?></button>
						<button class="btn btn-type-2" ng-click="setOptions();"><?=__("order_create__btn_NEXT");?></button>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="instruction-box">
						<h3 class="text-center"><?=__("order_create__INSTRUCTIONS");?></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container" ng-show="generateOrderStep == 3;">
			<div class="row">
				<div class="col-xs-8 cart-details">
					<div class="cart-details-header">
						<h2 class="cart-details-title"><?=__("order_create__review__TITLE");?></h2>
					</div>
					<div class="review-tips">
						<p>
							<?=__("order_create__review__DESC_01");?>
							<br/>
							<?=__("order_create__review__DESC_02");?>
						</p>
					</div>
					<div class="order-details">
						<div class="order-details-header">
							<h4><?=__("order_create__review__PAYMANET_SHIPPING");?></h4>
							<a ng-click="generateOrderStep = 2;"><?=__("order_create__btn_CHANGE");?></a>
						</div>
						<div>
							<div class="order-address-info">
								<h5>{{order.store.name}}</h5>
								<div><?=$userAttr['displayName']?></div>
								<div>{{order.store.address}}</div>
								<div>{{order.store.zip}}</div>
								<div>{{order.store.telephone}}</div>
							</div>
							<div class="order-address-info">
								<h5><?=__("order_create__review__PAYMENT_OPTION");?></h5>
								<div><?=__("order_create__review__PAYMENT_OPTION__OFFLINE_PAY");?></div>
								<div class="payment-warning">
									<div><i class="fa fa-exclamation"></i></div>
									<p><?=__("order_create__review__PAYMENT_OPTION__OFFLINE_PAY_DESC");?></p>
								</div>
							</div>
							<div class="order-address-info">
								<h5><?=__("order_create__review__DELIVERY");?></h5>
								<div>{{collection.delivery_date}}</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="order-details-header">
							<h4><?=__("order_create__review__ORDER_LIST");?></h4>
							<a ng-click="generateOrderStep = 1;"><?=__("order_create__btn_CHANGE");?></a>
						</div>
						<table class="table order-item-list">
							<thead>
								<tr>
									<th><?=__("order_create__review__ORDER_LIST__PRODUCT");?></th>
									<th><?=__("order_create__review__ORDER_LIST__NO");?></th>
									<th><?=__("order_create__review__ORDER_LIST__COLOR");?></th>
									<th><?=__("order_create__review__ORDER_LIST__SIZE");?></th>
									<th><?=__("order_create__review__ORDER_LIST__TOTAL");?></th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="record in orderItems track by $index">
									<td>{{record.name}}</td>
									<td>{{record.styleNumber}}</td>
									<td>{{record.color}}</td>
									<td>{{record.sizeCode}}</td>
									<td>{{record.buyNum * record.wholePrice | number}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="check-out-box">
						<h3 class="text-center"><?=__("order_create__review__ORDER_SUMMARY");?></h3>
						<div>
							<span><?=__("order_create__review__ORDER_SUMMARY__PRODUCTS");?></span><span>{{products.length| number}}</span>
						</div>
						<div>
							<span><?=__("order_create__review__ORDER_SUMMARY__TOTAL_QUANTITY");?></span><span>{{getTotalQuantity()| number}}</span>
						</div>
						<div>
							<span><?=__("order_create__review__ORDER_SUMMARY__TOTAL_AMOUNT");?></span><span><?=$collection['currency']?>{{getTotalAmount()| number}}</span>
						</div>
						<div class="text-center">
							<button class="btn btn-type-2" ng-click="submitOrder();"><?=__("order_create__btn_SUBMIT");?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
	
	<div class="modal fade" id="auth-store-modal" tabindex="-1" role="dialog" aria-labelledby="auth-store-modal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
	      		<div class="modal-body">
		       		<h4><?=__('brand_store_application__TITLE')?></h4>
		       		<p><?=__('brand_store_application__BODY')?></p>
		       		<div>
		       			<div class="checkbox" ng-repeat="store in stores track by $index">
							<label>
								<input type="checkbox" name="authStore" ng-value="store" ng-click="selectStore(store)">
								<span>{{store.name}}</span>
							</label>
						</div>
		       		</div>
		       		<div>
						<button class="btn btn-type-1" ng-click="applyAuth()"><?=__('brand_store_application__btn_APPLY')?></button>
		       			<button class="btn btn-type-1" data-dismiss="modal"><?=__('brand_store_application__btn_CANCEL')?></button>
		       		</div>
	      		</div>
	    	</div>
		</div>
    </div>
</body>
</html>
