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
        				get_template_part( 'template-parts/content','video');
        			endwhile;
        			?>
              <?php get_template_part( 'template-parts/relative-video'); ?>
              <?php //get_template_part( 'template-parts/relative'); ?>
              <div class="relative-orther">
                <div class="row">
                  <h3 class="widget-title">Tin khác</h3>
                </div>
                <div class="row">
                  <?php echo do_shortcode('[wpb-random-posts]'); ?>
                </div>
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
                <h2 class="widget-title">Video mới nhất</h2>     
                <div class="menu-sidebar">                         
                        <div class="sidebar-video">
                          <?php
                                $args = array(
                                'post_type' => 'video',
                                'posts_per_page' => '3'
                                );                                                                           
                                $team_query = new WP_Query($args);
                                $count = 0;
                               if ($team_query->have_posts()) {
                                while ($team_query->have_posts()) {
                                  $team_query->the_post();  
                                  $id = get_the_ID();
                                  $idyoutube = get_post_meta( $id, 'id-youtube', true );
                                        ?>
                                      <section class="desc-thumb">
                                        <div class="row">                     
                                        <div class="col-md-6 col-xs-6">
                                            <div class="video-mask">
                                            <a class="thumb" href="<?php the_permalink(); ?>"><img src="https://img.youtube.com/vi/<?php echo $idyoutube; ?>/0.jpg"></a>
                                            <div class="mask">
                                              <a href="<?php the_permalink(); ?>" class="btn btn-default btn-video"><i class="fa fa-play" aria-hidden="true"></i></a>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                          <div class="row">
                                            <div class="desc">
                                              <h3 class="max-title"><a class="link-video link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </section>

                                          <?php                                   
                                            }//end while
                                        } else {
                                            echo "nothing found";
                                        }//end if have post
                                        wp_reset_query();  ?>       
              </div>
              <div class="widget">
                <h2 class="widget-title">Tin nổi bật</h2>
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
    </section> 
<?php
get_footer();
?>