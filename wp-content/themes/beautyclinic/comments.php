<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thienkhue
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-container">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$thienkhue_comment_count = get_comments_number();
			if ( '1' === $thienkhue_comment_count ) {
				//printf(
					/* translators: 1: title. */
					//esc_html__( 'Đánh Giá Của Khách Hàng Về &ldquo;%1$s&rdquo;', 'thienkhue' ),
					//'<span>' . get_the_title() . '</span>'
				//);
			} else {
				//printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					//esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $thienkhue_comment_count, 'comments title', 'thienkhue' ) ),
					//number_format_i18n( $thienkhue_comment_count ),
					//'<span>' . get_the_title() . '</span>'
				//);
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

			<?php
			// wp_list_comments( array(
			// 	'style'      => 'ol',
			// 	'short_ping' => true,
			// 	'avatar_size' => 52,
			// ) );
			//wp_list_comments( array('callback' => 'better_comments'));
			wp_list_comments( array('style' => '','walker'=> new comment_walker()));
			//wp_list_comments('type=comment&callback=better_comments'); 
			?>
		

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'thienkhue' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	//comment_form();
	form_comment();
	?>

</div><!-- #comments -->
<?php
//Get only the approved comments
// $args = array(
//     'status' => 'approve'
// );
 
// // The comment Query
// $comments_query = new WP_Comment_Query;
// $comments = $comments_query->query( $args );
 
// // Comment Loop
// if ( $comments ) {
//  foreach ( $comments as $comment ) {
//  echo '<p>' . $comment->comment_content . '</p>';
//  }
// } else {
//  echo 'No comments found.';
// }