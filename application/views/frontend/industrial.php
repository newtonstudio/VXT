<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Products</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li><a href="">Products</a></li>
					<li><a href="">Capacitive Touch Panel</a></li>
					<li class="active">VL Series TFT LCD Panel</li>
				</ul>
			</div><!--/container-->
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Profile ===-->
		<div class="container content profile">
			<div class="panel panel-grey margin-bottom-30 table-responsive">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-globe"></i> VL Series TFT LCD Panel (Please contact us if you need something else.)
</h3>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Product Size</th>
										<th>Aspect Ratio</th>
										<th>Resolution</th>
										<th>Brightness</th>
										<th>Interface</th>
										<th>Operation Temp.</th>
										<th>Touch Panel Options</th>
										<th>VXT Part No.</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;

									if(!empty($details)) {
										foreach($details as $v) {
									?>
									<tr>
										<td><?=$i?></td>
										<td><?=$v['product_size']?></td>
										<td><?=$v['aspect_ratio']?></td>
										<td><?=$v['resolution']?></td>
										<td><?=$v['brightness']?></td>
										<td><?=$v['interface']?></td>
										<td><?=$v['operation_temp']?></td>
										<td><?=$v['touch_panel_options']?></td>
										<td><?=$v['vxt_partno']?></td>
									</tr>
									<?php
											$i++;
										}
									}
									?>
																		
								</tbody>
							</table>
						</div>
					</div>
					<a class="btn-u btn-block" type="button" href="<?=base_url($init['langu'].'/product/'.$productData['product_id'].'/'.urlencode($productData['title']))?>">Back</a>
		</div><!--/container-->
		<!--=== End Profile ===-->