<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: List price
 * Plugin URI: http://hatazu.com
 * Description: List price
 * Version: 1.0.0
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'lprice_menu');
function lprice_menu() {
    add_menu_page('lprice Settings', 'lprice', 'administrator', 'lprice-settings', 'lprice_menu_settings_page', 'dashicons-admin-generic');
}
function lprice_menu_settings_page() {
    include('lprice_admin.php');
}
function lprice_menu_settings() {
    register_setting( 'lprice-settings-group', 'option');
    register_setting( 'lprice-settings-group', 'images_lprice1');
    register_setting( 'lprice-settings-group', 'link_lprice1');
    register_setting( 'lprice-settings-group', 'images_lprice2');
    register_setting( 'lprice-settings-group', 'link_lprice2');
    register_setting( 'lprice-settings-group', 'images_lprice3');
    register_setting( 'lprice-settings-group', 'link_lprice3');
    register_setting( 'lprice-settings-group', 'images_lprice4');
    register_setting( 'lprice-settings-group', 'link_lprice4');
}
add_action( 'admin_init', 'lprice_menu_settings' );
include("widget.php"); 
include('lprice_box.php');
//add_action( 'wp_footer', 'lprice_box');
//add_shortcode( 'form_reg', 'short_form_reg_widget' );
add_action("wp_enqueue_scripts", "hatazu_lprice_menu_script");
function hatazu_images_lprice_enqueue() {
    global $typenow;
        wp_enqueue_media();
        // Registers and enqueues the required javascript.
        wp_register_script( 'hatazu_lprice_upload', plugin_dir_url( __FILE__ ) . 'js/hatazu_lprice_upload.js', array(), '1.0.2', true );
        wp_localize_script( 'hatazu_lprice_upload', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
            )
        );
        wp_enqueue_script( 'hatazu_lprice_upload' );
}
add_action( 'admin_enqueue_scripts', 'hatazu_images_lprice_enqueue'); 
function hatazu_lprice_menu_script() 
{
    //css
    if(is_page_template(array('page-price.php'))){
        wp_enqueue_style('hatazu_lprice_style', plugin_dir_url(__FILE__) . 'css/hatazu_lprice_style.css',array(), '1.1.0', 'all');
        //jquery
         wp_enqueue_script('hatazu_lprice_menu.js', plugin_dir_url(__FILE__) .'js/hatazu_lprice_menu.js', array(), '1.0.1', true );
     }
}
add_action('wp_enqueue_scripts', 'hatazu_lprice_menu_script'); 
?>