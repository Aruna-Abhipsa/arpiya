<?php
class Amc_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function saveAmc($data)
	{		
		unset($data['customer_name']);
		unset($data['address']);
		unset($data['contact']);
		if($data['amc_status'] == 2){
			$data['paid_by'] = $data['amount'] = $data['tax'] = $data['tax_amount'] = $data['total'] = 0;
			$data['start_date'] = $data['amc_valid_till'] = $data['paid_service_date'] = $data['next_service_date'] = $data['reminder_date'] = '0000-00-00';			
		}
		if($data['warrenty_status'] == 2){
			$data['warrenty_valid_till'] = $data['free_service_date'] = '0000-00-00';	
		}
		if($data['extend_warrenty_status'] == 2){
			$data['extend_warrenty_valid_till'] = '0000-00-00';	
		}
		if(isset($data['id'])){
			$data['modified_by'] = $this->session->userdata('id');
			$data['modified_on'] = date('Y-m-d');
			$this->db->update('amc_mis', $data, array('id' => $data['id']));
			return $saleamc_id = $data['id'];
		} else {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_on'] = date('Y-m-d');
			$this->db->insert('amc_mis', $data);
			//echo $this->db->last_query();exit;
			return $amc_id = $this->db->insert_id();	
		}	
	}

	public function amcMisDetails($id = null)
	{
		$this->db->select('amc_mis.*, i.code as item_code, i.name as item_name, u.username as user_name, 
						  c.code as customer_code, c.name as customer_name, c.address as address, c.phone as contact');		
		$this->db->join('items as i', 'amc_mis.item_id = i.id');
		$this->db->join('customers as c', 'amc_mis.customer_id = c.id');
		$this->db->join('users as u', 'amc_mis.created_by = u.id');
		$this->db->where('amc_mis.id', $id);
		//$this->db->get('amc_mis');echo $this->db->last_query();exit;
		return $this->db->get('amc_mis')->row();
	}

	public function amcMIS($type = null, $from_date = null, $to_date = null, $search = null, $start = null, $limit = null){ 
		$this->db->select('amc_mis.*, i.code as item_code, i.name as item_name, u.username as user_name, 
						c.code as customer_code, c.name as customer_name, c.address as customer_address, c.phone as contact');
		$this->db->join('customers as c', 'amc_mis.customer_id = c.id');
		$this->db->join('items as i', 'amc_mis.item_id = i.id');
		$this->db->join('users as u', 'amc_mis.created_by = u.id');
		if($type == "export"){ 
			$this->db->where('amc_mis.flag', 1);
		}
		if($from_date){ 
			$from_date = date("Y-m-d", strtotime($from_date));
			$this->db->where('amc_mis.created_on >=', $from_date);
		}
		if($to_date){ 
			$to_date = date("Y-m-d", strtotime($to_date));
			$this->db->where('amc_mis.created_on <=', $to_date);
		}
		if($search){
			if(strtolower($search) == "no") { $amc_status = "2"; } 
			elseif(strtolower($search) == "yes") { $amc_status = "1"; }
			else { $amc_status = $search; }
			$this->db->where('(amc_mis.invoice_no LIKE "%'.$search.'%" OR c.name LIKE "%'.$search.'%" OR i.name LIKE "%'.$search.'%" OR amc_mis.total LIKE "%'.$search.'%" 
			OR amc_mis.amc_status LIKE "%'.$amc_status.'%" OR amc_mis.next_service_date LIKE "%'.$search.'%" OR amc_mis.created_on LIKE "%'.$search.'%")');			
		}
		if ($limit || $start) {
			$this->db->limit($limit, $start);
		}
		//$this->db->get('amc_mis');echo $this->db->last_query();exit;
		return $this->db->get('amc_mis');
	}

	public function countAll(){ 
		$this->db->select('amc_mis.id');
		$this->db->join('customers', 'amc_mis.customer_id = customers.id');
		$this->db->join('items', 'amc_mis.item_id = items.id');
		//$this->db->where('amc_mis.flag', 1);
		//$this->db->get('pos');echo $this->db->last_query();exit;
		return $this->db->get('amc_mis')->num_rows();
	}
}
