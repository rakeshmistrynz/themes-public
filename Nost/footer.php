	<footer id="main_footer">
	<div>
		<div id="get-it"   class="container_12 group">
			<ul class="grid-wrapper group">
				<li class="grid_4 alpha"><a class="get-it-item" id="get-it-demo" title="Learn from success" href="/case-studies/">Case studies</a></li>
				<li class="grid_4"><a class="get-it-item" id="get-it-trial" title="Download the app and try it in action with our demo store" target="_blank" href="http://try.mventory.com">Free trial</a></li>
				<li class="grid_4 omega"><a class="get-it-item" id="get-it-get" title="Get mVentory now to start selling more" href="/get-started/">Get it now</a></li>
			</ul>
		</div>
		<div id="footer-wrap">
		<div id="footer-menu" class="container_12 group">
			<div class="grid-wrapper group">
			<section class="grid_4 alpha">
				<?php wp_nav_menu(array('theme_location' => 'footer-column-1', 'fallback_cb' => false, 'container' => '', 'menu_class' => '', 'menu_id' => 'footer-column-1')); ?>
			</section>
			<section class="grid_4">
				<?php wp_nav_menu(array('theme_location' => 'footer-column-2', 'fallback_cb' => false, 'container' => '', 'menu_class' => '', 'menu_id' => 'footer-column-2')); ?>
			</section>
			<section class="grid_4 omega">
				<?php wp_nav_menu(array('theme_location' => 'footer-column-3', 'fallback_cb' => false, 'container' => '', 'menu_class' => '', 'menu_id' => 'footer-column-3')); ?>
			</section>
			</div>
		</div>
<div class="footer-partners">
<a id="trademe" href="/trademe-extension-for-magento/">TradeMe</a>
<a id="aws-s3" href="http://www.magentocommerce.com/magento-connect/aws-s3-cdn-for-product-images.html">AWS S3</a>
<a id="kudos" href="http://www.kudos.co.nz/">Kudos</a>
<a id="orion" href="http://www.sam.co.nz/ourproducts/orion/">Orion</a>
</div>
		<p id="copyright">&copy;2015 mVentory Ltd.</p>
		</div>
	</div>
	</footer>

	<?php wp_footer(); ?>
	<?php include_once("ga.php") ?>
</body>
</html>