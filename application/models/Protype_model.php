<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Protype_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_all_customer_master(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('pro_type');		
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
	    $this->db->insert('pro_type',$array);
		$last_id = $this->db->insert_id();
			
	}
	 
	 
	 

}