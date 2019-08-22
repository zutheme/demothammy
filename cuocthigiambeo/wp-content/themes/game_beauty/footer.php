<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package game_beauty
 */

?>
		  <div class="dzalo"> <div class="fb-like" data-href="#" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
          <div class="zalo-share-button" data-href="#" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize=false></div></div>
	</div><!-- #content -->
</div><!-- #page -->
<!-- jQuery -->
<script src="<?php bloginfo('template_directory');?>/dashboard/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
<script src="<?php bloginfo('template_directory');?>/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php bloginfo('template_directory');?>/dashboard/vendors/moment/min/moment.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="<?php bloginfo('template_directory');?>/dashboard/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- <script type="text/javascript" src="<?php //bloginfo('template_directory');?>/js/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/custom.js?v=0.0.1"></script>
<script src="<?php bloginfo('template_directory');?>/js/zalo-messenger.js?v=0.0.4"></script> 
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#myDatepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });  
	}); 
    </script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.3'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="253439151750412"
  theme_color="#ffc300"
  logged_in_greeting="Chào anh/chị, Anh chị cần Thiên Khuê hỗ trợ như thế nào a!"
  logged_out_greeting="Chào anh/chị, Anh chị cần Thiên Khuê hỗ trợ như thế nào a!"
  greeting_dialog_display="hide"
  minimized="false" >
</div>
<!--end facebook -->
<!-- <div class="area-comment">
	<div class="comment">
		<div class="fb-comments" data-href="http://cuocthigiambeo.thammyvienthienkhue.vn/" data-width="" data-numposts="5"></div>
	</div>
</div> -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cdd0a8e2846b90c57aec118/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script type="text/javascript">
	setTimeout(function(){
		var x = document.getElementsByClassName("lp-watermart")[0];
		x.style.height = "0px";
	},3000);
</script>
<!--End of Tawk.to Script-->
<!--zalo-->
<div class="zalo-chat-widget" data-oaid="4513996301461367939" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<!--end zalo -->
<?php wp_footer(); ?>

</body>
</html>
