<?php

function hatazu_user_register_event(){

	wp_verify_nonce( 'my-special-string', 'security');
	$firstname = htmlspecialchars(stripslashes(trim($_POST['_firstname'])));
	//$lastname = htmlspecialchars(stripslashes(trim($_POST['_lastname'])));
	$email = htmlspecialchars(stripslashes(trim($_POST['_email'])));
	$phone = htmlspecialchars(stripslashes(trim($_POST['_phone'])));

	$idservice = htmlspecialchars(stripslashes(trim($_POST['_selected'])));

	$gift = htmlspecialchars(stripslashes(trim($_POST['_gift'])));
	$address = htmlspecialchars(stripslashes(trim($_POST['_address'])));
	$url_voucher = htmlspecialchars(stripslashes(trim($_POST['_url_voucher'])));
	$lotto = rand(10000,99999);
	$event = new event();

	$event->curent_id_event();

	$error = array();

	$valid_event = $event->valid_id_event();

	if($valid_event){

		$id_event = $event->_Id_event();

		$customer = new customer();

		$customer->Firstname($firstname);

		//$customer->Lastname($lastname);

		$customer->Email($email);

		$customer->Num_phone($phone);

		$customer->Address($address);

		//$idcus_by_email = $customer->exist_customer_by_email();

		$customer->exist_customer_by_phone();

		$idcus_by_phone = $customer->_Id_customer();

		if(empty($idcus_by_phone)){

			$customer->add_customer();

		}

		$join = new join_event();

		$join->number_lotto($lotto);

		$join->gift($gift);

		$exist_joined = $join->exist_joined_event($customer,$event);

		//$result = array('error'=>$exist_joined,'sql'=>$join->_sql());	

		//echo json_encode($result);

		//die();

		if(!$exist_joined){

			$service = new service();

			$service->idservice($idservice);

			$join->join_event($customer,$event,$service);

			$mail = send_lotto($firstname,$email,$phone,$lotto,$gift,$url_voucher,$address);

		}else{

			$error='<span style="color:#451512;font-size:18px;font-weight:600;padding-top:15px;">Bạn đã tham gia sự kiện quá một lần</span>';

			//$error=1;

		}

		$_error=$customer->_Error();

		if(!empty($_error)){

			$error = $_error;

		}

	}else{

		$error='<span style="color:#451512;font-size:18px;font-weight:600;padding-top:15px;">Chưa có sự kiện, trong thời gian hiện tại</span>';

		//$error=-1;

	}

	$result = array('email'=>$mail);	

	echo json_encode($result);

	die();

}



function hatazu_request_time_event(){

	wp_verify_nonce( 'my-special-string', 'security');

	$get = htmlspecialchars(stripslashes(trim($_POST['_get'])));

	if(empty($get)){

		$result = array('error'=>'error');	

		echo json_encode($result);

		die();

	}

	$start='';$end='';

	$event = new event();

	$event->curent_id_event();

	$error='';

	$valid_event = $event->valid_id_event();

	if($valid_event){

		$id_event = $event->_Id_event();

		$start = $event->_Time_start();

		$end = $event->_Times_finish();

	}else{

		$error='<span style="color:#fff;">Chưa có sự kiện, trong thời gian hiện tại</span>';

	}

	$result = array('error'=>$error,'start'=>$start,'end'=>$end);	

	echo json_encode($result);

	die();

}


add_action( 'wp_ajax_hatazu_plug_register_consultant', 'hatazu_plug_register_consultant' );

add_action( 'wp_ajax_nopriv_hatazu_plug_register_consultant', 'hatazu_plug_register_consultant' );
function hatazu_plug_register_consultant(){

	wp_verify_nonce( 'my-special-string', 'security');
	echo json_encode(array('error'=>'hi'));
	wp_die();
	$firstname = htmlspecialchars(stripslashes(trim($_POST['_firstname'])));

	//$lastname = htmlspecialchars(stripslashes(trim($_POST['_lastname'])));

	$email = htmlspecialchars(stripslashes(trim($_POST['_email'])));

	$phone = htmlspecialchars(stripslashes(trim($_POST['_phone'])));

	$message = htmlspecialchars(stripslashes(trim($_POST['_message'])));

	//$result = array('test'=>$email,'error'=>$phone,'phone'=>$message);	

	//echo json_encode($result);

	//die();

	$customer = new customer();

	$customer->Firstname($firstname);

	$customer->Lastname($lastname);	

	$customer->Email($email);

	$customer->Num_phone($phone);
	
	$customer->exist_customer_by_phone();

	//$result = array('param'=>$phone,'test'=>$customer->_Id_customer(),'error'=>$customer->_Error(),'phone'=>$customer->_Num_phone());	

	//echo json_encode($result);

	//die();

	$idcus = $customer->_Id_customer();

	if(empty($idcus)){

		$customer->add_customer();

	}

	$customer->sendmessage($message);

	$result = array('test'=>$customer->_Test(),'error'=>$customer->_Error(),'phone'=>$customer->_Num_phone());	

	echo json_encode($result);

	die();

}

function hatazu_plug_send_link(){

	wp_verify_nonce( 'my-special-string', 'security');

	$phone = htmlspecialchars(stripslashes(trim($_POST['_phone'])));

	//echo json_encode($result);

	//die();

	$customer = new customer();

	$customer->Num_phone($phone);

	$customer->exist_customer_by_phone();

	//$result = array('param'=>$phone,'test'=>$customer->_Id_customer(),'error'=>$customer->_Error(),'phone'=>$customer->_Num_phone());	

	//echo json_encode($result);

	//die();

	$idcus = $customer->_Id_customer();

	if(empty($idcus)){

		$customer->add_customer();

	}

	$customer->sendmessage($message);

	//$android = "https://play.google.com/store/apps/details?id=com.onehealth.DoctorOHApp&hl=vi";

	//$ios = "https://itunes.apple.com/us/app/droh-b%C3%A1c-s%C4%A9-nh%C3%A0-t%C3%B4i/id1264916712?mt=8";

	$smsMessage = "link test";

    $responseCode = sendFromOneHealth($phone, $smsMessage);

	//$result = array('sms'=>$sms,'error'=>$customer->_Error(),'phone'=>$customer->_Num_phone());

	$error = _getCause($responseCode);

	$result = array('sms'=>$error);	

	echo json_encode($result);

	die();

} 

function send_lotto($fullname,$to,$phone,$lotto,$gift,$url_voucher,$address){

     wp_verify_nonce( 'my-special-string', 'security' );

     date_default_timezone_set('Asia/Ho_Chi_Minh');

     $time_reg = date('Y-m-d H:i:s', time());

     $subject = 'Quà tặng may mắn';  

     $message  = "<!DOCTYPE html><body>";    

     $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";

     $message .= "<tr><td>"; 

     $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:550px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";  

     $message .= "<thead>

    <tr height='80'>

     <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:14px;' >Chúc mừng bạn nhận voucher từ thẩm mỹ viện Thiên Khuê</th>

    </tr>

    </thead>";

  

    $message .= "<tbody>

    <tr width=\"100%\" align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>

     <td style='text-align:center;'>Vui lòng giữ email để chứng nhận nhận quà hợp lệ </td>

    </tr>

    <tr width=\"100%\" style='background-color:#f5f5f5;font-size:15px;padding-left:15px;padding-right:15px;'>

     <td width=\"100%\" colspan='4' align='left' style='padding-left:5px;padding-right:5px;'>

      <p style='font-size:14px;'>Họ và tên: ".$fullname.".</p>

      <p style='font-size:14px;'>email: ".$to.".</p>   

      <p style='font-size:14px;'>Điện thoại: ".$phone.".</p>
      <p style='font-size:14px;'>:Địa chỉ: ".$address.".</p>
      <p style='font-size:14px;'>Qùa tặng: ".$gift.".</p>

      <p style='font-size:14px;'>Mã số may mắn: ".$lotto.".</p>
      <p style='font-size:16px;'>Hotline: 19001768</p>
     </td>
     
    </tr>
    <tr width=\"100%\" style='background-color:#f5f5f5;font-size:15px;padding-left:15px;padding-right:15px;'>
    	<td width=\"100%\" colspan='4' align='center'>
     	<img alt=\"voucher\" height=\"auto\" width=\"300px\" src=\"".$url_voucher."\">

     </td>
    </tr>
          

    </tbody>";

     //$phone ="<p style='font-size:14px;'>Điện thoại: ".$phone.".</p>"; 

    //end body           

     $message .= "</table>"; 

     $message .= "</td></tr>";

     $message .= "</table>";           

     $message .= "</body></html>";



    $headers  = 'MIME-Version: 1.0' . "\r\n";

    $headers .= 'Content-type: text/html; charset=utf8' . "\r\n";      

    // Create email headers

    $headers .= 'From: '.$to."\r\n".

        'Reply-To: '.$to."\r\n" .

        'X-Mailer: PHP/' . phpversion();

    

    $mail_send = wp_mail($to, $subject, $message, $headers);

    // if(!$mail_send){

    //     $result ="Cảm ơn bạn đã quan tâm,<br>Chúng tôi sẽ cố gắng trả lời thắc mắc của bạn trong thời gian sớm nhất có thể"; 

    //     echo json_encode(array('error'=>'','result'=>$result,'file'=>$name));

    //      die();     

    // }

    // else{

    //     echo json_encode(array('error'=>$mail_send->error,'result'=>''));

    //      die();

    // }

       return $mail_send;    

} 

?>