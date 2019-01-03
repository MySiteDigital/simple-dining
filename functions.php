<?php
//include any classes needed for the theme
require_once( 'classes/call-now-menu-walker.php' );
require_once( 'classes/style-and-script-controller.php' );
require_once( 'classes/theme-customizer.php' );
require_once( 'classes/theme-menus.php' );
require_once( 'classes/theme-templates.php' );
require_once( 'classes/theme-wrapper.php' );

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

function icons( $echo = true ){
    $icons = get_stylesheet_directory_uri() . '/assets/icons.svg';
    if( $echo ){
        echo $icons;
    }
    else {
        return $icons;
    }
}
