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
        $myquery = "select payments.*,wedding_booking.*,customer.*,wedding_hall.*
from  payments,wedding_booking,customer,wedding_hall
where wedding_booking.booking_code=payments.booking_code
and   wedding_booking.w_code=wedding_hall.w_code
and   wedding_booking.cut_id=customer.cut_id";
        return $this->db->query($myquery);

    }
	public function get_all_payments_search($requestData)
    {
        $myquery = "select payments.*,wedding_booking.*,customer.*,wedding_hall.*
from  payments,wedding_booking,customer,wedding_hall
where wedding_booking.booking_code=payments.booking_code
and   wedding_booking.w_code=wedding_hall.w_code
and   wedding_booking.cut_id=customer.cut_id";

if(isset($requestData['w_code']) && $requestData['w_code'] !='')
		{
			$myquery = $myquery." AND wedding_hall.w_code = ".$requestData['w_code'];
		}
		if(isset($requestData['cut_id']) && $requestData['cut_id'] !='')
		{
			$myquery = $myquery." AND wedding_booking.cut_id LIKE '".$requestData['cut_id']."%' ";;
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
		if(isset($requestData['booking_date_from']) && $requestData['booking_date_from'] != ''
		   && isset($requestData['booking_date_to']) && $requestData['booking_date_to'] != '')
		{
			$myquery = $myquery." AND booking_date between '".$requestData['booking_date_from']."' and '".$requestData['booking_date_to']."'";
		}
		if(isset($requestData['booking_date_from']) && $requestData['booking_date_from'] != ''
		   && (isset($requestData['booking_date_to']) && $requestData['booking_date_to'] == ''))
		{
			$myquery = $myquery." AND booking_date = '".$requestData['booking_date_from']."'";
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
			$myquery = $myquery." AND payment_date = '".$requestData['payment_date_from']."'";
		}

        return $this->db->query($myquery);

    }
	public function get_booking_by_code($booking_code)
	{
		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*
from wedding_hall,customer,wedding_booking
where wedding_booking.w_code=wedding_hall.w_code
and   wedding_booking.cut_id=customer.cut_id
and wedding_booking.booking_code=$booking_code";
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
		 $myquery = "select employee_payments.*,employee.*
from employee_payments,employee
where employee_payments.emp_code=employee.emp_code
and employee_payments.emp_code=$emp_code";
        return $this->db->query($myquery);

	}

public function get_payments_by_code($booking_code)
	{
		 $myquery = "select payments.*,wedding_booking.*,customer.*,wedding_hall.*
from  payments,wedding_booking,customer,wedding_hall
where wedding_booking.booking_code=payments.booking_code
and   wedding_booking.w_code=wedding_hall.w_code
and   wedding_booking.cut_id=customer.cut_id
and   wedding_booking.booking_code=$booking_code";
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
		//$data['invoice_no'] = $invoice_no;
		
		$this->db->insert('employee_payments',$data);

	}
public function update_payments()
	{
		extract($_POST);
		$data['payment_amount'] = $payment_amount;
		$data['payment_date'] = $payment_date;
		$data['invoice_no'] = $invoice_no;
		//$data['booking_status'] = 1;
	//	$data['notes'] = $notes;

				
		$this->db->where('booking_code',$booking_code);
		$this->db->update('payments',$data);
	/************update booking status**********/
		$datab['booking_status'] = $booking_status;
		$this->db->where('booking_code',$booking_code);
		$this->db->update('wedding_booking',$datab);

	}

}


?>