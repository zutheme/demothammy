<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
 * Plugin Name: Custom Field menu
 * Plugin URI: http://zutheme.com
 * Description: Custom Field menu
 * Version: 1.0.1
 * Author: hatazu
 * Author URI: http://zutheme.com
 * License: GPL2
 */
include("menu_width_description.php");
include("submenu_support.php");
include("wpdocs_walker_submenu.php");
add_action("admin_enqueue_scripts", "custom_field_menu_enqueue");
function custom_field_menu_enqueue() {
	    global $typenow;
	        wp_enqueue_media();
	        // Registers and enqueues the required javascript.
	        wp_register_script( 'hatazu_custom_field_menu', plugin_dir_url( __FILE__ ) . 'js/hatazu_custom_field_menu.js', array(), '1.0.5', true );
	        wp_localize_script( 'hatazu_custom_field_menu', 'meta_image',
	            array(
	                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
	                'button' => __( 'Use this image', 'prfx-textdomain' ),
	            )
	        );
	        wp_enqueue_script( 'hatazu_custom_field_menu' );
}
?>