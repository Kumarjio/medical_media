<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Protype_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_all_customer_master(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('cb_customer_master');		
        $query = $this->db->get();		
		return $query->result();			
	 }
	 
	
	
	 function add_customer($post) {
		 extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		'type_name'=>$customer_type,
		'post_dt' => date('Y-m-d H:i:s'),
		);
	    $this->db->insert('cb_customer_master',$array);
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
		'mob_no'=>$mobile,
		'customer_type' => $cus_type,
		'email_id'	=>$email,
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