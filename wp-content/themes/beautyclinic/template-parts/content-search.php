<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eleaning
 */
$id_post = get_the_ID();
  //$price = get_post_meta( $id, 'meta-unit-price', true );        
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'medium', false );
?>
<div class="col-md-12 col-sm-12">
  <article class="post mb-30">
    <!-- <div class="post-thumb">
      <img src="<?php //echo $src[0]; ?>" class="img-fullwidth" alt="">
    </div> -->
    <div class="post-description border-1px p-20">
      <a href="<?php the_permalink(); ?>"><h3 class="post-title font-weight-600 mt-0 mb-15"><?php the_title(); ?></h3></a>
      <p><?php the_excerpt_max_charlength(140); ?></p>
    </div>                
   <!--  <div class="post-meta">
      <ul class="list-inline pull-left flip">
        <li><i class="lnr lnr-users text-theme-colored2 font-20"></i><?php //the_author(); ?></li>
      </ul>
      <a href="<?php //the_permalink(); ?>" class="text-theme-colored2 font-14 text-gray-darkgray pull-right flip">Đọc thêm</a>
    </div> -->
  </article>
</div>

