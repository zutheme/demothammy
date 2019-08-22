<?php
  $id_post = get_the_ID();
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'full', false );
   if(!$thumbnail){
     $rand = rand(0,4);
     $template_dir = get_template_directory_uri(); 
    $_thumbnail =  $template_dir."/img/random/no-thumbnail".$rand.".jpg";
  }else{
    $_thumbnail = $thumbnail[0];
  } ?>
    <section class="page-view">
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
  </section>