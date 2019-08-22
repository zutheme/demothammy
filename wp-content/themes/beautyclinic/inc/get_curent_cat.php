<?php  

if(!function_exists('get_curent_slug')){
    function get_curent_slug(){
    // Do not display on the homepage
    if ( !is_front_page() ) {
        $cat_name="";
        if ( is_category() ) {
              $cat = get_category( get_query_var( 'cat' ) );
               $cat_slug = $cat->slug;
              //echo $cat_slug;
            
        } 
        else if ( is_single()) { 
             // Get post category info
            $category = get_the_category();
            if(!empty($category)) {           
                // Get last category post is in
                $last_category = end(array_values($category));
                //$cat_name = $last_category->name;
                $cat_slug = $last_category->slug;          
            }
          
           }
            return $cat_slug;
        }
    }
}   
//custom pos type
if(!function_exists('get_curent_slug_custom')){
    function get_curent_slug_custom(){
    // Do not display on the homepage
    if ( !is_front_page() ) {
        $cat_name="";
        if ( is_category() ) {
              $cat = get_category( get_query_var( 'cat' ) );
               $cat_slug = $cat->slug;
              //echo $cat_slug;
            
        } 
        else if ( is_single()) { 
             // Get post category info
            //$category = get_the_category();
          $category = get_terms('depart_video');
            if(!empty($category)) {           
                // Get last category post is in
                $last_category = end(array_values($category));
                //$cat_name = $last_category->name;
                $cat_slug = $last_category->slug;          
            }
          
           }
            return $cat_slug;
        }
    }
} 
if(!function_exists('get_curent_parent_cat')){
    function get_curent_parent_cat(){
    // Do not display on the homepage    
    if ( is_front_page() || is_single() || is_category() || is_page()) {
    	$category = get_the_category(); 
		$category_parent_id = $category[0]->category_parent;
		if ( $category_parent_id != 0 ) {
		    $category_parent = get_term( $category_parent_id, 'category' );
		    $css_slug = $category_parent->slug;
		} else {
		    $css_slug = $category[0]->slug;
		}
			echo  "<script>var cat_parent='".$css_slug."';</script>";  
        }
    }
}     
 ?>