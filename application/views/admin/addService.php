<!-- Date Picker -->
<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">     
        <!-- Main content -->
        <section class="content">          
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Add Service</h3>
              <a href="<?php echo base_url().'serviceList'; ?>" alt="Service List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Service List"></a>
            </div><!-- /.box-header -->    
            <form name="addServiceForm" method="post" action="<?php echo base_url().'admin/addService'; ?>">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $serviceCode; ?>" readonly> 
                    <div class="form-group">
                      <label>Customer Name</label><span>*</span>
                      <select name="customer_id" id="customer_id" class="form-control" required>
                        <option value="">Select</option>
                        <?php foreach($customerList as $c){?>
                        <option value="<?php echo $c->id; ?>"><?php echo $c->name." , ".$c->person_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Customer Address</label><span>*</span>
                      <input type="text" name="cust_address" id="cust_address" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Customer Contact No.</label><span>*</span>
                      <input type="text" name="cust_contact" id="cust_contact" class="form-control" readonly>
                    </div>     
                    <div class="form-group">
                      <label>Service Date</label><span>*</span>
                      <input type="text" name="date" id="date" class="form-control datepicker" autocomplete="off" required>
                    </div>    
                    <div class="form-group">
                      <label>Done By</label><span>*</span>
                      <input type="text" name="done_by" id="done_by" class="form-control" required>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6"> 
                    <div class="form-group">
                      <label>Amount (INR)</label><span>*</span>
                      <input type="text" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Paid Amount (INR)</label><span>*</span>
                      <input type="text" name="paid_amount" id="paid_amount" class="form-control" required>
                    </div> 
                    <div class="form-group">
                      <label>Payment Mode</label><span>*</span>
                      <select name="payment_mode" id="payment_mode" class="form-control" required>
                        <option value="">Select</option>
                        <option value="1">UPI</option>
                        <option value="2">Cash</option>
                        <option value="3">Net Banking</option>
                      </select>
                    </div>  
                    <div class="form-group">
                      <label>Additional Items</label>
                      <input type="text" name="additional_items" id="additional_items" class="form-control">
                    </div>  
                    <div class="form-group">
                      <label>Details</label>
                      <input type="text" name="details" id="details" class="form-control">
                    </div>              
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.box-body -->  
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
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
    autoclose: true
})
$("#submit").click(function () { 
  if(error == false) {
    $('#addServiceForm').submit();
  } else {
    swal("Form has some errors. Check before submit.");
    return false;
  }   
}); 
</script> 
