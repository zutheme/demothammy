<?php 
function box_social( $content ) {    
    if( is_single() ) {
      // Get current page URL 
          //$url = urlencode(get_permalink());
          $url = get_permalink();
          // Get current page title
          $socialTitle = str_replace( ' ', '%20', get_the_title());
          // Get Post Thumbnail for pinterest
          //$socialThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $id_post ), 'medium' );
          // Construct sharing URL without using any script
          $scriptsocial ="";
          $scriptsocial .="<div class=\"dzalo\"> <div class=\"fb-like\" data-href=\"".$url."\" data-layout=\"button_count\" data-action=\"like\" data-size=\"small\" data-show-faces=\"false\" data-share=\"true\"></div>";
          $scriptsocial .="<div class=\"zalo-share-button\" data-href=\"".$url."\" data-oaid=\"579745863508352884\" data-layout=\"1\" data-color=\"blue\" data-customize=false></div></div>";
      }
      return $content.$scriptsocial;
  } 
function script_dev(){ ?>
 <!-- <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=168231173842748&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script> -->
  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
<?php } ?>
  