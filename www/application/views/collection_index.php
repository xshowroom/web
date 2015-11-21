<!DOCTYPE html>
<html  ng-app="xShowroom.collection.index">
<head>
    <meta charset="UTF-8" >
    <title>XShowroom</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/static/app/css/collection_index.css" />
    <script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/services.js"></script>
    <script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
    <script type="text/javascript" src="/static/app/modules/collection_index.js"></script>
</head>
<body ng-controller="CollectionIndexCtrl" class="container-fluid">
    <nav class="row setting-info">
        <?php echo View::factory('common/global_setting_without_login'); ?>
    </nav>
    <nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
            array('currentPage' =>  'collection', 'userAttr'=> $userAttr)); 
           ?>
    </nav>
    <section class="row no-vertical-padding">
        <div class="container collection-info">
            <div class="row ">
                <div class="col-xs-3">
                 	<img src="/static/app/images/shop-brand-1.png" class="collection-cover">
                </div>
                <div class="col-xs-9">
                 	<div class="col-xs-12 collection-detail collection-name">
                 		<h2><?= $collection['name']?></h2>
                 		<a href="#" class="collection-edit">EDIT</a>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span>Order Mode:</span><span><?= $collection['mode']?></span>
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span>Deadline for Order:</span><span><?= $collection['deadline']?></span>	
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span>Delivery Date:</span><span><?= $collection['delivery_date']?></span>	
                 	</div>
                 	<div class="col-xs-12 collection-detail">
                 		<span>Min-order:</span><span><?= $collection['mini_order']?></span>
                 	</div>
                 	<div class="col-xs-11 collection-detail">
                 		<div>Description:</div>
                 		<div class="row" ng-class="{'show-all': showAllDesc}">
	                 		<p class="col-xs-10">
	                 			<?= $collection['description']?>
	                 		</p>
	                 		<div class="col-xs-2">
	                 			<a href="#" ng-show="showAllDesc"  ng-click="showAllDesc = !showAllDesc;">HIDE</a>
	                 			<a href="#" ng-show="!showAllDesc" ng-click="showAllDesc = !showAllDesc;">SHOW ALL</a>
	                 		</div>
                 		</div>
                 	</div>
                 	<div class="col-xs-12 collection-action">
                 		<button class="btn btn-type-2">SUBMIT</button>
                 		<button class="btn btn-type-1">DELETE</button>
                 	</div>
                </div>
            </div>
        </div>
    </section>
    <section class="row collection-product">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 collection-product-category">
                	<h3>CATEGORIES</h3>
                	<ul>
                		<li>
                			<a>
                				<span>T-Shirt</span>
                				<span>(2)</span>
                			</a>
                		</li>
                		<li>
                			<a>
                				<span>Top</span>
                				<span>(1)</span>
                			</a>
                		</li>
                		<li>
                			<a>
                				<span>Dress</span>
                				<span>(3)</span>
                			</a>
                		</li>
                	</ul> 
                	<div class="add-new-product">
                		<a href="/product/create">+ ADD NEW PRODUCT</a>
                	</div>
                </div>
                <div class="col-xs-9 collection-products">
                 	<h3>{{'T-Shirt' | uppercase}}</h3>
                 	<div class="collection-category-content">
                 		<div class="col-xs-3">
                 			<a  target="_blank" href="#" class="collection-product-detail">
								<img src="/static/app/images/shop-brand-1.png" class="product-image"/>
								<span class="product-info">
									<span class="product-name">Skull with snake</span>
									<span class="product-price">$100</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="col-xs-3">
                 			<a  target="_blank" href="#" class="collection-product-detail">
								<img src="/static/app/images/shop-brand-1.png" class="product-image">
								<span class="product-info">
									<span class="product-name">Skull with snake</span>
									<span class="product-price">$100</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="col-xs-3">
                 			<a  target="_blank" href="#" class="collection-product-detail">
								<img src="/static/app/images/shop-brand-1.png" class="product-image">
								<span class="product-info">
									<span class="product-name">Skull with snake</span>
									<span class="product-price">$100</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="col-xs-3">
                 			<a  target="_blank" href="#" class="collection-product-detail">
								<img src="/static/app/images/shop-brand-1.png" class="product-image">
								<span class="product-info">
									<span class="product-name">Skull with snake</span>
									<span class="product-price">$100</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="clearfix"></div>
                 	</div>
                 	<h3>{{'T-Shirt' | uppercase}}</h3>
                 	<div class="collection-category-content">
                 		<div class="col-xs-3">
                 			<a  target="_blank" href="#" class="collection-product-detail">
								<img src="/static/app/images/shop-brand-1.png" class="product-image">
								<span class="product-info">
									<span class="product-name">Skull with snake</span>
									<span class="product-price">$100</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="col-xs-3">
                 			<a  target="_blank" href="#" class="collection-product-detail">
								<img src="/static/app/images/shop-brand-1.png" class="product-image">
								<span class="product-info">
									<span class="product-name">Skull with snake</span>
									<span class="product-price">$100</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="col-xs-3">
                 			<a  target="_blank" href="#" class="collection-product-detail">
								<img src="/static/app/images/shop-brand-1.png" class="product-image">
								<span class="product-info">
									<span class="product-name">Skull with snake</span>
									<span class="product-price">$100</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="col-xs-3">
                 			<a  target="_blank" href="#" class="collection-product-detail">
								<img src="/static/app/images/shop-brand-1.png" class="product-image">
								<span class="product-info">
									<span class="product-name">Skull with snake</span>
									<span class="product-price">$100</span>
								</span>
                 			</a>
                 		</div>
                 		<div class="clearfix"></div>
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