<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	 function get_stocks($id){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_inv.*');
		$this->db->select('tbl_po_inv_item.*');
		$this->db->select('cb_seller.seller_name');
		$this->db->select('tbl_product.i_name,i_id');
		
		$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_po_inv.vname','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
		if(isset($id) && !empty($id))
		{
			$this->db->where('tbl_po_inv.po_id =', $id);
		}
		//$this->db->order_by('po_id','asc');
		//$this->db->group_by('po_id');
		$query =$this->db->get('tbl_po_inv')->result_array();
		return $query;			
	 }
	 function get_all_stocks()
	 {
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_inv_item.*');
		$this->db->select('tbl_po_inv.*');
		$this->db->select('tbl_po_1.*');
		$this->db->select('tbl_vendor.*');
		$this->db->select('tbl_product.*');
		$this->db->select('master_location.*');
		$this->db->join('tbl_po_inv','tbl_po_inv.po_id=tbl_po_inv_item.po_inv_id','left');
		$this->db->join('tbl_po_1','tbl_po_1.po_1_id=tbl_po_inv.po_no_ref','left');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_inv.vname','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
		$this->db->join('master_location','master_location.id=tbl_po_inv_item.tbl_unit_id','left');
		
		
		
		$query =$this->db->get('tbl_po_inv_item')->result_array();
			//echo $this->db->last_query(); //exit;
		return $query;			
	 }
	  function get_stocks_drop(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*')->from('tbl_po_inv');
		//$this->db->where('is_delete =', 0);
		$this->db->where('status =', 1);
        $query = $this->db->get();	
		return $query->result();			
	 } 
	 function getstockdetails($inps){
		    $session_data = $this->session->all_userdata();
             $this->db->select('tbl_po_inv_item.*');
             $this->db->select('master_location.*');
             $this->db->select('tbl_po_inv.*');
             $this->db->select('tbl_vendor.*');
             $this->db->select('tbl_product.*');
             if(isset($inps['pname']) && $inps['pname']!='')
		    {
			    $this->db->where('tbl_product.i_name', $inps['pname']);	
		    }
             $this->db->join('master_location','master_location.id = tbl_po_inv_item.tbl_unit_id','left');
             $this->db->join('tbl_po_inv','tbl_po_inv.po_id = tbl_po_inv_item.po_inv_id','left');
             $this->db->join('tbl_vendor','tbl_vendor.vendor_id = tbl_po_inv.vname','left');
             $this->db->join('tbl_product','tbl_product.i_id = tbl_po_inv_item.tbl_pro_id','left');
           //$this->db->order_by('tbl_po_inv.po_id','desc');
             $query = $this->db->get('tbl_po_inv_item');
             return $query->result_array();









			/*$this->db->select('purchase_product.*');
			$this->db->select('tbl_product.*');
			if(isset($inps['pname']) && $inps['pname']!='')
		    {
			    $this->db->where('tbl_product.i_name', $inps['pname']);	
		    }
			$this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		     $this->db->order_by('purchase_product.id','desc');
			$query = $this->db->get('purchase_product');	
			return $query->result_array();*/
	 }
	 function get_pro_det1($inps){ 
	    $session_data = $this->session->all_userdata();
		$this->db->select('purchase_product.*');
		$this->db->select('tbl_product.*');
		$this->db->select('cp_admin_login.*');
		$this->db->where('purchase_product.tbl_product_id=',$inps['cus']);
		$this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
		$this->db->join('cp_admin_login','cp_admin_login.admin_id = purchase_product.emp_id','left');
	   $query= $this->db->get('purchase_product')->result_array();
	//echo '<pre>';print_r($query);exit;
		return $query;	
	  
	}
	 function getpro(){
		    $session_data = $this->session->all_userdata();
			$this->db->select('purchase_product.*,purchase_product.qty as qtys,tbl_product.i_id,tbl_product.i_name,i_category');
			if($session_data['location'] !=  '')
		    {
				$this->db->where('purchase_product.location !=', $session_data['location']);
			}
			$this->db->where('purchase_product.qty !=', 0);
			$this->db->join('tbl_product','tbl_product.i_id = purchase_product.tbl_product_id','left');
			
			
			
		/*if(isset($inps['pname1']) && $inps['pname1']!='')
		{
			$this->db->where('product_total_allocation.tbl_product_id', $inps['pname1']);	
		}*/
			$query = $this->db->get('purchase_product');	
			return $query->result_array();
	 }
	  function getstockdetails1($inps){
		    $session_data = $this->session->all_userdata();
			$this->db->select('purchase_request_product.*,purchase_request_product.status as st1');
			$this->db->select('cp_admin_login.*');
			$this->db->select('tbl_product.*');
			$this->db->select('pro_type.*');
			//$this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
			
			//$this->db->where('purchase_product.req_emp_location', $session_data['location']);
			/*if($session_data['location'] !=  'Chennai')
			{
			$this->db->where('purchase_request_product.req_emp_location', $session_data['location']);
	  		}*/
			
			$this->db->where('purchase_request_product.req_emp_location', $session_data['location']);
			$this->db->join('cp_admin_login','cp_admin_login.admin_id = purchase_request_product.emp_id','left');
			//$this->db->join('tbl_purchase_request','tbl_purchase_request.id=purchase_request_product.tbl_purchase_req_id','left');
			$this->db->join('tbl_product','tbl_product.i_id = purchase_request_product.tbl_product_id','left');
			$this->db->join('pro_type','pro_type.id=tbl_product.i_category','left');
			
			
		/*if(isset($inps['pname1']) && $inps['pname1']!='')
		{
			$this->db->where('product_total_allocation.tbl_product_id', $inps['pname1']);	
		}*/
			$query = $this->db->get('purchase_request_product');	
			return $query->result_array();
	 }
	 function get_pro_request(){
		$session_data = $this->session->all_userdata();
			$this->db->select('purchase_request_product.*,purchase_request_product.status as st1');
			$this->db->select('cp_admin_login.*');
			$this->db->select('tbl_product.*');
			$this->db->select('pro_type.*');
			//$this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
			
			//$this->db->where('purchase_product.req_emp_location', $session_data['location']);
			/*if($session_data['location'] !=  'Chennai')
			{
			$this->db->where('purchase_request_product.req_emp_location', $session_data['location']);
	  		}*/
			$this->db->where('purchase_request_product.req_product_location', $session_data['location']);
			$this->db->join('cp_admin_login','cp_admin_login.admin_id = purchase_request_product.emp_id','left');
			//$this->db->join('tbl_purchase_request','tbl_purchase_request.id=purchase_request_product.tbl_purchase_req_id','left');
			$this->db->join('tbl_product','tbl_product.i_id = purchase_request_product.tbl_product_id','left');
			$this->db->join('pro_type','pro_type.id=tbl_product.i_category','left');
			
			
		/*if(isset($inps['pname1']) && $inps['pname1']!='')
		{
			$this->db->where('product_total_allocation.tbl_product_id', $inps['pname1']);	
		}*/
			$query = $this->db->get('purchase_request_product');	
			return $query->result_array();			
	 } 
	 	 
	  function get_rows_stock(){
		$this->db->select('i_id')->from('tbl_po_inv')->order_by('i_id','DESC')->limit('1');
        $query = $this->db->get();		
		return $query->result();			
		// $this->db->insert_id();
	 }
	 
	 function add_stock($post) {
		
		$session_data = $this->session->all_userdata();
		extract($_REQUEST); //Used to get all post stock details
		$created_date=date('Y-m-d h:i:s');
		$array=array('i_category'=>$i_category,'i_name'=>strtoupper($i_name),'i_code'=>strtoupper($i_code),'m_code'=>strtoupper($m_code),'fixed_rate'=>$fixed_rate,'m_date'=>$m_date,'packing'=>strtoupper($packing),'exp_date'=>$exp_date,'s_price'=>$s_price,'p_rate'=>$p_rate,'p_tax'=>$p_tax,'offer'=>strtoupper($offer),'combination'=>strtoupper($combination),'min_qty'=>$min_qty,'max_qty'=>$max_qty,/*'batch_no'=>strtoupper($batch_no),*/'mrp'=>$mrp,'s_tax'=>$s_tax,'date'=>$created_date,'status'=>1);	
	    $this->db->set($array);
	    $this->db->insert('tbl_po_inv',$array);
	}
	
	
 
	function view_stock($id){
		print_r($id); exit;
		$this->db->select('tbl_po_inv.*, tbl_packing.pk_type, `tbl_tax`.percentage AS percentage, tbl_tax_1`.percentage AS percentage1, tbl_category.ct_name, tbl_manufacturer.m_name');
		$this->db->from('tbl_po_inv');
		$this->db->join('tbl_packing', 'tbl_packing.pk_id = tbl_po_inv.packing', 'left');
		$this->db->join('tbl_tax as tbl_tax', 'tbl_tax.t_id = tbl_po_inv.p_tax', 'left');
		$this->db->join('tbl_tax as tbl_tax_1' , 'tbl_tax_1.t_id = tbl_po_inv.s_tax', 'left');
		$this->db->join('tbl_category', 'tbl_category.ct_id = tbl_po_inv.i_category', 'left');
		$this->db->join('tbl_manufacturer', 'tbl_manufacturer.m_id = tbl_po_inv.m_code', 'left');
		$this->db->where('i_id =', $id);
		
		//echo $this->db->last_query();
		//$this->output->enable_profiler(TRUE);
		$query = $this->db->get();	
		return $query->result();			
	}
	
	
	function edit_stock($id){			
		$this->db->select('*')->from('tbl_po_inv')
		->where('i_id =', $id); 
		$query = $this->db->get();	
		$this->db->last_query();
		return $query->result();			
	}
	
	
	function update_stock($id) {
		
		$session_data = $this->session->all_userdata();
		extract($_REQUEST); //Used to get all post stock details
		$created_date=date('Y-m-d h:i:s');
		$array=array('i_category'=>$i_category,'i_name'=>strtoupper($i_name),'i_code'=>strtoupper($i_code),'m_code'=>strtoupper($m_code),'fixed_rate'=>$fixed_rate,'m_date'=>$m_date,'packing'=>strtoupper($packing),'exp_date'=>$exp_date,'s_price'=>$s_price,'p_rate'=>$p_rate,'p_tax'=>$p_tax,'offer'=>strtoupper($offer),'combination'=>strtoupper($combination),'min_qty'=>$min_qty,'max_qty'=>$max_qty,/*'batch_no'=>strtoupper($batch_no),*/'mrp'=>$mrp,'s_tax'=>$s_tax,'date'=>$created_date,'status'=>1);	
		$this->db->set($array);
	    $this->db->where('i_id',$id);
		$this->db->update('tbl_po_inv',$array);
	}
	
	
	public function delete_stock($id)
	{
		$array=array('is_delete'=>1);	
		$this->db->where('vinvno', $id);
		$this->db->update('tbl_po_inv', $array);
		$array=array('is_delete'=>1);	
		$this->db->where('po_inv_id', $id);
		$this->db->update('tbl_po_inv_item', $array);
		return true;
	}
	
	 function statuschange($post) {
		$session_data = $this->session->all_userdata();
		extract($_REQUEST); //Used to get all post stock details
		$created_date=date('Y-m-d h:i:s');
		$array=array('date'=>$created_date,'status'=>$st);	
		$this->db->set($array);
	    $this->db->where('i_id',$id);
		$this->db->update('tbl_po_inv',$array);	 
		echo $st;
	 }
	 function get_all_sell($id)
	 {
		 $this->db->select('tbl_item_sel_price.*,tbl_item_sel_price.post_dt as checked_dt');
		 $this->db->select('cb_storage.storage_name,Location');
		 $this->db->select('cb_seller.seller_name');
		 $this->db->select('tbl_po_inv.vname,tbl_po_inv.created_date as purdate,customer');
		$this->db->select('tbl_po_inv_item.pi_id,tbl_po_inv_item.item_code,tbl_po_inv_item.p_rate,tbl_po_inv_item.p_tax,tbl_po_inv_item.s_price,tbl_po_inv_item.s_tax,tbl_po_inv_item.qty,tbl_po_inv_item.total,tbl_po_inv_item.po_inv_id');
		$this->db->select('tbl_product.i_name,descr');
		$this->db->join('tbl_po_inv_item','tbl_po_inv_item.pi_id=tbl_item_sel_price.product_id','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.item_code','left');
		$this->db->join('cb_storage','cb_storage.cid=tbl_po_inv_item.slocation','left');
		$this->db->join('tbl_po_inv','tbl_po_inv_item.po_inv_id=tbl_po_inv.vinvno','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_po_inv.vname','left');
		$this->db->where('tbl_item_sel_price.product_id',$id); 
		$query =$this->db->get('tbl_item_sel_price')->result_array();
		//echo $this->db->last_query(); exit;
		return $query;	
	 }
	 function get_all_sell_out($id)
	 {
		 $this->db->select('tbl_item_sel_price.*');
		 $this->db->select('cb_storage.storage_name,Location');
		 $this->db->select('cb_seller.seller_name');
		 $this->db->select('tbl_foc_dam.foc_dam_qty,tbl_foc_dam.foc_out_name,tbl_foc_dam.foc_dam_sts');
		 $this->db->select('tbl_po_inv.vname,tbl_po_inv.created_date as purdate,customer');
		$this->db->select('tbl_po_inv_item.pi_id,tbl_po_inv_item.item_code,tbl_po_inv_item.p_rate,tbl_po_inv_item.p_tax,tbl_po_inv_item.s_price,tbl_po_inv_item.s_tax,tbl_po_inv_item.qty,tbl_po_inv_item.total,tbl_po_inv_item.po_inv_id');
		$this->db->select('tbl_product.i_name,descr');
		$this->db->join('tbl_po_inv_item','tbl_po_inv_item.pi_id=tbl_item_sel_price.product_id','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.item_code','left');
		$this->db->join('cb_storage','cb_storage.cid=tbl_po_inv_item.slocation','left');
		$this->db->join('tbl_po_inv','tbl_po_inv_item.po_inv_id=tbl_po_inv.vinvno','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_po_inv.vname','left');
		$this->db->join('tbl_foc_dam','tbl_foc_dam.inv_item_id=tbl_po_inv_item.pi_id','left');
		$this->db->where('tbl_foc_dam.inv_item_id',$id); 
		$query =$this->db->get('tbl_item_sel_price')->result_array();
		//echo $this->db->last_query(); exit;
		return $query;	
	 }
	//azf function started here
	function get_payment_details($id){
		$data = $this->db->select('*')->from('tbl_po_inv')->where('tbl_po_inv.po_id',$id)->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_inv.vname','left')->get()->result_array();
		return $data;
	}
	function get_goods_return_payment_details($id){
		$data = $this->db->select('*')->from('tbl_goods_return_confirm_data')->where('tbl_goods_return_confirm_data.goods_return_confirm_data_id',$id)->join('tbl_vendor','tbl_vendor.vendor_id=tbl_goods_return_confirm_data.confirm_return_vend_id','left')->get()->result_array();
		return $data;
	}
	function get_sales_payment_details($id){
		$data = $this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$id)->join('tbl_customer','tbl_customer.customer_id=tbl_sales.customer_code','left')->get()->result_array();
		return $data;
	}
	function get_sales_payment_details_ret($id){
		$data = $this->db->select('*')->from('tbl_sales_return_add')->where('tbl_sales_return_add.sales_return_add_id',$id)->join('tbl_customer','tbl_customer.customer_id=tbl_sales_return_add.return_cus_id','left')->get()->result_array();
		return $data;
	}
	function payment_details_add($post) {
		//echo '<pre>'; print_r($post);//exit;
            extract($_REQUEST);
			 $session_data = $this->session->all_userdata();	
            $created_date=date('Y-m-d h:i:s');
            $get_amt = $this->db->select('*')->from('tbl_po_inv')->where('tbl_po_inv.po_id',$po_ref_id)->get()->result_array();
            	$array=array(
            	'po_ref_id'=>$po_ref_id,
				'invoice_ref'=>$invoice_no,
				'vend_name_ref'=>$cus_name,
                'invoice_amt_ref'=>$invoice_amt,
                'pending_pay_ref'=>$pending_amt,
				'paid_pay_ref'=>$paid_amt,
				'curr_paid'=>$coll_amt,
			    'curr_pending'=>$bal_amt,
                'pay_type'=>$purchase_mode,
                'ref_no'=>$ref_number,
                'pay_date'=>date('d-m-Y'));
                $less = $get_amt[0]['paid_amt']+$coll_amt;
         
           
            $array_upadte = array('paid_amt'=>$less,'pending_amt'=>$bal_amt);
            $this->db->insert('tbl_debit',$array);
            $insert_id = $this->db->insert_id();
            $this->db->where('tbl_po_inv.po_id',$po_ref_id)->update('tbl_po_inv',$array_upadte);    
            return $insert_id;
        } 
        function sales_payment_details_add($post) {
		//echo '<pre>'; print_r($post);//exit;
            extract($_REQUEST);
			 $session_data = $this->session->all_userdata();	
            $created_date=date('Y-m-d h:i:s');
            $get_amt = $this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$po_ref_id)->get()->result_array();
           
            	$array=array(
            	'sales_ref_id'=>$po_ref_id,
				'sales_invoice_ref'=>$invoice_no,
				'cus_id_ref'=>$cus_name,
                'invoice_amt_ref'=>$invoice_amt,
                'pending_pay_ref'=>$pending_amt,
				'paid_pay_ref'=>$paid_amt,
				'curr_paid'=>$coll_amt,
			    'curr_pending'=>$bal_amt,
                'pay_type'=>$purchase_mode,
                'ref_no'=>$ref_number,
                'pay_date'=>date('Y-m-d'));
                $less = $get_amt[0]['paid_amt']+$coll_amt;
          
           
            $array_upadte = array('paid_amt'=>$less,'pending_amt'=>$bal_amt);
            $this->db->insert('tbl_credit',$array);
            $insert_id = $this->db->insert_id();
            $this->db->where('tbl_sales.s_no',$po_ref_id)->update('tbl_sales',$array_upadte);    
            return $insert_id;
        } 
             function sales_payment_return_details_add($post) {
		//echo '<pre>'; print_r($post);exit;
            extract($_REQUEST);
			 $session_data = $this->session->all_userdata();	
            $created_date=date('Y-m-d h:i:s');
            $get_amt = $this->db->select('*')->from('tbl_goods_return_confirm_data')->where('tbl_goods_return_confirm_data.goods_return_confirm_data_id',$po_ref_id)->get()->result_array();
           
            	$array=array(
            	'goods_return_ref_id'=>$po_ref_id,
				'goods_return_invoice_ref'=>$invoice_no,
				'goods_return_vendor_id_ref'=>$vendor_id,
				'goods_return_vend_name_ref'=>$vend_name,
                'goods_return_invoice_amt_ref'=>$invoice_amt,
                'goods_return_pending_pay_ref'=>$pending_amt,
				'goods_return_paid_pay_ref'=>$paid_amt,
				'goods_return_curr_paid'=>$coll_amt,
			    'goods_return_curr_pending'=>$bal_amt,
                'goods_return_pay_type'=>$purchase_mode,
                'goods_return_ref_no'=>$ref_number,
                'goods_return_pay_date'=>date('Y-m-d'));

                $less = $get_amt[0]['confirm_return_paid']+$coll_amt;
            
           
            $array_upadte = array('confirm_return_paid'=>$less,'confirm_return_pending'=>$bal_amt);
            $this->db->insert('tbl_credit_return',$array);
            $insert_id = $this->db->insert_id();
            $this->db->where('tbl_goods_return_confirm_data.goods_return_confirm_data_id',$po_ref_id)->update('tbl_goods_return_confirm_data',$array_upadte);    
            return $insert_id;
        } 
         function sales_return_details_add_payment($post) {
		//echo '<pre>'; print_r($post);exit;
            extract($_REQUEST);
			 $session_data = $this->session->all_userdata();	
            $created_date=date('Y-m-d h:i:s');
            $get_amt = $this->db->select('*')->from('tbl_sales_return_add')->where('tbl_sales_return_add.sales_return_add_id',$po_ref_id)->get()->result_array();
           
            	$array=array(
            	'sales_return_ref_id'=>$po_ref_id,
				'sales_return_invoice_ref'=>$invoice_no,
				'sales_return_cus_id_ref'=>$cus_id,
				'sales_return_cus_name_ref'=>$cus_name,
                'sales_return_invoice_amt_ref'=>$invoice_amt,
                'sales_return_pending_pay_ref'=>$pending_amt,
				'sales_return_paid_pay_ref'=>$paid_amt,
				'sales_return_curr_paid'=>$coll_amt,
			    'sales_return_curr_pending'=>$bal_amt,
                'sales_return_pay_type'=>$purchase_mode,
                'sales_return_ref_no'=>$ref_number,
                'sales_return_pay_date'=>date('Y-m-d'));
                $less = $get_amt[0]['return_paid_amount']+$coll_amt;
         
           
            $array_upadte = array('return_paid_amount'=>$less,'return_pending_amount'=>$bal_amt);
            $this->db->insert('tbl_debit_return',$array);
            $insert_id = $this->db->insert_id();
            $this->db->where('tbl_sales_return_add.sales_return_add_id',$po_ref_id)->update('tbl_sales_return_add',$array_upadte);    
            return $insert_id;
        } 
        function get_payment_list($inps){
        	$this->db->select('*')->from('tbl_debit');
        	if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_debit.pay_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_debit.pay_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['invoice']) && $inps['invoice']!='')
		{
			$this->db->where('tbl_debit.invoice_ref =', $inps['invoice']);	
		}
		if(isset($inps['cus_name']) && $inps['cus_name']!='')
	    {
			$this->db->where('tbl_debit.vend_name_ref =', $inps['cus_name']);	
		}
		if(isset($inps['pay_type']) && $inps['pay_type']!='')
	    {
			$this->db->where('tbl_debit.pay_type =', $inps['pay_type']);	
		}
        	$data = $this->db->get()->result_array();
        	return $data;
        }
        function sales_get_payment_list($inps){
        	$this->db->select('*')->from('tbl_credit');
        	if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_credit.pay_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_credit.pay_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['bill_no']) && $inps['bill_no']!='')
		{
			$this->db->where('tbl_credit.sales_invoice_ref =', $inps['bill_no']);	
		}
		if(isset($inps['cus_name']) && $inps['cus_name']!='')
	    {
			$this->db->where('tbl_credit.cus_id_ref =', $inps['cus_name']);	
		}
		if(isset($inps['paid']) && $inps['paid']!='')
	    {
			$this->db->where('tbl_credit.pay_type =', $inps['paid']);	
		}
        	$data = $this->db->get()->result_array();
        	return $data;
        }
	 

}