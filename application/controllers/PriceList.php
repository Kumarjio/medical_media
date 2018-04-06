<?php defined('BASEPATH') OR exit('No direct script access allowed');
class PriceList extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  	  
                $this->load->model('Pricelist_model');
     }
	
	public function index()
	{
        if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}
        $data['title'] = 'View All Products  ';
		$query = $this->Pricelist_model->get_prices($inps);
		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','Vendor Name','Product Description','Manufacturer Name','HSN Code','Tax %','Unit','Product Rate') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Price  Report" . date('Ymd') . ".xls";
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
				$newrow[1] = $row['vendor_name'];
				$newrow[2] = $row['i_name'];
				$newrow[3] = $row['manu_name'];
				$newrow[4] = $row['hsn_code'];
				$newrow[5] = $row['tax'];
				$newrow[6] = $row['location_name'];
				$newrow[7] = $row['price'];

			
				
				
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
		$data['get_storage'] = $this->Pricelist_model->get_storage();
		$this->load->view('pricelist', $data);
	}
	
	public function addrate()
	{
        $data['title'] = 'Add Products Rate  ';
		$data['get_product'] = $this->Pricelist_model->get_product();
		$data['vendor'] = $this->Pricelist_model->get_vendor();
		$this->load->view('product_price_add',$data);   
    }

	public function addprice()
	{
		$inps = $this->input->post();
		$conf_id=$this->Pricelist_model->add_price($inps);
		
		$data['title'] = 'PriceList ';
		echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/PriceList')."'</script>";
	}
	public function get_all_det1()
	{
		$inps = $this->input->post();
		$pro = $this->Pricelist_model->get_pro_rows($inps);
		foreach($pro as $row)
			{
				
				$data['serial'] = $row['i_name'];   
			}
			
	echo json_encode($data);
			
			
			
	}
	public function editpricelist($id){
		$data['get_product'] = $this->Pricelist_model->get_product();
		$data['vendor'] = $this->Pricelist_model->get_vendor();
		$data['pricelist'] = $this->Pricelist_model->editpricelist($id);
		$data['title']="Edit Price List";
		$this->load->view('product_price_edit',$data);
	}
	public function editprice($id){
		$inps = $this->input->post();
		$conf_id=$this->Pricelist_model->editprice($id,$inps);
		$data['title'] = 'PriceList ';
		echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/PriceList')."'</script>";
	}
	
}
