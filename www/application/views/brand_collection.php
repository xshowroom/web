<!DOCTYPE html>
<html  ng-app="xShowroom.brand.collection">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/brand_collection.css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/brand_collection.js"></script>
</head>
<body ng-controller="BrandCollectionCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
        	array('currentPage' =>  'collection', 'userAttr'=> $userAttr)); 
       	?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-3 collection-category">
                	<h3>STATUS</h3>
                	<ul>
                		<li>
                			<a>
                				<span>{{'COLLECTION_STATUS_ALL' | translate}}</span>
                				<span>{{collections.length || 0}}</span>
                			</a>
                		</li>
                		<li ng-if="statusCounter[0]">
                			<a>
                				<span>{{'COLLECTION_STATUS_0' | translate}}</span>
                				<span>{{statusCounter[0] || 0}}</span>
                			</a>
                		</li>
                		<li ng-if="statusCounter[1]">
                			<a>
                				<span>{{'COLLECTION_STATUS_1' | translate}}</span>
                				<span>{{statusCounter[1] || 0}}</span>
                			</a>
                		</li>
                		<li ng-if="statusCounter[2]">
                			<a>
                				<span>{{'COLLECTION_STATUS_2' | translate}}</span>
                				<span>{{statusCounter[2] || 0}}</span>
                			</a>
                		</li>
                	</ul>
                	<div class="add-new-collection">
                		<a href="/collection/create">+ ADD COLLECTION</a>
                	</div>
                </div>
            	<div class="col-xs-9">
            		<div class="collection-item" ng-repeat="collection in collections | limitTo : collectionLimit : 0">
            			<h3>{{collection.name| uppercase}} {{collection.category | translate}} (87)</h3>
            			<div class="collection-info">
            				<div class="col-xs-4 collection-cover">
            					<img ng-src="/{{collection.cover_image_medium}}"/>
            				</div>
            				<div class="col-xs-8 collection-details">
            					<div class="col-xs-12 collection-detail">
			                 		<span>Collection Status:</span><span>{{('COLLECTION_STATUS_' + collection.status)| translate}}</span>
			                 	</div>
			                 	<div class="col-xs-12 collection-detail">
			                 		<span>Last Modify:</span><span>{{collection.modify_time}}</span>	
			                 	</div>
			                 	<div class="col-xs-12 collection-detail collection-description">
			                 		<div>Description:</div>
			                 		<div>{{collection.description}}</div>	
			                 	</div>
			                 	<div class="col-xs-12 collection-actions">
			                 		<a class="btn btn-type-2" href="/collection/{{collection.id}}" target="_self">VIEW</a>
			                 		<button class="btn btn-type-1" ng-click="enableCollection(collection.id);" ng-if="collection.status == '0'">SUBMIT</button>
			                 		<button class="btn btn-type-1" ng-click="deleteCollection(collection.id);" ng-if="collection.status == '0'">DELETE</button>
			                 		<button class="btn btn-type-1" ng-click="closeCollection(collection.id);"  ng-if="collection.status == '1'">CLOSE</button>
			                 	</div>
            				</div>
            			</div>
            			<div class="product-gallery">
            				<div class="col-xs-1 product-gallery-action">
            					<span class="glyphicon glyphicon-chevron-left"></span>
            				</div>
            				<div class="col-xs-10 product-list">
            					<div class="product-list-preview">
            						<img src="">
            					
            					</div>
            				</div>
            				<div class="col-xs-1 product-gallery-action">
            					<span class="glyphicon glyphicon-chevron-right"></span>
            				</div>
            			</div>
            		</div>
            	</div>
			</div>
		</div>
	</section>
	<footer class="row footer-navigation">
        <?php echo View::factory('common/global_navigation_footer'); ?>
	</footer>
</body>
</html>