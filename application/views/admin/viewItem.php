<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $item->name; ?></h3>
          <a href="<?php echo base_url().'itemList'; ?>" alt="Item List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Item List"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="col-md-3"><label>Status:</label></div>
            <div class="col-md-9">
              <?php if($item->flag == 1) { ?><span style="font-weight: bold; color: green;">Active</span>
              <?php } else { ?><span style="font-weight: bold; color: red;">Deleted</span><?php } ?>
            </div>    
          </div> 
          <div class="col-md-12">
            <div class="col-md-3"><label>Code:</label></div>
            <div class="col-md-9"><?php echo $item->code; ?></div>    
          </div>  
          <div class="col-md-12">
            <div class="col-md-3"><label>Manufacturing Make:</label></div>
            <div class="col-md-9"><?php echo $item->make_name; ?></div>    
          </div> 
          <div class="col-md-12">
            <div class="col-md-3"><label>Material Type:</label></div>
            <div class="col-md-9"><?php echo $item->material_type; ?></div>    
          </div> 
          <div class="col-md-12">
            <div class="col-md-3"><label>Safety Stock:</label></div>
            <div class="col-md-9"><?php echo $item->safety_stock; ?></div>    
          </div>  
          <div class="col-md-12">
            <div class="col-md-3"><label>Standard Price (INR):</label></div>
            <div class="col-md-9"><?php echo $item->price; ?></div>    
          </div>  
          <div class="col-md-12">
            <div class="col-md-3"><label>Storage Location:</label></div>
            <div class="col-md-9"><?php echo $item->storage; ?></div>    
          </div>
          <div class="col-md-12">
            <div class="col-md-3"><label>UoM:</label></div>
            <div class="col-md-9"><?php echo $item->uom_code." - ".$item->uom_name; ?></div>    
          </div>
          <div class="col-md-12">
            <div class="col-md-3"><label>HSN Code:</label></div>
            <div class="col-md-9"><?php echo $item->hsn; ?></div>    
          </div>
          <div class="col-md-12">
            <div class="col-md-3"><label>Manufacturer Part No.:</label></div>
            <div class="col-md-9"><?php echo $item->part_no; ?></div>    
          </div>
          <div class="col-md-12">
            <div class="col-md-3"><label>Part Drawing No.:</label></div>
            <div class="col-md-9"><?php echo $item->drawing_no; ?></div>    
          </div>
          <div class="col-md-12">
            <div class="col-md-3"><label>Created By:</label></div>
            <div class="col-md-9"><?php echo $item->user_name; ?></div>    
          </div>
          <div class="col-md-12">
            <div class="col-md-3"><label>Created On:</label></div>
            <div class="col-md-9"><?php echo date("d M Y", strtotime($item->created_on)); ?></div>    
          </div>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->