<div class="video-bg">
	<div class="container">
		<!-- <div class="row">
			<div class="col-sm-12 vclient text-center">
				<h3 class="guest">Chia sẽ của khách hàng</h3>
			</div>
		</div> -->
		<div class="row">
		<?php
		  echo "<script>var playlist = [];</script>";
          $team_query = new WP_Query( array(
			    'post_type' => 'video',
			    'tax_query' => array(
			        array (
			            'taxonomy' => 'depart_video',
			            'field' => 'slug',
			            'terms' => 'quang-cao',
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
            if($count==0){
            	if( isset($idyoutube) ) {
	            	echo "<script>".
	            		 "playlist.push('".$idyoutube."');".
	            		"function onYouTubeIframeAPIReady() {
				        player = new YT.Player('player', {
				          height: maxHeightvideo,
				          width: '100%',
				          playerVars: {
				            color: 'white', 
				            rel: 0,
				            //controls:0,
				            playlist: playlist.join(','),
				          },
				          events: {
				            'onReady': onPlayerReady
				            //'onStateChange': onPlayerStateChange
				          }
				        });
				      }</script>";
				}
	           ?>
	           <div class="col-sm-9">
					<article id="video-container" class="video-desc">
						<div class="thumbnail-player">
							<div id="player"></div> 					
						</div>
					</article>
				</div>
				<div class="col-sm-3 list-video">
					<!-- <div class="row"> --> 	
			           <?php
			           }else { 
			           	echo "<script>".
	            		 "playlist.push('".$idyoutube."');</script>";
			           	?>
			           		<section class="desc-thumb">
			           			<div class="row">			           			
									<div class="col-md-6 col-xs-6 video-mask">
										<div class="row">
											<a class="thumb" href="#"><img src="https://img.youtube.com/vi/<?php echo $idyoutube; ?>/0.jpg"></a>
											<div class="mask">
												<a href="#<?php echo $count; ?>" class="btn btn-default btn-video"><i class="fa fa-play" aria-hidden="true"></i></a>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-xs-6 desc">
										<!-- <div class="row"> -->
											<h3 class="max-title"><a class="link-video link" href="#<?php echo $count; ?>"><?php the_title(); ?></a></h3>
											<a href="#<?php echo $count; ?>" class="btn btn-default btn-more-post link-video">Xem ngay</a>
										<!-- </div> -->
									</div>
								</div>
							</section>
			           		<?php }
			           		$count++; 
				              }//end while
				          } else {
				              echo "nothing found";
				          }//end if have post
				          wp_reset_query();  ?>
				<!-- </div> -->
		</div>
		</div>
	</div>

</div>

<!-- <script>

      

    </script> -->