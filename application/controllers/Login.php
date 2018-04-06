<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct(){
          parent::__construct();
		  $this->load->library('session');
          //load the login model
          $this->load->model('login_model');
		  
		  
     }
	
	public function indexbk(){
		$this->load->view('login');
	}
	
	public function logout(){
	   	error_reporting(0);		
	   	$session_data=$this->session->set_userdata();
	   	$this->session->userdata($session_data);
	   	$this->session->sess_destroy(); 
	   	echo "<script>window.location= '".base_url('index.php/Login')."'</script>";
	   	
	}
	
	public function index() {
          //get the posted values
          $username = $this->input->post("txtusername");
          $password = $this->input->post("txtpassword");
          //set validations
          $this->form_validation->set_rules("txtusername", "Username", "trim|required");
          $this->form_validation->set_rules("txtpassword", "Password", "trim|required");
          if ($this->form_validation->run() == FALSE){
               $this->load->view('login');
          }
          else {
			  $usr_result = $this->login_model->authenticate($username, $password);
			  if ($usr_result > 0) { //active user record is present {
				 //set the session variables
				  $userid = $this->db->query("SELECT admin_id FROM cp_admin_login WHERE username='".trim($username)."'")->row()->admin_id;
				  $username = $this->db->query("SELECT username FROM cp_admin_login WHERE admin_id='".$userid."'")->row()->username;
				  $name = $this->db->query("SELECT name FROM cp_admin_login WHERE admin_id='".$userid."'")->row()->name;
				  $user_type = $this->db->query("SELECT user_type FROM cp_admin_login WHERE admin_id='".$userid."'")->row()->user_type;
				  $locations = $this->db->query("SELECT area_name FROM cp_admin_login WHERE admin_id='".$userid."'")->row()->area_name;  
				  $phone = $this->db->query("SELECT phone FROM cp_admin_login WHERE admin_id='".$userid."'")->row()->phone;  
				  $status = $this->db->query("SELECT status FROM cp_admin_login WHERE admin_id='".$userid."'")->row()->status;
				  $mailid = $this->db->query("SELECT email_id FROM cp_admin_login WHERE admin_id='".$userid."'")->row()->email_id;  
				  if($status == 1) {
					  $sessiondata = array('user_id' => $userid,'location' => $locations, 'user_type' => $user_type, 'user_name' => $username, 'name' => $name,'mailid' => $mailid,'phone' => $phone, 'loginuser' => TRUE);
					  $this->session->set_userdata($sessiondata);
                                            $sessiondata2 = array('company_name' => 'ACC');
					  $this->session->set_userdata($sessiondata2);

                                          
                      redirect("Dashboard");
				  }
				  else {
					  $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">User Blocked!</div>');
                      redirect('login/index');	
				  } 
			  }
			  else {
				  $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                  redirect('login/index');
			  }
			  }
		  }
	
			  
		 
	
		 
		
				 
					 
                         
					
             
     
	public function forgot()
	{
		$this->load->view('forget_psd');
	}
     
    public function forgot_password()
    {
    	$email= $this->security->xss_clean($this->input->post('email_id'));
        $this->form_validation->set_rules('email_id', 'Email ID', 'trim|xss_clean');
        if ($this->form_validation->run() == TRUE) {
	        $this->form_validation->set_rules('email_id', 'Email ID', 'is_unique[cp_admin_login.email_id ]');
           if ($this->form_validation->run() == TRUE){
               echo "<script>alert('Email ID is not registered')</script>";                     
           	   $this->load->view('forget_psd');
           }else{  
		   	    $email= $this->security->xss_clean($this->input->post('email_id'));
                $password= $this->login_model->forget_Password($email); 
                                                   
				$this->load->library('email');
          		$name = 'hari.saiss1@gmail.com';
          		$from = 'hari.saiss1@gmail.com';
      			$message= "Dear " .'Admin'.","."\n\n"."Warm Greetings and Thank you For using our ora.com."."\n\n"."Your Forgot Password is Success."."\n\n"."Your Access Password: ".$password."\n"."Application can be access from <http://ora.com/>."."\n\n"."Thanking you".","."\n"."ora.com.";
      			$this->email->from($from, $name);
			    $this->email->to($email);
			    $this->email->subject('Forgot Password');
			    $this->email->message($message);
				$this->email->send();
           		echo "<script>alert('We Sent Your Password To Your Email Address..!');window.location= '".base_url('index.php/Login')."'</script>";
           }
       }
       else{
			$data['email_id'] = $this->input->post('email_id');
			if($data['email_id']=="") echo "<script>alert('Email ID is required')</script>";
            else echo "<script>alert('Email ID is not valid')</script>"; 
			$this->load->helper('form');
            $this->load->view('forget_psd',$data);
        }
	} 	
}
