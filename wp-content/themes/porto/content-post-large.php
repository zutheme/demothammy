<?php
global $porto_settings;

$post_layout = 'large';

$show_date = in_array('date', $porto_settings['post-metas']);
$show_format = $porto_settings['post-format'] && get_post_format();
$post_class = array();
$post_class[] = 'post post-' . $post_layout;
if (!($show_date || $show_format))
    $post_class[] = 'hide-post-date';
?>

<article <?php post_class($post_class); ?>>

    <?php // Post Slideshow ?>
    <?php //get_template_part('slideshow', 'large'); ?>

    <?php if (($show_date || $show_format) && 0) : ?>
        <div class="post-date">
            <?php
            porto_post_date();
            porto_post_format();
            ?>
        </div>
    <?php endif; ?>

    <div class="post-content">

        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php porto_render_rich_snippets( false ); ?>
        <?php if(0){ ?>
        <div class="post-meta">
            <?php if (in_array('author', $porto_settings['post-metas'])) : ?><span><i class="fa fa-user"></i> <?php echo __('By', 'porto'); ?> <?php the_author_posts_link(); ?></span><?php endif; ?>
            <?php
            $cats_list = get_the_category_list(', ');
            if ($cats_list && in_array('cats', $porto_settings['post-metas'])) : ?>
                <span><i class="fa fa-folder-open"></i> <?php echo $cats_list ?></span>
            <?php endif; ?>
            <?php
            $tags_list = get_the_tag_list('', ', ');
            //var_dump($tags_list);
            if ($tags_list && in_array('tags', $porto_settings['post-metas'])) : ?>
                <span><i class="fa fa-tag"></i> <?php echo $tags_list ?></span>
            <?php endif; ?>
            <?php if (in_array('comments', $porto_settings['post-metas'])) : ?><span><i class="fa fa-comments"></i> <?php comments_popup_link(__('0 Comments', 'porto'), __('1 Comment', 'porto'), '% '.__('Comments', 'porto')); ?></span><?php endif; ?>
            <?php
            if (function_exists('Post_Views_Counter') && Post_Views_Counter()->options['display']['position'] == 'manual') {
                $post_count = do_shortcode('[post-views]');
                if ($post_count) {
                    echo $post_count;
                }
            }
            ?>
        </div>
        <?php } ?>
        <div class="entry-content">
            <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'porto' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'porto' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
        </div>

    </div>

    <div class="post-gap"></div>

    

</article>