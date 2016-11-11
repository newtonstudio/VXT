<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=strtoupper($init['lang']['Silver'])?> <?=strtoupper($init['lang']['marketplace'])?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<?php
							if($islogin) {
							?>
							<div class="pull-right"><a href="<?=base_url($init['langu'].'/silver_tomarket')?>" class="btn btn-primary"><?=strtoupper($init['lang']['Sell your Silver'])?></a></div>
							<?php
							}
							?>
							<div id="balance_section" class="pull-left">
								<p><?=$init['lang']['USD account balance: (USD)']?>: <span id="usd_account_balance" class="label label-danger"></span></p>
								<p><?=$init['lang']['Silver account balance: (oz)']?>: <span id="silver_account_balance" class="label label-success"></span></p>
							</div>
							
							<table class="table table-bordered">
								<thead>
									<tr><th><?=$init['lang']['Opened Date']?></th><th><?=$init['lang']['Market Account No.']?></th><th><?=$init['lang']['Total oz']?></th><th><?=$init['lang']['Price per oz']?>(USD)</th><th><?=$init['lang']['Action']?></th></tr>
								</thead>
								<tbody id="result">

								</tbody>
							</table>

							

						</div>
						
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

<div id="buyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?=$init['lang']['Close']?></span></button>
											<h4 class="modal-title" id="buyModalTitle"></h4>
										</div>
										<div class="modal-body">											
											<form id="buy-form">
												<input type="hidden" id="market_id" name="market_id" value="" />												
												<div class="form-group">
													<label for="total_oz_avail"><?=$int['lang']['Total ounce available']?> (oz)</label>
													<input type="text" class="form-control" name="total_oz_avail" id="total_oz_avail" placeholder="<?=$int['lang']['Total ounce available']?>" readonly="readonly">													
												</div>

												<div class="form-group">
													<label for="price_per_oz"><?=$init['lang']['Price per ounce']?> (USD)</label>
													<input type="text" class="form-control" name="price_per_oz" id="price_per_oz" placeholder="<?=$init['lang']['Price per ounce']?>" readonly="readonly">													
												</div>

												<div class="form-group">
													<label for="buy_oz"><?=$init['lang']['How many ounce you want to buy']?>? (oz)</label>
													<input type="text" class="form-control" name="buy_oz" id="buy_oz" placeholder="<?=$init['lang']['How many ounce you want to buy']?>" onkeyup="calculateTotalPrice()" onblur="calculateTotalPrice()" >													
												</div>

												<div class="form-group">
													<label for="buy_oz"><?=$init['lang']['Total Price']?> (USD)</label>
													<input type="text" class="form-control" name="total_price" id="total_price" placeholder="<?=$init['lang']['Total Price']?>" readonly="readonly" >													
												</div>

												<button id="submit_btn" type="submit" class="btn btn-default"><?=$init['lang']['submit']?></button>
											</form>
											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal"><?=$init['lang']['Close']?></button>											
										</div>
									</div>
								</div>
							</div>							

<script>


var marketlist = [];

function getMA(market_id){	

	if(marketlist.length > 0) {

		for(var i=0; i < marketlist.length; i++) {

			if(marketlist[i].market_id == market_id) {
        	
	        	$("#MAC").html('');
	        	
	        	$('#myModal').modal("show");

	        	$("#myLargeModalLabel").html(marketlist[i].market_serial);
	        	

	        	var balance = 0;
	        	if(marketlist[i].MAC.length > 0) {
	        		for(var j=0; j < marketlist[i].MAC.length; j++) {
	        			
	        			balance += parseFloat(marketlist[i].MAC[j].oz);

	        			var content = '';
	        			content += "<td>"+marketlist[i].MAC[j].created_date+"</td>";        			
	        			content += "<td>"+marketlist[i].MAC[j].action+" "+marketlist[i].MAC[j].remarks+"</td>";
	        			content += "<td>"+(marketlist[i].MAC[j].oz>0?marketlist[i].MAC[i].oz:'')+"</td>";        			
	        			content += "<td>"+(marketlist[i].MAC[j].oz<0?marketlist[i].MAC[i].oz:'')+"</td>";        			
	        			content += "<td>"+balance.toFixed(2)+"</td>";
	        			var tr = $("<tr>").html(content);
	        			$("#MAC").append(tr);

	        		}
	        	}

	        	break;

        	}

        }

    }
        

	

}

function getMarketSilver(){

	var token = getCookie("token");	

	$.getJSON("<?=base_url($init['langu'].'/api/marketplace')?>/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#result").html('');                	

        	marketlist = result.result.marketlist;
        	

        	if(result.result.marketlist.length > 0) {
        		for(var i=0; i < result.result.marketlist.length; i++) {
        			

        			var content = '';
        			content += "<td>"+result.result.marketlist[i].created_date+"</td>";
        			content += "<td><a href='javascript: getMA("+result.result.marketlist[i].market_id+")'>"+result.result.marketlist[i].market_serial+"</a></td>";
        			content += "<td>"+result.result.marketlist[i].oz+"</td>";
        			content += "<td>"+result.result.marketlist[i].price+"</td>";
        			

        			
        			content += '<td><a href="javascript:buy(\''+result.result.marketlist[i].market_id+'\')" class="btn btn-danger" title="buy"><i class="fa fa-shopping-cart"></i></a></a></td>';
        			
        			
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


function buy(market_id,action){

	var token = getCookie("token");

	if(token != "") {


		if(marketlist.length > 0) {

			for(var i=0; i < marketlist.length; i++) {

				if(marketlist[i].market_id == market_id) {

					$("#buyModalTitle").html("<?=$init['lang']['Buy from']?> :"+marketlist[i].market_serial);
	        	
		        	$("#total_oz_avail").val(marketlist[i].oz);
		        	$("#price_per_oz").val(marketlist[i].price);
		        	$("#market_id").val(market_id);

		        	break;

	        	}

	        }

	    }
		
		$('#buyModal').modal("show");

	} else {
		alert("<?=$init['lang']['You need to login to proceed to buy']?>");
	}

}

function calculateTotalPrice(){

	var total_oz_avail = $("#total_oz_avail").val()!=""?parseFloat($("#total_oz_avail").val()):0;
	var price_per_oz = $("#price_per_oz").val()!=""?parseFloat($("#price_per_oz").val()):0;
	var buy_oz = $("#buy_oz").val()!=""?parseFloat($("#buy_oz").val()):0;

	if(isNaN(buy_oz)){
		alert("<?=$init['lang']['You must enter number']?>");
		$("#buy_oz").val("");
		$("#total_price").val(0);
		return;
	}

	if(buy_oz > total_oz_avail){
		alert("<?=$init['lang']['You cannot buy more than available ounce']?>");
		$("#buy_oz").val("");
		$("#total_price").val(0);
		return;
	} 

	var total_price = buy_oz * price_per_oz;
	$("#total_price").val(total_price.toFixed(2));

	

}

function getUserdata() {

	var token = getCookie("token");

	if(token!="") {
		$("#balance_section").show();
		$.ajax({
			type: "GET",
			url: "/"+langu+"/api/getUserdata/"+token,
			data: "",
			success: function(json){
					  		if(json.status == "OK") {
					  			$("#usd_account_balance").html(json.result.usd_balance);
					  			$("#silver_account_balance").html(json.result.silver_balance);
					  		} else {
								alert(json.result);					  			
					  			if(json.error_code == "401") {
					  				logout();
					  			}
					  		}
					  },
					  dataType: "json",
					  contentType : "application/json"
					});
	} else {
		$("#balance_section").hide();
	}

}

$(document).ready(function(){

	getMarketSilver();
	getUserdata();

});


if($("#buy-form").length>0) {
			$('#buy-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        
		        
				var formData = $("#buy-form :input").serializeArray();				
				var obj = {};
				if(formData.length > 0) {
					for(var i=0; i < formData.length; i++) {
						//console.log(formData);						
						obj[formData[i].name] = formData[i].value;						
					}
				}				

				var token = getCookie("token");
				obj["token"] = token;	

				$('input[type="submit"]').prop('disabled', true);
				$('#submit_btn').html("Loading...");

				$.ajax({
				  type: "POST",
				  url: "/"+langu+"/api/buy",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			alert(json.result.success_text);
				  			location.href="<?=base_url($init['langu'].'/marketplace')?>";		  		
				  		} else {
				  			alert(json.result);
				  			$('input[type="submit"]').prop('disabled', false);
				  			$('#submit_btn').html("<?=$init['lang']['submit']?>");
				  			if(json.error_code == "401") {
					  			logout();
					  		}
				  		}

				  },
				  dataType: "json",
				  contentType : "application/json"
				});


		    });
		};

</script>