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
                      <label for="category" class="col-lg-2">Category</label>
                        <div class="col-lg-10">
                        <select name="category" class="form-control">
                          <option value="capacitive" <?=($mode=='Edit'&&$results['category']=="capacitive"?'selected="selected"':'')?>>Capacitive</option>
                          <option value="industrial" <?=($mode=='Edit'&&$results['category']=="industrial"?'selected="selected"':'')?>>Industrial</option>
                        </select>

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="main_title" class="col-lg-2">Main Title</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="main_title" id="main_title" value="<?=($mode=='Edit')?$results['main_title']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="main_brief" class="col-lg-2">Main Brief</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="main_brief" id="main_brief"><?=($mode=='Edit')?$results['main_brief']:''?></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="subtitle" class="col-lg-2">Sub Title</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?=($mode=='Edit')?$results['subtitle']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="sublist" class="col-lg-2">Sublist</label>
                        <div class="col-lg-10">
                          <div id="sublist">                            
                          </div>        
                          <a href="javascript:addOneList('');" class="btn btn-primary">+</a>                
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="button" class="col-lg-2">Button Name</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="button" id="button" value="<?=($mode=='Edit')?$results['button']:''?>">

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
                            
                          </div>
                          <a href="javascript:addPhoto();" class="btn btn-primary">+</a>                                            

                        </div>
                    </div>


                    
                          <h4>Details</h4>
                          <table class="table table-bordered">
                            <thead>
                              <tr><th>Product Size</th><th>Aspect Ratio</th><th>Active Area</th><th>Outline Dimensions</th><th>Cover Glass</th><th>VXT Part No.</th><th>Reference Drawing</th><th>Priority</th><th>X</th></tr>
                            </thead>
                            <tbody id="details">
                            </tbody>

                          </table>
                          <a href="javascript:addDetails();" class="btn btn-primary">+</a>                                            
                        
                        
                    
                    
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

var product_images = <?=$mode=="Edit"&&!empty($results['product_images'])?$results['product_images']:"[]"?>;
var sublist = <?=$mode=="Edit"&&!empty($results['sublist'])?$results['sublist']:"[]"?>;
var mode = '<?=$mode?>';
var details = <?=$mode=="Edit"&&!empty($details)?json_encode($details):"[]"?>;
var total_images_slot = 0;
var total_details_slot = 0;


function deleteImg(index){
  var tmp = [];
  for(var i=0; i<product_images.length;i++) {
    if(i!=index) {
      tmp.push(product_images[i]);
    }
  }
  product_images = tmp;
  displayImage();

}

function deleteDetails(index){
  $("#tr"+index).remove();
}

function displayImage(){
  $("#photo_uploaded").html("");
  for(var i=0; i<product_images.length;i++) {
    addOnePhoto(i, product_images[i].img);
  }
  total_images_slot = product_images.length;
}

function displayCDetails(){
  $("#details").html("");
  for(var i=0; i<details.length;i++) {

    var obj = {"index":i,"product_size": details[i].product_size, "aspect_ratio": details[i].aspect_ratio, "active_area": details[i].active_area, "outline_dimensions1": details[i].outline_dimensions[0],"outline_dimensions2": details[i].outline_dimensions[1], "outline_dimensions3": details[i].outline_dimensions[2], "cover_glass1":details[i].cover_glass[0], "cover_glass2":details[i].cover_glass[1], "cover_glass3":details[i].cover_glass[2], "vxt_partno1":details[i].vxt_partno[0], "vxt_partno2":details[i].vxt_partno[1], "vxt_partno3":details[i].vxt_partno[2], "priority":details[i].priority};

    addOneCDetail(obj);

  }
  total_details_slot = details.length;

}


function addOneCDetail(obj){

  var td = '<td><input type="text name="product_size[]" class="form-control" value="'+obj.product_size+'" /></td>';
  td += '<td><input type="text name="aspect_ratio[]" class="form-control" value="'+obj.aspect_ratio+'" /></td>';
  td += '<td><input type="text name="active_area[]" class="form-control" value="'+obj.active_area+'" /></td>';
  td += '<td><input type="text name="outline_dimension1[]" class="form-control" value="'+obj.outline_dimensions1+'" /><input type="text name="outline_dimension2[]" class="form-control" value="'+obj.outline_dimensions2+'" /><input type="text name="outline_dimension3[]" class="form-control" value="'+obj.outline_dimensions3+'" /></td>';
  td += '<td><input type="text name="cover_glass1[]" class="form-control" value="'+obj.cover_glass1+'" /><input type="text name="cover_glass2[]" class="form-control" value="'+obj.cover_glass2+'" /><input type="text name="cover_glass3[]" class="form-control" value="'+obj.cover_glass3+'" /></td>';
  td += '<td><input type="text name="vxt_partno1[]" class="form-control" value="'+obj.vxt_partno1+'" /><input type="text name="vxt_partno2[]" class="form-control" value="'+obj.vxt_partno2+'" /><input type="text name="vxt_partno3[]" class="form-control" value="'+obj.vxt_partno3+'" /></td>';
  td += '<td><a href="#"></a></td>';
  td += '<td><input type="text name="priority[]" class="form-control" value="'+obj.priority+'" /></td>';
  td += '<td><a href="javascript:deleteDetails('+obj.index+')">X</a></td>';

  var tr = $("<tr>").attr({id:"tr"+obj.index}).html(td);
  $("#details").append(tr);

}

function addOneList(content){
   var input = $("<input>").attr({"type":"text","class":"form-control","value":content,"name":"sublist[]"});
    //var div = $("<div>").append(input);
    $("#sublist").append(input);

}

function displayList(){
  $("#sublist").html("");
  for(var i=0; i<sublist.length;i++) {
   addOneList(sublist[i]);
  }
}

function addPhoto(){
  addOnePhoto(total_images_slot, '');
  total_images_slot++;
}


function addOnePhoto(i, img){

  var photo_uploaded = $("<div>").attr({"id":"photo_uploaded"+i});

  if(img != ""){
      var images = $("<img>").attr({"src":img,"class":"img-responsive"});
      var div = $("<div>").html('<a class="btn btn-primary" href="javascript:deleteImg('+i+');">X</a>').append(images);
      
      photo_uploaded.append(div);
  }


  var input = $("<input>").attr({"type":"button","name":"picUpload","onclick":"triggerUpload('photo"+i+"', 'photo_uploaded"+i+"', 1920, 574)","class":"btn btn-primary"}).val("Upload Photo");

  var hidden = $("<input>").attr({"type":"hidden","class":"form-control","id":"photo"+i,"name":"photo[]","value":img});
  var span = $("<span>").attr({"class":"label label-danger"}).html('recommended resolution: <span id="avatar_size">1920*574</span>');

  var container = $("<div>").attr({"id":"container"+i,"class":"well"}).append(photo_uploaded).append(input).append(hidden).append(span);

    
  $("#photo_uploaded").append(container);

}

function addDetails(){

  var obj = {"index":total_details_slot,"product_size": '', "aspect_ratio": '', "active_area": "", "outline_dimensions1": "","outline_dimensions2": "", "outline_dimensions3": "", "cover_glass1":"", "cover_glass2":"", "cover_glass3":"", "vxt_partno1":"", "vxt_partno2":"", "vxt_partno3":"", "priority":""};

    addOneCDetail(obj);
    total_details_slot++;

}

$(document).ready(function(){

  displayImage();
  displayList();
  displayCDetails();

});

</script>