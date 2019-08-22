<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>







<?php







/*







Plugin Name: Event Management







Plugin URI: hatazu.com







Description: create table database.







Version: 1.6.9







Author: hatazu







Author URI:hatazu.com







License: GPL2







*/







function event_admin() {







    include('event_import_admin.php');







}







 







function event_admin_actions() {







	global $pw_settings_page;







    $pw_settings_page = add_options_page("Event management", "Event management",'activate_plugins', basename(__FILE__), "event_admin");







}







include('customer.php');







include('event.php');







include('join_event.php');







include('service.php');







add_action('admin_menu', 'event_admin_actions');







include('load_lib.php');







add_action('admin_enqueue_scripts', 'pw_load_scripts');







include('init_table_admin.php');







register_activation_hook( __FILE__, 'hatazu_event_install' );







include('register_action_admin.php');







if ( is_admin() ) {







    add_action( 'wp_ajax_delete_customer_join', 'delete_customer_join' );







    add_action( 'wp_ajax_nopriv_delete_customer_join', 'delete_customer_join');







    // customer







    add_action( 'wp_ajax_load_all_customer', 'load_all_customer' );







    add_action( 'wp_ajax_nopriv_load_all_customer', 'load_all_customer' );















    add_action( 'wp_ajax_update_customer', 'update_customer' );







    add_action( 'wp_ajax_nopriv_update_customer', 'update_customer');















    add_action( 'wp_ajax_delete_customer', 'delete_customer' );







    add_action( 'wp_ajax_nopriv_delete_customer', 'delete_customer');







    //end customer







    // load all customer would like to consult about fitness







    add_action( 'wp_ajax_consultant_customer', 'consultant_customer');







    add_action( 'wp_ajax_nopriv_consultant_customer', 'consultant_customer');















    add_action( 'wp_ajax_clear_data', 'clear_data' );







    add_action( 'wp_ajax_nopriv_clear_data', 'clear_data' );















    add_action( 'wp_ajax_customer_join_event', 'customer_join_event' );







    add_action( 'wp_ajax_nopriv_customer_join_event', 'customer_join_event' );















    add_action( 'wp_ajax_customer_target_event', 'customer_target_event' );







    add_action( 'wp_ajax_nopriv_customer_target_event', 'customer_target_event' );







    







    add_action( 'wp_ajax_customer_not_reach', 'customer_not_reach' );







    add_action( 'wp_ajax_nopriv_customer_not_reach', 'customer_not_reach' );







    //event







    add_action( 'wp_ajax_all_event', 'all_event' );







    add_action( 'wp_ajax_nopriv_all_event', 'all_event' );















    add_action( 'wp_ajax_hatazu_create_new_event', 'hatazu_create_new_event' );







    add_action( 'wp_ajax_nopriv_hatazu_create_new_event', 'hatazu_create_new_event' );















     add_action( 'wp_ajax_load_all_event_tb', 'load_all_event_tb' );







     add_action( 'wp_ajax_nopriv_load_all_event_tb', 'load_all_event_tb' );







     







     add_action( 'wp_ajax_remove_event', 'remove_event' );







     add_action( 'wp_ajax_nopriv_remove_event', 'remove_event' );







}







//include('sms/library.php');







include('modal_popup.php');







add_action('wp_footer', 'popup_event_bsnhatoi');







//add_action('wp_footer', 'popup_consultant');







add_action("wp_enqueue_scripts", "hatazu_custom_style");















include('register_action_user.php');















add_action('wp_ajax_hatazu_user_register_event', 'hatazu_user_register_event');







add_action('wp_ajax_nopriv_hatazu_user_register_event', 'hatazu_user_register_event');















//consultant















//send link







add_action( 'wp_ajax_hatazu_plug_send_link', 'hatazu_plug_send_link' );







add_action( 'wp_ajax_nopriv_hatazu_plug_send_link', 'hatazu_plug_send_link' );















add_action('wp_ajax_hatazu_request_time_event', 'hatazu_request_time_event');







add_action('wp_ajax_nopriv_hatazu_request_time_event', 'hatazu_request_time_event');