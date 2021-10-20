<!-- Date Picker -->
<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">     
        <!-- Main content -->
        <section class="content">          
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Edit Service</h3>
              <a href="<?php echo base_url().'serviceList'; ?>" alt="Service List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Service List"></a>
            </div><!-- /.box-header -->    
            <form name="editServiceForm" method="post" action="<?php echo base_url().'admin/addService'; ?>">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                      <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $service->code; ?>" readonly>
                      <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $service->id; ?>">
                    <div class="form-group">
                      <label>Customer Name</label><span>*</span>
                      <select name="customer_id" id="customer_id" class="form-control" required>
                        <option value="">Select</option>
                        <?php foreach($customerList as $c){?>
                        <option value="<?php echo $c->id; ?>" <?php if($service->customer_id == $c->id) echo "selected"; ?>><?php echo $c->name." , ".$c->person_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Customer Address</label><span>*</span>
                      <input type="text" name="cust_address" id="cust_address" class="form-control" value="<?php echo $service->address; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Customer Contact No.</label><span>*</span>
                      <input type="text" name="cust_contact" id="cust_contact" class="form-control" value="<?php echo $service->phone; ?>" readonly>
                    </div>     
                    <div class="form-group">
                      <label>Service Date</label><span>*</span>
                      <input type="text" name="date" id="date" class="form-control datepicker" value="<?php echo $service->date; ?>" autocomplete="off" required>
                    </div>    
                    <div class="form-group">
                      <label>Done By</label><span>*</span>
                      <input type="text" name="done_by" id="done_by" class="form-control" value="<?php echo $service->done_by; ?>" required>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6"> 
                    <div class="form-group">
                      <label>Amount (INR)</label><span>*</span>
                      <input type="text" name="price" id="price" class="form-control" value="<?php echo $service->amount; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Paid Amount (INR)</label><span>*</span>
                      <input type="text" name="paid_amount" id="paid_amount" class="form-control" value="<?php echo $service->paid_amount; ?>" required>
                    </div> 
                    <div class="form-group">
                      <label>Payment Mode</label><span>*</span>
                      <select name="payment_mode" id="payment_mode" class="form-control" required>
                        <option value="">Select</option>
                        <option value="1" <?php if($service->payment_mode == 1) echo "selected"; ?>>UPI</option>
                        <option value="2" <?php if($service->payment_mode == 2) echo "selected"; ?>>Cash</option>
                        <option value="3" <?php if($service->payment_mode == 3) echo "selected"; ?>>Net Banking</option>
                      </select>
                    </div>  
                    <div class="form-group">
                      <label>Additional Items</label>
                      <input type="text" name="additional_items" id="additional_items" class="form-control" value="<?php echo $service->additional_items; ?>" >
                    </div>  
                    <div class="form-group">
                      <label>Details</label>
                      <input type="text" name="details" id="details" class="form-control" value="<?php echo $service->details; ?>" >
                    </div>              
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.box-body -->  
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </div>  
            </form>        
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->   
    </div><!-- ./wrapper -->
<script src="<?php echo base_url(); ?>assets/js/validate.js"></script>
<script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
$('#date').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd"
})
$("#submit").click(function () { 
  if(error == false) {
    $('#editServiceForm').submit();
  } else {
    swal("Form has some errors. Check before submit.");
    return false;
  }   
});  
/*$(document).ready(function(){
  var date_input=$('input[name="date"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input.datepicker({
    format: 'mm/dd/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: true,
  })
});
$( "#customer_id1" ).autocomplete({  
  source: function( request, response ) {      
    $.ajax({
        url: "admin/getCustomerAjax/"+request.term,
        type: 'post',
        dataType: "json",
        data: {
           // search: request.term
        },
        success: function( data ) {
            response( data );
        }
    });
  },
  select: function (event, ui) {
      $('#autocomplete').val(ui.item.label); // display the selected text
      $('#selectuser_id').val(ui.item.value); // save selected id to input
      return false;
  },
  focus: function(event, ui){
      $( "#autocomplete" ).val( ui.item.label );
      $( "#selectuser_id" ).val( ui.item.value );
      return false;
  },
});*/
</script> 
