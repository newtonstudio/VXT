<!-- section start -->
			<!-- ================ -->
			<section class="pv-30 light-gray-bg clearfix">
				<div class="container">
					<h3 class="title logo-font text-center text-default"><?=$init['lang']['profile']?></h3>
					<div class="separator"></div>
					<p class="text-center"><?=$init['lang']['Every member has at least two basic accounts in SilverPay']?></p>
					<br>
					<div class="row grid-space-10">
						<div class="col-sm-4 col-md-4">
							<div class="pv-30 ph-20 default-bg feature-box bordered text-center">
								<span class="icon dark-bg circle"><i class="fa fa-money"></i></span>
								<h3><?=$init['lang']['USD']?></h3>
								<div class="separator clearfix"></div>
								<p><?=$init['lang']['Account No.']?>: <?=$userdata['usd_account_no']?></p>
								<p><?=$init['lang']['Balance']?>: USD <span class="label label-danger" id="usd_account_balance"></span></p>
								<div class="col-xs-6"><a href="<?=base_url($init['langu'].'/usd_deposit')?>" class="btn btn-default btn-animated"><?=$init['lang']['Deposit']?> <i class="fa fa-angle-double-up"></i></a></div>
								<div class="col-xs-6"><a href="<?=base_url($init['langu'].'/usd_withdraw')?>" class="btn btn-default btn-animated"><?=$init['lang']['Withdraw']?> <i class="fa fa-angle-double-down"></i></a></div>
								<a href="<?=base_url($init['langu'].'/usd_history')?>" class="btn btn-default btn-animated"><?=$init['lang']['Account History']?> <i class="fa fa-history"></i></a>
							</div>
						</div>
						<div class="col-sm-2 col-md-2">
							<a href="<?=base_url($init['langu'].'/usdtosilver')?>" class="btn btn-default btn-animated btn-block"> <?=$init['lang']['USD to Silver']?> <i class="fa fa-angle-double-right"></i></a>
							<a href="<?=base_url($init['langu'].'/silvertousd')?>" class="btn btn-default btn-animated btn-block"> <?=$init['lang']['Silver to USD']?> <i class="fa fa-angle-double-left"></i></a>
							
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="pv-30 ph-20 default-bg feature-box bordered text-center">
								<span class="icon dark-bg circle"><i class="fa fa-dot-circle-o"></i></span>
								<h3><?=$init['lang']['Silver']?></h3>
								<div class="separator clearfix"></div>
								<p><?=$init['lang']['Account No.']?>: <?=$userdata['silver_account_no']?></p>
								<p><?=$init['lang']['Balance']?>: <span class="label label-success" id="silver_account_balance"></span> oz</p>
								<div class="col-xs-6"><a href="<?=base_url($init['langu'].'/silver_deposit')?>" class="btn btn-default btn-animated"><?=$init['lang']['Deposit']?> <i class="fa fa-angle-double-up"></i></a></div>
								<div class="col-xs-6"><a href="<?=base_url($init['langu'].'/silver_withdraw')?>" class="btn btn-default btn-animated"><?=$init['lang']['Withdraw']?> <i class="fa fa-angle-double-down"></i></a></div>
								<a href="<?=base_url($init['langu'].'/silver_history')?>" class="btn btn-default btn-animated"><?=$init['lang']['Account History']?> <i class="fa fa-history"></i></a>
								
							</div>
						</div>
						<div class="col-sm-2 col-md-2">
							<a href="<?=base_url($init['langu'].'/silver_tomarket')?>" class="btn btn-default btn-animated btn-block"> <?=$init['lang']['to Market']?> <i class="fa fa-angle-double-right"></i></a>
							<a href="<?=base_url($init['langu'].'/silver_topay')?>" class="btn btn-default btn-animated btn-block"> <?=$init['lang']['Pay']?> <i class="fa fa-angle-double-right"></i></a>
							
							
						</div>
					</div>
				</div>
			</section>
			<!-- section end -->

			<script>
			$(document).ready(function(){

				var token = getCookie("token");

				$.ajax({
					  type: "GET",
					  url: "/"+langu+"/api/getUserdata/"+token,
					  data: "",
					  success: function(json){
					  		if(json.status == "OK") {
					  			$("#usd_account_balance").html(json.result.usd_balance);
					  			$("#silver_account_balance").html(json.result.silver_balance);
					  		} else {
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