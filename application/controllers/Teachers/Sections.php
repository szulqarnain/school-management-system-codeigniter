<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends CI_Controller {
    
    public function __construct()
    {

        parent::__construct();
        
        $libraries = array('CheckAuth','Phpfunctions','layouts');
        $this->load->library($libraries);
        
    }
    
    // Main Function
    
	public function index()
	{
            $data['sec_id'] = $this->db->get_where('bz_teachers', array('use_id' => $this->session->userdata('use_id')))->row()->sec_id;
            $this->load->view('Admin/classes/section',$data,TRUE);
            
            $this->load->library('layouts');
            $this->layouts->view('Admin/classes/section');
    
        
	}


    
}