      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Edit Item</h3>
              <a href="<?php echo base_url().'admin/itemList'; ?>" alt="Item List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Item List"></a>
            </div><!-- /.box-header -->    
            <form name="editItemForm" method="post" action="<?php echo base_url().'admin/editItem'; ?>">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $item->code; ?>"> 
                    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $item->id; ?>"> 
                    <div class="form-group">
                      <label>Item Name</label><span>*</span>
                      <input type="text" name="name" id="name" class="form-control" value="<?php echo $item->name; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Short Description</label><span>*</span>
                      <input name="short_desc" id="short_desc" class="form-control" value="<?php echo $item->short_desc; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Long Description</label>
                      <input name="long_desc" id="long_desc" class="form-control" value="<?php echo $item->long_desc; ?>">
                    </div>

                    <div class="form-group">
                      <label>Storage Location</label><span>*</span>
                      <input type="text" name="storage" id="storage" class="form-control" value="<?php echo $item->storage; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Unit of Measurement</label><span>*</span>
                      <select name="UoM_id" id="UoM_id" class="form-control" required>
                        <option value="">Select</option>
                      <?php foreach($uoms as $u){ ?>
                        <option value="<?php echo $u->id; ?>" <?php if($u->id == $item->UoM_id) echo "selected"; ?>><?php echo $u->code." - ".$u->name; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Manufacturing Make</label><span>*</span>
                      <select name="manufacturer_id" id="manufacturer_id" class="form-control" required>
                        <option value="">Select</option>
                      <?php foreach($manufacturers as $m){ ?>
                        <option value="<?php echo $m->id; ?>" <?php if($m->id == $item->manufacturer_id) echo "selected"; ?>><?php echo $m->name; ?></option>
                      <?php } ?>
                        <option value=" ">Others</option>
                      </select>
                    </div>
                    <div class="form-group" id="new_make_div" style="display: none;">
                      <input type="text" name="new_make" id="new_make" class="form-control">
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Material Type</label><span>*</span>
                      <select name="material_id" id="material_id" class="form-control" required>
                        <option value="">Select</option>
                      <?php foreach($materialTypes as $mt){ ?>
                        <option value="<?php echo $mt->id; ?>" <?php if($mt->id == $item->material_id) echo "selected"; ?>><?php echo $mt->name; ?></option>
                      <?php } ?>
                        <option value=" ">Others</option>
                      </select>
                    </div>
                    <div class="form-group" id="new_material_div" style="display: none;">
                      <input type="text" name="new_material" id="new_material" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Safety Stock</label><span>*</span>
                      <input type="number" name="safety_stock" id="safety_stock" class="form-control" value="<?php echo $item->safety_stock; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Standard Price (INR)</label><span>*</span>
                      <input type="text" name="price" id="price" class="form-control" value="<?php echo $item->price ? $item->price: ''; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>HSN Code</label>
                      <input type="text" name="hsn" id="hsn" class="form-control" value="<?php echo $item->hsn; ?>">
                    </div>
                    <div class="form-group">
                      <label>Manufacturer Part No</label>
                      <input type="text" name="part_no" id="part_no" class="form-control" value="<?php echo $item->part_no? $item->part_no: ''; ?>">
                    </div>
                    <div class="form-group">
                      <label>Part Drawing No</label>
                      <input type="text" name="drawing_no" id="drawing_no" class="form-control" value="<?php echo $item->drawing_no? $item->drawing_no: ''; ?>">
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.box-body -->  
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submit">Save</button>
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
    $('#editItemForm').submit();
  } else {
    swal("Form has some errors. Check before submit."); 
    return false;
  }   
});
</script>