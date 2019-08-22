<?php

 function category_box() { ?> 

 	 <div class="widget">

      <h2 class="widget-title">Dịch vụ</h2>     

      <div class="menu-sidebar">                         

              <div class="menu-list">

                   <?php
                      wp_nav_menu( array(
                          'theme_location' => 'menu-custom',
                          'menu_id' => 'menu-custom',
                          'depth'      => 2,
                          'container'  => false,
                          'menu_class' => 'list-border',
                          'walker'     => new WPDocs_Walker_Nav_List())
                      );  ?>                                   

              </div>

      </div>             

    </div>	

<?php } ?>