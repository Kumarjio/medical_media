<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
    function get_all_stocks()
	 {
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_inv_item.*');
		$this->db->select('tbl_po_inv.*');
		$this->db->select('cb_seller.seller_name,credit_days');
		$this->db->select('tbl_product.i_name,descr');
		
		$this->db->join('tbl_po_inv','tbl_po_inv.po_id=tbl_po_inv_item.po_inv_id','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_po_inv.vname','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
		
		
		$query =$this->db->get('tbl_po_inv_item')->result_array();
			//echo $this->db->last_query(); //exit;
		return $query;					
	 }
	 function get_paym_det()
	 {
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_vendorpayment.*,tbl_vendorpayment.created_date as cds');
		$this->db->select('tbl_po_inv.*');
		$this->db->select('tbl_po_inv_item.*');
		$this->db->select('cb_seller.seller_name,credit_days');
		$this->db->select('tbl_product.i_name,descr');
		
		$this->db->join('tbl_po_inv','tbl_po_inv.po_id=tbl_vendorpayment.purchase_id','left');
		$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_po_inv.vname','left');
		 $this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
		 $query =$this->db->get('tbl_vendorpayment')->result_array();
		return $query;			
	 }
	 function get_stocks($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_inv_item.*,,tbl_po_inv_item.total as total1');
		$this->db->select('tbl_po_inv.vinvno,po_id,gtotal,vname');
		$this->db->select('cb_seller.seller_name');
		$this->db->select('tbl_product.i_name');
		$this->db->where('tbl_po_inv.vinvno=',$inps['id']);
		//$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
		$this->db->join('tbl_po_inv','tbl_po_inv.po_id=tbl_po_inv_item.po_inv_id','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_po_inv.vname','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
		
		//$this->db->order_by('po_id','asc');
		//$this->db->group_by('po_id');
		$query =$this->db->get('tbl_po_inv_item')->result_array();
		return $query;			
	 }
	 
	 
}
?>