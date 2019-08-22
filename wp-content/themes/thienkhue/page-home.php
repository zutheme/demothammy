<?php
/**
 *  Template Name: Home template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eleaning
 */
get_header();
get_template_part('template-parts/widget-slider');
//get_template_part('template-parts/carousel');
//get_template_part('template-parts/video-home');
//get_template_part('template-parts/feature');
get_template_part('template-parts/tech');
get_template_part('template-parts/service');
get_template_part('template-parts/group-promotion');
//get_template_part('template-parts/carousel-promotion');
//get_template_part('template-parts/video-one-screen');
//get_template_part('template-parts/team');
get_template_part('template-parts/carousel-team');
//get_template_part('template-parts/testimonial');
get_template_part('template-parts/guest');
//echo  "<script>var cat_parent='frontpage';</script>";
get_curent_parent_cat();
get_footer();
?>

