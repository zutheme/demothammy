<?php

add_action('wp_enqueue_scripts', 'porto_child_css', 1001);
 
// Load CSS
function porto_child_css() {
    // porto child theme styles
    wp_deregister_style( 'styles-child' );
    //wp_enqueue_style( 'htz_contact.css', get_stylesheet_directory_uri() . 'css/hatazu_contact_menu_style.css',array(), '1.0.0', 'all');
    wp_register_style( 'styles-child', get_stylesheet_directory_uri() . '/style.css',array(), '5.8.0', 'all');
    wp_enqueue_style( 'styles-child' );
     wp_deregister_style( 'porto-theme' );
    //wp_enqueue_style( 'porto-theme1', get_stylesheet_directory_uri() .'/style.css',array(), '1.0.3', 'all');
     // wp_deregister_style( 'porto-style' );
   

    if (is_rtl()) {
        wp_deregister_style( 'styles-child-rtl' );
         //wp_register_style( 'styles-child', get_stylesheet_directory_uri() . '/style.css',array(), '4.9.8', 'all');
        wp_register_style( 'styles-child-rtl', get_stylesheet_directory_uri() . '/style_rtl.css',array(), '4.9.8', 'all');
        wp_enqueue_style( 'styles-child-rtl' );
    }
}
