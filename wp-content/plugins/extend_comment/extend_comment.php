<?php

/*

Plugin Name: Extend Comment

Version: 1.0.1

Plugin URI: http://zutheme.com

Author: Hatazu

Author URI: http://zutheme.com

*/

// Add custom meta (ratings) fields to the default comment form

// Default comment form includes name, email address and website URL

// Default comment form elements are hidden when user is logged in
include('action.php');
include('better-comment.php');
include('comment_walker.php');

add_filter('comment_form_default_fields', 'custom_fields');

function custom_fields($fields) {
    $commenter = wp_get_current_commenter();
    //$req = get_option( 'require_name_email' );
    $req = 0;
    $aria_req = ( $req ? " aria-required='true'" : '' );
    //$req = 0;
    //$aria_req = "";
    $fields[ 'author' ] = '<p class="comment-form-author">'.

      '<label for="'.$req.'author">' . __( 'Name' ) . '</label>'.

      ( $req ? '<span class="required">*</span>' : '' ).

      '<input id="author" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .

      '" size="30" tabindex="1"' . $aria_req . ' /></p>';



    $fields[ 'email' ] = '<p class="comment-form-email">'.

      '<label for="email">' . __( 'Email' ) . '</label>'.

      ( $req ? '<span class="required">*</span>' : '' ).

      '<input id="email" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .

      '" size="30"  tabindex="2"' . $aria_req . ' /></p>';



    $fields[ 'url' ] = '<p class="comment-form-url">'.

     '<label for="url">' . __( 'Website' ) . '</label>'.

      '<input id="url" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .

      '" size="30"  tabindex="3" /></p>';



    $fields[ 'phone' ] = '<p class="comment-form-phone">'.

      '<label for="phone">' . __( 'Phone' ) . '</label>'.

      '<input id="phone" name="phone" type="text" size="30"  tabindex="4" /></p>';

  return $fields;

}

// Add fields after default fields above the comment box, always visible
add_action( 'comment_form_logged_in_after', 'additional_fields' );
add_action( 'comment_form_after_fields', 'additional_fields' );

function additional_fields () { 
   echo '<p class="comment-avatar">'.
  '<label>' . __( 'avatar' ) . '</label>'.
  '<input class="avatar_comment" name="avatar_comment" type="text" size="30"  tabindex="5" /></p>';
  echo '<p class="comment-form-rating">'.
  '<label for="rating">'. __('Rating') . '<span class="required">*</span></label>
  <span class="commentratingbox">';
    //Current rating scale is 1 to 5. If you want the scale to be 1 to 10, then set the value of $i to 10.
    for( $i=1; $i <= 5; $i++ )
    echo '<span class="commentrating"><input type="radio" name="rating" id="rating" value="'. $i .'"/>'. $i .'</span>';
    echo'</span></p>';
}



//add_comment_meta($comment_id, $meta_key, $meta_value, $unique = false);

// Save the comment meta data along with comment



add_action( 'comment_post', 'save_comment_meta_data' );

function save_comment_meta_data( $comment_id ) {

  if ( ( isset( $_POST['phone'] ) ) && ( $_POST['phone'] != '') )

  $phone = wp_filter_nohtml_kses($_POST['phone']);

  add_comment_meta( $comment_id, 'phone', $phone );

   if ( ( isset( $_POST['avatar_comment'] ) ) && ( $_POST['avatar_comment'] != '') )

   $title = wp_filter_nohtml_kses($_POST['avatar_comment']);

  add_comment_meta( $comment_id, 'avatar_comment', $title );

  if ( ( isset( $_POST['rating'] ) ) && ( $_POST['rating'] != '') )

  $rating = wp_filter_nohtml_kses($_POST['rating']);

  add_comment_meta( $comment_id, 'rating', $rating );

}

// Add the filter to check whether the comment meta data has been filled
add_filter( 'preprocess_comment', 'verify_comment_meta_data' );

function verify_comment_meta_data( $commentdata ) {
  if (  isset( $_POST['rating'] ) ) {
  //wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
    return $commentdata;
  }
}
//get_comment_meta( $comment_id, $meta_key, $single = false )
// Add an edit option to comment editing screen  
add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box() {
    add_meta_box( 'title', __( 'Comment Metadata - Extend Comment' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}

function extend_comment_meta_box ( $comment ) {
    $phone = get_comment_meta( $comment->comment_ID, 'phone', true );
    $url_avatar = get_comment_meta( $comment->comment_ID, 'avatar_comment', true );
    $rating = get_comment_meta( $comment->comment_ID, 'rating', true );
    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false ); ?>
    <p>
        <label for="phone"><?php _e( 'Phone' ); ?></label>
        <input type="text" name="phone" value="<?php echo esc_attr( $phone ); ?>" class="widefat" />
    </p>
     <p>
      <label  class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
      <input  type="hidden" class="avatar_comment" name="avatar_comment" value="<?php echo $url_avatar; ?>" />
      <input type="button" onclick="upload_avatar_comment(this);" name="btn_comment" class="button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
      <br><img class="img_set_avatar" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr($url_avatar); ?>">
    </p>
    <p>
      <label for="rating"><?php _e( 'Rating: ' ); ?></label>
      <span class="commentratingbox">
      <?php for( $i=1; $i <= 5; $i++ ) {
        echo '<span class="commentrating"><input type="radio" name="rating" id="rating" value="'. $i .'"';
        if ( $rating == $i ) echo ' checked="checked"';
        echo ' />'. $i .' </span>';
        }   ?>
      </span>
    </p>
    <?php
}
// Update comment meta data from comment editing screen 
add_action( 'edit_comment', 'extend_comment_edit_metafields' );
function extend_comment_edit_metafields( $comment_id ) {
  if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) return;
  if ( ( isset( $_POST['phone'] ) ) && ( $_POST['phone'] != ’) ) :
  $phone = wp_filter_nohtml_kses($_POST['phone']);
  update_comment_meta( $comment_id, 'phone', $phone );
  else :
  delete_comment_meta( $comment_id, 'phone');
  endif;
  if ( ( isset( $_POST['avatar_comment'] ) ) && ( $_POST['avatar_comment'] != ’) ):
  $title = wp_filter_nohtml_kses($_POST['avatar_comment']);
  update_comment_meta( $comment_id, 'avatar_comment', $title );
  else :
  delete_comment_meta( $comment_id, 'avatar_comment');
  endif;
  if ( ( isset( $_POST['rating'] ) ) && ( $_POST['rating'] != ’) ):
  $rating = wp_filter_nohtml_kses($_POST['rating']);
  update_comment_meta( $comment_id, 'rating', $rating );
  else :
  delete_comment_meta( $comment_id, 'rating');
  endif;
}

add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}
add_filter( 'comment_form_defaults', 'cd_pre_comment_text' );

/**

 * Change the text output that appears before the comment form

 * Note: Logged in user will not see this text.

 * 

 * @author Carrie Dils <http://www.carriedils.com>

 * @uses comment_notes_before <http://codex.wordpress.org/Function_Reference/comment_form>

 * 

 */

function cd_pre_comment_text( $arg ) {

  $arg['comment_notes_before'] = "";

  return $arg;

}

function my_remove_email_field_from_comment_form($fields) {

    if(isset($fields['email'])) unset($fields['email']);

    return $fields;

}

add_filter('comment_form_default_fields', 'my_remove_email_field_from_comment_form');

function hatazu_comment_script() {
  if(is_single() || is_page() && !is_front_page()) {
    wp_enqueue_style('comment-css', plugin_dir_url(__FILE__) . 'css/comment.css',array(), '0.9.3', false);
    wp_enqueue_script('upload-avatar', plugin_dir_url(__FILE__) .'js/hatazu_upload_avartar_comment.js', array(), '0.0.2', true );
    wp_enqueue_script('comment-js', plugin_dir_url(__FILE__) .'js/comment.js', array(), '0.9.7', true );
    wp_localize_script( 'comment-js', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php')));
  }
} 
add_action("wp_enqueue_scripts", "hatazu_comment_script");
add_action( 'wp_footer', 'form_user_comment');

function hatazu_upload_avartar_comment_enqueue() {
    global $typenow;
        wp_enqueue_media();
        // Registers and enqueues the required javascript.
        wp_localize_script( 'hatazu_upload_avartar', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
            )
        );
        wp_enqueue_script( 'hatazu_upload_avatar' );
}
add_action( 'admin_enqueue_scripts', 'hatazu_upload_avartar_comment_enqueue');
function hatazu_upload_admin_script() {
    //wp_enqueue_style('comment-css', plugin_dir_url(__FILE__) . 'css/comment.css',array(), '0.7.8', false);
    wp_enqueue_script('hatazu_upload_avartar_comment', plugin_dir_url(__FILE__) .'js/hatazu_upload_avartar_comment.js', array(), '0.0.8', true );
} 
add_action("admin_enqueue_scripts", "hatazu_upload_admin_script");