<!DOCTYPE html>
<html ng-app="xShowroom.shop">
<head>
	<meta charset="UTF-8" >
	<title>XShowroom</title>
	
	<link rel="stylesheet" type="text/css" href="/static/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/bower_components/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/static/app/css/shop.css" />
	<link rel="shortcut icon" href="/static/app/resources/images/favicon.ico" />
	<script type="text/javascript" src="/static/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="/static/bower_components/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/i18n.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/services.js"></script>
	<script type="text/javascript" src="/static/app/modules/common/directives.js"></script>
	<script type="text/javascript" src="/static/app/modules/shop.js"></script>
</head>
<body ng-controller="ShopCtrl" class="container-fluid">
	<nav class="row setting-info">
		<?php include '/global-setting-info.php'; ?>
	</nav>
	<nav class="row no-user-navigation">
		<?php  $currentPage = 'shop';include '/global-no-user-navigation.php';?>
	</nav>
	<section class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<div class="row filter-condition" data-type="radio" data-title="show"
						selected="setFilters(name, conditions)" data-conditions="conditions.show"></div>
					<div class="row filter-condition" data-type="radio" data-title="category"
						selected="setFilters(name, conditions)" data-conditions="conditions.category"></div>
					<div class="row filter-condition" data-type="checkbox" data-title="season" data-has-clear-all="true"
						selected="setFilters(name, conditions)" data-conditions="conditions.season"></div>
					<div class="row filter-condition" data-type="radio" data-title="available"
						selected="setFilters(name, conditions)" data-conditions="conditions.available"></div>
					<div class="row filter-condition" data-type="checkbox" data-title="country" data-has-clear-all="true"
						selected="setFilters(name, conditions)" data-conditions="conditions.country"></div>
				</div>			
				<div class="col-xs-9 brand-list">
					<div class="row">
						<div class=" col-xs-12">
							<div class="brand-list-header">
								<span class="brand-list-title">ALL BRANDS</span>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-search"></span>
									</span>
									<input type="text" class="form-control" id="brand-keyword" placeholder="SEARCH BRAND">
								</div>
							</div>
						</div>
					</div>
					<div class="brand-list-content row">
						<div class="col-xs-3">
							<a target="_blank" href="#" class="brand-item">
								<img src="/static/app/images/shop-brand-1.png" class="brand-item-image">
								<span class="brand-item-name">
									<span>BRAND A</span>
								</span>
							</a>
						</div>
						<div class="col-xs-3">
							<a target="_blank" href="#" class="brand-item">
								<img src="/static/app/images/shop-brand-1.png" class="brand-item-image">
								<span class="brand-item-name">
									<span>BRAND A</span>
								</span>
							</a>
						</div>
						<div class="col-xs-3">
							<a target="_blank" href="#" class="brand-item">
								<img src="/static/app/images/shop-brand-1.png" class="brand-item-image">
								<span class="brand-item-name">
									<span>BRAND A</span>
								</span>
							</a>
						</div>
						<div class="col-xs-3">
							<a target="_blank" href="#" class="brand-item">
								<img src="/static/app/images/shop-brand-1.png" class="brand-item-image">
								<span class="brand-item-name">
									<span>BRAND A</span>
								</span>
							</a>
						</div>
						<div class="col-xs-3">
							<a target="_blank" href="#" class="brand-item">
								<img src="/static/app/images/shop-brand-1.png" class="brand-item-image">
								<span class="brand-item-name">
									<span>BRAND A</span>
								</span>
							</a>
						</div>
						<div class="col-xs-3">
							<a target="_blank" href="#" class="brand-item">
								<img src="/static/app/images/shop-brand-1.png" class="brand-item-image">
								<span class="brand-item-name">
									<span>BRAND A</span>
								</span>
							</a>
						</div>
						<div class="col-xs-3">
							<a target="_blank" href="#" class="brand-item">
								<img src="/static/app/images/shop-brand-1.png" class="brand-item-image">
								<span class="brand-item-name">
									<span>BRAND A</span>
								</span>
							</a>
						</div>
						<div class="col-xs-3">
							<a target="_blank" href="#" class="brand-item">
								<img src="/static/app/images/shop-brand-1.png" class="brand-item-image">
								<span class="brand-item-name">
									<span>BRAND A</span>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</section>
	<footer class="row footer-navigation">
		<?php include '/global-footer-navigation.php'; ?>
	</footer>
</body>
</html>