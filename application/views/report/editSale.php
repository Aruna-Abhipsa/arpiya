<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">     
        <!-- Main content -->
        <section class="content">          
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Edit Sale Report</h3>
              <a href="<?php echo base_url().'saleList'; ?>" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Sale Report List"></a>
            </div><!-- /.box-header -->    
            <form name="addSale" method="post" action="<?php echo base_url().'report/addSale'; ?>">
              <div class="box-body">
                <fieldset>
                  <legend>Customer Information:</legend>
                  <div class="row">
                    <div class="col-md-6">   
                      <div class="form-group">
                        <label>Customer Code:</label><span>*</span>
                        <input type="hidden" name="id" id="id" value="<?php echo $sale->id; ?>" >
                        <select name="customer_id" id="customer_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach($customerList as $c){ ?>
                            <option value="<?= $c->id; ?>" <?php if($c->id == $sale->customer_id) echo "selected"; ?>><?= $c->code." - ".$c->name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Customer Name</label><span>*</span>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo $sale->customer_name; ?>" readonly>
                      </div>                        
                    </div><!-- /.col -->
                    <div class="col-md-6">                       
                      <div class="form-group">
                        <label>Delivery Address</label><span>*</span>
                        <input type="text" name="delivery_address" id="delivery_address" class="form-control" value="<?php echo $sale->customer_address; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Contact Number</label><span>*</span>
                        <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $sale->contact; ?>" readonly>
                      </div>                  
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>

                <fieldset>
                  <legend>Item Details:</legend>
                  <div class="row">
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label>Item Id</label><span>*</span>
                        <select name="item_id" id="item_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach($itemList as $i){ ?>
                            <option value="<?= $i->id; ?>" <?php if($i->id == $sale->item_id) echo "selected"; ?>><?= $i->code." - ".$i->name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Item Name</label><span>*</span>
                        <input type="text" name="item_name" id="item_name" class="form-control" value="<?php echo $sale->item_name; ?>" readonly>
                      </div>  
                      <div class="form-group">
                        <label>Item Serial No</label><span>*</span>
                        <input type="text" name="item_serial" id="item_serial" class="form-control" value="<?php echo $sale->item_serial; ?>" required>
                      </div> 
                      <div class="form-group">
                        <label>Quantity</label><span>*</span>
                        <input type="number" name="quantity" id="quantity" class="form-control" autocomplete="off" value="<?php echo $sale->quantity; ?>" required>
                      </div>         
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Unit Price:</label><span>*</span>
                        <input type="text" name="unit_price" id="unit_price" class="form-control" value="<?php echo $sale->unit_price; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Tax Amount:</label><span>*</span>
                        <input type="text" name="tax_amount" id="tax_amount" class="form-control" value="<?php echo $sale->tax_amount; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label>Total Price</label><span>*</span>
                        <input type="text" name="total" id="total" class="form-control" value="<?php echo $sale->total; ?>" readonly>
                      </div>             
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>                
                
                <fieldset>
                  <legend>Sales MIS Details:</legend>
                  <div class="row">
                    <div class="col-md-6">                      
                      <div class="form-group">
                        <label>Quotation Number</label><span>*</span>
                        <input type="text" name="quote_no" id="quote_no" class="form-control" value="<?php echo $sale->quote_no; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Quotation Date</label><span>*</span>
                        <input type="text" name="quote_date" id="quote_date" class="form-control" value="<?php echo $sale->quote_date; ?>" autocomplete="off" required>
                      </div>   
                      <div class="form-group">
                        <label>Sales Order Number</label><span>*</span>
                        <input type="text" name="sales_order" id="sales_order" class="form-control" value="<?php echo $sale->sales_order; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Sales Date</label><span>*</span>
                        <input type="text" name="sales_date" id="sales_date" class="form-control" value="<?php echo $sale->sales_date; ?>" autocomplete="off" required>
                      </div>   
                      <div class="form-group">
                        <label>Sales Person</label><span>*</span>
                        <input type="text" name="sales_person" id="sales_person" class="form-control" value="<?php echo $sale->sales_person; ?>" required>
                      </div>                 
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Invoice Number</label><span>*</span>
                        <input type="text" name="invoice_no" id="invoice_no" class="form-control" value="<?php echo $sale->invoice_no; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Invoice Date</label><span>*</span>
                        <input type="text" name="invoice_date" id="invoice_date" class="form-control" value="<?php echo $sale->invoice_date; ?>" autocomplete="off" required>
                      </div> 
                      <div class="form-group">
                        <label>Paid By</label><span>*</span>
                        <select name="paid_by" id="paid_by" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach(paymentModeArr as $key=>$value){ ?>
                            <option value="<?= $key; ?>" <?php if($key == $sale->paid_by)echo "selected"; ?>><?= $value; ?></option>
                            <?php } ?>
                        </select>
                      </div>  
                      <div class="form-group">
                        <label>Amount Paid</label><span>*</span>
                        <input type="text" name="amount_paid" id="amount_paid" class="form-control" value="<?php echo $sale->amount_paid; ?>" required>
                      </div> 
                      <div class="form-group">
                        <label>Remaining Amount</label><span>*</span>
                        <input type="text" name="remain_amount" id="remain_amount" class="form-control" value="<?php echo $sale->remain_amount; ?>" readonly>
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
var regPrice = /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/;
$('#quote_date').datepicker({
  format: 'yyyy-mm-dd'
});

$('#sales_date').datepicker({
  format: 'yyyy-mm-dd'
});

$('#invoice_date').datepicker({
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
          $('#item_name').val(data.name);
          $('#unit_price').val(data.price);
          calculateTotal()
      }
  });
});

$("#quantity").on('keyup keypress blur change', function()  { 
  calculateTotal();
});

$("#tax_amount").on('keyup keypress blur change', function()  { 
  calculateTotal();
});

function calculateTotal(){
  var total = 0;
  var quantity = $("#quantity").val();
  var unit_price = $("#unit_price").val(); 
  var tax_amount = $("#tax_amount").val();
  if(unit_price){
    if(quantity){
      total = parseInt(quantity) * parseFloat(unit_price);
    }
    if(tax_amount){
      total = parseFloat(total) + parseFloat(tax_amount);
    }
  }
  $("#total").val(total.toFixed(2));
}

$("#tax_amount").on('keyup keypress blur change',function () { 
  $("span").remove(".span-error");  
  var tax = $("#tax_amount").val(); 
  var result = regPrice.test(tax);
  if(!tax){
    $("#tax_amount").focus();
    $("#tax_amount").after("<span class='span-error'>Enter a price</span>");
    error = true;
  } else if(!result){
    $("#tax_amount").focus();
    $("#tax_amount").after("<span class='span-error'>Price can only be numbers</span>");
    error = true;
  } else {
    $('#tax_amount').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  }
});

$( "#customer_id" ).change(function() { 
  var customer_id = $("#customer_id").val(); 
  $.ajax({
      url: baseUrl+"admin/getCustomerDetailsAjax",
      type: 'post',
      dataType: 'html',
      data: {customer_id: customer_id},
      success: function( data ) { 
          var data = JSON.parse(data);
          //console.log(data.address);
          $('#delivery_address').val(data.address);
          $('#contact').val(data.phone);
          $('#customer_name').val(data.name);
      }
  });
});

$("#amount_paid").on('keyup keypress blur change',function () { 
  $("span").remove(".span-error");  
  var total = $("#total").val(); 
  if(total){
    var amount_paid = $("#amount_paid").val(); 
    var result = regPrice.test(amount_paid);
    if(!amount_paid){
      $("#amount_paid").focus();
      $("#amount_paid").after("<span class='span-error'>Enter a price</span>");
      error = true;
    } else if(!result){
      $("#amount_paid").focus();
      $("#amount_paid").after("<span class='span-error'>Price can only be numbers</span>");
      error = true;
    } else {
      var amount_paid = $("#amount_paid").val();
      var remain = parseFloat(total) - parseFloat(amount_paid);
      $("#remain_amount").val(remain.toFixed(2));
      $('#amount_paid').css("border-color", "#d2d6de");
      $("span").remove(".span-error"); 
      error = false;
    }
  } else {
    $("#item_id").focus();
  }
});

$("#submit").click(function () { 
  if(error == false) {
    $('#addSale').submit();
  } else {
    swal("Form has some errors. Check before submit.");
    return false;
  }   
});
</script>