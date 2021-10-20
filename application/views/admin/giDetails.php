<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Goods Issue Details</h3>
          <a href="<?php echo base_url().'giList'; ?>" alt="gi List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="GI List"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">          
          <fieldset>
            <legend>GI Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Status:</label></div>
                <?php if($gi->flag == 1) { ?><div class="col-md-7" style="font-weight: bold; color: green;">Active</div>
                <?php } else { ?><div class="col-md-7" style="font-weight: bold; color: red;">Deleted</div><?php } ?>                
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>GI Date & Time:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($gi->date))." ".$gi->time; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Issued By:</label></div>
                <div class="col-md-7"><?php echo $gi->issuer_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Issued Against:</label></div>
                <div class="col-md-7"><?php echo $gi->c_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Issue Note:</label></div>
                <div class="col-md-7"><?php echo $gi->issue_note; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>PO Name:</label></div>
                <div class="col-md-7"><?php echo $gi->po_code." - ".$gi->heading; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>GR Id:</label></div>
                <div class="col-md-7"><?php echo $gi->gr_id; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Item Name:</label></div>
                <div class="col-md-7"><?php echo $gi->item_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>UoM:</label></div>
                <div class="col-md-7"><?php echo $gi->code." - ".$gi->name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Storage Location:</label></div>
                <div class="col-md-7"><?php echo $gi->storage; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Quantity:</label></div>
                <div class="col-md-7"><?php echo $gi->quantity; ?></div>
              </div>
            </div>
          </fieldset>          
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Entry Log:</legend>
            <div class="col-md-6">
              <div class="col-md-5"><label>Created By:</label></div>
              <div class="col-md-7"><?php echo $gi->user_name; ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Modified By:</label></div>
              <div class="col-md-7"><?php echo $gi->userm_name; ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Created On:</label></div>
              <div class="col-md-7"><?php echo date("d M Y", strtotime($gi->created_on)); ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Modified On:</label></div>
              <div class="col-md-7"><?php echo $gi->modified_on!='0000-00-00' ? date("d M Y", strtotime($gi->modified_on)): ''; ?></div>
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->