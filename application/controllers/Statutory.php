<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Statutory extends CI_Controller {
	
	public function __construct(){
          parent::__construct();         
          //load the login model  
		  $session_data = $this->session->all_userdata();
		  if(empty($session_data)) {
			   redirect('login', 'refresh');
		  } 
		  	  
                $this->load->model('Statutory_model');
     }
	
	public function index(){
            $session_data = $this->session->all_userdata();
            if(isset($session_data['company_name'])) {
                    $ccompany = $session_data['company_name'];
            }
            else
                redirect('login', 'refresh');

		$query = $this->Statutory_model->get_products();

		if($query){
			$data['product'] =  $query;
		} else {
			$data['product'] =  '';
		}
                
		$data['title'] = 'View All Statutorylist ::Arrow18 ';
		$this->load->view('Statutorylist', $data);
	}
	
	public function statutoryadd(){
            $session_data = $this->session->all_userdata();
            if(isset($session_data['company_name'])) {
                    $ccompany = $session_data['company_name'];
            }
            else
                redirect('login', 'refresh');
        $data['title'] = 'Add Statutory ::Arrow18 ';
	   	$this->load->view('statutoryadd',$data);   
        }

	public function adddata(){
         $data['title'] = 'Add Statutory ::Arrow18 ';
		 $inps = $this->input->post();
		 $created_date=date('Y-m-d h:i:s');
		 
		 
		 /*if($inps['product_type'] == '')
		 {*/
		            $array=array(
					'product_type'=>$inps['type'],
		           // 'tax_type'=>$inps['taxtype'],
                    'vat'=>$inps['vat'],
					'cst'=>$inps['cst'],
					'service_tax'=>$inps['service_tax'],
                   'created_date'=>$created_date,
					);
		/*}
		 else {
		           $array=array(
				    'product_type'=>$inps['type'],
		            //'tax_type'=>$inps['taxtype'],
                    'cst'=>$inps['cst'],
					'service_tax'=>$inps['service_tax'],
					'created_date'=>$created_date,
					);
		 }*/
		/*  else {
		        $array=array('product_type'=>$inps['type'],
		            'tax_type'=>$inps['taxtype'],
                   'service_tax'=>$inps['service_tax'],
					'created_date'=>$created_date,
					);
		 }*/
	    $this->db->insert('tbl_statutory',$array);
		echo "<script> alert('Successfully Added');window.location= '".base_url('index.php/Statutory')."'</script>";
	}
	
	public function editStatutory($id){
		 $data['title'] = 'Edit Customer :: Vinwars ';
		 $data['customer']=$this->Statutory_model->editStatutory($id);
		 $this->load->view('Statutoryedit',$data);
	}
	public function updateStatutory($id){

		
			$muinput= $this->input->post();
			$manage_category=$this->Statutory_model->update_Statutory($id,$muinput);
			echo "<script> window.location= '".base_url('index.php/Statutory')."'</script>";
		
	}	
}
//echo '<pre>'; print_r(); exit;