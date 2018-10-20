<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MYadmin_Controller {

	
public function __construct()
	{
		parent::__construct();
		//always check if session userdata value "logged_in" is not TRUE
		if(!$this->session->userdata("is_logged_in"))
		{
			redirect('myadmin');
		}

	}
	
	public function index()
	{
		redirect("myadmin/users/page/");
	}
	
	public function page()
	{
		if($this->session->userdata('is_logged_in'))
		{
			
			$this->load->model('admin/users_model');
			$this->data['users']= $this->users_model->get_users();
				
			$this->load->view('admin/users/users', $this->data);
			
		}
		else
		{
			$this->load->view('admin/login', $this->data);
		}
	}
	
	public function add_users()
	{
		$this->form_validation->set_rules('userName', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE)
		{	
		
			$this->load->view('admin/users/add_users', $this->data);
		}
		else
		{   
		    
			$this->load->model('admin/users_model');
			$result=$this->users_model->add_users();
			if($result)
			{  
			
			
				$this->session->set_flashdata('message', 'Add successfully');
				$again = isset($_POST['again'])?$_POST['again']:"";
				if($again==1)
               { redirect("myadmin/users/add_users/"); }
				redirect("myadmin/users/page/");
			}
			else
			{
				redirect("myadmin/users/add?result=user-added-failed");
			}
		}
	}
	
	public function edit_users()
	{
		$this->form_validation->set_rules('fullName', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('userName', 'Username', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->model('admin/users_model');
			$tot_record = $this->users_model->record_count_users($this->uri->segment(4));
		    if (empty($tot_record)) { show_404();}
			$this->data['row']= $this->users_model->get_user_sel($this->uri->segment(4));
			$this->load->view('admin/users/edit_users', $this->data);
			
			
		}
		else
		{
			$this->load->model('admin/users_model');
			$result=$this->users_model->update_user_data($this->uri->segment(4));
			if($result)
			{
				$this->session->set_flashdata('message', 'Updated successfully');
				 $again = isset($_POST['again'])?$_POST['again']:"";
				if($again==1)
               { redirect("myadmin/users/edit_users/{$this->uri->segment(4)}"); }
				redirect("myadmin/users/page/");
			}
			else
			{
				redirect("myadmin/users/?result=user-update-failed");
			}
		}
	}
	
	public function edit_user_status()
	{       
	    $this->load->model('admin/users_model');
	    $this->users_model->update_user_status();
	}
	
	
	
	public function delete_users()
	{
		 
		$this->load ->model('admin/users_model');
		$data['row']= $this->users_model->get_user_sel($this->uri->segment(4));
		 @unlink("./images/users/".$data['row']->feature_image);
		$result=$this->users_model->delete_users($this->uri->segment(4));
		if($result)
			{
				$this->session->set_flashdata('message', 'Deleted successfully');
				redirect("myadmin/users/page/");
			}
			else
			{
				redirect("myadmin/users?result=user-delete-failed");
			}
	}
	
	public function reset_user_password()
	{
		
		$this->form_validation->set_rules('password','Password','trim|required|matches[c_password]');
        $this->form_validation->set_rules('c_password','Password Confirmation', 'trim|required'); 
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('admin/users/reset_password', $this->data);
		}
		else
		{
			$this->load->model('admin/users_model');
			$result=$this->users_model->reset_user_password($this->session->userdata('admin_id'));
			if($result)
			{
				$this->session->set_flashdata('message', 'Password change successfully');
				redirect("myadmin?result=admin-password-reset");
			}
			else
			{
				redirect("myadmin/users?result=admin-password-reset-failed");
			}
		}
		
	}
	
	public function change_password($id)
	{
		
		$this->form_validation->set_rules('password','Password','trim|required|matches[c_password]');
        $this->form_validation->set_rules('c_password','Password Confirmation', 'trim|required'); 
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('admin/users/change_password', $this->data);
		}
		else
		{
			$this->load->model('admin/users_model');
			$result=$this->users_model->reset_user_password($id);
			if($result)
			{
				$this->session->set_flashdata('message', 'Password change successfully');
				redirect("myadmin/users/page/");
			}
			else
			{
				redirect("myadmin/users?result=admin-password-reset-failed");
			}
		}
		
	}

	
	
}

