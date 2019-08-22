<?php

/*
 * Plugin Name: Custom field meta box
 * Plugin URI: http://hatazu.com
 * Description: Custom field meta box
 * Version: 1.0.0
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */

add_action('admin_menu', 'custom_meta_field');

function custom_meta_field() {

    add_menu_page('field custom Settings', 'field custom', 'administrator', 'custom-meta-settings', 'custom_meta_settings_field', 'dashicons-admin-generic');

}

function custom_meta_settings_field() {

    include('custom-meta-admin.php');

}

add_action( 'admin_init', 'custom_field_meta_settings' );

function custom_field_meta_settings() {

    register_setting( 'custom-field-settings-group', 'field_name' );

    register_setting( 'custom-field-settings-group', 'field_phone' );

    register_setting( 'custom-field-settings-group', 'field_email' );

}

/*

 * Adds a meta box to the post editing screen

 */

function prfx_field_custom_meta() {

    add_meta_box( 'prfx_meta', __( 'Field Box Title', 'prfx-textdomain' ), 'prfx_field_meta_callback', 'video','normal', 'high');

}

add_action( 'add_meta_boxes', 'prfx_field_custom_meta');

/*

 * Outputs the content of the meta box

 */

function prfx_field_meta_callback( $post ) {

    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );

    $prfx_stored_meta = get_post_meta( $post->ID ); ?>

    <p>
        <label for="id-youtube" class="prfx-row-title"><?php _e( 'id youtube', 'prfx-textdomain' )?></label>
        <input type="text" name="id-youtube" id="id-youtube" value="<?php if ( isset ( $prfx_stored_meta['id-youtube'] ) ) echo $prfx_stored_meta['id-youtube'][0]; ?>" />
    </p>

    <?php

}

/*

 * Saves the custom meta input

 */

function prfx_field_save( $post_id ) {

    // Checks save status

    $is_autosave = wp_is_post_autosave( $post_id );

    $is_revision = wp_is_post_revision( $post_id );

    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {

        return;

    }

    // Checks for input and sanitizes/saves if needed 

    $post_type = get_post_type($post_id);

    if ( "video" != $post_type ) return;   

    if( isset( $_POST['id-youtube'] ) ) {

        update_post_meta( $post_id, 'id-youtube', $_POST[ 'id-youtube' ] );    

    }  

    //update_post_meta( $post_id, 'meta-test',"sql=".$sql.",");

    //update_post_meta( $post_id, 'meta-test',"sql=".$sql);

}

add_action( 'save_post', 'prfx_field_save' );

/*

 * Adds the meta box stylesheet when appropriate

 */

function  prfx_admin_styles_field(){

    global $typenow;
    if ( is_admin() ) {
        if( $typenow == 'video' ) {
            wp_enqueue_style( 'prfx_meta_box_styles', plugin_dir_url( __FILE__ ) . 'css/hatazu_custom_style.css' );
        }
    }
}

add_action( 'admin_print_styles', 'prfx_admin_styles_field' );

//add distric




function hatazu_custom_field_script() 
{
    //css 
    //jquery
    //wp_enqueue_script( 'hatazu_field_custom.js', plugin_dir_url(__FILE__) .'js/hatazu_field_custom.js', array(), '1.0.0', true ); 
    //wp_localize_script( 'hatazu_field_custom.js', 'MyAjax', array('ajaxurl' => admin_url( 'admin-ajax.php' ),'security' => wp_create_nonce( 'my-special-string' )));
    if ( is_admin() ) {
        wp_enqueue_style( 'hatazu_field_style.css', plugin_dir_url(__FILE__) . 'css/hatazu_field_style.css',array(), '1.0.0', 'all');
    }
 }
add_action("wp_enqueue_scripts", "hatazu_custom_field_script");
?>