<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Purchase Orders List</h3>
                  <a href="<?php echo base_url().'addPo'; ?>" alt="Add PO" class="fa fa-plus" style="float: right;" data-toggle="tooltip" data-placement="left" title="Add PO"></a>
                  <div class="tool">
                    <a class="fa fa-question tool" style="float: right;" data-toggle="tooltip" data-placement="left" title=""></a>  
                    <div class="tooltiptext"><?php echo $helptext->text; ?></div>  
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="POList" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Heading</th>
                        <th>Vendor</th>
                        <th>Item</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($pos as $s){ ?>
                      <tr>
                      <td><?php echo $s->code; ?></td>
                      <td><?php echo $s->heading; ?></td>
                      <td><?php echo $s->item_name; ?></td>
                      <td><?php echo $s->supplier_name; ?></td>
                      <td><?php echo $s->currency."  ".$s->total_po_amount; ?></td>
                      <td>
                          <?php if($s->flag == 1) { ?><span style="font-weight: bold; color: green;">Active</span>
                          <?php } else { ?><span style="font-weight: bold; color: red;">Deleted</span><?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url().'poDetails/'.$s->id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>
                        <?php if($s->flag == 1) { ?>
                          <?php if(!$s->grs) { ?>
                          <a href="<?php echo base_url().'editPo/'.$s->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                          <a onClick="return JSconfirm('<?php echo $s->id; ?>','<?php echo $s->flag; ?>','<?php echo $s->heading; ?>');" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                          <?php } ?>
                          <a href="<?php echo base_url().'admin/poPdfDownload/'.$s->id ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="View PDF"></i></a>        
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
  $('#POList').DataTable();
});

function JSconfirm(id, flag, name){
  var text = "Do you really want to delete "+name;
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
        window.location = "admin/poStatusChange/"+id+'/'+flag;   
      } else {     
        swal(name+"'s status is still unchanged.");   
      } 
  });
}
</script>