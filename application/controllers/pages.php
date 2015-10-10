<?php
class Pages extends CI_Controller 
{
	private $bookingdate;
	private $hall;
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
		else if($this->session->userdata('logged_in'))
   		{
     		$session_data = $this->session->userdata('logged_in');
     		$data['username'] = $session_data['username'];

			$data['title'] = $page;
		
			$this->load->view('templates/header',$data);
			$ndata['username'] = $session_data['username'];
			$ndata['notification']=$this->get_booking_notification();
			$ndata['notification_count']=$this->get_booking_notification_count();
			$ndata['payments_notification']=$this->get_payments_notification();
			$ndata['payments_notification_count']=$this->get_payments_notification_count();
		
			$this->load->view('templates/nav',$ndata);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/stylecustomizer');
			//$this->load->view('templates/pageheader');
			if($page == 'users'||$page == 'employee'|| $page == 'hall'||$page == 'services' ||
			   $page == 'booking'||$page == 'payments'||$page == 'emppayments'||$page=='searchpayments'||$page=='searchemppayments'||$page=='searchbooking'||$page=='searchdelbooking'||$page=='organization')
					$data[$page] = $this->$page();
		
			if($page == 'home')
			{
				$data['hall'] =$this->wedding_hall();
			}
			if($page == 'addbooking' && $indata !='')
			{
				// FROM FULL CALENDER
				if(isset($_SESSION['bookingDate']))
				{
					$data['calenderdate'] = $_SESSION['bookingDate'];
					unset($_SESSION['bookingDate']);
				}
				if(isset($_SESSION['bookingHall']))
				{
					$data['calenderhall'] = $_SESSION['bookingHall'];
					unset($_SESSION['bookingHall']);
				}
				//----
				$data[$page] = $this->viewbookingupdate($indata);
				$data['sev'] =$this->get_active_services();
				$data['hall'] =$this->wedding_hall();
				$data['booking_sev'] =$this->booking_details($indata);
				$data['organization'] =$this->organization();
			}
			if($page == 'addemp')
			{

			$data['jobs']=$this->get_jobs();
			$data['contract'] =$this->contract();
			}
			if($page == 'addbooking')
			{
				// FROM FULL CALENDER
				if(isset($_SESSION['bookingDate']))
				{
					$data['calenderdate'] = $_SESSION['bookingDate'];
					unset($_SESSION['bookingDate']);
				}
				if(isset($_SESSION['bookingHall']))
				{
					$data['calenderhall'] = $_SESSION['bookingHall'];
					unset($_SESSION['bookingHall']);
				}
				//----
				
				$data['sev'] =$this->get_active_services();
				$data['hall'] =$this->wedding_hall();
				$data['organization'] =$this->organization();
				
			}
			if($page == 'searchbooking')
			{
				//$data[$page] = $this->viewbookingupdate($indata);
				$data['bookstatus'] =$this->booking_status();
				$data['hall'] =$this->wedding_hall();
				$data['organization'] =$this->organization();
				//	
			}
			if($page == 'searchdelbooking')
			{
				//$data[$page] = $this->viewbookingupdate($indata);
				$data['bookstatus'] =$this->booking_status();
				$data['hall'] =$this->wedding_hall();
				$data['organization'] =$this->organization();
				//	
			}
			if($page == 'searchpaymentsajax')
			{
				//$data[$page] = $this->viewbookingupdate($indata);
				//$data['bookstatus'] =$this->booking_status();
				$data['hall'] =$this->wedding_hall();
				$data['organization'] =$this->organization();
				//	
			}
			if($page == 'searchemppaymentsajax')
			{
				//$data[$page] = $this->viewbookingupdate($indata);
				//$data['bookstatus'] =$this->booking_status();
				$data['contract'] =$this->contract();
				$data['paymenttype'] =$this->paymenttype();
				//	
			}
			//print_r($data[$page]);
			//exit;
			if($page == 'adduser' && $indata !='')
				$data[$page] = $this->viewupdate($indata);
			if($page == 'addpayments' && $indata !='')
			{
				$data[$page] = $this->viewpaydata($indata);
				$data['payment_view'] = $this->payment_view($indata);
				
			}

			if($page == 'addemppayments' && $indata !='')
			{
				$data[$page] = $this->viewemppaydata($indata);
				$data['employee_view']=$this->employee_view($indata);
				
			}

			if(($page == 'addemp' )&& $indata !='')
			{
				$data[$page] = $this->viewempupdate($indata);
				$data['jobs']=$this->get_jobs();
				$data['contract'] =$this->contract();
			}
			if(($page == 'addhall' )&& $indata !='')
				$data[$page] = $this->viewhallupdate($indata);
				
			if(($page == 'addorg' )&& $indata !='')
				$data[$page] = $this->vieworgupdate($indata);
			if(($page == 'addservices' )&& $indata !='')
				$data[$page] = $this->viewserviceupdate($indata);

			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/quicksidebar.php');
			$this->load->view('templates/footer');
		}
		else
   		{
     		//If no session, redirect to login page
     		redirect('login', 'refresh');
   		}
	}
	
	function users()
	{
		$this->load->model('usermodel');
		return $this->usermodel->get_users();
		 
		//$this->load->view('users_view', $data);
	}
	
	function payments()
	{
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_booking();

		//print_r($rec->result());
		//exit;
		return $rec->result();
		 		
	}
	function searchpayments()
	{
	
		$this->load->model('paymentsmodel');
		$rec=$this->paymentsmodel->get_all_payments();
		return $rec->result();
		 		
	}
	function searchemppayments()
	{
	
		$this->load->model('paymentsmodel');
		$rec=$this->paymentsmodel->get_all_emppayments();
		return $rec->result();
		 		
	}

	function emppayments()
	{
		$this->load->model('empmodel');
		return $this->empmodel->get_employee();
		
		//print_r($rec->result());
		//exit;
		return $rec->result();
		 		
	}

	function adduser()
	{
		$this->load->model('usermodel');
		$this->usermodel->insert_user();
			
	}
	function addpayments()
	{
		$this->load->model('paymentsmodel');
		$this->paymentsmodel->insert_payments();
		/****************************************/
	$this->update_payments_datatable();			
	}
	function addemppayments()
	{
		$this->load->model('paymentsmodel');
		$this->paymentsmodel->insert_emppayments();
		$this->update_emppayments_datatable();			
	}

	function delete_selectedservice($sev_code,$booking_code)
	{
		
		$this->load->model('bookingmodel');
		//extract($_POST);
		$this->bookingmodel->delete_selectedservice($sev_code,$booking_code);
		$rec=$this->booking_details($booking_code);
		$i=1;
		$total = 0;
		foreach($rec as $row)
  		{
			$total = $total + $row->sev_price;
			
			echo '<tr class="odd gradeX">';
			echo '<td>'.$i.'</td>';
			echo '<td id="sev_code_td'.$i++.'">'.$row->sev_code.'</td>';
			echo '<td>'.$row->sev_desc.'</td>';
			echo '<td>'.$row->sev_price.'</td>';
			echo '<td> 
									  <button id="btndelemp" name="btndelemp" type="button" class="btn default btn-xs black" onclick="deleteselectedservice('.$row->sev_code.')">
										<i class="fa fa-trash-o"></i> حذف </button>
								  </td>';
			
			echo '</tr>';
			
		}
		echo '<tr align="center" class="odd gradeX">';
		echo '<td colspan="3">المجموع</td>';
		echo '<td id="tdTotal">'.$total.'</td>';
		echo '</tr>';		
			
	}
	function addbooking_details()
	{
		
		$this->load->model('bookingmodel');
		$this->bookingmodel->insert_booking_details();
		extract($_POST);
//		$hdnBookingcode
		$rec=$this->booking_details($hdnBookingcode);
		
		$total = 0;
		$i=1;
		foreach($rec as $row)
  		{
			$total = $total + $row->sev_price;
			
			echo '<tr class="odd gradeX">';
			echo '<td>'.$i.'</td>';
			echo '<td id="sev_code_td'.$i++.'">'.$row->sev_code.'</td>';
			echo '<td>'.$row->sev_desc.'</td>';
			echo '<td>'.$row->sev_price.'</td>';
			echo '<td> 
									  <button id="btndelemp" name="btndelemp" type="button" class="btn default btn-xs black" onclick="deleteselectedservice('.$row->sev_code.')">
										<i class="fa fa-trash-o"></i> حذف </button>
								  </td>';
			
			echo '</tr>';
			
		}
		echo '<tr align="center" class="odd gradeX">';
		echo '<td colspan="3">المجموع</td>';
		echo '<td id="tdTotal">'.$total.'</td>';
		echo '</tr>';		
	}
	function booking_details($booking_code)
	{
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_booking_details_by_code($booking_code);
		
		return $rec->result();
	}

	function updatebooking()
	{
		$this->load->model('bookingmodel');
		return $this->bookingmodel->update_booking();
	}
	function update_payments_datatable()
	{	
		extract($_POST);
//		$hdnBookingcode
		$rec=$this->paymentsmodel->get_payments_by_code($booking_code);
		
		$i=1;
		$total = 0;
		$remaining = 0;
		$required=0;
		foreach($rec->result() as $row)
  		{
								$total = $total + $row->payment_amount;
								$required=$row->final_price;
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td id="p_code_td'.$i.'">'.$row->p_code.'</td>';
								echo '<td>'.$row->cut_id_no.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								echo '<td>'.$row->booking_date.'</td>';
								echo '<td>'.$row->w_name.'</td>';
								echo '<td id="final_price_td">'.$row->final_price.'</td>';
								echo '<td id="payment_date_td'.$i.'">'.$row->payment_date.'</td>';
								echo '<td id="invoice_no_td'.$i.'">'.$row->invoice_no.'</td>';
								echo '<td id="payment_amount_td'.$i.'">'.$row->payment_amount.'</td>';
								echo '<td>
								<button id="btnupdatepayemnts" name="btnupdatepayemnts" type="button" class="btn default btn-xs purple" onclick="updatepayemnts('.$i.')">
										<i class="fa fa-edit"></i> تعديل </button>
										<button id="btndelpayments" name="btndelpayments" type="submit" value="Delete" class="btn default btn-xs black" onclick="deletepayments('.$row->p_code.','.$i.')"><i class="fa fa-trash-o"></i> حذف</button>';
								echo '</td>';		
								echo '</tr>';
								
							}
								$remaining =$required-$total;
								echo '<tr align="center" class="odd gradeX">';
								echo '<td colspan="10"><b>المجموع</td>';
								echo '<td id="tdTotal">'.$total.'</td>';
								echo '<td> </td>';
								echo '</tr>';
								echo '<tr align="center" class="odd gradeX">';
								echo '<td colspan="10"><b>المبلغ المتبقي</td>';
								echo '<td id="tdTotal">'.$remaining.'</td>';
								echo '<td> </td>';
								echo '</tr>';	
		/****************************************/
		
	}
	
/******************************************************************/
function update_emppayments_datatable()
	{	
		extract($_POST);
//		$hdnBookingcode
		$rec=$this->paymentsmodel->get_emppayments_by_code($emp_code);
		
		$i=1;
		$total = 0;
		
		foreach($rec->result() as $row)
  		{$total = $total + $row->payment_amount;
								echo '<tr align="center" class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td id="ep_code_td'.$i.'">'.$row->ep_code.'</td>';
								echo '<td>'.$row->emp_id.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->job_title.'</td>';
								if($row->payment_type==1)
								echo '<td id="payment_type_td'.$i.'"> راتب شهري </td>';
								else if($row->payment_type==2)
								echo '<td id="payment_type_td'.$i.'"> سلفة </td>';
								echo '<td id="payment_date_td'.$i.'">'.$row->payment_date.'</td>';
								echo '<td id="invoice_no_td'.$i.'">'.$row->invoice_no.'</td>';
								echo '<td id="payment_amount_td'.$i.'">'.$row->payment_amount.'</td>';
								echo '<td>
								<button id="btnupdateemppayemnts" name="btnupdateemppayemnts" type="button" class="btn default btn-xs purple" onclick="updatempepayemnts('.$i.')">
										<i class="fa fa-edit"></i> تعديل </button>
										<button id="btndelemppayments" name="btndelemppayments" type="submit" value="Delete" class="btn default btn-xs black" onclick="deletempepayments('.$row->ep_code.','.$i.')"><i class="fa fa-trash-o"></i> حذف</button>';
								echo '</td>';
								echo '</tr>';
							}
							
		/****************************************/
		
	}
/******************************************************************/
	function updatepayments()
	{
		$this->load->model('paymentsmodel');
		$this->paymentsmodel->update_payments();
/****************************************/
	$this->update_payments_datatable();
	}
	function updateemppayments()
	{
		$this->load->model('paymentsmodel');
		$this->paymentsmodel->update_emppayments();
/****************************************/
	$this->update_emppayments_datatable();
	}
	
	function searchbooking()
	{
		
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_booking();
		
		//print_r($rec->result());
		//exit;
		return $rec->result();
 		
	}
	function searchdelbooking()
	{
		
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_booking();
		
		//print_r($rec->result());
		//exit;
		return $rec->result();
 		
	}
	function booking_grid_data(){	
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_all_booking_search($_REQUEST);
		
		$rec = $rec->result();
		$i = 1;
		
		/*'<a href="pages/view/addbooking/'.$row->booking_code.'" class="btn default btn-xs purple">
			  <i class="fa fa-edit"></i> تعديل </a>
			  <button id="btndelbooking" name="btndelbooking" type="button" class="btn default btn-xs black" 			onclick="deletebooking(\''.$row->booking_code.'\')">		
			  <i class="fa fa-trash-o"></i> حذف </button>';*/
								
		$data = array();
		foreach($rec as $row){
			$nestedData=array(); 
			$btn='<a href="'.base_url().'addbooking/'.$row->booking_code.'" class="btn default btn-xs purple">
			  <i class="fa fa-edit"></i> تعديل </a>
			  <button id="btndelbooking" name="btndelbooking" type="button" class="btn default btn-xs black" onclick="deletebooking('.$row->booking_code.')">
										<i class="fa fa-trash-o"></i> إلفاء </button>';
										
			$nestedData[] = $i++;
			$nestedData[] = $row->w_name;
			$nestedData[] = $row->booking_date;
			$nestedData[] = $row->cut_id_no;
			$nestedData[] = $row->name;
			$nestedData[] = $row->tel;
			$nestedData[] = $row->mobile;
			$nestedData[] = $row->b_desc;
			$nestedData[] = $btn;
			
			$data[] = $nestedData;
		}
		
		$totalData = count($data);
		$totalFiltered = $totalData;
		//$records["draw"] = $sEcho;
		$json_data = array(
					"draw"            => intval( $_REQUEST['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);
		
		echo json_encode($json_data);  // send data as json format

		 		
	}
	function delbooking_grid_data(){	
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_all_delbooking_search($_REQUEST);
		
		$rec = $rec->result();
		$i = 1;
		
		/*'<a href="pages/view/addbooking/'.$row->booking_code.'" class="btn default btn-xs purple">
			  <i class="fa fa-edit"></i> تعديل </a>
			  <button id="btndelbooking" name="btndelbooking" type="button" class="btn default btn-xs black" 			onclick="deletebooking(\''.$row->booking_code.'\')">		
			  <i class="fa fa-trash-o"></i> حذف </button>';*/
								
		$data = array();
		foreach($rec as $row){
			$nestedData=array(); 
			$btn='<a href="'.base_url().'addbooking/'.$row->booking_code.'" class="btn default btn-xs purple">
			  <i class="fa fa-edit"></i> عرض </a>';
										
			$nestedData[] = $i++;
			$nestedData[] = $row->w_name;
			$nestedData[] = $row->old_booking_date;
			$nestedData[] = $row->cut_id_no;
			$nestedData[] = $row->name;
			$nestedData[] = $row->tel;
			$nestedData[] = $row->mobile;
			//$nestedData[] = $row->b_desc;
			$nestedData[] = $btn;
			
			$data[] = $nestedData;
		}
		
		$totalData = count($data);
		$totalFiltered = $totalData;
		//$records["draw"] = $sEcho;
		$json_data = array(
					"draw"            => intval( $_REQUEST['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);
		
		echo json_encode($json_data);  // send data as json format

		 		
	}
	function payments_grid_data(){	
		$this->load->model('paymentsmodel');
		$rec = $this->paymentsmodel->get_all_payments_search($_REQUEST);
		
		$rec = $rec->result();
		$i = 1;
		$data = array();

		foreach($rec as $row){
			$nestedData=array(); 
			$btn='<a href="'.base_url().'addpayments/'.$row->booking_code.'" class="btn default btn-xs blue">
										<i class="fa fa-edit"></i> اضافة دفعه مالية </a>';

			$nestedData[] = $i++;
			$nestedData[] = $row->cut_id_no;
			$nestedData[] = $row->name;
			$nestedData[] = $row->w_name;
			$nestedData[] = $row->booking_date;
			$nestedData[] = $row->final_price;
			$nestedData[] = $row->payment_amount;
			$nestedData[] = $row->payment_date;
			$nestedData[] = $row->invoice_no;
			$nestedData[] = $btn;
			
			$data[] = $nestedData;
		}
		
		$totalData = count($data);
		$totalFiltered = $totalData;
		//$records["draw"] = $sEcho;
		$json_data = array(
					"draw"            => intval( $_REQUEST['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);
		
		echo json_encode($json_data);  // send data as json format

		 		
	}	
	function emp_payments_grid_data(){	
		$this->load->model('paymentsmodel');
		$rec = $this->paymentsmodel->get_all_emp_payments_search($_REQUEST);
		
		$rec = $rec->result();
		$i = 1;
		$data = array();

		foreach($rec as $row){
			$nestedData=array(); 
			$btn='<a href="'.base_url().'addemppayments/'.$row->emp_code.'" class="btn default btn-xs blue">
										<i class="fa fa-edit"></i> اضافة دفعه مالية </a>';

			$nestedData[] = $i++;
			$nestedData[] = $row->emp_id;
			$nestedData[] = $row->name;
			$nestedData[] = $row->mobile;
			$nestedData[] = $row->contract_type;
			$nestedData[] = $row->payment_amount;
			$nestedData[] = $row->payment_date;
			$nestedData[] = $row->invoice_no;
			$nestedData[] = $row->payment_desc;
			$nestedData[] = $btn;
			
			$data[] = $nestedData;
		}
		
		$totalData = count($data);
		$totalFiltered = $totalData;
		//$records["draw"] = $sEcho;
		$json_data = array(
					"draw"            => intval( $_REQUEST['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);
		
		echo json_encode($json_data);  // send data as json format

		 		
	}	

	function booking_calender()
	{
		$this->load->model('bookingmodel');
		if (isset($_POST['hall']) && $_POST['hall'] != 0)
		{
			$rec = $this->bookingmodel->get_booking_by_hall($_POST['hall']);
		}
		else
		{
			$rec = $this->bookingmodel->get_all_booking();
		}
		
		$rec = $rec->result();
		
		$output = array();
		foreach($rec as $row)
		{
			unset($temp); // Release the contained value of the variable from the last loop
          	$temp = array();

          	// It guess your client side will need the id to extract, and distinguish the ScoreCH data
          	$temp['url'] = 'addbooking/'.$row->booking_code;
			$temp['title'] = $row->w_name."\n".$row->name."\n".$row->tel."\n".$row->mobile."\n".$row->b_desc;
          	$temp['start'] = $row->booking_date;
			$temp['textColor'] = '#666666';
			if($row->w_code == 1) $temp['backgroundColor'] = 'red';
			if($row->w_code == 2) $temp['backgroundColor'] = 'blue';
			if($row->w_code == 3) $temp['backgroundColor'] = 'green';
			/*else
			$temp['backgroundColor'] = 'yellow';
*/
          	array_push($output,$temp);
		}
		
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
   		echo json_encode($output);
		
	}
	function sendBookingData()
	{
		if(isset($_POST['date']))
			$_SESSION['bookingDate'] = $_POST['date'];
		if(isset($_POST['hall']))
			$_SESSION['bookingHall'] = $_POST['hall'];
	}
	function addbooking()
	{
		$this->load->model('bookingmodel');
		$result = $this->bookingmodel->insert_booking();
		echo $result;
			
	}
	function addbooking_price($booking_code)
	{
		$this->load->model('bookingmodel');
		$result = $this->bookingmodel->update_booking_price_by_code($booking_code);
		echo $result;
	}
	function addhall()
	{
		$this->load->model('hallmodel');
		$this->hallmodel->insert_hall();
			
	}
	function addorg()
	{
		$this->load->model('orgmodel');
		$this->orgmodel->insert_org();
			
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
	function get_booking_date()
	{
		$booking_date = $_POST['booking_date'];
		$w_code = $_POST['w_code'];
		
		$this->load->model('bookingmodel');
		$rec=$this->bookingmodel->get_booking_by_date($booking_date,$w_code);
	
		foreach($rec->result() as $row)
		{
  			echo $row->cn;
		}
	
	}
	function employee_view($emp_code)
	{
		$this->load->model('paymentsmodel');
		$rec=$this->paymentsmodel->get_emppayments_by_code($emp_code);
		return $rec->result();
	}	
	
	function payment_view($booking_code)
	{
		$this->load->model('paymentsmodel');
		$rec=$this->paymentsmodel->get_payments_by_code($booking_code);
		return $rec->result();
	}	

	function viewpaydata($booking_code)
	{
		$this->load->model('paymentsmodel');
		$rec=$this->paymentsmodel->get_booking_by_code($booking_code);
		return $rec->result();
	}
	function viewemppaydata($emp_code)
	{
		$this->load->model('paymentsmodel');
		return $this->paymentsmodel->get_emp_by_code($emp_code);
		 
	}

	function viewhallupdate($w_code)
	{
		$this->load->model('hallmodel');
		return $this->hallmodel->get_hall_by_code($w_code);
	}
	function vieworgupdate($org_id)
	{
		$this->load->model('orgmodel');
		return $this->orgmodel->get_org_by_code($org_id);
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
	function updatehall()
	{
		$this->load->model('hallmodel');
		return $this->hallmodel->update_hall();
	}
	function updateorg()
	{
		$this->load->model('orgmodel');
		return $this->orgmodel->update_org();
	}
	function updateservices()
	{
		$this->load->model('servicemodel');
		return $this->servicemodel->update_service();
	}
	function deletehall($w_code)
	{
		$this->load->model('hallmodel');
		return $this->hallmodel->delete_hall($w_code);

	}
	function deleteorg($org_id)
	{
		$this->load->model('orgmodel');
		return $this->orgmodel->delete_org($org_id);

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
	function deletepayments()
	{
		$this->load->model('paymentsmodel');
		$this->paymentsmodel->delete_payment();
		$this->update_payments_datatable();

	}
	function deleteemppayments()
	{
		$this->load->model('paymentsmodel');
		$this->paymentsmodel->delete_emppayment();
		$this->update_emppayments_datatable();

	}
	function employee()
	{
		$this->load->model('empmodel');
		$rec = $this->empmodel->get_employee();
		return $rec->result();
		 		
	}
	
	function hall()
	{
		$this->load->model('hallmodel');
		return $this->hallmodel->get_hall();
		 		
	}
	function organization()
	{
		$this->load->model('orgmodel');
		return $this->orgmodel->get_org();
		 		
	}
	function booking()
	{
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_booking();

		//print_r($rec->result());
		//exit;
		return $rec->result();
		 		
	}

	function get_jobs()
	{
		$this->load->model('jobmodel');
		return $this->jobmodel->get_all_jobs();

	}
	function services()
	{
		$this->load->model('servicemodel');
		return $this->servicemodel->get_all_service();
		 		
	}
	function get_active_services()
	{
		$this->load->model('servicemodel');
		return $this->servicemodel->get_service();
		 		
	}
	function service_price($sev_code)
	{
		$this->load->model('servicemodel');
		$price = $this->servicemodel->get_service_price($sev_code);
		
		foreach($price as $row)
  		{
			echo $row->sev_price;
		}
	}

	function wedding_hall()
	{
		$this->load->model('hallmodel');
		return $this->hallmodel->get_hall();
		 		
	}
	
/*********************notification******************************/	
	function get_booking_notification()
	{
		$this->load->model('notificationmodel');
		$rec= $this->notificationmodel->get_booking_notification();
		return $rec->result();
		 		
	}
	function get_booking_notification_count()
	{
		$this->load->model('notificationmodel');
		$rec= $this->notificationmodel->get_booking_notification_count();
		return $rec->result();
		 		
	}
		function get_payments_notification()
	{
		$this->load->model('notificationmodel');
		$rec= $this->notificationmodel->get_payments_notification();
		return $rec->result();
		 		
	}
	function get_payments_notification_count()
	{
		$this->load->model('notificationmodel');
		$rec= $this->notificationmodel->get_payments_notification_count();
		return $rec->result();
		 		
	}

/**********************************************************/
	function booking_status()
	{
		$this->load->model('bookingmodel');
		return $this->bookingmodel->get_booking_status();
	}
	function contract()
	{
		$this->load->model('contractmodel');
		return $this->contractmodel->get_contract();
		 		
	}
	function paymenttype()
	{
		$this->load->model('paymentsmodel');
		return $this->paymentsmodel->get_payment_type();
		 		
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
	function checkcustomeravailable()
	{
		$cut_id_no = $_POST['cut_id_no'];
		$this->load->model('bookingmodel');
		$rec = $this->bookingmodel->get_customer_by_id($cut_id_no);
		
		if (count($rec) == 0)
		{
			echo 0;
			return;
		}
		$output = array();
		foreach($rec as $row)
		{
			unset($temp); // Release the contained value of the variable from the last loop
			$temp = array();

			// It guess your client side will need the id to extract, and distinguish the ScoreCH data
			$temp['name'] = $row->name;
			$temp['tel'] = $row->tel;
			$temp['mobile'] = $row->mobile;
			$temp['address'] = $row->address;

			array_push($output,$temp);
			
			
			header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);
		}
	}
	function checkuseravailable()
	{
		$username = $_POST['username'];
		$this->load->model('usermodel');
		$rec = $this->usermodel->get_user_by_username($username);
		
		if (count($rec) == 1)
		{
			foreach($rec as $row);
			echo ' هذا المستخدم موجود مسبقا';
		}
		else
			echo 0;
	}
	function checkempavailable()
	{
		$emp_id = $_POST['emp_id'];
		$this->load->model('empmodel');
		$rec = $this->empmodel->get_emp_by_id($emp_id);
		
		if (count($rec) == 1)
		{
			foreach($rec as $row);
			echo ' الموظف ('.$row->name.') موجود مسبقا';
		}
		else
			echo 0;
		/*if (count($rec) == 1)
		{
			$output = array();
			foreach($rec as $row)
			{
				unset($temp); // Release the contained value of the variable from the last loop
				$temp = array();
	
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['emp_code'] = $row->emp_code;
				$temp['emp_id'] = $row->emp_id;
				$temp['name'] = $row->name;
				$temp['sex'] = $row->sex;
				$temp['dob'] = $row->dob;
				$temp['mobile'] = $row->mobile;
				$temp['tel'] = $row->tel;
				$temp['address'] = $row->address;
				$temp['contract_code'] = $row->contract_code;
				$temp['salary'] = $row->salary;
				$temp['job'] = $row->job;
	
				array_push($output,$temp);
			}
			
			header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);
		}
		else
			echo 0;*/
		
	}
	function delemp($empID)
	{
		$this->load->model('empmodel');
		$this->empmodel->del_employee($empID);
	}
	function logout()
 	{
   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('home', 'refresh');
 	}
}
?>