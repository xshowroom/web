<!DOCTYPE html>
<html ng-app="xShowroom.buyer.brand">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/shop.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/buyer_brand.js"></script>
</head>
<body ng-controller="BuyerBrandCtrl" class="container-fluid" ng-cloak>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'my_brands', 'userAttr'=> $userAttr)); ?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<div class="row filter-condition" ng-repeat="(title, content) in conditions" data-type="{{content.type}}" data-title="{{title}}" 
						data-has-clear-all="true" selected="setFilters(name, conditions)" data-conditions="content.values"></div>
				</div>			
				<div class="col-xs-9 brand-list">
					<div class="row">
						<div class=" col-xs-12">
							<div class="brand-list-header">
								<span class="brand-list-title" ng-cloak>{{hasFilter() ? 'FILTERED BRANDS' : 'ALL MY BRANDS'}}</span>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-search"></span>
									</span>
									<input type="text" class="form-control" id="brand-keyword" ng-model='keyword' placeholder="SEARCH BRAND" ng-change="setFilters('keyword', keyword)">
								</div>
							</div>
						</div>
					</div>
					<div class="row"  ng-if="!brands.content.length">
		                <div class="col-xs-12 text-center empty-warning">
		                    <img src="/static/app/images/empty.png">
		                    <p>No brand matches your conditions!<br/>Start your business with changing conditons.</p>
		                </div>
		            </div>
					<div class="brand-list-content row" ng-if="brands.content.length">
						<div class="col-xs-3" ng-repeat="brand in brands.content">
							<a target="_self" ng-href="/brands/{{brand.brand_url}}" class="brand-item image-link">
								<img ng-src="/{{brand.brand_image}}" class="brand-item-image">
								<span class="brand-item-name">
									<span>{{brand.brand_name}}</span>
								</span>
							</a>
						</div>
					</div>
					<div class="brand-list-action text-center row" ng-if="hasNext">
		                 <button class="btn btn-type-1" ng-click="getNewBrands()"><?=__("collection_index__btn_LOAD_MORE")?></button>
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