<?php
global $porto_settings, $porto_layout;

$search_size = $porto_settings['search-size'];
?>

<div class="header-main">
    <div class="container">
        <div class="header-logo col-lg-2 col-md-3 col-sm-12 col-xs-12 text-center">
            <ul>
                <li><a class="logo_img" href="<?php echo esc_url(home_url('/')); ?>"><img class="img-responsive" src="<?php bloginfo('template_directory');?>/images/logo/logo-3.png" alt="Thẩm Mỹ Viện"></a></li>
                <li><a class="mobile-toggle"><i class="fa fa-reorder"></i></a></li>
            </ul>
        </div>

        <div class="header-menu col-lg-10 col-md-9 col-sm-12 col-xs-12">
            <div id="main-menu">
                <?php
                // show main menu
                echo porto_main_menu();
                ?>
            </div>   
        </div>
       
    </div>
</div> 