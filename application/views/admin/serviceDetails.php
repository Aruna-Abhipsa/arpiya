<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Service Details</h3>
          <a href="<?php echo base_url().'serviceList'; ?>" alt="service List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Service List"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">          
          <div class="col-md-6">
            <div class="col-md-12">
              <div class="col-md-4"><label>Status:</label></div>
              <?php if($service->flag == 1) { ?><div class="col-md-8" style="font-weight: bold; color: green;">Active</div>
              <?php } else { ?><div class="col-md-8" style="font-weight: bold; color: red;">Deleted</div><?php } ?>                
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Code:</label></div>
              <div class="col-md-8"><?php echo $service->code; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Customer Name:</label></div>
              <div class="col-md-8"><?php echo $service->cust_name; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Customer Contact:</label></div>
              <div class="col-md-8"><?php echo $service->phone; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Customer Address:</label></div>
              <div class="col-md-8" style="overflow-wrap: break-word;"><?php echo $service->address; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Service Date:</label></div>
              <div class="col-md-8"><?php echo date("d M Y", strtotime($service->date)); ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Done BY:</label></div>
              <div class="col-md-8"><?php echo $service->done_by; ?></div>
            </div>              
          </div> 
          <div class="col-md-6">
            <div class="col-md-12">
              <div class="col-md-4"><label>Amount (INR):</label></div>
              <div class="col-md-8"><?php echo $service->amount; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Paid Amount (INR):</label></div>
              <div class="col-md-8"><?php echo $service->paid_amount; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Payment Mode:</label></div>
              <div class="col-md-8"><?php echo paymentModeArr[$service->payment_mode]; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Additional Items:</label></div>
              <div class="col-md-8"><?php echo $service->additional_items ? $service->additional_items: ''; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Details:</label></div>
              <div class="col-md-8"><?php echo $service->details ? $service->details: ''; ?></div>
            </div> 
            <div class="col-md-12">
              <div class="col-md-4"><label>Created By:</label></div>
              <div class="col-md-8"><?php echo $service->user_name; ?></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4"><label>Created On:</label></div>
              <div class="col-md-8"><?php echo date("d M Y", strtotime($service->created_on)); ?></div>
            </div> 
          </div>          
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->