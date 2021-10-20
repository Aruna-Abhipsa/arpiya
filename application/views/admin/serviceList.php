<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Service List</h3>
                  <a href="<?php echo base_url().'addService'; ?>" alt="Add Service" class="fa fa-plus" style="float: right;" data-toggle="tooltip" data-placement="left" title="Add Service"></a>
                  <div class="tool">
                    <a class="fa fa-question tool" style="float: right;" data-toggle="tooltip" data-placement="left" title=""></a>  
                    <div class="tooltiptext"><?php echo $helptext->text; ?></div>  
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="ServiceList" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Customer Name</th>
                        <th>Service Date</th>
                        <th>Done By</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($services as $s){ ?>
                      <tr>
                      <td><?php echo $s->code; ?></td>
                      <td><?php echo $s->cust_name; ?></td>
                      <td><?php echo date("d M Y", strtotime($s->date)); ?></td>
                      <td><?php echo $s->done_by; ?></td>
                      <td><?php echo $s->amount; ?></td>
                      <td>
                          <?php if($s->flag == 1) { ?><span style="font-weight: bold; color: green;">Active</span>
                          <?php } else { ?><span style="font-weight: bold; color: red;">Deleted</span><?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url().'serviceDetails/'.$s->id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>                                                 
                        <?php if($s->flag == 1) { ?>
                        <a href="<?php echo base_url().'editService/'.$s->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        <a onClick="return JSconfirm('<?php echo $s->id; ?>','<?php echo $s->flag; ?>');" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        <?php } ?>
                      </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->     

    </div><!-- ./wrapper -->
<!-- page script -->
<script type="text/javascript">
$(function () {
  $('#ServiceList').DataTable();
});

function JSconfirm(id, flag){
  var text = "Do you really want to delete this service";
	swal({ 
    title: "Change Status",   
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
        window.location = "admin/serviceStatusChange/"+id+'/'+flag;   
      } else {     
        swal("service status is still unchanged.");   
      } 
  });
}
</script>