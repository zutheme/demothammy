<?php
/**
 *  Template Name: Home Clinic
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
get_template_part('layout/slider');
get_template_part('layout/dichvu');
get_template_part('layout/whychoose');
get_template_part('layout/list-price');
get_template_part('layout/consultant');
get_template_part('layout/doctor');
get_template_part('layout/before-after');
get_template_part('layout/booking');
get_footer();
?>