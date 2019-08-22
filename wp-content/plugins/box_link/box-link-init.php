<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: Box Link
 * Plugin URI: http://hatazu.com
 * Description: Box Link.
 * Version: 1.0.2
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'box_link_menu');
function box_link_menu() {
    add_menu_page('Box link Settings', 'Box link', 'administrator', 'box-link-settings', 'box_link_settings_page', 'dashicons-admin-generic');
}

function box_link_settings() {
    register_setting( 'box-link-settings-group', 'box-facebook' );
    register_setting( 'box-link-settings-group', 'box-twiter' );
    register_setting( 'box-link-settings-group', 'box-youtube' );
    register_setting( 'box-link-settings-group', 'box-phone' );
}
function box_link_settings_page() {
    include('box-link-admin.php');
}
add_action( 'admin_init', 'box_link_settings' );
include('box_link.php');
add_action( 'wp_footer', 'box_link');

function box_link_script() 
{
    //css
    wp_enqueue_style('box_link_style.css', plugin_dir_url(__FILE__) . 'css/box_link_style.css',array(), '0.0.4', 'all');
    //jquery
    wp_enqueue_script('box_link.js', plugin_dir_url(__FILE__) .'js/box_link.js', array(), '0.0.3', true );
 } 
add_action("wp_enqueue_scripts", "box_link_script");

 ?>