<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'admin/login';
$route['dashboard'] = 'admin/dashboard';
$route['itemList'] = 'admin/itemList';
$route['addItem'] = 'admin/addItem';
$route['editItem/(:any)'] = 'admin/editItem/$1';
$route['itemDetails/(:any)'] = 'admin/itemDetails/$1';

$route['customerList'] = 'admin/customerList';
$route['addCustomer'] = 'admin/addCustomer';
$route['customerDetails/(:any)'] = 'admin/customerDetails/$1';
$route['editCustomer/(:any)'] = 'admin/editCustomer/$1';

$route['supplierList'] = 'admin/supplierList';
$route['addSupplier'] = 'admin/addSupplier';
$route['supplierDetails/(:any)'] = 'admin/supplierDetails/$1';
$route['editSupplier/(:any)'] = 'admin/editSupplier/$1';

$route['serviceList'] = 'admin/serviceList';
$route['addService'] = 'admin/addService';
$route['serviceDetails/(:any)'] = 'admin/serviceDetails/$1';
$route['editService/(:any)'] = 'admin/editService/$1';

$route['poList'] = 'admin/poList';
$route['addPo'] = 'admin/addPo';
$route['poDetails/(:any)'] = 'admin/poDetails/$1';
$route['editPo/(:any)'] = 'admin/editPo/$1';

$route['grList'] = 'admin/grList';
$route['addGr'] = 'admin/addGr';
$route['grDetails/(:any)'] = 'admin/grDetails/$1';
$route['editGr/(:any)'] = 'admin/editGr/$1';

$route['giList'] = 'admin/giList';
$route['addGi'] = 'admin/addGi';
$route['giDetails/(:any)'] = 'admin/giDetails/$1';
$route['editGi/(:any)'] = 'admin/editGi/$1';

$route['helptextList'] = 'admin/helptextList';
$route['addHT'] = 'admin/addHelptext';
$route['htDetails/(:any)'] = 'admin/htDetails/$1';
$route['editHT/(:any)'] = 'admin/editHelptext/$1';

$route['procurementMis'] = 'report/procurementMis';
$route['poMisDetails/(:any)'] = 'report/poMisDetails/$1';
$route['serviceMis'] = 'report/serviceMis';
$route['serviceMisDetails/(:any)'] = 'report/serviceMisDetails/$1';

$route['saleList'] = 'report/saleList';
$route['addSale'] = 'report/addSale';
$route['saleMisDetails/(:any)'] = 'report/saleMisDetails/$1';
$route['editSaleMis/(:any)'] = 'report/editSaleMis/$1';

$route['inventoryList'] = 'report/inventoryList';
$route['addInventory'] = 'report/addInventory';
$route['inventoryMisDetails/(:any)'] = 'report/inventoryMisDetails/$1';
$route['editInventoryMis/(:any)'] = 'report/editInventoryMis/$1';

$route['amcList'] = 'report/amcList';
$route['addAmc'] = 'report/addAmc';
$route['amcMisDetails/(:any)'] = 'report/amcMisDetails/$1';
$route['editAmcMis/(:any)'] = 'report/editAmcMis/$1';

$route['logout'] = 'admin/logout';
