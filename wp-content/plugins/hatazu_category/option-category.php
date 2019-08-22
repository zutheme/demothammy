<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
 * Plugin Name: Category
 * Plugin URI: http://zutheme.com
 * Description: hatazu category
 * Version: 1.0.0
 * Author: hatazu
 * Author URI: http://zutheme.com
 * License: GPL2
 */
add_action('admin_menu', 'htz_category');
function htz_category() {
    add_menu_page('menu option Settings', 'htz_category', 'administrator', 'option-menu-settings', 'option_category_settings_page', 'dashicons-admin-generic');
}

function option_category_settings_page() {
    include('option-category-admin.php');
}

function option_category_settings() {
    register_setting( 'option-category-settings', 'category-option' );
}
add_action( 'admin_init', 'option_category_settings' );
include("widget.php"); ?>