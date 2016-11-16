/* Write here your custom javascript codes */

    $(document).ready(function(){

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


    });

