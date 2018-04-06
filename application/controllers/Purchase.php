<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model
		  $this->load->library('email');  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Purchase_model');		  
     }
    public function index()
    {
        $inps = $this->input->post();
		$session_data = $this->session->all_userdata();
		$con="*";
		$data['item'] = $this->Purchase_model->get_all_pro('tbl_product',$con);
		$data['vendor'] = $this->Purchase_model->get_all_vendor();
		$data['po_no'] = $this->Purchase_model->get_all_po();
		$data['storage'] = $this->Purchase_model->get_all_storage();
		//$data['unit'] = $this->Purchase_model->get_vat('master_location',$con);
		$data['title'] = 'Purchase Entry';
		$this->load->view('purchase_entry', $data);
   }
   public function get_correspond_details()
     {
     	$inps = $this->input->post();
     	$details = $inps['details'];
     	//print_r($details);exit();
          $data = $this->Purchase_model->get_correspond_details($details);
          echo json_encode($data);
     }
     public function get_po_num($vend_id){
     	$this->db->select('*')->from('tbl_po_1')->where('tbl_po_1.vendor_ref_id',$vend_id)->where('tbl_po_1.status',0);
     	$data = $this->db->get()->result_array();
     	echo json_encode($data);
     }













	
	public function getItems() {
		//header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->Purchase_model->getItems($_POST['supplier_id'])));	
	}
	public function jsonSingleDetails() {
		//header('Content-Type: application/x-json; charset=utf-8');
		//echo(json_encode($this->Purchase_model->jsonSingleDetails($_POST['item_id'])));	
		echo(json_encode($this->Purchase_model->jsonSingleDetails($_POST['selectfields'],$_POST['tbl_name'],$_POST['where_cond'])));	
		//echo(json_encode($_POST['where_cond']));
	}
        
	

//******************************************************************Purchase entry starts here**********************************************************************//
	 public function itemDetails() {
		//header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->Purchase_model->itemDetails($_POST['supplier_id'])));	
	}
	
       
	 
	 public function ajaxget(){
		if(isset($_POST['sprice'])) { $select="s_price";$table="tbl_item";$where=$_POST['sprice']; }
		if(isset($_POST['stax'])) { $select="s_tax";$table="tbl_item";$where=$_POST['stax']; }
		if(isset($_POST['prate'])) { $select="p_rate";$table="tbl_item";$where=$_POST['prate']; }
		if(isset($_POST['ptax'])) { $select="p_tax";$table="tbl_item";$where=$_POST['ptax']; }
		if(isset($_POST['mrp'])) { $select="mrp";$table="tbl_item";$where=$_POST['mrp']; }
		$data['item'] = $this->Purchase_model->get_ajax_single_data($select,$table,$where);		
	}
	public function getPreviousRates() {
			echo(json_encode($this->Purchase_model->getPreviousRates($_POST['itemid'], $_POST['supplier_id'])));	

	}
	public function batchCheck() {
			echo $this->Purchase_model->batchCheck($_POST['batch_no']);	

	}
	public function qtyCheck() {
			echo $this->Purchase_model->qtyCheck($_POST['item_code'], $_POST['batch_no']);	

	}
	public function addPurchaseEntry() {
           
	    $session_data = $this->session->all_userdata();
		$muinput= $this->input->post();
		$conf_id=$this->Purchase_model->add_purchase_entry($muinput);
		$data['title'] = 'Purchase Entry ';
		echo "<script> window.location= '".base_url('index.php/Stock/index')."'</script>";
		
	}
     public	function send_mail(){
 
		  $this->email->from('mohitj475@gmail.com', 'Mohit');
		  $this->email->to('mohitj475@gmail.com');//1way
		  $list = array('one@example.com', 'two@example.com', 'three@example.com');

$this->email->to($list);//2way
		  $this->email->subject('mail send demonstration');
		  $this->email->message('this is testing');
		  
		  $this->email->send();
		  
		  echo $this->email->print_debugger();
 }
        public function date_parse1() 
	    {
			$inps = $this->input->post();
			/*$d1 = new DateTime($inps['dt']);
			$d2 = new DateTime($inps['expdate']);*/
			$date1=date_create(date('d-m-Y', strtotime($inps['dt'])));
			$date2=date_create(date('d-m-Y', strtotime($inps['expdate'])));
			$diff=date_diff($date1,$date2);
			$diffs = $diff->format("%a");

			//$start = date('d-m-Y', strtotime($inps['dt']));
			//$end = date('d-m-Y', strtotime($inps['expdate']));
			//$diffs = $end - $start;
       // $days_between = ceil(abs($end - $start) / 2);
		//$diffs = $d2->diff($d1);
		//$days = $diff->format("%d days");
		//echo '<pre>';print_r($diffs);exit;	
		
		    if($inps['msdate'] == 2)
			{
				$vals = $diffs / $inps['msdate'];
				$diff_dys = explode('.',$vals);
				if(isset($diff_dys[1]))
				{
					$vals = $diff_dys[0];
				}
				//$vals = round($diffs / $inps['msdate']);
				/*$today=date("Y-m-d",$vals);
				echo '<pre>';print_r($today);exit;
				*///$days = $vals->format("%d days");
				//$date = date('d-m-Y', strtotime($vals));
				//$day = $diff->format('%d days');
				//echo '<pre>';print_r($date);exit;
				/*$data[0] = strtotime(date("Y-m-d", strtotime($inps['dt'])) . " +".$vals."days");
				$data[1] = strtotime(date("Y-m-d", strtotime($data[0])) . " +".$vals."days");*/
				//$data[0] = date("Y-m-d", strtotime($inps['dt']. " +".$vals."days"));
				$data['date0'] = date("d-m-Y", strtotime($inps['dt']. " +".$vals."days"));
				//echo '<pre>';print_r($data);exit;
				$data['date1'] =date("d-m-Y", strtotime($data['date0']. " +".$vals."days"));
		
		    }
		    else if($inps['msdate'] == 3)
		    {
				$vals = $diffs / $inps['msdate'];
				$diff_dys = explode('.',$vals);
				if(isset($diff_dys[1]))
				{
					$vals = $diff_dys[0];
				}
				$data['date0'] = date("d-m-Y", strtotime($inps['dt']. " +".$vals."days"));
				//echo '<pre>';print_r($data);exit;
				$data['date1'] =date("d-m-Y", strtotime($data['date0']. " +".$vals."days"));
				$data['date2'] =date("d-m-Y", strtotime($data['date1']. " +".$vals."days"));
				
		    }
			else if($inps['msdate'] == 4)
		    {
				$vals = $diffs / $inps['msdate'];
				$diff_dys = explode('.',$vals);
				if(isset($diff_dys[1]))
				{
					$vals = $diff_dys[0];
				}
				$data['date0'] = date("d-m-Y", strtotime($inps['dt']. " +".$vals."days"));
				//echo '<pre>';print_r($data);exit;
				$data['date1'] =date("d-m-Y", strtotime($data['date0']. " +".$vals."days"));
				$data['date2'] =date("d-m-Y", strtotime($data['date1']. " +".$vals."days"));
				$data['date3'] =date("d-m-Y", strtotime($data['date2']. " +".$vals."days"));
				
		    }
			else if($inps['msdate'] == 5)
		    {
				$vals = $diffs / $inps['msdate'];
				$diff_dys = explode('.',$vals);
				if(isset($diff_dys[1]))
				{
					$vals = $diff_dys[0];
				}
				$data['date0'] = date("d-m-Y", strtotime($inps['dt']. " +".$vals."days"));
				//echo '<pre>';print_r($data);exit;
				$data['date1'] =date("d-m-Y", strtotime($data['date0']. " +".$vals."days"));
				$data['date2'] =date("d-m-Y", strtotime($data['date1']. " +".$vals."days"));
				$data['date3'] =date("d-m-Y", strtotime($data['date2']. " +".$vals."days"));
				$data['date4'] =date("d-m-Y", strtotime($data['date3']. " +".$vals."days"));
				
		    }
			else if($inps['msdate'] == 6)
		    {
				$vals = $diffs / $inps['msdate'];
				$diff_dys = explode('.',$vals);
				if(isset($diff_dys[1]))
				{
					$vals = $diff_dys[0];
				}
				$data['date0'] = date("d-m-Y", strtotime($inps['dt']. " +".$vals."days"));
				//echo '<pre>';print_r($data);exit;
				$data['date1'] =date("d-m-Y", strtotime($data['date0']. " +".$vals."days"));
				$data['date2'] =date("d-m-Y", strtotime($data['date1']. " +".$vals."days"));
				$data['date3'] =date("d-m-Y", strtotime($data['date2']. " +".$vals."days"));
				$data['date4'] =date("d-m-Y", strtotime($data['date3']. " +".$vals."days"));
				$data['date5'] =date("d-m-Y", strtotime($data['date4']. " +".$vals."days"));
			 }
			else
			{
				$vals = $diffs / $inps['msdate'];
				$diff_dys = explode('.',$vals);
				if(isset($diff_dys[1]))
				{
					$vals = $diff_dys[0];
				}
				$data['date0'] = date("d-m-Y", strtotime($inps['dt']. " +".$vals."days"));
				//echo '<pre>';print_r($data);exit;
				$data['date1'] =date("d-m-Y", strtotime($data['date0']. " +".$vals."days"));
				$data['date2'] =date("d-m-Y", strtotime($data['date1']. " +".$vals."days"));
				$data['date3'] =date("d-m-Y", strtotime($data['date2']. " +".$vals."days"));
				$data['date4'] =date("d-m-Y", strtotime($data['date3']. " +".$vals."days"));
				$data['date5'] =date("d-m-Y", strtotime($data['date4']. " +".$vals."days"));
				$data['date6'] =date("d-m-Y", strtotime($data['date5']. " +".$vals."days"));
				
				
			
		    }
		
		//echo '<pre>';print_r($data);exit;
		
		echo json_encode($data);
	}
		
		
	public function purchaseConfirm($id) {
		$query=$this->Purchase_model->purchase_confirm($id);
		echo "<script> alert('Order Confirmed');window.location= '".base_url('index.php/Purchase')."'</script>";

		
	}
	public function purchaseCancel($id) {
		$query=$this->Purchase_model->purchase_cancel($id);
		echo "<script> alert('Order Cancelled');window.location= '".base_url('index.php/Purchase')."'</script>";

	}
//******************************************************************Purchase entry ends here**********************************************************************//


//******************************************************************Purchase return starts here**********************************************************************//
	 public function purchaseReturn(){
		$data['manufact'] = $this->Purchase_model->get_all_data('tbl_manufacturer','m_name, m_id', array('is_delete' => 0));	
		//$data['item'] = $this->Purchase_model->get_all_data('tbl_item','*',  array('is_delete' => 0));	
		$data['type'] = $this->Purchase_model->get_all_data('tbl_return_type','*', array('is_delete' => 0) );	
		$data['title'] = 'Purchase Return:: Banyan Trading ';
		$this->load->view('purchase_return', $data);
	}
	
	
	public function getBatch() {
		//header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->Purchase_model->getBatch($_POST['itemid'], $_POST['supplier_id'])));	
	}
	public function getDetails() {
		//header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->Purchase_model->getDetails($_POST['itemid'], $_POST['supplier_id'], $_POST['batch_no'])));	
	}
	public function addPurchaseReturn() {
		$muinput= $this->security->xss_clean($this->input->post());
		$conf_id=$this->Purchase_model->add_purchase_return($muinput);
		echo "<script> alert('Purchase return added successfully');window.location= '".base_url('index.php/purchase/purchaseReturn')."'</script>";
	}
//******************************************************************Purchase return ends here**********************************************************************//

//******************************************************************Purchase payments starts here**********************************************************************//	
	 public function PurchasePayments(){
		 $table="tbl_manufacturer";$table1="tbl_product";$con="*";
		 $data['bank'] = $this->Purchase_model->get_all_data('tbl_bank',$con);	

		$data['manufact'] = $this->Purchase_model->get_all_data($table,$con);	
		$data['item'] = $this->Purchase_model->get_all_data($table1,$con);	
		$data['title'] = 'Purchase Entry:: Banyan Trading ';
		$this->load->view('purchase_payments', $data);
	}
	 public function getPendingAmount(){		 
		 echo $this->Purchase_model->get_pending_amount($_POST['supplier_id']);
			//echo(json_encode($this->Purchase_model->getPendingAmount($_POST['supplier_id'])));	
 
		 
	 }
	 
	  public function getInvoices(){		 
		 echo(json_encode($this->Purchase_model->get_invoices($_POST['supplier_id'])));
			//echo(json_encode($this->Purchase_model->getPendingAmount($_POST['supplier_id'])));	
 
		 
	 }
	 public function addPurchasePayment() {
		$muinput= $this->security->xss_clean($this->input->post());
		$conf_id=$this->Purchase_model->add_purchase_payment($muinput);
		echo "<script> alert('Purchase payment added successfully');window.location= '".base_url('index.php/Purchase/purchasePayments')."'</script>";
	}
        
        public function checkdupinvoice() {        
            $invno = $_POST['vinvno'];
            $invrow = $this->Purchase_model->purchase_invoice($invno);
            if(empty($invrow))
                echo '';
            else
                echo 'Y';
        }
      
	  public function get_pro_det()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$pro = $this->Purchase_model->get_seller_rows1($inps);
		//echo '<pre>';print_r($pro);exit;
		/*$dat = array(
			'minqty' 			    => $pro[0]['min_qty'],
			'maxqty' 			    => $pro[0]['max_qty'],
			);*/
			//echo '<pre>';print_r($dat);exit;
			if(isset($pro[0]))
			{
				$data['minqty'] = $pro[0]['min_qty'];
				$data['maxqty'] = $pro[0]['max_qty'];
			}
			else
			{
				$data['minqty'] = '0';
				$data['maxqty'] = '0';
			}
			echo json_encode($data);
			
			
			
	}
	 public function get_all_det()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$pro = $this->Purchase_model->get_alldet_rows($inps);
		//echo '<pre>';print_r($pro);exit;
		/*$dat = array(
			'minqty' 			    => $pro[0]['min_qty'],
			'maxqty' 			    => $pro[0]['max_qty'],
			);*/
			//echo '<pre>';print_r($dat);exit;
			if(isset($pro[0]))
			{
				if($pro[0]['pro_type'] == '1')
				{
					$var= 'Laptop';
				}
				else if($pro[0]['pro_type'] == '2')
				{
					$var= 'Mobile';
				}
				else if($pro[0]['pro_type'] == '3')
				{
					$var= 'TABLETS';
				}
				else if($pro[0]['pro_type'] == '4')
				{
					$var= 'SOFTWARE';
				}
				else
				{
					$var= 'ACCESSORIES';
				}
				$data['protype'] = $var;
				$data['qty'] = $pro[0]['qty'];
				$data['vat'] = $pro[0]['vat'];
				$data['proid'] = $pro[0]['i_name'];
				$data['rate'] = $pro[0]['pur_rate'];
				$data['pro_id'] = $pro[0]['pro_id'];
				$data['vname'] = $pro[0]['seller_name'];
				$data['cdays'] = $pro[0]['credit_days'];
				
			}
			else
			{
				$data['protype'] = '0';
				$data['qty'] = '0';
				$data['vat'] = '0';
				$data['proid'] = '0';
				$data['rate'] = '0';
				$data['pro_id'] = '0';
				$data['vname'] = '0';
				$data['cdays'] = '0';
				
			}
			echo json_encode($data);
			
			
			
	}
  
	 public function get_all_det1()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$pro = $this->Purchase_model->get_alldet_rows1($inps);
		//echo '<pre>';print_r($pro);exit;
		/*$dat = array(
			'minqty' 			    => $pro[0]['min_qty'],
			'maxqty' 			    => $pro[0]['max_qty'],
			);*/
			//echo '<pre>';print_r($dat);exit;
			if(isset($pro[0]))
			{
				$data['vat'] = $pro[0]['vat'];
				$data['service_tax'] = $pro[0]['service_tax'];
			}
			else
			{
				$data['vat'] = '0';
				$data['service_tax'] = '0';
			}
			echo json_encode($data);
			
			
			
	}
//******************************************************************Purchase payments ends here**********************************************************************//
	
}
