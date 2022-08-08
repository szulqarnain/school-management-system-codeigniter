<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CheckAuth extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
    }
    
    public function index(){
        return redirect("login");
        exit();
    }

	public function Login(){
        
		
		if(!isset($this->session->userdata['logged_in'])){
					
			if(!$_POST){

				$this->load->view('login_n');
				
			}else{
				
				$this->load->library('form_validation');
				
				$this->load->model('ModAuth');
				
				$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
				
				
				if ($this->form_validation->run() == FALSE) {
                    
                   // return redirect("CheckAuth/Login");
                    exit();
                    
				}else{
					
					$data = array(
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password')
					);
					
					
					$result = $this->ModAuth->Verify($data);
   
           
                    
					if($result==1){
                        
                        if($_GET['ref']!=""){
                            return redirect($_GET['ref']);
                            exit();
                        }else{
                            $Redirect = base_url("dashboard");
                            return redirect($Redirect);
                            exit();
                        }
                        
					}else{
						$data["error"]="Invalid User Id or Password";
						$this->load->view('login_n',$data);
                        //return redirect("CheckAuth/Login");
                        //exit();
					}
                    
				
				}
			}
		}else{
            $Redirect = base_url("dashboard");
            return redirect($Redirect);
            exit();		
		}
		
	}
	
	public function Logout(){
		
		if(isset($this->session->userdata['logged_in'])){

			// Removing session data
			$sess_array = array(
                    'use_id' => '',
                    'use_name' => '',
                    'use_email' => '',
                    'use_username' => '',
                    'ust_id' => '',
                    'ust_base' => '',
                    'ust_name' => ''
			);

			$this->session->unset_userdata('logged_in', $sess_array);
            return redirect("login");
            exit();

		}else{

            return redirect("login");
            exit();

		}
		
	}
    
}

?>