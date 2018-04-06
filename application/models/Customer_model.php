<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {
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
	  function get_all_cus($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('tbl_customer');
		if(isset($inps['cus_id']) && $inps['cus_id']!='')
		{
			$this->db->where('customer_id', $inps['cus_id']);	
		}	
		 $this->db->order_by('customer_id','desc');		
        $query = $this->db->get();		
		return $query->result_array();			
	 }
	 function view_cus($id){	
		$array = array('customer_id' => $id);		
		$this->db->select('*')->from('tbl_customer')->where($array); 
		$query = $this->db->get();
		return $query->result();	
	}
	 function delete_vendor($id)
	{
		$this->db->where('vendor_id',$id);
		$this->db->delete('tbl_vendor');	
		return true;
	}
	function edit_cus($id){	
		$array = array('customer_id' => $id);		
		$this->db->select('*')->from('tbl_customer')->where($array); 
		$query = $this->db->get();		
		return $query->result();			
	 }
	 
	
	
	 function add_seller($post) {
		 extract($_REQUEST);
		// print_r( extract($_REQUEST));exit();
		 $session_data = $this->session->all_userdata();	
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		
		'customer_name'=>$customer_name,
		'cus_address'=>$address,
		'c_period'=>$c_period,
		'cus_account_no'=>$account,
		'cus_bank_name'=>$bank_name,
		'cus_bank_branch'=>$branch,
		'cus_ifsc_code'=>$ifsc,
		'cus_company_panno'=>$pan_no,
		'cus_aadhar_no'=>$aadhar_no,
        'cus_reference_det'=>$ref_det,
		'cus_email1'=>$email1,
		'cus_email2'=>$email2,
		'cus_email3'=>$email3,
		'cus_website'=>$website,
		'cus_lane_line1'=>$lane_line1,
		'cus_lane_line2'=>$lane_line2,
		'cus_lane_line3'=>$lane_line3,
		'cus_mobile_no1'=>$mobile_no1,
		'cus_contact_person1'=>$contact_person1,
		'cus_mobile_no2'=>$mobile_no2,
		'cus_contact_person2'=>$contact_person2,
		'cus_mobile_no3'=>$mobile_no3,
		'cus_contact_person3'=>$contact_person3,
		'cus_dr_reg_no'=>$reg_no,
		'cus_reg_id'=>$reg_id,
		'cus_gst_no'=>$gst,
		'cus_tin_no'=>0,
		'cus_cst_no'=>0,
		'cus_drug_lisence1'=>$drug1,
		'cus_drug_lisence2'=>$drug2,
		'cus_tax_type'=>$tax_type,
		
	
		);	
	    $this->db->insert('tbl_customer',$array);
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
	
	
	
	
	function update_cus($id,$post) {
	    
	extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		'customer_name'=>$vendor,
		'cus_address'=>$address,
		'c_period'=>$c_period,
		'cus_account_no'=>$account,
		'cus_bank_name'=>$bank_name,
		'cus_bank_branch'=>$branch,
		'cus_ifsc_code'=>$ifsc,
		'cus_company_panno'=>$pan_no,
		'cus_aadhar_no'=>$aadhar_no,
        'cus_reference_det'=>$ref_det,
		'cus_email1'=>$email1,
		'cus_email2'=>$email2,
		'cus_email3'=>$email3,
		'cus_website'=>$website,
		'cus_lane_line1'=>$lane_line1,
		'cus_lane_line2'=>$lane_line2,
		'cus_lane_line3'=>$lane_line3,
		'cus_mobile_no1'=>$mobile_no1,
		'cus_contact_person1'=>$contact_person1,
		'cus_mobile_no2'=>$mobile_no2,
		'cus_contact_person2'=>$contact_person2,
		'cus_mobile_no3'=>$mobile_no3,
		'cus_contact_person3'=>$contact_person3,
		'cus_dr_reg_no'=>$reg_no,
		'cus_reg_id'=>$reg_id,
		'cus_gst_no'=>$gst,
		'cus_tin_no'=>0,
		'cus_cst_no'=>0,
		'cus_drug_lisence1'=>$drug1,
		'cus_drug_lisence2'=>$drug2,
		'cus_tax_type'=>$tax_type,
		);	
	    $this->db->where('customer_id',$id);
		$this->db->update('tbl_customer',$array);
		
	}
  
	

}