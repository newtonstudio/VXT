<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$init['lang']['MY BANK ACCOUNT LIST']?></h1>
							<div class="separator-2"></div>
							<!-- Forms start -->
							<!-- ============================================================================== -->							
							<br>
							<p><?=$init['lang']['You must have at least one bank account to withdraw USD into your own account']?></p>
							

							<table class="table table-bordered">
								<thead>
									<tr><th><?=$init['lang']['Created Date']?></th><th><?=$init['lang']['Bank Name']?></th><th><?=$init['lang']['Bank Holder']?></th><th><?=$init['lang']['Bank Account No']?></th><th><?=$init['lang']['Bank Swift Code']?></th><th><?=$init['lang']['Status']?></th></tr>
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

$(document).ready(function(){

	var token = getCookie("token");


	$.getJSON("<?=base_url($init['langu'].'/api/getUserAccount')?>/"+token, function(result){
        if(result.status == "OK") {
        	
        	$("#result").html('');

        	if(result.result.accountlist.length > 0) {
        		for(var i=0; i < result.result.accountlist.length; i++) {

        			

        			var content = '';
        			content += "<td>"+result.result.accountlist[i].created_date+"</td>";
        			content += "<td>"+result.result.accountlist[i].bankname+"</td>";
        			content += "<td><div align='right'>"+(result.result.accountlist[i].bankholder)+"</div></td>";
        			content += "<td><div align='right'>"+(result.result.accountlist[i].bankaccount)+"</div></td>";
        			content += "<td><div align='right'>"+(result.result.accountlist[i].bankswiftcode)+"</div></td>";
        			content += "<td><div align='right'>"+(result.result.accountlist[i].validated=="1"?'<?=$init['lang']['Approved']?>':'<?=$init['lang']['Pending Approval']?>')+"</div></td>";

        			var tr = $("<tr>").html(content);
        			$("#result").append(tr);

        		}
        	} else {

        		var html = '<?=$init['lang']['Currently no bank account list, you must add one before withdraw any amount from your usd account']?>, <a href="<?=base_url($init['langu'].'/add_bank')?>"><?=$init['lang']['click here']?></a> <?=$init['lang']['to add one']?>.';
        		var tr = $("<tr>").html("<td colspan='5'>"+html+"</td>");
        		$("#result").append(tr);

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