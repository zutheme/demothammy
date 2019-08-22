<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*

 * Plugin Name: hatazu theme option

 * Plugin URI: http://zutheme.com

 * Description: hatazu theme option

 * Version: 0.1.5

 * Author: hatazu

 * Author URI: http://zutheme.com

 * License: GPL2

 */

add_action('admin_menu', 'htz_option_menu_menu');

function htz_option_menu_menu() {
    add_menu_page('menu option Settings', 'theme option', 'administrator', 'option-menu-settings', 'option_menu_settings_page', 'dashicons-admin-generic');
}

function option_menu_settings() {
    register_setting( 'option-menu-settings-slider', 'slider-1' );
    register_setting( 'option-menu-settings-slider', 'slider-2' );
    register_setting( 'option-menu-settings-slider', 'slider-3' );
    register_setting( 'option-menu-settings-slider', 'slider-4' );
    //register_setting( 'option-menu-settings-slider', 'banner-sidebar' );
    //register_setting( 'option-menu-settings-slider', 'banner-link' );
}

function option_menu_settings_page() {

    include('option-menu-admin.php');

}


include("widget.php");

add_action( 'admin_init', 'option_menu_settings' );

//add_action( 'wp_footer', 'menu_box');

add_action('admin_enqueue_scripts', 'admin_load_scripts_option');

function admin_load_scripts_option(){

	//css

    wp_enqueue_style( 'hatazu_admin_option_style.css', plugin_dir_url(__FILE__) . 'css/hatazu_admin_option_style.css',array(), '1.0.5', 'all');

    //jquery

   //wp_enqueue_script( 'option_custom.js', plugin_dir_url(__FILE__) .'js/custom.js', array(), '1.0.2', true ); 

}

add_action("wp_enqueue_scripts", "hatazu_option_script");

function hatazu_option_script(){
	//css
    if(is_admin()){
        wp_enqueue_style( 'hatazu_option_style', plugin_dir_url(__FILE__) . 'css/hatazu_option_style.css',array(), '1.0.9', 'all');
    }
    
    //jquery
   //wp_enqueue_script( 'option_custom', plugin_dir_url(__FILE__) .'js/custom.js', array(), '1.0.1', true ); 
}
// function load_scripts_custom() {
//     global $post;
//     if( is_single() ) {
//         wp_enqueue_script( 'option_custom', plugin_dir_url(__FILE__) .'js/custom.js', array(), '1.4.4', true );
//     }
// }
// add_action('wp_enqueue_scripts', 'load_scripts_custom'); ?>