	<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  $this->load->model('Payment_model');  
		  $this->load->model('Stock_model');
		  $this->load->model('Purchase_model');
		  $this->load->model('Storage_model');
     }
	
	public function index(){
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$data['title'] = 'View All Stocks :: ACC ';
		
	    $query = $this->Stock_model->get_all_stocks($inps);
		// /echo '<pre>'; print_r($query);exit;
		
		
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}

		$this->load->view('payment_list', $data);
	}
	public function stock_list(){
		$data['title'] = 'View All Stocks :: ACC ';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}	
		$this->load->model('stock_model');
		$data['list']= $this->stock_model->getstockdetails($inps);	
		$data['list2']= $this->stock_model->getstockdetails1($inps);	
	    //echo '<pre>';print_r($data['list']); exit;
	    if(isset($inps['export']))
		{
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
		}
	    
		$this->load->view('stocks_lists', $data);
	}
	public function stockadd(){
		$categoryQuery = $this->OtherMasters_model->get_all_category();
		if($categoryQuery){
			$data['category'] =  $categoryQuery;
		} else {
			$data['category'] =  '';
		}
		$packingQuery = $this->OtherMasters_model->get_all_packing();
		if($packingQuery){
			$data['packing'] =  $packingQuery;
		} else {
			$data['packing'] =  '';
		}
		$salestaxQuery = $this->OtherMasters_model->get_all_salestax();
		if($salestaxQuery){
			$data['salestax'] =  $salestaxQuery;
		} else {
			$data['salestax'] =  '';
		}
		$purchasetaxQuery = $this->OtherMasters_model->get_all_purchasetax();
		if($purchasetaxQuery){
			$data['purchasetax'] =  $purchasetaxQuery;
		} else {
			$data['purchasetax'] =  '';
		}
		$manufacturerQuery = $this->Manufacturer_model->get_all_manufacturer();
		if($manufacturerQuery){
			$data['manufacturer'] =  $manufacturerQuery;
		} else {
			$data['manufacturer'] =  '';
		}
		$data['title'] = 'Add stocks :: ACC ';
	   	$this->load->view('stockadd',$data);
		
	}
	
	public function ajaxgetstock() {
		$data['customer'] = $this->Stock_model->get_rows_stock();
		echo json_encode($data['customer']);
	}
	
	public function addstock(){
		
		$this->form_validation->set_rules('i_category', 'Item Category', 'required|trim|xss_clean');
		$this->form_validation->set_rules('i_name', 'Item Name', 'required|trim|xss_clean|is_unique[tbl_item.i_name]');
		$this->form_validation->set_rules('i_code', 'Item Code', 'required|trim|xss_clean|is_unique[tbl_item.i_code]');
		$this->form_validation->set_rules('m_code', 'Manufacturer Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('fixed_rate', 'Fixed Rate', 'required|numeric_dot|trim|xss_clean');
		$this->form_validation->set_rules('m_date', 'Manufacturer Date', 'required|trim|xss_clean');
		$this->form_validation->set_rules('packing', 'Packing', 'required|trim|xss_clean');
		$this->form_validation->set_rules('exp_date', 'Expiry Date', 'required|trim|xss_clean');
		$this->form_validation->set_rules('s_price', 'Sales Price', 'required|numeric_dot|trim|xss_clean');
		$this->form_validation->set_rules('p_rate', 'Purchase Rate', 'required|numeric_dot|trim|xss_clean');
		$this->form_validation->set_rules('p_tax', 'Purchase Tax', 'required|trim|xss_clean');
		$this->form_validation->set_rules('offer', 'Offer', 'required|numeric_dot|less_than[99.9999]|trim|xss_clean');
		$this->form_validation->set_rules('combination', 'Combination', 'trim|xss_clean');
		$this->form_validation->set_rules('min_qty', 'Minimum Quantity', 'required|is_natural|trim|xss_clean');
		$this->form_validation->set_rules('max_qty', 'Maximum Quantity', 'required|is_natural|trim|xss_clean');
		//$this->form_validation->set_rules('batch_no', 'Batch No', 'required|trim|xss_clean');
		$this->form_validation->set_rules('mrp', 'MRP', 'required|numeric_dot|trim|xss_clean');
		$this->form_validation->set_rules('s_tax', 'Sales Tax', 'required|trim|xss_clean');
		
		
		if ($this->form_validation->run() == FALSE) { 
			$data['title'] = 'Add stock :: ACC ';
			$categoryQuery = $this->OtherMasters_model->get_all_category();
			if($categoryQuery){
				$data['category'] =  $categoryQuery;
			} else {
				$data['category'] =  '';
			}
			$packingQuery = $this->OtherMasters_model->get_all_packing();
			if($packingQuery){
				$data['packing'] =  $packingQuery;
			} else {
				$data['packing'] =  '';
			}
			$salestaxQuery = $this->OtherMasters_model->get_all_salestax();
			if($salestaxQuery){
				$data['salestax'] =  $salestaxQuery;
			} else {
				$data['salestax'] =  '';
			}
			$purchasetaxQuery = $this->OtherMasters_model->get_all_purchasetax();
			if($purchasetaxQuery){
				$data['purchasetax'] =  $purchasetaxQuery;
			} else {
				$data['purchasetax'] =  '';
			}
			$manufacturerQuery = $this->Manufacturer_model->get_all_manufacturer();
			if($manufacturerQuery){
				$data['manufacturer'] =  $manufacturerQuery;
			} else {
				$data['manufacturer'] =  '';
			}
			 $this->load->view('stockadd',$data);
	
			} else {
				$muinput= $this->security->xss_clean($this->input->post());
				$manage_category=$this->Stock_model->add_stock($muinput);
			echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/Stock')."'</script>";
				
			}
	}
		public function viewstock($id)
		{
			
        $data['invoice_data'] = $this->Purchase_model->purchase_invoice($id);
		$data['invoice_item'] = $this->Purchase_model->purchase_invoice_item($id);
		//echo '<pre>';print_r($data['invoice_item']);exit;
//                print_r($data['invoice_item']); print '<br>';
		$data['title'] = 'View stock :: ACC ';
		$this->load->view('purchase_view', $data);
                    /*
		 $data['title'] = 'View stock :: Unicom ';
	   	 $data['stock']=$this->Stock_model->view_stock($id);
		 $this->load->view('stockview',$data);
                 */
	}
	
	public function stockedit($id){
		$data['title'] = 'Edit stock :: ACC ';
	   	$data['category'] = $this->OtherMasters_model->get_all_category();
		$data['packing'] = $this->OtherMasters_model->get_all_packing();
		$data['salestax'] = $this->OtherMasters_model->get_all_salestax();
		$data['purchasetax'] = $this->OtherMasters_model->get_all_purchasetax();
		$data['manufacturer'] = $this->Manufacturer_model->get_all_manufacturer();
		$data['stock']=$this->Stock_model->edit_stock($id);
		$this->load->view('stockedit',$data);
	}
		
	public function editstock($id){
		$data['title'] = 'Edit stock :: ACC ';
		if($this->input->post())
		{
			$inps = $this->input->post();
			//echo '<pre>';print_r($inps); exit;
			$this->Purchase_model->edit_purchase_entry($inps);
			
			echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/Stock')."'</script>";
		}
		$con="*";
        $data['item'] = $this->Purchase_model->get_all_data('tbl_product',$con);
		$data['unit'] = $this->Purchase_model->get_all_unit('master_location',$con);	
		$data['list'] = $this->Stock_model->get_stocks($id);
		 $data['invoice_data'] = $this->Purchase_model->purchase_invoice($id);
		$data['vendor'] = $this->Purchase_model->get_all_vendor();
		$data['po_no'] = $this->Purchase_model->get_all_po();
		$this->load->view('purchase_edit',$data);
	}		
	
	public function statuschange(){
		$data = array('id' => $this->input->post('id'),'st'=>$this->input->post('st'));
		$statuschange=$this->Stock_model->statuschange($data);	
	}
	public function update_amt()
	{
		$inps = $this->input->post();
		$upd_ary = array('s_price'=>$inps['amount']);
		$this->db->where('pi_id',$inps['id']);
		$this->db->update('tbl_po_inv_item',$upd_ary);
		
		$ins_ary = array('product_id'=>$inps['id'],'sel_price'=>$inps['amount'],'post_dt'=>date('Y-m-d'));
		$this->db->insert('tbl_item_sel_price',$ins_ary);
		echo 'success';
	}
	public function storage()
	{
		$this->load->model('Storage_model');
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Stock_model->get_all_stocks($inps);
		//echo '<pre>'; print_r($query);//exit;
		if(isset($inps['export']))
		{
			//$this->load->library("excel");
			$heading = Array ('S.NO','Invoice No','Account','Vendor Name','Storage at','Product Code','Product Name','Rotation / Lot no ','Cask Bottle No','Qty','Date Of Storage', 'Rate') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Storage List Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			
			foreach($query as $row) 
			{
				
				if($row['customer']==1)
				{
					$customer =  'BANAYN TRADING';
				}
				else if($row['customer']==2)
				{
					$customer =  'RAJ001';
				}
				else 
				{
					$customer =  'HG';
				}
				if($row['Location']==1)
				{
					$location =  'LONDON';
				} 
				else if($row['Location']==2)
				{
					$location =  'SINGAPORE';
				}
				else if($row['Location']==3)
				{
					$location =  'HYDRABAD';
				}
				else
				{
					$location =  'NOT DECLARED';
				}
				if($row['stordate']=='0000-00-00')
				{
					$rowstordate = '';
				}
				else
				{
					$rowstordate = date('d-m-Y', strtotime($row['stordate']));
				}
				if($row['foc_inward']==1)
				{
					$amt = 'Nill';
				}
				else
				{
					$amt = number_format($row['p_rate'],4);
				}
				$profit = $row['s_price']-$row['p_rate'];
				$newrow[0] = $cnt;
				$newrow[1] = $row['vinvno'];
				$newrow[2] = $customer;
				$newrow[3] = $row['seller_name'];
				$newrow[4] = $row['storage_name'].' - '.$location;
				$newrow[5] = $row['i_code'];
				$newrow[6] = $row['i_name'].' - '.$row['descr'];
				$newrow[7] = $row['rotateno'];
				$newrow[8] = $row['cask_no'];
				$newrow[9] = $row['qty'];
				$newrow[10] = $rowstordate;
				$newrow[11] = $amt;
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
			
			//echo implode("\t", array_values($blankrow)) . "\n";
			//$totalarry = array("","","","Total : ", number_format($totalamount, 2, '.', ''),"");
			//array_walk($totalarry, 'filterData');
			//echo implode("\t", array_values($totalarry)) . "\n";
			// headers for download
			
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}
		$query = $this->Storage_model->get_all_Storage();
		if($query){
			$data['Storage'] =  $query;
		} else {
			$data['Storage'] =  '';
		}
		$con = '*';
		$data['seller'] = $this->Purchase_model->get_all_data('cb_seller',$con);
		
		$data['title'] = 'View All Stocks :: ACC ';
		$this->load->view('storage_list', $data);
	}
	public function update_storage_info()
	{
		$inps = $this->input->post();
		//echo '<pre>'; print_r($inps);
		$sloc = explode('~',$inps['slocation']);
		$upd_ary = array(
		'wr_name'=>$inps['wr_name'],
		'rotateno'=>$inps['rotateno'],
		'cask_no'=>$inps['cask_no'],
		'stordate'=>$inps['dt_str'],
		'slocation'=>$sloc[0]
		);
		$this->db->where('pi_id',$inps['id']);
		$this->db->update('tbl_po_inv_item',$upd_ary);
	}
	public function update_foc_info()
	{
		$inps = $this->input->post();
		$this->db->select('foc_dam_qty');
		$this->db->where('pi_id',$inps['id']);
		$qty_alr = $this->db->get('tbl_po_inv_item')->result_array();
		//echo '<pre>'; print_r($inps);
		$upd_ary = array(
		'foc_dam_qty'=>$inps['qty_no']+$qty_alr[0]['foc_dam_qty'],
		'foc_out_name'=>$inps['cus_name'],
		'foc_dam_sts'=>$inps['type_action']
		);
		$this->db->where('pi_id',$inps['id']);
		$this->db->update('tbl_po_inv_item',$upd_ary);
		$upd_ary1 = array(
		'inv_item_id'=>$inps['id'],
		'foc_dam_qty'=>$inps['qty_no'],
		'foc_out_name'=>$inps['cus_name'],
		'foc_dam_sts'=>$inps['type_action']
		);
		$this->db->insert('tbl_foc_dam',$upd_ary1);
	}
	public function get_sell_report($id)
	{
		//$this->load->library("excel");
		$query = $this->Stock_model->get_all_sell($id);
		//echo '<pre>'; print_r($query);exit;
			$heading = Array ('S.NO','Account','Vendor Name','Product Name & Desc','Date of Purchase','Storage at','Quantity','Purchase Cost','Market Cost','Profit / Loss on Investment','Checked Date') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Stock Valuation Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			
			foreach($query as $row) 
			{
				if($row['customer']==1)
				{
					$customer =  'ACC TRADING';
				}
				else if($row['customer']==2)
				{
					$customer =  'RAJ001';
				}
				else 
				{
					$customer =  'HG';
				}
				if($row['Location']==1)
				{
					$location =  'LONDON';
				} 
				else if($row['Location']==2)
				{
					$location =  'SINGAPORE';
				}
				else if($row['Location']==3)
				{
					$location =  'HYDRABAD';
				}
				else
				{
					$location =  'NOT DECLARED';
				}
				
				$profit = $row['sel_price']-$row['p_rate'];
				$newrow[0] = $cnt;
				$newrow[1] = $customer;
				$newrow[2] = $row['seller_name'];
				$newrow[3] = $row['i_code'].' - '.$row['i_name'].' - '.$row['descr'];
				$newrow[4] = date('d-m-Y',strtotime($row['purdate']));
				$newrow[5] = $location.' - '.$row['storage_name'];
				$newrow[6] = $row['qty'];
				$newrow[7] = $row['p_rate'];
				$newrow[8] = $row['sel_price'];
				$newrow[9] = $profit;
				$newrow[10] = date('d-m-Y', strtotime($row['checked_dt']));
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
			exit;
	}
	public function export_damage()
	{
		$inps = $this->input->get();
		$query = $this->Stock_model->get_all_sell_out($inps['id']);
		$heading = Array ('S.NO','Account','Vendor Name','Product Name & Desc','Date of Purchase','Storage at','Quantity','Purchase Cost','Market Cost','Profit / Loss on Investment','Damage / FOC Qty', 'Remarks', 'Type Of FOC') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Stock Valuation Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			
			foreach($query as $row) 
			{
				if($row['customer']==1)
				{
					$customer =  'ACC TRADING';
				}
				else if($row['customer']==2)
				{
					$customer =  'RAJ001';
				}
				else 
				{
					$customer =  'HG';
				}
				if($row['Location']==1)
				{
					$location =  'LONDON';
				} 
				else if($row['Location']==2)
				{
					$location =  'SINGAPORE';
				}
				else if($row['Location']==3)
				{
					$location =  'HYDRABAD';
				}
				else
				{
					$location =  'NOT DECLARED';
				}
				if($row['foc_dam_sts']==2)
				{
					$types = 'FOC Outward For Customer';
				}
				else if($row['foc_dam_sts']==3)
				{
					$types = 'FOC Outward For Employee';
				}
				else
				{
					$types = 'Damaged';
				}
				
				$profit = $row['sel_price']-$row['p_rate'];
				$newrow[0] = $cnt;
				$newrow[1] = $customer;
				$newrow[2] = $row['seller_name'];
				$newrow[3] = $row['i_code'].' - '.$row['i_name'].' - '.$row['descr'];
				$newrow[4] = date('d-m-Y',strtotime($row['purdate']));
				$newrow[5] = $location.' - '.$row['storage_name'];
				$newrow[6] = $row['qty'];
				$newrow[7] = $row['p_rate'];
				$newrow[8] = $row['s_price'];
				$newrow[9] = $profit;
				$newrow[10] = $row['foc_dam_qty'];
				$newrow[11] = $row['foc_out_name'];
				$newrow[12] = $types;
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
			exit;
	}
	//azf function started here
	function get_payment_details($id){
		$data = $this->Payment_model->get_payment_details($id);
		echo json_encode($data);
	}
	function get_goods_return_payment_details($id){
		$data = $this->Payment_model->get_goods_return_payment_details($id);
		echo json_encode($data);
	}

	function get_sales_payment_details($id){
		$data = $this->Payment_model->get_sales_payment_details($id);
		echo json_encode($data);
	}
	function get_sales_payment_details_ret($id){
		$data = $this->Payment_model->get_sales_payment_details_ret($id);
		echo json_encode($data);
	}
	function payment_details_add(){
		$session_data = $this->session->all_userdata();
		$muinput= $this->input->post();
		$data = $this->Payment_model->payment_details_add($muinput);
		echo "<script> window.location= '".base_url('index.php/Payment')."'</script>";
	}
	function sales_payment_details_add(){
		$session_data = $this->session->all_userdata();
		$muinput= $this->input->post();
		$data = $this->Payment_model->sales_payment_details_add($muinput);
		echo "<script> window.location= '".base_url('index.php/Sales/sales_payment')."'</script>";
	}
	function sales_payment_return_details_add(){
		$session_data = $this->session->all_userdata();
		$muinput= $this->input->post();
		$data = $this->Payment_model->sales_payment_return_details_add($muinput);
		echo "<script> window.location= '".base_url('index.php/Return_det/goods_return_pdf')."'</script>";
	}
	function sales_return_details_add_payment(){
		$session_data = $this->session->all_userdata();
		$muinput= $this->input->post();
		$data = $this->Payment_model->sales_return_details_add_payment($muinput);
		echo "<script> window.location= '".base_url('index.php/Sales/sales_return_payment')."'</script>";
	}
	function payment_list(){
				$data['title'] = 'Reports';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}
		//echo '<pre>';print_r($inps); exit;
		$data['title'] = 'Debit Payment List';
		//$data['customer'] = $this->Sales_model->getList();
		$data['list'] = $this->Payment_model->get_payment_list($inps);
		//echo '<pre>';print_r($data['list']); exit;
	/*	if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','Invoice No','Customer Name','Mobile','Product Name','Qty','Total Amt','Date') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Sales List Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			$type=0;
			foreach($data['list'] as $row) 
			{
				
				$newrow[0] = $cnt;
				$newrow[1] = $row['bill_no'];
				$newrow[2] = $row['customer_name'];
				$newrow[3] = $row['mob_no1'];
				$newrow[4] = $row['i_name'];
				$newrow[5] = $row['quantity'];
				$newrow[6] = $row['total_amount'];
				$newrow[7] = date('d-m-Y', strtotime($row['cds']));
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
			
			exit;
		}*/
		

		
		$data['inps']=$inps;
		$this->load->view('payment_list_data',$data);
	}
		
	
}
