<div class="for team">
<div class="container">
	<div class="row">
		<div class="row">
      <div class="col-sm-12 head text-center">
         <h2>Đội ngũ cố vấn, bác sỹ và chuyên gia</h2>
         <h4>Chúng tôi lấy khách hàng làm trung tâm, đặt lợi ích khách hàng lên hàng đầu</h4>
      </div>
    </div>
		<div class="col-xs-12 col-md-12 col-centered">
			<div id="carousel-team" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">

				<div class="carousel-inner">
					 <?php $active="";		  
		           $team_query = new WP_Query( array(
					    'post_type' => 'doctor',
					    'posts_per_page' => '6',
					    // 'tax_query' => array(
					    //     array (
					    //         'taxonomy' => 'category',
					    //         'field' => 'slug',
					    //         'terms' => 'cau-chuyen',
					    //     )
					    //),
					));
		          $count = 0;
		         if ($team_query->have_posts()) {
		          while ($team_query->have_posts()) {
		            	$team_query->the_post();  
		                $id = get_the_ID();
		                $src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );  
		                $position = get_post_meta( get_the_ID(), 'meta-position', true );
						if($count==0){ $active="active"; }else { $active="";} 
			           	?>
		           		 <div class="item <?php echo $active; ?> desc-thumb">
							      <div class="carousel-col">
									 <div class="profile">
							              <div class="img-box">
							                <img src="<?php echo $src[0]; ?>" class="img-responsive">
							                <ul class="text-left">
							                  <?php //the_excerpt_max_charlength(300); ?>
							                </ul>
							                <div class="mask-doctor">
							                   <h3><?php the_title(); ?></h3>
							                   <h4><?php the_excerpt(); ?>
							                   <p><?php the_excerpt_max_charlength(350); ?></p>
							                </div>
							              </div>
							              <!-- <div class="position"> -->
							                <!-- <h4><?php //the_excerpt(); ?></h4> -->
							              <!-- </div> -->						              
							              <?php //the_excerpt(); ?>
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
				</div>
				<!-- Controls -->
				<div class="left carousel-control">
					<a href="#carousel-team" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>			
				</div>
				<div class="right carousel-control">

					<a href="#carousel-team" role="button" data-slide="next">

						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

						<span class="sr-only">Next</span>

					</a>

				</div>

			</div>



		</div>

	</div>

</div>
