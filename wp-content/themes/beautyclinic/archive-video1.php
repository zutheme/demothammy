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
    <section class="blog-post video-bg-cat">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-9 category">
              
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
            <div class="col-sm-3">
              <div class="sidebar">
                <div class="widget">
                  <h2 class="widget-title">Tìm kiếm</h2>
                  <div class="search-form">
                    <form role="search" method="get" class="custom-search" action="<?php echo home_url( '/' ); ?>">
                        <div class="input-group">
                          <input  type="search" placeholder="Từ khóa ..." class="form-control search-input"
                          value="<?php echo get_search_query() ?>" name="s"
                          title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                          <span class="input-group-btn">
                            <button class="btn search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                           </span>
                    </form>                    
                  </div>
                </div>
                <div class="widget">
                  <h2 class="widget-title">Dịch vụ</h2>     
                  <div class="menu-sidebar">                         
                          <div class="menu-list">
                               <?php
                                  wp_nav_menu( array(
                                      'theme_location' => 'menu-custom',
                                      'menu_id' => 'menu-custom',
                                      'depth'      => 2,
                                      'container'  => false,
                                      'menu_class' => 'list-border',
                                      'walker'     => new WPDocs_Walker_Nav_List())
                                  );  ?>                                   
                          </div>
                  </div>             
                </div>
                <div class="widget">
                  <h2 class="widget-title">Tin tức</h2>
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
                             <div class="col-sm-4 col-xs-4 desc text-left">
                                <div class="row"> 
                                  <a class="thumb-desc" href="<?php the_permalink(); ?>"><img src="<?php echo $_src; ?>" alt=""></a>
                                </div>
                              </div>
                              <div class="col-sm-8 col-xs-8 expert text-left">
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
            </div>
          </div>
      </div>
    </div>
    </section>
<?php

get_footer();

?>

