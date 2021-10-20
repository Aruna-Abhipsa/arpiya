<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $customer->name; ?></h3>
          <a href="<?php echo base_url().'customerList'; ?>" alt="Customer List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Customer List"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-6">
          <fieldset>
            <legend>Personal Information:</legend>
            <div class="col-md-12">
              <div class="col-md-2"><label>Status:</label></div>
              <?php if($customer->flag == 1) { ?><div class="col-md-10" style="font-weight: bold; color: green;">Active</div>
              <?php } else { ?><div class="col-md-10" style="font-weight: bold; color: red;">Deleted</div><?php } ?>                
            </div>
            <div class="col-md-12">
              <div class="col-md-2"><label>Code:</label></div>
              <div class="col-md-10"><?php echo $customer->code; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-2"><label>Person:</label></div>
              <div class="col-md-10"><?php echo $customer->person_name; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-2"><label>Phone:</label></div>
              <div class="col-md-10"><?php echo $customer->phone; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-2"><label>Address:</label></div>
              <div class="col-md-10" style="overflow-wrap: break-word;"><?php echo $customer->address; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-2"><label>State:</label></div>
              <div class="col-md-10"><?php echo $customer->state_name; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-2"><label>Pin:</label></div>
              <div class="col-md-10"><?php echo $customer->pin; ?></div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <legend>Payment Information:</legend>
            <div class="col-md-12">
              <div class="col-md-4"><label>Pan No:</label></div>
              <div class="col-md-8"><?php echo $customer->pan; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Payment Terms:</label></div>
              <div class="col-md-8"><?php echo paymentTermsArr[$customer->payment_terms]; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Credit Period	:</label></div>
              <div class="col-md-8"><?php echo $customer->credit_period	; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Bank Name:</label></div>
              <div class="col-md-8"><?php echo $customer->bank_name; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Account Number:</label></div>
              <div class="col-md-8"><?php echo $customer->account_no ? $customer->account_no: ''; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>IFSCode:</label></div>
              <div class="col-md-8"><?php echo $customer->ifsc_code; ?></div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Entry Log:</legend>
            <div class="col-md-6">
              <div class="col-md-4"><label>Created By:</label></div>
              <div class="col-md-8"><?php echo $customer->user_name; ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-4"><label>Created On:</label></div>
              <div class="col-md-8"><?php echo date("d M Y", strtotime($customer->created_on)); ?></div>
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->