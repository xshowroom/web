<!DOCTYPE html>
<html ng-app="xShowroom.brand.index" ng-init="brandOwner=<?=$brandInfo['user_id']?>;brandId=<?=$brandInfo['id']?>;isGuest=<?=empty($user) ? 'true' : 'false'?>;">
<head>
    <meta charset="UTF-8" >
    <title><?=$brandInfo['brand_name']?> - <?=SITE_TITLE_PROFIX?></title>
    <?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/brand_index.css" />
    <script type="text/javascript" src="/static/app/modules/brand_index.js"></script>
</head>
<body ng-controller="BrandIndexCtrl" class="container-fluid"  ng-cloak>
	<div class="global-loading-mask" us-spinner="{radius:15, width:5, length: 10}"></div>
   	<?php if(empty($user)): ?>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<?php else: ?>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login', array('userAttr'=> $userAttr, 'user'=> $user)); ?>
	</nav>
	<?php endif; ?>
	<?php if(empty($user)): ?>
	<nav class="row guest-navigation">
        <?php echo View::factory('common/global_navigation_top_guest', array('currentPage' =>  'shop')); ?>
	</nav>
	<?php elseif ($user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>

    <section class="row no-vertical-padding">
        <div class="container">
            <div class="row brand-preview">
            	<div class="col-xs-4">
	            	<h2 class="brand-name"><?=$brandInfo['brand_name']?></h2>
	            	<div class="brand-info">
	            		<span><?=__("brand_info__BASE_IN");?></span>
	            		<span>{{ "<?= $brandAttr['company_country'] ?>" | translate}}</span>
	            	</div>
	            	<div class="brand-info">
	            		<span><?=__("brand_info__DESIGNER");?></span>
	            		<span><?=$brandInfo['designer_name']?></span>
	            	</div>
	            	<div class="brand-info">
	            		<span><?=__("brand_info__WEBSITE");?></span>
	            		<a target="_blank" href="<?=$brandAttr['company_web_url']?>"><?=$brandAttr['company_web_url']?></a>
	            	</div>
		            <div class="brand-info"  ng-init="showAll = false;">
			            <p ng-class="{'show-all-desc':showAll,'hide-desc':!showAll}">{{'<?=addSlashes($brandInfo['description'])?>'}}</p>
			            <div class="text-right" ng-show="<?=strlen($brandInfo['description']) > 0 ? 'true' : 'false'?>">
				            <a ng-show="!showAll" ng-click="showAll=true;"><?= __("brand_info__SHOW_ALL"); ?></a>
				            <a ng-show="showAll"  ng-click="showAll=false;"><?= __("brand_info__HIDE"); ?></a>
			            </div>
		            </div>
            	</div>
            	<div class="col-xs-3" ng-if="seasons.length">
            		<div class="brand-cover">
            			<img ng-src="/{{selectedCover.lookbook}}"/>
            		</div>
            	</div>
            	<div class="col-xs-5"  ng-if="seasons.length"  ng-init="showLookbookAll = false;">
            		<div class="dropdown season-filter">
						<span type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						 	<span>{{selectedSeason | translate}}</span>
						 	<span class="caret"></span>
						</span>
						<ul class="dropdown-menu">
							<li ng-repeat="season in seasons" ng-click="selectSeason(season);">{{season | translate}}</li>
						</ul>
					</div>
            		<div class="collection-cover"  ng-repeat="cover in covers[selectedSeason]|limitTo: showLookbookAll? 96 : 21" ng-click="selectCover(cover);">
            			<img ng-src="/{{cover.lookbook}}"/>
            		</div>
		            <div class="clearfix"></div>
		            <div class="text-right" ng-show="covers[selectedSeason].length > 21">
			            <a ng-show="!showLookbookAll" ng-click="showLookbookAll=true;"><?= __("brand_info__SHOW_ALL"); ?></a>
			            <a ng-show="showLookbookAll"  ng-click="showLookbookAll=false;"><?= __("brand_info__HIDE"); ?></a>
		            </div>
            	</div>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="container">
            <div class="row">
            	<div class="col-xs-3">
					<div class="row filter-condition" ng-repeat="(title, content) in conditions" data-type="{{content.type}}" data-title="{{title}}"
						selected="setFilters(name, conditions)" data-conditions="content.values" data-has-clear-all="true"></div>
				</div>
				<div class="col-xs-9 collection-list" ng-if="authCode==-2 || authCode==-1">
					<div class="has-no-auth">
						<?php if (empty($user)): ?>
							<p><?=__("brand_access__NO_PRIVILEGE_1")?></br><?=__("brand_access__NO_PRIVILEGE_2")?></p>
							<a class="btn btn-type-1" href="<?=URL::site('login')?>"><?=__("brand_access__btn_APPLY")?></a>
						<?php else: ?>
							<!-- Applied -->
							<p ng-if="authCode==-1"><?=__("brand_access__INFO_APPLIED")?></p>
							<button class="btn btn-type-2 auth-applied" ng-if="authCode==-1"><?=__("brand_access__btn_APPLIED")?></button>
							<!-- Apply -->
							<p ng-if="authCode==-2"><?=__("brand_access__NO_PRIVILEGE_1")?></br><?=__("brand_access__NO_PRIVILEGE_2")?></p>
							<button class="btn btn-type-1" ng-if="authCode==-2" data-toggle="modal" data-target="#auth-store-modal"><?=__("brand_access__btn_APPLY")?></button>
						<?php endif; ?>
					</div>
					<div class="row">
						<div class=" col-xs-12">
							<div class="collection-list-header">
								<span class="collection-list-title"><?=__("brand_filter__COLLECTIONS")?></span>
							</div>
						</div>
					</div>
					<div class="collection-list-content row">
						<div class="col-xs-3" ng-repeat="category in ['WOMEN__OUTERWEAR', 'WOMEN__DRESSES', 'WOMEN__PANTS', 'JEWELRY__BRACELETS']">
							<a target="_self" href="#" class="collection-item">
								<img ng-src="/static/app/images/mock-{{category}}.png" class="collection-item-image">
							</a>
							<div class="collection-item-name">
								<span>{{('dropdown__PRODUCT_CATEGORY__' + (category|uppercase)) | translate}}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-9 collection-list" ng-if="authCode==0">
					<div class="row"  ng-if="!collections.content.length">
						<div class=" col-xs-12">
							<div class="collection-list-header">
								<span class="collection-list-title"><?=__("brand_filter__COLLECTIONS")?></span>
							</div>
							 <div class="col-xs-12 text-center empty-warning">
			                    <img src="/static/app/images/empty.png">
								 <p><?=__("brand_filter__NO_COLLECTION_1");?><br/><?=__("brand_filter__NO_COLLECTION_2");?></p>
			                </div>
						</div>
					</div>
					<div class="row" ng-repeat-start="collection in collections.content" ng-if="collection.production">
						<div class=" col-xs-12">
							<div class="collection-list-header">
								<a class="collection-list-title" ng-href="/collection/{{collection.id}}">{{collection.name}}</a>
							</div>
						</div>
					</div>
					<div class="collection-list-content row" ng-repeat-end ng-if="collection.production">
						<div class="col-xs-3" ng-repeat="(category, detail) in collection.production">
							<a target="_blank" href="/collection/{{collection.id}}#?category={{category}}" class="collection-item image-link">
								<img ng-src="/{{parseImageUrl(detail[0].image)}}" class="collection-item-image">
							</a>
							<div class="collection-item-name">
								<span>{{category | translate}}({{detail.length}})</span>
							</div>
						</div>
					</div>
					<div class="collection-list-action text-center row" ng-if="hasNext">
			            <button class="btn btn-type-1" ng-click="refreshCollectionList()"><?=__("collection_index__btn_LOAD_MORE")?></button>
			        </div>
				</div>
            </div>
        </div>
    </section>
<!--    <section class="row no-vertical-padding">-->
<!--        <div class="container support">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-10 col-xs-offset-1">-->
<!--                    <img src="/static/app/images/account-manager.png" class="account-manager-image">-->
<!--                    <p>--><?//= __("brand_dashboard__ACCOUNT_MANAGER"); ?><!--</p>-->
<!--                    <button class="btn btn-type-2">--><?//= __("brand_dashboard__ACCOUNT_MANAGER_CONTRACT"); ?><!--</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
    </footer>
    
    <div class="modal fade" id="auth-store-modal" tabindex="-1" role="dialog" aria-labelledby="auth-store-modal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
	      		<div class="modal-body">
		       		<h4><?=__('brand_store_application__TITLE')?></h4>
		       		<p><?=__('brand_store_application__BODY')?></p>
		       		<div>
		       			<div class="checkbox" ng-repeat="store in stores track by $index">
							<label>
								<input type="checkbox" name="authStore" ng-value="store" ng-click="selectStore(store)">
								<span>{{store.name}}</span>
							</label>
						</div>
		       		</div>
		       		<div>
						<button class="btn btn-type-1" ng-click="applyAuth()"><?=__('brand_store_application__btn_APPLY')?></button>
		       			<button class="btn btn-type-1" data-dismiss="modal"><?=__('brand_store_application__btn_CANCEL')?></button>
		       		</div>
	      		</div>
	    	</div>
		</div>
	</div>
</body>
</html>
