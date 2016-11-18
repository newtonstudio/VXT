
var custom = {};
if(localStorage.custom != null) {
	custom = JSON.parse(localStorage.custom);
}


function updateDisplay() {
	$(".opt").each(function(e){

		if(typeof custom[$(this).data("key")] != 'undefined') {
			if(custom[$(this).data("key")] == $(this).data("value")) {
				$(this).addClass("active");
			} else {
				$(this).removeClass("active");
			}
		}

	});
}


$(document).ready(function(){	

	updateDisplay();

	$( "#tabs" ).tabs();


	$(".opt").click(function(){
		var key = $(this).data("key");
		var value = $(this).data("value");
		custom[key] = value;
		localStorage.custom = JSON.stringify(custom);
		updateDisplay();

	});


    	if($("#contact-form").length>0) {
			$('#contact-form').on('submit', function(e) { //use on if jQuery 1.7+
		        e.preventDefault();  //prevent form from submitting		        
		        
		        $(".btn-u").prop("disabled", true);

				var formData = $("#contact-form :input").serializeArray();				
				var obj = {};
				if(formData.length > 0) {
					for(var i=0; i < formData.length; i++) {
						//console.log(formData);						
						obj[formData[i].name] = formData[i].value;						
					}
				}			
				$("#loading").show();	

				$.ajax({
				  type: "POST",
				  url: "/en/api/contact",
				  data: JSON.stringify(obj),
				  success: function(json){
				  		if(json.status == "OK") {
				  			alert(json.result.success_text);
				  		} else {
				  			alert(json.result);
				  			$(".btn-u").prop("disabled", false);
				  		}
				  		$("#loading").hide();	

				  },
				  dataType: "json",
				  contentType : "application/json"
				});


		    });
		};

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
				  			location.href="/"+langu+"/profile";			  		
				  			//alert('test');
				  		} else {
				  			alert(json.result);
				  		}

				  },
				  dataType: "json",
				  contentType : "application/json"
				});


		    });
		};


       
          


    });