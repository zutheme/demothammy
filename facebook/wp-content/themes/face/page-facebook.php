<?php
/**
*  Template Name: facebook
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alka
 */
get_header();

?>
<div id="content" role="main">
	<h4>facebook</h4>
    <?php echo do_shortcode('[alka_facebook]'); ?>
</div>
<?php get_footer() ?>