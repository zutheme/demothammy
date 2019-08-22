<?php
 function latest_box() { ?> 
 	 <div class="widget news">
                <h2 class="widget-title">Tin tức</h2>
                <div class="latest-posts">
                  <?php
                        $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => '2'
                        );                                                                           
                        $team_query = new WP_Query($args);
                       if ($team_query->have_posts()) {
                        while ($team_query->have_posts()) {
                          $team_query->the_post();  
                          $id = get_the_ID();
                          $src = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false );
                           if(!$src){
                              //$_src = no_thumbnail;
                              $rand = rand(0,4);
                              $_src = no_thumbnail_url."no-thumbnail".$rand.".jpg";
                            }else{
                              $_src = $src[0];
                            }
                          $title = get_the_title($id);
                         ?>
                         <div class="row thumb-expert">
                           <div class="col-sm-12 col-xs-12 desc text-left">
                              <div class="row"> 
                                <a class="thumb-desc" href="<?php the_permalink(); ?>"><img src="<?php echo $_src; ?>" alt=""></a>
                                <p><h3 class="title-desc hidden-excerpt"><a class="first" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p>
                              </div>
                            </div>
                          </div>
                         <?php  }
                        } else {
                            echo "nothing found";
                        }
                        /* Restore original Post Data */
                        wp_reset_query();    ?> 
                </div>
              </div> 		
<?php } ?>