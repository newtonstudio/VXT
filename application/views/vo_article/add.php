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
                      <label for="article_variable" class="col-lg-2">Title</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="article_variable" id="article_variable" value="<?=($mode=='Edit')?$results['article_variable']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="content_en" class="col-lg-2">Content (english)</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="content_en" id="content_en"><?=($mode=='Edit')?$results['content_en']:''?></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="content_zh" class="col-lg-2">Content (繁體中文)</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="content_zh" id="content_zh"><?=($mode=='Edit')?$results['content_zh']:''?></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="content_cn" class="col-lg-2">Content (簡體中文)</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="content_cn" id="content_cn"><?=($mode=='Edit')?$results['content_cn']:''?></textarea>

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