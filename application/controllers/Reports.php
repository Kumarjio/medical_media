<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Reports_model');
		  $this->load->model('Stock_model');
		  $this->load->model('Purchase_model');		
		  $this->load->model('Sales_model');
		  $this->load->model('Storage_model');
     }

	
	 public function index()
	 {
			
		$data['title'] = 'GRN Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->get_all_grn($inps);
	  //print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			$heading = Array ('S.NO','PO No','PO Date','Vendor Name','Description','Hsn','Manufacture Name','Expire Date','Batch No','MRP','Qty','Free Qty','Unit','Unit Rate','Value','Discount %','Discount Value','SGST%','CGST%','IGST%','SGST Value','CGST Value','IGST Value','Total','Credite Period','Invoice No','Invoice Date','GRN No','GRN Date','Category','Sub Category','Status') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Purchase List Report" . date('dMY') . ".xls";
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
				$dis_cal=$row['p_rate']/100*$row['discount'];
				 if($row['pending_amt']>0)
				 {
				 	$sta="Not Paid";
				 }
				 else
				 {
				 	$sta="Paid";
				 }
				 $tax= $row['sgst_amt']+$row['cgst_amt']+$row['igst_amt'];
                                                $rate=$row['total'];
                                                $mrp=$tax+$rate;
				$newrow[0] = $cnt;
				$newrow[1] = $row['po_1_ref'];
				$newrow[2] = date('d-M-Y',strtotime($row['podate']));
				$newrow[3] = $row['vendor_name'];
				$newrow[4] = $row['i_name'];
				$newrow[5] = $row['hsn_code'];
				$newrow[6] = $row['manu_name'];
				$newrow[7] = $row['podate'];
				$newrow[8] = $row['batch_no'];
				$newrow[9] =  $mrp;
				$newrow[10] = $row['qty'];
				$newrow[11] = $row['po_free_qty'];
				$newrow[12] = $row['location_name'];
				$newrow[13] = $row['p_rate'];
				$newrow[14] = $row['p_rate']*$row['qty'];
				$newrow[15] = $row['discount'];
				$newrow[16] = $dis_cal;
				$newrow[17] = $row['sgst'];
				$newrow[18] = $row['cgst'];
				$newrow[19] = $row['igst'];
				$newrow[20] = $row['sgst_amt'];
				$newrow[21] = $row['cgst_amt'];
				$newrow[22] = $row['igst_amt'];
				$newrow[23] = $row['gtotal'];
				$newrow[24] =$row['v_period'];
				$newrow[25] = $row['vinvno'];
				$newrow[26] = date('d-M-Y',strtotime($row['pdate']));
				$newrow[27] = $row['po_id'];
				$newrow[28] = date('d-M-Y',strtotime($row['created_date']));
				$newrow[29] = $row['category_name'];
				$newrow[30] = $row['sub_category_name'];
				$newrow[31] = $sta;
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
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

		/*
		$con = '*';
		$data['storage']  = $this->Storage_model->get_all_Storage();
		$data['seller'] = $this->Purchase_model->get_all_datase('cb_seller',$con);*/
		$this->load->view('grn_report', $data);
		
	}
public function grn_return_report()
	 {
			
		$data['title'] = 'GRN Return Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->grn_return_report($inps);
	 // print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			$amts = '0';
			$spr = '0';
			$profitt = '0';
			$tot_qty = '0';
			//$this->load->library("excel");
				$heading = Array ('S.NO','Vendor Name','Description','HSN Code','Manufacture Name','Expiry Date','Batch No','MRP','Qty','Free Qty','Unit','Unit Rate','Value','SGST%','CGST%','IGST%','SGST Value','CGST Value','IGST Value','Total Value','Invoice No','Invoice Date','Purchase Return invoice n','urchase Return invoice Date','Status') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Purchase Return List Report" . date('dMY') . ".xls";
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
				if($row['confirm_return_pending']>0)
				{
					$status="Not Paid";
				}
				else
				{
					$status="Paid";
				}
				$taxamt=$row['return_confirm_sgst_amt']+$row['return_confirm_cgst_amt']+$row['return_confirm_igst_amt'];
				$mrp=$row['return_confirm_total']+$taxamt;
               $ret_value=$row['return_confirm_rate']*$row['return_confirm_qty'];

				$newrow[0] = $cnt;
				$newrow[1] = $row['vendor_name'];
				$newrow[2] = $row['i_name'];
				$newrow[3] = $row['hsn_code'];
				$newrow[4] = $row['manu_name'];
				
				$newrow[5] = date('d-M-Y', strtotime($row['exp_date']));
				$newrow[6] = $row['return_confirm_batch'];
				$newrow[7] = $mrp;
				$newrow[8] = $row['return_confirm_qty'];
				$newrow[9] = $row['curr_free_qty'];
				$newrow[10] = $row['location_name'];
				$newrow[11] = $row['return_confirm_rate'];
				$newrow[12] = $ret_value;
				$newrow[13] = $row['return_confirm_sgst'];
				$newrow[14] = $row['return_confirm_cgst'];
				$newrow[15] = $row['return_confirm_igst'];
				$newrow[16] = $row['return_confirm_sgst_amt'];
				$newrow[17] = $row['return_confirm_cgst_amt'];
				$newrow[18] = $row['return_confirm_igst_amt'];
				$newrow[19] = $row['confirm_return_gtotal'];
				$newrow[20] = $row['return_confirm_invoice'];
				$newrow[21] = date('d-M-Y',strtotime($row['return_confirm_date']));
				$newrow[22] = $row['goods_return_dc_no'];
				$newrow[23] =  date('d-M-Y',strtotime($row['goods_return_dc_date']));
					$newrow[24] = $status;
						//$newrow[26] = $row['goods_return_dc_no'];
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}
		$this->load->view('grn_return_report', $data);
		
	}
	public function expenses_report()
	 {
			
		$data['title'] = 'GRN Return Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->expenses_report($inps);
	  //print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			$amts = '0';
			$spr = '0';
			$profitt = '0';
			$tot_qty = '0';
			//$this->load->library("excel");
				$heading = Array ('S.NO','Voucher No','Expenses Type','Employee Name','Amount','Remarks','Total Value','Voucher Date','Payment Mode','Payment Details') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Expensess Report" . date('dMY') . ".xls";
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
				
				$newrow[0] = $cnt;
				$newrow[1] = $row['voucher_no'];
				$newrow[2] = $row['expenses_type'];
				$newrow[3] = $row['name'];
				$newrow[4] = $row['ex_amount'];
				
				$newrow[5] = $row['ex_remarks'];
				$newrow[6] = $row['exp_gtotal'];
				$newrow[7] = date('d-M-Y', strtotime($row['voucher_date']));
				$newrow[8] = $row['exp_payment_mode'];
				$newrow[9] = $row['exp_payment_details'];

				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}
		$this->load->view('reports/expenses_report', $data);
		
	}
	public function purchase_payment_report()
	 {
			
		$data['title'] = 'GRN Return Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->purchase_pay_report($inps);
	// print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			$amts = '0';
			$spr = '0';
			$profitt = '0';
			$tot_qty = '0';
			//$this->load->library("excel");
			$heading = Array ('S.NO','Vendor Name','Invoice No','Invoice Date','Total Value','Credit Period','Due date','Status','Payment Details') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Purchase Payment List Report" . date('dMY') . ".xls";
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
				$from = date_create($row['pay_date']);
                          $to = date_create(date('y-m-d'));
                          $interval = date_diff($from, $to);
                          if($row['v_period'] < $interval->format('%a')){?> <?php } ?>><?php $date1 = strtotime("+".$row['v_period']." days", strtotime($row['pay_date'])); $due= date('d-M-Y',$date1);
				 
		if($row['curr_pending']>0) { $status= "Not Paid";} else{$status= "Paid";}
				$newrow[0] = $cnt;
				$newrow[1] = $row['vend_name_ref'];
				$newrow[2] = $row['invoice_ref'];
				$newrow[3] = date('d-M-Y', strtotime($row['pay_date']));
				$newrow[4] = $row['invoice_amt_ref'];
				$newrow[5] = $row['v_period'];
				$newrow[6] = $due;
				$newrow[7] = $status;
				$newrow[8] = $row['pay_type'];
				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}
		$this->load->view('reports/purchase_payment_report', $data);
		
	}
	public function purchase_sum_report()
	 {
			
		$data['title'] = 'GRN Return Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->purchase_summary_report($inps);
	//print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			
$heading = Array ('S.NO','Vendor Name','Invoice No','Invoice Date','HSN Code','SGST %','CGST %','IGST %','Sum of SGST Value','Sum of CGST Value','Sum of IGST Value','Sum of Value','Sum of Total Value','GST No','Drug Lisence No 1','Drug Lisence No 2','Doctor Registration No','Reg Id') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Purchase Summary Report" . date('dMY') . ".xls";
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
			foreach($query as $vals) 
			{
				                     $sgst_amt = '';
                                     $cgst_amt = '';
                                     $igst_amt = '';
                                     $total = '';
                                     $sum='';
                                      foreach($vals as $row)
                                              {
                                                
                                  
                                 
                                  $sgst_amt +=$row['sgst_amt'];
                                  $cgst_amt +=$row['cgst_amt'];
                                  $igst_amt +=$row['igst_amt'];
                                  $total +=$row['total'];
                                  $sum +=$row['p_amount'];
        
                                                   }
				//echo "<pre>";print_r($row);exit;
				$sum=$row['p_rate']*$row['qty'];
				$newrow[0] = $cnt;
				$newrow[1] = $row['vendor_name'];
				$newrow[2] = $row['vinvno'];
				$newrow[3] = date('d-M-Y',strtotime($row['pdate']));
				$newrow[4] = $row['hsn_code'];
				$newrow[5] = $row['sgst'];
				$newrow[6] = $row['cgst'];
				$newrow[7] = $row['igst'];
				$newrow[8] = $sgst_amt;
				$newrow[9] = $cgst_amt;
				$newrow[10] = $igst_amt;
				$newrow[11] = $sum;
				$newrow[12] = $total;
				$newrow[13] = $row['gst_no'];
				$newrow[14] = $row['drug_lisence1'];
				$newrow[15] = $row['drug_lisence2'];
				$newrow[16] = $row['dr_reg_no'];
				$newrow[17] = $row['reg_id'];


				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}
		$this->load->view('reports/purchase_summary', $data);
		
	}
	public function stock_adj_report()
	 {
			
		$data['title'] = 'Stock Adjustment Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->stock_adjust_report($inps);
	//print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			
$heading = Array ('S.NO','Stock Adjustment Date','Description','HSN Code','Manufacture Name','MRP','Unit','Unit Rate','Total Value','Remarks') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Stock Adjustment Report" . date('dMY') . ".xls";
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
			foreach($query as $row) 
			{
				$mrp=$row['comm_rate']/100* $row['tax'] ;
				$rate=$mrp+$row['comm_rate'];
				$newrow[0] = $cnt;
				
				$newrow[1] = date('d-M-Y',strtotime($row['adj_data']));
				$newrow[2] = $row['i_name'];
				$newrow[3] = $row['hsn_code'];
				$newrow[4] = $row['manu_name'];
				$newrow[5] = $rate;
				$newrow[6] = $row['location_name'];
				$newrow[7] = $row['comm_rate'];
				$newrow[8] = $row['comm_rate'];
				$newrow[9] = $row['adj_remark'];
				


				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}
		$this->load->view('reports/stock_adj_report', $data);
		
	}
	public function PoReport()
	 {
			
		$data['title'] = 'Po Reports';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->po_reports($inps);
	// print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			$amts = '0';
			$spr = '0';
			$profitt = '0';
			$tot_qty = '0';
			//$this->load->library("excel");
			$heading = Array ('S.NO','PO No','PO Date','Vendor Name','Description','HSN Code','Manufacture Name','MRP','PO Qty','PO Free Qty','Unit','Unit Rate','Value','Discount  %','Discount Value','SGST %','SGST Value','CGST %CGST Value','CGST Value','IGST %','IGST Value','Total Value','Received Qty','Received Free Qty','Pending Qty','Pending Free Qty') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "PO List Report" . date('Ymd') . ".xls";
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
				$tax=$row['po_sgst']+$row['po_cgst']+$row['po_igst'];
                             $rate=$row['po_rate']*$row['po_qty'];
$mrp=$rate+$tax;
$pending_qty=$row['need_qty']-$row['rec_qty'];
$dis=$row['po_rate']/100 * $row['po_discount'];
				$newrow[0] = $cnt;
				$newrow[1] = $row['po_2_id'];
				$newrow[2] = date('d-M-Y',strtotime($row['po_date']));
				$newrow[3] = $row['vendor_name'];
				$newrow[4] = $row['i_name'];
				$newrow[5] = $row['hsn_code'];
				$newrow[6] = $row['manu_name'];
				$newrow[7] = $mrp;
				$newrow[8] = $row['po_qty'];
				$newrow[9] = $row['po_free_qty'];
				$newrow[10] = $row['location_name'];
				$newrow[11] = $row['po_rate'];
				$newrow[12] = $rate;
				$newrow[13] = $row['po_discount'];
				$newrow[14] = $dis;
				$newrow[15] = $row['po_sgst'];
				$newrow[16] = $row['po_sgstamt'];
				$newrow[17] = $row['po_cgst'];
				$newrow[18] = $row['po_cgstamt'];
				$newrow[19] = $row['po_igst'];
				$newrow[20] = $row['po_igstamt'];
				$newrow[21] = $row['po_gtotal'];
				
				$newrow[25] = $row['rec_qty'];
				$newrow[26] = $pending_qty;
				//$newrow[8] = $row['po_igst'];
				


				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}
		$this->load->view('reports/po_reports', $data);
		
	}public function sale_sum_report()
	 {
			
		$data['title'] = 'Sale Summary Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->sale_summary_report($inps);
	// print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
$heading = Array ('S.NO','Customer Name','Invoice No','Invoice Date','HSN Code','SGST %','CGST %','IGST %','Sum of SGST Value','Sum of CGST Value','Sum of IGST Value','Sum of Value','Sum of Total Value','GST No','Drug Lisence No 1','Drug Lisence No 2','Doctor Registration No','Reg Id') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Sale summary  Report" . date('dMY') . ".xls";
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
			                                $sgstamt = '';
                                            $cgstamt = '';
                                            $igstamt = '';
                                            $total = '';
                                            $gtotal = '';
                                            
			foreach($query as $value) 
			{
				  foreach ($value as $row) {
                   $sgstamt += $row['sgst_sale_amt'];
                    $cgstamt += $row['cgst_sale_amt'];
                   $igstamt += $row['igst_sale_amt'];
                     $total += $row['sales_price'];
                      $gtotal += $row['stot'];

                                                // print_r($sgstamt);
                                                }

				
				$newrow[0] = $cnt;
				$newrow[1] = $row['customer_name'];
				$newrow[2] = $row['bill_no'];
				$newrow[3] = date('d-M-Y',strtotime($row['refer_po_date']));
				$newrow[4] = $row['hsn_code'];
				$newrow[5] = $row['sgst_sale'];
				$newrow[6] = $row['cgst_sale'];
				$newrow[7] = $row['igst_sale'];
				$newrow[8] = $sgstamt;
				$newrow[9] = $cgstamt;
				$newrow[10] = $igstamt;
				$newrow[11] = $total;
				$newrow[12] = $gtotal;
				$newrow[13] = $row['cus_gst_no'];
				$newrow[14] = $row['cus_drug_lisence1'];
				$newrow[15] = $row['cus_drug_lisence2'];
				$newrow[16] = $row['cus_dr_reg_no'];
				$newrow[17] = $row['cus_reg_id'];
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}
		$this->load->view('reports/sales_summary_report', $data);
		
	}
	public function sales_report()
	 {
			
		$data['title'] = 'Sales Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->sales_report($inps);
	  //print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			$amts = '0';
			$spr = '0';
			$profitt = '0';
			$tot_qty = '0';
			//$this->load->library("excel");
			$heading = Array ('S.NO','Po No','Po Date','Customer Details','Product Decription','HSN Code','Manufacture Name','Expire Date','Batch No','MRP','Qty','Free Qty','Unit','Unit Rate','Value','Discount %','Discount Value','SGST%','CGST%','IGST%','SGST Amount','CGST Amount','IGST Amount','Total Value','Credit Period','Invoice No','Invoice Date','Category','Sub Category','Status','Payment Details','purchase unit Rate','Sales Unit Rate','Gross Profit ') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Sales List Report" . date('dMY') . ".xls";
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
			foreach($query as $value) 
			{
				foreach ($value as $row) {
					$unit_rate=$row['quantity']*$row['sales_price'];
					$profit=$row['p_rate']-$row['sales_price'];
					if($row['pending_pay_ref']>0)
					{
						$staus="Not Paid";
					}
					else
					{
						$staus="Paid";

					}
					$dis_cal=$row['sales_price']/100*$row['discount_sale_amt'];
				
				
				$newrow[0] = $cnt;
				$newrow[1] = $row['refer_po_no'];
				$newrow[2] = date('d-M-Y',strtotime($row['refer_po_date']));
				$newrow[3] = $row['customer_name'];
				$newrow[4] = $row['i_name'];
				$newrow[5] = $row['hsn_code'];
				$newrow[6] = $row['manu_name'];
				$newrow[7] = $row['exp_date'];
				$newrow[8] = $row['batch_num'];
				$newrow[9] = $row['sales_price'];
				$newrow[10] = $row['quantity'];
				$newrow[11] = $row['curr_free_qty'];
				$newrow[12] = $row['location_name'];
				$newrow[13] = $row['sales_price'];
				$newrow[14] = $unit_rate;
				$newrow[15] = $row['discount_sale_amt'];
				$newrow[16] = $dis_cal;
				$newrow[17] = $row['sgst_sale'];
				$newrow[18] = $row['cgst_sale'];
				$newrow[19] = $row['igst_sale'];
				$newrow[20] = $row['sgst_sale_amt'];
				$newrow[21] = $row['cgst_sale_amt'];
				$newrow[22] = $row['igst_sale_amt'];
				$newrow[23] = $row['total_amount'];
				$newrow[24] = $row['v_period'];
				$newrow[25] = $row['bill_no'];
				$newrow[26] = date('d-M-Y',strtotime($row['created_date']));
				$newrow[27] = $row['category_name'];
				$newrow[28] = $row['sub_category_name'];
				$newrow[29] = $staus;
				$newrow[30] = $row['pay_type'];
				$newrow[31] = $row['p_rate'];
				$newrow[32] = $row['sales_price'];
				$newrow[33] = $profit;



				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
		}
				
				
				// filter data
				
			
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

		/*
		$con = '*';
		$data['storage']  = $this->Storage_model->get_all_Storage();
		$data['seller'] = $this->Purchase_model->get_all_datase('cb_seller',$con);*/
		$this->load->view('sales_report', $data);
		
	}
	public function sales_return_report()
	 {
			
		$data['title'] = 'Sales Return Report';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Reports_model->sales_return_report($inps);
	  //print_r("<pre>");print_r($query);exit();
		if(isset($inps['export']))
		{
			$amts = '0';
			$spr = '0';
			$profitt = '0';
			$tot_qty = '0';
			//$this->load->library("excel");
			$heading = Array ('S.NO','Invoice No','Invoice Date','Customer Details','Description','HSN Code','Manufacture Name','Expire Date','Batch No','MRP','Qty','Unit','Unit Rate','Value','SGST%','CGST%','IGST%','SGST Value','CGST Value','IGST Value','otal Value','ales Return No','Sales Return date','Status','Payment Details') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Sales Return List Report" . date('dMY') . ".xls";
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


           if($row['return_pending_amount']>0)
           {
         $return_status='Not Paid';
           }
           else
           {
           	 $return_status='Paid';
           }
           $unit_val=$row['return_sales_rate']*$row['return_qty'];
           $tax=$row['return_cgst_amt']+$row['return_sgst_amt']+$row['return_igst_amt'];
                                               $rate=$row['return_sales_rate']*$row['return_qty'];
                                               $mrp=$tax+$rate;
				$newrow[0] = $cnt;
				$newrow[1] = "SB".$row['return_bill_no'];
				$newrow[2] = date('d-M-Y',strtotime($row['return_date']));
				$newrow[3] = $row['customer_name'];
				$newrow[4] = $row['i_name'];
				$newrow[5] = $row['hsn_code'];
				$newrow[6] = $row['manu_name'];
				$newrow[7] = date('d-M-Y',strtotime($row['exp_date']));
				$newrow[8] = $row['batch_num'];
				$newrow[9] = $mrp;
				$newrow[10] = $row['return_qty'];
				$newrow[11] = $row['location_name'];
				$newrow[12] = $row['return_sales_rate'];
				$newrow[13] = $unit_val;
				
			
				$newrow[14] = $row['return_sgst'];
				$newrow[15] = $row['return_cgst'];
				$newrow[16] = $row['return_igst'];
				$newrow[17] = $row['return_sgst_amt'];
				$newrow[18] = $row['return_cgst_amt'];
				$newrow[19] = $row['return_igst_amt'];
				$newrow[20] = $row['return_gtotal'];
				$newrow[21] = $row['return_bill_no'];
				$newrow[22] = date('d-M-Y',strtotime($row['return_date']));
				$newrow[23] = $return_status;
				//$newrow[21] = $row['return_igst'];

				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
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

		/*
		$con = '*';
		$data['storage']  = $this->Storage_model->get_all_Storage();
		$data['seller'] = $this->Purchase_model->get_all_datase('cb_seller',$con);*/
		$this->load->view('sales_return_report', $data);
		
	}


	/*A2Z Report Ends*/
	public function Purchase()
	{
		$data['title'] = 'Reports';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		
		/*$query = $this->Storage_model->get_all_Storage();
		if($query){
			$data['Storage'] =  $query;
		} else {
			$data['Storage'] =  '';
		}*/
		$query = $this->Reports_model->get_all_stocks($inps);
		//echo '<pre>'; print_r($query);//exit;
		if(isset($inps['export']))
		{
			$amts = '0';
			$spr = '0';
			$profitt = '0';
			$tot_qty = '0';
			//$this->load->library("excel");
			$heading = Array ('S.NO','Invoice No','Vendor','Product Name','Qty','Purchase Price','Tax','Total') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Purchase List Report" . date('dMY') . ".xls";
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
				$newrow[0] = $cnt;
				$newrow[1] = $row['vinvno'];
				//$newrow[2] = $customer;
				$newrow[2] = $row['vname'];
				//$newrow[4] = $row['i_code'];
				$newrow[3] = $row['i_name']. ' - ' .$row['descr'];
				$newrow[4] = $row['qty'];
				$newrow[5] = $row['p_rate'];
				$newrow[6] = $row['per_taxamt'];
				$newrow[7] = $row['gtotal'];
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
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

		$data['title'] = 'Purchase List  ';
		$con = '*';
		$data['storage']  = $this->Storage_model->get_all_Storage();
		$data['seller'] = $this->Purchase_model->get_all_datase('cb_seller',$con);
		$this->load->view('stockreportlist', $data);
	}
	public function statutory()
	{
		$data['title'] = 'Vat Returns Reports';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		
		/*$query = $this->Storage_model->get_all_Storage();
		if($query){
			$data['Storage'] =  $query;
		} else {
			$data['Storage'] =  '';
		}*/
		$query = $this->Reports_model->get_all_statutory($inps);
		//echo '<pre>'; print_r($query);exit;
		if(isset($inps['export']))
		{
			$amts = '0';
			$spr = '0';
			$profitt = '0';
			$tot_qty = '0';
			//$this->load->library("excel");
			$heading = Array ('S.NO','Vendor','Tin No','Cst No','Bill No','Bill Date','Product Name','Purchase Price','Qty','Tax','Total','Cus Name','Bill No','Date','Rate','Qty','Tax Amt','Total','Vat To Be Paid') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Vat Returns Report" . date('dMY') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			$vat_paid=0;
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			foreach($query as $row) 
			{
				if($row['tax_amt']>$row['tax_amount']){
															$vat_paid =$row['tax_amt']-$row['tax_amount'];
															}
															else{
																$vat_paid =$row['tax_amount']-$row['tax_amt'];
															}
				$newrow[0] = $cnt;
				$newrow[1] = $row['vname'];
				$newrow[2] = $row['tin_no'];
				$newrow[3] = $row['cst_no'];
				$newrow[4] = $row['vinvno'];
				$newrow[5] = date('d-M-Y', strtotime($row['date']));
				$newrow[6] = $row['i_name']. ' - ' .$row['descr'];
				$newrow[7] = $row['pro_total'];
				$newrow[8] = $row['tax_amount'];
				$newrow[9] = $row['qty'];	
				$newrow[10] = $row['gtotal'];				
				$newrow[11] = $row['customer_name']. ' - ' .$row['mob_no1'];
				$newrow[12] = $row['sno'];
				$newrow[13] = date('d-M-Y', strtotime($row['cf']));
				$newrow[14] = $row['total'];
				$newrow[15] = $row['quantity'];
				$newrow[16] = $row['tax_amt'];
				$newrow[17] = $row['total_value'];				
				$newrow[18] = $vat_paid;
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
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

		$data['title'] = 'Vat Returns List  ';
		$con = '*';
		$data['storage']  = $this->Storage_model->get_all_Storage();
		$data['seller'] = $this->Purchase_model->get_all_datase('cb_seller',$con);
		$this->load->view('statutory_report', $data);
	}
	public function sold_list() 
	{
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
		$data['title'] = 'Sales List';
		//$data['customer'] = $this->Sales_model->getList();
		$data['list'] = $this->Reports_model->getList($inps);
		//echo '<pre>';print_r($data['list']); exit;
		if(isset($inps['export']))
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
			$fileName = "Sales List Report" . date('dMY') . ".xls";
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
				/*if($row['payment_method'] == 1)
								{
									$type = "Cash";
								}
								else if($row['payment_method'] == 2)
								{
									$type = "Cheque / DD";
								}
								else if($row['payment_method'] == 3)
								{
									$type = "Online Transfer";
								}
								else if($row['payment_method'] == 4)
								{
									$type = "Credit Card / Debit Card";;
								}
								else if($row['payment_method'] == 5)
								{
									$type = 'Finance';
								}*/
				$newrow[0] = $cnt;
				$newrow[1] = $row['bill_no'];
				$newrow[2] = $row['customer_name'];
				$newrow[3] = $row['mob_no1'];
				$newrow[4] = $row['i_name'];
				$newrow[5] = $row['quantity'];
				$newrow[6] = $row['total_amount'];
				/*$newrow[6] = $row['paym_amount'];
				$newrow[7] = $row['product_amount']-$row['paym_amount'];
				$newrow[8] = $type;
				$newrow[9] = $row['reference_no'];
				$newrow[10] = $row['trans_id'];
				$newrow[11] = $row['bank_name'];
				$newrow[12] = $row['cheque_no'];
				$newrow[13] = $row['finance_name'];
				$newrow[14] = $row['tot_month'];
				$newrow[15] = $row['emi'];*/
				$newrow[7] = date('d-M-Y', strtotime($row['cds']));
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
			//echo implode("\t", array_values($blankrow)) . "\n";
			//$totalarry = array("","","","Total : ", number_format($totalamount, 2, '.', ''),"");
			//array_walk($totalarry, 'filterData');
			//echo implode("\t", array_values($totalarry)) . "\n";
			// headers for download
			
			exit;
		}
		

		
		$data['inps']=$inps;
		$this->load->view('sold_list_reoprt',$data);
	}
	public function vendor_det() 
	{
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
		$data['title'] = 'vendor details  ';
		//$data['customer'] = $this->Sales_model->getList();
		$data['items'] = $this->Reports_model->get_vendor_List($inps);
		//echo '<pre>';print_r($data['list']); exit;
		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','PO No','Vendor Name','Product Type','Product Name','Req Qty','Total Amt','Purchase Request Date','Invoice No','Pur Price','Pur Date','Qty','Payment Method','Paid Amt','Reference NO','Transaction Id','Bank Name','Cheque NO','Date') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Vendor Transaction Report" . date('Ymd') . ".xls";
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
			foreach($data['items'] as $row) 
			{
				if($row['payment_method'] == 1)
								{
									$type = "Cash";
								}
								else if($row['payment_method'] == 2)
								{
									$type = "Cheque / DD";
								}
								else if($row['payment_method'] == 3)
								{
									$type = "Online Transfer";
								}
								else if($row['payment_method'] == 4)
								{
									$type = "Credit Card / Debit Card";;
								}
								else if($row['payment_method'] == 5)
								{
									$type = 'Finance';
								}
				$newrow[0] = $cnt;
				$newrow[1] = $row['pur_req_id'];
				$newrow[2] = $row['vname'];
				$newrow[3] = $row['type_name'];
				$newrow[4] = $row['i_name'];
				$newrow[5] = $row['qtyss'];
				$newrow[6] = $row['total_amt'];
				$newrow[7] = $row['pur_date'];
				$newrow[8] = $row['vinvno'];
				$newrow[9] = $row['gtotal'];
				$newrow[10] = date('d-m-Y', strtotime($row['date']));
				$newrow[11] = $row['qty'];
				$newrow[12] = $type;
				$newrow[13] = $row['amt'];
				$newrow[14] = $row['reference_no'];
				$newrow[15] = $row['trans_id'];
				$newrow[16] = $row['bank_name'];
				$newrow[17] = $row['cheque_no'];
				$newrow[18] = date('d-m-Y', strtotime($row['created_date']));
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
			//echo implode("\t", array_values($blankrow)) . "\n";
			//$totalarry = array("","","","Total : ", number_format($totalamount, 2, '.', ''),"");
			//array_walk($totalarry, 'filterData');
			//echo implode("\t", array_values($totalarry)) . "\n";
			// headers for download
			
			exit;
		}
		

		$con = '*';
		$data['inps']=$inps;
		$data['seller'] = $this->Purchase_model->get_all_datase('cb_seller',$con);
		$this->load->view('vendor_list_reoprt',$data);
	}
	public function stock(){
		$data['title'] = 'Reports';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}		
		$query = $this->Reports_model->get_stock_summary($inps);
		//echo '<pre>';print_r($query); exit;
		//if($this->input->get())
		if(isset($inps['export']))
		{
			$heading = Array ('S.NO','Invoice No','Customer Name','Mobile No','Product Name','Billed Qty','Total Amt','Date','Hands In Quantity') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			$fileName = "Stocks Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			// file name for download
			
			$flag = false;
			$cnt = 1;
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			foreach($query as $row) 
			{
				
				
				
				$newrow[0] = $cnt;
                $newrow[1] = $row['bill_no'];
				$newrow[2] = $row['customer_name'];
				$newrow[3] = $row['mob_no1'];
				$newrow[4] = $row['i_name'];
				$newrow[5] = $row['quantity'];
				$newrow[6] = $row['total_amount'];
				$newrow[7] = date('d-m-Y', strtotime($row['cds']));
				$newrow[8] = $row['qty'];
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
			//echo implode("\t", array_values($blankrow)) . "\n";
			//$totalarry = array("","","","Total : ", number_format($totalamount, 2, '.', ''),"");
			//array_walk($totalarry, 'filterData');
			//echo implode("\t", array_values($totalarry)) . "\n";
			// headers for download
			
			
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['list'] =  $query;
		} else {
			$data['list'] =  '';
		}
		//echo '<pre>';print_r($data['customer']);exit();
		$data['title'] = 'stocks ists ';
		//echo '<pre>';print_r($data['product']);exit();
		$this->load->view('stocks_lists_report', $data);
	}
	public function stock_transfer(){
		$data['title'] = 'Reports';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}		
		$query = $this->Reports_model->get_stock_transfer($inps);
		//echo '<pre>';print_r($query); exit;
		//if($this->input->get())
		if(isset($inps['export']))
		{
			$heading = Array ('S.NO','Requested Location','Product Name','Product Type','Serial/Ime NO','Req Qty','Req Date','Material Request From','Approved Qty','Date') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			$fileName = "stock transfer" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			// file name for download
			
			$flag = false;
			$cnt = 1;
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			foreach($query as $row) 
			{
				
				
				
				$newrow[0] = $cnt;
                $newrow[1] = $row['req_emp_location'];
				$newrow[2] = $row['i_name'];
                $newrow[3] = $row['type_name'];
				$newrow[4] = $row['serial_ime'];
				$newrow[5] = $row['req_qty'];
				$newrow[6] = date('d-m-Y', strtotime($row['cd']));
				$newrow[7] = $row['req_product_location'];
				$newrow[8] = $row['approved_qty'];
				$newrow[9] = date('d-m-Y', strtotime($row['delivery_date']));
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
			//echo implode("\t", array_values($blankrow)) . "\n";
			//$totalarry = array("","","","Total : ", number_format($totalamount, 2, '.', ''),"");
			//array_walk($totalarry, 'filterData');
			//echo implode("\t", array_values($totalarry)) . "\n";
			// headers for download
			
			
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['list'] =  $query;
		} else {
			$data['list'] =  '';
		}
		//echo '<pre>';print_r($data['customer']);exit();
		$data['title'] = 'stock transfer';
		//echo '<pre>';print_r($data['product']);exit();
		$data['storage']  = $this->Storage_model->get_all_Storage_loc();
		$this->load->view('stock_transfer_report', $data);
	}
	 public function customer(){
		 $data['title'] = 'Reports';
		 if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}		
		$query = $this->Reports_model->get_cus($inps);
		//echo '<pre>';print_r($query); exit;
		if($this->input->post())
		{
			$heading = Array ('S.NO','Customer Id','Customer Name','Mobile','Area Name','Product Type','Product Name','Selling Rate','Payment Method','Amount','Reference NO','Transaction Id','Bank Name','Cheque NO','Date') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			$type =0;
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			foreach($query as $row) 
			{
				if($row->payment_method == 1)
								{
									$type = "Cash";
								}
								else if($row->payment_method == 2)
								{
									$type = "Cheque / DD";
								}
								else if($row->payment_method == 3)
								{
									$type = "Online Transfer";
								}
								else if($row->payment_method == 4)
								{
									$type = "Credit Card / Debit Card";;
								}
								else if($row->payment_method == 5)
								{
									$type = 'Finance';
								}
				
				
				$newrow[0] = $cnt;
				$newrow[1] = $row->cid;
				$newrow[2] = $row->customer_name;
				$newrow[3] = $row->mob_no1;
				$newrow[4] = $row->area_name;
				$newrow[5] = $row->type_name;
				$newrow[6] = $row->i_name;
				$newrow[7] = $row->selling_rate;
				$newrow[8] = $type;
				$newrow[9] = $row->amt;
				$newrow[10] = $row->reference_no;
				$newrow[11] = $row->trans_id;
				$newrow[12] = $row->bank_name;
				$newrow[13] = $row->cheque_no;
				$newrow[14] = date('d-m-Y', strtotime($row->created_date));
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
			//echo implode("\t", array_values($blankrow)) . "\n";
			//$totalarry = array("","","","Total : ", number_format($totalamount, 2, '.', ''),"");
			//array_walk($totalarry, 'filterData');
			//echo implode("\t", array_values($totalarry)) . "\n";
			// headers for download
			$fileName = "Customer Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['customer'] =  $query;
		} else {
			$data['customer'] =  '';
		}
		//echo '<pre>';print_r($data['customer']);exit();
		$data['title'] = 'View All Customer  Trading ';
		//echo '<pre>';print_r($data['product']);exit();
		$this->load->view('customerlist_report', $data);
	}
		 
		 
public function sales_payment(){
		$data['title'] = 'Reports';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}		
		$query = $this->Reports_model->get_Sale_Payment($inps);
		//echo '<pre>';print_r($query); exit;
		//if($this->input->get())
		if(isset($inps['export']))
		{
			$heading = Array ('S.NO','Customer Name','Invoice No','Invoice Date','Total Value','Credit Period','Due date','Status','Payment Details') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			$fileName = "Sales Payment" . date('dMY') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			// file name for download
			
			$flag = false;
			$cnt = 1;
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			foreach($query as $row) 
			{
				 /*if($row['c_period'] < $interval->format('%a')){?> <?php } ?>><?php $date1 = strtotime("+".$row['c_period']." days", strtotime($row['pay_date'])); $due= date('d-m-Y',$date1);*/
				if($row['pending_amt']>0) {$sal_pay_status= 'Not Paid' ;} else {$sal_pay_status= 'Paid';}
				
				$newrow[0] = $cnt;
                $newrow[1] = $row['customer_name'];
				$newrow[2] = $row['sales_invoice_ref'];
                $newrow[3] = date('d-M-Y', strtotime($row['refer_po_date']));
				$newrow[4] = $row['total_amount'];
				$newrow[5] = $row['c_period'];
				//$newrow[6] = $due;
				$newrow[7] = $sal_pay_status;
				$newrow[] = $row['pay_type'];
			
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				// filter data
				
			
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
		//echo '<pre>';print_r($data['customer']);exit();
		$data['title'] = 'Sales Payments Reports';
		//echo '<pre>';print_r($data['product']);exit();
		//$data['storage']  = $this->Storage_model->get_all_Storage_loc();
		$this->load->view('reports/sales_payment_report', $data);
	}
}
