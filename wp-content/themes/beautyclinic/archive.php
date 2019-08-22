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
        <?php
          $menu = false;
          $idmenu = 0;
          $menu_items = wp_get_nav_menu_items( 'main-menu' );
        if ( $menu_items ) {
           foreach ( $menu_items as $menu_item ) {
              if($menu_item->object_id == get_queried_object_id()){
                 $idmenu = $menu_item->ID;
              }
           }
        }
        //echo "<span>".$idmenu."</span>";
        if($idmenu > 0) {
           $menu = wp_nav_menu( array(
                'theme_location'    => 'main-menu',
                'menu'    => 'main-menu',
                'menu_id' => $idmenu,
                //'submenu' => 'Tắm trắng Nano Cell White',
                'container' => false,
                'items_wrap' => '%3$s',
                'separator' =>'|', //this is a custom arg I've added, not a 'core' one.
                'depth'             => 4,
                'container_class'   => '',
                'container_id'      => '',
                'menu_class'        => 'menu-class',
                'fallback_cb'       => 'WPDocs_Walker_SubMenu::fallback',
                'walker'            => new WPDocs_Walker_SubMenu(),
                //'echo' => FALSE,
                //'fallback_cb' => '__return_false'
            ) );
         }
        ?>
     </div>
    <div class="snip magin-category">
    <?php //get_curent_parent_cat(); ?>   
        <?php  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
      	  if ( have_posts() ) : 
  				/* Start the Loop */
  				while ( have_posts() ) :
  					the_post();
            include( locate_template( 'layout/content.php', false, false ) ); 	
  					//get_template_part( 'layout/content', get_post_type() );
  				endwhile;
  				//the_posts_navigation();
            //BEGIN: Page Nav
            if(isset($menu)&&!$menu) :
             if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
                <div class="page-number">
                   <div class="page navigation">
                        <?php custom_pagination($wp_query->max_num_pages,"",$paged); ?>
                   </div>
                </div>   
            <?php endif; 
            endif;
  			else :
  				get_template_part( 'template-parts/content', 'none' );
  			endif;
  	?>
    </div>
     
  </section>            
<?php get_footer(); ?>

