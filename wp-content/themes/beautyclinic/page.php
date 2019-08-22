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
    <?php //custom_breadcrumbs(); ?>
    <?php
    while ( have_posts() ) :
      the_post();
      get_template_part( 'layout/page');
    endwhile; // End of the loop.
    ?>
<?php
get_footer();
