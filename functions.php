<?php

include_once( 'includes/assets/trait-md-assets-trait.php' );
include_once( 'includes/assets/class-md-assets-svg.php' );

include_once( 'includes/theme/class-simple-dining-theme-customizer.php' );
include_once( 'includes/theme/class-simple-dining-theme-navigation.php' );
include_once( 'includes/theme/class-simple-dining-theme-page-templates.php' );
include_once( 'includes/theme/class-simple-dining-theme-wrapper.php' );

include_once( 'includes/theme/widgets/class-simple-dining-theme-widgets-contact-details.php' );


//include any classes needed for the theme
include_once( 'classes/style-and-script-controller.php' );

//add theme support for various features
$defaults = [
   'height'      => 75,
   'width'       => 125,
   'flex-height' => false,
   'flex-width'  => false,
   'header-text' => [ 'site-title'],
];
add_theme_support( 'custom-logo', $defaults );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'align-wide' );

//hide the admin toolbar from the front end
show_admin_bar( false );

register_sidebar(
    [
    	'id'          => 'footer-content',
    	'name'        => 'Footer Content',
    	'description' => __( 'Custom content that appears in the footer.', 'simple-dining' ),
    ]
);

function register_simple_dining_widgets(){
	register_widget( 'contact-details' );
}
//add_action( 'widgets_init', 'register_simple_dining_widgets' );

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct(
        
        // Base ID of your widget
        'contact_details', 
        
        // Widget name will appear in UI
        __('WPBeginner Widget', 'wpb_widget_domain'), 
        
        // Widget description
        array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
        );
    }
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output
echo __( 'Hello, World!', 'wpb_widget_domain' );
echo $args['after_widget'];
}
  
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here