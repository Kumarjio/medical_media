<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricelist_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
     function editpricelist($id){
     	$this->db->select('*')->from('tbl_pricelist')->where('id',$id);
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_pricelist.po_id','left');
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_pricelist.vendor_ref','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
		$data = $this->db->get()->result_array();
		return $data;
     }
    
	 function get_prices($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('vendor_name,i_name,manu_name,hsn_code,tax,price,tbl_pricelist.id,location_name')->from('tbl_pricelist');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_pricelist.po_id','left');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_pricelist.vendor_ref','left');
		$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
		$this->db->join('tbl_category','tbl_sub_category.category_ref_id=tbl_category.category_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
        $this->db->join('master_location','master_location.id=tbl_product.unit','left');
         if(isset($inps['ven_id']) && $inps['ven_id']!='')
		{
			$this->db->where('tbl_vendor.vendor_id', $inps['ven_id']);	
		}
        $query = $this->db->get();	
		return $query->result_array();		
	 }
	 function add_price($post) {
		//echo '<pre>'; print_r($post);exit;
            extract($_REQUEST);
			
			
		  
				$arr = array(
					'vendor_ref'=>$vname,
				'po_id'=>$pname1,
				'price'=>$price,
				
				);
				$this->db->insert('tbl_pricelist',$arr);
				 $insert_id = $this->db->insert_id();
		 
			
	 
				   
			 return $insert_id;
			
           
        }
         function editprice($id,$post) {
		//echo '<pre>'; print_r($post);exit;
            extract($_REQUEST);
				$arr = array(
				'vendor_ref'=>$vname,
				'po_id'=>$pname1,
				'price'=>$price,				
				);
				$this->db->where('id',$id)->update('tbl_pricelist',$arr);
			$insert_id = $this->db->insert_id();
			 return $insert_id;
        }
        function get_vendor()
	  {
		 $this->db->select('tbl_vendor.*');
		
		$query = $this->db->get('tbl_vendor')->result_array();
		
		 return $query;
		 			
	  }
	  function get_product()
	  {
		 $session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('tbl_product');
		$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
		$this->db->join('tbl_category','tbl_sub_category.category_ref_id=tbl_category.category_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
        $this->db->join('master_location','master_location.id=tbl_product.unit','left');
        $query = $this->db->get();	
		return $query->result_array();
		 			
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