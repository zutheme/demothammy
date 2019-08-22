<?php
include("menu_multilevel_box.php");
// Register and load the widget
function htz_option_menu_multilevel() {
    register_widget( 'htz_menu_multilevel' );
}
add_action( 'widgets_init', 'htz_option_menu_multilevel' );
// Creating the widget 
class htz_menu_multilevel extends WP_Widget  {
 
function __construct() {
    parent::__construct(
     
        // Base ID of your widget
        'htz_menu_multilevel', 
         
        // hatazu contact  will appear in UI
        __('menu multilevel Widget', 'htz_menu_multilevel_domain'), 
         
        // Widget description
        array( 'description' => __( 'menu_multilevel', 'htz_menu_multilevel_domain' ), ) 
        );
    }
 
    // Creating widget front-end
     
    public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
             
            // before and after widget arguments are defined by themes
            //echo $args['before_widget'];
            //if ( ! empty( $title ) )
            //echo $args['before_title'] . $title . $args['after_title'];
             
            // This is where you run the code and display the output
            //echo __( 'Hello, World!', 'htz_menu_multilevel_domain' );
            menu_multilevel_box();
            //echo $args['after_widget'];
        }
             
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'htz_menu_multilevel_domain' );
        }
        // Widget admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} ?>
