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
  <meta name="google-site-verification" content="cIMA6jtoWw4up3_MZxlHdv05Gscwu0LknIdMFd7iaEQ" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Latest compiled and minified CSS -->
  <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon-kovibe.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/main-style.css?ver=7.1.5">
	 <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/video/css/style_video.css?v=1.0.9">
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/carousel.css?v=1.3.5">
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/owlcarousel/dist/assets/owl.carousel.min.css">
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/carousel-youtube.css?v=0.1.2">
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/page-menu.css?v=0.0.5">
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/for-item.css?v=0.0.3">
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/menu-bootstap.css?v=0.9.4">
   <!-- <link href="<?php //bloginfo('template_directory');?>/font-arial/font.css" rel="stylesheet"> -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> -->
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137150751-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-137150751-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TDHPJDW');</script>
    <!-- End Google Tag Manager -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDHPJDW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site">
  <div class="header-top">
      <div class="container">
        <div class="row">          
              <div class="col-md-6 col-sm-6 col-xs-12 top-left">    
                  <div class="widget">
                    <ul class="styled-icons icon-sm icon-white">
                      <li><a target="_blank" href="https://www.facebook.com/thammyvienthienkhue/"><i class="fa fa-facebook"></i></a></li>
                      <li><a target="_blank" href="https://twitter.com/thienkhueclinic"><i class="fa fa-twitter"></i></a></li>
                      <li><a target="_blank" href="https://youtube.com/c/thammyvienthienkhue"><i class="fa fa-youtube-square"></i></a></li>
                      <li><a target="_blank" href="https://www.instagram.com/thienkhueclinic/"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                  </div>
              </div>   
               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="hotline pull-right-cus">
				  <a href="/bang-gia-dich-vu/" style="padding-right:10px;"><i class="fa fa-file-alt"></i>&nbsp;Bảng giá dịch vụ&nbsp;&nbsp;|</a>
                  <a href="tel:19001768"><i class="fa fa-phone"></i>&nbsp;1900 1768&nbsp;&nbsp;&nbsp;|</a>
                  <a class="btn-consultant" href="#"><i class="fa fa-calendar-check-o"></i>&nbsp;Đặt l&#7883;ch hẹn</a>
                </div> 
              </div>

        </div>
      </div>
    </div>
  <div class="main-menu">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php dynamic_sidebar('menu-mobile'); ?>
      </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
	<div id="content" class="site-content">