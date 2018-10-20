<?php
class Users_model extends CI_model {
	
	
	
	public function get_users()
	{
		$query = $this->db->query("SELECT tu.*,tui.* FROM tbl_admin_user tu, tbl_admin_user_info tui WHERE tu.id=tui.admin_id AND  1=1  ORDER by tu.id ASC");
		return $query->result();
	}
	
	public function add_users()
	{	
		$config['upload_path'] = './images/users/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
		$field_name = "feature_image";
        if (!$this->upload->do_upload($field_name))
		{
	   $upload_data='';
        }
		else
		{
			$upload_data = $this->upload->data();
        }
	   $data = array(
			'admin_user_name'		=>	$_POST['userName'],
			'admin_user_password'	=>	md5($_POST['password']),
			'feature_image'			=>	isset($upload_data['file_name'])? $upload_data['file_name']: '' ,
			'status'				=>	isset($_POST['status'])? $_POST['status']: '0',
			'admin_type'			=>	$_POST['admin_type'],
			'added_by'				=>	$this->session->userdata('admin_id')
		);
		
		$this->db->WHERE('admin_user_name',$_POST['userName']);
		$query = $this->db->get('tbl_admin_user');	
		if($query->num_rows()>='1')
		{
			$this->session->set_flashdata('message', 'Username already exit');
			redirect("myadmin/users/add_users");
		}	
		if($this->db->insert('tbl_admin_user', $data))
		{
			$admin_id = $this->db->insert_id();
			$dataInfo = array (
					'admin_id'			=>	$admin_id,
					'admin_full_name'	=>	$_POST['fullName'],
			        'admin_email'		=>	$_POST['email'],
				);
				$this->db->insert('tbl_admin_user_info', $dataInfo);
			
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
			
	}
	
	 public function record_count_users($pn) {
        $this->db->WHERE('id',$pn);
		return $this->db->count_all_results('tbl_admin_user');
    }
	
	
	  function get_user_sel($id)
      {
		$sql = $this->db->query("SELECT tu.*,tui.* FROM tbl_admin_user tu, tbl_admin_user_info tui WHERE tu.id=tui.admin_id AND tu.id='$id'");
		return $sql->row();
		
      }
	
	public function update_user_data($id)
	{
		$config['upload_path'] = './images/users/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
		$field_name = "feature_image";
        if (!$this->upload->do_upload($field_name))
		{
		$upload_data['file_name'] = $_POST['old_image'];
        }
		else
		{
			$upload_data = $this->upload->data();
			@unlink("./images/users/".$_POST['old_image']);
		}
	   $data = array(
			'admin_user_name'	=>	$_POST['userName'],
			'feature_image'		=>	isset($upload_data['file_name'])? $upload_data['file_name']: '' ,
			'status'			=>	$_POST['status'],
			'admin_type'		=>	$_POST['admin_type'],
			'added_by'			=>	$this->session->userdata('admin_id')
		);
		$dataInfo = array (
					'admin_full_name'	=>	$_POST['fullName'],
			        'admin_email'		=>	$_POST['email'],
				);
	    $this->db->UPDATE('tbl_admin_user', $data, array('id' => $id));
		$this->db->UPDATE('tbl_admin_user_info', $dataInfo, array('admin_id' => $id));		
		
	}
	
	public function update_user_status()
	{
		$id =  $_POST['id'];
        $act = $_POST['act'];
		$data = array('status'	=>	$act);
		$result = $this->db->UPDATE('tbl_admin_user', $data, array('id' => $id));
		return $result;
	}
	
	public function delete_users($id)
	{
		$result = $this->db->query("DELETE tu.*,tui.* FROM tbl_admin_user tu, tbl_admin_user_info tui WHERE tu.id=tui.admin_id AND tu.id='$id'");
		return $result;
		
	}
	
	
	public function reset_user_password($id){
			$data = array (
			'admin_user_password'	=>	md5($_POST['c_password'])
		);
		if($this->db->UPDATE('tbl_admin_user', $data, array('id' => $id)))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
	}
	
	
	
	
	
	
}

?>