<?php 

//function hatazu_admin_load_scripts($hook) {

function hatazu_admin_load_scripts() { 

 	 wp_enqueue_style( 'hatazu_admin_district', plugin_dir_url(__FILE__) . 'css/style_admin_district.css',array(), '1.0.0', 'all');

 	 //wp_enqueue_script( 'hatazu_jquery.min.js','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', true ); 

 	 wp_enqueue_script( 'hatazu_district.js', plugin_dir_url(__FILE__) .'js/hatazu_admin_district.js', array(), '1.0.0', true );

     wp_localize_script( 'hatazu_district.js', 'MyAjax', array('ajaxurl' => admin_url( 'admin-ajax.php' ),'security' => wp_create_nonce( 'my-special-string' ))); 

} ?>