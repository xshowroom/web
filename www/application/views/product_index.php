<!DOCTYPE html>
<html ng-app="xShowroom.product.index">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/angular-motion/dist/angular-motion.min.css">
    <link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/product_index.css" />
    <script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-animate/angular-animate.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.tpl.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/ng-textcomplete/ng-textcomplete.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/services.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
    <script type="text/javascript" src="/static/app/modules/product_index.js"></script>
</head>
<body ng-controller="ProductIndexCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
            array('currentPage' =>  'collection', 'userAttr'=> $userAttr)); 
        ?>
    </nav>
    <section class="row no-vertical-padding uploading">
        <div class="container product-info">
        	<div class="row">
    			<div class="col-xs-12">
    				<a class="back-to-collection" href="/collection/<?=$production['collection_id']?>" target="_self">
    					<span class="glyphicon glyphicon-arrow-left"></span>
    					<span>BACK TO COLLECTION</span>
    				</a>
    			</div>
    		</div>
            <div class="row" ng-show="!isEditing">
                <div class="col-xs-3">
                	<div class="product-cover">
                		<?php $images = json_decode($production['image_url']);?>
                 		<img ng-src="/{{productCover || '<?=$images[0]?>'}}">
                 	</div>
                 	<div class="product-gallery" ng-init="images = {offset: 0, urls: <?= strtr($production['image_url'], array('"'=>'\''))?>};">
	            		<div class="product-gallery-action" ng-class="{'disabled': images.offset == 0}">
	            			<span class="glyphicon glyphicon-chevron-left" ng-click="images.offset = images.offset - (images.offset > 0 ? 1 : 0)"></span>
	            		</div>
	            		<div class="product-list-preview">
	            			<a ng-click="setProductCover(url);" class="product-image" ng-repeat="url in images.urls | limitTo: 3 : images.offset">
	            				<img ng-src="/{{url}}">
	            			</a>
	            		</div>
	            		<div class="product-gallery-action" ng-class="{'disabled': images.offset == images.urls.length - 3 || images.urls.length <= 3}">
	            			<span class="glyphicon glyphicon-chevron-right" ng-click="images.offset = images.offset + ((images.offset < images.urls.length - 3) ? 1 : 0);"></span>
	            		</div>
	            	</div>
                </div>
                <div class="col-xs-9">
                 	<div class="col-xs-12 product-detail product-name">
                 		<h2><?= $production['name']?></h2>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div>CATEGORY</div>
                 		<div>{{'<?= $production['category']?>'| translate}}</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div>RETAIL PRICE</div>
                 		<div><?= $collection['currency']?>{{<?= $production['retail_price']?> | number: 2}}</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div>WHOLE PRICE</div>
                 		<div><?= $collection['currency']?>{{<?= $production['whole_price']?> | number:2}}</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div>SIZE | <?= $production['size_region']?></div>
                 		<?php $sizesCodes = json_decode($production['size_code']);?>
                 		<div>
	                 		<?php foreach($sizesCodes as $code => $value){?>
	                 		<span class="size-code">
	                 			<?= $code?>
	                 		</span>
	                 		<?php }?>
                 		</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div>COLOR</div>
                 		<?php $colors = json_decode($production['color']);?>
                 		<div>
	                 		<?php foreach($colors as $color){?>
	                 		<div class="available-color">
	                 			<?php if ($color->type == 0) {?>
	                 			<div style="background-color: <?=$color->value?>"></div>
	                 			<?php } else if ($color->type == 1){?>
	                 			<div style="background-image: url(/<?=$color->value?>)"></div>
	                 			<?php }?>
	                 			<div><?=$color->name?></div>
	                 		</div>
	                 		<?php }?>
                 		</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div>MADE IN</div>
                 		<div>{{'<?= $production['made_in']?>' | translate}}</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div>MATERIAL</div>
                 		<div>{{'<?= $production['material']?>' | translate}}</div>
                 	</div>
                 	<div class="col-xs-11 product-detail">
                 		<div>CARE INSTRUCTION:</div>
                 		<div>
	                 		<span class="product-care-instruction"><?= ($production['care_instruction'])?></span>
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
