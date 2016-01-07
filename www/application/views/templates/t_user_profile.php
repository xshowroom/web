<div class=" profile-content" ng-cloak>
    <h2><?=__("profile__BASIC_INFO")?></h2>
    <div class="form-line"  ng-init="user = {};">
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__EMAIL")?></label>
            <span class="lb_item_field"><?= $user['email'] ?></span>
        </div>
        <div class="form-group" ng-init="user.firstName='<?= $userAttr['first_name'] ?>';">
            <label class="lb_item_name"><?=__("profile__FIRST_NAME")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.user.firstName}">
            	<input type="text" class="form-control" ng-model="user.firstName" ng-disabled="!isEditing"/>
            </div>
        </div>
        <div class="form-group" ng-init="user.lastName='<?= $userAttr['last_name'] ?>';">
            <label class="lb_item_name"><?=__("profile__LAST_NAME")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.user.lastName}">
            	<input type="text" class="form-control" ng-model="user.lastName" ng-disabled="!isEditing"/>
            </div>
        </div>
        <div class="form-group" ng-init="user.displayName='<?= $userAttr['display_name'] ?>';">
            <label class="lb_item_name"><?=__("profile__DISPLAY_NAME")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.user.displayName}">
            	<input type="text" class="form-control" ng-model="user.displayName" ng-disabled="!isEditing"/>
            </div>
        </div>
        <div class="form-group" ng-init="user.tel='<?= $userAttr['telephone'] ?>';">
            <label class="lb_item_name"><?=__("profile__TELEPHONE")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.user.tel}">
            	<input type="text" class="form-control" ng-model="user.tel" ng-disabled="!isEditing"/>
            </div>
        </div>
        <div class="form-group" ng-init="user.mobile='<?= $userAttr['mobile']?>';">
            <label class="lb_item_name"><?=__("profile__MOBILE")?></label>
            <div class="lb_item_field" ng-if="isEditing">
            	<input type="text" class="form-control" ng-model="user.mobile"/>
            </div>
            <span class="lb_item_field" ng-if="!isEditing"><?= empty($userAttr['mobile']) ? "(N/A)" : $userAttr['mobile'] ?></span>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__REGISTER_DATE")?></label>
            <span class="lb_item_field"><?= $user['register_date'] ?></span>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__LAST_LOGIN_TIME")?></label>
            <span class="lb_item_field"><?= empty($user['last_login_time']) ? "(N/A)" :  $user['last_login_time'] ?></span>
        </div>
    </div>

    <h2><?=__("profile__COMPANY_INFO")?></h2>
    <div class="form-line"  ng-init="company = {};">
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__COMPANY_NAME")?></label>
            <span class="lb_item_field"><?= $userAttr['company_name'] ?></span>
        </div>
        <div class="form-group" ng-init="company.companyAddr='<?= $userAttr['company_address'] ?>';">
            <label class="lb_item_name"><?=__("profile__COMPANY_ADDRESS")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.company.companyAddr}">
            	<input type="text" class="form-control" ng-model="company.companyAddr" ng-disabled="!isEditing"/>
            </div>
        </div>
        <div class="form-group" ng-init="company.companyCountry='<?= $userAttr['company_country'] ?>';">
            <label class="lb_item_name"><?=__("profile__COMPANY_COUNTRY")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.company.companyCountry}">
            	<select  class="form-control" ng-model="company.companyCountry" ng-disabled="!isEditing">
					<option ng-repeat="country in countries" value="dropdown__COUNTRY__{{country}}">
						{{ ("dropdown__COUNTRY__" + country)| translate}}
					</option>
				</select>
			</div>
        </div>
        <div class="form-group" ng-init="company.companyZip='<?= $userAttr['company_zip'] ?>';">
            <label class="lb_item_name"><?=__("profile__COMPANY_ZIP")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.company.companyZip}">
            	<input type="text" class="form-control" ng-model="company.companyZip" ng-disabled="!isEditing"/>
            </div>
        </div>
        <div class="form-group" ng-init="company.companyTel='<?= $userAttr['company_telephone'] ?>';">
            <label class="lb_item_name"><?=__("profile__COMPANY_TELEPHONE")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.company.companyTel}">
            	<input type="text" class="form-control" ng-model="company.companyTel" ng-disabled="!isEditing"/>
            </div>
        </div>
        <div class="form-group" ng-init="company.companyWebsite='<?= $userAttr['company_web_url'] ?>';">
            <label class="lb_item_name"><?=__("profile__COMPANY_WEB_URL")?></label>
            <a class="lb_item_field" href="<?= $userAttr['company_web_url'] ?>" target="_blank" ng-if="!isEditing"><?= $userAttr['company_web_url'] ?></a>
            <div class="lb_item_field" ng-if="isEditing" ng-class="{'has-error': checkInfo.validation.company.companyWebsite}">
            	<input type="text" class="form-control" ng-model="company.companyWebsite"/>
            </div>
        </div>
    </div>

    <?php if($user['role_type'] == Model_User::TYPE_USER_BRAND): ?>
    <h2><?=__("profile__BRAND_INFO")?></h2>
    <div class="form-line" ng-init="brand = {};">
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__BRAND_NAME")?></label>
            <span class="lb_item_field"><?= $brandInfo['brand_name'] ?></span>
        </div>
        <div class="form-group" ng-init="brand.designerName = '<?= $brandInfo['designer_name'] ?>';">
            <label class="lb_item_name"><?=__("profile__DESIGNER_NAME")?></label>
            <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.brand.designerName}">
            	<input type="text" class="form-control" ng-model="brand.designerName" ng-disabled="!isEditing"/>
            </div>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__BRAND_URL")?></label>
            <a class="lb_item_field" href="<?= URL::site("brands/".$brandInfo['brand_url'], 'http') ?>" target="_blank"><?= URL::site("brands/".$brandInfo['brand_url'], 'http') ?></a>
        </div>
        <div class="form-group" ng-init="brand.categoryType = '<?= $brandInfo['category_type'] ?>';initCategory();">
           	 <label class="lb_item_name">品牌类型</label>
           	 <span class="lb_item_field" ng-if="!isEditing">{{ getCategory("<?= $brandInfo['category_type'] ?>") }}</span>
           	 <div class="lb_item_field" ng-class="{'has-error': checkInfo.validation.brand.categoryType}" ng-if="isEditing">
				<label class="checkbox-inline">
					<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__WOMEN" ng-true-value="true" ng-change="setCollection('dropdown__COLLECTION__WOMEN')">
					{{ "dropdown__COLLECTION__WOMEN"| translate }}
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__MEN" ng-true-value="true" ng-change="setCollection('dropdown__COLLECTION__MEN')">
					{{ "dropdown__COLLECTION__MEN"| translate }}
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__JEWELRY" ng-true-value="true" ng-change="setCollection('dropdown__COLLECTION__JEWELRY')">
					{{ "dropdown__COLLECTION__JEWELRY"| translate }}
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__ACCESSORIES" ng-true-value="true" ng-change="setCollection('dropdown__COLLECTION__ACCESSORIES')">
						{{ "dropdown__COLLECTION__ACCESSORIES"| translate }}
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__FOOTWEAR" ng-true-value="true" ng-change="setCollection('dropdown__COLLECTION__FOOTWEAR')">
					{{ "dropdown__COLLECTION__FOOTWEAR"| translate }}
				</label>
            </div>
        </div>
        <div class="form-group" ng-init="brand.description='<?= $brandInfo['description'] ?>';">
         	<label class="lb_item_name"><?=__("profile__BRAND_DESCRIPTION")?></label>
            <div class="lb_item_field">
            	<textcomplete>
                    <textarea class="form-control" ng-model="brand.description" ng-disabled="!isEditing"></textarea>
                </textcomplete>
            </div>
        </div>
        <div class="form-group" ng-init="brand.imagePath='<?= $brandInfo['brand_image'] ?>';">
        	<label class="lb_item_name">品牌封面</label>
        	<div class="lb_item_field">
            	<img src="<?= URL::site($brandInfo['brand_image']) ?>" ng-if="!isEditing"/>
            	<div class="image-uploader" ng-class="{'has-error': step.validation.brand.imagePath}" data-target-model="brand.imagePath"
					data-title="<?= __('brand_register__STEP_2__IMAGE');?>" ng-if="isEditing" data-image-online-url='brand.imagePath'>
				</div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="alert col-xs-12" role="alert"  ng-if="errorMsgs.length">
		<ul class="col-xs-6">
			<li ng-repeat="msg in errorMsgs">
				<span class="glyphicon glyphicon-remove-sign"></span>
				<span>{{ ( "" + msg[0] + "_" + msg[1]) | translate}}</span>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
    <div class="profile-actions">
    	<button class="btn btn-type-2" ng-if="!isEditing" ng-click="edit();">修改信息</button>
    	<button class="btn btn-type-2" ng-if="isEditing" ng-click="save();">保存</button>
    	<button class="btn btn-type-1" ng-if="isEditing" ng-click="reload();">取消</button>
    </div>
</div>