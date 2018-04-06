<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase_create extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Purchase_create_model');		  
     }
     public function index(){
         
          $data['vendor']=$this->Purchase_create_model->get_all_vendor();
          $data['product']=$this->Purchase_create_model->get_all_product();
          $data['unit']=$this->Purchase_create_model->get_all_unit();
	     $data['title'] = 'Process';
		$this->load->view('purchase_create_add', $data);
     }
     public function get_ven_det($id){
      $data = $this->Purchase_create_model->get_ven_det($id);
      echo json_encode($data);

     }
     public function get_rate_det($pro,$vend){
      $data = $this->Purchase_create_model->get_rate_det($pro,$vend);
      echo json_encode($data);

     }
    public function add_purchase_create() {
           
         $session_data = $this->session->all_userdata();
          $muinput= $this->input->post();
          $conf_id=$this->Purchase_create_model->add_purchase_create($muinput);
          $data['title'] = 'Purchase Order';
          echo "<script> window.location= '".base_url('index.php/Purchase_create/create_order')."'</script>";
          
     }
     public function create_order() {
           
        
          $conf_id=$this->Purchase_create_model->create_order();
          echo "<script> window.location= '".base_url('index.php/Purchase_create/created_order_list')."'</script>";
          
     }
     public function created_order_list(){
      $data['title']="Order Created List";
      $data['list']=$this->Purchase_create_model->created_order_list();
      $this->load->view('created_order_list', $data);
     } 
}
