<?php 
if(!function_exists('send_comment')):
	function send_comment(){
			 //check_ajax_referer( 'my-special-string', 'security' );
			 wp_verify_nonce( 'my-special-string','security');
			 $comment_post_ID = htmlspecialchars(stripslashes(trim($_POST['comment_post_ID'])));
			 $comment_parent = htmlspecialchars(stripslashes(trim($_POST['comment_parent'])));
			 $text_comment = htmlspecialchars(stripslashes(trim($_POST['comment_body'])));
			 date_default_timezone_set('Asia/Ho_Chi_Minh');
			 $time = current_time('mysql');
			$data = array(
			    'comment_post_ID' => $comment_post_ID,
			    'comment_author' => '',
			    'comment_author_email' => '',
			    'comment_author_url' => '',
			    'comment_content' => $text_comment,
			    'comment_type' => '',
			    'comment_parent' => $comment_parent,
			    'user_id' => 1,
			    'comment_author_IP' => '127.0.0.1',
			    'comment_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.10) Gecko/2009042316 Firefox/3.0.10 (.NET CLR 3.5.30729)',
			    'comment_date' => $time,
			    'comment_approved' => 1,
			);

				wp_insert_comment($data);
	            echo json_encode(array('post_ID'=>$comment_post_ID,'parent'=>$comment_parent));
	             wp_die();
	        }
endif;
add_action( 'wp_ajax_send_comment', 'send_comment' );
add_action( 'wp_ajax_nopriv_send_comment', 'send_comment' );
?>