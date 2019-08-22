<?php
function hatazu_contact_menu_script() 
 {
    //css
    //wp_enqueue_style( 'hatazu_contact_style.css',  bloginfo('template_directory') . 'css/hatazu_contact_menu_style.css',array(), '1.0.0', 'all');
     //wp_enqueue_style( 'font-awesome.min', plugin_dir_url(__FILE__) . 'font-awesome-4.7.0/css/font-awesome.min',array(), '4.7.0', 'all');
    //jquery
    wp_enqueue_script( 'script-ajax', get_template_directory_uri()  .'/js/ajax.js', array(), '1.0.0', true );
  	wp_localize_script( 'script-ajax', 'MyAjax', array(
    // URL to wp-admin/admin-ajax.php to process data
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
 
    // Creates a random string to test against for security purposes
    'security' => wp_create_nonce( 'my-special-string' )
  ));
 }
add_action("wp_enqueue_scripts", "hatazu_contact_menu_script");
?>