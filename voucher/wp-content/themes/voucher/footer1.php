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

 <button onclick="myFacebookLogin()">Login with Facebook</button>

  <div id="fb-auth" class="btn btn-default">fb-auth</div>

  <div id="user-info" class="btn btn-default">user-info</div>

  <img id="loader" style="display:none;" src="<?php bloginfo('template_directory');?>/images/ajax-loader.gif">

  <div id="debug"></div>

  <div id="other"></div>

  <button class="btn btn-default" onclick="fqlQuery()">query</button>

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

            function updateButton(response) {

                    button       =   document.getElementById('fb-auth');

                    userInfo     =   document.getElementById('user-info');

                    

                    if (response.authResponse) {

                        //user is already logged in and connected

                        FB.api('/me', function(info) {

                            login(response, info);

                        });

                        

                        button.onclick = function() {

                            FB.logout(function(response) {

                                logout(response);

                            });

                        };

                    } else {

                        //user is not connected to your app or logged out

                        button.innerHTML = 'Login';

                        button.onclick = function() {

                            showLoader(true);

                            FB.login(function(response) {

                                if (response.authResponse) {

                                    FB.api('/me', function(info) {

                                        login(response, info);

                                    });    

                                } else {

                                    //user cancelled login or did not grant authorization

                                    showLoader(false);

                                }

                            },  {scope: 'publish_actions'});  

                        }

                    }

                }

                

                // run once with current status and whenever the status changes

                FB.getLoginStatus(updateButton);

                FB.Event.subscribe('auth.statusChange', updateButton);

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

function myFacebookLogin() {

  FB.getLoginStatus(function(response) {

    //console.log(response);

    if (response.status === 'connected') {

      console.log('Logged in.');

    }

    else {

      FB.login();

    }

  });

  //FB.login(function(){}, {scope: 'publish_actions'});

  //FB.getLoginStatus(updateButton);

  //FB.Event.subscribe('auth.statusChange', updateButton);

}



 // run once with current status and whenever the status changes

  function login(response, info){

      if (response.authResponse) {

          var accessToken = response.authResponse.accessToken;

          //userInfo.innerHTML = '<img src="https://graph.facebook.com/' + info.id + '/picture">' + info.name

              //+ "<br /> Your Access Token: " + accessToken;

          userInfo.innerHTML = 'https://graph.facebook.com/' + info.id + '/email';

          button.innerHTML                               = 'Logout';

          showLoader(false);

          document.getElementById('other').style.display = "block";

      }

  }

   

  function logout(response){

      userInfo.innerHTML                             =   "";

      document.getElementById('debug').innerHTML     =   "";

      document.getElementById('other').style.display =   "none";

      showLoader(false);

  }

  function showLoader(status){

       if (status)

           document.getElementById('loader').style.display = 'block';

       else

           document.getElementById('loader').style.display = 'none';

   }



   function fqlQuery(){

        showLoader(true);

 

        FB.api('/me', function(response) {

            showLoader(false);

 

            //http://developers.facebook.com/docs/reference/fql/user/

            var query       =  FB.Data.query('select name, profile_url, sex, pic_small from user where uid={0}', response.id);

            query.wait(function(rows) {

                document.getElementById('debug').innerHTML =

                    'FQL Information: '+  "<br />" +

                    'Your name: '      +  rows[0].name                                                            + "<br />" +

                    'Your Sex: '       +  (rows[0].sex!= undefined ? rows[0].sex : "")                            + "<br />" +

                    'Your Profile: '   +  "<a href='" + rows[0].profile_url + "'>" + rows[0].profile_url + "</a>" + "<br />" +

                    '<img src="'       +  rows[0].pic_small + '" alt="" />' + "<br />";

            });

        });

    }



</script>



<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<?php wp_footer(); ?>

</body>

</html>

