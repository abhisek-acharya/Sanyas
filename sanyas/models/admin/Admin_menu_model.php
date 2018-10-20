<?php
class Admin_menu_model extends CI_model {
	
	
	
	public function get_menu_list()
	{
		$query = $this->db->query("SELECT * FROM tbl_admin_menu ORDER by sort_order ASC");
		return $query->result();
	}
	
	public function add_menu()
	{	
	    $data = array(
			'parent_id'		  =>	$_POST['parent_id'],
			'title'		      =>	$_POST['title'],
			'controller_name' =>	$_POST['controller_name'],
			'page_name'		  =>	$_POST['page_name'],
			'status'	      =>	isset($_POST['status'])? $_POST['status']: '0',
			'added_by'	      =>	$this->session->userdata('admin_id')
		);
		if($this->db->insert('tbl_admin_menu', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
			
	}
	
	public function update_order()
	{   
	    foreach($_POST['sort_order'] as $key=>$val)
        {
		  $data = array('sort_order'	=>	$val);
		  $result = $this->db->UPDATE('tbl_admin_menu', $data, array('id' => $key));
		  
		}
	}
	
	public function update_status()
	{
		$id =  $_POST['id'];
        $act = $_POST['act'];
		$data = array('status'	=>	$act);
		$result = $this->db->UPDATE('tbl_admin_menu', $data, array('id' => $id));
		return $result;
	}
	
	 public function record_count_admin_menu($pn) {
        $this->db->WHERE('id',$pn);
		return $this->db->count_all_results('tbl_admin_menu');
    }
	
	function get_menu_sel($id)
      {
        $this->db->WHERE('id',$id);
        $sql = $this->db->get('tbl_admin_menu');
		return $sql->row();
		
      }
	  
	  public function update_menu($id)
	{
		
		$data = array(
			'parent_id'		  =>	$_POST['parent_id'],
			'title'		      =>	$_POST['title'],
			'controller_name' =>	$_POST['controller_name'],
			'page_name'		  =>	$_POST['page_name'],
			'status'	      =>	$_POST['status'],
			'added_by'	      =>	$this->session->userdata('admin_id')
		);
		$result = $this->db->UPDATE('tbl_admin_menu', $data, array('id' => $id));
		return $result;
	}
	
	public function delete_menu($id)
	{
		
		$this->db->WHERE('id',$id);
		$result = $this -> db ->DELETE('tbl_admin_menu');
		return $result;
		
	}
	
	
	public function get_admin_menu_permission_status_sel($admin_id,$row_id)
	{
		$sql = $this->db->query("SELECT * FROM tbl_admin_menu_permision WHERE admin_id='$admin_id' AND menu_id='$row_id' ");
		return $sql->row();
	}
	
	function get_admin_menu_permission_sel($id)
      {
        $this->db->WHERE('id',$id);
        $sql = $this->db->get('tbl_admin_menu_permision');
		return $sql->row();
		
      }
	
	public function set_preference()
	{
		$menu_id =  $_POST['menu_id'];
        $admin_id = $_POST['admin_id'];
		$row_mp_id = $_POST['rowmp_id'];
		
		 if(!empty($row_mp_id))
         {
			 $this->load ->model('admin/users_model');
			 $data['row']= $this->admin_menu_model->get_admin_menu_permission_sel($row_mp_id);
			 $status  =  (($data['row']->status)=="0") ? "1" : "0";
			 $data = array(
				 'admin_id'		=>	$admin_id,
				 'menu_id'		=>	$menu_id,
				 'status'		=>	$status
					);
				 $this->db->UPDATE('tbl_admin_menu_permision', $data, array('id' => $row_mp_id));
		}
         else
       {
         $data = array(
			'admin_id'		=>	$admin_id,
			'menu_id'		=>	$menu_id,
			'status'		=>	1,
		);
		$this->db->insert('tbl_admin_menu_permision', $data);
		}
		
	   }
	
	
	
	
	
	
	
}

?>