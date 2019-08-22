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
    <section class="blog-post">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-9 category">
              
                <div class="row">
                 <?php custom_breadcrumbs(); ?>
                 <?php get_curent_parent_cat(); ?>
               </div>
             
              <div class="row">
                <?php  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
              	  if ( have_posts() ) : 
          				/* Start the Loop */
          				while ( have_posts() ) :
          					the_post();	
          					get_template_part( 'template-parts/content', get_post_type() );
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
                              'posts_per_page' => '4',
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
                    <h3 class="title-sidebar">Tin hay</h3>
                    <ul>
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
                           <li><a href="<?php the_permalink(); ?>"> &gt; <?php the_title(); ?></a></li>
                           <?php 
                              }
                          } else {
                            echo "nothing found";
                          }
                          /* Restore original Post Data */
                          wp_reset_query();    ?> 
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
    </div>
    </section>
<?php

get_footer();

?>

