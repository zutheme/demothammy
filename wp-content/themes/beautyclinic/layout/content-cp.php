<?php
  $id_post = get_the_ID();
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'full', false );
   if(!$thumbnail){
     $rand = rand(0,4);
    $_thumbnail = get_template_directory()."/img/no-thumbnail".$rand.".jpg";
  }else{
    $_thumbnail = $thumbnail[0];
  }
if ( is_single() ) :
  wpb_set_post_views($id_post);  
?>

    <div class="snip page-inner-title primary-bgcolor data-bg" style="background-image: url(<?php echo $_thumbnail; ?>)">
      <div class="snip4">
        <div class="title-page">
          <h1 class="font-r"><?php the_title(); ?></h1>
          <div class="breadcrumb">
            <?php custom_breadcrumbs();?>
          </div>
        </div>
      </div>
      <div class="inner-header-overlay"></div>
    </div>
    <div class="snip">
      <div class="snip4 back-page">
        <div class="content-page">
          <?php the_content(); ?> 
        </div>
      </div>
    </div>
 
<?php else : ?>
      <figure class="snip1197">
        <figcaption>
          <a  href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
          </a>
          <blockquote><?php the_excerpt_max_charlength(100); ?></blockquote>
          <div class="arrow"></div>
        </figcaption>
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo $_thumbnail; ?>" alt="<?php the_title(); ?>"/>
        </a>  
      </figure>
<?php endif;?>   