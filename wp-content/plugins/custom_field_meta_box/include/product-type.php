<?php
// Our custom post type function
function create_product_post_type() {

	register_post_type( 'product',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'product' ),
				'singular_name' => __( 'products' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-id-alt',
			'has_archive' => true,
			'rewrite' => array('slug' => 'product'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_product_post_type' );

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'product', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'products', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'product', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent products', 'hatazu' ),
		'all_items'           => __( 'All product', 'hatazu' ),
		'view_item'           => __( 'View products', 'hatazu' ),
		'add_new_item'        => __( 'Add New products', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit products', 'hatazu' ),
		'update_item'         => __( 'Update products', 'hatazu' ),
		'search_items'        => __( 'Search products', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'product', 'hatazu' ),
		'description'         => __( 'products news and reviews', 'hatazu' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		//'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		//'taxonomies' => array( 'post_tag', 'category'), 
		'taxonomies' => array( 'post_tag'), 
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'product', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_product_department_taxonomy')) {
    function create_product_department_taxonomy()
    {
        $department_labels = array(
            'name' => __( 'Department', 'hatazu' ),
            'singular_name' => __( 'Department', 'hatazu' ),
            'search_items' =>  __( 'Search Departments', 'hatazu' ),
            'popular_items' => __( 'Popular Departments', 'hatazu' ),
            'all_items' => __( 'All Departments', 'hatazu' ),
            'parent_item' => __( 'Parent Department', 'hatazu' ),
            'parent_item_colon' => __( 'Parent Department:', 'hatazu' ),
            'edit_item' => __( 'Edit Department', 'hatazu' ),
            'update_item' => __( 'Update Department', 'hatazu' ),
            'add_new_item' => __( 'Add New Department', 'hatazu' ),
            'new_item_name' => __( 'New Department Name', 'hatazu' ),
            'separate_items_with_commas' => __( 'Separate Departments with commas', 'hatazu' ),
            'add_or_remove_items' => __( 'Add or remove Departments', 'hatazu' ),
            'choose_from_most_used' => __( 'Choose from the most used Departments', 'hatazu' ),
            'menu_name' => __( 'Departments', 'hatazu' )
        );

        register_taxonomy(
            'department',
            array( 'product' ),
            array(
                'hierarchical' => true,
                'labels' => $department_labels,
                'show_ui' => true,
                'query_var' => true,
                'with_front' => true,
                'rewrite' => array('slug' => __('department', 'hatazu'))
            )
        );
    }
}
 add_action('init', 'create_product_department_taxonomy', 0);


// register taxonomy
// function create_product_department_taxonomies() {
//     register_taxonomy('department', array('product'), array(
//         'labels' => array(
//             'name' => 'Department Categories'
//         ),
//         'show_ui' => true,
//         'show_tagcloud' => false,
//         'rewrite' => array('slug' => 'product')
//     ));
// }
// add_action('init', 'create_product_department_taxonomies');

/*
 * Replace Taxonomy slug with Post Type slug in url
 * Version: 1.1
 */
function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all custom taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all custom post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');
    
    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {
	    
            // go through all post types which this taxonomy is assigned to
            foreach ($taxonomy->object_type as $object_type) {
                
                // check if taxonomy is registered for this custom type
                if ($object_type == $post_type->rewrite['slug']) {
		    
                    // get category objects
                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));
		    
                    // make rules
                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
        }
    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');