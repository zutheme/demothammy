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
              <?php get_curent_parent_cat(); ?>
              </div>
            </div>
        			<?php
        			while ( have_posts() ) :
        				the_post();
        				get_template_part( 'template-parts/content', get_post_type() );
        				// If comments are open or we have at least one comment, load up the comment template.
          			// if ( comments_open() || get_comments_number() ) :
          			// 	comments_template();
          			// endif; ?>
                <div class="area-comment">
                  <div class="comment">
                    <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="" data-numposts="5"></div>
                  </div>
                </div>
        			<?php endwhile; ?>
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
 
            <div class="sidebar-post">
                 <div class="list-item">
                  <h3 class="title-sidebar">Dịch vụ nổi bật</h3>
                    <?php
                          $team_query = new WP_Query( array(
                              'post_type' => 'post',
                              'posts_per_page' => '3',
                              'tax_query' => array(
                                  array (
                                      'taxonomy' => 'category',
                                      'field' => 'slug',
                                      'terms' => 'dich-vu-noi-bat',
                                  )
                              ),
                          ) );
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
                           <div class="col-sm-12 item">
                               <div class="row">
                                <div class="col-sm-6 thumb">               
                                    <a href="<?php the_permalink(); ?>"><img class="image" src="<?php echo $_src; ?>" alt="<?php the_title(); ?>"></a>        
                                </div>
                                <div class="col-sm-6">
                                    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
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
              <div class="sidebar-posts">
                  <h3 class="title-sidebar">&nbsp;</h3>
                  <ul></ul>                 
              </div>
              <div class="sidebar-l">
              <div class="list-item">
                    <h3 class="title-sidebar"></h3>
                    <ul>
                      
                    </ul>
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