<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">     
    <!-- Main content -->
    <section class="content">          
      <div class="box box-default"> 
        <div class="box-header with-border">
          <h3 class="box-title">Add Goods Issue</h3>
          <a href="<?php echo base_url().'giList'; ?>" alt="GI List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Goods Issue List"></a>
        </div><!-- /.box-header -->    
        <form name="addGIForm" method="post" action="<?php echo base_url().'admin/addGi'; ?>">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">   
                <div class="form-group">
                  <label>System Date</label><span>*</span>
                  <input type="text" name="date" id="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                </div>                     
                <div class="form-group">
                  <label>System Time</label><span>*</span>
                  <input type="text" name="time" id="time" class="form-control" value="<?php echo date("H:i A"); ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Issued By</label><span>*</span>
                  <input type="hidden" name="issued_by" id="issued_by" class="form-control" value="<?php echo $this->session->userdata('id') ?>" readonly>
                  <input type="text" name="issued_name" id="issued_name" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly>
                </div> 
                <div class="form-group">
                  <label>Issued Against</label><span>*</span>
                  <select name="issued_against" id="issued_against" class="form-control" required>
                    <option value="">Select</option>
                    <?php foreach($customerList as $cu){ ?>
                    <option value="<?php echo $cu->id; ?>"><?php echo $cu->code." - ".$cu->name; ?></option>   
                    <?php } ?>
                  </select>
                </div>                
                <div class="form-group">
                  <label>Issue Note</label><span>*</span>
                  <input type="text" name="issue_note" id="issue_note" class="form-control" required>
                </div>  
                <div class="form-group">
                  <label>PO List</label><span>*</span>
                  <select name="po_id" id="po_id" class="form-control" required>
                    <option value="">Select</option>
                    <?php foreach($poList as $po){ ?>
                    <option value="<?php echo $po->id; ?>"><?php echo $po->code." - ".$po->heading; ?></option>   
                    <?php } ?>
                  </select>
                </div> 
              </div><!-- /.col -->
              <div class="col-md-6"> 
                <div class="form-group">
                  <label>GR List</label><span>*</span>
                  <select name="gr_id" id="gr_id" class="form-control" required>
                    <option value="">Select</option>
                  </select>
                </div>
                <!--<div class="form-group">
                  <label>Item List</label><span>*</span>
                  <select name="item_id" id="item_id" class="form-control" required>
                    <option value="">Select</option>
                    <?php foreach($itemList as $it){ ?>
                    <option value="<?php echo $it->id; ?>"><?php echo $it->code." - ".$it->name; ?></option>   
                    <?php } ?>
                  </select>
                </div>-->  
                <div class="form-group">
                  <label>Item Name</label><span>*</span>
                  <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>UoM</label><span>*</span>
                  <input type="text" name="uom" id="uom" class="form-control" readonly>
                </div>  
                <div class="form-group">
                  <label>Storage Location</label><span>*</span>
                  <input type="text" name="storage" id="storage" class="form-control" required>
                </div>                       
                <div class="form-group">
                  <label>Quantity</label><span>*</span>
                  <input type="text" name="quantity" id="quantity" class="form-control" readonly>
                </div>     
              </div><!-- /.col -->
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
<script>
var baseUrl   = window.location.origin+'/arpiya/';
//var baseUrl   = window.location.origin+'/spaatech-demo-arpiya/';
$( "#po_id" ).change(function() { 
  var po_id = $("#po_id").val(); 
  if(po_id){
    $.ajax({
      url: baseUrl+"admin/getGRListAjax",
      type: 'post',
      dataType: 'html',
      data: {po_id: po_id},
      success: function( data ) { 
          var data = JSON.parse(data);
          //console.log(data);
          var option = "";
          $.each( data.grs, function( i, val ) {
            option += "<option value='"+val.id+"' data-id='"+val.received_qty+"'>"+val.id+"</option>";
          });
          $("#gr_id").append( option );
          $("#item_name").val(data.item.item_name);
          $("#uom").val(data.item.uom_name+" - "+data.item.uom_name);
      }
    });
  }  
})
$("#gr_id").change(function() { 
  var qty = $(this).find(':selected').data('id')
  $("#quantity").val(qty);
});
$("#submit").click(function () { 
  if(error == false) {
    $('#addGIForm').submit();
  } else {
    swal("Form has some errors. Check before submit.");
    return false;
  }   
}); 
</script> 
