<!DOCTYPE html>
<html  ng-app="xShowroom.buyer.cart">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/buyer_cart.css" />
	<script type="text/javascript" src="/static/app/modules/buyer_cart.js"></script>
</head>
<body ng-controller="BuyerCartCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer',
        	array('currentPage' =>  'cart', 'userAttr'=> $userAttr)); 
       	?>
	</nav>
	<section class="row" ng-cloak>
        <div class="container collection-list">
        	<div class="row">
                <div class="col-xs-12">
                    <div class="collection-list-header">
                        <h2 class="collection-list-title">ALL COLLECTIONS IN CART</h2>
                    </div>
                </div>
            </div>
        	<div class="row" ng-if="!collections.length">
                <div class="col-xs-12 text-center empty-warning">
                    <img src="/static/app/images/empty.png">
                    <p>哦，不是吧！ 您从未添加<br/>任何商品系列!</p>
                    <a class="btn btn-type-2" href="/shop">开始选货</a>
                </div>
            </div>
            <div class="collection-list-content row" ng-if="collections.length">
                <div class="col-xs-12" ng-repeat="record in collections">
                	<div class="collection-item">
	                  	<a ng-href="/collection/{{record.collectionInfo.id}}" class="col-xs-3 collection-cover image-link">
	                  		<img ng-src="/{{record.collectionInfo.cover_image_medium}}">
	                  	</a>
	                  	<div class="col-xs-7 collection-info">
	                  		<h3>{{record.brandName}} - {{record.collectionInfo.name}}</h3>
	                  		<div><span>Season:</span><span>{{record.collectionInfo.season | translate}}</span></div>
	                  		<div><span>Order Mode:</span><span>{{record.collectionInfo.mode | translate}}</span></div>
	                  		<div><span>Deadline for order:</span><span>{{record.collectionInfo.mode == 'dropdown__COLLECTION_MODE__PERMANENT' ? '无' : record.collectionInfo.deadline}}</span></div>
	                  		<div><span>Delivery Date:</span><span>{{record.collectionInfo.mode == 'dropdown__COLLECTION_MODE__PERMANENT' ? '按需发货' :record.collectionInfo.delivery_date}}</span></div>
	                  		<div><span>Min-order:</span><span>{{record.collectionInfo.currency}}{{record.collectionInfo.mini_order}}</span></div>
	                  		<div><span>Products In Cart:</span></div>
	                  		<div>
	                  			<a class="product-photo" ng-href="/product/{{product.id}}" ng-repeat="product in record.productions" >
	                  				<img class="product-photo"
	                  				ng-src="/{{product.small_image_url[0]}}">
	                  			</a>
	                  		</div>
	                  	</div>
	                  	<div class="col-xs-2 text-center cart-actions">
	                  		<a ng-href="/order/create/{{record.collectionInfo.id}}" class="btn btn-type-2">Generate Order</a>
	                  	</div>
	                  	<div class="clearfix"></div>
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