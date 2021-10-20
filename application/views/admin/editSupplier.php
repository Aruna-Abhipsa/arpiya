<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">     
        <!-- Main content -->
        <section class="content">          
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Edit Supplier</h3>
              <a href="<?php echo base_url().'supplierList'; ?>" alt="Supplier List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Supplier List"></a>
            </div><!-- /.box-header -->    
            <form name="editSupplierForm" method="post" action="<?php echo base_url().'admin/addSupplier'; ?>">
              <div class="box-body">
                <fieldset>
                  <legend>Supplier Information:</legend>
                  <div class="row">
                    <div class="col-md-6">                      
                        <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $supplier->code; ?>" readonly>
                        <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $supplier->id; ?>">                      
                      <div class="form-group">
                        <label>Vendor Name</label><span>*</span>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $supplier->name; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label><span>*</span>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $supplier->email; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Mobile</label><span>*</span>
                        <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $supplier->mobile; ?>" required>
                      </div>    
                      <div class="form-group">
                        <label>Phone1</label>
                        <input type="text" name="phone1" id="phone1" class="form-control" value="<?php echo $supplier->phone1 ? $supplier->phone1: ''; ?>">
                      </div>
                      <div class="form-group">
                        <label>Phone2</label>
                        <input type="text" name="phone2" id="phone2" class="form-control" value="<?php echo $supplier->phone2 ? $supplier->phone2: ''; ?>">
                      </div> 
                      <div class="form-group">
                        <label>Type</label><span>*</span>
                        <select name="type" id="type" class="form-control" required>
                          <option value="">Select</option>
                          <option value="1" <?php if($supplier->type == 1) echo "selected"; ?>>Regular</option>
                          <option value="2" <?php if($supplier->type == 2) echo "selected"; ?>>One Time</option>
                          <option value="3" <?php if($supplier->type == 3) echo "selected"; ?>>Blocked</option>
                        </select>
                      </div>                   
                    </div><!-- /.col -->
                    <div class="col-md-6"> 
                      <div class="form-group">
                        <label>Person1 of Contact</label><span>*</span>
                        <input type="text" name="person1" id="person1" class="form-control" value="<?php echo $supplier->person1; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Person2 of Contact</label>
                        <input type="text" name="person2" id="person2" class="form-control" value="<?php echo $supplier->person2; ?>">
                      </div> 
                      <div class="form-group">
                        <label>PAN No.</label><span>*</span>
                        <input type="text" name="pan" id="pan" class="form-control" value="<?php echo $supplier->pan; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>GSTIN No.</label><span>*</span>
                        <input type="text" name="gstin" id="gstin" class="form-control" value="<?php echo $supplier->gstin; ?>" required>
                      </div>  
                      <div class="form-group">
                        <label>MSME Registration No.</label><span>*</span>
                        <input type="text" name="msme" id="msme" class="form-control" value="<?php echo $supplier->msme; ?>" required>
                      </div>               
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>
                
                <fieldset>
                  <legend>Address Information:</legend>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Address1</label>
                        <input type="text" name="address1" id="address2" class="form-control" value="<?php echo $supplier->address1; ?>">
                      </div>
                      <div class="form-group">
                        <label>Address2</label>
                        <input type="text" name="address2" id="address2" class="form-control" value="<?php echo $supplier->address2; ?>">
                      </div>
                      <div class="form-group">
                        <label>City</label><span>*</span>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $supplier->city; ?>" required>
                      </div>                     
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>State</label><span>*</span>
                        <input type="text" name="state" id="state" class="form-control" value="<?php echo $supplier->state; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label><span>*</span>
                        <input type="text" name="country" id="country" class="form-control" value="<?php echo $supplier->country; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Pin</label><span>*</span>
                        <input type="text" name="pin" id="pin" class="form-control" value="<?php echo $supplier->pin; ?>" required>
                      </div>                  
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>
                
                <fieldset>
                  <legend>Payment Information:</legend>
                  <div class="row">
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label>Currency</label><span>*</span>
                        <input type="text" name="currency" id="currency" class="form-control" value="<?php echo $supplier->currency; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Account No.</label><span>*</span>
                        <input type="text" name="account_no" id="account_no" class="form-control" value="<?php echo $supplier->account_no; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Bank Name</label><span>*</span>
                        <input type="text" name="bank_name" id="bank_name" class="form-control" value="<?php echo $supplier->bank_name; ?>" required>
                      </div>                      
                      <div class="form-group">
                        <label>Branch Name</label><span>*</span>
                        <input name="branch" id="branch" class="form-control" value="<?php echo $supplier->branch; ?>" required>
                      </div>                            
                    </div><!-- /.col -->
                    <div class="col-md-6">                        
                      <div class="form-group">
                        <label>IFSC Code</label><span>*</span>
                        <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="<?php echo $supplier->ifsc_code; ?>" required>
                      </div>  
                      <div class="form-group">
                        <label>Payment Terms</label><span>*</span>
                        <select name="payment_terms" id="payment_terms" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Payable immediately" <?php if($supplier->payment_terms == "Payable immediately") echo "selected"; ?>>Payable immediately</option>
                            <option value="Payable in 3 partial amounts" <?php if($supplier->payment_terms == "Payable in 3 partial amounts") echo "selected"; ?>>Payable in 3 partial amounts</option>
                            <option value="Payable within 30 days" <?php if($supplier->payment_terms == "Payable within 30 days") echo "selected"; ?>>Payable within 30 days</option>
                            <option value="Payable within 60 days" <?php if($supplier->payment_terms == "Payable within 60 days") echo "selected"; ?>>Payable within 60 days</option>
                            <option value="Others" <?php if($supplier->payment_terms == "Others") echo "selected"; ?>>Others</option>
                        </select>
                      </div>                      
                      <div class="form-group" id="payment_terms_other" style="display: <?php echo $supplier->payment_terms == "Others" ? 'block': 'none'; ?>">
                        <input type="text" name="payment_terms_other" class="form-control" value="<?php echo $supplier->payment_terms == "Others" ? $supplier->payment_terms_other: ''; ?>">
                      </div>
                      
                      <div class="form-group">
                        <label>Cash Management Group</label><span>*</span>
                        <select name="cash_mgmt_group" id="cash_mgmt_group" class="form-control" required>
                            <option value="">Select</option>
                            <option value="1" <?php if($supplier->cash_mgmt_group == 1) echo "selected"; ?>>Domestic</option>
                            <option value="2" <?php if($supplier->cash_mgmt_group == 2) echo "selected"; ?>>Foreign</option>
                        </select>
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
    $('#editSupplierForm').submit();
  } else {
    swal("Form has some errors. Check before submit.");
    return false;
  }   
});
</script>