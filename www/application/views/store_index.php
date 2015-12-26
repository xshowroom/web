<!DOCTYPE html>
<html  ng-app="xShowroom.store.index" ng-init="storeId=<?=$storeId?>;">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    <?php echo View::factory('common/global_libraries'); ?>
   	<link rel="stylesheet" type="text/css" href="/static/app/css/store_create.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/store_index.css" />
    <script type="text/javascript" src="/static/bower_components/ng-textcomplete/ng-textcomplete.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/store_index.js"></script>
</head>
<body ng-controller="StoreIndexCtrl" class="container-fluid">
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
                	<h3>Store Images<span>({{store.images.length}}/5)</span></h3>
                </div>
                <div class="col-xs-12">
                	<div ng-repeat="url in store.images track by $index" class="store-image store-image-uploaded">
                		<image ng-src="/{{url}}">
                		<a ng-click="store.images.splice($index, 1)" class="btn btn-type-2" ng-show="isEditing">
                			<span class="glyphicon glyphicon-trash"></span>
                		</a>
                	</div>
                    <div ng-show="store.images.length < 5 && isEditing" class="store-image image-uploader" 
                    	ng-class="{'empty-store-image': !store.images.length, 'has-error': checkInfo.validation.images}"
                    	data-render-image='0' data-after-uploading = "addStoreImage(url);"
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
                    	<div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopName}">
                            <label for="name" class="col-xs-2 control-label">STORE NAME</label>
                            <div class="col-xs-6">
                            	<input type="text" class="form-control" id="store-name" name="shopName"
									ng-model="store.shopName" ng-disabled="!isEditing">
                            </div>
                        </div>
                        <div class="form-group col-xs-12"  ng-class="{'has-error': checkInfo.validation.shopType}">
                            <label for="store-type" class="col-xs-2 control-label">STORE CATEGORY</label>
                            <div class="col-xs-6">
                                <select class="form-control" id="store-type" ng-model="store.shopType" name="shopType"
                                	ng-disabled="!isEditing">
                                    <option value="dropdown__STORE__DEPARTMENT_SHOP">{{ "dropdown__STORE__DEPARTMENT_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__MULTI_BRAND_SHOP">{{ "dropdown__STORE__MULTI_BRAND_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__ONLINE_SHOP">{{ "dropdown__STORE__ONLINE_SHOP"| translate }}</option>
								</select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.collectionType}">
                            <label class="col-xs-2 control-label">COLLETION TYPES</label>
							<div class="col-xs-6">
								<label class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="collectionType.dropdown__COLLECTION__WOMEN"
										ng-true-value="true" ng-false-value="false" ng-change="setCollection('dropdown__COLLECTION__WOMEN')"
										ng-disabled="!isEditing">
									{{ "dropdown__COLLECTION__WOMEN"| translate }}
								</label>
								<label for="collection-type-men" class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="collectionType.dropdown__COLLECTION__MEN"
										ng-true-value="true" ng-false-value="false" ng-change="setCollection('dropdown__COLLECTION__MEN')"
										ng-disabled="!isEditing">
									{{ "dropdown__COLLECTION__MEN"| translate }}
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="collectionType.dropdown__COLLECTION__ACCESSORIES"
										ng-true-value="true" ng-false-value="false" ng-change="setCollection('dropdown__COLLECTION__ACCESSORIES')"
										ng-disabled="!isEditing">
									{{ "dropdown__COLLECTION__ACCESSORIES"| translate }}
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="collectionType.dropdown__COLLECTION__LIFESTYLE"
										ng-true-value="true" ng-false-value="false" ng-change="setCollection('dropdown__COLLECTION__LIFESTYLE')"
										ng-disabled="!isEditing">
									{{ "dropdown__COLLECTION__LIFESTYLE"| translate }}
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="collectionType" ng-model="collectionType.dropdown__COLLECTION__OTHERS"
										ng-true-value="true" ng-false-value="false" ng-change="setCollection('dropdown__COLLECTION__OTHERS')"
										ng-disabled="!isEditing">
									{{ "dropdown__COLLECTION__OTHERS"| translate }}
								</label>
							</div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.brandList}">
                            <label for="brand-carried" class="col-xs-2 control-label">BRAND LIST</label>
                            <div class="col-xs-6">
                                  <input type="text" class="form-control" id="brand-carried" name="brandList" ng-model="store.brandList"
                                  ng-disabled="!isEditing">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopWebsite}">
                            <label for="website" class="col-xs-2 control-label">WEBSITE</label>
                            <div class="col-xs-6">
                            	<input type="text" class="form-control" id="website" name="shopWebsite" ng-model="store.shopWebsite"
                            	ng-disabled="!isEditing">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopAddress}">
                            <label for="store-address" class="col-xs-2 control-label">ADDRESS</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="store-address" name="shopAddress" ng-model="store.shopAddress"
                                ng-disabled="!isEditing">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopCountry}">
                            <label for="material" class="col-xs-2 control-label">COUNTRY</label>
                            <div class="col-xs-6">
                            	<select  class="form-control" id="store-country" name="shopCountry" ng-model="store.shopCountry" ng-disabled="!isEditing">
									<option ng-repeat="country in countries" value="dropdown__COUNTRY__{{country}}">
										{{ ("dropdown__COUNTRY__" + country)| translate}}
									</option>
								</select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopZipcode}">
                            <label for="store-address" class="col-xs-2 control-label">ZIPCODE</label>
                            <div class="col-xs-6">
                            	<input type="text" class="form-control" id="store-postcode" name="shopZipcode" ng-model="store.shopZipcode" ng-disabled="!isEditing">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.shopTel}">
                            <label for="store-address" class="col-xs-2 control-label">TELEPHONE</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="store-telephone-number" name="shopTel" ng-model="store.shopTel" ng-disabled="!isEditing">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.about}">
                            <label for="care-instruction" class="col-xs-2 control-label">ABOUT STORE</label>
                            <div class="col-xs-6">
                           		<textcomplete>
                                  	<textarea class="form-control" id="care-instruction" ng-model="store.about" ng-disabled="!isEditing"></textarea>
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
                            <div class="col-xs-10 col-xs-offset-2" ng-if="isEditing">
                                <button class="btn btn-type-2" id="update-btn" ng-click="update();">SAVE</button>
                                <button class="btn btn-type-1" id="update-btn" ng-click="toggleEditing();">Cancel</button>
                        	</div>
                        	<div class="col-xs-10 col-xs-offset-2" ng-if="!isEditing">
                                  <button class="btn btn-type-2" id="edit-btn" ng-click="toggleEditing();">Edit</button>
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