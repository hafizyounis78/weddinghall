<?php

class Orgmodel extends CI_Model
{

	public function get_org()
    {
        $query = $this->db->get('organizations_tb');
		return $query->result();
    }
	public function get_org_by_code($org_id)
	{
		$this->db->where('org_id',$org_id);
		
		$query = $this->db->get('organizations_tb');
		return $query->result();
	}
		public function insert_org()
	{
		extract($_POST);
		$data['org_desc'] = $org_desc;
		$data['tel'] = $tel;
		$data['mobile'] = $mobile;
		$data['contact_person'] = $contact_person;
		$data['org_status'] = $org_status;

		
		$this->db->insert('organizations_tb',$data);

	}
	public function update_org()
	{
		extract($_POST);
		$data['org_desc'] = $org_desc;
		$data['tel'] = $tel;
		$data['mobile'] = $mobile;
		$data['contact_person'] = $contact_person;
		$data['org_status'] = $org_status;
		
		$this->db->where('org_id',$org_id);
		$this->db->update('organizations_tb',$data);
	}
	public function delete_org($org_id)
	{
		$this->db->where('org_id', $org_id);
        $this->db->delete('organizations_tb');
	}

}
?>
