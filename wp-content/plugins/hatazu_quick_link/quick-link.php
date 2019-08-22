<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: hatazu quick link
 * Plugin URI: http://hatazu.com
 * Description: Link quick menu.
 * Version: 1.6.0
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'quick_link_menu');
function quick_link_menu() {
    add_menu_page('Quick link Settings', 'Quick link', 'administrator', 'quick-link-settings', 'quick_link_settings_page', 'dashicons-admin-generic');
}

function quick_link_settings() {
    register_setting( 'quick-link-settings-group', 'cost' );
    register_setting( 'quick-link-settings-group', 'about' );
    register_setting( 'quick-link-settings-group', 'activity' );
    register_setting( 'quick-link-settings-group', 'consultant' );
}
function quick_link_settings_page() {
    include('quick-link-admin.php');
}
add_action( 'admin_init', 'quick_link_settings' );
include('include/action.php');
include('link_box.php');
add_action( 'wp_footer', 'link_box');
add_action( 'wp_footer', 'floor2');
add_action( 'wp_footer', 'register_survey');
add_shortcode( 'form_reg', 'short_form_reg' );
add_action("wp_enqueue_scripts", "hatazu_quick_link_script");
function hatazu_quick_link_script() 
{
    //css
    wp_enqueue_style('hatazu_add_cart_style.css', plugin_dir_url(__FILE__) . 'css/hatazu_quick_link_style.css',array(), '1.8.1', 'all');
    wp_enqueue_style('modal.css', plugin_dir_url(__FILE__) . 'css/modal.css',array(), '2.3.3', 'all');
    //jquery
    //wp_enqueue_script('hatazu_quick_link.js', plugin_dir_url(__FILE__) .'js/hatazu_quick_link.js', array(), '3.9.4', true );
	
	 wp_enqueue_script('hatazu_quick_link.js', plugin_dir_url(__FILE__) .'js/hatazu_quick_link_access_block.js', array(), '4.0.8', true );
     wp_enqueue_script( 'hatazu_consultant_file', plugin_dir_url(__FILE__) .'js/consultant_file.js', array(), '1.4.4', true );
     wp_localize_script('hatazu_consultant_file', 'MyAjax', array(
    // URL to wp-admin/admin-ajax.php to process data
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    // Creates a random string to test against for security purposes
    'security' => wp_create_nonce( 'my-special-string')
  ));
 } ?>