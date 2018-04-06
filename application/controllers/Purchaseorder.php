<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Purchaseorder extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Purchaseorder_model');		  
     }
     public function index(){
          $data['vendor']=$this->Purchaseorder_model->get_all_vendor();
          $data['product']=$this->Purchaseorder_model->get_all_product();
          $data['unit']=$this->Purchaseorder_model->get_all_unit();
	     $data['title'] = 'Process';
		$this->load->view('purchaseorder_add', $data);
     }
     public function purchaseorder_add($id){
          $data['vendor']=$this->Purchaseorder_model->get_all_vendor();
          $data['product']=$this->Purchaseorder_model->get_all_product();
          $data['unit']=$this->Purchaseorder_model->get_all_unit();
          $data['order_ven']=$this->Purchaseorder_model->get_order($id);
          $data['order_pro']=$this->Purchaseorder_model->get_order_all($id);
          $data['title'] = 'Process';
          //print_r("<pre>");print_r($data['order_ven']);exit();
          $this->load->view('purchaseorder_add', $data);
     }
    public function add_purchaseorder() {
           
         $session_data = $this->session->all_userdata();
          $muinput= $this->input->post();
         // print_r($muinput);exit();
          $conf_id=$this->Purchaseorder_model->add_purchase_order($muinput);
          $data['title'] = 'Purchase Order';

          //print_r($conf_id);exit();
          echo "<script> alert('Purchase Order Invoice'+'$conf_id'); window.location= '".base_url('index.php/Purchase_create/created_order_list')."'</script>";
          
     }
     public function order_print_list(){
          $session_data = $this->session->all_userdata();
          $data['order'] = $this->Purchaseorder_model->order_print_list();
          $data['title'] = 'Order List';
          //print_r("<pre>");print_r($data);exit();
          $this->load->view('po_order_list', $data);
     }
     public function goods_return_print($id){
          $session_data = $this->session->all_userdata();
          $data['order'] = $this->Purchaseorder_model->goods_return_det($id);
          $data['order_item'] = $this->Purchaseorder_model->goods_return_item_det($id);
          $data['title'] = 'Order Print PDF';
          //print_r("<pre>");print_r($data['order_item']);exit();
          $this->load->view('goods_return_print', $data);
     }
     public function order_print($id){
          $session_data = $this->session->all_userdata();
          $data['order'] = $this->Purchaseorder_model->order_det($id);
          $data['order_item'] = $this->Purchaseorder_model->order_item_det($id);
          $data['title'] = 'Order Print PDF';
          //print_r("<pre>");print_r($data['order_item']);exit();
          $this->load->view('order_print', $data);   
     }
 
}
