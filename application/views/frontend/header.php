<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title><?=$init['web_data']['web_title']?></title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?=$init['web_data']['web_meta']?>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/plugins/bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/css/style.css')?>">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/css/headers/header-v6.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/css/footers/footer-v6.css')?>">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/plugins/animate.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/plugins/line-icons/line-icons.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/plugins/font-awesome/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/plugins/fancybox/source/jquery.fancybox.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/plugins/master-slider/masterslider/style/masterslider.css')?>">
	<link rel='stylesheet' href="<?=base_url('assets/VXT/assets/plugins/master-slider/masterslider/skins/black-2/style.css')?>">

	<!-- CSS Pages Style -->
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/css/pages/page_one.css')?>">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/css/theme-colors/orange.css')?>" id="style_color">
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/css/theme-skins/dark.css')?>">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?=base_url('assets/VXT/assets/css/custom.css')?>">
</head>

<body class="header-fixed header-fixed-space">
	<div class="wrapper">
		<!--=== Header v6 ===-->
		<div class="header-v6 header-classic-white header-sticky">
			<!-- Navbar -->
			<div class="navbar mega-menu" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="menu-container">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<!-- Navbar Brand -->
						<div class="navbar-brand">
							<a href="<?=base_url()?>">
								<img class="shrink-logo" src="<?=base_url('assets/VXT/img/logo.svg')?>" alt="Logo">
							</a>
						</div>
						<!-- ENd Navbar Brand -->

						<!-- Header Inner Right -->
						<!--<div class="header-inner-right">
							<ul class="menu-icons-list">
								<li class="menu-icons">
									<i class="menu-icons-style search search-close search-btn fa fa-search"></i>
									<div class="search-open">
										<input type="text" class="animated fadeIn form-control" placeholder="Start searching ...">
									</div>
								</li>
							</ul>
						</div>-->
						<!-- End Header Inner Right -->
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<div class="menu-container">
							<ul class="nav navbar-nav">
								<!-- Home -->
								<li class="dropdown active">
									<a href="<?=base_url()?>" >
										Home
									</a>
								</li>
								<!-- End Home -->

								<!-- About Us -->
								<li class="dropdown">
									<a href="<?=base_url($init['langu'].'/about')?>" >
										About Us
									</a>
								</li>
								<!-- End About Us -->

								<!-- Blog -->
								<li class="dropdown">
									<a href="<?=base_url($init['langu'].'/products')?>" class="dropdown-toggle" data-toggle="dropdown">
										Products
									</a>
									<ul class="dropdown-menu">
										<?php
										if(!empty($productList)) {
											foreach($productList as $v) {
										?>
										<li>
											<a href="<?=base_url($init['langu'].'/product/'.$v['product_id'].'/'.urlencode($v['title']))?>"><?=$v['title']?></a>
										</li>
										<?php		
											}
										}
										?>
																		
									</ul>
								</li>
								<!-- End Blog -->

								<!-- Portfolio -->
								<li class="dropdown">
									<a href="<?=base_url($init['langu'].'/solutions')?>">
										Solutions
									</a>
								</li>
								<!-- End Solutions -->
								<!-- Portfolio -->
								<li class="dropdown">
									<a href="<?=base_url($init['langu'].'/support')?>" >
										Support
									</a>
								</li>
								<!-- End Solutions -->

								<!-- Contact -->
								<li class="dropdown">
									<a href="<?=base_url($init['langu'].'/contact')?>" >
										Contact
									</a>
								</li>
								<!-- End Features -->

							</ul>
						</div>
					</div><!--/navbar-collapse-->
				</div>
			</div>
			<!-- End Navbar -->
		</div>
		<!--=== End Header v6 ===-->