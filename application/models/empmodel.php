<?php

class Empmodel extends CI_Model
{

	public function get_employee()
    {
		$myquery="SELECT employee.* , job_tb.* FROM employee, job_tb WHERE employee.job = job_tb.job_code";
		return $this->db->query($myquery);
      
     }
	public function get_emp_by_code($emp_code)
	{
		$this->db->where('emp_code',$emp_code);
		$query = $this->db->get('employee');
		return $query->result();
	}
	public function get_emp_by_id($emp_id)
	{
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get('employee');
		return $query->result();
	}
    public function update_emp()
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
		//print_r($_POST);
		//exit;
        $this->db->where('emp_code', $emp_code);
        $this->db->update('employee', $data);

    }
	
public function add_employee()
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

public function get_curr_emp($empId)
    {
  $this->db->where('emp_code', $empId);
	      $query = $this->db->get('employee');
		  return $query->result();
//		  echo $query->result();

	   
    }


public function del_employee($empId)
    {
		//extract($_POST);
		//$data['emp_code']= $emp_code;
        $this->db->where('emp_code', $empId);
        $this->db->delete('employee');


    }
}


?>