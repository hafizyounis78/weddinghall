<?php

class Empmodel extends CI_Model
{

public function get_employee()
    {
        $query = $this->db->get('employee');
		return $query->result();


    }


}


?>