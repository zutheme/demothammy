<?php
// Our testimonial post type function
function create_testimonial_post_type() {

	register_post_type( 'testimonial',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'testimonial' ),
				'singular_name' => __( 'testimonials' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-id-alt',
			'has_archive' => true,
			'rewrite' => array('slug' => 'testimonial'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_testimonial_post_type' );

/*
* Creating a function to create our CPT
*/

function testimonial_post_type() {

// Set UI labels for testimonial Post Type
	$labels = array(
		'name'                => _x( 'testimonial', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'testimonials', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'testimonial', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent testimonials', 'hatazu' ),
		'all_items'           => __( 'All testimonial', 'hatazu' ),
		'view_item'           => __( 'View testimonials', 'hatazu' ),
		'add_new_item'        => __( 'Add New testimonials', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit testimonials', 'hatazu' ),
		'update_item'         => __( 'Update testimonials', 'hatazu' ),
		'search_items'        => __( 'Search testimonials', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for testimonial Post Type
	
	$args = array(
		'label'               => __( 'testimonial', 'hatazu' ),
		'description'         => __( 'testimonials news and reviews', 'hatazu' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		//'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'testimonial-fields', ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
		// You can associate this CPT with a taxonomy or testimonial taxonomy. 
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
	
	// Registering your testimonial Post Type
	register_post_type( 'testimonial', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'testimonial_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_department_testimonial_taxonomy')) {
    function create_department_testimonial_taxonomy()
    {
        $department_testimonial_labels = array(
            'name' => __( 'department_testimonial', 'hatazu' ),
            'singular_name' => __( 'department_testimonial', 'hatazu' ),
            'search_items' =>  __( 'Search department_testimonials', 'hatazu' ),
            'popular_items' => __( 'Popular department_testimonials', 'hatazu' ),
            'all_items' => __( 'All department_testimonials', 'hatazu' ),
            'parent_item' => __( 'Parent department_testimonial', 'hatazu' ),
            'parent_item_colon' => __( 'Parent department_testimonial:', 'hatazu' ),
            'edit_item' => __( 'Edit department_testimonial', 'hatazu' ),
            'update_item' => __( 'Update department_testimonial', 'hatazu' ),
            'add_new_item' => __( 'Add New department_testimonial', 'hatazu' ),
            'new_item_name' => __( 'New department_testimonial Name', 'hatazu' ),
            'separate_items_with_commas' => __( 'Separate department_testimonials with commas', 'hatazu' ),
            'add_or_remove_items' => __( 'Add or remove department_testimonials', 'hatazu' ),
            'choose_from_most_used' => __( 'Choose from the most used department_testimonials', 'hatazu' ),
            'menu_name' => __( 'department_testimonials', 'hatazu' )
        );

        register_taxonomy(
            'depart_testimonial',
            array( 'testimonial' ),
            array(
                'hierarchical' => true,
                'labels' => $department_testimonial_labels,
                'show_ui' => true,
                'query_var' => true,
                'with_front' => true,
                'rewrite' => array('slug' => __('depart_testimonial', 'hatazu'))
            )
        );
    }
}
 add_action('init', 'create_department_testimonial_taxonomy', 0);

