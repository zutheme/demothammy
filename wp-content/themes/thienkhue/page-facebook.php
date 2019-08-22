<?php
/**
 *
 * Template Name: Facebook
 */
//get_header();
?>
 <?php  //print_r($_GET["hub_challenge"]); 
 file_put_contents("fb.txt", file_put_contents("php://input"));
 ?>
<?php
//get_footer();
?>
