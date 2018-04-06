<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Vendor extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  	  
		  $this->load->model('Vendor_model');
	  }
	
	public function index(){
		$data['title'] = 'View All Stocks :: ACC ';
		 $query = $this->Vendor_model->get_all_stocks();
		//echo '<pre>'; print_r($query);//exit;
		
		
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}

		$this->load->view('vendor_list', $data);
	}
	public function makepayment()
	{
		$data['title'] = 'MakePayment :: ACC ';
		$inps = $this->input->get();
		if($this->input->post())
		{
			$inps = $this->input->post();
			//echo '<pre>'; print_r($inps); exit;
			if($inps['payment_method'] == 1 ){
			$ins_ary = array('purchase_id'=>$inps['po_id'],'vendor_id'=>$inps['vendor_id'],'amt'=>$inps['paym_amount'],'inv_no'=>$inps['inv_no'],'payment_method'=>$inps['payment_method'],'created_date'=>date('Y-m-d H:i:s'));
			}
			else if($inps['payment_method'] == 2 )
			{
				$ins_ary = array('purchase_id'=>$inps['po_id'],'vendor_id'=>$inps['vendor_id'],'amt'=>$inps['paym_amount'],'cheque_no'=>$inps['che_no'],'inv_no'=>$inps['inv_no'],'bank_name'=>$inps['bank_name'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'));
			}
			else if($inps['payment_method'] == 3 )
			{
				$ins_ary = array('purchase_id'=>$inps['po_id'],'vendor_id'=>$inps['vendor_id'],'amt'=>$inps['paym_amount'],'reference_no'=>$inps['ref_nos'],'inv_no'=>$inps['inv_no'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'));
			}
			else if($inps['payment_method'] == 4 )
			{
				$ins_ary = array('purchase_id'=>$inps['po_id'],'vendor_id'=>$inps['vendor_id'],'amt'=>$inps['paym_amount'],'inv_no'=>$inps['inv_no'],'payment_method'=>$inps['payment_method'],'trans_id'=>$inps['trans_id'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'));
			}
			
			
			
			
			//echo '<pre>'; print_r($ins_ary); exit;
			$this->db->insert('tbl_vendorpayment',$ins_ary);
			
			echo "<script> alert('Purchase Amt Paid');window.location= '".base_url('index.php/Vendor/paymentlist')."'</script>";
			//redirect($this->config->item('base_url').'index.php/Sales/Paymentlist');
		}
		else
		{
			$data['list'] = $this->Vendor_model->get_stocks($inps);
			 //$data['item4'] = $this->Sales_model->getInvoicedbysearch($inps);
			$this->load->view('gen_payment',$data);
		}
	}
	public function paymentlist(){
		$data['title'] = 'View All Stocks :: ACC ';
		 $query = $this->Vendor_model->get_paym_det();
		//echo '<pre>'; print_r($query);//exit;
		
		
		if($query){
			$data['stock'] =  $query;
		} else {
			$data['stock'] =  '';
		}

		$this->load->view('vendor_paym_list', $data);
	}
}
?>