<!DOCTYPE html>
<html  ng-app="xShowroom.buyer.cart">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/angular-motion/dist/angular-motion.min.css">
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/buyer_cart.css" />
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
	 <section class="row no-vertical-padding" ng-cloak>
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
	                  		<div><span>Deadline for order:</span><span>{{record.collectionInfo.deadline}}</span></div>
	                  		<div><span>Delivery Date:</span><span>{{record.collectionInfo.delivery_date}}</span></div>
	                  		<div><span>Min-order:</span><span>{{record.collectionInfo.currency}}{{record.collectionInfo.mini_order}}</span></div>
	                  		<div><span>Products In Cart:</span></div>
	                  		<div>
	                  			<a class="product-photo" ng-repeat="product in record.productions" >
	                  				<img class="product-photo"
	                  				ng-src="/{{product.small_image_url[0]}}">
	                  			</a>
	                  		</div>
	                  	</div>
	                  	<div class="col-xs-2 text-center cart-actions">
	                  		<button class="btn btn-type-2">Generate Order</button>
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