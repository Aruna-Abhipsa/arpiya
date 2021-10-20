<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller {

	public function __construct() {        
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Po_model');
		$this->load->model('Service_model');
		$this->load->model('Sale_model');
		$this->load->model('Inventory_model');
		$this->load->model('Amc_model');
	}

	public function procurementMis()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['subview'] = 'report/procurementMiss';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function poMisDetails($id = null)
	{ 
		$result = $this->Po_model->getPoDetails($id);		
		$data['po'] = $result; 

		$data['subview'] = 'report/poMisDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function exportToExcelProcurementAjax() 
	{ 
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$search = $_POST['search'];

		$fileName = 'Procurement.xlsx';  
		$poData = $this->Po_model->procurementMIS($from_date, $to_date, $search)->result();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Sl#');
        $sheet->setCellValue('B1', 'Code');
        $sheet->setCellValue('C1', 'Heading');
		$sheet->setCellValue('D1', 'Currency');
		$sheet->setCellValue('E1', 'Item Code');
		$sheet->setCellValue('F1', 'Item Name');
		$sheet->setCellValue('G1', 'UoM');
        $sheet->setCellValue('H1', 'Storage Location');     
		$sheet->setCellValue('I1', 'PO Quantity');  
		$sheet->setCellValue('J1', 'Delivery Quantity1');
		$sheet->setCellValue('K1', 'Delivery Quantity2');
		$sheet->setCellValue('L1', 'Delivery Quantity3');
		$sheet->setCellValue('M1', 'Delivery Date1');
		$sheet->setCellValue('N1', 'Delivery Date2');
		$sheet->setCellValue('O1', 'Delivery Date3');
		$sheet->setCellValue('P1', 'PPU');
		$sheet->setCellValue('Q1', 'Amount');
		$sheet->setCellValue('R1', 'PO Base Amount');
		$sheet->setCellValue('S1', 'Tax Percentage');
		$sheet->setCellValue('T1', 'Tax Amount');
		$sheet->setCellValue('U1', 'Discount');
		$sheet->setCellValue('V1', 'Insurance');
		$sheet->setCellValue('W1', 'Freight');
		$sheet->setCellValue('X1', 'Custom');
		$sheet->setCellValue('Y1', 'Packaging');
		$sheet->setCellValue('Z1', 'Extra');
		$sheet->setCellValue('AA1', 'Total PO Amount');
		$sheet->setCellValue('AB1', 'HSN');
		$sheet->setCellValue('AC1', 'Recipient');
		$sheet->setCellValue('AD1', 'Vendor Code');
		$sheet->setCellValue('AE1', 'Vendor Name');
		$sheet->setCellValue('AF1', 'Contact Person');
		$sheet->setCellValue('AG1', 'Contact No');
		$sheet->setCellValue('AH1', 'Contact Email');
		$sheet->setCellValue('AI1', 'Payment Terms');
        $rows = 2; $i = 1;
        foreach ($poData as $val){
            $sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, $val->code);
            $sheet->setCellValue('C' . $rows, $val->heading);
			$sheet->setCellValue('D' . $rows, $val->currency);
	    	$sheet->setCellValue('E' . $rows, $val->item_code);
            $sheet->setCellValue('F' . $rows, $val->item_name);
			$sheet->setCellValue('G' . $rows, $val->uom_code." - ".$val->uom_name);
			$sheet->setCellValue('H' . $rows, $val->storage);
			$sheet->setCellValue('I' . $rows, $val->quantity);
			$sheet->setCellValue('J' . $rows, $val->delivery_qty1);
			$sheet->setCellValue('K' . $rows, $val->delivery_qty2);
			$sheet->setCellValue('L' . $rows, $val->delivery_qty3);
			$sheet->setCellValue('M' . $rows, $val->delivery_date);
			$sheet->setCellValue('N' . $rows, $val->delivery_date2);
			$sheet->setCellValue('O' . $rows, $val->delivery_date3);
			$sheet->setCellValue('P' . $rows, $val->ppu);
			$sheet->setCellValue('Q' . $rows, $val->amount);
			$sheet->setCellValue('R' . $rows, $val->base_amount);
			if($val->tax_type == 1)$sheet->setCellValue('S' . $rows, "CGST - ".($val->tax_percentage/2)."% | SGST - ".($val->tax_percentage/2)."%");
			else $sheet->setCellValue('S' . $rows, "IGST - ".$val->tax_percentage);
			if($val->tax_type == 1)$sheet->setCellValue('T' . $rows, "CGST - ".($val->tax_amount/2)." | SGST - ".($val->tax_amount/2));
			else $sheet->setCellValue('T' . $rows, "IGST - ".$val->tax_amount);
			$sheet->setCellValue('U' . $rows, $val->discount."%");
			$sheet->setCellValue('V' . $rows, $val->insurance);
			$sheet->setCellValue('W' . $rows, $val->freight);
			$sheet->setCellValue('X' . $rows, $val->custom);
			$sheet->setCellValue('Y' . $rows, $val->packaging);
			$sheet->setCellValue('Z' . $rows, $val->extra);
			$sheet->setCellValue('AA' . $rows, $val->total_po_amount);
			$sheet->setCellValue('AB' . $rows, $val->hsn);
			$sheet->setCellValue('AC' . $rows, $val->recipient);
			$sheet->setCellValue('AD' . $rows, $val->supplier_code);
			$sheet->setCellValue('AE' . $rows, $val->supplier_name);
			$sheet->setCellValue('AF' . $rows, $val->person1);
			$sheet->setCellValue('AG' . $rows, $val->mobile);
			$sheet->setCellValue('AH' . $rows, $val->supplier_email);
			if($val->pt == "Others") $sheet->setCellValue('AI' . $rows, $val->pto);
			else $sheet->setCellValue('AI' . $rows, $val->pt);
            $rows++; $i++;
        } 
        $writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $fileName); 
        header('Cache-Control: max-age=0');        
        $writer->save('php://output');	// download file 
		//exit;
    }    

	public function procurementExcelDataAjax() 
	{ 
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		$search = $this->input->post('search[value]');
		$start = $this->input->post('start');
		$limit = $this->input->post('length');

		$arrayList = [];
		$i = 0;
		$result = $this->Po_model->procurementMIS($from_date, $to_date, $search, $start, $limit)->result();
		foreach($result as $row) {
			$action = '<a href="'.base_url('poMisDetails/'.$row->id).'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>';
			$arrayList [] = [
				date("d M Y", strtotime($row->created_on)),
				$row->code,
				$row->heading,
				$row->supplier_name,
				$row->item_name,
				$row->currency."  ".$row->total_po_amount,
				$action
			];
		}
		$output = array(
			"draw" 				=> $this->input->post('draw'),
			"recordsTotal" 		=> $this->Po_model->countAll(),
			"recordsFiltered"	=> $this->Po_model->procurementMIS($from_date, $to_date)->num_rows(),
			"data" 				=> $arrayList,
		);

		echo json_encode($output);
	}

	public function serviceMis()
	{ 
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['subview'] = 'report/serviceMis';
		$this->load->view('admin/common/admin_layout', $data);
	}    

	public function serviceExcelDataAjax() 
	{ 
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		$search = $this->input->post('search[value]');
		$start = $this->input->post('start');
		$limit = $this->input->post('length');

		$arrayList = [];
		$i = 0;
		$result = $this->Service_model->serviceMIS($from_date, $to_date, $search, $start, $limit)->result();
		foreach($result as $row) {
			$action = '<a href="'.base_url('serviceMisDetails/'.$row->id).'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>';
			$arrayList [] = [
				$row->code,
				$row->cust_name,
				date("d M Y", strtotime($row->date)),
				$row->done_by,
				$row->amount,
				$action
			];
		}
		$output = array(
			"draw" 				=> $this->input->post('draw'),
			"recordsTotal" 		=> $this->Service_model->countAll(),
			"recordsFiltered"	=> $this->Service_model->serviceMIS($from_date, $to_date, $search, $start, $limit)->num_rows(),
			"data" 				=> $arrayList,
		);

		echo json_encode($output);
	}

	public function serviceMisDetails($id = null)
	{ 
		$result = $this->Service_model->getServiceDetails($id);		
		$data['service'] = $result; 

		$data['subview'] = 'report/serviceMisDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function exportToExcelServiceAjax() 
	{
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];

		$fileName = 'Service.xlsx';  
		$poData = $this->Service_model->serviceMIS($from_date, $to_date)->result();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Sl#');
		$sheet->setCellValue('B1', 'Servicing Date');
        $sheet->setCellValue('C1', 'Service No');
        $sheet->setCellValue('D1', 'Service Details in Short');
		$sheet->setCellValue('E1', 'Servicing Done By');
		$sheet->setCellValue('F1', 'Additional Items');
		$sheet->setCellValue('G1', 'Customer Name');
        $sheet->setCellValue('H1', 'Customer Address');     
		$sheet->setCellValue('I1', 'Customer Contact No');  
		$sheet->setCellValue('J1', 'Total Amount');
		$sheet->setCellValue('K1', 'Paid By');
		$sheet->setCellValue('L1', 'Paid Amount');
        $rows = 2; $i = 1;
        foreach ($poData as $val){
            $sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, date("d M Y", strtotime($val->date)));
            $sheet->setCellValue('C' . $rows, $val->code);
			$sheet->setCellValue('D' . $rows, $val->details);
			$sheet->setCellValue('E' . $rows, $val->done_by);
			$sheet->setCellValue('F' . $rows, $val->additional_items);
            $sheet->setCellValue('G' . $rows, $val->cust_name);
			$sheet->setCellValue('H' . $rows, $val->phone);
	    	$sheet->setCellValue('I' . $rows, $val->address);
			$sheet->setCellValue('J' . $rows, $val->amount);
			$sheet->setCellValue('K' . $rows, paymentModeArr[$val->payment_mode]);
			$sheet->setCellValue('L' . $rows, $val->paid_amount);
            $rows++; $i++;
        } 
        $writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $fileName); 
        header('Cache-Control: max-age=0');        
        $writer->save('php://output');	// download file 
		//exit;
    }

	public function saleList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['subview'] = 'report/saleList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addSale()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('customers.*')->where('customers.flag', 1); 
		$data['customerList'] = $this->db->get('customers')->result();

		$this->db->select('items.*')->where('items.flag', 1); 
		$data['itemList'] = $this->db->get('items')->result();

		if($_POST){
			//echo "<pre>";print_r($_POST);exit;
			$saleId = $this->Sale_model->saveSale($_POST);
			if($saleId){
				redirect(base_url().'saleList', 'refresh');
			}
		}

		$data['subview'] = 'report/addSale';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function saleExcelDataAjax() 
	{ 
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		$search = $this->input->post('search[value]');
		$start = $this->input->post('start');
		$limit = $this->input->post('length');

		$arrayList = [];
		$i = 0;
		$result = $this->Sale_model->saleMIS("list", $from_date, $to_date, $search, $start, $limit)->result();
		foreach($result as $row) {
			$action = '<a href="'.base_url('saleMisDetails/'.$row->id).'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>';
			if($row->flag == 1) { 
				$status = '<span style="font-weight: bold; color: green;">Active</span>';
				$action .='<a href="'.base_url('editSaleMis/'.$row->id).'" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
				<a onClick="return JSconfirm('.$row->id.','.$row->flag.');" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';				
			}
			else { $status = '<span style="font-weight: bold; color: red;">Deleted</span>'; }
			
			$arrayList [] = [
				$row->quote_no,
				$row->sales_order,
				$row->item_name,
				$row->customer_name,
				$row->total,
				date("d M Y", strtotime($row->created_on)),
				$status,
				$action
			];
		}
		$output = array(
			"draw" 				=> $this->input->post('draw'),
			"recordsTotal" 		=> $this->Sale_model->countAll(),
			"recordsFiltered"	=> $this->Sale_model->saleMIS($from_date, $to_date)->num_rows(),
			"data" 				=> $arrayList,
		);

		echo json_encode($output);
	}

	public function saleMisDetails($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['sale'] = $this->Sale_model->saleMisDetails($id);

		$data['subview'] = 'report/saleMisDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editSaleMis($id = NULL)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('customers.*')->where('customers.flag', 1); 
		$data['customerList'] = $this->db->get('customers')->result();

		$this->db->select('items.*')->where('items.flag', 1); 
		$data['itemList'] = $this->db->get('items')->result();

		$data['sale'] = $this->Sale_model->saleMisDetails($id);

		if($_POST){
			$saleId = $this->Sale_model->saveItem($_POST);
			if($itemId){
				$this->session->set_flashdata(array('type' => 'success', 'message' => 'Item saved successfully !!!'));
				redirect(base_url().'itemList', 'refresh');
			}
		}

		$data['subview'] = 'report/editSale';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function saleDelete($id)
	{
		$this->db->update('sales_mis', array('flag' => 0), array('id' => $id));

		redirect(base_url().'saleList', 'refresh');
	}

	public function exportToExcelSaleAjax()
	{
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];

		$fileName = 'Sale.xlsx';  
		$saleData = $this->Sale_model->saleMIS("export", $from_date, $to_date)->result();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Sl#');
		$sheet->setCellValue('B1', 'Quote#');
        $sheet->setCellValue('C1', 'Quote Date');
        $sheet->setCellValue('D1', 'Sales Order#');
		$sheet->setCellValue('E1', 'Sales Order Date');
		$sheet->setCellValue('F1', 'Sales Person');
		$sheet->setCellValue('G1', 'Item Name');
        $sheet->setCellValue('H1', 'Item Serial No');     
		$sheet->setCellValue('I1', 'Quantity');  
		$sheet->setCellValue('J1', 'Unit Price');
		$sheet->setCellValue('K1', 'Tax Amount');
		$sheet->setCellValue('L1', 'Total Price');
		$sheet->setCellValue('M1', 'Invoice No');
		$sheet->setCellValue('N1', 'Invoice Date');
		$sheet->setCellValue('O1', 'Customer Name');
		$sheet->setCellValue('P1', 'Delivery Address');
		$sheet->setCellValue('Q1', 'Customer Contact No');
		$sheet->setCellValue('R1', 'Paid By');
		$sheet->setCellValue('S1', 'Amount Paid');
		$sheet->setCellValue('T1', 'Remaining Amount');
        $rows = 2; $i = 1;
        foreach ($saleData as $val){
            $sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, $val->quote_no);
            $sheet->setCellValue('C' . $rows, date("d M Y", strtotime($val->quote_date)));
			$sheet->setCellValue('D' . $rows, $val->sales_order);
			$sheet->setCellValue('E' . $rows, date("d M Y", strtotime($val->sales_date)));
			$sheet->setCellValue('F' . $rows, $val->sales_person);
            $sheet->setCellValue('G' . $rows, $val->item_name);
			$sheet->setCellValue('H' . $rows, $val->item_serial);
	    	$sheet->setCellValue('I' . $rows, $val->quantity);
			$sheet->setCellValue('J' . $rows, $val->unit_price);
			$sheet->setCellValue('K' . $rows, $val->tax_amount);
			$sheet->setCellValue('L' . $rows, $val->total);
			$sheet->setCellValue('M' . $rows, $val->invoice_no);
			$sheet->setCellValue('N' . $rows, date("d M Y", strtotime($val->invoice_date)));
			$sheet->setCellValue('O' . $rows, $val->customer_name);
			$sheet->setCellValue('P' . $rows, $val->customer_address);
			$sheet->setCellValue('Q' . $rows, $val->contact);
			$sheet->setCellValue('R' . $rows, paymentModeArr[$val->paid_by]);
			$sheet->setCellValue('S' . $rows, $val->amount_paid);
			$sheet->setCellValue('T' . $rows, $val->remain_amount);
            $rows++; $i++;
        } 
        $writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $fileName); 
        header('Cache-Control: max-age=0');        
        $writer->save('php://output');	// download file 
	}

	public function inventoryList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['subview'] = 'report/inventoryList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function inventoryExcelDataAjax() 
	{ 
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		$search = $this->input->post('search[value]');
		$start = $this->input->post('start');
		$limit = $this->input->post('length');

		$arrayList = [];
		$data = $this->Inventory_model->inventoryMIS("list", $from_date, $to_date, $search, $start, $limit);
		$result = $data->result;
		foreach($result as $row) {
			$action = '<a href="'.base_url('inventoryMisDetails/'.$row->id).'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>';			
			/*if($row->flag == 1) { $status = '<span style="font-weight: bold; color: green;">Active</span>';	}
			else { $status = '<span style="font-weight: bold; color: red;">Deleted</span>'; }*/
			$stock_qty = $row->received_qty - $row->issued_qty;
			$stock_val = $stock_qty * $row->ppu;
			$arrayList [] = [
				date("d M Y", strtotime($row->created_on)),
				$row->item_code,
				$row->item_name,
				$row->ppu,
				$stock_qty,
				number_format((float)$stock_val, 2, '.', ''),
				$action
			];
		}
		$output = array(
			"draw" 				=> $this->input->post('draw'),
			"recordsTotal" 		=> $this->Inventory_model->countAll(),
			"recordsFiltered"	=> $data->count,
			"data" 				=> $arrayList,
		);

		echo json_encode($output);
	}

	public function inventoryMisDetails($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['inventory'] = $this->Inventory_model->inventoryMisDetails($id);

		$data['subview'] = 'report/inventoryMisDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function exportToExcelInventoryAjax()
	{
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];

		$fileName = 'Inventory.xlsx';  
		$data = $this->Inventory_model->inventoryMIS("export", $from_date, $to_date);
		$invtData = $data->result;
		//$invtData = $this->Inventory_model->inventoryMIS("export", $from_date, $to_date)->result();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Sl#');
		$sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Item Code');
        $sheet->setCellValue('D1', 'Item Name');
        $sheet->setCellValue('E1', 'Item Description');
		$sheet->setCellValue('F1', 'UoM');   
		$sheet->setCellValue('G1', 'Ordered Qty');
		$sheet->setCellValue('H1', 'Unit Price');
		$sheet->setCellValue('I1', 'Total Price');
        $sheet->setCellValue('J1', 'Currency');     
		$sheet->setCellValue('K1', 'Received Qty');  
		$sheet->setCellValue('L1', 'Goods Issue Qty');
		$sheet->setCellValue('M1', 'Stock Qty');
		$sheet->setCellValue('N1', 'Stock Value');
        $rows = 2; $i = 1;
        foreach ($invtData as $val){
            $sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, date("d M Y", strtotime($val->created_on)));
            $sheet->setCellValue('C' . $rows, $val->item_code);
			$sheet->setCellValue('D' . $rows, $val->item_name);
			$sheet->setCellValue('E' . $rows, $val->short_desc);
			$sheet->setCellValue('F' . $rows, $val->uom_code." - ".$val->uom_name);
			$sheet->setCellValue('G' . $rows, $val->quantity);
            $sheet->setCellValue('H' . $rows, $val->ppu);
			$sheet->setCellValue('I' . $rows, $val->total_po_amount);
	    	$sheet->setCellValue('J' . $rows, $val->currency);
			$sheet->setCellValue('K' . $rows, $val->received_qty);
			$sheet->setCellValue('L' . $rows, $val->issued_qty);
			$sheet->setCellValue('M' . $rows, $val->received_qty - $val->issued_qty);
			$sheet->setCellValue('N' . $rows, ($val->received_qty - $val->issued_qty) * $val->ppu);
            $rows++; $i++;
        } 
        $writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $fileName); 
        header('Cache-Control: max-age=0');        
        $writer->save('php://output');	// download file 
	}

	public function amcList()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['subview'] = 'report/amcList';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function addAmc()
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('customers.id, customers.code, customers.name')->where('customers.flag', 1); 
		$data['customerList'] = $this->db->get('customers')->result();

		$this->db->select('items.id, items.code, items.name')->where('items.flag', 1); 
		$data['itemList'] = $this->db->get('items')->result();

		if($_POST){
			//echo "<pre>";print_r($_POST);exit;
			$inventoryId = $this->Amc_model->saveAmc($_POST);
			if($inventoryId){
				redirect(base_url().'amcList', 'refresh');
			}
		}

		$data['subview'] = 'report/addAmc';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function amcExcelDataAjax() 
	{ 
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		$search = $this->input->post('search[value]');
		$start = $this->input->post('start');
		$limit = $this->input->post('length');

		$arrayList = [];
		$i = 0;
		$result = $this->Amc_model->amcMIS("list", $from_date, $to_date, $search, $start, $limit)->result();
		foreach($result as $row) {
			$action = '<a href="'.base_url('amcMisDetails/'.$row->id).'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-fw fa-eye"></i></a>';
			if($row->amc_status == 1)$amc_status = "Yes"; else $amc_status = "No";
			if($row->flag == 1) { 
				$status = '<span style="font-weight: bold; color: green;">Active</span>';
				$action .= '<a href="'.base_url('editAmcMis/'.$row->id).'" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
							<a onClick="return JSconfirm('.$row->id.');" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			}
			else { 
				$status = '<span style="font-weight: bold; color: red;">Deleted</span>'; 
			}	
			if($row->next_service_date != "0000-00-00") $nextServiceDate = date("d M Y", strtotime($row->next_service_date)); else {$nextServiceDate = "NA";}		
			$total = $row->total? $row->total: "NA";

			$arrayList [] = [
				date("d M Y", strtotime($row->created_on)),
				$row->customer_name,
				$row->item_name,
				$row->invoice_no,
				$amc_status,
				$total,
				$nextServiceDate,
				$status,
				$action
			];
		}
		$output = array(
			"draw" 				=> $this->input->post('draw'),
			"recordsTotal" 		=> $this->Amc_model->countAll(),
			"recordsFiltered"	=> $this->Amc_model->amcMIS($from_date, $to_date)->num_rows(),
			"data" 				=> $arrayList,
		);

		echo json_encode($output);
	}

	public function amcMisDetails($id = null)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$data['amc'] = $this->Amc_model->amcMisDetails($id);

		$data['subview'] = 'report/amcMisDetails';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function editAmcMis($id = NULL)
	{
		if(!$this->session->userdata('loggedIn')) redirect(base_url(), 'refresh');

		$this->db->select('customers.id, customers.code, customers.name')->where('customers.flag', 1); 
		$data['customerList'] = $this->db->get('customers')->result();

		$this->db->select('items.id, items.code, items.name')->where('items.flag', 1); 
		$data['itemList'] = $this->db->get('items')->result();

		$data['amc'] = $this->Amc_model->amcMisDetails($id);

		if($_POST){
			$invId = $this->Amc_model->saveAmc($_POST);
			if($invId){
				$this->session->set_flashdata(array('type' => 'success', 'message' => 'Inventory saved successfully !!!'));
				redirect(base_url().'amcList', 'refresh');
			}
		}

		$data['subview'] = 'report/editAmc';
		$this->load->view('admin/common/admin_layout', $data);
	}

	public function amcDelete($id)
	{
		$this->db->update('amc_mis', array('flag' => 0), array('id' => $id));

		redirect(base_url().'amcList', 'refresh');
	}

	public function exportToExcelAmcAjax()
	{
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];

		$fileName = 'Amc.xlsx';  
		$amcData = $this->Amc_model->amcMIS("export", $from_date, $to_date)->result();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Sl#');
		$sheet->setCellValue('B1', 'Customer Name');
        $sheet->setCellValue('C1', 'Customer Phone No');
        $sheet->setCellValue('D1', 'Customer Address');
		$sheet->setCellValue('E1', 'Product Name');
		$sheet->setCellValue('F1', 'Invoice No');
		$sheet->setCellValue('G1', 'Invoice Date');
        $sheet->setCellValue('H1', 'Warrenty Status');     
		$sheet->setCellValue('I1', 'Warrenty Valid Till');  
		$sheet->setCellValue('J1', 'Extended Warrenty Status');
		$sheet->setCellValue('K1', 'Extended Warrenty Valid Till');
		$sheet->setCellValue('L1', 'AMC Status');
		$sheet->setCellValue('M1', 'AMC Start Date');
		$sheet->setCellValue('N1', 'AMC Valid Till');
		$sheet->setCellValue('O1', 'AMC Amount Paid By');
		$sheet->setCellValue('P1', 'AMC Amount');
		$sheet->setCellValue('Q1', 'Tax %');
		$sheet->setCellValue('R1', 'Tax Amount');
		$sheet->setCellValue('S1', 'Total AMC');
		$sheet->setCellValue('T1', 'Last Free Service Date (Under Warrenty)');
		$sheet->setCellValue('U1', 'Last Paid Service Date (Under AMC)');
		$sheet->setCellValue('V1', 'Next Service Date');
		$sheet->setCellValue('W1', 'AMC Renew Reminder Date');
        $rows = 2; $i = 1;
        foreach ($amcData as $val){  
			if($val->warrenty_status == 1)$warrenty_status = "Yes"; else $warrenty_status = "No";
			if($val->extend_warrenty_status == 1)$extend_warrenty_status = "Yes"; else $extend_warrenty_status = "No";
			if($val->amc_status == 1)$amc_status = "Yes"; else $amc_status = "No";
			if($val->paid_by == 0) $paid_by = "NA"; else $paid_by = paymentModeArr[$val->paid_by];

            $sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, $val->customer_name);
            $sheet->setCellValue('C' . $rows, $val->contact);
            $sheet->setCellValue('D' . $rows, $val->customer_address);
            $sheet->setCellValue('E' . $rows, $val->item_name);
            $sheet->setCellValue('F' . $rows, $val->invoice_no);
            $sheet->setCellValue('G' . $rows, date("d M Y", strtotime($val->invoice_date)));
			$sheet->setCellValue('H' . $rows, $warrenty_status);
            $sheet->setCellValue('I' . $rows, $val->warrenty_valid_till != "0000-00-00"? date("d M Y", strtotime($val->warrenty_valid_till)): "NA");
			$sheet->setCellValue('J' . $rows, $extend_warrenty_status);
            $sheet->setCellValue('K' . $rows, $val->extend_warrenty_valid_till != "0000-00-00"? date("d M Y", strtotime($val->extend_warrenty_valid_till)): "NA");
			$sheet->setCellValue('L' . $rows, $amc_status);
            $sheet->setCellValue('M' . $rows, $val->start_date != "0000-00-00"? date("d M Y", strtotime($val->start_date)): "NA");
            $sheet->setCellValue('M' . $rows, $val->start_date != "0000-00-00"? date("d M Y", strtotime($val->start_date)): "NA");
            $sheet->setCellValue('N' . $rows, $val->amc_valid_till != "0000-00-00"? date("d M Y", strtotime($val->amc_valid_till)): "NA");
			$sheet->setCellValue('O' . $rows, $paid_by);
			$sheet->setCellValue('P' . $rows, $val->amount? $val->amount: "NA");
            $sheet->setCellValue('Q' . $rows, $val->tax? $val->tax: "NA");
			$sheet->setCellValue('R' . $rows, $val->tax_amount? $val->tax_amount: "NA");
	    	$sheet->setCellValue('S' . $rows, $val->total? $val->total: "NA");
			$sheet->setCellValue('T' . $rows, $val->free_service_date != "0000-00-00"? date("d M Y", strtotime($val->free_service_date)): "NA");
			$sheet->setCellValue('U' . $rows, $val->paid_service_date != "0000-00-00"? date("d M Y", strtotime($val->paid_service_date)): "NA");
			$sheet->setCellValue('V' . $rows, $val->next_service_date != "0000-00-00"? date("d M Y", strtotime($val->next_service_date)): "NA");
			$sheet->setCellValue('W' . $rows, $val->reminder_date != "0000-00-00"? date("d M Y", strtotime($val->reminder_date)): "NA");
            $rows++; $i++;
        }
        $writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $fileName); 
        header('Cache-Control: max-age=0');        
        $writer->save('php://output');	// download file 
	}

	public function validateInvoiceNo()
	{
		$invoiceNo = $_POST['invoice_no'];
		$this->db->select('COUNT(amc_mis.invoice_no) as count')->where('amc_mis.invoice_no', $invoiceNo);	
		$result = $this->db->get('amc_mis')->row(); //echo $this->db->last_query();exit;
		echo $result->count; exit;
	}
}