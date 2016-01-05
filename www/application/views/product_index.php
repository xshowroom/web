<!DOCTYPE html>
<html ng-app="xShowroom.product.index"
	ng-init="hasAuth=<?=$hasAuth ? 'true': 'false'?>;productId = <?=$production['id']?>;">
<head>
    <meta charset="UTF-8" >
    <title>XSHOWROOM</title>
    <?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/product_index.css" />
    <script type="text/javascript" src="/static/bower_components/ng-textcomplete/ng-textcomplete.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/product_index.js"></script>
</head>
<body ng-controller="ProductIndexCtrl" class="container-fluid">
	<div class="global-loading-mask" us-spinner="{radius:15, width:5, length: 10}"></div>
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
   	<?php if ($user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>
	
    <section class="row no-vertical-padding uploading" ng-cloak>
        <div class="container product-info">
        	<div class="row">
    			<div class="col-xs-12">
    				<a class="back-to-collection" href="/collection/<?=$production['collection_id']?>" target="_self">
    					<span class="glyphicon glyphicon-arrow-left"></span>
    					<span><?=__("product_index__BACK_COLLECTION")?></span>
    				</a>
    			</div>
    		</div>
            <div class="row" ng-show="!isEditing">
                <div class="col-xs-5">
                	<div class="product-cover">
                 		<img ng-src="/{{productCover || '<?=$production['image_url'][0]?>'}}">
                 	</div>
                 	<div class="product-gallery" ng-init="images = {offset: 0, urls: <?= strtr(json_encode($production['image_url']), array('"'=>'\''))?>};">
	            		<div class="product-gallery-action" ng-if="images.urls.length > 3" 
	            			ng-class="{'disabled': images.offset == 0}" >
	            			<span class="glyphicon glyphicon-chevron-left" ng-click="images.offset = images.offset - (images.offset > 0 ? 1 : 0)"></span>
	            		</div>
	            		<div class="product-list-preview">
	            			<a ng-click="setProductCover(url);" class="product-image" ng-repeat="url in images.urls | limitTo: 3 : images.offset">
	            				<img ng-src="/{{url}}">
	            			</a>
	            		</div>
	            		<div class="product-gallery-action" ng-if="images.urls.length > 3" 
	            			ng-class="{'disabled': images.offset == images.urls.length - 3 || images.urls.length <= 3}">
	            			<span class="glyphicon glyphicon-chevron-right" ng-click="images.offset = images.offset + ((images.offset < images.urls.length - 3) ? 1 : 0);"></span>
	            		</div>
	            	</div>
	            	<div class="collection-info">
	            		<h5><?=$collection['name']?></h5>
	            		<div>
	            			<span><?=__("product_index__COLLECTION_MODE")?></span>
	            			<span>{{'<?=$collection['mode']?>' | translate}}</span>
	            		</div>
	            		<div>
	            			<span><?=__("product_index__COLLECTION_DEADLINE")?></span>
	            			<span><?= $collection['mode'] == 'dropdown__COLLECTION_MODE__PERMANENT' ? '无' :$collection['deadline']?></span>
	            		</div>
	            		<div>
	            			<span><?=__("product_index__COLLECTION_DELIVERY_DATE")?></span>
	            			<span><?= $collection['mode'] == 'dropdown__COLLECTION_MODE__PERMANENT' ? '按需发货' :$collection['delivery_date']?></span>
	            		</div>
	            		<div>
	            			<span><?=__("product_index__COLLECTION_MINIMUM_ORDER")?></span>
	            			<span><?=$collection['currency']?><?=$collection['mini_order']?></span>
	            		</div>
	            	</div>
                </div>
                <div class="col-xs-7">
                 	<div class="col-xs-12 product-detail product-name">
                 		<h2><?= $production['name']?></h2>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div><?=__("product_index__PRODUCT_CATEGORY")?></div>
                 		<div>{{'<?= $production['category']?>'| translate}}</div>
                 	</div>
	                <div class="col-xs-12 product-detail">
		                <div><?=__("product_index__PRODUCT_STYLE_NUMBER")?></div>
		                <div><?= $production['style_num']?></div>
	                </div>
                 	<div class="col-xs-12 product-detail">
                 		<div><?=__("product_index__PRODUCT_WHOLESALE_PRICE")?></div>
                 		<div><?= $collection['currency']?>{{<?= $production['whole_price']?> | number: 2}}</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div><?=__("product_index__PRODUCT_RETAIL_PRICE")?></div>
                 		<div><?= $collection['currency']?>{{<?= $production['retail_price']?> | number:2}}</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div><?=__("product_index__PRODUCT_SIZE")?> | <?= $production['size_region']?></div>
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
                 		<div><?=__("product_index__PRODUCT_COLOR")?></div>
                 		<?php $colors = json_decode($production['color']);?>
                 		<div class="row">
	                 		<?php foreach($colors as $color): ?>
	                 		<div class="available-color col-xs-2">
	                 			<?php if ($color->type == 0): ?>
	                 			<div style="background-color: <?=$color->value?>"></div>
	                 			<?php elseif ($color->type == 1): ?>
	                 			<div style="background-image: url(<?=URL::site($color->value)?>)"></div>
	                 			<?php endif; ?>
	                 			<div><?=$color->name?></div>
	                 		</div>
	                 		<?php endforeach; ?>
                 		</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div><?=__("product_index__PRODUCT_MADE_IN")?></div>
                 		<div>{{'<?= $production['made_in']?>' | translate}}</div>
                 	</div>
                 	<div class="col-xs-12 product-detail">
                 		<div><?=__("product_index__PRODUCT_MATERIAL")?></div>
                 		<div>{{'<?= $production['material']?>' | translate}}</div>
                 	</div>
                 	<div class="col-xs-11 product-detail">
                 		<div><?=__("product_index__PRODUCT_CARE_INSTRUCTION")?></div>
                 		<div>
	                 		<span class="product-care-instruction"><?=htmlentities($production['care_instruction'])?></span>
                 		</div>
                 	</div>
                 	<?php if($collection['status'] == '0' && $hasAuth): ?>
                 	<div class="col-xs-12 product-action">
                 		<button class="btn btn-type-2" data-toggle="modal" data-target="#modalDeleteConfirm"><?=__("product_index__PRODUCT_btn_DELETE")?></button>
                 	</div>
                 	<?php elseif(!$hasAuth): ?>
                 	<div class="col-xs-12 product-action">
                 		<button class="btn btn-type-2" ng-if="isInCart" ng-click="removeProductFromCart(<?=$production['id']?>)"><?=__("product_index__btn__REMOVE_IN_CART")?></button>
                 		<button class="btn btn-type-2" ng-if="!isInCart" ng-click="addProductToCart(<?=$production['id']?>)"><?=__("product_index__btn__ADD_TO_CART")?></button>
                 		<a href="<?=URL::site('buyer/cart')?>" target="_self" class="btn btn-type-1"><?=__("product_index__btn__VIEW_CART")?></a>
                 	</div>
                 	<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
    </footer>

    <!-- delete confirm -->
    <div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog">
	    <div class="modal-dialog  modal-xs">
		    <div class="modal-content">
			    <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				    <h4 class="modal-title"><?=__("product_index__modal__DELETE_CONFIRM")?></h4>
			    </div>
			    <div class="modal-body">
				    <p><?=__("product_index__modal__DELETE_DETAIL")?></p>
			    </div>
			    <div class="modal-footer">
				    <button type="button" class="btn  btn-type-1" data-dismiss="modal"><?=__("product_index__modal__DELETE_btn_CANCEL")?></button>
				    <button type="button" class="btn btn-type-2" ng-click="deleteProduct(<?=$production['id']?>, <?=$collection['id']?>);"><?=__("product_index__modal__DELETE_btn_DELETE")?></button>
			    </div>
		    </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
</html>
