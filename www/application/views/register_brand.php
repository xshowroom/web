<!DOCTYPE html>
<html ng-app="xShowroom.register.brand">
<head>
	<meta charset="UTF-8">
	<title><?=SITE_TITLE_PROFIX?> </title>
	<?php echo View::factory('common/global_libraries'); ?>
	<link rel="stylesheet" type="text/css" href="/static/app/css/register_brand.css" />
	<script type="text/javascript" src="/static/app/modules/register_brand.js"></script>
	<script>
		$(document).ready(function(){
			$('#invite-modal').modal('show');
		});
	</script>
</head>

<body ng-controller="RegisterBrandCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login'); ?>
	</nav>
	<nav class="row guest-navigation"  id="home-page-navigation">
        <?php echo View::factory('common/global_navigation_top_guest'); ?>
	</nav>
	<section class="row" ng-cloak>
		<div class="container uploading">
			<div class="col-xs-12">
				<h2 class="brand-register-step">
					<span><?= __("brand_register__STEP");?> {{step.stepNumber}} <?= __("brand_register__SETP_OF");?> 3:</span>
					<span ng-if="step.stepNumber == 1"><?= __("brand_register__STEP_INFORMATION_1");?></span>
					<span ng-if="step.stepNumber == 2"><?= __("brand_register__STEP_INFORMATION_2");?></span>
					<span ng-if="step.stepNumber == 3"><?= __("brand_register__STEP_INFORMATION_3");?></span>
				</h2>
			</div>
		
			<div class="col-xs-5">
				<img class="brand-register-context"
					ng-src="/static/app/images/brand-register-{{step.stepNumber}}.png" />
			</div>

			<form class="form-horizontal col-xs-7" id="brand-register" name="brandRegister">
				<!-- step 1 -->
				<div class="col-xs-12" ng-show="step.stepNumber == 1">
					<div class="form-group" ng-class="{'has-error': step.validation[1].email}">
						<label for="email"
							class="col-xs-3 text-center brand-register-inline"><?= __("brand_register__STEP_1__EMAIL_ADDRESS");?>
						</label>
						<div class="col-xs-9">
							<input type="text" class="form-control" id="email" ng-model="user.email" name='email'
								placeholder='<?= __("brand_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].pass}">
						<label for="password" class="col-xs-3 text-center brand-register-inline"><?= __("brand_register__STEP_1__PASSWORD");?></label>
						<div class="col-xs-9">
							<input type="password" class="form-control" id="password" ng-model="user.pass" name='pass'
								placeholder='<?= __("brand_register__STEP_1__PASSWORD_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6"  ng-class="{'has-error': step.validation[1].firstName}">
							<input type="text" class="form-control" id="first-name" name='firstName'
								ng-model="user.firstName" placeholder='<?= __("brand_register__STEP_1__FIRST_NAME_PLACEHOLDER");?>'>
						</div>
						<div class="col-xs-6" ng-class="{'has-error': step.validation[1].lastName}">
							<input type="text" class="form-control" id="last-name" name='lastName'
								ng-model="user.lastName" placeholder='<?= __("brand_register__STEP_1__LAST_NAME_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].displayName}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="display-name" name='displayName'
								ng-model="user.displayName" placeholder='<?= __("brand_register__STEP_1__DISPLAY_NAME_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].tel}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="telephone-number" name='tel'
								ng-model="user.tel"  placeholder='<?= __("brand_register__STEP_1__TELEPHONE_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].mobile}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="mobile-number" name='mobile'
								ng-model="user.mobile" placeholder='<?= __("brand_register__STEP_1__MOBILE_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="alert" role="alert">
						<ul class="col-xs-8"  ng-if="errorMsgs.length">
							<li ng-repeat="msg in errorMsgs">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{ ( msg[0] + "_" + msg[1]) | translate}}</span>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<a class="col-xs-3 btn btn-type-1" href="/home" target="_self"><?= __("brand_register__STEP_1__btn__CANCEL");?></a>
							<a class="col-xs-3 btn btn-type-2" ng-click="check()"><?= __("brand_register__STEP_1__btn__ADD_BRAND");?></a>
						</div>
					</div>
				</div>
				<!-- /step 1 -->

				<!-- step 2 -->
				<div class="col-xs-12" ng-show="step.stepNumber == 2">
					<div class="row brand-register-block-spare">
						<div class="col-xs-3 block-center brand-register-lookbook-upload image-uploader thumbnail" 
							ng-class="{'has-error': step.validation[2].imagePath}" data-target-model="user.imagePath"
							data-title="<?= __('brand_register__STEP_2__IMAGE');?>">
						</div>
						<div class="col-xs-9">
							<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].brandName}">
								<input type="text" class="form-control" id="brand-name" name="brandName"
									ng-model="user.brandName"  placeholder='<?= __("brand_register__STEP_2__BRAND_NAME_PLACEHOLDER");?>'>
							</div>
							<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].designerName}">
								<input type="text" class="form-control" id="designer-name" name="designerName"
								       ng-model="user.designerName"  placeholder='<?= __("brand_register__STEP_2__DESIGNER_NAME_PLACEHOLDER");?>'>
							</div>
							<div class="form-group col-xs-12 brand-register-checkbox-group" id="collection-type" ng-class="{'has-error': step.validation[2].categoryType}">
								<label><?= __("brand_register__STEP_2__STORE_COLLECTION_TYPE");?></label>
								<div>
									<label class="checkbox-inline">
										<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__WOMEN" ng-change="setCollection('dropdown__COLLECTION__WOMEN')">
										{{ "dropdown__COLLECTION__WOMEN"| translate }}
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__MEN" ng-change="setCollection('dropdown__COLLECTION__MEN')">
										{{ "dropdown__COLLECTION__MEN"| translate }}
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__JEWELRY" ng-change="setCollection('dropdown__COLLECTION__JEWELRY')">
										{{ "dropdown__COLLECTION__JEWELRY"| translate }}
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__ACCESSORIES" ng-change="setCollection('dropdown__COLLECTION__ACCESSORIES')">
										{{ "dropdown__COLLECTION__ACCESSORIES"| translate }}
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="categoryType" ng-model="dropdown__COLLECTION__FOOTWEAR" ng-change="setCollection('dropdown__COLLECTION__FOOTWEAR')">
										{{ "dropdown__COLLECTION__FOOTWEAR"| translate }}
									</label>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group col-xs-12">
								<div class="brand-url" ng-class="{'has-error': step.validation[2].brandUrl}">
									<span>http://www.xshowroom.cn/brands/</span>
									<input class="form-control brand-register-text-center" type="text" id="brand-url" name="brandUrl"
									       ng-model="user.brandUrl" placeholder='<?= __("brand_register__STEP_2__BRAND_URL");?>'>
								</div>
								<p class="text-center help-block">
									<?= __("brand_register__STEP_2__URL_DESC_1");?> <?= __("brand_register__STEP_2__URL_DESC_2");?>
								</p>
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
						<a class="btn btn-type-1 col-xs-3" ng-click="previous()"><?= __("brand_register__STEP_2__btn__PREVIOUS");?></a>
						<a type="submit" class="btn btn-type-2 col-xs-3"
							ng-click="check()"><?= __("brand_register__STEP_2__btn__ADD_COMPANY");?></a>
					</div>
				</div>
				<!-- /step 2 -->

				<!-- step 3 -->
				<div class="col-xs-12" ng-show="step.stepNumber == 3">
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyName}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-name" name="companyName"
								ng-model="user.companyName" placeholder='<?= __("brand_register__STEP_3__COMPANY_NAME_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyAddr}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-address" name="companyAddr"
								ng-model="user.companyAddr" placeholder='<?= __("brand_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyCountry}">
						<div class="col-xs-6">
							<label for="country" ng-class="{'has-content': user.companyCountry && user.companyCountry !=''}">
								{{ user.companyCountry ? (user.companyCountry | translate) : '<?= __("brand_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER");?>' }}
							</label>
							<select  class="form-control" id="country" name="companyCountry" ng-model="user.companyCountry">
								<option ng-repeat="country in countries" value="dropdown__COUNTRY__{{country}}">
									{{ ("dropdown__COUNTRY__" + country)| translate}}
								</option>
							</select>
						</div>
						<div class="col-xs-6"  ng-class="{'has-error': step.validation[3].companyZip}">
							<input type="text" class="form-control" id="postcode" name="companyZip"
								ng-model="user.companyZip" placeholder='<?= __("brand_register__STEP_3__COMPANY_ZIP_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyTel}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-telephone-number"  name="companyTel"
								ng-model="user.companyTel" placeholder='<?= __("brand_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyWebsite}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-web-page-url" name="companyWebsite"
								ng-model="user.companyWebsite" placeholder='<?= __("brand_register__STEP_3__COMPANY_URL_PLACEHOLDER");?>'>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<p class="text-center help-block"><?= __("brand_register__STEP_3__COMPANY_ACCEPT_1");?></p>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[3].acceptCondition}">
						<div class="col-xs-12">
							<div class="brand-register-checkbox">
								<label class="checkbox-inline"> <input type="checkbox" ng-model="user.acceptCondition" ng-true-value="true" ng-false-value="false">
									<span><?= __("brand_register__STEP_3__COMPANY_ACCEPT_2");?></span>
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
						<a class="btn btn-type-1 col-xs-3" ng-click="previous()"><?= __("brand_register__STEP_3__btn__PREVIOUS");?></a>
						<button class="btn btn-type-2 col-xs-3" ng-click="check();"><?= __("brand_register__STEP_3__btn__SUBMIT");?></button>
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
					<p><?=__("other__invite__APPLY_01");?> <a href="mailto:info@xshowroom.com"><?=ADMIN_EMAIL?></a> <?=__("other__invite__APPLY_02");?></p>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
