<!DOCTYPE html>
<html ng-app="xShowroom.register.buyer">
<head>
	<meta charset="UTF-8">
	<title>XShowroom</title>
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/buyer-register.css" />
	<link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/buyer-register.js"></script>
</head>

<body ng-controller="BuyerRegisterCtrl" class="container-fluid">
	<nav class="row setting-info" ng-include="'/static/templates/global-setting-info.html'"></nav>
	<nav class="row no-user-navigation"
		ng-include="'/static/templates/global-no-user-navigation.html'"></nav>
	<section class="row">
		<div class="container uploading">
			<div class="col-xs-12">
				<h2 class="buyer-register-step">
					<span>{{ "buyer_register__STEP"| translate }} {{step.stepNumber}} {{ "buyer_register__SETP_OF"| translate }} 3:</span>
					<span ng-if="step.stepNumber == 1">{{ "buyer_register__STEP_INFORMATION_1"| translate }}</span>
					<span ng-if="step.stepNumber == 2">{{ "buyer_register__STEP_INFORMATION_2"| translate }}</span>
					<span ng-if="step.stepNumber == 3">{{ "buyer_register__STEP_INFORMATION_3"| translate }}</span>
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
                               class="col-xs-3 text-center buyer-register-inline">{{ "buyer_register__STEP_1__EMAIL_ADDRESS"| translate }}
						</label>
						<div class="col-xs-9">
							<input type="text" class="form-control" id="email" ng-model="user.email"  name="email"
                                   placeholder='{{ "buyer_register__STEP_1__EMAIL_ADDRESS_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].pass}">
						<label for="password" class="col-xs-3 text-center brand-register-inline">{{ "buyer_register__STEP_1__PASSWORD"| translate }}</label>
						<div class="col-xs-9">
							<input type="password" class="form-control" id="password" ng-model="user.pass" name="pass"
                                   placeholder='{{ "buyer_register__STEP_1__PASSWORD_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6"  ng-class="{'has-error': step.validation[1].firstName}">
							<input type="text" class="form-control" id="first-name" name="firstName"
								ng-model="user.firstName"  placeholder='{{ "buyer_register__STEP_1__FIRST_NAME_PLACEHOLDER"| translate }}'>
						</div>
						<div class="col-xs-6" ng-class="{'has-error': step.validation[1].lastName}">
							<input type="text" class="form-control" id="last-name" name="lastName"
								ng-model="user.lastName"  placeholder='{{ "buyer_register__STEP_1__LAST_NAME_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].displayName}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="display-name" name="displayName"
								ng-model="user.displayName" placeholder='{{ "buyer_register__STEP_1__DISPLAY_NAME_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].tel}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="telephone-number" name="tel"
								ng-model="user.tel" placeholder='{{ "buyer_register__STEP_1__TELEPHONE_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group" ng-class="{'has-error': step.validation[1].mobile}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="mobile-number" name="mobile"
								ng-model="user.mobile" placeholder='{{ "buyer_register__STEP_1__MOBILE_PLACEHOLDER"| translate }}'>
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
					<div class="form-group">
						<div class="col-xs-12">
							<a class="col-xs-3 btn btn-type-1" href="/home" target="_self">{{ "buyer_register__STEP_1__btn__CANCEL"| translate }}</a> <a
								class="col-xs-3 btn btn-type-2" ng-click="check();">{{ "buyer_register__STEP_1__btn__ADD_STORE"| translate }}</a>
						</div>
					</div>
				</div>
				<!-- /step 1 -->

				<!-- step 2 -->
				<div class="col-xs-12 buyer-register-block-up"
					ng-show="step.stepNumber == 2">
					<div>
						<div ng-class="{'has-error': step.validation[2].imagePath}"
							class="col-xs-3 block-center buyer-register-lookbook-upload imagePreview thumbnail" data-target-model="user.imagePath">
							<p class="text-center">{{ "buyer_register__STEP_2__IMAGE"| translate }}</p>
							<label for="lookbook-upload" class="text-center">{{ "buyer_register__STEP_2__UPLOAD"| translate }}
								<input type="file" id="lookbook-upload" name="lookbook-upload" name="imagePath"/>
							</label>
						</div>
						<div class="col-xs-9">
							<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopName}">
								<input type="text" class="form-control" id="store-name" name="shopName"
									ng-model="user.shopName" placeholder='{{ "buyer_register__STEP_2__STORE_NAME_PLACEHOLDER"| translate }}'>
							</div>
							<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopType}">
								<label for="store-type" ng-class="{'has-content': user.shopType && user.shopType !=''}">{{ (user.shopType || "buyer_register__STEP_2__STORE_TYPE_PLACEHOLDER") | translate }}</label>
								<select class="form-control" id="store-type" ng-model="user.shopType" name="shopType">
                                    <option value="dropdown__STORE__DEPARTMENT_SHOP">{{ "dropdown__STORE__DEPARTMENT_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__MULTI_BRAND_SHOP">{{ "dropdown__STORE__MULTI_BRAND_SHOP"| translate }}</option>
                                    <option value="dropdown__STORE__ONLINE_SHOP">{{ "dropdown__STORE__ONLINE_SHOP"| translate }}</option>
								</select>
							</div>
							<div class="form-group col-xs-12 buyer-register-checkbox-group"
								id="collection-type" ng-class="{'has-error': step.validation[2].collectionType}">
								<label>{{ "buyer_register__STEP_2__STORE_COLLECTION_TYPE"| translate }}*</label><br>
								<div class="checkbox-inline buyer-register-checkbox">
									<input type="radio" id="collection-type-women" name="collectionType"  ng-model="user.collectionType" value="dropdown__COLLECTION__WOMEN">
									<label for="collection-type-women">{{ "dropdown__COLLECTION__WOMEN"| translate }}</label>
								</div>
								<div class="checkbox-inline buyer-register-checkbox">
									<input type="radio" id="collection-type-accessories" name="collectionType" ng-model="user.collectionType" value="dropdown__COLLECTION__ACCESSORIES"><label
										for="collection-type-accessories">{{ "dropdown__COLLECTION__ACCESSORIES"| translate }}</label>
								</div>
								<div class="checkbox-inline buyer-register-checkbox">
									<input type="radio" id="collection-type-men" name="collectionType" ng-model="user.collectionType" value="dropdown__COLLECTION__MEN">
									<label for="collection-type-men">{{ "dropdown__COLLECTION__MEN"| translate }}</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].brandList}">
						<input type="text" class="form-control" id="brand-carried" name="brandList"
							ng-model="user.brandList" placeholder='{{ "buyer_register__STEP_2__STORE_BRAND_PLACEHOLDER"| translate }}'>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopWebsite}">
						<input type="text" class="form-control" id="website" name="shopWebsite"
							ng-model="user.shopWebsite" placeholder='{{ "buyer_register__STEP_2__STORE_WEBSITE_PLACEHOLDER"| translate }}'>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopAddress}">
						<input type="text" class="form-control" id="store-address" name="shopAddress"
							ng-model="user.shopAddress" placeholder='{{ "buyer_register__STEP_2__STORE_ADDRESS_PLACEHOLDER"| translate }}'>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopCountry}">
						<div class="col-xs-6 buyer-register-form-inline-left">
							<input type="text" class="form-control" id="store-country" name="shopCountry"
                                   ng-model="user.shopCountry" placeholder='{{ "buyer_register__STEP_2__STORE_COUNTRY_PLACEHOLDER"| translate }}'>
						</div>
						<div class="col-xs-6 buyer-register-form-inline-right" ng-class="{'has-error': step.validation[2].shopZipcode}">
							<input type="text" class="form-control" id="store-postcode" name="shopZipcode"
								ng-model="user.shopZipcode" placeholder='{{ "buyer_register__STEP_2__STORE_ZIP_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group col-xs-12" ng-class="{'has-error': step.validation[2].shopTel}">
						<input type="text" class="form-control" id="store-telephone-number" name="shopTel"
							ng-model="user.shopTel" placeholder='{{ "buyer_register__STEP_2__STORE_TELEPHONE_PLACEHOLDER"| translate }}'>
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
					<div class="form-group col-xs-12">
						<a class="btn btn-type-1 col-xs-3" ng-click="previous()">{{ "buyer_register__STEP_2__btn__PREVIOUS"| translate }}</a>
						<a type="submit" class="btn btn-type-2 col-xs-3" ng-click="check();">{{ "buyer_register__STEP_2__btn__ADD_COMPANY"| translate }}</a>
					</div>
				</div>
				<!-- /step 2 -->

				<!-- step 3 -->
				<div class="col-xs-12" ng-show="step.stepNumber == 3">
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyName}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-name"
								ng-model="user.companyName" placeholder='{{ "buyer_register__STEP_3__COMPANY_NAME_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyAddr}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-address"
								ng-model="user.companyAddr" placeholder='{{ "buyer_register__STEP_3__COMPANY_ADDRESS_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyCountry}">
						<div class="col-xs-6">
							<input type="text" class="form-control" id="country"
								ng-model="user.companyCountry" placeholder='{{ "buyer_register__STEP_3__COMPANY_COUNTRY_PLACEHOLDER"| translate }}'>
						</div>
						<div class="col-xs-6"  ng-class="{'has-error': step.validation[3].companyZip}">
							<input type="text" class="form-control" id="postcode"
								ng-model="user.companyZip" placeholder='{{ "buyer_register__STEP_3__COMPANY_ZIP_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyTel}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-telephone-number" 
								ng-model="user.companyTel" placeholder='{{ "buyer_register__STEP_3__COMPANY_TELEPHONE_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group"  ng-class="{'has-error': step.validation[3].companyWebsite}">
						<div class="col-xs-12">
							<input type="text" class="form-control" id="company-web-page-url"
								ng-model="user.companyWebsite" placeholder='{{ "buyer_register__STEP_3__COMPANY_URL_PLACEHOLDER"| translate }}'>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<p class="text-center help-block small">{{ "buyer_register__STEP_3__COMPANY_ACCEPT_1"| translate }}</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="checkbox buyer-register-checkbox">
								<label>
									<input type="checkbox" ng-required="true" ng-model="acceptConditions">
									<span>{{ "buyer_register__STEP_3__COMPANY_ACCEPT_2"| translate }}</span>
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
						<a class="btn btn-type-1 col-xs-3" ng-click="previous()">{{ "buyer_register__STEP_3__btn__PREVIOUS"| translate }}</a>
						<button ng-click="check();" class="btn btn-type-2 col-xs-3">{{ "buyer_register__STEP_3__btn__SUBMIT"| translate }}</button>
					</div>
				</div>
				<!-- /step 3 -->
			</form>
		</div>
		<!-- <div class="uploading"></div> -->
	</section>

	<footer class="row footer-navigation"
		ng-include="'/static/templates/global-footer-navigation.html'"></footer>
</body>
</html>