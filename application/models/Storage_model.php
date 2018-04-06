<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storage_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_all_Storage(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('cb_storage');	
		
		$this->db->order_by('cid','desc');	
		
			
		 $query = $this->db->get();		
		return $query->result();			
	 }
	  function get_all_hsn($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('tbl_hsn');	
		if(isset($inps['hs_id']) && $inps['hs_id']!='')
		{
			$this->db->where('hsn_id', $inps['hs_id']);	
		}
		$this->db->order_by('hsn_id','desc');	
		
			
		 $query = $this->db->get();		
		return $query->result_array();			
	 }
	  function get_all_Storage_loc(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('master_location');	
		 $query = $this->db->get();		
		return $query->result();			
	 }
	 
	public function delete_Storage($id)
	{
		
	    $this->db->where('cid',$id);
		$this->db->delete('cb_storage');	
		return true;
	}
	
	 function add_Storage($post) {
		 $session_data = $this->session->all_userdata();	
		 extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		//echo '<pre>'; print_r($post);
		
		$array=array(
		'storage_name'=>$Storage_name,
		/*'area_name'=>$area_name,
		'city_name'=>$city_name,
		'state_name'=>$state_name,*/
		'Location'=>$Location,
		//'pincode'=>$pincode,
		'created_date'=>$created_date);	
	    $this->db->set($array);
	    $this->db->insert('cb_storage',$array);
		//$last_id = $this->db->insert_id();
			
	}
	function save_hsn($post) {
		 $session_data = $this->session->all_userdata();	
		 extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		$array=array(
		'hsn_code'=>$hsn_code,
		'tax'=>$tax,
		'created'=>$created_date);	
	    $data = $this->db->insert('tbl_hsn',$array);
		return $data;
	}
	 
	 
	  function view_Storage($id){	
		$array = array('cid' => $id);		
		$this->db->select('*')->from('cb_storage')
        ->where($array); 
		$query = $this->db->get();
				
		return $query->result();	
		$this->output->enable_profiler(true);		
	 }
	
	function edit_hsn($id){	
		$array = array('hsn_id' => $id);		
		$this->db->select('*')->from('tbl_hsn')
         ->where($array); 
		$query = $this->db->get();		
		return $query->result();			
	 }
	
	
	function update_Storage($id,$post) {
	    
	extract($_REQUEST);
		$created_date=date('Y-m-d');
		$array=array(
		'storage_name'=>strtoupper($Storage_name),
		'Location'=>$Location,
		'created_date'=>$created_date);	
		$this->db->set($array);
	    $this->db->where('cid',$id);
		$this->db->update('cb_storage',$array);
		
	}
	function update_hsn($id,$post) {
	    
	extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		$array=array(
		'hsn_code'=>strtoupper($hsn_code),
		'tax'=>$tax,
		'created'=>$created_date
	 );	
	    $this->db->where('hsn_id',$id);
		$this->db->update('tbl_hsn',$array);
		
	}
	function edit_Storage($id){
		$this->db->select('*')->from('cb_storage')->where('cb_storage.cid',$id);
		$data = $this->db->get()->result_array();
		return $data;
	}
  
	

}