<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');	
	
    date_default_timezone_set("Asia/Kolkata");
    
	if(!function_exists('dateformat')) {
		function dateformat($dt){
			$dateArray = explode('/',$dt);			
            $date = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0]; 
			//print_r($date); exit;
			return $date;
		}   
	}
	
    
    
	if(!function_exists('is_logged_in')) {
		function is_logged_in() {
			// Get current CodeIgniter instance
			$CI =& get_instance();
			// We need to use $CI->session instead of $this->session
			$user = $CI->session->userdata('user_data');
			if (!isset($user)) { return false; } else { return true; }
		}
	}

	
	/*if(!function_exists('isAdmin')) {
		function isAdmin($userid){	
		    $ci=& get_instance();
			$this->load->helper('url');		
			if($userid=="") {
			   $this->load->view('login');
			}
		}   
	}
	*/
	
	/*if(!function_exists('fnwelcome')) {
	  function fnwelcome($userId) {
			$ci=& get_instance();
			$ci->load->database();
			$ci->db->select('*');
			$ci->db->where('admin_id', $userId);
			$query = $ci->db->get('ora_personal_details');
			$name = $query->row();
			echo ucfirst($name->first_name)."&nbsp;".ucfirst($name->last_name);
	   }
	}*/
	
	
	
	if (!function_exists('active_link')){
		function active_link($controller) {
			$CI =& get_instance();
			$class = $CI->router->fetch_class();
			return ($class == $controller) ? 'active' : '';
		}
	}

	
  /* if(!function_exists('fnusertype')) {	
		function fnusertype($usr) {
			  if($usr==1) {
				 echo 'Super Admin';  
			  } else if($usr==2) { 
				  echo 'Admin';
			  } else if($usr==3) { 
				  echo 'District Distributor';
			  } else if($usr==4) { 
				  echo 'Distributor';
			  } else if($usr==5) { 
				  echo 'Mandal Distributor';
			  } if($usr==6) { 
				  echo 'Retailor';
			  }
		}
   }*/
   
  /* if (!function_exists('moneyFormatIndia')){
			   function moneyFormatIndia($num){
				$explrestunits = "" ;
				if(strlen($num)>3){
					$lastthree = substr($num, strlen($num)-3, strlen($num));
					$restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
					$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
					$expunit = str_split($restunits, 2);
					for($i=0; $i<sizeof($expunit); $i++){
						// creates each of the 2's group and adds a comma to the end
						if($i==0)
						{
							$explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
						}else{
							$explrestunits .= $expunit[$i].",";
						}
					}
					$thecash = $explrestunits.$lastthree;
				} else {
					$thecash = $num;
				}
				return $thecash; // writes the final format where $currency is the currency symbol.
			}
   }*/