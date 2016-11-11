<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['SILVER DELIVERY ORDER']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							

							<table class="table table-bordered">
								<thead>
									<tr><th><?=$init['lang']['Date']?></th><th><?=$init['lang']['DO No.']?></th><th><?=$init['lang']['Total ounce']?></th><th><?=$init['lang']['Total Fee']?>(USD)</th><th><?=$init['lang']['Confirmed']?>?</th><th><?=$init['lang']['Done']?>?</th><th> <?=$init['lang']['Shipped']?>?</th></tr>
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


<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?=$init['lang']['Close']?></span></button>
											<h4 class="modal-title" id="myLargeModalLabel"></h4>
										</div>
										<div class="modal-body">

											<table class="table table-colored table-bordered">												
												<tbody>
													<tr><th><?=$init['lang']['Recipient Name']?></th><td id="name"></td></tr>
													<tr><th><?=$init['lang']['Mobile']?></th><td id="tel"></td></tr>
													<tr><th><?=$init['lang']['Country']?></th><td id="country"></td></tr>
													<tr><th><?=$init['lang']['City']?></th><td id="city"></td></tr>
													<tr><th><?=$init['lang']['Address']?></th><td id="address"></td></tr>
													<tr><th><?=$init['lang']['Zip Code']?></th><td id="zipcode"></td></tr>

												</tbody>
											</table>

											<table class="table table-colored table-bordered">
												<thead>
													<tr><th><?=$init['lang']['Product Title']?></th><th><?=$init['lang']['Qty']?></th><th>oz</th><th><?=$init['langu']['Total oz']?></th></tr>
												</thead>
												<tbody id="DOP">
												</tbody>
												<tfoot>
													<tr><th colspan="2"></th><th><?=$init['lang']['Total withdrawal']?></th><th id="total_oz"></th></tr>
													<tr><th colspan="2"></th><th><?=$init['lang']['Shipping Fee']?> (USD)</th><th id="shipping_fee"></th></tr>
													<tr><th colspan="2"></th><th><?=$init['lang']['Transaction Fee']?> (USD)</th><th id="transaction_fee"></th></tr>
													<tr><th colspan="2"></th><th><?=$init['lang']['Tax Fee']?> (USD)</th><th id="tax_fee"></th></tr>
													<tr><th colspan="2"></th><th><?=$init['lang']['Total Fee']?> (USD)</th><th id="total_fee"></th></tr>
												</tfoot>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal"><?=$init['lang']['Close']?></button>											
										</div>
									</div>
								</div>
							</div>

<script>



function getDO(DO_id){

	var token = getCookie("token");

	$.getJSON("<?=base_url($init['langu'].'/api/getSilverDO')?>/"+DO_id+"/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#DOP").html('');
        	
        	$('#myModal').modal("show");

        	$("#myLargeModalLabel").html(result.result.DO.DO_no);
        	$("#name").html(result.result.DO.name);
        	$("#tel").html(result.result.DO.tel);
        	$("#country").html(result.result.DO.country);
        	$("#city").html(result.result.DO.city);
        	$("#address").html(result.result.DO.address);
        	$("#zipcode").html(result.result.DO.zipcode);

        	$("#total_oz").html(result.result.DO.total_oz);
        	$("#shipping_fee").html(result.result.DO.shipping_fee);
        	$("#transaction_fee").html(result.result.DO.transaction_fee);
        	$("#tax_fee").html(result.result.DO.tax_fee);
        	$("#total_fee").html(result.result.DO.total_fee);


        	if(result.result.DOP.length > 0) {
        		for(var i=0; i < result.result.DOP.length; i++) {
        			

        			var content = '';
        			content += "<td>"+result.result.DOP[i].title+"</td>";        			
        			content += "<td>"+result.result.DOP[i].qty+"</td>";
        			content += "<td>"+result.result.DOP[i].oz+"</td>";        			
        			content += "<td>"+(result.result.DOP[i].qty*result.result.DOP[i].oz)+"</td>";        			
        			var tr = $("<tr>").html(content);
        			$("#DOP").append(tr);

        		}
        	}

        } else {
        	alert(result.result);
        	if(json.error_code == "401") {
					logout();
			}
        }
    });

	

}

$(document).ready(function(){

	var token = getCookie("token");

	$.getJSON("<?=base_url($init['langu'].'/api/getSilverDOList')?>/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#result").html('');
        	

        	var balance = 0;

        	if(result.result.DOList.length > 0) {
        		for(var i=0; i < result.result.DOList.length; i++) {
        			

        			var content = '';
        			content += "<td>"+result.result.DOList[i].created_date+"</td>";
        			content += "<td><a href='javascript: getDO("+result.result.DOList[i].DO_id+")'>"+result.result.DOList[i].DO_no+"</a></td>";
        			content += "<td>"+result.result.DOList[i].total_oz+"</td>";
        			content += "<td>"+result.result.DOList[i].total_fee+"</td>";
        			content += "<td><div align='right'>"+(result.result.DOList[i].is_confirmed=='1'?result.result.DOList[i].confirmed_date:'<?=$init['lang']['Not Yet']?>')+"</div></td>";
        			content += "<td><div align='right'>"+(result.result.DOList[i].is_done=='1'?result.result.DOList[i].done_date:'<?=$init['lang']['Not Yet']?>')+"</div></td>";
        			content += "<td><div align='right'>"+(result.result.DOList[i].is_shipped=='1'?result.result.DOList[i].shipped_date:'<?=$init['lang']['Not Yet']?>')+"</div></td>";
        			

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