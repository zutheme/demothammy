<?php

/*

 * The template for displaying archive pages

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package onehealth

 */
get_header(); ?>
	<!-- Main start -->
 <section class="page-video">
    <div class="snip page-inner-title primary-bgcolor data-bg" style="background-image: url(upload/thien-khue.jpg)">
            <div class="snip4">
                <div class="title-page">
                    <h1 class="font-r">Video Khách Hàng Thẩm Mỹ Viện Thiên Khuê</h1>
                      <h1 class="font-r"><?php //the_title(); ?></h1>
                    <div class="breadcrumb">
                        <?php custom_breadcrumbs();?>
                      </div>
                </div>
            </div>
            <div class="inner-header-overlay"></div>
        </div>
        <div class="video snip magin-page-video">
            <div class="col-12">
                <div class="title-vi">
                    <h2 class="font-r">Trẻ Hóa Da</h2>
                </div>
                <div class="resCarousel" data-items="1-2-3-3" data-slide="3" data-speed="900" data-animator="lazy">
                <div class="resCarousel-inner"> 
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
                 <div class="pages">
                    <?php custom_pagination($wp_query->max_num_pages,"",$paged); ?>
                 </div>
                 </div>   
                <?php endif; 
                //the_posts_navigation();
				else :
					get_template_part( 'layout/content', 'none' );
				endif; ?>
                </div>
                    <button class='btn btn-default leftRs'><i class="fa fa-chevron-left"></i></button>
                    <button class='btn btn-default rightRs'><i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
    </div>
</section>          
<?php

get_footer();

