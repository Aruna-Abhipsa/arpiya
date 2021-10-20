<?php
class Gi_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function saveGi($data){
		$gi['date'] = $data['date'];
		$gi['time'] = $data['time'];	
		$gi['issued_against'] = $data['issued_against'];
		$gi['issued_by'] = $data['issued_by'];
		$gi['issue_note'] = $data['issue_note'];
		$gi['po_id'] = $data['po_id'];
		$gi['gr_id'] = $data['gr_id'];
		$gi['storage'] = $data['storage'];
		$gi['quantity'] = $data['quantity'];
		if(isset($data['id'])){
			$gi['modified_by'] = $this->session->userdata('id');
			$gi['modified_on'] = date('Y-m-d');
			$this->db->update('gis', $gi, array('id' => $data['id']));			
			return $gi_id = $data['id'];
		} else {
			$gi['created_by'] = $this->session->userdata('id');
			$gi['created_on'] = date('Y-m-d');
			$this->db->insert('gis', $gi);
			$this->db->update('grs', array('used' => 1), array('id' => $data['gr_id']));
			return $gi_id = $this->db->insert_id();
		}	
	}

	public function getGIDetails($id = null){
		$this->db->select('gis.*, pos.code as po_code, pos.heading, customers.name as c_name, items.code as item_code, items.name as item_name, 
						uoms.code, uoms.name, ib.username as issuer_name, u.username as user_name, us.username as userm_name');
		$this->db->join('pos', 'gis.po_id = pos.id', 'left');
		$this->db->join('grs', 'gis.gr_id = grs.id', 'left');
		$this->db->join('customers', 'gis.issued_against = customers.id', 'left');
		$this->db->join('items', 'pos.item_id = items.id', 'left');
		$this->db->join('uoms', 'uoms.id = items.uom_id', 'left');
		$this->db->join('users as ib', 'gis.issued_by = ib.id', 'left');
		$this->db->join('users as u', 'gis.created_by = u.id', 'left');
		$this->db->join('users as us', 'gis.modified_by = us.id', 'left');
		$this->db->where('gis.id', $id);
		//$this->db->get('gis'); echo $this->db->last_query();exit;
		return $this->db->get('gis')->row();
	}
}
