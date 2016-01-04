<!DOCTYPE html>
<html ng-app="xShowroom.collection.index" 
	ng-init="collectionId=<?=$collection['id']?>; hasAuth=<?=$collection['user_id'] == $userAttr['user_id'] ? 'true': 'false'?>;">
<head>
    <meta charset="UTF-8" >
    <title>XSHOWROOM</title>
    <?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/collection_index.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/collection_create.css" />
    <script type="text/javascript" src="/static/bower_components/ng-textcomplete/ng-textcomplete.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/collection_index.js"></script>
</head>
<body ng-controller="CollectionIndexCtrl" class="container-fluid" ng-cloak>
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<?php if($user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'shop', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>
    <?php if($collection['user_id'] == $userAttr['user_id']): ?>
    <section class="row no-vertical-padding uploading">
        <div class="container collection-info">
            <div class="row" ng-show="!isEditing">
                <div class="col-xs-3">
                	<div class="collection-cover">
                 		<img src="/<?=$collection['cover_image_medium']?>">
                 	</div>
                </div>
                <div class="col-xs-9">
                 	<div class="col-xs-12 collection-detail collection-name">
                 		<h2><?= $collection['name']?></h2>
                 		<?php if($collection['status'] == 0) {?>
                 		<a href="#" class="collection-edit" ng-click="isEditing = true;"><?=__("collection_index__EDIT")?></a>
                 		<?php }?>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span><?=__("collection_index__COLLECTION_MODE")?>:</span><span>{{'<?= $collection['mode']?>' | translate}}</span>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span><?=__("collection_index__COLLECTION_DEADLINE")?>:</span>
                 		<span><?= $collection['mode'] == 'dropdown__COLLECTION_MODE__PERMANENT' ? '无' :$collection['deadline']?></span>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span><?=__("collection_index__COLLECTION_DELIVERY_DATE")?>:</span>
                 		<span><?= $collection['mode'] == 'dropdown__COLLECTION_MODE__PERMANENT' ? '按需发货' :$collection['delivery_date']?></span>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span><?=__("collection_index__COLLECTION_MINIMUM_ORDER")?>:</span><span><?= $collection['currency']?><?= $collection['mini_order']?></span>
                 	</div>
                 	<div class="col-xs-11 collection-detail">
                 		<div><?=__("collection_index__COLLECTION_DESCRIPTION")?>:</div>
                 		<div class="row" ng-class="{'show-all': showAllDesc}">
                 			<p class="col-xs-10" ng-if="!showAllDesc">{{collection.description.split("\n")[0]}}</p>
	                 		<p class="col-xs-10" ng-if="showAllDesc" >{{collection.description}}</p>
	                 		<div class="col-xs-2">
	                 			<a ng-show="showAllDesc"  ng-click="showAllDesc = !showAllDesc;"><?=__("collection_index__HIDE")?></a>
	                 			<a ng-show="!showAllDesc" ng-click="showAllDesc = !showAllDesc;"><?=__("collection_index__SHOW_ALL")?></a>
	                 		</div>
                 		</div>
                 	</div>
                 	<div class="col-xs-12 collection-action">
                 		<?php if($collection['status'] == 0) {?>
                 		<button class="btn btn-type-2" data-toggle="modal" data-target="#modalSubmitConfirm" ng-if="products.length"><?=__("collection_index__btn_SUBMIT")?></button>
                 		<button class="btn btn-type-1" data-toggle="modal" data-target="#modalDeleteConfirm"><?=__("collection_index__btn_DELETE")?></button>
                 		<?php }?>
                 		<?php if($collection['status'] == 1) {?>
                 		<button class="btn btn-type-2" data-toggle="modal" data-target="#modalCloseConfirm"><?=__("collection_index__btn_CLOSE")?></button>
                 		<?php }?>
                 	</div>
                </div>
            </div>
            <?php if($collection['status'] == 0) {?>
            <div class="row collection-create" ng-show="isEditing">
                <div class="col-xs-3">
                    <div class="image-uploader" id="cover-image" data-image-online-url="collection.image" data-target-model="collection.image"
                    	ng-class="{'has-error': checkInfo.validation.image}"></div>
                    <label class="collection-cover-label"><?=__("collection_index__COLLECTION_COVER")?></label>
                </div>
                <div class="col-xs-9">
                    <form class="form-horizontal" id="collection-create-form">
                    	<div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.name}">
                            <label for="name" class="col-xs-4 control-label"><?=__("collection_index__COLLECTION_NAME")?></label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="name" ng-model="collection.name">
                            </div>
                        </div>
                        <div class="form-group col-xs-6"  ng-class="{'has-error': checkInfo.validation.category}">
                            <label for="category" class="col-xs-4 control-label"><?=__("collection_index__COLLECTION_CATEGORY")?></label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="category" ng-model="collection.category">
									  <option value="dropdown__COLLECTION__WOMEN">{{ 'dropdown__COLLECTION__WOMEN' | translate}}</option>
									  <option value="dropdown__COLLECTION__ACCESSORIES">{{ 'dropdown__COLLECTION__ACCESSORIES' | translate}}</option>
									  <option value="dropdown__COLLECTION__MEN">{{ 'dropdown__COLLECTION__MEN' | translate}}</option>
                                      <option value="dropdown__COLLECTION__LIFESTYLE">{{ 'dropdown__COLLECTION__LIFESTYLE' | translate}}</option>
                                      <option value="dropdown__COLLECTION__OTHERS">{{ 'dropdown__COLLECTION__OTHERS' | translate}}</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.mode}">
                            <label for="mode" class="col-xs-4 control-label"><?=__("collection_index__COLLECTION_MODE")?></label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="mode" ng-model="collection.mode" ng-change="setDatesByMode(collection.mode)">
									  <option value="dropdown__COLLECTION_MODE__PRE_ORDER">{{ 'dropdown__COLLECTION_MODE__PRE_ORDER' | translate}}</option>
									  <option value="dropdown__COLLECTION_MODE__STOCK">{{ 'dropdown__COLLECTION_MODE__STOCK' | translate}}</option>
									  <option value="dropdown__COLLECTION_MODE__RE_ORDER">{{ 'dropdown__COLLECTION_MODE__RE_ORDER' | translate}}</option>
									  <option value="dropdown__COLLECTION_MODE__PERMANENT">{{ 'dropdown__COLLECTION_MODE__PERMANENT' | translate}}</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.season}">
                            <label for="season" class="col-xs-4 control-label"><?=__("collection_index__COLLECTION_SEASON")?></label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="season" ng-model="collection.season">
									  <option value="dropdown__COLLECTION_SEASON__AW_15">{{ 'dropdown__COLLECTION_SEASON__AW_15' | translate}}</option>
									  <option value="dropdown__COLLECTION_SEASON__PRE_SS16">{{ 'dropdown__COLLECTION_SEASON__PRE_SS16' | translate}}</option>
									  <option value="dropdown__COLLECTION_SEASON__SS_16">{{ 'dropdown__COLLECTION_SEASON__SS_16' | translate}}</option>
									  <option value="dropdown__COLLECTION_SEASON__AW_16">{{ 'dropdown__COLLECTION_SEASON__AW_16' | translate}}</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.order}">
                            <label for="mini-order" class="col-xs-4 control-label"><?=__("collection_index__COLLECTION_MINIMUM_ORDER")?></label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="mini-order" ng-model="collection.order">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.currency}">
                            <label for="currency" class="col-xs-4 control-label"><?=__("collection_index__COLLECTION_CURRENCY")?></label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="currency" ng-model="collection.currency">
                                      <option value="￥">￥-RMB</option>
                                      <option value="$">$-USD</option>
                                      <option value="￡">￡-GBP</option>
                                      <option value="€">€-EUR</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.deadline}" ng-hide="collection.mode == 'dropdown__COLLECTION_MODE__PERMANENT'">
                            <label for="deadline" class="col-xs-4 control-label"><?=__("collection_index__COLLECTION_DEADLINE")?></label>
                            <div class="col-xs-8">
                            	<input type="text" class="form-control datepicker" id="deadline" ng-model="collection.deadline"
                                  	data-date-format="yyyy-MM-dd" data-date-type="string" data-min-date="today"
					        		data-model-date-format="yyyy-MM-dd" data-autoclose="1" bs-datepicker ng-change="collection.delivery = ''">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.delivery}" ng-hide="collection.mode == 'dropdown__COLLECTION_MODE__PERMANENT'">
                            <label for="inputEmail3" class="col-xs-4 control-label"><?=__("collection_index__COLLECTION_DELIVERY_DATE")?></label>
                            <div class="col-xs-8">
                            	<input type="text" class="form-control datepicker" id="delivery-date" ng-model="collection.delivery"
                                  	data-date-format="yyyy-MM-dd" data-date-type="string" data-min-date="{{collection.deadline}}"
					        		data-model-date-format="yyyy-MM-dd" data-autoclose="1" bs-datepicker>
                            </div>
                          </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.description}">
                            <label for="description" class="col-xs-2 control-label"><?=__("collection_index__COLLECTION_DESCRIPTION")?></label>
                            <div class="col-xs-10">
                            	<textcomplete>
                                	<textarea class="form-control" id="description" ng-model="collection.description"></textarea>
                                </textcomplete>
                            </div>
                          </div>
                        <div class="alert col-xs-offset-2" role="alert"  ng-if="errorMsgs.length">
							<ul class="col-xs-8">
								<li ng-repeat="msg in errorMsgs">
									<span class="glyphicon glyphicon-remove-sign"></span>
                                    <span>{{ ( "collection_" + msg[0] + "_" + msg[1]) | translate}}</span>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
                        <div class="form-group col-xs-12">
                            <div class="col-xs-10 col-xs-offset-2">
                            	<button class="btn btn-type-1" ng-click="isEditing = false;"><?=__("collection_index__btn_CANCEL")?></button>
                                <button class="btn btn-type-2" id="create-btn" ng-click="updateCollection()"><?=__("collection_index__btn_UPDATE")?></button>
                        	</div>
                        </div>
                    </form>
                </div>
            </div>
            <?php }?>  
        </div>
    </section>
    <?php else: ?>
    <section class="row no-vertical-padding uploading">
        <div class="container collection-info">
            <div class="row" ng-show="!isEditing">
                <div class="col-xs-3">
                	<div class="collection-cover">
                 		<img src="/<?=$collection['cover_image_medium']?>">
                 	</div>
                </div>
                <div class="col-xs-9">
                 	<div class="col-xs-12 collection-detail collection-name">
                 		<h2><?= $collection['name']?></h2>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span><?=__("collection_index__COLLECTION_MODE")?>:</span><span>{{'<?= $collection['mode']?>' | translate}}</span>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span><?=__("collection_index__COLLECTION_DEADLINE")?>:</span><span><?= $collection['deadline']?></span>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span><?=__("collection_index__COLLECTION_DELIVERY_DATE")?>:</span><span><?= $collection['delivery_date']?></span>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span><?=__("collection_index__COLLECTION_MINIMUM_ORDER")?>:</span><span><?= $collection['currency']?><?= $collection['mini_order']?></span>
                 	</div>
                 	<div class="col-xs-11 collection-detail">
                 		<div><?=__("collection_index__COLLECTION_DESCRIPTION")?>:</div>
                 		<div class="row" ng-class="{'show-all': showAllDesc}">
                 			<p class="col-xs-10" ng-if="!showAllDesc"><?=htmlentities(explode('\n', $collection['description'])[0]); ?></p>
	                 		<p class="col-xs-10" ng-if="showAllDesc" ><?=htmlentities($collection['description'])?></p>
	                 		<div class="col-xs-2">
	                 			<a ng-show="showAllDesc"  ng-click="showAllDesc = !showAllDesc;"><?=__("collection_index__HIDE")?></a>
	                 			<a ng-show="!showAllDesc" ng-click="showAllDesc = !showAllDesc;"><?=__("collection_index__SHOW_ALL")?></a>
	                 		</div>
                 		</div>
                 	</div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <section class="row collection-product">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 collection-product-category">
                	<h3><?=__("collection_index__CATEGORIES")?></h3>
                	<ul>
                		<li>
                			<a ng-click="filters.category = ''; filters.limit = 8;"  ng-class="{'active': filters.category == ''}">
                				<span>{{'dropdown__PRODUCT_CATEGORY__ALL' | translate}}</span>
                				<span>{{products.length || 0}}</span>
                			</a>
                		</li>
                		<li ng-repeat="(category, count) in categoryCounter">
                			<a ng-click="filters.category = category; filters.limit = 8;" ng-class="{'active': filters.category == category}">
                				<span>{{category | translate}}</span>
                				<span>{{count}}</span>
                			</a>
                		</li>
                	</ul>
                	<?php if($collection['status'] == 0 && $collection['user_id'] == $userAttr['user_id']) {?>
                	<div class="add-new-product">
                		<a href="/product/create/<?=$collection['id']?>"><?=__("collection_index__ADD_PRODUCT")?></a>
                	</div>
                	<?php }?>
                </div>
                <div class="col-xs-9 collection-products">
                 	<h3>{{ (filters.category == '' ? 'dropdown__PRODUCT_CATEGORY__ALL' : filters.category)  | translate}}</h3>
				    <div class="text-center empty-warning" ng-if="!products.length">
				      	<img src="/static/app/images/empty.png">
				      	<?php if($collection['status'] == 0 && $collection['user_id'] == $userAttr['user_id']) {?>
				       	<p><?=__("collection_index__NO_PRODUCT_1")?><br/><?=__("collection_index__NO_PRODUCT_2")?></p>
				       	<?php }else{ ?>
				       	<p>不是吧！该系列中没有任何产品！</p>
				       	<?php }?>
				    </div>
                 	<div class="collection-category-content row"  ng-if="products.length">
                 		<div class="col-xs-3" ng-repeat="product in products | filter : filters.category | limitTo: filters.limit: 0">
                 			<a  target="_blank" ng-href="/product/{{product.id}}" class="collection-product-detail image-link">
								<img ng-src="/{{product.medium_image_url[0]}}" class="product-image"/>
								<span class="product-info">
									<span class="product-name">{{product.name}}</span>
									<span class="product-price">{{collection.currency}}{{product.retail_price}}</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="clearfix"></div>
                 		<div class="text-center load-more" ng-if="filters.limit < (categoryCounter[filters.category] || products.length)">
                 			<button class="btn btn-type-1" ng-click="filters.limit = filters.limit + 8;"><?=__("collection_index__btn_LOAD_MORE")?></button>
                 		</div>
                 	</div>
                </div>
            </div>
        </div>
    </section>
    <footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
    </footer>
	<?php if ($collection['user_id'] == $userAttr['user_id']) {?>
    <!-- submit confirm -->
    <div class="modal fade" id="modalSubmitConfirm" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"><?=__("collection_index__modal__SUBMIT_CONFIRM")?></h4>
                </div>
                <div class="modal-body">
                    <p><?=__("collection_index__modal__SUBMIT_DETAIL")?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-type-1" data-dismiss="modal"><?=__("collection_index__modal__SUBMIT_btn_CANCEL")?></button>
                    <button type="button" class="btn btn-type-2" ng-click="enableCollection();"><?=__("collection_index__modal__SUBMIT_btn_SUBMIT")?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- delete confirm -->
    <div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"><?=__("collection_index__modal__DELETE_CONFIRM")?></h4>
                </div>
                <div class="modal-body">
                    <p><?=__("collection_index__modal__DELETE_DETAIL")?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-type-1" data-dismiss="modal"><?=__("collection_index__modal__DELETE_btn_CANCEL")?></button>
                    <button type="button" class="btn btn-type-2" ng-click="deleteCollection();"><?=__("collection_index__modal__DELETE_btn_DELETE")?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- close confirm -->
    <div class="modal fade" id="modalCloseConfirm" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"><?=__("collection_index__modal__CLOSE_CONFIRM")?></h4>
                </div>
                <div class="modal-body">
                    <p><?=__("collection_index__modal__CLOSE_DETAIL")?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-type-1" data-dismiss="modal"><?=__("collection_index__modal__CLOSE_btn_CANCEL")?></button>
                    <button type="button" class="btn btn-type-2" ng-click="closeCollection();"><?=__("collection_index__modal__CLOSE_btn_CLOSE")?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php }?>
</body>
</html>
