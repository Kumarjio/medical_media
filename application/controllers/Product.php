<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		ini_set('max_allowed_packet',36);  	  
                $this->load->model('Product_model');
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
		
$query = $this->Product_model->get_products($inps);

if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','Product Description','Manufacturer Name','HSN Code','Unit Type','Category','Sub Category Name','Common Rate') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Product Master  Report" . date('Ymd') . ".xls";
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
				$newrow[1] = $row['i_name'];
				$newrow[2] = $row['manu_name'];
				$newrow[3] = $row['hsn_code'];
				$newrow[4] = $row['location_name'];
				$newrow[5] = $row['category_name'];
				$newrow[6] = $row['sub_category_name'];
				$newrow[7] = $row['comm_rate'];

			
				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		
		if($query){
			$data['product'] =  $query;
		} else {
			$data['product'] =  '';
		}
             //print_r("<pre>");print_r($data);exit();    
		$data['title'] = 'View All Products ::A2Z ';
		$this->load->view('productlist', $data);
	}
	
	public function productadd(){
            $session_data = $this->session->all_userdata();
            if(isset($session_data['company_name'])) {
                    $ccompany = $session_data['company_name'];
            }
            else
                redirect('login', 'refresh');
        $data['title'] = 'Add products ::ACC ';
	   	$this->load->view('productadd',$data);   
        }

	public function adddata(){
            $session_data = $this->session->all_userdata();
			/*if($this->input->post())
			{
				$inps = $this->input->post();
				$this->db->select('*');
				$this->db->where('i_name',$inps['i_name']);
				$this->db->where('descr',$inps['descr']);
				$rows = $this->db->get('tbl_product')->num_rows();
				if($rows!=0)
				{
					$rows_exist = 'yes';
					$data['i_name'] = 'Product Already Exist';
				}
			}*/
           $inps = $this->input->post();
           //print_r($inps);exit();
           $query = $this->Product_model->adddata($inps);
           echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/Product')."'</script>";
	}
	
	public function productedit($id){
		$data['title'] = 'Edit product :: ACC ';
		$data['product']=$this->Product_model->edit_product($id);
		$this->load->view('productedit',$data);
	}
		
	public function update_product($id){
            $session_data = $this->session->all_userdata();
            $muinput= $this->input->post();
            $manage_category=$this->Product_model->update_product($id,$muinput);
            echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/Product')."'</script>";
       
	}	
        
	public function productadd_old(){
		$categoryQuery = $this->Masters_model->get_all_category();

		if($categoryQuery){
			$data['category'] =  $categoryQuery;
		} else {
			$data['category'] =  '';
		}
		$packingQuery = $this->Masters_model->get_all_packing();
		if($packingQuery){
			$data['packing'] =  $packingQuery;
		} else {
			$data['packing'] =  '';
		}
		$salestaxQuery = $this->Masters_model->get_all_salestax();
		if($salestaxQuery){
			$data['salestax'] =  $salestaxQuery;
		} else {
			$data['salestax'] =  '';
		}
		$purchasetaxQuery = $this->Masters_model->get_all_purchasetax();
		if($purchasetaxQuery){
			$data['purchasetax'] =  $purchasetaxQuery;
		} else {
			$data['purchasetax'] =  '';
		}
		$manufacturerQuery = $this->Manufacturer_model->get_all_manufacturer();
		if($manufacturerQuery){
			$data['manufacturer'] =  $manufacturerQuery;
		} else {
			$data['manufacturer'] =  '';
		}
		$data['title'] = 'Add products :: Unicom ';
	   	$this->load->view('productadd',$data);
		
	}
	
	public function ajaxgetproduct() {
		$data['customer'] = $this->Product_model->get_rows_product();
		//echo '<pre>'; print_r($data['customer']); exit;
		echo json_encode($data['customer']);
	}
	

        public function viewproduct($id){
         $data['title'] = 'View product :: Banyan ';
         $data['product']=$this->Product_model->view_product($id);
         $this->load->view('productview',$data);
	}
	
	public function deleteproduct($id){		
		 $data['delete']=$this->Product_model->delete_product($id);
		 echo "<script> alert('Successfully Deleted');window.location= '".base_url('index.php/Product')."'</script>";

	}
	public function statuschange(){
		$data = array('id' => $this->input->post('id'),'st'=>$this->input->post('st'));
		$statuschange=$this->Product_model->statuschange($data);	
	}
	/*public function check_avail()
	{
		
	}*/
	public function category_list(){
       if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}

		$data['title'] = 'Category list';
		$query = $this->Product_model->category_list($inps);
		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','Category') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Category  Report" . date('Ymd') . ".xls";
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
				$newrow[1] = $row['category_name'];
			
				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['category'] =  $query;
		} else {
			$data['category'] =  '';
		}
		//print_r($data);exit();
		$this->load->view('category_list',$data);
	}
	public function sub_category_list(){
		$data['title'] = 'Sub Category list';
		if($this->input->post())
		{
			$inps = $this->input->post();
		}
		else
		{
			$inps = '';
		}

		$query=$this->Product_model->sub_category_list($inps);
		//print_r($query);exit;

		if(isset($inps['export']))
		{
			
			//$this->load->library("excel");
			$heading = Array ('S.NO','Category Name','Sub Category') ;
			$blankrow = Array('');
			
			function filterData(&$str)
			{
				$str = preg_replace("/\t/", "\\t", $str);
				$str = preg_replace("/\r?\n/", "\\n", $str);
				if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
			}
			
			// file name for download
			$fileName = "Sub Category  Report" . date('Ymd') . ".xls";
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
				$newrow[1] = $row['category_name'];
				$newrow[2] = $row['sub_category_name'];

			//print_r();exit;
				
				
				// filter data
				array_walk($newrow, 'filterData'); ///print '<br>';
				echo implode("\t", array_values($newrow)) . "\n";
				$cnt++;
			}
				
				
				
			exit;
		}
		$data['inps'] = $inps; 
		if($query){
			$data['sub_category'] =  $query;
		} else {
			$data['sub_category'] =  '';
		}
		
		$this->load->view('sub_category_list',$data);
	}
	public function category_entry(){
		$data['title'] = 'Category Add';
		//$data['category']=$this->Product_model->category_list();
		$this->load->view('category_add',$data);
	}
	public function sub_category_entry(){
		$data['title'] = 'Sub Category Add';
                $inps = "";
		$data['sub_category']=$this->Product_model->category_list($inps);
		$this->load->view('sub_category_add',$data);
	}
	public function category_add(){
		$inps = $this->input->post();
		//print_r($inps);exit();
		$data=$this->Product_model->category_add($inps);
		echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/Product/category_list')."'</script>";
	}
	public function sub_category_add(){
		$inps = $this->input->post();
		//print_r($inps);exit();
		$data=$this->Product_model->sub_category_add($inps);
		echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/Product/sub_category_list')."'</script>";
	}
	public function category_edit($id){
		$data['title'] = 'Category Edit';
		$data['category']=$this->Product_model->category_edit($id);
		$this->load->view('category_edit',$data);
	}
	public function sub_category_edit($id){
		$data['title'] = 'Sub Category Edit';
		$data['sub_category']=$this->Product_model->sub_category_edit($id);
		$this->load->view('sub_category_edit',$data);
	}
	public function category_update($id){
		$inps = $this->input->post();
		$data=$this->Product_model->category_update($id,$inps);
		echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/Product/category_list')."'</script>";
	}
	public function sub_category_update($id){
		$inps = $this->input->post();
		$data=$this->Product_model->sub_category_update($id,$inps);
		echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/Product/sub_category_list')."'</script>";
	}
	public function category_delete($id){
		$data=$this->Product_model->category_delete($id);
		echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/Product/sub_category_list')."'</script>";
	}
	public function sub_category_delete($id){
		$data=$this->Product_model->category_delete($id);
		echo "<script> alert('Successfully Updated');window.location= '".base_url('index.php/Product/sub_category_list')."'</script>";
	}
	
}
//echo '<pre>'; print_r(); exit;