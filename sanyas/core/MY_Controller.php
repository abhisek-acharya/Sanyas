<?php

/**
 * The base controller which is used by the Front and the Admin controllers
 */
	class Base_Controller extends CI_Controller
	{
	
		public function __construct()
		{
		
			parent::__construct();

	    	//load the default libraries
        
       
		}
	
	}//end Base_Controller
	
	class Front_Controller extends Base_Controller 
    {
		public $data=array();
	
		public function __construct()
		{
		parent::__construct();
		
			$this->data['sannyas_header']=$this->load->view('pages/includes/header',null, true);
			$this->data['sannyas_footer']=$this->load->view('pages/includes/footer',null, true);
			
		
		}

	}
		
	class MYadmin_Controller extends Base_Controller 
    	{
		public $data=array();
	
		public function __construct()
		{
		parent::__construct();
			$this->data['header']=$this->load->view('admin/include/header',null, true);
			$this->data['footer']=$this->load->view('admin/include/footer',null, true);
		
		}
		
		
}