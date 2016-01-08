<!DOCTYPE html>
<html ng-app="xShowroom.user.profile">
<head>
	<meta charset="UTF-8" >
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
    <link rel="stylesheet" type="text/css" href="/static/app/css/profile.css" />
	<script type="text/javascript" src="/static/app/modules/user_profile.js"></script>
</head>
<body ng-controller="UserProfileCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<?php if($user["role_type"] == Model_User::TYPE_USER_BRAND): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_brand', array('currentPage' =>  'profile', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php elseif ($user["role_type"] == Model_User::TYPE_USER_BUYER): ?>
	<nav class="row user-navigation">
        <?php echo View::factory('common/global_navigation_top_buyer', array('currentPage' =>  'profile', 'userAttr'=> $userAttr)); ?>
	</nav>
	<?php endif; ?>
	<section class="row profile">
        <div class="container">
            <!-- left nav -->
            <?php if($user["role_type"] != Model_User::TYPE_USER_ADMIN): ?>
                <?php echo View::factory('common/global_navigation_user_center', array('currentPage' =>  'profile')); ?>
            <?php endif; ?>
            <!-- right nav -->
            <div class="col-md-10">
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
                            <div class="lb_item_field" >
                                <a href="<?= $userAttr['company_web_url'] ?>" target="_blank" ng-if="!isEditing"><?= $userAttr['company_web_url'] ?></a>
                            </div>
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
                            <div class="form-group" ng-init="brand.brandUrl='<?= $brandInfo['brand_url'] ?>';">
                                <label class="lb_item_name"><?=__("profile__BRAND_URL")?></label>
                                <div class="lb_item_field" >
                                    <a href="<?= URL::site("brands/".$brandInfo['brand_url'], 'http') ?>" target="_blank"><?= URL::site("brands/".$brandInfo['brand_url'], 'http') ?></a>
                                </div>
                            </div>
                            <div class="form-group" ng-init="brand.categoryType = '<?= $brandInfo['category_type'] ?>';initCategory();">
                                <label class="lb_item_name"><?=__("profile__BRAND_CATEGORY")?></label>
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
                                    <p ng-if="!isEditing">{{brand.description}}</p>
                                    <textcomplete ng-if="isEditing">
                                        <textarea class="form-control" ng-model="brand.description" ng-disabled="!isEditing"></textarea>
                                    </textcomplete>
                                </div>
                            </div>
                            <div class="form-group" ng-init="brand.imagePath='<?= $brandInfo['brand_image'] ?>';">
                                <label class="lb_item_name"><?=__("profile__BRAND_COVER_IMAGE")?></label>
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

                    <!-- edit button  -->
                    <?php if($user["role_type"] != Model_User::TYPE_USER_ADMIN): ?>
                        <div class="profile-actions">
                            <button class="btn btn-type-2" ng-if="!isEditing" ng-click="edit();"><?= __('profile__btn__EDIT');?></button>
                            <button class="btn btn-type-2" ng-if="isEditing" ng-click="save();"><?= __('profile__btn__SAVE');?></button>
                            <button class="btn btn-type-1" ng-if="isEditing" ng-click="reload();"><?= __('profile__btn__CANCEL');?></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>