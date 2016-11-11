<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">TRANSFER SILVER TO OTHER ACCOUNT</h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p>If you want to transfer Silver account of SilverPay to other account, please enter the oz in the following column:</p>							
							
							<form id="silver-transfer-form" role="form">

								<div class="form-group">
									<label for="silver_account_no">From Silver Account</label>
									<input type="text" class="form-control" name="silver_account_no" id="silver_account_no" placeholder="Silver account no." readonly="readonly">
									
								</div>

								
								<div class="form-group">
									<label for="silver_account_no">Silver Account Balance (oz)</label>
									<input type="text" class="form-control" name="silver_account_balance" id="silver_account_balance" placeholder="Silver account balance" readonly="readonly">
								</div>

								<div class="form-group">
									<label for="usd_account_no">To Other Silver Account</label>
									<input type="text" class="form-control" name="other_account_no" id="other_account_no" placeholder="Other SilverPay account no." onblur="checkAccountExist(this.value)">
								</div>

								<div class="form-group">
									<label for="silver_account_no">Silver(oz)</label>
									<input type="text" class="form-control" name="oz" id="oz" value="" placeholder="Please enter the ouce you wish to transfer" onblur="getTransactionFee(this.value)">
											
								</div>
								
								<div class="form-group">
										<label for="transaction_oz">Transaction oz</label>
										<input type="text" class="form-control" name="transaction_oz" id="transaction_oz" placeholder="Transaction oz" readonly="readonly">
										
								</div>	

								<div class="form-group">
										<label for="transaction_oz">Total oz</label>
										<input type="text" class="form-control" name="total_oz" id="total_oz" placeholder="Total oz" readonly="readonly">
										
								</div>								

								<div class="form-group">
										<label for="password">Password</label>
										<input type="password" class="form-control" name="password" id="password" placeholder="Key in your password to complete the transfer">
										
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

function calculateTotal(){
	
	var transaction_oz = parseFloat($("#transaction_oz").val());		
	var oz = parseFloat($("#oz").val());

	var total_oz = transaction_oz + oz;

	if(!isNaN(total_oz)){
		$("#total_oz").val(total_oz.toFixed(2));
	}

	if(silver_balance >= total_oz) {
		$("#submit_btn").prop("disabled", false);
	} else {
		$("#submit_btn").prop("disabled", true);
	}


}

function getTransactionFee(oz) {

	$.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getTransactionFee/"+oz,
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {

					  			$("#transaction_oz").val(json.result.transaction_oz);
					  			calculateTotal();
					  			
					  		} else {
					  			if(json.error_code == "401") {
					  				logout();
					  			} else {
					  				alert(json.result);					  				
					  			}
					  		}
					  },
					  dataType: "json",
					  contentType : "application/json"
					});

}

function checkAccountExist(silver_account_no){

	if(silver_account_no != ""){
		$.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/checkAccountExist/"+silver_account_no,
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {

					  			$("#other_account_no").prop("readonly", true);
					  			
					  		} else {
					  			if(json.error_code == "401") {
					  				logout();
					  			} else {
					  				alert(json.result);
					  				$("#other_account_no").val('');
					  			}
					  		}
					  },
					  dataType: "json",
					  contentType : "application/json"
					});
	}

}

$(function () {    

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

$('#silver-transfer-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        

		        var token = getCookie("token");
		        
				var formData = $("#silver-transfer-form :input").serializeArray();				
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
				  url: "/"+langu+"/api/transferSilvertoOther",
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