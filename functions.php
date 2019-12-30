<?php

include_once( 'includes/assets/trait-md-assets-trait.php' );
include_once( 'includes/assets/class-md-assets-svg.php' );

include_once( 'includes/theme/class-simple-dining-theme-customizer.php' );
include_once( 'includes/theme/class-simple-dining-theme-navigation.php' );
include_once( 'includes/theme/class-simple-dining-theme-page-templates.php' );
include_once( 'includes/theme/class-simple-dining-theme-wrapper.php' );


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
