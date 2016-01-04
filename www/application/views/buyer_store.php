<!DOCTYPE html>
<html ng-app="xShowroom.buyer.store">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/buyer_store.css" />
	<script type="text/javascript" src="/static/app/modules/buyer_store.js"></script>
</head>
<body ng-controller="BuyerStoreCtrl" class="container-fluid" ng-cloak>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' => 'dashboard', 'userAttr'=> $userAttr)); ?>
	</nav>
	<section class="row" ng-cloak>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 store-list">
					<div class="row">
						<div class=" col-xs-12">
							<div class="store-list-header">
								<span class="store-list-title"><?=__("buyer_store__TITLE");?></span>
								<a class="pull-right" href="/store/create"><?=__("buyer_store__ADD_NEW");?></a>
							</div>
						</div>
					</div>
					<div class="store-list-content row">
						<div class="col-xs-6" ng-repeat="store in stores | limitTo: limit track by $index">
							<div class="store-item">
				                <a class="store-photo image-link" ng-href="/store/{{store.id}}">
				                   	<img ng-src="/{{store.image.length ?  store.image[0]: 'static/app/images/default-store-cover.png'}}" class="order-item-image">
				                </a>
				                <div class="store-details">
					            	<h3>{{store.name}}</h3>
					                <div><span><?=__("buyer_store__item__BRANDS");?> </span><span>{{store['brand_list']}}</span></div>
					                <div><span><?=__("buyer_store__item__TYPE");?> </span><span>{{store['type']|translate}}</span></div>
					                <div><span><?=__("buyer_store__item__ADDRESS");?> </span><span>{{store['address']}}</span></div>
					                <div><span><?=__("buyer_store__item__TELEPHONE");?> </span><span>{{store['telephone']}}</span></div>
					                <div class="store-actions">
					                	<a ng-href="/store/{{store.id}}#?isEdit=1"><i class="fa fa-pencil-square-o"></i><?=__("buyer_store__item__btn_EDIT");?></a>
					                	<a ng-href="/store/{{store.id}}"><i class="fa fa-eye"></i><?=__("buyer_store__item__btn_VIEW");?></a>
					                	<a ng-click="closeStore(store.id, $index);"><i class="fa fa-trash"></i><?=__("buyer_store__item__btn_CLOSE");?></a>
					                </div>
			                    </div>
							</div>
						</div>
					</div>
					<div class="store-list-action text-center row" ng-if="limit < stores.length">
		                 <button class="btn btn-type-1" ng-click="loadMore();">LOAD MORE</button>
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