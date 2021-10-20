<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Inventory MIS</h3>        
        <a href="<?php echo base_url().'inventoryList'; ?>" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Inventory MIS"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">
          <fieldset>
            <legend>Item Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Date:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($inventory->created_on)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Item Code:</label></div>
                <div class="col-md-7"><?php echo $inventory->item_code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Item Name:</label></div>
                <div class="col-md-7"><?php echo $inventory->item_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>UoM:</label></div>
                <div class="col-md-7"><?php echo $inventory->uom_code." - ".$inventory->uom_name; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>PO Code:</label></div>
                <div class="col-md-7"><?php echo $inventory->code." - ".$inventory->heading; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Item Description:</label></div>
                <div class="col-md-7"><?php echo $inventory->short_desc; ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Stock Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Currency:</label></div>
                <div class="col-md-7"><?php echo $inventory->currency; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Ordered Quantity:</label></div>
                <div class="col-md-7"><?php echo $inventory->quantity; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Unit Price:</label></div>
                <div class="col-md-7"><?php echo $inventory->ppu; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Total Value:</label></div>
                <div class="col-md-7"><?php echo $inventory->total_po_amount; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Received Quantity:</label></div>
                <div class="col-md-7"><?php echo $inventory->received_qty ? $inventory->received_qty : 0; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Issued Quantity:</label></div>
                <div class="col-md-7"><?php echo $inventory->issued_qty ? $inventory->issued_qty : 0; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Stock Quantity:</label></div>
                <div class="col-md-7"><?php echo $inventory->received_qty - $inventory->issued_qty; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Stock Value:</label></div>
                <div class="col-md-7"><?php echo ($inventory->received_qty - $inventory->issued_qty) * $inventory->ppu; ?></div>
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
                <div class="col-md-7"><?php echo $inventory->user_name; ?></div>
              </div>  
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Created On:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($inventory->created_on)); ?></div>
              </div>
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->