<!-- showcase start -->
<div class="home-video">
	<div class="container-fuild">
	<!--[if lt IE 9]>
	<script>
	document.createElement('video');
	</script>
	<![endif]-->
	<div id="video-container" class="video-container">

	  <!-- <video id="video-bg" preload controls playsinline> -->
	  <video id="video-bg" controls playsinline>
	     <source src="<?php bloginfo('template_directory');?>/video/tuanlevang4.mp4" type="video/mp4" />
	  </video> 

	  <div class="mask"> 

	    <div class="poster hidden" style="display: none">

	      <img src="<?php bloginfo('template_directory');?>/video/images/background-video.jpg" alt="">

	    </div>

	  </div>

	  <div class="desc">

	  	<div class="bnt-center">

	  	 <p><button id='play-pause-button' class='play' title='play' onclick='togglePlayPause(this);'><img class="play" src="<?php bloginfo('template_directory');?>/video/images/play.png"></button></p>

	    </div> 

	  </div>

	</div>

	</div>

</div>