<?php

class Notificationmodel extends CI_Model
{

public function get_booking_notification()
    {
		date_default_timezone_set('Asia/Gaza');   
		$today_date = date('Y-m-d');
		//$today_date= $dt->format("yyyy-mm-dd");
		$after_date=date('Y-m-d', strtotime('+5 days'));
		$myquery = "SELECT 	wedding_booking. * , customer. * , wedding_hall. * , booking_status_tb . *
					FROM 	wedding_booking, customer, wedding_hall, booking_status_tb
					WHERE 	wedding_booking.w_code = wedding_hall.w_code
					AND 	wedding_booking.cut_id = customer.cut_id
					AND 	wedding_booking.booking_status <>4
					AND 	wedding_booking.booking_status = booking_status_tb.booking_status_code
					AND 	DATE_FORMAT(wedding_booking.booking_date,'%Y-%m-%d') between '$today_date' and '$after_date'";
					
	 return $this->db->query($myquery);
	}
public function get_booking_notification_count()
    {
		date_default_timezone_set('Asia/Gaza');   
		$today_date = date('Y-m-d');
		//$today_date= $dt->format("yyyy-mm-dd");
		$after_date=date('Y-m-d', strtotime('+5 days'));
		$myquery = "SELECT 	count(1) as cnt
					FROM 	wedding_booking, customer, wedding_hall, booking_status_tb
					WHERE 	wedding_booking.w_code = wedding_hall.w_code
					AND 	wedding_booking.cut_id = customer.cut_id
					AND 	wedding_booking.booking_status <>4
					AND 	wedding_booking.booking_status = booking_status_tb.booking_status_code
					AND 	DATE_FORMAT(wedding_booking.booking_date,'%Y-%m-%d') between '$today_date' and '$after_date'";
					
	 return $this->db->query($myquery);
	}
	
public function get_payments_notification()
    {
		date_default_timezone_set('Asia/Gaza');   
		$today_date = date('Y-m-d');
		//$today_date= $dt->format("yyyy-mm-dd");
		$after_date=date('Y-m-d', strtotime('+5 days'));
		$myquery = "SELECT 	wedding_booking. * , customer. * , wedding_hall. *,booking_status_tb.*
					FROM 	wedding_booking, customer, wedding_hall, booking_status_tb
					WHERE 	wedding_booking.w_code = wedding_hall.w_code
					AND 	wedding_booking.cut_id = customer.cut_id
					AND 	wedding_booking.booking_status =2
					AND 	wedding_booking.booking_status = booking_status_tb.booking_status_code
					AND 	DATE_FORMAT(wedding_booking.booking_date,'%Y-%m-%d') between '$today_date' and '$after_date'";
					
	 return $this->db->query($myquery);
	}
public function get_payments_notification_count()
    {
		date_default_timezone_set('Asia/Gaza');   
		$today_date = date('Y-m-d');
		//$today_date= $dt->format("yyyy-mm-dd");
		$after_date=date('Y-m-d', strtotime('+5 days'));
		$myquery = "SELECT 		count(1) as cnt
					FROM 	wedding_booking, customer, wedding_hall, booking_status_tb
					WHERE 	wedding_booking.w_code = wedding_hall.w_code
					AND 	wedding_booking.cut_id = customer.cut_id
					AND 	wedding_booking.booking_status =2
					AND 	wedding_booking.booking_status = booking_status_tb.booking_status_code
					AND 	DATE_FORMAT(wedding_booking.booking_date,'%Y-%m-%d') between '$today_date' and '$after_date'";
					
	 return $this->db->query($myquery);
	}
	
	
	
}
?>