<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Products</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li><a href="">Products</a></li>
					<li class="active"><?=$productData['title']?></li>
				</ul>
			</div><!--/container-->
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Profile ===-->
		<div class="container content profile">
			<div class="row">
				<!--Left Sidebar-->
				<div class="col-md-3 md-margin-bottom-40">
					<ul class="list-group sidebar-nav-v1" id="sidebar-nav">
						<?php
						if(!empty($productList)) {
							foreach($productList as $v) {
						?>
						<!-- Typography -->
						<li class="list-group-item">
							<a href="<?=base_url($init['langu'].'/product/'.$v['product_id'].'/'.urlencode($v['title']))?>"><?=$v['title']?></a>
						</li>
						<?php
							}
						}
						?>

						
					</ul>
				</div>
				<!--End Left Sidebar-->

				<!-- Profile Content -->
				<div class="col-md-9">
					<div class="profile-body">
					<div class="headline"><h2><?=$productData['title']?></h2></div>
						<div class="shadow-wrapper margin-bottom-50">
							<?php
							$product_images = !empty($productData['product_images'])?json_decode($productData['product_images'], true):array();						
							if(!empty($product_images)) {
							?>
							<div class="carousel slide carousel-v1 box-shadow shadow-effect-2" id="myCarousel">
								<ol class="carousel-indicators">
									<?php
									$i=0;
									foreach($product_images as $v) {
									?>
									<li class="rounded-x <?=$i==0?'active':''?>" data-target="#myCarousel" data-slide-to="<?=$i?>"></li>
									<?php
										$i++;
									}
									?>
								</ol>
								<div class="carousel-inner">
									<?php
									$i=0;
									foreach($product_images as $v) {
									?>
									<div class="item <?=$i==0?'active':''?>">
										<img class="img-responsive" src="<?=$v['img']?>" alt="">
									</div>
									<?php
										$i++;
									}
									?>
								</div>
								<div class="carousel-arrow">
									<a data-slide="prev" href="#myCarousel" class="left carousel-control">
										<i class="fa fa-angle-left"></i>
									</a>
									<a data-slide="next" href="#myCarousel" class="right carousel-control">
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</div>
							<?php
							}
							?>
						</div>
							<div class="margin-bottom-30">
								<h2><?=$productData['main_title']?></h2>
								<p><?=$productData['main_brief']?></p>
								<h3><?=$productData['subtitle']?></h3>

								<?php
								$sublist = !empty($productData['sublist'])?json_decode($productData['sublist'], true):array();

								if(!empty($sublist)) {									
								?>
								<ul>
									<?php
									foreach($sublist as $v) {
									?>
									<li><?=$v?></li>
									<?php
									}
									?>
									
								</ul>
								<?php
								}
								?>
							</div>
							<?php
							if(!empty($productData['button_link'])) {
							?>
							<a class="btn-u" href="<?=$productData['button_link']?>"><?=$productData['button']?></a>
							<?php
							} else {
							?>
							<a class="btn-u" href="<?=base_url($init['langu'].'/product_detail/'.$productData['product_id'].'/'.urlencode($productData['title']))?>"><?=$productData['button']?></a>
							<?php
							}
							?>
					</div>
				</div>
				<!-- End Profile Content -->
			</div>
		</div><!--/container-->
		<!--=== End Profile ===-->