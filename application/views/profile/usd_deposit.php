<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['DEPOSIT USD']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p><?=$init['lang']['deposit_desc']?></p>

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
							
							<form id="usd-deposit-form" role="form">
								<div class="form-group">
									<label for="oamount"><?=$init['lang']['Amount']?></label>
									<input type="text" class="form-control" name="oamount" id="oamount" placeholder="<?=$init['lang']['Enter the amount']?>">
								</div>
								<div class="form-group">
									<label for="type_date"><?=$init['lang']['Deposit Date']?></label>
									<input type="text" class="form-control" id="type_date" name="type_date" placeholder="yyyy-mm-dd">
								</div>
								<div class="form-group">
									<label for="attachment"><?=$init['lang']['Attachment']?></label>
									<div id="attachment_uploaded">			                          
			                        </div>
			                        
			                        <input type="button" name="picUpload" onclick="triggerUpload('attachment_url', 'attachment_uploaded', 1920, 1280)" class="btn btn-primary" value="<?=$init['lang']['Upload Picture']?>" />
			                        <input type="hidden" class="form-control" name="attachment_url" id="attachment_url" value="">
									<p class="help-block"><?=$init['lang']['Attachment_desc']?></p>
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
    $( "#type_date" ).datepicker({
        beforeShow: function() {
        setTimeout(function(){
            $('.ui-datepicker').css('z-index', 99999999999999);
        }, 0);
        },
      
      changeMonth: true,
      numberOfMonths: 1,
      format: 'yyyy-mm-dd',
    });
});

$('#usd-deposit-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        

		        var token = getCookie("token");
		        
				var formData = $("#usd-deposit-form :input").serializeArray();				
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
				  url: "/"+langu+"/api/usdDepositApply",
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