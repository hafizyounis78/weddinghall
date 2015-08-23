<?php

class Empmodel extends CI_Model
{

public function get_employee()
    {
        $query = $this->db->get('employee');
		return $query->result();


    }
public function add_employee($data)
    {
			extract($_POST);
	   $data = array (
	  
	   	 array('name' => ':emp_id','value'=>  $emp_id),
		 array('name' => ':NAME','value'=>  $name),
	 	 array('name' => ':sex','value'=>  $sex),
		 array('name' => ':dob','value'=>  $dob),
		 array('name' => ':mobile','value'=>  $mobile),
		 array('name' => ':tel','value'=>  $tel),
		 array('name' => ':address','value'=>  $address),
		 array('name' => ':contract_code','value'=>  $contract_code),
		 array('name' => ':salary','value'=>  $salary),
		 array('name' => ':job','value'=>  $job));	
	/*********************************/
         $this->db->insert("employee", $data);

    }


}


?>