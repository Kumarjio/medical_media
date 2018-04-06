<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Return_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
     function get_all_stock_product(){
        $this->db->select('pro_reff_id,i_id,i_name,hsn,unit,manu_name')->from('tbl_stock')->distinct('pro_reff_id');
        $this->db->join('tbl_product','tbl_product.i_id = tbl_stock.pro_reff_id','left');
       $data = $this->db->get()->result_array();
        return $data;
     }
     function get_batch($id){
        $this->db->select('*')->from('tbl_stock')->where('pro_reff_id',$id);
        $this->db->where('tbl_stock.curr_qty >','0');
       $data = $this->db->get()->result_array();
        return $data;
     }
     function get_batch1($id,$vendor){
        $this->db->select('*')->from('tbl_stock')->where('pro_reff_id',$id);
        $this->db->where('tbl_stock.curr_qty >','0');
        $this->db->where('tbl_stock.vender_refff_id',$vendor);
       $data = $this->db->get()->result_array();
        return $data;
     }
     function get_vendor($pro,$batch){
        $this->db->select('*')->from('tbl_stock')->where('pro_reff_id',$pro)->where('batch_num',$batch);
        $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_stock.vender_refff_id','left');
       $data = $this->db->get()->result_array();
        return $data;
     }
     function goods_return_pdf(){
        $this->db->select('*')->from('tbl_goods_return_confirm_data');
        
        $data = $this->db->get()->result_array();
        return $data;
     }
     function goods_return_payment_list($inps){
        $session_data = $this->session->all_userdata(); 
        $this->db->select('*')->from('tbl_credit_return');
        $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_credit_return.goods_return_vendor_id_ref','left');
        if(isset($inps['from_dt']) && !empty($inps['from_dt']))
        {
            $this->db->where("DATE_FORMAT(tbl_credit_return.goods_return_pay_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
        }
        if(isset($inps['to_dt']) && !empty($inps['to_dt']))
        {
            $this->db->where("DATE_FORMAT(tbl_credit_return.goods_return_pay_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
        }     
        if(isset($inps['bill_no']) && $inps['bill_no']!='')
        {
            $this->db->where('tbl_credit_return.goods_return_invoice_ref =', $inps['bill_no']);   
        }
        if(isset($inps['cus_name']) && $inps['cus_name']!='')
        {
            $this->db->where('tbl_credit_return.goods_return_vendor_id_ref =', $inps['cus_name']);    
        }
        
        if(isset($inps['paid']) && !empty($inps['paid']))
        {
            $this->db->where('tbl_credit_return.goods_return_pay_type =', $inps['paid']);
        } 
        $this->db->order_by('credit_return_id','desc');
        $query =$this->db->get()->result_array();
      //print_r("<pre>"); print_r($query);exit();
        return $query;
     }
     function get_inv_date($pro,$batch,$vendor){
        $this->db->select('*')->from('tbl_stock')->where('pro_reff_id',$pro)->where('batch_num',$batch);
        $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_stock.vender_refff_id','left');
        $this->db->join('tbl_po_inv','tbl_po_inv.vname = tbl_vendor.vendor_id','left');
        $this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id = tbl_po_inv.po_id','left');
        $this->db->where('tbl_po_inv_item.tbl_pro_id',$pro);

        $this->db->where('tbl_po_inv_item.batch_no',$batch);
       $data = $this->db->get()->result_array();
        return $data;
     }
     public function add_goods_return_order($post){
             extract($_REQUEST);
             $session_data = $this->session->all_userdata();    
             $created_date=date('Y-m-d');
//print_r("<pre>");print_r($post);exit();
             for($i = 0; $i < count($item_name1); $i++)
               {

                 $array=array(
                'pro_retuen_id'     =>$item_name1[$i],
                'vend_retuen_id'    =>$vendor[$i],
                'batch_return'      =>$batch[$i],
                'p_rate_return'     =>$purrate[$i],
                'stock_id_return'   =>$stock_id[$i],
                'return_qty'        =>$qty[$i],
                'total_return'      =>$total[$i],
                'amount_return'     =>$amount[$i],
                'sgst_return'       =>$sgst[$i],
                'cgst_return'       =>$cgst[$i],
                'igst_return'       =>$igst[$i],
                'sgst_amt_return'   =>$sgst_amt[$i],
                'cgst_amt_return'   =>$cgst_amt[$i],
                'igst_amt_return'   =>$igst_amt[$i],
                'return_date'       =>$created_date,
                'status'            =>0,
                );
            $insert = $this->db->insert('tbl_goods_return_order',$array);
             }
            $this->db->select('vend_retuen_id')->from('tbl_goods_return_order')->where('status',0)->distinct('vend_retuen_id');
             $data = $this->db->get()->result_array();
            foreach ($data as $key => $value) {
               /* $this->db->select('vend_ref_id')->from('order_create')->where('vend_ref_id',$value['vend_ref_id'])->where('status',0)->distinct('vend_ref_id');
            $data1 = $this->db->get()->result_array();*/
            $this->db->select('*')->from('tbl_goods_return_order')->where('vend_retuen_id',$value['vend_retuen_id'])->where('status',0)->distinct('vend_retuen_id');
            $data2 = $this->db->get()->num_rows();

            $this->db->select('*')->from('tbl_goods_return_order')->where('vend_retuen_id',$value['vend_retuen_id'])->where('status',0)->distinct('vend_retuen_id');
            $data3 = $this->db->get()->result_array();

            $array=array('vend_refer_return_id'=>$value['vend_retuen_id'],'created'=>$created_date,'status'=>0);

            $this->db->insert('tbl_order_arrange_vend_return',$array);

            $insert_id = $this->db->insert_id();

            for($i=0;$i<$data2;$i++){

                $array11= array('order_arrange_vend_return_id'=>$insert_id,'goods_return_order_ref_id'=>$data3[$i]['goods_retuen_order_id'],'status'=>0);

                $this->db->insert('tbl_order_arrange_pro_return',$array11);

                $updatearr = array('status'=>1);
                $this->db->where('tbl_goods_return_order.goods_retuen_order_id',$data3[$i]['goods_retuen_order_id'])->update('tbl_goods_return_order',$updatearr);
                //print_r("<pre>");print_r($data3[$i]);
            }
        //print_r("<pre>");print_r($data3);
        
        }
        //exit();
        return $insert_id;
    }
    function add_goods_return_confirm($post){
        extract($_REQUEST);
             $session_data = $this->session->all_userdata();    
             $created_date=date('Y-m-d');
           //  print_r("<pre>");print_r($post);exit();
             $date_data = $this->db->select('*')->from('tbl_year')->get()->result_array();
             $this->db->select('*')->from('tbl_goods_return_confirm_data');
             $this->db->where("DATE_FORMAT(tbl_goods_return_confirm_data.goods_return_dc_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($date_data[0]['from_date'])));
             $this->db->where("DATE_FORMAT(tbl_goods_return_confirm_data.goods_return_dc_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($date_data[0]['to_date'])));
             $count_data = $this->db->get()->num_rows();
             $bill_count = $count_data+1;
             $bill_no1 = "PR".$bill_count."-".$date_data[0]['year_label'];
             $arrayins = array(
                'confirm_return_vend_id'=>$vendor_id,
                'goods_return_dc_no'=>$bill_no1,
                'goods_return_dc_date'=>$pdate,
                'confirm_return_vend_name'=>$vendor_name,
                'confirm_return_stotal'=>$stotal,
                'confirm_return_gtotal'=>$gtotal,
                'confirm_return_paid'=>0,
                'confirm_return_pending'=>$gtotal,
                'confirm_status'=>0,
                'order_arrange_vend_return_refff_id'=>$order_id
             );
             $this->db->insert('tbl_goods_return_confirm_data',$arrayins);
             $insert_id = $this->db->insert_id();
             $arraydc = array('goods_return_dc_no'=>'DC'.$insert_id);
             $this->db->where('tbl_goods_return_confirm_data.goods_return_confirm_data_id')->update('tbl_goods_return_confirm_data',$arraydc);
             $arasts = array('status'=>1);
             $this->db->where('tbl_order_arrange_vend_return.order_arrange_vend_return_id',$order_id)->update('tbl_order_arrange_vend_return',$arasts);
             for($i = 0; $i < count($item_name1); $i++)
               {

                 $arrayins2=array(
                'goods_return_confirm_data_ref_id'     =>$insert_id,
                'return_confirm_pro'    =>$item_name1[$i],
                'return_confirm_batch'      =>$batch[$i],
                'return_confirm_rate'     =>$purrate[$i],
                'return_confirm_stock_id'   =>$stock_id[$i],
                'return_confirm_invoice'    =>$invoice[$i],
                'return_confirm_qty'        =>$qty[$i],
                'return_confirm_total'      =>$total[$i],
                'return_confirm_amount'     =>$amount[$i],
                'return_confirm_sgst'       =>$sgst[$i],
                'return_confirm_cgst'       =>$cgst[$i],
                'return_confirm_igst'       =>$igst[$i],
                'return_confirm_sgst_amt'   =>$sgst_amt[$i],
                'return_confirm_cgst_amt'   =>$cgst_amt[$i],
                'return_confirm_igst_amt'   =>$igst_amt[$i],
                'return_confirm_date'       =>$created_date,
                'status'            =>0,
                );
                $insert = $this->db->insert('tbl_goods_return_confirm_item',$arrayins2);
                $openqty = $this->db->select('*')->from('tbl_opening_stock')->where('tbl_opening_stock.pro_refff_no',$item_name1[$i])->where('tbl_opening_stock.opening_date',$created_date)->get()->result_array();
                $array11 = array(
                    'purchase_return_stock'=>$openqty[0]['purchase_return_stock']+$qty[$i],
                    'purchase_return_value'=>$openqty[0]['purchase_return_value']+$total[$i],
                    'clossing_stock_value'=>$openqty[0]['clossing_stock_value']-$total[$i],
                );
                $this->db->where('tbl_opening_stock.openind_id',$openqty[0]['openind_id'])->update('tbl_opening_stock',$array11);

                $sto = $this->db->select('*')->from('tbl_stock')->where('tbl_stock.pro_reff_id',$item_name1[$i])->where('tbl_stock.batch_num',$batch[$i])->where('tbl_stock.vender_refff_id',$vendor_id)->get()->result_array();
                $min = $sto[0]['curr_qty']-$qty[$i];
                $arrup = array('curr_qty'=>$min);
                $this->db->where('tbl_stock.pro_reff_id',$item_name1[$i]);
                $this->db->where('tbl_stock.batch_num',$batch[$i]);
                $this->db->where('tbl_stock.vender_refff_id',$vendor_id);
                $this->db->update('tbl_stock',$arrup);
             }
             return $insert_id;
    }
    function goods_return_list(){
        $this->db->select('*')->from('tbl_order_arrange_vend_return');
        $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_order_arrange_vend_return.vend_refer_return_id','left');
        $this->db->where('tbl_order_arrange_vend_return.status',0);
        $data = $this->db->get()->result_array();
        //print_r("<pre>");print_r($data);exit();
        return $data;
    }
    function get_comm_return_data($id){
        $this->db->select('*')->from('tbl_order_arrange_vend_return')->where('tbl_order_arrange_vend_return.order_arrange_vend_return_id',$id);
        $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_order_arrange_vend_return.vend_refer_return_id','left');
        $data = $this->db->get()->result_array();
        return $data;

    }
    function get_all_return_data($id){
         $this->db->select('*')->from('tbl_order_arrange_vend_return')->where('tbl_order_arrange_vend_return.order_arrange_vend_return_id',$id);
        $this->db->join('tbl_order_arrange_pro_return','tbl_order_arrange_pro_return.order_arrange_vend_return_id=tbl_order_arrange_vend_return.order_arrange_vend_return_id','left');
        $this->db->join('tbl_goods_return_order','tbl_goods_return_order.goods_retuen_order_id=tbl_order_arrange_pro_return.goods_return_order_ref_id','left');
        $data1 = $this->db->get()->result_array();
         $this->db->select('*')->from('tbl_order_arrange_vend_return')->where('tbl_order_arrange_vend_return.order_arrange_vend_return_id',$id);
        $this->db->join('tbl_order_arrange_pro_return','tbl_order_arrange_pro_return.order_arrange_vend_return_id=tbl_order_arrange_vend_return.order_arrange_vend_return_id','left');
        $this->db->join('tbl_goods_return_order','tbl_goods_return_order.goods_retuen_order_id=tbl_order_arrange_pro_return.goods_return_order_ref_id','left');
        $this->db->join('tbl_product','tbl_product.i_id=tbl_goods_return_order.pro_retuen_id','left');
        $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_order_arrange_vend_return.vend_refer_return_id','left');
        $this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
        $this->db->join('master_location','master_location.id=tbl_product.unit','left');
        $this->db->join('tbl_po_inv','tbl_po_inv.vname = tbl_vendor.vendor_id','left');
        $this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id = tbl_po_inv.po_id','left');
        $this->db->where('tbl_po_inv_item.tbl_pro_id',$data1[0]['pro_retuen_id']);

        $this->db->where('tbl_po_inv_item.batch_no',$data1[0]['batch_return']);
        $this->db->join('tbl_stock','tbl_stock.vender_refff_id=tbl_vendor.vendor_id','left');
        $this->db->where('tbl_stock.pro_reff_id',$data1[0]['pro_retuen_id']);

        $this->db->where('tbl_stock.batch_num',$data1[0]['batch_return']);
        $data = $this->db->get()->result_array();
        return $data;
    }
     /*end Return Model*/
     function get_all_vendor(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_vendor.*');
		$query = $this->db->get('tbl_vendor');	
		return $query->result_array();			
	 }
	 function get_all_product(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_product.*');
		$query = $this->db->get('tbl_product');	
		return $query->result_array();			
	 }
	 function get_ven_det($id){
     	$this->db->select('*')->from('tbl_pricelist')->where('tbl_pricelist.po_id',$id);
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_pricelist.vendor_ref','left');
     	$data = $this->db->get()->result_array();
     	return $data;
     }
     function get_rate_det($pro,$vend){
     	$this->db->select('*')->from('tbl_pricelist')->where('tbl_pricelist.po_id',$pro)->where('tbl_pricelist.vendor_ref',$vend);
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_pricelist.vendor_ref','left');
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_pricelist.po_id','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
        $this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	$data = $this->db->get()->result_array();
     	return $data;
     }
	 function get_all_unit(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('master_location.*');
		$query = $this->db->get('master_location');	
		return $query->result_array();			
	 }
	 function add_purchase_create($post)
	  {
             extract($_REQUEST);
			 $session_data = $this->session->all_userdata();	
             $created_date=date('Y-m-d');
             //print_r("<pre>");print_r($post);exit();
             for($i = 0; $i < count($item_name1); $i++)
			   {

				 $array=array(
		 	    'pro_ref_id'    =>$item_name1[$i],
		        'vend_ref_id'  =>$vendor[$i],
			    'hsn_refer_id' =>$hsn[$i],
				'order_qty'         =>$qty[$i],
				'vend_per_rate'     =>$purrate[$i],
				'stot_amount'   =>$amount[$i],
				'sgst_per'     =>$sgst[$i],
				'cgst_per'     =>$cgst[$i],
				'igst_per'     =>$igst[$i],
				'sgst_amt'  =>$sgst_amt[$i],
				'cgst_amt'  =>$cgst_amt[$i],
				'igst_amt'  =>$igst_amt[$i],
				'gtot_amt'    =>$total[$i],
				'discount_per'  =>$discount[$i],
				'free_qty'  =>$free[$i],
				'status'  =>0,
				'created'    =>$created_date,
				);
				/*print_r('<pre>');
				 print_r($array);*/
		$data = $this->db->insert('order_create',$array);
	   // 

        }
      //  exit();
        return $data;
    }/*
    function create_order(){
    	$session_data = $this->session->all_userdata();	
             $created_date=date('Y-m-d');
    	$this->db->select('vend_ref_id')->from('order_create')->where('status',0)->distinct('vend_ref_id');
    	$data = $this->db->get()->result_array();
    	foreach ($data as $key => $value) {
    		$this->db->select('vend_ref_id')->from('order_create')->where('vend_ref_id',$value['vend_ref_id'])->where('status',0)->distinct('vend_ref_id');;
    	$data1 = $this->db->get()->result_array();
    	$this->db->select('*')->from('order_create')->where('vend_ref_id',$value['vend_ref_id'])->where('status',0)->distinct('vend_ref_id');
    	$data2 = $this->db->get()->num_rows();
    	$this->db->select('*')->from('order_create')->where('vend_ref_id',$value['vend_ref_id'])->where('status',0)->distinct('vend_ref_id');
    	$data3 = $this->db->get()->result_array();
    	$array=array('vend_refer_id'=>$value['vend_ref_id'],'created'=>$created_date,'status'=>0);
    	$this->db->insert('tbl_order_arrange_vend',$array);
    	$insert_id = $this->db->insert_id();
    	for($i=0;$i<$data2;$i++){
    		$array11= array('tbl_order_arrange_vend_ref_id'=>$insert_id,'order_create_ref_id'=>$data3[$i]['order_create_id'],'status'=>0);
    		$this->db->insert('tbl_order_arrange_pro',$array11);
    		$updatearr = array('status'=>1);
    		$this->db->where('order_create.order_create_id',$data3[$i]['order_create_id'])->update('order_create',$updatearr);
    		//print_r("<pre>");print_r($data3[$i]);
    	}
    	//print_r("<pre>");print_r($data3);
    	
    	}
    	//exit();
    	return $insert_id;
    }*/
    function created_order_list(){
    	$data = $this->db->select('*')->from('tbl_order_arrange_vend')->order_by('order_arrange_vend_id', 'DESC')->join('tbl_vendor','tbl_vendor.vendor_id=tbl_order_arrange_vend.vend_refer_id','left')->where('status',0)->get()->result_array();
    	return $data;
    	
    }
    

    

    
}