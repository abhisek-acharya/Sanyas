<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sanyasi extends MYadmin_Controller
{
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
		redirect("myadmin/sanyasi/page/");
	}
	
	public function page()
	{
		if($this->session->userdata('is_logged_in'))
		{	
			$keyword = isset($_GET['keyword'])? $_GET['keyword']: '';
			$this->load->model('admin/sanyasi_model');
			$this->data['tot_record'] = $this->sanyasi_model->rc_sanyasi($keyword);
		    $this->load->library("pagination");
		    $config = array();
			$config['base_url'] = base_url()."/myadmin/sanyasi/page/";
			$config['suffix'] = '?'.$_SERVER['QUERY_STRING'];
			$config['total_rows'] = $this->sanyasi_model->rc_sanyasi($keyword);
			$config['per_page'] = 20;
			
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
 			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
            $config['first_link'] = '&lt;&lt;';
			$config['last_link'] = '&gt;&gt;';
			$config['first_url'] = $config['base_url'] . $config['suffix'];
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
			$this->data["sanyasi"] = $this->sanyasi_model->get_sanyasi_list($keyword,$config['per_page'], $page);
			$this->data["links"] = $this->pagination->create_links();
			$this->data["count"] = $page;
		    $this->load->view('admin/sanyasi/sanyasi', $this->data);	
		}
		else
		{
		$this->load->view('admin/login', $this->data);
		}	
	}
	
	public function add_sanyasi()
	{
		$this->form_validation->set_rules('legal_name', 'Legal name', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{	
		$this->load->model('admin/sanyasi_model');
		$this->load->view('admin/sanyasi/add_sanyasi', $this->data);
		}
		else
		{   
		$this->load->model('admin/sanyasi_model');
		$result=$this->sanyasi_model->add_sanyasi();
		if($result)
		{  
		$this->session->set_flashdata('message', 'Add successfully');
		$again = isset($_POST['again'])?$_POST['again']:"";
		if($again==1)
		{ redirect("myadmin/sanyasi/add_sanyasi/"); }
		redirect("myadmin/sanyasi/page/");
		}
		else
		{
		redirect("myadmin/sanyasi/add_sanyasi?result=sanyasi-added-failed");
		}
		}
	}
	
	public function edit_sanyasi($id)
	{
		$this->form_validation->set_rules('legal_name', 'Legal name', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{	
		$this->load->model('admin/sanyasi_model');
		$tot_records = $this->sanyasi_model->record_count_sanyasi($this->uri->segment(4));
		if (empty($tot_records)) { show_404();}
		$this->data['row']= $this->sanyasi_model->get_sanyasi_sel($this->uri->segment(4));
		$this->load->view('admin/sanyasi/edit_sanyasi', $this->data);
		}
		else
		{
		$this->load->model('admin/sanyasi_model');
		$result=$this->sanyasi_model->update_sanyasi($this->uri->segment(4));
		if($result)
		{
		$this->session->set_flashdata('message', 'Updated successfully');
		$again = isset($_POST['again'])?$_POST['again']:"";
		if($again==1)
		{ redirect("myadmin/sanyasi/edit_sanyasi/{$this->uri->segment(4)}"); }
		redirect("myadmin/sanyasi/page/");
		}
		else
		{
		redirect("myadmin/sanyasi/edit_sanyasi?result=sanyasi-update-failed");
		}
		}
	}

	public function delete_sanyasi()
	{
		$this->load ->model('admin/sanyasi_model');
		$data['row']= $this->sanyasi_model->get_sanyasi_sel($this->uri->segment(4));
		$result=$this->sanyasi_model->delete_sanyasi($this->uri->segment(4));
		if($result)
		{
		$this->session->set_flashdata('message', 'Deleted successfully');
		redirect("myadmin/sanyasi/page/");
		}
		else
		{
		redirect("myadmin/sanyasi/page?result=sanyasi-update-failed");
		}

	}
	
	

	

}