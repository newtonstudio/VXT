<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['MANAGE YOUR SILVER FROM MARKET']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							
							<div align="right"><a href="<?=base_url($init['langu'].'/silver_tomarket')?>" class="btn btn-primary"><?=strtoupper($init['lang']['Sell your Silver'])?></a></div>
							<table class="table table-bordered">
								<thead>
									<tr><th><?=$init['lang']['Opened Date']?></th><th><?=$init['lang']['Market Account No.']?></th><th><?=$init['lang']['Total ounce']?></th><th><?=$init['lang']['Price per oz']?>(USD)</th><th> <?=$init['lang']['Status']?></th><th><?=$init['lang']['Action']?></th></tr>
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
												<thead>
													<tr><th><?=$init['lang']['Date']?></th><th><?=$init['lang']['Action']?></th><th>+</th><th>-</th><th><?=$init['lang']['Balance']?></th></tr>
												</thead>
												<tbody id="MAC">
												</tbody>												
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal"><?=$init['lang']['Close']?></button>											
										</div>
									</div>
								</div>
							</div>

<script>



function getMA(market_id){

	var token = getCookie("token");

	$.getJSON("<?=base_url($init['langu'].'/api/getMarketAccount')?>/"+market_id+"/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#MAC").html('');
        	
        	$('#myModal').modal("show");

        	$("#myLargeModalLabel").html(result.result.MA.market_serial);
        	

        	var balance = 0;
        	if(result.result.MAC.length > 0) {
        		for(var i=0; i < result.result.MAC.length; i++) {
        			
        			balance += parseFloat(result.result.MAC[i].oz);

        			var content = '';
        			content += "<td>"+result.result.MAC[i].created_date+"</td>";        			
        			content += "<td>"+result.result.MAC[i].action+" "+result.result.MAC[i].remarks+"</td>";
        			content += "<td>"+(result.result.MAC[i].oz>0?result.result.MAC[i].oz:'')+"</td>";        			
        			content += "<td>"+(result.result.MAC[i].oz<0?result.result.MAC[i].oz:'')+"</td>";        			
        			content += "<td>"+balance+"</td>";
        			var tr = $("<tr>").html(content);
        			$("#MAC").append(tr);

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

function getMarketSilver(){

	var token = getCookie("token");
	$.getJSON("<?=base_url($init['langu'].'/api/getMyMarketSilver')?>/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#result").html('');
        	

        	var balance = 0;

        	if(result.result.marketlist.length > 0) {
        		for(var i=0; i < result.result.marketlist.length; i++) {
        			

        			var content = '';
        			content += "<td>"+result.result.marketlist[i].created_date+"</td>";
        			content += "<td><a href='javascript: getMA("+result.result.marketlist[i].market_id+")'>"+result.result.marketlist[i].market_serial+"</a></td>";
        			content += "<td>"+result.result.marketlist[i].oz+"</td>";
        			content += "<td>"+result.result.marketlist[i].price+"</td>";
        			content += "<td>"+(result.result.marketlist[i].status)+"</td>";

        			if(result.result.marketlist[i].is_display=="0") {
        				content += '<td><a href="javascript:actionSilverFromMarket(\''+result.result.marketlist[i].market_id+'\',\'remove\')" class="btn btn-danger" title="<?=$init['lang']['Closed and Return']?>"><i class="fa fa-archive"></i></a> <a href="javascript:actionSilverFromMarket(\''+result.result.marketlist[i].market_id+'\',\'show\')" class="btn btn-info" title="<?=$init['lang']['Show in Public']?>"><i class="fa fa-eye"></i></a></td>';
        			} else if (result.result.marketlist[i].is_display=="1") {
        				content += '<td><a href="javascript:actionSilverFromMarket(\''+result.result.marketlist[i].market_id+'\',\'hide\')" class="btn btn-danger" title="<?=$init['lang']['Hide from public']?>"><i class="fa fa-eye-slash"></i></a></a></td>';
        			} else {
        				content += '<td></td>';
        			}
        			
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

}


function actionSilverFromMarket(market_id,action){

	var token = getCookie("token");

	$.getJSON("<?=base_url($init['langu'].'/api/actionSilverFromMarket')?>/"+market_id+"/"+token+"/"+action, function(result){
        if(result.status == "OK") {        	
        	getMarketSilver();
        } else {
        	alert(result.result);
        	if(json.error_code == "401") {
					logout();
			}
        }
    });

}

$(document).ready(function(){

	getMarketSilver();

});

</script>