<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">  
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $supplier->name; ?></h3>
          <a href="<?php echo base_url().'supplierList'; ?>" alt="Supplier List" class="fa fa-arrow-left" style="float: right;" data-toggle="tooltip" data-placement="left" title="Supplier List"></a>                    
      </div>
      <div class="box-body">
        <div class="col-md-12">
          <fieldset>
            <legend>Supplier Information:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-2"><label>Status:</label></div>
                <?php if($supplier->flag == 1) { ?><div class="col-md-10" style="font-weight: bold; color: green;">Active</div>
                <?php } else { ?><div class="col-md-10" style="font-weight: bold; color: red;">Deleted</div><?php } ?>                
              </div>
              <div class="col-md-12">
                <div class="col-md-2"><label>Code:</label></div>
                <div class="col-md-10"><?php echo $supplier->code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2"><label>Name:</label></div>
                <div class="col-md-10"><?php echo $supplier->name; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2"><label>Email:</label></div>
                <div class="col-md-10"><?php echo $supplier->email; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2"><label>Mobile:</label></div>
                <div class="col-md-10"><?php echo $supplier->mobile; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2"><label>Phone1:</label></div>
                <div class="col-md-10"><?php echo $supplier->phone1 ? $supplier->phone1: ''; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2"><label>Phone2:</label></div>
                <div class="col-md-10"><?php echo $supplier->phone2 ? $supplier->phone2: ''; ?></div>
              </div>              
            </div> 
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Person1:</label></div>
                <div class="col-md-7"><?php echo $supplier->person1; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Person2:</label></div>
                <div class="col-md-7"><?php echo $supplier->person2; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Pan No:</label></div>
                <div class="col-md-7"><?php echo $supplier->pan; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>GSTIN No:</label></div>
                <div class="col-md-7"><?php echo $supplier->gstin; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>MSME Regn No.:</label></div>
                <div class="col-md-7"><?php echo $supplier->msme; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Type:</label></div>
                <div class="col-md-7"><?php echo vendorTypeArr[$supplier->type]; ?></div>
              </div>   
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Address Information:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-2"><label>Address1:</label></div>
                <div class="col-md-10"><?php echo $supplier->address1; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2"><label>Address2:</label></div>
                <div class="col-md-10"><?php echo $supplier->address2; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2"><label>City:</label></div>
                <div class="col-md-10"><?php echo $supplier->city; ?></div>
              </div>          
            </div> 
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-4"><label>State:</label></div>
                <div class="col-md-8"><?php echo $supplier->state; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-4"><label>Country:</label></div>
                <div class="col-md-8"><?php echo $supplier->country; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-4"><label>Pin:</label></div>
                <div class="col-md-8"><?php echo $supplier->pin; ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Payment Information:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>Currency:</label></div>
                <div class="col-md-7"><?php echo $supplier->currency; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Account No.:</label></div>
                <div class="col-md-7"><?php echo $supplier->account_no; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Bank Name:</label></div>
                <div class="col-md-7"><?php echo $supplier->bank_name	; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Branch Name:</label></div>
                <div class="col-md-7"><?php echo $supplier->branch; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-5"><label>IFSCode:</label></div>
                <div class="col-md-7"><?php echo $supplier->ifsc_code; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Payment Terms:</label></div>
                <div class="col-md-7"><?php echo $supplier->payment_terms == "Others" ? $supplier->payment_terms_other: $supplier->payment_terms; ?></div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5"><label>Cash Mgmt Group:</label></div>
                <div class="col-md-7"><?php echo cashMgmtGroupArr[$supplier->cash_mgmt_group]; ?></div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <fieldset>
            <legend>Entry Log:</legend>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-4"><label>Created By:</label></div>
                <div class="col-md-8"><?php echo $supplier->user_name; ?></div>
              </div>          
            </div> 
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="col-md-4"><label>Created On:</label></div>
                <div class="col-md-8"><?php echo date("d M Y", strtotime($supplier->created_on)); ?></div>
              </div>
            </div>
          </fieldset>
        </div>
      </div><!-- /.box-body -->      
    </div><!-- /.box -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->   
</div><!-- ./wrapper -->