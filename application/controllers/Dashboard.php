<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  $this->load->model('Dashboard_model'); 
     }
	
	public function index(){
		
		//echo '<pre>'; print_r($this->session->userdata()); echo '</pre>'; //exit;		
		$data['title'] = 'View Dashboard :: ACC';
		//$data['list']=$this->Dashboard_model->get_pro_request();
		//echo '<pre>';print_r($data['list']);exit;
		$this->load->view('dashboard', $data);
	}
	public function update_year(){
		$from = date('Y')."-04-01";
		$to = date('Y')."-03-31";
		$date = strtotime($to);
        $newdate = date('Y-m-d',strtotime("+1 year",$date));
        $oldyear = date('Y');
        $nweyear =date('y',strtotime("+1 year",$date));
        $arr = array(
        	'from_date'=>$from,
        	'to_date'=>$newdate,
        	'year_label'=>$oldyear."-".$nweyear
        );
        if($from == date('Y-m-d')){
        	$data = $this->db->where('tbl_year.year_id',1)->update('tbl_year',$arr);
        	echo "true";
        }else{
        	echo "false";
        }

	}
	public function ProfileSettings_bk(){
		 $session_data = $this->session->all_userdata();
		 $data['title'] = 'Profile :: ACC';
	   	 $data['profile']=$this->Dashboard_model->get_profile($session_data['user_id']);
		 $this->load->view('profileedit',$data);
	}
	public function opening_stock(){
	$data =$this->Dashboard_model->opening_stock();
	echo json_encode($data);
	}
	public function opening_stock11($id){
	$data =$this->Dashboard_model->opening_stock11($id);
	echo json_encode($data);
	}
	public function ProfileSettings(){
		 $session_data = $this->session->all_userdata();
		$original_value = $this->db->query("SELECT username FROM cp_admin_login WHERE admin_id = ".$session_data['user_id'])->row()->username;
		if($this->input->post('username') != $original_value) {
		   $is_unique_username =  '|is_unique[cp_admin_login.username]';
		} else {
		   $is_unique_username =  '';
		}
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]|trim|xss_clean|alpha_numeric'.$is_unique_username);
		$this->form_validation->set_rules('password','Password','trim|required'); 
        $this->form_validation->set_rules('con_password','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('name','Name','trim|required'); 
		$this->form_validation->set_rules('emp_code','emp_code','trim|required'); 
		//$this->form_validation->set_rules('mobile_number', 'Mobile No','required|trim|numeric_vales|xss_clean');
		if ($this->form_validation->run() == FALSE) { 
			 $data['title'] = 'Profile :: ACC';
	   	     $data['profile']=$this->Dashboard_model->get_profile($session_data['user_id']);
			 $this->load->view('profileedit',$data);	
		} else {
			$muinput= $this->security->xss_clean($this->input->post());
			$manage_category=$this->Dashboard_model->edit_profile($session_data['user_id'],$muinput);
			echo "<script> alert('Successfully updated');window.location= '".base_url('index.php/Dashboard')."'</script>";
		}
	}
}
