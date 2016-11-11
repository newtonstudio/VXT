<div id="page-start"></div>

			<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url($init['langu'])?>"><?=$init['lang']['home']?></a></li>
						<li class="active"><?=$init['lang']['forgetpwd']?></li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->		
			
			<!-- main-container start -->
			<!-- ================ -->
			<div class="main-container dark-translucent-bg" style="background-image:url('<?=base_url('assets/renodo')?>/images/fullscreen-bg.jpg');">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
						<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
							<div class="form-block center-block p-30 light-gray-bg border-clear">

								
								<h2 class="title"><?=$init['lang']['forgetpwd']?></h2>
								<p><?=$init['lang']['forgetpwd_desc']?></p>

								<form id="forget-form" class="form-horizontal" role="form" method="post">
									<div class="form-group has-feedback">
										<label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
											<i class="fa fa-envelope form-control-feedback"></i>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<button type="submit" class="btn btn-group btn-default btn-animated"><span id="fgt_btn"><?=$init['lang']['submit']?></span> <i class="fa fa-check"></i></button>
										</div>
									</div>
								</form>
							


							</div>
						</div>
						<!-- main end -->
					</div>
				</div>
			</div>
			<!-- main-container end -->

			<script>
			$('#forget-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		  

		        $('input[type="submit"]').prop('disabled', true);
				$('#fgt_btn').html("Loading...");      
		        
				var formData = $("#forget-form :input").serializeArray();				
				var obj = {};
				if(formData.length > 0) {
					for(var i=0; i < formData.length; i++) {
						//console.log(formData);						
						obj[formData[i].name] = formData[i].value;						
					}
				}				

				$.ajax({
				  type: "POST",
				  url: "/"+langu+"/api/forgot_pass",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {				  			
				  			alert(json.result);		  		
				  		} else {
				  			alert(json.result);
				  		}

				  		$('input[type="submit"]').prop('disabled', false);
						$('#fgt_btn').html("Submit");      

				  },
				  dataType: "json",
				  contentType : "application/json"
				});


		    });
			</script>