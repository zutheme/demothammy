<?php

/*

 * Plugin Name: Meta box testimonial

 * Plugin URI: http://hatazu.com

 * Description: Report meta box.

 * Version: 0.0.1

 * Author: hatazu

 * Author URI: http://hatazu.com

 * License: GPL2

 */

add_action('admin_testimonial', 'custom_meta_testimonial');

function custom_meta_testimonial() {

    add_testimonial_page('meta custom Settings', 'meta custom', 'administrator', 'custom-meta-settings', 'custom_testimonial_settings_page', 'dashicons-admin-generic');

}

function custom_testimonial_settings_page() {

    include('custom-meta-admin.php');

}

add_action( 'admin_init', 'custom_testimonial_settings' );
function custom_testimonial_settings() {

    register_setting( 'custom-meta-settings-group', 'meta_name' );

    register_setting( 'custom-meta-settings-group', 'meta_phone' );

    register_setting( 'custom-meta-settings-group', 'meta_email' );

}

/*

 * Adds a meta box to the post editing screen

 */

function prfx_custom_testimonial() {

    add_meta_box( 'prfx_meta', __( 'Meta Box Title', 'prfx-textdomain' ), 'prfx_testimonial_callback', 'testimonial','normal', // $context

        'high');

}

add_action( 'add_meta_boxes', 'prfx_custom_testimonial' );

/*

 * Outputs the content of the meta box

 */

function prfx_testimonial_callback( $post ) {

    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID ); ?>
    <p>
        <label for="meta-image" class="prfx-row-title"><?php _e( 'vote', 'prfx-textdomain' )?></label>
        <input type="text" name="testimonial-vote" id="meta-image" value="<?php if ( isset ( $prfx_stored_meta['testimonial-vote'] ) ) echo $prfx_stored_meta['testimonial-vote'][0]; ?>" />
    </p>
    <?php

}

/*

 * Saves the custom meta input

 */

function prfx_testimonial_save( $post_id ) {

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

    if ( "testimonial" == $post_type ){
        //gallery
    if( isset( $_POST['testimonial-vote'] ) ) {
        update_post_meta( $post_id, 'testimonial-vote', $_POST[ 'testimonial-vote' ] );    
    }   
}else return;   
    
}

add_action( 'save_post', 'prfx_testimonial_save' );

/*

 * Adds the meta box stylesheet when appropriate

 */

// function prfx_admin_styles(){

//     global $typenow;

//     if( $typenow == 'product' ) {

//         wp_enqueue_style( 'prfx_meta_box_styles', plugin_dir_url( __FILE__ ) . 'css/hatazu_custom_style.css' );

//     }

// }

// add_action( 'admin_print_styles', 'prfx_admin_styles' );

//add distric

if ( is_admin() ) {

    //include('lib_script.php');

}


/*

* Loads the image management javascript

*/

?>