<?php
class Gr_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function saveGr($data)
	{	
		$gr['po_id'] = $data['po_id'];
		$gr['date'] = $data['date'];
		$gr['time'] = $data['time'];
		$gr['ordered_qty'] = $data['ordered_qty'];
		$gr['received_qty'] = $data['received_qty'];
		$gr['remain_qty'] = $data['remain_qty'];
		$gr['challan_no'] = $data['challan_no'];
		$gr['challan_date'] = $data['challan_date'];
		$gr['challan_time'] = $data['challan_time'];
		$gr['received_by'] = $data['received_by'];
		$gr['comment'] = $data['comment'];
		$gr['flag'] = 1;
		if(isset($data['id'])){
			$gr['modified_by'] = $this->session->userdata('id');
			$gr['modified_on'] = date('Y-m-d');
			$this->db->update('grs', $gr, array('id' => $data['id']));			
			$gr_id = $data['id'];
		} else {
			$gr['created_by'] = $this->session->userdata('id');
			$gr['created_on'] = date('Y-m-d');
			$this->db->insert('grs', $gr);
			$gr_id = $this->db->insert_id();
		}
		// Update po_qty_details update
		$this->db->select('pos.id, po_details.delivery_qty1, po_details.delivery_qty2, po_details.delivery_qty3, 
						po_qty_details.ordered_qty, po_qty_details.received_qty, po_qty_details.remain_qty');
		$this->db->join('po_details', 'pos.id = po_details.po_id', 'left');
		$this->db->join('po_qty_details', 'po_qty_details.po_id = pos.id', 'left');
		$this->db->where('pos.id', $data['po_id']);
		$po = $this->db->get('pos')->row();
		
		$pqd['po_id'] = $data['po_id'];
		$pqd['gr_id'] = $gr_id;
		$pqd['ordered_qty'] = $data['remain_qty'];
		$pqd['received_qty'] = $data['received_qty'];
		$pqd['remain_qty'] = $data['ordered_qty'] - $data['received_qty'];
		if(isset($po->ordered_qty)){
			$this->db->update('po_qty_details', $pqd, array('po_id' => $data['po_id'])); 	
		} else {
			$this->db->insert('po_qty_details', $pqd);
		}
		
		return $gr_id;
	}

	public function getGRDetails($id = null)
	{
		$this->db->select('grs.*, pos.code, pos.heading, po_details.quantity, po_details.hsn, po_details.storage, items.code as item_code, items.name as item_name,
						po_qty_details.ordered_qty as oq, po_qty_details.received_qty as rq, po_qty_details.remain_qty as rmq, u.username as user_name, us.username as userm_name');
		$this->db->join('pos', 'grs.po_id = pos.id', 'left');
		$this->db->join('po_details', 'pos.id = po_details.po_id', 'left');
		$this->db->join('po_qty_details', 'po_qty_details.po_id = pos.id', 'left');
		$this->db->join('items', 'pos.item_id = items.id', 'left');
		$this->db->join('users as u', 'grs.created_by = u.id');
		$this->db->join('users as us', 'grs.modified_by = us.id', 'left');
		$this->db->where('grs.id', $id);
		return $this->db->get('grs')->row();
	}

	public function getGRListAjax($id = null)
	{
		$result['grs'] = $this->db->select("grs.id, grs.received_qty")
						->join('pos', 'grs.po_id = pos.id', 'left')
						->where(array("grs.flag" => 1, "grs.po_id" => $id, "grs.used" => 0))
						->get("grs")->result();
		$result['item'] = $this->db->select("items.name as item_name, uoms.code as uom_code, uoms.name as uom_name")
						->join('pos', 'grs.po_id = pos.id', 'left')
						->join('items', 'pos.item_id = items.id', 'left')
						->join('uoms', 'uoms.id = items.UoM_id', 'left')
						->where(array("grs.flag" => 1, "grs.po_id" => $id))
						->get("grs")->row();
		return $result;
	}
}
