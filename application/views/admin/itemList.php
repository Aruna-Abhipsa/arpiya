<style>
  
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">     
    <!-- Main content -->
    <section class="content">
    <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Items List</h3>             
              <a href="<?php echo base_url().'addItem'; ?>" alt="Add Item" class="fa fa-plus" style="float: right;" data-toggle="tooltip" data-placement="left" title="Add Item"></a>
              <div class="tool">
                <a class="fa fa-question tool" style="float: right;" data-toggle="tooltip" data-placement="left" title=""></a>  
                <div class="tooltiptext"><?php echo $helptext->text; ?></div>  
              </div> 
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="ItemList" class="table table-bordered table-striped" style="width:100%;">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Manufacturing Make</th>
                    <th>Price (INR)</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($items as $i){ ?>
                  <tr>
                  <td><?php echo $i->code; ?></td>
                  <td><?php echo $i->name; ?></td>
                  <td><?php echo $i->make_name; ?></td>
                  <td><?php echo $i->price; ?></td>
                  <td><?php if($i->flag == 1) { ?><span style="font-weight: bold; color: green;">Active</span>
                      <?php } else { ?><span style="font-weight: bold; color: red;">Deleted</span><?php } ?>
                  </td>
                  <td>
                    <a href="<?php echo base_url().'itemDetails/'.$i->id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>
                    <?php if($i->flag == 1) { ?>
                    <a href="<?php echo base_url().'editItem/'.$i->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>                        
                    <a onClick="return JSconfirm('<?php echo $i->id; ?>');" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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
  $('#ItemList').DataTable();
});

function JSconfirm(id){
	swal({ 
    title: "Delete Item",   
    text: "Do you really wanna delete this item?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Yes",   
    cancelButtonText: "No",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
      if (isConfirm){   
        window.location = "admin/deleteItem/"+id;   
      } else {     
        swal("You item is safe");   
      } 
  });
}
</script>