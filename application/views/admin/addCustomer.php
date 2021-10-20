<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">     
        <!-- Main content -->
        <section class="content">          
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Add Customer</h3>
              <a href="<?php echo base_url().'customerList'; ?>" alt="Customer List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Customer List"></a>
            </div><!-- /.box-header -->    
            <form name="addCustomerForm" method="post" action="<?php echo base_url().'admin/addCustomer'; ?>">
              <div class="box-body">
                <fieldset>
                  <legend>Personal Information:</legend>
                  <div class="row">
                    <div class="col-md-6">
                    <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $customerCode; ?>" readonly>
                      <div class="form-group">
                        <label>Customer Name</label><span>*</span>
                        <input type="text" name="name" id="name" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label><span>*</span>
                        <input type="email" name="email" id="email" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Phone No.</label><span>*</span>
                        <input name="phone" id="phone" class="form-control" required>
                      </div>      
                      <div class="form-group">
                        <label>Person of Contact</label><span>*</span>
                        <input type="text" name="person_name" id="person_name" class="form-control" required>
                      </div>                
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Address</label><span>*</span>
                        <input type="text" name="address" id="address" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>State</label><span>*</span>
                        <select name="state_id" id="state_id" class="form-control" required>
                          <option value="">Select</option>
                          <?php foreach($states as $s) { ?> 
                          <option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
                          <?php } ?> 
                        </select>                                                 
                      </div>
                      <div class="form-group">
                        <label>Pin</label><span>*</span>
                        <input type="text" name="pin" id="pin" class="form-control" required>
                      </div>                    
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>     
                
                <fieldset>
                  <legend>Payment Information:</legend>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>PAN No.</label><span>*</span>
                        <input type="text" name="pan" id="pan" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Payment Terms</label><span>*</span>
                        <select name="payment_terms" id="payment_terms" class="form-control" required> 
                            <option value="">Select</option>
                            <option value="1">Payable immediately</option>
                            <option value="2">Payable in 3 partial amounts</option>
                            <option value="3">Payable within 30 days</option>
                            <option value="4">Payable within 60 days</option>
                            <option value="5">Others</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Credit Period</label><span>*</span>
                        <input type="text" name="credit_period" id="credit_period" class="form-control" required>
                      </div>                   
                    </div><!-- /.col -->
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label>Bank Name</label><span>*</span>
                        <input type="text" name="bank_name" id="bank_name" class="form-control" required>
                      </div>                      
                      <div class="form-group">
                        <label>Account No.</label><span>*</span>
                        <input name="account_no" id="account_no" class="form-control" required>
                      </div>                       
                      <div class="form-group">
                        <label>IFSC Code</label><span>*</span>
                        <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" required>
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
<script src="<?php echo base_url(); ?>assets/js/validate.js"></script>
<script>
$("#submit").click(function () { 
  if(error == false) {
    $('#addCustomerForm').submit();
  } else {
    swal("Form has some errors. Check before submit.");
    return false;
  }   
});
</script>