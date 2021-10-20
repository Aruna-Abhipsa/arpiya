<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Sale MIS</h3>        
        <a href="<?php echo base_url().'saleList'; ?>" alt="Sale MIS" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Sale MIS"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">
          <fieldset>
            <legend>Customer Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Code:</label></div>
                <div class="col-md-7"><?php echo $sale->customer_code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Name:</label></div>
                <div class="col-md-7"><?php echo $sale->customer_name; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Delivery Address:</label></div>
                <div class="col-md-7" style="overflow-wrap: break-word;"><?php echo $sale->customer_address; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Contact Number:</label></div>
                <div class="col-md-7"><?php echo $sale->contact; ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Item Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Item Code:</label></div>
                <div class="col-md-7"><?php echo $sale->item_code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Item Name:</label></div>
                <div class="col-md-7"><?php echo $sale->item_name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Item Serial No:</label></div>
                <div class="col-md-7"><?php echo $sale->item_serial; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Quantity:</label></div>
                <div class="col-md-7"><?php echo $sale->quantity; ?></div>
              </div> 
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Unit Price:</label></div>
                <div class="col-md-7"><?php echo $sale->unit_price; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Tax Amount:</label></div>
                <div class="col-md-7"><?php echo $sale->tax_amount; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Total Price:</label></div>
                <div class="col-md-7"><?php echo $sale->total; ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Sales MIS Details:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Quotation No:</label></div>
                <div class="col-md-7"><?php echo $sale->quote_no; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Quotation Date:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($sale->quote_date)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Sales Order No:</label></div>
                <div class="col-md-7"><?php echo $sale->sales_order; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Sales Date:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($sale->sales_date)); ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Invoice No:</label></div>
                <div class="col-md-7"><?php echo $sale->invoice_no; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Invoice Date:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($sale->invoice_date)); ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Paid By:</label></div>
                <div class="col-md-7"><?php echo paymentModeArr[$sale->paid_by]; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Amount Paid:</label></div>
                <div class="col-md-7"><?php echo $sale->amount_paid; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Remaining Amount:</label></div>
                <div class="col-md-7"><?php echo $sale->remain_amount; ?></div>
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
                <div class="col-md-7"><?php echo $sale->user_name; ?></div>
              </div>  
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Created On:</label></div>
                <div class="col-md-7"><?php echo date("d M Y", strtotime($sale->created_on)); ?></div>
              </div>
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->