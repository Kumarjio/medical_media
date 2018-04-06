<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
     function get_all_vendor(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('vendor_ref_id,vendor_name')->from('tbl_po_1')->distinct('vendor_ref_id');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_1.vendor_ref_id','left');
		$query = $this->db->get()->result_array();
		//print_r("<pre>");print_r($query);	
		return $query;			
	 }
	 function get_all_storage(){
	 	$session_data = $this->session->all_userdata();	
		$this->db->select('cb_storage.*');
		$query = $this->db->get('cb_storage');	
		return $query->result_array();
	 }
	  function get_all_po(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_1.*')->where('tbl_po_1.status',0);
		$query = $this->db->get('tbl_po_1');	
		return $query->result_array();			
	 }
	  function get_all_product(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_product.*');
		$query = $this->db->get('tbl_product');	
		return $query->result_array();			
	 }
	  function get_correspond_details($details){
	  	$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_1.*');
		$this->db->select('tbl_po_2.*');
		$this->db->select('tbl_product.*');
		$this->db->select('tbl_order_arrange_vend.*');
		$this->db->select('tbl_vendor.*');
		$this->db->select('master_location.*');
		$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_1.vendor_ref_id','left');
		$this->db->join('tbl_po_2','tbl_po_2.po_1_ref=tbl_po_1.po_1_id','left');
		$this->db->where('tbl_po_2.need_qty > 0');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_po_2.pro_ref_id','left');
		$this->db->join('master_location','master_location.id=tbl_product.unit','left');
		$this->db->join('tbl_order_arrange_vend','tbl_po_1.order_id=tbl_order_arrange_vend.order_arrange_vend_id','left');
		$this->db->where_in('po_1_id',$details);

		$query = $this->db->get('tbl_po_1');	
		return $query->result_array();	

		
	  	/*$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_2.*');
		$this->db->select('tbl_po_1.*');
		$this->db->join('tbl_po_1','tbl_po_1.po_1_id = tbl_po_2.po_1_ref','left');
		$this->db->where('po_1_id',$details);
		$query =$this->db->get('tbl_po_1')->result_array();
		return $query;	*/
    }
    
	 function get_all_data($data,$conn){
		  $session_data = $this->session->all_userdata();
            $this->db->select($conn)->from($data);
			
			 $query = $this->db->get();		
            return $query->result();			
	 }
	 function get_all_data_grn($id){
		  $session_data = $this->session->all_userdata();
          $this->db->select('*')->from('tbl_po_inv')->where('po_id',$id);
          $this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id = tbl_po_inv.po_id','left');
          $this->db->join('cb_storage','cb_storage.cid = tbl_po_inv.storage_name','left');
          $this->db->join('tbl_vendor','tbl_vendor.vendor_id = tbl_po_inv.vname','left');
          $this->db->join('tbl_product','tbl_product.i_id = tbl_po_inv_item.tbl_pro_id','left');
          $this->db->join('tbl_hsn','tbl_hsn.hsn_id = tbl_product.hsn','left');
          $this->db->join('master_location','master_location.id = tbl_product.unit','left');
          $this->db->join('tbl_po_1','tbl_po_1.order_id = tbl_po_inv_item.order_po_item_ref_id','left');
          $data = $this->db->get()->result_array();
          return $data;		
	 }
	 function cancel_grn($id){
	 	$created_date = date('Y-m-d');
	 	$this->db->select('*')->from('tbl_po_inv')->where('po_id',$id);
	 	$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id = tbl_po_inv.po_id','left');
	 	$data = $this->db->get()->result_array();
	 	for($i=0;$i<count($data);$i++){
	 		$openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.opening_date',$created_date)->where('tbl_opening_stock.pro_refff_no',$data[$i]['tbl_pro_id'])->get()->result_array();

	 		$resqty = $openqty[0]['recived_stock']-$data[$i]['qty']-$data[$i]['free_pro'];
	 		$resqty1 = $openqty[0]['recived_stock_value']-$data[$i]['total'];
			$resqty2 = $openqty[0]['clossing_stock_value']-$data[$i]['total'];
	 		$resarr = array('recived_stock'=>$resqty,'recived_stock_value'=>$resqty1,'clossing_stock_value'=>$resqty2);
	 		$this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$resarr);

	 		$this->db->select('*')->from('tbl_stock')->where('tbl_stock.vender_refff_id',$data[$i]['vname']);
	 		$this->db->where('tbl_stock.pro_reff_id',$data[$i]['tbl_pro_id']);
	 		$this->db->where('tbl_stock.batch_num',$data[$i]['batch_no']);
	 		$data1 = $this->db->get()->result_array();
	 			for ($j=0; $j < count($data1) ; $j++) { 
	 				if($data[$i]['include_item'] == 1){
	 			$arrr = array(
	 					'curr_qty'=> $data1[$j]['curr_qty']-$data[$i]['qty']-$data[$i]['free_pro'],
	 				);
	 		}else{
	 			$arrr = array(
	 					'curr_qty'=> $data1[$j]['curr_qty']-$data[$i]['qty'],
	 					'curr_free_qty'=>$data1[$j]['curr_free_qty']-$data[$i]['free_pro'],
	 				);

	 			}
	 			$this->db->where('stock_id',$data1[$j]['stock_id']);
	 			$this->db->update('tbl_stock',$arrr);
	 		//print_r($arrr);
	 		}
	 		
	 		

	 	}
	 	
	 	$this->db->where('tbl_po_inv.po_id',$id)->delete('tbl_po_inv');
	 	$this->db->where('tbl_po_inv_item.po_inv_id',$id)->delete('tbl_po_inv_item');
	 	//exit();
	 	return $data;
	 	
	 }
	 function get_all_unit($data,$conn){
		  $session_data = $this->session->all_userdata();
            $this->db->select($conn)->from($data);
			
			 $query = $this->db->get();		
            return $query->result();			
	 }
	 function get_all_datase($data,$conn){
		  $session_data = $this->session->all_userdata();
            $this->db->select($conn)->from($data);
			
			 $query = $this->db->get();		
            return $query->result();			
	 }
	 	
	 function get_vat($data,$conn){
		  $session_data = $this->session->all_userdata();
            $this->db->select($conn)->from($data);
			
			 $query = $this->db->get();		
            return $query->result();			
	 }
	  function get_all_pro($data,$conn){
		  $session_data = $this->session->all_userdata();
            $this->db->select($conn)->from($data)->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
			
			 $query = $this->db->get();		
            return $query->result();			
	 }
	 
	
	 function get_seller_rows1($inps){ 
	    $session_data = $this->session->all_userdata();
		$this->db->select('*');
		$this->db->where('tbl_product_id',$inps['cus']);
		$query= $this->db->get('purchase_product')->result_array();
		
		//echo $this->db->last_query();exit;
		return $query;	
	}
	 function get_alldet_rows($inps){ 
	    $session_data = $this->session->all_userdata();
		$this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
		$this->db->select('tbl_product.*');
		$this->db->select('tbl_statutory.id as ids,tbl_statutory.product_type,vat');
		$this->db->select('cb_seller.*');
		$this->db->where('tbl_purchase_request.id',$inps['cus']);
		//$this->db->where('tbl_statutory.product_type',$inps['cus']);
		$this->db->join('tbl_product','tbl_product.i_id=tbl_purchase_request.pro_id','left');
		$this->db->join('tbl_statutory','tbl_statutory.product_type=tbl_purchase_request.pro_type','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_purchase_request.vendor_id','left');
		$query= $this->db->get('tbl_purchase_request')->result_array();
		
		//echo $this->db->last_query();exit;
		return $query;	
	}
	
	 function get_alldet_rows1($inps){ 
	    $session_data = $this->session->all_userdata();
		$this->db->select('tbl_product.*');
		$this->db->select('tbl_statutory.id as ids,tbl_statutory.product_type,vat,service_tax');
		$this->db->where('tbl_product.i_category',$inps['cus']);
		$this->db->join('tbl_statutory','tbl_statutory.product_type=tbl_product.i_category','left');
		
		$query= $this->db->get('tbl_product')->result_array();
		
		
		
		
		//echo $this->db->last_query();exit;
		return $query;	
	}
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
       /**/
	   
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
		  $this->db->select('tbl_po_inv_item.*,tbl_po_inv_item.qty as qtys,tbl_po_inv_item.total as totals');
		  $this->db->select('tbl_po_inv.taxamount,gtotal'); 
		  $this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
		  $this->db->select('tbl_product.i_id as ids,tbl_product.i_name,descr'); 
		  $this->db->select('tbl_statutory.id as ids,tbl_statutory.product_type,vat');
		
		
		  
		  $this->db->from('tbl_po_inv_item');
		   $this->db->where('tbl_po_inv_item.po_inv_id',$id);
		  $this->db->join('tbl_po_inv','tbl_po_inv.po_id = tbl_po_inv_item.po_inv_id','left');
		  $this->db->join('tbl_purchase_request','tbl_purchase_request.id=tbl_po_inv_item.tbl_purchase_req_id','left');
		  $this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
		  $this->db->join('tbl_statutory','tbl_statutory.product_type=tbl_purchase_request.pro_type','left');
		 
		  $query = $this->db->get();
		// echo $this->db->last_query();exit;
		  return $query->result();
	 }
    
	function add_purchase_entry($post) {
		//echo '<pre>'; print_r($post);exit;
		//$include_pro='';
            extract($_REQUEST);
			 $session_data = $this->session->all_userdata();	
            $created_date=date('Y-m-d');
            $array=array(
            	'po_no_ref'=>0,
                'pdate'=>0,
                'podate'=>date('Y-m-d', strtotime($podate)),
				'vname'=>$vendor_id,
				'vinvno'=>$vinvno,
			    'storage_name'=>$storage_id,
				'stotal'=>$stotal,
                'gtotal'=>$gtotal,
                'paid_amt'=>0,
                'pending_amt'=>$gtotal,
				'created_date'=>$created_date);
            $this->db->insert('tbl_po_inv',$array);
            $insert_id = $this->db->insert_id();
            
            for($i = 0; $i < count($item_name1); $i++)
			   {

				 $array=array('po_inv_id'=>$insert_id,
					   'tbl_pro_id'=>$item_name1[$i],
					   'order_po_item_ref_id'=>$po_item_id[$i],
					   'batch_no'=>$batch_no[$i],
					   'expiry_date'=>date('Y-m-d', strtotime($e_date[$i])),
					   'qty'=>$qty[$i],
					   'p_rate'=>$purrate[$i],
					   'p_amount'=>$amount[$i],
					   'sgst'=>$sgst[$i],
					   'cgst'=>$cgst[$i],
					   'igst'=>$igst[$i],
					   	'sgst_amt'=>$sgst_amt[$i],
						'cgst_amt'=>$cgst_amt[$i],
						'igst_amt'=>$igst_amt[$i],
						'discount'=>$discount[$i],
						'free_pro'=>$free_pro[$i],
						'include_item'=>$include_id[$i],
						'total'=>$total[$i],
						'date'=>$created_date,
						'status'=>0,
						);
				// echo '<pre>'; print_r($include_id[$i]);
				 $this->db->insert('tbl_po_inv_item',$array);
				 $addop = $this->db->select('*')->from('tbl_product')->where('tbl_product.i_id',$item_name1[$i])->where('tbl_product.opening_pro_stock',0)->get()->result_array();
				 if(!empty($addop)){
				 	for ($k=0; $k < count($addop) ; $k++) { 
				 		$addproqty = $addop[$k]['opening_pro_stock']+$qty[$i];
						 $arraddop = array('opening_pro_stock'=>$addproqty);
						 $this->db->where('tbl_product.i_id',$addop[$k]['i_id'])->update('tbl_product',$arraddop);
						}
					}
				 
				 $openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.opening_date',$created_date)->where('tbl_opening_stock.pro_refff_no',$item_name1[$i])->get()->result_array();
				 $resqty = $openqty[0]['recived_stock']+$qty[$i]+$free_pro[$i];
				 $resqty1 = $openqty[0]['recived_stock_value']+$total[$i];
				 $resqty2 = $openqty[0]['clossing_stock_value']+$total[$i];
				 $resarray = array('recived_stock'=>$resqty,'recived_stock_value'=>$resqty1,'clossing_stock_value'=>$resqty2);
				 $this->db->where('tbl_opening_stock.opening_date',$created_date)->where('tbl_opening_stock.pro_refff_no',$item_name1[$i])->update('tbl_opening_stock',$resarray);

				 $stockcheck = $this->db->select('*')->from('tbl_stock')->where('tbl_stock.pro_reff_id',$item_name1[$i])->where('tbl_stock.batch_num',$batch_no[$i])->get()->result_array();
				// echo '<pre>'; print_r($array);
				  if(empty($stockcheck)){
				  	if($include_id[$i] == 1){
				  		$proarray1 = array(
				  			'vender_refff_id'  =>$vendor_id,
							'pro_reff_id'  =>$item_name1[$i],
							'batch_num'  =>$batch_no[$i],
							'curr_qty'  =>$qty[$i]+$free_pro[$i],
							'exp_date'  =>$e_date[$i],
							'curr_free_qty'  =>0,
							 );
				  	}else if($include_id[$i] == 0){
				  		$proarray1 = array(
				  			'vender_refff_id'  =>$vendor_id,
							'pro_reff_id'  =>$item_name1[$i],
							'batch_num'  =>$batch_no[$i],
							'curr_qty'  =>$qty[$i],
							'exp_date'  =>$e_date[$i],
							'curr_free_qty'  =>$free_pro[$i],
							 );
				  	}
			 	
					$this->db->insert('tbl_stock',$proarray1);

			 }else{
			 	if($include_id[$i] == 1){
			 		$proarray1 = array(
							'curr_qty'  =>$stockcheck[0]['curr_qty']+$qty[$i]+$free_pro[$i],
							 );
			 		}else if($include_id[$i] == 0){
			 		$proarray1 = array(
							'curr_qty'  =>$stockcheck[0]['curr_qty']+$qty[$i],
							'curr_free_qty'  =>$stockcheck[0]['curr_free_qty']+$free_pro[$i],
							 );	
			 		}
							 	$this->db->where('pro_reff_id',$item_name1[$i]);
							 	$this->db->where('batch_num',$batch_no[$i]);
							    $this->db->update('tbl_stock',$proarray1);
				
			 }
				$need = $this->db->select('*')->from('tbl_po_2')->where('tbl_po_2.po_2_id',$po_item_id[$i])->get()->result_array();
				$min = $need[0]['need_qty']-$qty[$i];
				$add = $need[0]['rec_qty']+$qty[$i];
				$arraymin = array('need_qty'=>$min,'rec_qty'=>$add);
				$this->db->where('tbl_po_2.po_2_id',$po_item_id[$i])->update('tbl_po_2',$arraymin);
				if($min <= 0){
					$status = array("status"=>1);
					$datapo = $this->db->select('*')->from('tbl_po_2')->where('tbl_po_2.po_2_id',$po_item_id[$i])->get()->result_array();
					$this->db->where('tbl_po_1.po_1_id',$datapo[0]['po_1_ref'])->update('tbl_po_1',$status);
				}
						

			}
			//exit;
            return $insert_id;
        }
		function edit_purchase_entry($post) { 
		//echo '<pre>'; print_r($post);exit;
            extract($_REQUEST);
            $created_date=date('Y-m-d h:i:s');
            $array=array(
				'vinvno'=>$vinvno,
                'pdate'=>date('Y-m-d', strtotime($pdate)),
				'vname'=>$vname,
				'vat'=>$vat,
			    'storage_name'=>$storage,
				'remarks'=>$remarks,
				'stotal'=>$stotal,
                'gtotal'=>$gtotal,
				//'taxamount'=>$taxamount,
				);
              
			$this->db->where('po_id',$po_id);
            $this->db->update('tbl_po_inv',$array);
			
			$this->db->where('po_inv_id', $po_id);
   			$this->db->delete('tbl_po_inv_item');
			
			for($i = 0; $i <count($item_name1); $i++)
		        {
			 
			 
			           $var2 = $this->db->select('qty')->where('tbl_product_id',$item_name1[$i])->get('purchase_product')->result_array();
							//echo '<pre>'; print_r($var2);exit;
							$proarray2 = array(
							'qty'  =>$var2[0]['qty']-$qty[$i],
							 );
			
							$this->db->where('tbl_product_id',$item_name1[$i]);
							$this->db->update('purchase_product',$proarray2);
			   }
			
			
		 for($i = 0; $i < count($item_name1); $i++) {
                $array=array('po_inv_id'=>$po_id,
				       'tbl_unit_id'=>$unit[$i],
					   'tbl_pro_id'=>$item_name1[$i],
						'p_rate'=>$purrate[$i],
						'qty'=>$qty[$i],
						'total'=>$total[$i],
						'sgst'=>$sgst[$i],
						'cgst'=>$cgst[$i],
						'igst'=>$igst[$i],
						'sgst_amt'=>$sgst_amt[$i],
						'cgst_amt'=>$cgst_amt[$i],
						'igst_amt'=>$igst_amt[$i],
						'date'=>$created_date,
						);
						$this->db->insert('tbl_po_inv_item',$array);
						
							$var = $this->db->select('qty,tbl_product_id')->where('tbl_product_id',$item_name1[$i])->get('purchase_product')->result_array();
				//echo '<pre>'; print_r($var);exit;
						if(!isset($var [0] ['tbl_product_id']) )
						 {
								$proarray = array(
								'tbl_product_id' => $item_name1[$i],
								'qty'      => $qty[$i],
								'p_rate'=>$total[$i],
								
								);
								$this->db->insert('purchase_product',$proarray);
							    //echo $this->db->last_query(); exit;
					 
						 }
					   else
						 {
								$proarray1 = array(
								'qty'      => $var[0]['qty']+$qty[$i],
								'p_rate'=>$total[$i],
							   );
								$this->db->where('tbl_product_id',$item_name1[$i]);
								$this->db->update('purchase_product',$proarray1);
								//echo $this->db->last_query(); exit;
						 }
            }

           return $po_id;
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