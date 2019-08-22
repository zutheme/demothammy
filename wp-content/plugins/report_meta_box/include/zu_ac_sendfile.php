<?php

function send_files(){

    wp_verify_nonce('my-special-string', 'security'); 

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $time_reg = date('Y-m-d H:i:s', time());

    $current_user = wp_get_current_user();

    $iduser = $current_user->ID;

    //$idpost = get_the_ID();

    $idpost = $_POST['idpost'];

    $result = array('error'=>'','idfile'=>'');

    if(!$current_user){

        echo json_encode("Bạn chưa đăng nhập");

        die();

    }

    $id_post = get_the_ID();

    if(isset($_FILES['fileupload']))

    {  

        wp_verify_nonce( 'my-special-string', 'security' );   

        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );      

            $uploadedfile = $_FILES['fileupload'];

            $upload_overrides = array( 'test_form' => false );

            add_filter('upload_dir', 'upload_dir_send_file');

            $upload_dir = wp_upload_dir();    

            $fileName = $_FILES['fileupload']['name'];           

            $tmp_name = $_FILES["fileupload"]["tmp_name"];

            //$name = basename($_FILES["fileupload"]["name"]);

             $result['error'] = '';

             $pattern ="/\:|\s/i";

             $replacement="-";

             $time_reg = preg_replace($pattern, $replacement, $time_reg);

             //$ext = pathinfo($fileName, PATHINFO_EXTENSION);

            $base_filename = $time_reg."-".$current_user->user_login."-".$fileName; 

            $pathfile = $upload_dir['path']."/".$base_filename;

            $movefile = move_uploaded_file($tmp_name, $pathfile);     

            remove_filter('upload_dir', 'upload_dir_send_file');

            if ( $movefile ) {

                $upload_url = ( $upload_dir['url'] );               

                $fullpathfile = $upload_url."/".$base_filename;

                $_file = new file();

                $_file->set_url_file($fullpathfile);

                $_file->set_namefile($fileName);

                $_file->uploadfile();

                $idfile = $_file->get_id_file();               

                $_receive = new receive();

                $_receive->receive_file($_file, $iduser, $idpost);

                $error = $_receive->get_error();

                $result['error'] = $error;

                $result['idfile'] = $idfile;

                echo json_encode($result);

                die();

            } else {

                $result['error'] = 'Possible file upload attack!\n';

                $result['path'] = ''; 

                echo json_encode($result);

                die();

            }  

    }

     echo json_encode("error upload\n");

     die();  

}

add_action( 'wp_ajax_send_files', 'send_files' );

add_action( 'wp_ajax_nopriv_send_files', 'send_files');



function receive_files(){

    wp_verify_nonce('my-special-string', 'security'); 

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    global $post;

    $time_reg = date('Y-m-d H:i:s', time());

     $current_user = wp_get_current_user();

    $iduser = $current_user->ID;

    $idpost = $_POST['idpost'];

    $author_post = $_POST['author_post'];    

    // $result = array('error'=>'','path'=>$id_post.",".$author_post.",". $iduser);

    //     echo json_encode($result);

    //     die();

    $result = array('error'=>'','idfile'=>'');

    if($iduser == 0){

        $result = array('error'=>'Bạn chưa đăng nhập','path'=>'');

        echo json_encode($result);

        die();

    }

    

    if(isset($_FILES['_attach_comment']))

    {  

        wp_verify_nonce( 'my-special-string', 'security' );   

        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );      

            $uploadedfile = $_FILES['_attach_comment'];

            $upload_overrides = array( 'test_form' => false );

            add_filter('upload_dir', 'upload_dir_send_file');

            $upload_dir = wp_upload_dir();    

            $fileName = $_FILES['_attach_comment']['name'];           

            $tmp_name = $_FILES["_attach_comment"]["tmp_name"];

            //$name = basename($_FILES["fileupload"]["name"]);

             $result['error'] = '';

             $pattern ="/\:|\s/i";

             $replacement="-";

             $time_reg = preg_replace($pattern, $replacement, $time_reg);
             $ext = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
             //$ext = pathinfo($fileName, PATHINFO_EXTENSION);

            $base_filename = $time_reg."-".$current_user->user_login."-".$fileName; 

            $pathfile = $upload_dir['path']."/".$base_filename;

            $movefile = move_uploaded_file($tmp_name, $pathfile);     

            remove_filter('upload_dir', 'upload_dir_send_file');

            if ( $movefile ) {

                $upload_url = ( $upload_dir['url'] );               

                $fullpathfile = $upload_url."/".$base_filename;

                $_file = new file();

                $_file->set_url_file($fullpathfile);

                $_file->set_namefile($fileName);
                $_file->set_typefile($ext);

                $_file->uploadfile();

                $_file->get_id_file();               

                $_receive = new receive();

                $_receive->receive_file($_file, $iduser, $idpost);

                $error = $_receive->get_error();

                $idfile = $_file->get_id_file();

                $result['error'] = $error;

                $result['idfile'] = $idfile;

                echo json_encode($result);

                die();

            } else {

                $result['error'] = 'Possible file upload attack!\n';

                $result['idfile'] = ''; 

                echo json_encode($result);

                die();

            }  

    }

     echo json_encode("error upload\n");

     die();  

}

add_action( 'wp_ajax_receive_files', 'receive_files' );

add_action( 'wp_ajax_nopriv_receive_files', 'receive_files');

function attach_files(){

    wp_verify_nonce('my-special-string', 'security'); 

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    global $post;

    $time_reg = date('Y-m-d H:i:s', time());

     $current_user = wp_get_current_user();

    $iduser = $current_user->ID;

    $idpost = $_POST['idpost'];

    $author_post = $_POST['author_post'];    

    // $result = array('error'=>'','path'=>$id_post.",".$author_post.",". $iduser);

    //     echo json_encode($result);

    //     die();

    $result = array('error'=>'','idfile'=>'');

    if($iduser == 0){

        $result = array('error'=>'Bạn chưa đăng nhập','path'=>'');

        echo json_encode($result);

        die();

    }

    

    if(isset($_FILES['_attach_post']))

    {  

        wp_verify_nonce( 'my-special-string', 'security' );   

        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );      

            $uploadedfile = $_FILES['_attach_post'];

            $upload_overrides = array( 'test_form' => false );

            add_filter('upload_dir', 'upload_dir_send_file');

            $upload_dir = wp_upload_dir();    

            $fileName = $_FILES['_attach_post']['name'];           

            $tmp_name = $_FILES["_attach_post"]["tmp_name"];

            //$name = basename($_FILES["fileupload"]["name"]);

             $result['error'] = '';

             $pattern ="/\:|\s/i";

             $replacement="-";

             $time_reg = preg_replace($pattern, $replacement, $time_reg);
             $ext = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
             //$ext = pathinfo($fileName, PATHINFO_EXTENSION);

            $base_filename = $time_reg."-".$current_user->user_login."-".$fileName; 

            $pathfile = $upload_dir['path']."/".$base_filename;

            $movefile = move_uploaded_file($tmp_name, $pathfile);     

            remove_filter('upload_dir', 'upload_dir_send_file');

            if ( $movefile ) {

                $upload_url = ( $upload_dir['url'] );               

                $fullpathfile = $upload_url."/".$base_filename;

                $_file = new file();

                $_file->set_url_file($fullpathfile);

                $_file->set_namefile($fileName);
                $_file->set_typefile($ext);
                $_file->uploadfile();

                $_file->get_id_file();               

                $_receive = new receive();

                $_receive->receive_file($_file, $iduser, $idpost);

                $error = $_receive->get_error();

                $idfile = $_file->get_id_file();

                $result['error'] = $error;

                $result['idfile'] = $idfile;

                echo json_encode($result);

                die();

            } else {

                $result['error'] = 'Possible file upload attack!\n';

                $result['idfile'] = ''; 

                echo json_encode($result);

                die();

            }  

    }

     echo json_encode("error upload\n");

     die();  

}

add_action( 'wp_ajax_attach_files', 'attach_files' );

add_action( 'wp_ajax_nopriv_attach_files', 'attach_files');

function sendto(){

    wp_verify_nonce('my-special-string', 'security'); 

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    global $post;

    $time_reg = date('Y-m-d H:i:s', time());

    $current_user = wp_get_current_user();

    $iduser = $current_user->ID;

    $idpost = $_POST['idpost'];

    $idauthor = $_POST['author_post'];

    $idfile = $_POST['idfile'];

    $comment = $_POST['comment'];  

   

    if($iduser == 0){

        $result = array('error'=>'Bạn chưa đăng nhập','sql'=>'');

        echo json_encode($result);

        die();

    }

    $_file = new file();

    $_file->set_id_file($idfile);                      

    $_send = new send();

    $_send->set_comment($comment);

    $_send->sendto($_file,$iduser,$idpost,$idauthor);

    $sql = $_send->get_sql();

    $error = $_send->get_error();

    $result['error'] = $error;

    $result['sql'] = $sql;

    echo json_encode($result);

    die();

}

add_action( 'wp_ajax_sendto', 'sendto' );

add_action( 'wp_ajax_nopriv_sendto', 'sendto');



function upload_dir_send_file($upload) {

  $upload['subdir'] = '/receivefile' . $upload['subdir'];

  $upload['path']   = $upload['basedir'] . $upload['subdir'];

  $upload['url']    = $upload['baseurl'] . $upload['subdir'];

  return $upload;

}



?>