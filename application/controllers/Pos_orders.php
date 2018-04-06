<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pos_orders extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Pos_model');		  
     }
 public function index(){
	 $data['title'] = 'View All Stocks :: Arrow18 ';
		     
              $session_data = $this->session->all_userdata();
            $con="*";
			$data['items'] = $this->Pos_model->get_all_stocks();
            /*$data['item'] = $this->Pos_model->get_all_pro('tbl_product',$con);
			//$data['item_qty'] = $this->Pos_model->get_all_pro_qty('purchase_product',$con);
			//echo '<pre>';print_r($data['item_qty']);exit;
			$data['seller'] = $this->Pos_model->get_all_datase('cb_seller',$con);
			//$data['location'] = $this->Pos_model->get_location($id);
			//$data['location'] = $this->Pos_model->get_seller_rows1($inps);
			//echo '<pre>';print_r($data['vat']);exit;	
            $data['title'] = 'Purchase Entry:: Arrow18 ';*/
            $this->load->view('purchase_entry_lists', $data);
	}
	public function addentry(){
	 $data['title'] = 'View All Stocks :: Arrow18 ';
		     
              $session_data = $this->session->all_userdata();
            $con="*";
			//$query = $this->Pos_model->get_all_stocks();
            $data['item'] = $this->Pos_model->get_all_pro('tbl_product',$con);
			//$data['item_qty'] = $this->Pos_model->get_all_pro_qty('purchase_product',$con);
			//echo '<pre>';print_r($data['item_qty']);exit;
			$data['seller'] = $this->Pos_model->get_all_datase('cb_seller',$con);
			//$data['location'] = $this->Pos_model->get_location($id);
			//$data['location'] = $this->Pos_model->get_seller_rows1($inps);
			//echo '<pre>';print_r($data['vat']);exit;	
            $data['title'] = 'Purchase Entry:: Arrow18 ';
            $this->load->view('make_purchase_entry', $data);
	}
public function print_data()
	{
		$session_data = $this->session->all_userdata();
		$inps = $this->input->get();
		$data['title'] = 'PO Request Details';
		$data['calls']= $this->Pos_model->getinvoiceds($inps);
		//echo '<pre>';print_r($data['calls']);exit;	
		$this->load->view('table1',$data);
	}
	public function addPurchaseEntry() {
        $muinput= $this->input->post();
		//echo '<pre>';print_r($muinput);exit;
		$conf_id=$this->Pos_model->add_purchase_entry($muinput);
		//$data['invoice_data'] = $this->Pos_model->purchase_invoice($conf_id);
               // $data['invoice_data'] = $this->Pos_model->purchase_invoice($muinput['vinvno']);
		//$data['invoice_item'] = $this->Pos_model->purchase_invoice_item($muinput['vinvno']);
		//echo '<pre>';print_r($data['invoice_item']);exit;
        //                print_r($data['invoice_item']); print '<br>';
		$data['title'] = 'Purchase Entry:: Arrow18 ';
		//$this->load->view('purchase_confirm_view', $data);
		//redirect($this->config->item('base_url').'index.php/PO_Order','refresh');
         echo "<script> alert('Purchase Request Confirmed');window.location= '".base_url('index.php/Pos_orders')."'</script>";  
	}
     
		
		
	public function purchaseConfirm($id) {
		$query=$this->Pos_model->purchase_confirm($id);
		echo "<script> alert('Order Confirmed');window.location= '".base_url('index.php/Purchase')."'</script>";

		
	}
	
        public function checkdupinvoice() {        
            $invno = $_POST['vinvno'];
            $invrow = $this->Pos_model->purchase_invoice($invno);
            if(empty($invrow))
                echo '';
            else
                echo 'Y';
        }
    
	  public function get_pro_det()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$pro = $this->Pos_model->get_seller_rows1($inps);
		//echo '<pre>';print_r($pro);exit;
		/*$dat = array(
			'minqty' 			    => $pro[0]['min_qty'],
			'maxqty' 			    => $pro[0]['max_qty'],
			);*/
			//echo '<pre>';print_r($dat);exit;
			if(isset($pro[0]))
			{
				$data['qty'] = $pro[0]['qtys'];
				//$data['location'] = $pro[0]['location'];
				//echo '<pre>';print_r($data['location']);exit;
			}
			
			else
			{
				$data['qty'] = '0';
				//$data['location'] = '0';
			}
			echo json_encode($data);
			
			
			
	}
  
	
//******************************************************************Purchase payments ends here**********************************************************************//
	
}
