<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Business_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_all_leads(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_leads.*');	
		$this->db->select('cp_admin_login.admin_id,cp_admin_login.name as ename');
		$this->db->join('cp_admin_login','cp_admin_login.admin_id = tbl_leads.assigned_to','left');
		$query = $this->db->get('tbl_leads');		
        return $query->result();						
	 }
	  function get_leads(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*');	
		$this->db->from('tbl_leads');
		$query = $this->db->get();		
        return $query->result();						
	 }
	  function get_all_emp_leads(){
		$session_data = $this->session->all_userdata();	
		//$arr = array('1','2');
		/*$this->db->select('cp_admin_login.*');	
		$this->db->select('tbl_leads.name as names,tbl_leads.assigned_to,assigned_by,deignation,mobile');
		$this->db->join('tbl_leads','tbl_leads.assigned_to = cp_admin_login.leads_id','left');
		
		$query = $this->db->get('cp_admin_login');	*/
		$this->db->select('tbl_leads.*');	
		$this->db->select('cp_admin_login.admin_id,cp_admin_login.name as ename,cp_admin_login.leads_id,cp_admin_login.created_date as date,cp_admin_login.remarks,cp_admin_login.status_leads,cp_admin_login.admin_id');
		$this->db->join('cp_admin_login','cp_admin_login.admin_id = tbl_leads.assigned_to','left');
		$this->db->where('cp_admin_login.status_leads !=',0);
		$query = $this->db->get('tbl_leads');	
		//echo $this->db->last_query();exit;	
        return $query->result();						
	 }
	
	
	 function add_leads($post) {
		 extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		'name'=>strtoupper($name),
		'mobile'=>strtoupper($mobile),
		'deignation'=>strtoupper($desig),
		'leads_from'=>strtoupper($leads),
		'created_date'=>$created_date);	
	    $this->db->set($array);
	    $this->db->insert('tbl_leads',$array);
		$last_id = $this->db->insert_id();
			
	}
	 
	 
	  function view_customer($id){	
		$array = array('cid' => $id);		
		$this->db->select('*')->from('cb_customer')
        ->where($array); 
		$query = $this->db->get();
				
		return $query->result();	
		$this->output->enable_profiler(true);		
	 }
	
	function edit_customer($id){	
		$array = array('cid' => $id);		
		$this->db->select('*')->from('cb_customer')
         ->where($array); 
		$query = $this->db->get();		
		return $query->result();			
	 }
	
	
	function update_customer($id,$post) {
	    
	extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		'customer_name'=>strtoupper($customer_name),
		'area_name'=>strtoupper($area_name),
		'city_name'=>strtoupper($city_name),
		'state_name'=>strtoupper($state_name),
		'country_name'=>strtoupper($country_name),
		'pincode'=>strtoupper($pincode),
		//'joining_date'=>strtoupper($joining_date),
		'created_date'=>$created_date);	

		$this->db->set($array);
	    $this->db->where('cid',$id);
		$this->db->update('cb_customer',$array);
		
	}
  
	public function delete_customer($id)
	{
		
	    $this->db->where('cid',$id);
		$this->db->delete('cb_customer');	
		return true;
	}

}