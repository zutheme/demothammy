<?php
if ( ! function_exists( 'custom_pagination' ) ) :
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      //echo "<span class='page-numbers page-num'>Trang " . $paged . " trong " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
endif;
// function set_posts_per_page_for_towns_cpt( $query ) {
//   if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'product' ) ) {
//     $query->set( 'posts_per_page', '9' );
//   }
// }
// add_action( 'pre_get_posts', 'set_posts_per_page_for_towns_cpt' );
/**
 * @desc Set posts per page for custom post types and taxonomies
 */
// function tenpixelsleft_custom_posts_per_page($query) {
//     if (!$query->is_main_query())
//         return $query;
//     elseif ($query->is_post_type_archive('product') || $query->is_tax('taxonomy-department'))
//         $query->set('posts_per_page', '9');
//     //elseif ($query->is_post_type_archive('case-study') || $query->is_tax('case-study-category'))
//         //$query->set('posts_per_page', '30');
//     return $query;
// }
 
// // Apply pre_get_posts filter - ensure this is not called when in admin
// if (!is_admin()) {
//     add_filter('pre_get_posts', 'tenpixelsleft_custom_posts_per_page');
// }

// function get_all_product_posts( $query ) {
//   if( !is_admin() && $query->is_main_query() && is_post_type_archive( 'product' ) ) {
//     $query->set( array(
//     		'post_type' => 'product',
//             'posts_per_page' => '9',
//             'orderby' => 'name',
//             'order' => 'DESC'
//         ));
//   }
// }
// add_action( 'pre_get_posts', 'get_all_product_posts' );

function my_cptui_change_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }
    //if ( is_post_type_archive( 'product' )||$query->is_tax('taxonomy-department') ) {
    //if ( is_post_type_archive( 'product' )||$query->is_tax('taxonomy-department') ) {
       $query->set( 'posts_per_page', 9 );
    //}
    return $query;
}
add_filter( 'pre_get_posts', 'my_cptui_change_posts_per_page' );