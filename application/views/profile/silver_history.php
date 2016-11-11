<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=strtoupper($init['lang']['Silver'])?> <?=$init['lang']['Account History']?> (<span id="silver_account_no"></span>) </h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							

							<table class="table table-bordered">
								<thead>
									<tr><th><?=$init['lang']['Date']?></th><th><?=$init['lang']['Remarks']?></th><th>+</th><th>-</th><th><?=$init['lang']['Balance']?></th></tr>
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


	$.getJSON("<?=base_url($init['langu'].'/api/getSilverHistory')?>/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#result").html('');

        	$("#silver_account_no").html(result.result.silver_account_no);

        	var balance = 0;

        	if(result.result.history.length > 0) {
        		for(var i=0; i < result.result.history.length; i++) {

        			balance += result.result.history[i].oz;

        			var content = '';
        			content += "<td>"+result.result.history[i].created_date+"</td>";
        			content += "<td>"+result.result.history[i].action+" "+result.result.history[i].remarks+"</td>";
        			content += "<td><div align='right'>"+(result.result.history[i].oz>0?result.result.history[i].oz:'')+"</div></td>";
        			content += "<td><div align='right'>"+(result.result.history[i].oz<0?result.result.history[i].oz:'')+"</div></td>";
        			content += "<td><div align='right'>"+balance.toFixed(2)+"</div></td>";

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