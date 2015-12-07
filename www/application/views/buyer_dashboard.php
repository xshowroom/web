<!DOCTYPE html>
<html  ng-app="xShowroom.buyer.dashboard">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    
    <link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/buyer_dashboard.css" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/services.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
    <script type="text/javascript" src="/static/app/modules/buyer_dashboard.js"></script>
</head>
<body ng-controller="BuyerDashboardCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer',
            array('currentPage' =>  'dashboard', 'userAttr'=> $userAttr)); 
        ?>
    </nav>
    <?php var_dump($userAttr)?>
    <?php var_dump($user)?>
    <section class="row no-vertical-padding">
        <div class="container brand-banner">
            <div class="row">
                <div class="col-xs-12">
                    <div class="brand-logo">
                        <img src="/<?= $userAttr['display_name']?>">
                    </div>
                    <div class="brand-info">
                        <h3 class="brand-name"><?= $userAttr['display_name'] ?></h3>
                        <div class="brand-detail">
                            <span >Interested brands</span>
                            <span>{{ "<?= $userAttr['company_country'] ?>" | translate}}</span>
                        </div>
                        <div class="brand-detail">
                            <span>Last time visit</span>
                            <span><?= date('Y', strtotime($user['last_login_time'])) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row no-vertical-padding">
        <div class="container brand-list">
        	<div class="row">
                <div class="col-xs-12">
                    <div class="brand-list-header">
                        <h2 class="brand-list-title">MY BRANDS</h2>
                        <a class="brand-list-all-link" href="/buyer/brand">ALL BRANDS ></a>
                    </div>
                </div>
            </div>
        	<?php if (empty($collectionList)) { ?>
        	 <div class="row">
                <div class="col-xs-12 text-center empty-warning">
                    <img src="/static/app/images/empty.png">
                    <p>Welcome to XShowroom!<br/>Start your business with <a href="/shop">Explore Brands</a>.</p>
                </div>
            </div>
            <?php } else {?>
            <div class="brand-list-content row">
            	<?php
            		for ($i=0, $count=count($collectionList); $i<$count; $i++) { 
            	?>
                <div class="col-xs-3">
                    <a target="_self" href="/collection/<?= $collectionList[$i]['id']?>" class="collection-item">
                        <img src="/<?= $collectionList[$i]['cover_image_medium']?>" class="collection-item-image">
                        <div class="collection-name"><?= $collectionList[$i]['name']?></div>
                    </a>
                </div>
                <?php }?>
            </div>
            <?php }?>
        </div>
        
    </section>
    <section class="row no-vertical-padding">
        <div class="container order-list">
            <div class="row">
                <div class="col-xs-12">
                    <div class="order-list-header">
                        <h2 class="order-list-title">MY ORDERS</h2>
                        <a class="order-list-all-link" href="#">ALL ORDERS ></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center empty-warning">
                    <img src="/static/app/images/empty.png">
                    <p>Cannot find what you like?<br/>More and more brands are joining us. <a href="/shop">Explore Now.</a></p>
                    <span><?= __("brand_dashboard__ORDER_EMPTY_3"); ?></span>
                </div>
            </div>
            <div class="order-list-content row" ng-if="false">
                <div class="col-xs-3">
                    <a target="_blank" href="#" class="order-item">
                        <div class="order-images">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-image">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-sub-image">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-sub-image">
                        </div>
                        <div class="order-detail">
                            <div>A14712391230</div>
                            <div>Submitted 2015-09-01</div>
                            <div>Order amount: $343</div>
                        </div>
                        <div class="order-status">
                            <span>PENDING</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-3">
                    <a target="_blank" href="#" class="order-item">
                        <div class="order-images">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-image">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-sub-image">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-sub-image">
                        </div>
                        <div class="order-detail">
                            <div>A14712391230</div>
                            <div>Submitted 2015-09-01</div>
                            <div>Order amount: $343</div>
                        </div>
                        <div class="order-status">
                            <span>PENDING</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-3">
                    <a target="_blank" href="#" class="order-item">
                        <div class="order-images">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-image">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-sub-image">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-sub-image">
                        </div>
                        <div class="order-detail">
                            <div>A14712391230</div>
                            <div>Submitted 2015-09-01</div>
                            <div>Order amount: $343</div>
                        </div>
                        <div class="order-status">
                            <span>PENDING</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-3">
                    <a target="_blank" href="#" class="order-item">
                        <div class="order-images">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-image">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-sub-image">
                            <img src="/static/app/images/shop-brand-1.png" class="order-item-sub-image">
                        </div>
                        <div class="order-detail">
                            <div>A14712391230</div>
                            <div>Submitted 2015-09-01</div>
                            <div>Order amount: $343</div>
                        </div>
                        <div class="order-status">
                            <span>PENDING</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="row no-vertical-padding">
        <div class="container store-list">
            <div class="row">
                <div class="col-xs-12">
                    <div class="store-list-header">
                        <h2 class="store-list-title">My Stores</h2>
                        <a class="store-list-all-link" href="#">ALL STORES ></a>
                    </div>
                </div>
            </div>
            <div class="store-list-content row">
                <div class="col-xs-12">
                    <div class="store-item">
                    	<div class="store-item-header">
                    		<span class="store-name">Store Name A</span>
                    		<span class="store-location">Shanghai, China</span>
                    		<a class="pull-right">Edit</a>
                    	</div>
                        <div class="store-item-body">
                        	<div class="store-photo image-link">
                        		<img src="/static/app/images/shop-brand-1.png" class="order-item-image">
                        	</div>
                            <div class="store-details">
	                            <div>Brands</div>
	                            <div>brand a, brand a, brand a, brand a, brand a</div>
	                            <div>About Store</div>
	                            <div>This is the introduction of your first store. This is the introduction of your first store. This is the introduction of your first store.</div>
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row no-vertical-padding">
        <div class="container support">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <img src="/static/app/images/account-manager.png" class="account-manager-image">
                    <p><?= __("brand_dashboard__ACCOUNT_MANAGER"); ?></p>
                    <button class="btn btn-type-2">MESSAGE</button>
                </div>
            </div>
        </div>
    </section>
    <footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
    </footer>
</body>
</html>