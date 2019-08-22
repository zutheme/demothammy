<div class="video-bg">
	<div class="container">
		<div class="row">
			<!-- <div class="col-sm-12 head text-center">
				<h3 class="promo">Dịch vụ khuyến mãi</h3>
			</div> -->
		</div>
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
	           <div class="col-sm-12">
					<article id="video-container" class="video-desc">
						<div class="thumbnail-player">
							<div id="player"></div> 					
						</div>
					</article>
				</div>
				
	           <?php
		              }//end while
		          } else {
		              echo "nothing found";
		          }//end if have post
		          wp_reset_query();  ?>
			
		</div>
	</div>

</div>

<!-- <script>

      

    </script> -->