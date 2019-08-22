<?php
//comment
if(!function_exists("count_comment")):
	function count_comment(){
		  global $wpdb,$post;
		   $id_post = get_the_ID();
		  $list_cmt = array();		  
		  $wpcomment = $wpdb->get_results( 
		  "
		  SELECT count(*) as counts 
		  FROM $wpdb->comments
		  WHERE comment_post_ID = '$id_post' and  comment_approved='1'
		  ",object
		 ); 
		  $counts=0;
		  if($wpcomment){
		 	 foreach ($wpcomment as $item_cmt){
		 	 	$counts = $item_cmt->counts; 
		 		if($counts) return $counts;
		   		}
		    }
		   return $counts;
	}
 endif; 
 //comment
if(!function_exists("mark_review")):
	function mark_review(){
		  global $wpdb,$post;
		   $id_post = get_the_ID();		  
			  $metakey="reviews";		  
			  $postmeta = $wpdb->get_results( 
			  "
			  select sum(meta.meta_value) as sum_mark, count(*) as count_row  from (select comment_id from wp_comments where comment_post_ID='$id_post') as cmt
				INNER join wp_commentmeta as meta on cmt.comment_id = meta.comment_id   
			  ",object
			);
		  $mark=0;
		  if($postmeta){
		 	 foreach ($postmeta as $item_cmt){
		 	 	$sum_mark = $item_cmt->sum_mark;
		 	 	$count_row = $item_cmt->count_row;
		 		if($count_row==0) return 0;
		 	 	$mark = round($sum_mark/$count_row);
		 	 	$mark = $mark%5;
		 		 return $mark;
		   		}
		    }
		   return $mark;
	}
 endif; 
?>