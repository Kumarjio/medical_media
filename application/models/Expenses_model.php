<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expenses_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_all_customer_master(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('expenses_master');
		$this->db->where('expen_deleted',1);		
        $query = $this->db->get();		
		return $query->result();			
	 }
	 
	
	
	 function add_expenses($post) {
		 extract($_REQUEST);
		$created_date=date('Y-m-d');
		
		$array=array(
		'expenses_type'=>$expenses_type,
		'expen_deleted'=>'1',
		'date' => date('Y-m-d'),
		);
	    $this->db->insert('expenses_master',$array);
		$last_id = $this->db->insert_id();
			
	}
	public function get_all_tender()
	{
		$query=$this->db->select('*')->from('tbl_tender_add')->get()->result_array();
		return $query;
	}
	public function get_all_expen()
	{
		$query=$this->db->select('*')->from('expenses_master')->get()->result_array();
		return $query;
	}
	public function get_all_emp()
	{
		$query=$this->db->select('*')->from('cp_admin_login')->get()->result_array();
		return $query;
	}
	public function get_print_data($id){
		$this->db->select('*')->from('tbl_expenses')->where('tbl_expenses.exp_id',$id);
		$this->db->join('expenses_master','expenses_master.expenses_id=tbl_expenses.exp_type_reff_id','left');
		$data = $this->db->get()->result_array();
		return $data;
	}
	public function get_print_data_all($id){
		$this->db->select('*')->from('tbl_expenses')->where('tbl_expenses.exp_id',$id);
		$this->db->join('expenses_master','expenses_master.expenses_id=tbl_expenses.exp_type_reff_id','left');
		$this->db->join('tbl_expenses_list','tbl_expenses_list.exp_ref_id=tbl_expenses.exp_id','left');
		$this->db->join('cp_admin_login','cp_admin_login.admin_id=tbl_expenses_list.employee_name','left');
		$data = $this->db->get()->result_array();
		return $data;
	}
	public function add_details($inps)
	{
		//$inps=$this->input->post();
	extract($_REQUEST);
$created_date=date('Y-m-d');
	//echo "<pre>";print_r($inps);exit;
	$date_data = $this->db->select('*')->from('tbl_year')->get()->result_array();
             $this->db->select('*')->from('tbl_expenses');
             $this->db->where("DATE_FORMAT(tbl_expenses.exp_created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($date_data[0]['from_date'])));
             $this->db->where("DATE_FORMAT(tbl_expenses.exp_created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($date_data[0]['to_date'])));
             $count_data = $this->db->get()->num_rows();
             $bill_count = $count_data+1;
             $bill_no1 = "VOC".$bill_count."-".$date_data[0]['year_label'];	 
			$arr=array(
			         'voucher_no'=>$bill_no1,
			         'voucher_date'=>$voc_date,
			         'exp_type_reff_id'=>$exp_type,
			         'exp_payment_mode'=>$payment_mode,
			         'exp_payment_details'=>$payment_details,
			         'exp_gtotal'=>$gtotal,
			         'exp_created_date'=>$created_date
		              );
			$this->db->insert('tbl_expenses',$arr);
			$insert_id = $this->db->insert_id();
	for($i=0; $i<count($employee_name); $i++)
	{
		$arrIn=array(
			         'exp_ref_id'=>$insert_id,
			         'employee_name'=>$employee_name[$i],
			         'ex_amount'=>$ex_amount[$i],
			         'ex_remarks'=>$ex_remarks[$i]
		              );
		$this->db->insert('tbl_expenses_list',$arrIn);
	}

	}
	public function  get_all_expenses()
	{
		$this->db->select('*')->from('tbl_expenses');
		//$this->db->join('tbl_expenses_list','tbl_expenses_list.exp_ref_id=tbl_expenses.exp_id','left');
		$this->db->join('expenses_master','expenses_master.expenses_id=tbl_expenses.exp_type_reff_id','left');
		$query=$this->db->get()->result_array();
		//echo "<pre>";print_r($query);exit();

		return $query;
	}
	public function edit_exp_type($id)
	{
		$this->db->select('*')->from('expenses_master');
		$this->db->where('expenses_id',$id);
		$query=$this->db->get();
		return $query->result_array();

	}
	public function updateExpen()
	{
		$inps=$this->input->post();
		$arr=array('expenses_type'=>$inps['expenses_type']);
		$this->db->where('expenses_id',$inps['hiddn_id']);
		$this->db->update('expenses_master',$arr);
	}
	public function delete_expen($id)
	{
		$arr=array('expen_deleted'=>0);
		$this->db->where('expenses_id',$id);
		$this->db->update('expenses_master',$arr);
	}
	
	 
	 
	  

}