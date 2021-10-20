<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="treeview <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
        <a href="<?php echo base_url().'dashboard'; ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
        </a>              
      </li>    
      <li class="treeview <?php if($this->uri->segment(1)=="itemList" || $this->uri->segment(1)=="addItem" || $this->uri->segment(1)=="editItem" || $this->uri->segment(1)=="itemDetails" || $this->uri->segment(1)=="customerList" || $this->uri->segment(1)=="addCustomer" || $this->uri->segment(1)=="customerDetails" || $this->uri->segment(1)=="editCustomer"
      || $this->uri->segment(1)=="supplierList" || $this->uri->segment(1)=="addSupplier" || $this->uri->segment(1)=="supplierDetails" || $this->uri->segment(1)=="editSupplier" || $this->uri->segment(1)=="serviceList" || $this->uri->segment(1)=="addService" || $this->uri->segment(1)=="serviceDetails" || $this->uri->segment(1)=="editService"){echo "active";}?>">
        <a href="#">
          <i class="fa fa-fw fa-database"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment(1)=="itemList" || $this->uri->segment(1)=="addItem" || $this->uri->segment(1)=="editItem" || $this->uri->segment(1)=="itemDetails"){echo "active";}?>"><a href="<?php echo base_url().'itemList'; ?>"><i class="fa fa-circle-o"></i> Materials Master</a></li>
          <li class="<?php if($this->uri->segment(1)=="supplierList" || $this->uri->segment(1)=="addSupplier" || $this->uri->segment(1)=="supplierDetails" || $this->uri->segment(1)=="editSupplier") echo 'active'; ?>"><a href="<?php echo base_url().'supplierList'; ?>"><i class="fa fa-circle-o"></i> Supplier Master</a></li>
          <li class="<?php if($this->uri->segment(1)=="customerList" || $this->uri->segment(1)=="addCustomer" || $this->uri->segment(1)=="customerDetails" || $this->uri->segment(1)=="editCustomer") echo 'active'; ?>"><a href="<?php echo base_url().'customerList'; ?>"><i class="fa fa-circle-o"></i> Customer Master</a></li>
          <li class="<?php if($this->uri->segment(1)=="serviceList" || $this->uri->segment(1)=="addService" || $this->uri->segment(1)=="serviceDetails" || $this->uri->segment(1)=="editService") echo 'active'; ?>"><a href="<?php echo base_url().'serviceList'; ?>"><i class="fa fa-circle-o"></i> Service Master</a></li>
        </ul>             
      </li>
      <li class="treeview <?php if($this->uri->segment(1)=="poList" || $this->uri->segment(1)=="addPo" || $this->uri->segment(1)=="poDetails" || $this->uri->segment(1)=="editPo" || $this->uri->segment(1)=="grList" || $this->uri->segment(1)=="addGr" 
      || $this->uri->segment(1)=="grDetails" || $this->uri->segment(1)=="editGr" || $this->uri->segment(1)=="giList" || $this->uri->segment(1)=="addGi" || $this->uri->segment(1)=="giDetails" || $this->uri->segment(1)=="editGi") echo "active"; ?>">
        <a href="#">
          <i class="fa fa-fw fa-money"></i> <span>Transactional Screen</span> <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment(1)=="poList" || $this->uri->segment(1)=="addPo" || $this->uri->segment(1)=="poDetails" || $this->uri->segment(1)=="editPo") echo "active"; ?>"><a href="<?php echo base_url().'poList'; ?>"><i class="fa fa-circle-o"></i> Purchase Order</a></li>
          <li class="<?php if($this->uri->segment(1)=="grList" || $this->uri->segment(1)=="addGr" || $this->uri->segment(1)=="grDetails" || $this->uri->segment(1)=="editGr") echo "active"; ?>"><a href="<?php echo base_url().'grList'; ?>"><i class="fa fa-circle-o"></i> Goods Receipts</a></li>
          <li class="<?php if($this->uri->segment(1)=="giList" || $this->uri->segment(1)=="addGi" || $this->uri->segment(1)=="giDetails" || $this->uri->segment(1)=="editGi") echo "active"; ?>"><a href="<?php echo base_url().'giList'; ?>"><i class="fa fa-circle-o"></i> Goods Issue</a></li>
        </ul>             
      </li>
      <li class="treeview <?php if($this->uri->segment(1)=="procurementMis" || $this->uri->segment(1)=="poMisDetails" || $this->uri->segment(1)=="serviceMis" || $this->uri->segment(1)=="serviceMisDetails" ||
          $this->uri->segment(1)=="addSale" || $this->uri->segment(1)=="saleList" || $this->uri->segment(1)=="saleMisDetails" || $this->uri->segment(1)=="editSaleMis" ||
          $this->uri->segment(1)=="addInventory" || $this->uri->segment(1)=="inventoryList" || $this->uri->segment(1)=="inventoryMisDetails" || $this->uri->segment(1)=="editInventoryMis" ||
          $this->uri->segment(1)=="addAmc" || $this->uri->segment(1)=="amcList" || $this->uri->segment(1)=="amcMisDetails" || $this->uri->segment(1)=="editAmcMis") echo "active"; ?>">
        <a href="#">
          <i class="fa fa-fw fa-file"></i> <span>MIS Reports</span> <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment(1)=="procurementMis" || $this->uri->segment(1)=="poMisDetails") echo "active"; ?>"><a href="<?php echo base_url().'procurementMis'; ?>"><i class="fa fa-circle-o"></i> Procurement MIS</a></li>
          <li class="<?php if($this->uri->segment(1)=="addSale" || $this->uri->segment(1)=="saleList" || $this->uri->segment(1)=="saleMisDetails" || $this->uri->segment(1)=="editSaleMis") echo "active"; ?>"><a href="<?php echo base_url().'saleList'; ?>"><i class="fa fa-circle-o"></i> Sales MIS</a></li>
          <li class="<?php if($this->uri->segment(1)=="serviceMis" || $this->uri->segment(1)=="serviceMisDetails") echo "active"; ?>"><a href="<?php echo base_url().'serviceMis'; ?>"><i class="fa fa-circle-o"></i> Service MIS</a></li>
          <li class="<?php if($this->uri->segment(1)=="addAmc" || $this->uri->segment(1)=="amcList" || $this->uri->segment(1)=="amcMisDetails" || $this->uri->segment(1)=="editAmcMis") echo "active"; ?>"><a href="<?php echo base_url().'amcList'; ?>"><i class="fa fa-circle-o"></i> AMC MIS</a></li>
          <li class="<?php if($this->uri->segment(1)=="addInventory" || $this->uri->segment(1)=="inventoryList" || $this->uri->segment(1)=="inventoryMisDetails" || $this->uri->segment(1)=="editInventoryMis") echo "active"; ?>"><a href="<?php echo base_url().'inventoryList'; ?>"><i class="fa fa-circle-o"></i> Inventory MIS</a></li>
        </ul>             
      </li>
      <li class="treeview <?php if($this->uri->segment(1)=="helptextList" || $this->uri->segment(1)=="addHT" || $this->uri->segment(1)=="htDetails" || $this->uri->segment(1)=="editHT"){echo "active";}?>">
        <a href="<?php echo base_url().'helptextList'; ?>">
          <i class="fa fa-fw fa-file-text"></i> <span>Help Text</span> 
        </a>              
      </li> 
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>