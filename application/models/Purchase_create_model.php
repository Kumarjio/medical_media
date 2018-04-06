<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_create_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
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
    }
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
    }
    function created_order_list(){
    	$data = $this->db->select('*')->from('tbl_order_arrange_vend')->order_by('order_arrange_vend_id', 'DESC')->join('tbl_vendor','tbl_vendor.vendor_id=tbl_order_arrange_vend.vend_refer_id','left')->where('status',0)->get()->result_array();
    	return $data;
    	
    }
    

    
}