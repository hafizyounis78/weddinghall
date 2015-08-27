<?php

class Servicemodel extends CI_Model
{

	public function get_service()
    {
        $query = $this->db->get('wedding_services');
		return $query->result();
    }
	public function get_service_by_code($sev_code)
	{
		$this->db->where('sev_code',$sev_code);
		$query = $this->db->get('wedding_services');
		return $query->result();
	}
	
	public function insert_service()
	{
		extract($_POST);
		$data['sev_desc'] = $sev_desc;
		$data['sev_price'] = $sev_price;
			
		$this->db->insert('wedding_services',$data);

	}

	public function delete_service($sev_code)
	{
		$this->db->where('sev_code', $sev_code);
        $this->db->delete('wedding_services');
	}
}


?>