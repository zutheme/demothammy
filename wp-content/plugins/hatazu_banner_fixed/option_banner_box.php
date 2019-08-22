<?php
 function banner_box() { ?> 
 <div class="compare"></div>
 <div id="htz_image_banner" class="htz_image_banner">
  <a href="<?php echo esc_attr( get_option('banner-link') ); ?>"><img class="thumb" src="<?php echo esc_attr( get_option('banner-image') ); ?>"></a>
</div>            
<?php } ?>