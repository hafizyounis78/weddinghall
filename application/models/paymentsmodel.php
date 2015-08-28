<?php

class Paymentsmodel extends CI_Model
{

	public function get_paymentsmodel()
    {
        $query = $this->db->get('payments');
		return $query->result();
    }
	public function get_booking_by_code($booking_code)//,$cut_id)
	{
		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*
from wedding_hall,customer,wedding_booking
where wedding_booking.w_code=wedding_hall.w_code
and   wedding_booking.cut_id=customer.cut_id
and wedding_booking.booking_code=$booking_code";
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

	}
}


?>