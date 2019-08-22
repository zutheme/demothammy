<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
 * Plugin Name: latest post
 * Plugin URI: http://zutheme.com
 * Description: hatazu latest
 * Version: 1.0.0
 * Author: hatazu
 * Author URI: http://zutheme.com
 * License: GPL2
 */
// add_action('admin_menu', 'htz_latest');
// function htz_latest() {
//     add_menu_page('menu option Settings', 'htz_latest', 'administrator', 'option-menu-settings', 'option_latest_settings_page', 'dashicons-admin-generic');
// }

// function option_latest_settings_page() {
//     include('option-latest-admin.php');
// }

// function option_latest_settings() {
//     register_setting( 'option-latest-settings', 'latest-option' );
// }
// add_action( 'admin_init', 'option_latest_settings' );
include("widget.php"); ?>