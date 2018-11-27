<?php
//include any classes needed for the theme
require_once('assets/classes/style-and-script-controller.php');
require_once('assets/classes/theme-wrapper.php');

//support post-thumbnails/featured images
add_theme_support('post-thumbnails');

//hide the admin toolbar from the front end
show_admin_bar( false );
