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
	   /********************************/
	   	 $data['emp_id']= $emp_id;
		 $data['name']=  $name;
	 	 $data['sex']= $sex;
		 $data['dob']=  $dob;
		 $data['mobile']= $mobile;
		 $data['tel']= $tel;
		 $data['address']=$address;
		 $data['contract_code']= $contract_code;
		 $data['salary']=  $salary;
		 $data['job']=  $job;
	/*********************************/
         $this->db->insert("employee", $data);

    }

public function del_employee()
    {
		extract($_POST);
		$data['emp_code']= $emp_code;
        $this->db->where('emp_code', $data);
        $this->db->delete('employee');


    }
}


?>