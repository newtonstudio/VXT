<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Solutions</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li class="active">Solutions</li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row-fluid privacy">
				<div class="headline"><h2>Solutions</h2></div>

				<?php
				if(!empty($solutions)) {
					foreach($solutions as $v) {
				?>
				<div class="row">
						<div class="col-sm-4">
							<img class="img-responsive margin-bottom-20" src="<?=$v['mainpic']?>" alt="">
						</div>
						<div class="col-sm-8">
							<h3><?=$v['title']?></h3>
							<p><?=$v['brief']?></p>
						</div>
					</div>
					<hr>
				<?php		
					} 
				}
				?>
				
				
			</div><!--/row-fluid-->
		</div><!--/container-->
		<!--=== End Content Part ===-->