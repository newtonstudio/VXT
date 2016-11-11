<link href="<?=base_url('assets/css/pages/signin.css')?>" rel="stylesheet" type="text/css">

<div class="account-container stacked" style="margin-bottom:120px;">
	
	<div class="content clearfix">
		
		<form id="login-form" method="post">
		
			<h1>Log In</h1>		
			
			<div class="login-fields">				
				
				<div class="field">
					<label for="email">E-mail:</label>
					<input type="text" id="email" name="email" value="" placeholder="Please input your Email" class="form-control input-lg username-field" onblur="removeBlank();" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Please input your password" class="form-control input-lg password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Remember Me</label>
				</span>
									
				<button class="login-action btn btn-primary">Login</button>
                                
			</div> <!-- .actions -->
            			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<script>
function removeBlank(){
	document.getElementById("email").value = document.getElementById("email").value.replace(" ", "");
}


if($("#login-form").length>0) {
			$('#login-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        
		        
				var formData = $("#login-form :input").serializeArray();				
				var obj = {};
				if(formData.length > 0) {
					for(var i=0; i < formData.length; i++) {
						//console.log(formData);						
						obj[formData[i].name] = formData[i].value;						
					}
				}				

				$.ajax({
				  type: "POST",
				  url: "/"+langu+"/api/login",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			setCookie("token", json.result.token, 30);	
				  			location.href="/en/vo/profile";			  		
				  		} else {
				  			alert(json.result);
				  		}

				  },
				  dataType: "json",
				  contentType : "application/json"
				});


		    });
		};
</script>