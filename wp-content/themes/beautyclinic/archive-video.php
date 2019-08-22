<?php

/**

 * The template for displaying archive pages

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package elearning

 */
get_header(); ?>
    <!-- Section: Events Grid -->
<?php echo "archive"; ?>
                 <?php //custom_breadcrumbs(); ?>

                <?php  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
                  if ( have_posts() ) : 
                  /* Start the Loop */
                  while ( have_posts() ) :
                    the_post(); 
                    //get_template_part( 'layout/content', get_post_type() );
                  endwhile;
                  //the_posts_navigation();
                    //BEGIN: Page Nav
                   if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
                <div class="row">
                   <div class="col-sm-12 navigation text-center">
                        <?php custom_pagination($wp_query->max_num_pages,"",$paged); ?>
                   </div>
                </div>   
                  <?php endif; 
                else :
                  //get_template_part( 'layout/content', 'none' );
                endif;
                ?>

<?php get_footer(); ?>

