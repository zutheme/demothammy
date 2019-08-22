<?php
if ( ! class_exists( 'WPDocs_Walker_SubMenu' ) ) {
	/**
	 * WP_Bootstrap_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	/**
 * Custom walker class.
 */
class WPDocs_Walker_SubMenu extends Walker_Nav_Menu {
 
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent\n";
    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '';
        //$output .= $indent . '<li' . $id . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $thumnail = get_post_meta( $item->ID, '_menu_item_custom', true );
        $des = $item->description;
        if(empty($thumnail)){
            $rand = rand(1,4);
            $thumnail = plugin_dir_url( __FILE__ ) . 'randcat/thienkhue'.$rand.'.jpg';
        }
        if(empty($des)){
            $des = "Thiên Khuê cam kết sẽ đem đến cho bạn những giá trị có thực từ các liệu trình được cam kết hiệu quả và tốt nhất";
        }
         $item_output .= '<figure class="snip1197">';
         $item_output .= '<figcaption>';
         $item_output .= '<a'. $attributes .'>';
         $item_output .= '<h2>'. $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after.'</h2>';
         $item_output .= '</a>';
         $item_output .= '<blockquote>'.$des.'</blockquote>';
         $item_output .= '<div class="arrow"></div>';
         $item_output .= '</figcaption>';
         $item_output .= '<a' . $attributes .'>';
         $item_output .='<img src="'.$thumnail.'" alt="">';
         $item_output .='</a>';
         $item_output .='</figure>';
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "\n";
    }
    }
}
