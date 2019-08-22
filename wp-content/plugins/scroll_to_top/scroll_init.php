<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: hatazu scroll
 * Plugin URI: http://hatazu.com
 * Description: scroll box.
 * Version: 1.6.4
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'scroll_menu');
function scroll_menu() {
    add_menu_page('scroll Settings', 'scroll', 'administrator', 'scroll-settings', 'scroll_menu_settings_page', 'dashicons-admin-generic');
}
function scroll_menu_settings_page() {
    include('scroll_admin.php');
}

function scroll_menu_settings() {
    register_setting( 'scroll-settings-group', 'option' );
}
add_action( 'admin_init', 'scroll_menu_settings' );

include('scroll_box.php');
add_action( 'wp_footer', 'scroll_box');
add_action("wp_enqueue_scripts", "hatazu_scroll_menu_script"); 
function hatazu_scroll_menu_script() 
{
    //css
    wp_enqueue_style('hatazu_scroll_style', plugin_dir_url(__FILE__) . 'css/hatazu_scroll_style.css',array(), '0.0.7', 'all');
    //jquery
    wp_enqueue_script('hatazu_scroll_menu.js', plugin_dir_url(__FILE__) .'js/hatazu_scroll.js', array(), '0.0.6', true );
 } ?>