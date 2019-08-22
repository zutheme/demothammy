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
  <?php //custom_breadcrumbs();?>
  <?php //get_curent_parent_cat(); ?>
  <section class="page-view">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'layout/content', get_post_type() );
		// If comments are open or we have at least one comment, load up the comment template.
		?>
    <div class="snip-coment">
      <div class="snip4 back-page">
        <div class="content-page">
    <?php 
      if ( comments_open() || get_comments_number() ) :
		      comments_template();
          //comments_template( '/comments-default.php' );
		  endif; ?>
        </div>
      </div>
    </div>
	<?php endwhile; ?>
  <?php //get_template_part( 'template-parts/relative'); ?>
  <!-- <div class="relative-orther">
    <div class="row">
      <h3 class="widget-title">Tin khác</h3>
    </div>
    <div class="row">
      <?php //echo do_shortcode('[wpb-random-posts]'); ?>
    </div>
  </div>   --> 
  </section>  
<?php
get_footer();
?>