<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: hatazu popup
 * Plugin URI: http://hatazu.com
 * Description: Popup box.
 * Version: 1.6.4
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'popup_menu');
function popup_menu() {
    add_menu_page('popup Settings', 'popup', 'administrator', 'popup-settings', 'popup_menu_settings_page', 'dashicons-admin-generic');
}
function popup_menu_settings_page() {
    include('popup_admin.php');
}

function popup_menu_settings() {
    register_setting( 'popup-settings-group', 'option' );
    register_setting( 'popup-settings-group', 'images_popup1' );
    register_setting( 'popup-settings-group', 'link_images_popup1' );
    register_setting( 'popup-settings-group', 'images_popup2' );
    register_setting( 'popup-settings-group', 'link_images_popup2' );
    register_setting( 'popup-settings-group', 'images_popup3' );
    register_setting( 'popup-settings-group', 'link_images_popup3' );
    register_setting( 'popup-settings-group', 'images_popup4' );
    register_setting( 'popup-settings-group', 'link_images_popup4' );
}
add_action( 'admin_init', 'popup_menu_settings' );

//include('include/action.php');
include('popup_box.php');
add_action( 'wp_footer', 'popup_box');
//add_shortcode( 'form_reg', 'short_form_reg_widget' );
add_action("wp_enqueue_scripts", "hatazu_popup_menu_script");
function hatazu_images_popup_enqueue() {
    global $typenow;
        wp_enqueue_media();
        // Registers and enqueues the required javascript.
        wp_register_script( 'hatazu_images_popup', plugin_dir_url( __FILE__ ) . 'js/hatazu_images_popup.js', array(), '1.2.7', true );
        wp_localize_script( 'hatazu_images_popup', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
            )
        );
        wp_enqueue_script( 'hatazu_images_popup' );
}
add_action( 'admin_enqueue_scripts', 'hatazu_images_popup_enqueue'); 
function hatazu_popup_menu_script() 
{
    //css
    wp_enqueue_style('hatazu_popup_style', plugin_dir_url(__FILE__) . 'css/hatazu_popup_style.css',array(), '1.0.4', 'all');
    wp_enqueue_style('pouup_modal.css', plugin_dir_url(__FILE__).'css/popup_modal.css',array(), '1.1.2', 'all');
    //jquery
    wp_enqueue_script('hatazu_popup_menu.js', plugin_dir_url(__FILE__) .'js/hatazu_popup_menu.js', array(), '3.7.0', true );
    //wp_enqueue_script( 'hatazu_image_popup', plugin_dir_url(__FILE__) .'js/hatazu_image_popup.js', array(), '1.0.0', true );
 } ?>