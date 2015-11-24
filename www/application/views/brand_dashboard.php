<!DOCTYPE html>
<html  ng-app="xShowroom.brand.dashboard">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    
    <link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/brand_dashboard.css" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/services.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
    <script type="text/javascript" src="/static/app/modules/brand_dashboard.js"></script>
</head>
<body ng-controller="BrandDashboardCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
            array('currentPage' =>  'dashboard', 'userAttr'=> $userAttr)); 
           ?>
    </nav>
    <section class="row no-vertical-padding">
        <div class="container brand-banner">
            <div class="row">
                <div class="col-xs-12">
                    <div class="brand-logo">
                        <img src="/<?= $brandInfo['brand_image']?>">
                    </div>
                    <div class="brand-info">
                        <h3 class="brand-name"><?= $brandInfo['brand_name'] ?></h3>
                        <div class="brand-detail">
                            <span ><?= __("brand_dashboard__BASED_IN"); ?></span>
                            <span>{{ "<?= $userAttr['company_country'] ?>" | translate}}</span>
                        </div>
                        <div class="brand-detail">
                            <span><?= __("brand_dashboard__ESTABLISHED"); ?></span>
                            <span><?= date('Y', strtotime($user['register_date'])) ?></span>
                        </div>
                        <div class="brand-detail">
                            <span><?= __("brand_dashboard__WEBSITE"); ?></span>
                            <span><?= $userAttr['company_web_url'] ?></span>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row no-vertical-padding">
        <div class="container order-list">
            <div class="row">
                <div class="col-xs-12">
                    <div class="order-list-header">
                        <h2 class="order-list-title"><?= __("brand_dashboard__MY_ORDERS"); ?></h2>
                        <a class="order-list-all-link" href="#"><?= __("brand_dashboard__ALL_ORDERS"); ?></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center empty-warning">
                    <img src="/static/app/images/order-tip.png">
                    <p><?= __("brand_dashboard__ORDER_EMPTY_1"); ?><br/><?= __("brand_dashboard__ORDER_EMPTY_2"); ?></p>
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
        <div class="container collection-list">
        	<div class="row">
                <div class="col-xs-12">
                    <div class="collection-list-header">
                        <h2 class="collection-list-title"><?= __("brand_dashboard__MY_COLLECTIONS"); ?></h2>
                        <a class="collection-list-all-link" href="/brand/collection"><?= __("brand_dashboard__ALL_COLLECTIONS"); ?></a>
                    </div>
                </div>
            </div>
        	<?php if (empty($collectionList)) { ?>
        	 <div class="row">
                <div class="col-xs-12 text-center empty-warning">
                    <img src="/static/app/images/empty.png">
                    <p><?= __("brand_dashboard__COLLECTION_EMPTY_1"); ?><br/><?= __("brand_dashboard__COLLECTION_EMPTY_2"); ?></p>
                    <a class="btn btn-type-2" href="/collection/create"><?= __("brand_dashboard__COLLECTION_EMPTY_3"); ?></a>
                </div>
            </div>
            <?php } else {?>
            <div class="collection-list-content row">
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