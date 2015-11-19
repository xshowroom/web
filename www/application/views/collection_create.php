<!DOCTYPE html>
<html  ng-app="xShowroom.collection.create">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    <link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/angular-motion/dist/angular-motion.min.css">
    <link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/collection_create.css" />
    <script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-animate/angular-animate.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-strap/dist/angular-strap.tpl.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/services.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
    <script type="text/javascript" src="/static/app/modules/collection_create.js"></script>
</head>
<body ng-controller="CollectionCreateCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
            array('currentPage' =>  'dashboard', 'userAttr'=> $userAttr)); 
           ?>
    </nav>
    <section class="row uploading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="collection-create-title">ADD COLLECTION BASIC INFO</h2>
                </div>
                <div class="col-xs-2">
                    <div class="image-uploader" id="cover-image" data-target-model="collection.image" ng-class="{'has-error': checkInfo.validation.image}"></div>
                    <label class="collection-cover-label">COLLECTION COVER</label>
                </div>
                <div class="col-xs-10">
                    <form class="form-horizontal" id="collection-create-form">
                    	<div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.name}">
                            <label for="name" class="col-xs-4 control-label">Collection Name</label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="name" ng-model="collection.name">
                            </div>
                        </div>
                        <div class="form-group col-xs-6"  ng-class="{'has-error': checkInfo.validation.category}">
                            <label for="category" class="col-xs-4 control-label">Category</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="category" ng-model="collection.category">
                                      <option value="Woman">Woman</option>
                                      <option value="Accessories">Accessories</option>
                                      <option value="Man">Man</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.mode}">
                            <label for="mode" class="col-xs-4 control-label">Collection Mode</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="mode" ng-model="collection.mode">
                                      <option value="Pre-Order">Pre-Order</option>
                                      <option value="Stock">Stock</option>
                                      <option value="Re-Order">Re-Order</option>
                                      <option value="Permanen">Permanen</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.season}">
                            <label for="season" class="col-xs-4 control-label">Collection Season</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="season" ng-model="collection.season">
                                      <option value="AW15">AW15</option>
                                      <option value="PRE-SS16">PRE-SS16</option>
                                      <option value="SS16">SS16</option>
                                      <option value="AW16">AW16</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.order}">
                            <label for="mini-order" class="col-xs-4 control-label">Minmun Order</label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="mini-order" ng-model="collection.order">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.currency}">
                            <label for="currency" class="col-xs-4 control-label">Currency</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="currency" ng-model="collection.currency">
                                      <option value="￥">￥-RMB</option>
                                      <option value="$">$-USD</option>
                                      <option value="￡">￡-GBP</option>
                                      <option value="€">€-EUR</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.deadline}">
                            <label for="deadline" class="col-xs-4 control-label">Deadline for Order</label>
                            <div class="col-xs-8">
                            	<input type="text" class="form-control datepicker" id="deadline" ng-model="collection.deadline"
                                  	data-date-format="yyyy-MM-dd" data-date-type="string" data-min-date="today"
					        		data-model-date-format="yyyy-MM-dd" data-autoclose="1" bs-datepicker ng-change="collection.delivery = ''">
                            </div>
                        </div>
                        <div class="form-group col-xs-6" ng-class="{'has-error': checkInfo.validation.delivery}">
                            <label for="inputEmail3" class="col-xs-4 control-label">Delivery Date</label>
                            <div class="col-xs-8">
                            	<input type="text" class="form-control datepicker" id="delivery-date" ng-model="collection.delivery"
                                  	data-date-format="yyyy-MM-dd" data-date-type="string" data-min-date="{{collection.deadline}}"
					        		data-model-date-format="yyyy-MM-dd" data-autoclose="1" bs-datepicker>
                            </div>
                          </div>
                        <div class="form-group col-xs-12" ng-class="{'has-error': checkInfo.validation.description}">
                            <label for="description" class="col-xs-2 control-label">Description</label>
                            <div class="col-xs-10">
                                  <textarea class="form-control" id="description" ng-model="collection.description"></textarea>
                            </div>
                          </div>
                        <div class="alert col-xs-offset-2" role="alert"  ng-if="errorMsgs.length">
							<ul class="col-xs-8">
								<li ng-repeat="msg in errorMsgs">
									<span class="glyphicon glyphicon-remove-sign"></span>
									<span>{{msg[0]}}{{msg[1]}}</span>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
                        <div class="form-group col-xs-12">
                            <div class="col-xs-10 col-xs-offset-2">
                                  <button class="btn btn-type-2" id="create-btn" ng-click="create()">CREATE</button>
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