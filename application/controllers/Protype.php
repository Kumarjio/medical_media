<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Protype extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Protype_model');
          //$this->load->model('OtherMasters_model');
		  //$this->load->model('dealer_model'); 
     }
	
	public function index(){		
		$query = $this->Protype_model->get_all_customer_master();
		if($query){
			$data['customer'] =  $query;
		} else {
			$data['customer'] =  '';
		}
		$data['title'] = 'View All Product Type :: Arrow18 ';
		$this->load->view('productmasterlist', $data);
	}
	
	public function addprodcuttype1(){
		 $data['title'] = 'Add Product Type ::  Arrow18 ';
		//  $data['head'] = $this->Customer_model->get_head();
		 $this->load->view('productmasteradd',$data);
	}
	
	public function addprodcuttype(){
		
		$this->form_validation->set_rules('customer_type', 'Customer Type', 'required|trim|xss_clean');
	if ($this->form_validation->run() == FALSE) {
		echo'<pre>';print_r($this->form_validation->run());exit; 
			 $data['title'] = 'Add Product Type :: Arrow18 ';
			 //$data['head'] = $this->Customer_model->get_head();
 			//$data['area'] = $this->OtherMasters_model->get_all_area();
 			//$data['salesman'] = $this->OtherMasters_model->get_all_salesman();
			 $this->load->view('productmasteradd',$data);	
		} else {
			$muinput= $this->security->xss_clean($this->input->post());
			$manage_category=$this->Protype_model->add_customer($muinput);
			echo "<script> alert('Successfully added');window.location= '".base_url('index.php/Protype')."'</script>";
			
		}
		
		//$this->load->view('productadd', $data);
	}
	
		

	
	
}
