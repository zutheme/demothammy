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

<div class="distance"></div>

   <div class="main" role="main">

      	<!-- subheader start -->

      		<div class="row business-header" style="height: 370px; background: url(<?php echo $theme_options['default_page_banner']['url']; ?>) center top no-repeat; background-size: auto; margin-top: 100px ">

      			<div class="container">

                    <div class="col-lg-6 col-md-6 col-sm-6">

                         <div class="custom-page-header">
                         
                        
							<?php

								//the_archive_title( '<h1 class="page-title">', '</h1>' );

							?>

						</div><!-- .page-header -->

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">

                      
    				</div>

    			</div>

      		</div>

     	<!-- subheader end -->

      	<!-- Content start -->

      		<div class="row content">

      			<div class="container">

                <!-- Content Start -->

                        <!-- Blog FullWidth Start -->  

                <div class="col-md-9 col-sm-8 blog-item">
                <?php
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
								if ( have_posts() ) : ?>
									<?php

									/* Start the Loop */
                                    //echo "archive-";
									while ( have_posts() ) : the_post();
                                     //echo "archive-".get_post_type();
									get_template_part( 'template-parts/content','product');

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

									//the_posts_navigation();

								else :

									get_template_part( 'template-parts/content', 'none' );

								endif; ?>

                      	</div>                       

                    <!-- Blog FullWidth End -->               

				<!-- Content End -->   

                <!-- Right Sidebar Start -->

                    <div class="col-md-3 col-sm-4 sidebar">

                    

                    	<!-- Custom Search Box Start -->

                        <div class="row">

                            <form role="search" method="get" class="custom-search" action="<?php echo home_url( '/' ); ?>">

                                <input type="search" class="search-field"

                                placeholder="Tìm kiếm ..."

                                value="<?php echo get_search_query() ?>" name="s"

                                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

                                <button type="submit"><span class="glyphicon glyphicon-search"></span></button>

                            </form>

                        </div>  	

                        <!-- Custom Search Box End --> 
                         <div class="menu-sidebar">                         
                                <div class="menu-list">
                                     <?php
                                        wp_nav_menu( array(
                                            'menu'       => 'menu-3',
                                            'depth'      => 2,
                                            'container'  => false,
                                            'menu_class' => 'vert-one',
                                           'walker'     => new WPDocs_Walker_Nav_List())

                                        );  ?>                                   
                                </div>     
                        </div>  
                        <!-- Text Widget Start -->     

                            <?php get_template_part( 'template-parts/content', 'popular' ); ?>

                           <!-- Text Widget End -->

                       

                    	<!-- Accordion Menu Start -->

                       <h4 class="sidebar-heading top30">Liên kết</h4>

                        <div class="panel-group" id="accordion">

                                <div class="panel panel-default">

                                    <div class="panel-heading">

                                        <h4 class="panel-title">

                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">

                                            </span>Sản phẩm mới</a>

                                        </h4>

                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in">

                                        <div class="panel-body-accordion">

                                            <table class="table">

                                        <?php
                                        $args = array(
                                            'post_type' => 'product',
                                            'posts_per_page' => '4'
                                            );                                                                      

                                            $team_query = new WP_Query($args);

                                           

                                            if ($team_query->have_posts()) {

                                                

                                                while ($team_query->have_posts()) {

                                                    $team_query->the_post();
                                                    ?>

                                                    <tr>

                                                    <td>

                                                        <span class="glyphicon glyphicon-flash text-success"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                                    </td>

                                                    </tr>

                                                    

                                                                                  

                                                    <?php 

                                                  

                                                }

                                            } else {

                                                echo "nothing found";

                                            }



                                            /* Restore original Post Data */

                                            wp_reset_query();



                                            ?>          

                                               

                                            </table>

                                        </div>

                                    </div>

                                </div>                                 

                            </div>

                       
                    	<!-- Recent Posts Start -->

                        <h5 class="sidebar-heading top30">Tin mới</h5>

                            <ul class="latest-news">

                                 <?php  $args = array(

                                    'post_type' => 'post',

                                     'posts_per_page' => '3' 

                                );

                                $team_query = new WP_Query($args);                                

                                if ($team_query->have_posts()) {

                                    $count=0; $active='';

                                    while ($team_query->have_posts()) {

                                        $team_query->the_post(); 

                                        //$tp_field = get_post_custom();

                                        $title = get_the_title();

                                        $title = part_content($title,28);

                                    ?>

                                         <li><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('thumbnail'); ?>" width="45" height="45" class="pull-left img-circle img-responsive right-space-for-image" alt=""></a><a href="<?php the_permalink(); ?>"><?php echo $title; ?><span><?php the_time('F jS') ?></span></a></li>                            

                                        <?php 

                                    }

                                } else {

                                    echo "not found";

                                }

                                /* Restore original Post Data */

                                wp_reset_query();

                                ?>                     

                            </ul>

                        <!-- Recent Posts End --> 

                    </div>

                <!-- Right Sidebar End -->

                </div>

      		</div>

     	<!-- Content end -->

 	</div>

    <!-- Main end -->



<?php

get_footer();

