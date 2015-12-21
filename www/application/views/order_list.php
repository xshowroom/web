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
                			<a ng-click="filters.status = ''; filters.limit = pageSize;"  ng-class="{'active': filters.status == ''}">
                				<span>ALL</span>
                				<span>{{orders.length || 0}}</span>
                			</a>
                		</li>
                		<li ng-repeat="(status, count) in statuses">
                			<a ng-click="filters.status = status; filters.limit = pageSize;"  ng-class="{'active': filters.status == status}">
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
									<input type="text" class="form-control" id="order-keyword" ng-model='filters.query'
										 placeholder="{{'filter_head__SEARCH_BRAND'|translate}}" ng-change="filters.limit = pageSize;">
								</div>
							</div>
						</div>
					</div>
					<div class="order-list-content row" ng-if="orders.length">
						<div class="col-xs-12" ng-repeat="order in orders| limitTo: filters.limit |filter: {$: filters.query, 'status': filters.status}  as results track by $index ">
							<div class="order-item">
								<div class="order-item-header">
									<span>{{order.order_id}}</span>
									<span>|</span>
									<span>{{order.buy_time}}</span>
								</div>
								<div class="order-item-content">
									<div class="order-info">
					                  	<a class="image-link collection-cover">
					                  		<img ng-src="/static/app/images/shop-brand-1.png"/>
					                  	</a>
					                </div>
				                  	<div class="order-info">
			                  			<h3>record.brandName - record.collectionInfo.name</h3>
			                  			<div><span>STATUS:</span><span>{{order.status}}</span></div>
						                <div><span>Total Amount:</span><span>${{order.total_amount}}</span></div>
						                <div><span>Delivery Date:</span><span>{{order.delivery_date}}</span></div>
			                  		</div>
						            <div class="order-info">
						                <a ng-href="/order/{{order.order_id}}" target="_self" class="btn btn-type-2">View Detail</a>
				                  	</div>
			                  	</div>
			                  	<div class="clearfix"></div>
		                  	</div>
						</div>
						<div class="col-xs-12 text-center empty-warning"  ng-if="!results.length">
		                    <img src="/static/app/images/empty.png">
		                    <p><?=__("brand_filter__NO_BRAND_1");?><br/><?=__("brand_filter__NO_BRAND_2");?></p>
		                </div>
		                <div class="order-list-action text-center col-xs-12" ng-if="filters.limit < (orders | filter: {$: filters.query, 'status': filters.status}).length ">
			                 <button class="btn btn-type-1" ng-click="filters.limit = filters.limit + pageSize;">LOAD MORE</button>
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