<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
     function stock_exp_rem(){
     	$this->db->select('*')->from('tbl_stock');
		$this->db->where('tbl_stock.curr_qty >','0');
		$this->db->where('tbl_stock.exp_date !','');
		$data = $this->db->get()->result_array();
		for($i=0;$i<count($data);$i++){
			$from = date_create(date('Y-m-d',strtotime($data[$i]['exp_date'])));
			$to = date_create(date('Y-m-d'));
			$intva = date_diff($from,$to);
			$days = $intva->format('%a'); 
			$arr = array('exp_days'=>$days);
			$up = $this->db->where('tbl_stock.stock_id',$data[$i]['stock_id'])->update('tbl_stock',$arr);
			
		}
		$this->db->select('*')->from('tbl_stock');
		$this->db->where('tbl_stock.curr_qty >',0);
		$this->db->where('tbl_stock.exp_days <',60);
		$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
		$data1 = $this->db->get()->result_array();
		return $data1;
     }
    function open_close_report($inps){
    	$session_data = $this->session->all_userdata();
    	$this->db->select('*')->from('tbl_opening_stock');
    	$this->db->join('tbl_product','tbl_opening_stock.pro_refff_no = tbl_product.i_id','left');
    	if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_opening_stock.opening_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_opening_stock.opening_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_product.i_id =', $inps['cid']);	
		}
    	$data = $this->db->get()->result_array();
    	return $data;
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
		$this->db->order_by('po_id','DESC');
		
		//$this->db->group_by('po_id');
		$query =$this->db->get('tbl_po_inv')->result_array();
		return $query;			
	 }
	 function get_all_po_list(){
	 	$session_data = $this->session->all_userdata();
	 	$this->db->select('po_1_id')->from('tbl_po_1');
	 	$this->db->join('tbl_po_2','tbl_po_2.po_1_ref = tbl_po_1.po_1_id','left');
	 	$this->db->distinct('po_1_id');
	 	$this->db->where('tbl_po_2.need_qty >',0);	
	 	$data1 = $this->db->get()->result_array();
	 	//echo "<pre>";print_r($data1);exit();
	 	if(!empty($data1)){
	 	$this->db->select('*')->from('tbl_po_1');
	 	for($i=0;$i<count($data1);$i++){
	 	$this->db->where_in('tbl_po_1.po_1_id',$data1[$i]);
	 	}
	 	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_1.vendor_ref_id','left');
	 	$data = $this->db->get()->result_array();
	 	//echo "<pre>";print_r($data);exit();
	 	return $data;
	 }else{
	 	return null;
	 }
	 }
	 function get_all_stocks($inps)
	 {
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_inv_item.*');
		$this->db->select('tbl_po_inv.*');
		$this->db->select('tbl_po_1.*');
		$this->db->select('tbl_vendor.*');
		$this->db->select('tbl_product.*');
		$this->db->select('master_location.*');
                $this->db->select('cb_storage.storage_name as storage');
		$this->db->join('tbl_po_inv','tbl_po_inv.po_id=tbl_po_inv_item.po_inv_id','left');
		$this->db->join('tbl_po_1','tbl_po_1.po_1_id=tbl_po_inv.po_no_ref','left');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_inv.vname','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
		$this->db->join('master_location','master_location.id=tbl_product.i_id','left');
                $this->db->join('cb_storage','cb_storage.cid=tbl_po_inv.storage_name','left');
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.podate,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.podate,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_po_inv.vname =', $inps['cid']);	
		}
		
		$this->db->order_by('po_id','DESC');
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
             $this->db->select('*')->from('tbl_stock')->where('tbl_stock.curr_qty >',0);

             $this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');

              if(isset($inps['pro_id']) && $inps['pro_id']!='')
		    {
			    $this->db->where('tbl_product.i_id', $inps['pro_id']);	
		    }
		    $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_stock.vender_refff_id','left');
		    if(isset($inps['vend_id']) && $inps['vend_id']!='')
		    {
			    $this->db->where('tbl_vendor.vendor_id', $inps['vend_id']);	
		    }
            $this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
			$this->db->join('tbl_category','tbl_sub_category.category_ref_id=tbl_category.category_id','left');
			$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
	        $this->db->join('master_location','master_location.id=tbl_product.unit','left');
	       $this->db->join('tbl_po_inv_item','tbl_po_inv_item.batch_no = tbl_stock.batch_num And tbl_po_inv_item.tbl_pro_id = tbl_stock.pro_reff_id','left');

              $query =$this->db->get()->result_array();
             // echo '<pre>';print_r($query);exit();
             return $query;

	 }
	 function getstockdetails_product($inps){
		    $session_data = $this->session->all_userdata();
             $this->db->select('*')->from('tbl_product');
             	if(isset($inps['pro_id']) && $inps['pro_id']!='')
		    {
			    $this->db->where('tbl_product.i_id', $inps['pro_id']);	
		    }       
              $data =$this->db->get()->result_array();
              
              for($i=0;$i<count($data);$i++){
              	$this->db->select('*')->from('tbl_stock')->where('tbl_stock.pro_reff_id',$data[$i]['i_id']);
             $this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
              
		    $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_stock.vender_refff_id','left');
		    
            $this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
			$this->db->join('tbl_category','tbl_sub_category.category_ref_id=tbl_category.category_id','left');
			$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
	        $this->db->join('master_location','master_location.id=tbl_product.unit','left');
	        $this->db->join('tbl_po_inv_item','tbl_po_inv_item.batch_no = tbl_stock.batch_num And tbl_po_inv_item.tbl_pro_id = tbl_stock.pro_reff_id','left');
	       
              $query[] =$this->db->get()->result_array();
             // echo '<pre>';print_r($query);
              }
             // exit();
             return $query;
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
	 function addconsume($inps){
	 	$session_data = $this->session->all_userdata();
		extract($_REQUEST); //Used to get all post stock details
		$created_date=date('Y-m-d');
		for($i=0;$i<count($pname);$i++){
			$array = array(
				'cons_pro_stock_id'=>$pname[$i],
				'cons_manu_name'=>$manu_name[$i],
				'cons_hsn_id'=>$hsn_id[$i],
				'cons_qty'=>$qty[$i],
				'cons_rate'=>$purrate[$i],
				'cons_total'=>$total[$i],
				'cons_remark'=>$remark[$i],
				'cons_date'=>$created_date
			);
			$data = $this->db->insert('tbl_consume',$array);
			$data = $this->db->select('*')->from('tbl_stock')->where('stock_id',$pname[$i])->get()->result_array(); 
			 
			$array1 = array(
			'curr_qty'=>$data[0]['curr_qty']-$qty[$i],
		);
			$this->db->where('stock_id',$pname[$i]);
		$data1 = $this->db->update('tbl_stock',$array1);

		$this->db->select('*')->from('tbl_stock')->where('tbl_stock.stock_id',$pname[$i]);
	 	$data2 = $this->db->get()->result_array();
	 	
	 	$get_mrp = $this->db->select('*')->from('tbl_stock')->where('stock_id',$pname[$i])->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left')->join('tbl_po_inv_item','tbl_po_inv_item.tbl_pro_id=tbl_stock.pro_reff_id And tbl_po_inv_item.batch_no=tbl_stock.batch_num','left')->get()->result_array();

	 	$openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.opening_date',$created_date)->where('tbl_opening_stock.pro_refff_no',$data[0]['pro_reff_id'])->get()->result_array();

	 	if(!empty($get_mrp)){
	 		$resqty = $openqty[0]['consumed_stock']+$qty[$i];
	 		$resqty1 = $openqty[0]['consumed_stock_value']+$total[$i];
	 		$resqty2 = ($openqty[0]['clossing_stock_value']+(($qty[$i])*($get_mrp[0]['total']/$get_mrp[0]['qty'])));
	 		$resarr = array('consumed_stock'=>$resqty,'consumed_stock_value'=>$resqty1,'clossing_stock_value',$resqty2);
	 		$this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$resarr);
	 	}else{
	 		$resqty = $openqty[0]['consumed_stock']+$qty[$i];
	 		$resqty1 = $openqty[0]['consumed_stock_value']+$total[$i];
	 		
	 		$resarr = array('consumed_stock'=>$resqty,'consumed_stock_value'=>$resqty1,);
	 		$this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$resarr);
	 	}
		
		}
		return $data1;
	 }
	 function update_stock_adj($inps){
	 	$session_data = $this->session->all_userdata();
		extract($_REQUEST); //Used to get all post stock details
		$created_date=date('Y-m-d');
		$data = $this->db->select('*')->from('tbl_stock')->where('stock_id',$id)->get()->result_array();
		$qty_count = $qty-$data[0]['curr_qty'];
		$free_qty_count = $qty_free-$data[0]['curr_free_qty'];
		$array=array(
			'adj_qty'=>$qty,
			'adj_free_qty'=>$qty_free,
			'adj_qty_count'=>$qty_count,
			'adj_free_qty_count'=>$free_qty_count,
			'adj_qty_pre'=>$data[0]['curr_qty'],
			'adj_free_qty_pre'=>$data[0]['curr_free_qty'],
			'adj_remark'=>$remark,
			'adj_stock_id'=>$id,
			'adj_data'=>$created_date
		);
		$this->db->insert('tbl_stock_adj',$array);
		$array1 = array(
			'curr_qty'=>$qty,
			'curr_free_qty'=>$qty_free
		);
		$this->db->where('stock_id',$id);
		$data1 = $this->db->update('tbl_stock',$array1);
		$get_mrp = $this->db->select('*')->from('tbl_stock')->where('stock_id',$id)->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left')->join('tbl_po_inv_item','tbl_po_inv_item.tbl_pro_id=tbl_stock.pro_reff_id And tbl_po_inv_item.batch_no=tbl_stock.batch_num','left')->get()->result_array();

	 	$openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.opening_date',$created_date)->where('tbl_opening_stock.pro_refff_no',$data[0]['pro_reff_id'])->get()->result_array();
	 	if(!empty($get_mrp)){
	 		$resqty = $openqty[0]['adjusted_stock']+($qty_count+$free_qty_count);
	 		$resqty1 = ($openqty[0]['adjusted_stock_value']+(($qty_count+$free_qty_count)*($get_mrp[0]['total']/$get_mrp[0]['qty'])));
	 		$resqty2 = ($openqty[0]['clossing_stock_value']+(($qty_count+$free_qty_count)*($get_mrp[0]['total']/$get_mrp[0]['qty'])));
	 		$resarr = array('adjusted_stock'=>$resqty,'adjusted_stock_value'=>$resqty1,'clossing_stock_value'=>$resqty2);
	 		$this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$resarr);
	 	}else{
	 		$resqty = $openqty[0]['adjusted_stock']+($qty_count+$free_qty_count);
	 		$resqty1 = ($openqty[0]['adjusted_stock_value']+(($qty_count+$free_qty_count)*($get_mrp[0]['total']/$get_mrp[0]['qty'])));
	 		
	 		$resarr = array('adjusted_stock'=>$resqty,'adjusted_stock_value'=>$resqty1,);
	 		$this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$resarr);
	 	}
	 		

	 	return $data1;
	 }
	 function get_all_product_data(){
	 	$data = $this->db->select('*')->from('tbl_product')->get()->result_array();
	 	return $data;
	 }
	 function get_all_vendor_data(){
	 	$data = $this->db->select('*')->from('tbl_vendor')->get()->result_array();
	 	return $data;
	 }
	 function add_free_product_stock($inps){
	 	extract($_REQUEST);
	 	//echo "<pre>";print_r($inps);exit();
	 	$created_date = date('Y-m-d');
	    $session_data = $this->session->all_userdata();
	    for($i = 0; $i < count($item_name1); $i++)
			   {	
	 	$proarray1 = array(
				  			'vender_refff_id'  =>$vendor[$i],
							'pro_reff_id'  =>$item_name1[$i],
							'batch_num'  =>$batch[$i],
							'curr_qty'  =>$qty[$i],
							'exp_date'  =>$exp_date[$i],
							'curr_free_qty'  =>$free[$i],
							 );
	 	//print_r($proarray1);
	 	$data = $this->db->insert('tbl_stock',$proarray1);

	 	$openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.opening_date',$created_date)->where('tbl_opening_stock.pro_refff_no',$item_name1[$i])->get()->result_array();
		$resqty = $openqty[0]['recived_stock']+$qty[$i]+$free[$i];
		$resarray = array('recived_stock'=>$resqty);
		$this->db->where('tbl_opening_stock.opening_date',$created_date)->where('tbl_opening_stock.pro_refff_no',$item_name1[$i])->update('tbl_opening_stock',$resarray);
	 	}
	 	//exit();
	 	return $data;
	 }
	 	}
	
	 
	 

