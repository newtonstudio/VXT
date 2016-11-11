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
					<form action="<?=  base_url($init['langu'].'/vo/'.$pathname.'/Submit')?>" method="post" id="validation-form" role="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return do_validate()">
                    <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
                    <input type="hidden" name="id" id="id" value="<?=($mode=='Edit')?$results[$id_column]:''?>">
                    <fieldset>
                    
                    <!-- Your code here -->
                    
                    <div class="form-group">
                      <label for="DO_no" class="col-lg-2">DO No.</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="DO_no" id="DO_no" value="<?=($mode=='Edit')?$results['DO_no']:''?>" readonly="readonly" placeholder="Automaticall generated">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="title" class="col-lg-2">User</label>
                        <div class="col-lg-10">
                        <select id="user_id" name="user_id" class="form-control selectpicker" data-live-search="true" onchange="getUserData(this.value)">
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

                        <div>
                          USD Balance:
                          <input type="text" name="usd_balance" id="usd_balance" value="" class="form-control" readonly="readonly" />
                        </div>

                        <div>
                          Silver Balance:
                          <input type="text" name="silver_balance" id="silver_balance" value="" class="form-control" readonly="readonly" />
                        </div>

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-lg-2">Recipient Name</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" id="name" value="<?=($mode=='Edit')?$results['name']:''?>">

                        </div>
                    </div>

                     <div class="form-group">
                      <label for="tel" class="col-lg-2">Recipient Tel</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="tel" id="tel" value="<?=($mode=='Edit')?$results['tel']:''?>">

                        </div>
                    </div>


                    <div class="form-group">
                      <label for="country" class="col-lg-2">Recipient Country</label>
                        <div class="col-lg-10">

                          <select class="form-control" id="country" name="country">
                            <?php
                            if(!empty($countries)){
                              foreach ($countries as $key => $value) {
                            ?>
                                <option value="<?=$key?>" <?=$mode=='Edit'&&$results['country']==$key?'selected="selected"':''?>><?=$value?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>                        

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="city" class="col-lg-2">Recipient City</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="city" id="city" value="<?=($mode=='Edit')?$results['city']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="address" class="col-lg-2">Recipient Address</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="address" id="address" value="<?=($mode=='Edit')?$results['address']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="zipcode" class="col-lg-2">Recipient Zip Code</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?=($mode=='Edit')?$results['zipcode']:''?>">

                        </div>
                    </div>

                    

                     <div class="form-group">
                      <label for="is_confirmed" class="col-lg-2">Is Confirmed</label>
                        <div class="col-lg-10">
                        <input type="checkbox" name="is_confirmed" id="is_confirmed" value="1" <?=$mode=='Edit'&&$results['is_confirmed']?'checked="checked"':''?> />

                        </div>
                    </div>

                     <div class="form-group">
                      <label for="is_done" class="col-lg-2">Is Done</label>
                        <div class="col-lg-10">
                        <input type="checkbox" name="is_done" id="is_done" value="1" <?=$mode=='Edit'&&$results['is_done']?'checked="checked"':''?> />

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_shipped" class="col-lg-2">Is Shipped</label>
                        <div class="col-lg-10">
                        <input type="checkbox" name="is_shipped" id="is_shipped" value="1" <?=$mode=='Edit'&&$results['is_shipped']?'checked="checked"':''?> />

                        </div>
                    </div>

                    <div id="productlist"></div>

                    <table class="table table-bordered table-colored">
                  <thead>
                    <tr><th>Product Title</th><th>oz</th><th>Qty</th><th>Total oz</th></tr>
                  </thead>  
                  <tbody id="cartlist">
                  </tbody>
                  <tfoot>
                    <tr><th></th><th></th><th align="right">Total withdrawal (oz)</th><th ><div align="right" id="total_oz"></div></th></tr>
                    <tr><th></th><th></th><th align="right">Shipping Fee (USD)</th><th ><div align="right" id="shipping_fee"></div></th></tr>
                    <tr><th></th><th></th><th align="right">Transaction Fee (USD)</th><th><div id="transaction_fee" align="right"></div></th></tr>
                    <tr><th></th><th></th><th align="right">Tax Fee (USD)</th><th><div id="tax_fee" align="right"></div></th></tr>
                    <tr><th></th><th></th><th align="right">Total Fee (USD)</th><th><div id="total_fee" align="right"></div></th></tr>
                  </tfoot>
                </table>

                    <div class="form-group">
                      <label for="total_oz" class="col-lg-2">Total oz</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="current_total_oz" id="current_total_oz" value="<?=($mode=='Edit')?$results['total_oz']:''?>" readonly="readonly">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="transaction_fee" class="col-lg-2">Transaction fee</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="current_transaction_fee" id="current_transaction_fee" value="<?=($mode=='Edit')?$results['transaction_fee']:''?>" readonly="readonly">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="tax_fee" class="col-lg-2">Tax fee</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="current_tax_fee" id="current_tax_fee" value="<?=($mode=='Edit')?$results['tax_fee']:''?>" readonly="readonly">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="shipping_fee" class="col-lg-2">Shipping fee</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="current_shipping_fee" id="current_shipping_fee" value="<?=($mode=='Edit')?$results['shipping_fee']:''?>" readonly="readonly">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="total_fee" class="col-lg-2">Total fee</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="current_total_fee" id="current_total_fee" value="<?=($mode=='Edit')?$results['total_fee']:''?>" readonly="readonly">

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




var cart = [];
var productlist = [];
var total_oz = 0;
var transaction_fee = 0;
var shipping_fee = 0;
var tax_fee = 0;
var total_fee = 0;
var langu = '<?=$init['langu']?>';


function updateQty(qty, p_id){

  var selectedProduct = {};
  if(productlist.length > 0) {
    for(var i=0; i < productlist.length; i++) {
      if(productlist[i].p_id == p_id) {
        selectedProduct = productlist[i];
        break;
      }
    }
  }

  if(qty < 0) {
    qty = 0;
  }

  
  var pExists = false;
  //看看cart有沒有這個商品
  if(cart.length > 0) {
      for(var i=0; i< cart.length; i++) {
        if(cart[i].p_id == p_id) {
          pExists = true;
          cart[i].qty = qty;
          break;
        } 
      }
  }
  if(!pExists) {
    cart.push({p_id:p_id, qty:qty, title: selectedProduct.title, serial: selectedProduct.serial, oz:selectedProduct.oz, feePerOz:selectedProduct.feePerOz});
  }
  draw();

}

function addQty(p_id){

  var selectedProduct = {};
  if(productlist.length > 0) {
    for(var i=0; i < productlist.length; i++) {
      if(productlist[i].p_id == p_id) {
        selectedProduct = productlist[i];
        break;
      }
    }
  }

  var pExists = false;
  //看看cart有沒有這個商品
  if(cart.length > 0) {
    for(var i=0; i< cart.length; i++) {
      if(cart[i].p_id == p_id) {
        pExists = true;
        cart[i].qty++;
        break;
      } 
    }
  }
  if(!pExists) {
    cart.push({p_id:p_id, qty:1, title: selectedProduct.title, serial: selectedProduct.serial, oz:selectedProduct.oz, feePerOz:selectedProduct.feePerOz});
  }
  draw();

}

function minusQty(p_id) {

  if(cart.length > 0) {
    for(var i=0; i< cart.length; i++) {
      if(cart[i].p_id == p_id) {        
        cart[i].qty--;
        if(cart[i].qty < 0) {
          cart[i].qty = 0;
        }
        break;
      } 
    }
  }
  draw();

}

function draw() {

  total_fee = 0;
  transaction_fee = 0;
  total_oz = 0;
  
  $("#cartlist").html('');
  if(cart.length > 0) {
    for(var i=0; i< cart.length; i++) {
      $("#cQty"+cart[i].p_id).val(cart[i].qty);
      var subtotal = cart[i].qty * cart[i].oz;
      transaction_fee += cart[i].feePerOz * cart[i].oz * cart[i].qty;
      total_oz += subtotal;   

      if(cart[i].qty > 0) {
        var tr = $("<tr>").html("<td>"+cart[i].title+"</td><td>"+cart[i].oz+"</td><td>"+cart[i].qty+"</td><td><div align='right'>"+subtotal+"</div></td>");
        $("#cartlist").append(tr);
      }

    }
  }

  total_fee += transaction_fee;

  $("#total_oz").html(total_oz);
  $("#transaction_fee").html(transaction_fee);
  $("#shipping_fee").html(shipping_fee);
  $("#tax_fee").html(tax_fee);
  $("#total_fee").html(total_fee);

  var silver_account_balance = parseFloat($("#silver_account_balance").val());
  var usd_account_balance = parseFloat($("#usd_account_balance").val());

  if(total_oz > 0 && total_oz <= silver_account_balance && total_fee <= usd_account_balance) {
    $("#submit_btn").prop("disabled", false);
  }

  console.log(cart);



}

function getUserData(user_id) {

  if(user_id != "") {

     var token = "<?=$init['token']?>";    

    $.ajax({
            type: "GET",
            url: "/"+langu+"/api/getUserdata/"+token+"/"+user_id,
            data: "",
            success: function(json){
                if(json.status == "OK") {
                 
                  $("#silver_balance").val(json.result.silver_balance);       
                  $("#usd_balance").val(json.result.usd_balance);                 

                } else {
                  alert(json.result);
                }
            },
            dataType: "json",
            contentType : "application/json"
          });



  }


}


$(function () {   

  if(mode=='Edit') {

    var DOPs = <?=!empty($delivery_order_products)?json_encode($delivery_order_products):'[]'?>;


  }

  getUserData($("#user_id").val());
     

    $.ajax({
            type: "GET",
            url: "/"+langu+"/api/getProductList",
            data: "",
            success: function(json){
                if(json.status == "OK") {

                  productlist = json.result.productlist;

                  $("#productlist").html('');

                  for(var i=0; i < json.result.productlist.length; i++) {
                    var tmp = '<div class="listing-item white-bg bordered mb-20">';
                  tmp += '    <div class="overlay-container">';
                  tmp += '        <img class="img-responsive" src="'+json.result.productlist[i].photo+'" alt="">';
                  tmp += '      <a class="overlay-link img-responsive" href="'+json.result.productlist[i].photo+'" title="'+json.result.productlist[i].title+'"><i class="fa fa-search-plus"></i></a>';
                          
                  tmp += '      </div>';
                  tmp += '    <div class="body">'
                  tmp += '      <h3><a href="#">'+json.result.productlist[i].title+'</a></h3>';
                  tmp += '        ';
                  tmp += '        <div class="elements-list clearfix">';
                  tmp += '        <span class="price">'+json.result.productlist[i].oz+' oz</span>';
                  tmp += '        <div class="pull-right"><a href="javascript:minusQty(\''+json.result.productlist[i].p_id+'\');" class="margin-clear btn btn-sm btn-default-transparent">－</a> &nbsp;&nbsp;&nbsp;<input type="text" name="qty_'+json.result.productlist[i].p_id+'" id="cQty'+json.result.productlist[i].p_id+'" value="0" onblur="updateQty(this.value, '+json.result.productlist[i].p_id+')" size="5"> &nbsp;&nbsp;&nbsp;<a href="javascript:addQty(\''+json.result.productlist[i].p_id+'\');" class="margin-clear btn btn-sm btn-default-transparent">＋</a></div>';
                  tmp += '        </div>';
                  tmp += '      </div>';
                  tmp += '  </div>';

                    var div = $("<div>").attr({"class":"col-md-3 col-sm-3 masonry-grid-item"}).html(tmp);

                    $("#productlist").append(div);                    

                  }                  

                  if(mode=='Edit') {
                      for(var i=0; i < DOPs.length; i++) {

                        cart.push({p_id:DOPs[i].p_id, qty:DOPs[i].qty, title: DOPs[i].title, serial: DOPs[i].serial, oz:DOPs[i].oz, feePerOz:DOPs[i].feePerOz});

                      }
                      draw(); 
                    }
                            
                } 
            },
            dataType: "json",
            contentType : "application/json"
          });


});

function do_validate(){

  var current_total_oz = $("#current_total_oz").val();

  if(mode=='Edit') {

    var has_changed = false;

    //check which has changed
    for(var i=0; i < DOPs.length; i++) {
      for(var j=0; j < cart.length; j++) {
        if(DOPs[i].p_id == cart[i].p_id && DOPs[i].qty != cart[i].qty) {
          has_changed = true;
          break;
        }
      }
    }

    if(has_changed) {
      var c = confirm("We noticed that you have changed customer DO products, are you sure you want to do this modification?");
      if(!c) {
        return false;
      }
    }


  }


}

</script>