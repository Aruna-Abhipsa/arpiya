<?php
class Admin_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }

	public function checkLogin(){
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$this->db->where(array('email' => $email, 'password' => $password));
		$result = $this->db->get('users'); 

		if(count($result->result()) > 0) { 
			$data = $result->row();
			$userData['id'] = $data->id;
			$userData['email'] = $data->email;
			$userData['username'] = $data->username;
			$userData['loggedIn'] = true;
			$this->session->set_userdata($userData);
			//print_r($this->session->userdata);exit;
			return true;
		} else {
			return false;
		}		
	}

	public function getLatestCode($table){
		$this->db->select('code');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1,0);
		$data = $this->db->get($table)->row();
		return $data;
		//echo $this->db->last_query();exit;
	}
	
	public function getManufacturerList(){
		$this->db->where(array('status' => 1));
		return $this->db->get('manufacturers')->result(); 
	}

	public function getMaterialTypeList(){
		$this->db->where(array('status' => 1));
		return $this->db->get('material_types')->result(); 
	}	

	public function getUmos(){
		return $this->db->get('uoms')->result(); 
	}

	public function saveItem($data){
		if($data['new_make']){
			$string = $data['new_make'];
			$make = ucwords(strtolower($string));
			$result = $this->db->where(array('name' => $make))->get('manufacturers')->result();
			
			if(count($result)) { 
				$data['manufacturer_id'] = $result[0]->id; 
			}
			else {
				$data['new_make'] = ucwords(strtolower($data['new_make']));
				$this->db->insert('manufacturers', array('name' => $data['new_make'], 'status' => 1));
				$data['manufacturer_id'] = $this->db->insert_id();
			}
		}
		if($data['new_material']){
			$string = $data['new_material'];
			$material = ucwords(strtolower($string));
			$result = $this->db->where(array('name' => $material))->get('material_types')->result();
			
			if(count($result)) { 
				$data['material_id'] = $result[0]->id; 
			}
			else {
				$data['new_material'] = ucwords(strtolower($data['new_material']));
				$this->db->insert('material_types', array('name' => $data['new_material'], 'status' => 1));
				$data['material_id'] = $this->db->insert_id();
			}			
		}
		unset($data['new_make']);
		unset($data['new_material']);
		$data['created_by'] = $this->session->userdata('id');
		$data['created_on'] = date('Y-m-d H:i:s');
		$data['flag'] = 1;		
		if(isset($data['id'])){
			$this->db->update('items', $data, array('id' => $data['id']));
			return $data['id'];
		} else {
			$this->db->insert('items', $data);
			return $this->db->insert_id();	
		}			
	}

	public function getItemDetails($id = NULL){
		$this->db->select('items.*, uoms.code as uom_code, uoms.name as uom_name');
		$this->db->join('uoms', 'uoms.id = items.uom_id');
		$this->db->where('items.id', $id);
		$result = $this->db->get('items')->row();
		return $result;
	}	
	
	public function getStateList(){
		return $this->db->get('states')->result(); 
	}

	public function getHelptext($menu){
		$this->db->select('helptexts.text, menus.name');
		$this->db->join('menus', 'helptexts.menu_id = menus.id');
		$this->db->where('menus.name', $menu);
		$data = $this->db->get('helptexts')->row();
		return $data;
		//echo $this->db->last_query();exit;
	}
	
}
