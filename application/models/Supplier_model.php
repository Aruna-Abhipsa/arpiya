<?php
class Supplier_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }

	public function saveSupplier($data)
	{
		//echo"<pre>"; print_r($data);exit;
		$supplier['code'] = $data['code'];
		$supplier['name'] = $data['name'];
		$supplier['email'] = $data['email'];
		$supplier['mobile'] = $data['mobile'];
		$supplier['phone1'] = $data['phone1'];
		$supplier['phone2'] = $data['phone2'];
		$supplier['person1'] = $data['person1'];
		$supplier['person2'] = $data['person2'];
		$supplier['address1'] = $data['address1'];
		$supplier['address2'] = $data['address2'];
		$supplier['city'] = $data['city'];
		$supplier['state'] = $data['state'];
		$supplier['country'] = $data['country'];
		$supplier['pin'] = $data['pin'];
		$supplier['flag'] = 1;
		$supplier['created_by'] = $this->session->userdata('id');
		$supplier['created_on'] = date('Y-m-d H:i:s');
		if(isset($data['id'])){
			$this->db->update('suppliers', $supplier, array('id' => $data['id']));
			$supplier_id = $data['id'];
		} else {
			$this->db->insert('suppliers', $supplier);
			$supplier_id = $this->db->insert_id();	
		}

		if($supplier_id){
			$supplierDtls['supplier_id'] = $supplier_id;
			$supplierDtls['currency'] = $data['currency'];
			$supplierDtls['payment_terms'] = $data['payment_terms'];
			$supplierDtls['payment_terms_other'] = '';
			if($data['payment_terms'] == "Others"){
				$supplierDtls['payment_terms_other'] = ucwords(strtolower($data['payment_terms_other']));						
			}			
			$supplierDtls['type'] = $data['type'];
			$supplierDtls['gstin'] = $data['gstin'];
			$supplierDtls['pan'] = $data['pan'];
			$supplierDtls['msme'] = $data['msme'];
			$supplierDtls['bank_name'] = $data['bank_name'];
			$supplierDtls['account_no'] = $data['account_no'];
			$supplierDtls['ifsc_code'] = $data['ifsc_code'];
			$supplierDtls['branch'] = $data['branch'];
			$supplierDtls['cash_mgmt_group'] = $data['cash_mgmt_group'];
			if(isset($data['id'])){
				$this->db->update('supplier_details', $supplierDtls, array('supplier_id' => $data['id']));
				return $data['id'];
			} else {
				$this->db->insert('supplier_details', $supplierDtls); 
				return $supplier_id;	
			}			
		}
	}

	public function getSupplierDetails($id = null)
	{
		$this->db->select('suppliers.*, supplier_details.*, users.username as user_name');
		$this->db->join('supplier_details', 'suppliers.id = supplier_details.supplier_id');
		$this->db->join('users', 'suppliers.created_by = users.id');
		$this->db->where('suppliers.id', $id);
		//$this->db->get('suppliers'); echo $this->db->last_query();exit;
		return $this->db->get('suppliers')->row();
	}
}
