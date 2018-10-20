<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Home extends Front_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	{
		parent::__construct();
		$this->load->model('other_model');
	}

	

	function _remap()
	{	
	$segment_1 = $this->uri->segment(1);
	switch ($segment_1) {
		case null:
		case false:
		
		case '':
			$this->index();
		break;
			
		case 'page':
			$this->page();
		break;
			
		case 'single':
			$this->single();
		break;
			
		case 'export_word':
			$this->export_word();
		break;	
			
		case 'export_excel':
			$this->export_excel();
		break;		
		
		case 'error_404':
			$this->error_404();
		break;
		
		

	default:
		//This is just an example to show 
		//the 404 page if the page doesn't exist
		$this->db->where('url_title',$segment_1);
		$db_result = $this->db->get('home');

		if($db_result->num_rows() == 1)
		{
			$this->view($segment_1);
		}
		else
		{
			show_404();
		}
	break;
	}

}	


	public function index()
	{
		redirect("/page");
	}
	

	function page()
	{ 
			
			$this->data['tot_record'] = $this->other_model->rc_sanyasi();
		    $this->load->library("pagination");
		    $config = array();
			$config['base_url'] = base_url()."/page/";
			$config['suffix'] = '?'.$_SERVER['QUERY_STRING'];
			$config['total_rows'] = $this->other_model->rc_sanyasi();
			$config['per_page'] = 20;
			
			$config['full_tag_open'] = '<ul class="clearfix">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li ><a href="#" class="active">';
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
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? ($this->uri->segment(2)) : 0;
			$this->data["sanyasi"] = $this->other_model->get_sanyasi_list($config['per_page'],$page);
			$this->data["links"] = $this->pagination->create_links();
			$this->data["count"] = $page;
			$this->data['sannyas_page']='sannyas';
			$this->load->view('pages/home' , $this->data);
	}
	
	public function error_404()
	{
		$this->data['jouskaa_page']='error';
		$this->load->view('pages/pages', $this->data);
	}
	
	public function single()
	{
		$tot_record = $this->other_model->record_count_sannyas($this->uri->segment(2));
		if (empty($tot_record)) { show_404();}
		$this->data['row']= $this->other_model->get_sannyas_sel($this->uri->segment(2));
		$this->data['sannyas_page']='sannyas_detail';
		$this->load->view('pages/home', $this->data);
		
	}
	
	public function export_word()
	{
		$tot_record = $this->other_model->record_count_sannyas($this->uri->segment(2));
		if (empty($tot_record)) { show_404();}
		$this->data['row']= $this->other_model->get_sannyas_sel($this->uri->segment(2));
		$this->load->view('pages/page/export_word', $this->data);
		$this->load->helper('string');
		$rn= random_string('alnum', 7);
		$filename =strtolower(preg_replace("![^a-z0-9]+!i", "_", $this->data['row']->sanyas_name.'_'.$rn));
        header('Content-type: application/ms-word');
        header('Content-Disposition: attachment; filename='.$filename.'.doc');
	}
	
	public function export_excel()
	{
		$this->data['result']= $this->other_model->get_excel_list();
		$this->load->view('pages/page/export_excel', $this->data);
		$this->load->helper('string');
		$rn= random_string('alnum', 7);
		$filename ='sanyas_list_'.$rn;
         header('Content-type: application/ms-xcel');
        header('Content-Disposition: attachment; filename='.$filename.'.xls');
	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */