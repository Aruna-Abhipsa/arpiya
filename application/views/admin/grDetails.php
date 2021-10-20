<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Goods Receipt Details</h3>
          <a href="<?php echo base_url().'grList'; ?>" alt="gr List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="gr List"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">          
          <fieldset>
            <legend>GR Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Status:</label></div>
                <?php if($gr->flag == 1) { ?><div class="col-md-7" style="font-weight: bold; color: green;">Active</div>
                <?php } else { ?><div class="col-md-7" style="font-weight: bold; color: red;">Deleted</div><?php } ?>                
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>GR Date & Time:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($gr->date))." ".date("H:i A", strtotime($gr->time)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>PO Code:</label></div>
                <div class="col-md-7"><?php echo $gr->code." - ".$gr->heading; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Material Code:</label></div>
                <div class="col-md-7"><?php echo $gr->item_code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Material Name:</label></div>
                <div class="col-md-7"><?php echo $gr->item_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>HSN:</label></div>
                <div class="col-md-7"><?php echo $gr->hsn; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Storage:</label></div>
                <div class="col-md-7"><?php echo $gr->storage; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Ordered Quantity:</label></div>
                <div class="col-md-7"><?php echo $gr->quantity; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Received Quantity:</label></div>
                <div class="col-md-7"><?php echo $gr->received_qty; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Remain Quantity:</label></div>
                <div class="col-md-7"><?php echo $gr->remain_qty; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Challan No:</label></div>
                <div class="col-md-7"><?php echo $gr->challan_no; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Received By:</label></div>
                <div class="col-md-7"><?php echo $gr->received_by; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Comment:</label></div>
                <div class="col-md-7"><?php echo $gr->comment; ?></div>
              </div>
            </div>
          </fieldset>          
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Entry Log:</legend>
            <div class="col-md-6">
              <div class="col-md-5"><label>Created By:</label></div>
              <div class="col-md-7"><?php echo $gr->user_name; ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Modified By:</label></div>
              <div class="col-md-7"><?php echo $gr->userm_name; ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Created On:</label></div>
              <div class="col-md-7"><?php echo date("d M Y", strtotime($gr->created_on)); ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Modified On:</label></div>
              <div class="col-md-7"><?php echo $gr->modified_on!='0000-00-00' ? date("d M Y", strtotime($gr->modified_on)): ''; ?></div>
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->