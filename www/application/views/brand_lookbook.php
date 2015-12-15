<!DOCTYPE html>
<html  ng-app="xShowroom.brand.lookbook" ng-init="userId=<?=$userAttr['id']?>">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/angular-motion/dist/angular-motion.min.css">
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/brand_lookbook.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
		<script type="text/javascript" src="/static/bower_components/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.tpl.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/brand_lookbook.js"></script>
</head>
<body ng-controller="BrandLookbookCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
        	array('currentPage' =>  'lookbook', 'userAttr'=> $userAttr));
       	?>
	</nav>
	<section class="row lookbook" ng-cloak>
		<div class="container">
			<div class="row lookbook-season" ng-repeat="season in seasons">
				<h2><?=__("global_navigation_top_user__LOOKBOOK")?> - {{ season | translate}}</h2>
				<div class="lookbook-content">
					<div class="product-image" ng-repeat="photo in photos[season]">
						<img ng-src="/{{photo.lookbook}}">
						<div class="product-image-action">
							<a class="btn btn-type-1" ng-click="removePhoto(photo)"><i class="fa fa-trash"></i></a>
						</div>
					</div>
					<div class="product-image image-uploader"
                    	data-render-image='0' data-after-uploading="addPhoto(url, season);">
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