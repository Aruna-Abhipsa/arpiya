<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Procurement MIS</h3>    
                  <a href="#" onclick="exportToExcelAjax()" class="fa fa-download"></a>             
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <div class="col-md-12 box-header">
                    <div class="col-md-3">
                      From Date:
                      <input type="text" name="from_date" id="from_date" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-3">
                      To Date:
                      <input type="text" name="to_date" id="to_date" class="form-control" autocomplete="off">
                    </div>
                  </div>
                  
                  <table id="POList" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Code</th>
                        <th>Heading</th>
                        <th>Vendor</th>
                        <th>Item</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($pos as $s){ ?>
                      <!--<tr>
                        <td><?php echo date("d M Y", strtotime($s->created_on)); ?></td>
                        <td><?php echo $s->code; ?></td>
                        <td><?php echo $s->heading; ?></td>
                        <td><?php echo $s->supplier_name; ?></td>
                        <td><?php echo $s->item_name; ?></td>
                        <td><?php echo $s->currency."  ".$s->total_po_amount; ?></td>
                        <td>
                          <a href="<?php echo base_url().'poMisDetails/'.$s->id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>                                                
                        </td>
                      </tr>-->
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->   
    </div><!-- ./wrapper -->
<!-- page script -->
<script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
var baseUrl   = window.location.origin+'/arpiya/';
//var baseUrl   = window.location.origin+'/spaatech-demo-arpiya/';
$(function () {
  getDataTable();
});
$('#from_date').datepicker().on("changeDate", function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  getDataTable(from_date, to_date);
});
$('#to_date').datepicker().on("changeDate", function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  getDataTable(from_date, to_date);
});

function getDataTable(from_date, to_date){
  $("#POList").dataTable().fnDestroy();
  var table_news = $('#POList').DataTable({
    "processing":true,
    "serverSide":true,  
    "order":[], 
    "ajax": {
      url : '<?php echo base_url("report/procurementExcelDataAjax"); ?>',
      type: "POST",
      data: {'from_date': from_date, 'to_date': to_date}
    },
    "columnDefs":[  
      {  
        "targets":[0],  
        "orderable":false,
      },  
    ], 
	});
}

function exportToExcelAjax(){
  var url = baseUrl+"report/exportToExcelAjax";
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  $.ajax({
      url: baseUrl+"report/exportToExcelAjax",
      type: 'post',
      headers: {'Content-type': 'application/json'},
      data: {from_date: from_date, to_date: to_date},
      responseType: 'arraybuffer',
      success: function( data ) { 
        //alert(data);
        var blob = new Blob([data], { type: 'data:application/vnd.ms-excel' });
        var downloadUrl = URL.createObjectURL(blob);
        var a = document.createElement("a");
        a.href = downloadUrl;
        a.download = "procurement.xlsx";
        document.body.appendChild(a);
        a.click();
      }
  });
}
</script>