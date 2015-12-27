<!DOCTYPE html>
<html ng-app="xShowroom.buyer.store">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
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
								<span class="store-list-title">My Stores</span>
								<a class="pull-right" href="/store/create">Add new Store ></a>
							</div>
						</div>
					</div>
					<div class="store-list-content row">
						<div class="col-xs-6" ng-repeat="store in stores | limitTo: limit track by $index">
							<div class="store-item">
				                <a class="store-photo image-link" ng-href="/store/{{store.id}}">
				                   	<img src="/static/app/images/shop-brand-1.png" class="order-item-image">
				                </a>
				                <div class="store-details">
					            	<h3>{{store.name}}</h3>
					                <div><span>Brands: </span><span>{{store['brand_list']}}</span></div>
					                <div><span>Type: </span><span>{{store['type']|translate}}</span></div>
					                <div><span>Address: </span><span>{{store['address']}}</span></div>
					                <div><span>Telephone: </span><span>{{store['telephone']}}</span></div>
					                <div class="store-actions">
					                	<a ng-href="/store/{{store.id}}#?isEdit=1"><i class="fa fa-pencil-square-o"></i>Edit</a>
					                	<a ng-href="/store/{{store.id}}"><i class="fa fa-eye"></i>View</a>
					                	<a ng-click="closeStore(store.id, $index);"><i class="fa fa-trash"></i>Close</a>
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