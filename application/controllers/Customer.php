<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller 
{
	public function __construct()
	{
		  parent::__construct();
		  $this->load->library('session');
		  //load the login model
		  $this->load->model('Customer_model');
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
		$query = $this->Customer_model->get_all_cus($inps);
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
			$heading = Array ('S.NO','Customer Name ','Address','Credit period','Account No','Bank Name','Bank Branch','IFSC Code','Company PAN No','Aadhar No','Reference Details','Email ID 1','Email ID 2','Email ID 3','Website','Lane Line No 1','Lane Line No 2','Lane Line No 3','Mobile No 1','Contact Person for mobile No1','Mobile No 2','Contact Person for mobile No 2','Mobile No 3','Contact Person for mobile No 3','Dr.Registration No','Reg ID','GST No','Drug Lisence No 1','Drug Lisence No 2','Tax Type','Created Date') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Customer Report" . date('Ymd') . ".xls";
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

				
				if($row['cus_tax_type']=='1')
{$tax="GST";}
elseif($row['cus_tax_type']=='2')
{$tax="IGST";}

				
				$newrow[0] = $cnt;
				$newrow[1] = $row['customer_name'];
				$newrow[2] = $row['cus_address'];
				$newrow[3] = $row['c_period'];
				$newrow[4] = $row['cus_account_no'];
				$newrow[5] = $row['cus_bank_name'];
                                $newrow[6] = $row['cus_bank_branch'];
$newrow[7] = $row['cus_ifsc_code'];
$newrow[8] = $row['cus_company_panno'];
$newrow[9] = $row['cus_aadhar_no'];
$newrow[10] = $row['cus_reference_det'];
$newrow[11] = $row['cus_email1'];
$newrow[12] = $row['cus_email2'];
$newrow[13] = $row['cus_email3'];
$newrow[14] = $row['cus_website'];
$newrow[15] = $row['cus_lane_line1'];
$newrow[16] = $row['cus_lane_line2'];
$newrow[17] = $row['cus_lane_line3'];
$newrow[18] = $row['cus_mobile_no1'];
$newrow[19] = $row['cus_contact_person1'];
$newrow[20] = $row['cus_mobile_no2'];
$newrow[21] = $row['cus_contact_person2'];
$newrow[22] = $row['cus_mobile_no3'];
$newrow[23] = $row['cus_contact_person3'];
$newrow[24] = $row['cus_dr_reg_no'];
$newrow[25] = $row['cus_reg_id'];
$newrow[26] = $row['cus_gst_no'];
$newrow[27] = $row['cus_tin_no'];
$newrow[28] = $row['cus_cst_no'];
$newrow[29] = $row['cus_drug_lisence1'];

$newrow[30] = $row['cus_drug_lisence2'];
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
			$data['vendor'] =  $query;
		} else {
			$data['vendor'] =  '';
		}
		$data['title'] = 'View All Vendor :: A2Z ';
		$this->load->view('cuslist', $data);
	}
	public function view_vendor($id){
		 $data['title'] = 'View Vendor :: A2Z ';
	   	 $data['vendor']=$this->Customer_model->view_cus($id);
		 $this->load->view('cus_view',$data);
	}
	public function delete_cus($id)
	{
		$this->Customer_model->delete_vendor($id);
		echo "<script> alert('Successfully deleted');window.location= '".base_url('index.php/Customer')."'</script>"; 

	}
	
	public function cus_add(){
		    $data['title'] = 'Customer List :: A2Z ';
		    $con="*";
            //$data['vendor'] = $this->Customer_model->get_all_cus();
            $this->load->view('cus_add', $data);
	}
	public function addCUS()
	{
        $muinput= $this->input->post();
     	$conf_id=$this->Customer_model->add_seller($muinput);
		redirect($this->config->item('base_url').'index.php/Customer','refresh');

	}
	
	public function edit_cus($id){
		 $data['title'] = 'Edit Vendor :: A2Z ';
	     $data['vendor']=$this->Customer_model->edit_cus($id);
		  $this->load->view('cusedit',$data);
	}
		
	public function update_cus($id){		
			$muinput= $this->input->post();	
			//print_r($muinput);exit();		
			$manage_category=$this->Customer_model->update_cus($id,$muinput);
			echo "<script> window.location= '".base_url('index.php/Customer')."'</script>";
			
		
	}	

	
	
}
