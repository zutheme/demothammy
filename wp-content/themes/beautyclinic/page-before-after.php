<?php

/**
 *  Template Name: Before After
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
get_header(); ?>
<section class="page-video">
		<div class="snip page-inner-title primary-bgcolor data-bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/upload/thien-khue.jpg)">
			<div class="snip4">
				<div class="title-page">
					<h1 class="font-r">Video Khách Hàng Thẩm Mỹ Viện Thiên Khuê</h1>
					<div class="breadcrumb">
                        <?php custom_breadcrumbs();?>
                      </div>
				</div>
			</div>
			<div class="inner-header-overlay"></div>
		</div>
		<div class="video snip magin-page-video">
<?php 
	get_template_part('layout/gallery-trehoa');
	get_template_part('layout/gallery-trinam');
	get_template_part('layout/gallery-trimun');
	get_template_part('layout/gallery-giambeo');
	//get_template_part('gallery/dichvu'); ?>
	</div>
</section>
<?php get_footer(); ?>