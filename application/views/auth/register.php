<div id="page-start"></div>

			<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url($init['langu'])?>"><?=$init['lang']['home']?></a></li>
						<li class="active"><?=$init['lang']['signup']?></li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->		
			
			<!-- main-container start -->
			<!-- ================ -->
			<div class="main-container dark-translucent-bg" style="background-image:url('<?=base_url()?>assets/renodo/images/fullscreen-bg.jpg');">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
						<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
							<div class="form-block center-block p-30 light-gray-bg border-clear">
								<h2 class="title"><?=$init['lang']['signup']?></h2>
								<form id="signup-form" class="form-horizontal" role="form" action="<?=base_url($init['langu'].'/register_success')?>" method="post" >
									<input type="hidden" name="default_lang" id="default_lang" value="<?=$init['langu']?>" />
									<div class="form-group has-feedback">
										<label for="name" class="col-sm-3 control-label"><?=$init['lang']['Name']?> <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="name" name="name" placeholder="<?=$init['lang']['Name']?>">
											<i class="fa form-control-feedback"></i>
										</div>
									</div>									
									<div class="form-group has-feedback">
										<label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="email" class="form-control" name="email" placeholder="Email">
											
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="mobile" class="col-sm-3 control-label"><?=$init['lang']['Mobile']?> <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="mobile" placeholder="<?=$init['lang']['Mobile']?>">
											
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="gender" class="col-sm-3 control-label"><?=$init['lang']['Gender']?></label>
										<div class="col-sm-8">
											<input type="radio" name="gender" value="M"> <?=$init['lang']['Male']?>
											<input type="radio" name="gender" value="F"> <?=$init['lang']['Female']?>
											
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="user_password" class="col-sm-3 control-label"><?=$init['lang']['Password']?> <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="user_password" id="user_password" placeholder="<?=$init['lang']['Password']?>">
											
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="confirmpassword" class="col-sm-3 control-label"><?=$init['lang']['Confirm password']?> <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="confirm_password" placeholder="<?=$init['lang']['Confirm password']?>">
											
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="agreement"> <?=$init['lang']['Accept our']?>
													<a class="collapsed" data-toggle="modal" data-target="#privacyModal" aria-expanded="false" aria-controls="collapseContent"><?=$init['lang']['privacy policy and customer agreement']?>
													</a>
												</label>
											</div>
										</div>
									</div>

									
									
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<button type="submit" class="btn btn-group btn-default btn-animated"><span id="signup_btn"><?=$init['lang']['signup']?></span> <i class="fa fa-check"></i></button>
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

			$('#signup-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        
		        
				var formData = $("#signup-form :input").serializeArray();
				console.log(formData, formData.length);
				var obj = {};
				if(formData.length > 0) {
					for(var i=0; i < formData.length; i++) {
						//console.log(formData);						
						obj[formData[i].name] = formData[i].value;						
					}
				}				

				$('input[type="submit"]').prop('disabled', true);
				$('#signup_btn').html("Loading...");

				$.ajax({
				  type: "POST",
				  url: "<?=base_url($init['langu'].'/api/register')?>",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			location.href="<?=base_url($init['langu'])?>/register_success";
				  		} else {
				  			alert(json.result);
				  			$('input[type="submit"]').prop('disabled', false);
				  			$('#signup_btn').html("<?=$init['lang']['signup']?>");
				  		}
				  },
				  dataType: "json",
				  contentType : "application/json"
				});


		    });

			</script>


			


