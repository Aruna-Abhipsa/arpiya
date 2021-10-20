<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">     
        <!-- Main content -->
        <section class="content">          
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Edit Inventory Report</h3>
              <a href="<?php echo base_url().'inventoryList'; ?>" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Inventory Report List"></a>
            </div><!-- /.box-header -->    
            <form name="addSale" method="post" action="<?php echo base_url().'report/addInventory'; ?>">
              <div class="box-body">
                <fieldset>
                  <legend>Item Details:</legend>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date</label><span>*</span>
                        <input type="text" name="date" id="date" class="form-control" value="<?php echo $invt->date; ?>" autocomplete="off" required>
                        <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $invt->id; ?>">
                      </div> 
                      <div class="form-group">
                        <label>Item Id</label><span>*</span>
                        <select name="item_id" id="item_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach($itemList as $i){ ?>
                            <option value="<?= $i->id; ?>" <?php if($i->id == $invt->item_id) echo "selected"; ?>><?= $i->code." - ".$i->name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>UoM</label><span>*</span>
                        <input type="text" name="uom" id="uom" class="form-control" value="<?php echo $invt->uom_code." ".$invt->uom_name; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Currency</label><span>*</span>
                        <input type="text" name="currency" id="currency" class="form-control" value="<?php echo $invt->currency; ?>" required>
                      </div>    
                    </div><!-- /.col -->
                    <div class="col-md-6"> 
                      <div class="form-group">
                        <label>Unit Price:</label><span>*</span>
                        <input type="text" name="unit_price" id="unit_price" class="form-control" value="<?php echo $invt->price; ?>" readonly>
                      </div>  
                      <div class="form-group">
                        <label>Quantity</label><span>*</span>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="<?php echo $invt->quantity; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label>Total Price</label><span>*</span>
                        <input type="text" name="total" id="total" class="form-control" value="<?php echo $invt->total; ?>" readonly>
                      </div>             
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>                
                
                <fieldset>
                  <legend>Stock Entry:</legend>
                  <div class="row">
                    <div class="col-md-6">                      
                      <div class="form-group">
                        <label>Opening Stock</label><span>*</span>
                        <input type="number" name="opening_stock" id="opening_stock" class="form-control" value="<?php echo $invt->opening_stock; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label>Opening Stock Value</label><span>*</span>
                        <input type="text" name="opening_stock_value" id="opening_stock_value" class="form-control" value="<?php echo $invt->opening_stock_value; ?>" readonly>
                      </div>        
                      <div class="form-group">
                        <label>Value Difference</label><span>*</span>
                        <input type="text" name="difference" id="difference" class="form-control" value="<?php echo $invt->difference; ?>" readonly>
                      </div>         
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Closing Stock</label><span>*</span>
                        <input type="number" name="closing_stock" id="closing_stock" class="form-control" value="<?php echo $invt->closing_stock; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label>Closing Stock Value</label><span>*</span>
                        <input type="text" name="closing_stock_value" id="closing_stock_value" class="form-control" value="<?php echo $invt->closing_stock_value; ?>" readonly>
                      </div>   
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>     
              </div><!-- /.box-body -->  
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </div>  
            </form>        
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->   
    </div><!-- ./wrapper -->
<script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
//var baseUrl   = window.location.origin+'/arpiya/';
var baseUrl   = window.location.origin+'/spaatech-demo-arpiya/';
$('#date').datepicker({
  format: 'yyyy-mm-dd'
});

$( "#item_id" ).change(function() { 
  var item_id = $("#item_id").val(); 
  $.ajax({
      url: baseUrl+"admin/getItemDetailsAjax",
      type: 'post',
      dataType: 'html',
      data: {item_id: item_id},
      success: function( data ) { 
          var data = JSON.parse(data);
          //console.log(data.address);
          $('#uom').val(data.uom_code+" - "+data.uom_name);
          $('#unit_price').val(data.price);
          calculateTotal()
      }
  });
});

$("#quantity").on('keyup keypress blur change', function()  { 
  calculateTotal();
});

$("#opening_stock").on('keyup keypress blur change', function()  { 
  var opening_stock = $("#opening_stock").val();
  if(!opening_stock)$("#opening_stock_value").val('');
  calculateStockValue();
});

$("#closing_stock").on('keyup keypress blur change', function()  { 
  var closing_stock = $("#closing_stock").val();
  if(!closing_stock)$("#closing_stock_value").val('');
  calculateStockValue();
});

function calculateTotal(){
  var total = 0;
  var quantity = $("#quantity").val();
  var unit_price = $("#unit_price").val();  
  var opening_stock = $("#opening_stock").val();
  var closing_stock = $("#closing_stock").val();
  if(unit_price){
    if(quantity){
      total = parseInt(quantity) * parseFloat(unit_price);
    }
    if(opening_stock){
      open_stk_val = parseInt(opening_stock)*parseFloat(unit_price);
      $("#opening_stock_value").val(open_stk_val);
    }
    if(closing_stock){
      close_stk_val = parseInt(closing_stock)*parseFloat(unit_price);
      $("#closing_stock_value").val(close_stk_val);
    }
  }
  $("#total").val(total.toFixed(2));
  calculateStockValue();
}

function calculateStockValue(){
  var difference = 0;
  var open_stk_val = 0;
  var close_stk_val = 0;
  var unit_price = $("#unit_price").val(); 
  if(unit_price){
    var opening_stock = $("#opening_stock").val();
    var closing_stock = $("#closing_stock").val();
    if(opening_stock){
      open_stk_val = parseInt(opening_stock)*parseFloat(unit_price);
      $("#opening_stock_value").val(open_stk_val);
    }
    if(closing_stock){
      close_stk_val = parseInt(closing_stock)*parseFloat(unit_price);
      $("#closing_stock_value").val(close_stk_val);
    }
    if(open_stk_val && close_stk_val){
      if(open_stk_val >= close_stk_val)difference = parseFloat(open_stk_val) - parseFloat(close_stk_val);
      if(close_stk_val > open_stk_val)difference = parseFloat(close_stk_val) - parseFloat(open_stk_val);
      //difference = difference.toString().slice(1);
      $("#difference").val(difference);
    } else {
      $("#difference").val('');
    }
  } else {
    swal("Select an item from the list");
    $('#item_id').focus();
  }
}

$("#submit").click(function () { 
  if(error == false) {
    $('#addSale').submit();
  } else {
    swal("Form has some errors. Check before submit.");
    return false;
  }   
});
</script>