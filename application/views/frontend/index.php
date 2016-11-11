

		<!--=== Slider ===-->
		<div class="ms-layers-template">
			<!-- masterslider -->
			<div class="master-slider ms-skin-black-2 round-skin" id="masterslider">
				<?php
				if(!empty($bannerList)) {
					foreach($bannerList as $v) {
				?>
				<div class="ms-slide" style="z-index: 10">
					<img src="assets/plugins/master-slider/masterslider/style/blank.gif" data-src="<?=$v['background_url']?>" alt="">
					<div class="ms-layer ms-promo-info color-light" style="left:15px; top:160px"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay="700"
					data-ease="easeOutExpo"
					><?=$v['title_en']?></div>

					<div class="ms-layer ms-promo-info ms-promo-info-in color-light" style="left:15px; top:210px"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay="1000"
					data-ease="easeOutExpo"
					><?=$v['slogan_en']?></div>

					<div class="ms-layer ms-promo-sub color-light" style="left:15px; top:310px"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay="1300"
					data-ease="easeOutExpo"
					></div>

					<?php
					if(!empty($v['button_link'])) {
					?>
					<a class="ms-layer btn-u" style="left:15px; top:390px" href="<?=$v['button_link']?>"
					data-effect="bottom(40)"
					data-duration="2000"
					data-delay="1300"
					data-ease="easeOutExpo"
					><?=$v['button']?></a>
					<?php
					}
					?>

				</div>
				<?php
					}
				}
			?>


			</div>
			<!-- end of masterslider -->
		</div>
		<!--=== End Slider ===-->

		<!--=== Business ===-->
		<div class="container content-sm">
			<div class="row">
				<div class="col-sm-4 md-margin-bottom-40">
					<div class="thumbnails-v1">
						<?php
						if(!empty($CORE1_IMG)) {
						?>
						<div class="thumbnail-img">
							<img class="img-responsive" src="<?=$CORE1_IMG?>" alt="">
						</div>
						<?php
						}	
						?>
						<div class="caption">
							<h3><a href="#"><?=$CORE1?></a></h3>
							<p><?=$CORE1_DESC?></p>
							<p><a class="read-more" href="base_url($init['langu'].'/about')">See More</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-4 md-margin-bottom-40">
					<div class="thumbnails-v1">
						<?php
						if(!empty($CORE2_IMG)) {
						?>
						<div class="thumbnail-img">
							<img class="img-responsive" src="<?=$CORE2_IMG?>" alt="">
						</div>
						<?php
						}	
						?>
						<div class="caption">
							<h3><a href="#"><?=$CORE2?></a></h3>
							<p><?=$CORE2_DESC?></p>
							<p><a class="read-more" href="base_url($init['langu'].'/about')">See More</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnails-v1">
						<?php
						if(!empty($CORE3_IMG)) {
						?>
						<div class="thumbnail-img">
							<img class="img-responsive" src="<?=$CORE3_IMG?>" alt="">
						</div>
						<?php
						}	
						?>
						<div class="caption">
							<h3><a href="#"><?=$CORE3?></a></h3>
							<p><?=$CORE3_DESC?></p>
							<p><a class="read-more" href="base_url($init['langu'].'/about')">See More</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--=== End Business ===-->

		
