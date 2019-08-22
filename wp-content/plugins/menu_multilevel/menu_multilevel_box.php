<?php
 function menu_multilevel_box() { ?>
<div class="cssmenu-main">
  <a  href="<?php echo esc_url(home_url('/')); ?>"><img class="logo-plug" src="<?php echo plugin_dir_url(__FILE__) .'images/logo-kovibe.png'; ?>"></a>
 	<div id='cssmenu' class="custom-nav">
     <?php
        wp_nav_menu( array(
          'theme_location'    => 'menu-1',
          'depth'             => 4,
          //'container'         => false,
          'container'         => '',
          'container_class'   => '',
          'container_id'      => '',
          'menu_class'        => '',
          //'walker'            => new WP_Bootstrap_Navwalker_Page(),
      ) );
    ?> 
  </div>
</div>                
<?php } ?>