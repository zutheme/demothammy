<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package elearning
 */
get_header();
?>
    <!-- Section: Blog -->
    <section class="blog-post">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 entry-content">
            <div class="row">
              <div class="col-md-12">
              <?php custom_breadcrumbs();?>
              </div>
            </div>
        			<?php
        			while ( have_posts() ) :
        				the_post();
        				get_template_part( 'template-parts/content', get_post_type() );
        				// If comments are open or we have at least one comment, load up the comment template.
          			// if ( comments_open() || get_comments_number() ) :
          			// 	comments_template();
          			// endif;
        			endwhile;
        			?>
              <?php get_template_part( 'template-parts/relative'); ?>
              <!-- <div class="relative-orther">
                <div class="row">
                  <h3 class="widget-title">Tin khác</h3>
                </div>
                <div class="row">
                  <?php //echo do_shortcode('[wpb-random-posts]'); ?>
                </div>
              </div>   -->   
        	</div>
			   <div class="col-sm-3">
            <div class="sidebar sbfacebook">
                <div class="fb-page" data-href="https://www.facebook.com/thammyvienthienkhue/" data-width="390" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/thammyvienthienkhue/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thammyvienthienkhue/">Hệ Thống Thẩm Mỹ Quốc Tế Thiên Khuê</a></blockquote></div>
              </div>
            <div class="sidebar">
              <?php if ( is_active_sidebar( 'sidebar-right' ) ) : 
                     dynamic_sidebar( 'sidebar-right' ); 
                    endif; ?>
            </div>
            <div class="sidebar">
              <div class="list-item">
                  <h3 class="title-sidebar">Dịch vụ nổi bật</h3>
                      <div class="item">
                          <div class="image">
                              <a href="https://thammyvienbichnguyet.vn/dich-vu/Phac-do-tri-nam-toan-nang-Melas-Intense"><img src="https://thammyvienbichnguyet.vn/media/services/MJbP5yLjRd.png" alt="Phác đồ trị nám toàn năng Melas Intense"></a>
                          </div>
                          <div class="nav-content-img">
                              <h3 class="title"><a href="https://thammyvienbichnguyet.vn/dich-vu/Phac-do-tri-nam-toan-nang-Melas-Intense">Phác đồ trị nám toàn năng Melas Intense</a></h3>
                          </div>
                          <div class="clear-fix"></div>
                      </div>
              </div>
            </div>
            
            <div class="sidebar">
                <div class="widget">
                  <h2 class="widget-title">Tin khác</h2>
                  <div class="latest-posts">
                    <?php
                          $args = array(
                          'post_type' => 'post',
                          'posts_per_page' => '3'
                          );                                                                           
                          $team_query = new WP_Query($args);
                         if ($team_query->have_posts()) {
                          while ($team_query->have_posts()) {
                            $team_query->the_post();  
                            $id = get_the_ID();
                            $src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                             if(!$src){
                                //$_src = no_thumbnail;
                                $rand = rand(0,4);
                                $_src = no_thumbnail_url."no-thumbnail".$rand.".jpg";
                              }else{
                                $_src = $src[0];
                              }
                            $title = get_the_title($id);
                           ?>
                           <div class="row thumb-expert">
                              <div class="col-sm-12 expert text-left">
                                <h3 class="title-desc hidden-excerpt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                              </div>
                            </div>
                           <?php 
                              }
                          } else {
                            echo "nothing found";
                          }
                          /* Restore original Post Data */
                          wp_reset_query();    ?> 
                  </div>
                </div>        
              </div>
              <div class="sidebar">
              <?php if ( is_active_sidebar( 'sidebar-fix' ) ) : 
                     dynamic_sidebar( 'sidebar-fix' ); 
                    endif; ?>
              </div>
          </div>
        </div>
      </div>
    </section> 
<?php
get_footer();
?>