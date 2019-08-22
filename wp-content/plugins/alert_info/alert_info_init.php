<?php
/*
 * Plugin Name: Alert Info
 * Plugin URI: http://hatazu.com
 * Description: Alert Info.
 * Version: 1.0.3
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'alert_info_client');
function alert_info_client() {
    add_menu_page('meta custom Settings', 'meta custom', 'administrator', 'alert_info-settings', 'alert_info_settings_page', 'dashicons-admin-generic');
}
function alert_info_settings_page() {
    include('alert_info-admin.php');
}
add_action( 'admin_init', 'alert_info_settings' );
function alert_info_settings() {
    register_setting( 'alert_info-settings-group', 'meta_name' );
    register_setting( 'alert_info-settings-group', 'meta_phone' );
    register_setting( 'alert_info-settings-group', 'meta_email' );
}
include('include/client-type.php');
include('include/action.php');
include('alert_box.php');
add_action( 'wp_footer', 'alert_box');
/*
 * Adds a meta box to the post editing screen
 */
function prfx_alert_info() {
    add_meta_box( 'prfx_meta', __( 'Meta Box Title', 'prfx-textdomain' ), 'prfx_alert_info_callback', 'client','normal', // $context
        'high');
}
add_action( 'add_meta_boxes', 'prfx_alert_info' );
/*
 * Outputs the content of the meta box
 */

function prfx_alert_info_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID ); ?>
    <p>
        <label for="meta-unit-price" class="prfx-row-title"><?php _e( 'Giá bán', 'prfx-textdomain' )?></label>
        <input type="number" name="meta-unit-price" id="meta-unit-price" value="<?php if ( isset ( $prfx_stored_meta['meta-unit-price'] ) ) echo $prfx_stored_meta['meta-unit-price'][0]; ?>" />
    </p>
    
    <?php
}
/*
 * Saves the custom meta input
 */
function prfx_alert_info_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
}
add_action( 'save_post', 'prfx_alert_info_save' );

/*
* Loads the image management javascript
*/
// function prfx_image_enqueue() {
//     global $typenow;
//     if( $typenow == 'client' ) {
//         wp_enqueue_media();
//         // Registers and enqueues the required javascript.
//         wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'js/meta-box-image.js', array( 'jquery' ) );
//         wp_localize_script( 'meta-box-image', 'meta_image',
//             array(
//                 'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
//                 'button' => __( 'Use this image', 'prfx-textdomain' ),
//             )
//         );
//         wp_enqueue_script( 'meta-box-image' );
//     }
// }
// add_action( 'admin_enqueue_scripts', 'prfx_image_enqueue');
function hatazu_alert_info_script() {
    //css
    wp_enqueue_style( 'hatazu_alert_info.css', plugin_dir_url(__FILE__) . 'css/hatazu_alert_info.css',array(), '0.4.6', 'all');
    //jquery
    wp_enqueue_script( 'hatazu_alert_info.js', plugin_dir_url(__FILE__) .'js/hatazu_alert_info.js', array(), '0.2.4', true ); 
    wp_localize_script( 'hatazu_alert_info.js', 'MyAjax', array('ajaxurl' => admin_url( 'admin-ajax.php' ),'security' => wp_create_nonce( 'my-special-string' )));
}
add_action("wp_enqueue_scripts", "hatazu_alert_info_script"); ?>  