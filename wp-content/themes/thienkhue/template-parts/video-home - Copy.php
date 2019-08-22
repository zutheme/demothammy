<!-- showcase start -->
<div class="home-video">
	<div class="container-fuild">
	<!--[if lt IE 9]>
	<script>
	document.createElement('video');
	</script>
	<![endif]-->
	<div id="video-container" class="video-container">
	  <video muted id="video-bg" preload controls playsinline>
	     <source src="<?php bloginfo('template_directory');?>/video/video-bg.mp4" type="video/mp4" />
	  </video> 
	  <div class="mask"> 
	    <div class="poster hidden" style="display: none">
	      <img src="<?php bloginfo('template_directory');?>/video/images/background-video.jpg" alt="">
	    </div>
	  </div>
	  <div class="desc">
	  	<div class="v-logo">
	  		<a href="<?php echo esc_url(home_url('/')); ?>"><img class="vlogo-img" src="<?php bloginfo('template_directory');?>/images/logo/logo-thienkhue.png"></a>
	  		<h3 class="thammy">Thẩm mỹ viện quốc tế</h3>
	  		<h2 class="thienkhue">Thiên khuê</h2>
	  		<h4 class="khangdinh">Khẳng định giá trị thực</h4>
	  	</div>
	  	<div class="sub-title">
	  		<h1 class="cuocthi">Cuộc thi ảnh đẹp thiên khuê</h1>
	  		<h3 class="chiase">Chia sẻ khoảnh khắc rinh ngay giải thưởng</h3>
	  	</div>
	  	<div class="bnt-center">
	  	 <p><button id='play-pause-button' class='play' title='play' onclick='togglePlayPause(this);'><img class="play" src="<?php bloginfo('template_directory');?>/video/images/play.png"></button></p>
	    </div> 
	  </div>
	</div>
	</div>
</div>