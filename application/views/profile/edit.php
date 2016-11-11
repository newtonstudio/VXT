<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">			
				<div class="container">			
				<!-- breadcrumb start -->
				<!-- ================ -->
				<div class="breadcrumb-container margin4">
					<div class="container">
						<ol class="breadcrumb">
							<li><a class="link-dark" href="<?=base_url()?>"><i class="fa fa-home pr-10"></i></a></li>
							<li class="active"><a class="link-dark" href="#"><?=$init['lang']['User Info']?></a></li>
						</ol>
					</div>
				</div>
				<!-- breadcrumb end -->	
					<div class="row">
						
					
						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">
							<!-- pills start -->
							<form id="userInfo-form" role="form" autocomplete="off" method="post">
							<!-- ================ -->
							<!-- Nav tabs -->
							<ul class="nav nav-pills" role="tablist">
								<li class="active"><a href="#pill-1" role="tab" data-toggle="tab" title="profile"> <?=$init['lang']['User Info']?></a></li>
								<li><a href="#pill-2" role="tab" data-toggle="tab" title="contact"></i> <?=$init['lang']['Contact Info']?></a></li>								
							</ul>
							<!-- Tab panes -->							
							<div class="tab-content clear-style">
								<div class="tab-pane active" id="pill-1">
									
										<div class="form-group">
											<label for="name"><?=$init['lang']['Name']?><small class="text-default">*</small></label>
											<input type="text" class="form-control" id="name" name="name" placeholder="<?=$init['lang']['Name']?>" value="<?=$userdata['name']?>">
										</div>										
										<div class="form-group">
											<label for="exampleInputEmail1">Email<small class="text-default">*</small></label>
											<input type="email" class="form-control" id="email" name="email" placeholder="signorina@gmail.com" value="<?=$userdata['email']?>" >
										</div>
										
										<hr/>										

										<div class="form-group">
											<label for="exampleInputPassword1"><?=$init['lang']['Password']?> </label>
											<input type="password" class="form-control" id="password" name="password" placeholder="<?=$init['lang']['Password']?> <?=$init['lang']['Leave Blank']?>" value="" />
										</div>

										<div class="form-group">
											<label for="<?=$init['lang']['Confirm password']?>"><?=$init['lang']['Confirm password']?> </label>
											<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="<?=$init['lang']['Confirm password']?> <?=$init['lang']['Leave Blank']?>" value="" />
										</div>
										
														 
								</div>
								<div class="tab-pane" id="pill-2">
											
											<div class="form-group">
												<label for="mobile" class="col-md-2 control-label"><?=$init['lang']['Mobile']?><small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="mobile" name="mobile" placeholder="<?=$init['lang']['Mobile']?>" value="<?=$userdata['mobile']?>">
												</div>
											</div>
											<div class="form-group">
												<label for="fax" class="col-md-2 control-label"><?=$init['lang']['Fax']?></label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="fax" name="fax" placeholder="<?=ucfirst($init['lang']['Fax'])?>" value="<?=$userdata['fax']?>">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-2 control-label"><?=$init['lang']['Country']?><small class="text-default">*</small></label>
												<div class="col-md-10">
													<select class="form-control" name="country">
														<?php
														if(!empty($countries)){
															foreach ($countries as $key => $value) {
														?>
																<option <?=$userdata['country']==$key?"selected='selected'":""?> value="<?=$key?>"><?=$value?></option>
														<?php
															}
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="city" class="col-md-2 control-label"><?=$init['lang']['City']?><small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="city" name="city" placeholder="<?=ucfirst($init['lang']['City'])?>" value="<?=$userdata['city']?>">
												</div>
											</div>
											<div class="form-group">
												<label for="zip_code" class="col-md-2 control-label"><?=$init['lang']['Zip Code']?><small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="<?=ucfirst($init['lang']['Zip Code'])?>" value="<?=$userdata['zip_code']?>">
												</div>
											</div>

											<div class="form-group">
												<label for="address" class="col-md-2 control-label"><?=$init['lang']['Address']?><small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="address" name="address" placeholder="<?=ucfirst($init['lang']['Address'])?>" value="<?=$userdata['address']?>">
													
												</div>
											</div>		
									
								</div>	

								<button type="submit" name="submit_contact" class="btn btn-default"><?=$init['lang']['submit']?></button>		

							</div>
							<!-- pills end -->

							</form>		



						</div>
						<!-- main end -->


					</div>
				</div>
			</section>
			<!-- main-container end -->			
			<script>
			$('#userInfo-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting	
				var token = getCookie("token");
		        
				var formData = $("#userInfo-form :input").serializeArray();				
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
				  url: "/"+langu+"/api/update_profile",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			alert(json.result.success_text);
				  			location.href="<?=base_url($init['langu'].'/profile')?>"				  							  			
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
		
			

            <hr>