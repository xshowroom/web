<!DOCTYPE html>
<html ng-app="xShowroom.shop">
<head>
	<meta charset="UTF-8" >
	<title><?=SITE_TITLE_PROFIX?> Online Shopping for All Brands</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/shop.css" />
	<script type="text/javascript" src="/static/app/modules/shop.js"></script>
</head>
<body ng-controller="ShopCtrl" class="container-fluid">
	<div class="global-loading-mask" us-spinner="{radius:15, width:5, length: 10}"></div>
	<?php if (empty($user)){?>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<?php } else { ?>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<?php }?>
	<?php if (empty($user) || $user["role_type"] != "2"){?>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'shop')); ?>
	</nav>
	<?php } else if ($user["role_type"] == "2"){ ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php }?>
	<section class="row">
		<div class="container" ng-cloak>
			<div class="row">
				<div class="col-xs-3">
					<div class="row filter-condition" ng-repeat="(title, content) in conditions" data-type="{{content.type}}" data-title="{{title}}"
						data-has-clear-all="true" selected="setFilters(name, conditions)" data-conditions="content.values"></div>
				</div>
				<div class="col-xs-9 brand-list">
					<div class="row">
						<div class=" col-xs-12">
							<div class="brand-list-header">
								<span class="brand-list-title" ng-cloak>{{hasFilter() ? ("filter_head__FILTERED_BRAND"|translate) : ("filter_head__ALL_BRAND"|translate)}}</span>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-search"></span>
									</span>
									<input type="text" class="form-control" id="brand-keyword" ng-model='query' placeholder="{{'filter_head__SEARCH_BRAND'|translate}}" ng-change="setFilters('query', query)">
								</div>
							</div>
						</div>
					</div>
					<div class="row" ng-if="brands.content && !brands.content.length">
		                <div class="col-xs-12 text-center empty-warning">
		                    <img src="/static/app/images/empty.png">
		                    <p><?=__("brand_filter__NO_BRAND_1");?><br/><?=__("brand_filter__NO_BRAND_2");?></p>
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