<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MYadmin_Controller {
	
	public function __construct()
	{
		parent::__construct();
		

	}

    public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('admin/users_model');
			$this->load->view('admin/admin.php', $this->data);
		}
		else
		{
			$this->login();
		}
	}

	public function login()
	{
		$this->load->view('admin/login', $this->data);
	}
	
	public function validate_myadmin()
	{
	$this->validate_credentials();	
	}
	
	public function validate_credentials()
	{
		$this->load->model('admin/login_model');
		$query = $this->login_model->admin_validate();
		
		if($query)
		{
				$this->login_model->admin_user_login_info();
				redirect(base_url("/myadmin"));
		}
		else
		{
			    $this->session->set_flashdata('message', 'Invalid Username/Password');
				redirect(base_url("/myadmin"));
		}
	}
	
	public function logout()
	{
		$this->load->model('admin/login_model');
		$this->login_model->admin_user_logout_info();
		$this->session->sess_destroy();
		redirect(base_url("/myadmin"));
	}
	
	
	
	
}

