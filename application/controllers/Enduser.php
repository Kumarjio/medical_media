<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Enduser extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  	  
                $this->load->model('Enduser_model');
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
		$query= $this->Enduser_model->get_prices($inps);
		//echo "<pre>"; print_r($query);exit;
		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','Customer Name','Product Description','HSN Code','Unit','Product Rate') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "End User  Report" . date('Ymd') . ".xls";
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
				$newrow[1] = $row['customer_name'];
				$newrow[2] = $row['i_name'];
				$newrow[3] = $row['hsn_code'];
				$newrow[4] = $row['location_name'];
				$newrow[5] = $row['enduser_price'];
				
				

			
				
				
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
		$data['get_storage'] = $this->Enduser_model->get_storage();
		$this->load->view('enduser_list', $data);
	}
	public function get_comm_rate($pro_id){
		$inps = $this->input->post();
		$pro = $inps['pro_id'];
		$data = $this->Enduser_model->get_comm_rate($pro);
		echo json_encode($data);
	}
	public function enduser_edit($id){
		$data['title'] = 'Edit Enduser Price';
		$data['get_product'] = $this->Enduser_model->get_product();
		$data['customer'] = $this->Enduser_model->get_customer();
		$data['price'] = $this->Enduser_model->enduser_edit($id);
		//print_r("<pre>");print_r($data['price']);exit();
		$this->load->view('enduser_edit', $data);
	}
	public function updateprice($id){
		$inps = $this->input->post();
		$conf_id=$this->Enduser_model->updateprice($id,$inps);
		$data['title'] = 'PriceList ';
		echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/Enduser')."'</script>";
	}
	public function addrate()
	{
        $data['title'] = 'Add Products Rate  ';
		$data['get_product'] = $this->Enduser_model->get_product();
		$data['customer'] = $this->Enduser_model->get_customer();
		$this->load->view('enduser_add',$data);   
    }

	public function addprice()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$conf_id=$this->Enduser_model->add_price($inps);
		
		$data['title'] = 'PriceList ';
		echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/Enduser')."'</script>";
		//redirect('PriceList',refresh);
	}
	public function get_all_det1()
	{
		$inps = $this->input->post();
		//echo '<pre>';print_r($inps);exit;
		$pro = $this->Enduser_model->get_pro_rows($inps);
		//echo '<pre>';print_r($pro);exit;
		//$this->load->view('product_price_add',$pro);*/
	//echo '<pre>';print_r($data);exit;   
		//$c_det = '';
			/*foreach($pro as $row)
		    {
				$c_det .= '<select class="selectpicker form-control uppercase"  name="NITE_'.$row['i_id'].'" id="NIITE_'.$row['i_id'].' "data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option  value="'.$row['i_id'].'"><?php echo '.$row['i_name'].'; ?></option></select><br />';
				}*/
				
		foreach($pro as $row)
			{
				
				$data['serial'] = $row['i_name'];
				//echo '<pre>';print_r($data['serial']);exit;   
			}
			
	echo json_encode($data);
			
			
			
	}
	
}
