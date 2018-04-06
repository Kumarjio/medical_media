<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    function adddata($inps){
    	$session_data = $this->session->all_userdata();
		extract($_REQUEST);
		$created_date=date('Y-m-d');
		$array=array(
		             'i_category'=>$category_id,
                     'hsn'=>$hsn_id,
                     'i_name'=>$product_name,
				     'manu_name'=>$m_name,
				     'unit'=>$unit_id,
				     'comm_rate'=>$comm_rate,
				     'created'=>$created_date,
				 );
		$data = $this->db->insert('tbl_product',$array);
		return $data;
    }
	 function get_products($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('i_name,manu_name,hsn_code,location_name,category_name,sub_category_name,comm_rate,i_id')->from('tbl_product');
		$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
		$this->db->join('tbl_category','tbl_sub_category.category_ref_id=tbl_category.category_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
                $this->db->join('master_location','master_location.id=tbl_product.unit','left');
           if(isset($inps['pro_id']) && $inps['pro_id']!='')
		{
			$this->db->where('tbl_product.i_id', $inps['pro_id']);	
		}
                $query = $this->db->get();	
		return $query->result_array();			
	 }
	  function get_products_drop(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('tbl_product');
		//$this->db->where('is_delete =', 0);
		//$this->db->where('status =', 1);
        $query = $this->db->get();	
		return $query->result();			
	 }
	 
	  function get_rows_product(){
		$this->db->select('*')->from('tbl_product')->order_by('i_id','DESC')->limit('1');
        $query = $this->db->get();		
		return $query->result();			
		// $this->db->insert_id();
	 }
	 
	 function add_product($post) {
		
		$session_data = $this->session->all_userdata();
		extract($_REQUEST); //Used to get all post product details
		$created_date=date('Y-m-d h:i:s');
		$array=array('i_name'=>$i_name,
		            'hsn'=>$hsn,
                    'descr'=>$descr,
					
					);	
	    $this->db->set($array);
	    $this->db->insert('tbl_product',$array);
	}
 
	function view_product($id){
		/**$this->db->select('tbl_product.*, `tbl_tax`.percentage AS percentage, tbl_manufacturer.m_name');
		$this->db->from('tbl_product');
		$this->db->join('tbl_tax as tbl_tax', 'tbl_tax.t_id = tbl_product.p_tax', 'left');
		$this->db->join('tbl_manufacturer', 'tbl_manufacturer.m_id = tbl_product.i_code', 'left');
		$this->db->where('i_id =', $id);
		*/
		$this->db->select('*')->from('tbl_product');
		$this->db->where('i_id =', $id);
		//echo $this->db->last_query();
		//$this->output->enable_profiler(TRUE);
		$query = $this->db->get();	
		return $query->result();			
	}
	
	
	function edit_product($id){			
		$this->db->select('*')->from('tbl_product')
		->where('i_id =', $id);
		$this->db->join('master_location','master_location.id=tbl_product.unit','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
		$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_sub_category.category_ref_id','left');
		$query = $this->db->get();	
		$this->db->last_query();
		return $query->result_array();			
	}
	
	
	function update_product($id,$data) {
		$session_data = $this->session->all_userdata();
		extract($_REQUEST);
		$created_date=date('Y-m-d');
		$array=array(
		             'i_category'=>$category_id,
                     'hsn'=>$hsn_id,
                     'i_name'=>$product_name,
				     'manu_name'=>$m_name,
				     'unit'=>$unit_id,
				     'comm_rate'=>$comm_rate,
				     'created'=>$created_date,
				 );
		$data = $this->db->where('tbl_product.i_id',$id)->update('tbl_product',$array);
		return $data;
	}
	
	public function delete_product($id)
	{
		$array=array('is_delete'=>1);	
		$this->db->where('i_id', $id);
		$this->db->update('tbl_product', $array);
		return true;
	}
	
	public function statuschange($post) {
		$session_data = $this->session->all_userdata();
		extract($_REQUEST); //Used to get all post product details
		$created_date=date('Y-m-d h:i:s');
		$array=array('date'=>$created_date,'status'=>$st);	
		$this->db->set($array);
	    $this->db->where('i_id',$id);
		$this->db->update('tbl_product',$array);	 
		echo $st;
	 }
	 public function category_list($inps){
	 	$data = $this->db->select('*')->from('tbl_category');
	 	if(isset($inps['cat_id']) && $inps['cat_id']!='')
		{
			$this->db->where('category_id', $inps['cat_id']);	
		}
	 	$query=$this->db->get();

	 	return $query->result_array();
	 }
	 public function sub_category_list($inps){
	 	$data = $this->db->select('*')->from('tbl_sub_category')->join('tbl_category','tbl_category.category_id=tbl_sub_category.category_ref_id','left');
        if(isset($inps['sub_cat_id']) && $inps['sub_cat_id']!='')
		{
			$this->db->where('sub_category_id', $inps['sub_cat_id']);	
		}

	 	$query=$this->db->get()->result_array();
	 	return $query;
	 }
	 public function category_add($inps){
	 	$session_data = $this->session->all_userdata();
		extract($_REQUEST);
		$created_date=date('Y-m-d');
		$insarr = array('category_name' =>$c_name,'created'=>$created_date);
		$data = $this->db->insert('tbl_category',$insarr);
		return $data;
	 }
	 public function sub_category_add($inps){
	 	$session_data = $this->session->all_userdata();
		extract($_REQUEST);
		$created_date=date('Y-m-d');
		$insarr = array('category_ref_id' =>$c_name,'sub_category_name' =>$sc_name,'created'=>$created_date);
		$data = $this->db->insert('tbl_sub_category',$insarr);
		return $data;
	 }
	 public function category_edit($id){
	 	$data = $this->db->select('*')->from('tbl_category')->where('category_id',$id)->get()->result_array();
	 	return $data;
	 }
	 public function sub_category_edit($id){
	 	$data = $this->db->select('*')->from('tbl_sub_category')->join('tbl_category','tbl_category.category_id=tbl_sub_category.category_ref_id','left')->where('sub_category_id',$id)->get()->result_array();
	 	return $data;
	 }
	 public function category_update($id,$inps){
	 	$session_data = $this->session->all_userdata();
		extract($_REQUEST);
		$created_date=date('Y-m-d');
		$insarr = array('category_name' =>$c_name,'created'=>$created_date);
		$data = $this->db->where('tbl_category.category_id',$id)->update('tbl_category',$insarr);
		return $data;
	 }
	 public function sub_category_update($id,$inps){
	 	$session_data = $this->session->all_userdata();
		extract($_REQUEST);
		$created_date=date('Y-m-d');
		$insarr = array('category_ref_id' =>$c_name,'sub_category_name' =>$sc_name,'created'=>$created_date);
		$data = $this->db->where('tbl_sub_category.sub_category_id',$id)->update('tbl_sub_category',$insarr);
		return $data;
	 }
	 
	 

}