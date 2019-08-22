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
  $idyoutube = get_post_meta( $id_post, 'id-youtube', true );
if ( is_single() ) :
  wpb_set_post_views($id_post);  
?>
<div class="blog-content">  
    <h1 class="post-title"><?php the_title(); ?></h1>
    <div class="post-content">
      <article id="video-container" class="video-desc">
            <div class="thumbnail-player">
              <div id="player"></div>           
            </div>
          </article> 
      <?php 
        echo "<script>var playlist = [];</script>";                
        if( isset($idyoutube) ) {
                echo "<script>".
                   "playlist.push('".$idyoutube."');".
                  "function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                  height: maxHeightvideo,
                  width: '100%',
                  playerVars: {
                    color:'white', 
                    rel:0,
                    playsinline:1,
                    //controls:0,
                    playlist: playlist.join(','),
                  },
                  events: {
                    'onReady': onPlayerReady
                  }
                });
              }</script>";
              echo "<script>function onPlayerReady(event) {
                  event.target.playVideo();
                  index_play = 0;
                }</script>";
            }
      ?>
      <?php the_content(); ?>    
    </div>
</div>
<?php else : ?>
  <!-- <article class="col-sm-3 col-xs-12 desc-thumb">
    <div class="video-mask">
      <a class="thumb" href="<?php //the_permalink(); ?>"><img src="https://img.youtube.com/vi/<?php //echo $idyoutube; ?>/0.jpg"></a>
      <div class="mask">
        <a href="<?php //the_permalink(); ?>" class="btn btn-default btn-video"><i class="fa fa-play" aria-hidden="true"></i></a>
      </div>
    </div>
    <div class="desc">
      <h2><a href="<?php //the_permalink(); ?>" class="title-video" ><?php //the_title(); ?></a></h2>
    </div>
  </article> -->
<section class="col-sm-3 col-xs-12 desc-thumb">
                      <!-- <div class="row"> -->                      
                  <div class="col-md-12 col-xs-12 video-mask">
                    <div class="row">
                      <a class="thumb" href="<?php the_permalink(); ?>"><img src="https://img.youtube.com/vi/<?php echo $idyoutube; ?>/0.jpg"></a>
                      <div class="mask">
                        <a href="<?php the_permalink(); ?>" class="btn btn-default btn-video"><i class="fa fa-play" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12 desc">
                    <!-- <div class="row"> -->
                      <h3 class="max-title"><a class="link-video link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <!-- </div> -->
                  </div>
                <!-- </div> -->
 </section>
<?php endif;?>         

