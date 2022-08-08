<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {
    
    public function __construct()
    {

        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        $this->load->model("ModClasses");
        
    }
    
    // Main Function
    
	public function index()
	{
        if(isset($_POST['addClass'])){

            $data = $_POST;
            unset($data['addClass']);
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
            $this->layouts->view('Admin/classes/main');
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