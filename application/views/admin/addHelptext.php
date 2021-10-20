<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">     
    <!-- Main content -->
    <section class="content">          
      <div class="box box-default"> 
        <div class="box-header with-border">
          <h3 class="box-title">Add Helptext</h3>
          <a href="<?php echo base_url().'helptextList'; ?>" alt="HT List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Helptext List"></a>
        </div><!-- /.box-header -->    
        <form name="addHTForm" method="post" action="<?php echo base_url().'admin/addHelptext'; ?>">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group col-md-6">
                  <label>Menu</label><span>*</span>
                  <select name="menu_id" id="menu_id" class="form-control" required>
                    <option value="">Select</option>
                    <?php foreach($menuList as $m){ ?>
                    <option value="<?php echo $m->id; ?>"><?php echo $m->name; ?></option>   
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group col-md-12">
                  <label>Help Text</label><span>*</span>
                  <textarea id="text" name="text" rows="10" cols="80" required></textarea>
                </div>
              </div>
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
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
<script>
$(function () {
  CKEDITOR.replace('text');
});
</script> 
