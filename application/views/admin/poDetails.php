<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $po->heading; ?></h3>        
        <a href="<?php echo base_url().'poList'; ?>" alt="Po List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="PO List"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">
          <fieldset>
            <legend>Item Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Code:</label></div>
                <div class="col-md-7"><?php echo $po->item_code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Name:</label></div>
                <div class="col-md-7"><?php echo $po->item_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>UoM:</label></div>
                <div class="col-md-7"><?php echo $po->uom_code." - ".$po->uom_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Storage Location:</label></div>
                <div class="col-md-7"><?php echo $po->storage; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Quantity:</label></div>
                <div class="col-md-7"><?php echo $po->quantity; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Delivery Qty1:</label></div>
                <div class="col-md-7"><?php echo $po->delivery_qty1; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Delivery Qty2:</label></div>
                <div class="col-md-7"><?php echo $po->delivery_qty2; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Delivery Qty3:</label></div>
                <div class="col-md-7"><?php echo $po->delivery_qty3; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Delivery Date:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($po->delivery_date)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Delivery Date2:</label></div>
                <div class="col-md-7"><?php if($po->delivery_date2) echo date("d M Y", strtotime($po->delivery_date2)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Delivery Date3:</label></div>
                <div class="col-md-7"><?php if($po->delivery_date3) echo date("d M Y", strtotime($po->delivery_date3)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Price per Unit:</label></div>
                <div class="col-md-7"><?php echo $po->ppu; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>HSN:</label></div>
                <div class="col-md-7"><?php echo $po->hsn; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Goods Recipient:</label></div>
                <div class="col-md-7"><?php echo $po->recipient; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Amount:</label></div>
                <div class="col-md-7"><?php echo $po->amount; ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Purchase Order Information:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>PO Number:</label></div>
                <div class="col-md-7"><?php echo $po->id; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Created On:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($po->created_on)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>PO Heading:</label></div>
                <div class="col-md-7"><?php echo $po->heading; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>PO Code:</label></div>
                <div class="col-md-7"><?php echo $po->code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Status:</label></div>
                <?php if($po->flag == 1) { ?><div class="col-md-7" style="font-weight: bold; color: green;">Active</div>
                <?php } else { ?><div class="col-md-7" style="font-weight: bold; color: red;">Deleted</div><?php } ?>                
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>PO Currency:</label></div>
                <div class="col-md-7"><?php echo $po->currency; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5" style="overflow-wrap: break-word;"><label>PO Base Amount:</label></div>
                <div class="col-md-7"><?php echo $po->base_amount; ?></div>
              </div>
              <?php if($po->tax_type == 1){ ?>
              <div class="col-md-12">
                <div class="col-md-5"><label>CGST</label></div>
                <div class="col-md-7"><?php echo ($po->tax_percentage/2)." %"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>SGST:</label></div>
                <div class="col-md-7"><?php echo ($po->tax_percentage/2)." %"; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>CGST Amount:</label></div>
                <div class="col-md-7"><?php echo ($po->tax_amount/2); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>SGST Amount:</label></div>
                <div class="col-md-7"><?php echo ($po->tax_amount/2); ?></div>
              </div>
              <?php } elseif($po->tax_type == 2) { ?>
              <div class="col-md-12">
                <div class="col-md-5"><label>IGST</label></div>
                <div class="col-md-7"><?php echo $po->tax_percentage; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Tax Amount</label></div>
                <div class="col-md-7"><?php echo $po->tax_amount; ?></div>
              </div>
              <?php } ?>  
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Discount %:</label></div>
                <div class="col-md-7"><?php echo $po->discount; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Insurance Charge:</label></div>
                <div class="col-md-7"><?php echo $po->insurance; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Freight Charge:</label></div>
                <div class="col-md-7"><?php echo $po->freight; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Custom Charge:</label></div>
                <div class="col-md-7"><?php echo $po->custom; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Packaging Charge:</label></div>
                <div class="col-md-7"><?php echo $po->packaging; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Extra Charge:</label></div>
                <div class="col-md-7"><?php echo $po->extra; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Total PO Amount:</label></div>
                <div class="col-md-7"><?php echo $po->total_po_amount; ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Vendor Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Vendor Code:</label></div>
                <div class="col-md-7"><?php echo $po->code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Vendor Name:</label></div>
                <div class="col-md-7"><?php echo $po->supplier_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Contact Person:</label></div>
                <div class="col-md-7"><?php echo $po->person1; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Contact Number:</label></div>
                <div class="col-md-7"><?php echo $po->mobile; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Email:</label></div>
                <div class="col-md-7"><?php echo $po->supplier_email; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Payment Terms:</label></div>
                <div class="col-md-7"><?php echo $po->pt ? $po->pt: $po->pto; ?></div>
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
                <div class="col-md-7"><?php echo $po->user_name; ?></div>
              </div>  
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Modified By:</label></div>
                <div class="col-md-7"><?php echo $po->userm_name; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Created On:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($po->created_on)); ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Modified On:</label></div>
                <div class="col-md-7"><?php echo $po->modified_on!='0000-00-00' ? date("d M Y", strtotime($po->modified_on)): ''; ?></div>
              </div>  
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->