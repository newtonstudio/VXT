<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['WITHDRAW SILVER']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p><?=$init['lang']['withdraw desc']?></p>

							<form id="silver-withdraw-form" role="form">								

								<div id="productlist" class="row masonry-grid-fitrows grid-space-10">	
								</div>								

								<div class="form-group">
									
									<div class="col-xs-6">
										<label for="silver_account_balance"><?=$init['lang']['Silver account balance: (oz)']?></label>
										<input type="text" class="form-control form-control-success" name="silver_account_balance" id="silver_account_balance" placeholder="0.00" readonly="readonly">
									</div>
									<div class="col-xs-6">
										<label for="usd_account_balance"><?=$init['lang']['USD account balance: (USD)']?></label>
										<input type="text" class="form-control form-control-danger" name="usd_account_balance" id="usd_account_balance" placeholder="0.00" readonly="readonly">
									</div>

								</div>

								<div>&nbsp;</div>
								<h3><?=$init['lang']['YOUR PURCHASE:']?></h3>
								<table class="table table-bordered table-colored">
									<thead>
										<tr><th><?=$init['lang']['Product Title']?></th><th>oz</th><th><?=$init['lang']['Qty']?></th><th><?=$init['lang']['Total oz']?></th></tr>
									</thead>	
									<tbody id="cartlist">
									</tbody>
									<tfoot>
										<tr><th></th><th></th><th align="right"><?=$init['lang']['Total withdrawal']?> (oz)</th><th ><div align="right" id="total_oz"></div></th></tr>
										<tr><th></th><th></th><th align="right"><?=$init['lang']['Shipping Fee']?> (USD)</th><th ><div align="right" id="shipping_fee"></div></th></tr>
										<tr><th></th><th></th><th align="right"><?=$init['lang']['Transaction Fee']?> (USD)</th><th><div id="transaction_fee" align="right"></div></th></tr>
										<tr><th></th><th></th><th align="right"><?=$init['lang']['Tax Fee']?> (USD)</th><th><div id="tax_fee" align="right"></div></th></tr>
										<tr><th></th><th></th><th align="right"><?=$init['lang']['Total Fee']?> (USD)</th><th><div id="total_fee" align="right"></div></th></tr>
									</tfoot>
								</table>

								<div>&nbsp;</div>
								<h3><?=$init['lang']['YOUR SHIPPING ADDRESS']?></h3>
								<div class="form-group">
									<label for="recipient_name"><?=$init['lang']['Recipient Name']?></label>
										<input type="text" class="form-control" id="recipient_name" placeholder="" name="recipient_name" />
								</div>

								<div class="form-group">
									<label for="tel"><?=$init['lang']['Mobile']?></label>
										<input type="text" class="form-control" id="tel" placeholder="country code + phone number, e.g. +886912345678" name="tel" />
								</div>

								<div class="form-group">
									<label for="country"><?=$init['lang']['Country']?></label>
										<select class="form-control" id="country" name="country">
														<?php
														if(!empty($countries)){
															foreach ($countries as $key => $value) {
														?>
																<option value="<?=$key?>"><?=$value?></option>
														<?php
															}
														}
														?>
													</select>
								</div>

								<div class="form-group">
									<label for="city"><?=$init['lang']['City']?></label>
										<input type="text" class="form-control" id="city" placeholder="" name="city" />
								</div>

								<div class="form-group">
									<label for="city"><?=$init['lang']['Address']?></label>
										<input type="text" class="form-control" id="address" placeholder="" name="address" />
								</div>

								<div class="form-group">
									<label for="zip_code"><?=$init['lang']['Zip Code']?></label>
										<input type="text" class="form-control" id="zip_code" placeholder="" name="zip_code" />
								</div>

								
								<button id="submit_btn" type="submit" class="btn btn-default"><span id="submit_btn"><?=$init['lang']['submit']?></span></button>
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

var cart = [];
var productlist = [];
var total_oz = 0;
var transaction_fee = 0;
var shipping_fee = 0;
var tax_fee = 0;
var total_fee = 0;

function getShippingFee() {

	var total_oz = 0;
	for(var i=0; i < cart.length; i++) {
		total_oz += parseFloat(cart[i].oz*cart[i].qty);
	}

	if(total_oz > 0) {

		$.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getShippingFee/"+total_oz,
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			shipping_fee = json.result.shipping_fee;	
					  			draw();				  							  			

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

}


function updateQty(qty, p_id){

	var selectedProduct = {};
	if(productlist.length > 0) {
		for(var i=0; i < productlist.length; i++) {
			if(productlist[i].p_id == p_id) {
				selectedProduct = productlist[i];
				break;
			}
		}
	}

	if(qty < 0) {
		qty = 0;
	}

	
	var pExists = false;
	//看看cart有沒有這個商品
	if(cart.length > 0) {
			for(var i=0; i< cart.length; i++) {
				if(cart[i].p_id == p_id) {
					pExists = true;
					cart[i].qty = qty;
					break;
				} 
			}
	}
	if(!pExists) {
		cart.push({p_id:p_id, qty:qty, title: selectedProduct.title, serial: selectedProduct.serial, oz:selectedProduct.oz, feePerOz:selectedProduct.feePerOz});
	}
	getShippingFee();
	draw();


}

function addQty(p_id){

	var selectedProduct = {};
	if(productlist.length > 0) {
		for(var i=0; i < productlist.length; i++) {
			if(productlist[i].p_id == p_id) {
				selectedProduct = productlist[i];
				break;
			}
		}
	}

	var pExists = false;
	//看看cart有沒有這個商品
	if(cart.length > 0) {
		for(var i=0; i< cart.length; i++) {
			if(cart[i].p_id == p_id) {
				pExists = true;
				cart[i].qty++;
				break;
			} 
		}
	}
	if(!pExists) {
		cart.push({p_id:p_id, qty:1, title: selectedProduct.title, serial: selectedProduct.serial, oz:selectedProduct.oz, feePerOz:selectedProduct.feePerOz});
	}
	getShippingFee();
	draw();

}

function minusQty(p_id) {

	if(cart.length > 0) {
		for(var i=0; i< cart.length; i++) {
			if(cart[i].p_id == p_id) {				
				cart[i].qty--;
				if(cart[i].qty < 0) {
					cart[i].qty = 0;
				}
				break;
			} 
		}
	}
	getShippingFee();
	draw();

}

function draw() {

	total_fee = 0;
	transaction_fee = 0;
	total_oz = 0;
	
	$("#cartlist").html('');
	if(cart.length > 0) {
		for(var i=0; i< cart.length; i++) {
			$("#cQty"+cart[i].p_id).val(cart[i].qty);
			var subtotal = cart[i].qty * cart[i].oz;
			transaction_fee += cart[i].feePerOz * cart[i].oz * cart[i].qty;
			total_oz += subtotal;		

			if(cart[i].qty > 0) {
				var tr = $("<tr>").html("<td>"+cart[i].title+"</td><td>"+cart[i].oz+"</td><td>"+cart[i].qty+"</td><td><div align='right'>"+subtotal+"</div></td>");
				$("#cartlist").append(tr);
			}

		}
	}

	total_fee = transaction_fee + shipping_fee + tax_fee;

	$("#total_oz").html(total_oz.toFixed(2));
	$("#transaction_fee").html(transaction_fee.toFixed(2));
	$("#shipping_fee").html(shipping_fee.toFixed(2));
	$("#tax_fee").html(tax_fee.toFixed(2));
	$("#total_fee").html(total_fee.toFixed(2));

	var silver_account_balance = parseFloat($("#silver_account_balance").val());
	var usd_account_balance = parseFloat($("#usd_account_balance").val());

	if(total_oz > 0 && total_oz <= silver_account_balance && total_fee <= usd_account_balance) {
		$("#submit_btn").prop("disabled", false);
	}

	console.log(cart);



}


$(function () {   

	$("#submit_btn").prop("disabled", true);
	draw(); 
    
    var token = getCookie("token");
    

    $.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getUserdata/"+token,
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			$("#recipient_name").val(json.result.userdata.name);
					  			$("#tel").val(json.result.userdata.tel);
					  			$("#country").val(json.result.userdata.country);
					  			$("#city").val(json.result.userdata.city);
					  			$("#address").val(json.result.userdata.address);
					  			$("#zip_code").val(json.result.userdata.zip_code);

					  			$("#silver_account_balance").val(json.result.silver_balance);				
					  			$("#usd_account_balance").val(json.result.usd_balance);					  			

					  		} else {
					  			if(json.error_code == "401") {
					  				logout();
					  			}
					  		}
					  },
					  dataType: "json",
					  contentType : "application/json"
					});


   	$.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getProductList",
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {

					  			productlist = json.result.productlist;

					  			$("#productlist").html('');

					  			for(var i=0; i < json.result.productlist.length; i++) {
					  				var tmp = '<div class="listing-item white-bg bordered mb-20">';
									tmp	+= '		<div class="overlay-container">';
									tmp += '				<img src="'+json.result.productlist[i].photo+'" alt="">';
									tmp += '			<a class="overlay-link popup-img-single" href="'+json.result.productlist[i].photo+'" title="'+json.result.productlist[i].title+'"><i class="fa fa-search-plus"></i></a>';
													
									tmp += '			</div>';
									tmp += '		<div class="body">'
									tmp += '			<h3><a href="#">'+json.result.productlist[i].title+'</a></h3>';
									tmp += '				';
									tmp += '				<div class="elements-list clearfix">';
									tmp += '				<span class="price">'+json.result.productlist[i].oz+' oz</span>';
									tmp += '				<div class="pull-right"><a href="javascript:minusQty(\''+json.result.productlist[i].p_id+'\');" class="margin-clear btn btn-sm btn-default-transparent">－</a> &nbsp;&nbsp;&nbsp;<input type="text" name="qty_'+json.result.productlist[i].p_id+'" id="cQty'+json.result.productlist[i].p_id+'" value="0" onblur="updateQty(this.value, '+json.result.productlist[i].p_id+')" size="5"> &nbsp;&nbsp;&nbsp;<a href="javascript:addQty(\''+json.result.productlist[i].p_id+'\');" class="margin-clear btn btn-sm btn-default-transparent">＋</a></div>';
									tmp += '				</div>';
									tmp += '			</div>';
									tmp += '	</div>';

					  				var div = $("<div>").attr({"class":"col-md-6 col-sm-6 masonry-grid-item"}).html(tmp);

					  				$("#productlist").append(div);

					  			}
					  			$(".popup-img-single").magnificPopup({
									type:"image",
									gallery: {
										enabled: false,
									}
								});
					  				  			
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

$('#silver-withdraw-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        

		        var token = getCookie("token");
		        
				var formData = $("#silver-withdraw-form :input").serializeArray();				
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
				  url: "/"+langu+"/api/silverWithdraw",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			alert(json.result.success_text);
				  			//location.href="<?=base_url($init['langu'].'/silver_withdraw_do')?>"				  							  			
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