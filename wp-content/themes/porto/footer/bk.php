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
                    <a target="_blank" href="https://www.facebook.com/thammyvienthienkhue/"><i class="fa fa-facebook-square fa-4x" aria-hidden="true"></i></a>
                    </li>               
                    <li class="pull-left">
                        <a target="_blank" href="https://twitter.com/thienkhueclinic"><i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i></li>
                    <li class="pull-left">
                        <a target="_blank" href="https://www.instagram.com/thienkhueclinic/"><i class="fa fa-instagram fa-4x" aria-hidden="true"></i></a></li>
                    <li class="pull-left">
                        <a target="_blank" href="https://www.pinterest.com/thienkhueclinic/ PINTEREST"><i class="fa fa-pinterest-square fa-4x" aria-hidden="true"></i></a></li>
                </ul>
            </div>

            <div class="clearfix address">
            	<h4>THÔNG TIN LIÊN HỆ</h4>
            	<ul>
                	<li><b>TP. HCM</b><br>
                        <i>Số 7, Trần Quang Diệu, F14, Q3, Tp Hồ Chí Minh</i><br>
                        <a target="_blank" href="https://www.google.com/maps/place/10%C2%B047'14.4%22N+106%C2%B040'42.5%22E/@10.7865219,106.6783987,16.25z/data=!4m21!1m14!4m13!1m5!1m1!1s0x31752f2a5a314ed7:0x2a7f0689354e87db!2m2!1d106.678346!2d10.787226!1m6!1m2!1s0x31752f2a5a314ed7:0x2a7f0689354e87db!2zNyBUcuG6p24gUXVhbmcgRGnhu4d1LCBwaMaw4budbmcgMTMsIFF14bqtbiAzLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!2m2!1d106.678346!2d10.787226!3m5!1s0x0:0x0!7e2!8m2!3d10.787331!4d106.6784637">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Xem bản đồ</a></li>
                    <li><b>Bình Dương</b><br>
                        <i>Số 83, đường 30/4, Phường Phú Hòa, Tp Thủ Dầu Một</i><br>
                        <a target="_blank" href="https://www.google.com/maps/place/83+%C4%90%C6%B0%E1%BB%9Dng+30%2F4,+Ph%C3%BA+Th%E1%BB%8D,+TX.+Th%E1%BB%A7+D%E1%BA%A7u+M%E1%BB%99t,+B%C3%ACnh+D%C6%B0%C6%A1ng/@10.9768809,106.6698763,17z/data=!3m1!4b1!4m5!3m4!1s0x3174d1263c5a3ea3:0xfbf07aee5dcc45d0!8m2!3d10.9768809!4d106.672065">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Xem bản đồ</a></li>
                    <li><b>Đồng Nai</b><br>
                        <i>D2-D3/253, đường Phạm Văn Thuận, phường Tân Mai, Tp Biên Hòa</i><br>
                        <a target="_blank" href="https://www.google.com/maps/place/H%E1%BB%87+Th%E1%BB%91ng+Th%E1%BA%A9m+M%E1%BB%B9+Qu%E1%BB%91c+T%E1%BA%BF+Thi%C3%AAn+Khu%C3%AA/@10.9571942,106.8450012,15z/data=!4m5!3m4!1s0x0:0x23190ea75167f1!8m2!3d10.9571942!4d106.8450012">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Xem bản đồ</a></li>
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
            <div class="chuyenmuc">
                <?php if (is_active_sidebar( 'chuyen-muc' ))
                        dynamic_sidebar( 'chuyen-muc' );
                }?>
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