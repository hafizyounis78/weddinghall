<?php

class Servicemodel extends CI_Model
{

	public function get_service()
    {$this->db->where('sev_status',1);
        $query = $this->db->get('wedding_services');
		return $query->result();
    }
	public function get_all_service()
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
	public function get_service_price($sev_code)
	{
		$this->db->select('sev_price');
		$this->db->where('sev_code',$sev_code);
		$query = $this->db->get('wedding_services');
		
		return $query->result();
	}
	public function insert_service()
	{
		extract($_POST);
		$data['sev_desc'] = $sev_desc;
		$data['sev_price'] = $sev_price;
		$data['sev_status'] = 1;
			
		$this->db->insert('wedding_services',$data);

	}
	public function update_service()
	{
		extract($_POST);
		$data['sev_code'] = $sev_code;
		$data['sev_desc'] = $sev_desc;
		$data['sev_price'] = $sev_price;
		$data['sev_status'] = $sev_status;
		
		$this->db->where('sev_code',$sev_code);
		$this->db->update('wedding_services',$data);

	}
	public function delete_service($sev_code)
	{
		$this->db->where('sev_code', $sev_code);
        $this->db->delete('wedding_services');
	}
}


?>