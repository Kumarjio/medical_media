<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seller_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_all_seller(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('cb_seller');	
		 $this->db->order_by('cid','desc');		
        $query = $this->db->get();		
		return $query->result();			
	 }
	  function get_all_vendor($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('tbl_vendor');	
		if(isset($inps['vendor_id']) && $inps['vendor_id']!='')
		{
			$this->db->where('vendor_id', $inps['vendor_id']);	
		}
		 $this->db->order_by('vendor_id','desc');		
        $query = $this->db->get();		
		return $query->result_array();			
	 }
	 function view_vendor($id){	
		$array = array('vendor_id' => $id);		
		$this->db->select('*')->from('tbl_vendor')->where($array); 
		$query = $this->db->get();
		return $query->result();	
	}
	 function delete_vendor($id)
	{
		$this->db->where('vendor_id',$id);
		$this->db->delete('tbl_vendor');	
		return true;
	}
	function edit_seller($id){	
		$array = array('vendor_id' => $id);		
		$this->db->select('*')->from('tbl_vendor')->where($array); 
		$query = $this->db->get();		
		return $query->result();			
	 }
	 
	
	
	 function add_seller($post) {
		 extract($_REQUEST);
		// print_r( extract($_REQUEST));exit();
		 $session_data = $this->session->all_userdata();	
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		
		'vendor_name'=>$vendor,
		'v_period'=>$v_period,
		'address'=>$address,
		'account_no'=>$account,
		'bank_name'=>$bank_name,
		'bank_branch'=>$branch,
		'ifsc_code'=>$ifsc,
		'company_panno'=>$pan_no,
		'aadhar_no'=>$aadhar_no,
        'reference_det'=>$ref_det,
		'email1'=>$email1,
		'email2'=>$email2,
		'email3'=>$email3,
		'website'=>$website,
		'lane_line1'=>$lane_line1,
		'lane_line2'=>$lane_line2,
		'lane_line3'=>$lane_line3,
		'mobile_no1'=>$mobile_no1,
		'contact_person1'=>$contact_person1,
		'mobile_no2'=>$mobile_no2,
		'contact_person2'=>$contact_person2,
		'mobile_no3'=>$mobile_no3,
		'contact_person3'=>$contact_person3,
		'dr_reg_no'=>$reg_no,
		'reg_id'=>$reg_id,
		'gst_no'=>$gst,
		'tin_no'=>0,
		'cst_no'=>0,
		'drug_lisence1'=>$drug1,
		'drug_lisence2'=>$drug2,
		'tax_type'=>$tax_type,
		
	
		);	
	    $this->db->insert('tbl_vendor',$array);
	/*	$last_id = $this->db->insert_id();*/
			
	}
	 
	 
	  function view_seller($id){	
		$array = array('cid' => $id);		
		$this->db->select('*')->from('cb_seller')
        ->where($array); 
		$query = $this->db->get();
				
		return $query->result();	
		$this->output->enable_profiler(true);		
	 }
	
	
	
	
	function update_vendor($id,$post) {
	    
	extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		'vendor_name'=>$vendor,
		'v_period'=>$v_period,
		'address'=>$address,
		'account_no'=>$account,
		'bank_name'=>$bank_name,
		'bank_branch'=>$branch,
		'ifsc_code'=>$ifsc,
		'company_panno'=>$pan_no,
		'aadhar_no'=>$aadhar_no,
        'reference_det'=>$ref_det,
		'email1'=>$email1,
		'email2'=>$email2,
		'email3'=>$email3,
		'website'=>$website,
		'lane_line1'=>$lane_line1,
		'lane_line2'=>$lane_line2,
		'lane_line3'=>$lane_line3,
		'mobile_no1'=>$mobile_no1,
		'contact_person1'=>$contact_person1,
		'mobile_no2'=>$mobile_no2,
		'contact_person2'=>$contact_person2,
		'mobile_no3'=>$mobile_no3,
		'contact_person3'=>$contact_person3,
		'dr_reg_no'=>$reg_no,
		'reg_id'=>$reg_id,
		'gst_no'=>$gst,
		'tin_no'=>0,
		'cst_no'=>0,
		'drug_lisence1'=>$drug1,
		'drug_lisence2'=>$drug2,
		'tax_type'=>$tax_type,
		);	
		$this->db->set($array);
	    $this->db->where('vendor_id',$id);
		$this->db->update('tbl_vendor',$array);
		
	}
  
	

}