<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Employee_model');
        // $this->load->model('Sales_model');
		  //$this->load->model('dealer_model'); 
     }
	
	public function index()	
	{
		$data['title'] = ' A to Z ';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}


		$query= $this->Employee_model->getlocationdetails($inps);
		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','Unit') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Unit Report" . date('Ymd') . ".xls";
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
				
				$newrow[0] = $cnt;
				$newrow[1] = $row['location_name'];
			
				
				
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
		$this->load->view('location_list', $data);
		
	}


	
}
	?>