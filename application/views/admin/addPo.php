<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">     
        <!-- Main content -->
        <section class="content">          
          <div class="box box-default"> 
            <div class="box-header with-border">
              <h3 class="box-title">Add Purchase Order</h3>
              <a href="<?php echo base_url().'poList'; ?>" alt="PO List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Purchase Order List"></a>
            </div><!-- /.box-header -->    
            <form name="addPoForm" method="post" action="<?php echo base_url().'admin/addPo'; ?>">
              <div class="box-body">
              <fieldset>
                  <legend>Item Details:</legend>
                  <div class="row">
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label>Item Id</label><span>*</span>
                        <select name="item_id" id="item_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach($itemList as $i){ ?>
                            <option value="<?= $i->id; ?>"><?= $i->code." - ".$i->name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Item Name</label><span>*</span>
                        <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                      </div>  
                      <div class="form-group">
                        <label>UoM</label><span>*</span>
                        <input type="text" name="uom" id="uom" class="form-control" readonly>
                      </div> 
                      <div class="form-group">
                        <label>Storage Location:</label><span>*</span>
                        <input type="text" name="storage" id="storage" class="form-control" required> 
                      </div>
                      <div class="form-group">
                        <label>Delivery Date</label><span>*</span>
                        <input type="text" name="delivery_date" id="delivery_date" class="form-control" autocomplete="off" required>
                      </div>           
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>PO Quantity:</label><span>*</span>
                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                      </div>
                      <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-md-4" style="padding-left: 0px">
                          <div class="form-group">                          
                            <label>Delivery Qty1:</label><span>*</span>
                            <input type="number" name="delivery_qty1" id="delivery_qty1" class="form-control quantity" readonly>
                          </div>
                        </div>
                        <div class="col-md-4" style="padding-left: 0px">
                          <div class="form-group">
                            <label>Delivery Qty2:</label><span>*</span>
                            <input type="number" name="delivery_qty2" id="delivery_qty2" class="form-control quantity" readonly>
                          </div>
                        </div>
                        <div class="col-md-4" style="padding-left: 0px; padding-right: 0px;">
                          <div class="form-group">
                            <label>Delivery Qty3:</label><span>*</span>
                            <input type="number" name="delivery_qty3" id="delivery_qty3" class="form-control quantity" readonly>
                          </div>
                        </div>  
                      </div>
                      <div class="form-group">
                        <label>Price Per Unit</label><span>*</span>
                        <input type="text" name="ppu" id="ppu" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>HSN</label><span>*</span>
                        <input type="text" name="hsn" id="hsn" class="form-control" required>
                      </div> 
                      <div class="form-group">
                        <label>Goods Recipient</label><span>*</span>
                        <input type="text" name="recipient" id="recipient" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Amount</label><span>*</span>
                        <input type="text" name="amount" id="amount" class="form-control" readonly>
                      </div>                  
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>
                <fieldset>
                  <legend>Purchase Order Information:</legend>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $poCode; ?>" readonly>    
                      <div class="form-group">
                        <label>PO Currency</label><span>*</span>
                        <input type="text" name="currency" id="currency" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Total PO Base Amount W/O additional charge</label><span>*</span>
                        <input type="text" name="base_amount" id="base_amount" class="form-control" readonly>
                      </div> 
                      <div class="col-md-12" style="padding-left:0px;padding-right:0px;"> 
                        <div class="col-md-4" style="padding-left:0px;">                   
                          <div class="form-group">
                            <label>Tax Type</label><span>*</span>
                            <select name="tax_type" id="tax_type" class="form-control" required>
                              <option value="">Select</option>
                              <option value="1">GST</option>
                              <option value="2">IGST</option>
                            </select>  
                          </div>
                        </div>
                        <div class="col-md-4" style="padding-left:0px;">                   
                          <div class="form-group">
                            <label>Percentage</label><span>*</span>
                            <input type="text" name="tax_percentage" id="tax_percentage" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-4" style="padding-left:0px;padding-right:0px;">                   
                          <div class="form-group">
                            <label>Amount</label><span>*</span>
                            <input type="text" name="tax_amount" id="tax_amount" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Discount %</label><span>*</span>
                        <input type="text" name="discount" id="discount" class="form-control" required>
                      </div>                     
                      <div class="form-group">
                        <label>Insurance Charge</label><span>*</span>
                        <input type="text" name="insurance" id="insurance" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Freight Charge</label><span>*</span>
                        <input type="text" name="freight" id="freight" class="form-control" required>
                      </div>                         
                    </div><!-- /.col -->
                    <div class="col-md-6"> 
                      <div class="form-group">
                        <label>Heading</label><span>*</span>
                        <input type="text" name="heading" id="heading" class="form-control" required>
                      </div>   
                      <div class="form-group">
                        <label>Custom Charge</label><span>*</span>
                        <input type="text" name="custom" id="custom" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Packaging Charge</label><span>*</span>
                        <input type="text" name="packaging" id="packaging" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Extra Charge</label><span>*</span>
                        <input type="text" name="extra" id="extra" class="form-control" required>
                      </div>  
                      <div class="form-group">
                        <label>Total PO Amount</label><span>*</span>
                        <input type="text" name="total_po_amount" id="total_po_amount" class="form-control" readonly>
                      </div>                  
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>
                
                <fieldset>
                  <legend>Vendor Details:</legend>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Vendor Id</label><span>*</span>
                        <select name="vendor_id" id="vendor_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach($supplierList as $s){ ?>
                            <option value="<?= $s->id; ?>"><?= $s->code." - ".$s->name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Vendor Name</label><span>*</span>
                        <input type="text" name="name" id="name" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label>Contact Person</label><span>*</span>
                        <input type="text" name="contact_person" id="contact_person" class="form-control" readonly>
                      </div>                     
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact Number</label><span>*</span>
                        <input type="text" name="number" id="number" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label>Email</label><span>*</span>
                        <input type="text" name="email" id="email" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label>Payment Terms</label><span>*</span>
                        <input type="text" name="payment_terms" id="payment_terms" class="form-control" readonly>
                      </div>               
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </fieldset>               
                 
              </div><!-- /.box-body -->  
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </div>  
            </form>        
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->   
    </div><!-- ./wrapper -->
<script src="<?php echo base_url(); ?>assets/js/validate.js"></script>
<script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
var date = new Date();
date.setDate(date.getDate());

$('#delivery_date').datepicker({
  format: "yyyy-mm-dd",
  startDate: new Date(),
  autoclose: true,
  multidate: 3
}).on("changeDate", function(){
  enableDisableQty();
});

function enableDisableQty(){  
  var count = $('#delivery_date').datepicker('getDates').length;
  if(count == 1){
    $('#delivery_qty1').removeAttr('readonly');$('#delivery_qty1').attr('required', 'required');
    $('#delivery_qty2').attr('readonly', 'readonly');
    $('#delivery_qty3').attr('readonly', 'readonly');
  }
  if(count == 2){
    $('#delivery_qty1').removeAttr('readonly');$('#delivery_qty1').attr('required', 'required');
    $('#delivery_qty2').removeAttr('readonly');$('#delivery_qty2').attr('required', 'required');
    $('#delivery_qty3').attr('readonly', 'readonly');
  }
  if(count == 3){
    $('#delivery_qty1').removeAttr('readonly');$('#delivery_qty1').attr('required', 'required');
    $('#delivery_qty2').removeAttr('readonly');$('#delivery_qty2').attr('required', 'required');
    $('#delivery_qty3').removeAttr('readonly');$('#delivery_qty3').attr('required', 'required');
  }
}

$("#submit").click(function () { 
  if(error == false) {
    $('#addPoForm').submit();
  } else {
    validateQuantity();
    swal("Form has some errors. Check before submit.");
    return false;
  }   
});
</script>