<?php function box_link(){ 
?>
<div id="box-link" class="box-link" style="display:none">
<ul>
<li><a href="<?php echo esc_attr( get_option('box-facebook') ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="<?php echo esc_attr( get_option('box-youtube') ); ?>"><i class="fa fa-youtube-play"></i></a></li>
<li><a href="tel:<?php echo esc_attr( get_option('box-phone') ); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
<li><a class="consultant" href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a></li>
</ul>
</div>
<?php } ?>