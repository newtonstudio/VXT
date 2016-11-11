<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=strtoupper($init['lang']['Purchase order'])?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							

							<table class="table table-bordered">
								<thead>
									<tr><th><?=$init['lang']['Date']?></th><th><?=$init['lang']['PO No.']?></th><th><?=$init['lang']['Total ounce']?>(oz)</th><th><?=$init['lang']['Price per oz']?>(USD)</th><th><?=$init['lang']['Total Fee']?>(USD)</th></tr>
								</thead>
								<tbody id="result">

								</tbody>
							</table>

							

						</div>
						<!-- ================ -->
						<aside class="col-md-4 col-lg-3 col-lg-offset-1">
							<div class="sidebar">
								<div class="block clearfix">
									<h3 class="title"><?=$init['lang']['MENU']?></h3>
									<div class="separator-2"></div>
									<nav>
										<ul class="nav nav-pills nav-stacked list-style-icons">
											<?php
											if(!empty($sidemenu)) {
												foreach($sidemenu as $v){
											?>
											<li><a href="<?=$v['url']?>"><i class="<?=$v['icon']?>"></i><?=$v['name']?></a></li>
											<?php		
												}
											}
											?>	
											
										</ul>
									</nav>
								</div>							
							</div>
						</aside>
						<!-- sidebar end -->
				</div>
</section>
<!-- main-container end -->


<script>


$(document).ready(function(){

	var token = getCookie("token");

	$.getJSON("<?=base_url($init['langu'].'/api/getPOList')?>/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#result").html('');
        	

        	

        	if(result.result.POList.length > 0) {
        		for(var i=0; i < result.result.POList.length; i++) {
        			

        			var content = '';
        			content += "<td>"+result.result.POList[i].created_date+"</td>";
        			content += "<td>"+result.result.POList[i].po_serial+"</a></td>";
        			content += "<td>"+result.result.POList[i].oz+"</td>";
        			content += "<td>"+result.result.POList[i].price+"</td>";
        			content += "<td>"+result.result.POList[i].amount+"</td>";
        			
        			

        			var tr = $("<tr>").html(content);
        			$("#result").append(tr);

        		}
        	}

        } else {
        	alert(result.result);
        	if(json.error_code == "401") {
					logout();
			}
        }
    });

});

</script>