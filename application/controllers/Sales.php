<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Sales extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Sales_model');
		  $this->load->model('Purchase_model');		
		  $this->load->model('Payment_model');  
     }
	 //get_rows used to get rows of table
	 //get_single_row used to get 
	 
	 public function index(){
		//$table="tbl_manufacturer";$table1="tbl_item";$con="*";
		 $con="*";
		 $data['item'] = $this->Sales_model->get_all_pro();
		$data['customer'] = $this->Sales_model->get_all_customer();
		$data['unit'] = $this->Purchase_model->get_vat('master_location',$con);
		$data['title'] = 'Sales Billing ';
		$this->load->view('sales_billing', $data);
	}
	public function get_pro_det($stock_id,$cus_id){
		
		$data = $this->Sales_model->get_pro_det($stock_id,$cus_id);
		echo json_encode($data);
	}
	public function get_pro_det_non($stock_id,$cus_id){
		
		$data = $this->Sales_model->get_pro_det_non($stock_id,$cus_id);
		echo json_encode($data);
	}
	public function get_free_qty($stock_id){
		$this->db->select('*')->from('tbl_stock')->where('stock_id',$stock_id);
		$data = $this->db->get()->result_array();
		echo json_encode($data);
	}
	public function sales_return_payment(){
		$data['list'] = $this->Sales_model->sales_return_list();
	 	//print_r("<pre>"); print_r($data);exit();
		$data['title'] = "Sales Return List";
		$this->load->view('sales_return_list', $data);
	}
	public function sales_return(){
		$data['invoice'] = $this->Sales_model->sales_return_invoice();
		//print_r($data);exit();
		$data['title'] = "Sales Return List";
		$this->load->view('sales_return', $data);
	}
	public function get_bill_data($id){
		$data = $this->Sales_model->get_bill_data($id);
		echo json_encode($data);
	}
	public function sales_return_add(){
		$inps = $this->input->post();
		$data = $this->Sales_model->sales_return_add($inps);
		echo "<script>alert('Sales Return Successfully Completed'); window.location= '".base_url('index.php/Sales/sales_return_payment')."'</script>";
	}
	public function sales_bill_cancel($id){
		$data = $this->Sales_model->sales_bill_cancel($id);
		echo json_encode($data);
		/*echo "<script>alert('Sales Return Successfully Completed'); window.location= '".base_url('index.php/Sales/sales_return_payment')."'</script>";*/
	}
	public function sales_edit($id){
		$con = "*";
		$data['list'] = $this->Sales_model->sales_edit($id);
		$data['item'] = $this->Sales_model->get_all_pro();
		$data['customer'] = $this->Sales_model->get_all_customer();
		$data['unit'] = $this->Purchase_model->get_vat('master_location',$con);
		$data['title'] = "Sales Edit";
		$this->load->view('sales_edit', $data);
	}
	public function updatesales(){
		$inps = $this->input->post();
		//print_r($inps);exit();
		$data = $this->Sales_model->updatesales($inps);
		echo "<script>alert('Sales Edit Successfully Completed'); window.location= '".base_url('index.php/Sales/sales_payment')."'</script>";
	}

	public function gen_inv()
	{
		if($this->input->post())
		{
			$inps = $this->input->post();
			//echo '<pre>'; print_r($inps);exit;
			$ins_ary = array('sales_id'=>$inps['bill_no'],'customer_code'=>$inps['customer_code'],'total_amount'=>$inps['invpice_amount'],'created_date'=>date('Y-m-d H:i:s'));
			$this->db->insert('tbl_invoice',$ins_ary);
			redirect($this->config->item('base_url').'index.php/Sales/Invoicelist','refresh');
		}
		$inps = $this->input->get();
		//echo '<pre>'; print_r($inps); //exit;
		$data['list'] = $this->Sales_model->get_sales_byid($inps);
		$in['cus'] = $data['list'][0]['customer_code'];
		$this->load->model('Installation_model');
		$cus = $this->Installation_model->get_cus_det($in);
		if($cus[0]['customer_type']==1)
		{
			$custype = 'Private Hospital';
		}
		else if($cus[0]['customer_type']==2)
		{
			$custype = 'Clinic';
		}
		else if($cus[0]['customer_type']==3)
		{
			$custype = 'Government Hospital';
		}
		else if($cus[0]['customer_type']==4)
		{
			$custype = 'PHC (Primary Health Center)';
		}
		else
		{
			$custype = 'Scan Centers';
		}
		$data['c_det'] = '<strong>Name :</strong> '.$cus[0]['customer_name'].'<br /><strong>Area Name :</strong> '.$cus[0]['area_name'].'<br /><strong>City Name :</strong> '.$cus[0]['city_name'].'<br /><strong>State :</strong> '.$cus[0]['state_name'].'<br /><strong>Country : </strong>'.$cus[0]['country_name'].'<br /><strong>Pincode :</strong> '.$cus[0]['pincode'].'<br /><strong>Contact No : </strong> '.$cus[0]['mob_no1'].'<br /><strong>Customer Type : </strong> '.$custype;
		//echo '<pre>';print_r($data); exit;
		$this->load->view('gen_invoice',$data);
	}
	public function makepayment()
	{
		$data['title'] = 'MakePayment :: ACC ';
		$inps = $this->input->get();
		if($this->input->post())
		{
			$inps = $this->input->post();
			//echo '<pre>'; print_r($inps); exit;
		if($inps['payment_mode'] == 1)
		{
			if($inps['payment_method'] == 1 )
			{
			$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment1','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'));
			}
			else if($inps['payment_method'] == 2 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment1','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'cheque_no'=>$inps['che_no'],'bank_name'=>$inps['bank_name'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			else if($inps['payment_method'] == 3 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment1','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'reference_no'=>$inps['ref_nos'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			else if($inps['payment_method'] == 4 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment1','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'trans_id'=>$inps['trans_id'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			/*else
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment1','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d', strtotime($inps['purdate'])),'finance_name'=>$inps['finance'],'tot_month'=>$inps['month'],'emi'=>$inps['emi'],'created_date'=>date('Y-m-d H:i:s'));
			}*/
			//echo '<pre>'; print_r($ins_ary); exit;
			$this->db->insert('tbl_invoice_payment',$ins_ary);
		}
		else if($inps['payment_mode'] == 2)
		 {	
			for($j=1; $j<=1; $j++)
			{
				if($inps['payment_method'] == 1 )
			{
			$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment2','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'));
			}
			else if($inps['payment_method'] == 2 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment2','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'cheque_no'=>$inps['che_no'],'bank_name'=>$inps['bank_name'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			else if($inps['payment_method'] == 3 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment2','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'reference_no'=>$inps['ref_nos'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			else if($inps['payment_method'] == 4 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment2','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'trans_id'=>$inps['trans_id'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			/*else
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment2','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'));
			}*/
				//echo '<pre>'; print_r($ins_ary); exit;
				$this->db->insert('tbl_invoice_payment',$ins_ary);
			}
		}
		else if($inps['payment_mode'] == 3)
	   {	
		for($j=1; $j<=1; $j++)
		{
			$desc = 'Payment'.$j;
			if($inps['payment_method'] == 1 )
			{
			$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment3','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'));
			}
			else if($inps['payment_method'] == 2 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment3','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'cheque_no'=>$inps['che_no'],'bank_name'=>$inps['bank_name'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			else if($inps['payment_method'] == 3 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment3','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'reference_no'=>$inps['ref_nos'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			else if($inps['payment_method'] == 4 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment3','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'trans_id'=>$inps['trans_id'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			/*else
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment3','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d', strtotime($inps['purdate'])),'finance_name'=>$inps['finance'],'tot_month'=>$inps['month'],'emi'=>$inps['emi'],'created_date'=>date('Y-m-d H:i:s'));
			}*/
			//echo '<pre>'; print_r($ins_ary); exit;
			$this->db->insert('tbl_invoice_payment',$ins_ary);
		}
	 }
	else  if($inps['payment_mode'] == 4)
	  {	
		for($j=1; $j<=1; $j++)
		{
			$desc = 'Payment'.$j;
			if($inps['payment_method'] == 1 )
			{
			$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment4','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'));
			}
			else if($inps['payment_method'] == 2 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment4','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'cheque_no'=>$inps['che_no'],'bank_name'=>$inps['bank_name'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			else if($inps['payment_method'] == 3 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment4','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'reference_no'=>$inps['ref_nos'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			else if($inps['payment_method'] == 4 )
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment4','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d H:i:s'),'trans_id'=>$inps['trans_id'],'get_amt_date'=>date('Y-m-d', strtotime($inps['chq_dt'])));
			}
			/*else
			{
				$ins_ary = array('tbl_invoice_id'=>$inps['bill_no'],'description'=>'Payment4','customer_code'=>$inps['customer_code'],'product_amount'=>$inps['product_amt'],'payment_method'=>$inps['payment_method'],'paym_amount'=>$inps['paym_amount'],'payment_date'=>date('Y-m-d', strtotime($inps['purdate'])),'finance_name'=>$inps['finance'],'tot_month'=>$inps['month'],'emi'=>$inps['emi'],'created_date'=>date('Y-m-d H:i:s'));
			}*/
			//echo '<pre>'; print_r($ins_ary); exit;
			$this->db->insert('tbl_invoice_payment',$ins_ary);
		}
	 }
			$var = $this->db->select('paid_amt')->where('s_no',$inps['bill_no'])->get('tbl_invoice')->result_array();
				$proarray = array(
				'paid_amt'  =>$var[0]['paid_amt']+$inps['paym_amount'],
			);
			$this->db->where('s_no',$inps['bill_no']);
			$this->db->update('tbl_invoice',$proarray);
			echo "<script> alert('Order Confirmed');window.location= '".base_url('index.php/Sales/Paymentlist')."'</script>";
			//redirect($this->config->item('base_url').'index.php/Sales/Paymentlist');
		}
		else
		{
			$data['list'] = $this->Sales_model->getInvoicedbysearch($inps);
			$data['list1'] = $this->Sales_model->getInvoicedbysearch1($inps);
			//$data['item3'] = $this->Sales_model->get_seller_rows_paym();
		    //$data['item4'] = $this->Sales_model->getInvoicedbysearch($inps);
			$this->load->view('gen_payment_sale',$data);
		}
	}
	public function Invoicelist()
	{
		$data['title'] = 'Invoicelist :: ACC ';
		$data['list'] = $this->Sales_model->getInvoiced();
		$this->load->view('invoice_list',$data);
	}
	public function ajaxgetCustomer() {
		$data['customer'] = $this->Sales_model->get_rowsdet('cb_customer', '*', array('cid' => $_POST['id']));
		echo json_encode($data['customer']);
	}
     public function addSales() {
		$muinput= $this->security->xss_clean($this->input->post());
		//echo '<pre>';print_r($muinput);exit;
		$conf_id=$this->Sales_model->add_sales_entry($muinput);
		$data['title'] = 'Sales Entry:: A2Z ';
		//$data['list'] = $this->Sales_model->getInvoicedbysearch($muinput);
		//exit;
		echo "<script> alert('Order Confirmed');window.location= '".base_url('index.php/Sales/sales_payment')."'</script>";
		
	}
	public function makepaymentinv1()
	{
		$data['title'] = 'MakePayment :: ACC ';
		$inps = $this->input->get();
		$data['list'] = $this->Sales_model->getInvoicedbysearch($inps);
		$data['list1'] = $this->Sales_model->getInvoicedbysearch1($inps);
		$data['item3'] = $this->Sales_model->get_seller_rows_paym();
		    //$data['item4'] = $this->Sales_model->getInvoicedbysearch($inps);
			$this->load->view('gen_payment',$data);
		
	}
	
	public function Paymentlist()
	{
		$data['title'] = 'Paymentlist :: A2z ';
		$data['list'] = $this->Sales_model->Getpaymentlist();
		//echo '<pre>';print_r($data['list']);exit;
		$this->load->view('Paymentlist',$data);
	}
	function sales_print($id){
		$data['title'] = 'Paymentlist :: A2z ';
		$data['print_det'] = $this->Sales_model->get_print_det($id);
		$data['print_item'] = $this->Sales_model->get_print_item($id);
	//echo '<pre>';print_r($data['print_det']);exit;
		$this->load->view('sales_print',$data);
	}
	function sales_return_print($id){
		$data['title'] = 'Sales Return Print :: A2z ';
		$data['print_det'] = $this->Sales_model->get_return_print_det($id);
		$data['print_item'] = $this->Sales_model->get_return_print_item($id);
	//echo '<pre>';print_r($data['print_item']);exit;
		$this->load->view('sales_return_bill',$data);
	}
	public function sales_return_payment_list(){
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$data['title'] = 'Paymentlist :: A2Z ';
		$data['list'] = $this->Sales_model->sales_return_payment_list($inps);
		//echo '<pre>';print_r($data['list']);exit;
		$this->load->view('sales_return_payment_list',$data);
	}
	public function sales_payment()
	{
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$data['title'] = 'Paymentlist :: A2Z ';
		$data['list'] = $this->Sales_model->sales_payment($inps);
		//echo '<pre>';print_r($data['list']);exit;
		$this->load->view('sales_payment',$data);
	}
	public function sold_list() 
	{
		$data['title'] = 'Sales List :: ACC ';
		$data['list'] = $this->Sales_model->getList();
		$this->load->view('sold_list',$data);
	}
	public function print_data()
	{
		$session_data = $this->session->all_userdata();
		//$this->db->select('*');
		//$this->db->where('area_name',$session_data['location']);
		//$this->db->where('user_type',2);
		//$data['adrs'] = $this->db->get('cp_admin_login')->result_array();
		$inps = $this->input->get();
		$data['title'] = 'Invoice';
		$data['calls']= $this->Sales_model->getinvoiceds($inps);
		//echo '<pre>';print_r($data['calls']);exit;
		$this->load->view('table2',$data);
	}
	function sales_payment_list(){
				$data['title'] = 'Sales Payment';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}
		//echo '<pre>';print_r($inps); exit;
		$data['title'] = 'Credit Payment List';
		//$data['customer'] = $this->Sales_model->getList();
		$data['list'] = $this->Payment_model->sales_get_payment_list($inps);
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
		}
		

		
		$data['inps']=$inps;
		$this->load->view('sales_payment_list_data',$data);
	}
	
	public function get_cus_det()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$cus = $this->Sales_model->get_cus_det($inps);
		$c_det = '';
		//echo '<pre>';print_r($cus);exit;
		
			foreach ($cus as $row)
			{
				
				$c_det = '<strong>Name :</strong> '.$row['customer_name'].'<br /><strong>Area Name :</strong> '.$row['area_name'].'<br /><strong>City Name :</strong> '.$row['city_name'].'<br /><strong>State :</strong> '.$row['state_name'].'<br /><strong>Country : </strong>'.$row['country_name'].'<br /><strong>Pincode :</strong> '.$row['pincode'].'<br /><strong>Contact No : </strong> '.$row['mob_no1'].'<br />';
			
	}
		echo $c_det;
		
	}
	/*$c_det = '<strong>Name :</strong> '.$cus[0]['customer_name'].'&nbsp;<strong>Product Name :</strong> '.$cus[0]['i_name'].'&nbsp;&nbsp;</br><strong>Area Name :</strong> '.$cus[0]['area_name'].'&nbsp;<strong>Selling Rate :</strong> '.$cus[0]['selling_rate'].'&nbsp;&nbsp;</br><strong>City Name :</strong> '.$cus[0]['city_name'].'&nbsp;<strong>Advance Amt :</strong> '.$cus[0]['amt'].'&nbsp;&nbsp;</br><strong>State :</strong> '.$cus[0]['state_name'].'<br /><strong>Country : </strong>'.$cus[0]['country_name'].'<br /><strong>Pincode :</strong> '.$cus[0]['pincode'].'<br /><strong>Contact No : </strong> '.$cus[0]['mob_no1'].'<br />';*/
	 public function get_all_det()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$pro = $this->Sales_model->get_pro_rows($inps);
		//echo '<pre>';print_r($pro);exit;
		/*$dat = array(
			'minqty' 			    => $pro[0]['min_qty'],
			'maxqty' 			    => $pro[0]['max_qty'],
			);*/
			//echo '<pre>';print_r($dat);exit;
			if(isset($pro[0]))
			{
				
				$data['qty'] = $pro[0]['qty'];
				
				$data['purrate'] = $pro[0]['price'];
			
				
			}
			else
			{
				$data['qty'] = '0';
				
				$data['purrate'] = '0';
				
			}
			echo json_encode($data);
			
			
			
	}
	
//******************************************************************Sales return ends here**********************************************************************//
	
}
