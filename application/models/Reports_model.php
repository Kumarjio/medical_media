<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_model extends CI_Model {
     function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
/*$this->db->join('','','left');*/
     function get_all_grn($inps){
     	$session_data = $this->session->all_userdata();	
     	$this->db->select('*')->from('tbl_po_inv');
     	$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
     	
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
     	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
     	$this->db->join('tbl_category','tbl_category.category_id=tbl_sub_category.category_ref_id','left');
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_inv.vname','left');
     	$this->db->join('cb_storage','cb_storage.cid=tbl_po_inv.storage_name','left');
     	$this->db->join('tbl_po_2','tbl_po_2.po_2_id=tbl_po_inv_item.order_po_item_ref_id','left');
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
		if(isset($inps['storage']) && $inps['storage']!='')
	    {
			$this->db->where('cb_storage.Location =', $inps['storage']);	
		}
		
		if(isset($inps['product']) && !empty($inps['product']))
		{
			$this->db->where('tbl_product.i_id =', $inps['product']);
		}
		if(isset($inps['po_num']) && !empty($inps['po_num']))
		{
			$this->db->where('tbl_po_2.po_1_ref =', $inps['po_num']);
		}
		$this->db->order_by('po_id','desc');
     	$data = $this->db->get()->result_array();
     	return $data;
     }
     function expenses_report($inps){
     	$session_data = $this->session->all_userdata();
     	$this->db->select('*')->from('tbl_expenses_list');
     	$this->db->join('tbl_expenses','tbl_expenses.exp_id = tbl_expenses_list.exp_ref_id','left');
     	$this->db->join('cp_admin_login','cp_admin_login.admin_id = tbl_expenses_list.employee_name','left');
     	$this->db->join('expenses_master','expenses_master.expenses_id = tbl_expenses.exp_type_reff_id','left');
     	if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_expenses.date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_expenses.date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_expenses.exp_id =', $inps['cid']);	
		}
		if(isset($inps['exp']) && !empty($inps['exp']))
		{
			$this->db->where('expenses_master.expenses_id =', $inps['exp']);
		}
		if(isset($inps['user']) && !empty($inps['user']))
		{
			$this->db->where('cp_admin_login.admin_id =', $inps['user']);
		}
     	$data = $this->db->get()->result_array();
     	return $data;
     }
     function grn_return_report($inps){
     	$session_data = $this->session->all_userdata();	
     	$this->db->select('*')->from('tbl_goods_return_confirm_data');
     	$this->db->join('tbl_goods_return_confirm_item','tbl_goods_return_confirm_item.goods_return_confirm_data_ref_id=tbl_goods_return_confirm_data.goods_return_confirm_data_id','left');
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_goods_return_confirm_data.confirm_return_vend_id','left');
     	$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_goods_return_confirm_item.return_confirm_stock_id','left');
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_goods_return_confirm_item.return_confirm_pro','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
     	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
     	$this->db->join('tbl_category','tbl_category.category_id=tbl_sub_category.category_ref_id','left');
     	if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_goods_return_confirm_data.goods_return_dc_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_goods_return_confirm_data.goods_return_dc_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_goods_return_confirm_data.confirm_return_vend_id =', $inps['cid']);	
		}
		if(isset($inps['product']) && !empty($inps['product']))
		{
			$this->db->where('tbl_product.i_id =', $inps['product']);
		}
		if(isset($inps['po_num']) && !empty($inps['po_num']))
		{
			$this->db->where('tbl_goods_return_confirm_data.goods_return_dc_no =', $inps['po_num']);
		}
     	$data = $this->db->get()->result_array();
     	return $data;
     }

     public function purchase_pay_report($inps)
     {
     	$this->db->select('*')->from('tbl_debit');
     	$this->db->join('tbl_po_inv','tbl_po_inv.po_id=tbl_debit.po_ref_id','left');
    $this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_inv.vname','left');
    if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_vendor.vendor_id =', $inps['cid']);	
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_debit.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_debit.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}

     	//$this->db->join('','','');
     	$query=$this->db->get();
     	return $query->result_array();

     }
     public function sale_summary_report($inps)
     {
error_reporting(0);
        $this->db->select('tbl_product.hsn,tbl_sales.s_no')->from('tbl_sales');
     	$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
     	$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_items.tbl_stock_id','left');
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
     	$this->db->distinct('tbl_product.hsn');
          $result=$this->db->get()->result_array();
         
      foreach($result as $res)
      {
      	 //echo "<pre>"; print_r($res['s_no']);
      	 $this->db->select('*')->from('tbl_sales');
     	$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');

     	$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_items.tbl_stock_id','left');
     	$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales.customer_code','left');
      
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
     	
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
          $this->db->where('tbl_sales.s_no',$res['s_no']);
          $this->db->where('tbl_product.hsn',$res['hsn']);
          if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_sales.customer_code =', $inps['cid']);	
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
           $query[]=$this->db->get()->result_array();
          

}

		//echo "<pre>";print_r($query);exit;
 return $query;
//exit;

     	
     	
     	
     	

     }
     public function stock_adjust_report($inps)
     {
     	$this->db->select('*')->from('tbl_stock_adj');
     	$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_stock_adj.adj_stock_id','left');
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
     	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_stock_adj.adj_data,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_stock_adj.adj_data,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
     	$query=$this->db->get();
     	return $query->result_array();

     }
     function sales_report($inps){
error_reporting(0);
     	$session_data = $this->session->all_userdata();	
     	$this->db->select('*')->from('tbl_sales');
     	$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales.customer_code','left');
     	$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
     	$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_items.tbl_stock_id','left');
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
     	
     	$query=$this->db->get()->result_array();

     	foreach($query as $val)
     	{
       $this->db->select('*')->from('tbl_sales');
     	$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales.customer_code','left');
     	$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
     	$this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_items.tbl_stock_id','left');
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_stock.vender_refff_id','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
     	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
     	$this->db->join('tbl_category','tbl_category.category_id=tbl_sub_category.category_ref_id','left');
     	$this->db->join('tbl_credit','tbl_credit.sales_ref_id=tbl_sales.s_no','left');
     	
     		$this->db->select('tbl_pro_id,batch_no')->from('tbl_po_inv_item');
     		$this->db->where('tbl_po_inv_item.tbl_pro_id',$val['pro_reff_id']);
     		$this->db->where('tbl_po_inv_item.batch_no',$val['batch_num']);
     		$res[] = $this->db->get()->result_array();
//echo "<pre>";print_r($res);
     		if(empty($res))
     		{
     		$this->db->select('*')->from('tbl_product');
     		$this->db->where('tbl_product.i_id',$val['pro_reff_id']);

     		}
     	//echo "<pre>";print_r($res);
     	}
     

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
		if(isset($inps['product']) && !empty($inps['product']))
		{
			$this->db->where('tbl_product.i_id =', $inps['product']);
		}
		if(isset($inps['po_num']) && !empty($inps['po_num']))
		{
			$this->db->where('tbl_sales.bill_no =', $inps['po_num']);
		}
     
     	return $res;
     }
     
     function sales_return_report($inps){
     $session_data = $this->session->all_userdata();
     $this->db->select('*')->from('tbl_sales_return_add');
     $this->db->join('tbl_customer','tbl_customer.customer_id=tbl_sales_return_add.return_cus_id','left');
     $this->db->join('tbl_sales_return_add_item','tbl_sales_return_add_item.sales_return_add_ref_id=tbl_sales_return_add.sales_return_add_id','left');
     $this->db->join('tbl_stock','tbl_stock.stock_id=tbl_sales_return_add_item.return_stock_id','left');
     $this->db->join('tbl_product','tbl_product.i_id=tbl_stock.pro_reff_id','left');
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_stock.vender_refff_id','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
     	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id=tbl_product.i_category','left');
     	$this->db->join('tbl_category','tbl_category.category_id=tbl_sub_category.category_ref_id','left');
     	if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales_return_add.return_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales_return_add.return_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_sales_return_add.return_cus_id =', $inps['cid']);	
		}
		if(isset($inps['product']) && !empty($inps['product']))
		{
			$this->db->where('tbl_product.i_id =', $inps['product']);
		}
		if(isset($inps['po_num']) && !empty($inps['po_num']))
		{
			$this->db->where('tbl_sales_return_add.return_bill_no =', $inps['po_num']);
		}
     $data = $this->db->get()->result_array();
     return $data;
     }
     public function get_Sale_Payment($inps)
     {
     	$this->db->select('*')->from('tbl_credit');
     	$this->db->join('tbl_customer','tbl_customer.customer_id=tbl_credit.cus_id_ref','left');
     	$this->db->join('tbl_credit_return','tbl_credit_return.goods_return_vendor_id_ref=tbl_customer.customer_id','left');
     	$this->db->join('tbl_sales','tbl_sales.s_no=tbl_credit.sales_ref_id','left');

     	 if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_customer.customer_id =', $inps['cid']);	
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_credit.pay_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_credit.pay_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
     	$query=$this->db->get();
     	return $query->result_array();
     }
public function po_reports($inps)
{
	$this->db->select('*')->from('tbl_po_2');
	$this->db->join('tbl_po_1','tbl_po_1.po_1_id=tbl_po_2.po_1_ref','left');
	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_1.vendor_ref_id','left');
	$this->db->join('tbl_product','tbl_product.i_id=tbl_po_2.pro_ref_id','left');
	$this->db->join('master_location','master_location.id=tbl_po_2.unit_ref_id','left');
	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
	 if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_vendor.vendor_id =', $inps['cid']);	
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_1.po_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_1.po_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
	$query=$this->db->get();

    return $query->result_array();
}

     public function purchase_summary_report($inps)
     {
error_reporting(0);
     $this->db->select('tbl_product.hsn,tbl_po_inv.po_id')->from('tbl_po_inv');
     $this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
     $this->db->where('status_inv_cancel',0);
     $this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
     $this->db->distinct('tbl_product.hsn');
     $hsn=$this->db->get()->result_array();
    
     	foreach ($hsn as $value) {
     		 //print_r("<pre>");print_r($value['hsn']);exit;
     		$this->db->select('*')->from('tbl_po_inv');
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_inv.vname','left');
     	$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
     	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_vendor.vendor_id =', $inps['cid']);	
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.podate,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.podate,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}

       $this->db->where('tbl_product.hsn',$value['hsn']);
$this->db->where('tbl_po_inv.po_id',$value['po_id']);
$query[]=$this->db->get()->result_array();

//print_r("<pre>");print_r($query);
     	}
     	return $query;
     	//print_r("<pre>");print_r($resut);
     	//exit;
     	
     	/*$this->db->select('*')->from('tbl_po_inv');
     	$this->db->join('tbl_vendor','tbl_vendor.vendor_id=tbl_po_inv.vname','left');
     	$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
     	$this->db->join('tbl_product','tbl_product.i_id=tbl_po_inv_item.tbl_pro_id','left');
     	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_product.hsn','left');
     	$this->db->join('master_location','master_location.id=tbl_product.unit','left');
     	 if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('tbl_vendor.vendor_id =', $inps['cid']);	
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.podate,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.podate,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
     	$query=$this->db->get();
     	return $query->result_array();*/
     }
     /*A2Z Report Model Ends*/
	 function get_all_stocks($inps)
	 {
		$session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_inv.*');
		
		$this->db->select('tbl_po_inv_item.*,tbl_po_inv_item.qty as qtys,tbl_po_inv_item.per_taxamt');
		$this->db->select('cb_seller.seller_name');
		$this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
		$this->db->select('tbl_product.i_name,descr');
		//$this->db->select('cb_storage.storage_name,cb_storage.Location as loc');
		$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
		//$this->db->join('cb_storage','cb_storage.cid=tbl_po_inv.storage_name','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_po_inv_item.vname','left');
		$this->db->join('tbl_purchase_request','tbl_purchase_request.id=tbl_po_inv_item.tbl_purchase_req_id','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_purchase_request.pro_id','left');
		
		//$this->db->join('cb_customer','cb_customer.cid=tbl_po_inv.customer','left');
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.pdate,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.pdate,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['seller']) && $inps['seller']!='')
		{
			$this->db->where('tbl_po_inv_item.vname =', $inps['seller']);	
		}
		if(isset($inps['storage']) && $inps['storage']!='')
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
			}
		$this->db->order_by('po_id','desc');
		//$this->db->group_by('tbl_po_inv.po_id','asc');
		$query =$this->db->get('tbl_po_inv')->result_array();
			//echo $this->db->last_query(); //exit;
		return $query;			
	 }
	 function get_all_statutory($inps)
	 {
		 $session_data = $this->session->all_userdata();	
		$this->db->select('tbl_po_inv.*');
		$this->db->select('tbl_po_inv_item.*,tbl_po_inv_item.qty as qtys,tbl_po_inv_item.per_taxamt');
		$this->db->select('cb_seller.seller_name,tin_no,cst_no');
		$this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
		$this->db->select('tbl_product.i_name,descr');
		$this->db->select('tbl_sales_items.*,tbl_sales_items.si_no as no,tbl_sales_items.created_date as cf,tbl_sales_items.quantity as qtyss');
		$this->db->select('tbl_sales.*,tbl_sales.s_no as tid');
	    $this->db->select('tbl_invoice.*,tbl_invoice.s_no as sno');
		$this->db->select('tbl_invoice_payment.*,tbl_invoice_payment.created_date as cd');
		$this->db->select('cb_customer.customer_name,mob_no1,area_name,cb_customer.cid as cids');
		$this->db->select('pro_type.*');
		
		
		
		
		$this->db->join('tbl_po_inv_item','tbl_po_inv_item.po_inv_id=tbl_po_inv.po_id','left');
		$this->db->join('cb_seller','cb_seller.seller_name=tbl_po_inv_item.vname','left');
		$this->db->join('tbl_purchase_request','tbl_purchase_request.id=tbl_po_inv_item.tbl_purchase_req_id','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_purchase_request.pro_id','left');
		$this->db->join('tbl_sales_items','tbl_sales_items.tbl_product_id=tbl_po_inv_item.tbl_pro_id','left');
		$this->db->join('tbl_sales','tbl_sales.s_no=tbl_sales_items.tbl_sales_id','left');
		
		 //$this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
	    $this->db->join('tbl_invoice','tbl_invoice.sales_id=tbl_sales.s_no','left');
	    $this->db->join('tbl_invoice_payment','tbl_invoice_payment.tbl_invoice_id=tbl_invoice.s_no','left');
		 //$this->db->join('tbl_product','tbl_product.i_id=tbl_sales_items.tbl_product_id','left');
		$this->db->join('cb_customer','tbl_sales.customer_code=cb_customer.cid','left');
		$this->db->join('pro_type','pro_type.id=tbl_product.i_category','left');
		
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.pdate,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_po_inv.pdate,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['seller']) && $inps['seller']!='')
		{
			$this->db->where('tbl_po_inv_item.vname =', $inps['seller']);	
		}
		if(isset($inps['storage']) && $inps['storage']!='')
	    {
			$this->db->where('cb_storage.Location =', $inps['storage']);	
		}
		
		if(isset($inps['product_cde']) && !empty($inps['product_cde']))
		{
			$this->db->where('tbl_product.i_name =', $inps['product_cde']);
		}
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('cb_customer.cid', $inps['cid']);	
		}
		if(isset($inps['area_name']) && $inps['area_name']!='')
		{
			$this->db->like('cb_customer.area_name', $inps['area_name']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->or_where('cb_customer.mob_no1=', $inps['mobile']);	
		}
		
		if(isset($inps['land']) && !empty($inps['land'])){
		$this->db->where('cb_customer.landline_no',$inps['land']);
		}
		if($session_data['location'] !=  '')
		    {
				$this->db->where('tbl_po_inv.storage_name',$session_data['location']);
			}
	   $this->db->order_by('po_id','desc');
		$this->db->group_by('tbl_po_inv.po_id','asc');
		$query =$this->db->get('tbl_po_inv')->result_array();
		//echo $this->db->last_query(); //exit;
		return $query;			
	 }
	 
	 function get_stock_transfer($inps){
		$session_data = $this->session->all_userdata();
			$this->db->select('purchase_request_product.*,purchase_request_product.status as st1,purchase_request_product.created_date as cd');
			$this->db->select('cp_admin_login.*');
			$this->db->select('tbl_product.*');
			$this->db->select('pro_type.*');
			$this->db->select('purchase_product.tbl_product_id as tid,purchase_product.serial_ime');
			//$this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
			
			//$this->db->where('purchase_product.req_emp_location', $session_data['location']);
			/*if($session_data['location'] !=  'Chennai')
			{
			$this->db->where('purchase_request_product.req_emp_location', $session_data['location']);
	  		}*/
			//$this->db->where('purchase_request_product.req_product_location', $session_data['location']);
			$this->db->join('cp_admin_login','cp_admin_login.admin_id = purchase_request_product.emp_id','left');
			//$this->db->join('tbl_purchase_request','tbl_purchase_request.id=purchase_request_product.tbl_purchase_req_id','left');
			$this->db->join('tbl_product','tbl_product.i_id = purchase_request_product.tbl_product_id','left');
			$this->db->join('pro_type','pro_type.id=tbl_product.i_category','left');
			$this->db->join('purchase_product','purchase_product.tbl_product_id=purchase_request_product.tbl_product_id','left');
			
		if($session_data['location'] !=  'Chennai')
		    {
				$this->db->where('purchase_request_product.req_emp_location',$session_data['location']);
			}	
		if(isset($inps['product_cde']) && !empty($inps['product_cde']))
		{
			$this->db->where('tbl_product.i_name =', $inps['product_cde']);
		}
		if(isset($inps['product_cde1']) && $inps['product_cde1']!='')
		{
			$this->db->where('master_location.id', $inps['product_cde1']);	
		}
			$query = $this->db->get('purchase_request_product');	
			return $query->result_array();			
	 } 
	 function get_vendor_List($inps)
	 {
		$session_data = $this->session->all_userdata();	
		
		$this->db->select('tbl_purchase_request_item.*,tbl_purchase_request_item.vendor_id as vid');
		$this->db->select('tbl_purchase_request.*,tbl_purchase_request.qty as qtyss');
		$this->db->select('tbl_po_inv_item.*,tbl_po_inv_item.qty as qtys,tbl_po_inv_item.per_taxamt');
		$this->db->select('tbl_po_inv.*');
		$this->db->select('cb_seller.seller_name');
		//$this->db->select('tbl_purchase_request.*,tbl_purchase_request.id as ids1');
		$this->db->select('tbl_product.i_name,descr,i_category');
		$this->db->select('tbl_vendorpayment.*');
		$this->db->select('pro_type.*');
		
		
		$this->db->join('tbl_purchase_request','tbl_purchase_request.pur_req_id=tbl_purchase_request_item.id','left');
		$this->db->join('tbl_po_inv_item','tbl_po_inv_item.tbl_purchase_req_id=tbl_purchase_request.id','left');
		$this->db->join('tbl_po_inv','tbl_po_inv.po_id=tbl_po_inv_item.po_inv_id','left');
		$this->db->join('cb_seller','cb_seller.cid=tbl_purchase_request_item.vendor_id','left');
		//$this->db->join('tbl_purchase_request','tbl_purchase_request.id=tbl_po_inv_item.tbl_purchase_req_id','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_purchase_request.pro_id','left');
		$this->db->join('tbl_vendorpayment','tbl_vendorpayment.purchase_id=tbl_po_inv_item.pi_id','left');
		$this->db->join('pro_type','pro_type.id=tbl_product.i_category','left');
		//$this->db->join('cb_customer','cb_customer.cid=tbl_po_inv.customer','left');
		if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_purchase_request_item.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_purchase_request_item.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['seller']) && $inps['seller']!='')
		{
			$this->db->where('tbl_purchase_request_item.vendor_id =', $inps['seller']);	
		}
		if(isset($inps['storage']) && $inps['storage']!='')
	    {
			$this->db->where('cb_storage.Location =', $inps['storage']);	
		}
		
		if(isset($inps['product_cde']) && !empty($inps['product_cde']))
		{
			$this->db->where('tbl_product.i_name =', $inps['product_cde']);
		}
		/*if($session_data['location'] !=  'Chennai')
		    {
				$this->db->where('tbl_po_inv.storage_name',$session_data['location']);
			}*/
		//$this->db->order_by('po_id','desc');
		//$this->db->group_by('tbl_po_inv.po_id','asc');
		$query =$this->db->get('tbl_purchase_request_item')->result_array();
			//echo $this->db->last_query(); //exit;
		return $query;			
	 }
    
	 function get_all_data($data,$conn){
	
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
		$this->db->select('tbl_po_inv.*, tbl_manufacturer.m_name')->from('tbl_po_inv')
		->join('tbl_manufacturer', 'tbl_manufacturer.m_id = tbl_po_inv.supplier_code', 'left')
         ->where($array); 
		$query = $this->db->get();
				//echo $this->db->last_query();
		
		return $query->result();	 
	 }
	 
	   function itemDetails($supplier_id) {
		
		 $this->db->select('i_id, i_name')->from('tbl_item')
		 //->join('tbl_po_inv_item', '`tbl_po_inv`.`po_id` = `tbl_po_inv_item`.`po_inv_id`', 'LEFT')
		// ->join('tbl_item', '`tbl_po_inv_item`.`item_code` = `tbl_item`.`i_id`', 'LEFT')
		 ->where('m_code', $supplier_id);
		 $this->db->group_by('i_id');
		 $query = $this->db->get();
		 $items = array();
		 return $query->result();
		 
	 }
	  function purchase_invoice_item($id) {
		$array = array('tbl_po_inv_item.po_inv_id' => $id);		
		$this->db->select('tbl_po_inv_item.*, tbl_item.i_code')->from('tbl_po_inv_item')
		->join('tbl_item', 'tbl_item.i_id = tbl_po_inv_item.item_code', 'left')
         ->where($array); 
		$query = $this->db->get();		
		return $query->result();	 
	 }
    
	  function add_purchase_entry($post) {
		  extract($_REQUEST);
		  $created_date=date('Y-m-d h:i:s');
		  $array=array('ref_no'=>$ref_no,'invoice_no'=>$invoice_no,'invoice_date'=>$invoice_date,'supplier_code'=>$supplier_code,'ac_date'=>$ac_date,'ac_amount'=>$ac_amount,'tot_amount'=>$gtotal,'created_date'=>$created_date,'status'=>1);
		  $this->db->set($array);
	    $this->db->insert('tbl_po_inv',$array);
		$insert_id = $this->db->insert_id();
		//$itemname one of the varible array
		for($i = 0; $i < count($item_name); $i++) {
			 $array=array('po_inv_id'=>$insert_id,'item_code'=>$item_name[$i],'batch_no'=>$batch[$i],'exp_date'=>$expiry[$i],'p_rate'=>$purrate[$i],'p_tax'=>$purtax[$i],'s_price'=>$selprice[$i],'s_tax'=>$seltax[$i],'mrp'=>$mrp[$i],'qty'=>$qty[$i],'free'=>$free[$i],'total'=>$total[$i],'date'=>$created_date,'status'=>1);
		  $this->db->set($array);
	    $this->db->insert('tbl_po_inv_item',$array);
		}
		 return $insert_id;
		  
	  }
	  public function purchase_confirm($id)
	{
		$created_date=date('Y-m-d h:i:s');
		$array=array('confirm'=>1);	
	    $this->db->set($array);
	    $this->db->where('po_id',$id);
		$this->db->update('tbl_po_inv',$array);
		return true;
	}
	public function purchase_cancel($id)
	{
		$this->db->where('po_inv_id', $id);
   		$this->db->delete('tbl_po_inv_item');
		$this->db->where('po_id', $id);
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
		 ->join('tbl_item', '`tbl_po_inv_item`.`item_code` = `tbl_item`.`i_id`', 'LEFT')
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
	
	 function get_stock_summary($inps){
		    $session_data = $this->session->all_userdata();
			
			 $this->db->select('tbl_sales_items.*,tbl_sales_items.si_no as no');
			 $this->db->select('tbl_sales.*,tbl_sales.created_date as cds');
			 $this->db->select('tbl_product.*');
			 $this->db->select('purchase_product.*');
			  $this->db->select('cb_customer.customer_name,mob_no1,area_name,cid');
			if(isset($inps['pname']) && $inps['pname']!='')
		    {
			    $this->db->where('tbl_product.i_id', $inps['pname']);	
		    }
			if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
			$this->db->join('tbl_sales','tbl_sales.s_no=tbl_sales_items.tbl_sales_id','left');
			$this->db->join('tbl_product','tbl_product.i_id=tbl_sales_items.tbl_product_id','left');
			$this->db->join('purchase_product','purchase_product.tbl_product_id = tbl_product.i_id','left');
			//$this->db->join('tbl_sales_items','tbl_sales_items.tbl_product_id=tbl_product.i_id','left');
			
			$this->db->join('cb_customer','tbl_sales.customer_code=cb_customer.cid','left');
		     $this->db->order_by('tbl_sales_items.si_no','desc');
			$query = $this->db->get('tbl_sales_items');	
			return $query->result_array();
	 }
	   function getList($inps)
	 {
		 $session_data = $this->session->all_userdata();	
		 $this->db->select('tbl_sales.*,tbl_sales.created_date as cds');
		 $this->db->select('tbl_sales_items.*,tbl_sales_items.si_no as no');
		// $this->db->select('tbl_invoice.*,tbl_invoice.s_no as sno');
		// $this->db->select('tbl_invoice_payment.*');
		 $this->db->select('tbl_product.i_name,i_category');
		 $this->db->select('cb_customer.customer_name,mob_no1,area_name,cid');
		 //$this->db->where('location',$session_data['location']);
		 $this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
		//  $this->db->join('tbl_invoice','tbl_invoice.sales_id=tbl_sales.s_no','left');
		 //  $this->db->join('tbl_invoice_payment','tbl_invoice_payment.tbl_invoice_id=tbl_invoice.s_no','left');
		 $this->db->join('tbl_product','tbl_product.i_id=tbl_sales_items.tbl_product_id','left');
		 $this->db->join('cb_customer','tbl_sales.customer_code=cb_customer.cid','left');
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
			$this->db->where('cb_customer.cid', $inps['cid']);	
		}
		if(isset($inps['area_name']) && $inps['area_name']!='')
		{
			$this->db->like('cb_customer.area_name', $inps['area_name']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->or_where('cb_customer.mob_no1=', $inps['mobile']);	
		}
		
		if(isset($inps['land']) && !empty($inps['land'])){
		$this->db->where('cb_customer.landline_no',$inps['land']);
		}
		  
		 //$this->db->order_by('tbl_invoice.s_no','desc');
		 $query = $this->db->get('tbl_sales')->result_array();
		 //echo $this->db->last_query();
		 return $query;
	 }

	function get_all_customer($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('complaints.*');
		 $this->db->select('cb_customer.cid,cb_customer.customer_name,cb_customer.area_name as an,cb_customer.mob_no1'); 
		 $this->db->select('complaints_tracking.id as ids,complaints_tracking.complaints_id,complaints_tracking.tbl_product_id as pd,amount,payment_method'); 
		 $this->db->select('tbl_product.i_id,i_name');
		 $this->db->select('part_changes.type_id,part_changes.created_date as cd,part_changes.cp_admin_login_id as pcd'); 
		 $this->db->select('cp_admin_login.admin_id,name'); 
		  
		 
		  
		 $this->db->join('cb_customer','cb_customer.cid = complaints.cus_id','left');
		 $this->db->join('complaints_tracking','complaints_tracking.complaints_id = complaints.id','left');
		 $this->db->join('tbl_product','tbl_product.i_id = complaints_tracking.tbl_product_id','left');
		 $this->db->join('part_changes','part_changes.type_id = complaints_tracking.id','left');
		 $this->db->join('cp_admin_login','cp_admin_login.admin_id = part_changes.cp_admin_login_id','left');
		
		
		 
		 
		   if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(complaints.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(complaints.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('cb_customer.cid', $inps['cid']);	
		}
		if(isset($inps['area_name']) && $inps['area_name']!='')
		{
			$this->db->like('cb_customer.area_name', $inps['area_name']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->or_where('cb_customer.mob_no1 =', $inps['mobile']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->or_where('cb_customer.mob_no2 =', $inps['mobile']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->or_where('cb_customer.mob_no3 =', $inps['mobile']);	
		}
		if(isset($inps['land']) && !empty($inps['land'])){
		$this->db->where('cb_customer.landline_no',$inps['land']);
		}
		 if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cb_customer.location',$session_data['location']);
			}
		  $this->db->group_by('complaints_tracking.id');
		 $query = $this->db->get('complaints');	
		// echo $this->db->last_query(); exit;	
        return $query->result();			
	 }
	 function get_customer(){
		$session_data = $this->session->all_userdata();	
		 $this->db->select('*'); 
		 $this->db->from('cb_customer');
		 if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cb_customer.location',$session_data['location']);
			}
		 $query = $this->db->get();		
        return $query->result_array();			
	 }
	 function get_cus($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('cb_customer.*');
		$this->db->select('tbl_cus_advance.*');
		
		$this->db->select('tbl_product.*');
		$this->db->select('pro_type.*');
		if($session_data['location'] !=  'Chennai')
		    {
				$this->db->where('cb_customer.location',$session_data['location']);
			}
			 if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(cb_customer.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(cb_customer.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		/*if(isset($inps['cus_code']) && $inps['cus_code']!='')
		{
			$this->db->where('cb_customer.cid =', $inps['cus_code']);	
		}*/
		if(isset($inps['cid']) && $inps['cid']!='')
		{
			$this->db->where('cb_customer.cid', $inps['cid']);	
		}
		if(isset($inps['area_name']) && $inps['area_name']!='')
		{
			$this->db->like('cb_customer.area_name', $inps['area_name']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->where('cb_customer.mob_no1=', $inps['mobile']);	
		}
		
		if(isset($inps['land']) && !empty($inps['land'])){
		$this->db->where('cb_customer.landline_no',$inps['land']);
		}
		$this->db->join('tbl_cus_advance','tbl_cus_advance.cus_id=cb_customer.cid','left');
		$this->db->join('tbl_product','tbl_product.i_id=tbl_cus_advance.tbl_pro_id','left');
		$this->db->join('pro_type','pro_type.id=tbl_product.i_category','left');
        $query = $this->db->get('cb_customer');	
		return $query->result();			
	 }
	 function get_admin(){
		$session_data = $this->session->all_userdata();	
		$arr =array('3','4');
		$this->db->select('*')->from('cp_admin_login');
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cp_admin_login.employee_location',$session_data['location']);
			}
		$this->db->where_in('user_type',$arr);
		 $query = $this->db->get();		
        return $query->result();			
	 }
	 function get_product(){
		$session_data = $this->session->all_userdata();	
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('i_category','1');
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('tbl_product.employees_location',$session_data['location']);
			}
        $query = $this->db->get();	
		return $query->result_array();
	 }
	 function Get_resullt_cus($type,$inps)
	 {
		 $session_data = $this->session->all_userdata();
		 $this->db->select('tbl_sales.*');
		 $this->db->select('cb_customer.customer_name,area_name,mob_no1,cid');
		 $this->db->select('tbl_cmcamc.amc_st_dt,amc_end_dt');
		 $this->db->select('tbl_sales_items.tbl_product_id');
		  $this->db->select('tbl_product.i_name,descr,i_code,i_category');
		 if($type==1)
		 {
		 	$this->db->where('swarranty_exp_date >=', date('Y-m-d'));
		 }
		 else if($type==2)
		 {
			 $this->db->where('amc_st_dt <=', date('Y-m-d'));
			 $this->db->where('amc_end_dt >=', date('Y-m-d'));
		 }
		 if($type==3)
		 {
			 $this->db->where('tbl_cmcamc.tbl_sales_id IS NULL');
		 }
		 $this->db->join('tbl_cmcamc','tbl_cmcamc.tbl_sales_id=tbl_sales.s_no','left');
		 $this->db->join('cb_customer','cb_customer.cid=tbl_sales.customer_code','left');
		 $this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
		 $this->db->join('tbl_product','tbl_product.i_id=tbl_sales_items.tbl_product_id','left');
		  if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		/*if(isset($inps['cus_code']) && $inps['cus_code']!='')
		{
			$this->db->where('cb_customer.cid =', $inps['cus_code']);	
		}*/
		if(isset($inps['area']) && $inps['area']!='')
		{
			$this->db->like('cb_customer.area_name', $inps['area']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->or_where('cb_customer.mob_no1 =', $inps['mobile']);	
		}
		if(isset($inps['mobile']) && !empty($inps['mobile'])){
		$this->db->or_where('cb_customer.mob_no2',$inps['mobile']);
		}
		if(isset($inps['mobile']) && !empty($inps['mobile'])){
		$this->db->or_where('cb_customer.mob_no3',$inps['mobile']);
		}
		if($session_data['user_type'] !=  5)
		    {
				$this->db->where('cb_customer.location',$session_data['location']);
			}
		 $query = $this->db->get('tbl_sales')->result_array();
		 //echo '<pre>';print_r($query);
		echo $this->db->last_query(); //exit;
		 return $query;
	 }
	 function get_all_customer_cus($inps){
		$session_data = $this->session->all_userdata();	
		$this->db->select('complaints.*');
		 $this->db->select('cb_customer.cid,customer_name,area_name,mob_no1'); 
		 $this->db->join('cb_customer','cb_customer.cid = complaints.cus_id','left');
		   if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(complaints.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(complaints.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		/*if(isset($inps['cus_code']) && $inps['cus_code']!='')
		{
			$this->db->where('cb_customer.cid =', $inps['cus_code']);	
		}*/
		if(isset($inps['area']) && $inps['area']!='')
		{
			$this->db->like('cb_customer.area_name', $inps['area']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->or_where('cb_customer.mob_no1 =', $inps['mobile']);	
		}
		 $query = $this->db->get('complaints');	
		 //echo $this->db->last_query(); exit;	
        return $query->result();			
	 }
	 function getList_cus($inps)
	 {
		 $session_data = $this->session->all_userdata();	
		 $this->db->select('tbl_sales.*,tbl_sales.s_no as tid');
		 $this->db->select('tbl_sales_items.*,tbl_sales_items.si_no as no');
		 $this->db->select('tbl_product.i_name');
		 $this->db->select('cb_customer.customer_name,mob_no1,area_name');
		 $this->db->where('location',$session_data['location']);
		 $this->db->join('tbl_sales_items','tbl_sales_items.tbl_sales_id=tbl_sales.s_no','left');
		 $this->db->join('tbl_product','tbl_product.i_id=tbl_sales_items.tbl_product_id','left');
		 $this->db->join('cb_customer','tbl_sales.customer_code=cb_customer.cid','left');
		 if(isset($inps['from_dt']) && !empty($inps['from_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt']))
		{
			$this->db->where("DATE_FORMAT(tbl_sales.created_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		/*if(isset($inps['cus_code']) && $inps['cus_code']!='')
		{
			$this->db->where('cb_customer.cid =', $inps['cus_code']);	
		}*/
		if(isset($inps['area']) && $inps['area']!='')
		{
			$this->db->like('cb_customer.area_name', $inps['area']);	
		}
		if(isset($inps['mobile']) && $inps['mobile']!='')
		{
			$this->db->or_where('cb_customer.mob_no1 =', $inps['mobile']);	
		}
		 
		 $query = $this->db->get('tbl_sales')->result_array();
		 return $query;
	 }
	 function Get_emp_stock($inps)
	 {
		 $this->db->select('product_total_allocation.*, sum(product_total_allocation.qty) as total_qty,cp_admin_login.name,username,tbl_product.i_name,i_category');
		 $this->db->group_by('tbl_product_id');
		 if($inps['id']!= 'all')
		 {
		 	$this->db->where('product_total_allocation.admin_id',$inps['id']);
		 }
		 if($inps['user_type']=='1')
		 {
			 $this->db->where('user_type',4);
		 }
		 else
		 {
			 $this->db->where('user_type',3);
		 }
		 $this->db->join('cp_admin_login','cp_admin_login.admin_id=product_total_allocation.admin_id','left');
		 $this->db->join('tbl_product','tbl_product.i_id=product_total_allocation.tbl_product_id','left');
		 $query = $this->db->get('product_total_allocation')->result_array();
		// echo $this->db->last_query(); exit;
		 return $query;
		
		 
		 
		 /*$this->db->select('product_allocation.*, count(product_allocation.qty) as total_qty,cp_admin_login.name,username,tbl_product.i_name,i_category');
		 $this->db->group_by('tbl_product_id');
		 if($inps['id']!= 'all')
		 {
		 	$this->db->where('product_allocation.admin_id',$inps['id']);
		 }
		 if($inps['user_type']=='1')
		 {
			 $this->db->where('user_type',4);
		 }
		 else
		 {
			 $this->db->where('user_type',3);
		 }
		 $this->db->join('cp_admin_login','cp_admin_login.admin_id=product_allocation.admin_id','left');
		 $this->db->join('tbl_product','tbl_product.i_id=product_allocation.tbl_product_id','left');
		 $query = $this->db->get('product_allocation')->result_array();
		 return $query;*/
	 }
	 function Get_amc_reports($inps,$cus)
	 {
		 $this->db->select('part_changes.*,part_changes.created_date as vis_dt');
		 $this->db->select('tbl_sales.customer_code,remarks');
		 $this->db->select('tbl_cmcamc.*');
		 $this->db->select('tbl_product.i_name');
		 $this->db->select('amc_payment.*');
		 $this->db->select('cp_admin_login.admin_id,name as uname');
		 $this->db->where('part_changes.changed_type','amc');
		 if(isset($cus['cid']) && !empty($cus['cid']))
		  {
		$this->db->where('tbl_sales.customer_code',$cus['cid']);
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt'])){
		$this->db->where("DATE_FORMAT(warranty_start_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt'])){
		$this->db->where("DATE_FORMAT(swarranty_exp_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		 $this->db->join('part_changes','tbl_cmcamc.s_no = part_changes.type_id','left');
		 $this->db->join('tbl_sales','tbl_sales.s_no = tbl_cmcamc.tbl_sales_id','left');
		 $this->db->join('cb_customer','cb_customer.cid = tbl_sales.customer_code','left');
		 $this->db->join('tbl_product','tbl_product.i_id = part_changes.tbl_product_id','left');
		 $this->db->join('amc_payment','amc_payment.tbl_cmcamc_id = tbl_cmcamc.s_no','left');
		  $this->db->join('cp_admin_login','cp_admin_login.admin_id = part_changes.cp_admin_login_id','left');
		  $this->db->group_by('tbl_cmcamc.s_no');
		 $query = $this->db->get('tbl_cmcamc')->result_array();
		 //echo '<pre>';print_r($query); //exit;
		 return $query;
	 }
	 function Get_amcwitoutsale_report($inps,$cus)
	 {
		 $this->db->select('part_changes.*,part_changes.created_date as vis_dt');
		 $this->db->select('tbl_cmcamc.*');
		 $this->db->select('tbl_product.i_name');
		 $this->db->select('amc_payment.*');
		 $this->db->select('cp_admin_login.admin_id,name as uname');
		 $this->db->where('part_changes.changed_type','amc without sale');
		 if(isset($cus['cid']) && !empty($cus['cid']))
		  {
		$this->db->where('tbl_cmcamc.cb_customer_id',$cus['cid']);
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt'])){
		$this->db->where("DATE_FORMAT(warranty_start_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt'])){
		$this->db->where("DATE_FORMAT(swarranty_exp_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		 $this->db->join('part_changes','tbl_cmcamc.s_no = part_changes.type_id','left');
		 $this->db->join('cb_customer','cb_customer.cid = tbl_cmcamc.cb_customer_id','left');
		 $this->db->join('tbl_product','tbl_product.i_id = part_changes.tbl_product_id','left');
		 $this->db->join('amc_payment','amc_payment.tbl_cmcamc_id = tbl_cmcamc.s_no','left');
		  $this->db->join('cp_admin_login','cp_admin_login.admin_id = part_changes.cp_admin_login_id','left');
		  $this->db->group_by('tbl_cmcamc.s_no');
		 $query = $this->db->get('tbl_cmcamc')->result_array();
		 //echo '<pre>';print_r($query); exit;
		 return $query;
	 }
	 function Get_complaints_report($inps,$cus)
	 {
		 $this->db->select('complaints.*');
		 $this->db->select('complaints_tracking.id as ids,complaints_tracking.status as tss,cost_type,reference_no,trans_id,cheque_no,bank_name,payment_method,amount,bill_no,complaints_tracking.remarks as remrk');
		 $this->db->select('part_changes.*,part_changes.created_date as vis_dt');
		$this->db->select('tbl_product.i_name');
		  
		 $this->db->select('cp_admin_login.admin_id,name as usernm');
		
		
		 
		 $this->db->where('changed_type','complaint');
		 if(isset($cus['cid']) && !empty($cus['cid']))
		 {
		  $this->db->where('cus_id',$cus['cid']);
		 }
		 $this->db->join('complaints_tracking','complaints_tracking.complaints_id = complaints.id','left');
		 $this->db->join('part_changes','complaints_tracking.id = part_changes.type_id','left');
		 $this->db->join('tbl_product','tbl_product.i_id = part_changes.tbl_product_id','left');
		 $this->db->join('cp_admin_login','cp_admin_login.admin_id = complaints_tracking.cp_admin_login_id','left');
		 
		/* $this->db->join('cb_customer','cb_customer.cid = complaints.cus_id','left');
		 $this->db->join('tbl_sales','tbl_sales.customer_code = cb_customer.cid','left');
		 $this->db->join('tbl_sales_items','tbl_sales_items.tbl_product_id=tbl_product.i_id','left');*/
		$this->db->group_by('complaints.id');
		// $this->db->order_by('complaints_tracking.id','desc');
		 $query = $this->db->get('complaints')->result_array();
		 //echo '<pre>';print_r($query); exit;
		 return $query;
	 }
	  function Get_sale_report($inps,$cus)
	 {
		$this->db->select('tbl_invoice.*');
	    $this->db->select('tbl_invoice_payment.*');
		$this->db->select('tbl_sales.total_amount as amt,tbl_sales.s_no as sno,tbl_sales.customer_code,bill_no,vat,remarks,tbl_sales.sale_tec_id as tecid');
		 $this->db->select('cp_admin_login.admin_id,name as usernm');
		$this->db->select('cb_customer.*');
		$this->db->select('tbl_product.*');
		$this->db->select('tbl_sales_items.si_no as sno1,tbl_sales_items.tbl_sales_id,tbl_sales_items.tbl_product_id,tbl_sales_items.quantity,tbl_sales_items.sales_price,tax_amt,model');
	    if(isset($cus['cid']) && !empty($cus['cid'])){
		$this->db->where('cid',$cus['cid']);
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt'])){
		$this->db->where("DATE_FORMAT(warranty_start_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt'])){
		$this->db->where("DATE_FORMAT(swarranty_exp_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
	$this->db->join('tbl_invoice_payment', 'tbl_invoice.s_no = tbl_invoice_payment.tbl_invoice_id', 'left'); 
	$this->db->join('tbl_sales', 'tbl_sales.s_no = tbl_invoice.sales_id', 'left'); 
	$this->db->join('cp_admin_login','cp_admin_login.admin_id = tbl_invoice_payment.sale_tec_id', 'left');
	$this->db->join('cb_customer', 'cb_customer.cid = tbl_sales.customer_code', 'left');
	$this->db->join('tbl_sales_items', 'tbl_sales_items.tbl_sales_id = tbl_sales.s_no', 'left');  
	$this->db->join('tbl_product', 'tbl_product.i_id = tbl_sales_items.tbl_product_id', 'left');
	 $query = $this->db->get('tbl_invoice')->result_array();
	 //echo '<pre>';print_r($query); exit;
		 return $query;
	 }
	 function Get_ms_report($inps,$cus)
	 {
		 $this->db->select('part_changes.*,part_changes.created_date as vis_dt');
		 $this->db->select('tbl_pms.bill_no,pms_status,amount,reference_no,cheque_no,bank_name,trans_id,payment_method,tbl_pms.remarks as rsm');
		 $this->db->select('cp_admin_login.admin_id,name as usernm');
		 $this->db->select('tbl_product.i_name');
		 $this->db->select('tbl_sales.customer_code');
		 $this->db->select('cb_customer.*');
		 $this->db->where('part_changes.changed_type','MS Pending');
		 
		if(isset($cus['cid']) && !empty($cus['cid'])){
		$this->db->where('cid',$cus['cid']);
		}
		if(isset($inps['from_dt']) && !empty($inps['from_dt'])){
		$this->db->where("DATE_FORMAT(warranty_start_date,'%Y-%m-%d')>=",date('Y-m-d',strtotime($inps['from_dt'])));
		}
		if(isset($inps['to_dt']) && !empty($inps['to_dt'])){
		$this->db->where("DATE_FORMAT(swarranty_exp_date,'%Y-%m-%d')<=",date('Y-m-d',strtotime($inps['to_dt'])));
		}
		
		 $this->db->join('tbl_pms','tbl_pms.id = part_changes.type_id','left');
		 $this->db->join('cp_admin_login','cp_admin_login.admin_id = part_changes.cp_admin_login_id','left');
		 $this->db->join('tbl_product','tbl_product.i_id = part_changes.tbl_product_id','left');
		 $this->db->join('tbl_sales','tbl_sales.s_no = tbl_pms.tbl_sales_id','left');
		 $this->db->join('cb_customer', 'cb_customer.cid = tbl_sales.customer_code', 'left');
		 
		
		$this->db->group_by('part_changes.id');
		// $this->db->order_by('complaints_tracking.id','desc');
		 $query = $this->db->get('part_changes')->result_array();
		 //echo '<pre>';print_r($query); exit;
		 return $query;
	 }

}