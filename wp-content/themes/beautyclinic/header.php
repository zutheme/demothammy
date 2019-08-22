<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thienkhue
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="p3Tlcp-8O16ackDADk4A-b4F3u3Efmi0ByN9mWKEmY8" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Latest compiled and minified CSS -->
  <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.png">
	<!-- new style -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/style-home.css?v=0.0.1">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/style-header.css?v=0.0.3">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/menu.css?v=0.1.6">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/menu-m.css?v=0.1.8">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/dich-vu.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/gioi-thieu.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/popup-video.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bang-gia.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/tu-van.css?v=0.0.2">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/doi-ngu.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/truoc-sau.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/dat-lich.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/footer.css?v=0.0.4">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/page.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/category.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/ma-giam-gia.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/video.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/img.css">
   <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/style-custom.css?v=0.0.6">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- end new style -->
  
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-P5MWCX6');</script>
  <!-- End Google Tag Manager -->
  
	<?php wp_head(); ?>
</head>

<body <?php //body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5MWCX6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<section class="header-nav">
    <div class="topnav">
      
      <div class="topnav-right">
        <div class="logo">
          <a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory');?>/img/logo-thienkhue.png" alt=""></a>
        </div>
        <!-- End Logo -->
        <div class="menu-mobile">
        <ul style="display: none">
          <li class="logo-menu-m">
                <!-- <a href="<?php //echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory');?>/img/logo-thienkhue.png" alt=""></a> -->
                <a class="btn-consultant" href="javascript:void(0);"><img src="<?php bloginfo('template_directory');?>/img/logo-thienkhue.png" alt=""></a>
           </li>
        </ul>
        <div id="menu-container">
          <span class="title-me font-r">Menu</span>
           <div id="menu-wrapper">
                <div id="hamburger-menu"><span></span><span></span><span></span></div>
              <!-- hamburger-menu -->
           </div>
           <!-- menu-wrapper -->
           <?php
               wp_nav_menu( array(
                    'theme_location'    => 'menu-1',
                    'depth'             => 2,
                    'container'         => '',
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'menu-list accordion',
                    'fallback_cb'       => 'WPDocs_Walker_Nav_Mobile::fallback',
                    'walker'            => new WPDocs_Walker_Nav_Mobile(),
                ) );
              ?>  
           <!-- menu-list accordion-->
          </div>
        <!-- menu-container -->
      </div>
      <!-- End menu mobille -->
        <!-- menu-Depkop -->
      <nav class="navi">
        <?php
               wp_nav_menu( array(
                    'theme_location'    => 'menu-1',
                    'depth'             => 2,
                    'container'         => '',
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'menu-k',
                    'fallback_cb'       => 'WPDocs_Walker_Nav_Menu::fallback',
                    'walker'            => new WPDocs_Walker_Nav_Menu(),
                ) );
              ?>  
      </nav>
        <span class="social">
        <a href="#twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a class="btn-consultant" href="#insta"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </span>
      </div>
    </div>
    <!-- Eng Menu-Depkop -->
  </section>
  <!-- Eng Menu -->