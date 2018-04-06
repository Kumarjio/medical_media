<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchaseorder_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
     function get_order($id){
     	$this->db->select('*')->from('tbl_order_arrange_vend')->where('tbl_order_arrange_vend.order_arrange_vend_id',$id)->where('tbl_order_arrange_vend.status',0);
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_order_arrange_vend.vend_refer_id','left');
     	$data = $this->db->get()->result_array();
     	return $data;
     }
     function get_order_all($id){
     	$this->db->select('*')->from('tbl_order_arrange_vend')->where('tbl_order_arrange_vend.order_arrange_vend_id',$id)->where('tbl_order_arrange_vend.status',0);
     	$this->db->join('tbl_order_arrange_pro','tbl_order_arrange_pro.tbl_order_arrange_vend_ref_id=tbl_order_arrange_vend.order_arrange_vend_id','left');
     	$this->db->join('order_create','order_create.order_create_id=tbl_order_arrange_pro.order_create_ref_id','left');
     	$this->db->join('tbl_product','tbl_product.i_id=order_create.pro_ref_id','left');
     	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_order_arrange_vend.vend_refer_id','left');
     	$data = $this->db->get()->result_array();
     	return $data;
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
	 function get_all_unit(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('master_location.*');
		$query = $this->db->get('master_location');	
		return $query->result_array();			
	 }
	 function add_purchase_order($post)
	  {
              extract($_REQUEST);
              

			 $session_data = $this->session->all_userdata();	
             $created_date=date('Y-m-d h:i:s');
             $date_data = $this->db->select('*')->from('tbl_year')->get()->result_array();
             $this->db->select('*')->from('tbl_po_1');
             $this->db->where("DATE_FORMAT(tbl_po_1.po_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($date_data[0]['from_date'])));
             $this->db->where("DATE_FORMAT(tbl_po_1.po_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($date_data[0]['to_date'])));
             $count_data = $this->db->get()->num_rows();
             $po = $count_data+1;
             $po_st = "PO".$po."-".$date_data[0]['year_label'];
             $array1=array(
				'po_no'            =>$po_st,
				'vendor_ref_id'    =>$vname,
				'order_id'		=>$order_id,
                'po_date'          =>date('Y-m-d', strtotime($pdate)),
                'storage_ref_id'   =>"nill",
                'po_stotal'        =>$stotal,
                'po_gtotal'        =>$gtotal,
                'status'        =>0,

				);
            $this->db->insert('tbl_po_1',$array1);
            $insert_id = $this->db->insert_id();
           // $insert_id=0;

             for($i = 0; $i < count($item_name1); $i++)
			   {

				 $array=array(
		 	    'po_1_ref'    =>$insert_id,
		        'pro_ref_id'  =>$item_name1[$i],
			    'unit_ref_id' =>$unit_id[$i],
				'po_qty'         =>$qty[$i],
                'need_qty'    =>$qty[$i],
				'po_rate'     =>$purrate[$i],
				'po_amount'   =>$amount[$i],
				'po_sgst'     =>$sgst[$i],
				'po_cgst'     =>$cgst[$i],
				'po_igst'     =>$igst[$i],
				'po_sgstamt'  =>$sgst_amt[$i],
				'po_cgstamt'  =>$cgst_amt[$i],
				'po_igstamt'  =>$igst_amt[$i],
				'po_total'    =>$total[$i],
				'po_discount'    =>$discount[$i],
				'po_free_qty'    =>$free[$i],
				);
		$this->db->insert('tbl_po_2',$array);
	  	$array = array('status'=>1);
	  	$this->db->where('tbl_order_arrange_vend.order_arrange_vend_id',$order_id)->update('tbl_order_arrange_vend',$array);

        }
      //  exit();
        return $po_st;
    }
    public function order_print_list(){
    	$this->db->select('*')->from('tbl_po_1');
    	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_1.vendor_ref_id','left');
        $this->db->order_by('po_no','DESC');
    	$data = $this->db->get()->result_array();
    	return $data;
    }
    public function order_det($id){
    	$this->db->select('*')->from('tbl_po_1');
    	$this->db->where('tbl_po_1.po_1_id',$id);
    	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_1.vendor_ref_id','left');

    	$data = $this->db->get()->result_array();
    	return $data;
    }
    public function order_item_det($id){
    	$this->db->select('*')->from('tbl_po_1');
    	$this->db->where('tbl_po_1.po_1_id',$id);
    	$this->db->join('tbl_po_2','tbl_po_2.po_1_ref=tbl_po_1.po_1_id','left');
    	$this->db->join('tbl_product','tbl_product.i_id=tbl_po_2.pro_ref_id','left');
    	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
    	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
    	$data = $this->db->get()->result_array();
    	return $data;
    }
    public function goods_return_det($id){
        $this->db->select('*')->from('tbl_goods_return_confirm_data');
        $this->db->where('tbl_goods_return_confirm_data.goods_return_confirm_data_id',$id);
        $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_goods_return_confirm_data.confirm_return_vend_id','left');

        $data = $this->db->get()->result_array();
        return $data;
    }
    public function goods_return_item_det($id){
        $this->db->select('*')->from('tbl_goods_return_confirm_data');
        $this->db->where('tbl_goods_return_confirm_data.goods_return_confirm_data_id',$id);
        $this->db->join('tbl_goods_return_confirm_item','tbl_goods_return_confirm_item.goods_return_confirm_data_ref_id=tbl_goods_return_confirm_data.goods_return_confirm_data_id','left');
        $this->db->join('tbl_product','tbl_product.i_id=tbl_goods_return_confirm_item.return_confirm_pro','left');
        $this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
        $this->db->join('master_location','master_location.id=tbl_product.unit','left');
        $this->db->join('tbl_stock','tbl_stock.stock_id=tbl_goods_return_confirm_item.return_confirm_stock_id','left');
        $data = $this->db->get()->result_array();
        return $data;
    }
}