<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Products</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li><a href="">Products</a></li>
					<li><a href="">Capacitive Touch Panel</a></li>
					<li class="active">VPH Series Touch Panel</li>
				</ul>
			</div><!--/container-->
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Profile ===-->
		<div class="container content profile">
			<div class="panel panel-grey margin-bottom-30 table-responsive">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-globe"></i> VPH Series Touch Panel (For smaller size of products, please contact us.) </h3>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Product Size</th>
										<th>Aspect Ratio</th>
										<th>Active Area</th>
										<th>Outline Dimensions</th>
										<th>Cover Glass</th>
										<th>VXT Part No.</th>
										<th>Reference Drawings</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;

									if(!empty($details)) {
										foreach($details as $v) {

											$od = json_decode($v['outline_dimensions'], true);
											$cg = json_decode($v['cover_glass'], true);
											$vp = json_decode($v['vxt_partno'], true);
											$rd = json_decode($v['reference_drawing'], true);

									?>
									<tr>
										<td rowspan="3"><?=$i?></td>
										<td rowspan="3"><?=$v['product_size']?></td>
										<td rowspan="3"><?=$v['aspect_ratio']?></td>
										<td rowspan="3"><?=$v['active_area']?></td>
										<td><?=$od[0]?></td>
										<td><strong><?=$cg[0]?></strong></td>
										<td><?=$vp[0]?></td>
										<td><a class="btn btn-warning btn-xs" target="_blank" href="<?=$rd[0]?>" ><i class="fa fa-check"></i> Download</a></td>
										
									</tr>
									<tr>
										<td><?=$od[1]?></td>
										<td><strong><?=$cg[1]?></strong></td>
										<td><?=$cg[1]?></td>
										<td><a class="btn btn-warning btn-xs" target="_blank" href="<?=$rd[1]?>" ><i class="fa fa-check"></i> Download</a></td>
									</tr>
									<tr>
										<td><?=$od[2]?></td>
										<td><strong><?=$cg[2]?></strong></td>
										<td><?=$cg[2]?></td>
										<td><a class="btn btn-warning btn-xs" target="_blank" href="<?=$rd[2]?>" ><i class="fa fa-check"></i> Download</a></td>
									</tr>
									


									<?php
											$i++;
										}
									}
									?>
									<!--<tr>
										<td rowspan="3">1</td>
										<td rowspan="3">10.4”</td>
										<td rowspan="3">4:3</td>
										<td rowspan="3">214.2 x 164.2 mm</td>
										<td>255.24 x 202.44 x 3.5 mm</td>
										<td><strong>3mm, Tempered Black Printing</strong></td>
										<td>VPH1040-B30-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>255.24 x 202.44 x 6.5 mm</td>
										<td><strong>6mm, Tempered Black Printing</strong></td>
										<td>VPH1040-B60-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>255.24 x 202.44 x 2.5 mm</td>
										<td><strong>1.8mm, Tempered Transparent</strong></td>
										<td>VPH1040-T20-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td rowspan="3">2</td>
										<td rowspan="3">12.1”</td>
										<td rowspan="3">4:3</td>
										<td rowspan="3">248.76 x 187.32 mm</td>
										<td>291.86 x 230.42 x 3.5 mm</td>
										<td><strong>3mm, Tempered Black Printing</strong></td>
										<td>VPH1210-B30-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>291.86 x 230.42 x 6.5 mm</td>
										<td><strong>6mm, Tempered Black Printing</strong></td>
										<td>VPH1210-B60-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>291.86 x 230.42 x 2.5 mm</td>
										<td><strong>1.8mm, Tempered Black Printing</strong></td>
										<td>VPH1210-T20-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td rowspan="3">3</td>
										<td rowspan="3">12.1” Wide</td>
										<td rowspan="3">16:10</td>
										<td rowspan="3">264.12 x 166.2 mm</td>
										<td>307.06 x 209.14 x 3.5 mm</td>
										<td><strong>3mm, Tempered Black Printing</strong></td>
										<td>VPH1210W-B30-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>307.06 x 209.14 x 6.5 mm</td>
										<td><strong>6mm, Tempered Black Printing</strong></td>
										<td>VPH1210W-B60-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>307.06 x 209.14 x 2.5 mm</td>
										<td><strong>1.8mm, Tempered Black Printing</strong></td>
										<td>VPH1210W-T20-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td rowspan="3">4</td>
										<td rowspan="3">15”</td>
										<td rowspan="3">4:3</td>
										<td rowspan="3">307.1 x 231.1mm</td>
										<td>355.1 x 279.1 x 3.5 mm</td>
										<td><strong>3mm, Tempered Black Printing</strong></td>
										<td>VPH1500-B30-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>355.1 x 279.1 x 6.5 mm</td>
										<td><strong>6mm, Tempered Black Printing</strong></td>
										<td>VPH1500-B60-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>355.1 x 279.1 x 2.5 mm</td>
										<td><strong>1.8mm, Tempered Black Printing</strong></td>
										<td>VPH1500-T20-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td rowspan="3">5</td>
										<td rowspan="3">15.6” Wide</td>
										<td rowspan="3">16:9</td>
										<td rowspan="3">347.23 x 196.54 mm</td>
										<td>395.23 x 244.54 x 3.5 mm</td>
										<td><strong>3mm, Tempered Black Printing</strong></td>
										<td>VPH1560W-B30-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>395.23 x 244.54 x 6.5 mm</td>
										<td><strong>6mm, Tempered Black Printing</strong></td>
										<td>VPH1560W-B60-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>395.23 x 244.54 x 2.5 mm</td>
										<td><strong>1.8mm, Tempered Black Printing</strong></td>
										<td>VPH1560W-T20-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td rowspan="3">6</td>
										<td rowspan="3">17”</td>
										<td rowspan="3">5:4</td>
										<td rowspan="3">342.7 x 276.58 mm</td>
										<td>392.5 x 334.3 x 3.5 mm</td>
										<td><strong>3mm, Tempered Black Printing</strong></td>
										<td>VPH1700-B30-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>392.5 x 334.3 x 6.5 mm</td>
										<td><strong>6mm, Tempered Black Printing</strong></td>
										<td>VPH1700-B60-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>392.5 x 334.3 x 2.5 mm</td>
										<td><strong>1.8mm, Tempered Black Printing</strong></td>
										<td>VPH1700-T20-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td rowspan="3">7</td>
										<td rowspan="3">18.5” Wide</td>
										<td rowspan="3">16:9</td>
										<td rowspan="3">413.2 x 233.8 mm</td>
										<td>462.6 x 287.55 x 3.5 mm</td>
										<td><strong>3mm, Tempered Black Printing</strong></td>
										<td>VPH1850W-B30-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>462.6 x 287.55 x 6.5 mm</td>
										<td><strong>6mm, Tempered Black Printing</strong></td>
										<td>VPH1850W-B60-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>
									<tr>
										<td>462.6 x 287.55 x 2.5 mm</td>
										<td><strong>1.8mm, Tempered Black Printing</strong></td>
										<td>VPH1850W-T20-A1U</td>
										<td><button class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Download</button></td>
									</tr>-->
								</tbody>
							</table>
						</div>
					</div>
					<a class="btn-u btn-block" type="button" href="<?=base_url($init['langu'].'/product/'.$productData['product_id'].'/'.urlencode($productData['title']))?>">Back</a>
		</div><!--/container-->
		<!--=== End Profile ===-->