<?php

class Notificationmodel extends CI_Model
{

public function get_booking_notification()
    {
		date_default_timezone_set('Asia/Gaza');   
		$today_date = date('Y/m/d');
		//$today_date= $dt->format("yyyy-mm-dd");
		//$befor_date=date('Y-m-d', strtotime('-3 days'));
		$myquery = "SELECT 		payments. * , wedding_booking. * , customer. * , wedding_hall. *
					FROM   		wedding_booking
					LEFT JOIN 	payments ON wedding_booking.booking_code = payments.booking_code
					AND 		payment_status <>4, customer, wedding_hall
					WHERE 		wedding_booking.w_code = wedding_hall.w_code
					AND 		wedding_booking.cut_id = customer.cut_id
					AND 		wedding_booking.booking_status <>4";
			//		AND 		wedding_booking.booking_date between '$befor_date' and '$today_date' ";
					
	 return $this->db->query($myquery);
	}
	
}
?>