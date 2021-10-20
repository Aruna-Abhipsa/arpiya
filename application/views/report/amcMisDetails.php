<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">AMC MIS</h3>        
        <a href="<?php echo base_url().'amcList'; ?>" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="AMC MIS"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">
          <fieldset>
            <legend>Customer Details:</legend>
            <div class="col-md-6">              
              <div class="col-md-12">
                <div class="col-md-5"><label>Customer Code:</label></div>
                <div class="col-md-7"><?php echo $amc->customer_code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Customer Name:</label></div>
                <div class="col-md-7"><?php echo $amc->customer_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Item Name:</label></div>
                <div class="col-md-7"><?php echo $amc->item_name; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Customer Contact:</label></div>
                <div class="col-md-7"><?php echo $amc->contact; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Customer Addr:</label></div>
                <div class="col-md-7"><?php echo $amc->address; ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>AMC Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Invoice No:</label></div>
                <div class="col-md-7"><?php echo $amc->invoice_no; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Invoice Date:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($amc->invoice_date)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Warranty Status:</label></div>
                <div class="col-md-7"><?php echo $amc->warrenty_status == 1 ? "Yes": "No"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Warranty Valid Till:</label></div>
                <div class="col-md-7"><?php if($amc->warrenty_valid_till != "0000-00-00"){echo date("d M Y", strtotime($amc->warrenty_valid_till));} else {echo "NA";} ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Extended Warranty Status:</label></div>
                <div class="col-md-7"><?php echo $amc->extend_warrenty_status == 1 ? "Yes": "No"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Extended Warranty Valid Till:</label></div>
                <div class="col-md-7"><?php if($amc->extend_warrenty_valid_till != "0000-00-00"){echo date("d M Y", strtotime($amc->extend_warrenty_valid_till));}else {echo "NA";} ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>AMC Status:</label></div>
                <div class="col-md-7"><?php echo $amc->amc_status == 1 ? "Yes": "No"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Start Date:</label></div>
                <div class="col-md-7"><?php if($amc->start_date != "0000-00-00") echo date("d M Y", strtotime($amc->start_date)); else {echo "NA";} ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>AMC Valid Till:</label></div>
                <div class="col-md-7"><?php if($amc->amc_valid_till != "0000-00-00") echo date("d M Y", strtotime($amc->amc_valid_till)); else {echo "NA";} ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>AMC Paid By:</label></div>
                <div class="col-md-7"><?php if($amc->paid_by)  echo paymentModeArr[$amc->paid_by]; else {echo "NA";} ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>AMC Amount:</label></div>
                <div class="col-md-7"><?php echo $amc->amount ? $amc->amount: "NA"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Tax %:</label></div>
                <div class="col-md-7"><?php echo $amc->tax ? $amc->tax: "NA"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Tax Amount:</label></div>
                <div class="col-md-7"><?php echo $amc->tax_amount ? $amc->tax_amount: "NA"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Total AMC:</label></div>
                <div class="col-md-7"><?php echo $amc->total ? $amc->total: "NA"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Last Free Service Date (Under Warranty):</label></div>
                <div class="col-md-7"><?php if($amc->free_service_date != "0000-00-00") echo date("d M Y", strtotime($amc->free_service_date)); else {echo "NA";} ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Last Paid Service Date (Under AMC):</label></div>
                <div class="col-md-7"><?php if($amc->paid_service_date != "0000-00-00") echo date("d M Y", strtotime($amc->paid_service_date)); else {echo "NA";} ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Next Service Date:</label></div>
                <div class="col-md-7"><?php if($amc->next_service_date != "0000-00-00") echo date("d M Y", strtotime($amc->next_service_date)); else {echo "NA";} ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>AMC Renew Reminder Date:</label></div>
                <div class="col-md-7"><?php if($amc->reminder_date != "0000-00-00") echo date("d M Y", strtotime($amc->reminder_date)); else {echo "NA";} ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Entry Log:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Created By:</label></div>
                <div class="col-md-7"><?php echo $amc->user_name; ?></div>
              </div>  
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Created On:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($amc->created_on)); ?></div>
              </div>
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->