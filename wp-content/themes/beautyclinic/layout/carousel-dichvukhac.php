<div class="col-12">
	<div class="title-vi">
		<h2 class="font-r">Dịch vụ</h2>
	</div>
    <div class="resCarousel" data-items="1-2-3-3" data-slide="3" data-speed="900" data-animator="lazy">
        <div class="resCarousel-inner">		
		 <?php $active="";		  
           $team_query = new WP_Query( array(
			    'post_type' => 'video',
			    'tax_query' => array(
			        array (
			            'taxonomy' => 'depart_video',
			            'field' => 'slug',
			            'terms' => 'dich-vu-khac',
			        )
			    ),
			));
          $count = 0;
         if ($team_query->have_posts()) {
          while ($team_query->have_posts()) {
            	$team_query->the_post();  
            	$id = get_the_ID();
            	$idyoutube = get_post_meta( $id, 'id-youtube', true );
            	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium', false );
            	if(!$thumbnail){
				     $rand = rand(0,4);
				    $_thumbnail = get_template_directory()."/img/no-thumbnail".$rand.".jpg";
				  }else{
				    $_thumbnail = $thumbnail[0];
				  }
				if($count==0){ $active="active"; }else { $active="";} 
	           	?>
	           		 <div class="item">
		                    <div class="snip-vi">
		                        <div class="video">
		                            <!-- <img class="box-vi max-img" src="<?php //echo $_thumbnail; ?>" alt=""> -->
		                            <img class="box-vi max-img" src="https://img.youtube.com/vi/<?php echo $idyoutube; ?>/0.jpg">
		                            <a href="#dv-post-popup1-<?php echo $id; ?>" class="open-video-link"><i class="fa fa-play-circle"></i></a>
		                        </div>
		                    </div>
		                    <div id="dv-post-popup1-<?php echo $id; ?>" class="post-popup popup-modal">
							  <span class="close"></span>
							  
							  <div class="popup-video">
							    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $idyoutube; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							    <div class="title-page-vi">
							    	<p class="font-m"><?php the_title(); ?></p>
							    </div>
							  </div>
							</div>
		                </div>
	           		<?php 
	           		$count++; 
		              }//end while
		          } else {
		              echo "nothing found";
		          }//end if have post
		          wp_reset_query();  ?>
	  </div>
        <button class='btn btn-default leftRs'><i class="fa fa-chevron-left"></i></button>
        <button class='btn btn-default rightRs'><i class="fa fa-chevron-right"></i></button>
    </div>
</div>