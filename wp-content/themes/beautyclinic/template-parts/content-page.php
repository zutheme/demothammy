<?php

/**

 * Template part for displaying page content in page.php

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package eleaning

 */



?>

<?php

$id_post = get_the_ID();
  //$price = get_post_meta( $id, 'meta-unit-price', true );        
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'full', false );
?>

<div class="blog-posts">               
   <!--  <h3 class="post-title"><?php //the_title(); ?></h3> -->
    <div class="entry-content">

      <?php the_content(); ?>

      <?php 

      // Get current page URL 

          $crunchifyURL = urlencode(get_permalink());

       

          // Get current page title

          $crunchifyTitle = str_replace( ' ', '%20', get_the_title());

          

          // Get Post Thumbnail for pinterest

          //$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $id_post ), 'medium' );

       

          // Construct sharing URL without using any script

          //$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';

          //$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;

          //$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;

          //$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;

          //$whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;

          //$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;

       

          // Based on popular demand added Pinterest too

          //$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;

      ?>

      <!-- <div class="col-sm-12">

        <ul class="styled-icons icon-circled m-0">

          <li><a target="_blank" href="<?php //echo $facebookURL; ?>" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>

          <li><a target="_blank" href="<?php //echo $twitterURL; ?>" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>

          <li><a target="_blank" href="<?php //echo $googleURL; ?>" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>

        </ul>

      </div> -->

    </div>
</div>

 

      



