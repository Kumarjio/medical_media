<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advance_payment_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_cus(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_cus_advance.*');
		$this->db->select('cb_customer.*');
		$this->db->select('tbl_product.*');
		$this->db->select('pro_type.*');
		if($session_data['location'] !=  'Chennai')
		    {
				$this->db->where('tbl_product.storage',$session_data['location']);
			}
		$this->db->join('cb_customer','cb_customer.cid=tbl_cus_advance.cus_id','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_cus_advance.tbl_pro_id','left');
		$this->db->join('pro_type','pro_type.id=tbl_product.i_category','left');
        $query = $this->db->get('tbl_cus_advance');	
		return $query->result();			
	 }
	function editStatutory($id){	
		$array = array('id' => $id);		
		$this->db->select('*')->from('tbl_statutory')
         ->where($array); 
		$query = $this->db->get();		
		return $query->result();			
	 }
	 
	 function update_Statutory($id,$post) {
	    
	extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		'vat'=>$vat,
		'cst'=>$cst,
		'service_tax'=>$service_tax,
		'created_date'=>$created_date);	
//echo '<pre>';print_r($array);exit;
	 $this->db->where('id',$id);
		$this->db->update('tbl_statutory',$array);
		
	}
  
		
	
}