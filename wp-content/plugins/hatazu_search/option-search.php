<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
 * Plugin Name: Search form
 * Plugin URI: http://zutheme.com
 * Description: hatazu search
 * Version: 1.0.2
 * Author: hatazu
 * Author URI: http://zutheme.com
 * License: GPL2
 */
// add_action('admin_menu', 'htz_search');
// function htz_search() {
//     add_menu_page('menu option Settings', 'htz_search', 'administrator', 'option-menu-settings', 'option_search_settings_page', 'dashicons-admin-generic');
// }

// function option_search_settings_page() {
//     include('option-search-admin.php');
// }

// function option_search_settings() {
//     register_setting( 'option-search-settings', 'search-option' );
// }
// add_action( 'admin_init', 'option_search_settings' );
include("widget.php"); ?>