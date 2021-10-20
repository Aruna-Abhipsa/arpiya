<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Service MIS</h3>    
                                
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="report/exportToExcelServiceAjax" method="post">
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
                  <table id="ServiceList" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Customer Name</th>
                        <th>Service Date</th>
                        <th>Done By</th>
                        <th>Amount</th>
                        <th>Action</th>
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
$('#ServiceList').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    $('#search').val(value);
});

function getDataTable(from_date, to_date){
  $("#ServiceList").dataTable().fnDestroy();
  var table_news = $('#ServiceList').DataTable({
    "processing":true,
    "serverSide":true,  
    "order":[], 
    "ajax": {
      url : '<?php echo base_url("report/serviceExcelDataAjax"); ?>',
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
</script>