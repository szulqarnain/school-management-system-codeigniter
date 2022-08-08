<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
    
    public function __construct()
    {

        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        
    }
    

    public function mark($slug = null){

            $data['att_type'] = "students";
            $data['cla_id'] = $this->db->get_where('bz_teachers', array('use_id' => $this->session->userdata('use_id')))->row()->cla_id;
            $data['sec_id'] = $this->db->get_where('bz_teachers', array('use_id' => $this->session->userdata('use_id')))->row()->sec_id;

            
            $this->load->view('Admin/attendance/submit-attendance',$data,TRUE);
            
            $this->load->library('layouts');
            $this->layouts->view('Admin/attendance/submit-attendance');


    }



    
}