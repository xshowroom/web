<!DOCTYPE html>
<html ng-app="xShowroom.order.create"
	ng-init="collectionId=<?=$collection['id']?>; minOrder=<?=$collection['mini_order']?>;">
<head>
	<meta charset="UTF-8">
	<title>XShowroom</title>
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/angular-motion/dist/angular-motion.min.css">
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/order_create.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-sanitize/angular-sanitize.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.tpl.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
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
	<section class="row no-vertical-padding" ng-cloak>
		<div class="container">
			<div class="row">
				<div class="col-xs-8 cart-details">
					<div class="cart-details-header">
						<h2 class="cart-details-title">PRODUCT IN CART</h2>
					</div>
					<div class="cart-product-list">
						<div class="cart-collection-info">
							<div class="col-xs-6">
								<h3 class="collection-name"><?=$collection['name']?></h3>
							</div>
							<div class="col-xs-6 text-right" ng-if="getRestAmount() > 0">
								<p class="cart-tips">
									ADD <span class="rest-amount"><?=$collection['currency']?>{{getRestAmount()}}</span>
									of this collection to<br />qualify for minimum order. <a
										href="/collection/<?=$collection['id']?>">View Detail</a>
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
									<span>Style Numnber:</span><span>{{::product.styleNum}}</span>
								</div>
								<div>
									<span>Retail Price:</span><span><?=$collection['currency']?>{{::product.retailPrice}}</span>
								</div>
								<div>
									<span>Whole Price:</span><span><?=$collection['currency']?>{{::product.wholePrice}}</span>
								</div>
								<div>
									<span>Size Region:</span><span>{{::product.sizeRegion}}</span>
								</div>
	
							</div>
							<table class="table quantity-info">
								<caption>ORDER DETAIL</caption>
								<thead>
									<tr>
										<td>CODE/SIZE</td>
										<td ng-repeat="(size, value) in product.sizeCode">{{::size}}</td>
										<td></td>
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
										<td>QUANTITY</td>
										<td>{{getQuantity(product.id)}}</td>
										<td colspan="{{product.size.length-1}}"></td>
										<td>AMOUNT: <?=$collection['currency']?>{{getAmount(product.id, product.wholePrice)}}</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="cart-total-info">
						<div>
							<span>TOTAL QUANTITY: </span> <span>{{getTotalQuantity()}}</span>
						</div>
						<div class="text-right">
							<span>TOTAL AMOUNT: </span> <span><?=$collection['currency']?>{{getTotalAmount()}}</span>
						</div>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="check-out-box">
						<h3 class="text-center">ONE CLICK TO ORDER</h3>
						<div>
							<span>PRODUCTS</span><span>{{products.length}}</span>
						</div>
						<div>
							<span>TOTAL QUANTITY</span><span>{{getTotalQuantity()}}</span>
						</div>
						<div>
							<span>TOTAL AMOUNT</span><span><?=$collection['currency']?>{{getTotalAmount()}}</span>
						</div>
						<div class="text-center">
							<button class="btn btn-type-2" ng-click="createOrder();">CHECK OUT</button>
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