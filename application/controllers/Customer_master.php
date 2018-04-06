<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_master extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Customer_master_model');
          //$this->load->model('OtherMasters_model');
		  //$this->load->model('dealer_model'); 
     }
	
	public function index(){		
		$query = $this->Customer_master_model->get_all_customer_master();
		if($query){
			$data['customer'] =  $query;
		} else {
			$data['customer'] =  '';
		}
		$data['title'] = 'View All Customer :: Arrow18 ';
		$this->load->view('customermasterlist', $data);
	}
	
	public function addCustomer1(){
		 $data['title'] = 'Add Customer ::  Arrow18 ';
		//  $data['head'] = $this->Customer_model->get_head();
		 $this->load->view('customermasteradd',$data);
	}
	
	public function addCustomer(){
		
		$this->form_validation->set_rules('customer_type', 'Customer Type', 'required|trim|xss_clean');
	if ($this->form_validation->run() == FALSE) {
		echo'<pre>';print_r($this->form_validation->run());exit; 
			 $data['title'] = 'Add Customer :: Arrow18 ';
			 //$data['head'] = $this->Customer_model->get_head();
 			//$data['area'] = $this->OtherMasters_model->get_all_area();
 			//$data['salesman'] = $this->OtherMasters_model->get_all_salesman();
			 $this->load->view('customeradd',$data);	
		} else {
			$muinput= $this->security->xss_clean($this->input->post());
			$manage_category=$this->Customer_master_model->add_customer($muinput);
			echo "<script> alert('Successfully added');window.location= '".base_url('index.php/Customer_master')."'</script>";
			
		}
		
		//$this->load->view('productadd', $data);
	}
	
	public function viewCustomer($id){
		 $data['title'] = 'View Customer ::  Arrow18 ';
	   	 $data['customer']=$this->Customer_model->view_customer($id);
		 $this->load->view('customerview',$data);
	}
	
	public function editCustomer1($id){
		 $data['title'] = 'Edit Customer ::  Arrow18 ';
		 //$data['head'] = $this->Customer_model->get_head();
		 /*$data['salesman_rep'] = $this->Customer_model->get_salesman_rep();
		 $data['salesman_asm'] = $this->Customer_model->get_salesman_asm();
		 $data['salesman_rsm'] = $this->Customer_model->get_salesman_rsm();*/
		 $data['customer']=$this->Customer_model->edit_customer($id);
		 $this->load->view('customeredit',$data);
	}
		
	public function updateCustomer($id){
		
		
		$this->form_validation->set_rules('customer_code', 'Customer Code', 'required|trim|xss_clean');
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('area_name', 'Area Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('city_name', 'City Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('state_name', 'State', 'required|trim');
		$this->form_validation->set_rules('country_name', 'Country', 'required|trim|xss_clean');
		$this->form_validation->set_rules('pincode', 'Pincode', 'required|numeric|trim|xss_clean|min_length[6]');
		$this->form_validation->set_rules('mob_no', 'Mobile no', 'required|numeric|trim|xss_clean|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('email_id', 'Email Id', 'required|valid_email|trim|xss_clean');
		
		
			$muinput= $this->input->post();
			$manage_category=$this->Customer_model->update_customer($id,$muinput);
			echo "<script> alert('Successfully updated');window.location= '".base_url('index.php/Customer')."'</script>";
			
		
	}	

	
	
}
