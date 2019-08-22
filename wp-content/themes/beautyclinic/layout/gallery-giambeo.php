<div class="col-12">

	<div class="title-vi">

		<h2 class="font-r">Giảm béo</h2>

	</div>

    <div class="resCarousel" data-items="1-2-3-3" data-slide="3" data-speed="900" data-animator="lazy">

        <div class="resCarousel-inner">		

		 <?php $active="";		  

           $team_query = new WP_Query( array(

			    'post_type' => 'post',

			    'posts_per_page' => '6',

			    'tax_query' => array(

			        array (

			            'taxonomy' => 'category',

			            'field' => 'slug',

			            'terms' => 'giam-beo-cau-chuyen',

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

		                            <img class="box-vi max-img" src="<?php echo $_thumbnail; ?>" alt="">

		                            <a href="#gb-post-popup1-<?php echo $id; ?>" class="open-galleryimg-link"><i class="fa fa-search-plus"></i></a>

		                        </div>

		                    </div>

		                    <div id="gb-post-popup1-<?php echo $id; ?>" class="post-popup popup-modal">

							  <span class="close"></span>

							  

							   <div class="popup-galleryimg">
							  	<div class="thubm">
							    	<img class="img-gallery" src="<?php echo $_thumbnail; ?>">
								</div>
								<div class="desc">
									<?php $content = get_the_excerpt_max(600); 
									//$out = strip_tags($content);
									//$myArray = explode(':', $content);								
									?>
									<!-- <span><?php //echo $myArray[0]; ?>:</span> -->
							    	<p><?php echo $content; ?></p>
								</div>
							    <div class="title-page-vi">

							    	<p><a href="<?php the_permalink(); ?>" class="font-m"><?php the_title(); ?></a></p>

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