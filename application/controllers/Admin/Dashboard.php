<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('CheckAuth');
    }
    
	public function index()
	{
        $this->load->library('layouts');
        $this->layouts->set_title('Dashboard');
        $this->layouts->view('Admin/dashboard');
        
	}

}