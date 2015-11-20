<!DOCTYPE html>
<html ng-app="xShowroom.register.brand">
<head>
	<meta charset="UTF-8">
	<title>XShowroom</title>
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/register_brand.css" />
	<link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/register_brand.js"></script>
</head>

<body ng-controller="RegisterBrandCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_with_login'); ?>
	</nav>
	<nav class="row guest-navigation"  id="home-page-navigation">
        <?php echo View::factory('common/global_navigation_top_guest'); ?>
	</nav>
	<section class="row">
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
								<span>{{msg[0]}}{{msg[1]}}</span>
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
							<div class="form-group col-xs-12">
								<span class="form-control brand-register-text-center" name="generated-url">
									www.xshowroom.com/{{!user.brandName || user.brandName == '' ? 'Brandname' : user.brandName}} </span>
								<p class="text-center help-block small">
									<?= __("brand_register__STEP_2__URL_DESC_1");?><br>
									<?= __("brand_register__STEP_2__URL_DESC_2");?>
								</p>
							</div>
						</div>
					</div>
					<div class="alert" role="alert"  ng-if="errorMsgs.length">
						<ul class="col-xs-8">
							<li ng-repeat="msg in errorMsgs">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{msg[0]}}{{msg[1]}}</span>
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
							<p class="text-center help-block small"><?= __("brand_register__STEP_3__COMPANY_ACCEPT_1");?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="brand-register-checkbox">
								<label> <input type="checkbox" ng-required="true" ng-model="acceptConditions" value="true" name="accept">
									<span><?= __("brand_register__STEP_3__COMPANY_ACCEPT_2");?></span>
								</label>
							</div>
						</div>
					</div>
					<div class="alert" role="alert"  ng-if="errorMsgs.length">
						<ul class="col-xs-8">
							<li ng-repeat="msg in errorMsgs">
								<span class="glyphicon glyphicon-remove-sign"></span>
								<span>{{msg[0]}}{{msg[1]}}</span>
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
</body>
</html>