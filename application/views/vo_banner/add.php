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

                      <div class="form-group">
                      <label for="background_url" class="col-lg-2">Background URL</label>
                        <div class="col-lg-10">

                        <div id="background_url_uploaded">
                          <?php 
                          if($mode == "Edit"){
                            if($results['background_url'] != ""){
                            ?>
                              <img class="img-responsive" src="<?=$results['background_url']?>" style="width:150px;">
                            <?php 
                            }
                          }
                          
                          ?>
                        </div>
                        
                        <input type="button" name="background_url" onclick="triggerUpload('background_url', 'background_url_uploaded', 1920, 1280)" class="btn btn-primary" value="Upload Picture" />
                        <input type="hidden" class="form-control" name="background_url" id="background_url" value="<?=($mode=='Edit')?$results['background_url']:''?>">
                        <span class="label label-danger">recommended resolution: <span id="avatar_size">1920*1280</span></span>

                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                      <label for="title_en" class="col-lg-2">Title (English)</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="title_en" id="title_en" value="<?=($mode=='Edit')?$results['title_en']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="slogan_en" class="col-lg-2">Slogan (English)</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="slogan_en" id="slogan_en" value="<?=($mode=='Edit')?$results['slogan_en']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="button" class="col-lg-2">Button Text (English)</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="button" id="button" value="<?=($mode=='Edit')?$results['button']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="button_link" class="col-lg-2">Button URL</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="button_link" id="button_link" value="<?=($mode=='Edit')?$results['button_link']:''?>">

                        </div>
                    </div>
                    

                    <div class="form-group">
                      <label for="priority" class="col-lg-2">Priority</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="priority" id="priority" value="<?=($mode=='Edit')?$results['priority']:''?>">

                        </div>
                    </div>

                    <div class="form-group">

                      <label class="col-lg-2">Display</label>

                        <div class="col-lg-10">
                          <div class="checkbox">
                                  <label>
                                    <input  type="checkbox" name="display" id="display" <?=($mode == 'Edit')?($results['display']==1)?'checked="checked"':'':''?>>
                                  </label>
                                </div>
                        </div>
                    </div> <!-- /.form-group -->


                    <!-- Your code here -->
                        
                    
                    
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