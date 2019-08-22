<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package voucher
 */

?>

<div class="col-sm-12 text-center">
  <p>Chia sẻ Hộp quà may mắn, nhận thêm ưu đãi 199k sử dụng các dịch vụ tại Thiên Khuê.</p>
  <a id="shareBtn" class="btn btn-success btn-share clearfix">Chia sẻ</a>
</div>

<!-- <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div> -->
</div>
<div class="bottom-footer">
 <button onclick="notifyMe()">Notify me!</button>
</div>
<script>
  var button;
  var userInfo;
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '168231173842748',
      xfbml      : true,
      version    : 'v3.0'
    });
    FB.AppEvents.logPageView();
            
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  document.getElementById('shareBtn').onclick = function() {
    FB.ui({
      method: 'share',
      display: 'popup',
      href: 'https://thammyvienthienkhue.vn/voucher',
    }, function(response){});
    
}
// Only works after `FB.init` is called
</script>
  <div class="col-sm-12">
    <a class="bnt btn-default" href="#" id="dnperm">Request permission</a>
    &nbsp;<a class="bnt btn-default" href="#" id="dntrigger">Trigger</a>
</div>
<script>
     var dnperm = document.getElementById("dnperm");
     var dntrigger = document.getElementById("dntrigger");
     dnperm.addEventListener('click',function(e){
        e.preventDefault();
        if(!window.Notification){
            alert("Sorry, Notification not support");
        }else{
            Notification.requestPermission(function(p){
                if(p === 'denied'){
                    alert("You have denied Notification");
                }else if(p === 'granted'){
                    alert("You have granted Notification");
                }
            });
        }
     });
     //trigger
     dntrigger.addEventListener('click',function(e){
        var notify;
        e.preventDefault();
        if(Notification.permission === 'default'){
            alert("Please allow enable Notification before doing this");
        }else{
            notify = new Notification("new message",{
                body : 'how are you ?',
                icon : 'http://localhost/thammyvn/wp-content/themes/porto/images/logo/logo-3.png',
                tag : '123456'
            });
            notify.onclick = function(){
                window.location = "?tag="+this.tag;
            };
        }
     });
    // https://example.com/serviceworker.js
   if (!('serviceWorker' in navigator)) {
      // Service Worker isn't supported on this browser, disable or hide UI.
      return;
    }

    if (!('PushManager' in window)) {
      // Push isn't supported on this browser, disable or hide UI.
      return;
    }
</script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/notify.js"></script>
<?php wp_footer(); ?>
</body>
</html>
