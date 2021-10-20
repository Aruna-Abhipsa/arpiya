<?php
class Po_model extends CI_Model {
	public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
    }
	
	public function savePo($data){
		$po['code'] = $data['code'];
		$po['heading'] = $data['heading'];
		$po['vendor_id'] = $data['vendor_id'];
		$po['item_id'] = $data['item_id'];
		$po['currency'] = $data['currency'];
		$po['created_by'] = $this->session->userdata('id');
		$po['created_on'] = date('Y-m-d');
		if(isset($data['id'])){
			unset($po['created_by']);
			unset($po['created_on']);
			$po['modified_by'] = $this->session->userdata('id');
			$po['modified_on'] = date('Y-m-d');
			$this->db->update('pos', $po, array('id' => $data['id']));			
			$po_id = $data['id'];
		} else {
			$this->db->insert('pos', $po);
			$po_id = $this->db->insert_id();
		}	
		if($po_id){
			$poDtls['po_id'] = $po_id;
			$delivery_date = explode(",", $data['delivery_date']);
			$poDtls['delivery_date'] = $delivery_date[0];
			if(isset($delivery_date[1]))$poDtls['delivery_date2'] = $delivery_date[1];
			if(isset($delivery_date[2]))$poDtls['delivery_date3'] = $delivery_date[2];
			$poDtls['base_amount'] = $data['base_amount'];
			$poDtls['tax_type'] = $data['tax_type'];
			$poDtls['tax_percentage'] = $data['tax_percentage'];
			$poDtls['tax_amount'] = $data['tax_amount'];
			$poDtls['discount'] = $data['discount'];
			$poDtls['insurance'] = $data['insurance'];
			$poDtls['freight'] = $data['freight'];
			$poDtls['custom'] = $data['custom'];
			$poDtls['extra'] = $data['extra'];
			$poDtls['packaging'] = $data['packaging'];
			$poDtls['total_po_amount'] = $data['total_po_amount'];
			$poDtls['quantity'] = $data['quantity'];
			$poDtls['delivery_qty1'] = $data['delivery_qty1'];
			$poDtls['delivery_qty2'] = $data['delivery_qty2'];
			$poDtls['delivery_qty3'] = $data['delivery_qty3'];
			$poDtls['amount'] = $data['amount'];
			$poDtls['storage'] = $data['storage'];
			//$poDtls['delivery_date'] = date("Y-m-d", strtotime($data['delivery_date'])); 
			$poDtls['ppu'] = $data['ppu'];
			$poDtls['hsn'] = $data['hsn'];
			$poDtls['recipient'] = $data['recipient'];

			if(isset($data['id'])){
				$this->db->update('po_details', $poDtls, array('po_id' => $data['id']));
				$this->db->update('po_qty_details', array('ordered_qty' => $data['quantity']), array('po_id' => $data['id']));
				return $data['id'];
			} else { 
				$this->db->insert('po_details', $poDtls);

				// Insert into po_qty_details
				$data['delivery_qty2'] = !$data['delivery_qty2'] ? 0: $data['delivery_qty2'];
				$data['delivery_qty3'] = !$data['delivery_qty3'] ? 0: $data['delivery_qty3'];
				$pqd['po_id'] = $po_id;
				$pqd['gr_id'] = 0;
				$pqd['ordered_qty'] = $data['delivery_qty1'] + $data['delivery_qty2'] + $data['delivery_qty3'];
				$pqd['received_qty'] = $data['delivery_qty1'];
				$pqd['remain_qty'] = $data['delivery_qty2'] + $data['delivery_qty3'];
				$this->db->insert('po_qty_details', $pqd);
				//echo $this->db->last_query(); exit;
				return $po_id;	
			}			
		}		
	}

	public function getPoDetails($id = null){
		$this->db->select('pos.*, pd.total_po_amount, pd.base_amount, pd.tax_type, pd.tax_percentage, pd.tax_percentage, pd.tax_amount, pd.discount, pd.insurance, 
						pd.freight, pd.custom, pd.packaging, pd.extra, pd.amount, pd.quantity, pd.storage, pd.delivery_date, pd.ppu, pd.hsn, pd.recipient,
						pd.delivery_date2, pd.delivery_date3, pd.quantity, pd.delivery_qty1, pd.delivery_qty2, pd.delivery_qty3,
						u.username as user_name, us.username as userm_name,
						i.code as item_code, i.name as item_name, i.UoM_id as uom, uoms.code as uom_code, uoms.name as uom_name,
						s.name as supplier_name, s.code as supplier_code, s.person1, s.mobile, s.email as supplier_email, sd.payment_terms as pt , sd.payment_terms_other as pto');
		$this->db->join('po_details pd', 'pd.po_id = pos.id');
		$this->db->join('items as i', 'pos.item_id = i.id');
		$this->db->join('uoms', 'i.UoM_id = uoms.id');
		$this->db->join('suppliers as s', 'pos.vendor_id = s.id');
		$this->db->join('supplier_details as sd', 's.id = sd.supplier_id');
		$this->db->join('users as u', 'pos.created_by = u.id');
		$this->db->join('users as us', 'pos.modified_by = us.id', 'left');
		$this->db->where('pos.id', $id);
		//$this->db->get('pos');echo $this->db->last_query();exit;
		return $this->db->get('pos')->row();
	}

	public function getPoDetailsAjax($id = null){
		$this->db->select('pos.*, pd.delivery_qty1, pd.delivery_qty2, pd.delivery_qty3,	pd.hsn, pd.storage,
						po_qty_details.ordered_qty, po_qty_details.received_qty, po_qty_details.remain_qty, 
						i.code as item_code, i.name as item_name, i.UoM_id as uom, po_qty_details.ordered_qty');
		$this->db->join('po_details pd', 'pd.po_id = pos.id', 'left');
		$this->db->join('po_qty_details', 'po_qty_details.po_id = pos.id', 'left');
		$this->db->join('items as i', 'pos.item_id = i.id', 'left');
		$this->db->where('pos.id', $id);
		//$this->db->get('pos');echo $this->db->last_query();exit;
		$po =  $this->db->get('pos')->row();
		if(!isset($po->ordered_qty)){
			$po->ordered_qty = $po->delivery_qty1 + $po->delivery_qty2 + $po->delivery_qty3;
			$po->received_qty = $po->delivery_qty1;
			$po->remain_qty = $po->delivery_qty2 + $po->delivery_qty3;
		}
		return $po;
	}

	public function procurementMIS($from_date = null, $to_date = null, $search = null, $start = null, $limit = null){ 		
		$this->db->select('pos.*, pd.total_po_amount, pd.base_amount, pd.tax_type, pd.tax_percentage, pd.tax_percentage, pd.tax_amount, pd.discount, pd.insurance, 
						pd.freight, pd.custom, pd.packaging, pd.extra, pd.amount, pd.quantity, pd.storage, pd.delivery_date, pd.ppu, pd.hsn, pd.recipient,
						pd.delivery_date2, pd.delivery_date3, pd.quantity, pd.delivery_qty1, pd.delivery_qty2, pd.delivery_qty3,
						u.username as user_name, us.username as userm_name,
						i.code as item_code, i.name as item_name, i.UoM_id as uom, uoms.code as uom_code, uoms.name as uom_name,
						s.name as supplier_name, s.code as supplier_code, s.person1, s.mobile, s.email as supplier_email, sd.payment_terms as pt , sd.payment_terms_other as pto');
		$this->db->join('po_details pd', 'pd.po_id = pos.id');
		$this->db->join('items as i', 'pos.item_id = i.id');
		$this->db->join('uoms', 'i.UoM_id = uoms.id');
		$this->db->join('suppliers as s', 'pos.vendor_id = s.id');
		$this->db->join('supplier_details as sd', 's.id = sd.supplier_id');
		$this->db->join('users as u', 'pos.created_by = u.id');
		$this->db->join('users as us', 'pos.modified_by = us.id', 'left');
		$this->db->where('pos.flag', 1);
		if($from_date){ 
			$from_date = date("Y-m-d", strtotime($from_date));
			$this->db->where('pos.created_on >=', $from_date);
		}
		if($to_date){ 
			$to_date = date("Y-m-d", strtotime($to_date));
			$this->db->where('pos.created_on <=', $to_date);
		}
		if($search){
			$this->db->like('pos.code', $search);
			$this->db->or_like('pos.heading', $search);
			$this->db->or_like('s.name', $search);
			$this->db->or_like('i.name', $search);
			$this->db->or_like('pd.total_po_amount', $search);
		}
		if ($limit || $start) { 
			$this->db->limit($limit, $start);
		 }
		//$this->db->get('pos');echo $this->db->last_query();exit;
		return $this->db->get('pos');
	}

	public function countAll(){ 
		$this->db->select('pos.id');
		$this->db->join('po_details', 'po_details.po_id = pos.id');
		$this->db->join('items', 'pos.item_id = items.id');
		$this->db->join('suppliers', 'pos.vendor_id = suppliers.id');
		$this->db->where('pos.flag', 1);
		//$this->db->get('pos');echo $this->db->last_query();exit;
		return $this->db->get('pos')->num_rows();
	}
}
