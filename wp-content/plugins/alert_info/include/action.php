<?php function rand_post(){
    wp_verify_nonce( 'my-special-string', 'security' );
    $idpost = $_POST["_idpost"];
    $id_rand = rand(1,50);
    $recent = rand(3,60);
    $team_query = new WP_Query( array(
		    'post_type' => 'client',
		    'posts_per_page' => '1',
		    'orderby'   => 'rand',
		    'tax_query' => array(
		        array (
		            'taxonomy' => 'depart_client',
		            'field' => 'slug',
		            'terms' => 'khach-hang',
		        )
		    ),
		));
    	if ($team_query->have_posts()) {
          while ($team_query->have_posts()) {
	        	$team_query->the_post();  
	        	$id = get_the_ID();
	        	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium', false ); 
				$img_src = $thumbnail[0]; 
				$title = get_the_title($id);
	           }//end while
          } else {
              echo "nothing found";
          }//end if have post
	    wp_reset_query();  			 
    echo json_encode(array('idcustomer'=>$id_rand,'recent'=>$recent,'img_src'=>$img_src,'title'=>$title));
    die();
}
add_action( 'wp_ajax_rand_post', 'rand_post' );
add_action( 'wp_ajax_nopriv_rand_post', 'rand_post');
?>