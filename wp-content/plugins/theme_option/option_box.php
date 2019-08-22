<?php function slider_box(){ ?>
<div class="slide-banner">
<!-- <div class="container-fluid"> -->
  
  <div id="myCarousel" class="carousel slide slider" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
     <div class="carousel-inner">
      <div class="item active">
        <a href="<?php echo esc_attr( get_option('link_images_slider1') ); ?>"><img src="<?php echo esc_attr( get_option('images_slider1') ); ?>" alt="may man" style="width:100%;"></a> 
      </div>
      <div class="item">
        <a href="<?php echo esc_attr( get_option('link_images_slider2') ); ?>"><img src="<?php echo esc_attr( get_option('images_slider2') ); ?>" alt="khuyen mai" style="width:100%;"></a>
      </div>
      <div class="item">
         <a href="<?php echo esc_attr( get_option('link_images_slider3') ); ?>"><img src="<?php echo esc_attr( get_option('images_slider3') ); ?>" alt="khuyen mai" style="width:100%;"></a>
      </div>
      <div class="item">
         <a href="<?php echo esc_attr( get_option('link_images_slider4') ); ?>"><img src="<?php echo esc_attr( get_option('images_slider4') ); ?>" alt="khuyen mai" style="width:100%;"></a>
      </div>   
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="fa fa-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="fa fa-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!-- </div> -->
</div>

<?php } ?>