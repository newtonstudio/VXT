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
					<form action="<?=  base_url($init['langu'].'/vo/'.$pathname.'/Submit')?>" method="post" id="validation-form" role="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
                    <input type="hidden" name="id" id="id" value="<?=($mode=='Edit')?$results[$id_column]:''?>">
                    <fieldset>
                    
                    <!-- Your code here -->
                    
                    <div class="form-group">
                      <label for="name" class="col-lg-2">Name</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" id="name" value="<?=($mode=='Edit')?$results['name']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="company" class="col-lg-2">Company Name</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="company" id="company" value="<?=($mode=='Edit')?$results['company']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="country" class="col-lg-2">Country</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="country" id="country" value="<?=($mode=='Edit')?$results['country']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="email" class="col-lg-2">Email</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="email" id="email" value="<?=($mode=='Edit')?$results['email']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="message" class="col-lg-2">Message</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="message" id="message"><?=($mode=='Edit')?$results['message']:''?></textarea>

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

</script>