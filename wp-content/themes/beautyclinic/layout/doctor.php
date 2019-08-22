<section class="doi-ngu">
		<div class="snip">
			<div class="col-12">
			<div class="title-dn">
				<p></p>		
				<p class="desc-dn">
					<span class="des-dn font-r">Đội Ngũ Bác Sĩ</span>
					<span><img src="<?php bloginfo('template_directory');?>/img/logo-icon-color-4.png" alt=""></span>
					<span class="dc-dn font-m">Chúng tôi lấy khách hàng làm trung tâm.</br> đặt lợi ích khách hàng lên hàng đầu</span>
				</p>
			</div>
		</div>
		</div>
		<div class="snip">
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
                $position = get_post_meta( $id, 'meta-position', true );
                ?>
                <figure class="snip1540">
				  <div class="profile-image"><img src="<?php echo $src[0]; ?>" alt="bác sĩ moon choi" />
				  </div>
				  <figcaption>
				    <h3><?php the_title(); ?></h3>
				    <h4><?php the_excerpt(); ?></h4>
				    <p><?php the_excerpt_max_charlength(150); ?></p>
				  </figcaption>
				</figure>
               <?php 
                  }
              } else {
					echo "nothing found";
              }
              /* Restore original Post Data */
              wp_reset_query();    ?>   
		</div>
</section>