<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['SELL SILVER ON MARKET']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p><?=$init['lang']['SELL SILVER ON MARKET desc']?>:</p>							
							
							<form id="silver-selling-form" role="form">

								<div class="form-group">
									<label for="silver_account_no"><?=$init['lang']['From']?> <?=$init['lang']['Silver Account']?></label>
									<input type="text" class="form-control" name="silver_account_no" id="silver_account_no" placeholder="Silver account no." readonly="readonly">
									
								</div>

								
								<div class="form-group">
									<label for="silver_account_no"><?=$init['lang']['Silver account balance: (oz)']?></label>
									<input type="text" class="form-control" name="silver_account_balance" id="silver_account_balance" placeholder="Silver account balance" readonly="readonly">
								</div>								

								<div class="form-group">
									<label for="silver_account_no"><?=$init['lang']['Silver']?>(oz)</label>
									<input type="text" class="form-control" name="oz" id="oz" value="" placeholder="<?=$init['lang']['Please enter the ouce you wish to sell. e.g. 10']?>" onblur="calculateTotal();">
											
								</div>

								<div class="form-group">
									<label for="selling_price"><?=$init['lang']['Price per oz']?>(USD)</label>
									<input type="text" class="form-control" name="selling_price" id="selling_price" placeholder="<?=$init['lang']['What is the price you want to sell? e.g. 18']?>" onblur="calculateTotal();">
									<?=$init['lang']['Current silverPay official price per oz']?>: <span id="rate" class="label label-danger"></span> (<?=$init['lang']['might alter every minutes']?>)
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
							
						</aside>
						<!-- sidebar end -->
				</div>
</section>
<!-- main-container end -->

<script>


var silver_balance = 0;



function calculateSilverRate(){

	 $.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getUSD2SilverRateOz/1",
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			$("#rate").html(json.result.rate);					  								  			
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

function calculateTotal(){
		
	var oz = parseFloat($("#oz").val());
	var selling_price = $("#selling_price").val()!=""?parseFloat($("#selling_price").val()):0;

	var total_oz = oz;

	if(silver_balance >= total_oz && selling_price > 0) {
		$("#submit_btn").prop("disabled", false);
	} else {
		$("#submit_btn").prop("disabled", true);
	}


}

$(function () {    

	calculateSilverRate();
	//先鎖起來，除非足夠美金才能轉換
	$("#submit_btn").prop("disabled", true);
    
    var token = getCookie("token");

    $.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getUserdata/"+token,
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			
					  			$("#silver_account_no").val(json.result.userdata.silver_account_no);
					  			$("#silver_account_balance").val(json.result.silver_balance);		

					  			silver_balance = json.result.silver_balance;
					  			
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

$('#silver-selling-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        

		        var token = getCookie("token");
		        
				var formData = $("#silver-selling-form :input").serializeArray();				
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
				  url: "/"+langu+"/api/transferSilvertoMarket",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			alert(json.result.success_text);
				  			location.href="<?=base_url($init['langu'].'/market_manage')?>"				  							  			
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