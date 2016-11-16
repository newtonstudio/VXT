<!--=== Breadcrumbs v2 ===-->
		<div class="breadcrumbs-v2 faq-breadcrumb margin-bottom-20">
			<div class="breadcrumbs-v2-in">
				<h1>Support</h1>
				<ul class="breadcrumb-v2 list-inline">
					<li><a href="<?=base_url()?>"><i class="rounded-x fa fa-angle-right"></i>Home</a></li>
					<li class="active"><i class="rounded-x fa fa-angle-right"></i>Support</li>
				</ul>
			</div>
		</div>
		<!--=== End Breadcrumbs v2 ===-->

		<!--=== FAQ Page ===-->
		<div class="container content faq-page">

			<!-- FAQ Content -->
			<div class="row">
				<!-- Begin Tab v1 -->
				<div class="col-md-6">
					<div class="headline"><h2>Q &amp; A</h2></div>
					<div id="accordion-v1" class="panel-group acc-v1">

									<?php
									if(!empty($qa)) {
										$i=1;
										foreach($qa as $v) {
									?>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a href="#v<?=$v['qa_id']?>" data-parent="#accordion-v1" data-toggle="collapse" class="accordion-toggle">
													<?=$i?>.	<?=$v['question']?>
												</a>
											</h4>
										</div>
										<div class="panel-collapse collapse <?=$i==1?'in':''?>" id="v<?=$v['qa_id']?>">
											<div class="panel-body">
												<?=$v['answer']?>
											</div>
										</div>
									</div>
									<?php	
											$i++;	
										} 
									}
									?>
									
								</div>
				</div><!--/col-md-6-->
				<!--End Tab v1-->

				<!-- Popular Topics -->
				<div class="col-md-6">
					<div class="headline"><h2>Drivers Download</h2></div>
					<div class="panel panel-sea margin-bottom-10">
								
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>OS</th>
											<th>Download</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										if(!empty($drivers)) {
											$i=1;
											foreach($drivers as $v) {
										?>
										<tr>
											<td><?=$i?></td>
											<td><?=$v['OS']?></td>
											<td><a class="btn btn-warning btn-xs" href="<?=$v['download_link']?>" target="_blank">Download</a></td>
											<td><?=$v['brief']?></td>
										</tr>
										<?php
											}
										}
										?>										
									</tbody>
								</table>
							</div>
							<p>If you cannot find the driver you need, please contact us for further assistance.</p>
				</div><!--/col-md-6-->
				<!-- End Popular Topics -->
			</div>
			<!-- End FAQ Content -->
		</div><!--/container-->
		<!--=== End FAQ Page ===-->