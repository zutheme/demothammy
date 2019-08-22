<?php
global $porto_settings, $porto_layout;

$search_size = $porto_settings['search-size'];
?>
<header id="header" class="header-corporate header-15 <?php echo $search_size ?>">
    <?php if ($porto_settings['show-header-top']) : ?>
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <?php                  
                    $currency_switcher = porto_currency_switcher();
                    $view_switcher = porto_view_switcher();

                    if ($currency_switcher || $view_switcher)
                        echo '<div class="switcher-wrap">';

                    echo $currency_switcher;

                    if ($currency_switcher && $view_switcher)
                        echo '<span class="gap switcher-gap">|</span>';

                    echo $view_switcher;

                    if ($currency_switcher || $view_switcher)
                        echo '</div>';
                    ?>
                    <?php
                    // show contact info and top navigation
                    $contact_info = $porto_settings['header-contact-info'];

                    if ($contact_info)
                        echo '<div class="block-inline"><div class="header-contact">' . do_shortcode($contact_info) . '</div></div>';
                    ?>
                </div>
                <div class="header-right">
                    <?php
                    // show welcome message and top navigation
                    $top_nav = porto_top_navigation();
                    if ($porto_settings['welcome-msg'])
                        echo '<span class="welcome-msg">' . do_shortcode($porto_settings['welcome-msg']) . '</span>';
                    if ($porto_settings['welcome-msg'] && $top_nav)
                        echo '<span class="gap">|</span>';
                    echo $top_nav;
                    ?>
                    <?php
                    // show search form
                    echo porto_search_form();
                    // show minicart
                    $minicart = porto_minicart();
                    if ($minicart)
                        echo '<div class="block-inline">' . $minicart . '</div>';
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="header-main">
        <div class="container">
            <div class="header-logo col-lg-2 col-md-3 col-sm-12 col-xs-12 text-center">
                <a class="logo_img" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php bloginfo('template_directory');?>/images/logo/logo-3.png" class="img-responsive" alt="<?php echo esc_attr(get_bloginfo('title')); ?>"></a>
                <a class="mobile-toggle"><i class="fa fa-reorder"></i></a>
            </div>

            <div class="header-menu col-lg-8 col-md-7 col-sm-12 col-xs-12">
                <div id="main-menu" <?php //echo ($porto_settings['show-header-top']) ? ' class="show-header-top col-lg-10 col-md-9"' : '' ?>>
                    <?php
                    // show main menu
                    echo porto_main_menu();
                    ?>
                </div>   
            </div>
            <div class="hotline col-lg-2 col-md-2 hidden-sm hidden-xs">
                    <div class="phone">
                        <a class="btn btn-phone" href="tel:19001768">&nbsp;&nbsp;&nbsp;1900 1768&nbsp;&nbsp;</a>
                    </div>
                    <div class="register">
                        <a class="btn btn-register" href="/#wpcf7-f4-o1">&nbsp;&nbsp;&nbsp;Đăng ký&nbsp;&nbsp;</a>
                    </div>
            </div>
        </div>
    </div>
    
    
    
</header>
<div id="hotline-register" class="visible-xs-block hidden-sm hidden-md hidden-lg">
    <div class="col-xs-6">
        <a class="phone" href="tel:1900 1768">
            <div class="wrapper">
                <i class="fa fa-phone"></i>
            </div>
            <span class="">1900 1768</span>
        </a>
    </div>
    <div class="col-xs-6">
        <div class="register">
            <a href="/#wpcf7-f4-o1">
                <div class="wrapper">
                    <i class="fa fa-pencil-square-o"></i>
                </div>
                <span class="">Đăng ký tư vấn</span>
            </a>
        </div>
    </div>
    
</div>