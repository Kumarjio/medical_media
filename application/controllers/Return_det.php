<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Return_det extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Return_model');		  
     }
     public function index(){
          $session_data = $this->session->all_userdata();
          $data['stock_product']=$this->Return_model->get_all_stock_product();
          //print_r("<pre>");print_r($data);exit();
	        $data['title'] = 'Goods Return Add';
		      $this->load->view('goods_return_add', $data);
     }
     public function get_batch($id){
        $data = $this->Return_model->get_batch($id);
        echo json_encode($data);
     }
     public function get_batch1($id,$vendor){
        $data = $this->Return_model->get_batch1($id,$vendor);
        echo json_encode($data);
     }
     public function get_vendor($pro,$batch){
        $data = $this->Return_model->get_vendor($pro,$batch);
        echo json_encode($data);
     }
     public function get_inv_date($pro,$batch,$vendor){
        $data = $this->Return_model->get_inv_date($pro,$batch,$vendor);
        echo json_encode($data);
     }
     public function add_goods_return_order(){
      $inps = $this->input->post();
      $data = $this->Return_model->add_goods_return_order($inps);
     echo "<script> window.location= '".base_url('index.php/Return_det/goods_return_list')."'</script>";
     }
    public function goods_return_list(){
       $data['list'] = $this->Return_model->goods_return_list();
       $data['title'] = 'Goods Return List';
       $this->load->view('goods_return_list', $data);
    }
    public function goods_return_confirm($id){
          $session_data = $this->session->all_userdata();
          $data['stock_product']=$this->Return_model->get_all_stock_product();
          $data['comm_data']=$this->Return_model->get_comm_return_data($id);
          $data['all_data']=$this->Return_model->get_all_return_data($id);
          //print_r("<pre>");print_r($data['all_data']);exit();
          $data['title'] = 'Goods Return Confirm';
          $this->load->view('goods_return_confirm', $data);
    }
    public function add_goods_return_confirm(){
          $session_data = $this->session->all_userdata();
          $muinput= $this->input->post();
          $conf_id=$this->Return_model->add_goods_return_confirm($muinput);
          $data['title'] = 'Purchase Order';
          echo "<script> window.location= '".base_url('index.php/Return_det/goods_return_list')."'</script>";
    }
    public function goods_return_pdf(){
      $session_data = $this->session->all_userdata();
      $data['title'] = 'Purchase Return List';
      $data['list']=$this->Return_model->goods_return_pdf();
      // /print_r("<pre>");print_r($data);
      $this->load->view('goods_return_pdf', $data);

    }
     public function get_rate_det($pro,$vend){
      $data = $this->Return_model->get_rate_det($pro,$vend);
      echo json_encode($data);

     }
    public function add_purchase_create() {
           
          $session_data = $this->session->all_userdata();
          $muinput= $this->input->post();
          $conf_id=$this->Return_model->add_purchase_create($muinput);
          $data['title'] = 'Purchase Order';
          echo "<script> window.location= '".base_url('index.php/Return_det/create_order')."'</script>";
          
     }
     public function create_order() {
           
        
          $conf_id=$this->Return_model->create_order();
          echo "<script> window.location= '".base_url('index.php/Return_model/created_order_list')."'</script>";
          
     }
     public function created_order_list(){
      $data['title']="Order Created List";
      $data['list']=$this->Return_model->created_order_list();
      $this->load->view('created_order_list', $data);
     } 

    public function goods_return_payment_list(){
      $data['title']="Return Payment List";
        if($this->input->post())
      {
        $inps = $this->input->post();
      }
      else
      {
        $inps = '';
      }
      $data['list']=$this->Return_model->goods_return_payment_list($inps);
      $this->load->view('goods_return_payment_list', $data);
    }
}
