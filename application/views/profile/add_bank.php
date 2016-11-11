<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['ADD BANK ACCOUNT']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p><?=$init['lang']['You must have at least one bank account to withdraw USD into your own account']?></p>

							<div style="display:none">
		                        <iframe id="uploadtarget" name="uploadtarget" height="0" width="0" frameborder="0" scrolling="yes"></iframe>
		                        <form id="myForm" method="post" enctype="multipart/form-data" action="<?=base_url($init['langu'].'/vo/upload_handler');?>" target="uploadtarget">
		                            <input type="file" id="files1" name="files1" onchange="submitImg()" />
		                            <input type="hidden" id="element" name="element" value=""/>
		                            <input type="hidden" id="picarea" name="picarea" value=""/>
		                            <input type="hidden" id="width" name="width" value=""/>
		                            <input type="hidden" id="height" name="height" value=""/>
		                        </form>
		                    </div>
							
							<form id="add-bank-form" role="form">
								<div class="form-group">
									<label for="bankname"><?=$init['lang']['Bank Name']?></label>
									<input type="text" class="form-control" name="bankname" id="bankname" placeholder="<?=$init['lang']['Bank Name']?>">
								</div>
								<div class="form-group">
									<label for="bankcode"><?=$init['lang']['Bank Code (if any)']?></label>
									<input type="text" class="form-control" id="bankcode" name="bankcode" placeholder="<?=$init['lang']['Bank Code (if any)']?>">
								</div>
								<div class="form-group">
									<label for="bankswiftcode"><?=$init['lang']['Bank Swift Code']?></label>
									<input type="text" class="form-control" id="bankswiftcode" name="bankswiftcode" placeholder="<?=$init['lang']['Bank Swift Code']?>">
								</div>
								<div class="form-group">
									<label for="bankholder"><?=$init['lang']['Bank Holder']?></label>
									<input type="text" class="form-control" id="bankholder" name="bankholder" placeholder="<?=$init['lang']['Bank Holder']?>">
								</div>
								<div class="form-group">
									<label for="bankaccount"><?=$init['lang']['Bank Account No']?></label>
									<input type="text" class="form-control" id="bankaccount" name="bankaccount" placeholder="<?=$init['lang']['Bank Account No']?>">
								</div>
								<div class="form-group">
									<label for="attachment"><?=$init['lang']['Attachment']?></label>
									<div id="attachment_uploaded">			                          
			                        </div>
			                        
			                        <input type="button" name="picUpload" onclick="triggerUpload('evidence_url', 'attachment_uploaded', 1920, 1280)" class="btn btn-primary" value="<?=$init['lang']['Upload Picture']?>" />
			                        <input type="hidden" class="form-control" name="evidence_url" id="evidence_url" value="">
									<p class="help-block"><?=$init['lang']['attach bank passbook']?></p>
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
											<li><a href="<?=base_url($init['langu'].'/bank_account')?>"><i class="fa fa-user"></i><?=$init['lang']['Bank Account']?></a></li>

											<li><a href="<?=base_url($init['langu'].'/add_bank')?>"><i class="fa fa-user"></i><?=ucfirst($init['lang']['ADD BANK ACCOUNT'])?></a></li>
											
											
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

$('#add-bank-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        

		        var token = getCookie("token");
		        
				var formData = $("#add-bank-form :input").serializeArray();				
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
				  url: "/"+langu+"/api/add_bank",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			alert(json.result.success_text);
				  			location.href="<?=base_url($init['langu'].'/bank_account')?>"				  							  			
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