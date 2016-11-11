<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['USD APPLICATION HISTORY']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p><?=$init['lang']['USD Applied History desc']?></p>

							<table class="table table-bordered">
								<thead>
									<tr><th><?=$init['lang']['Applied Date']?></th><th><?=$init['lang']['Action']?></th><th><?=$init['lang']['Amount']?></th><th><?=$init['lang']['Attachment']?></th><th><?=$init['lang']['Status']?></th></tr>
								</thead>
								<tbody id="result">

								</tbody>
							</table>

							

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

$(document).ready(function(){

	var token = getCookie("token");


	$.getJSON("<?=base_url($init['langu'].'/api/getusdDepositApply')?>/"+token, function(result){
        if(result.status == "OK") {
        	console.log("getusdDepositApply");

        	$("#result").html('');

        	if(result.result.application.length > 0) {
        		for(var i=0; i < result.result.application.length; i++) {

        			var content = '';
        			content += "<td>"+result.result.application[i].created_date+"</td>";
        			content += "<td>"+result.result.application[i].type+"</td>";
        			content += "<td>"+result.result.application[i].oamount+"</td>";
        			content += "<td>"+((result.result.application[i].attachment_url)?'<a href="'+result.result.application[i].attachment_url+'" target="_blank"><?=$init['lang']['Attachment']?></a>':'')+"</td>";
        			content += "<td>"+((result.result.application[i].approved=='1')?'<?=$init['lang']['Approved']?>':'<?=$init['lang']['Pending Approval']?>')+"</td>";

        			var tr = $("<tr>").html(content);
        			$("#result").append(tr);

        		}
        	}

        } else {
        	alert(result.result);
        	if(json.error_code == "401") {
					logout();
			}
        }
    });

});

</script>