<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Goods Receipt List</h3>
                  <a href="<?php echo base_url().'addGr'; ?>" alt="Add GR" class="fa fa-plus" style="float: right;" data-toggle="tooltip" data-placement="left" title="Add Goods Receipt"></a>
                  <div class="tool">
                    <a class="fa fa-question tool" style="float: right;" data-toggle="tooltip" data-placement="left" title=""></a>  
                    <div class="tooltiptext"><?php echo $helptext->text; ?></div>  
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="GRList" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th>PO Heading</th>
                        <th>Challan No</th>
                        <th>Date & Time</th>
                        <th>Ordered Quantity</th>
                        <th>Received Quantity</th>
                        <th>Received By</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($grs as $s){ ?>
                      <tr>
                      <td><?php echo $s->heading; ?></td>
                      <td><?php echo $s->challan_no; ?></td>
                      <td><?php echo date("d M Y", strtotime($s->date))." ".date("H:i A", strtotime($s->time)); ?></td>
                      <td><?php echo $s->quantity; ?></td>
                      <td><?php echo $s->received_qty; ?></td>
                      <td><?php echo $s->received_by; ?></td>
                      <td>
                          <?php if($s->flag == 1) { ?><span style="font-weight: bold; color: green;">Active</span>
                          <?php } else { ?><span style="font-weight: bold; color: red;">Deleted</span><?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url().'grDetails/'.$s->id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>
                        <?php if($s->flag == 1 && !$s->gis) { ?>
                          <a href="<?php echo base_url().'editGr/'.$s->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>                       
                          <a onClick="return JSconfirm('<?php echo $s->id; ?>','<?php echo $s->flag; ?>','Goods Receipt');" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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
        $('#GRList').DataTable();
      });

function JSconfirm(id, flag, name){
  if(flag == 0) var text = "Do you really want to activate "+name;
  else var text = "Do you really want to delete "+name;
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