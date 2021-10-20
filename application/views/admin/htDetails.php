<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Help Text Details</h3>
          <a href="<?php echo base_url().'helptextList'; ?>" alt="HT List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="HT List"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">          
          <fieldset>
            <legend>Help Text Details:</legend>
            <div class="col-md-12">
              <div class="col-md-1"><label>Menu:</label></div>
              <div class="col-md-11"><?php echo $helptext->name; ?></div>               
            </div>
            <div class="col-md-12">
              <div class="col-md-1"><label>Text:</label></div>
              <div class="col-md-11"><?php echo $helptext->text; ?></div>
            </div>
          </fieldset>          
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Entry Log:</legend>
            <div class="col-md-6">
              <div class="col-md-5"><label>Created By:</label></div>
              <div class="col-md-7"><?php echo $helptext->user_name; ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Modified By:</label></div>
              <div class="col-md-7"><?php echo $helptext->userm_name; ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Created On:</label></div>
              <div class="col-md-7"><?php echo date("d M Y", strtotime($helptext->created_on)); ?></div>
            </div>
            <div class="col-md-6">
              <div class="col-md-5"><label>Modified On:</label></div>
              <div class="col-md-7"><?php echo $helptext->modified_on!='0000-00-00' ? date("d M Y", strtotime($helptext->modified_on)): ''; ?></div>
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->