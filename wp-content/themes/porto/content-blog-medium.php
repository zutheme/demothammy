<?php

global $porto_settings;

$post_layout = 'medium';
 
 
//echo do_shortcode('[top_chuyen_muc]');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post post-' . $post_layout); ?>>

    <div class="row">
        <?php if (has_post_thumbnail()) : ?>
        <div class="col-sm-4">
            <?php // Post Slideshow ?>
            <?php get_template_part('slideshow', 'medium'); ?>
        </div>
        <div class="col-sm-8">
            <?php else : ?>
            <div class="col-sm-12">
                <?php endif; ?>

                <div class="post-content">

                    <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                    <?php
                    porto_render_rich_snippets( false );
                    if ($porto_settings['blog-excerpt']) {
                        echo porto_get_excerpt( $porto_settings['blog-excerpt-length'], false );
                    } else {
                        echo '<div class="entry-content">';
                        the_content();
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'porto' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'porto' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>

</article>