<!DOCTYPE html>
<html ng-app="xShowroom.collection.index">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/angular-motion/dist/angular-motion.min.css">
    <link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/collection_index.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/collection_create.css" />
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
    <script type="text/javascript" src="/static/app/modules/collection_index.js"></script>
    <script>
        var collectionId = <?=$collection['id']?>;
    </script>
</head>
<body ng-controller="CollectionIndexCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
            array('currentPage' =>  'collection', 'userAttr'=> $userAttr)); 
        ?>
    </nav>
    <section class="row no-vertical-padding uploading">
        <div class="container collection-info">
            <div class="row" ng-show="!isEditing">
                <div class="col-xs-2">
                	<div class="collection-cover">
                 		<img src="/<?=$collection['cover_image_medium']?>">
                 	</div>
                </div>
                <div class="col-xs-10">
                 	<div class="col-xs-12 collection-detail collection-name">
                 		<h2><?= $collection['name']?></h2>
                 		<?php if($collection['status'] == 0) {?>
                 		<a href="#" class="collection-edit" ng-click="isEditing = true;">EDIT</a>
                 		<?php }?>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span>Order Mode:</span><span>{{'<?= $collection['mode']?>' | translate}}</span>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span>Deadline for Order:</span><span><?= $collection['deadline']?></span>	
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span>Delivery Date:</span><span><?= $collection['delivery_date']?></span>	
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span>Min-order:</span><span><?= $collection['currency']?><?= $collection['mini_order']?></span>
                 	</div>
                 	<div class="col-xs-11 collection-detail">
                 		<div>Description:</div>
                 		<div class="row" ng-class="{'show-all': showAllDesc}">
	                 		<p class="col-xs-10">
	                 			<?= $collection['description']?>
	                 		</p>
	                 		<div class="col-xs-2">
	                 			<a href="#" ng-show="showAllDesc"  ng-click="showAllDesc = !showAllDesc;">HIDE</a>
	                 			<a href="#" ng-show="!showAllDesc" ng-click="showAllDesc = !showAllDesc;">SHOW ALL</a>
	                 		</div>
                 		</div>
                 	</div>
                 	<div class="col-xs-12 collection-action">
                 		<?php if($collection['status'] == 0) {?>
                 		<button class="btn btn-type-2" ng-click="enableCollection();" ng-if="products.length">SUBMIT</button>
                 		<button class="btn btn-type-1" ng-click="deleteCollection();">DELETE</button>
                 		<?php }?>
                 		<?php if($collection['status'] == 1) {?>
                 		<button class="btn btn-type-2" ng-click="closeCollection();">CLOSE</button>
                 		<?php }?>
                 	</div>
                </div>
            </div>
            <?php if($collection['status'] == 0) {?>
            <div class="row collection-create" ng-show="isEditing">
                <div class="col-xs-2">
                    <div class="image-uploader" id="cover-image" data-image-online-url="collection.image" data-target-model="collection.image"
                    	ng-class="{'has-error': checkInfo.validation.image}"></div>
                    <label class="collection-cover-label">COLLECTION COVER</label>
                </div>
                <div class="col-xs-10">
                    <form class="form-horizontal" id="collection-create-form">
                    	<div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.name}">
                            <label for="name" class="col-xs-4 control-label">Collection Name</label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="name" ng-model="collection.name">
                            </div>
                        </div>
                        <div class="form-group col-xs-6"  ng-class="{'has-error': checkInfo.validation.category}">
                            <label for="category" class="col-xs-4 control-label">Category</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="category" ng-model="collection.category">
									  <option value="dropdown__COLLECTION__WOMEN">{{ 'dropdown__COLLECTION__WOMEN' | translate}}</option>
									  <option value="dropdown__COLLECTION__ACCESSORIES">{{ 'dropdown__COLLECTION__ACCESSORIES' | translate}}</option>
									  <option value="dropdown__COLLECTION__MEN">{{ 'dropdown__COLLECTION__MEN' | translate}}</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.mode}">
                            <label for="mode" class="col-xs-4 control-label">Collection Mode</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="mode" ng-model="collection.mode">
									  <option value="dropdown__COLLECTION_MODE__PRE_ORDER">{{ 'dropdown__COLLECTION_MODE__PRE_ORDER' | translate}}</option>
									  <option value="dropdown__COLLECTION_MODE__STOCK">{{ 'dropdown__COLLECTION_MODE__STOCK' | translate}}</option>
									  <option value="dropdown__COLLECTION_MODE__RE_ORDER">{{ 'dropdown__COLLECTION_MODE__RE_ORDER' | translate}}</option>
									  <option value="dropdown__COLLECTION_MODE__PERMANENT">{{ 'dropdown__COLLECTION_MODE__PERMANENT' | translate}}</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.season}">
                            <label for="season" class="col-xs-4 control-label">Collection Season</label>
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
                            <label for="mini-order" class="col-xs-4 control-label">Minmun Order</label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="mini-order" ng-model="collection.order">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.currency}">
                            <label for="currency" class="col-xs-4 control-label">Currency</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="currency" ng-model="collection.currency">
                                      <option value="￥">￥-RMB</option>
                                      <option value="$">$-USD</option>
                                      <option value="￡">￡-GBP</option>
                                      <option value="€">€-EUR</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.deadline}">
                            <label for="deadline" class="col-xs-4 control-label">Deadline for Order</label>
                            <div class="col-xs-8">
                            	<input type="text" class="form-control datepicker" id="deadline" ng-model="collection.deadline"
                                  	data-date-format="yyyy-MM-dd" data-date-type="string" data-min-date="today"
					        		data-model-date-format="yyyy-MM-dd" data-autoclose="1" bs-datepicker ng-change="collection.delivery = ''">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.delivery}">
                            <label for="inputEmail3" class="col-xs-4 control-label">Delivery Date</label>
                            <div class="col-xs-8">
                            	<input type="text" class="form-control datepicker" id="delivery-date" ng-model="collection.delivery"
                                  	data-date-format="yyyy-MM-dd" data-date-type="string" data-min-date="{{collection.deadline}}"
					        		data-model-date-format="yyyy-MM-dd" data-autoclose="1" bs-datepicker>
                            </div>
                          </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.description}">
                            <label for="description" class="col-xs-2 control-label">Description</label>
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
									<span>{{msg[0]}}{{msg[1]}}</span>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
                        <div class="form-group col-xs-12">
                            <div class="col-xs-10 col-xs-offset-2">
                            	<button class="btn btn-type-1" ng-click="isEditing = false;">CANCEL</button>
                                <button class="btn btn-type-2" id="create-btn" ng-click="updateCollection()">UPDATE</button>
                        	</div>
                        </div>
                    </form>
                </div>
            </div>
            <?php }?>  
        </div>
    </section>
    <section class="row empty-warning" ng-if="!products.length">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center ">
                	<img src="/static/app/images/empty.png">
                	<p>OH NO! YOU HAVE NO<br/>PRODUCTS IN THIS COLLECTION!</p>
                	<?php if($collection['status'] == 0) {?>
                	<a class="btn btn-type-2" href="/product/create/<?=$collection['id']?>">ADD PRODUCT</a>
					<?php }?>
                </div>
            </div>
        </div>
    </section>
    <section class="row collection-product" ng-if="products.length">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 collection-product-category">
                	<h3>CATEGORIES</h3>
                	<ul>
                		<li>
                			<a ng-click="filters.category = ''; filters.limit = 8;">
                				<span>{{'dropdown__PRODUCT_CATEGORY__ALL' | translate}}</span>
                				<span>{{products.length || 0}}</span>
                			</a>
                		</li>
                		<li ng-repeat="(category, count) in categoryCounter">
                			<a ng-click="filters.category = category; filters.limit = 8;">
                				<span>{{category | translate}}</span>
                				<span>{{count}}</span>
                			</a>
                		</li>
                	</ul>
                	<?php if($collection['status'] == 0) {?>
                	<div class="add-new-product">
                		<a href="/product/create/<?=$collection['id']?>">+ ADD NEW PRODUCT</a>
                	</div>
                	<?php }?>
                </div>
                <div class="col-xs-9 collection-products">
                 	<h3>{{ (filters.category == '' ? 'dropdown__PRODUCT_CATEGORY__ALL' : filters.category)  | translate}}</h3>
                 	<div class="collection-category-content">
                 		<div class="col-xs-3" ng-repeat="product in products | filter : filters.category | limitTo: filters.limit: 0">
                 			<a  target="_blank" ng-href="/product/{{product.id}}" class="collection-product-detail">
								<img ng-src="/{{product.image_url[0]}}" class="product-image"/>
								<span class="product-info">
									<span class="product-name">{{product.name}}</span>
									<span class="product-price">{{collection.currency}}{{product.retail_price}}</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="clearfix"></div>
                 		<div class="text-center load-more" ng-if="filters.limit < (categoryCounter[filters.category] || products.length)">
                 			<button class="btn btn-type-1" ng-click="filters.limit = filters.limit + 8;">LOAD MORE</button>
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