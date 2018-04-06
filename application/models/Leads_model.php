<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct(){
          // Call the Model constructor
		  parent::__construct();
		  
     }
	 function get_leads($inps)
	 {
		 $this->db->select('tbl_leads.*,product_selling_price.price,inr_rates');
		 if(isset($inps['pono']) && $inps['pono']!='')
		    {
			    $this->db->where('tbl_leads.po_no', $inps['pono']);	
		    }
			 if(isset($inps['date']) && $inps['date']!='')
		    {
			    $this->db->where('tbl_leads.po_date', $inps['date']);	
		    }
		 $this->db->join('product_selling_price','product_selling_price.part_no = tbl_leads.part_no','left');
		$this->db->order_by('tbl_leads.id','desc');
		$query = $this->db->get('tbl_leads')->result_array();
		 return $query;
	 }
	
}



 
