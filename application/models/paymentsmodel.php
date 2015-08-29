<?php

class Paymentsmodel extends CI_Model
{

	public function get_paymentsmodel()
    {
        $query = $this->db->get('payments');
		return $query->result();
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

}


?>