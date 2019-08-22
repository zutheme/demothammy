<?php
/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package eleaning

 */
?>
<?php
  $id_post = get_the_ID();
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'medium', false );
   if(!$thumbnail){
     $rand = rand(0,4);
    $$_thumbnail = no_thumbnail_url."no-thumbnail".$rand.".jpg";
  }else{
    $_thumbnail = $thumbnail[0];
  }
if ( is_single() ) :
  wpb_set_post_views($id_post);  
?>
<div class="blog-content">  
    <!-- <h1 class="post-title"><?php the_title(); ?></h1> -->
    <div class="post-content">
      <?php the_content(); ?>    
    </div>
</div>
<?php else : ?>
  <div class="col-sm-12 col-xs-12 excerpt-thumb text-left">
    <div class="row">
        <div class="col-sm-4 col-xs-4 post-thumb">
          <div class="row">
            <a class="img-responsive" href="<?php the_permalink(); ?>"> <img src="<?php echo $_thumbnail; ?>" alt=""></a>
          </div>
        </div>
        <div class="col-sm-8 col-xs-8 post-description">
           <!-- <h2><a class="post-title title-hidden" href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h2> -->
            <p class="desc-hiddens"><?php the_excerpt_max_charlength(300); ?></p>
        </div>                
  </div>
</div>
<?php endif;?>         

