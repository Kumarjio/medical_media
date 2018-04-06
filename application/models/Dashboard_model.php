<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
          parent::__construct();
     }
    
	 
	 function get_profile($userid){	
		$array = array('cp_admin_login.admin_id' =>$userid);		
		$this->db->select('*')->from('cp_admin_login')
        ->where($array); 
		$query = $this->db->get();		
		return $query->result();			
	 }
	 	 function opening_stock(){
	 	$current_date = date('Y-m-d');
	 	$this->db->select('*')->from('tbl_product');
	 	$data1 = $this->db->get()->result_array();
	 	foreach ($data1 as $key ) {
	 		/*$this->db->select('*')->from('tbl_stock');
	 		$this->db->where('tbl_stock.pro_reff_id',$key['i_id']);
	 		$data2 = $this->db->get()->result_array();
	 		
	 			$pro_count = 0;
	 				foreach ($data2 as $value) {
	 					$pro_count += $value['curr_qty']+$value['curr_free_qty'];	 					
	 				}*/
	 				$data3 = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.pro_refff_no',$key['i_id'])->where('tbl_opening_stock.opening_date',$current_date)->get()->result_array();
	 				
	 				if(empty($data3)){
	 					$maxid = $this->db->select_max('openind_id')->from('tbl_opening_stock')->where('tbl_opening_stock.pro_refff_no',$key['i_id'])->get()->result_array();
	 					$valofsto = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.openind_id',$maxid[0]['openind_id'])->get()->result_array();
	 					if(!empty($valofsto)){
	 					$array1 = array(
		 						'opening_stock' => $valofsto[0]['clossing_stock'],
		 						'openning_value' => $valofsto[0]['clossing_stock_value'],
		 						'clossing_stock' => $valofsto[0]['clossing_stock'],
		 						'clossing_stock_value' => $valofsto[0]['clossing_stock_value'],
		 						'pro_refff_no' => $key['i_id'],
		 						'opening_date' => $current_date,
		 						 );
	 							}else{
	 								$array1 = array(
		 						'opening_stock' => 0,
		 						'openning_value' => 0,
		 						'clossing_stock' => 0,
		 						'clossing_stock_value' => 0,
		 						'pro_refff_no' => $key['i_id'],
		 						'opening_date' => $current_date,
		 						 );
	 							}
	 					$data = $this->db->insert('tbl_opening_stock',$array1);
	 				}
	 	}
	 	return $data;
	 }
	 function opening_stock11($id){

	 	$current_date = date('Y-m-d');
	 	
	 	$this->db->select('*')->from('tbl_product')->where('tbl_product.i_id',$id);
	 	$data1 = $this->db->get()->result_array();
	 	foreach ($data1 as $key ) {
	 		$this->db->select('*')->from('tbl_stock');
	 		$this->db->where('tbl_stock.pro_reff_id',$key['i_id']);
	 		$data2 = $this->db->get()->result_array();
	 		//print_r($data2);
	 	//	if(!empty($data2)){
	 			$pro_count = 0;
	 				foreach ($data2 as $value) {
	 					$pro_count += $value['curr_qty']+$value['curr_free_qty'];	 					
	 				}
	 				$data3 = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.pro_refff_no',$key['i_id'])->where('tbl_opening_stock.opening_date',$current_date)->get()->result_array();
	 				$array1 = array(
		 						'clossing_stock' => $pro_count,
		 						 );
	 					$this->db->where('tbl_opening_stock.pro_refff_no',$key['i_id']);
	 					$this->db->where('tbl_opening_stock.opening_date',$current_date);
	 					$data = $this->db->update('tbl_opening_stock',$array1);
	 				
	 			//}
	 	}
	 	//exit();
	 	
	 	return $data;
	 }
	 function edit_profile($id,$post) {
		$session_data = $this->session->all_userdata();
	    $password=$post['password'];
		$emp_code=$post['emp_code'];
		$name=$post['name'];
		//$mobile_number=$post['mobile_number'];
		$created_date=date('Y-m-d h:i:s');
		$array=array('password'=>$password,'name'=>$name,'emp_code'=>$emp_code,'status'=>1);	
	    $this->db->set($array);
	    $this->db->where('admin_id',$id);
		$this->db->update('cp_admin_login',$array);
	 	}
	 	
		
	
	  function get_pro_det() {
		$session_data = $this->session->all_userdata();
	    $this->db->select('tbl_leads.*,product_selling_price.price,inr_rates');
		 if(isset($inps['pono']) && $inps['pono']!='')
		    {
			    $this->db->where('tbl_leads.po_no', $inps['pono']);	
		    }
			 if(isset($inps['date']) && $inps['date']!='')
		    {
			    $this->db->where('tbl_leads.po_date', $inps['date']);	
		    }
		 $this->db->join('product_selling_price','product_selling_price.part_no = tbl_leads.part_no','left');
		$query = $this->db->get('tbl_leads')->result_array();
		 return $query;	
		
	}
	 
function get_pro_request(){
		$session_data = $this->session->all_userdata();	
	   $this->db->select('purchase_product.*,purchase_product.qty as qtys,tbl_product.i_id,tbl_product.i_name,i_category, i_code');
		$this->db->select('cp_admin_login.*');
		$this->db->where('purchase_product.location', $session_data['location']);
		
		$this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		$this->db->join('cp_admin_login','cp_admin_login.admin_id = purchase_product.req_emp_id','left');
		$query = $this->db->get('purchase_product');	
		//echo '<pre>';print_r($query);exit;
		return $query->result();			
	 }
}