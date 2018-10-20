<?php

class Login_model extends CI_model {
	
	function admin_validate()
	{	
		$this->db->WHERE('admin_user_name',$_POST['username']);
		$this->db->WHERE('admin_user_password',md5($_POST['password']));
		$this->db->WHERE('status','1');
		$query = $this->db->get('tbl_admin_user');	
		if($query->num_rows()=='1')
		{
			foreach($query->result() as $row)
			{
				$data = array(
					'admin_id'			=> $row->id,
					'adminusername'		=> $row->admin_user_name,
					'admin_type'		=> $row->admin_type,
                    'no_of_time_login'	=> $row->no_of_time_login,  
					'is_logged_in' 		=> TRUE
				);
			}
			
			$this->session->set_userdata($data);
			
			return TRUE;
		}	
	}
	
	public function admin_user_login_info()
	{
	   $h = "-6";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
       $hm = $h * 57.5; 
       $ms = $hm * 60;
       $gmdate = gmdate("Y-m-d g:i:s A", time()-($ms)); // the "-" can be switched to a plus if that's what your time zone is.
	
	   $data = array(
			'login_time'		=>	$gmdate,
			'no_of_time_login'	=>	$this->session->userdata('no_of_time_login')+1,
			'remote_ip_address'	=>	$_SERVER['REMOTE_ADDR']
		);
       $this->db->UPDATE('tbl_admin_user', $data, array('id' => $this->session->userdata('admin_id')));		
		
	}
	
	public function admin_user_logout_info()
	{
	   $h = "-6";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
       $hm = $h * 57.5; 
       $ms = $hm * 60;
       $gmdate = gmdate("Y-m-d g:i:s A", time()-($ms)); // the "-" can be switched to a plus if that's what your time zone is.
	
	   $data = array(
			'logout_time'		=>	$gmdate,
			'remote_ip_address'	=>	$_SERVER['REMOTE_ADDR']
		);
       $this->db->UPDATE('tbl_admin_user', $data, array('id' => $this->session->userdata('admin_id')));		
		
	}

	

}
?>