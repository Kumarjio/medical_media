 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
     function edit_unit($id){
     	$session_data = $this->session->all_userdata();	
     	$this->db->select('*')->from('master_location')->where('id',$id);
     	$data = $this->db->get()->result_array();
     	return $data;
     }
	 function get_all_customer1(){
		$session_data = $this->session->all_userdata();	
		/**$this->db->select('*')->from('cp_admin_login')->where('user_type',3);		
        $query = $this->db->get();		
		return $query->result();
		*/
		$this->db->select('cp_admin_login.*');
		$this->db->from('cp_admin_login');
		$query = $this->db->get('');
		//echo $this->db->last_query();exit;	
		return $query->result();			
	 }
    
	 function get_all_customer(){
		$session_data = $this->session->all_userdata();	
		$arr = array('3','4');
		$this->db->select('*')->from('cp_admin_login');	
		$this->db->where_in('user_type',$arr);
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cp_admin_login.employee_location',$session_data['location']);
			}	
        $query = $this->db->get();		
		return $query->result_array();
	 }
	 function getuserdetails(){
	$this->db->select('*');
	$query= $this->db->get('usermaster')->result_array();
	return $query;	
	}
	function getstatedetails(){
	$this->db->select('*');
	$query= $this->db->get('master_state')->result_array();
	return $query;	
	}
	function getlocationdetails($inps){
//print_r($inps);exit;
		$this->db->select('*')->from('master_location');
		if(isset($inps['uid']) && $inps['uid']!='')
		{
			$this->db->where('id', $inps['uid']);	
		}
		 $this->db->order_by('id','desc');			
        $query = $this->db->get();	
		return $query->result_array();	
		
	
	}
function getlocationdetails1(){
//print_r($inps);exit;
		$this->db->select('*')->from('master_location');
		
			
		
		 $this->db->order_by('id','desc');			
        $query = $this->db->get();	
		return $query->result_array();	
		
	
	}
	 
	  function get_all_customer232()
	 {
		$session_data = $this->session->all_userdata();
		$arr = array('2','3','4');	
		$this->db->select('*');
		$this->db->from('usermaster');
		$this->db->where_in('id',$arr);
		//$this->db->where('id!=',$arr);
		 $query = $this->db->get();
		//echo $this->db->last_query();exit;		
		return $query->result_array();
     }
	  function type()
	 {
		$session_data = $this->session->all_userdata();		
		$this->db->select('*');
        $query = $this->db->get('emp_type');
		//echo $this->db->last_query();exit;		
		return $query->result_array();
     }
	 function get_all_location()
	 {
		$session_data = $this->session->all_userdata();		
		$this->db->select('*');
        $query = $this->db->get('master_location');
		//echo $this->db->last_query();exit;		
		return $query->result_array();
     }
	function get_product(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('purchase_product.*,tbl_product.i_id,tbl_product.i_name,i_category');
		$this->db->from('purchase_product');
	    $this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		$this->db->where('tbl_product.i_category','1');
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('tbl_product.employees_location',$session_data['location']);
			}
        $query = $this->db->get();	
		return $query->result_array();
	 }
	 function get_product_allocation()
	 {
		$session_data = $this->session->all_userdata();
		$arr = array('1');	
		$this->db->select('product_total_allocation.*,tbl_product.i_id,tbl_product.i_name,i_category,cp_admin_login.admin_id as ids,cp_admin_login.name');
		$this->db->from('product_total_allocation');
	    $this->db->join('tbl_product','tbl_product.i_id = product_total_allocation.tbl_product_id','left');
		 $this->db->join('cp_admin_login','cp_admin_login.admin_id = product_total_allocation.admin_id','left');
		$this->db->where('tbl_product.i_category','1');
		$this->db->where('product_total_allocation.qty >','0');
		 $this->db->where('cp_admin_login.user_type =','3');
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('tbl_product.employees_location',$session_data['location']);
			}
        $query = $this->db->get();	
		return $query->result_array();
		
	 }
	function get_allocat_product(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('product_total_allocation.*,tbl_product.i_id,tbl_product.i_name,i_category,cp_admin_login.admin_id as ids,cp_admin_login.name');
		$this->db->from('product_total_allocation');
	    $this->db->join('tbl_product','tbl_product.i_id = product_total_allocation.tbl_product_id','left');
        $this->db->join('cp_admin_login','cp_admin_login.admin_id = product_total_allocation.admin_id','left');
		$this->db->where('product_total_allocation.qty >','0');
		$this->db->where('tbl_product.i_category','1');
        $this->db->where('cp_admin_login.user_type =','3');
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('tbl_product.employees_location',$session_data['location']);
			}
        $query = $this->db->get();	
		return $query->result_array();
	 }
	 function get_product3(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('purchase_product.*,tbl_product.i_id,tbl_product.i_name,i_category');
		$this->db->from('purchase_product');
	    $this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		$this->db->where('tbl_product.i_category','1');
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('purchase_product.location',$session_data['location']);
			}
        $query = $this->db->get();	
		return $query->result_array();
	 }
	 function get_aclc_product(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('purchase_product.*,tbl_product.i_id,tbl_product.i_name,i_category');
		$this->db->from('purchase_product');
	    $this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('tbl_product.employees_location',$session_data['location']);
			}
		 $query = $this->db->get();	
		return $query->result_array();
	 }
	 
	 
	  function get_allocation_list(){
		$session_data = $this->session->all_userdata();	
		 $this->db->select('product_total_allocation.*,tbl_product.i_id,i_category,tbl_product.i_name,cp_admin_login.admin_id as ids,cp_admin_login.name'); 
		  $this->db->from('product_total_allocation');
		   //$this->db->where('tbl_po_inv_item.po_inv_id',$id);
		  $this->db->join('tbl_product','tbl_product.i_id = product_total_allocation.tbl_product_id','left');
		   $this->db->join('cp_admin_login','cp_admin_login.admin_id = product_total_allocation.admin_id','left');
		   if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cp_admin_login.employee_location',$session_data['location']);
			}
		    $this->db->order_by('cp_admin_login.admin_id','desc');	
		  $query = $this->db->get();
		 // echo $this->db->last_query();exit;
		  //return $query->result();
		
		
		
		//$this->db->select('*')->from('product_allocation');		
        //$query = $this->db->get();		
		return $query->result_array();
	 }
	 
	
	 function add_customer($post) {
		 extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		$session_data = $this->session->all_userdata();	
		$array=array(
		'username'=>$username,
		'password'=>$password,
		'name'=>$name,
		'emp_code'=>$ecode,
		'phone'=>$mobile,
		'user_type'=>$emp_type,
        'area_name'=>$area_name,
		'created_date'=>$created_date,
		'email_id'=>$email,
		'is_delete'=>0);	
	    $this->db->set($array);
	    $this->db->insert('cp_admin_login',$array);
		//$last_id = $this->db->insert_id();
			
	}
	 
	 
	  function view_customer($id){	
		$array = array('admin_id' => $id);		
		$this->db->select('*')->from('cp_admin_login')
        ->where($array); 
		$query = $this->db->get();
				
		return $query->result();	
		$this->output->enable_profiler(true);		
	 }
	
	function edit_customer($id){	
		$array = array('admin_id' => $id);		
		$this->db->select('*')->from('cp_admin_login')
         ->where($array); 
		$query = $this->db->get();		
		return $query->result();			
	 }
	
	
	function update_customer($id,$post) {
	    
	extract($_REQUEST);
		$created_date=date('Y-m-d h:i:s');
		
		$array=array(
		'username'=>$username,
		'password'=>$password,
		'name'=>$ename,
		'phone'=>$mobile,
		'email_id'=>$email_id,
		'emp_code'	=>$ecode,
		'user_type'=>$emp_type,
		'area_name'=>$area_name,
		'created_date'=>$created_date);	

		$this->db->set($array);
	    $this->db->where('admin_id',$id);
		$this->db->update('cp_admin_login',$array);
		
	}
  
	public function delete_customer($id)
	{
		
	    $this->db->where('cid',$id);
		$this->db->delete('cb_employee');	
		return true;
	}
	public function edit_($id)
	{
		
	    $this->db->where('cid',$id);
		$this->db->delete('cb_employee');	
		return true;
	}

}