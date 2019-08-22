<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
 * Plugin Name: Banner image fix
 * Plugin URI: http://zutheme.com
 * Description: hatazu banner
 * Version: 1.0.7
 * Author: hatazu
 * Author URI: http://zutheme.com
 * License: GPL2
 */
add_action('admin_menu', 'htz_banner');
function htz_banner() {
    add_menu_page('menu custom Settings', 'banner fixed', 'administrator', 'custom-menu-settings', 'custom_banner_settings_page', 'dashicons-admin-generic');
}
function custom_banner_settings_page() {
    include('custom-banner-admin.php');
}
function custom_banner_settings() {
    register_setting( 'custom-banner-settings', 'banner-image' );
    register_setting( 'custom-banner-settings', 'banner-link' );
}
add_action( 'admin_init', 'custom_banner_settings' );
include("widget.php"); 
function banner_admin_styles_field(){
    wp_enqueue_style( 'hatazu_admin_option.css', plugin_dir_url( __FILE__ ) . 'css/hatazu_admin_banner_option.css', array(), '1.0.0', 'all');
}
add_action( 'admin_print_styles', 'banner_admin_styles_field' );

function load_scripts_banner() {
    if(is_single()){
         wp_enqueue_script( 'custom_banner.js', plugin_dir_url(__FILE__) .'js/custom_banner.js', array(), '1.0.6', true );
         wp_enqueue_style( 'hatazu_banner.css', plugin_dir_url(__FILE__) . 'css/hatazu_banner.css', array(), '1.0.5', 'all');
    }
}
add_action('wp_enqueue_scripts', 'load_scripts_banner');

function banner_image_enqueue() {
    global $typenow;
    if($_GET['page']!='custom-menu-settings') return false;
    if(is_admin()){
        wp_enqueue_media();
        // Registers and enqueues the required javascript.
        wp_register_script( 'banner-box-image', plugin_dir_url( __FILE__ ) . 'js/banner-box-image.js', array(), '1.0.4', true );
        wp_localize_script( 'banner-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
            )
        );
        wp_enqueue_script( 'banner-box-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'banner_image_enqueue'); ?>