<section class="gioi-thieu">
		<div class="snip">
			<figure class="snip2">
				<div class="des-video">
		    		<h3 class="font-r"><?php echo esc_attr( get_option('title_choose') ); ?></h3>
		    		<p class="font-m"><?php echo esc_attr( get_option('desc_choose1') ); ?></br> <?php echo esc_attr( get_option('desc_choose2') ); ?></p>
		  		</div>
				<div class="video">
					<img class="max-img" src="<?php echo esc_attr( get_option('images_choose') ); ?>" alt="">
					<a href="#post-popup1" class="open-video-link"><i class="fa fa-play-circle"></i></a>
				</div>
				
			</figure>
			<!-- End Modum -->
			<div id="post-popup1" class="post-popup popup-modal">
			  <span class="close"></span>
			  
			  <div class="popup-video">
			    <iframe width="560" height="315" src="<?php echo esc_attr( get_option('linkyoutube_choose') ); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			  </div>
			</div>
			<!-- End Video -->
			<figure class="snip2 lat">
				
             <?php
              $args = array(
              'post_type' => 'testimonial',
              'posts_per_page' => '4',
              'order' => 'asc'
              );                                                                           
              $team_query = new WP_Query($args);
              if ($team_query->have_posts()) {
              while ($team_query->have_posts()) {
                $team_query->the_post();  
                $id = get_the_ID();
                $src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );  
                $vote = get_post_meta( $id, 'testimonial-vote', true );
                ?>
              	<div class="latest">
					<div class="latest-img">
						<img class="max-img" src="<?php echo $src[0]; ?>" alt="">
					</div>
					<div class="latest-des">
						<div class="rating">
							<span class="stars"></span>
							<span class="votes"><?php echo $vote; ?> votes</span
						></div>
						<p class="font-r"><?php the_excerpt_max_charlength(350); ?></p>
					</div>
				</div>
               <?php 
                  }
              } else {

                  echo "nothing found";

              }
              /* Restore original Post Data */
              wp_reset_query();    ?>   
			</figure>

		</div>
	</section>