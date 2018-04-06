<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
//Public Functions
	 /**function get_rows($table,$fields,$where = NULL){
		if(!$where) {  $where = 'is_delete = 0'; }
		$this->db->select($fields)->from($cb_customer)->where($where);
        $query = $this->db->get();		
		return $query->result();	
		*/
		function get_pro_det($stock_id,$cus_id){
			$session_data = $this->session->all_userdata();
			$this->db->select('*')->from('tbl_stock')->where('tbl_stock.stock_id',$stock_id);
			$this->db->join('tbl_enduser','tbl_enduser.product_ref=tbl_stock.pro_reff_id','left');
			$this->db->where('tbl_enduser.cus_ref',$cus_id);
			$this->db->join('tbl_product','tbl_product.i_id=tbl_enduser.product_ref','left');
			$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
			$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_enduser.cus_ref','left');
			$this->db->join('master_location','master_location.id=tbl_product.unit','left');
			$data = $this->db->get()->result_array();
			return $data;
		}
		function get_pro_det_non($stock_id,$cus_id){
			$session_data = $this->session->all_userdata();
			$this->db->select('*')->from('tbl_stock')->where('tbl_stock.stock_id',$stock_id);
			$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
			$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
			$this->db->join('tbl_customer','tbl_customer.customer_id='.$cus_id.'','left');
			$this->db->join('master_location','master_location.id=tbl_product.unit','left');
			$data = $this->db->get()->result_array();
			return $data;
		}
		function sales_return_invoice(){
			$session_data = $this->session->all_userdata();
			$data = $this->db->select('*')->from('tbl_sales')->where('bill_cancel_status',0)->get()->result_array();
			return $data;	
		}
		function sales_return_list(){
			$session_data = $this->session->all_userdata();
			$data = $this->db->select('*')->from('tbl_sales_return_add')->join('tbl_sales','tbl_sales.s_no=tbl_sales_return_add.return_bill_no','left')->get()->result_array();
			return $data;

		}
		function sales_edit($id){
			$session_data = $this->session->all_userdata();
			$this->db->select('*')->from('tbl_sales')->where('s_no',$id);
			$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id = tbl_sales.s_no','left');
			$this->db->join('tbl_stock','tbl_stock.stock_id = tbl_sales_items.tbl_stock_id','left');
			$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
			$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
			$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales.customer_code','left');
			$this->db->join('master_location','master_location.id=tbl_product.unit','left');
			$data = $this->db->get()->result_array();
			//print_r("<pre>");print_r($data);exit();
			return $data;
		}
		function sales_bill_cancel($id){
			$created_date = date('Y-m-d');
			$session_data = $this->session->all_userdata();
			$this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$id);
			$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
			$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_items.tbl_stock_id','left');			
			$data = $this->db->get()->result_array();
			for($i=0;$i<count($data);$i++) {
				$count = $this->db->select('*')->from('tbl_stock')->where('tbl_stock.stock_id',$data[$i]['stock_id'])->get()->result_array();
				$array = array(
					'curr_qty'=>$count[0]['curr_qty']+$data[$i]['quantity'],
					'curr_free_qty'=>$count[0]['curr_free_qty']+$data[$i]['free_quantity']
				);
				$this->db->where('tbl_stock.stock_id',$data[$i]['stock_id'])->update('tbl_stock',$array);
				//print_r($array);
				$openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.pro_refff_no',$data[$i]['pro_reff_id'])->where('tbl_opening_stock.opening_date',$created_date)->get()->result_array();

				$inv = $this->db->select('*')->from('tbl_po_inv_item')->where('tbl_po_inv_item.tbl_pro_id',$count[0]['pro_reff_id'])->where('tbl_po_inv_item.batch_no',$count[0]['batch_num'])->get()->result_array();
				if(!empty($inv)){
				$resqty1 = ($openqty[0]['saled_stock_value']-(($data[$i]['per_tot']/$data[0]['quantity'])*($data[$i]['quantity']+$data[$i]['free_quantity'])));
		   		$resqty2 = ($openqty[0]['clossing_stock_value']+(($inv[0]['total']/$inv[0]['qty'])*($data[$i]['quantity']+$data[$i]['free_quantity'])));
				$array11 = array(
					'saled_stock'=>$openqty[0]['saled_stock']-($data[$i]['quantity']+$data[$i]['free_quantity']),
					'saled_stock_value'=>$resqty1,
					'clossing_stock_value'=>$resqty2,

				);	
				}else{
					$array11 = array(
					'sales_stock'=>$openqty[0]['sales_stock']-($data[$i]['quantity']+$data[$i]['free_quantity']),);	
				}
				
				$this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$array11);

			}
			$arrayupadte = array('bill_cancel_status'=>1);
			$this->db->where('tbl_sales.s_no',$id)->update('tbl_sales',$arrayupadte);
			return $data;
		}
		function get_bill_data($id){
			$session_data = $this->session->all_userdata();
			$this->db->select('*')->from('tbl_sales')->where('s_no',$id);
			$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
			$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_items.tbl_stock_id','left');
			$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
			$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales.customer_code','left');
			$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
			$this->db->join('master_location','master_location.id=tbl_product.unit','left');
			 $data = $this->db->get()->result_array();
			return $data;	
		}

		function sales_return_add($post){
			extract($_REQUEST);
		  	$session_data = $this->session->all_userdata();
		  	$created_date=date('Y-m-d');
		  //print_r("<pre>");	print_r($bill_no);exit();
		  	 $date_data = $this->db->select('*')->from('tbl_year')->get()->result_array();
             $this->db->select('*')->from('tbl_sales_return_add');
             $this->db->where("DATE_FORMAT(tbl_sales_return_add.return_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($date_data[0]['from_date'])));
             $this->db->where("DATE_FORMAT(tbl_sales_return_add.return_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($date_data[0]['to_date'])));
             $count_data = $this->db->get()->num_rows();
             $bill_count = $count_data+1;
             $bill_no1 = "SR".$bill_count."-".$date_data[0]['year_label'];	
		  	if($gtotal > 0){

		  		  $array1 = array(
		  				  'return_bill_no' => $bill_no,
		  				  'sales_return_bill_no' => $bill_no1,
		  				  'return_cus_name' => $cus_name,
		  				  'return_cus_id' => $cus_code,
		  				  'return_stotal' => $stotal,
		  				  'return_gtotal' => $gtotal,
		  				  'return_paid_amount' => 0,
		  				  'return_pending_amount' => $gtotal,
		  				'return_date' => $created_date);
		  $this->db->insert('tbl_sales_return_add',$array1);
		  $insert_id = $this->db->insert_id();
		  for($i = 0; $i < count($pro_id); $i++)
		  	{ 
			  	if($qty[$i] != 0)
			  {
			  $array12 = array(
			  					'sales_return_add_ref_id'=>$insert_id,
			  					'return_pro_id'=>$pro_id[$i],
			  					'return_stock_id'=>$stock_id[$i],
			  					'return_batch'=>$batch[$i],
			  					'return_hsn_id'=>$hsn_id[$i],
			  					'return_sales_rate'=>$sales_rate[$i],
			  					'return_purrate'=>$purrate[$i],
			  					'return_sgst'=>$sgst[$i],
			  					'return_sgst_amt'=>$sgst_amt[$i],
			  					'return_cgst'=>$cgst[$i],
			  					'return_cgst_amt'=>$cgst_amt[$i],
			  					'return_igst'=>$igst[$i],
			  					'return_igst_amt'=>$igst_amt[$i],
			  					'return_qty'=>$qty[$i],
			  					'return_total'=>$total[$i],
			  		);
			  $this->db->insert('tbl_sales_return_add_item',$array12);
			  $this->db->select('*')->from('tbl_stock')->where('tbl_stock.stock_id',$stock_id[$i]);
			  $sto = $this->db->get()->result_array();

			  $add = $sto[0]['curr_qty']+$qty[$i];
			  $arrup = array('curr_qty'=>$add );
			  $this->db->where('tbl_stock.stock_id',$stock_id[$i])->update('tbl_stock',$arrup);

			  $openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.pro_refff_no',$sto[0]['pro_reff_id'])->where('tbl_opening_stock.opening_date',$created_date)->get()->result_array();

			  $inv = $this->db->select('*')->from('tbl_po_inv_item')->where('tbl_po_inv_item.tbl_pro_id',$sto[0]['pro_reff_id'])->where('tbl_po_inv_item.batch_no',$sto[0]['batch_num'])->get()->result_array();
			 	 $open_add_qty = $openqty[0]['saled_stock']-$qty[$i];
		   		$resqty1 = $openqty[0]['saled_stock_value']-$total[$i];
				if(!empty($inv)){
				
		   		$resqty2 = ($openqty[0]['clossing_stock_value']+($inv[0]['total']/$inv[0]['qty']*($qty[$i])));
		   		
				$arrayopen = array('saled_stock'=>$open_add_qty,'saled_stock_value'=>$resqty1,'clossing_stock_value'=>$resqty2);
				}else{
					$arrayopen = array('saled_stock'=>$open_add_qty,'saled_stock_value'=>$resqty1,);
				}
				$this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$arrayopen);
				}
			}
			return $insert_id;
		  	}else{
		  		return "false";
		  	}
		
		}
		 function get_all_customer()
		 {
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_customer.*');
		$query = $this->db->get('tbl_customer');	
		return $query->result_array();			
	     }
		function get_rows(){
			$session_data = $this->session->all_userdata();	
		$this->db->select('cb_customer.*');
		if($session_data['location'] !=  '')
		    {
				$this->db->where('cb_customer.location',$session_data['location']);
			}
		// $this->db->where('cb_customer.location',$session_data['location']);
		$this->db->from('cb_customer');
        $query = $this->db->get();	
		return $query->result_array();			
	 }	
	 
	 function get_all_pro(){
			$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_stock.*');
		$this->db->select('tbl_product.*');
		$this->db->where('tbl_stock.curr_qty >','0');
		$this->db->join('tbl_product','tbl_product.i_id = tbl_stock.pro_reff_id','left');

		
        $query = $this->db->get('tbl_stock');	
		return $query->result();			
	 }	
	 function get_print_det($id){
	 	$session_data = $this->session->all_userdata();	
	 	$this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$id);
	 	$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales.customer_code','left');
	 	$data = $this->db->get()->result_array();
	 	return $data;
	 }
	 function get_return_print_det($id){
	 	$session_data = $this->session->all_userdata();	
	 	$this->db->select('*')->from('tbl_sales_return_add')->where('tbl_sales_return_add.sales_return_add_id',$id);
	 	$this->db->join('tbl_sales','tbl_sales.s_no = tbl_sales_return_add.return_bill_no','left');
	 	$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales_return_add.return_cus_id','left');
	 	$data = $this->db->get()->result_array();
	 	return $data;
	 }
	 function get_return_print_item($id){
	 	$session_data = $this->session->all_userdata();	
	 	$this->db->select('*')->from('tbl_sales_return_add')->where('tbl_sales_return_add.sales_return_add_id',$id);	 	
	 	
	 	$this->db->join('tbl_sales_return_add_item','tbl_sales_return_add_item.sales_return_add_ref_id=tbl_sales_return_add.sales_return_add_id','left');
	 	$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_return_add_item.return_stock_id','left');
	 	$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
	 	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
	 	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
	 	$data = $this->db->get()->result_array();
	 	return $data;
	 }
	 function get_print_item($id){
	 	$session_data = $this->session->all_userdata();	
	 	$this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$id);	 	
	 	$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
	 	$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_items.tbl_stock_id','left');
	 	$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
	 	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
	 	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
	 	$data = $this->db->get()->result_array();
	 	return $data;
	 }
	 function get_pro_rows($inps){
			$session_data = $this->session->all_userdata();	
		$this->db->select('purchase_product.*');
		$this->db->select('tbl_pricelist.*');
		$this->db->join('tbl_pricelist','tbl_pricelist.po_id = purchase_product.tbl_product_id','left');
		$this->db->where('purchase_product.tbl_product_id',$inps['cus']);
		
        $query = $this->db->get('purchase_product');	
		return $query->result_array();			
	 }	
	 function get_seller_rows1($inps){ 
	  $session_data = $this->session->all_userdata();
	 // $arr =array('4');
	    $this->db->select('product_total_allocation.*,product_total_allocation.admin_id');
		$this->db->select('cp_admin_login.name,cp_admin_login.admin_id as ids');
		$this->db->select('tbl_product.i_name,i_category,i_id');
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cp_admin_login.employee_location',$session_data['location']);
			}*/
		
		$this->db->join('cp_admin_login','product_total_allocation.admin_id = cp_admin_login.admin_id','left');
		$this->db->join('tbl_product','product_total_allocation.tbl_product_id = tbl_product.i_id','left');
		$this->db->group_by('product_total_allocation.tbl_product_id');
		//$this->db->where_in('qty >=',0);
		$this->db->where('product_total_allocation.admin_id',$inps['cus']);
		
		$query = $this->db->get('product_total_allocation');	
		return $query->result_array();
	 }
	 function get_seller_rows(){ 
	  $session_data = $this->session->all_userdata();
	  $arr =array('4');
	    $this->db->select('product_total_allocation.*');
		$this->db->select('cp_admin_login.name,cp_admin_login.admin_id as ids');
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cp_admin_login.employee_location',$session_data['location']);
			}*/
		$this->db->join('cp_admin_login','product_total_allocation.admin_id = cp_admin_login.admin_id','left');
		$this->db->group_by('product_total_allocation.admin_id');
		$this->db->where_in('user_type',$arr);
		$query = $this->db->get('product_total_allocation');	
		return $query->result_array();
	 }
	 function get_seller_rows_paym(){ 
	  $session_data = $this->session->all_userdata();
	  $arr =array('3','4');
	    $this->db->select('*');
		$this->db->from('cp_admin_login');
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cp_admin_login.employee_location',$session_data['location']);
			}
		*/
		$this->db->where_in('user_type',$arr);
		$query = $this->db->get();	
		return $query->result_array();
	 }
	 function get_technician_rows(){ 
	 $session_data = $this->session->all_userdata();
	    $arr =array('3');
		$this->db->select('product_total_allocation.*');
		$this->db->select('cp_admin_login.name,cp_admin_login.admin_id as ids');
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cp_admin_login.employee_location',$session_data['location']);
			}*/
		$this->db->join('cp_admin_login','product_total_allocation.admin_id = cp_admin_login.admin_id','left');
		$this->db->group_by('product_total_allocation.admin_id');
		$this->db->where_in('user_type',$arr);
		$query = $this->db->get('product_total_allocation');	
		return $query->result_array();
	 }
	 function get_cus_det($inps)
	 {
		$this->db->select('cb_customer.*');
		$this->db->where('cb_customer.cid',$inps['cus']);
		$query = $this->db->get('cb_customer')->result_array();
		//echo $this->db->last_query();
		return $query;
	 }
	 
	 function get_rowsdet(){
		$this->db->select('*');
		$this->db->from('cb_customer');
		$this->db->where('cid',$_POST['id']);
        $query = $this->db->get();	
		return $query->result_array();			
	 }	 
	 function get_rows1()
	 {
		 $session_data = $this->session->all_userdata();	
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('i_category','1');
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('tbl_product.employees_location',$session_data['location']);
			}*/
        $query = $this->db->get();	
		return $query->result_array();				
	 }	
	 function get_rows2()
	 {
		$session_data = $this->session->all_userdata();	
		$this->db->select('purchase_product.*,tbl_product.i_id,tbl_product.i_name,i_category');
		$this->db->from('purchase_product');
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('tbl_product.employees_location',$session_data['location']);
			}*/
	    $this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		$this->db->where('tbl_product.i_category','2');
        $query = $this->db->get();	
		return $query->result_array(); 
		 
					
	 }	
	 
	  function get_rows3()
	 {
		$session_data = $this->session->all_userdata();	
		$this->db->select('purchase_product.*,tbl_product.i_id,tbl_product.i_name,i_category');
		$this->db->from('purchase_product');
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('purchase_product.location',$session_data['location']);
			}*/
	    $this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		$this->db->where('tbl_product.i_category','1');
        $query = $this->db->get();	
		return $query->result_array(); 
		 
					
	 }	
	 function get_rows_groupby($table,$fields,$where = NULL, $groupby) {
		if(!$where) {  $where = 'is_delete = 0'; }
		$this->db->select($fields)->from($table)
		 ->where($where);
		 $this->db->group_by($groupby);
		 $query = $this->db->get();
		 return $query->result();		 
	 }
	 
//Public Functions	 
	  function get_all_employee()
	 {
		$session_data = $this->session->all_userdata();	
		$arr =array('3','4');
		$this->db->select('product_allocation.*');
		$this->db->select('cp_admin_login.name,cp_admin_login.admin_id as ids');
		$this->db->select('tbl_product.*');
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cp_admin_login.employee_location',$session_data['location']);
			}*/
		
		$this->db->join('cp_admin_login','product_allocation.admin_id = cp_admin_login.admin_id','left');
		$this->db->join('tbl_product','tbl_product.i_id = product_allocation.tbl_product_id','left');
		$this->db->group_by('product_allocation.admin_id');
		$this->db->where_in('user_type',$arr);
		$this->db->where('tbl_product.i_category=',1);
		//$this->db->where('user_type =',4);		
        $query = $this->db->get('product_allocation');	
		//echo $this->db->last_query();	
		return $query->result();			
	 }
	  function get_instal_id()
	 {
		/** $this->db->select('*');
		 $this->db->select('cb_customer.customer_name');
		 $this->db->select('products.prod_name');
		 if(!empty($inps))
		 {
		 	$this->db->where('customer_code',$inps['cus_code']);
		 }
		 $this->db->join('cb_customer','cb_customer.cid = tbl_installation.customer_code','left');
		 $this->db->join('products','products.id = tbl_installation.product_id','left');
		 $query = $this->db->get('tbl_installation')->result_array();
		 return $query;
		 */
		 $session_data = $this->session->all_userdata();	
		 $this->db->select('tbl_sales.*');
		 $this->db->select('cb_customer.customer_name,cb_customer.cid as ids,mob_no1');
		// $this->db->where('tbl_sales.s_no=',$inps['inst_id']);
		 $this->db->join('cb_customer','cb_customer.cid=tbl_sales.customer_code','left');
		  /*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('location',$session_data['location']);
			}*/
		 $query = $this->db->get('tbl_sales')->result_array();
		 return $query;
	 }
	 
    function getDetails_cus($itemid, $cus_id, $batch_no) {
		
		$where = array('tbl_po_inv_item.item_code'=>$itemid,'tbl_po_inv_item.batch_no'=>$batch_no);
		$this->db->select('exp_date,batch_no,s_price,qty,selling_price, selling_percentage,s_tax')->from('tbl_po_inv_item')
		->join('tbl_partywiserate', 'tbl_partywiserate.item_code = tbl_po_inv_item.item_code', 'left')
		->where($where);
		// $this->db->group_by('batch_no'); selling_price,selling_percentage
		$query = $this->db->get();
		//return $this->db->last_query();
		return $query->result();	
		 
	 }
	 public function qtyCheck($item_code, $batch_no)
	{
		$pur_qty = $this->db->query('select qty as pur_qty from tbl_po_inv_item where item_code="'.$item_code.'" and  batch_no="'.$batch_no.'" ')->row()->pur_qty;
		 $ret_qty = $this->db->query('select sum(qty) as ret_qty from tbl_po_return_item where item_id="'.$item_code.'" and  batch_no="'.$batch_no.'"');
		 $num_rows = $ret_qty->num_rows();
		 if($num_rows > 0) {
			return $pur_qty - ($ret_qty->row()->ret_qty);
		 }
		 else {
			 return $pur_qty;
		 }
	}
	 
	 function getDetails($itemid, $batch_no) {
		 
		
		 $where = array('item_code'=>$itemid, 'batch_no'=>$batch_no);
		 $this->db->select('exp_date')->from('tbl_po_inv_item')
		 ->where($where);
		 $query2 = $this->db->get();
		 return $query2->result();		 
	 }
	 
	function sales_payment($inps){
		 $session_data = $this->session->all_userdata();   
		$this->db->select('*')->from('tbl_sales');
		$this->db->order_by('s_no', 'DESC');		
		$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales.customer_code','left');

		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_sales.customer_code =', $inps['cid']);	
		}
		/*if(isset($inps['storage']) && $inps['storage']!='')
	    {
			$this->db->where('cb_storage.Location =', $inps['storage']);	
		}
		
		if(isset($inps['product_cde']) && !empty($inps['product_cde']))
		{
			$this->db->where('tbl_product.i_name =', $inps['product_cde']);
		}
		if($session_data['location'] !=  'Chennai')
		    {
				$this->db->where('tbl_po_inv.storage_name',$session_data['location']);
			}*/
		$this->db->order_by('s_no','desc');
		$data = $this->db->get()->result_array();
		return $data;
	}
	 function sales_return_payment_list($inps){
		 $session_data = $this->session->all_userdata();   
		$this->db->select('*')->from('tbl_debit_return');

		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_debit_return.sales_return_pay_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_debit_return.sales_return_pay_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['bill_no']) && $inps['bill_no']!='')
		{
			$this->db->where('tbl_debit_return.sales_return_invoice_ref =', $inps['bill_no']);	
		}
		if(isset($inps['cus_name']) && $inps['cus_name']!='')
		{
			$this->db->where('tbl_debit_return.sales_return_cus_id_ref =', $inps['cus_name']);	
		}
		if(isset($inps['paid']) && $inps['paid']!='')
		{
			$this->db->where('tbl_debit_return.sales_return_pay_type =', $inps['paid']);	
		}
		$this->db->order_by('debit_return_id','desc');
		$data = $this->db->get()->result_array();
		return $data;
	}
    
	function updatesales($post){ 
		extract($_REQUEST);
		$created_date = date('Y-m-d');
		//print_r("<pre>");print_r($post);exit();
		$session_data = $this->session->all_userdata();
		$data1 = $this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$sales_id)->get()->result_array();
		$old_paid = $gtotal-$data1[0]['paid_amt'];
		// /print_r("<pre>");print_r($data1);exit();	
			$array115 = array(
				  	'total_amount'=>$gtotal,
				  	'stot'=>$stotal,
				  	'pending_amt'=>$old_paid,
				  	'status'=>0
				  	);
		$sal_up = $this->db->where('tbl_sales.s_no',$sales_id)->update('tbl_sales',$array115);
			//print_r(count($pname));exit();
			for($i=0;$i<count($pname);$i++){
				if($sales_item_id[$i] != 0){	
				$data2 = $this->db->select('*')->from('tbl_sales_items')->where('tbl_sales_items.si_no',$sales_item_id[$i])->get()->result_array();
				$data3 = $this->db->select('*')->from('tbl_stock')->where('tbl_stock.stock_id',$pname[$i])->get()->result_array();

				$openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.pro_refff_no',$data3[0]['pro_reff_id'])->where('tbl_opening_stock.opening_date',$created_date)->get()->result_array();

				$open_add_qty = $openqty[0]['saled_stock']-($data2[0]['quantity']+$data2[0]['free_quantity']);
				$resqty1 = ($openqty[0]['saled_stock_value']-($data2[0]['per_tot']/$data2[0]['quantity']*($data2[0]['quantity']+$data2[0]['free_quantity'])));

				$inv = $this->db->select('*')->from('tbl_po_inv_item')->where('tbl_po_inv_item.tbl_pro_id',$data3[0]['pro_reff_id'])->where('tbl_po_inv_item.batch_no',$data3[0]['batch_num'])->get()->result_array();
				if(!empty($inv)){
				
		   		$resqty2 = ($openqty[0]['clossing_stock_value']+($inv[0]['total']/$inv[0]['qty']*($data2[0]['quantity']+$data2[0]['free_quantity'])));
				$arrayopen = array('saled_stock'=>$open_add_qty,'saled_stock_value'=>$resqty1,'clossing_stock_value'=>$resqty2);
				}else{
					$arrayopen = array('saled_stock'=>$open_add_qty,'saled_stock_value'=>$resqty1,);
				}
				$this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$arrayopen);


				$add_qty = $data3[0]['curr_qty']+$data2[0]['quantity'];
				$add_free_qty = $data3[0]['curr_free_qty']+$data2[0]['free_quantity'];
				$array_stock = array(
					'curr_qty'=>$add_qty,
					'curr_free_qty'=>$add_free_qty
				);

				$stockup = $this->db->where('tbl_stock.stock_id',$pname[$i])->update('tbl_stock',$array_stock);
				

				$array1=array(
					   	'tbl_sales_id'=>$sales_id,
					   	'tbl_stock_id'=>$pname[$i],
					   	'sales_price'=>$purrate[$i],
					   	'quantity'=>$qty[$i],
					   	'free_quantity'=>$free_qty[$i],
					   	'cgst_sale'=>$cgst[$i],
					   	'sgst_sale'=>$sgst[$i],
					   	'igst_sale'=>$igst[$i],
					   	'cgst_sale_amt'=>$cgst_amt[$i],
					   	'sgst_sale_amt'=>$sgst_amt[$i],
					   	'igst_sale_amt'=>$igst_amt[$i],
					   	'discount_sale_amt'=>$discount[$i],
					   	'per_tot'=>$total[$i]
					 );
								
				$data =	$this->db->where('tbl_sales_items.si_no',$sales_item_id[$i])->update('tbl_sales_items',$array1);
				$data2 = $this->db->select('*')->from('tbl_sales_items')->where('tbl_sales_items.si_no',$sales_item_id[$i])->get()->result_array();
				$data3 = $this->db->select('*')->from('tbl_stock')->where('tbl_stock.stock_id',$pname[$i])->get()->result_array();

				$openqty1 = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.pro_refff_no',$data3[0]['pro_reff_id'])->where('tbl_opening_stock.opening_date',$created_date)->get()->result_array();
				if(!empty($inv)){
				$open_add_qty1 = $openqty1[0]['saled_stock']+$qty[$i]+$free_qty[$i];
				$open_add_qty2 = $openqty1[0]['saled_stock_value']+$total[$i];
		   		$open_add_qty3 = ($openqty1[0]['clossing_stock_value']-($inv[0]['total']/$inv[0]['qty']*($qty[$i]+$free_qty[$i])));
				$arrayopen1 = array('saled_stock'=>$open_add_qty1,'saled_stock_value'=>$open_add_qty2,'clossing_stock_value'=>$open_add_qty3);
				
				}else{
				$open_add_qty1 = $openqty1[0]['saled_stock']+$qty[$i]+$free_qty[$i];
				$open_add_qty2 = $openqty1[0]['saled_stock_value']+$total[$i];
				$arrayopen1 = array('saled_stock'=>$open_add_qty1,'saled_stock_value'=>$open_add_qty2,);
				}
				$this->db->where('tbl_opening_stock.openind_id',$openqty1[0]['openind_id'])->update('tbl_opening_stock',$arrayopen1);

				$min_qty = $data3[0]['curr_qty']-$qty[$i];
				$min_free_qty = $data3[0]['curr_free_qty']-$free_qty[$i];
				$array_stock_min = array(
					'curr_qty'=>$min_qty,
					'curr_free_qty'=>$min_free_qty
				);

				$stockup_min = $this->db->where('tbl_stock.stock_id',$pname[$i])->update('tbl_stock',$array_stock_min);
				
				}else{
					$array1=array(
					   	'tbl_sales_id'=>$sales_id,
					   	'tbl_stock_id'=>$pname[$i],
					   	'sales_price'=>$purrate[$i],
					   	'quantity'=>$qty[$i],
					   	'free_quantity'=>$free_qty[$i],
					   	'cgst_sale'=>$cgst[$i],
					   	'sgst_sale'=>$sgst[$i],
					   	'igst_sale'=>$igst[$i],
					   	'cgst_sale_amt'=>$cgst_amt[$i],
					   	'sgst_sale_amt'=>$sgst_amt[$i],
					   	'igst_sale_amt'=>$igst_amt[$i],
					   	'discount_sale_amt'=>$discount[$i],
					   	'per_tot'=>$total[$i]
					 );
					$data = $this->db->insert('tbl_sales_items',$array1);
					$var1 = $this->db->select('*')->from('tbl_stock')->where('stock_id',$pname[$i])->get()->result_array();
				   $min_qty = $var1[0]['curr_qty']-$qty[$i];
				   $min_free_qty = $var1[0]['curr_free_qty']-$free_qty[$i];
				   $stockup = array('curr_qty' => $min_qty,'curr_free_qty' => $min_free_qty );
				   $this->db->set($stockup);
				   $this->db->where('tbl_stock.stock_id',$pname[$i])->update('tbl_stock',$stockup);
				}
			}

			//print_r("<pre>");print_r($array115);exit();	
			return $data;
		}
	  function add_sales_entry($post) {
		  extract($post);
		  //echo '<pre>'; print_r($post);exit;
		  $session_data = $this->session->all_userdata();
		  $created_date=date('Y-m-d');
		  $created_time=date('h:i:s');	
		  $date_data = $this->db->select('*')->from('tbl_year')->get()->result_array();
             $this->db->select('*')->from('tbl_sales');
             $this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($date_data[0]['from_date'])));
             $this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($date_data[0]['to_date'])));
             $count_data = $this->db->get()->num_rows();
             $bill_count = $count_data+1;
             $bill_no1 = "SB".$bill_count."-".$date_data[0]['year_label'];	 
				     $array115 = array(
				  	'bill_no'=>$bill_no1,
				  	'customer_code'=>$cus_code,
				  	'refer_po_no'=>$po_no_ref,
				  	'refer_po_date'=>$po_date_ref,
				  	'total_amount'=>$gtotal,
				  	'stot'=>$stotal,
				  	'created_date'=>$created_date,
				  	'created_time'=>$created_time,
				  	'paid_amt'=>0,
				  	'pending_amt'=>$gtotal,
				  	'status'=>0
				  	);
					$this->db->insert('tbl_sales',$array115);
					$insert_id = $this->db->insert_id();
				   
	     
		  for($i = 0; $i < count($pname); $i++) 
		  
		  {
			   $array1=array(
			   	'tbl_sales_id'=>$insert_id,
			   	'tbl_stock_id'=>$pname[$i],
			   	'sales_price'=>$purrate[$i],
			   	'quantity'=>$qty[$i],
			   	'free_quantity'=>$free_qty[$i],
			   	'cgst_sale'=>$cgst[$i],
			   	'sgst_sale'=>$sgst[$i],
			   	'igst_sale'=>$igst[$i],
			   	'cgst_sale_amt'=>$cgst_amt[$i],
			   	'sgst_sale_amt'=>$sgst_amt[$i],
			   	'igst_sale_amt'=>$igst_amt[$i],
			   	'discount_sale_amt'=>$discount[$i],
			   	'per_tot'=>$total[$i]
			   );
			 $this->db->insert('tbl_sales_items',$array1);	
			 
			 

		   $var1 = $this->db->select('*')->from('tbl_stock')->where('stock_id',$pname[$i])->get()->result_array();

		   $openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.opening_date',$created_date)->where('tbl_opening_stock.pro_refff_no',$var1[0]['pro_reff_id'])->get()->result_array();
		   $inv = $this->db->select('*')->from('tbl_po_inv_item')->where('tbl_po_inv_item.tbl_pro_id',$var1[0]['pro_reff_id'])->where('tbl_po_inv_item.batch_no',$var1[0]['batch_num'])->get()->result_array();
		   if(!empty($inv)){
		   	$resqty2 = $openqty[0]['clossing_stock_value']-(($inv[0]['total']/$inv[0]['qty'])*($qty[$i]+$free_qty[$i]));
		   	$resqty = $openqty[0]['saled_stock']+$qty[$i]+$free_qty[$i];
		   $resqty1 = $openqty[0]['saled_stock_value']+$total[$i];
		   
		   $resarray = array('saled_stock'=>$resqty,'saled_stock_value'=>$resqty1,'clossing_stock_value'=>$resqty2);
		   $this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$resarray);
		   }else{
		   	$resqty = $openqty[0]['saled_stock']+$qty[$i]+$free_qty[$i];
		   $resqty1 = $openqty[0]['saled_stock_value']+$total[$i];
		   
		   $resarray = array('saled_stock'=>$resqty,'saled_stock_value'=>$resqty1,);
		   $this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$resarray);
		   }

		   

		   $min_qty = $var1[0]['curr_qty']-$qty[$i];
		   $min_free_qty = $var1[0]['curr_free_qty']-$free_qty[$i];
		   $stockup = array('curr_qty' => $min_qty,'curr_free_qty' => $min_free_qty );
		   $this->db->set($stockup);
		   $this->db->where('tbl_stock.stock_id',$pname[$i])->update('tbl_stock',$stockup);
		   $array2up = array('status_inv_cancel'=>1);

		   $data_inv = $this->db->select('*')->from('tbl_po_inv_item')->where('tbl_po_inv_item.tbl_pro_id',$var1[0]['pro_reff_id'])->where('tbl_po_inv_item.batch_no',$var1[0]['batch_num'])->get()->result_array();
		   /*for($i=0;$i<count($data_inv);$i++){*/
		   		if(!empty($data_inv)){
		   	$datainv = $this->db->select('*')->from('tbl_po_inv')->where('tbl_po_inv.po_id',$data_inv[0]['po_inv_id'])->where('tbl_po_inv.vname',$var1[0]['vender_refff_id'])->get()->result_array();
		   
		   		$this->db->where('tbl_po_inv.po_id',$datainv[0]['po_id'])->update('tbl_po_inv',$array2up);
		   	}
		  /* }*/
    //echo "<pre>";print_r($datainv);
	   }
		 //exit();
		return $insert_id;
	}
	
	function sales_data($id) {
		$array = array('tbl_sales.s_no' => $id);		
		$this->db->select('tbl_sales.*,tbl_customer.c_code,tbl_customer.c_name,tbl_customer.address1,tbl_customer.address2')->from('tbl_sales')
	    ->join('tbl_customer','tbl_customer.c_id=tbl_sales.customer_code','left')
		 ->where($array); 
		$query = $this->db->get();		
		return $query->result();	 
	 }
	 
	  
	  function sales_item_data($id) {
		$array = array('tbl_sales_items.tbl_sales_id' => $id);		
		$this->db->select('tbl_sales_items.*, tbl_item.i_code')->from('tbl_sales_items')
		->join('tbl_item', 'tbl_item.i_id = tbl_sales_items.tbl_product_id', 'left')
         ->where($array); 
		$query = $this->db->get();		
		return $query->result();	 
	 }
	
	 function sales_confirm($id)
	{
		$array=array('sales_confirm'=>1);	
	    $this->db->set($array);
	    $this->db->where('s_no',$id);
		$this->db->update('tbl_sales',$array);
		return true;
	}
	function sales_cancel($id)
	{
		$this->db->where('s_id', $id);
   		$this->db->delete('tbl_sales_items');
		$this->db->where('s_no', $id);
   		$this->db->delete('tbl_sales');
		return true;
	}
	
	 
	  
	  
//******************************************************************Sales return starts here**********************************************************************//
	
  		function getSalesItems($c_id) {
		 $this->db->select('i_name, i_id')->from('tbl_sales_items as A')
		 ->join('tbl_sales as B', '`B`.`s_no` = `A`.`s_id`', 'LEFT')
		 ->join('tbl_item as C', '`C`.`i_id` = `A`.`item_code`', 'LEFT')
		 ->where('B.customer_code', $c_id);
		$this->db->group_by('i_id');
		$query = $this->db->get();
		 //$items = array();
		//return $this->db->last_query();
		 return $query->result();	
			
		}
	  
	   
	 
	 
	 function getSalesBatch($itemid, $c_id) {
		 $where = array('customer_code'=>$c_id, 'item_code'=>$itemid);
		 $this->db->select('batch')->from('tbl_sales_items')
		 ->join('tbl_sales', '`tbl_sales`.`s_no` = `tbl_sales_items`.`s_id`', 'LEFT')
		 ->where($where);
		 $this->db->group_by('batch');
		 $query = $this->db->get();
		 //return $this->db->last_query();
		 return $query->result();		 
	 }
	 function getSalesDetails($itemid, $c_id, $batch_no) {
		 $where = array('customer_code'=>$c_id, 'item_code'=>$itemid, 'batch'=>$batch_no);
		 $this->db->select('expiry, sales_price')->from('tbl_sales_items')
		 ->join('tbl_sales', '`tbl_sales`.`s_no` = `tbl_sales_items`.`s_id`', 'LEFT')
		 ->where($where);
		 $query = $this->db->get();
		 //return $this->db->last_query();
		 return $query->result();		 
	 }
	 public function qtySalesCheck($item_code, $batch_no)
	{
		$sal_qty = $this->db->query('select quantity as sal_qty from tbl_sales_items where item_code="'.$item_code.'" and  batch="'.$batch_no.'" ')->row()->sal_qty;
		 $ret_qty = $this->db->query('select sum(qty) as ret_qty from tbl_sales_return_items where item_name="'.$item_code.'" and  batch="'.$batch_no.'"');
		 $num_rows = $ret_qty->num_rows();
		 if($num_rows > 0) {
			return $sal_qty - ($ret_qty->row()->ret_qty);
		 }
		 else {
			 return $sal_qty;
		 }
		 
		

	}
	  function add_sales_return($post) {
		  extract($_REQUEST);
		  $created_date=date('Y-m-d h:i:s');
		  $array=array('cus_id'=>$c_name, 'return_date'=>$return_date, 'tot_amount'=>$gtotal, 'remarks'=>$remarks, 'date'=>$created_date,'status'=>1);
		  $this->db->set($array);
	    $this->db->insert('tbl_sales_return',$array);
		$insert_id = $this->db->insert_id();
		//$itemname one of the varible array
		for($i = 0; $i < count($item_name); $i++) {
			 $array=array('sr_id'=>$insert_id,'item_name'=>$item_name[$i],'batch'=>$batch[$i],'expiry'=>$expiry[$i],'type'=>$r_type[$i],'qty'=>$qty[$i],'price'=>$price[$i],'discount'=>$disc[$i],'value'=>$total[$i],'date'=>$created_date,'status'=>1);
		  $this->db->set($array);
	    $this->db->insert('tbl_sales_return_items',$array);
		}
		  
	  }
//******************************************************************Sales return ends here**********************************************************************//

//******************************************************************Sales payment starts here**********************************************************************//
	  
	  function rupeestowords1($number)
	{
		//$number = 190908100.25;
	
	   $no = round($number);
	   $point = round($number - $no, 2) * 100;
	   $hundred = null;
	   $digits_1 = strlen($no);
	   $i = 0;
	   $str = array();
	   $words = array('0' => '', '1' => 'one', '2' => 'two',
		'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
		'7' => 'seven', '8' => 'eight', '9' => 'nine',
		'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
		'13' => 'thirteen', '14' => 'fourteen',
		'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
		'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
		'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
		'60' => 'sixty', '70' => 'seventy',
		'80' => 'eighty', '90' => 'ninety');
	   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
	   
	   while ($i < $digits_1) {
		 $divider = ($i == 2) ? 10 : 100;
		 $number = floor($no % $divider);
		 $no = floor($no / $divider);
		 $i += ($divider == 10) ? 1 : 2;
		 if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
			$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
			$str [] = ($number < 21) ? $words[$number] .
				" " . $digits[$counter] . $plural . " " . $hundred
				:
				$words[floor($number / 10) * 10]
				. " " . $words[$number % 10] . " "
				. $digits[$counter] . $plural . " " . $hundred;
		 } else $str[] = null;
	  }
	  
	  $str = array_reverse($str);
	  $result = implode('', $str);
	  $points = ($point) ?
		" point " . $words[$point / 10] . " " . 
			  $words[$point = $point % 10] : '';
	  
	  if($result!='')
	  {
		  $ret1 =  "Rupees ".$result ." ";
	  }
	  else
	  {
		  $ret1 =  "Rupee Zero ";
	  }
	  if($points != '')
			  $ret1= $ret1. $points . " Paise";
	  //$ret1.=' Only';
	  
	  $ret1 = ucwords($ret1);
	  return $ret1.' Only/-';
	 
	}
	  function get_sales_pending_amount($customer_id){
		  //return $customer_id;
		 $tot_amount = $this->db->query('select sum(total_amount) as tot_amounts from tbl_sales where customer_code ="'.$customer_id.'"')->row()->tot_amounts;
		 $paid_amount = $this->db->query('select sum(r_amount) as r_amount from tbl_sales_payment where customer_id="'.$customer_id.'"');
		 $num_rows = $paid_amount->num_rows();
		 if($num_rows > 0) {
			return $tot_amount - ($paid_amount->row()->r_amount);
		 }
		 else {
			 return $tot_amount;
		 }
	  }
	  function get_sales_invoices($cus_id) {
		 /* SELECT A.bill_no, A.created_date, A.total_amount,  sum(paid_amount) as total from tbl_sales as A left join tbl_sales_payment_details on A.s_no = tbl_sales_payment_details.s_id  where customer_code  = 1 
 group by A.s_no HAVING  total is null OR total < total_amount*/
 $created_date=date('Y-m-d h:i:s');
		  $query = $this->db->query('SELECT A.bill_no, A.created_date, DATEDIFF( "'.$created_date.'" , A.created_date ) AS days, A.s_no, A.total_amount,  sum(paid_amount) as total from tbl_sales as A left join tbl_sales_payment_details on A.s_no = tbl_sales_payment_details.s_id  where customer_code  = "'.$cus_id.'" 
 group by A.s_no HAVING  total is null OR total < total_amount');
 		//return $query->db->last_query();
		return $query->result();
	  }
	   function getInvoicedbysearch($inps)
	 {
		 $this->db->select('tbl_invoice.*');
		 $this->db->select('cb_customer.customer_name');
		 $this->db->where('tbl_invoice.s_no=',$inps['id']);
		 $this->db->join('cb_customer','tbl_invoice.customer_code=cb_customer.cid','left');
		 $query = $this->db->get('tbl_invoice')->result_array();
		 return $query;
		 
	    $query = $this->db->get('tbl_invoice')->result_array();
		 //echo '<pre>'; print_r($query); exit;
		 return $query;
	 }
	 function getInvoicedbysearch1($inps){
	    $session_data = $this->session->all_userdata();	
		$this->db->select('*');
		$this->db->from('tbl_invoice_payment');
        $query = $this->db->get();	
		return $query->result_array();	
		 /**$this->db->select('tbl_invoice.*');
		 $this->db->select('tbl_invoice_payment.tbl_invoice_id,paid_amt');
		 $this->db->where('tbl_invoice.s_no=',$inps['id']);
		 $this->db->join('tbl_invoice_payment','tbl_invoice_payment.customer_code=cb_customer.cid','left');
		 $query = $this->db->get('tbl_invoice')->result_array();*/		
	 }	 
	  function getInvoiced()
	 {
		 $session_data = $this->session->all_userdata();
		 $this->db->select('tbl_invoice.*');
		 $this->db->select('cb_customer.customer_name,cid,mob_no1');
		 $this->db->select('tbl_sales.*,tbl_sales.s_no as sno');
		 $this->db->select('tbl_sales_items.*');
		 $this->db->select('tbl_product.*');
		 $this->db->join('cb_customer','tbl_invoice.customer_code=cb_customer.cid','left');
		 $this->db->join('tbl_sales','tbl_sales.s_no=tbl_invoice.sales_id','left');
		 $this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_invoice.sales_id','left');
		 $this->db->join('tbl_product','tbl_product.i_id=tbl_sales_items.tbl_product_id','left');
		 
		
		 $this->db->order_by('tbl_invoice.s_no','desc');		
		 $query = $this->db->get('tbl_invoice')->result_array();
		 //echo $this->db->last_query();exit;
		 return $query;
	 }
	 function getinvoiceds($inps){
   $this->db->select('tbl_invoice.*,tbl_invoice.created_date as ds');
   $this->db->select('tbl_invoice_payment.*,tbl_invoice_payment.created_date as cds');
	$this->db->select('tbl_sales.total_amount as amt,tbl_sales.s_no as sno,tbl_sales.customer_code,bill_no,tbl_sales.cst as csts,pan,tbl_sales.service_tax as st,tbl_sales.tin,tbl_sales.insurance_amt,tbl_sales.vendor_name');
	$this->db->select('cb_customer.customer_name,area_name,city_name,pincode,mob_no1,email_id,cid');
	$this->db->select('tbl_product.*');
	$this->db->select('tbl_sales_items.si_no as sno1,tbl_sales_items.tbl_sales_id,tbl_sales_items.tbl_product_id,tbl_sales_items.quantity,tbl_sales_items.sales_price,tax_amt,total_value,discount,advance,serial_no,total');
	$this->db->select('tbl_statutory.cst as csts,tbl_statutory.vat as vats,tbl_statutory.service_tax as st');
	
	//$this->db->join('tbl_invoice', 'tbl_invoice.sales_id = tbl_sales.s_no', 'left');
	$this->db->join('tbl_invoice_payment', 'tbl_invoice.s_no = tbl_invoice_payment.tbl_invoice_id', 'left'); 
	$this->db->join('tbl_sales_items', 'tbl_sales_items.tbl_sales_id = tbl_invoice.sales_id', 'left'); 
	$this->db->join('tbl_sales', 'tbl_sales.s_no = tbl_sales_items.tbl_sales_id', 'left'); 
	$this->db->join('cb_customer', 'cb_customer.cid = tbl_sales.customer_code', 'left');
	$this->db->join('tbl_product', 'tbl_product.i_id = tbl_sales_items.tbl_product_id', 'left');
	$this->db->join('tbl_statutory', 'tbl_statutory.product_type = tbl_sales_items.pro_type', 'left');
	$this->db->where('tbl_invoice.s_no',$inps['id']);
	$query = $this->db->get('tbl_invoice');
	return $query->result_array();
	//$this->db->where('tbl_invoice.s_no',$inps['id']);
	//$query = $this->db->get();
	//return $query->result_array();
	
	}
	  function Getpaymentlist()
	 {
		  $session_data = $this->session->all_userdata();
		 $this->db->select('tbl_invoice.*,tbl_invoice.inv_date as ds');
		 $this->db->select('tbl_invoice_payment.*');
		 $this->db->select('cb_customer.customer_name,mob_no1,cid');
		// $this->db->select('tbl_sales_items.*');
		 //$this->db->select('tbl_product.*');
		 
		 $this->db->join('tbl_invoice', 'tbl_invoice.s_no = tbl_invoice_payment.tbl_invoice_id', 'left');
		 $this->db->join('cb_customer','tbl_invoice_payment.customer_code=cb_customer.cid','left');
		// $this->db->join('tbl_sales_items', 'tbl_sales_items.tbl_sales_id = tbl_invoice.sales_id', 'left');
		// $this->db->join('tbl_product', 'tbl_product.i_id = tbl_sales_items.tbl_product_id', 'left');
		
		 //$this->db->group_by('inoivce_id','desc');		
		 $query = $this->db->get('tbl_invoice_payment')->result_array();
		 return $query;
	 }
	  function get_sales_byid($inps)
	 {
		 $this->db->select('tbl_sales.*,tbl_sales.s_no as tid');
		 $this->db->select('tbl_sales_items.*,tbl_sales_items.si_no as no');
		 $this->db->select('tbl_product.i_name');
		 $this->db->select('cb_customer.customer_name');
		
		 $this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
		  $this->db->join('tbl_product','tbl_product.i_id=tbl_sales_items.tbl_product_id','left');
		 $this->db->join('cb_customer','tbl_sales.customer_code=cb_customer.cid','left');
		  $this->db->where('tbl_sales.s_no',$inps['id']);
		 $query = $this->db->get('tbl_sales')->result_array();
		 return $query;
	 }
	 function getList()
	 {
		 $session_data = $this->session->all_userdata();	
		 $this->db->select('tbl_sales.*,tbl_sales.s_no as tid');
		 $this->db->select('tbl_sales_items.*,tbl_sales_items.si_no as no');
		 $this->db->select('tbl_product.i_name');
		 $this->db->select('cb_customer.cid,customer_name,mob_no1');
		/* if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cb_customer.location',$session_data['location']);
			}*/
		 $this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
		 $this->db->join('tbl_product','tbl_product.i_id=tbl_sales_items.tbl_product_id','left');
		 $this->db->join('cb_customer','tbl_sales.customer_code=cb_customer.cid','left');
		 $query = $this->db->get('tbl_sales')->result_array();
		 return $query;
	 }
	
	 function add_sales_payment($post) {
		  extract($_REQUEST);
		  $created_date=date('Y-m-d h:i:s');
		  $array=array('payment_type'=>$payment_type, 'r_no'=>$r_no,  'r_date'=>$r_date, 'r_type'=>$r_type, 'r_amount'=>$r_amount, 'customer_id'=>$customer_id, 'b_code'=>$b_code, 'cheque_no'=>$cheque_no, 'c_date'=>$c_date, 'date'=>$created_date);
		  $this->db->set($array);
	    $this->db->insert('tbl_sales_payment',$array);
		$insert_id = $this->db->insert_id();
		//$itemname one of the varible array
		for($i = 0; $i < count($pmt_amt); $i++) {
			if($pmt_amt[$i] > 0) {
				//'s_id'=>$s_no[$i],
				$array=array('payment_id'=>$insert_id,'s_id'=>$s_no[$i],'bill_no'=>$bill_no[$i],'paid_amount'=>$pmt_amt[$i],'date'=>$created_date);
				$this->db->set($array);
				$this->db->insert('tbl_sales_payment_details',$array);
			}
		}
		  
	  }
//******************************************************************Purchase payment ends here**********************************************************************//
	

}