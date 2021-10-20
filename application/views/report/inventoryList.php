<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Inventory MIS</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form action="report/exportToExcelInventoryAjax" method="post">
                  <div class="col-md-12 box-header">
                    <div class="col-md-3">
                      From Date:
                      <input type="text" name="from_date" id="from_date" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-3">
                      To Date:
                      <input type="text" name="to_date" id="to_date" class="form-control" autocomplete="off">
                      <input type="hidden" name="search" id="search" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-3" style="padding-left: 0px; padding-top: 25px;">
                      <button type="submit" style="border: 0; background: none;" data-toggle="tooltip" data-placement="top" title="Download">
                        <i class="fa fa-download" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                  </form>
                  <table id="inventoryList" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th style="width:10%;">Date</th>
                        <th style="width:20%;">Item Code</th>
                        <th style="width:20%;">Item Name</th>
                        <th style="width:10%;">Unit Price</th>
                        <th style="width:15%;">Stock Quantity</th>
                        <th style="width:15%;">Stock Value</th>
                        <th style="width:10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
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
//var baseUrl   = window.location.origin+'/arpiya/';
var baseUrl   = window.location.origin+'/spaatech-demo-arpiya/';
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
$('#saleList').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    $('#search').val(value);
});

function getDataTable(from_date, to_date){
  $("#inventoryList").dataTable().fnDestroy();
  var table_news = $('#inventoryList').DataTable({
    "processing":true,
    "serverSide":true,  
    "order":[], 
    "ajax": {
      url : '<?php echo base_url("report/inventoryExcelDataAjax"); ?>',
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

function JSconfirm(id){
  var text = "Do you really want to delete this record";
	swal({ 
    title: "Delete Inventory",   
    text: text,   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Yes",   
    cancelButtonText: "No",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
      if (isConfirm){   
        window.location = "report/inventoryDelete/"+id;   
      } else {     
        swal("Inventory record is safe.");   
      } 
  });
}
</script>