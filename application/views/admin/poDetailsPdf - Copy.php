<link href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-left: 0px; background-color: #fff;">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header" style="text-align: center;">
        <h3 class="box-title"><?php echo $po->heading; ?></h3>
      </div>
      <div class="box-body">
        <div class="col-md-12">
        <table class="table table-bordered table-striped" style="margin-top: 20px; font-size: 12px;">
            <tr style="margin: 5px 5px;">
              <td>PO Code</td>
              <td><?php echo $po->code; ?></td>
            </tr>
            <tr style="margin: 5px 5px;">
              <td>Created Date</td>
              <td><?php echo date("d M Y", strtotime($po->created_on)); ?></td>
            </tr>
            <tr style="margin: 5px 5px;">
              <td>Supplier Code</td>
              <td><?php echo $po->supplier_code; ?></td>
            </tr> 
            <tr style="margin: 5px 5px;">
              <td>Supplier Name</td>
              <td><?php echo $po->supplier_name; ?></td>
            </tr>            
            <tr style="margin: 5px 5px;">
              <td>Contact Person</td>
              <td><?php echo $po->person1; ?></td>
            </tr>            
            <tr style="margin: 5px 5px;">
              <td>Contact Number</td>
              <td><?php echo $po->mobile; ?></td>
            </tr>            
            <tr style="margin: 5px 5px;">
              <td>Email</td>
              <td><?php echo $po->supplier_email; ?></td>
            </tr>            
            <tr style="margin: 5px 5px;">
              <td>Payment Terms</td>
              <td><?php echo $po->pt == 'Others' ? $po->pto: $po->pt; ?></td>
            </tr> 
          </table>
        </div>
        <div class="col-md-12">
          <table class="table table-bordered table-striped" style="margin-top: 20px; font-size: 12px;">
            <tr style="margin: 5px 5px;">
              <th>Item Code</th>
              <th>Item Name</th>
              <th>Storage</th>
              <th>UoM</th>
              <th>Currency</th>
              <th>Quantity</th>
              <th>Price per Unit</th>
              <th>HSN</th>
              <th>Amount</th>
            </tr>
            <tr style="margin: 5px 5px;">
              <td><?php echo $po->item_code; ?></td>
              <td><?php echo $po->item_name; ?></td>
              <td><?php echo $po->storage; ?></td>
              <td><?php echo $po->uom_code." - ".$po->uom_name; ?></td>
              <td><?php echo $po->currency; ?></td>
              <td style="text-align: right;"><?php echo $po->quantity; ?></td>
              <td style="text-align: right;"><?php echo $po->ppu; ?></td>
              <td><?php echo $po->hsn; ?></td>
              <td style="text-align: right;"><?php echo $po->amount; ?></td>
            </tr>
            <tr style="margin: 5px 5px;">
              <td colspan="8">Total PO Base Amount W/O additional Charge</td>
              <td style="text-align: right;"><?php echo $po->base_amount; ?></td>
            </tr> 
            <tr style="margin: 5px 5px;">
              <td colspan="8">Total Tax Amount</td>
              <td style="text-align: right;"><?php echo $po->tax_amount; ?></td>
            </tr> 
            <tr style="margin: 5px 5px;">
              <td colspan="8">Discount %</td>
              <td style="text-align: right;"><?php echo $po->discount; ?></td>
            </tr> 
            <tr style="margin: 5px 5px;">
              <td colspan="8">Insurance Charge</td>
              <td style="text-align: right;"><?php echo $po->insurance; ?></td>
            </tr> 
            <tr style="margin: 5px 5px;">
              <td colspan="8">Freight Charge</td>
              <td style="text-align: right;"><?php echo $po->freight; ?></td>
            </tr>  
            <tr style="margin: 5px 5px;">
              <td colspan="8">Custom Charge</td>
              <td style="text-align: right;"><?php echo $po->custom; ?></td>
            </tr> 
            <tr style="margin: 5px 5px;">
              <td colspan="8">Packaging Charge</td>
              <td style="text-align: right;"><?php echo $po->packaging; ?></td>
            </tr> 
            <tr style="margin: 5px 5px;">
              <td colspan="8">Extra Charges</td>
              <td style="text-align: right;"><?php echo $po->extra; ?></td>
            </tr> 
            <tr style="margin: 5px 5px;">
              <td colspan="8">Total PO Amount</td>
              <td style="text-align: right;"><?php echo $po->total_po_amount; ?></td>
            </tr> 
          </table>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->