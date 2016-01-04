<!DOCTYPE html>
<html ng-app="xShowroom.register.buyer">
<head>
	<meta charset="UTF-8">
	<title>XSHOWROOM</title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/register_buyer.css" />
	<script type="text/javascript" src="/static/app/modules/register_buyer.js"></script>
	<script>
		$(document).ready(function(){
			$('#invite-modal').modal('show');
		});
	</script>
</head>

<body ng-controller="RegisterBuyerCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login'); ?>
	</nav>
	<nav class="row guest-navigation"  id="home-page-navigation">
        <?php echo View::factory('common/global_navigation_top_guest'); ?>
	</nav>
	<section class="row">
		<div class="container uploading">
			<div class="col-xs-12">
				<h2 class="buyer-register-step">
					<span><?= __("buyer_register__STEP");?> {{step.stepNumber}} <?= __("buyer_register__SETP_OF");?> 3:</span>
					<span ng-if="step.stepNumber == 1"><?= __("buyer_register__STEP_INFORMATION_1");?></span>
					<span ng-if="step.stepNumber == 2"><?= __("buyer_register__STEP_INFORMATION_2");?></span>
					<span ng-if="step.stepNumber == 3"><?= __("buyer_register__STEP_INFORMATION_3");?></span>
				</h2>
			</div>
			<div class="col-xs-5">
				<img width="100%" class="buyer-register-context"
					ng-src="/static/app/images/buyer-register-{{step.stepNumber}}.png" />
			</div>

			<form class="form-horizontal col-xs-7" id="buyer-register">
				<!-- step 1 -->
				<div class="col-xs-12" ng-show="step.stepNumber == 1">
					<div class="form-group"  ng-class="{'has-error': step.validation[1].email}">
						<label for="email"
                               class="col-xs-3 text-center buyer-register-inline"><?= __("buyer_register__STEP_1__EMAIL_ADDRESS");?>
						</label>
						<div class="col-xs-9">
							<input type="text" class="form-control" id="email" ng-model="user.email"  name="email"
                                   placeholder='<?= __("buyer_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].pass}">
						<label for="password" class="col-xs-3 text-center brand-register-inline"><?= __("buyer_register__STEP_1__PASSWORD");?></label>
						<div class="col-xs-9">
							<input type="password" class="form-control" id="password" ng-model="user.pass" name="pass"
                                   placeholder='<?= __("buyer_register__STEP_1__PASSWORD_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6"  ng-class="{'has-error': step.validation[1].firstName}">
							<input type="text" class="form-control" id="first-name" name="firstName"
								ng-model="user.firstName"  placeholder='<?= __("buyer_register__STEP_1__FIRST_NAME_PLACEHOLDER");?>'>
						</div>
						<div class="col-xs-6" ng-class="{'has-error': step.validation[1].lastName}">
							<input type="text" class="form-control" id="last-name" name="lastName"
								ng-model="user.lastName"  placeholder='<?= __("buyer_register__STEP_1__LAST_NAME_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].displayName}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="display-name" name="displayName"
								ng-model="user.displayName" placeholder='<?= __("buyer_register__STEP_1__DISPLAY_NAME_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].tel}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="telephone-number" name="tel"
								ng-model="user.tel" placeholder='<?= __("buyer_register__STEP_1__TELEPHONE_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].mobile}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="mobile-number" name="mobile"
								ng-model="user.mobile" placeholder='<?= __("buyer_register__STEP_1__MOBILE_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="alert" role="alert"  ng-if="errorMsgs.length">
						<ul class="col-xs-8">
							<li ng-repeat="msg in errorMsgs">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{ ( msg[0] + "_" + msg[1]) | translate}}</span>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<a class="col-xs-3 btn btn-type-1" href="/home" target="_self"><?= __("buyer_register__STEP_1__btn__CANCEL");?></a> <a
								class="col-xs-3 btn btn-type-2" ng-click="check();"><?= __("buyer_register__STEP_1__btn__ADD_STORE");?></a>
						</div>
					</div>
				</div>
				<!-- /step 1 -->

				<!-- step 2 -->
				<div class="col-xs-12 buyer-register-block-up"
					ng-show="step.stepNumber == 2">
					<div>
						<div ng-class="{'has-error': step.validation[2].imagePath}"
							class="col-xs-3 block-center buyer-register-lookbook-upload image-uploader thumbnail"
							data-title="<?= __('buyer_register__STEP_2__IMAGE');?>" data-target-model="user.imagePath">
						</div>
						<div class="col-xs-9">
							<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopName}">
								<input type="text" class="form-control" id="store-name" name="shopName"
									ng-model="user.shopName" placeholder='<?= __("buyer_register__STEP_2__STORE_NAME_PLACEHOLDER");?>'>
							</div>
							<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopType}">
								<label for="store-type" ng-class="{'has-content': user.shopType && user.shopType !=''}">
									{{ user.shopType ? (user.shopType | translate) : '<?= __("buyer_register__STEP_2__STORE_TYPE_PLACEHOLDER");?>' }}
								</label>
								<select class="form-control" id="store-type" ng-model="user.shopType" name="shopType">
                                    <option value="dropdown__STORE__ONLINE_RETAIL_SHOP">{{ "dropdown__STORE__ONLINE_RETAIL_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__MULTI_LABELS_SHOP">{{ "dropdown__STORE__MULTI_LABELS_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__CONCEPT_SHOP">{{ "dropdown__STORE__CONCEPT_SHOP"| translate }}</option>
									<option value="dropdown__STORE__CHAIN_SHOP">{{ "dropdown__STORE__CHAIN_SHOP"| translate }}</option>
									<option value="dropdown__STORE__DEPARTMENT_SHOP">{{ "dropdown__STORE__DEPARTMENT_SHOP"| translate }}</option>
									<option value="dropdown__STORE__BUYING_OFFICE_SHOP">{{ "dropdown__STORE__BUYING_OFFICE_SHOP"| translate }}</option>
								</select>
							</div>
							<div class="form-group col-xs-12 buyer-register-checkbox-group"
								id="collection-type" ng-class="{'has-error': step.validation[2].collectionType}">
								<label><?= __("buyer_register__STEP_2__STORE_COLLECTION_TYPE");?>*</label><br>
								<div>
									<label class="checkbox-inline">
										<input type="checkbox" name="collectionType" ng-model="collectionType.women" ng-change="setCollection('dropdown__COLLECTION__WOMEN')">
										{{ "dropdown__COLLECTION__WOMEN"| translate }}
									</label>
									<label for="collection-type-men" class="checkbox-inline">
										<input type="checkbox" name="collectionType" ng-model="collectionType.man" ng-change="setCollection('dropdown__COLLECTION__MEN')">
										{{ "dropdown__COLLECTION__MEN"| translate }}
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="collectionType" ng-model="collectionType.accessories" ng-change="setCollection('dropdown__COLLECTION__ACCESSORIES')">
										{{ "dropdown__COLLECTION__ACCESSORIES"| translate }}
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="collectionType" ng-model="collectionType.lifestyle" ng-change="setCollection('dropdown__COLLECTION__LIFESTYLE')">
										{{ "dropdown__COLLECTION__LIFESTYLE"| translate }}
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="collectionType" ng-model="collectionType.others" ng-change="setCollection('dropdown__COLLECTION__OTHERS')">
										{{ "dropdown__COLLECTION__OTHERS"| translate }}
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].brandList}">
						<input type="text" class="form-control" id="brand-carried" name="brandList"
							ng-model="user.brandList" placeholder='<?= __("buyer_register__STEP_2__STORE_BRAND_PLACEHOLDER");?>'>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopWebsite}">
						<input type="text" class="form-control" id="website" name="shopWebsite"
							ng-model="user.shopWebsite" placeholder='<?= __("buyer_register__STEP_2__STORE_WEBSITE_PLACEHOLDER");?>'>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopAddress}">
						<input type="text" class="form-control" id="store-address" name="shopAddress"
							ng-model="user.shopAddress" placeholder='<?= __("buyer_register__STEP_2__STORE_ADDRESS_PLACEHOLDER");?>'>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopCountry}">
						<div class="col-xs-6 buyer-register-form-inline-left">
							<label for="store-country" ng-class="{'has-content': user.shopCountry && user.shopCountry !=''}">
								{{ user.shopCountry ? (user.shopCountry | translate) : '<?=__("buyer_register__STEP_2__STORE_COUNTRY_PLACEHOLDER");?>' }}
							</label>
							<select  class="form-control" id="store-country" name="shopCountry" ng-model="user.shopCountry">
								<option ng-repeat="country in countries" value="dropdown__COUNTRY__{{country}}">
									{{ ("dropdown__COUNTRY__" + country)| translate}}
								</option>
							</select>
						</div>
						<div class="col-xs-6 buyer-register-form-inline-right" ng-class="{'has-error': step.validation[2].shopZipcode}">
							<input type="text" class="form-control" id="store-postcode" name="shopZipcode"
								ng-model="user.shopZipcode" placeholder='<?= __("buyer_register__STEP_2__STORE_ZIP_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopTel}">
						<input type="text" class="form-control" id="store-telephone-number" name="shopTel"
							ng-model="user.shopTel" placeholder='<?= __("buyer_register__STEP_2__STORE_TELEPHONE_PLACEHOLDER");?>'>
					</div>
					<div class="alert" role="alert"  ng-if="errorMsgs.length">
						<ul class="col-xs-8">
							<li ng-repeat="msg in errorMsgs">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{ ( msg[0] + "_" + msg[1]) | translate}}</span>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="form-group col-xs-12">
						<a class="btn btn-type-1 col-xs-3" ng-click="previous()"><?= __("buyer_register__STEP_2__btn__PREVIOUS");?></a>
						<a type="submit" class="btn btn-type-2 col-xs-3" ng-click="check();"><?= __("buyer_register__STEP_2__btn__ADD_COMPANY");?></a>
					</div>
				</div>
				<!-- /step 2 -->

				<!-- step 3 -->
				<div class="col-xs-12" ng-show="step.stepNumber == 3">
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyName}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-name"
								ng-model="user.companyName" placeholder='<?= __("buyer_register__STEP_3__COMPANY_NAME_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyAddr}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-address"
								ng-model="user.companyAddr" placeholder='<?= __("buyer_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyCountry}">
						<div class="col-xs-6">
							<label for="company-country" ng-class="{'has-content': user.companyCountry && user.companyCountry !=''}">
								{{ user.companyCountry ? (user.companyCountry | translate) : '<?= __("buyer_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER");?>' }}
							</label>
							<select  class="form-control" id="company-country" name="companyCountry" ng-model="user.companyCountry">
								<option ng-repeat="country in countries" value="dropdown__COUNTRY__{{country}}">
									{{ ("dropdown__COUNTRY__" + country)| translate}}
								</option>
							</select>
						</div>
						<div class="col-xs-6"  ng-class="{'has-error': step.validation[3].companyZip}">
							<input type="text" class="form-control" id="postcode"
								ng-model="user.companyZip" placeholder='<?= __("buyer_register__STEP_3__COMPANY_ZIP_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyTel}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-telephone-number" 
								ng-model="user.companyTel" placeholder='<?= __("buyer_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyWebsite}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-web-page-url"
								ng-model="user.companyWebsite" placeholder='<?= __("buyer_register__STEP_3__COMPANY_URL_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<p class="text-center help-block"><?= __("buyer_register__STEP_3__COMPANY_ACCEPT_1");?></p>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[3].acceptCondition}">
						<div class="col-xs-12">
							<div class="checkbox buyer-register-checkbox">
								<label class="checkbox-inline">
									<input type="checkbox" ng-model="user.acceptCondition" ng-true-value="true" ng-false-value="false">
									<span><?= __("buyer_register__STEP_3__COMPANY_ACCEPT_2");?></span>
								</label>
							</div>
						</div>
					</div>
					<div class="alert" role="alert"  ng-if="errorMsgs.length">
						<ul class="col-xs-8">
							<li ng-repeat="msg in errorMsgs">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{ ( msg[0] + "_" + msg[1]) | translate}}</span>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<a class="btn btn-type-1 col-xs-3" ng-click="previous()"><?= __("buyer_register__STEP_3__btn__PREVIOUS");?></a>
						<button ng-click="check();" class="btn btn-type-2 col-xs-3"><?= __("buyer_register__STEP_3__btn__SUBMIT");?></button>
					</div>
				</div>
				<!-- /step 3 -->
			</form>
		</div>
		<!-- <div class="uploading"></div> -->
	</section>

	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>

	<div class="modal" id="invite-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="invite-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<h4><?=__("other__invite__TITLE");?></h4>
					<form>
						<div class="form-group">
							<p><?=__("other__invite__HINT");?></p>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="invitation-code">
							<label id="invite-error" hidden><?=__("other__invite__error_INFO");?></label>
						</div>
					</form>
				</div>
				<div>
					<a type="button" class="btn btn-type-1" href="<?=url::site()?>"> <?=__("other__invite__btn_BACK");?> </a>
					<a type="button" class="btn btn-type-2" ng-click="checkInvitation();"> <?=__("other__invite__btn_CONTINUE");?> </a>
				</div>
				<div>
					<p><?=__("other__invite__APPLY_01");?> <a href="mailto:info@xshowroom.com">info@xshowroom.com</a> <?=__("other__invite__APPLY_02");?></p>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
