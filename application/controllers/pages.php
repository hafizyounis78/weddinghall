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
		if($page == 'users'||$page == 'employee'|| $page == 'hall'||$page == 'services' ||$page == 'booking')
		$data[$page] = $this->$page();
		
		
		if($page == 'addbooking' && $indata !='')
				$data[$page] = $this->viewbookingupdate($indata);
		//print_r($data[$page]);
		//exit;
			if($page == 'adduser' && $indata !='')
				$data[$page] = $this->viewupdate($indata);
				
		if(($page == 'addemp' )&& $indata !='')
				$data[$page] = $this->viewempupdate($indata);
		if(($page == 'addhall' )&& $indata !='')
				$data[$page] = $this->viewhallupdate($indata);
		if(($page == 'addservices' )&& $indata !='')
				$data[$page] = $this->viewserviceupdate($indata);

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
	function addbooking()
	{
		$this->load->model('bookingmodel');
		$this->bookingmodel->insert_booking();
			
	}

	function addhall()
	{
		$this->load->model('hallmodel');
		$this->hallmodel->insert_hall();
			
	}
	function addservices()
	{
		$this->load->model('servicemodel');
		$this->servicemodel->insert_service();
			
	}

	function viewupdate($username)
	{
		$this->load->model('usermodel');
		return $this->usermodel->get_user_by_username($username);
	}
function viewbookingupdate($booking_code)
	{
		$this->load->model('bookingmodel');
		$rec=$this->bookingmodel->get_booking_by_code($booking_code);
		return $rec->result();
	}

function viewhallupdate($w_code)
	{
		$this->load->model('hallmodel');
		return $this->hallmodel->get_hall_by_code($w_code);
	}
function viewserviceupdate($sev_code)
	{
		$this->load->model('servicemodel');
		return $this->servicemodel->get_service_by_code($sev_code);
	}

	function updateuser()
	{
		$this->load->model('usermodel');
		return $this->usermodel->update_user();
	}
	function deletehall($w_code)
	{
		$this->load->model('hallmodel');
		return $this->hallmodel->delete_hall($w_code);

	}
function deletebooking($booking_code)
	{
		$this->load->model('bookingmodel');
		return $this->bookingmodel->delete_booking($booking_code);

	}

	function deleteservice($sev_code)
	{
		$this->load->model('servicemodel');
		return $this->servicemodel->delete_service($sev_code);

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
	function hall()
	{
		$this->load->model('hallmodel');
		return $this->hallmodel->get_hall();
		 		
	}
	function booking()
	{
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_booking();

		//print_r($rec->result());
		//exit;
		return $rec->result();
		 		
	}

	function services()
	{
		$this->load->model('servicemodel');
		return $this->servicemodel->get_service();
		 		
	}

	function updateemp()
	{
		$this->load->model('empmodel');
		return $this->empmodel->update_emp();
	}
	function addemp()
	{
		$this->load->model('empmodel');
		$this->empmodel->add_employee();
	}

	function viewempupdate($emp_code)
	{
		$this->load->model('empmodel');
		return $this->empmodel->get_emp_by_code($emp_code);
	}

function delemp($empID)
	{
		$this->load->model('empmodel');
		$this->empmodel->del_employee($empID);

}
}
?>