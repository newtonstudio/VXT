<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-12 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
                    
                        <i class="glyphicon glyphicon-star"></i>
                        <h3><?=$mode=='Edit'?$init['lang']['Edit']:$init['lang']['Add New']?> <?=$display_name?></h3>
                   
				</div> <!-- /widget-header -->

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
				
				<div class="widget-content">
					<form action="<?=  base_url($init['langu'].'/vo/'.$pathname.'/Submit')?>" method="post" id="validation-form" role="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
                    <input type="hidden" name="id" id="id" value="<?=($mode=='Edit')?$results[$id_column]:''?>">
                    <fieldset>
                    
                    <!-- Your code here -->
                    
                    <div class="form-group">
                      <label for="bankname" class="col-lg-2">Bank Name</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="bankname" id="bankname" value="<?=($mode=='Edit')?$results['bankname']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="bankholder" class="col-lg-2">Bank Holder</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="bankholder" id="bankholder"><?=($mode=='Edit')?$results['bankholder']:''?></textarea>

                        </div>
                    </div>   

                    <div class="form-group">
                      <label for="bankcode" class="col-lg-2">Bank Code</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="bankcode" id="bankcode"><?=($mode=='Edit')?$results['bankcode']:''?></textarea>

                        </div>
                    </div>   

                    <div class="form-group">
                      <label for="bankswiftcode" class="col-lg-2">Bank Swift Code</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="bankswiftcode" id="bankswiftcode"><?=($mode=='Edit')?$results['bankswiftcode']:''?></textarea>

                        </div>
                    </div>    

                    <div class="form-group">
                      <label for="bankaccount" class="col-lg-2">Bank Account</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="bankaccount" id="bankaccount"><?=($mode=='Edit')?$results['bankaccount']:''?></textarea>

                        </div>
                    </div>                

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

                    <div class="form-group">
                      <label for="attachment" class="col-lg-2">Attachment</label>
                        <div class="col-lg-10">

                        <div id="attachment_uploaded">
                          <?php 
                          if($mode == "Edit"){
                            if($results['evidence_url'] != ""){
                            ?>
                              <img class="img-responsive" src="<?=$results['evidence_url']?>" style="width:150px;">
                            <?php 
                            }
                          }
                          
                          ?>
                        </div>
                        
                        <input type="button" name="picUpload" onclick="triggerUpload('evidence_url', 'attachment_uploaded', 480, 480)" class="btn btn-primary" value="Upload Picture" />
                        <input type="hidden" class="form-control" name="evidence_url" id="evidence_url" value="<?=($mode=='Edit')?$results['evidence_url']:''?>">
                        <span class="label label-danger">recommended resolution: <span id="avatar_size">1920*1280</span></span>

                        </div>
                    </div>


                    <div class="form-group">
                      <label for="validated" class="col-lg-2">Validated ?</label>
                        <div class="col-lg-10">
                        <input type="checkbox" name="validated" id="validated" value="1" <?=$mode=='Edit'&&$results['validated']?'checked="checked"':''?> />

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