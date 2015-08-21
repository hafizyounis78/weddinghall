<?php
class Pages extends CI_Controller 
{
	
	function view ( $page = 'home')
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
			$data['users'] = $this->users($data);
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/quicksidebar.php');
			$this->load->view('templates/footer');
		}
	}
	
	function users($data)
	{
		$this->load->model('usermodel');
		return $this->usermodel->get_users();
		//$this->load->view('users_view', $data);
	}
}
?>