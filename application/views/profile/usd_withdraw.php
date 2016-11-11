<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['WITHDRAW USD']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p><?=$init['lang']['withdraw usd desc']?></p>							
							
							<form id="usd-withdraw-form" role="form">
								<div class="form-group">
									<label for="oamount"><?=$init['lang']['Amount']?> (<?=$init['lang']['USD Account Balance']?>: <span class="label label-danger" id="usd_account_balance"></span>)</label>
									<input type="text" class="form-control" name="oamount" id="oamount" placeholder="<?=$init['lang']['Enter the amount']?>">
								</div>

								<div class="form-group">
									<label for="oamount"><?=$init['lang']['Transfer to Bank Account']?></label>
									<select id="ua_id" name="ua_id" class="form-control">
										<option value=""><?=$init['lang']['-SELECT YOUR BANK ACCOUNT-']?></option>
									</select>
								</div>
								
								<button type="submit" class="btn btn-default"><span id="submit_btn"><?=$init['lang']['submit']?></span></button>
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
$(function () {    
    
    var token = getCookie("token");

    $.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getUserdata/"+token,
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			$("#usd_account_balance").html(json.result.usd_balance);					  			
					  		} else {
					  			if(json.error_code == "401") {
					  				logout();
					  			}
					  		}
					  },
					  dataType: "json",
					  contentType : "application/json"
					});


	$.getJSON("<?=base_url($init['langu'].'/api/getUserAccount')?>/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#ua_id").html('');

        	if(result.result.accountlist.length > 0) {
        		for(var i=0; i < result.result.accountlist.length; i++) {

        			if( result.result.accountlist[i].validated == 1) {

        				var opt = $("<option>").attr({value:result.result.accountlist[i].ua_id}).text(result.result.accountlist[i].bankaccount+" "+result.result.accountlist[i].bankholder); 
        				$("#ua_id").append(opt);       			

        			}        		        			

        		}
        	} else {

        		alert('<?=$init['lang']['Currently no bank account list, you must add one before withdraw any amount from your usd account']?>');
        		location.href="<?=base_url($init['langu'].'/bank_account')?>";
        	}

        } else {
        	alert(result.result);
        	if(json.error_code == "401") {
					logout();
			}
        }
    });



});

$('#usd-withdraw-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        

		        var token = getCookie("token");
		        
				var formData = $("#usd-withdraw-form :input").serializeArray();				
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
				  url: "/"+langu+"/api/usdWithdrawApply",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			alert(json.result.success_text);
				  			location.href="<?=base_url($init['langu'].'/usd_deposit_apply_history')?>"				  							  			
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