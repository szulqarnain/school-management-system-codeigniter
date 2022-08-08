<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller {
    
    public function __construct()
    {

        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        $this->load->model("ModSchools");
        
    }
    
    // Main Function
    
	public function index()
	{
        if(isset($_POST['add'])){

            $data = $_POST;
            unset($data['add']);
            $data['sch_id'] = $this->session->userdata['sch_id'];
            $this->ModClasses->AddClass($data);
            redirect("classes");

        }elseif(isset($_POST['AddSec'])){

            $data = $_POST;
            unset($data['AddSec']);

            $this->ModClasses->AddSec($data);

            redirect("classes");
        }else{
            $this->load->library('layouts');
            $this->layouts->view('SuperAdmin/schools/main');
        }
        
	}



    public function detail($sch_id){

        $data['sch_id'] = $sch_id;
        $this->load->view('SuperAdmin/schools/detail',$data,TRUE);
        
        $this->load->library('layouts');
        $this->layouts->view('SuperAdmin/schools/detail');

    }


    public function add(){
        
        if(isset($_POST['add'])){

            $data = $_POST;

            $sch_token = rand(pow(10, 8-1), pow(10, 8)-1);

            $school_data = array(
                'sch_name' => $data['sch_name'],
                'sch_city' => $data['sch_city'],
                'sch_address' => $data['sch_address'],
                'sch_token' => $sch_token
            );
            
            $this->ModSchools->AddSchool($school_data);
            
            unset($data['add']);
            unset($data['sch_name']);
            unset($data['sch_city']);
            unset($data['sch_address']);

            $digits = 3;
            $digits_2 = 8;

            $data['use_username'] = rand(pow(10, $digits-1), pow(10, $digits)-1);

            $data['use_password'] = rand(pow(10, $digits_2-1), pow(10, $digits_2)-1);

            $data['ust_id'] = 2;

            $this->ModSchools->AddUser($data);

            
            $admin_data = array(
                
                'sch_id' => $this->db->get_where('bz_schools', array('sch_token' => $school_data['sch_token']))->row()->sch_id,
                'use_id' => $this->db->get_where('bz_users', array('use_username' => $data['use_username']))->row()->use_id

            );


            $this->ModSchools->AddAdmin($admin_data);

            
            redirect("schools");

        }else{

            $this->load->library('layouts');
            $this->layouts->view('SuperAdmin/schools/add');

        }

    }    

    public function section($sec_id){
        $data['sec_id'] = $sec_id;
        $this->load->view('Admin/classes/section',$data,TRUE);
        
        $this->load->library('layouts');
        $this->layouts->view('Admin/classes/section');

    }


    public function sectionList($cla_id){
        
        $rec = $this->db->get_where('bz_sections', array('cla_id' => $cla_id))->result_array(); foreach ($rec as $row){ ?>
            <option value="<?= $row['sec_id']; ?>"><?= $row['sec_name']; ?></option>
        <?php }

    }
    
}