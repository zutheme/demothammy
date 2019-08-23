<section class="bang-gia">

		<div class="snip">

			<div class="col-12 top-b">

				<div class="title-gia">

					<p class="b-title font-d">Thiên Khuê</p>

					<p class="b-des font-r">Bảng Giá Dịch Vụ</p>

				</div>

				<div class="img-bang-gia">

					<img class="max-img" src="<?php bloginfo('template_directory');?>/img/banggia.png" alt="">

				</div>

				<div class="des-gia">

					<ul class="dotted-list">

					  <?php

					   $args = array(

		              'post_type' => 'product',

		              'posts_per_page' => '6',

		              'order' => 'asc'

		              );                                                                           

		              $team_query = new WP_Query($args);

		              if ($team_query->have_posts()) {

		              while ($team_query->have_posts()) {

		                $team_query->the_post();  

		                $id = get_the_ID();

		                $src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );  

		                $price = get_post_meta( $id, 'price', true );

		                ?>

		                <li><span class="font-w"><?php the_title(); ?></span><span><?php echo $price; ?></span></li>

		               <?php 

		                  }

		              } else {

 						echo "nothing found";

		              }

		              /* Restore original Post Data */

		              wp_reset_query();    ?>   

					</ul>

					<div class="button-gia">

						<a class="font-r" href="">Tìm Hiểu Thêm</a>

					</div>

				</div>

				<!-- End Bảng Giá -->

			</div>

		</div>

	</section>