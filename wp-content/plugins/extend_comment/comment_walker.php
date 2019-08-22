<?php

if ( ! class_exists( 'comment_walker' ) ) {  
    class comment_walker extends Walker_Comment {
        var $tree_type = 'comment';
        var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
        // constructor – wrapper for the comments list
        function __construct() { ?>
            <ul id="comments-list" class="comments-list list-item-comment">
        <?php }
        // start_lvl – wrapper for child comments list

        function start_lvl( &$output, $depth = 0, $args = array() ) {

            $GLOBALS['comment_depth'] = $depth + 2; ?>
            <ul class="comments-list reply-list">
        <?php }
        // end_lvl – closing wrapper for child comments list

        function end_lvl( &$output, $depth = 0, $args = array() ) {
            $GLOBALS['comment_depth'] = $depth + 2; ?>
            </ul>
        <?php }
        // start_el – HTML for comment template
        function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
            $depth++;
            $GLOBALS['comment_depth'] = $depth;
            $GLOBALS['comment'] = $comment;
            $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 
            if ( 'article' == $args['style'] ) {
                $tag = 'article';
                $add_below = 'comment';
            } else {
                $tag = 'li';
                $add_below = 'comment';
            } 
            //$phone = get_comment_meta( $comment->comment_ID, 'phone', true );
            $avatar = get_comment_meta( $comment->comment_ID, 'avatar_comment', true );
            $rating = get_comment_meta( $comment->comment_ID, 'rating', true ); 
            if(empty($avatar)){
                $rand = rand(1,3); 
                $avatar = plugin_dir_url(__FILE__) .'image/guest-'.$rand.'.jpg';
            }  ?>
            <li <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>">
            <?php if($depth==1) {?>
                <div class="comment-main-level">
            <?php } ?>
            <div class="comment-avatar"><img src="<?php echo $avatar; ?>" alt=""></div>
            <!-- Contenedor del Comentario -->
            <div class="comment-box">
                <div class="comment-head">
                   <h6 class="comment-name by-author"><a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a></h6>
                    <span>&nbsp;<?php //comment_date('jS F Y') ?><?php if( current_user_can('editor') || current_user_can('administrator') ) { edit_comment_link('Edit','',''); } ?></span>
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 
                    'before' =>'', 'after'=> '','reply_text' => __('<i class="fa fa-reply"></i>', 'textdomain'),))) ?>
                    <span class="rating">
                        <span class="chk-rate">Đánh giá</span>&nbsp; 
                      <?php for( $i=0; $i < 5; $i++ ) { 
                        if($i < $rating) { ?>
                            <span class="item">
                                <input type="radio" name="rating" class="rate" value="<?php echo $i; ?>" />
                                <label class="lb_radio"><span class="fa fa-star" aria-hidden="true"></span></label><!-- fa fa-star -->
                            </span>
                        <?php }else {?>
                         <span class="item">
                           <input type="radio" name="rating" class="rate" value="<?php echo $i; ?>" />
                           <label class="lb_radio"><span class="fa fa-star-o" aria-hidden="true"></span></label><!-- fa fa-star -->
                         </span>
                        <?php }
                    } ?>
                      </span> 
                </div>
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>
            </div>
            <?php if($depth==1) {?>
                </div>
            <?php } ?>      
        <?php }
        // end_el – closing HTML for comment template
        function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
            </li>
        <?php }
        // destructor – closing wrapper for the comments list
        function __destruct() { ?>
            </ul>
        <?php }
    }
} ?>