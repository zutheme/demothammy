<div class="blog">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
             <?php
              $count = 0;
              $args = array(
              'category_name'  => 'khuyen-mai',
              'post_type' => 'post',
              'posts_per_page' => '4'
              );                                                                           
              $team_query = new WP_Query($args);
             if ($team_query->have_posts()) {
              while ($team_query->have_posts()) {
                $team_query->the_post();  
                $id = get_the_ID();
                //$src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium', false );
                //$price = get_post_meta( $id, 'meta-unit-price', true );
                $title = get_the_title($id);
	                // if(!$src){
	                //   $_src = no_thumbnail;
	                // }else{
	                //   $_src = $src[0];
	                // }
	                 if(!$thumbnail){
	                  $_thumbnail = no_thumbnail;
	                }else{
	                  $_thumbnail = $thumbnail[0];
	                }
		                if($count == 0){ ?>
							<div class="row">
								<div class="col-sm-12 text-center">
									<a class="max-hidden" href="<?php the_permalink(); ?>"><img src="<?php echo $_thumbnail; ?>"></a>
									<div class="desc text-left">
										<h3><a class="title-hidden" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p><?php the_excerpt(); ?></p>
									</div>
								</div>
							</div>
		               <?php 
						} else { ?>
							<div class="row">
							<div class="col-sm-12 thumb-desc">
								<div class="row">
									<div class="col-sm-4 col-xs-4">
										<a class="thumb-hidden" href="<?php the_permalink(); ?>"><img src="<?php echo $_thumbnail; ?>"></a>
									</div>
									<div class="col-sm-8 col-xs-8 text-left">
										<div class="row">
											<h3><a class="title-hidden" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }
						$count++;
					}//end while
              } else {
                  echo "nothing found";
              }
              /* Restore original Post Data */
              wp_reset_query();    ?> 
			
			</div>
			<div class="col-sm-4">
             <?php
              $count = 0;
              $args = array(
              'category_name'  => 'tin-tuc-lam-dep',
              'post_type' => 'post',
              'posts_per_page' => '4'
              );                                                                           
              $team_query = new WP_Query($args);
             if ($team_query->have_posts()) {
              while ($team_query->have_posts()) {
                $team_query->the_post();  
                $id = get_the_ID();
                //$src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium', false );
                //$price = get_post_meta( $id, 'meta-unit-price', true );
                $title = get_the_title($id);
	                // if(!$src){
	                //   $_src = no_thumbnail;
	                // }else{
	                //   $_src = $src[0];
	                // }
	                 if(!$thumbnail){
	                  $_thumbnail = no_thumbnail;
	                }else{
	                  $_thumbnail = $thumbnail[0];
	                }
		                if($count == 0){ ?>
							<div class="row">
								<div class="col-sm-12 text-center">
									<a class="max-hidden" href="<?php the_permalink(); ?>"><img src="<?php echo $_thumbnail; ?>"></a>
									<div class="desc text-left">
										<h3><a class="title-hidden" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p><?php the_excerpt(); ?></p>
									</div>
								</div>
							</div>
		               <?php 
						} else { ?>
							<div class="row">
							<div class="col-sm-12 thumb-desc">
								<div class="row">
									<div class="col-sm-4 col-xs-4">
										<a class="thumb-hidden" href="<?php the_permalink(); ?>"><img src="<?php echo $_thumbnail; ?>"></a>
									</div>
									<div class="col-sm-8 col-xs-8 text-left">
										<div class="row">
											<h3><a class="title-hidden" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }
						$count++;
					}//end while
              } else {
                  echo "nothing found";
              }
              /* Restore original Post Data */
              wp_reset_query();    ?> 
			
			</div>
			<div class="col-sm-4">
             <?php
              $count = 0;
              $args = array(
              'category_name'  => 'nguoi-noi-tieng-lam-dep',
              'post_type' => 'post',
              'posts_per_page' => '4'
              );                                                                           
              $team_query = new WP_Query($args);
             if ($team_query->have_posts()) {
              while ($team_query->have_posts()) {
                $team_query->the_post();  
                $id = get_the_ID();
                //$src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium', false );
                //$price = get_post_meta( $id, 'meta-unit-price', true );
                $title = get_the_title($id);
	                // if(!$src){
	                //   $_src = no_thumbnail;
	                // }else{
	                //   $_src = $src[0];
	                // }
	                 if(!$thumbnail){
	                  $_thumbnail = no_thumbnail;
	                }else{
	                  $_thumbnail = $thumbnail[0];
	                }
		                if($count == 0){ ?>
							<div class="row">
								<div class="col-sm-12 text-center">
									<a class="max-hidden" href="<?php the_permalink(); ?>"><img src="<?php echo $_thumbnail; ?>"></a>
									<div class="desc text-left">
										<h3><a class="title-hidden" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p><?php the_excerpt(); ?></p>
									</div>
								</div>
							</div>
		               <?php 
						} else { ?>
							<div class="row">
							<div class="col-sm-12 thumb-desc">
								<div class="row">
									<div class="col-sm-4 col-xs-4">
										<a class="thumb-hidden" href="<?php the_permalink(); ?>"><img src="<?php echo $_thumbnail; ?>"></a>
									</div>
									<div class="col-sm-8 col-xs-8 text-left">
										<div class="row">
											<h3><a class="title-hidden" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }
						$count++;
					}//end while
              } else {
                  echo "nothing found";
              }
              /* Restore original Post Data */
              wp_reset_query();    ?> 
			
			</div>			
		</div>
	</div>
</div>
