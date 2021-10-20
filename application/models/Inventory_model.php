<?php
class Inventory_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function saveInventory($data)
	{
		//echo "<pre>";print_r($data);
		unset($data['uom']);
		unset($data['unit_price']);
		if(isset($data['id'])){
			$data['modified_by'] = $this->session->userdata('id');
			$data['modified_on'] = date('Y-m-d');
			$this->db->update('inventory_mis', $data, array('id' => $data['id']));
			return $inventory_id = $data['id'];
		} else {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_on'] = date('Y-m-d');
			$this->db->insert('inventory_mis', $data);
			//echo $this->db->last_query();exit;
			return $inventory_id = $this->db->insert_id();	
		}	
	}

	public function inventoryMisDetails($id = null)
	{
		$this->db->select('pos.*, po_details.total_po_amount, po_details.quantity, po_details.ppu, i.code as item_code, i.name as item_name, i.short_desc, i.price, uoms.code as uom_code, uoms.name as uom_name, 
		u.username as user_name');
		$this->db->join('po_details', 'po_details.po_id = pos.id');
		$this->db->join('items as i', 'pos.item_id = i.id');
		$this->db->join('uoms','i.UoM_id = uoms.id');
		//$this->db->join('grs','grs.po_id = pos.id', 'LEFT');
		//$this->db->join('gis','gis.po_id = pos.id', 'LEFT');
		$this->db->join('users as u', 'pos.created_by = u.id');
		$this->db->where('pos.id', $id);
		$result = $this->db->get('pos')->row();
		$result->received_qty = $this->db->select('SUM(grs.received_qty) as received_qty')->where(array('po_id'=> $id, 'flag' => 1))->get('grs')->row()->received_qty;
		$result->issued_qty = $this->db->select('SUM(gis.quantity) as issued_qty')->where(array('po_id'=> $id, 'flag' => 1))->get('gis')->row()->issued_qty;
		return $result;
		//echo $this->db->last_query();exit;
	}

	public function inventoryMIS($type = null, $from_date = null, $to_date = null, $search = null, $start = null, $limit = null)
	{ 
		$object = new stdClass();	

		$this->db->select('pos.*, po_details.total_po_amount, po_details.quantity, po_details.ppu, i.code as item_code, i.name as item_name, i.short_desc, i.price, 
		uoms.code as uom_code, uoms.name as uom_name, u.username as user_name');
		$this->db->join('po_details', 'po_details.po_id = pos.id', 'LEFT');
		$this->db->join('items as i', 'pos.item_id = i.id', 'LEFT');
		$this->db->join('uoms', 'i.UoM_id = uoms.id', 'LEFT');
		$this->db->join('users as u', 'pos.created_by = u.id', 'LEFT');
		$this->db->where('pos.flag', 1);
		$this->db->where('pos.id IN (SELECT MAX(id) as po_id FROM `pos` GROUP BY item_id)', NULL, FALSE);
		
		if($type == "export"){ 
			$this->db->where('pos.flag', 1);
		}
		if($from_date){ 
			$from_date = date("Y-m-d", strtotime($from_date));
			$this->db->where('pos.created_on >=', $from_date);
		}
		if($to_date){ 
			$to_date = date("Y-m-d", strtotime($to_date));
			$this->db->where('pos.created_on <=', $to_date);
		}
		if($search){
			$this->db->where('(i.name LIKE "%'.$search.'%" OR pos.code LIKE "%'.$search.'%" OR pos.heading LIKE "%'.$search.'%" 
			OR pos.created_on LIKE "%'.$search.'%" OR pos.currency LIKE "%'.$search.'%")');			
		}
		if ($limit || $start) {
			$this->db->limit($limit, $start);
		}
		$result =$this->db->get('pos')->result();	
		//echo $this->db->last_query();exit;
		if(count($result)){	
			foreach($result as  $key => $r){
				$grs = $this->db->select('SUM(grs.received_qty) as received_qty')->where(array('po_id'=> $r->id, 'flag' => 1))->get('grs')->row();
				if($grs->received_qty){
					$r->received_qty = $grs->received_qty? $grs->received_qty: 0;
					$gis = $this->db->select('SUM(gis.quantity) as issued_qty')->where(array('po_id'=> $r->id, 'flag' => 1))->get('gis')->row();		
					$r->issued_qty = $gis->issued_qty? $gis->issued_qty: 0;
				} else {
					$r->received_qty = 0;
					$r->issued_qty = 0;
					unset($result[$key]); 
				}
			}
		} 
		//echo "<pre>"; print_r($result);exit; 
		$object->result = $result;
		$object->count = count($result); 		
		return $object;
	}

	public function countAll()
	{ 
		$this->db->select('inventory_mis.id');
		$this->db->join('items', 'inventory_mis.item_id = items.id');
		$this->db->where('inventory_mis.flag', 1);
		//$this->db->get('pos');echo $this->db->last_query();exit;
		return $this->db->get('inventory_mis')->num_rows();
	}
}
