<!DOCTYPE html>
<html  ng-app="xShowroom.buyer.dashboard">
<head>
    <meta charset="UTF-8" >
    <title><?=SITE_TITLE_PROFIX?> </title>
    <?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/buyer_dashboard.css" />
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
    <section class="row no-vertical-padding">
        <div class="container brand-banner">
            <div class="row">
                <div class="col-xs-12">
                    <div class="brand-info">
                        <h3 class="brand-name"><?= $userAttr['display_name'] ?></h3>
<!--                        <div class="brand-detail">-->
<!--                            <span>--><?//=__("buyer_dashboard__INTERESTED");?><!--</span>-->
<!--                            <span></span>-->
<!--                        </div>-->
                        <div class="brand-detail">
                            <span><?=__("buyer_dashboard__LAST_VISIT");?></span>
                            <span><?= date('Y-m-d h:i:s', strtotime($user['last_login_time'])) ?></span>
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
                        <h2 class="brand-list-title"><?=__("buyer_dashboard__MY_BRANDS");?></h2>
                        <a class="brand-list-all-link" href="<?=URL::site('buyer/brand');?>"><?=__("buyer_dashboard__ALL_BRANDS");?></a>
                    </div>
                </div>
            </div>
        	<?php if(empty($authBrandList)):?>
        	 <div class="row">
                <div class="col-xs-12 text-center empty-warning">
                    <img src="/static/app/images/empty.png">
                    <p><?=__("buyer_dashboard__BRANDS_EMPTY_1");?><br/><?=__("buyer_dashboard__BRANDS_EMPTY_2");?> <a href="<?=URL::site('shop');?>"><?=__("buyer_dashboard__BRANDS_EMPTY_3");?></a>.</p>
                </div>
            </div>
            <?php else: ?>
            <div class="brand-list-content row">
                <?php foreach($authBrandList as $brand):?>
                <div class="col-xs-2">
                    <a target="_self" href="<?= URL::site('brands/'.$brand['brand_url'])?>" class="brand-item image-link">
                        <img src="<?= URL::site($brand['brand_image']);?>" class="brand-item-image">
                        <div class="brand-name"><?= $brand['brand_name']?></div>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="row no-vertical-padding">
        <div class="container order-list">
            <div class="row">
                <div class="col-xs-12">
                    <div class="order-list-header">
                        <h2 class="order-list-title"><?=__("buyer_dashboard__MY_ORDERS");?></h2>
                        <a class="order-list-all-link" href="<?=URL::site('order/list');?>"><?=__("buyer_dashboard__ALL_ORDERS");?></a>
                    </div>
                </div>
            </div>
            <?php if(empty($orderList)):?>
            <div class="row">
                <div class="col-xs-12 text-center empty-warning">
                    <img src="/static/app/images/empty.png">
                    <p><?=__("buyer_dashboard__ORDER_EMPTY_1");?><br/><?=__("buyer_dashboard__ORDER_EMPTY_2");?> <a href="<?=URL::site('shop');?>"><?=__("buyer_dashboard__ORDER_EMPTY_3");?></a></p>
                </div>
            </div>
            <?php else: ?>
            <div class="order-list-content row">
            	<?php foreach($orderList as $order):?>
                <div class="col-xs-3">
                    <a target="_self" href="/order/<?=$order['order_id']?>" class="order-item">
                        <div class="order-images">
                            <img ng-src="/<?=$order['cover_image_medium']?>" class="order-item-image">
                            <?php $counter = 0;?>
                            <?php foreach($order['productions'] as  $productId=>$product):?>
                            <?php if($counter < 2):?>
                            <img src="/<?=$product['image']?>" class="order-item-sub-image">
                            <?php $counter++;?>
                            <?php endif;?>
                            <?php endforeach;?>
                        </div>
                        <div class="order-detail">
                            <div><?=__("buyer_dashboard__ORDER_NUMBER");?> <?=$order['order_id']?></div>
                            <div><?=__("buyer_dashboard__ORDER_SUBMIT");?> <?=$order['buy_time']?></div>
                            <div><?=__("buyer_dashboard__ORDER_AMOUNT");?> <?=$order['currency']?>{{'<?=$order['total_amount']?>' | number}}</div>
                        </div>
                        <div class="order-status">
                            <span>{{ "order_status__" + "<?=$order['order_status']?>" | translate}}</span>
                        </div>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="row no-vertical-padding">
        <div class="container store-list">
            <div class="row">
                <div class="col-xs-12">
                    <div class="store-list-header">
                        <h2 class="store-list-title"><?=__("buyer_dashboard__MY_STORES");?></h2>
                        <a class="store-list-all-link" href="/buyer/store"><?=__("buyer_dashboard__ALL_STORES");?></a>
                    </div>
                </div>
            </div>
            <div class="store-list-content row">
            	<?php foreach ($storeList as $store): ?>
                <div class="col-xs-6">
                    <div class="store-item">
                    	<div class="store-item-header">
                    		<span class="store-name"><?=$store['name']?></span>
                    		<span class="store-location"><?=$store['address']?>, {{'<?=$store['country']?>' | translate}}</span>
                    		<a class="pull-right" href="/store/<?=$store['id']?>"><?=__("buyer_dashboard__STORE_btn_VIEW");?></a>
                    	</div>
                        <div class="store-item-body">
                        	<a class="store-photo image-link" href="/store/<?=$store['id']?>">
                        		<img src="/<?=empty(json_decode($store['image'])[0]) ? 'static/app/images/default-store-cover.png' : json_decode($store['image'])[0]?>" class="store-item-image">
                        	</a>
                            <div class="store-details">
	                            <div><?=__("buyer_dashboard__STORE_BRANDS");?></div>
	                            <div><?=$store['brand_list']?></div>
	                            <div><?=__("buyer_dashboard__STORE_ABOUT");?></div>
	                            <div><?=$store['about'] ? $store['about'] : __("buyer_dashboard__STORE_NO_ABOUT")?></div>
	                        </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="row no-vertical-padding">
        <div class="container support">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <img src="/static/app/images/account-manager.png" class="account-manager-image">
                    <p><?= __("buyer_dashboard__ACCOUNT_MANAGER"); ?></p>
                    <a class="btn btn-type-2" href="/about#contact-us"><?= __("buyer_dashboard__ACCOUNT_MANAGER_CONTACT"); ?></a>
                </div>
            </div>
        </div>
    </section>
    <footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
    </footer>
</body>
</html>
