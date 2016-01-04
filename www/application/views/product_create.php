<!DOCTYPE html>
<html  ng-app="xShowroom.product.create" ng-init="collectionId = <?=$collectionId?>;">
<head>
    <meta charset="UTF-8" >
    <title>XSHOWROOM</title>
    <?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/product_create.css" />
    <script type="text/javascript" src="/static/bower_components/ng-textcomplete/ng-textcomplete.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/product_create.js"></script>
</head>
<body ng-controller="ProductCreateCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
            array('currentPage' =>  'product', 'userAttr'=> $userAttr)); 
           ?>
    </nav>
    <section class="row no-vertical-padding">
        <div class="container">
            <div class="row product-inputs uploading">
                <div class="col-xs-12">
                	<h3><?=__("product_create__PRODUCT_IMAGES");?><span>({{product.images.length}}/5)</span></h3>
                </div>
                <div class="col-xs-12">
                	<div ng-repeat="url in product.images track by $index" class="product-image product-image-uploaded">
                		<image ng-src="/{{url}}">
                		<a ng-click="product.images.splice($index, 1)" class="btn btn-type-2">
                			<span class="glyphicon glyphicon-trash"></span>
                		</a>
                	</div>
                    <div ng-show="product.images.length < 5" class="product-image image-uploader" 
                    	ng-class="{'empty-product-image': !product.images.length, 'has-error': checkInfo.validation.images}"
                    	data-render-image='0' data-after-uploading = "addProductImage(url);"
                    	data-title="{{product.images.length? '': '<?=__("product_create__PRODUCT_IMAGES_REQ");?>'}}">
                    </div>
                </div>
            </div>
            <div class="row product-inputs">
                <div class="col-xs-12">
                    <h3><?=__("product_create__PRODUCT_INFO");?></h3>
                </div>
                <div class="col-xs-10">
                    <form class="form-horizontal" id="product-create-form">
                    	<div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.name}">
                            <label for="name" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_NAME");?></label>
                            <div class="col-xs-6">
                            	<input type="text" class="form-control" id="name"  name="name" ng-model="product.name">
                            </div>
                        </div>
                        <div class="form-group col-xs-12"  ng-class="{'has-error': checkInfo.validation.category}">
                            <label for="category" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_CATEGORY");?></label>
                            <div class="col-xs-6">
                                <select class="form-control" id="category" name="category" ng-model="product.category"
                                	ng-change="setSizeCodes(product.category, product.sizeRegion);">
                                	<option ng-repeat="category in categories track by $index" value="dropdown__PRODUCT_CATEGORY__{{category | uppercase}}">{{('dropdown__PRODUCT_CATEGORY__' + category.toUpperCase()) | translate}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.styleNum}">
                            <label for="style-number" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_STYLE_NUMBER");?></label>
                            <div class="col-xs-6">
                                  <input type="text" class="form-control" id="style-number" name="styleNumber" ng-model="product.styleNum">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.wholePrice}">
                            <label for="wholesale-price" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_WHOLESALE_PRICE");?></label>
                            <div class="col-xs-6">
                                  <input type="text" class="form-control" id="wholesale-price" name="wholesalePrice" ng-model="product.wholePrice">
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.retailPrice}">
                            <label for="retail-price" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_RETAIL_PRICE");?></label>
                            <div class="col-xs-6">
                                  <input type="text" class="form-control" id="retail-price" name="retailPrice" ng-model="product.retailPrice">
                            </div>
                        </div>
                        <div class="form-group col-xs-12"  ng-class="{'has-error': checkInfo.validation.sizeRegion}">
                            <label for="size-region" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_SIZE_REGION");?></label>
                            <div class="col-xs-6">
                            	<select class="form-control" id="size-region" name="sizeRegion" ng-model="product.sizeRegion"
                            		ng-change="setSizeCodes(product.category, product.sizeRegion);">
                                	<option ng-repeat="region in sizeRegions" value="{{region}}">{{region}}</option>
                            	</select>
                            </div>
                            <div class="col-xs-8 col-xs-offset-2 size-codes">
                            	<label class="checkbox-inline" ng-repeat="code in sizeCode">
								  	<input type="checkbox" name="size-code" ng-model="product.sizeCode[code]"
								  		ng-true-value="true" ng-false-value="false"> {{code}}
								</label>
                            </div>
                        </div>
                        <div class="form-group col-xs-12"  ng-class="{'has-error': checkInfo.validation.color}">
                            <label for="category" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_COLOR_SET");?></label>
                            <div class="col-xs-6 selected-colors">
                            	<div ng-repeat="color in product.color track by $index" class="color-item col-xs-3">
                            		<div ng-if="color.type == 0" style="background-color:{{color.value}}"></div>
                            		<div ng-if="color.type == 1" style="background-image:url(/{{color.value}})"></div>
                            		<div>{{color.name}}</div>
								</div>
                            	<a class="new-color col-xs-4" ng-click="openColorModal();"><?=__("product_create__PRODUCT_ADD_COLOR");?></a>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.madeIn}">
                            <label for="made-in" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_MADE_IN");?></label>
                            <div class="col-xs-6">
                                <select  class="form-control" id="made-in" name="madeIn" ng-model="product.madeIn">
									<option ng-repeat="country in countries" value="dropdown__COUNTRY__{{country}}">
										{{ ("dropdown__COUNTRY__" + country)| translate}}
									</option>
								</select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.material}">
                            <label for="material" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_MATERIAL");?></label>
                            <div class="col-xs-6">
                            	<select class="form-control" id="material" ng-model="product.material">
                                    <option ng-repeat="material in materials" value="{{'dropdown__PRODUCT_MATERIAL__' + material}}">
                                    	{{('dropdown__PRODUCT_MATERIAL__' + material) | translate}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.careIns}">
                            <label for="care-instruction" class="col-xs-2 control-label"><?=__("product_create__PRODUCT_CARE_INSTRUCTION");?></label>
                            <div class="col-xs-6">
                           		<textcomplete>
                                  	<textarea class="form-control" id="care-instruction" ng-model="product.careIns"></textarea>
                                </textcomplete>
                            </div>
                          </div>
                        <div class="alert col-xs-10 col-xs-offset-2" role="alert"  ng-if="errorMsgs.length">
							<ul class="col-xs-6">
								<li ng-repeat="msg in errorMsgs">
									<span class="glyphicon glyphicon-remove-sign"></span>
									<span>{{ ( "product_" + msg[0] + "_" + msg[1]) | translate}}</span>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
                        <div class="form-group col-xs-12">
                            <div class="col-xs-10 col-xs-offset-2">
                                  <button class="btn btn-type-2" id="create-btn" ng-click="create()"><?=__("product_create__PRODUCT_btn_SAVE");?></button>
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
    
    <div class="modal fade" id="color-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="color-modal">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
	      		</div>
	      		<div class="modal-body uploading">
	      			<h4><?=__("product_create__PRODUCT_color_STANDARD_COLOR");?></h4>
	      			<div class="standard-colors">
	      				<div ng-repeat="(name, color) in standardColors" class="color-item" ng-class="{'active':currentColors.standard[name]}">
		      				<label class="checkbox-inline" ng-style="{'background': color}">
							  	<input type="checkbox" ng-model="currentColors.standard[name]" ng-true-value="'{{color}}'" ng-false-value="false">
							  	<span class="glyphicon glyphicon-ok"></span>
							</label>
							<div class="color-name">{{name}}</div>
						</div>
						<div class="clearfix"></div>
	      			</div>
	      			<h4><?=__("product_create__PRODUCT_color_CUSTOMIZED_COLOR");?></h4>
	      			<div class="customized-colors available-colors">
	      				<div ng-repeat="color in currentColors.customized track by $index" class="color-item"
	      					ng-class="{'active': color['selected']}">
		      				<label class="checkbox-inline" style="{{color['style']}}">
							  	<!--  <input type="checkbox" ng-model="color['selected']" ng-true-value="true" ng-false-value="false" ng-change="checkColorName($index);"> -->
							  	<span class="glyphicon glyphicon-ok"></span>
							</label>
							<input type="text" ng-model="color['name']" class="form-control" placeholder="unnamed_color_{{$index}}">
							<span class="glyphicon glyphicon-trash" ng-click="removeCustomizedColor($index)"></span>
						</div>
						<div class="clearfix"></div>
	      			</div>
	      			<div class="color-actions">
	      				<!-- <button class="btn btn-default"><i class="fa fa-eyedropper"></i>SELECT</button>
	      				<div>OR</div> -->
	      				<label class="btn btn-default">
	      					<i class="fa fa-camera"></i>
	      					<span><?=__("product_create__PRODUCT_color_UPLOAD_IMAGE");?></span>
	      					<input type="file" id="color-file">
	      				</label>
	      			</div>
	      			<div class="alert" role="alert"  ng-if="colorErrorMsg.length">
						<ul>
							<li ng-repeat="msg in colorErrorMsg">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{('product_add_image_' + msg.msg) | translate }}</span>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
	      			<div class="add-color-action">
	      				<button class="btn btn-type-2" ng-click="setColor();"><?=__("product_create__PRODUCT_color_btn_ADD_COLOR");?></button>
	      			</div>
	      			<div class="add-color-tips">
                        <?=__("product_create__PRODUCT_color_DESCRITION");?>
	      			</div>
	      		</div>
	    	</div>
	  	</div>
	</div>
</body>
</html>
