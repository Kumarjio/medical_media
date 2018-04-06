<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Advance_payment_list extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  	  
                $this->load->model('Advance_payment_model');
				$this->load->model('Sales_model');
     }
	
	public function index(){
            $session_data = $this->session->all_userdata();
            if(isset($session_data['company_name'])) {
                    $ccompany = $session_data['company_name'];
            }
            else
                redirect('login', 'refresh');

		$query = $this->Advance_payment_model->get_cus();

		if($query){
			$data['product'] =  $query;
		} else {
			$data['product'] =  '';
		}
                
		$data['title'] = 'View All Statutorylist ::Arrow18 ';
		$this->load->view('advancecustomer_list', $data);
	}
	
	public function advanceadd(){
        $session_data = $this->session->all_userdata();
        $data['title'] = 'Add advance ::Arrow18 ';
		$data['customer'] = $this->Sales_model->get_rows();
		$data['item'] = $this->Sales_model->get_all_pro();
	   	$this->load->view('advanceadd',$data);   
        }

	public function adddata(){
         $data['title'] = 'Add advance ::Arrow18 ';
		 $inps = $this->input->post();
		 $created_date=date('Y-m-d h:i:s');
		 $var1 = $this->db->select('cus_id,tbl_pro_id')->where('tbl_pro_id',$inps['pname'])->where('cus_id',$inps['cus_code'])->get('tbl_cus_advance')->result_array();
		 if(isset($var1[0]['tbl_pro_id']) == '')
		 {
				if($inps['payment_method'] == 1 ){
					$ins_ary = array('cus_id'=>$inps['cus_code'],'tbl_pro_id'=>$inps['pname'],'selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'));
					}
					else if($inps['payment_method'] == 2 )
					{
						$ins_ary = array('cus_id'=>$inps['cus_code'],'tbl_pro_id'=>$inps['pname'],'selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'),'cheque_no'=>$inps['che_no'],'bank_name'=>$inps['bank_name']);
					}
					else if($inps['payment_method'] == 3 )
					{
						$ins_ary = array('cus_id'=>$inps['cus_code'],'tbl_pro_id'=>$inps['pname'],'selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'),'reference_no'=>$inps['ref_nos']);
					}
					else if($inps['payment_method'] == 4 )
					{
						$ins_ary = array('cus_id'=>$inps['cus_code'],'tbl_pro_id'=>$inps['pname'],'selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'),'trans_id'=>$inps['trans_id']);
					}
					else if($inps['payment_method'] == 5 )
					{
						$ins_ary = array('cus_id'=>$inps['cus_code'],'tbl_pro_id'=>$inps['pname'],'selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'),'finance_name'=>$inps['finance'],'tot_month'=>$inps['month'],'emi'=>$inps['emi']);
					}
					//echo '<pre>'; print_r($ins_ary); exit;
					$this->db->insert('tbl_cus_advance',$ins_ary);
		 }
		 else
		 {
			 if($inps['payment_method'] == 1 ){
					$ins_ary = array('selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'));
					}
					else if($inps['payment_method'] == 2 )
					{
						$ins_ary = array('selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'),'cheque_no'=>$inps['che_no'],'bank_name'=>$inps['bank_name']);
					}
					else if($inps['payment_method'] == 3 )
					{
						$ins_ary = array('selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'),'reference_no'=>$inps['ref_nos']);
					}
					else if($inps['payment_method'] == 4 )
					{
						$ins_ary = array('selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'),'trans_id'=>$inps['trans_id']);
					}
					else if($inps['payment_method'] == 5 )
					{
						$ins_ary = array('selling_rate'=>$inps['rate'],'amt'=>$inps['advance'],'payment_method'=>$inps['payment_method'],'payment_date'=>date('Y-m-d', strtotime($inps['chq_dt'])),'created_date'=>date('Y-m-d H:i:s'),'finance_name'=>$inps['finance'],'tot_month'=>$inps['month'],'emi'=>$inps['emi']);
					}
					//echo '<pre>'; print_r($ins_ary); exit;
					$this->db->where('tbl_pro_id',$inps['pname']);
					$this->db->where('cus_id',$inps['cus_code']);
					$this->db->update('tbl_cus_advance',$ins_ary);
		 }
		echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/Advance_payment_list')."'</script>";
	}
	
	public function editStatutory($id){
		 $data['title'] = 'Edit Customer :: Vinwars ';
		 $data['customer']=$this->Advance_payment_model->editStatutory($id);
		 $this->load->view('Statutoryedit',$data);
	}
	public function updateStatutory($id){

		
			$muinput= $this->input->post();
			$manage_category=$this->Advance_payment_model->update_Statutory($id,$muinput);
			echo "<script> window.location= '".base_url('index.php/Statutory')."'</script>";
		
	}	
}
//echo '<pre>'; print_r(); exit;