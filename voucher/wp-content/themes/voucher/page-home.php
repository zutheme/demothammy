<?php
/*
 *  Template Name: Home Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package voucher
 */

get_header();
?>
<div class="bg-game">
<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			<div class="area-play">
				<p><a href="https://thammyvienthienkhue.vn/voucher/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a></p>
				<p><button class="btn btn-default btn-play-again" onclick="playagain()">Chơi lại</button></p>
			</div>
		</div>
	</div>
</div>
</div>
<?php
get_footer();
