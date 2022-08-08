<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {
    
    public function __construct()
    {

        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        $this->load->model("ModTeachers");
        
    }
    
    // Main Function
    
	public function index()
	{

            $this->load->library('layouts');
            $this->layouts->view('Admin/teachers/main');

	}

    

    public function detail($use_id){

        $data['use_id'] = $use_id;
        $this->load->view('Admin/teachers/detail',$data,TRUE);
        
        $this->load->library('layouts');
        $this->layouts->view('Admin/teachers/detail');

    }



    public function add(){
        
        if(isset($_POST['addTeacher'])){

            $data = $_POST;

            $data2 = array(
                'cla_id' => $data['cla_id'],
                'sec_id' => $data['sec_id']
            );
            
            unset($data['addTeacher']);
            unset($data['cla_id']);
            unset($data['sec_id']);

            $digits = 3;
            $digits_2 = 8;

            $data['use_username'] = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $data['use_password'] = rand(pow(10, $digits_2-1), pow(10, $digits_2)-1);

            $data['ust_id'] = 3;
            $data['use_image'] = $this->upload_single_file();
            
            unset($data['image']);

            $this->ModTeachers->AddTeacher($data);

            

            $data_user = array(
                
                'sch_id' => $this->session->userdata['sch_id'],
                'use_id' => $this->db->get_where('bz_users', array('use_username' => $data['use_username']))->row()->use_id,
                'cla_id' => $data2['cla_id'],
                'sec_id' => $data2['sec_id']

            );


            $this->ModTeachers->AddTeacher2($data_user);

            
            redirect("teachers");

        }else{

            $this->load->library('layouts');
            $this->layouts->view('Admin/teachers/add');

        }

    }

    public function upload_single_file()
    {

            $config['upload_path']          = dirname($_SERVER["SCRIPT_FILENAME"])."/assets/user_img";
            $config['allowed_types']        = 'gif|jpg|png|jpeg';


            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());
        
                print_r($error);
                exit;
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());

                if(!empty($data)){
        
                    return $data['upload_data']['file_name'];                           
        

                }
            }

        }
 
}