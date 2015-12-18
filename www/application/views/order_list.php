<!DOCTYPE html>
<html  ng-app="xShowroom.order.list" ng-init="userId=<?=$userAttr['id']?>">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/order_list.css" />
	<script type="text/javascript" src="/static/app/modules/order_list.js"></script>
</head>
<body ng-controller="OrderListCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row user-navigation">
		<?php 
		if ($user["role_type"] == "1"){
        	echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'order', 'userAttr'=> $userAttr));
        } else if ($user["role_type"] == "2"){
        	echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'order', 'userAttr'=> $userAttr));
       	}
       	?>
	</nav>
	<section class="row" ng-cloak>
        <div class="container">
        	<div class="row">
				<div class="col-xs-3 order-status">
                	<h3>STATUS</h3>
                	<ul>
                		<li>
                			<a ng-click="filters.status = ''; filters.limit = 4;"  ng-class="{'active': filters.status == ''}">
                				<span>{{'COLLECTION_STATUS_ALL' | translate}}</span>
                				<span>{{collections.length || 0}}</span>
                			</a>
                		</li>
                		<li ng-repeat="status in statuses">
                			<a ng-click="filters.status = status; filters.limit = 4;"  ng-class="{'active': filters.status == status}">
                				<span>{{('COLLECTION_STATUS_' + status) | translate}}</span>
                				<span>{{count}}</span>
                			</a>
                		</li>
                	</ul>
                </div>	
				<div class="col-xs-9 order-list">
					<div class="row">
						<div class=" col-xs-12">
							<div class="order-list-header">
								<span class="order-list-title" ng-cloak>{{hasFilter() ? 'ORDER　LIST' : 'FILTERED ORDER LIST'}}</span>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-search"></span>
									</span>
									<input type="text" class="form-control" id="order-keyword" ng-model='query' placeholder="{{'filter_head__SEARCH_BRAND'|translate}}" ng-change="setFilters('query', query)">
								</div>
							</div>
						</div>
					</div>
					<div class="row"  ng-if="!orders.content.length">
		                <div class="col-xs-12 text-center empty-warning">
		                    <img src="/static/app/images/empty.png">
		                    <p><?=__("brand_filter__NO_BRAND_1");?><br/><?=__("brand_filter__NO_BRAND_2");?></p>
		                </div>
		            </div>
					<div class="order-list-content row">
						<div class="col-xs-12">
							<div class="order-item">
								<div class="order-item-header">
									<span>A14581239123123</span>
									<span>|</span>
									<span>2015-12-25</span>
								</div>
								<div class="order-item-content">
									<div class="order-info">
					                  	<a class="image-link collection-cover">
					                  		<img ng-src="/static/app/images/shop-brand-1.png"/>
					                  	</a>
					                </div>
				                  	<div class="order-info">
			                  			<h3>record.brandName - record.collectionInfo.name</h3>
			                  			<div><span>STATUS:</span><span>Pending</span></div>
						                <div><span>Total Amount:</span><span>$123</span></div>
						                <div><span>Delivery Date:</span><span>2015-12-25</span></div>
			                  		</div>
						            <div class="order-info">
						                <a ng-href="/order/123" class="btn btn-type-2">View Detail</a>
				                  	</div>
			                  	</div>
			                  	<div class="clearfix"></div>
		                  	</div>
						</div>
					</div>
					<div class="order-list-action text-center row">
		                 <button class="btn btn-type-1" ng-click="getNewOrders()"><?=__("collection_index__btn_LOAD_MORE")?></button>
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