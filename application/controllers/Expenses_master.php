<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Expenses_master extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Expenses_model');
          //$this->load->model('OtherMasters_model');
		  //$this->load->model('dealer_model'); 
     }
	
	public function index(){		
		$query = $this->Expenses_model->get_all_customer_master();
		if($query){
			$data['customer'] =  $query;
		} else {
			$data['customer'] =  '';
		}
		$data['title'] = 'View All Expenses :: MVPOWER';
		$this->load->view('Expenseslist', $data);
	}
	
	public function addExpenses1(){
		 $data['title'] = 'Add Expenses ::  MVPOWER';
		//  $data['head'] = $this->Customer_model->get_head();
		 $this->load->view('Addexpenses',$data);
	}
	
	public function addExpenses(){
		
		
			$muinput= $this->input->post();
			$manage_category=$this->Expenses_model->add_expenses($muinput);
			echo "<script> alert('Successfully added');window.location= '".base_url('index.php/Expenses_master')."'</script>";
			
		
		
		//$this->load->view('productadd', $data);
	}
	public function add_expen()
	{
		$data['title']="Add Expenses";
		//$data['ten']=$this->Expenses_model->get_all_tender();
		$data['expenses']=$this->Expenses_model->get_all_expen();
		$data['emp']=$this->Expenses_model->get_all_emp();


		//echo "<pre>";print_r($data['emp']);exit;
		$this->load->view('add_expenses_tender',$data);
	}
	public function print_exp($id){
		$data['order'] = $this->Expenses_model->get_print_data($id);
		$data['order_item'] = $this->Expenses_model->get_print_data_all($id);
		// /print_r($data);exit();
		$data['title'] = "Expenses Print";
		$this->load->view('print_exp',$data);
	}
	public function expenses_detail()
	{
		$data['title']="Expenses List";
		$data['expens']=$this->Expenses_model->get_all_expenses();
		//echo "<pre>";print_r($data['expens']);exit;
		$this->load->view('expenses_detail_list',$data);
	} 
	public function add_expenses_detail()
	{
		$inps = $this->input->post();
		$data=$this->Expenses_model->add_details($inps);
	echo "<script> alert('Successfully added');window.location= '".base_url('index.php/Expenses_master/expenses_detail')."'</script>";
	}
	public function edit_expans_type($id)
	{
		//print_r($id);exit;
		$data['detail']=$this->Expenses_model->edit_exp_type($id);
		$this->load->view('edit_expenses',$data);

	}
	public function update_expenses()
	{
		$this->Expenses_model->updateExpen();
		echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/Expenses_master')."'</script>";

	}
	public function deleteExpense($id)
	{
		$this->Expenses_model->delete_expen($id);
		echo "<script> alert('Successfully Deleted');window.location= '".base_url('index.php/Expenses_master')."'</script>";

	}
	
	
	
}
