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
    <section class="blog-post video-bg-cat blog-video">
      <div class="container">
        <div class="row">
            <div class="col-sm-12 category">         
                <div class="row">
                 <?php custom_breadcrumbs(); ?>
               </div>
             
              <div class="row">
                <?php  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
                  if ( have_posts() ) : 
                  /* Start the Loop */
                  while ( have_posts() ) :
                    the_post(); 
                    get_template_part( 'template-parts/content', 'video' );
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
                  get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
              </div>
            </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>

