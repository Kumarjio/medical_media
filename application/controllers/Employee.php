<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Employee_model');
          //$this->load->model('dealer_model'); 
     }
	
	public function index(){		
		$session_data = $this->session->all_userdata();
		$data['title'] = 'View All Employee  ';			
		$query = $this->Employee_model->get_all_customer1();
		if($query){
			$data['customer'] =  $query;
		} else {
			$data['customer'] =  '';
		}
		
		$this->load->view('employeelist', $data);
	}
	
	public function addCustomer1(){
		 $data['title'] = 'Add Employee :: ACC ';
		
		 $this->load->view('employeeadd',$data);
	}
	public function userlist()
	{
		$data['title'] = 'Add Employee :: ACC ';
		$data['list']= $this->Employee_model->getuserdetails();
		//echo '<pre>';print_r($data);
		$this->load->view('userdetails_list', $data);
		
	}
	public function usermaster(){
		$data['title'] = 'Add Employee Type :: ACC ';
		$this->load->view('usermaster');
	}
	public function masteradd(){
		$inps = $this->input->post();
		$userdata = array(
		'name' 		            => $inps['usertype'],
	    'date'			        => date('Y-m-d H:i:s'),
		);
		$this->db->insert('usermaster',$userdata);
		echo "<script> window.location= '".base_url('index.php/Employee/userlist')."'</script>";
		//echo '<script type="text/javascript">window.location.href="index.php/Employee/userlist"
	}
	public function location(){
		$data['title'] = 'A to Z  ';
		//$data['list']= $this->Employee_model->getstatedetails();
		$this->load->view('location',$data);
	}
	public function location_list()
	{
		$data['title'] = 'A to Z  ';
		$data['list']= $this->Employee_model->getlocationdetails1();
		//echo '<pre>';print_r($data);
		$this->load->view('location_list', $data);
		
	}
	public function locationadd(){
		$data['title'] = 'A to Z ';
		$inps = $this->input->post();
		$locationdata = array(
		//'master_state_id' 		=> $inps['statename'],
	    'location_name'			=> $inps['location'],
	    'unit_rate'             => $inps['rate'],
		
		);
		//echo '<pre>';print_r($locationdata);exit;
		$this->db->insert('master_location',$locationdata);
		echo "<script> window.location= '".base_url('index.php/Employee/location_list')."'</script>";
		//redirect($this->config->item('base_url').'index.php/Employee/location_list','refresh');
		//$this->load->view('location_list',$data);
	}
	
	public function addCustomer(){
		$muinput = $this->input->post();
		$manage_category=$this->Employee_model->add_customer($muinput);
			echo "<script> window.location= '".base_url('index.php/Employee')."'</script>";
		
		
	}
	
	public function viewCustomer($id){
		 $data['title'] = 'View Employee :: ACC ';
	   	 $data['customer']=$this->Employee_model->view_customer($id);
		 $this->load->view('employeeview',$data);
	}
	
	public function editCustomer1($id){
		 $data['title'] = 'Edit Customer :: ACC ';
		 $data['customer']=$this->Employee_model->edit_customer($id);
		//echo '<pre>';print_r ($data['customer']);exit;
		 $data['type']=$this->Employee_model->type();
		 $this->load->view('employeeedit',$data);
	}
		
	public function updateCustomer($id){
		
		
		$this->form_validation->set_rules('name', 'Employee Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('username', 'User Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Passowrd', 'required|numeric|trim|xss_clean');
		
		
		
			$muinput= $this->input->post();
			$manage_category=$this->Employee_model->update_customer($id,$muinput);
			echo "<script> window.location= '".base_url('index.php/Employee')."'</script>";
			
		
	}	

	
	public function deleteCustomer($id){		
		 $data['delete']=$this->Employee_model->delete_customer($id);
		 echo "<script> alert('Successfully deleted');window.location= '".base_url('index.php/Employee')."'</script>"; 
	}
	public function allocation(){
		 $data['title'] = 'Edit Customer :: ACC ';
		 $data['list'] = $this->Employee_model->get_allocation_list();
		 $data['emp'] =$this->Employee_model->get_all_customer();
		 $data['product']=$this->Employee_model->get_aclc_product();
		 $this->load->view('employee_allocation_list',$data);
	}
	public function addstock(){
		 $data['title'] = 'Edit Customer :: ACC ';
		 $data['list'] = $this->Employee_model->get_all_customer();
		 $data['product']=$this->Employee_model->get_product3();
		 $data['product1']=$this->Sales_model->get_rows3();
		 $this->load->view('employee_allocation',$data);
	}
	public function insertstock(){
		$data['title'] = 'Edit Customer :: ACC ';
    	$var = $this->input->post();
		
		if($var['payment_method'] == 1)
		{
			$varpname = explode(',',$var['pname']);
			$var['pname'] = $varpname[0];
			$arr['admin_id']=$var['vname'];
			$arr['qty']=$var['qty'];
			$arr['date_allocation']=date('Y-m-d', strtotime($var['all_date']));
			$arr['created_date']=date('Y-m-d h:i:s');
			$arr['tbl_product_id'] =$var['pname'];
			$this->db->insert('product_allocation',$arr);
			
			
			 $var1 = $this->db->select('admin_id,qty,tbl_product_id')->where('product_total_allocation.admin_id',$var['vname'])->where('product_total_allocation.tbl_product_id',$var['pname'])->get('product_total_allocation')->result_array();
			 //echo '<pre>';print_r($var1);exit;
			if(!isset($var1[0]['admin_id']))
			{
				$vrr1['admin_id']=$var['vname'];
				$vrr1['qty'] = $var['qty'];
				$vrr1['date_allocation']=date('Y-m-d', strtotime($var['all_date']));
				$vrr1['created_date']=date('Y-m-d h:i:s');
				$vrr1['tbl_product_id']= $var['pname'];
				
			   $this->db->insert('product_total_allocation',$vrr1);	
				
			
			//echo '<pre>';print_r($arr1);exit;
			 }
			 else
			 {
				$arr1['qty'] = $var1[0]['qty']+$var['qty'];
				$arr1['date_allocation']=date('Y-m-d', strtotime($var['all_date']));
				$this->db->where('admin_id',$var['vname']);
				$this->db->where('tbl_product_id',$var['pname']);
				$this->db->update('product_total_allocation',$arr1);
				//echo '<pre>';print_r($vrr1);exit;
			 }
			 $var3 = $this->db->select('tbl_product_id,qty,')->where('purchase_product.tbl_product_id',$var['pname'])->get('purchase_product')->result_array();
			 if(isset($var3[0]['qty']) != '' )
			 {
				 $arr3['qty'] = $var3[0]['qty']-$var['qty'];
			 }
			 $this->db->where('tbl_product_id',$var['pname']);
			 $this->db->update('purchase_product',$arr3);
		}
		else
		{
			$varpname1 = explode(',',$var['pname1']);
			$var['pname1'] = $varpname1[0];
		    $avrr['admin_id']=$var['vname'];
			$avrr['qty']=$var['qty'];
			$avrr['date_allocation']=date('Y-m-d', strtotime($var['all_date']));
			$avrr['created_date']=date('Y-m-d h:i:s');
			$avrr['tbl_product_id'] =$var['pname1'];
			$this->db->insert('product_allocation',$avrr);		 
				 
			 $var2 = $this->db->select('admin_id,qty,tbl_product_id')->where('product_total_allocation.admin_id',$var['vname'])->where('product_total_allocation.tbl_product_id',$var['pname1'])->get('product_total_allocation')->result_array();
			  //echo "<pre>";print_r($var2);exit;
			if(!isset($var2[0]['admin_id']) )
			 {
				$vrr2['admin_id']=$var['vname'];
				$vrr2['qty'] = $var['qty'];
				$vrr2['date_allocation']=date('Y-m-d', strtotime($var['all_date']));
				$vrr2['created_date']=date('Y-m-d h:i:s');
		        $vrr2['tbl_product_id']= $var['pname1'];
		        $this->db->insert('product_total_allocation',$vrr2); 
				
				
			 }
			 else
			 {
					$arr2['qty'] = $var2[0]['qty']+$var['qty'];
					$arr2['date_allocation']=date('Y-m-d', strtotime($var['all_date']));
					$this->db->where('admin_id',$var['vname']);
					$this->db->where('tbl_product_id',$var['pname1']);
					$this->db->update('product_total_allocation',$arr2);
					//echo $this->db->last_query();   
					//echo "hi";exit;
			 }
			 $var4 = $this->db->select('tbl_product_id,qty,')->where('purchase_product.tbl_product_id',$var['pname1'])->get('purchase_product')->result_array();
			if(isset($var4[0]['qty']) != '' )
			   {	
				 $arr4['qty'] = $var4[0]['qty']-$var['qty'];
			   }
				 $this->db->where('tbl_product_id',$var['pname1']);
				 $this->db->update('purchase_product',$arr4);
		}
		
		//echo'<pre>';print_r($var);exit;
		echo "<script> window.location= '".base_url('index.php/Employee/allocation')."'</script>";
			//  echo $this->db->last_query(); exit;
		//redirect($this->config->item('base_url').'index.php/Employee/allocation','refresh');
		 //$this->load->view('employee_allocation',$data);
	
	}
	public function insert_stock(){
		$data['title'] = 'Edit Customer :: ACC ';
    	$var = $this->input->get();
		//echo "<pre>";print_r($var);exit;
		if($var['vname'] != '')
		{
	     $var22= $this->db->select('admin_id,qty,tbl_product_id')->where('product_total_allocation.admin_id',$var['vname'])->where('product_total_allocation.tbl_product_id',$var['pid'])->get('product_total_allocation')->result_array();
			  //echo "<pre>";print_r($var2);exit;
			if(isset($var22[0]['admin_id']) )
			 {
				
				$arr2 = array(
				'admin_id' =>$var['vname'],
				'qty'=>$var22[0]['qty']+$var['qty'],
				'date_allocation'=>date('Y-m-d', strtotime($var['all_date'])),
				'remarks'=>$var['remarks'],
				);
				$this->db->where('id',$var['id']);
				$this->db->where('tbl_product_id',$var['pid']);
				$this->db->update('product_total_allocation',$arr2);
				//echo $this->db->last_query();   exit;
			 }
		}
		 $var5 = $this->db->select('tbl_product_id,qty,')->where('purchase_product.tbl_product_id',$var['pid'])->get('purchase_product')->result_array();
			if(isset($var5[0]['qty']) != '' )
			   {	
				 $arr5['qty'] = $var5[0]['qty']-$var['qty'];
			   }
				 $this->db->where('tbl_product_id',$var['pid']);
				 $this->db->update('purchase_product',$arr5);
		echo "<script> window.location= '".base_url('index.php/Employee/allocation')."'</script>";
		//echo $this->db->last_query();exit;
		 
		 //$this->load->view('employee_allocation',$data);
	}
	public function edit_unit($id){
		 $data['title'] = 'Edit Unit';
		 $data['unit']=$this->Employee_model->edit_unit($id);
		 $this->load->view('location_edit',$data);
	}
	public function location_update($id){
		$inp = $this->input->post();
		$arra = array('location_name'=>$inp['location']);
		$data = $this->db->where('master_location.id',$id)->update('master_location',$arra);
		echo "<script> alert('Updated Successfully'); window.location= '".base_url('index.php/Location')."'</script>";
	}
	
}
