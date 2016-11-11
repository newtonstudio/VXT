<!--=== Footer v6 ===-->
		<div id="footer-v6" class="footer-v6">
			<div class="footer">
				<div class="container">
					<div class="row">
						<!-- About Us -->
						<div class="col-md-3 sm-margin-bottom-40">
							<div class="heading-footer"><h2><?=$init['web_data']['findus_title']?></h2></div>
							<p><?=$init['web_data']['findus_desc']?></p>
						</div>
						<!-- End About Us -->

						<!-- Recent News -->
						<div class="col-md-3 sm-margin-bottom-40">
							<div class="heading-footer"><h2>OUR PRODUCTS</h2></div>
							<ul class="list-unstyled link-news">
								<li>
									<a href="#">Capacitive Touch Panel</a>
								</li>
								<li>
									<a href="#">Industrial LCD Panel</a>
								</li>
							</ul>
						</div>
						<!-- End Recent News -->

						<!-- Useful Links -->
						<div class="col-md-3 sm-margin-bottom-40">
							<div class="heading-footer"><h2>Useful Links</h2></div>
							<ul class="list-unstyled footer-link-list">
								<li><a href="<?=base_url($init['langu'].'/about')?>">About Us</a></li>
								<li><a href="<?=base_url($init['langu'].'/products')?>">Products</a></li>
								<li><a href="<?=base_url($init['langu'].'/solutions')?>">Solutions</a></li>
								<li><a href="<?=base_url($init['langu'].'/support')?>">Support</a></li>
								<li><a href="<?=base_url($init['langu'].'/contact')?>">Contact</a></li>
							</ul>
						</div>
						<!-- End Useful Links -->

						<!-- Contacts -->
						<div class="col-md-3">
							<div class="heading-footer"><h2>Contacts</h2></div>
							<ul class="list-unstyled contacts">
								<li>
									<i class="radius-3x fa fa-map-marker"></i>
									<?=$init['web_data']['web_address']?>

								</li>
								<li>
									<i class="radius-3x fa fa-phone"></i>
									<?=$init['web_data']['web_mobile']?>
								</li>
								<li>
									<i class="radius-3x fa fa-globe"></i>
									<a href="#"><?=$init['web_data']['offical_fb']?></a>
								</li>
							</ul>
						</div>
						<!-- End Contacts -->
					</div>
				</div><!--/container -->
			</div>

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-8 sm-margon-bottom-10">
							<ul class="list-inline terms-menu">
								<li class="silver"><?=$init['web_data']['web_footer']?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--=== End Footer v6 ===-->
	</div><!--/wrapper-->

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/jquery/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/jquery/jquery-migrate.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/back-to-top.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/smoothScroll.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/jquery.parallax.js')?>"></script>
	<script src="<?=base_url('assets/VXT/assets/plugins/master-slider/masterslider/masterslider.min.js')?>"></script>
	<script src="<?=base_url('assets/VXT/assets/plugins/master-slider/masterslider/jquery.easing.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/counter/waypoints.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/counter/jquery.counterup.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/fancybox/source/jquery.fancybox.pack.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')?>"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/js/custom.js')?>"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/js/app.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/js/plugins/fancy-box.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/js/plugins/owl-carousel.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/js/plugins/master-slider-fw.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/VXT/assets/js/plugins/style-switcher.js')?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			App.initCounter();
			App.initParallaxBg();
			FancyBox.initFancybox();
			MSfullWidth.initMSfullWidth();
			OwlCarousel.initOwlCarousel();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
</body>
</html>