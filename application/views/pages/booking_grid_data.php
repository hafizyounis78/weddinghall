<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<?php
$requestData= $_REQUEST;

    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
 
//$sEcho = intval($_REQUEST['draw']);
//$iDisplayLength = intval($_REQUEST['length']);
  //$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
//  $iDisplayStart = intval($_REQUEST['start']);
/***************************/


/***************************/

$columns = array( 
// datatable column index  => database column name
	
	0 =>'w_name', 
	1 => 'booking_date',
	2=> 'cut_id',
	3 =>'name', 
	4 => 'tel',
	5=> 'mobile',
	6=> 'booking_status'
	
);
/******************************/
//$this->load->model('bookingmodel');
//$rec = $this->bookingmodel->get_booking();
//$query=$rec->result();
/*****************************/
// getting total number records without any search

$sql = "select wedding_hall.*,customer.*,wedding_booking.*
		from wedding_hall,customer,wedding_booking
		where wedding_booking.w_code=wedding_hall.w_code
		and   wedding_booking.cut_id=customer.cut_id";

//$sql.=" FROM employee";
//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$rec = $this->db->query($sql);
$query=$rec;


$totalData = $query->num_rows();
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "select wedding_hall.*,customer.*,wedding_booking.*";
$sql.=" from wedding_hall,customer,wedding_booking
		where wedding_booking.w_code=wedding_hall.w_code
		and   wedding_booking.cut_id=customer.cut_id
		and   1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( w_name LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR booking_date between '".$requestData['search']['value']."%' and '".$requestData['search']['value']."%' " ;
	$sql.=" OR cut_id LIKE '".$requestData['search']['value']."%' )";
	$sql.=" OR name LIKE '".$requestData['search']['value']."%' )";
	$sql.=" OR tel LIKE '".$requestData['search']['value']."%' )";
	$sql.=" OR mobile LIKE '".$requestData['search']['value']."%' )";
	$sql.=" OR booking_status LIKE '".$requestData['search']['value']."%' )";
}
$query= $this->db->query($sql);
//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = $query->num_rows(); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
/*$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
//$requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$query= $this->db->query($sql);
$data = array();
foreach($query->result_array() as $row){
//while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["w_name"];
	$nestedData[] = $row["booking_date"];
	$nestedData[] = $row["cut_id"];
	$nestedData[] = $row["name"];
	$nestedData[] = $row["tel"];
	$nestedData[] = $row["mobile"];
	$nestedData[] = $row["booking_status"];
	
	
	$data[] = $nestedData;
}


//$records["draw"] = $sEcho;
$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
