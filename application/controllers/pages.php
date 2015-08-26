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
	function viewupdate($username)
	{
		$this->load->model('usermodel');
		return $this->usermodel->get_user_by_username($username);
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
	function addemp($empID)
	{
		//echo $empID;

		$this->load->model('empmodel');
		if (isset($empID)) 
		{
//		   echo $this->empmodel->get_curr_emp($empID);

		   return $this->empmodel->get_curr_emp($empID);
		   	//	$this->load->view('pages/'.$page,$empid);
		echo $this->empmodel->get_curr_emp($empID);
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