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

/*****************booking************************/
	//	$this->db->where('booking_code',$booking_code);
		//$query = $this->db->get('wedding_booking');
		//$query = $this->db->get('wedding_booking_detalis');
/*****************customer**********************/
/*		$this->db->where('booking_code',$cut_id);
		$query = $this->db->get('customer');
	*/	
		//return $query->result();
	}
	
	public function insert_booking()
	{
		extract($_POST);
/*****************booking************************/		
		$bdata['w_code'] = $w_code;
		$bdata['booking_date'] = $booking_date;
		$bdata['cut_id'] = $cut_id;
	//	$bdata['booking_status'] = $booking_status;
	//	$bdata['notes'] = $notes;
/*****************customer**********************/
		$cdata['cut_id'] = $cut_id;
		$cdata['name'] = $name;
		$cdata['tel'] = $tel;
		$cdata['mobile'] = $mobile;
		$cdata['address'] = $address;
		$cdata['notes'] = $notes;
/*****************booking details************************/	
       //extract($_POST);
	/*	$sdata['booking_code'] = $booking_code;
		$sdata['sev_code'] = $sev_code;
		$sdata['sev_price'] = $sev_price;
		
*/
		$this->db->insert('wedding_booking',$bdata);

		$this->db->insert('customer',$cdata);

//		$this->db->insert('wedding_booking_details',$sdata);

	}

	public function delete_booking($booking_code)
	{
		$this->db->where('booking_code', $booking_code);
        $this->db->delete('wedding_booking');
		$this->db->delete('wedding_booking_details');
	}
}


?>