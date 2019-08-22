<div class="vertical-menu">

	<nav class="navbar navbar-inverse navbar-vertical">

			<?php

               wp_nav_menu( array(

                    'theme_location'    => 'menu-custom',

                    'depth'             => 4,

                    'container'         => 'div',

                    'container_class'   => 'collapse navbar-collapse',

                    'container_id'      => 'navbar2',

                    'menu_class'        => 'nav navbar-nav',

                    'fallback_cb'       => 'wp_bootstrap_navwalker_page::fallback_page',

                    'walker'            => new wp_bootstrap_navwalker_page(),

                ) );

              ?> 

	</nav>

</div>