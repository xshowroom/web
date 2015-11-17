<!DOCTYPE html>
<html  ng-app="xShowroom.brand.dashboard">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/brand_dashboard.css" />
	<link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/brand_dashboard.js"></script>
</head>
<body ng-controller="BrandDashboardCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php echo View::factory('common/global_setting_without_login'); ?>
	</nav>
	<nav class="row brand-navigation">
        <?php echo View::factory('common/global_navigation_top_brand',
        	array('currentPage' =>  'dashboard', 'userAttr'=> $userAttr)); 
       	?>
	</nav>
	<section class="row no-vertical-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>ADD COLLECTION BASIC INFO</h2>
				</div>
				<div class="col-xs-3">
					<div class="image-update">
					
					
					</div>
				</div>
				<div class="col-xs-9">
					<form class="form-horizontal">
					  	<div class="form-group col-xs-6">
					    	<label for="inputEmail3" class="col-xs-4 control-label">Collection Name</label>
					    	<div class="col-xs-8">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group col-xs-6">
					    	<label for="inputEmail3" class="col-xs-4 control-label">Category</label>
					    	<div class="col-xs-8">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group col-xs-6">
					    	<label for="inputEmail3" class="col-xs-4 control-label">Collection Mode</label>
					    	<div class="col-xs-8">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group col-xs-6">
					    	<label for="inputEmail3" class="col-xs-4 control-label">Collection Season</label>
					    	<div class="col-xs-8">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group col-xs-6">
					    	<label for="inputEmail3" class="col-xs-4 control-label">Minmun Order</label>
					    	<div class="col-xs-8">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group col-xs-6">
					    	<label for="inputEmail3" class="col-xs-4 control-label">Currency</label>
					    	<div class="col-xs-8">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group col-xs-6">
					    	<label for="inputEmail3" class="col-xs-4 control-label">Deadline for Order</label>
					    	<div class="col-xs-8">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group col-xs-6">
					    	<label for="inputEmail3" class="col-xs-4 control-label">Delivery Date</label>
					    	<div class="col-xs-8">
					      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group col-xs-12">
					    	<label for="inputEmail3" class="col-xs-2 control-label">Delivery Date</label>
					    	<div class="col-xs-8">
					      		<textarea class="form-control" id="inputEmail3" placeholder="Email"></textarea>
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