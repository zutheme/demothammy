<?php
function all_event(){
	global $wpdb;
	$tb_event = $wpdb->prefix. 'event';
	$all_event = $wpdb->get_results(
	"
	select * from $tb_event
  	",OBJECT); 	
	echo json_encode($all_event);
	wp_die();
}
function delete_customer_join() {
	global $wpdb; // this is how you get access to the database
	$id_join = trim($_POST['_id_join']);
	$tb_join_event = $wpdb->prefix . 'join_event';
	$sql = "delete from $tb_join_event";
	$sql .=" where id_join='$id_join'";
		$wpdb->query($sql);
        //show error
        if($wpdb->last_error !== ''){
	        $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
	        $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
	        $error ="WordPress database error:[$str]<code>$query</code>";        
    	}
    $wpdb->flush();
	$json_data = array('error'=>$error);
	echo json_encode($json_data); 
    wp_die();
}

function update_customer() {
	$customer = new customer();
	$customer->Id_customer(trim($_POST['_id_customer']));
	$customer->Firstname(trim($_POST['_firstname']));
	$customer->Lastname(trim($_POST['_lastname']));
	$customer->Email(trim($_POST['_email']));
	$customer->Num_phone(trim($_POST['_num_phone']));
	$customer->Address(trim($_POST['_address']));
	//$json_data = array('error'=>$customer->Error(),'id_customer'=>$customer->_Id_customer());
	//echo json_encode($json_data); 
    //wp_die();
	$customer->update();
	$json_data = array('error'=>$customer->Error());
	echo json_encode($json_data); 
    wp_die();
}

function delete_customer() {
	$customer = new customer();
	$customer->Id_customer(trim($_POST['_id_customer']));
	$customer->delete();
	$json_data = array('error'=>$customer->Error(),'sql'=>$customer->_Id_customer());
	echo json_encode($json_data); 
    wp_die();
}

function load_all_customer() {
		global $wpdb; // this is how you get access to the database
		$whatever = intval($_POST['whatever']);
		$table_name = $wpdb->prefix . 'customer';
		// storing  request (ie, get/post) global array to a variable  
		$requestData= $_REQUEST;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'id',
			1 => 'firstname',
			2 => 'lastname', 
			3 => 'email',
			4 => 'num_phone',
			5 => 'address',
			6 => 'time_reg',
			7 => 'edit'
		);
		// getting total number records without any search
		$str_edit = "<button type=\"button\" class=\"btn-edit\"><span class=\"glyphicon glyphicon-edit\"></span></button>";
		$str_edit .="<button type=\"button\" class=\"btn-trash\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		//CONCAT('$str_delete') as edit
		$sql = "SELECT id, firstname, lastname, email, num_phone, address, time_reg, CONCAT('$str_edit') as edit ";
		$sql.=" FROM $table_name";
		$query = $wpdb->get_results( $sql, OBJECT );
		$totalData = count($query);
		$totalFiltered = $totalData; 		

		if( !empty($requestData['search']['value']) ) {
			// if there is a search parameter
			$sql = "SELECT id,firstname, lastname, email, num_phone, address, time_reg, CONCAT('$str_edit') as edit ";
			$sql.=" FROM $table_name";
			$sql.=" WHERE id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
			$sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
			$sql.=" OR time_reg LIKE '".$requestData['search']['value']."%' ";
			$query = $wpdb->get_results( $sql, OBJECT );
			$totalData = count($query);
			$totalFiltered = $totalData; 

			$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
			$query = $wpdb->get_results( $sql, OBJECT );
			
		} else {	

			$sql = "SELECT id, firstname, lastname, email, num_phone, address, time_reg, CONCAT('$str_edit') as edit ";
			$sql.=" FROM $table_name";
			$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
			$query = $wpdb->get_results( $sql, OBJECT );
		}

		$data = array();
		foreach ($query as $row) {	
			$nestedData=array(); 
			$nestedData[] = $row->id;
			$nestedData[] = $row->firstname;
			$nestedData[] = $row->lastname;
			$nestedData[] = $row->email;
			$nestedData[] = $row->num_phone;
			$nestedData[] = $row->address;
			$nestedData[] = $row->time_reg;
			$nestedData[] = $row->edit;
			$data[] = $nestedData;
		}

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);

		echo json_encode($json_data);  // send data as json format
		 //echo $whatever;
		   wp_die();
}

//consultant

function consultant_customer() {
	//$id_event = $_POST['idevent'];
	global $wpdb; 
	
	$tb_customer = $wpdb->prefix . 'customer';
	$tb_consultant_customer = $wpdb->prefix . 'customer_consultant';

/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
$columns = array( 
// datatable column index  => database column name
	0 => 'id',
	1 => 'firstname', 
	2 => 'lastname',
	3 => 'email',
	4 => 'num_phone',
	5 => 'message',
	6 => 'address',
	7 => 'time_reg'
);

//$str_delete = "<button type=\"button\" class=\"btn btn-primary btn-details\">Delete</button>";
//$sql = "SELECT tb.firstname, tb.email, tb.num_phone, tb.message, tb.time_reg, CONCAT('$str_delete') as deletes";
$sql = "SELECT tb.id, tb.firstname, tb.lastname, tb.email, tb.num_phone, tb.message, tb.address, tb.time_reg";
$sql.=" FROM (";
	$sql.="select con.id, ac.firstname, ac.lastname, ac.email,ac.num_phone, con.message, ac.address, con.time_reg from $tb_consultant_customer as con JOIN 
			$tb_customer as ac
			on con.idcustomer = ac.id";	
	$sql.=") as tb";
$query = $wpdb->get_results( $sql, OBJECT );
$totalData = count($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	//$sql = "SELECT  tb.firstname, tb.email, tb.num_phone, tb.message, tb.time_reg, CONCAT('$str_delete') as deletes";
	$sql = "SELECT tb.id, tb.firstname, tb.lastname, tb.email, tb.num_phone, tb.message, tb.address, tb.time_reg";
	$sql.=" FROM (";
	$sql.="select con.id, ac.firstname, ac.lastname, ac.email,ac.num_phone,con.message,ac.address,con.time_reg from $tb_consultant_customer as con JOIN 
			$tb_customer as ac
			on con.idcustomer = ac.id";	
	$sql.=") as tb";	
	$sql.=" WHERE firstname LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR num_phone LIKE '".$requestData['search']['value']."%' ";
	$query = $wpdb->get_results( $sql, OBJECT );
	$totalData = count($query);
	$totalFiltered = $totalData; // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query = $wpdb->get_results( $sql, OBJECT );
	
} else {	
	//$sql = "SELECT  tb.firstname, tb.email, tb.num_phone, tb.message, tb.time_reg, CONCAT('$str_delete') as deletes";
	$sql = "SELECT  tb.id, tb.firstname, tb.lastname, tb.email, tb.num_phone, tb.message, tb.address, tb.time_reg";
	$sql.=" FROM (";
	$sql.=" select con.id, ac.firstname, ac.lastname, ac.email,ac.num_phone,con.message,ac.address,con.time_reg from $tb_consultant_customer as con JOIN 
			$tb_customer as ac
			on con.idcustomer = ac.id";	
	$sql.=") as tb";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query = $wpdb->get_results( $sql, OBJECT );
	
}
// echo json_encode($results);
// die();
$data = array();
foreach ($query as $row) {	
	$nestedData=array(); 
	$nestedData[] = $row->id;
	$nestedData[] = $row->firstname;
	$nestedData[] = $row->lastname;
	$nestedData[] = $row->email;
	$nestedData[] = $row->num_phone;
	$nestedData[] = $row->message;
	$nestedData[] = $row->address;
	$nestedData[] = $row->time_reg;
	//$nestedData[] = $row->deletes;
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);
	echo json_encode($json_data); 
 //echo $whatever;
   wp_die();
}
//end consultant

function customer_join_event() {
	//$id_event = intval( $_POST['idevent'] );
	$id_event = $_POST['idevent'];
	global $wpdb; 
	$tb_customer = $wpdb->prefix . 'customer';
	$tb_join_event = $wpdb->prefix . 'join_event';
	
$requestData= $_REQUEST;
$columns = array( 
// datatable column index  => database column name
	0 => 'id_join',
	1 => 'firstname',
	2 => 'lastname', 
	3 => 'email',
	4 => 'num_phone',
	5 => 'number_lotto',
	6 => 'gift',
	7 => 'nameservice',
	8 => 'date_join',
	9 => 'deletes'
);

$str_delete = "<button type=\"button\" class=\"btn-edit\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
$sql = "SELECT tb.id_join, tb.firstname, tb.lastname, tb.email, tb.num_phone, tb.number_lotto, tb.gift,tb.nameservice,tb.date_join, CONCAT('$str_delete') as deletes";
$sql.=" FROM (";
	$sql.="select ujv.id_join, ac.firstname, ac.lastname, ac.email, ac.num_phone,ujv.number_lotto,ujv.gift,s.nameservice,ujv.date_join from (select * from $tb_join_event
		 	where id_event='$id_event') as ujv
			inner join $tb_customer as ac on ac.id = ujv.id_customer JOIN wp_service as s on ujv.idservice = s.idservice";	
	$sql.=") as tb";
$query = $wpdb->get_results( $sql, OBJECT );
$totalData = count($query);
$totalFiltered = $totalData; 
if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT tb.id_join, tb.firstname, tb.lastname, tb.email, tb.num_phone, tb.number_lotto, tb.gift,tb.nameservice,tb.date_join, CONCAT('$str_delete') as deletes";
	$sql.=" FROM (";
	$sql.="select ujv.id_join, ac.firstname, ac.lastname, ac.email, ac.num_phone,ujv.number_lotto,ujv.gift,s.nameservice,ujv.date_join from (select * from $tb_join_event
		 	where id_event='$id_event') as ujv
			inner join $tb_customer as ac on ac.id = ujv.id_customer JOIN wp_service as s on ujv.idservice = s.idservice";	
	$sql.=") as tb";	
	$sql.=" WHERE email LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR date_join LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR number_lotto LIKE '".$requestData['search']['value']."%' ";
	$query = $wpdb->get_results( $sql, OBJECT );
	$totalData = count($query);
	$totalFiltered = $totalData;

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
	$query = $wpdb->get_results( $sql, OBJECT );
	
} else {	

	$sql = "SELECT tb.id_join, tb.firstname, tb.lastname, tb.email, tb.num_phone, tb.number_lotto, tb.gift,tb.nameservice,tb.date_join, CONCAT('$str_delete') as deletes";
	$sql.=" FROM (";
	$sql.="select ujv.id_join, ac.firstname, ac.lastname, ac.email, ac.num_phone,ujv.number_lotto,ujv.gift,s.nameservice,ujv.date_join from (select * from $tb_join_event
		 	where id_event='$id_event') as ujv
			inner join $tb_customer as ac on ac.id = ujv.id_customer JOIN wp_service as s on ujv.idservice = s.idservice";	
	$sql.=") as tb";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query = $wpdb->get_results( $sql, OBJECT );	
}

$data = array();
foreach ($query as $row) {	
	$nestedData=array(); 
	$nestedData[] = $row->id_join;
	$nestedData[] = $row->firstname;
	$nestedData[] = $row->lastname;
	$nestedData[] = $row->email;
	$nestedData[] = $row->num_phone;
	$nestedData[] = $row->number_lotto;
	$nestedData[] = $row->gift;
	$nestedData[] = $row->nameservice;
	$nestedData[] = $row->date_join;
	$nestedData[] = $row->deletes;
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format
 //echo $whatever;
   wp_die();
}

//customer have not opened
// select ac.email,ou.date_join from (select je.id_customer,je.date_join from (select * from wp_join_event where id_event='1') je left join (select * from wp_target_event where id_event='1') as te
// on je.id_customer= te.id_customer
// where te.id_target is null) as ou
// inner join wp_customer as ac
// on ou.id_customer=ac.id
function hatazu_create_new_event(){
        //Form data sent
        $event_name =  $_POST['_name_event'];
        $time_start =(string) $_POST['_time_start'];
        //$times_finish =(string) $_POST['_time_finish'];
        $time_finish = htmlspecialchars(stripslashes(trim($_POST['_time_finish'])));
        $event = new event();
        $event->Name_event($event_name);
        $event->Time_start($time_start);
        $event->Time_finish($time_finish);
        $event->add_event();
        $id = $event->_Id_event();
        $error = $event->_Error();
        $result = array('id_event'=>$event_name,'error'=>$error);
        echo json_encode($result);  // send data as json format
		 //echo $whatever;
		  die();
  }   

//event
function load_all_event_tb() {
		global $wpdb; // this is how you get access to the database
		//$whatever = intval( $_POST['whatever'] );
		$table_name = $wpdb->prefix . 'event';
		// storing  request (ie, get/post) global array to a variable  
		$requestData= $_REQUEST;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'id',
			1 => 'name_event',
			2 => 'time_start', 
			3 => 'time_finish',
			4 => 'deletes'
		);
		// getting total number records without any search
		$str_delete = "<button type=\"button\" class=\"btn-edit\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		$sql = "SELECT id, name_event, time_start, time_finish, CONCAT('$str_delete') as deletes ";
		$sql.=" FROM $table_name";
		$query = $wpdb->get_results( $sql, OBJECT );
		$totalData = count($query);
		$totalFiltered = $totalData; 		

		if( !empty($requestData['search']['value']) ) {
			// if there is a search parameter
			$sql = "SELECT id, name_event, time_start, time_finish, CONCAT('$str_delete') as deletes ";
			$sql.=" FROM $table_name";
			$sql.=" WHERE id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
			$sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
			$sql.=" OR time_reg LIKE '".$requestData['search']['value']."%' ";
			$query = $wpdb->get_results( $sql, OBJECT );
			$totalData = count($query);
			$totalFiltered = $totalData; 

			$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
			$query = $wpdb->get_results( $sql, OBJECT );
			
		} else {	

			$sql = "SELECT id, name_event, time_start, time_finish, CONCAT('$str_delete') as deletes ";
			$sql.=" FROM $table_name";
			$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
			$query = $wpdb->get_results( $sql, OBJECT );
		}

		$data = array();
		foreach ($query as $row) {
			$nestedData=array(); 
			$nestedData[] = $row->id;
			$nestedData[] = $row->name_event;
			$nestedData[] = $row->time_start;
			$nestedData[] = $row->time_finish;
			$nestedData[] = $row->deletes;
			$data[] = $nestedData;
		}

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);

		echo json_encode($json_data);  // send data as json format
		 //echo $whatever;
		   wp_die();
}
function remove_event(){
	$id_event = $_POST['_id_event'];
	$event = new event();
	$event->Id_event($id_event);
	$event->remove_event();
	$error = $event->_Error();
	echo json_encode(array('error'=>$error));
	wp_die();
}
?>