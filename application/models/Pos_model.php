<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    
	
	 function get_all_datase($data,$conn){
		  $session_data = $this->session->all_userdata();
            $this->db->select($conn)->from($data);
			
			 $query = $this->db->get();		
            return $query->result();			
	 }
	 
	  function get_all_pro($data,$conn){
		  $session_data = $this->session->all_userdata();
            $this->db->select($conn)->from($data);
			/*if($session_data['location'] !=  'Chennai')
		    {
				$this->db->where('tbl_product.storage', $session_data['location']);
			}*/
			$this->db->group_by('i_name','asc');
			 $query = $this->db->get();		
            return $query->result();			
	 }
	 
	 
	 function getinvoiceds($inps){
		 $this->db->select('tbl_purchase_request.*');
		 $this->db->select('tbl_purchase_request_item.id,tbl_purchase_request_item.created_date as cds');
		$this->db->select('tbl_product.i_name,descr');
		 $this->db->select('cb_seller.*');
		 $this->db->select('tbl_statutory.cst as csts,tbl_statutory.vat as vats,tbl_statutory.service_tax as st');
		 $this->db->select('cp_admin_login.*');
		 $this->db->where('tbl_purchase_request_item.id',$inps['id']);
		 $this->db->join('tbl_purchase_request_item','tbl_purchase_request_item.id=tbl_purchase_request.pur_req_id','left');
		 $this->db->join('tbl_product','tbl_product.i_id=tbl_purchase_request.pro_id','left');
	     $this->db->join('cb_seller','cb_seller.cid=tbl_purchase_request.vendor_id','left');
		 $this->db->join('tbl_statutory', 'tbl_statutory.product_type = tbl_purchase_request.pro_type', 'left');
		 $this->db->join('cp_admin_login','cp_admin_login.admin_id = tbl_purchase_request.emp_id', 'left');
        $query = $this->db->get('tbl_purchase_request');	
		return $query->result_array();
		 
	}
	 function get_all_stocks(){
		$this->db->select('tbl_purchase_request.*');
		$this->db->select('tbl_purchase_request_item.id');
		$this->db->select('tbl_product.i_name,descr,i_category');
		 $this->db->select('cb_seller.*');
		 $this->db->select('pro_type.*');
		 $this->db->join('tbl_purchase_request_item','tbl_purchase_request_item.id=tbl_purchase_request.pur_req_id','left');
		 $this->db->join('tbl_product','tbl_product.i_id=tbl_purchase_request.pro_id','left');
	     $this->db->join('cb_seller','cb_seller.cid=tbl_purchase_request.vendor_id','left');
		 $this->db->join('pro_type','pro_type.id=tbl_product.i_category','left');
		$this->db->order_by('tbl_purchase_request.pur_req_id','desc');
        $query = $this->db->get('tbl_purchase_request');	
		return $query->result_array();			
	 }	
	
	 function get_seller_rows1($inps){ 
	    $session_data = $this->session->all_userdata();
		/*$this->db->select('purchase_product.*');
		$this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
		$this->db->where('tbl_purchase_req_id',$inps['cus']);
		$this->db->join('tbl_purchase_request','tbl_purchase_request.id=purchase_product.tbl_purchase_req_id','left');
		$query= $this->db->get('purchase_product')->result_array();*/
		
		
		
		
		//$this->db->select('tbl_purchase_request.*');
		$this->db->select('purchase_product.*,purchase_product.id as ids1,purchase_product.qty as qtys');
		$this->db->where('purchase_product.tbl_product_id',$inps['cus']);
		//$this->db->join('purchase_product','purchase_product.tbl_purchase_req_id=tbl_purchase_request.id','left');
		//$this->db->join('tbl_purchase_request','tbl_purchase_request.id=purchase_product.tbl_purchase_req_id','left');
		$query= $this->db->get('purchase_product')->result_array();
		
		//echo $this->db->last_query();exit;
		return $query;	
	   
		
		/*if($session_data['user_type'] !=  5)
		    {
				$this->db->where('purchase_product.location', $session_data['location']);
			}*/
	}
	 /*function get_all_pro_qty($data,$conn){
		  $session_data = $this->session->all_userdata();
            $this->db->select($conn)->from($data);
			if($session_data['user_type'] !=  5)
		    {
				$this->db->where('purchase_product.location', $session_data['location']);
			}
			 $query = $this->db->get();	
			 //echo $this->db->last_query();	
            return $query->result();			
	 }*/
     function get_all_storage1($data,$conn){
		   $session_data = $this->session->all_userdata();
		  
		   $this->db->select($conn)->from($data);
            $query = $this->db->get();		
            return $query->result();			
	 }
    
	 function get_ajax_single_data($select,$table,$where){	
		echo $this->db->query("Select $select from $table where i_id='$where'")->row()->$select;			
	 }
	/* function jsonSingleDetails($item_id) {
		$this->db->select('*')->from('tbl_item')
         ->where('i_id = '.$item_id); 
		$query = $this->db->get();	
		//return $this->db->last_query();
		return $query->result(); 
	 }*/
	  function jsonSingleDetails($select,$table,$where) {
		$this->db->select($select)->from($table)
         ->where($where); 
		$query = $this->db->get();	
		//return $this->db->last_query();
		return $query->result(); 
	 }
//******************************************************************Purchase entry starts here**********************************************************************//

	 function purchase_invoice($id) {
		$array = array('tbl_po_inv.po_id' => $id);
                /*
		$this->db->select('tbl_po_inv.*, tbl_manufacturer.m_name')->from('tbl_po_inv')
		->join('tbl_manufacturer', 'tbl_manufacturer.m_id = tbl_po_inv.supplier_code', 'left')
         ->where($array); 
                 */
		$this->db->select('tbl_po_inv.*');
       $this->db->select('cb_seller.*');
	   $this->db->join('cb_seller','cb_seller.cid=tbl_po_inv.vname','left');
		$query = $this->db->get('tbl_po_inv');
				//echo $this->db->last_query();exit;
		
		return $query->result();	 
	 }
	 
	   function itemDetails($supplier_id) {
		
		 $this->db->select('i_id, i_name')->from('tbl_product')
		 //->join('tbl_po_inv_item', '`tbl_po_inv`.`po_id` = `tbl_po_inv_item`.`po_inv_id`', 'LEFT')
		// ->join('tbl_product', '`tbl_po_inv_item`.`item_code` = `tbl_product`.`i_id`', 'LEFT')
		 ->where('m_code', $supplier_id);
		 $this->db->group_by('i_id');
		 $query = $this->db->get();
		 $items = array();
		 return $query->result();
		 
	 }
	  function purchase_invoice_item($id) {
		  $this->db->select('tbl_po_inv_item.*');
		  $this->db->select('tbl_product.i_id as ids'); 
		  $this->db->select('tbl_po_inv.taxamount,gtotal'); 
		  $this->db->from('tbl_po_inv_item');
		   $this->db->where('tbl_po_inv_item.po_inv_id',$id);
		  $this->db->join('tbl_product','tbl_product.i_id = tbl_po_inv_item.item_code','left');
		  $this->db->join('tbl_po_inv','tbl_po_inv.po_id = tbl_po_inv_item.po_inv_id','left');
		  $query = $this->db->get();
		 // echo $this->db->last_query();exit;
		  return $query->result();
	 }
    
	function add_purchase_entry($post) {
		//echo '<pre>'; print_r($post);exit;
		$session_data = $this->session->all_userdata();
            extract($_REQUEST);
			 $created_date=date('Y-m-d h:i:s');
			  $array=array(
				'vendor_id'=>$vname,
                'pur_date'=>date('Y-m-d', strtotime($pdate)),
				'total'=>$gtotal,
                'created_date'=>$created_date);
            //echo '<pre>';print_r($array);exit;
            $this->db->insert('tbl_purchase_request_item',$array);
            $insert_id = $this->db->insert_id();
			  for($i = 0; $i < count($payment_method); $i++)
            {
				$array=array('pur_req_id'=>$insert_id,'vendor_id'=>$vname,'emp_id'=>$session_data['user_id'],'pro_id'=>$pname1[$i],'pur_date'=>date('Y-m-d', strtotime($pdate)),'pro_type'=>$payment_method[$i],'qty'=>$qty[$i],'total'=>$stotal,'tax_amt'=>$taxamount,'total_amt'=>$gtotal,'created_date'=>$created_date,'pur_rate'=>$purrate[$i]);
				
				 $this->db->insert('tbl_purchase_request',$array);
			 }
				   
			 return $insert_id;
			
           
        }
		function edit_purchase_entry($post) { 
		//echo '<pre>'; print_r($post);exit;
            extract($_REQUEST);
            $created_date=date('Y-m-d h:i:s');
            $array=array(
				 'pdate'=>$pdate,
				'vname'=>$vname,
				'remarks'=>$remarks,
               'vat'=>$vat,
				//'price'=>$price,
                'gtotal'=>$gtotal,
				'subtotal'=>$stotal,
				'taxamount'=>$taxamount);
				/*'sm_date1'=>date('Y-m-d', strtotime($date1)),
				'sm_date2'=>date('Y-m-d', strtotime($date2)),
				'sm_date3'=>date('Y-m-d', strtotime($date3)),
				'sm_date4'=>date('Y-m-d', strtotime($date4)),
				'warranty_start_date'=>date('Y-m-d', strtotime($maintanance_str_date)),
                'warranty_exp_date'=>date('Y-m-d', strtotime($maintanance_exp_date)),);*/
            $this->db->set($array);
			$this->db->where('vinvno',$post['vinvno']);
            $this->db->update('tbl_po_inv',$array);
			//echo $this->db->last_query(); exit;
            $insert_id = $this->db->insert_id();
           for($i = 0; $i < count($item_name); $i++) {
                $array=array(
				   'item_code'=>$item_name[$i],
                    'p_rate'=>$purrate[$i],
                    //'s_price'=>$selprice[$i],
                    'qty'=>$qty[$i],
                    'total'=>$total[$i],
					'date'=>$created_date,
                    'status'=>1);
               $this->db->where('po_inv_id', $post['po_id']);
                $this->db->update('tbl_po_inv_item',$array);
				//echo $this->db->last_query(); exit;
            }

            return $insert_id;
        }
          
        public function purchase_confirm($id)
	{
            $created_date=date('Y-m-d h:i:s');
            $array=array('confirm'=>1);	
            $this->db->set($array);
            $this->db->where('vinvno',$id);
            $this->db->update('tbl_po_inv',$array);
            
            //update quantity in product master table
            $array = array('tbl_po_inv_item.po_inv_id' => $id);	
            $this->db->select('tbl_po_inv_item.*')->from('tbl_po_inv_item')
            ->join('tbl_product', 'tbl_product.i_id = tbl_po_inv_item.item_code', 'left')
            ->where($array); 
            $query = $this->db->get();		
            $pprods =  $query->result();
            foreach($pprods as $rowp){
                $this->db->select('stock')->from('tbl_product')
                ->where('i_id', $rowp->item_code);
                $query = $this->db->get();
                $prodrow = $query->result();
                $stocks = 0;
                if($prodrow){
                    $stocks = $prodrow[0]->stock;  
                    $stocks += $rowp->qty;
                  
                    $array=array('stock'=>$stocks);	
                    $this->db->set($array);
                    $this->db->where('i_id',$rowp->item_code);
                    $this->db->update('tbl_product',$array);
                   //print_r($stocks);  print '<br>';
                }
            }
                
            return true;
	}
	public function purchase_cancel($id)
	{
		$this->db->where('po_inv_id', $id);
   		$this->db->delete('tbl_po_inv_item');
		$this->db->where('vinvno', $id);
   		$this->db->delete('tbl_po_inv');
		return true;
	}
	public function batchCheck($batch_no)
	{
		$this->db->select('batch_no')->from('tbl_po_inv_item')
		->where('batch_no', $batch_no);
		$query = $this->db->get();		
		$num_rows = $query->num_rows();
		return $num_rows;
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
		 
		 //return $pur_qty -$ret_qty;
		 //return $num_rows;
		/* $where = array('item_code'=>$item_code, 'batch_no'=>$batch_no);

		$this->db->select('qty')->from('tbl_po_inv_item')
		->where($where);
		$query = $this->db->get();		
		return $query->result();	*/	 

	}
	 function getPreviousRates($itemid, $supplier_id) {
		 $where = array('supplier_code'=>$supplier_id, 'item_code'=>$itemid);
		 $this->db->select('p_rate')->from('tbl_po_inv')
		 ->join('tbl_po_inv_item', '`tbl_po_inv`.`po_id` = `tbl_po_inv_item`.`po_inv_id`', 'LEFT')
		->where($where);
		$this->db->order_by('pi_id', 'DESC');
		$this->db->limit('3');
		 $query = $this->db->get();
		 return $query->result();		 
	 }
	
	 
//******************************************************************Purchase entry ends here**********************************************************************//


//******************************************************************Purchase return starts here**********************************************************************//
  
	  
	   function getItems($supplier_id) {
		
		 $this->db->select('i_id, i_name')->from('tbl_po_inv')
		 ->join('tbl_po_inv_item', '`tbl_po_inv`.`po_id` = `tbl_po_inv_item`.`po_inv_id`', 'LEFT')
		 ->join('tbl_product', '`tbl_po_inv_item`.`item_code` = `tbl_product`.`i_id`', 'LEFT')
		 ->where('supplier_code', $supplier_id);
		 $this->db->group_by('i_id');
		 $query = $this->db->get();
		 $items = array();
		 return $query->result();
		 
	 }
	 
	 function getBatch($itemid, $supplier_id) {
		 $where = array('supplier_code'=>$supplier_id, 'item_code'=>$itemid);
		 $this->db->select('batch_no')->from('tbl_po_inv')
		 ->join('tbl_po_inv_item', '`tbl_po_inv`.`po_id` = `tbl_po_inv_item`.`po_inv_id`', 'LEFT')
		 ->where($where);
		 $this->db->group_by('batch_no');
		 $query = $this->db->get();
		 return $query->result();		 
	 }
	 function getDetails($itemid, $supplier_id, $batch_no) {
		 $where = array('supplier_code'=>$supplier_id, 'item_code'=>$itemid, 'batch_no'=>$batch_no);
		 $this->db->select('exp_date, p_rate, p_tax')->from('tbl_po_inv')
		 ->join('tbl_po_inv_item', '`tbl_po_inv`.`po_id` = `tbl_po_inv_item`.`po_inv_id`', 'LEFT')
		 ->where($where);
		 $query = $this->db->get();
		 return $query->result();		 
	 }
	  function add_purchase_return($post) {
		  extract($_REQUEST);
		  $created_date=date('Y-m-d h:i:s');
		  $array=array('supplier_id'=>$supplier_id, 'return_date'=>$return_date, 'tot_amount'=>$gtotal, 'remarks'=>$remarks, 'date'=>$created_date,'status'=>1);
		  $this->db->set($array);
	    $this->db->insert('tbl_purchase_return',$array);
		$insert_id = $this->db->insert_id();
		//$itemname one of the varible array
		for($i = 0; $i < count($item_name); $i++) {
			 $array=array('pu_return_id'=>$insert_id,'item_id'=>$item_name[$i],'batch_no'=>$batch[$i],'exp_date'=>$expiry[$i],'r_type'=>$r_type[$i],'qty'=>$qty[$i],'price'=>$price[$i],'discount'=>$disc[$i],'value'=>$total[$i],'date'=>$created_date,'status'=>1);
		  $this->db->set($array);
	    $this->db->insert('tbl_po_return_item',$array);
		}
		  
	  }
//******************************************************************Purchase return ends here**********************************************************************//
  
//******************************************************************Purchase payment starts here**********************************************************************//
	  
	  
	  function get_pending_amount($supplier_id){
		 $tot_amount = $this->db->query('select sum(tot_amount) as tot_amounts from tbl_po_inv where supplier_code="'.$supplier_id.'"')->row()->tot_amounts;
		 $paid_amount = $this->db->query('select sum(p_amount) as p_amount from tbl_purchase_payment where supplier_id="'.$supplier_id.'"')->row()->p_amount;
		 return $tot_amount-$paid_amount;
	  }
	  
	  function get_invoices($supplier_id) {
		  $query = $this->db->query('SELECT ref_no, invoice_no, invoice_date, ac_date, ac_amount, tbl_po_inv.po_id, sum(paid_amount) as total from tbl_po_inv left join tbl_pp_invoices on tbl_po_inv.po_id = tbl_pp_invoices.po_id  where supplier_code = "'.$supplier_id.'" 
 group by tbl_po_inv.po_id HAVING  total is null OR total < ac_amount');
		return $query->result();
	  }
	
	 function add_purchase_payment($post) {
		  extract($_REQUEST);
		  $created_date=date('Y-m-d h:i:s');
		  $array=array('supplier_id'=>$supplier_id, 'payment'=>$payment,  'p_no'=>$p_no, 'p_date'=>$p_date, 'p_type'=>$p_type, 'p_amount'=>$p_amount, 'b_code'=>$b_code, 'cheque_no'=>$cheque_no, 'c_date'=>$c_date, 'date'=>$created_date);
		  $this->db->set($array);
	    $this->db->insert('tbl_purchase_payment',$array);
		$insert_id = $this->db->insert_id();
		//$itemname one of the varible array
		for($i = 0; $i < count($pmt_amt); $i++) {
			if($pmt_amt[$i] > 0) {
				$array=array('payment_id'=>$insert_id,'po_id'=>$po_id[$i],'inv_no'=>$invoice_no[$i],'paid_amount'=>$pmt_amt[$i],'date'=>$created_date);
				$this->db->set($array);
				$this->db->insert('tbl_pp_invoices',$array);
			}
		}
		  
	  }
//******************************************************************Purchase payment ends here**********************************************************************//

	

}