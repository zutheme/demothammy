
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
        <img src="<?php echo esc_attr( get_option('slider-1') ); ?>" alt="may man" style="width:100%;"> 
      </div>
      <div class="item">
        <img src="<?php echo esc_attr( get_option('slider-2') ); ?>" alt="sinh nhat" style="width:100%;">
      </div>
      <div class="item">
        <img src="<?php echo esc_attr( get_option('slider-3') ); ?>" alt="sinh nhat" style="width:100%;">
      </div>
      <div class="item">
        <img src="<?php echo esc_attr( get_option('slider-4') ); ?>" alt="deal hot" style="width:100%;">
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
