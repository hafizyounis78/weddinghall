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
		$myquery = "select wedding_hall.*,customer.*,wedding_booking.*,booking_status_tb.*
					from wedding_hall,customer,wedding_booking,booking_status_tb
					where wedding_booking.w_code=wedding_hall.w_code
					and   wedding_booking.cut_id=customer.cut_id
					and wedding_booking.booking_status=booking_status_tb.booking_status_code
					and wedding_booking.booking_code=$booking_code";
        return $this->db->query($myquery);

	}
	public function get_all_booking()//,$cut_id)
	{
		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*,booking_status_tb.*
					from wedding_hall,customer,wedding_booking,booking_status_tb
					where wedding_booking.w_code=wedding_hall.w_code
					and   wedding_booking.cut_id=customer.cut_id
					and wedding_booking.booking_status=booking_status_tb.booking_status_code
					and booking_status<>4";
        return $this->db->query($myquery);

	}
	public function get_customer_by_id($cut_id)
	{
		/*if ($cut_id_no!=0)
		{*/
		$this->db->where('cut_id',$cut_id);
		$query = $this->db->get('customer');
		return $query->result();
		/*}
		else
		return null;*/
	}
	
	public function get_all_booking_search($requestData){
		//$requestData= $_REQUEST;
		date_default_timezone_set('Asia/Gaza');   
		$today_date = date('Y-m-d');

		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*,booking_status_tb.*
					from wedding_hall,customer,wedding_booking,booking_status_tb
					where wedding_booking.w_code=wedding_hall.w_code
					and wedding_booking.cut_id=customer.cut_id
					and booking_status_tb.booking_status_code=wedding_booking.booking_status
					and booking_status<>4";
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
		if(isset($requestData['tel']) && $requestData['tel'] !='')
		{
			$myquery = $myquery." AND tel LIKE '".$requestData['tel']."%' ";
		}
		if(isset($requestData['mobile']) && $requestData['mobile'] !='')
		{
			$myquery = $myquery." AND mobile LIKE '".$requestData['mobile']."%' ";
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
		if(isset($requestData['booking_status']) && $requestData['booking_status'] !='')
		{
			$myquery = $myquery." AND booking_status LIKE '".$requestData['booking_status']."%' ";
		}

        return $this->db->query($myquery);

	}
	public function get_all_delbooking_search($requestData){
		//$requestData= $_REQUEST;
		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*,booking_status_tb.*
					from wedding_hall,customer,wedding_booking,booking_status_tb
					where wedding_booking.w_code=wedding_hall.w_code
					and wedding_booking.cut_id=customer.cut_id
					and booking_status_tb.booking_status_code=wedding_booking.booking_status
					and booking_status=4";
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
			$myquery = $myquery." AND old_booking_date between '".$requestData['booking_date_from']."' and '".$requestData['booking_date_to']."'";
		}
		if(isset($requestData['booking_date_from']) && $requestData['booking_date_from'] != ''
		   && (isset($requestData['booking_date_to']) && $requestData['booking_date_to'] == ''))
		{
			$myquery = $myquery." AND old_booking_date = '".$requestData['booking_date_from']."'";
		}
		/*if(isset($requestData['booking_status']) && $requestData['booking_status'] !='')
		{
			$myquery = $myquery." AND booking_status LIKE '".$requestData['booking_status']."%' ";
		}
*/
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
	public function get_booking_by_hall($w_code)
	{
		 $myquery = "select wedding_hall.*,customer.*,wedding_booking.*,booking_status_tb.*
					  from wedding_hall,customer,wedding_booking,booking_status_tb
					 WHERE wedding_booking.w_code = wedding_hall.w_code
					 AND wedding_booking.cut_id = customer.cut_id
					 AND wedding_booking.w_code=$w_code
					 AND booking_status<>4
					 and wedding_booking.booking_status=booking_status_tb.booking_status_code";
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
		
		/*$rec = $this->get_customer_by_id($cut_id);
		   */
		if ($isnew == 0)
		{
			
				$cdata['cut_id_no'] = $cut_id_no;
				$cdata['name'] = $name;
				$cdata['tel'] = $tel;
				$cdata['mobile'] = $mobile;
				$cdata['address'] = $address;
				$this->db->insert('customer',$cdata);
				$custm_id=$this->db->insert_id();		
			}
	
		else
			{	
			//اذا الكستومر موجود بدنا نطلب نستخدم كود المكستومر ونجيبه علشان ندخله في البوكينج
			//	foreach($rec as $row);
				$custm_id =$cut_id;
				//*************************************************
				$cdata['name'] = $name;
				$cdata['tel'] = $tel;
				$cdata['mobile'] = $mobile;
				$cdata['address'] = $address;
				$cdata['cut_id_no'] = $cut_id_no;
		
				$this->db->where('cut_id',$custm_id);
				$this->db->update('customer',$cdata);
			}
   		
		if ($booking_status==4)
		   {
			   $data['booking_status'] = 1;	
		//	   $this->db->where('booking_code',$hdnBooking_code);
			   
		   }
		
		$data['w_code'] = $w_code;
		$data['booking_date'] = $booking_date;
		$data['cut_id'] = $custm_id;
		$data['notes'] = $notes;			
	$this->db->where('booking_code',$hdnBooking_code);		
	$this->db->update('wedding_booking',$data);
		/**********************delete all booking details*************/
	$this->db->where('booking_code',$hdnBooking_code);
		$this->db->delete('wedding_booking_details');
		
		//$cdata['cut_id'] = $cut_id;
	return $hdnBooking_code;
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
	
		if($hdnOldcust != 1)
		{
			$cdata['cut_id_no'] = $cut_id_no;
			$cdata['name'] = $name;
			$cdata['tel'] = $tel;
			$cdata['mobile'] = $mobile;
			$cdata['address'] = $address;
			$this->db->insert('customer',$cdata);
			$customerid=$this->db->insert_id();	
		}
		else if($hdnOldcust >= 1)
		{
					$rec = $this->get_customer_by_id($cut_id_no);
					foreach($rec as $row);
					$customerid=$row->cut_id;
			}
	
/*****************booking************************/		
	$bdata['w_code'] = $w_code;
	$bdata['booking_date'] = $booking_date;
	$bdata['cut_id'] = $customerid;
	$bdata['booking_status'] = 1;
	$bdata['notes'] = $notes;

	$this->db->insert('wedding_booking',$bdata);
/*****************customer**********************/

	$bookingid=$this->db->insert_id();
		// IF Customer Is New -> Add Customer
		
		
/*****************booking details************************/	
       //extract($_POST);
		/*$sdata['booking_code'] = $GLOBALS['booking_code'];
		$sdata['sev_code'] = 30;
		$sdata['sev_price'] = 401;*/
		
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
		
/*$myquery = "select count(1) 
			from payments
			where booking_code=$hdnBookingcode";
			
$count=0;
$count=$this->db->query($myquery)->result();
if ($count>=1)
{
		$datab['booking_status']=2;
		$this->db->where('booking_code',$hdnBookingcode);
		$this->db->update('wedding_booking',$datab);
}

*/

	}
	public function delete_booking($booking_code)
	{
		$myquery = "select booking_date
					from wedding_booking
					where booking_code=$booking_code";
			
$b_date='';
$rec=$this->db->query($myquery)->result();
foreach ($rec as $row)
$b_date=$row->booking_date;

		$data['booking_status']=4;
		$data['booking_date']=null;
		$data['final_price']=0;
		$data['total_price']=0;
		$data['old_booking_date']=$b_date;
		
		$this->db->where('booking_code', $booking_code);
		$this->db->update('wedding_booking',$data);
		$this->delete_booking_details($booking_code);
		$this->delete_payemnts($booking_code);
	}
	public function delete_booking_details($booking_code)
	{

		 $this->db->where('booking_code',$booking_code);
		 $this->db->delete('wedding_booking_details');
		
	}
	public function delete_payemnts($booking_code)
	{//update the payments to delete statuse,payment_amount>=1 because some times there is an deleted payments befor

		$myquery = "update 	payments
					set 	payment_amount=payment_amount * (-1),
							payment_status=4
					where 	booking_code=$booking_code
					and     payment_amount>=1";
        return $this->db->query($myquery);
		
	}

}


?>