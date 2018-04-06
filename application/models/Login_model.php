<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

     function __construct(){
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password 
     function authenticate($usr, $pwd){
          $sql = "select * from cp_admin_login where username = '".$usr."' and password = '".$pwd."'  and is_delete = 0";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
	 

	 function forget_Password($email)
       {

          $this->db->select('password')->from('cp_admin_login');
            $this->db->where('email_id', $email);
            $query = $this->db->get();
           if($query->num_rows()==1) 
           {
                foreach($query->result_array() as $row)
                              {
                                   $emp=$row['password'];   
                              }
                                   return $emp;  
           }
           else
           {
               $data="error";
               return $data; 
           }
            
         
     }

}