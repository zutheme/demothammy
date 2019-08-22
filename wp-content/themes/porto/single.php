<?php get_header() ?>

<?php
global $porto_settings, $porto_layout;

wp_reset_postdata();
?>
<div id="content" role="main">

    <?php if (have_posts()) : the_post();
        $post_layout = get_post_meta($post->ID, 'post_layout', true);
        $post_layout = ($post_layout == 'default' || !$post_layout) ? $porto_settings['post-content-layout'] : $post_layout;
        //var_dump($post_layout);
        ?>

        <?php get_template_part('content', 'post-' . $post_layout); ?>

        <hr class="tall"/>

        <?php
        
        echo '<div id = "dky-tu-van-mien-phi">';
        echo do_shortcode('[contact-form-7 id="157" title="Đăng ký tư vấn miễn phí"]');
        echo '</div>';
        
        
        if ($porto_settings['post-related']) :
            $related_posts = porto_get_related_posts($post->ID);
            
            if ($related_posts->have_posts()) : 
                
            ?>
                <div class="related-posts">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="sub-title-wrapper clearfix">
                                <h4 class="sub-title">TIN LIÊN QUAN</h4>
                            </div>
                             <div class="clearfix">
                                <?php
                                $count = 0;
                                while ($related_posts->have_posts() && $count < 3) {
                                    $count++;
                                    $related_posts->the_post();
                                    get_template_part('content', 'post-item');
                                }
                                ?>
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="sub-title-wrapper clearfix">
                                <h4 class="sub-title">TIN ĐẶC BIỆT</h4>
                            </div>
                             <div class="clearfix">
                                <?php
                                $count = 0;
                                while ($related_posts->have_posts() && $count < 3) {
                                    $count++;
                                    $related_posts->the_post();
                                    get_template_part('content', 'post-item');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                
            endif;
        endif;
    endif; ?>
</div>
<?php get_footer() ?>