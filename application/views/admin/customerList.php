<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Customer List</h3>
                  <a href="<?php echo base_url().'addCustomer'; ?>" alt="Add Customer" class="fa fa-plus" style="float: right;" data-toggle="tooltip" data-placement="left" title="Add Customer"></a>
                  <div class="tool">
                    <a class="fa fa-question tool" style="float: right;" data-toggle="tooltip" data-placement="left" title=""></a>  
                    <div class="tooltiptext"><?php echo $helptext->text; ?></div>  
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="CustomerList" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Contact Person</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($customers as $c){ ?>
                      <tr>
                      <td><?php echo $c->code; ?></td>
                      <td><?php echo $c->name; ?></td>
                      <td><?php echo $c->person_name; ?></td>
                      <td><?php echo $c->email; ?></td>
                      <td><?php echo $c->phone; ?></td>
                      <td>
                          <?php if($c->flag == 1) { ?><span style="font-weight: bold; color: green;">Active</span>
                          <?php } else { ?><span style="font-weight: bold; color: red;">Deleted</span><?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url().'customerDetails/'.$c->id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>
                        <?php if($c->flag == 1) { ?>
                          <a href="<?php echo base_url().'editCustomer/'.$c->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i></a> 
                          <a onClick="return JSconfirm('<?php echo $c->id; ?>','<?php echo $c->flag; ?>','<?php echo $c->name; ?>');" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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
        $('#CustomerList').DataTable();
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
        window.location = "admin/customerStatusChange/"+id+'/'+flag;   
      } else {     
        swal(name+"'s status is still unchanged.");   
      } 
  });
}
</script>