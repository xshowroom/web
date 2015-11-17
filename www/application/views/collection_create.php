<!DOCTYPE html>
<html  ng-app="xShowroom.collection.create">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    
    <link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/collection_create.css" />
    <link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
    <script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
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
                    <div class="image-uploader" id="cover-image" data-target-model="collection.coverImage"></div>
                    <label class="collection-cover-label">COLLECTION COVER</label>
                </div>
                <div class="col-xs-10">
                    <form class="form-horizontal">
                          <div class="form-group col-xs-6">
                            <label for="name" class="col-xs-4 control-label">Collection Name</label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="name" ng-model="collection.name">
                            </div>
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="category" class="col-xs-4 control-label">Category</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="category" ng-model="collection.category">
                                      <option value="Woman">Woman</option>
                                      <option value="Accessories">Accessories</option>
                                      <option value="Man">Man</option>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="mode" class="col-xs-4 control-label">Collection Mode</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="mode" ng-model="collection.mode">
                                      <option value="Preorder">Preorder</option>
                                      <option value="Stock">Stock</option>
                                      <option value="Reorder">Reorder</option>
                                      <option value="Permanen">permanen</option>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group col-xs-6">
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
                          <div class="form-group col-xs-6">
                            <label for="mini-order" class="col-xs-4 control-label">Minmun Order</label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="mini-order" ng-model="collection.miniOrder">
                            </div>
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="currency" class="col-xs-4 control-label">Currency</label>
                            <div class="col-xs-8">
                                  <select class="form-control" id="currency" ng-model="currency">
                                      <option value="￥">￥-RMB</option>
                                      <option value="$">$-USD</option>
                                      <option value="￡">￡-GBP</option>
                                      <option value="€">€-EUR</option>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="deadline" class="col-xs-4 control-label">Deadline for Order</label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="deadline" ng-model="collection.deadline">
                            </div>
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="inputEmail3" class="col-xs-4 control-label">Delivery Date</label>
                            <div class="col-xs-8">
                                  <input type="text" class="form-control" id="delivery-date" ng-model="collection.miniOrder">
                            </div>
                          </div>
                          <div class="form-group col-xs-12">
                            <label for="description" class="col-xs-2 control-label">Delivery Date</label>
                            <div class="col-xs-10">
                                  <textarea class="form-control" id="description" ng-model="collection.description"></textarea>
                            </div>
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