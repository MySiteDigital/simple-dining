<?php
//include any classes needed for the theme
require_once( 'classes/style-and-script-controller.php' );
require_once( 'classes/theme-customizer.php' );
require_once( 'classes/theme-wrapper.php' );

//add theme support for various features
add_theme_support( 'post-thumbnails' );
add_theme_support( 'align-wide' );

//hide the admin toolbar from the front end
show_admin_bar( false );
