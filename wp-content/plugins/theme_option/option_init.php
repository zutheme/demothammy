<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: Option home
 * Plugin URI: http://hatazu.com
 * Description: home option.
 * Version: 0.0.2
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'home_menu');
function home_menu() {
    add_menu_page('home Settings', 'Option home', 'administrator', 'home-settings', 'home_menu_settings_page', 'dashicons-admin-generic');
}
function home_menu_settings_page() {
    include('option_admin.php');
}
function home_menu_settings() {
    register_setting( 'home-settings-group', 'images_home1');
    register_setting( 'home-settings-group', 'title_home1');
    register_setting( 'home-settings-group', 'desc_home1');
    register_setting( 'home-settings-group', 'link_home1');

    register_setting( 'home-settings-group', 'images_home2');
    register_setting( 'home-settings-group', 'title_home2');
    register_setting( 'home-settings-group', 'desc_home2');
    register_setting( 'home-settings-group', 'link_home2');

    register_setting( 'home-settings-group', 'images_home3');
    register_setting( 'home-settings-group', 'title_home3');
    register_setting( 'home-settings-group', 'desc_home3');
    register_setting( 'home-settings-group', 'link_home3');

    register_setting( 'home-settings-group', 'images_home4');
    register_setting( 'home-settings-group', 'title_home4');
    register_setting( 'home-settings-group', 'desc_home4');
    register_setting( 'home-settings-group', 'link_home4');
    //option 2
    register_setting( 'home-settings-group', 'images_choose');
    register_setting( 'home-settings-group', 'title_choose');
    register_setting( 'home-settings-group', 'desc_choose1');
    register_setting( 'home-settings-group', 'desc_choose2');
    register_setting( 'home-settings-group', 'linkyoutube_choose');
    //before after
    register_setting( 'home-settings-group', 'images_before');
    register_setting( 'home-settings-group', 'images_after');
    register_setting( 'home-settings-group', 'title_before_after');
    register_setting( 'home-settings-group', 'desc_before_after');
}
add_action( 'admin_init', 'home_menu_settings' );
//include("widget.php"); 
//include('option_box.php');
//add_action( 'wp_footer', 'home_box');
//add_shortcode( 'form_reg', 'short_form_reg_widget' );
add_action("wp_enqueue_scripts", "hatazu_home_menu_script");
function hatazu_images_home_enqueue() {
    global $typenow;
        wp_enqueue_media();
        // Registers and enqueues the required javascript.
        wp_register_script( 'hatazu_images_home', plugin_dir_url( __FILE__ ) . 'js/hatazu_images_home.js', array(), '1.0.2', true );
        wp_localize_script( 'hatazu_images_home', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
            )
        );
        wp_enqueue_script( 'hatazu_images_home' );
}
add_action( 'admin_enqueue_scripts', 'hatazu_images_home_enqueue'); 
function hatazu_home_menu_script() 
{
    //css
    wp_enqueue_style('hatazu_home_style', plugin_dir_url(__FILE__) . 'css/hatazu_home_style.css',array(), '1.1.1', 'all');
    //jquery
    //wp_enqueue_script('hatazu_home_menu.js', plugin_dir_url(__FILE__) .'js/hatazu_home_menu.js', array(), '1.0.1', true );
} ?>