<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    
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
        $this->layouts->view('Admin/products/main');
        
	}

    
}