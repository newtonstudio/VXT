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

          <div style="display:none">
                        <iframe id="uploadtarget" name="uploadtarget" height="0" width="0" frameborder="0" scrolling="yes"></iframe>
                        <form id="myForm" method="post" enctype="multipart/form-data" action="<?=base_url($init['langu'].'/vo/upload_handler');?>" target="uploadtarget">
                            <input type="file" id="files1" name="files1" onchange="submitImg()" />
                            <input type="hidden" id="element" name="element" value=""/>
                            <input type="hidden" id="picarea" name="picarea" value=""/>
                            <input type="hidden" id="width" name="width" value=""/>
                            <input type="hidden" id="height" name="height" value=""/>
                        </form>
                    </div>

					<form action="<?=  base_url($init['langu'].'/vo/'.$pathname.'/Submit')?>" method="post" id="validation-form" role="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
                    <input type="hidden" name="id" id="id" value="<?=($mode=='Edit')?$results[$id_column]:''?>">
                    <fieldset>
                    
                    <!-- Your code here -->
                    
                    <div class="form-group">
                      <label for="title" class="col-lg-2">Title</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="title" id="title" value="<?=($mode=='Edit')?$results['title']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="serial" class="col-lg-2">Serial</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="serial" id="serial" value="<?=($mode=='Edit')?$results['serial']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="oz" class="col-lg-2">OZ</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="oz" id="oz" value="<?=($mode=='Edit')?$results['oz']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="oz" class="col-lg-2">Transaction fee per oz (USD)</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="feePerOz" id="feePerOz" value="<?=($mode=='Edit')?$results['feePerOz']:''?>">

                        </div>
                    </div>


                    

                     <div class="form-group">
                      <label for="display" class="col-lg-2">Show / Hide</label>
                        <div class="col-lg-10">
                        <input type="checkbox" name="display" id="display" value="1" <?=$mode=='Edit'&&$results['display']?'checked="checked"':''?> />

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="photo" class="col-lg-2">Photo</label>
                        <div class="col-lg-10">

                        <div id="photo_uploaded">
                          <?php 
                          if($mode == "Edit"){
                            if($results['avatar'] != ""){
                            ?>
                              <img class="img-responsive" src="<?=$results['photo']?>" style="width:150px;">
                            <?php 
                            }
                          }
                          
                          ?>
                        </div>
                        
                        <input type="button" name="picUpload" onclick="triggerUpload('photo', 'photo_uploaded', 520, 520)" class="btn btn-primary" value="Upload Photo" />
                        <input type="hidden" class="form-control" name="photo" id="photo" value="<?=($mode=='Edit')?$results['photo']:''?>">
                        <span class="label label-danger">recommended resolution: <span id="avatar_size">520x520</span></span>

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