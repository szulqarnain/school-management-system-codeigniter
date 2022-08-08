<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
    
    public function __construct()
    {

        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        
    }
    
    // Main Function
    
	public function index()
	{
        $this->load->library('layouts');
        $this->layouts->view('Admin/customers/main');
        
	}

    public function FormSubmit(){

        $this->load->library('layouts');

                // Delete Functions 
                if(isset($_POST['delete'])){
              
                    $post_data = $this->input->post();
                    unset($post_data['delete']);
        
                   $this->ModModel->Delete($post_data);
                    
                   $this->phpfunctions->notification('success','Successfull','Record Deleted Successfully');
                    
        
                }
                return redirect('customers'); 


    }
    
}