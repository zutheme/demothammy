<?php
// Our client post type function
function create_client_post_type() {
	register_post_type( 'client',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'client' ),
				'singular_name' => __( 'clients' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-id-alt',
			'has_archive' => true,
			'rewrite' => array('slug' => 'client'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_client_post_type' );

/*
* Creating a function to create our CPT
*/

function client_post_type() {
// Set UI labels for client Post Type
	$labels = array(
		'name'                => _x( 'client', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'clients', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'client', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent clients', 'hatazu' ),
		'all_items'           => __( 'All client', 'hatazu' ),
		'view_item'           => __( 'View clients', 'hatazu' ),
		'add_new_item'        => __( 'Add New clients', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit clients', 'hatazu' ),
		'update_item'         => __( 'Update clients', 'hatazu' ),
		'search_items'        => __( 'Search clients', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for client Post Type
	
	$args = array(
		'label'               => __( 'client', 'hatazu' ),
		'description'         => __( 'clients news and reviews', 'hatazu' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		//'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'client-fields', ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or client taxonomy. 
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
	
	// Registering your client Post Type
	register_post_type( 'client', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'client_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_depart_client_taxonomy')) {
    function create_depart_client_taxonomy()
    {
        $depart_client_labels = array(
            'name' => __( 'depart_client', 'hatazu' ),
            'singular_name' => __( 'depart_client', 'hatazu' ),
            'search_items' =>  __( 'Search depart_clients', 'hatazu' ),
            'popular_items' => __( 'Popular depart_clients', 'hatazu' ),
            'all_items' => __( 'All depart_clients', 'hatazu' ),
            'parent_item' => __( 'Parent depart_client', 'hatazu' ),
            'parent_item_colon' => __( 'Parent depart_client:', 'hatazu' ),
            'edit_item' => __( 'Edit department client', 'hatazu' ),
            'update_item' => __( 'Update department client', 'hatazu' ),
            'add_new_item' => __( 'Add New department client', 'hatazu' ),
            'new_item_name' => __( 'New department client Name', 'hatazu' ),
            'separate_items_with_commas' => __( 'Separate depart_clients with commas', 'hatazu' ),
            'add_or_remove_items' => __( 'Add or remove depart_clients', 'hatazu' ),
            'choose_from_most_used' => __( 'Choose from the most used depart_clients', 'hatazu' ),
            'menu_name' => __( 'depart_clients', 'hatazu' )
        );

        register_taxonomy(
            'depart_client',
            array( 'client' ),
            array(
                'hierarchical' => true,
                'labels' => $depart_client_labels,
                'show_ui' => true,
                'query_var' => true,
                'with_front' => true,
                'rewrite' => array('slug' => __('depart_client', 'hatazu'))
            )
        );
    }
}
 add_action('init', 'create_depart_client_taxonomy', 0);

if (!function_exists('taxonomy_client_slug_rewrite')) {  
		function taxonomy_client_slug_rewrite($wp_rewrite) {
		    $rules = array();
		    // get all client taxonomies
		    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
		    // get all client post types
		    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');
		    
		    foreach ($post_types as $post_type) {
		        foreach ($taxonomies as $taxonomy) {
			    
		            // go through all post types which this taxonomy is assigned to
		            foreach ($taxonomy->object_type as $object_type) {
		                
		                // check if taxonomy is registered for this client type
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
		add_filter('generate_rewrite_rules', 'taxonomy_client_slug_rewrite'); 
} ?>

