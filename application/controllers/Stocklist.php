<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Stocklist extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  	  
		  $this->load->model('Stock_model');
		  $this->load->model('Sales_model');
		  
     }
	public function update_stock_adj(){
		$inps = $this->input->post();
		$data = $this->Stock_model->update_stock_adj($inps);
		echo json_encode($data);
	}
	public function open_close_report(){
		$data['title'] = 'Opening - Closing Stock';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}	
		$data['list']= $this->Stock_model->open_close_report($inps);	
		//$data['list2']= $this->stock_model->getstockdetails1($inps);	
	   //echo '<pre>';print_r($data['list']); exit;
	    if(isset($inps['export']))
		{
			$heading = Array ('S.NO','Product Name','Opening Stock','Value Stock','Recived Stock','Value','Purchase Return Qty','Value','Sales Qty','Value','Cousnsuption Qty','Value','Stock Adj qty','Value','Closing Stock ','Value','Date','Profit/loss') ;
			$blankrow = Array('');


			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Opening Stock Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			
			if(!$flag) 
			{
		
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true;
			}

			foreach($data['list'] as $vals) 
			{
				$Profit = $vals['purchase_return_value']+$vals['saled_stock_value']+$vals['consumed_stock_value']+$vals['adjusted_stock_value']+$vals['clossing_stock_value']-$vals['openning_value']-$vals['recived_stock_value'];
				//$unit_val = $vals['p_rate']*$vals['curr_qty'];

				$newrow[0] = $cnt;
				$newrow[1] = $vals['i_name'];
				$newrow[2] = $vals['opening_stock'];
				$newrow[3] = number_format($vals['openning_value'],2);
				$newrow[4] = $vals['recived_stock'];
				$newrow[5] = number_format($vals['recived_stock_value'],2);
				$newrow[6] = $vals['purchase_return_stock'];
				$newrow[7] = number_format($vals['purchase_return_value'],2);
				$newrow[8] = $vals['saled_stock'];
				$newrow[9] = number_format($vals['saled_stock_value'],2);
				$newrow[10] = $vals['consumed_stock'];
				$newrow[11] = number_format($vals['consumed_stock_value'],2);
				$newrow[12] = $vals['adjusted_stock'];
				$newrow[13] = number_format($vals['adjusted_stock_value'],2);
				$newrow[14] = $vals['clossing_stock'];
				$newrow[15] = number_format($vals['clossing_stock_value'],2);
				$newrow[16] = $vals['opening_date'];
				$newrow[17] = number_format($Profit,2);
				
				array_walk($newrow, 'filterData');
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
			
			exit;
		}
	    $data['inps'] = $inps;
		 
		$this->load->view('open_close_report', $data);
	}
	public function index(){
		$data['title'] = 'View All Stocks ';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}	
		$data['list']= $this->Stock_model->getstockdetails($inps);	
		//$data['list2']= $this->stock_model->getstockdetails1($inps);	
	   //echo '<pre>';print_r($data['list']); exit;
	    if(isset($inps['export']))
		{
			$heading = Array ('S.NO','Vendor Name','Product Description','HSn Code','Manufacturer Name','Expiry Date','Batch No','MRP','Current Quantity','Free Quantity','Unit','Unit Rate','Value','Discount %','Discount Value','SGST %','SGST Value','CGST %','CGST Value','IGST %','IGST Value','Total Value') ;
			$blankrow = Array('');


			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Stock Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			
			if(!$flag) 
			{
		
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true;
			}

			foreach($data['list'] as $vals) 
			{
				$tax = $vals['p_rate']/100;
				$sgst = $vals['sgst']*$tax;
				$cgst = $vals['cgst']*$tax;
				$igst = $vals['igst']*$tax;
				$mrp = $vals['p_rate']+$sgst+$cgst+$igst;
				$dis = $vals['discount']*$tax;
				//$unit_val = $vals['p_rate']*$vals['curr_qty'];

				$newrow[0] = $cnt;
				$newrow[1] = $vals['vendor_name'];
				$newrow[2] = $vals['i_name'];
				$newrow[3] = $vals['hsn_code'];
				$newrow[4] = $vals['manu_name'];
				$newrow[5] = $vals['exp_date'];
				$newrow[6] = $vals['batch_num'];
				$newrow[7] = $mrp;
				$newrow[8] = $vals['curr_qty'];
				$newrow[9] = $vals['curr_free_qty'];
				$newrow[10] = $vals['location_name'];
				$newrow[11] = number_format($vals['p_rate'],2);
				$newrow[12] = number_format($vals['p_amount'],2);
				$newrow[13] = $vals['discount']."%";
				$newrow[14] = number_format($dis,2);
				$newrow[15] = $vals['sgst']."%";
				$newrow[16] = number_format($vals['sgst_amt'],2);
				$newrow[17] = $vals['cgst']."%";
				$newrow[18] = number_format($vals['cgst_amt'],2);
				$newrow[19] = $vals['igst']."%";
				$newrow[20] = number_format($vals['igst_amt'],2);
				$newrow[21] = number_format($vals['total'],2);
				
				array_walk($newrow, 'filterData');
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
			
			exit;
		}
	    $data['inps'] = $inps;
		 
		$this->load->view('stocks_lists', $data);
	}
		public function product_stock_list(){
		$data['title'] = 'View All Stocks ';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}	
		$data['list']= $this->Stock_model->getstockdetails_product($inps);	
		//$data['list2']= $this->stock_model->getstockdetails1($inps);	
	  // echo '<pre>';print_r($data['list']); exit;
	    if(isset($inps['export']))
		{
			$heading = Array ('S.NO','Product Description','HSn Code','Current Quantity','Free Quantity','Unit','Value','SGST %','SGST Value','CGST %','CGST Value','IGST %','IGST Value','Total Value');
			$blankrow = Array('');


			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Stock Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			
			if(!$flag) 
			{
		
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true;
			}
			if(is_array($data['list']) && count($data['list']) ) {
			foreach($data['list'] as $vals) 
			{
				$qty = 0;
			    $free = 0;
			    $unit_value = 0;
			    $sgst =0;
			    $cgst =0;
			    $igst =0;
			    $sgst_amt =0;
			    $cgst_amt =0;
			    $igst_amt =0;
			    $sgst_val =0;
			    $cgst_val =0;
			    $igst_val =0;
			    $total=0;
			    $tax=0;
	           if(is_array($vals) && count($vals) ) {
				foreach ($vals as $key) {
					
					$qty += $key['curr_qty'];
					$free +=$key['curr_free_qty'];
					$unit_value += $key['p_amount'];
					$sgst += $key['sgst'];
					$cgst += $key['cgst'];
					$igst += $key['igst'];
					$sgst_amt += $key['sgst_amt'];
					$cgst_amt += $key['cgst_amt'];
					$igst_amt += $key['igst_amt'];
					$total += $key['total'];
					if($unit_value == 0){
						$unit_value += $key['comm_rate'];
						$tax +=($key['comm_rate']/100)*$key['tax'];
						
						if($key['tax_type'] == 1){
							$sgst = 0.00;
							$cgst = 0.00;
							$igst += $tax;
						}else{
							$sgst += $tax/2;
							$cgst += $tax/2;
							$igst = 0.00;
						}
							$sgst_amt += $sgst*$key['curr_qty'];
							$cgst_amt += $cgst*$key['curr_qty'];
							$igst_amt += $igst*$key['curr_qty'];
						$total += ((($key['comm_rate']/100)*$key['tax'])+$key['comm_rate']*$key['curr_qty'])+($sgst_amt+$cgst_amt+$igst_amt);
						
					}
					
				}
				$sgst_val = $sgst/count($vals);
				$cgst_val = $cgst/count($vals);
				$igst_val = $igst/count($vals);
				

				$newrow[0] = $cnt;
				$newrow[1] = $vals[0]['i_name'];
				$newrow[2] = $vals[0]['hsn_code'];
				$newrow[3] = $qty;
				$newrow[4] = $free;
				$newrow[5] = $vals[0]['location_name'];
				$newrow[6] = $unit_value;
				$newrow[7] = $sgst_val."%";
				$newrow[8] = $sgst_amt;
				$newrow[9] = $cgst_val."%";
				$newrow[10] = $cgst_amt;
				$newrow[11] = $igst_val."%";
				$newrow[12] = $igst_amt;
				$newrow[13] = $total;
				
				array_walk($newrow, 'filterData');
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}}}
			
			exit;
		}
	    $data['inps'] = $inps;
		 
		$this->load->view('product_stock_list', $data);
	}
	public function addStocks(){
		$data['title'] = 'View All Stocks :: ACC ';
		$this->load->view('add_stocks', $data);
	}
	public function addconsume(){
		$muinput= $this->security->xss_clean($this->input->post());
		//echo '<pre>';print_r($muinput);exit;
		$conf_id=$this->Stock_model->addconsume($muinput);
		$data['title'] = 'Consumption Entry:: A2Z ';
		
		echo "<script> window.location= '".base_url('index.php/Stocklist/consume')."'</script>";
	}
	public function import()
	{
		//echo '<pre>';print_r($_FILES);exit;
		$session_data = $this->session->all_userdata();	
		$inps = $this->input->post();
		 
		
		
	  if(isset($_FILES["excel_file"]))
		{
			$filename=$_FILES["excel_file"]["tmp_name"];
			if($_FILES["excel_file"]["size"] > 0)
			  {
				$file = fopen($filename, "r");
				$i=0;
				$type=0;
				 while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
				 {
					  if($i>0)
						 {
							/* $this->db->select('*');
							 $this->db->where('i_id',$emapData[4]);
							 $get_det = $this->db->get('tbl_product');
							 if($get_det->num_rows()>0)
							 {
								 //update 
								 $data = array(
									'ime_serial' => $emapData[7],
									);
								$this->db->where('i_id',$emapData[4]);
								$this->db->update('tbl_product', $data);
								exit;
							 }
							 else
							 {*/
								 $data = array(
								    'emp_id'=>$session_data['user_id'],
									'tbl_product_id'=>$emapData[0],
									'location' => $emapData[1],
								    'vendor_date' => date('Y-m-d', strtotime($emapData[2])),
									'vendor_name' => $emapData[3],
									'vendor_invoice' => $emapData[4],
									
									'serial_ime' => $emapData[7],
									'p_rate'=>$emapData[9],
									'total_val'=>$emapData[10],
									'qty' => $emapData[11],
									'tbl_purchase_req_id'=>0,
									'status_req' =>0,
									'created_date' => date('Y-m-d H:i:s'),
									);
								$this->db->insert('purchase_product', $data);
								if($emapData[8] == 'ACCESSORIES')
								{
									$type = 5;
								}
								else if($emapData[8] == 'Laptop')
								{
									$type = 1;
								}
								else if($emapData[8] == 'Mobile')
								{
									$type = 2;
								}
								else if($emapData[8] == 'TABLETS')
								{
									$type = 3;
								}
								else if($emapData[8] == 'SOFTWARE')
								{
									$type = 4;
								}
								else if($emapData[8] == 'AIO')
								{
									$type = 6;
								}
								else if($emapData[8] == 'BACK PACK')
								{
									$type = 7;
								}
								$data1 = array(
								    'i_category'=>$type,
									'i_name' => $emapData[5],
									'descr' =>$emapData[6],
									'storage'=>$emapData[1],
									//'ime_serial' => $emapData[7],
									'date' => date('Y-m-d H:i:s'),
									);
								$this->db->insert('tbl_product', $data1);
								
								
							//}
						
					 }
					 $i++;
				 }
				fclose($file);
				echo "<script> alert('Successfully added');window.location= '".base_url('index.php/Stocklist')."'</script>";
			  }
		}
	}
	public function consume(){
		$con="*";
		$data['item'] = $this->Sales_model->get_all_pro();
		$data['customer'] = $this->Sales_model->get_all_customer();
		//$data['unit'] = $this->Purchase_model->get_vat('master_location',$con);
		$data['title'] = 'Consumption';
		$this->load->view('consume', $data);
	}
	public function short_close()
	 {
			
		$data['title'] = 'PO Short Close';
		
		$data['list'] = $this->Stock_model->get_all_po_list();
	  
		$this->load->view('short_close', $data);
		
	}
	public function close_need_qty($id){
		$array = array('need_qty'=>0);
		$status = array("status"=>1);
		$data = $this->db->where('tbl_po_2.po_1_ref',$id)->update('tbl_po_2',$array);
		$data1 = $this->db->where('tbl_po_1.po_1_id',$id)->update('tbl_po_1',$status);
		echo "<script> alert('Successfully Closed');window.location= '".base_url('index.php/Stocklist/short_close')."'</script>";
	}
	public function free_product_add(){
		$data['title'] = 'Add Free Product';
		$data['product_list'] = $this->Stock_model->get_all_product_data();
		$data['vendor_list'] = $this->Stock_model->get_all_vendor_data();
		$this->load->view('free_product_add', $data);
	}
	public function add_free_product_stock(){
		$inps = $this->input->post();
		$data = $this->Stock_model->add_free_product_stock($inps);
		echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/Stocklist')."'</script>";
	}
}?>