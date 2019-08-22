<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package elearning
 */

get_header();
?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="<?php echo esc_attr( get_option('banner-header') ); ?>">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">kết quả tìm kiếm</h2>
               <?php custom_breadcrumbs(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Events Grid -->
    <section>
      <div class="container pt-70 pb-40">
        <div class="section-content">
          <div class="row multi-row-clearfix">
          	 <?php if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
					while ( have_posts() ) :
						the_post();	
						get_template_part( 'template-parts/content', 'search' );
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
        //END: Page Nav
					else :
						//get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
          
          </div>
        </div>
      </div>
    </section>
<?php
get_footer();
