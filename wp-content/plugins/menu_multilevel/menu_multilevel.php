<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
 * Plugin Name: Menu multilevel
 * Plugin URI: http://zutheme.com
 * Description: Menu multilevel
 * Version: 1.0.0
 * Author: hatazu
 * Author URI: http://zutheme.com
 * License: GPL2
 */
add_action('admin_menu', 'option_htz_menu_multilevel');
function option_htz_menu_multilevel() {
    add_menu_page('menu option Settings', 'Menu multilevel', 'administrator', 'option-menu-multilevel-settings', 'option_menu_multilevel_settings_page', 'dashicons-admin-generic');
}

function option_menu_multilevel_settings_page() {
    include('menu-multilevel-admin.php');
}
//include('menu_multilevel_box.php');
//add_action( 'wp_footer', 'menu_multilevel_box');
function option_menu_multilevel_settings() {
    register_setting('option-menu_multilevel-settings', 'menu_multilevel-option');
}
add_action( 'admin_init', 'option_menu_multilevel_settings' );
include("widget.php"); 
add_action("wp_enqueue_scripts", "hatazu_menu_multilevel_script");
function hatazu_menu_multilevel_script() {
    //css
    wp_enqueue_style('styles_multi', plugin_dir_url(__FILE__).'css/styles_multi.css',array(), '0.2.6', 'all');
    //jquery
    wp_enqueue_script('script_multi', plugin_dir_url(__FILE__) .'js/script_multi.js', array(), '0.0.1', true );
    wp_enqueue_script('custom_multi_level', plugin_dir_url(__FILE__) .'js/custom_multi_level.js', array(), '0.0.3', true );
    
 } 
// function change_submenu_class($menu) {  
//   $menu = preg_replace('/ class="sub-menu"/','/ class="myclass" /',$menu);  
//   return $menu;  
// }  
// add_filter('wp_nav_menu','change_submenu_class');  
 ?>