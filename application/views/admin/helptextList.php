<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Help Text List</h3>
                  <a href="<?php echo base_url().'addHT'; ?>" alt="Add HT" class="fa fa-plus" style="float: right;" data-toggle="tooltip" data-placement="left" title="Add Helptext"></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="HTList" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Menu Name</th>
                        <th>Text</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($helptexts as $ht){ ?>
                      <tr>
                        <td><?php echo $ht->name; ?></td>
                        <td><?php echo mb_substr($ht->text, 0, 100)."..."; ?></td>
                        <td>
                          <a href="<?php echo base_url().'htDetails/'.$ht->id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>
                          <a href="<?php echo base_url().'editHT/'.$ht->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>    
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
  $('#HTList').DataTable({
    ordering: false
  });
});
function JSconfirm(id, flag, name){
  if(flag == 0) var text = "Do you really want to activate "+name;
  else var text = "Do you really want to deactivate "+name;
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
        window.location = "admin/grStatusChange/"+id+'/'+flag;   
      } else {     
        swal(name+"'s status is still unchanged.");   
      } 
  });
}
</script>