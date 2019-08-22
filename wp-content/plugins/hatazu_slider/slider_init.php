<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: hatazu slider
 * Plugin URI: http://hatazu.com
 * Description: slider carousel.
 * Version: 1.0.1
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'slider_menu');
function slider_menu() {
    add_menu_page('slider Settings', 'slider', 'administrator', 'slider-settings', 'slider_menu_settings_page', 'dashicons-admin-generic');
}
function slider_menu_settings_page() {
    include('slider_admin.php');
}
function slider_menu_settings() {
    register_setting( 'slider-settings-group', 'option');
    register_setting( 'slider-settings-group', 'images_slider1');
    register_setting( 'slider-settings-group', 'link_images_slider1');
    register_setting( 'slider-settings-group', 'images_slider2');
    register_setting( 'slider-settings-group', 'link_images_slider2');
    register_setting( 'slider-settings-group', 'images_slider3');
    register_setting( 'slider-settings-group', 'link_images_slider3');
    register_setting( 'slider-settings-group', 'images_slider4');
    register_setting( 'slider-settings-group', 'link_images_slider4');
    //icon promotion
    register_setting( 'slider-settings-group', 'images_icon_pro1');
    register_setting( 'slider-settings-group', 'link_icon_pro1');
    register_setting( 'slider-settings-group', 'images_icon_pro2');
    register_setting( 'slider-settings-group', 'link_icon_pro2');
    register_setting( 'slider-settings-group', 'images_icon_pro3');
    register_setting( 'slider-settings-group', 'link_icon_pro3');
}
add_action( 'admin_init', 'slider_menu_settings' );
include("widget.php"); 
include('slider_box.php');
//add_action( 'wp_footer', 'slider_box');
//add_shortcode( 'form_reg', 'short_form_reg_widget' );
add_action("wp_enqueue_scripts", "hatazu_slider_menu_script");
function hatazu_images_slider_enqueue() {
    global $typenow;
        wp_enqueue_media();
        // Registers and enqueues the required javascript.
        wp_register_script( 'hatazu_images_slider', plugin_dir_url( __FILE__ ) . 'js/hatazu_images_slider.js', array(), '1.0.1', true );
        wp_localize_script( 'hatazu_images_slider', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
            )
        );
        wp_enqueue_script( 'hatazu_images_slider' );
}
add_action( 'admin_enqueue_scripts', 'hatazu_images_slider_enqueue'); 
function hatazu_slider_menu_script() 
{
    //css
    wp_enqueue_style('hatazu_slider_style', plugin_dir_url(__FILE__) . 'css/hatazu_slider_style.css',array(), '1.0.8', 'all');
    //jquery
    //wp_enqueue_script('hatazu_slider_menu.js', plugin_dir_url(__FILE__) .'js/hatazu_slider_menu.js', array(), '1.0.1', true );
} ?>