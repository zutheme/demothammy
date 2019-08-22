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
     <!-- Navbar Start -->
        <nav class="navbar navbar-default megamenu">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-2" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            
                  <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php bloginfo('template_directory');?>/images/logo/logo-3.png" class="img-responsive" alt="<?php echo esc_attr(get_bloginfo('title')); ?>"></a>
               
          </div>
          <div id="navbar-collapse-2" class="navbar-collapse collapse pull-right">
             <?php
                  wp_nav_menu( array(
                      'menu'       => 'menu-1',
                      'depth'      => 2,
                      'container'  => false,
                      'menu_class' => 'nav navbar-nav',
                      'walker'     => new wp_bootstrap_navwalker())
                  );
                ?>   
          </div>
        </nav>
        <!-- Navbar end -->    
</header>

<div class="header-main">
    <div class="container">
       
    </div>
</div>
