<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_menu extends MYadmin_Controller {

	
public function __construct()
	{
		parent::__construct();
		//always check if session userdata value "logged_in" is not true
		if(!$this->session->userdata("is_logged_in"))
		{
			redirect('myadmin');
		}

	}
	
	public function index()
	{
		redirect("myadmin/admin_menu/page/");
		
	}
	
	public function page()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('admin/admin_menu_model');
			$this->data['menu']= $this->admin_menu_model->get_menu_list();
			$this->load->view('admin/admin_menu/menu', $this->data);
			
		}
		else
		{
			$this->load->view('admin/login', $this->data);
		}
	}
	
	public function add_menu()
	{
		$this->form_validation->set_rules('title', 'Menu Title', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{	
		
			$this->load->view('admin/admin_menu/add_menu', $this->data);
		}
		else
		{   
		    
			$this->load->model('admin/admin_menu_model');
			$result=$this->admin_menu_model->add_menu();
			if($result)
			{  
				$this->session->set_flashdata('message', 'Add successfully');
				$again = isset($_POST['again'])?$_POST['again']:"";
				if($again==1)
               { redirect("myadmin/admin_menu/add_menu/"); }
				redirect("myadmin/admin_menu/page/");
			}
			else
			{
				redirect("myadmin/admin_menu/add?result=menu-added-failed");
			}
		}
	}
	
	
	
	public function edit_status()
	{       
	    $this->load->model('admin/admin_menu_model');
	    $this->admin_menu_model->update_status();
	}
	
	public function change_order()
	{       
	    $this->load->model('admin/admin_menu_model');
	    $this->admin_menu_model->update_order();
		redirect("myadmin/admin_menu/page/");
	}
	
	public function edit_menu()
	{
		$this->form_validation->set_rules('title', 'Menu Title', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->model('admin/admin_menu_model');
			$tot_record = $this->admin_menu_model->record_count_admin_menu($this->uri->segment(4));
			if (empty($tot_record)) { show_404();}
			$this->data['row']= $this->admin_menu_model->get_menu_sel($this->uri->segment(4));
			$this->load->view('admin/admin_menu/edit_menu', $this->data);
		}
		else
		{
			$this->load->model('admin/admin_menu_model');
			$result=$this->admin_menu_model->update_menu($this->uri->segment(4));
			if($result)
			{
				$this->session->set_flashdata('message', 'Updated successfully');
				 $again = isset($_POST['again'])?$_POST['again']:"";
				if($again==1)
               { redirect("myadmin/admin_menu/edit_menu/{$this->uri->segment(4)}"); }
				redirect("myadmin/admin_menu/page/");
			}
			else
			{
				redirect("myadmin/admin_menu/?result=menu-update-failed");
			}
		}
	}
	
	public function delete_menu( )
	{
		$this->load ->model('admin/admin_menu_model');
		$result=$this->admin_menu_model->delete_menu($this->uri->segment(4));
		if($result)
		{
			$this->session->set_flashdata('message', 'Deleted successfully');
			redirect("myadmin/admin_menu/page/");
		}
		else
		{
			redirect("myadmin/add_menu/?result=menu-update-failed");
		}
	}
	
	public function admin_menu_setting($adminId)
	{
		if($this->session->userdata('is_logged_in'))
		{
			 $this->load->model('admin/users_model');
		     $this->data['users']= $this->users_model->get_users();
			 $this->load->model('admin/admin_menu_model');
			 $this->data['menu']= $this->admin_menu_model->get_menu_list();
			 $this->load->view('admin/admin_menu/menu_setting', $this->data);
			
		}
		else
		{
			$this->load->view('admin/login', $this->data);
		}
	}
	
	public function admin_menu_set_preference()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load ->model('admin/admin_menu_model');
			$result=$this->admin_menu_model->set_preference( );
		}
		else
		{
			$this->load->view('admin/login', $this->data);
		}
	}
	
	
	
	
}

