<?php
class Pages extends CI_Controller 
{
	function view ( $page = 'home', $indata = '')
	{
		if( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			show_404();
		}
		
		if ($page == 'login')
		{
			$data['title'] = $page;
			$this->load->view('templates/header',$data);
			$this->load->view('pages/'.$page,$data);
		}
		else
		{
			$data['title'] = $page;
		
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/stylecustomizer');
			$this->load->view('templates/pageheader');
		if($page == 'users'||$page == 'employee' )
			$data[$page] = $this->$page();
			if($page == 'adduser' && $indata !='')
				$data[$page] = $this->viewupdate($indata);
		if(($page == 'addemp' )&& $indata !='')
				$data[$page] = $this->viewempupdate($indata);

			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/quicksidebar.php');
			$this->load->view('templates/footer');
		}
	}
	
	function users()
	{
		$this->load->model('usermodel');
		return $this->usermodel->get_users();
		 
		//$this->load->view('users_view', $data);
	}
	function adduser()
	{
		$this->load->model('usermodel');
		$this->usermodel->insert_user();
			
	}
	function addhall()
	{
		$this->load->model('hallmodel');
		$this->hallmodel->insert_hall();
			
	}
	function viewupdate($username)
	{
		$this->load->model('usermodel');
		return $this->usermodel->get_user_by_username($username);
	}
	function viewempupdate($emp_code)
	{
		$this->load->model('empmodel');
		return $this->empmodel->get_emp_by_code($emp_code);
	}


	function updateuser()
	{
		$this->load->model('usermodel');
		return $this->usermodel->update_user();
	}
	function deleteuser($username)
	{
		$this->load->model('usermodel');
		return $this->usermodel->delete_user($username);

	}
	function employee()
	{
		$this->load->model('empmodel');
		return $this->empmodel->get_employee();
		 		
	}
	function updateemp($emp_code)
	{
		$this->load->model('empmodel');
		return $this->empmodel->update_emp($emp_code);
	}
	function addemp($emp_code)
	{
		$this->load->model('empmodel');
		if (isset($emp_code)) 
		{
	  	updateemp($emp_code);
		}
		else
		{
		   $this->empmodel->add_employee();
		}
			
		
}
function delemp($empID)
	{
		$this->load->model('empmodel');
		$this->empmodel->del_employee($empID);

}
}
?>