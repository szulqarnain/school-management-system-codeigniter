<?php 

class Layouts_login{
	
	//hold CI instance
	private $CI;
				
	//hold layout title
	private $layout_title = "Login";
	
	//hold layout description
	private $layout_description = 'Login';
	
	//hold layout description
	private $user_detail = null;
	
	public function __construct(){
		$this->CI =& get_instance();
	}
	
	public function set_title($title){
		$this->layout_title = $title;
	}
	
	public function set_user_detail($user_detail){
		$this->user_detail = $user_detail;
	}
	
	public function set_description($description){
		
		$this->layout_description = $description;
		
	}
	
	public function view($view_name, $layouts = array(), $params = array(), $default = true){
		
		if(is_array($layouts) && count($layouts) >= 1){
			
			foreach($layouts as $layout_key => $layout){
				
				$params[$layout_key] = $this->CI->load->view($layout, $params, true);
				
			}
		} 
		
		if($default){

			//set layout title
			$header_params['layout_title'] = $this->layout_title;
			
			//set layout description
			$header_params['layout_description'] = $this->layout_description;
			
			//render default head
			$this->CI->load->view('layouts/head', $header_params);
			
			//render content
			$this->CI->load->view($view_name,$params);
			
			//render default footer
			$this->CI->load->view('layouts/footer_scripts');
			
		}else{
			//render viewer
			$this->CI->load->view($view_name,$params);
		}
	}
	
}

?>