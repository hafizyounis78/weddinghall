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
	
	public function get_booking_status()
    {
        $query = $this->db->get('booking_status_tb');
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
	public function get_all_booking()//,$cut_id)
	{
		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*
from wedding_hall,customer,wedding_booking
where wedding_booking.w_code=wedding_hall.w_code
and   wedding_booking.cut_id=customer.cut_id";
        return $this->db->query($myquery);

	}
	public function get_all_booking_search($requestData)
	{
		//$requestData= $_REQUEST;
		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*,booking_status_tb.*
					from wedding_hall,customer,wedding_booking,booking_status_tb
					where wedding_booking.w_code=wedding_hall.w_code
					and wedding_booking.cut_id=customer.cut_id
					and booking_status_tb.booking_status_code=wedding_booking.booking_status";
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
		if(isset($requestData['tel']) && $requestData['tel'] !='')
		{
			$myquery = $myquery." AND tel LIKE '".$requestData['tel']."%' ";
		}
		if(isset($requestData['mobile']) && $requestData['mobile'] !='')
		{
			$myquery = $myquery." AND mobile LIKE '".$requestData['mobile']."%' ";
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
		if(isset($requestData['booking_status']) && $requestData['booking_status'] !='')
		{
			$myquery = $myquery." AND booking_status LIKE '".$requestData['booking_status']."%' ";
		}

        return $this->db->query($myquery);

	}
	public function get_booking_by_date($booking_date,$w_code)
	{
		 $myquery = "select count(1) as cn
					 from   wedding_booking
					 where  booking_date='".$booking_date."'
					 and w_code=$w_code
					 and booking_status<>4";
        return $this->db->query($myquery);

	}

	public function update_booking_price_by_code($booking_code)
	{
		extract($_POST);
		$data['total_price'] = $total_price;
		$data['final_price'] = $final_price;
				
		$this->db->where('booking_code',$booking_code);
		$this->db->update('wedding_booking',$data);
	}
public function update_booking()
	{
		extract($_POST);
		$data['w_code'] = $w_code;
		$data['booking_date'] = $booking_date;
		$data['cut_id'] = $cut_id;
		$data['booking_status'] = 1;
		$data['notes'] = $notes;

				
		$this->db->where('booking_code',$hdnBooking_code);
		$this->db->update('wedding_booking',$data);
	}

	public function get_booking_details_by_code($booking_code)//,$cut_id)
	{
		 $myquery = "select wedding_booking_details.sev_code,wedding_booking_details.sev_price,
		 			wedding_booking_details.booking_code,wedding_services.sev_desc
					from wedding_booking,wedding_booking_details,wedding_services
					where wedding_booking.booking_code=wedding_booking_details.booking_code
					and wedding_booking_details.sev_code=wedding_services.sev_code
					and wedding_booking.booking_code=$booking_code";
        return $this->db->query($myquery);
	}
	
public function delete_selectedservice($sev_code,$booking_code)
{
	$this->db->where('booking_code', $booking_code);
	$this->db->where('sev_code',$sev_code);
	$this->db->delete('wedding_booking_details');
}
	public function insert_booking()
	{
		extract($_POST);
		
/*****************booking************************/		
	$bdata['w_code'] = $w_code;
	$bdata['booking_date'] = $booking_date;
	$bdata['cut_id'] = $cut_id;
	$bdata['booking_status'] = 1;
	$bdata['notes'] = $notes;

	$this->db->insert('wedding_booking',$bdata);
/*****************customer**********************/

	$bookingid=$this->db->insert_id();


		$cdata['cut_id'] = $cut_id;
		$cdata['name'] = $name;
		$cdata['tel'] = $tel;
		$cdata['mobile'] = $mobile;
		$cdata['address'] = $address;
		
/*****************booking details************************/	
       //extract($_POST);
		/*$sdata['booking_code'] = $GLOBALS['booking_code'];
		$sdata['sev_code'] = 30;
		$sdata['sev_price'] = 401;*/
	

	
	

		$this->db->insert('customer',$cdata);
print_r($bookingid);
exit();
		//$this->db->insert('wedding_booking_details',$sdata);
		return $bookingid;

	}

	public function insert_booking_details()
	{
		extract($_POST);

		$data['booking_code'] = $hdnBookingcode;
		$data['sev_code'] = $sev_code;
		$data['sev_price'] = $sev_price;
		$this->db->insert('wedding_booking_details',$data);
		
$myquery = "select count(1) 
			from payments
			where booking_code=$hdnBookingcode";
$count=0;
$count=$rec->result();


	}
	public function delete_booking($booking_code)
	{
		$data['booking_status']=4;
		$this->db->where('booking_code', $booking_code);
		$this->db->update('wedding_booking',$data);
		$this->delete_booking_details($booking_code);
	}
	public function delete_booking_details($booking_code)
	{

$myquery = "update wedding_booking_details
			set wedding_booking_details.sev_price=wedding_booking_details.sev_price * (-1)
			where wedding_booking_details.booking_code=$booking_code";
        return $this->db->query($myquery);
	}
}


?>