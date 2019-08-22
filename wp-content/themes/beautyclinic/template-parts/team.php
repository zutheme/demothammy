<section class="team">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 head text-center">
         <h2>Đội ngũ cố vấn, bác sỹ và chuyên gia</h2>
         <h4>Chúng tôi lấy khách hàng làm trung tâm, đặt lợi ích khách hàng lên hàng đầu</h4>
      </div>
    </div>
    <div class="row">  
        <div class="col-sm-12 doctor text-center">
            <div class="row">
             <?php
              $args = array(
              'post_type' => 'doctor',
              'posts_per_page' => '4',
              'order' => 'asc'
              );                                                                           

              $team_query = new WP_Query($args);

              if ($team_query->have_posts()) {

              while ($team_query->have_posts()) {

                $team_query->the_post();  

                $id = get_the_ID();

                $src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );  

                $position = get_post_meta( get_the_ID(), 'meta-position', true );

                ?>

              <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">

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

               <?php 

                  }

              } else {

                  echo "nothing found";

              }

              /* Restore original Post Data */

              wp_reset_query();    ?>   

          </div>      

      </div>    

  </div>

</section>