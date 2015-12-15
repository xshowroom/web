<!DOCTYPE html>
<html  ng-app="xShowroom.brand.lookbook" ng-init="userId=<?=$userAttr['id']?>">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/brand_lookbook.css" />
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