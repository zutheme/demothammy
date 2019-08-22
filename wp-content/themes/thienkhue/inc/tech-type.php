<?php
// Our tech post type function
function create_tech_post_type() {

	register_post_type( 'tech',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'tech' ),
				'singular_name' => __( 'techs' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-id-alt',
			'has_archive' => true,
			'rewrite' => array('slug' => 'tech'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_tech_post_type' );

/*
* Creating a function to create our CPT
*/

function tech_post_type() {

// Set UI labels for tech Post Type
	$labels = array(
		'name'                => _x( 'tech', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'techs', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'tech', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent techs', 'hatazu' ),
		'all_items'           => __( 'All tech', 'hatazu' ),
		'view_item'           => __( 'View techs', 'hatazu' ),
		'add_new_item'        => __( 'Add New techs', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit techs', 'hatazu' ),
		'update_item'         => __( 'Update techs', 'hatazu' ),
		'search_items'        => __( 'Search techs', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for tech Post Type
	
	$args = array(
		'label'               => __( 'tech', 'hatazu' ),
		'description'         => __( 'techs news and reviews', 'hatazu' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		//'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'tech-fields', ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
		// You can associate this CPT with a taxonomy or tech taxonomy. 
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
	
	// Registering your tech Post Type
	register_post_type( 'tech', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'tech_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_department_tech_taxonomy')) {
    function create_department_tech_taxonomy()
    {
        $department_tech_labels = array(
            'name' => __( 'department_tech', 'hatazu' ),
            'singular_name' => __( 'department_tech', 'hatazu' ),
            'search_items' =>  __( 'Search department_techs', 'hatazu' ),
            'popular_items' => __( 'Popular department_techs', 'hatazu' ),
            'all_items' => __( 'All department_techs', 'hatazu' ),
            'parent_item' => __( 'Parent department_tech', 'hatazu' ),
            'parent_item_colon' => __( 'Parent department_tech:', 'hatazu' ),
            'edit_item' => __( 'Edit department_tech', 'hatazu' ),
            'update_item' => __( 'Update department_tech', 'hatazu' ),
            'add_new_item' => __( 'Add New department_tech', 'hatazu' ),
            'new_item_name' => __( 'New department_tech Name', 'hatazu' ),
            'separate_items_with_commas' => __( 'Separate department_techs with commas', 'hatazu' ),
            'add_or_remove_items' => __( 'Add or remove department_techs', 'hatazu' ),
            'choose_from_most_used' => __( 'Choose from the most used department_techs', 'hatazu' ),
            'menu_name' => __( 'department_techs', 'hatazu' )
        );

        register_taxonomy(
            'depart_tech',
            array( 'tech' ),
            array(
                'hierarchical' => true,
                'labels' => $department_tech_labels,
                'show_ui' => true,
                'query_var' => true,
                'with_front' => true,
                'rewrite' => array('slug' => __('depart_tech', 'hatazu'))
            )
        );
    }
}
 add_action('init', 'create_department_tech_taxonomy', 0);

