<!DOCTYPE html>
<html  ng-app="xShowroom.store.create">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    <?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/store_create.css" />
    <script type="text/javascript" src="/static/bower_components/ng-textcomplete/ng-textcomplete.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/store_create.js"></script>
</head>
<body ng-controller="StoreCreateCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer',
            array('currentPage' =>  'dashboard', 'userAttr'=> $userAttr)); 
           ?>
    </nav>
    <section class="row no-vertical-padding">
        <div class="container">
            <div class="row store-inputs uploading">
                <div class="col-xs-12">
                	<h3>Store Images<span>({{store.images.length}}/5)</span></h3>
                </div>
                <div class="col-xs-12">
                	<div ng-repeat="url in store.images track by $index" class="store-image store-image-uploaded">
                		<image ng-src="/{{url}}">
                		<a ng-click="store.images.splice($index, 1)" class="btn btn-type-2">
                			<span class="glyphicon glyphicon-trash"></span>
                		</a>
                	</div>
                    <div ng-show="store.images.length < 5" class="store-image image-uploader" 
                    	ng-class="{'empty-store-image': !store.images.length, 'has-error': checkInfo.validation.images}"
                    	data-render-image='0' data-after-uploading = "addstoreImage(url);"
                    	data-title="{{store.images.length? '': 'You can upload 5 images (jpg, png, gif) for each store.'}}">
                    </div>
                </div>
            </div>
            <div class="row store-inputs">
                <div class="col-xs-12">
                    <h3>STORE INFO</h3>
                </div>
                <div class="col-xs-10">
                    <form class="form-horizontal" id="store-create-form">
                    	<div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.name}">
                            <label for="name" class="col-xs-2 control-label"><?=__("product_create__store_NAME");?></label>
                            <div class="col-xs-6">
                            	<input type="text" class="form-control" id="name"  name="name" ng-model="store.name">
                            </div>
                        </div>
                        <div class="form-group col-xs-12"  ng-class="{'has-error': checkInfo.validation.category}">
                            <label for="category" class="col-xs-2 control-label"><?=__("store_create__store_CATEGORY");?></label>
                            <div class="col-xs-6">
                                <select class="form-control" id="category" name="category" ng-model="store.category"
                                	ng-change="setSizeCodes(store.category, store.sizeRegion);">
                                	<option ng-repeat="category in categories track by $index" value="dropdown__store_CATEGORY__{{category | uppercase}}">{{('dropdown__store_CATEGORY__' + category.toUpperCase()) | translate}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.styleNum}">
                            <label for="style-number" class="col-xs-2 control-label"><?=__("store_create__store_STYLE_NUMBER");?></label>
                            <div class="col-xs-6">
                                  <input type="text" class="form-control" id="style-number" name="styleNumber" ng-model="store.styleNum">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.wholePrice}">
                            <label for="wholesale-price" class="col-xs-2 control-label"><?=__("store_create__store_WHOLESALE_PRICE");?></label>
                            <div class="col-xs-6">
                                  <input type="text" class="form-control" id="wholesale-price" name="wholesalePrice" ng-model="store.wholePrice">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.retailPrice}">
                            <label for="retail-price" class="col-xs-2 control-label"><?=__("store_create__store_RETAIL_PRICE");?></label>
                            <div class="col-xs-6">
                                  <input type="text" class="form-control" id="retail-price" name="retailPrice" ng-model="store.retailPrice">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.madeIn}">
                            <label for="made-in" class="col-xs-2 control-label"><?=__("store_create__store_MADE_IN");?></label>
                            <div class="col-xs-6">
                                <select  class="form-control" id="made-in" name="madeIn" ng-model="store.madeIn">
									<option ng-repeat="country in countries" value="dropdown__COUNTRY__{{country}}">
										{{ ("dropdown__COUNTRY__" + country)| translate}}
									</option>
								</select>
                            </div>
                        </div>
                         <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.material}">
                            <label for="material" class="col-xs-2 control-label"><?=__("store_create__store_MATERIAL");?></label>
                            <div class="col-xs-6">
                            	<select class="form-control" id="material" ng-model="store.material">
                                    <option ng-repeat="material in materials" value="{{'dropdown__store_MATERIAL__' + material}}">
                                    	{{('dropdown__store_MATERIAL__' + material) | translate}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.careIns}">
                            <label for="care-instruction" class="col-xs-2 control-label"><?=__("store_create__store_CARE_INSTRUCTION");?></label>
                            <div class="col-xs-6">
                           		<textcomplete>
                                  	<textarea class="form-control" id="care-instruction" ng-model="store.careIns"></textarea>
                                </textcomplete>
                            </div>
                          </div>
                        <div class="alert col-xs-10 col-xs-offset-2" role="alert"  ng-if="errorMsgs.length">
							<ul class="col-xs-6">
								<li ng-repeat="msg in errorMsgs">
									<span class="glyphicon glyphicon-remove-sign"></span>
									<span>{{ ( "store_" + msg[0] + "_" + msg[1]) | translate}}</span>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
                        <div class="form-group col-xs-12">
                            <div class="col-xs-10 col-xs-offset-2">
                                  <button class="btn btn-type-2" id="create-btn" ng-click="create()"><?=__("store_create__store_btn_SAVE");?></button>
                        	</div>
                        </div>
                    </form>
                </div>            
            </div>
        </div>
    </section>
    <footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
    </footer>
</body>
</html>
