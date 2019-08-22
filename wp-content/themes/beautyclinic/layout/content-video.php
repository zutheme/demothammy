<?php 
	$id_post = get_the_ID();
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'full', false );
  $youtube = get_post_meta( $id_post , 'id-youtube', true );
  //$idyoutube = $youtube['idyoutube'][0];

   if(!$thumbnail){
     $rand = rand(0,4);
    $_thumbnail = get_template_directory()."/img/no-thumbnail".$rand.".jpg";
  }else{
    $_thumbnail = $thumbnail[0];
  }
?>
<div class="item">
    <div class="snip-vi">
        <div class="video">
            <img class="box-vi max-img" src="<?php echo $_thumbnail; ?>" alt="">
            <a href="#post-popup1-<?php echo $id_post; ?>" class="open-video-link"><i class="fa fa-play-circle"></i></a>
        </div>
    </div>
    <div id="post-popup1-<?php echo $id_post; ?>" class="post-popup popup-modal">
	  <span class="close"></span>
	  
	  <div class="popup-video">
	    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	    <div class="title-page-vi">
	    	<p class="font-m">Trẻ hóa da</p>
	    </div>
	  </div>
	</div>
</div>
		    