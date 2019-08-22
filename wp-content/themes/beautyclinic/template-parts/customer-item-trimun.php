<div class="for">

<div class="container">

	<div class="row">
		<div class="col-md-12 text-left"><h3 class="title-main">Trị mụn</h3></div>
		<div class="col-xs-12 col-md-12 col-centered">



			<div id="carousel3" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">

				<div class="carousel-inner">
					 <?php $active="";		  
		           $team_query = new WP_Query( array(
					    'post_type' => 'post',
					    'posts_per_page' => '6',
					    'tax_query' => array(
					        array (
					            'taxonomy' => 'category',
					            'field' => 'slug',
					            'terms' => 'cau-chuyen-mun',
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
						if($count==0){ $active="active"; }else { $active="";} 
			           	?>
		           		 <div class="item <?php echo $active; ?> desc-thumb">
							      <div class="carousel-col">
									<div class="img-responsive">
										<a class="thumb" href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>"></a>		
										<h3 class="max-title"><a class="link-video link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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

					<a href="#carousel3" role="button" data-slide="prev">

						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

						<span class="sr-only">Previous</span>

					</a>

				</div>

				<div class="right carousel-control">

					<a href="#carousel3" role="button" data-slide="next">

						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

						<span class="sr-only">Next</span>

					</a>

				</div>

			</div>



		</div>

	</div>

</div>
