<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class CheckAuth
{
    
    public function __construct()
    {
        $this->CI =& get_instance();
        if(isset($this->CI->session->userdata['logged_in'])){
            $this->Authenticatoin();  
        }else{
            
            $Segmit = $this->CI->uri->segment(1) . "/" . $this->CI->uri->segment(2);
            $RedirectUrl = "CheckAuth/Login?ref=" . current_url();
			return redirect($RedirectUrl);
            exit();
        }
        
    }
    
    protected function Authenticatoin()
    {
        
        $SuperAdmin = array(
            "",
            "#",
            "dashboard",
            "schools"
         );

        $Admin = array(
            "",
            "#",
            "dashboard",
            "classes",
            "students",
            "teachers",
            "attendance",
            "profile",
            "notifications"
         );
         
        $Teacher = array(
            "",
            "#",
            "dashboard",
            "section",
            "profile",
            "class-attendance"
         );
         
        $Students = array(
            "",
            "#",
            "dashboard",
            "profile",
         );
        //Conditions
        
        if($this->CI->session->userdata('ust_id') == 1)
        {
          $this->VerifyAuth($SuperAdmin);
        }
        elseif($this->CI->session->userdata('ust_id') == 2)
        {
          $this->VerifyAuth($Admin);
        }
        elseif($this->CI->session->userdata('ust_id') == 3)
        {
          $this->VerifyAuth($Teacher);
        }
        elseif($this->CI->session->userdata('ust_id') == 4)
        {
          $this->VerifyAuth($Students);
        }
        
    }
    
    public function VerifyAuth($array){
        $Segmit = $this->CI->uri->segment(1);
        if(in_array($Segmit,$array)){ 
            return true;
        }
         else{
             echo "Module Permission Denied";
             exit();
        } 
    }
}
?>