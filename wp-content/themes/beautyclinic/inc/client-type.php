<?php
// Our doctor post type function
function create_doctor_post_type() {
	register_post_type( 'doctor',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'doctor' ),
				'singular_name' => __( 'doctors' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-id-alt',
			'has_archive' => true,
			'rewrite' => array('slug' => 'doctor'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_doctor_post_type' );

/*
* Creating a function to create our CPT
*/

function doctor_post_type() {
// Set UI labels for doctor Post Type
	$labels = array(
		'name'                => _x( 'doctor', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'doctors', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'doctor', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent doctors', 'hatazu' ),
		'all_items'           => __( 'All doctor', 'hatazu' ),
		'view_item'           => __( 'View doctors', 'hatazu' ),
		'add_new_item'        => __( 'Add New doctors', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit doctors', 'hatazu' ),
		'update_item'         => __( 'Update doctors', 'hatazu' ),
		'search_items'        => __( 'Search doctors', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for doctor Post Type
	
	$args = array(
		'label'               => __( 'doctor', 'hatazu' ),
		'description'         => __( 'doctors news and reviews', 'hatazu' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		//'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'doctor-fields', ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or doctor taxonomy. 
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
	
	// Registering your doctor Post Type
	register_post_type( 'doctor', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'doctor_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_depart_doctor_taxonomy')) {
    function create_depart_doctor_taxonomy()
    {
        $depart_doctor_labels = array(
            'name' => __( 'depart_doctor', 'hatazu' ),
            'singular_name' => __( 'depart_doctor', 'hatazu' ),
            'search_items' =>  __( 'Search depart_doctors', 'hatazu' ),
            'popular_items' => __( 'Popular depart_doctors', 'hatazu' ),
            'all_items' => __( 'All depart_doctors', 'hatazu' ),
            'parent_item' => __( 'Parent depart_doctor', 'hatazu' ),
            'parent_item_colon' => __( 'Parent depart_doctor:', 'hatazu' ),
            'edit_item' => __( 'Edit department doctor', 'hatazu' ),
            'update_item' => __( 'Update department doctor', 'hatazu' ),
            'add_new_item' => __( 'Add New department doctor', 'hatazu' ),
            'new_item_name' => __( 'New department doctor Name', 'hatazu' ),
            'separate_items_with_commas' => __( 'Separate depart_doctors with commas', 'hatazu' ),
            'add_or_remove_items' => __( 'Add or remove depart_doctors', 'hatazu' ),
            'choose_from_most_used' => __( 'Choose from the most used depart_doctors', 'hatazu' ),
            'menu_name' => __( 'depart_doctors', 'hatazu' )
        );

        register_taxonomy(
            'depart_doctor',
            array( 'doctor' ),
            array(
                'hierarchical' => true,
                'labels' => $depart_doctor_labels,
                'show_ui' => true,
                'query_var' => true,
                'with_front' => true,
                'rewrite' => array('slug' => __('depart_doctor', 'hatazu'))
            )
        );
    }
}
 add_action('init', 'create_depart_doctor_taxonomy', 0);


function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all doctor taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all doctor post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');
    
    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {
	    
            // go through all post types which this taxonomy is assigned to
            foreach ($taxonomy->object_type as $object_type) {
                
                // check if taxonomy is registered for this doctor type
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



