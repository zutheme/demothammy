<?php

if (!function_exists('popular_posts')):
	function popular_posts(){
		global $wpdb;
		$postids = $wpdb->get_results( 
		"
		select p.* FROM (select * from wp_posts where post_status = 'publish' and post_type='product') as p
	    inner join (
	        SELECT post_id, CAST(meta_value AS UNSIGNED) as meta
			FROM        wp_postmeta
			where 		meta_key  = 'wpb_post_views_count'
			ORDER BY    meta DESC
			) as pm
	     on p.ID = pm.post_id limit 1
		",OBJECT); 
		return $postids;	
	}
endif;
