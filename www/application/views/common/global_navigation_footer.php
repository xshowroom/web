<div class="container">
	<div class="row">
		<div class="col-xs-3">
			<h3><?=__("global_navigation_footer__GUIDE")?></h3>
			<ul>
				<li><a href="#"><?=__("global_navigation_footer__GUIDE__FOR_DESIGNERS")?></a></li>
				<li><a href="#"><?=__("global_navigation_footer__GUIDE__FOR_BUYERS")?></a></li>
				<li><a href="#"><?=__("global_navigation_footer__GUIDE__FOR_SHOWROOMS")?></a></li>
			</ul>
		</div>
		<div class="col-xs-3">
			<h3><?= __("global_navigation_footer__COMPANY")?></h3>
			<ul>
				<li><a href="<?=URL::site('press');?>"><?=__("global_navigation_footer__COMPANY__PRESS")?></a></li>
				<li><a href="<?=URL::site('discovery');?>"><?=__("global_navigation_footer__COMPANY__DISCOVERY")?></a></li>
				<li><a href="<?=URL::site('about');?>"><?=__("global_navigation_footer__COMPANY__ABOUT_US")?></a></li>
				<li><a href="<?=URL::site('career');?>""><?=__("global_navigation_footer__COMPANY__CAREER")?></a></li>
			</ul>
		</div>
		<div class="col-xs-3">
			<h3><?= __("global_navigation_footer__HELP")?></h3>
			<ul>
				<li><a href="<?=URL::site('about#contact-us');?>"><?=__("global_navigation_footer__HELP__CONTACT_US")?></a></li>
				<li><a href="#"<?=__("global_navigation_footer__HELP__PRIVACY_COOKIES")?></li>
				<li><a href="<?=url::site('customer')?>"><?=__("global_navigation_footer__HELP__Q_A")?></a></li>
				<li><a href="#"><?=__("global_navigation_footer__HELP__TERMS_OF_SERVICE")?></a></li>
			</ul>
		</div>
		<div class="col-xs-3">
			<div class="share-links">
				<a href="https://www.facebook.com/xshowroom" target="_blank" class="share-link"><i class="fa fa-facebook"></i></a>
				<a href="http://weibo.com/xshowroom" target="_blank" class="share-link"><i class="fa fa-weibo"></i></a>
				<a href="https://www.instagram.com/xshowroomlondon" target="_blank" class="share-link"><i class="fa fa-instagram"></i></a>
				<a href="#" class="share-link"><i class="fa fa-wechat"></i></a>
			</div>
			<h3><?=__("global_navigation_footer__SUBSCRIBE")?></h3>
			<form class="subscribe">
				<span><?=__("global_navigation_footer__SUBSCRIBE__SIGN_IP")?></span>
				<input type="text" placeholder="<?=__("global_navigation_footer__SUBSCRIBE__EMAIL")?>"/>
				<button class="btn"><?=__("global_navigation_footer__SUBSCRIBE__BUTTON")?></button>
			</form>
			<span class="copyright">
				©2015 XSHOWROOM
			</span>
			<span class="copyright">
				<?=__("global_navigation_footer__SUBSCRIBE__LICENSE")?>
			</span>
			<span class="copyright">
				沪ICP备 15032330号-1
			</span>

		</div>
	</div>
	<!-- Baidu tongji code -->
	<!-- for devo -->
	<!--	<script>-->
	<!--		var _hmt = _hmt || [];-->
	<!--		(function() {-->
	<!--			var hm = document.createElement("script");-->
	<!--			hm.src = "//hm.baidu.com/hm.js?6576053e06f49480da22d5d468ab6115";-->
	<!--			var s = document.getElementsByTagName("script")[0];-->
	<!--			s.parentNode.insertBefore(hm, s);-->
	<!--		})();-->
	<!--	</script>-->

	<!-- for prod -->
	<script>
		var _hmt = _hmt || [];
		(function() {
			var hm = document.createElement("script");
			hm.src = "//hm.baidu.com/hm.js?5cdb5b2284017ebece7b453d8345fbcb";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hm, s);
		})();
	</script>
</div>
