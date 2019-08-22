<div class="promotion">

	<div class="container">

		<div class="row">

			<article class="col-sm-12 head-pro text-center">

				<h3>Tin tức</h3>

			</article>

		</div>

		<div class="row">
			 <?php
              
              $args = array(
              /*'category_name'  => 'khuyen-mai',*/
              'post_type' => 'post',
              'posts_per_page' => '1'
              );                                                                           
              $team_query = new WP_Query($args);
             if ($team_query->have_posts()) {
              		while ($team_query->have_posts()) {
	                $team_query->the_post();  
	                $id = get_the_ID();
	                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium', false );
	                $title = get_the_title($id);
		                 if(!$thumbnail){
		                  $_thumbnail = no_thumbnail;
		                }else{
		                  $_thumbnail = $thumbnail[0];
		                } ?>
		           		<article class="col-sm-6 desc-pro-gen text-left">
							<!-- <div class="row"> -->
								<div class="desc-pro">
									<div class="thumb-nail">
										<a class="news" href="<?php the_permalink(); ?>"><img class="haft" src="<?php echo $_thumbnail; ?>"></a>
									</div>
									<div class="desc-mask">
										<div class="mask">
											<h3><?php the_title(); ?></h3>
											<p><?php the_excerpt_max_charlength(185); ?></p>
											<a href="<?php the_permalink(); ?>" class="btn btn-default btn-more-post">Xem thêm</a>
										</div>
									</div>
								</div>
							<!-- </div> -->
						</article>
						<?php
						} //end while
              } else {
                  echo "nothing found";
              }
              /* Restore original Post Data */
              wp_reset_query();    ?> 
		</div>

		

	</div>

</div>