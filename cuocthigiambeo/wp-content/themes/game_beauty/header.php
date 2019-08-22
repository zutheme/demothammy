<?php

/**

 * The header for our theme

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package game_beauty

 */



?>

<!doctype html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Bootstrap -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/img/favicon.png">
    <link href="<?php bloginfo('template_directory');?>/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/fonts/font-awesome/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/style.css?v=0.2.2">

    <!-- bootstrap-daterangepicker -->

    <link href="<?php bloginfo('template_directory');?>/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css}" rel="stylesheet">

    <!-- bootstrap-datetimepicker -->

    <link href="<?php bloginfo('template_directory');?>/dashboard/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
     <link href="<?php bloginfo('template_directory');?>/css/custom.css?v=0.0.1" rel="stylesheet">
	<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>

<div id="page" class="site">

<div id="content" class="site-content">

