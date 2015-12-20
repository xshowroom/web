<!DOCTYPE html>
<html ng-app="xShowroom.order.index">
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
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Business_User::ROLE_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>
    <section class="row">
        <div class="container order-info">
            <div class="row">
                <div class="col-xs-2">
                	<div class="order-cover">
                 		<img src="/static/app/images/shop-brand-1.png">
                 	</div>
                </div>
                <div class="col-xs-10">
                 	<div class="col-xs-12 order-detail order-name">
                 		<h3>A12312301239123</h3>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>STORE:</span><span>STORE NUMBER A</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>BUYER:</span><span>BUYER NAME</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>SUBMITTED DATE:</span><span>2015-12-31</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>TOTAL AMOUNT:</span><span>$2312</span>
                 	</div>
                 	<div class="col-xs-12 order-detail">
                 		<span>DELIVERY ADDRESS:</span><span>No.900, YISHAN ROAD, SHANGHAI, CHINA</span>
                 	</div>
                </div>
                <div class="col-xs-12">
					<div class="order-info-header">
						<h3>ORDER STATUS</h3>
					</div>
					<div class="order-status-list">
						<div class="order-status active">
							<div>
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<span>PENDING</span>
							</div>
						</div>
						<div class="order-status">
							<div>
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<span>DEPOSIT</span>
							</div>
						</div>
						<div class="order-status">
							<div>
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<span>PREPARING</span>
							</div>
						</div>
						<div class="order-status">
							<div>
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<span>BALANCE PAYMENT</span>
							</div>
						</div>
						<div class="order-status">
							<div>
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<span>SHIPPING</span>
							</div>
						</div>
						<div class="order-status">
							<div>
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div>
								<span>COMPLETE</span>
							</div>
						</div>
					</div>
				</div>
                <div class="col-xs-12">
					<div class="order-info-header">
						<h3>PRODUCTS</h3>
					</div>
					<div class="order-product-list">
						<div class="order-product-item">
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
										<th>CODE/SIZE</th>
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
										<td>QUANTITY</td>
										<td>{{getQuantity(product.id)}}</td>
										<td colspan="{{product.size.length-1}}"></td>
										<td>AMOUNT: <?=$collection['currency']?>{{getAmount(product.id, product.wholePrice)}}</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="order-total-info">
						<div>
							<span>TOTAL QUANTITY: </span> <span>{{getTotalQuantity()}}</span>
						</div>
						<div class="text-right">
							<span>TOTAL AMOUNT: </span> <span><?=$collection['currency']?>{{getTotalAmount()}}</span>
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
