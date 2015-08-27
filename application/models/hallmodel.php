<?php

class Hallmodel extends CI_Model
{

	public function get_hall()
    {
        $query = $this->db->get('wedding_hall');
		return $query->result();
    }
	public function get_hall_by_code($w_code)
	{
		$this->db->where('w_code',$w_code);
		$query = $this->db->get('wedding_hall');
		return $query->result();
	}
	
	public function insert_hall()
	{
		extract($_POST);
		$data['w_name'] = $w_name;
		$data['address'] = $address;
		$data['w_emp'] = $w_emp;

		
		$this->db->insert('wedding_hall',$data);

	}

	public function delete_hall($w_code)
	{
		$this->db->where('w_code', $w_code);
        $this->db->delete('wedding_hall');
	}
}


?>