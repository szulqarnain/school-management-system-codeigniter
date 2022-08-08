<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notfication extends CI_Controller {
    
    public function __construct()
    {

        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        $this->load->model("ModNotfication");
        
    }
    


 
    
	public function index()
	{
            $this->load->library('layouts');
            $this->layouts->view('Admin/notification/view');
        
	}


    Public function add(){       
        $this->load->library('layouts');
        $this->layouts->view('Admin/notification/add');
    }
     Public function submit(){

           if(isset($_POST['submit'])){

            $data = $_POST;
             $sch_id = $this->session->userdata['sch_id'];
          
            $not_data = array(
                'not_title' => $data['not_title'],
                'not_description' => $data['not_description'],
                'sch_id'=> $sch_id

            );
            
            $this->ModNotfication->Add($not_data);

            
            redirect("notifications");

        }else{

             $this->load->library('layouts');
            $this->layouts->view('Admin/notification/add');

        }
         $this->load->library('layouts');
            $this->layouts->view('Admin/notification/add');
    }




    
  
    
}