<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {        
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_model');
		$this->load->model('Customer_model');
		$this->load->model('Supplier_model');
		$this->load->model('Service_model');
		$this->load->model('Po_model');
		$this->load->model('Gr_model');
		$this->load->model('Gi_model');
		$this->load->model('Helptext_model');
	}	
	
	public function login()
	{		
		if($_POST){
			$user = $this->Admin_model->checkLogin($_POST);			
			if($user){redirect(base_url().'dashboard');} 
			else {$this->session->set_flashdata(array('type' => 'error', 'message' => 'Invalid username or password !!!'));}
		}
		$data['subview'] = 'admin/login';
		$this->load->view('admin/common/login_layout', $data);
	}

	public function dashboard()
	{
		//print_r($this->session->userdata);exit;
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['subview'] = 'admin/dashboard';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function itemList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['helptext'] = $this->Admin_model->getHelptext('Items');

		$this->db->select('items.*, manufacturers.name as make_name, material_types.name as material_type');
		$this->db->join('manufacturers', 'items.manufacturer_id = manufacturers.id');
		$this->db->join('material_types', 'items.material_id = material_types.id');
		$items = $this->db->get('items')->result();
		//echo "<pre>";print_r($items);exit;
		$data['items'] = $items; 

		$data['subview'] = 'admin/itemList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addItem()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$itemCode = $this->Admin_model->getLatestCode('items');
		if($itemCode) $data['itemCode'] = ++$itemCode->code;
		else $data['itemCode'] = 10000000;
		$data['manufacturers'] = $this->Admin_model->getManufacturerList();
		$data['materialTypes'] = $this->Admin_model->getMaterialTypeList();
		$data['uoms'] = $this->Admin_model->getUmos();

		if($_POST){
			$itemId = $this->Admin_model->saveItem($_POST);
			if($itemId){
				$this->session->set_flashdata(array('type' => 'success', 'message' => 'Item saved successfully !!!'));
				redirect(base_url().'itemList', 'refresh');
			}
		}

		$data['subview'] = 'admin/addItem';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editItem($id = NULL)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['item'] = $this->Admin_model->getItemDetails($id);
		$data['manufacturers'] = $this->Admin_model->getManufacturerList();
		$data['materialTypes'] = $this->Admin_model->getMaterialTypeList();
		$data['uoms'] = $this->Admin_model->getUmos();

		if($_POST){
			$itemId = $this->Admin_model->saveItem($_POST);
			if($itemId){
				$this->session->set_flashdata(array('type' => 'success', 'message' => 'Item saved successfully !!!'));
				redirect(base_url().'itemList', 'refresh');
			}
		}

		$data['subview'] = 'admin/editItem';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function itemDetails($id = null)
	{
		$this->db->select('items.*, manufacturers.name as make_name, material_types.name as material_type, 
						users.username as user_name, uoms.code as uom_code, uoms.name as uom_name');
		$this->db->join('manufacturers', 'items.manufacturer_id = manufacturers.id', 'left');
		$this->db->join('material_types', 'items.material_id = material_types.id', 'left');
		$this->db->join('uoms', 'items.UoM_id = uoms.id', 'left');
		$this->db->join('users', 'items.created_by = users.id', 'left');
		$this->db->where('items.id', $id);
		$data['item'] = $this->db->get('items')->row();

		$data['subview'] = 'admin/viewItem';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function deleteItem($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->update('items', array('flag' => 0), array('id' => $id));
        redirect(base_url().'itemList', 'refresh');
	}

	public function customerList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['helptext'] = $this->Admin_model->getHelptext('Customers');
		$data['customers'] = $this->db->get('customers')->result();

		$data['subview'] = 'admin/customerList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addCustomer()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$customerCode = $this->Admin_model->getLatestCode('customers');
		if($customerCode) $data['customerCode'] = ++$customerCode->code;
		else $data['customerCode'] = 2000000;
		$data['states'] = $this->Admin_model->getStateList();

		if($_POST){ 
			$customerId = $this->Customer_model->saveCustomer($_POST);
			if($customerId){
				redirect(base_url().'customerList', 'refresh');
			}
		}

		$data['subview'] = 'admin/addCustomer';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function customerDetails($id = null)
	{
		$result = $this->Customer_model->getCustomerDetails($id);		
		$data['customer'] = $result; 

		$data['subview'] = 'admin/customerDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editCustomer($id = null)
	{
		$data['states'] = $this->Admin_model->getStateList();
		$result = $this->Customer_model->getCustomerDetails($id);		
		$data['customer'] = $result; 

		$data['subview'] = 'admin/editCustomer';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function customerStatusChange($id, $flag)
	{
		if($flag == 1) $this->db->update('customers', array('flag' => 0), array('id' => $id));
		else $this->db->update('customers', array('flag' => 1), array('id' => $id));

		redirect(base_url().'customerList', 'refresh');
	}

	public function supplierList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['helptext'] = $this->Admin_model->getHelptext('Suppliers');
		$data['suppliers'] = $this->db->get('suppliers')->result();

		$data['subview'] = 'admin/supplierList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addSupplier()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$supplierCode = $this->Admin_model->getLatestCode('suppliers');
		if($supplierCode) $data['supplierCode'] = ++$supplierCode->code;
		else $data['supplierCode'] = 2000000;

		if($_POST){ 
			$supplierId = $this->Supplier_model->saveSupplier($_POST);
			if($supplierId){
				redirect(base_url().'supplierList', 'refresh');
			}
		}

		$data['subview'] = 'admin/addSupplier';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function supplierDetails($id = null)
	{
		$result = $this->Supplier_model->getSupplierDetails($id);		
		$data['supplier'] = $result; 

		$data['subview'] = 'admin/supplierDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function supplierStatusChange($id, $flag)
	{
		if($flag == 1) $this->db->update('suppliers', array('flag' => 0), array('id' => $id));
		else $this->db->update('suppliers', array('flag' => 1), array('id' => $id));

		redirect(base_url().'supplierList', 'refresh');
	}

	public function editSupplier($id = null)
	{
		$result = $this->Supplier_model->getSupplierDetails($id);		
		$data['supplier'] = $result; 

		$data['subview'] = 'admin/editSupplier';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function serviceList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['helptext'] = $this->Admin_model->getHelptext('Services');

		$this->db->select('services.*, customers.name as cust_name');
		$this->db->join('customers', 'services.customer_id = customers.id');
		$data['services'] = $this->db->get('services')->result();

		$data['subview'] = 'admin/serviceList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addService()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$serviceCode = $this->Admin_model->getLatestCode('services');
		if($serviceCode) $data['serviceCode'] = ++$serviceCode->code;
		else $data['serviceCode'] = 1000;

		$this->db->select('customers.id, customers.name, customers.person_name'); 
		$data['customerList'] = $this->db->get('customers')->result();

		if($_POST){ 
			$serviceId = $this->Service_model->saveService($_POST);
			if($serviceId){
				redirect(base_url().'serviceList', 'refresh');
			}
		}

		$data['subview'] = 'admin/addService';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function serviceDetails($id = null)
	{
		$result = $this->Service_model->getServiceDetails($id);		
		$data['service'] = $result; 

		$data['subview'] = 'admin/serviceDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editService($id = null)
	{
		$result = $this->Service_model->getServiceDetails($id);		
		$data['service'] = $result; 

		$this->db->select('customers.id, customers.name, customers.person_name'); 
		$data['customerList'] = $this->db->get('customers')->result();

		$data['subview'] = 'admin/editService';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function serviceStatusChange($id, $flag)
	{
		$this->db->update('services', array('flag' => 0), array('id' => $id));
		redirect(base_url().'serviceList', 'refresh');
	}

	public function getCustomerDetailsAjax(){
		$id = $_POST['customer_id'];
		$data = $this->Customer_model->getCustomerDetails($id);
		echo json_encode($data);exit;
	}

	public function poList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['helptext'] = $this->Admin_model->getHelptext('POs');

		$this->db->select('pos.*, po_details.total_po_amount, items.name as item_name, suppliers.name as supplier_name');
		$this->db->join('po_details', 'po_details.po_id = pos.id');
		$this->db->join('items', 'pos.item_id = items.id');
		$this->db->join('suppliers', 'pos.vendor_id = suppliers.id');
		//$this->db->join('grs', 'pos.id = grs.po_id');
		//$this->db->get('pos');echo $this->db->last_query();exit;
		$pos = $this->db->get('pos')->result();
		foreach($pos as $po){
			$po->grs = $this->db->select('COUNT(grs.id) as grs')->where(array('po_id' => $po->id, 'flag' => 1))->get('grs')->row()->grs;
		}

		$data['pos'] = $pos;
		$data['subview'] = 'admin/poList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addPo()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$poCode = $this->Admin_model->getLatestCode('pos');
		if($poCode) $data['poCode'] = ++$poCode->code;
		else $data['poCode'] = 1000;

		$this->db->select('suppliers.*'); 
		$data['supplierList'] = $this->db->get('suppliers')->result();

		$this->db->select('items.*'); 
		$data['itemList'] = $this->db->get('items')->result();

		if($_POST){
			//echo "<pre>";print_r($_POST);exit;
			$poId = $this->Po_model->savePo($_POST);
			if($poId){
				redirect(base_url().'poList', 'refresh');
			}
		}

		$data['subview'] = 'admin/addPo';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function poDetails($id = null)
	{
		$result = $this->Po_model->getPoDetails($id);		
		$data['po'] = $result; 

		$data['subview'] = 'admin/poDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editPo($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$result = $this->Po_model->getPoDetails($id);
		$data['po'] = $result;

		$this->db->select('suppliers.*'); 
		$data['supplierList'] = $this->db->get('suppliers')->result();

		$this->db->select('items.*'); 
		$data['itemList'] = $this->db->get('items')->result();

		if($_POST){
			//echo "<pre>";print_r($_POST);exit;
			$poId = $this->Po_model->savePo($_POST);
			if($poId){
				redirect(base_url().'poList', 'refresh');
			}
		}

		$data['subview'] = 'admin/editPo';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function poStatusChange($id = null, $flag = null){
		$this->db->update('pos', array('flag' => 0), array('id' => $id));
		redirect(base_url().'poList', 'refresh');
	}

	public function grList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['helptext'] = $this->Admin_model->getHelptext('GRs');

		$this->db->select('grs.*, pos.heading, po_details.quantity');
		$this->db->join('pos', 'grs.po_id = pos.id', 'left');
		$this->db->join('po_details', 'pos.id = po_details.po_id', 'left');
		$grs = $this->db->get('grs')->result();
		foreach($grs as $gr){
			$gr->gis = $this->db->select('COUNT(gis.id) as gis')->where(array('gr_id' => $gr->id, 'flag' => 1))->get('gis')->row()->gis;
		}

		$data['grs'] = $grs;
		$data['subview'] = 'admin/grList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addGr()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('pos.id, pos.heading, pos.code, po_details.delivery_qty1, po_details.delivery_qty2, po_details.delivery_qty3');
		$this->db->join('po_details', 'pos.id = po_details.po_id', 'left'); 
		$this->db->where('flag', 1);
		//$this->db->get('pos');echo $this->db->last_query();
		$data['poList'] = $this->db->get('pos')->result();

		if($_POST){
			//echo "<pre>";print_r($_POST);exit;
			$grId = $this->Gr_model->saveGr($_POST);
			if($grId){
				redirect(base_url().'grList', 'refresh');
			}
		}

		$data['subview'] = 'admin/addGr';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function grDetails($id = null)
	{
		$result = $this->Gr_model->getGRDetails($id);		
		$data['gr'] = $result; 

		$data['subview'] = 'admin/grDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editGr($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$result = $this->Gr_model->getGRDetails($id);		
		$data['gr'] = $result;

		$this->db->select('pos.*'); 
		$this->db->where('flag', 1);
		$data['poList'] = $this->db->get('pos')->result();

		if($_POST){
			$grId = $this->Gr_model->saveGr($_POST);
			if($grId){
				redirect(base_url().'poList', 'refresh');
			}
		}

		$data['subview'] = 'admin/editGr';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function grStatusChange($id = null, $flag = null){
		$row = $this->db->select("grs.received_qty, grs.remain_qty, po_qty_details.ordered_qty")
						->join('po_qty_details', 'po_qty_details.gr_id = grs.id', 'left')
						->where('grs.id', $id)
						->limit(1)
						->order_by('grs.id',"DESC")
						->get("grs")->row(); 
		//echo $this->db->last_query();echo $row->ordered_qty; exit;
		$ordered_qty = $row->remain_qty + $row->received_qty;
		$this->db->update('po_qty_details', array('ordered_qty' => $ordered_qty), array('gr_id' => $id));
		$this->db->update('grs', array('flag' => 0), array('id' => $id));
		redirect(base_url().'grList', 'refresh');
	}

	public function giList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['helptext'] = $this->Admin_model->getHelptext('GIs');

		$this->db->select('gis.*, pos.heading, customers.name as c_name, items.code as item_code, items.name as item_name, uoms.code, uoms.name,
						ib.username as issued_by, u.username as user_name, us.username as userm_name');
		$this->db->join('pos', 'pos.id = gis.po_id', 'left');
		$this->db->join('customers', 'gis.issued_against = customers.id', 'left');
		$this->db->join('items', 'pos.item_id = items.id', 'left');
		$this->db->join('uoms', 'uoms.id = items.uom_id', 'left');
		$this->db->join('users as ib', 'gis.issued_by = ib.id', 'left');
		$this->db->join('users as u', 'gis.created_by = u.id', 'left');
		$this->db->join('users as us', 'gis.modified_by = us.id', 'left');
		//$this->db->get('gis'); echo $this->db->last_query();exit;
		$data['gis'] = $this->db->get('gis')->result();

		$data['subview'] = 'admin/giList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addGi()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('customers.id, customers.code, customers.name');
		$data['customerList'] = $this->db->get('customers')->result();

		$this->db->select('pos.id, pos.code, pos.heading')->distinct()->join('grs', 'grs.po_id = pos.id')->where('grs.used', 0);
		$data['poList'] = $this->db->get('pos')->result();

		if($_POST){
			$giId = $this->Gi_model->saveGi($_POST);
			if($giId){
				redirect(base_url().'giList', 'refresh');
			}
		}

		$data['subview'] = 'admin/addGi';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function giDetails($id = null)
	{
		$result = $this->Gi_model->getGIDetails($id);		
		$data['gi'] = $result; 

		$data['subview'] = 'admin/giDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editGi($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('customers.id, customers.code, customers.name');
		$data['customerList'] = $this->db->get('customers')->result();

		$this->db->select('pos.id, pos.code, pos.heading')->distinct()->join('grs', 'grs.po_id = pos.id');
		$data['poList'] = $this->db->get('pos')->result();
		
		$result = $this->Gi_model->getGIDetails($id);		
		$data['gi'] = $result;

		$this->db->select('grs.id, grs.received_qty')->join('pos', 'grs.po_id = pos.id', 'left')->where('pos.id', $result->po_id);
		$data['grList'] = $this->db->get('grs')->result();

		if($_POST){
			$grId = $this->Gr_model->saveGr($_POST);
			if($grId){
				redirect(base_url().'giList', 'refresh');
			}
		}

		$data['subview'] = 'admin/editGi';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function giStatusChange($id = null){ 
		$this->db->update('gis', array('flag' => 0), array('id' => $id));
		$gi = $this->db->select('gis.gr_id')->where('gis.id', $id)->get("gis")->row();
		$this->db->update('grs', array('used' => 0), array('id' => $gi->gr_id));

		redirect(base_url().'giList', 'refresh');
	}

	public function getGRListAjax()
	{
		$id = $_POST['po_id'];
		$data = $this->Gr_model->getGRListAjax($id);
		echo json_encode($data);exit;
	}

	public function getVendorDetailsAjax(){
		$id = $_POST['vendor_id'];
		$data = $this->Supplier_model->getSupplierDetails($id);
		echo json_encode($data);exit;
	}

	public function getItemDetailsAjax(){
		$id = $_POST['item_id'];
		$data = $this->Admin_model->getItemDetails($id);
		echo json_encode($data);exit;
	}

	public function getPoDetailsAjax(){
		$id = $_POST['po_id'];
		$data = $this->Po_model->getPoDetailsAjax($id);
		echo json_encode($data);exit;
	}

	function poPdfDownload($id = null)
    {
		$mpdf = new \Mpdf\Mpdf();

		$data['po'] = $this->Po_model->getPoDetails($id);        
        $data['title'] = $data['po']->heading;
		//$this->load->view('admin/poDetailsPdf',$data);
		$html = $this->load->view('admin/poDetailsPdf',$data, true);
       
        $mpdf->WriteHTML($html);
        $mpdf->Output($data['title'].time().'.pdf','I');
		//redirect(base_url().'poList', 'refresh');
        exit();
    }

	public function helptextList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('helptexts.*, menus.name');
		$this->db->join('menus', 'menus.id = helptexts.menu_id', 'left');
		$data['helptexts'] = $this->db->get('helptexts')->result();

		$data['subview'] = 'admin/helptextList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addHelptext(){
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('menus.*'); 
		$data['menuList'] = $this->db->get('menus')->result();

		if($_POST){
			//echo "<pre>";print_r($_POST);exit;
			$htId = $this->Helptext_model->saveHelptext($_POST);
			if($htId){
				redirect(base_url().'helptextList', 'refresh');
			}
		}

		$data['subview'] = 'admin/addHelptext';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editHelptext($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('menus.*'); 
		$data['menuList'] = $this->db->get('menus')->result();

		$this->db->select('helptexts.*');
		$this->db->where('helptexts.id', $id);
		$data['helptext'] = $this->db->get('helptexts')->row();

		$data['subview'] = 'admin/editHelptext';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function htDetails($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['helptext'] = $this->Helptext_model->getHTDetails($id);

		$data['subview'] = 'admin/htDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('loggedIn');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
}