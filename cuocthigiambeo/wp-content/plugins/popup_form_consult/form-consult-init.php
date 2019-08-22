<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>

<?php

/* Plugin Name: Popup form consult

 * Plugin URI: http://hatazu.com

 * Description: Popup form consult API

 * Version: 1.0.7

 * Author: hatazu

 * Author URI: http://hatazu.com

 * License: GPL2

 */

add_action('admin_menu', 'form_consult_menu');

function form_consult_menu() {

    add_menu_page('Form consult Settings', 'Form consult', 'administrator', 'form-consult-settings', 'form_consult_settings_page', 'dashicons-admin-generic');

}

function form_consult_settings() {

    register_setting( 'form-consult-settings-group', 'consult' );

}

function form_consult_settings_page() {

    include('form-consult-admin.php');

}

add_action( 'admin_init', 'form_consult_settings' );

include('form-consult.php');

add_action( 'wp_footer', 'form_consult');

add_action("wp_enqueue_scripts", "hatazu_form_consult_script");

function hatazu_form_consult_script() {
    wp_enqueue_style('form-consult.css', plugin_dir_url(__FILE__) . 'css/form_consult.css',array(), '2.1.6', 'all');
    wp_enqueue_script('hatazu_capture_image.js', plugin_dir_url(__FILE__) .'js/capture_image.js', array(), '0.5.0', true ); 
    wp_enqueue_script('hatazu_form_consult.js', plugin_dir_url(__FILE__) .'js/hatazu_form_consult.js', array(), '2.8.3', true );
} ?>