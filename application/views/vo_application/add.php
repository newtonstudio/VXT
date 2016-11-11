<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-12 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
                    
                        <i class="glyphicon glyphicon-star"></i>
                        <h3><?=$mode=='Edit'?$init['lang']['Edit']:$init['lang']['Add New']?> <?=$display_name?></h3>
                   
				</div> <!-- /widget-header -->

        
				
				<div class="widget-content">
					<form action="<?=  base_url($init['langu'].'/vo/'.$pathname.'/Submit')?>" method="post" id="validation-form" role="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return submitcheck();">
                    <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
                    <input type="hidden" name="id" id="id" value="<?=($mode=='Edit')?$results[$id_column]:''?>">
                    <fieldset>
                    
                    
                    
                    <div class="form-group">
                      <label for="title" class="col-lg-2">User</label>
                        <div class="col-lg-10">
                        <select name="user_id" class="form-control selectpicker" data-live-search="true">
                          <?php
                          if(!empty($userlist)) {
                            foreach($userlist as $k=>$v) {
                             ?>
                             <option value="<?=$k?>" <?=$mode=='Edit'&&$k==$results['user_id']?'selected="selected"':''?>><?=$v?></option>
                             <?php 
                            }
                          }
                          ?>
                        </select>

                        </div>
                    </div>

                    <!-- Your code here -->
                    <div class="form-group">
                      <label for="type" class="col-lg-2">Type</label>
                        <div class="col-lg-10">
                        <select name="type" class="form-control">
                          <?php
                          if(!empty($typelist)) {
                            foreach($typelist as $k=>$v) {
                             ?>
                             <option value="<?=$k?>" <?=$mode=='Edit'&&$k==$results['type']?'selected="selected"':''?>><?=$v?></option>
                             <?php 
                            }
                          }
                          ?>
                        </select>

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="type_date" class="col-lg-2">Applied Date</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="type_date" id="type_date" value="<?=($mode=='Edit')?$results['type_date']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="oamount" class="col-lg-2">Applied Amount</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="oamount" id="oamount" value="<?=($mode=='Edit')?$results['oamount']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="actual_amount" class="col-lg-2">Actual Amount</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="actual_amount" id="actual_amount" value="<?=($mode=='Edit')?$results['actual_amount']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="remarks" class="col-lg-2">Remarks</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="remarks" id="remarks" value="<?=($mode=='Edit')?$results['remarks']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="approved" class="col-lg-2">Approved?</label>
                        <div class="col-lg-10">
                        <input type="checkbox" name="approved" id="approved" value="1" <?=$mode=='Edit'&&$results['approved']?'checked="checked"':''?> />

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="direct" class="col-lg-2">Check if directly deposit into / withdraw from user account</label>
                        <div class="col-lg-10">
                        <input type="checkbox" name="direct" id="direct" value="1" />

                        </div>
                    </div>


                        
                    
                    
                    <div class="form-group">
                        <div class="col-lg-2"></div>

                        <div class="col-lg-10">
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> <?=$init['lang']['Save']?></button>
                        </div>
                    </div>
                    
                  </fieldset>
                </form>
                    
                    
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->	
		</div>							
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->   
<script>
    
var mode = '<?=$mode?>';
var toApprove = <?=isset($toApprove)?"1":"0"?>;

$(function () {    
    $( "#type_date" ).datepicker({
        beforeShow: function() {
        setTimeout(function(){
            $('.ui-datepicker').css('z-index', 99999999999999);
        }, 0);
        },
      
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: 'yy-mm-dd',
    });

    if(toApprove) {
      $("input").attr({"readonly":"readonly"});
      $("select").attr({"readonly":"readonly"});
      $("#actual_amount").prop("readonly", false);
    }

});


function submitcheck() {

  if(!$("#approved").is(":checked") && $("#direct").is(":checked")) {
    alert("You must approved before directly deposit into or withdraw from user account");
    return false;
  }

  var actual_amount = $("#actual_amount").val();
  if(actual_amount == "0.00" || actual_amount == "") {
    alert("Actual amount cannot be zero, please check your bank account to ensure the actual amount");
    $("#actual_amount").focus();
    return false;
  }

}

</script>