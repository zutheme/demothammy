<?php
global $porto_settings;

$footer_view = porto_get_meta_value('footer_view');

?>
<?php if ( is_active_sidebar( 'footer-top' ) && !$footer_view ) : ?>
    <div class="footer-top">
        <div class="container">
            <?php dynamic_sidebar( 'footer-top' ); ?>
        </div>
    </div>
<?php endif; ?>

<?php
$cols = 0;
for ($i = 1; $i <= 4; $i++) {
    if ( is_active_sidebar( 'footer-column-'. $i ) )
        $cols++;
}
?>

<div id="footer" class="footer-1<?php if ($porto_settings['footer-ribbon']) echo ' show-ribbon' ?>">
    <?php if (!$footer_view && $cols && 0) : ?>
        <div class="container">
            <?php if ($porto_settings['footer-ribbon']) : ?>
                <div class="footer-ribbon"><?php echo force_balance_tags($porto_settings['footer-ribbon']) ?></div>
            <?php endif; ?>

            <?php
            if ($cols) :
                $col_class = array();
                switch ($cols) {
                    case 1:
                        $col_class[1] = 'col-sm-12';
                        break;
                    case 2:
                        $col_class[1] = 'col-sm-12 col-md-6';
                        $col_class[2] = 'col-sm-12 col-md-6';
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
                <div class="row">
                    <?php
                    $cols = 1;
                    for ($i = 1; $i <= 4; $i++) {
                        if ( is_active_sidebar( 'footer-column-'. $i ) ) {
                            ?>
                            <div class="<?php echo $col_class[$cols++] ?>">
                                <?php dynamic_sidebar( 'footer-column-'. $i ); ?>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php
            get_template_part('footer/footer_tooltip');
            ?>

        </div>
    <?php endif; ?>

    <?php
    if (0 && (($porto_settings['footer-logo'] && $porto_settings['footer-logo']['url']) || is_active_sidebar( 'footer-bottom' ) || $porto_settings['footer-copyright'])) :
    ?>
   
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-left">
                <?php
                // show logo
                if ($porto_settings['footer-logo'] && $porto_settings['footer-logo']['url']) : ?>
                    <span class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
                            <?php echo '<img class="img-responsive" src="' . esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['footer-logo']['url'])) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" />'; ?>
                        </a>
                    </span>
                <?php endif; ?>
                <?php
                if ($porto_settings['footer-copyright-pos'] == 'left') {
                    echo force_balance_tags($porto_settings['footer-copyright']);
                } else {
                    if (is_active_sidebar( 'footer-bottom' ))
                        dynamic_sidebar( 'footer-bottom' );
                }
                ?>
            </div>

            <?php if ($porto_settings['footer-payments'] && $porto_settings['footer-payments-image'] && $porto_settings['footer-payments-image']['url']) : ?>
                <div class="footer-center">
                    <?php if ($porto_settings['footer-payments-link']) : ?>
                    <a href="<?php echo esc_url($porto_settings['footer-payments-link']) ?>">
                    <?php endif; ?>
                        <img class="img-responsive" src="<?php echo esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['footer-payments-image']['url'])) ?>" alt="<?php echo esc_attr($porto_settings['footer-payments-image-alt']) ?>" />
                    <?php if ($porto_settings['footer-payments-link']) : ?>
                    </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php
            if ($porto_settings['footer-copyright-pos'] == 'right') : ?>
                <div class="footer-right"><?php echo force_balance_tags($porto_settings['footer-copyright']) ?></div>
            <?php else :
                if (is_active_sidebar( 'footer-bottom' )) : ?>
                    <div class="footer-right"><?php dynamic_sidebar( 'footer-bottom' ); ?></div>
                <?php endif;
            endif;
            ?>
        </div>
    </div>
   
    <?php endif; ?>
    
    <div class="container">
        <div class="col-lg-4 col-md-6 col-sm-6 first">
            <div class="logo-footer">
                <img class="" src="/wp-content/uploads/2017/11/logo-3.png">
                <p>Hệ Thống được đánh giá chỉ số <br />
                    thương hiệu xuất sắc đẳng cấp Quốc Tế</p>
            </div>
            <div class="clearfix social">
                <ul>
                    <li class="pull-left">
                    <a href=""><img src="/wp-content/themes/porto/images/youtube-icon.png"></a>
                    </li>               
                    <li class="pull-left">
                        <a href=""><img src="/wp-content/themes/porto/images/icon-zalo.png"></a></li>
                    <li class="pull-left">
                        <a href=""><img src="/wp-content/themes/porto/images/icon-3.png"></a></li>
                    <li class="pull-left">
                        <a href=""><img src="/wp-content/themes/porto/images/fb-icon.png"></a></li>
                </ul>
            </div>

            <div class="clearfix address">
            	<h4>THÔNG TIN LIÊN HỆ</h4>
            	<ul>
                	<li><b>TP. HCM</b><br>
                        <i>Số 7, Trần Quang Diệu, F14, Q3, Tp Hồ Chí Minh</i></li>
                    <li><b>Bình Dương</b><br>
                        <i>Số 83, đường 30/4, Phường Phú Hòa, Tp Thủ Dầu Một</i></li>
                    <li><b>Đồng Nai</b><br>
                        <i>D2-D3/253, đường Phạm Văn Thuận, phường Tân Mai, Tp Biên Hòa</i></li>
                </ul>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="phone">
                <h4>LIÊN HỆ</h4>
                <p>Hotline: 1900 1768</p>
            </div>
            <div class="fanpage">
            	<h4>FANPAGE</h4>
                <div class="fb-page" data-href="https://www.facebook.com/thammyvienthienkhue/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/thammyvienthienkhue/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thammyvienthienkhue/">Hệ Thống Thẩm Mỹ Viện Thiên Khuê</a></blockquote></div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 col-sm-6">
            <?php echo do_shortcode('[contact-form-7 id="4" title="Mẫu đăng ký"]'); ?>
        </div>
    </div>
    
</div>
<div id="footer-under" class="text-center">
	(*) Kết quả tùy thuộc cơ địa của mỗi người
</div>