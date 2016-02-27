<div class="container">
    <div class="row">
        <div class="col-xs-12 text-right share-links">
            <a href="#" class="share-link"><i class="fa fa-facebook"></i></a>
            <a href="#" class="share-link"><i class="fa fa-weibo"></i></a>
            <a href="#" class="share-link"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <a href="<?= URL::site() ?>" class="logo-link" target="_self">
                <img class="site-logo" ng-src="/static/app/images/logo-<?php if ($currentPage == 'home') {
                    echo 'white';
                } else {
                    echo 'black';
                } ?>.png">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <ul class="main-naviagtions">
            </ul>
        </div>
    </div>
</div>
