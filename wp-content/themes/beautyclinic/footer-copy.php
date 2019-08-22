<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thienkhue
 */

?>
	<!--footer-->

	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 brand text-center">
					<a href="<?php echo esc_url(home_url('/')); ?>"><img class="logo-footer" src="<?php bloginfo('template_directory'); ?>/images/logo/logo-thienkhue.png"></a>
          <div class="desc">
    					<div class="trend"><h5>Hệ Thống được đánh giá chỉ số thương hiệu xuất sắc đẳng cấp Quốc Tế</h5></div>
              <h4><a href="tel:19001768">Hotline: 19001768</a></h4>
    					<ul class="social">
                <li class="pull-left">
                <a target="_blank" href="https://www.facebook.com/thammyvienthienkhue/"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                </li>               
                <li class="pull-left">
                    <a target="_blank" href="https://twitter.com/thienkhueclinic"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a></li><a target="_blank" href="https://twitter.com/thienkhueclinic">
                </a><li class="pull-left"><a target="_blank" href="https://twitter.com/thienkhueclinic">
                    </a><a target="_blank" href="https://www.instagram.com/thienkhueclinic/"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a></li>
                <li class="pull-left">
                    <!-- <a target="_blank" href="https://www.pinterest.com/thienkhueclinic/ PINTEREST"><i class="fa fa-pinterest-square fa-3x" aria-hidden="true"></i></a></li> -->
                    <a class="testscreen" href="#"><i class="fa fa-pinterest-square fa-3x" aria-hidden="true"></i></a></li>
                </ul>
            </div>
				</div>
				<div class="col-sm-4 foot text-left">
          <?php get_template_part( 'template-parts/address'); ?>
				</div>
        <div class="col-sm-4 foot text-left">
          <div class="fb-page"
          data-href="https://www.facebook.com/thammyvienthienkhue" 
          data-width="340"
          data-hide-cover="false"
          data-show-facepile="true"></div>
			</div>
     
		</div>
	</div>
	<!--end footer-->
	</div><!-- #content -->
</div><!-- #page -->
<!-- Modal -->
<div class="modal-form-player">
  <div class="modal fade" id="modal_player" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content reveal-modal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <!-- Your embedded video player code -->
           <!-- <div id="player"></div>  --> 
        </div>
        
      </div>
      
    </div>
  </div>
</div>
<!--end modal-->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--  <script type="text/javascript" src="<?php //bloginfo('template_directory');?>/js/custom.js?ver=0.0.1"></script> -->
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/global.js?ver=1.2.7"></script>
 <script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/youtube.js?ver=0.5.6"></script>
 <script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/custom.js?v=1.3.5"></script>
 <script src="<?php bloginfo('template_directory');?>/video/js/video.js?v=2.0.3"></script>
 <script src="<?php bloginfo('template_directory');?>/owlcarousel/dist/owl.carousel.min.js"></script>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->
 <script type="text/javascript">
  
//end check out
window.addEventListener("beforeunload", function (e) {
    var url = "http://donggiadichvu199k.thammyvienthienkhue.vn/";
    //var confirmationMessage = 'Important: Please click on \'Save\' button to leave this page.';
    //var confirmationMessage = "\o/ bạn muốn nhận chương trình khuyến mãi";
    //(e || window.event).returnValue = confirmationMessage; //Gecko + IE
    //return confirmationMessage;                            //Webkit, Safari, Chrome
    //window.open(url,'_blank');
    notifyMe();
  });
 //  var isOnIOS = navigator.userAgent.match(/iPad/i)|| navigator.userAgent.match(/iPhone/i);
	// var eventName = isOnIOS ? "pagehide" : "beforeunload";
	// window.addEventListener(eventName, function (event) { 
	// 	window.open(url,'_blank');
	// } );
  var ua = navigator.userAgent.toLowerCase();
  var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
  if(isAndroid) {
    // Do something!
    // Redirect to Android-site?
    //window.location = 'http://donggiadichvu199k.thammyvienthienkhue.vn';
  }
  //var iphone = ua.indexOf("iphone") >-1;
  //if (iphone){
    //window.location = 'http://donggiadichvu199k.thammyvienthienkhue.vn'; 
      //location.replace("http://donggiadichvu199k.thammyvienthienkhue.vn");
  //}
//end exit
// window.onbeforeunload = function (event) {
//     var message = 'Important: Please click on \'Save\' button to leave this page.';
//     if (typeof event == 'undefined') {
//         event = window.event;
//     }
//     if (event) {
//         event.returnValue = message;
//     }
//     return message;
// };
</script>

 <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b31d475d0b5a54796822c62/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBJJWW4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="253439151750412"
  theme_color="#ffc300"
  logged_in_greeting="Chào Anh/Chị! Chúng tôi rất vui nhận câu hỏi tư vấn!"
  logged_out_greeting="Chào Anh/Chị! Chúng tôi rất vui nhận câu hỏi tư vấn!">
</div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '168231173842748',
      xfbml      : true,
      version    : 'v2.6'
    });

    FB.Event.subscribe('messenger_checkbox', function(e) {
      console.log("messenger_checkbox event");
      console.log(e);
      
      if (e.event == 'rendered') {
        console.log("Plugin was rendered");
      } else if (e.event == 'checkbox') {
        var checkboxState = e.state;
        console.log("Checkbox state: " + checkboxState);
      } else if (e.event == 'not_you') {
        console.log("User clicked 'not you'");
      } else if (e.event == 'hidden') {
        console.log("Plugin was hidden");
      }
      
    });
    //FB.CustomerChat.showDialog();
    //FB.CustomerChat.show(shouldShowDialog: boolean);
  }; 
  </script>
<!-- Load Facebook SDK for JavaScript -->


<!-- <div class="fb-messengermessageus" 
  messenger_app_id="168231173842748" 
  page_id="253439151750412"
  color="blue"
  size="standard">
</div> -->
<!-- <div class="fb-messenger-checkbox"  
  origin="http://thammyvienthienkhue.vn"
  page_id="253439151750412"
  messenger_app_id="168231173842748"
  user_ref="1245"
  allow_login="true"
  size="standard"
  skin="light"
  center_align="true">
</div> -->
<!-- <div class="fb-messenger-checkbox"
     messenger_app_id="168231173842748"
     origin="http://thammyvienthienkhue.vn"
     page_id="253439151750412"
     prechecked="false"
     allow_login="true"
     user_ref="987456"
     size="small"></div> -->
<!-- <input type="button" onclick="confirmOptIn()" value="Confirm Opt-in"/> -->
<!-- harafunnel -->
<!-- <script src="//harafunnel.com/widget/253439151750412.js" async="async"></script> -->
<!-- <iframe src='http://code.mobiweblink.com/code/?key=1420f6b52b35461ebdb46e40ba36bdc0' style='display:none;' ></iframe> -->
<!-- <input type="button" onclick="confirmOptIn()" value="Confirm Opt-in"/> -->
<?php wp_footer(); ?>
</body>
</html>
