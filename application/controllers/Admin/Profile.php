<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $libraries = array('CheckAuth','Phpfunctions','layouts','form_validation');
        $this->load->library($libraries);

        $this->load->model("ModProfile");
    }
    
	public function index()
	{    
        $this->load->library('layouts');
        $this->layouts->set_title('Profile');
        $this->layouts->view('Admin/profile');
        
	}


    public function upload_single_file($old_image)
    {

            $config['upload_path']          = dirname($_SERVER["SCRIPT_FILENAME"])."/assets/user_img";
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image'))
            {
               return $old_image;

            }
            else
            {
                $data = array('upload_data' => $this->upload->data());

                if(!empty($data)){
        
                    return $data['upload_data']['file_name'];                           
        
                }
            }


    }


    public function Update() {
        
        if($_POST['ProfileUpdate']) {

            $data = $_POST;

            $data['use_image'] = $this->upload_single_file( $data['use_old_image']);

            unset($data['ProfileUpdate']);
            unset($data['use_old_image']);

            $this->ModProfile->Update($data);

            redirect("profile");

        }else{
            echo "not found";
        }

    }
    

    
}