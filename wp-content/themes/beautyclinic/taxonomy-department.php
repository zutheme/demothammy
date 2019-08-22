<?php

/*

 * The template for displaying archive pages

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package onehealth

 */



get_header(); ?>


                <?php
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
								if ( have_posts() ) : ?>
									<?php

									/* Start the Loop */
                                    //echo "archive-";
									while ( have_posts() ) : the_post();
                                     //echo "archive-".get_post_type();
									get_template_part( 'layout/content',get_post_type());

									endwhile;
                    //the_posts_navigation();
                    //BEGIN: Page Nav
                 if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
                 <div class="page">
                 <div class="pages navigation">
                    <?php custom_pagination($wp_query->max_num_pages,"",$paged); ?>
                 </div>
                 </div>   

                <?php endif; 
                //END: Page Nav
                //the_posts_navigation();
                else :
                    get_template_part( 'layout/content', 'none' );
                endif; ?>
<?php
get_footer();
?>

