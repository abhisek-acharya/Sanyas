<?php

class Sanyasi_model extends CI_model {
	
	
	public function rc_sanyasi($keyword) 
	{
		if($this->session->userdata('admin_type')!=1)
	   {
		   if($this->session->userdata('admin_id')!=1)
		   {
			$this->db->where('added_by', $this->session->userdata('admin_id'));   
		   }
	   }
		if($keyword!=''){ $this->db->where("(legal_name LIKE '%$keyword%' OR sanyas_name LIKE '%$keyword%' OR address LIKE '%$keyword%' OR profession LIKE '%$keyword%' OR gender LIKE '%$keyword%' OR country LIKE '%$keyword%'  OR phone_no LIKE '%$keyword%' OR email LIKE '%$keyword%' OR website LIKE '%$keyword%' OR sanyas_date LIKE '%$keyword%')");}
		return $this->db->count_all_results('tbl_sanyasi');
    }

	public function get_sanyasi_list($keyword,$limit, $start)
	{
	  if($this->session->userdata('admin_type')!=1)
	   {
		   if($this->session->userdata('admin_id')!=1)
		   {
			$this->db->where('added_by', $this->session->userdata('admin_id'));   
		   }
	   }
		if($keyword!=''){ $this->db->where("(legal_name LIKE '%$keyword%' OR sanyas_name LIKE '%$keyword%' OR address LIKE '%$keyword%' OR profession LIKE '%$keyword%' OR gender LIKE '%$keyword%' OR country LIKE '%$keyword%'  OR phone_no LIKE '%$keyword%' OR email LIKE '%$keyword%' OR website LIKE '%$keyword%' OR sanyas_date LIKE '%$keyword%')");}
		$this->db->order_by("id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_sanyasi");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
        return false;
		
		}
	}
	
	public function add_sanyasi()
	{	
	    $data = array(
			
			'legal_name'		=>	$_POST['legal_name'],
			'sanyas_name'		=>	$_POST['sanyas_name'],
			'dob'            	=> implode("-",$_POST['dob']), 
			'gender'			=>	$_POST['gender'],
			'country'			=>	isset($_POST['country'])? $_POST['country']: '',
			'address'			=>  $_POST['address'],
			'profession'		=>	isset($_POST['profession'])? $_POST['profession']: '',
			'phone_no'			=>	isset($_POST['phone_no'])? $_POST['phone_no']: '',
			'email'				=>	isset($_POST['email'])? $_POST['email']: '',
			'website'			=>	isset($_POST['website'])? $_POST['website']: '',
			'sanyas_date'		=>	isset($_POST['sanyas_date'])? $_POST['sanyas_date']: '',
			'added_by'			=>	$this->session->userdata('admin_id'),
			'added_date'		=>	date("y-m-d h:i:s"),
			'remarks'			=>	isset($_POST['remarks'])? $_POST['remarks']: '',
			'remote_ip_address'	=>	$_SERVER['REMOTE_ADDR']
		);
		if($this->db->INSERT('tbl_sanyasi', $data))
		{
			return true;
		}
		else
		{
			return false;

		}	
	}
	
	public function record_count_sanyasi($pn) {
	   $add_query = "";
	   if($this->session->userdata('admin_type')!=1)
	   {
	   if($this->session->userdata('admin_id')!=1)
	   {
		 $this->db->WHERE('added_by',$this->session->userdata('admin_id'));
	     }	 
	   }
        $this->db->WHERE('id',$pn);
		return $this->db->count_all_results('tbl_sanyasi');

    }
	
	 function get_sanyasi_sel($id)
      {
        $this->db->WHERE('id',$id);
        $sql = $this->db->get('tbl_sanyasi');
		return $sql->row();

      }
	
	public function update_sanyasi($id)
	{
		if($_POST['added_by']!='')
        { $added=$_POST['added_by']; }
        else
        { $added=$this->session->userdata('admin_id'); }
		
		
	    $data = array(
			'legal_name'		=>	$_POST['legal_name'],
			'sanyas_name'		=>	$_POST['sanyas_name'],
			'dob'            	=> implode("-",$_POST['dob']),
			'gender'			=>	$_POST['gender'],
			'country'			=>	isset($_POST['country'])? $_POST['country']: '',
			'address'			=>  $_POST['address'],
			'profession'		=>	isset($_POST['profession'])? $_POST['profession']: '',
			'phone_no'			=>	isset($_POST['phone_no'])? $_POST['phone_no']: '',
			'email'				=>	isset($_POST['email'])? $_POST['email']: '',
			'website'			=>	isset($_POST['website'])? $_POST['website']: '',
			'sanyas_date'		=>	isset($_POST['sanyas_date'])? $_POST['sanyas_date']: '',
			'added_by'			=>	$added,
			'added_date'		=>	date("y-m-d h:i:s"),
			'remarks'			=>	isset($_POST['remarks'])? $_POST['remarks']: '',
			'remote_ip_address'	=>	$_SERVER['REMOTE_ADDR']
		);
		$result = $this->db->update('tbl_sanyasi', $data, array('id' => $id));
		return $result;

	}
	
	
	public function delete_sanyasi($id)
	{
		
		$this->db->WHERE('id',$id);
		$result = $this ->db->delete('tbl_sanyasi');
		return $result;

	}

	
	

}



?>