<?php
class Other_model extends CI_model 
{
	
	public function rc_sanyasi() 
	{
		
			$keyword = isset($_GET['keyword'])? $_GET['keyword']: '';
			$country = isset($_GET['country'])? $_GET['country']: '';
			$st_date= isset($_GET['start_date'])? $_GET['start_date']: '';
			$ed_date = isset($_GET['end_date'])? $_GET['end_date']: '';
		
		if($keyword!=''){ $this->db->where("(legal_name LIKE '%$keyword%' OR sanyas_name LIKE '%$keyword%' OR address LIKE '%$keyword%' OR profession LIKE '%$keyword%' OR gender LIKE '%$keyword%'   OR phone_no LIKE '%$keyword%' OR email LIKE '%$keyword%' OR website LIKE '%$keyword%' )");}
		if($country!=''){ $this->db->where('country',  $country);}
		if($st_date!=''&&$ed_date!=''){$this->db->where('sanyas_date>=',$st_date AND 'sanyas_date<=',$ed_date);}
		elseif($st_date!=''||$ed_date==''){$this->db->where('sanyas_date>=',$st_date);}
		elseif($st_date==''||$ed_date!=''){$this->db->where('sanyas_date<=',$ed_date);}
		else{};
		return $this->db->count_all_results('tbl_sanyasi');
    }

	public function get_sanyasi_list($limit, $start)
	{
	  
			$keyword = isset($_GET['keyword'])? $_GET['keyword']: '';
			$country = isset($_GET['country'])? $_GET['country']: '';
			$st_date= isset($_GET['start_date'])? $_GET['start_date']: '';
			$ed_date = isset($_GET['end_date'])? $_GET['end_date']: '';
		
		if($keyword!=''){ $this->db->where("(legal_name LIKE '%$keyword%' OR sanyas_name LIKE '%$keyword%' OR address LIKE '%$keyword%' OR profession LIKE '%$keyword%' OR gender LIKE '%$keyword%'   OR phone_no LIKE '%$keyword%' OR email LIKE '%$keyword%' OR website LIKE '%$keyword%' )");}
		if($country!=''){ $this->db->where('country',  $country);}
		if($st_date!=''&&$ed_date!=''){$this->db->where('sanyas_date>=',$st_date AND 'sanyas_date<=',$ed_date);}
		elseif($st_date!=''||$ed_date==''){$this->db->where('sanyas_date>=',$st_date);}
		elseif($st_date==''||$ed_date!=''){$this->db->where('sanyas_date<=',$ed_date);}
		else{};
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
	
	public function get_excel_list()
	{
	  
			$keyword = isset($_GET['keyword'])? $_GET['keyword']: '';
			$country = isset($_GET['country'])? $_GET['country']: '';
			$st_date= isset($_GET['start_date'])? $_GET['start_date']: '';
			$ed_date = isset($_GET['end_date'])? $_GET['end_date']: '';
		
		if($keyword!=''){ $this->db->where("(legal_name LIKE '%$keyword%' OR sanyas_name LIKE '%$keyword%' OR address LIKE '%$keyword%' OR profession LIKE '%$keyword%' OR gender LIKE '%$keyword%'   OR phone_no LIKE '%$keyword%' OR email LIKE '%$keyword%' OR website LIKE '%$keyword%' )");}
		if($country!=''){ $this->db->where('country',  $country);}
		if($st_date!=''&&$ed_date!=''){$this->db->where('sanyas_date>=',$st_date AND 'sanyas_date<=',$ed_date);}
		elseif($st_date!=''||$ed_date==''){$this->db->where('sanyas_date>=',$st_date);}
		elseif($st_date==''||$ed_date!=''){$this->db->where('sanyas_date<=',$ed_date);}
		else{};
		$this->db->order_by("id", "desc");
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
	
	public function record_count_sannyas($id) 
	{
		$this->db->where('id',$id);
		return $this->db->count_all_results('tbl_sanyasi');
	}

	

	function get_sannyas_sel($id)
	{
		$this->db->where('id',$id);
		$sql = $this->db->get('tbl_sanyasi');
		return $sql->row();
	}
	
	
	
	
}
?>