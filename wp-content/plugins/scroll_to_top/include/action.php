<?php
function send_message_mail(){
    wp_verify_nonce( 'my-special-string', 'security' );
    $fullname = $_POST["_name"];
    $email = $_POST["_email"];
    $phone = $_POST["_phone"];
    $address = $_POST["_address"];
    $to='hatazu@gmail.com,thammythienkhue@gmail.com,'.$email.",longcskh.thienkhue@gmail.com,longcskh.thienkhue@gmail.com,";
    $to .="quyencskh.thienkhue@gmail.com,hanpham168.82@gmail.com"; 
    //$result = $fullname.",".$email.",".$phone.",".$address;   
    date_default_timezone_set('Asia/Ho_Chi_Minh');
     $time_reg = date('Y-m-d H:i:s', time());
     $subject = 'Đăng ký '.$time_reg;  
     $message  = "<html><body>";    
     $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
     $message .= "<tr><td>"; 
     $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";  
     $message .= "<thead>
    <tr height='80'>
     <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Tư vấn</th>
    </tr>
    </thead>";
  
    $message .= "<tbody>
    <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
     <td style='text-align:center;'>Email:</td>
      <td style='text-align:center;'>".$to."</td> 
    </tr>
    
    <tr>
     <td colspan='4' style='padding-left:15px;padding-right:15px; border-top:1px solid #ccc;''>
      <p style='font-size:14px;'>Tiêu đề:  ".$subject."</p>  
     </td>
    </tr>      
    <tr>
     <td colspan='4' align='left' style='background-color:#f5f5f5;font-size:15px;padding-left:15px;padding-right:15px;'>
      <p style='font-size:14px;'>Họ và tên: ".$fullname.".</p>
      <p style='font-size:14px;'>email: ".$email.".</p>
      <p style='font-size:14px;'>Điện thoại: ".$phone.".</p>
      <p style='font-size:14px;'>Địa chỉ: ".$address.".</p>
     </td>
    </tr>
          
    </tbody>"; 
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
    if($mail_send){
        $result ="Cảm ơn bạn đã quan tâm,<br>Chúng tôi sẽ cố gắng trả lời thắc mắc của bạn trong thời gian sớm nhất có thể"; 
        echo json_encode(array('error'=>'','result'=>$result,'file'=>$name));
         die();     
    }
    else{
        echo json_encode(array('error'=>$mail_send->error,'result'=>''));
         die();
    }
            
}
add_action( 'wp_ajax_send_message_mail', 'send_message_mail' );
add_action( 'wp_ajax_nopriv_send_message_mail', 'send_message_mail');
function upload_images(){
    wp_verify_nonce( 'my-special-string', 'security' );
    // if(!(is_array($_POST) && is_array($_FILES) && defined('DOING_AJAX') && DOING_AJAX)){
    //     return;
    // }
        $fileName = $_FILES['imageData']['name'];
        $fileType = $_FILES['imageData']['type'];
        $file = $_FILES["imageData"]["tmp_name"];
        //$fileContent = file_get_contents($_FILES['imageData']['tmp_name']);
        //$dataURL = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
         if(!function_exists('wp_handle_upload')){
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }
        $upload_overrides = array('test_form' => false);
        if(isset($_FILES['imageData'])) {
          $movefile = wp_handle_upload($file, $upload_overrides);
            if($movefile) {
               $filename1 =  $movefile['file'];              
                 echo json_encode("Upload Success,type=".$fileType."filename=". $filename1);
                die();
            } else {
                echo json_encode("fail");
                die();
            }
        } 
   
}
add_action( 'wp_ajax_upload_images', 'upload_images' );
add_action( 'wp_ajax_nopriv_upload_images', 'upload_images'); 
function send_images(){
    wp_verify_nonce('my-special-string', 'security'); 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time_reg = date('Y-m-d H:i:s', time());
    //Sanitize input data using PHP filter_var().
    $user_name      = filter_var($_POST["_name"], FILTER_SANITIZE_STRING);
    $user_email     = filter_var($_POST["_email"], FILTER_SANITIZE_EMAIL);
    $phone_number   = filter_var($_POST["_phone"], FILTER_SANITIZE_NUMBER_INT);
    $address   = filter_var($_POST["_address"], FILTER_SANITIZE_STRING);
    $comment   = filter_var($_POST["_comment"], FILTER_SANITIZE_STRING);
    $selected   = filter_var($_POST["_selected"], FILTER_SANITIZE_STRING);
    //echo json_encode($comment.",".$selected);
    //die();
    $subject = "Tu van ".$phone_number;
    $message = "Họ tên: ".$user_name."<br>";
    $message .= "Điện thoại: ".$phone_number."<br>";
    $message .= "Email: ".$user_email."<br>";
    $message .= "Địa chỉ: ".$address."<br>";
    $message .= "Dịch vụ: ".$selected."<br>";
    $message .= "thắc mắc: ".$comment;

    ### Attachment Preparation ###
    $file_attached  = false; 
    if(isset($_FILES['imageData'])) //check uploaded file
    {
        //get file details we need
        $fileContent = file_get_contents($_FILES['imageData']['tmp_name']);
        //$dataURL = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
        $file_tmp_name    = $_FILES['imageData']['tmp_name'];
        $file_name        = $_FILES['imageData']['name'];
        $file_size        = $_FILES['imageData']['size'];
        $file_type        = $_FILES['imageData']['type'];
        $file_error       = $_FILES['imageData']['error'];
        
        $encoded_file = chunk_split(base64_encode($fileContent));
        $name_file =  $phone_number."-".$user_name."-".$address."-".$time_reg.".png";
        $attachments[] = array(
            'name' => $name_file, // Set File Name
            'data' => $encoded_file, // File Data
            'type' => $file_type, // Type
            'encoding' => 'base64' // Content-Transfer-Encoding
        );
        
    }
   $mail = sendMail("hatazu@gmail.com",$user_email, $message,$subject, $attachments); 
    echo json_encode($mail);
    die();
}
add_action( 'wp_ajax_send_images', 'send_images' );
add_action( 'wp_ajax_nopriv_send_images', 'send_images');

function sendMail($receive = "",$email = "", $text = "", $subject = "", $attachments = array()) {
    if(!$email || !$text) {
        return false;
    }
    //$to="longcskh.thienkhue@gmail.com,ngacskh.thienkhue@gmail.com,quyencskh.thienkhue@gmail.com,hanpham168.82@gmail.com";
    $headers   = array();
    $headers[] = "To: {$email},{$receive},{$to}";
    $headers[] = "From: Thẩm mỹ viên Thiên Khuê";
    $headers[] = "Reply-To: thammythienkhue@gmail.com";
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/".phpversion();
    $headers[] = "MIME-Version: 1.0";
    if(!empty($attachments)) {
        $boundary = md5(time());
        $headers[] = "Content-type: multipart/mixed;boundary=\"".$boundary."\"";
        // Have attachment, different content type and boundary required.
    } else {
        $headers[] = "Content-type: text/html; charset=UTF-8";
    }

    $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Tư vấn</title>
            <style>table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }</style>
        </head>
        <body style="font-family: arial;" width="100%">';
      $html .= $text;
       $html .='</body>
    </html>';

    $generated = date('jS M Y H:i:s');
    $subject = ($subject ? $subject : 'Default Subject');
    $message = $html;
    $message = str_replace("[text]", $text, $message);

    if(!empty($attachments)) {
        $output   = array();
        $output[] = "--".$boundary;
        $output[] = "Content-type: text/html; charset=\"utf-8\"";
        $output[] = "Content-Transfer-Encoding: 8bit";
        $output[] = "";
        $output[] = $message;
        $output[] = "";
        foreach($attachments as $attachment) {
            $output[] = "--".$boundary;
            $output[] = "Content-Type: ".$attachment['type']."; name=\"".$attachment['name']."\";";
            if(isset($attachment['encoding'])) {
                $output[] = "Content-Transfer-Encoding: " . $attachment['encoding'];
            }
            $output[] = "Content-Disposition: attachment;";
            $output[] = "";
            $output[] = $attachment['data'];
            $output[] = "";
        }
        return wp_mail($email, $subject, implode("\r\n", $output), implode("\r\n", $headers));
    } else {
        //wp_mail($to, $subject, $message, $headers);
        return wp_mail($email, $subject, $text, implode("\r\n", $headers));
    }
}
?>