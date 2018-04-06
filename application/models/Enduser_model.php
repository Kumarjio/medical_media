<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enduser_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_prices($inps){
		$this->db->select('tbl_enduser.*');
		$this->db->select('tbl_product.*');
		$this->db->select('tbl_customer.*');
		$this->db->select('tbl_hsn.*');
		$this->db->select('master_location.*');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_enduser.product_ref','left');
		$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_enduser.cus_ref','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
		$this->db->join('master_location','master_location.id=tbl_product.unit','left');
		if(isset($inps['cus_id']) && $inps['cus_id']!='')
		{
			$this->db->where('tbl_customer.customer_id', $inps['cus_id']);	
		}
        $query = $this->db->get('tbl_enduser');	
		return $query->result_array();			
	 }
	 function enduser_edit($id){
	 	$this->db->select('*')->from('tbl_enduser')->where('enduser_id',$id);
	 	$this->db->join('tbl_product','tbl_product.i_id=tbl_enduser.product_ref','left');
		$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_enduser.cus_ref','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
		$data = $this->db->get()->result_array();
		return $data;
	 }
	 function get_comm_rate($id){
	 	$data = $this->db->select('*')->from('tbl_product')->where('i_id',$id)->get()->result_array();
	 	return $data;
	 }
	 	 function updateprice($id,$post) {
            extract($_REQUEST);
				$arr = array(
				'cus_ref'=>$vname,
				'product_ref'=>$pname1,
				'enduser_price'=>$price,				
				);
				$data = $this->db->where('enduser_id',$id)->update('tbl_enduser',$arr);
				
			 return $data;
       	 }
	 function add_price($post) {
		//echo '<pre>'; print_r($post);exit;
            extract($_REQUEST);
			
			
		  
				$arr = array(
					'cus_ref'=>$vname,
				'product_ref'=>$pname1,
				'enduser_price'=>$price,
				
				);
				$this->db->insert('tbl_enduser',$arr);
				 $insert_id = $this->db->insert_id();
		 
			
	 
				   
			 return $insert_id;
			
           
        }
        function get_customer()
	  {
		 $this->db->select('tbl_customer.*');
		
		$query = $this->db->get('tbl_customer')->result_array();
		
		 return $query;
		 			
	  }
	  function get_product()
	  {
		 $this->db->select('tbl_product.*');
		 $this->db->select('tbl_hsn.*');
		 $this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
		 //$this->db->group_by('i_name','desc');
		//$this->db->where('tbl_product.i_category', $inps['cus']);	
		$query = $this->db->get('tbl_product')->result_array();
		 //echo $this->db->last_query();
		 return $query;
		 			
	  }
	  function get_pro_rows($inps){
			$session_data = $this->session->all_userdata();	
		//$this->db->select('purchase_product.*');
		$this->db->select('tbl_product.*');
		$this->db->where('tbl_product.i_category',$inps['cus']);
		//$this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		//$this->db->from('tbl_product');
        $query = $this->db->get('tbl_product');	
		return $query->result_array();			
	 }	

 function get_storage()
      {
		 $this->db->select('*')->from('cb_storage');
		 $query = $this->db->get();		
         return $query->result();			
	 }
	  
}