<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">     
    <!-- Main content -->
    <section class="content">          
      <div class="box box-default"> 
        <div class="box-header with-border">
          <h3 class="box-title">Edit Goods Receipt</h3>
          <a href="<?php echo base_url().'grList'; ?>" alt="GR List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Goods Receipt List"></a>
        </div><!-- /.box-header -->    
        <form name="addGRForm" method="post" action="<?php echo base_url().'admin/addGr'; ?>">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">                    
                <div class="form-group">
                  <label>System Date</label><span>*</span>
                  <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $gr->id; ?>">
                  <input type="text" name="date" id="date" class="form-control" value="<?php echo $gr->date; ?>" readonly>
                </div>                     
                <div class="form-group">
                  <label>System Time</label><span>*</span>
                  <input type="text" name="time" id="time" class="form-control" value="<?php echo date("H:i A", strtotime($gr->time)); ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Purchase Order Id</label><span>*</span>
                  <select name="po_id" id="po_id" class="form-control" required>
                    <option value="">Select</option>
                    <?php foreach($poList as $po){ ?>
                    <option value="<?php echo $po->id; ?>" <?php if($po->id == $gr->po_id) echo "selected"; ?>><?php echo $po->code." - ".$po->heading; ?></option>   
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Material Code</label><span>*</span>
                  <input type="text" name="material_code" id="material_code" class="form-control" value="<?php echo $gr->item_code; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Material Name</label><span>*</span>
                  <input type="text" name="material_name" id="material_name" class="form-control" value="<?php echo $gr->item_name; ?>" readonly>
                </div>     
                <!--<div class="form-group">
                  <label>Material Description</label><span>*</span>
                  <input type="text" name="material_desc" id="material_desc" class="form-control" readonly>
                </div>  -->  
                <div class="form-group">
                  <label>HSN</label><span>*</span>
                  <input type="text" name="hsn" id="hsn" class="form-control"  value="<?php echo $gr->hsn; ?>"readonly>
                </div>   
                <div class="form-group">
                  <label>Storage Location</label><span>*</span>
                  <input type="text" name="storage" id="storage" class="form-control" value="<?php echo $gr->storage; ?>" readonly>
                </div>
              </div><!-- /.col -->
              <div class="col-md-6"> 
                <div class="form-group">
                  <label>Ordered Quantity</label><span>*</span>
                  <input type="text" name="ordered_qty" id="ordered_qty" class="form-control" value="<?php echo $gr->ordered_qty; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Received Quantity</label><span>*</span>
                  <input type="text" name="received_qty" id="received_qty" class="form-control" value="<?php echo $gr->received_qty; ?>" required>
                </div>
                <div class="form-group">
                  <label>Remaining Quantity</label><span>*</span>
                  <input type="text" name="remain_qty" id="remain_qty" class="form-control" value="<?php echo $gr->remain_qty; ?>" readonly>
                </div>  
                <div class="form-group">
                  <label>Challan No</label><span>*</span>
                  <input type="text" name="challan_no" id="challan_no" class="form-control" value="<?php echo $gr->challan_no; ?>" required>
                </div>                       
                <div class="form-group">
                  <label>Challan Date</label><span>*</span>
                  <input type="text" name="challan_date" id="challan_date" class="form-control" value="<?php echo $gr->challan_date; ?>" readonly>
                </div>                   
                <div class="form-group">
                  <label>Challan Time</label><span>*</span>
                  <input type="text" name="challan_time" id="challan_time" class="form-control" value="<?php echo date("H:i A", strtotime($gr->challan_time)); ?>" readonly>
                </div> 
                <div class="form-group">
                  <label>Received By</label><span>*</span>
                  <input type="text" name="received_by" id="received_by" class="form-control" value="<?php echo $gr->received_by; ?>" required>
                </div>   
                <div class="form-group">
                  <label>Comment</label>
                  <input type="text" name="comment" id="comment" class="form-control" value="<?php echo $gr->comment; ?>">
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
$("#submit").click(function () { 
  if(error == false) {
    $('#addGRForm').submit();
  } else {
    swal("Form has some errors. Check before submit.");
    return false;
  }   
}); 
$( "#po_id" ).change(function() { 
  var po_id = $("#po_id").val(); 
  $.ajax({
      url: baseUrl+"admin/getPoDetailsAjax",
      type: 'post',
      dataType: 'html',
      data: {po_id: po_id},
      success: function( data ) { 
          var data = JSON.parse(data);
          //console.log(data.ordered_qty);
          $('#material_code').val(data.item_code);
          $('#material_name').val(data.item_name);
          $('#hsn').val(data.hsn);
          $('#storage').val(data.storage);
          $('#ordered_qty').val(data.ordered_qty);
          $('#received_qty').val('');
          $('#remain_qty').val('');  
      }
  });
});
$('#received_qty').on('keyup keypress blur change', function() {
  $("span").remove(".span-error");
  var received_qty = $("#received_qty").val();
  var regPin = /^\d*(?:\.\d{1,2})?$/;
  var ordered_qty = $("#ordered_qty").val();
  var remain = parseInt(ordered_qty) - parseInt(received_qty);
  var result = regPin.test(received_qty);
  if(!received_qty){
    $("#received_qty").focus();
    $("#received_qty").after("<span class='span-error'>Enter received quantity</span>");
    error = true;
  } else if(!result){
    $("#received_qty").focus();
    $("#received_qty").after("<span class='span-error'>Enter valid number</span>");
    error = true;
  } else if(remain < 0){
    $("#received_qty").focus();
    $("#received_qty").val('');
    $("#remain_qty").val('');
    swal("Remaining quantity should be less than ordered quantity.");
    //$("#received_qty").after("<span class='span-error'>Should be less than ordered quantity</span>");
    error = true;
  } else {
    $('#received_qty').css("border-color", "#d2d6de");
    $("span").remove(".span-error");     
    $("#remain_qty").val(remain);
    error = false;
  }   
});
</script> 
