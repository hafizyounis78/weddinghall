<?php

class Usermodel extends CI_Model
{

	public function get_users()
    {
        $query = $this->db->get('users');
		return $query->result();
    }
	public function get_user_by_username($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('users');
		return $query->result();
	}
	
	public function insert_user()
	{
		extract($_POST);
		$data['username'] = $username;
		$data['password'] = $password;
		$data['name'] = $name;
		$data['email'] = $email;
		$data['status'] = $status;
		
		$this->db->insert('users',$data);

	}
	public function update_user()
	{
		
	}
	public function delete_user($username)
	{
		$this->db->where('username', $username);
        $this->db->delete('users');
	}
}


?>