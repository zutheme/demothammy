<?php 

function add_query_vars_filter( $vars ){

  $vars[] = "email";

  $vars[] = "idevent";

 return $vars;

}

$ulr=$_SERVER['REQUEST_URI'];

//Add custom query vars

add_filter( 'query_vars', 'add_query_vars_filter' );

add_query_arg( array('email' => 'value1','idevent'=>'value2'),$ulr );



function your_scripts() {

  //wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/ajax.js', $deps=array(), $ver=true, true);

  wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/ajax.js', array(), '1.1.5', true );

  wp_localize_script( 'script-name', 'MyAjax', array(

    // URL to wp-admin/admin-ajax.php to process data

    'ajaxurl' => admin_url( 'admin-ajax.php' ),

    // Creates a random string to test against for security purposes

    'security' => wp_create_nonce( 'my-special-string' )

  ));

}

add_action( 'wp_enqueue_scripts', 'your_scripts' );



function get_the_user_ip() {

if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {

//check ip from share internet

$ip = $_SERVER['HTTP_CLIENT_IP'];

} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {

//to check ip is pass from proxy

$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

} else {

$ip = $_SERVER['REMOTE_ADDR'];

}

return apply_filters( 'wpb_get_ip', $ip );

}

/*login*/

//send mail

if(!function_exists('send_message')):
	function send_message(){
			 wp_verify_nonce( 'my-special-string', 'security' );
			 $to="hatazu@gmail.com";
			 $name = htmlspecialchars(stripslashes(trim($_POST['_name'])));
			 $email = htmlspecialchars(stripslashes(trim($_POST['_email'])));
			 $text_message = htmlspecialchars(stripslashes(trim($_POST['_message'])));
			 date_default_timezone_set('Asia/Ho_Chi_Minh');
       		 $time_reg = date('Y-m-d H:i:s', time());
       		 $subject = 'Tháº¯c máº¯c '.$time_reg;
   		     $message  = "<html><body>";    
		     $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
		     $message .= "<tr><td>"; 
		     $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";  
		     $message .= "<thead>
	        <tr height='80'>
	         <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >TÆ° váº¥n</th>
	        </tr>
	        </thead>";

	     	$message .= "<tbody>
	        <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
	         <td style='text-align:center;'>Email:</td>
	          <td style='text-align:center;'>".$to."</td> 
	        </tr>

	        <tr>

	         <td colspan='4' style='padding-left:15px;padding-right:15px; border-top:1px solid #ccc;''>

	          <p style='font-size:14px;'>TiÃªu Ä‘á»:  ".$subject."</p>  

	         </td>

	        </tr>      

	        <tr>

	         <td colspan='4' align='left' style='background-color:#f5f5f5;font-size:15px;padding-left:15px;padding-right:15px;'>

	          <p style='font-size:14px;'>Ná»™i dung:</p>

	          <p style='font-size:16px; font-family:Verdana, Geneva, sans-serif;'>".$text_message.".</p>

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

	            echo json_encode("<div id='form_success'>Cáº£m Æ¡n báº¡n Ä‘Ã£ quan tÃ¢m,<br>ChÃºng tÃ´i sáº½ cá»‘ gáº¯ng tráº£ lá»i tháº¯c máº¯c cá»§a báº¡n trong thá»i gian sá»›m nháº¥t cÃ³ thá»ƒ </div>	                <script>

	                jQuery(document).ready(function($) {

	                     $('#fr_sendmessage')[0].reset();

	                 });

	                </script>

	                ");

	             die();     

	        }

	        else{

	            echo json_encode($mail_send->error);

	             die();

	        }

	    

	}

endif;

add_action( 'wp_ajax_send_message', 'send_message' );

add_action( 'wp_ajax_nopriv_send_message', 'send_message' );