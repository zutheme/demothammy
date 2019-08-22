<?php
global $porto_settings, $porto_layout;
$footer_type = $porto_settings['footer-type'];
$default_layout = porto_meta_default_layout();

$wrapper = porto_get_wrapper_type();
?>
        <?php get_sidebar(); ?>

        <?php if (porto_get_meta_value('footer', true)) : ?>

            <?php

            $cols = 0;
            for ($i = 1; $i <= 4; $i++) {
                if ( is_active_sidebar( 'content-bottom-'. $i ) )
                    $cols++;
            }

            if (is_404()) $cols = 0;

            if ($cols) : ?>
                <?php if ($wrapper == 'boxed' || $porto_layout == 'fullwidth' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') : ?>
                    <div class="container sidebar content-bottom-wrapper">
                        <div class="row">
                <?php else :
                    if ($default_layout == 'fullwidth' || $default_layout == 'left-sidebar' || $default_layout == 'right-sidebar') :
                    ?>
                    <div class="container sidebar content-bottom-wrapper">
                        <div class="row">
                    <?php else : ?>
                    <div class="sidebar content-bottom-wrapper">
                    <?php
                    endif;
                endif; ?>

                    <?php
                    $col_class = array();
                    switch ($cols) {
                        case 1:
                            $col_class[1] = 'col-sm-12';
                            break;
                        case 2:
                            $col_class[1] = 'col-sm-12';
                            $col_class[2] = 'col-sm-12';
                            break;
                        case 3:
                            $col_class[1] = 'col-sm-12 col-md-4';
                            $col_class[2] = 'col-sm-12 col-md-4';
                            $col_class[3] = 'col-sm-12 col-md-4';
                            break;
                        case 4:
                            $col_class[1] = 'col-sm-12 col-md-3';
                            $col_class[2] = 'col-sm-12 col-md-3';
                            $col_class[3] = 'col-sm-12 col-md-3';
                            $col_class[4] = 'col-sm-12 col-md-3';
                            break;
                    }
                    ?>
                    <?php
                    $cols = 1;
                    for ($i = 1; $i <= 4; $i++) {
                        if ( is_active_sidebar( 'content-bottom-'. $i ) ) {
                            ?>
                            <div class="<?php echo $col_class[$cols++] ?>">
                                <?php dynamic_sidebar( 'content-bottom-'. $i ); ?>
                            </div>
                        <?php
                        }
                    }
                    ?>
                <?php if ($wrapper == 'boxed' || $porto_layout == 'fullwidth' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') : ?>
                    </div>
                </div>
                <?php else :
                    if ($default_layout == 'fullwidth' || $default_layout == 'left-sidebar' || $default_layout == 'right-sidebar') :
                    ?>
                        </div>
                    </div>
                    <?php else : ?>
                    </div>
                    <?php
                    endif;
                endif; ?>
            <?php endif; ?>

            </div><!-- end main -->

            <?php
            do_action('porto_after_main');
            $footer_view = porto_get_meta_value('footer_view');
            ?>

            <div class="footer-wrapper<?php if ($porto_settings['footer-wrapper'] == 'wide') echo ' wide' ?> <?php echo $footer_view ?>">
                
                <div id="menu-footer" class="vc_row wpb_row vc_row-fluid hidden-xs">
                    
                	<div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <?php dynamic_sidebar( 'footer_menu_1'); ?>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <?php dynamic_sidebar( 'footer_menu_2'); ?>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <?php dynamic_sidebar( 'footer_menu_3'); ?>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <?php dynamic_sidebar( 'footer_menu_4'); ?>
                            </div>
                        </div>
                            
                    </div>
                </div>
                
                <?php if (porto_get_wrapper_type() != 'boxed' && $porto_settings['footer-wrapper'] == 'boxed') : ?>
                <div id="footer-boxed">
                <?php endif; ?>

                    <?php
                    //var_dump($footer_type);
                    get_template_part('footer/footer_'.$footer_type);
                    
                    ?>

                <?php if (porto_get_wrapper_type() != 'boxed' && $porto_settings['footer-wrapper'] == 'boxed') : ?>
                </div>
                <?php endif; ?>

            </div>

            <?php porto_blueimp_gallery_html() ?>

        <?php else: ?>

            </div><!-- end main -->

        <?php
        do_action('porto_after_main');
        endif;
        ?>

    </div><!-- end wrapper -->
    <?php do_action('porto_after_wrapper'); ?>

<div class="panel-overlay"></div>
<div class="filter-overlay"></div>
<?php
//if(is_home){ ?>   
    <script>
        jQuery('#list-bac-si .wpb_single_image').on('click',function(){
            //console.log('change bac si');
            var src = jQuery(this).find('img').attr('src');
            // console.log(src);
            jQuery('.bac-si-main-img').find('img').attr('src',src);
            jQuery('.bac-si-main-img').find('img').attr('srcset',src);
            
            //console.log(jQuery('.bac-si-main-img').find('img').attr('src'));
            var infoHtml = jQuery(this).closest('.vc_column_container').find('.info').html();
            // console.log(infoHtml);
            jQuery('.bac-si-main-info').html(infoHtml);
            
        });
    </script>
    
<?php    
//}

// navigation panel
get_template_part('panel');

// category filter
$is_category_filter = class_exists('WooCommerce') && $porto_settings['category-mobile-filter'] && (is_shop() || porto_is_product_archive());
if ($is_category_filter && ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar')) {
    get_template_part('category-filter');
}

?>

<!--[if lt IE 9]>
<script src="<?php echo esc_url(porto_js) ?>/html5shiv.min.js"></script>
<script src="<?php echo esc_url(porto_js) ?>/respond.min.js"></script>
<![endif]-->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b31d475d0b5a54796822c62/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110812630-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110812630-1');
</script>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="253439151750412"
  logged_in_greeting="Xin chào! chúng tôi có thể làm điều gì để giúp bạn ?"
  logged_out_greeting="Xin chào! chúng tôi có thể làm điều gì để giúp bạn ?">
</div>
<!-- harafunnel -->
<script src="//harafunnel.com/widget/253439151750412.js" async="async"></script> 
<?php wp_footer(); ?>

<?php
// js code (Theme Settings/General)
if (isset($porto_settings['js-code']) && $porto_settings['js-code']) { ?>
    <script type="text/javascript">
        <?php echo $porto_settings['js-code']; ?>
    </script>
<?php } ?>

<script src="<?php bloginfo('template_directory'); ?>/js/custom.js?ver=1.0.1"></script>

</body>
</html>