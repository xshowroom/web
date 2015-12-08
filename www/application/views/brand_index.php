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
<body ng-controller="BrandIndexCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer',
            array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); 
        ?>
    </nav>
    <?php var_dump($brandAttr)?>
    <?php var_dump($brandInfo)?>
    <section class="row no-vertical-padding">
        <div class="container">
            <div class="row brand-preview">
            	<div class="col-xs-5">
	            	<h2 class="brand-name"><?=$brandInfo['brand_name']?></h2>
	            	<div class="brand-info">
	            		<span>Based in</span>
	            		<span>Spain</span>
	            	</div>
	            	<div class="brand-info">
	            		<span>Established</span>
	            		<span><?= date('Y', strtotime($brandInfo['register_date'])) ?></span>
	            	</div>
	            	<div class="brand-info">
	            		<span>Website</span>
	            		<span>www.diarte.com</span>
	            	</div>
	            	<div class="brand-info brand-about">
	            		<span>About</span>
	            		<span>This collection is about.This collection is about.This collection is aboutThis collection is about.This collection is about.This collection is about</span>
	            		<span class="pull-right">
	                 		<a href="#" ng-show="showAllDesc"  ng-click="showAllDesc = !showAllDesc;">HIDE</a>
	                 		<a href="#" ng-show="!showAllDesc" ng-click="showAllDesc = !showAllDesc;">SHOW ALL</a>
	                 	</<span>
	            	</div>
            	</div>
            	<div class="col-xs-3">
            		<div class="brand-cover">
            			<img class="" src="/static/app/images/brand-logo.png"/>
            		</div>
            	</div>
            	<div class="col-xs-4">
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
            		</div>
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
            		</div>
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
            		</div>
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
            		</div>
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
            		</div>
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
            		</div>
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
            		</div>
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
            		</div>
            		<div class="collection-cover">
            			<img src="/static/app/images/brand-logo.png"/>
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
						selected="setFilters(name, conditions)" data-conditions="content.values"></div>
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
