<?php
class Sale_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function saveSale($data)
	{
		//echo "<pre>";print_r($data);
		unset($data['customer_name']);
		unset($data['delivery_address']);
		unset($data['contact']);
		unset($data['item_name']);
		if(isset($data['id'])){
			$data['modified_by'] = $this->session->userdata('id');
			$data['modified_on'] = date('Y-m-d');
			$this->db->update('sales_mis', $data, array('id' => $data['id']));
			return $sale_id = $data['id'];
		} else {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_on'] = date('Y-m-d');
			$this->db->insert('sales_mis', $data);
			//echo $this->db->last_query();exit;
			return $sale_id = $this->db->insert_id();	
		}	
	}

	public function saleMisDetails($id = null)
	{
		$this->db->select('sales_mis.*, i.code as item_code, i.name as item_name, u.username as user_name, 
						  c.code as customer_code, c.name as customer_name, c.address as customer_address, c.phone as contact');		
		$this->db->join('items as i', 'sales_mis.item_id = i.id');
		$this->db->join('customers as c', 'sales_mis.customer_id = c.id');
		$this->db->join('users as u', 'sales_mis.created_by = u.id');
		$this->db->where('sales_mis.id', $id);
		//$this->db->get('sales_mis');echo $this->db->last_query();exit;
		return $this->db->get('sales_mis')->row();
	}

	public function saleMIS($type = null, $from_date = null, $to_date = null, $search = null, $start = null, $limit = null){ 
		$this->db->select('sales_mis.*, i.code as item_code, i.name as item_name, u.username as user_name, 
						c.code as customer_code, c.name as customer_name, c.address as customer_address, c.phone as contact');
		$this->db->join('customers as c', 'sales_mis.customer_id = c.id');
		$this->db->join('items as i', 'sales_mis.item_id = i.id');
		$this->db->join('users as u', 'sales_mis.created_by = u.id');
		if($type == "export"){ 
			$this->db->where('sales_mis.flag', 1);
		}
		if($from_date){ 
			$from_date = date("Y-m-d", strtotime($from_date));
			$this->db->where('sales_mis.created_on >=', $from_date);
		}
		if($to_date){ 
			$to_date = date("Y-m-d", strtotime($to_date));
			$this->db->where('sales_mis.created_on <=', $to_date);
		}
		if($search){
			$this->db->where('(sales_mis.quote_no LIKE "%'.$search.'%" OR sales_mis.sales_order LIKE "%'.$search.'%" 
			OR c.name LIKE "%'.$search.'%" OR sales_mis.total LIKE "%'.$search.'%" OR sales_mis.created_on LIKE "%'.$search.'%")');			
		}
		if ($limit || $start) {
			$this->db->limit($limit, $start);
		}
		//$this->db->get('sales_mis');echo $this->db->last_query();exit;
		return $this->db->get('sales_mis');
	}

	public function countAll(){ 
		$this->db->select('sales_mis.id');
		$this->db->join('customers', 'sales_mis.customer_id = customers.id');
		$this->db->join('items', 'sales_mis.item_id = items.id');
		$this->db->where('sales_mis.flag', 1);
		//$this->db->get('pos');echo $this->db->last_query();exit;
		return $this->db->get('sales_mis')->num_rows();
	}
}
