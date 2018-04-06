<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Storage extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  }		  
          $this->load->model('Storage_model');
//          $this->load->model('OtherMasters_model');
     }
	
	public function index(){		
		$query = $this->Storage_model->get_all_Storage();
		if($query){
			$data['Storage'] =  $query;
		} else {
			$data['Storage'] =  '';
		}
		$data['title'] = 'View All Storage :: ACC ';
		$this->load->view('Storagelist', $data);
	}
	
	public function addStorage1(){
		 $data['title'] = 'Add Storage :: ACC ';
		 $data['head'] = $this->Storage_model->get_all_Storage_loc();
		 $this->load->view('Storageadd',$data);
	}
	
	public function addStorage(){
		
		$this->form_validation->set_rules('Storage_name', 'Storage Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('Location', 'Location', 'required|trim|xss_clean');
		
		
		
		if ($this->form_validation->run() == FALSE) { 
			 $data['title'] = 'Add Storage :: ACC ';
			// echo 'hi'; exit;
//			 $data['head'] = $this->Storage_model->get_head();
 			//$data['area'] = $this->OtherMasters_model->get_all_area();
 			//$data['salesman'] = $this->OtherMasters_model->get_all_salesman();
			 $this->load->view('Storageadd',$data);	
		} else {
			$muinput= $this->security->xss_clean($this->input->post());
			$manage_category=$this->Storage_model->add_Storage($muinput);
			//exit;
			echo "<script> alert('Successfully added');window.location= '".base_url('index.php/Storage')."'</script>";
			
		}
		
		//$this->load->view('productadd', $data);
	}
	
	public function viewStorage($id){
		 $data['title'] = 'View Storage :: ACC ';
	   	 $data['Storage']=$this->Storage_model->view_Storage($id);
		 $this->load->view('Storageview',$data);
	}
	
	public function editStorage1($id){
		 $data['title'] = 'Edit Storage :: A2Z ';
		 $data['Storage']=$this->Storage_model->edit_Storage($id);
		 $this->load->view('Storageedit',$data);
	}
		
	public function updateStorage($id){
			$muinput= $this->input->post();
			$manage_category=$this->Storage_model->update_Storage($id,$muinput);
			echo "<script> alert('Successfully updated');window.location= '".base_url('index.php/Storage')."'</script>";
	}	

	
	public function deleteStorage($id){		
		 $data['delete']=$this->Storage_model->delete_Storage($id);
		 echo "<script> alert('Successfully deleted');window.location= '".base_url('index.php/Storage')."'</script>"; 
	}

		public function listhsn(){	
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}	
		$query = $this->Storage_model->get_all_hsn($inps);
		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','HSN Code','Tax %') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "HSN Report" . date('Ymd') . ".xls";
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
				$newrow[1] = $row['hsn_code'];
				$newrow[2] = $row['tax'];

			
				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['hsn'] =  $query;
		} else {
			$data['hsn'] =  '';
		}
		
		$data['title'] = 'View All Storage :: ACC ';
		$this->load->view('hsnlist', $data);

	}
	
	public function addhsn(){
		 $data['title'] = 'Add Storage :: ACC ';
		 $data['head'] = $this->Storage_model->get_all_Storage_loc();
		 $this->load->view('hsnadd',$data);
	}
	public function savehsn(){
		 $data= $this->input->post();
		 $data['head'] = $this->Storage_model->save_hsn($data);
		 echo "<script> alert('Successfully ADDED');window.location= '".base_url('index.php/Storage/listhsn')."'</script>";
	}
	
	
	public function edithsn($id){
		 $data['title'] = 'Edit Storage :: ACC ';
		 $data['Storage']=$this->Storage_model->edit_hsn($id);
		 $this->load->view('hsnedit',$data);
	}
		
	public function updatehsn($id){
			$muinput= $this->input->post();
			$manage_category=$this->Storage_model->update_hsn($id,$muinput);
			echo "<script> alert('Successfully updated');window.location= '".base_url('index.php/Storage/listhsn')."'</script>";
	}	

	
	public function deletehsn($id){		
		 $data['delete']=$this->Storage_model->delete_Storage($id);
		 echo "<script> alert('Successfully deleted');window.location= '".base_url('index.php/Storage')."'</script>"; 
	}
}