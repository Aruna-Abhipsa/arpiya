<?php
class Helptext_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function saveHelptext($data){
		//echo "<pre>"; print_r($data);exit;
		if(isset($data['id'])){
			$data['modified_by'] = $this->session->userdata('id');
			$data['modified_on'] = date('Y-m-d');
			$this->db->update('helptexts', $data, array('id' => $data['id']));			
			return $ht_id = $data['id'];
		} else {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_on'] = date('Y-m-d');
			$this->db->insert('helptexts', $data);
			return $ht_id = $this->db->insert_id();
		}	
	}

	public function getHTDetails($id = null){
		$this->db->select('helptexts.*, menus.name, u.username as user_name, us.username as userm_name');
		$this->db->join('menus', 'menus.id = helptexts.menu_id', 'left');
		$this->db->where('helptexts.id', $id);
		$this->db->join('users as u', 'helptexts.created_by = u.id', 'left');
		$this->db->join('users as us', 'helptexts.modified_by = us.id', 'left');
		$this->db->where('helptexts.id', $id);
		return $this->db->get('helptexts')->row();
	}
}
