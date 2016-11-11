<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['TRANSFER SILVER TO USD ACCOUNT']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p><?=$init['lang']['silver2usd_desc']?></p>							
							
							<form id="usd-transfer-form" role="form">

								<div class="form-group">
									<label for="silver_account_no"><?=$init['lang']['From']?> <?=$init['lang']['Silver account balance: (oz)']?>: <span class="label label-success" id="silver_account_balance"></span></label>
									<input type="text" class="form-control" name="silver_account_no" id="silver_account_no" placeholder="Silver account no." readonly="readonly">
									
								</div>

								<div class="form-group">
									<label for="usd_account_no"><?=$init['lang']['To']?> <?=$init['lang']['USD account balance: (USD)']?>: <span class="label label-danger" id="usd_account_balance"></span></label>
									<input type="text" class="form-control" name="usd_account_no" id="usd_account_no" placeholder="USD account no." readonly="readonly">
								</div>

								
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<label for="silver_account_no"><?=$init['lang']['Silver']?>(oz)</label>
											<input type="text" class="form-control" name="oz" id="oz" value="100" placeholder="Please enter the ouce you wish to sell" onblur="calculateUSDRate(this.value);">
											
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="silver_account_no"><?=$init['lang']['Amount']?>(USD)</label>
											<input type="text" class="form-control" name="amount" id="amount" placeholder="Please enter the amount you wish to transfer" value="0" onblur="calculateSilverRate(this.value);">
											<note>1oz = $<span id="rate"></span></note>
											
										</div>
									</div>
								
								</div>

								
								<div class="form-group">
										<label for="transaction_fee"><?=$init['lang']['Transaction Fee']?> (USD)</label>
										<input type="text" class="form-control" name="transaction_fee" id="transaction_fee" placeholder="Transaction fee" readonly="readonly">
										
								</div>

								<div class="form-group">
										<label for="transaction_fee"><?=$init['lang']['Total Fee']?> (USD)</label>
										<input type="text" class="form-control" name="total_fee" id="total_fee" placeholder="total_fee" readonly="readonly">
										
								</div>
																
								<button id="submit_btn" type="submit" class="btn btn-default"><?=$init['lang']['submit']?></button>
								
							</form>

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

							<div class="price">
						    	<div class="title"><?=$init['lang']['Silver Price History Chart']?></div>
						      <form>
						        <select id="Gold_Price_MainPage_Metal_SelectTime" onChange="ChangeChart(this.value);" name="Gold_Price_MainPage_Metal_SelectTime">
						        <option value="_1d_" selected="selected">24 <?=$init['lang']['Hour']?></option>
						        <option value="_30_day_">30 <?=$init['lang']['Day']?></option>
						        <option value="_60_day_">60 <?=$init['lang']['Day']?></option>
						        <option value="_6_month_">6 <?=$init['lang']['Month']?></option>
						        <option value="_1_year_">1 <?=$init['lang']['Year']?></option>
						        <option value="_2_year_">2 <?=$init['lang']['Year']?></option>
						        <option value="_5_year_">5 <?=$init['lang']['Year']?></option>
						        <option value="_10_year_">10 <?=$init['lang']['Year']?></option>
						        <option value="_15_year_">15 <?=$init['lang']['Year']?></option>
						        <option value="_20_year_">20 <?=$init['lang']['Year']?></option>
						        <option value="_30_year_">30 <?=$init['lang']['Year']?></option>
						        <option value="_all_data_">All Data</option>
						      </select></form>
						     <img id="Silver_Price_GoldPriceChart" alt="銀價" src="http://goldprice.org/NewCharts/gold/images/silver_1d_o_USD.png" class="img-responsive">      
						      <script type="text/javascript">						      
								function ChangeChart(val){
									var history = val;										
									var weight = "o";
									var cur = "USD";
												
									filename = "silver" + history + weight + "_" + cur + ".png";
									document.getElementById("Silver_Price_GoldPriceChart").src = "http://goldprice.org/NewCharts/gold/images/" + filename + "?" + Math.random();
												
								}
								</script>
								Reference: http://goldprice.org
						    </div>
						</aside>
						<!-- sidebar end -->
				</div>
</section>
<!-- main-container end -->

<script>


var usd_balance = 0;
var silver_balance = 0;

function calculateTotal(){
	
	var transaction_fee = parseFloat($("#transaction_fee").val());	
	var total_fee = transaction_fee;
	var oz = parseFloat($("#oz").val());

	$("#total_fee").val(total_fee);


	if(silver_balance >= oz) {
		$("#submit_btn").prop("disabled", false);
	} else {
		$("#submit_btn").prop("disabled", true);
	}



}

function calculateSilverRate(amount){

	 $.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getUSD2SilverRate/"+amount+"/bid",
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			$("#rate").html(json.result.rate);
					  			$("#oz").val(json.result.oz);
					  			$("#transaction_fee").val(json.result.transaction_fee);
					  			calculateTotal();
					  		} else {
					  			if(json.error_code == "401") {
					  				logout();
					  			}
					  		}
					  },
					  dataType: "json",
					  contentType : "application/json"
					});

}

function calculateUSDRate(oz){

	 $.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getUSD2SilverRateOz/"+oz+"/bid",
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			$("#rate").html(json.result.rate);
					  			$("#amount").val(json.result.amount);
					  			$("#transaction_fee").val(json.result.transaction_fee);
					  			calculateTotal();
					  		} else {
					  			if(json.error_code == "401") {
					  				logout();
					  			}
					  		}
					  },
					  dataType: "json",
					  contentType : "application/json"
					});

}

$(function () {    

	//先鎖起來，除非足夠美金才能轉換
	$("#submit_btn").prop("disabled", true);

	calculateUSDRate($("#oz").val());
    
    var token = getCookie("token");

    $.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getUserdata/"+token,
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			$("#usd_account_no").val(json.result.userdata.usd_account_no);
					  			$("#silver_account_no").val(json.result.userdata.silver_account_no);
					  			$("#silver_account_balance").html(json.result.silver_balance);					  			
					  			$("#usd_account_balance").html(json.result.usd_balance);					  			

					  			silver_balance = json.result.silver_balance;
					  			usd_balance = json.result.usd_balance;
					  			calculateTotal();

					  		} else {
					  			if(json.error_code == "401") {
					  				logout();
					  			}
					  		}
					  },
					  dataType: "json",
					  contentType : "application/json"
					});


});

$('#usd-transfer-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        

		        var token = getCookie("token");
		        
				var formData = $("#usd-transfer-form :input").serializeArray();				
				var obj = {};
				if(formData.length > 0) {
					for(var i=0; i < formData.length; i++) {
						//console.log(formData);						
						obj[formData[i].name] = formData[i].value;						
					}
				}		
				obj["token"] = token;	

				$('input[type="submit"]').prop('disabled', true);
				$('#submit_btn').html("Loading...");

				$.ajax({
				  type: "POST",
				  url: "/"+langu+"/api/transferSilvertoUSD",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			alert(json.result.success_text);
				  			location.href="<?=base_url($init['langu'].'/silver_history')?>"				  							  			
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
</script>