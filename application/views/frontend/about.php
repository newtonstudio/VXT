<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">About Us</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li class="active">About Us</li>
				</ul>
			</div><!--/container-->
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content about">
			<div class="profile-body margin-bottom-20">
				<div class="headline">
				<h2>ABOUT <span class="color-green">VXT</span></h2>
				</div>
				<p><?=$content?></p>
			</div>

			<!-- About Sldier -->
			<div class="shadow-wrapper margin-bottom-50">
				<div class="carousel slide carousel-v1 box-shadow shadow-effect-2" id="myCarousel">
					<ol class="carousel-indicators">
						<?php
						if(!empty($banner)) {
							$i=0;
							foreach($banner as $v) {
						?>
						<li class="rounded-x <?=$i==0?'active':''?>" data-target="#myCarousel" data-slide-to="<?=$i?>" <?=$i==0?'class="active"':''?>></li>
						<?php	
								$i++;	
							}
						}
						?>						
					</ol>

					<div class="carousel-inner">
						<?php
						if(!empty($banner)) {
							$i=0;
							foreach($banner as $v) {
						?>
						<div class="item <?=$i==0?'active':''?>">
							<img class="img-responsive" src="<?=$v['img']?>" alt="">
						</div>
						<?php	
								$i++;	
							}
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
			</div>
			<!-- End About Sldier -->

		</div>
		<!--=== End Content Part ===-->