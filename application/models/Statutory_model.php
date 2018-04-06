<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statutory_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_products(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_statutory.*');
		$this->db->select('pro_type.*');
		$this->db->join('pro_type','pro_type.id=tbl_statutory.product_type','left');
		$this->db->order_by('product_type','desc');		
		//$this->db->where('is_delete =', 0);
        $query = $this->db->get('tbl_statutory');	
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