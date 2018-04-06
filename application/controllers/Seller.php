<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Seller extends CI_Controller 
{
	public function __construct()
	{
		  parent::__construct();
		  $this->load->library('session');
		  //load the login model
		  $this->load->model('Seller_model');
		  $this->load->model('Storage_model');
		  
	 }	
	public function index(){

     if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
		$query = $this->Seller_model->get_all_vendor($inps);
		//echo "<pre>";print_r($query);exit;
		if($query){
			$data['vendor'] =  $query;
		} else {
			$data['vendor'] =  '';
		}
		$data['title'] = 'View All Vendor :: A2Z ';
		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','Vendor Name','Address','Credit period','Account No','Bank Name','Bank Branch','IFSC Code','Company PAN No','Aadhar No','Reference Details','Email ID 1','Email ID 2','Email ID 3','Website','Lane Line No 1','Lane Line No 2','Lane Line No 3','Mobile No 1','Contact Person for mobile No1','Mobile No 2','Contact Person for mobile No 2','Mobile No 3','Contact Person for mobile No 3','Dr.Registration No','Reg ID','GST No','Drug Lisence No 1','Drug Lisence No 2','Tax Type','Created Date') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Vendor Report" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$fileName\"");
			header("Content-Type: application/vnd.ms-excel");
			
			$flag = false;
			$cnt = 1;
			$totalamount = 0;
			
			if(!$flag) 
			{
			// display column names as first row
			echo implode("\t", array_values($heading)) . "\n";
			$flag = true; //print '<br>';
			}
			foreach($query as $row) 
			{
if($row['tax_type']=='1')
{
$tax="GST";
}
elseif($row['tax_type']=='2')
{
$tax="IGST";
}

				
				$newrow[0] = $cnt;
				$newrow[1] = $row['vendor_name'];
				$newrow[2] = $row['address'];
				$newrow[3] = $row['v_period'];
				$newrow[4] = $row['account_no'];
				$newrow[5] = $row['bank_name'];
                                $newrow[6] = $row['bank_branch'];
$newrow[7] = $row['ifsc_code'];
$newrow[8] = $row['company_panno'];
$newrow[9] = $row['aadhar_no'];
$newrow[10] = $row['reference_det'];
$newrow[11] = $row['email1'];
$newrow[12] = $row['email2'];
$newrow[13] = $row['email3'];
$newrow[14] = $row['website'];
$newrow[15] = $row['lane_line1'];
$newrow[16] = $row['lane_line2'];
$newrow[17] = $row['lane_line3'];
$newrow[18] = $row['mobile_no1'];
$newrow[19] = $row['contact_person1'];
$newrow[20] = $row['mobile_no2'];
$newrow[21] = $row['contact_person2'];
$newrow[22] = $row['mobile_no3'];
$newrow[23] = $row['contact_person3'];
$newrow[24] = $row['dr_reg_no'];
$newrow[25] = $row['reg_id'];
$newrow[26] = $row['gst_no'];
$newrow[27] = $row['tin_no'];
$newrow[28] = $row['cst_no'];
$newrow[29] = $row['drug_lisence1'];

$newrow[30] = $row['drug_lisence2'];
$newrow[31] = $tax;

			
				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}

		$data['inps'] = $inps; 
		if($query){
			$data['list'] =  $query;
		} else {
			$data['list'] =  '';
		}
		//print_r("<pre>");print_r($data);exit();
		$this->load->view('sellerlist', $data);
	}
	public function view_vendor($id){
		 $data['title'] = 'View Vendor :: A2Z ';
	   	 $data['vendor']=$this->Seller_model->view_vendor($id);
		 $this->load->view('seller_view',$data);
	}
	public function delete_vendor($id)
	{
		$this->Seller_model->delete_vendor($id);
		echo "<script> alert('Successfully deleted');window.location= '".base_url('index.php/Seller')."'</script>"; 

	}
	
	public function add_vendor(){
		    $data['title'] = 'Add Vendor :: A2Z ';
		    $con="*";
            //$data['vendor'] = $this->Seller_model->get_all_vendor();
//print_r( $data['vendor']);exit;
            $this->load->view('add_seller', $data);
	}
	public function addSeller()
	{
        $muinput= $this->input->post();
     	$conf_id=$this->Seller_model->add_seller($muinput);
		redirect($this->config->item('base_url').'index.php/Seller','refresh');

	}
	
	public function edit_seller($id){
		 $data['title'] = 'Edit Vendor :: A2Z ';
	     $data['vendor']=$this->Seller_model->edit_seller($id);
		  $this->load->view('selleredit',$data);
	}
		
	public function update_vendor($id){		
			$muinput= $this->input->post();	
			//print_r($muinput);exit();		
			$manage_category=$this->Seller_model->update_vendor($id,$muinput);
			echo "<script> window.location= '".base_url('index.php/Seller')."'</script>";
			
		
	}	

	
	
}
