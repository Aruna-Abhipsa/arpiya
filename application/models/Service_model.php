<?php
class Service_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function saveService($data){
		$data['date'] = date("Y-m-d", strtotime($data['date']));  
		$data['amount'] = $data['price'];
		$data['created_by'] = $this->session->userdata('id');
		$data['created_on'] = date('Y-m-d H:i:s');
		unset($data['cust_address']);
		unset($data['cust_contact']);
		unset($data['price']);
		//echo "<pre>";print_r($data);exit;
		if(isset($data['id'])){
			$this->db->update('services', $data, array('id' => $data['id']));
			return $service_id = $data['id'];
		} else {
			$this->db->insert('services', $data);
			return $service_id = $this->db->insert_id();	
		}	
	}

	public function getServiceDetails($id = null){
		$this->db->select('services.*, customers.name as cust_name, customers.address, customers.phone, users.username as user_name');
		$this->db->join('customers', 'services.customer_id = customers.id', 'left');
		$this->db->join('users', 'services.created_by = users.id', 'left');
		$this->db->where('services.id', $id);
		return $this->db->get('services')->row();
	}

	public function serviceMIS($from_date = null, $to_date = null, $search = null, $start = null, $limit = null){
		$this->db->select('services.*, customers.name as cust_name, customers.address, customers.phone, users.username as user_name');
		$this->db->join('customers', 'services.customer_id = customers.id', 'left');
		$this->db->join('users', 'services.created_by = users.id', 'left');
		$this->db->where('services.flag', 1);
		if($from_date){ 
			$from_date = date("Y-m-d", strtotime($from_date));
			$this->db->where('services.date >=', $from_date);
		}
		if($to_date){ 
			$to_date = date("Y-m-d", strtotime($to_date));
			$this->db->where('services.date <=', $to_date);
		}
		if($search){
			$this->db->where('(services.code LIKE "%'.$search.'%" OR customers.name LIKE "%'.$search.'%" 
			OR services.created_by LIKE "%'.$search.'%" OR users.username LIKE "%'.$search.'%" OR services.amount LIKE "%'.$search.'%")');
		}
		if ($limit || $start) {
			$this->db->limit($limit, $start);
		}
		//$this->db->get('services');echo $this->db->last_query();exit;
		return $this->db->get('services');
	}

	public function countAll(){ 
		$this->db->select('services.*, customers.name as cust_name, customers.address, customers.phone, users.username as user_name');
		$this->db->join('customers', 'services.customer_id = customers.id', 'left');
		$this->db->join('users', 'services.created_by = users.id', 'left');
		$this->db->where('services.flag', 1);
		//$this->db->get('pos');echo $this->db->last_query();exit;
		return $this->db->get('services')->num_rows();
	}
}
