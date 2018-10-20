<?php
class Help_model extends CI_model {
	
	
	
	public function get_admin_left_menu($log_in_admin_id)
	{
		$query = $this->db->query("SELECT DISTINCT(tm.id),tm.* FROM tbl_admin_menu tm, tbl_admin_menu_permision tmp WHERE tm.status='1' AND tm.parent_id='0' AND tmp.admin_id='$log_in_admin_id' AND tm.id=tmp.menu_id AND tmp.status='1' ORDER by tm.sort_order ASC");
		return $query->result();
	}
	
	public function get_admin_left_sub_menu($menu_id,$log_in_admin_id)
	{
		$query = $this->db->query("SELECT DISTINCT(tm.id),tm.* FROM tbl_admin_menu tm, tbl_admin_menu_permision tmp WHERE tm.status='1' AND tm.parent_id='$menu_id' AND tmp.admin_id='$log_in_admin_id' AND tm.id=tmp.menu_id AND tmp.status='1' ORDER by tm.sort_order ASC");
		return $query->result();
	}
	
	function get_user_added_sel($id)
      {
		$sql = $this->db->query("SELECT tu.*,tui.* FROM tbl_admin_user tu, tbl_admin_user_info tui WHERE tu.id=tui.admin_id AND  tu.id='$id'");
		return $sql->row();
		
      }
	  
	 function get_help_user_sel($id)
      {
		$sql = $this->db->query("SELECT tu.*,tui.* FROM tbl_admin_user tu, tbl_admin_user_info tui WHERE tu.id=tui.admin_id AND tu.id='$id'");
		return $sql->row();
	  }
	  
	 public function get_sub_menu_list($id)
		{
	 	$query = $this->db->query("SELECT * from tbl_menu WHERE parent_id='$id'  ORDER by  sort_order ASC");
		return $query->result();
		}
	
	function get_sub_menu_sel($id)
      {
	   $this->db->where('id',$id);
        $sql = $this->db->get('tbl_menu');
		return $sql->row();
		
      }	
	function get_admin_menu_sel($cn)
      {
	    $this->db->where('controller_name',$cn);
        $sql = $this->db->get('tbl_admin_menu');
		return $sql->row();
		
      }
	
	public function get_country_list()
	{
		$query = $this->db->query("SELECT * from tbl_countries  ORDER by  id ASC");
		return $query->result();
	}
	
	function get_country_sel($id)
    {
		$this->db->where('id',$id);
		$sql = $this->db->get('tbl_countries');
		return $sql->row();

    }	
	
	
}

?>