<!DOCTYPE html>
<html  ng-app="xShowroom.store.create">
<head>
    <meta charset="UTF-8" >
    <title>XSHOWROOM</title>
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
        <div class="container" ng-cloak>
            <div class="row store-inputs uploading">
                <div class="col-xs-12">
                	<h3><?=__("store_index__STORE_IMAGES");?><span>({{store.shopImage.length}}/5)</span></h3>
                </div>
                <div class="col-xs-12">
                	<div ng-repeat="url in store.shopImage track by $index" class="store-image store-image-uploaded">
                		<image ng-src="/{{url}}">
                		<a ng-click="store.shopImage.splice($index, 1)" class="btn btn-type-2">
                			<span class="glyphicon glyphicon-trash"></span>
                		</a>
                	</div>
                    <div ng-show="store.shopImage.length < 5" class="store-image image-uploader" 
                    	ng-class="{'empty-store-image': !store.shopImage.length, 'has-error': checkInfo.validation.shopImage}"
                    	data-render-image='0' data-after-uploading = "addStoreImage(url);"
                    	data-title="{{store.shopImage.length? '': 'You can upload 5 images (jpg, png, gif) for each store.'}}">
                    </div>
                </div>
            </div>
            <div class="row store-inputs">
                <div class="col-xs-12">
                    <h3><?=__("store_index__STORE_INFO");?></h3>
                </div>
                <div class="col-xs-10">
                    <form class="form-horizontal" id="store-create-form">
                    	<div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopName}">
                            <label for="name" class="col-xs-2 control-label"><?=__("store_index__STORE_NAME");?></label>
                            <div class="col-xs-6">
                            	<input type="text" class="form-control" id="store-name" name="shopName"
									ng-model="store.shopName">
                            </div>
                        </div>
                        <div class="form-group col-xs-12"  ng-class="{'has-error': checkInfo.validation.shopType}">
                            <label for="store-type" class="col-xs-2 control-label"><?=__("store_index__STORE_CATEGORY");?></label>
                            <div class="col-xs-6">
                                <select class="form-control" id="store-type" ng-model="store.shopType" name="shopType">
                                    <option value="dropdown__STORE__ONLINE_RETAIL_SHOP">{{ "dropdown__STORE__ONLINE_RETAIL_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__MULTI_LABELS_SHOP">{{ "dropdown__STORE__MULTI_LABELS_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__CONCEPT_SHOP">{{ "dropdown__STORE__CONCEPT_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__CHAIN_SHOP">{{ "dropdown__STORE__CHAIN_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__DEPARTMENT_SHOP">{{ "dropdown__STORE__DEPARTMENT_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__BUYING_OFFICE_SHOP">{{ "dropdown__STORE__BUYING_OFFICE_SHOP"| translate }}</option>
								</select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.collectionType}">
                            <label class="col-xs-2 control-label"><?=__("store_index__COLLECTION_TYPES");?></label>
							<div class="col-xs-10">
								<label class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="dropdown__COLLECTION__WOMEN" ng-change="setCollection('dropdown__COLLECTION__WOMEN')">
									{{ "dropdown__COLLECTION__WOMEN"| translate }}
								</label>
								<label for="collection-type-men" class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="dropdown__COLLECTION__MEN" ng-change="setCollection('dropdown__COLLECTION__MEN')">
									{{ "dropdown__COLLECTION__MEN"| translate }}
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="dropdown__COLLECTION__JEWELRY" ng-change="setCollection('dropdown__COLLECTION__JEWELRY')">
									{{ "dropdown__COLLECTION__JEWELRY"| translate }}
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="dropdown__COLLECTION__ACCESSORIES" ng-change="setCollection('dropdown__COLLECTION__ACCESSORIES')">
									{{ "dropdown__COLLECTION__ACCESSORIES"| translate }}
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="dropdown__COLLECTION__FOOTWEAR" ng-change="setCollection('dropdown__COLLECTION__FOOTWEAR')">
									{{ "dropdown__COLLECTION__FOOTWEAR"| translate }}
								</label>
							</div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.brandList}">
                            <label for="brand-carried" class="col-xs-2 control-label"><?=__("store_index__BRAND_LIST");?></label>
                            <div class="col-xs-6">
                                  <input type="text" class="form-control" id="brand-carried" name="brandList" ng-model="store.brandList">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopWebsite}">
                            <label for="website" class="col-xs-2 control-label"><?=__("store_index__STORE_WEBSITE");?></label>
                            <div class="col-xs-6">
                            	<input type="text" class="form-control" id="website" name="shopWebsite" ng-model="store.shopWebsite">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopAddress}">
                            <label for="store-address" class="col-xs-2 control-label"><?=__("store_index__STORE_ADDRESS");?></label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="store-address" name="shopAddress" ng-model="store.shopAddress">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopShipAddress}">
                            <label for="store-ship-address" class="col-xs-2 control-label"><?=__("store_index__STORE_SHIPPING_ADDRESS");?></label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="store-ship-address" name="shopShipAddress" ng-model="store.shopShipAddress">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopCountry}">
                            <label for="material" class="col-xs-2 control-label"><?=__("store_index__STORE_COUNTRY");?></label>
                            <div class="col-xs-6">
                            	<select  class="form-control" id="store-country" name="shopCountry" ng-model="store.shopCountry">
									<option ng-repeat="country in countries" value="dropdown__COUNTRY__{{country}}">
										{{ ("dropdown__COUNTRY__" + country)| translate}}
									</option>
								</select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopZipcode}">
                            <label for="store-address" class="col-xs-2 control-label"><?=__("store_index__STORE_ZIPCODE");?></label>
                            <div class="col-xs-6">
                            	<input type="text" class="form-control" id="store-postcode" name="shopZipcode" ng-model="store.shopZipcode">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopTel}">
                            <label for="store-address" class="col-xs-2 control-label"><?=__("store_index__STORE_TELEPHONE");?></label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="store-telephone-number" name="shopTel" ng-model="store.shopTel">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopAbout}">
                            <label for="store-about" class="col-xs-2 control-label"><?=__("store_index__ABOUT_STORE");?></label>
                            <div class="col-xs-6">
                           		<textcomplete>
                                  	<textarea class="form-control" id="store-about" ng-model="store.shopAbout"></textarea>
                                </textcomplete>
                            </div>
                          </div>
                        <div class="alert col-xs-10 col-xs-offset-2" role="alert"  ng-if="errorMsgs.length">
							<ul class="col-xs-6">
								<li ng-repeat="msg in errorMsgs">
									<span class="glyphicon glyphicon-remove-sign"></span>
									<span>{{ ( msg[0] + "_" + msg[1]) | translate}}</span>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
                        <div class="form-group col-xs-12">
                            <div class="col-xs-10 col-xs-offset-2">
                                  <button class="btn btn-type-2" id="create-btn" ng-click="create();"><?=__("store_index__btn_SAVE");?></button>
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
