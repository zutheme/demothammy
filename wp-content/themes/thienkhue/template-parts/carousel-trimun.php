<div class="blog-video">
<div class="container">
<div class="row">
	<div class="col-md-12 text-left"><h3 class="title-main">ĐIỀU TRỊ MỤN</h3></div>
	<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel4">
		 <div class="carousel-inner">		
		 <?php $active="";		  
           $team_query = new WP_Query( array(
			    'post_type' => 'video',
			    'tax_query' => array(
			        array (
			            'taxonomy' => 'depart_video',
			            'field' => 'slug',
			            'terms' => 'video-dieu-tri-mun',
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
				      <!-- <div class="col-md-2 col-sm-6 col-xs-12"><a href="<?php //the_permalink(); ?>">
				      	<img src="https://img.youtube.com/vi/<?php //echo $idyoutube; ?>/0.jpg" class="img-responsive"></a>
				      	<h3><a href="<?php //the_permalink(); ?>"></a></h3>
				      </div> -->
				      <section class="col-md-2 col-sm-6 col-xs-12 desc-thumb">
			           			<!-- <div class="row"> -->			           			
									<div class="col-md-12 col-xs-12 video-mask">
										<div class="row">
											<a class="thumb" href="<?php the_permalink(); ?>"><img src="https://img.youtube.com/vi/<?php echo $idyoutube; ?>/0.jpg"></a>
											<div class="mask">
												<a href="<?php the_permalink(); ?>" class="btn btn-default btn-video"><i class="fa fa-play" aria-hidden="true"></i></a>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-xs-12 desc">
										<!-- <div class="row"> -->
											<h3 class="max-title"><a class="link-video link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<!-- </div> -->
									</div>
								<!-- </div> -->
							</section>
				    </div>
	           		<?php 
	           		$count++; 
		              }//end while
		          } else {
		              echo "nothing found";
		          }//end if have post
		          wp_reset_query();  ?>
				  </div>

				  <a class="left carousel-control" href="#myCarousel4" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>

				  <a class="right carousel-control" href="#myCarousel4" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>

	</div>
	</div>
</div>
</div>