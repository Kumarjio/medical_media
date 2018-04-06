<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Stocktransfer extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  	  
		  $this->load->model('Stock_model');
		  
     }
	
	public function index(){
		$data['title'] = 'View All Stocks :: Arrow18 ';
		if($this->input->get())
		{
			$inps = $this->input->get();
		}
		else
		{
			$inps = $this->input->post();
		}	
		$data['list']= $this->Stock_model->getstockdetails1($inps);	
		//$data['list2']= $this->stock_model->getstockdetails1($inps);	
	    //echo '<pre>';print_r($data['list']); exit;
	    if(isset($inps['export']))
		{
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
		}
	    
		$this->load->view('stocks_lists1', $data);
	}
	public function insert_request()
	{
		$session_data = $this->session->all_userdata();
		$data['title'] = 'Insert Request :: Arrow18 ';
		$inps= $this->input->post();
		
		$var2= $this->db->select('req_emp_name,req_qty,tbl_product_id,emp_id,req_product_location,status')->where('tbl_product_id',$inps['req_pro_id'])->where('req_emp_name',$session_data['user_name'])->get('purchase_request_product')->result_array();
		if(isset($var2[0]['tbl_product_id']) && ($var2[0]['req_product_location'])&& ($var2[0]['req_emp_name']) != '')
		{
		    $arr= array('req_qty'=>$var2[0]['req_qty']+$inps['req_qty'],
		           'emp_id'=>$inps['emp_id'],
				   'status'=>0,
				   'created_date' => date('Y-m-d H:i:s'),);
				   
				   
		  $this->db->where('tbl_product_id',$inps['req_pro_id']);
		  $this->db->where('req_product_location',$inps['location']);
		$this->db->update('purchase_request_product',$arr);
		}
		else
		{
			$arr= array('req_qty'=>$inps['req_qty'],
		           'req_product_location'=>$inps['location'],
				   'req_emp_name'=>$session_data['user_name'],
				   'req_emp_location'=>$session_data['location'],
				   'tbl_product_id'=>$inps['req_pro_id'],
				   'emp_id'=>$inps['emp_id'],
				   'status'=>0,
				   'req_product_location'=>$inps['location'],
				    'created_date' => date('Y-m-d H:i:s'),);
				   
				   
				   
		$this->db->insert('purchase_request_product',$arr);
		}
		echo '<script type="text/javascript">window.location.href="'.$this->config->item('base_url').'index.php/Stocktransfer";</script>';
	}
	public function addrequest()
	{
		$data['title'] = 'Add Request :: Arrow18 ';
		$data['list']= $this->Stock_model->getpro();
		//echo '<pre>';print_r($data['list']);exit;	
		$this->load->view('addrequest',$data);
	}
	public function get_pro_det()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$pro = $this->Stock_model->get_pro_det1($inps);
		$c_det = '';
			foreach($pro as $row)
		    {
				
			
			$c_det .= '<strong>Product Location :</strong>'. $row['location'].'<br /><strong>Product Name :</strong>'. $row['i_name'].'-'.$row['descr'].'<br /><strong>Qty :</strong> '.$row['qty'].'<br />';
	      			
	         }
	         echo $c_det;
		
			
	}
	public function Requestlist()
	{
		$data['title'] = 'Add Request :: Arrow18 ';
		$data['list']= $this->Stock_model->get_pro_request();
		//echo '<pre>';print_r($data['list']);exit;	
		$this->load->view('requestviewlist',$data);
	}
	public function update()
	{
		$session_data = $this->session->all_userdata();
		$data['title'] = 'Update Request :: Arrow18 ';
		$inps= $this->input->post();
		if($inps['status'] == 1)
		{
			$var3 = $this->db->select('approved_qty,tbl_product_id,req_emp_location')->where('tbl_product_id',$inps['proid'])->where('req_emp_location',$inps['location'])->get('purchase_request_product')->result_array();
							//echo '<pre>'; print_r($var1);exit;
							if(isset($var3[0]['approved_qty']))
							{
		
								$arr= array('delivery_via'=>$inps['delvia'],
								            'delivery_date'=>date('Y-m-d', strtotime($inps['date'])),
									        'approved_qty' => $var3[0]['approved_qty']+$inps['req_qty'],
									        'status' => 1,);
									   
									 //echo '<pre>';print_r($arr);exit;  
								  $this->db->where('tbl_product_id',$inps['proid']);
								  $this->db->where('req_emp_location',$inps['location']);
								  $this->db->update('purchase_request_product',$arr);
							}
							else
							{
									 $arr= array('delivery_via'=>$inps['delvia'],
												 'delivery_date'=>date('Y-m-d', strtotime($inps['date'])),
											     'approved_qty' => $inps['req_qty'],
											     'status' => 1,);
						   
						 				//echo '<pre>';print_r($arr);exit;  
									  $this->db->where('tbl_product_id',$inps['proid']);
									  $this->db->where('req_emp_location',$inps['location']);
									  $this->db->update('purchase_request_product',$arr);
							}
		
		
		
		
		$var1 = $this->db->select('qty,tbl_product_id,location')->where('tbl_product_id',$inps['proid'])->where('location',$session_data['location'])->get('purchase_product')->result_array();
							//echo '<pre>'; print_r($var1);exit;
							if(isset($var1[0]['tbl_product_id'])){
							$proarray1 = array(
							'qty'  =>$var1[0]['qty']-$inps['req_qty'],
							//'location'  =>$inps['location'],
							 );
			
							$this->db->where('tbl_product_id',$inps['proid']);
							$this->db->where('location',$session_data['location']);
							$this->db->update('purchase_product',$proarray1);
							}
							
							
		$var2 = $this->db->select('qty,tbl_product_id,location')->where('tbl_product_id',$inps['proid'])->where('location',$inps['location'])->get('purchase_product')->result_array();
							//echo '<pre>'; print_r($var1);exit;
							if(isset($var2[0]['tbl_product_id'])&&($var2[0]['location'])){
							$proarray2 = array(
							'qty'  =>$var2[0]['qty']+$inps['req_qty'],
							'location'  =>$inps['location'],
							//'tbl_product_id'=>$inps['proid'],
							 );
			
							$this->db->where('tbl_product_id',$inps['proid']);
							$this->db->where('location',$inps['location']);
							$this->db->update('purchase_product',$proarray2);
							}
							else
							{
								$proarray2 = array(
							'qty'  =>$inps['req_qty'],
							'location'  =>$inps['location'],
							'tbl_product_id'=>$inps['proid'],
							 );
			
							$this->db->insert('purchase_product',$proarray2);
							}
		
		}
		else
		{
			$arr= array('reason'=>$inps['reason'],
			 'status' => 2,);
				   
				   
		  $this->db->where('tbl_product_id',$inps['proid']);
		  $this->db->where('req_emp_location',$inps['location']);
		$this->db->update('purchase_request_product',$arr);
		}
		echo '<script type="text/javascript">window.location.href="'.$this->config->item('base_url').'index.php/Stocktransfer/Requestlist";</script>';
	}
}
?>