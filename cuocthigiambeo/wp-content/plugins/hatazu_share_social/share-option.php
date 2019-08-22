<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/*

 * Plugin Name: Share social

 * Plugin URI: http://zutheme.com

 * Description: share post social

 * Version: 1.0.6

 * Author: hatazu

 * Author URI: http://zutheme.com

 * License: GPL2

 */
add_action('admin_menu', 'htz_share_menu_menu');
function htz_share_menu_menu() {
    add_menu_page('menu share Settings', 'theme share', 'administrator', 'share-menu-settings', 'share_menu_settings_page', 'dashicons-admin-generic');
}

function share_menu_settings() {
    register_setting( 'share-menu-settings-share', 'share' );
}

function share_menu_settings_page() {
    include('share-menu-admin.php');
}

//include("widget.php");
include("share_menu_box.php");
add_action( 'admin_init', 'share_menu_settings' );

add_action( 'wp_footer', 'script_dev');
add_filter( 'the_content', 'box_social', 20 );

add_action('admin_enqueue_scripts', 'admin_load_scripts_share');

function admin_load_scripts_share(){
	//css
  //wp_enqueue_style( 'hatazu_admin_share_style.css', plugin_dir_url(__FILE__) . 'css/hatazu_admin_share_style.css',array(), '1.0.4', 'all');
    //jquery
  //wp_enqueue_script( 'hatazu_game.js', plugin_dir_url(__FILE__) .'game/js/hatazu_game.js', array(), '1.2.7', true ); 
}

function hatazu_share_script(){
	//css
    wp_enqueue_style( 'hatazu_share_style', plugin_dir_url(__FILE__) . 'css/hatazu_share_style.css',array(), '1.2.8', 'all');
    //jquery
   //wp_enqueue_script( 'jssocial.js', plugin_dir_url(__FILE__) .'js/jssocial.js', array(), '1.0.6', true ); 
}
add_action("wp_enqueue_scripts", "hatazu_share_script");
function hatazu_share_custom() {
    global $post;
    if( is_single() || is_page('ve-chung-toi')) {
        wp_enqueue_script( 'jssocial.js', plugin_dir_url(__FILE__) .'js/jssocial.js', array(), '1.0.7', true );
    }
}
add_action('wp_enqueue_scripts', 'hatazu_share_custom'); ?>