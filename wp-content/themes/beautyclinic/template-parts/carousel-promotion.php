<div class="for carousel-promotion">
<div class="container-fluid">
	<div class="row">
		<div class="row">
			<article class="col-sm-12 head-pro text-center">
				<h3>Chương trình khuyến mãi</h3>
				<h4>Mang đến cho khách hàng những trải nghiệm thú vị là sứ mệnh của Thiên Khuê</h4>
			</article>
		</div>
		<div class="col-xs-12 col-md-12 col-centered">
			<div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
				<div class="carousel-inner">
					 <?php $active="";		  
		           $team_query = new WP_Query( array(
					    'post_type' => 'post',
					    'posts_per_page' => '6',
					    'tax_query' => array(
					        array (
					            'taxonomy' => 'category',
					            'field' => 'slug',
					            'terms' => 'khuyen-mai',
					        )
					    ),
					));
		          $count = 0;
		         if ($team_query->have_posts()) {
		          while ($team_query->have_posts()) {
		            	$team_query->the_post();  
		            	$id = get_the_ID();
		            	//$idyoutube = get_post_meta( $id, 'id-youtube', true );
		            	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium', false );
						if($count==0){ $active="active"; }else { $active="";} 
			           	?>
		           		 <div class="item <?php echo $active; ?> desc-thumb">
							      <div class="carousel-col">
									<article class="col-sm-12 col-xs-12 desc-pro-gen text-left">
										<!-- <div class="row"> -->
											<div class="desc-pro">
												<div class="thumb-nail">
													<a class="news" href="<?php the_permalink(); ?>"><img class="haft" src="<?php echo $thumbnail[0]; ?>"></a>
												</div>
												<div class="desc-mask">
													<div class="mask">
														<h3 class="title-max"><?php the_title(); ?></h3>
														<p><?php the_excerpt_max_charlength(80); ?></p>
														<a href="<?php the_permalink(); ?>" class="btn btn-default btn-more-post">Xem thêm</a>
													</div>
												</div>
											</div>
										<!-- </div> -->
									</article>
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

					<a href="#carousel" role="button" data-slide="prev">

						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

						<span class="sr-only">Previous</span>

					</a>

				</div>

				<div class="right carousel-control">

					<a href="#carousel" role="button" data-slide="next">

						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

						<span class="sr-only">Next</span>

					</a>

				</div>

			</div>



		</div>

	</div>

</div>
