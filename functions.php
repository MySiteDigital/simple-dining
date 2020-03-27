<?php

include_once( 'includes/assets/trait-md-assets-trait.php' );
include_once( 'includes/assets/class-md-assets-simple-dining.php' );
include_once( 'includes/assets/class-md-assets-svg.php' );

include_once( 'includes/theme/class-simple-dining-theme-customizer.php' );
include_once( 'includes/theme/class-simple-dining-theme-navigation.php' );
include_once( 'includes/theme/class-simple-dining-theme-wrapper.php' );

include_once( 'includes/theme/pages/class-simple-dining-theme-pages-contact-page.php' );
include_once( 'includes/theme/pages/class-simple-dining-theme-pages-hero-page.php' );

include_once( 'includes/theme/widgets/class-simple-dining-theme-widgets-contact-details.php' );

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
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );

register_sidebar(
    [
    	'id'          => 'footer-content',
    	'name'        => 'Footer Content',
    	'description' => __( 'Custom content that appears in the footer.', 'simple-dining' ),
    ]
);

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}


function custom_theme_title( $title ) {
    global $post;
    $title = get_bloginfo( 'name' );
    if( is_front_page() ){
        if( is_home() ){
            $title .= ' - Latest Posts';
        }
        else {
            $title .= ' - ' . get_bloginfo( 'description' );
        }
    }
    else if( is_404() ){
        $title .= ' - Page Not Found';
    }
    else if( is_object( $post ) ){
        $title .= ' - ' . wp_strip_all_tags( $post->post_title );
    }
    return $title;
}

add_filter( 'pre_get_document_title', 'custom_theme_title' );

// disable srcset on frontend
function disable_wp_responsive_images() {
	return 1;
}

add_filter( 'max_srcset_image_width', 'disable_wp_responsive_images' );
