<div class="guest">
	<div class="container">
		<div class="row">
		 
          <div class="owl-carousel">
		    	 <?php
                      $args = array(
                      'post_type' => 'testimonial',
                      'posts_per_page' => '6',
                      'order' => 'asc'
                      );                                                                           
                      $list=array();
                      $team_query = new WP_Query($args);
                      if ($team_query->have_posts()) {
                      while ($team_query->have_posts()) {
                        $team_query->the_post();  
                        $id = get_the_ID();
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                        //$position = get_post_meta( get_the_ID(), 'meta-position', true );
                        $excert = get_the_excerpt_max(500);
                        $title = get_the_title($id);
                        $ditem = array();
                        $_src = $src[0];
                        $ditem['src'] = $_src;
                        $ditem['title'] = $title;
                        $ditem['excert'] = $excert;
                        $list[] = $ditem;
                        
                        ?>
                        <div><img class="img-cir" src="<?php echo $_src ?>" alt=""></div> 
                       <?php 
                          }
                      } else {
                          echo "nothing found";
                      }
                      /* Restore original Post Data */
                      wp_reset_query();   ?>  
		      </div>
		    </div>
		  </div>
		</div>
		 <div id="myguest" class="carousel slide" data-interval="false">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
		  	<?php 
        $count = 0;
		  		foreach($list as $item) { 
            if($count == 0){
                $active ="active";
              }else {
                $active ="";
              }
              $count++;?>
		  		    <div class="item <?php echo $active; ?>">
                    <blockquote>
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="bot-client"><h5><?php echo $item['title']; ?></h5></div>
                                <p><?php echo $item['excert']; ?></p>                             
                            </div>

                        </div>

                    </blockquote>
                </div>
		  	<?php } ?>
		  </div>
	</div>
</div>