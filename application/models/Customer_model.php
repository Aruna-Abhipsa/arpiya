<?php
class Customer_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function saveCustomer($data){
		$customer['code'] = $data['code'];
		$customer['name'] = $data['name'];
		$customer['email'] = $data['email'];
		$customer['address'] = $data['address'];
		$customer['state_id'] = $data['state_id'];
		$customer['pin'] = $data['pin'];
		$customer['person_name'] = $data['person_name'];
		$customer['phone'] = $data['phone'];
		$customer['created_by'] = $this->session->userdata('id');
		$customer['created_on'] = date('Y-m-d H:i:s');
		$customer['flag'] = 1;
		//echo "<pre>";print_r($customer);exit;
		if(isset($data['id'])){
	        $customer['id'] = $data['id'];
			$this->db->update('customers', $customer, array('id' => $data['id']));
			$customer_id = $data['id'];
		} else {
			$this->db->insert('customers', $customer);
			$customer_id = $this->db->insert_id();	
		}		

		if($customer_id){
			$customerDtls['customer_id'] = $customer_id;
			$customerDtls['pan'] = $data['pan'];
			$customerDtls['payment_terms'] = $data['payment_terms'];
			$customerDtls['credit_period'] = $data['credit_period'];
			$customerDtls['bank_name'] = $data['bank_name'];
			$customerDtls['account_no'] = $data['account_no'];
			$customerDtls['ifsc_code'] = $data['ifsc_code'];
			if(isset($data['id'])){
				$this->db->update('customer_details', $customerDtls, array('customer_id' => $data['id']));
				return $data['id'];
			} else {
				$this->db->insert('customer_details', $customerDtls);
				return $customer_id;	
			}			
		}
	}

	public function getCustomerDetails($id){
		$this->db->select('customers.*, customer_details.*, states.name as state_name, users.username as user_name');
		$this->db->join('customer_details', 'customers.id = customer_details.customer_id');
		$this->db->join('states', 'customers.state_id = states.id');
		$this->db->join('users', 'customers.created_by = users.id');
		$this->db->where('customers.id', $id);
		return $this->db->get('customers')->row();
	}
}
