<?php  

if(!function_exists('getbanner_image')){
    function getbanner_image(){
        $arr_list = array('luyen-tap','doi-song','dinh-duong','kham-pha-ban-than','y-te-trong-tap-luyen','khong-phan-loai');
         $url_src = get_bloginfo('template_directory')."/images/banner/";
        $url_image = $url_src."luyen-tap.jpg";
          
    // Do not display on the homepage
    if ( !is_front_page() ) {
      
        if ( is_category() ) {
              $cat = get_category( get_query_var( 'cat' ) );
               $cat_slug = $cat->slug;
              //echo $cat_slug;
              if (in_array($cat_slug, $arr_list)) {
                   $url_image =  $url_src.$cat_slug.".jpg";
                }
        } 
        else if ( is_single()) { 
             // Get post category info
            $category = get_the_category();
            if(!empty($category)) {           
                // Get last category post is in
                $last_category = end(array_values($category));
                $cat = $last_category->slug;
                if (in_array($cat, $arr_list)) {
                   $url_image = $url_src.$cat.".jpg";
                }
            }
          
           }
            return $url_image;
        }
    }
}   

if(!function_exists('get_slug')){
    function get_slug(){
    // Do not display on the homepage
    if ( !is_front_page() ) {
        $cat_slug="";
        if ( is_category() ) {
              $cat = get_category( get_query_var( 'cat' ) );
               $cat_slug = $cat->slug;
        } 
        else if ( is_single()) { 
             // Get post category info
            $category = get_the_category();
            if(!empty($category)) {           
                // Get last category post is in
                $last_category = end(array_values($category));
                $cat_slug = $last_category->slug;     
            }
          
           }
            return $cat_slug;
        }
    }
}   

 ?>