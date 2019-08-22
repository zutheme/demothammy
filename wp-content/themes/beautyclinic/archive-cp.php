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
    <section class="category-c">
      <div class="snip page-inner-title primary-bgcolor data-bg" style="background-image: url(<?php bloginfo('template_directory');?>/upload/thien-khue.jpg)">
      <div class="snip4">
        <div class="title-page">
          <h1 class="font-r"><?php get_curent_parent_cat(); ?></h1>
          <div class="breadcrumb">
            <?php custom_breadcrumbs();?>
          </div>
        </div>
      </div>
      <div class="inner-header-overlay"></div>
    </div>
    <div class="snip magin-category">
    <?php //get_curent_parent_cat(); ?>   
        <?php  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
      	  if ( have_posts() ) : 
  				/* Start the Loop */
  				while ( have_posts() ) :
  					the_post();	
  					get_template_part( 'layout/content', get_post_type() );
  				endwhile;
  				//the_posts_navigation();
            //BEGIN: Page Nav
           if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
        <div class="pages">
           <div class="page navigation">
                <?php custom_pagination($wp_query->max_num_pages,"",$paged); ?>
           </div>
        </div>   
          <?php endif; 
  			else :
  				get_template_part( 'template-parts/content', 'none' );
  			endif;
  	?>
    </div>
  </section>            
<?php get_footer(); ?>

