<?php

class Paymentsmodel extends CI_Model
{

public function get_all_emppayments()
	{
		 $myquery = "select employee_payments.*,employee.*
from employee_payments,employee
where employee_payments.emp_code=employee.emp_code";
        return $this->db->query($myquery);

	}

	public function get_all_payments()
    {
        $myquery = "select  payments.*,wedding_booking.*,customer.*,wedding_hall.*
					from  	payments,wedding_booking,customer,wedding_hall
					where 	wedding_booking.booking_code=payments.booking_code
					and		wedding_booking.w_code=wedding_hall.w_code
					and 	wedding_booking.cut_id=customer.cut_id";
        return $this->db->query($myquery);

    }
	public function get_all_payments_search($requestData)
    {
		date_default_timezone_set('Asia/Gaza');   
		$today_date = date('Y-m-d');

		$myquery = "SELECT 		payments. * , wedding_booking. * , customer. * , wedding_hall. *
					FROM   		wedding_booking
					LEFT JOIN 	payments ON wedding_booking.booking_code = payments.booking_code
					AND 		payment_status <>4, customer, wedding_hall
					WHERE 		wedding_booking.w_code = wedding_hall.w_code
					AND 		wedding_booking.cut_id = customer.cut_id
					AND 		wedding_booking.booking_status <>4";


if(isset($requestData['w_code']) && $requestData['w_code'] !='')
		{
			$myquery = $myquery." AND wedding_hall.w_code = ".$requestData['w_code'];
		}
		if(isset($requestData['cut_id_no']) && $requestData['cut_id_no'] !='')
		{
			$myquery = $myquery." AND customer.cut_id_no LIKE '".$requestData['cut_id_no']."%' ";;
		}
		if(isset($requestData['name']) && $requestData['name'] !='')
		{
			$myquery = $myquery." AND name LIKE '%".$requestData['name']."%' ";
		}
		if(isset($requestData['payment_amount']) && $requestData['payment_amount'] !='')
		{
			$myquery = $myquery." AND payment_amount LIKE '".$requestData['payment_amount']."%' ";
		}
		if(isset($requestData['final_price']) && $requestData['final_price'] !='')
		{
			$myquery = $myquery." AND final_price LIKE '".$requestData['final_price']."%' ";
		}
		if(!isset($requestData['booking_date_from']) && !isset($requestData['booking_date_to']))
		{
			$myquery = $myquery." AND DATE_FORMAT(wedding_booking.booking_date,'%Y-%m-%d')>= '$today_date'";
		}
		if(isset($requestData['booking_date_from']) && $requestData['booking_date_from'] != ''
		   && isset($requestData['booking_date_to']) && $requestData['booking_date_to'] != '')
		{
			$myquery = $myquery." AND booking_date between '".$requestData['booking_date_from']."' and '".$requestData['booking_date_to']."'";
		}
		if(isset($requestData['booking_date_from']) && $requestData['booking_date_from'] != ''
		   && (isset($requestData['booking_date_to']) && $requestData['booking_date_to'] == ''))
		{
			$myquery = $myquery." AND booking_date >= '".$requestData['booking_date_from']."'";
		}
		if(isset($requestData['invoice_no']) && $requestData['invoice_no'] !='')
		{
			$myquery = $myquery." AND invoice_no LIKE '".$requestData['invoice_no']."%' ";
		}
		if(isset($requestData['payment_date_from']) && $requestData['payment_date_from'] != ''
		   && isset($requestData['payment_date_to']) && $requestData['payment_date_to'] != '')
		{
			$myquery = $myquery." AND payment_date between '".$requestData['payment_date_from']."' and '".$requestData['payment_date_to']."'";
		}
		if(isset($requestData['payment_date_from']) && $requestData['payment_date_from'] != ''
		   && (isset($requestData['payment_date_to']) && $requestData['payment_date_to'] == ''))
		{
			$myquery = $myquery." AND payment_date >= '".$requestData['payment_date_from']."'";
		}

        return $this->db->query($myquery);

    }
public function get_all_emp_payments_search($requestData)
    {
        /*$myquery = "select employee_payments.*,employee.*,contract_type.*,payment_type.*
					from employee_payments,employee,contract_type,payment_type
					where employee_payments.emp_code=employee.emp_code
					and employee.contract_code=contract_type.contract_code
					and employee_payments.payment_type=payment_type.payment_code";*/
		 $myquery = "SELECT employee_payments. * , employee. * , contract_type. * , payment_type. *
					 FROM   employee LEFT JOIN employee_payments ON employee.emp_code = employee_payments.emp_code
					               LEFT JOIN payment_type ON employee_payments.payment_type = payment_type.payment_code,
								   contract_type
					WHERE   employee.contract_code = contract_type.contract_code";

if(isset($requestData['emp_id']) && $requestData['emp_id'] !='')
		{
			$myquery = $myquery." AND emp_id = ".$requestData['emp_id'];
		}
		if(isset($requestData['name']) && $requestData['name'] !='')
		{
			$myquery = $myquery." AND name LIKE '%".$requestData['name']."%' ";
		}
	if(isset($requestData['mobile']) && $requestData['mobile'] !='')
		{
			$myquery = $myquery." AND mobile LIKE '%".$requestData['mobile']."%' ";
		}
		if(isset($requestData['contract_code']) && $requestData['contract_code'] !='')
		{
				$myquery = $myquery." AND employee.contract_code = ".$requestData['contract_code'];
		//	$myquery = $myquery." AND employee_payments.contract_code LIKE '%".$requestData['contract_code']."%' ";
		}

		if(isset($requestData['payment_amount']) && $requestData['payment_amount'] !='')
		{
			$myquery = $myquery." AND payment_amount LIKE '".$requestData['payment_amount']."%' ";
		}
	if(isset($requestData['payment_type']) && $requestData['payment_type'] !='')
		{
			$myquery = $myquery." AND employee_payments.payment_type LIKE '".$requestData['payment_type']."%' ";
		}
		
		if(isset($requestData['payment_date_from']) && $requestData['payment_date_from'] != ''
		   && isset($requestData['payment_date_to']) && $requestData['payment_date_to'] != '')
		{
			$myquery = $myquery." AND payment_date between '".$requestData['payment_date_from']."' and '".$requestData['payment_date_to']."'";
		}
		if(isset($requestData['payment_date_from']) && $requestData['payment_date_from'] != ''
		   && (isset($requestData['payment_date_to']) && $requestData['payment_date_to'] == ''))
		{
			$myquery = $myquery." AND payment_date >= '".$requestData['payment_date_from']."'";
		}

        return $this->db->query($myquery);

    }	
	public function get_booking_by_code($booking_code)
	{
		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*,booking_status_tb.*
					 from   wedding_hall,customer,wedding_booking,booking_status_tb
					 where  wedding_booking.w_code=wedding_hall.w_code
					 and    wedding_booking.cut_id=customer.cut_id
					 and    wedding_booking.booking_status=booking_status_tb.booking_status_code
					 and    wedding_booking.booking_code=$booking_code
					 and    wedding_booking.booking_status<>4";
        return $this->db->query($myquery);

	}
public function get_emp_by_code($emp_code)
	{
		$this->db->where('emp_code',$emp_code);
		$query = $this->db->get('employee');
		return $query->result();
	}
public function get_emppayments_by_code($emp_code)
	{
		 $myquery = "select employee_payments.*,employee.*,contract_type.*, job_tb.*
					 from   employee_payments,employee,contract_type,job_tb
					 where  employee_payments.emp_code=employee.emp_code
					 AND    employee.contract_code=contract_type.contract_code
					 AND    employee.job=job_tb.job_code
					 and    employee_payments.emp_code=$emp_code";
        return $this->db->query($myquery);

	}

public function get_payments_by_code($booking_code)
	{
		 $myquery = "select payments.*,wedding_booking.*,customer.*,wedding_hall.*
					 from   payments,wedding_booking,customer,wedding_hall
					 where  wedding_booking.booking_code=payments.booking_code
					 and    wedding_booking.w_code=wedding_hall.w_code
					 and    wedding_booking.cut_id=customer.cut_id
					 and    wedding_booking.booking_code=$booking_code
					 and    payment_status<>4";
        return $this->db->query($myquery);

	}	

	public function insert_payments()
	{
		extract($_POST);
		//print_r(extract($_POST));
		//exit;
		$data['booking_code'] = $booking_code;
		$data['payment_amount'] = $payment_amount;
		$data['payment_date'] = $payment_date;
		$data['invoice_no'] = $invoice_no;
	//	$data['notes'] = $notes;
		
		$this->db->insert('payments',$data);
		/***************update booking status according the payment amounts*********/
		$datab['booking_status'] = $booking_status;
		
		$this->db->where('booking_code',$booking_code);
		$this->db->update('wedding_booking',$datab);

	}

	public function insert_emppayments()
	{
		extract($_POST);
		//print_r(extract($_POST));
		//exit;
		$data['emp_code'] = $emp_code;
		$data['payment_type'] = $payment_type;
		$data['payment_amount'] = $payment_amount;
		$data['payment_date'] = $payment_date;
		$data['invoice_no'] = $invoice_no;
		
		$this->db->insert('employee_payments',$data);

	}
public function update_payments()
	{
		extract($_POST);
		$data['payment_amount'] = $payment_amount;
		$data['payment_date'] = $payment_date;
		$data['invoice_no'] = $invoice_no;
//		$data['notes'] = $notes;
		//$data['booking_status'] = 1;
		

				
		//$this->db->where('booking_code',$booking_code);
		$this->db->where('p_code',$p_code);
		$this->db->update('payments',$data);
	/************update booking status**********/
		$datab['booking_status'] = $booking_status;
		$this->db->where('booking_code',$booking_code);
		$this->db->update('wedding_booking',$datab);

	}
public function get_payment_type()
{
	 $query = $this->db->get('payment_type');
		return $query->result();
}

public function delete_payment()
	{
		extract($_POST);
	/************update booking status**********/
		$datab['booking_status'] = $booking_status;
		
		
		$this->db->where('booking_code',$booking_code);
		$this->db->update('wedding_booking',$datab);
		//update the payment status to deleted status
		$myquery = "update 	payments
					set 	payment_amount=payment_amount * (-1),
							payment_status=4
					where 	p_code=$p_code";
        return $this->db->query($myquery);

//		$this->db->where('p_code', $p_code);
  //      $this->db->delete('payments');
	}
}


?>