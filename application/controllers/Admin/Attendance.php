<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
    
    public function __construct()
    {

        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        $this->load->model("ModAttendance");
        
    }
    


    public function mark($slug = null){

        if(isset($_POST['continue'])){

              $data = $_POST;
           
            // $att_type = $data['att_type'];
            // $cla_list = $data['cla_list'];
            // $sec_list = $data['sec_list'];

            // $data['sch_id'] = $this->session->userdata['sch_id'];
            // $this->ModStudents->Attendance($data);
            
             $this->load->view('Admin/attendance/submit-attendance',$data,TRUE);
            
            $this->load->library('layouts');
            $this->layouts->view('Admin/attendance/submit-attendance');
            
            // redirect("classes");

        }else{
            $this->load->library('layouts');
            $this->layouts->view('Admin/attendance/mark');
        }

        if($slug == 2){
            if(isset($_POST['submit'])){


                    //  Add Purchase Items
                     for($i=1;$i<=trim($this->input->post('att_total'));$i++){
                        $att_data = array(
                            'use_id' => trim($this->input->post('use_id_'.$i)),
                            'att_date' => trim($this->input->post('att_date')),
                            'att_status	' => trim($this->input->post('att_status'.$i))
                         );
                         $this->ModAttendance->Add($att_data);
                     }
                   //Update Notification

            }
        }

        // if(isset($_POST['submit'])){

        //        $data = $_POST;
             
        //        $data['use_id'] = $this->session->userdata['use_id'];
        //        $data['att_status'] = $att_status;
        //        if ($att_status == "present"){
        //            $data['att_status'] == '1';
        //        }
        //        else if($att_status == "absent"){
        //            $data['att_status'] == '2';
        //        }
        //         else if($att_status == "leave"){
        //            $data['att_status'] == '3';
        //        }
        //         else if($att_status == "half_leave"){
        //            $data['att_status'] == '4';
        //        }

        //     // $data['sch_id'] = $this->session->userdata['sch_id'];
        //        $this->ModStudents->Attendance($data);
            
             
            
        //     $this->load->library('layouts');
        //     $this->layouts->view('Admin/attendance/submit-attendance');
            
        //     // redirect("classes");

        // }else{
        //     $this->load->library('layouts');
        //     $this->layouts->view('Admin/attendance/mark');
        // }

    }

       public function attendance_data($slug = null){

        if(isset($_POST['continue'])){

            $data = $_POST;


            $this->load->view('Admin/attendance/attendance_data',$data,TRUE);
            
            $this->load->library('layouts');
            $this->layouts->view('Admin/attendance/attendance_data');
            
            // redirect("classes");

        }else{
            $this->load->library('layouts');
            $this->layouts->view('Admin/attendance/mark');
        }
        

    }
    
    
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


    Public function attendance_detail(){

       $this->load->library('layouts');
            $this->layouts->view('Admin/attendance/detail');
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