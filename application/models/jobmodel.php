<?php

class Jobmodel extends CI_Model
{

	public function get_all_jobs()
    {
        $query = $this->db->get('job_tb');
		return $query->result();
    }
}
?>