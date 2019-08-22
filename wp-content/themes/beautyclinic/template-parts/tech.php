<section class="tech">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 head text-center">
         <h3>Vì sao nên chọn thẩm mỹ viện thiên khuê</h3>
         <!-- <h4>Với Tầm Nhìn xây dựng hệ thống chuỗi sản phẩm và dịch vụ đằng cấp quốc tế, mang đến cho khách hàng cảm giác <br>thân thiện, tin tưởng và những trải nghiệm thú vị.</h4> -->
         <h4>Là hệ thống thẩm mỹ tiên phong về chuẩn hóa quy trình quản lý chất lượng dịch vụ - đạt chứng nhận quốc tế theo tiêu chuẩn ISO 9001:2015</h4>
      </div>
    </div> 
    <div class="row">  
        <div class="col-sm-12 doctor text-center">
            <div class="row">
             <?php
              $args = array(
              'post_type' => 'tech',
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
                  <div class="head">
                   <h3 class="title-hidden"><?php the_title(); ?></h3>
                   </div>
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