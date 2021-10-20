<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">     
        <!-- Main content -->
        <section class="content">          
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Add AMC Report</h3>
              <a href="<?php echo base_url().'amcList'; ?>" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="AMC Report List"></a>
            </div><!-- /.box-header -->    
            <form name="addSale" method="post" action="<?php echo base_url().'report/addAmc'; ?>">
              <div class="box-body">
                <fieldset>
                  <legend>Customer Details:</legend>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Customer Id</label><span>*</span>
                        <select name="customer_id" id="customer_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach($customerList as $i){ ?>
                            <option value="<?= $i->id; ?>"><?= $i->code." - ".$i->name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Customer Name</label><span>*</span>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" readonly>
                      </div>  
                      <div class="form-group">
                        <label>Item Name</label><span>*</span>
                        <select name="item_id" id="item_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach($itemList as $i){ ?>
                            <option value="<?= $i->id; ?>"><?= $i->name; ?></option>
                            <?php } ?>
                        </select>
                      </div> 
                    </div><!-- /.col -->
                    <div class="col-md-6"> 
                      <div class="form-group">
                        <label>Customer Contact</label><span>*</span>
                        <input type="text" name="contact" id="contact" class="form-control" readonly>
                      </div> 
                      <div class="form-group">
                        <label>Customer Address</label><span>*</span>
                        <input type="text" name="address" id="address" class="form-control" readonly>
                      </div> 
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>                
                
                <fieldset>
                  <legend>AMC Entry:</legend>
                  <div class="row">
                    <div class="col-md-6">                      
                      <div class="form-group">
                        <label>Invoice No</label><span>*</span>
                        <input type="text" name="invoice_no" id="invoice_no" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label>Invoice Date</label><span>*</span>
                        <input type="text" name="invoice_date" id="invoice_date" class="form-control" autocomplete="off" required>
                      </div>        
                      <div class="form-group">
                        <label>Warranty Status</label><span>*</span>
                        <select name="warrenty_status" id="warrenty_status" class="form-control" required>
                          <option value="">Select</option>
                          <option value="1">Yes</option>
                          <option value="2">No</option>
                        </select>
                      </div>  
                      <div class="form-group">
                        <label>Warranty Valid Till</label><span>*</span>
                        <input type="text" name="warrenty_valid_till" id="warrenty_valid_till" class="form-control" autocomplete="off" required>
                      </div>         
                      <div class="form-group">
                        <label>Extended Warranty Status</label>
                        <select name="extend_warrenty_status" id="extend_warrenty_status" class="form-control">
                          <option value="">Select</option>
                          <option value="1">Yes</option>
                          <option value="2">No</option>
                        </select>
                      </div>  
                      <div class="form-group">
                        <label>Extended Warranty Valid Till</label>
                        <input type="text" name="extend_warrenty_valid_till" id="extend_warrenty_valid_till" class="form-control" autocomplete="off" readonly>
                      </div>                               
                      <div class="form-group">
                        <label>AMC Status</label><span>*</span>
                        <select name="amc_status" id="amc_status" class="form-control" required>
                          <option value="">Select</option>
                          <option value="1">Yes</option>
                          <option value="2">No</option>
                        </select>
                      </div> 
                      <div class="form-group">
                        <label>Start Date</label>
                        <input type="text" name="start_date" id="start_date" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>AMC Valid Till</label>
                        <input type="text" name="amc_valid_till" id="amc_valid_till" class="form-control" autocomplete="off" readonly>
                      </div>      
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>AMC Paid By</label>
                        <select name="paid_by" id="paid_by" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach(paymentModeArr as $key=>$value){ ?>
                            <option value="<?= $key; ?>"><?= $value; ?></option>
                            <?php } ?>
                        </select>
                      </div>                     
                      <div class="form-group">
                        <label>AMC Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control" autocomplete="off" required>
                      </div>                      
                      <div class="form-group">
                        <label>Tax %</label>
                        <input type="text" name="tax" id="tax" class="form-control" autocomplete="off" required>
                      </div>                      
                      <div class="form-group">
                        <label>Tax Amount</label>
                        <input type="text" name="tax_amount" id="tax_amount" class="form-control" autocomplete="off" readonly required>
                      </div>                     
                      <div class="form-group">
                        <label>Total AMC</label>
                        <input type="text" name="total" id="total" class="form-control" autocomplete="off" readonly required>
                      </div>
                      <div class="form-group">
                        <label>Last Free Service Date (Under Warranty)</label>
                        <input type="text" name="free_service_date" id="free_service_date" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Last Paid Service Date (Under AMC)</label>
                        <input type="text" name="paid_service_date" id="paid_service_date" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Next Service Date</label>
                        <input type="text" name="next_service_date" id="next_service_date" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label>AMC Renew Reminder Date</label>
                        <input type="text" name="reminder_date" id="reminder_date" class="form-control" autocomplete="off" required>
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
var date = new Date();
date.setDate(date.getDate());
//var baseUrl   = window.location.origin+'/arpiya/';
var baseUrl   = window.location.origin+'/spaatech-demo-arpiya/';
var regPrice = /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/;

$('#amount').on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var amount = $("#amount").val();
  var result = regPrice.test(amount);
  if(!amount){
    $("#amount").focus();
    $("#amount").after("<span class='span-error'>Enter AMC amount</span>");
    error = true;
  } else if(!result){
    $("#amount").focus();
    $("#amount").after("<span class='span-error'>Enter a valid AMC amount</span>");
    error = true;
  } else { 
    if(amount) $('#amount').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    calculateAmount();
    error = false;
  } 
});
$('#tax').on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var tax = $("#tax").val();
  var result = regPrice.test(tax);
  if(!tax){
    $("#tax").focus();
    $("#tax").after("<span class='span-error'>Enter tax %</span>");
    error = true;
  } else if(!result){
    $("#tax").focus();
    $("#tax").after("<span class='span-error'>Enter a valid tax %</span>");
    error = true;
  } else { 
    if(tax) $('#tax').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    calculateAmount();
    error = false;
  } 
});
function calculateAmount(){ 
  var amount = $('#amount').val();
  var tax = $('#tax').val();  
  if(amount && tax){
    var tax_amount = parseFloat(amount)*(parseFloat(tax)/100);
    $('#tax_amount').val(tax_amount.toFixed(2));
    var total = parseFloat(amount) + parseFloat(tax_amount);
    $('#total').val(total.toFixed(2));
    //console.log(tax_amount);return tax_amount;
  } 
}

$('#date').datepicker({
  format: 'yyyy-mm-dd'
});
$('#invoice_date').datepicker({
  format: 'yyyy-mm-dd'
});
$('#warrenty_valid_till').datepicker({
  format: 'yyyy-mm-dd'
}).on("changeDate", function(){
  var date = $("#warrenty_valid_till").val();
  var selectedDate = new Date(date);
  $("#extend_warrenty_valid_till").datepicker({format: 'yyyy-mm-dd', startDate: selectedDate});
  $("#extend_warrenty_valid_till").removeAttr('readonly');
});
/*$('#extend_warrenty_valid_till').datepicker({
  format: 'yyyy-mm-dd'
});*/
$('#start_date').datepicker({
  format: 'yyyy-mm-dd'
}).on("changeDate", function(){
  var date = $("#start_date").val();
  var selectedDate = new Date(date);
  //selectedDate = selectedDate.setDate(selectedDate.getDate() + 1)
  //selectedDate = selectedDate.toLocaleDateString();
  $("#reminder_date, #amc_valid_till").datepicker({format: 'yyyy-mm-dd', startDate: selectedDate});
  $("#reminder_date, #amc_valid_till").removeAttr('readonly');
});
/*$('#amc_valid_till').datepicker({
  format: 'yyyy-mm-dd'
});*/
$('#free_service_date').datepicker({
  format: 'yyyy-mm-dd'
});
$('#paid_service_date').datepicker({
  format: 'yyyy-mm-dd'
}).on("changeDate", function(){
  var date = $("#paid_service_date").val();
  var selectedDate = new Date(date);
  //selectedDate = selectedDate.setDate(selectedDate.getDate() + 1)
  //selectedDate = selectedDate.toLocaleDateString();
  $("#next_service_date").datepicker({format: 'yyyy-mm-dd', startDate: selectedDate});
  $("#next_service_date").removeAttr('readonly');
});;
/*$('#next_service_date').datepicker({
  format: 'yyyy-mm-dd'
});
$('#reminder_date').datepicker({
  format: 'yyyy-mm-dd'
});*/

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
          $('#customer_name').val(data.name);
          $('#contact').val(data.phone);
          $('#address').val(data.address);
      }
  });
});

$( "#amc_status" ).change(function() { 
  var amc_status = $("#amc_status option:selected").val();
  if(amc_status == 2){
    $("#start_date, #amc_valid_till, #paid_service_date, #paid_by, #next_service_date, #reminder_date").attr("disabled","true");
    $("#amount, #tax").attr("readonly","readonly");
    $("#start_date, #amc_valid_till, #paid_service_date, #amount, #tax, #tax_amount, #total, #next_service_date, #reminder_date").removeAttr("required");
    $("#start_date, #amc_valid_till, #paid_service_date, #amount, #tax, #tax_amount, #total, #next_service_date, #reminder_date").val("");
  } else {
    $("#start_date, #amc_valid_till, #paid_service_date, #paid_by, #amount, #tax, #tax_amount, #total, #next_service_date, #reminder_date").removeAttr("disabled");
    $("#amount, #tax").removeAttr("readonly");
    $("#start_date, #amc_valid_till, #paid_service_date, #paid_by, #amount, #tax, #tax_amount, #total, #next_service_date, #reminder_date").attr("required","true");
  }
});

$( "#warrenty_status" ).change(function() { 
  var warrenty_status = $("#warrenty_status option:selected").val(); 
  if(warrenty_status == 2){
    $("#warrenty_valid_till, #free_service_date").attr("disabled","true");
    $("#warrenty_valid_till, #free_service_date").removeAttr("required");
    $("#warrenty_valid_till, #free_service_date").val("");
  } else {
    $("#warrenty_valid_till, #free_service_date").removeAttr("disabled");
    $("#warrenty_valid_till, #free_service_date").attr("required","true");
  }
});

$( "#extend_warrenty_status" ).change(function() { 
  var extend_warrenty_status = $("#extend_warrenty_status option:selected").val(); 
  if(extend_warrenty_status == 2){
    $("#extend_warrenty_valid_till").attr("disabled","true");
    $("#extend_warrenty_valid_till").val("");
  } else {
    $("#extend_warrenty_valid_till").removeAttr("disabled");
    var date = $("#warrenty_valid_till").val();
    var selectedDate = new Date(date);
    if(date)$("#extend_warrenty_valid_till").datepicker({format: 'yyyy-mm-dd', startDate: selectedDate});
    else $("#extend_warrenty_valid_till").datepicker({format: 'yyyy-mm-dd'});
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

$('#invoice_no').on('keyup keypress blur change', function() {  
  $("span").remove(".span-error"); 
  var invoice_no = $("#invoice_no").val(); 
  if(invoice_no){
    $.ajax({
      url: baseUrl+"report/validateInvoiceNo",
      type: 'post',
      async: true,
      dataType: 'json',
      enctype: 'multipart/form-data',
      cache: false,
      data: {invoice_no: invoice_no},
      success: function( data ) { 
        //console.log(data);
        if(data){
          $("#invoice_no").focus();
          $("#invoice_no").after("<span class='span-error'>This invoice no already exists.</span>");
        } else {
          $("span").remove(".span-error"); 
        }
      }
    });
  }
});
</script>