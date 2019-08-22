<?php
// My custom comments output html
function better_comments( $comment, $args, $depth ) {
	// Get correct tag used for the comments
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	} ?>

	<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

	<?php
	// Switch between different comment types
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'textdomain' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :

		if ( 'div' != $args['style'] ) { ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-main-level">
		<?php } 
				//$phone = get_comment_meta( $comment->comment_ID, 'phone', true );
    			$avatar = get_comment_meta( $comment->comment_ID, 'avatar_comment', true );
    			$rating = get_comment_meta( $comment->comment_ID, 'rating', true ); ?>
                <div class="comment-avatar"><img src="<?php echo $avatar; ?>" alt=""></div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                    <div class="comment-head">
                       <!--  <h6 class="comment-name by-author"><a href="#">Agustin Ortiz</a></h6> -->
                        <?php // Display author name
						printf( __( '<h6 class="comment-name by-author">%s</h6>', 'textdomain' ), get_comment_author_link() ); ?>
						<span><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php printf(__( '%1$s at %2$s', 'textdomain' ),get_comment_date(),get_comment_time()); ?></a><?php edit_comment_link( __( '(Edit)', 'textdomain' ), '  ', '' ); ?></span>             	
						<?php 
						comment_reply_link(array_merge( $args, array('add_below' => $add_below,'depth' => $depth, 'max_depth' => $args['max_depth'], 
						'before' =>'', 'after'=> '','reply_text' => __('<i class="fa fa-reply"></i>', 'textdomain'),))) ?>
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="comment-content">
                        <?php comment_text(); ?>
                    </div>
                </div>			
		<?php
		if ( 'div' != $args['style'] ) { ?>
			</div>
		<?php }
	// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us
		break;
	endswitch; // End comment_type check.
}

