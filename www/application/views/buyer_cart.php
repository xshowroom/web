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
                        <h2 class="collection-list-title"><?=__("buyer_cart__TITLE");?></h2>
                    </div>
                </div>
            </div>
        	<div class="row" ng-if="!collections.length">
                <div class="col-xs-12 text-center empty-warning">
                    <img src="/static/app/images/empty.png">
                    <p><?=__("buyer_cart__NO_ITEM_01");?></p>
                    <a class="btn btn-type-2" href="/shop"><?=__("buyer_cart__NO_ITEM_02");?></a>
                </div>
            </div>
            <div class="collection-list-content row" ng-if="collections.length">
                <div class="col-xs-12" ng-repeat="record in collections">
                	<div class="collection-item">
	                  	<a ng-href="/collection/{{record.collectionInfo.id}}" class="col-xs-2 collection-cover image-link">
	                  		<img ng-src="/{{record.collectionInfo.cover_image_medium}}">
	                  	</a>
	                  	<div class="col-xs-10 collection-info">
	                  		<div class="row">
	                  			<div class="col-xs-12">
	                  				<div class="collection-info-header">
			                  			<h3>{{record.brandName}} - {{record.collectionInfo.name}}</h3>
		                  			</div>
		                  		</div>
			                  	<div class="col-xs-4"><span><?=__("buyer_cart__SEASON");?></span><span>{{record.collectionInfo.season | translate}}</span></div>
			                  	<div class="col-xs-4"><span><?=__("buyer_cart__ORDER_MODE");?></span><span>{{record.collectionInfo.mode | translate}}</span></div>
			                  	<div class="col-xs-4"><span><?=__("buyer_cart__DEADLINE");?></span><span>{{record.collectionInfo.mode == 'dropdown__COLLECTION_MODE__PERMANENT' ? '' : record.collectionInfo.deadline}}</span></div>
			                  	<div class="col-xs-4"><span><?=__("buyer_cart__DELIVERY_DATE");?></span><span>{{record.collectionInfo.mode == 'dropdown__COLLECTION_MODE__PERMANENT' ? '' :record.collectionInfo.delivery_date}}</span></div>
			                  	<div class="col-xs-4"><span><?=__("buyer_cart__MIN_ORDER");?></span><span>{{record.collectionInfo.currency}}{{record.collectionInfo.mini_order| number}}</span></div>
		                  		<div class="col-xs-12">
			                  		<a class="product-photo" ng-href="/product/{{product.id}}" target="_blank" ng-repeat="product in record.productions | limitTo: 12" >
			                  			<img ng-src="/{{product.small_image_url[0]}}">
			                  		</a>
			                  	</div>
			                  	<div class="col-xs-12">
			                  		<a ng-href="/order/create/{{record.collectionInfo.id}}" class="btn btn-type-2"><?=__("buyer_cart__btn_GENERATE");?></a>
			                  	</div>
		                  	</div>
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