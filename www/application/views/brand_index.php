<!DOCTYPE html>
<html ng-app="xShowroom.brand.index">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/brand_index.css" />
    <script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-animate/angular-animate.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/services.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
    <script type="text/javascript" src="/static/app/modules/brand_index.js"></script>
</head>
<body ng-controller="BrandIndexCtrl" class="container-fluid"  ng-init="brandId = <?=$brandInfo['id']?>;">
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
    <section class="row no-vertical-padding">
        <div class="container">
            <div class="row brand-preview">
            	<div class="col-xs-4">
	            	<h2 class="brand-name"><?=$brandInfo['brand_name']?></h2>
	            	<div class="brand-info">
	            		<span>Based in</span>
	            		<span>{{ "<?= $brandAttr['company_country'] ?>" | translate}}</span>
	            	</div>
	            	<div class="brand-info">
	            		<span>Designer</span>
	            		<span><?=$brandInfo['designer_name']?></span>
	            	</div>
	            	<div class="brand-info">
	            		<span>Website</span>
	            		<span><?=$brandAttr['company_web_url']?></span>
	            	</div>
	            	<!-- <div class="brand-info brand-about">
	            		<span>About</span>
	            		<span>This collection is about.This collection is about.This collection is aboutThis collection is about.This collection is about.This collection is about</span>
	            		<span class="pull-right">
	                 		<a href="#" ng-show="showAllDesc"  ng-click="showAllDesc = !showAllDesc;">HIDE</a>
	                 		<a href="#" ng-show="!showAllDesc" ng-click="showAllDesc = !showAllDesc;">SHOW ALL</a>
	                 	</<span>
	            	</div> -->
            	</div>
            	<div class="col-xs-3">
            		<div class="brand-cover">
            			<img ng-src="/{{selectedCover.cover_image_medium}}"/>
            		</div>
            	</div>
            	<div class="col-xs-5">
            		<div class="dropdown season-filter">
						<span type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						 	<span>当前季节：{{selectedSeason | translate}}</span>
						 	<span class="caret"></span>
						</span>
						<ul class="dropdown-menu">
							<li ng-repeat="season in seasons" ng-click="setSeason(season);">{{season | translate}}</li>
						</ul>
					</div>
            		<div class="collection-cover" ng-repeat="cover in covers|limitTo: 18" ng-click="setSelectedCover(cover);">
            			<img ng-src="/{{cover.cover_image_small}}"/>
            		</div>
            	</div>
            </div>
        </div>
    </section>
     <section class="row">
        <div class="container">
            <div class="row">
            	<div class="col-xs-3">
					<div class="row filter-condition" ng-repeat="(title, content) in conditions" data-type="{{content.type}}" data-title="{{title | translate}}"
						selected="setFilters(name, conditions)" data-conditions="content.values"></div>
				</div>
				<div class="col-xs-9 collection-list" ng-if="!hasAuth">
					<div class="has-no-auth">
						<p>You do not have access to BRAND B. Apply</br>privilege to view all his collection.</p>
						<?php if (empty($user)) {?>
							<a class="btn btn-type-1" href="/login">APPLY</a>
						<?php }else{?>
							<button class="btn btn-type-1" ng-click="applyAuth();">APPLY</button>
						<?php }?>
					</div>
					<div class="row">
						<div class=" col-xs-12">
							<div class="collection-list-header">
								<span class="collection-list-title">COLLECTIONS</span>
							</div>
						</div>
					</div>
					<div class="collection-list-content row">
						<div class="col-xs-3" ng-repeat="category in ['dress', 'top', 'shirt', 'skirt']">
							<a target="_self" href="#" class="collection-item">
								<img ng-src="/static/app/images/mock-{{category}}.png" class="collection-item-image">
							</a>
							<div class="collection-item-name">
								<span>{{('dropdown__PRODUCT_CATEGORY__' + (category|uppercase)) | translate}}</span>
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
                    <button class="btn btn-type-2"><?= __("brand_dashboard__ACCOUNT_MANAGER_CONTRACT"); ?></button>
                </div>
            </div>
        </div>
    </section>
    <footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
    </footer>
</body>
</html>
