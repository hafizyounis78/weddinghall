<?php

class Bookingmodel extends CI_Model
{

	public function get_booking()
    {
        $myquery = "select wedding_hall.*,customer.*,wedding_booking.*
from wedding_hall,customer,wedding_booking
where wedding_booking.w_code=wedding_hall.w_code
and   wedding_booking.cut_id=customer.cut_id";
        return $this->db->query($myquery);
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
	public function get_booking_details_by_code($booking_code)//,$cut_id)
	{
		 $myquery = "wedding_booking_details.*
					from wedding_booking,wedding_booking_details
					where wedding_booking.booking_code=wedding_booking_details.booking_code
					and wedding_booking.booking_code=$booking_code";
        return $this->db->query($myquery);
	}
	
	public function insert_booking()
	{
		extract($_POST);
		
/*****************booking************************/		
	$bdata['w_code'] = $w_code;
	$bdata['booking_date'] = $booking_date;
	$bdata['cut_id'] = $cut_id;
		//$bdata['booking_status'] = $booking_status;
		//$bdata['notes'] = $notes;
	$this->db->insert('wedding_booking',$bdata);
/*****************customer**********************/
 $myquery = "SELECT LAST_INSERT_ID() ";
        

$_POST['booking_code']= $this->db->query($myquery);


		$cdata['cut_id'] = $cut_id;
		$cdata['name'] = $name;
		$cdata['tel'] = $tel;
		$cdata['mobile'] = $mobile;
		$cdata['address'] = $address;
		
/*****************booking details************************/	
       //extract($_POST);
		$sdata['booking_code'] = $_POST['booking_code'];
		$sdata['sev_code'] = 3;
		$sdata['sev_price'] = 401;
	

	
	

		$this->db->insert('customer',$cdata);

		$this->db->insert('wedding_booking_details',$sdata);

	}

	public function insert_booking_details()
	{
		extract($_POST);

		$data['booking_code'] = $booking_code;
		$data['sev_code'] = $sev_code;
		$data['sev_price'] = $sev_price;

		$this->db->insert('wedding_booking_details',$data);

	}
	public function delete_booking($booking_code)
	{
		$this->db->where('booking_code', $booking_code);
        $this->db->delete('wedding_booking');
		$this->db->delete('wedding_booking_details');
	}
}


?>