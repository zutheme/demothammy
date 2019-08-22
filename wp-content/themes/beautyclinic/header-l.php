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
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/style-home.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/style-header.css?v=0.0.1">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/menu.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/menu-m.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/dich-vu.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/gioi-thieu.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/popup-video.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bang-gia.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/tu-van.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/doi-ngu.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/truoc-sau.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/dat-lich.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/footer.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/page.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/category.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/ma-giam-gia.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/video.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/img.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  
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
        <div id="menu-container">
          <span class="title-me font-r">Menu</span>
           <div id="menu-wrapper">
                <div id="hamburger-menu"><span></span><span></span><span></span></div>
              <!-- hamburger-menu -->
           </div>
           <!-- menu-wrapper -->
           <ul class="menu-list accordion">
              <li class="logo-menu-m">
                <a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory');?>/img/logo-thienkhue.png" alt=""></a>
              </li>
              <li id="nav1" class="toggle accordion-toggle font-r"> 
                 <span class="icon-plus"></span>
                 <a class="menu-link" href="#">Giới Thiệu</a>
              </li>
              <!-- accordion-toggle -->
              <ul class="menu-submenu accordion-content font-m">
                <li><a class="head" href="#">Câu Chuyện Thiên Khuê</a></li>
                <li><a class="head" href="#">Đội Ngũ Cố Vấn Và Bác Sĩ</a></li>
                <li><a class="head" href="#">Công Nghệ Chuẩn Châu Âu</a></li>
                <li><a class="head" href="#">Tiêu Chuẩn ISO 9001:2015</a></li>
                <li><a class="head" href="#">Chi Nhánh</a></li>
                <li><a class="head" href="#">Chính Sách</a></li>
                <li><a class="head" href="#">Điều Khoản</a></li>
              </ul>
              <!-- menu-submenu accordon-content-->
              <li id="nav2" class="toggle accordion-toggle font-r"> 
                 <span class="icon-plus"></span>
                 <a class="menu-link" href="#">Điều Trị Thẩm Mỹ</a>
              </li>
              <!-- accordion-toggle -->
              <ul class="menu-submenu accordion-content font-m">
                <li><a class="head" href="#">Điều Trị Nám Tàn Nhang</a></li>
                <li><a class="head" href="#">Trị Thâm</a></li>
                <li><a class="head" href="#">Trẻ Hóa</a></li>
                <li><a class="head" href="#">Xóa Nhăn</a></li>
                <li><a class="head" href="#">Điều Trị Mụn</a></li>
                <li><a class="head" href="#">Điều Trị Sẹo</a></li>
                <li><a class="head" href="#">Giảm Béo</a></li>
                <li><a class="head" href="#">Cấy Trắng</a></li>
                <li><a class="head" href="#">Triệt Lông</a></li>
                <li><a class="head" href="#">Thẩm Mỹ Nội Khoa</a></li>
              </ul>
              <!-- menu-submenu accordon-content-->
                 <li id="nav3" class="toggle accordion-toggle font-r"> 
                 <span class="icon-plus"></span>
                 <a class="menu-link" href="#">Chăm Sóc Spa</a>
              </li>
              <!-- accordion-toggle -->
              <ul class="menu-submenu accordion-content font-m">
                <li><a class="head" href="#">Dịch Vụ Weekly</a></li>
                <li><a class="head" href="#">Dịch Vụ Professional</a></li>
                <li><a class="head" href="#">Dịch Vụ Body Care</a></li>
              </ul>
              <!-- menu-submenu accordon-content-->
              <li  class="accordion-toggle font-r"> 
                 <a href="#">Bảng Giá Dịch Vụ</a>
              </li>
              <!-- menu-submenu accordon-content-->
              <li id="nav2" class="toggle accordion-toggle font-r"> 
                 <span class="icon-plus"></span>
                 <a class="menu-link" href="#">Khuyễn Mãi</a>
              </li>
              <!-- accordion-toggle -->
              <ul class="menu-submenu accordion-content font-m">
                 <li><a class="head" href="#">Tin Khuyễn Mãi</a></li>
                <li><a class="head" href="#">Mã Giảm Giá</a></li>
                <li><a class="head" href="#">Voucher</a></li>
              </ul>
               <!-- menu-submenu accordon-content-->
              <li id="nav2" class="toggle accordion-toggle font-r"> 
                 <span class="icon-plus"></span>
                 <a class="menu-link" href="#">Khách Hàng</a>
              </li>
              <!-- accordion-toggle -->
              <ul class="menu-submenu accordion-content font-m">
                <li><a class="head" href="#">Video Khách Hàng</a></li>
                <li><a class="head" href="#">Hình Ảnh Khách Hàng</a></li>
                <li><a class="head" href="#">Cảm Nhận Khách Hàng</a></li>
              </ul>
              <!-- menu-submenu accordon-content-->
              <li id="nav2" class="toggle accordion-toggle font-r"> 
                 <span class="icon-plus"></span>
                 <a class="menu-link" href="#">Blog</a>
              </li>
              <!-- accordion-toggle -->
              <ul class="menu-submenu accordion-content font-m">
                 <li><a class="head" href="#0">Làm Đẹp</a></li>
                <li><a class="head" href="#0">Tin Tức Công Ty</a></li>
              </ul>
              <!-- menu-submenu accordon-content-->
           </ul>
           <!-- menu-list accordion-->
          </div>
        <!-- menu-container -->
      </div>
      <!-- End menu mobille -->
        <!-- menu-Depkop -->
        <nav class="navi">
        <ul class="menu-k">
          <li class="actihome"><a class="font-r" href="" >Home</a></li>
          <li><a href="#0" class="dropdownStart font-r">Giới Thiệu<i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown font-m">
              <li><a href="#0">Câu Chuyện Thiên Khuê</a></li>
              <li><a href="#0">Đội Ngũ Cố Vấn Và Bác Sĩ</a></li>
              <li><a href="#0">Công Nghệ Chuẩn Châu Âu</a></li>
              <li><a href="#0">Tiêu Chuẩn ISO 9001:2015</a></li>
              <li><a href="#0">Chi Nhánh</a></li>
              <li><a href="#0">Chính Sách</a></li>
              <li><a href="#0">Điều Khoản</a></li>
            </ul>
          </li>
          <li><a href="#0" class="dropdownStart font-r">Điều Trị Thẩm Mỹ<i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown font-m">
              <li><a href="#0">Điều Trị Nám Tàn Nhang</a></li>
              <li><a href="#0">Trị Thâm</a></li>
              <li><a href="#0">Trẻ Hóa</a></li>
              <li><a href="#0">Xóa Nhăn</a></li>
              <li><a href="#0">Điều Trị Mụn</a></li>
              <li><a href="#0">Điều Trị Sẹo</a></li>
              <li><a href="#0">Giảm Béo</a></li>
              <li><a href="#0">Cấy Trắng</a></li>
              <li><a href="#0">Triệt Lông</a></li>
              <li><a href="#0">Thẩm Mỹ Nội Khoa</a></li>
            </ul>
          </li>
          <li><a href="#0" class="dropdownStart font-r">Chăm Sóc Da<i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown font-m">
              <li><a href="#0">Dịch Vụ Weekly</a></li>
              <li><a href="#0">Dịch Vụ Professional</a></li>
              <li><a href="#0">Dịch Vụ Body Care</a></li>
            </ul>
          </li>
          <li><a href="#0" class="dropdownStart font-r">Bảng Giá Dịch Vụ</a></li>
          <li><a href="#0" class="dropdownStart font-r">Khuyễn Mãi<i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown font-m">
              <li><a href="#0">Tin Khuyễn Mãi</a></li>
              <li><a href="#0">Mã Giảm Giá</a></li>
              <li><a href="#0">Voucher</a></li>
            </ul>
          </li>
          <li><a href="#0" class="dropdownStart font-r">Khách Hàng<i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown font-m">
              <li><a href="#0">Video Khách Hàng</a></li>
              <li><a href="#0">Hình Ảnh Khách Hàng</a></li>
              <li><a href="#0">Cảm Nhận Khách Hàng</a></li>
            </ul>
          </li>
          <li><a href="#0" class="dropdownStart font-r">Blog<i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown font-m">
              <li><a href="#0">Làm Đẹp</a></li>
              <li><a href="#0">Tin Tức Công Ty</a></li>
            </ul>
          </li>
        </ul>
      </nav>
        <span class="social">
        <a href="#twitter"><i class="fab fa-twitter"></i></a>
        <a href="#fb"><i class="fab fa-facebook-f"></i></a>
        <a href="#insta"><i class="fab fa-instagram"></i></a>
        </span>
      </div>
    </div>
    <!-- Eng Menu-Depkop -->
  </section>
  <!-- Eng Menu -->