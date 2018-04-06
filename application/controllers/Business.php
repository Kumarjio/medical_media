<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Business extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }
         	  
          $this->load->model('Business_model');
          //$this->load->model('OtherMasters_model');
		  //$this->load->model('dealer_model'); 
     }
	
	public function index(){		
		$query = $this->Business_model->get_all_leads();
		if($query){
			$data['leads'] =  $query;
		} else {
			$data['leads'] =  '';
		}
		$data['title'] = 'View All leads :: Vinwars ';
		$this->load->view('leadslist', $data);
	}
	public function Assigned_list(){		
		$query = $this->Business_model->get_all_emp_leads();
		if($query == ''){
			$data['leads'] =  '';
		} else {
			$data['leads'] =  $query;
		}
		$data['leadses'] = $this->Business_model->get_leads();
		$data['title'] = 'View All leads :: Vinwars ';
		$this->load->view('leads_assigned_list', $data);
	}
	
	public function addleads(){
		 $data['title'] = 'Add leads :: Vinwars';
		//  $data['head'] = $this->Customer_model->get_head();
		 $this->load->view('leadsadd',$data);
	}
	
	public function addleadsdata(){
		
		/*$this->form_validation->set_rules('customer_code', 'Customer Code', 'required|trim|xss_clean');
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required|trim|xss_clean');
		//$this->form_validation->set_rules('area_name', 'Area Name', 'required|trim|xss_clean');
		//$this->form_validation->set_rules('city_name', 'City Name', 'required|trim|xss_clean');
		//$this->form_validation->set_rules('state_name', 'State', 'required|trim');
		//$this->form_validation->set_rules('country_name', 'Country', 'required|trim|xss_clean');
		//$this->form_validation->set_rules('pincode', 'Pincode', 'required|numeric|trim|xss_clean');
		//$this->form_validation->set_rules('joining_date', 'Joining Date', 'required|trim|xss_clean');
		//$this->form_validation->set_rules('advance', 'Advance', 'required|numeric|trim|xss_clean');
		
		
		
		if ($this->form_validation->run() == FALSE) { */
			 $data['title'] = 'Add leads :: Vinwars ';
			 //$data['head'] = $this->Customer_model->get_head();
 			//$data['area'] = $this->OtherMasters_model->get_all_area();
 			//$data['salesman'] = $this->OtherMasters_model->get_all_salesman();
			/* $this->load->view('leadsadd',$data);	
		} else {*/
			$muinput= $this->input->post();
			$manage_category=$this->Business_model->add_leads($muinput);
			echo "<script> alert('Successfully added');window.location= '".base_url('index.php/Business')."'</script>";
			
		//}
		
		//$this->load->view('productadd', $data);
	}
	
	
		
	

	
	public function makechanges(){
		$data['title'] = 'Edit leads :: Vinwars ';
    	$var = $this->input->post();
		$session_data = $this->session->all_userdata();
		$arr = $this->db->select('id,assigned_to')->where('id',$var['ids'])->get('tbl_leads')->result_array();
		    $proarray = array(
 					  // 'status'      => $var['status'] ,
					   'assigned_to' =>$var['emp'],
					   'assigned_by'=> $session_data['user_id'],
				      );
		
		
		    $this->db->where('id',$var['ids']);
			$this->db->update('tbl_leads',$proarray);
			 
		$arr1 = $this->db->select('admin_id,leads_id')->where('admin_id',$var['emp'])->get('cp_admin_login')->result_array();
		 $emparray = array(
 					    'status_leads'      => 1 ,
					   'leads_id' =>$var['ids'],
					   'created_date'=>date('Y-m-d H:i:s'),
				      );
		//echo '<pre>';print_r($emparray);exit;
		
		    $this->db->where('admin_id',$var['emp']);
			 $this->db->update('cp_admin_login',$emparray);
			 echo '<script type="text/javascript">window.location.href="'.$this->config->item('base_url').'index.php/Business";</script>';
	}
	public function update(){
		$data['title'] = 'Edit leads :: Vinwars ';
    	$var = $this->input->post();
		$session_data = $this->session->all_userdata();
		
			 
		$arr1 = $this->db->select('admin_id,status,remarks')->where('admin_id',$var['ids'])->get('cp_admin_login')->result_array();
		 $emparray = array(
 					    'status_leads'      => $var['status'],
					    'remarks'     =>$var['rem'],
				      );
		//echo '<pre>';print_r($emparray);exit;
		
		    $this->db->where('admin_id',$var['ids']);
			 $this->db->update('cp_admin_login',$emparray);
			 echo '<script type="text/javascript">window.location.href="'.$this->config->item('base_url').'index.php/Business/Assigned_list";</script>';
	}
}
